<?php

$im = imagecreatefrompng(__DIR__.'/../public/images/themes/champagne-bloom/frame-circle.png');
$w = imagesx($im);
$h = imagesy($im);

// Sample along horizontal line passing through center y = 512
$centerY = intval($h / 2);
$centerX = intval($w / 2);

echo "Image dimensions: {$w}x{$h}\n";

// Find first non-transparent pixel from left, right, top, bottom towards center
// Also find where the inner transparent region is
$minX = $w;
$maxX = 0;
$minY = $h;
$maxY = 0;
for ($y = 0; $y < $h; $y += 4) {
    for ($x = 0; $x < $w; $x += 4) {
        $rgba = imagecolorat($im, $x, $y);
        $alpha = ($rgba >> 24) & 0x7F;
        if ($alpha < 120) { // non-transparent
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
echo "Outer frame bounding box: X=[$minX, $maxX], Y=[$minY, $maxY], width=".($maxX - $minX).', height='.($maxY - $minY)."\n";

// Now let's check along center cross:
echo "\nChecking horizontal center line (y=$centerY):\n";
$innerLeft = -1;
$innerRight = -1;
for ($x = 0; $x < $w; $x++) {
    $alpha = (imagecolorat($im, $x, $centerY) >> 24) & 0x7F;
    if ($alpha < 100 && $innerLeft == -1) {
        $outerLeft = $x;
    }
    // Check when it goes from non-transparent to transparent (inner hole)
    // Wait, let's see the alpha at center (512, 512)
}
$centerAlpha = (imagecolorat($im, $centerX, $centerY) >> 24) & 0x7F;
echo "Center pixel ($centerX, $centerY) alpha: $centerAlpha (127 is fully transparent)\n";

// Scan from center outwards
for ($x = $centerX; $x >= 0; $x--) {
    $alpha = (imagecolorat($im, $x, $centerY) >> 24) & 0x7F;
    if ($alpha < 60) {
        $innerLeft = $x;
        break;
    }
}
for ($x = $centerX; $x < $w; $x++) {
    $alpha = (imagecolorat($im, $x, $centerY) >> 24) & 0x7F;
    if ($alpha < 60) {
        $innerRight = $x;
        break;
    }
}
for ($y = $centerY; $y >= 0; $y--) {
    $alpha = (imagecolorat($im, $centerX, $y) >> 24) & 0x7F;
    if ($alpha < 60) {
        $innerTop = $y;
        break;
    }
}
for ($y = $centerY; $y < $h; $y++) {
    $alpha = (imagecolorat($im, $centerX, $y) >> 24) & 0x7F;
    if ($alpha < 60) {
        $innerBottom = $y;
        break;
    }
}

echo "Inner hole bounds:\n";
echo "Left inner edge: $innerLeft (distance from center: ".($centerX - $innerLeft).")\n";
echo "Right inner edge: $innerRight (distance from center: ".($innerRight - $centerX).")\n";
echo "Top inner edge: $innerTop (distance from center: ".($centerY - $innerTop).")\n";
echo "Bottom inner edge: $innerBottom (distance from center: ".($innerBottom - $centerY).")\n";
echo 'Hole width: '.($innerRight - $innerLeft).' ('.round(($innerRight - $innerLeft) / $w * 100, 1)."%)\n";
echo 'Hole height: '.($innerBottom - $innerTop).' ('.round(($innerBottom - $innerTop) / $h * 100, 1)."%)\n";
echo 'Hole center: X='.(($innerLeft + $innerRight) / 2).', Y='.(($innerTop + $innerBottom) / 2)."\n";
