<?php

$im = imagecreatefromjpeg('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794728115210_ff2fc181.jpg');
$w = imagesx($im);
$h = imagesy($im);
echo "Torn paper size: {$w}x{$h}\n";

// Let's sample colors across the horizontal line in the middle y = 200
for ($x = 0; $x < 100; $x += 10) {
    $rgb = imagecolorat($im, $x, 200);
    $r = ($rgb >> 16) & 0xFF;
    $g = ($rgb >> 8) & 0xFF;
    $b = $rgb & 0xFF;
    echo "x=$x: R=$r, G=$g, B=$b\n";
}
// and center x = 500
$rgb = imagecolorat($im, 500, 200);
$r = ($rgb >> 16) & 0xFF;
$g = ($rgb >> 8) & 0xFF;
$b = $rgb & 0xFF;
echo "Center x=500: R=$r, G=$g, B=$b\n";
