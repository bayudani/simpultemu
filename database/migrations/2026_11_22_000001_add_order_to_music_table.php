<?php

use App\Models\Music;
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
        if (! Schema::hasColumn('music', 'order')) {
            Schema::table('music', function (Blueprint $table) {
                $table->unsignedInteger('order')->default(1)->after('id');
            });
        }

        // Inisialisasi nomor urut berurutan untuk lagu yang sudah ada
        $tracks = Music::orderBy('id', 'asc')->get();
        foreach ($tracks as $index => $track) {
            $track->updateQuietly(['order' => $index + 1]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('music', 'order')) {
            Schema::table('music', function (Blueprint $table) {
                $table->dropColumn('order');
            });
        }
    }
};
