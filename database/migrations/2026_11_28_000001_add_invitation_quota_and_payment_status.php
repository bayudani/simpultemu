<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if (! Schema::hasColumn('users', 'has_used_free_quota')) {
                    $table->boolean('has_used_free_quota')->default(false)->after('package_tier');
                }
                if (! Schema::hasColumn('users', 'free_quota_used_at')) {
                    $table->timestamp('free_quota_used_at')->nullable()->after('has_used_free_quota');
                }
                if (! Schema::hasColumn('users', 'basic_invitation_credits')) {
                    $table->unsignedInteger('basic_invitation_credits')->default(0)->after('free_quota_used_at');
                }
                if (! Schema::hasColumn('users', 'premium_invitation_credits')) {
                    $table->unsignedInteger('premium_invitation_credits')->default(0)->after('basic_invitation_credits');
                }
            });
        }

        if (Schema::hasTable('invitations')) {
            Schema::table('invitations', function (Blueprint $table) {
                if (! Schema::hasColumn('invitations', 'payment_status')) {
                    $table->string('payment_status')->default('free')->after('package_tier');
                }
                if (! Schema::hasColumn('invitations', 'paid_amount')) {
                    $table->unsignedInteger('paid_amount')->default(0)->after('payment_status');
                }
                if (! Schema::hasColumn('invitations', 'paid_at')) {
                    $table->timestamp('paid_at')->nullable()->after('paid_amount');
                }
            });
        }

        if (Schema::hasTable('transactions')) {
            if (DB::getDriverName() !== 'sqlite') {
                Schema::table('transactions', function (Blueprint $table) {
                    $table->dropForeign(['invitation_id']);
                });
            }

            Schema::table('transactions', function (Blueprint $table) {
                $table->unsignedBigInteger('invitation_id')->nullable()->change();
                if (! Schema::hasColumn('transactions', 'credited_at')) {
                    $table->timestamp('credited_at')->nullable()->after('paid_at');
                }
            });

            if (DB::getDriverName() !== 'sqlite') {
                Schema::table('transactions', function (Blueprint $table) {
                    $table->foreign('invitation_id')->references('id')->on('invitations')->nullOnDelete();
                });
            }
        }

        // Backfill: Pengguna yang sudah pernah menerbitkan undangan dianggap telah memakai kuota gratis pertama.
        $publishedUserIds = DB::table('invitations')
            ->where('status', 'published')
            ->distinct()
            ->pluck('user_id');

        if ($publishedUserIds->isNotEmpty()) {
            DB::table('users')
                ->whereIn('id', $publishedUserIds)
                ->update([
                    'has_used_free_quota' => true,
                    'free_quota_used_at' => now(),
                ]);
        }

        // Backfill: Status pembayaran per undangan eksisting.
        DB::table('invitations')
            ->where(function ($q) {
                $q->where('is_premium', true)
                    ->orWhereIn('package_tier', ['basic_addon_1', 'basic_addon_2', 'premium']);
            })
            ->update([
                'payment_status' => 'paid',
                'paid_at' => DB::raw('COALESCE(paid_at, updated_at, created_at)'),
            ]);

        DB::table('invitations')
            ->where('payment_status', 'paid')
            ->where('package_tier', 'basic_addon_1')
            ->where('paid_amount', 0)
            ->update(['paid_amount' => 17000]);

        DB::table('invitations')
            ->where('payment_status', 'paid')
            ->where('package_tier', 'basic_addon_2')
            ->where('paid_amount', 0)
            ->update(['paid_amount' => 25000]);

        DB::table('invitations')
            ->where('payment_status', 'paid')
            ->where(function ($q) {
                $q->where('package_tier', 'premium')->orWhere('is_premium', true);
            })
            ->where('paid_amount', 0)
            ->update(['paid_amount' => 59000]);

        // Draf lama milik user yang sudah memakai kuota gratis dan belum membayar ditandai 'unpaid'.
        if ($publishedUserIds->isNotEmpty()) {
            DB::table('invitations')
                ->whereIn('user_id', $publishedUserIds)
                ->where('status', '!=', 'published')
                ->where('payment_status', 'free')
                ->where('is_premium', false)
                ->where(function ($q) {
                    $q->whereNull('package_tier')->orWhere('package_tier', 'basic');
                })
                ->update(['payment_status' => 'unpaid']);
        }

        if (Schema::hasTable('transactions')) {
            DB::table('transactions')
                ->where('status', 'success')
                ->whereNull('credited_at')
                ->update(['credited_at' => DB::raw('COALESCE(paid_at, updated_at, created_at)')]);
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('transactions') && Schema::hasColumn('transactions', 'credited_at')) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->dropColumn('credited_at');
            });
        }

        if (Schema::hasTable('invitations')) {
            Schema::table('invitations', function (Blueprint $table) {
                foreach (['paid_at', 'paid_amount', 'payment_status'] as $column) {
                    if (Schema::hasColumn('invitations', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }

        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                foreach (['premium_invitation_credits', 'basic_invitation_credits', 'free_quota_used_at', 'has_used_free_quota'] as $column) {
                    if (Schema::hasColumn('users', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }
    }
};
