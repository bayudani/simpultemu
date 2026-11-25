<?php

$c = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/couple-pendopo.png';
$src = imagecreatefrompng($c);
$w = imagesx($src);
$h = imagesy($src);

// Let's sample colors in couple-pendopo.png:
// Is there blue in couple-pendopo.png?
// Yes! The groom wears a BLUE / GREY-BLUE beskap!
// But wait, what are the dimensions of couple-pendopo.png?
echo "couple-pendopo.png: {$w}x{$h}\n";

// Let's check the bottom 50 rows of couple-pendopo.png
$nonTrans = 0;
for ($y = $h - 50; $y < $h; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $rgba = imagecolorsforindex($src, imagecolorat($src, $x, $y));
        if ($rgba['alpha'] < 120) {
            $nonTrans++;
        }
    }
}
echo "Non-transparent pixels in bottom 50 rows: $nonTrans\n";

// Let's check the top 50 rows of couple-pendopo.png
$nonTransTop = 0;
for ($y = 0; $y < 50; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $rgba = imagecolorsforindex($src, imagecolorat($src, $x, $y));
        if ($rgba['alpha'] < 120) {
            $nonTransTop++;
        }
    }
}
echo "Non-transparent pixels in top 50 rows: $nonTransTop\n";

// Let's find the bounding box of non-transparent pixels in couple-pendopo.png
$minX = $w;
$maxX = 0;
$minY = $h;
$maxY = 0;
for ($y = 0; $y < $h; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $rgba = imagecolorsforindex($src, imagecolorat($src, $x, $y));
        if ($rgba['alpha'] < 100) {
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
echo "Bounding box: X from $minX to $maxX, Y from $minY to $maxY\n";
