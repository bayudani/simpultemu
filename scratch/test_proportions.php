<?php

$bgP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-pendopo-sunset.jpg';
$carP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/car-yellow-wagon.png';
$cplP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/couple-pendopo.png';

$car = imagecreatefrompng($carP);
$cpl = imagecreatefrompng($cplP);

// Dimensions of couple
$cplOrigW = imagesx($cpl);
$cplOrigH = imagesy($cpl);
$carOrigW = imagesx($car);
$carOrigH = imagesy($car);

echo "Couple orig: {$cplOrigW}x{$cplOrigH} (ratio H/W = ".round($cplOrigH / $cplOrigW, 2).")\n";
echo "Car orig: {$carOrigW}x{$carOrigH} (ratio H/W = ".round($carOrigH / $carOrigW, 2).")\n";

// In the card:
// If couple width is 18%, couple height in % of card is 18% * (cplOrigH / cplOrigW)
$cplHeightPct = 18 * ($cplOrigH / $cplOrigW);
echo 'Couple height in % of card width: '.round($cplHeightPct, 1)."%\n";

// A car with luggage on top should be about 75% to 85% of the man's height!
// (e.g. man is 1.75m, car with luggage is ~1.55m - 1.65m)
// So car height should be around 75%..85% of couple height!
// carHeight = carWidth * (carOrigH / carOrigW) = carWidth * 0.5
// So if carHeight = 0.8 * coupleHeight:
// carWidth * 0.5 = 0.8 * cplHeightPct
// carWidth = (0.8 * cplHeightPct) / 0.5 = 1.6 * cplHeightPct!

foreach ([42, 46, 50, 54] as $wPct) {
    $bg = imagecreatefromjpeg($bgP);
    $w = imagesx($bg);
    $h = imagesy($bg);

    // Couple
    $cplW = (int) ($w * 0.18);
    $cplH = (int) ($cplW * ($cplOrigH / $cplOrigW));
    $cplX = (int) (($w - $cplW) / 2);
    $cplY = (int) ($h - $cplH - ($h * 0.035));

    // Car
    $carW = (int) ($w * ($wPct / 100));
    $carH = (int) ($carW * ($carOrigH / $carOrigW));
    // Position car so its right bumper doesn't overlap the couple's left shoulder, or slightly beside them
    // Couple left edge is cplX = (w - cplW)/2 = (w - 0.18w)/2 = 0.41w
    // If car is at left: 2% (0.02w), car right edge is 0.02w + carW.
    // If carW = 0.46w, right edge is 0.48w (might touch groom's arm).
    // Let's check left: 0% to 2% and carW.
    $carX = (int) ($w * 0.015);
    $carY = (int) ($h - $carH - ($h * 0.025));

    imagecopyresampled($bg, $car, $carX, $carY, 0, 0, $carW, $carH, $carOrigW, $carOrigH);
    imagecopyresampled($bg, $cpl, $cplX, $cplY, 0, 0, $cplW, $cplH, $cplOrigW, $cplOrigH);

    imagepng($bg, "c:/Users/USER/Herd/simpultemu_kami/scratch/scale_{$wPct}.png");
    $carHeightRatio = round(($carH / $cplH) * 100);
    echo "scale_{$wPct}.png: car {$carW}x{$carH} (car height is {$carHeightRatio}% of couple height)\n";
}
