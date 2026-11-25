<?php

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$list = [
    '1' => 'media_1795562435837_d2daf0f3.png',
    '2' => 'media_1795562460695_58d4fd2e.jpg',
    '3' => 'media_1795562506156_16ccc65c.png',
    '4' => 'media_1795562614470_4d2215a2.jpg',
    '5' => 'media_1795562614478_5339ac4a.jpg',
    '6' => 'media_1795562614524_4f7f7b9d.jpg',
    '7' => 'media_1795562767376_1d0aef91.jpg',
    '8' => 'media_1795562862264_3080d9fb.png',
];

foreach ($list as $num => $f) {
    $p = $dir.$f;
    if (! file_exists($p)) {
        continue;
    }
    $ext = pathinfo($f, PATHINFO_EXTENSION);
    $im = ($ext === 'png') ? @imagecreatefrompng($p) : @imagecreatefromjpeg($p);
    if (! $im) {
        continue;
    }
    $w = imagesx($im);
    $h = imagesy($im);

    // Sample top, mid, bottom colors
    $top = imagecolorat($im, (int) ($w / 2), (int) ($h * 0.1));
    $mid = imagecolorat($im, (int) ($w / 2), (int) ($h * 0.5));
    $bot = imagecolorat($im, (int) ($w / 2), (int) ($h * 0.9));
    $bot10 = imagecolorat($im, (int) ($w / 2), (int) ($h - 10));

    $cTop = imagecolorsforindex($im, $top);
    $cMid = imagecolorsforindex($im, $mid);
    $cBot = imagecolorsforindex($im, $bot);
    $cBot10 = imagecolorsforindex($im, $bot10);

    echo "[$num] $f ({$w}x{$h}):\n";
    echo "  Top (10%): RGB({$cTop['red']}, {$cTop['green']}, {$cTop['blue']})\n";
    echo "  Mid (50%): RGB({$cMid['red']}, {$cMid['green']}, {$cMid['blue']})\n";
    echo "  Bot (90%): RGB({$cBot['red']}, {$cBot['green']}, {$cBot['blue']})\n";
    echo "  Bot (end): RGB({$cBot10['red']}, {$cBot10['green']}, {$cBot10['blue']})\n";
}
