<?php

$f = 'public/images/themes/fairytale-castle/ornate-pink-frame.png';
$info = getimagesize($f);
echo "Frame: {$info[0]}x{$info[1]}, size: ".filesize($f)." bytes\n";

// Let's find the inner oval bounding box and center
$img = imagecreatefrompng($f);
$w = $info[0];
$h = $info[1];
$cx = (int) ($w / 2);
$cy = (int) ($h / 2);

// Check center pixel alpha
$rgba = imagecolorsforindex($img, imagecolorat($img, $cx, $cy));
echo "Center pixel alpha: {$rgba['alpha']} (127 is fully transparent)\n";

// Scan horizontal line through cy from center outward to find inner frame edges
$innerLeft = 0;
$innerRight = $w;
for ($x = $cx; $x >= 0; $x--) {
    $a = imagecolorsforindex($img, imagecolorat($img, $x, $cy))['alpha'];
    if ($a < 64) {
        $innerLeft = $x;
        break;
    }
}
for ($x = $cx; $x < $w; $x++) {
    $a = imagecolorsforindex($img, imagecolorat($img, $x, $cy))['alpha'];
    if ($a < 64) {
        $innerRight = $x;
        break;
    }
}

// Scan vertical line through cx from center outward to find inner frame edges
$innerTop = 0;
$innerBottom = $h;
for ($y = $cy; $y >= 0; $y--) {
    $a = imagecolorsforindex($img, imagecolorat($img, $cx, $y))['alpha'];
    if ($a < 64) {
        $innerTop = $y;
        break;
    }
}
for ($y = $cy; $y < $h; $y++) {
    $a = imagecolorsforindex($img, imagecolorat($img, $cx, $y))['alpha'];
    if ($a < 64) {
        $innerBottom = $y;
        break;
    }
}

echo "Inner Oval Bounds: X: {$innerLeft} to {$innerRight} (width: ".($innerRight - $innerLeft)."), Y: {$innerTop} to {$innerBottom} (height: ".($innerBottom - $innerTop).")\n";
printf("Percentages: Left: %.1f%%, Right: %.1f%%, Top: %.1f%%, Bottom: %.1f%%\n",
    $innerLeft / $w * 100, $innerRight / $w * 100, $innerTop / $h * 100, $innerBottom / $h * 100);
