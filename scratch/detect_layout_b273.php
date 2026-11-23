<?php

$im = imagecreatefromjpeg('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794721028728_b27302dd.jpg');
$w = imagesx($im);
$h = imagesy($im);

// Let's create an image showing edges or shapes in b27302dd.jpg
// We can check where boxes/borders are located
// Check vertical cuts
$colVar = [];
for ($x = 0; $x < $w; $x++) {
    $sum = 0;
    $sq = 0;
    for ($y = 0; $y < $h; $y += 5) {
        $rgb = imagecolorat($im, $x, $y);
        $lum = 0.299 * (($rgb >> 16) & 0xFF) + 0.587 * (($rgb >> 8) & 0xFF) + 0.114 * ($rgb & 0xFF);
        $sum += $lum;
        $sq += $lum * $lum;
    }
    $n = $h / 5;
    $var = ($sq / $n) - pow($sum / $n, 2);
    $colVar[$x] = $var;
}

// Check horizontal cuts
$rowVar = [];
for ($y = 0; $y < $h; $y++) {
    $sum = 0;
    $sq = 0;
    for ($x = 0; $x < $w; $x += 5) {
        $rgb = imagecolorat($im, $x, $y);
        $lum = 0.299 * (($rgb >> 16) & 0xFF) + 0.587 * (($rgb >> 8) & 0xFF) + 0.114 * ($rgb & 0xFF);
        $sum += $lum;
        $sq += $lum * $lum;
    }
    $n = $w / 5;
    $var = ($sq / $n) - pow($sum / $n, 2);
    $rowVar[$y] = $var;
}

echo "Image size: {$w}x{$h}\n";
// Let's see the layout:
// Where are large jumps in color or borders?
