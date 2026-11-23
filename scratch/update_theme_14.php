<?php

use App\Models\Theme;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$t = Theme::find(14);
if ($t) {
    $t->name = 'Premium Fairytale Castle';
    $t->slug = 'premium-fairytale-castle';
    $t->description = 'Tema romantis bak negeri dongeng dengan kastil megah berbalut awan pastel, bingkai barok pink berpahatkan mawar dan mutiara, tata letak split desktop, galeri 4 thumbnail + 1 preview utama, dan palet warna rose pink yang anggun.';
    $t->preview_image = 'images/themes/fairytale-castle/castle-vertical.jpg';
    $t->theme_config = [
        'layout' => 'fairytale_split',
        'font_heading' => 'DM Serif Display',
        'font_script' => 'Alex Brush',
        'font_body' => 'Plus Jakarta Sans',
        'google_fonts' => 'DM+Serif+Display:ital@0;1&family=Alex+Brush&family=Great+Vibes&family=Plus+Jakarta+Sans:wght@300;400;500;600;700',
        'bg_color' => '#F8B8C8',
        'bg_card' => '#FFFFFF',
        'primary_color' => '#8A1538',
        'secondary_color' => '#F47294',
        'accent_color' => '#E55B82',
        'text_color' => '#4A1525',
        'animation' => 'fairydust-sparkle',
        'default_music' => "Can't Help Falling in Love – Kina Grannis",
    ];
    $t->save();
    echo "Successfully updated Theme 14 in database: {$t->name} ({$t->slug})\n";
} else {
    echo "Theme 14 not found!\n";
}
