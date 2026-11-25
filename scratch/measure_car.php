<?php

$f3 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795571766238_36bccb95.png';
$im3 = imagecreatefrompng($f3);
$w = imagesx($im3);
$h = imagesy($im3);

// Search for yellow car pixels (R > 200, G > 150, B < 80)
$minX = $w;
$maxX = 0;
$minY = $h;
$maxY = 0;
for ($y = 250; $y < 448; $y++) {
    for ($x = 20; $x < 200; $x++) {
        $rgb = imagecolorsforindex($im3, imagecolorat($im3, $x, $y));
        if ($rgb['red'] > 190 && $rgb['green'] > 140 && $rgb['blue'] < 90) {
            if ($x < $minX) {
                $minX = $x;
            }
            if ($x > $maxX) {
                $maxX = $x;
            }
            if ($y < $minY) {
                $minY = $y;
            }
            if ($y > $maxY) {
                $maxY = $y;
            }
        }
    }
}

echo "Car in Image 3: X from $minX to $maxX, Y from $minY to $maxY\n";
echo "Card height is ~448, card width is ~$w\n";
echo 'Car left: '.round($minX / $w * 100, 1)."%\n";
echo 'Car width: '.round(($maxX - $minX) / $w * 100, 1)."%\n";
echo 'Car bottom: '.round((448 - $maxY) / 448 * 100, 1)."%\n";
echo 'Car height: '.round(($maxY - $minY) / 448 * 100, 1)."%\n";
