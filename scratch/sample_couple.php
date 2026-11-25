<?php

$f = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795571723078_e336f065.jpg';
$im = imagecreatefromjpeg($f);
$w = imagesx($im);
$h = imagesy($im);

// Sample background pixels
$c00 = imagecolorsforindex($im, imagecolorat($im, 0, 0));
$cW0 = imagecolorsforindex($im, imagecolorat($im, $w - 1, 0));
$c0H = imagecolorsforindex($im, imagecolorat($im, 0, $h - 1));
$cWH = imagecolorsforindex($im, imagecolorat($im, $w - 1, $h - 1));

echo "(0,0): {$c00['red']}, {$c00['green']}, {$c00['blue']}\n";
echo "(W,0): {$cW0['red']}, {$cW0['green']}, {$cW0['blue']}\n";
echo "(0,H): {$c0H['red']}, {$c0H['green']}, {$c0H['blue']}\n";
echo "(W,H): {$cWH['red']}, {$cWH['green']}, {$cWH['blue']}\n";
