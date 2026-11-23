<?php

use App\Models\Theme;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$theme = Theme::find(19);
if ($theme) {
    echo "Current Theme 19: {$theme->name} ({$theme->slug})\n";
    $theme->name = 'Premium Sahala Pattern';
    $theme->slug = 'premium-sahala-pattern';
    $theme->description = 'Desain undangan pernikahan adat etnik nusantara mewah bertema Sahala Pattern dengan palet merah marun anggun, ornamen tenun geometris khas, bingkai foto adat, rumah tradisional emas, dan animasi transisi modern.';
    $theme->preview_image = 'themes/premium-sahala-pattern.jpg';
    $theme->theme_config = json_encode([
        'layout' => 'ethnic_sahala',
        'font_heading' => 'Cinzel',
        'font_body' => 'Plus Jakarta Sans',
        'google_fonts' => 'Cinzel:wght@400;600;700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700',
        'bg_color' => '#42070D',
        'bg_texture' => 'sahala_weave',
        'primary_color' => '#80131E',
        'secondary_color' => '#D4AF37',
        'accent_color' => '#F4E8C1',
    ]);
    $theme->save();
    echo "Updated Theme 19 to: {$theme->name} ({$theme->slug})\n";
} else {
    echo "Theme 19 not found!\n";
}
