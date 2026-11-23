<?php

$img = imagecreatefromjpeg('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794797891950_ffb710c3.jpg');
$w = imagesx($img);
$h = imagesy($img);

// sample corners and center
$c00 = imagecolorat($img, 5, 5);
$c_center = imagecolorat($img, (int) ($w / 2), (int) ($h / 2));
echo "Size: {$w}x{$h}\n";
printf("Corner (5,5): R=%d G=%d B=%d\n", ($c00 >> 16) & 0xFF, ($c00 >> 8) & 0xFF, $c00 & 0xFF);
printf("Center (%d,%d): R=%d G=%d B=%d\n", (int) ($w / 2), (int) ($h / 2), ($c_center >> 16) & 0xFF, ($c_center >> 8) & 0xFF, $c_center & 0xFF);
