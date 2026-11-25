<?php

$bgP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-pendopo-sunset.jpg';
$carP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/car-yellow-wagon.png';
$cplP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/couple-pendopo.png';

$car = imagecreatefrompng($carP);
$cpl = imagecreatefrompng($cplP);

foreach ([32, 35, 38] as $carPct) {
    $bg = imagecreatefromjpeg($bgP);
    $w = imagesx($bg);
    $h = imagesy($bg);

    // Couple
    $cplW = (int) ($w * 0.18);
    $cplH = (int) ($cplW * (imagesy($cpl) / imagesx($cpl)));
    $cplX = (int) (($w - $cplW) / 2);
    $cplY = (int) ($h - $cplH - ($h * 0.035));

    // Car
    $carW = (int) ($w * ($carPct / 100));
    $carH = (int) ($carW * (imagesy($car) / imagesx($car)));
    $carX = (int) ($w * 0.03);
    $carY = (int) ($h - $carH - ($h * 0.025));

    imagecopyresampled($bg, $car, $carX, $carY, 0, 0, $carW, $carH, imagesx($car), imagesy($car));
    imagecopyresampled($bg, $cpl, $cplX, $cplY, 0, 0, $cplW, $cplH, imagesx($cpl), imagesy($cpl));

    imagepng($bg, "c:/Users/USER/Herd/simpultemu_kami/scratch/test_car_{$carPct}.png");
    echo "test_car_{$carPct}.png generated: car width = {$carW}px, height = {$carH}px\n";
}
