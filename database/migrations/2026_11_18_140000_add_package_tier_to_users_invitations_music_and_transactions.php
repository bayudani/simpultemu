<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. users table
        if (! Schema::hasColumn('users', 'package_tier')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('package_tier')->default('basic')->after('is_premium');
            });

            // Set existing premium users to 'premium'
            DB::table('users')->where('is_premium', true)->update(['package_tier' => 'premium']);
        }

        // 2. invitations table
        if (! Schema::hasColumn('invitations', 'package_tier')) {
            Schema::table('invitations', function (Blueprint $table) {
                $table->string('package_tier')->default('basic')->after('is_premium');
            });

            // Set existing premium invitations to 'premium'
            DB::table('invitations')->where('is_premium', true)->update(['package_tier' => 'premium']);
        }

        // 3. music table
        if (! Schema::hasColumn('music', 'tier')) {
            Schema::table('music', function (Blueprint $table) {
                $table->string('tier')->default('basic')->after('artist');
            });

            // Assign default tiers to seeded music
            // 1-5: basic (5 lagu)
            DB::table('music')->whereBetween('id', [1, 5])->update(['tier' => 'basic']);
            // 6-10: basic_addon_1 (+5 lagu = total 10 lagu)
            DB::table('music')->whereBetween('id', [6, 10])->update(['tier' => 'basic_addon_1']);
            // 11-20: basic_addon_2 (+10 lagu = total 20 lagu)
            DB::table('music')->whereBetween('id', [11, 20])->update(['tier' => 'basic_addon_2']);
        }

        // 4. transactions table
        if (Schema::hasTable('transactions') && ! Schema::hasColumn('transactions', 'package_tier')) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->string('package_tier')->default('premium')->after('amount');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('transactions', 'package_tier')) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->dropColumn('package_tier');
            });
        }

        if (Schema::hasColumn('music', 'tier')) {
            Schema::table('music', function (Blueprint $table) {
                $table->dropColumn('tier');
            });
        }

        if (Schema::hasColumn('invitations', 'package_tier')) {
            Schema::table('invitations', function (Blueprint $table) {
                $table->dropColumn('package_tier');
            });
        }

        if (Schema::hasColumn('users', 'package_tier')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('package_tier');
            });
        }
    }
};
