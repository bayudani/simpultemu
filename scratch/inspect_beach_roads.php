<?php

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$check = [
    'media_1795530034511_bde71393.jpg',
    'media_1795530034511_b09bc37c.jpg',
    'media_1795530034513_a9a37c6b.jpg',
    'media_1795562614478_5339ac4a.jpg',
    'media_1795562614524_4f7f7b9d.jpg',
    'media_1795562460695_58d4fd2e.jpg',
    'media_1795569760275_13377399.png',
    'media_1795570003075_96304698.png',
    'media_1795570119947_dd68d8a8.jpg',
];

foreach ($check as $f) {
    $p = $dir.$f;
    if (! file_exists($p)) {
        continue;
    }
    $info = getimagesize($p);
    echo "$f ({$info[0]}x{$info[1]}):\n";
    $ext = pathinfo($f, PATHINFO_EXTENSION);
    $im = ($ext === 'png') ? imagecreatefrompng($p) : imagecreatefromjpeg($p);
    $w = imagesx($im);
    $h = imagesy($im);
    // Print row colors at bottom: 90%, 93%, 96%, 99%
    foreach ([0.75, 0.85, 0.90, 0.93, 0.96, 0.99] as $pct) {
        $y = (int) ($h * $pct);
        $c = imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), $y));
        echo '  '.round($pct * 100)."% (y=$y): R{$c['red']} G{$c['green']} B{$c['blue']}\n";
    }
}
