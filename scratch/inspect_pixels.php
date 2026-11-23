<?php

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';

// Check torn_paper top-left pixel
$im1 = imagecreatefromjpeg($dir.'media_1794728115210_ff2fc181.jpg');
$rgb1 = imagecolorat($im1, 5, 5);
$r1 = ($rgb1 >> 16) & 0xFF;
$g1 = ($rgb1 >> 8) & 0xFF;
$b1 = $rgb1 & 0xFF;
echo "torn_paper (5,5): R=$r1, G=$g1, B=$b1\n";

// Check angel_ornament (5,5) and center
$im2 = imagecreatefromjpeg($dir.'media_1794728115172_6b3e59d2.jpg');
$rgb2 = imagecolorat($im2, 5, 5);
$r2 = ($rgb2 >> 16) & 0xFF;
$g2 = ($rgb2 >> 8) & 0xFF;
$b2 = $rgb2 & 0xFF;
echo "angel_ornament (5,5): R=$r2, G=$g2, B=$b2\n";

$rgb2_center = imagecolorat($im2, 512, 493);
$rc = ($rgb2_center >> 16) & 0xFF;
$gc = ($rgb2_center >> 8) & 0xFF;
$bc = $rgb2_center & 0xFF;
echo "angel_ornament center (512, 493): R=$rc, G=$gc, B=$bc\n";
