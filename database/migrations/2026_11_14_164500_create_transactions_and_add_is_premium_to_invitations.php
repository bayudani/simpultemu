<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tambah is_premium ke tabel invitations jika belum ada
        if (! Schema::hasColumn('invitations', 'is_premium')) {
            Schema::table('invitations', function (Blueprint $table) {
                $table->boolean('is_premium')->default(false)->after('status');
            });
        }

        // 2. Buat tabel transactions untuk mencatat transaksi Duitku
        if (! Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->foreignId('invitation_id')->constrained()->cascadeOnDelete();
                $table->string('merchant_order_id')->unique();
                $table->integer('amount')->default(59000);
                $table->string('status')->default('pending'); // pending, success, failed, expired
                $table->string('reference')->nullable()->index();
                $table->string('payment_method')->nullable();
                $table->text('payment_url')->nullable();
                $table->json('response_payload')->nullable();
                $table->timestamp('paid_at')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');

        if (Schema::hasColumn('invitations', 'is_premium')) {
            Schema::table('invitations', function (Blueprint $table) {
                $table->dropColumn('is_premium');
            });
        }
    }
};
