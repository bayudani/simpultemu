<?php

$f = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795576126965_ffefd06d.png';
$im = imagecreatefrompng($f);
$w = imagesx($im);
$h = imagesy($im);

// Let's find colors in the right half (x > 140)
// Groom jacket is dark blue/slate: R ~ 60..90, G ~ 70..100, B ~ 85..120
$groomYmin = $h;
$groomYmax = 0;
$groomXmin = $w;
$groomXmax = 0;
for ($y = 0; $y < $h; $y++) {
    for ($x = 140; $x < 220; $x++) {
        $c = imagecolorsforindex($im, imagecolorat($im, $x, $y));
        // Groom jacket or cap or pants
        if ($c['red'] < 100 && $c['green'] < 110 && $c['blue'] < 130) {
            if ($y < $groomYmin) {
                $groomYmin = $y;
            }
            if ($y > $groomYmax) {
                $groomYmax = $y;
            }
            if ($x < $groomXmin) {
                $groomXmin = $x;
            }
            if ($x > $groomXmax) {
                $groomXmax = $x;
            }
        }
    }
}
$groomH = $groomYmax - $groomYmin;
echo "Groom: y=$groomYmin..$groomYmax (height=$groomH px), x=$groomXmin..$groomXmax\n";

// Car bounding box in the left half (x < 170):
$carYmin = $h;
$carYmax = 0;
$carXmin = $w;
$carXmax = 0;
for ($y = 0; $y < $h; $y++) {
    for ($x = 0; $x < 170; $x++) {
        $c = imagecolorsforindex($im, imagecolorat($im, $x, $y));
        // Yellow paint
        if ($c['red'] > 200 && $c['green'] > 150 && $c['blue'] < 60) {
            if ($y < $carYmin) {
                $carYmin = $y;
            }
            if ($y > $carYmax) {
                $carYmax = $y;
            }
            if ($x < $carXmin) {
                $carXmin = $x;
            }
            if ($x > $carXmax) {
                $carXmax = $x;
            }
        }
    }
}
$carH = $carYmax - $carYmin;
$carW = $carXmax - $carXmin;
echo "Car (yellow body): y=$carYmin..$carYmax (height=$carH px, width=$carW px), x=$carXmin..$carXmax\n";
echo 'Body height ratio to groom: '.round(($carH / $groomH) * 100, 1)."%\n";
