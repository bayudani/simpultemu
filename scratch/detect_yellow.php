<?php

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$check = [
    '1' => 'media_1795569760275_13377399.png',
    '4' => 'media_1795570003075_96304698.png',
    '7' => 'media_1795570119947_dd68d8a8.jpg',
    '8' => 'media_1795570149520_5affb4d8.jpg',
    '5339ac4a' => 'media_1795562614478_5339ac4a.jpg',
    'bde71393' => 'media_1795530034511_bde71393.jpg',
];

foreach ($check as $k => $f) {
    $p = $dir.$f;
    $ext = pathinfo($f, PATHINFO_EXTENSION);
    $im = ($ext === 'png') ? imagecreatefrompng($p) : imagecreatefromjpeg($p);
    $w = imagesx($im);
    $h = imagesy($im);

    // Analyze whether there is a yellow car in the image
    $yellowPixels = 0;
    for ($y = 0; $y < $h; $y += 5) {
        for ($x = 0; $x < $w; $x += 5) {
            $c = imagecolorsforindex($im, imagecolorat($im, $x, $y));
            if ($c['red'] > 200 && $c['green'] > 160 && $c['blue'] < 70) {
                $yellowPixels++;
            }
        }
    }

    // Check if there is text in the image
    echo "[$k] $f ({$w}x{$h}): yellowPixels=$yellowPixels\n";
}
