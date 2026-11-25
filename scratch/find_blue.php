<?php

$f2 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795572348188_a71da312.png';
$im2 = imagecreatefrompng($f2);
$w = imagesx($im2);
$h = imagesy($im2);

for ($y = (int) ($h * 0.7); $y < $h; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $rgb = imagecolorsforindex($im2, imagecolorat($im2, $x, $y));
        // Blue pixel: B > 200, B > R + 50, B > G
        if ($rgb['blue'] > 200 && $rgb['blue'] > $rgb['red'] + 40) {
            echo "Blue pixel found at x=$x, y=$y (R={$rgb['red']}, G={$rgb['green']}, B={$rgb['blue']})\n";
            break 2;
        }
    }
}
