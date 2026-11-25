<?php

$bgP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-pendopo-sunset.jpg';
$carP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/car-yellow-wagon.png';
$cplP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/couple-pendopo.png';

$car = imagecreatefrompng($carP);
$cpl = imagecreatefrompng($cplP);
$cplOrigW = imagesx($cpl);
$cplOrigH = imagesy($cpl);
$carOrigW = imagesx($car);
$carOrigH = imagesy($car);

foreach ([52, 54] as $wPct) {
    $bg = imagecreatefromjpeg($bgP);
    $w = imagesx($bg);
    $h = imagesy($bg);

    // Couple: width 18%
    $cplW = (int) ($w * 0.18);
    $cplH = (int) ($cplW * ($cplOrigH / $cplOrigW));
    $cplX = (int) (($w - $cplW) / 2);
    $cplY = (int) ($h - $cplH - ($h * 0.035));

    // Car
    $carW = (int) ($w * ($wPct / 100));
    $carH = (int) ($carW * ($carOrigH / $carOrigW));
    $carX = (int) ($w * -0.03);
    $carY = (int) ($h - $carH - ($h * 0.022));

    imagecopyresampled($bg, $car, $carX, $carY, 0, 0, $carW, $carH, $carOrigW, $carOrigH);
    imagecopyresampled($bg, $cpl, $cplX, $cplY, 0, 0, $cplW, $cplH, $cplOrigW, $cplOrigH);

    // Crop matching the user's screenshot
    // The user cropped around bottom 35% of the card: x = 0..831, y = 600..1024
    $crop = imagecreatetruecolor(831, 400);
    imagecopy($crop, $bg, 0, 0, 0, 624, 831, 400);
    imagepng($crop, "c:/Users/USER/Herd/simpultemu_kami/scratch/zoom_{$wPct}.png");
    echo "Saved zoom_{$wPct}.png\n";
}
