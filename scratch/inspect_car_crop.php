<?php

$f = 'c:/Users/USER/Herd/simpultemu_kami/scratch/car_from_5aff.png';
$info = getimagesize($f);
echo "car_from_5aff.png: {$info[0]}x{$info[1]}\n";

// Let's sample colors in car_from_5aff.png
$im = imagecreatefrompng($f);
$w = imagesx($im);
$h = imagesy($im);
for ($y = 0; $y < $h; $y += 20) {
    $c = imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), $y));
    echo "y=$y: R{$c['red']} G{$c['green']} B{$c['blue']}\n";
}
