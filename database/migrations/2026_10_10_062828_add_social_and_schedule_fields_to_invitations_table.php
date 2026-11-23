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
            $table->string('groom_instagram')->nullable()->after('groom_parents');
            $table->string('bride_instagram')->nullable()->after('bride_parents');
            $table->string('akad_end_time')->nullable()->after('akad_time');
            $table->string('akad_maps_url')->nullable()->after('akad_address');
            $table->string('event_end_time')->nullable()->after('event_time');
            $table->boolean('show_quote')->default(true)->after('quote_source');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn([
                'groom_instagram',
                'bride_instagram',
                'akad_end_time',
                'akad_maps_url',
                'event_end_time',
                'show_quote',
            ]);
        });
    }
};
