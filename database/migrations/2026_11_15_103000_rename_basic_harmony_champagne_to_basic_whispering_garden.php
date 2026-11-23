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
            'layout' => 'whispering_garden',
            'font_heading' => 'Playfair Display',
            'font_script' => 'Great Vibes',
            'font_body' => 'Plus Jakarta Sans',
            'google_fonts' => 'Playfair+Display:ital,wght@0,400..900;1,400..900&family=Great+Vibes&family=Plus+Jakarta+Sans:wght@300;400;500;600;700',
            'bg_color' => '#F4EFEA',
            'primary_color' => '#5C3D28',
            'secondary_color' => '#8C6239',
            'accent_color' => '#4A3324',
            'text_color' => '#3D2B1F',
            'animation' => 'garden-reveal',
            'default_music' => 'Canon in D – Pachelbel',
        ]);

        DB::table('themes')
            ->where('id', 9)
            ->orWhere('slug', 'basic-harmony-champagne')
            ->update([
                'name' => 'Basic Whispering Garden',
                'slug' => 'basic-whispering-garden',
                'description' => 'Tema elegan bernuansa taman botani klasik dengan ilustrasi gazebo antik, pohon rindang, ornamen kupu-kupu ukiran sepia, dan tata letak galeri polaroid estetis.',
                'preview_image' => 'themes/basic-whispering-garden.jpg',
                'theme_config' => $themeConfig,
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('themes')
            ->where('id', 9)
            ->orWhere('slug', 'basic-whispering-garden')
            ->update([
                'name' => 'Basic Harmony Champagne',
                'slug' => 'basic-harmony-champagne',
                'preview_image' => 'themes/basic-harmony-champagne.jpg',
            ]);
    }
};
