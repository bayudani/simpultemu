<?php

use App\Models\Invitation;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$invitation = Invitation::where('theme_id', 11)->first();
if (! $invitation) {
    $invitation = Invitation::first();
}
$view = view('invitations.show', [
    'invitation' => $invitation,
    'currentThemeId' => 11,
    'isMistyRomance' => false,
    'isSummerVibes' => false,
    'isFairytaleCastle' => false,
    'isEmeraldBotanical' => false,
    'isMinimalistNavy' => false,
    'isRusticElegance' => false,
    'isVintageFloral' => false,
    'isCrimsonVelvet' => false,
    'isGoldenRoyal' => false,
    'isLavenderDream' => false,
    'guestName' => 'Bapak & Ibu Tamu',
    'guestType' => 'VIP',
    'rsvp' => null,
    'wishes' => collect(),
    'weddingDate' => '2026-09-30',
    'hasValidDate' => true,
    'primaryColor' => '#D49838',
    'theme' => (object) ['slug' => 'premium-nostalgic-village', 'name' => 'Premium Nostalgic Village', 'is_premium' => true],
])->render();

$start = strpos($view, 'id="section-coastal-road"');
if ($start !== false) {
    echo substr($view, $start, 1200)."\n";
} else {
    echo "Section not found\n";
}
