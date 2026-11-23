<?php

$uploadDir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';

$im = imagecreatefrompng($uploadDir.'media_1794737906659_611950b6.png');
$rgba = imagecolorat($im, 10, 10);
$alpha = ($rgba >> 24) & 0x7F;
echo "Garland (10,10) alpha: $alpha (127 = fully transparent)\n";
imagedestroy($im);

$im2 = imagecreatefromjpeg($uploadDir.'media_1794737906664_0f47ed50.jpg');
$rgb2 = imagecolorat($im2, 10, 10);
$r2 = ($rgb2 >> 16) & 0xFF;
$g2 = ($rgb2 >> 8) & 0xFF;
$b2 = $rgb2 & 0xFF;
echo "Gazebo (10,10) RGB: $r2, $g2, $b2\n";
imagedestroy($im2);

$im3 = imagecreatefromjpeg($uploadDir.'media_1794737906664_f32a79d9.jpg');
$rgb3 = imagecolorat($im3, 10, 10);
$r3 = ($rgb3 >> 16) & 0xFF;
$g3 = ($rgb3 >> 8) & 0xFF;
$b3 = $rgb3 & 0xFF;
echo "Tree (10,10) RGB: $r3, $g3, $b3\n";
imagedestroy($im3);
