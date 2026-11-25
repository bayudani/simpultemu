<?php

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$files = [
    '58d4fd2e' => 'media_1795562460695_58d4fd2e.jpg',
    '13377399' => 'media_1795569760275_13377399.png',
    '96304698' => 'media_1795570003075_96304698.png',
    'dd68d8a8' => 'media_1795570119947_dd68d8a8.jpg',
    '5affb4d8' => 'media_1795570149520_5affb4d8.jpg',
];

foreach ($files as $name => $f) {
    $p = $dir.$f;
    $ext = pathinfo($f, PATHINFO_EXTENSION);
    $im = ($ext === 'png') ? imagecreatefrompng($p) : imagecreatefromjpeg($p);
    $w = imagesx($im);
    $h = imagesy($im);
    echo "=== $name ($f): {$w}x{$h} ===\n";
    // Check top 20%, mid, bot 20%
    $top = imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), (int) ($h * 0.2)));
    $mid = imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), (int) ($h * 0.5)));
    $bot = imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), (int) ($h * 0.8)));
    $botEnd = imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), (int) ($h - 15)));
    echo "  Top 20%: R{$top['red']} G{$top['green']} B{$top['blue']}\n";
    echo "  Mid 50%: R{$mid['red']} G{$mid['green']} B{$mid['blue']}\n";
    echo "  Bot 80%: R{$bot['red']} G{$bot['green']} B{$bot['blue']}\n";
    echo "  Bot End: R{$botEnd['red']} G{$botEnd['green']} B{$botEnd['blue']}\n";
}
