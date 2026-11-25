<?php

$im = imagecreatefrompng('c:/Users/USER/Herd/simpultemu_kami/scratch/5aff_car_region.png');
$w = imagesx($im);
$h = imagesy($im);
echo "Region: {$w}x{$h}\n";

// Count pixels matching yellow car color
$cnt = 0;
for ($y = 0; $y < $h; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $c = imagecolorsforindex($im, imagecolorat($im, $x, $y));
        if ($c['red'] > 220 && $c['green'] > 160 && $c['blue'] < 70) {
            $cnt++;
        }
    }
}
echo "Yellow car pixels in region: $cnt\n";
