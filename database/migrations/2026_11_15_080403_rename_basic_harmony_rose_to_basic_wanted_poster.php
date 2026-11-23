<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $themeConfig = json_encode([
            'layout' => 'western_wanted',
            'font_heading' => 'Pirata One',
            'font_body' => 'Plus Jakarta Sans',
            'google_fonts' => 'Pirata+One&family=Rye&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700',
            'bg_color' => '#F5EBE1',
            'bg_texture' => 'parchment_paper',
            'primary_color' => '#2A1B0E',
            'secondary_color' => '#B91C1C',
            'accent_color' => '#8C6239',
            'text_color' => '#2A1B0E',
            'animation' => 'wanted-reveal',
            'default_music' => 'A Thousand Years – Christina Perri',
        ]);

        DB::table('themes')
            ->where('id', 4)
            ->orWhere('slug', 'basic-harmony-rose')
            ->update([
                'name' => 'Basic Wanted Poster',
                'slug' => 'basic-wanted-poster',
                'description' => 'Desain vintage western Wanted Poster dengan tekstur kertas usang, font gothic blackletter, layout dua sisi, ornamen malaikat klasik, dan cap WANTED merah.',
                'preview_image' => 'themes/basic-wanted-poster.jpg',
                'theme_config' => $themeConfig,
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('themes')
            ->where('id', 4)
            ->orWhere('slug', 'basic-wanted-poster')
            ->update([
                'name' => 'Basic Harmony Rose',
                'slug' => 'basic-harmony-rose',
                'description' => 'Circular Overlap romantis dengan soft blush, Cormorant Garamond + Poppins, dan kelopak mawar transparan SVG berdenyut halus.',
                'preview_image' => 'themes/basic-harmony-rose.jpg',
            ]);
    }
};
