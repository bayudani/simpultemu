<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->string('title')->nullable()->default('Pernikahan')->after('slug');
            $table->string('groom_parents')->nullable()->after('groom_nickname');
            $table->string('groom_photo')->nullable()->after('groom_parents');
            $table->string('bride_parents')->nullable()->after('bride_nickname');
            $table->string('bride_photo')->nullable()->after('bride_parents');
            $table->string('gift_bank_name')->nullable()->after('music_id');
            $table->string('gift_account_number')->nullable()->after('gift_bank_name');
            $table->string('gift_account_holder')->nullable()->after('gift_account_number');
            $table->text('gift_address')->nullable()->after('gift_account_holder');
            $table->string('custom_music_path')->nullable()->after('gift_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'groom_parents',
                'groom_photo',
                'bride_parents',
                'bride_photo',
                'gift_bank_name',
                'gift_account_number',
                'gift_account_holder',
                'gift_address',
                'custom_music_path',
            ]);
        });
    }
};
