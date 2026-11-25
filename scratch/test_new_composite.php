<?php

$bgP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-pendopo-sunset.jpg';
$carP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/car-yellow-wagon.png';
$cplP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/couple-pendopo.png';

$bg = imagecreatefromjpeg($bgP);
$w = imagesx($bg);
$h = imagesy($bg);

// Composite car at bottom: 3%, left: 4%, width: 28%
$car = imagecreatefrompng($carP);
$carW = (int) ($w * 0.28);
$carH = (int) ($carW * (imagesy($car) / imagesx($car)));
$carX = (int) ($w * 0.04);
$carY = (int) ($h - $carH - ($h * 0.03));

// Composite couple at bottom: 3.5%, left: 50% - width/2, width: 18%
$cpl = imagecreatefrompng($cplP);
$cplW = (int) ($w * 0.18);
$cplH = (int) ($cplW * (imagesy($cpl) / imagesx($cpl)));
$cplX = (int) (($w - $cplW) / 2);
$cplY = (int) ($h - $cplH - ($h * 0.035));

imagecopyresampled($bg, $car, $carX, $carY, 0, 0, $carW, $carH, imagesx($car), imagesy($car));
imagecopyresampled($bg, $cpl, $cplX, $cplY, 0, 0, $cplW, $cplH, imagesx($cpl), imagesy($cpl));

imagepng($bg, 'c:/Users/USER/Herd/simpultemu_kami/scratch/test_new_pendopo.png');
echo "Saved test_new_pendopo.png: car at ($carX, $carY), couple at ($cplX, $cplY)\n";
