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
            $table->string('gift_recipient_name')->nullable()->after('gift_address');
            $table->string('gift_phone')->nullable()->after('gift_recipient_name');
            $table->string('gift_maps_url')->nullable()->after('gift_phone');
            $table->string('closing_title')->nullable()->default('Terima Kasih')->after('gift_maps_url');
            $table->text('closing_message')->nullable()->after('closing_title');
            $table->string('closing_signature')->nullable()->after('closing_message');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn([
                'gift_recipient_name',
                'gift_phone',
                'gift_maps_url',
                'closing_title',
                'closing_message',
                'closing_signature',
            ]);
        });
    }
};
