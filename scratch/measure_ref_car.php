<?php

$ref = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795571766238_36bccb95.png';
$im = imagecreatefrompng($ref);
$w = imagesx($im);
$h = imagesy($im);
echo "36bccb95.png: {$w}x{$h}\n";

// Find car in reference image:
// Yellow pixels on the left
$minX = $w;
$maxX = 0;
$minY = $h;
$maxY = 0;
for ($y = 0; $y < $h; $y++) {
    for ($x = 0; $x < (int) ($w * 0.5); $x++) {
        $c = imagecolorsforindex($im, imagecolorat($im, $x, $y));
        if ($c['red'] > 200 && $c['green'] > 150 && $c['green'] < 225 && $c['blue'] < 60) {
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
$carWidthRef = $maxX - $minX;
$carHeightRef = $maxY - $minY;
echo "Car in ref: width = $carWidthRef (".round(($carWidthRef / $w) * 100, 1)."% of image), height = $carHeightRef (".round(($carHeightRef / $h) * 100, 1)."% of image)\n";
echo "Car X range: $minX .. $maxX (left: ".round(($minX / $w) * 100, 1)."%)\n";
echo "Car Y range: $minY .. $maxY (bottom: ".round((($h - $maxY) / $h) * 100, 1)."%)\n";
