<?php

$f = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795576126965_ffefd06d.png';
$im = imagecreatefrompng($f);
$w = imagesx($im);
$h = imagesy($im);
echo "User screenshot 4: {$w}x{$h}\n";

// In this screenshot:
// Let's find the groom's top (songkok / black cap) and bottom (shoes)
// Groom is around x = 160..210
// Car is from x = 10..170
// Let's sample along groom column x=190:
$groomTopY = -1;
$groomBottomY = -1;
for ($y = 0; $y < $h; $y++) {
    $c = imagecolorsforindex($im, imagecolorat($im, 190, $y));
    // Black cap
    if ($c['red'] < 40 && $c['green'] < 40 && $c['blue'] < 40) {
        if ($groomTopY === -1) {
            $groomTopY = $y;
        }
    }
}
for ($y = $h - 1; $y >= 0; $y--) {
    $c = imagecolorsforindex($im, imagecolorat($im, 190, $y));
    // Black shoes
    if ($c['red'] < 50 && $c['green'] < 50 && $c['blue'] < 50) {
        $groomBottomY = $y;
        break;
    }
}
$groomHeight = $groomBottomY - $groomTopY;
echo "Groom: top=$groomTopY, bottom=$groomBottomY, height=$groomHeight px\n";

// Now car: top of luggage and bottom of tires
// Sample at x = 70 (around car center/luggage):
$carTopY = -1;
$carBottomY = -1;
for ($y = 0; $y < $h; $y++) {
    $c = imagecolorsforindex($im, imagecolorat($im, 70, $y));
    // Brown luggage or yellow car
    if (($c['red'] > 120 && $c['green'] < 90 && $c['blue'] < 60) || ($c['red'] > 200 && $c['green'] > 160 && $c['blue'] < 50)) {
        if ($carTopY === -1) {
            $carTopY = $y;
        }
    }
}
for ($y = $h - 1; $y >= 0; $y--) {
    $c = imagecolorsforindex($im, imagecolorat($im, 60, $y));
    // Dark tire
    if ($c['red'] < 70 && $c['green'] < 70 && $c['blue'] < 70) {
        $carBottomY = $y;
        break;
    }
}
$carHeight = $carBottomY - $carTopY;
echo "Car: top=$carTopY, bottom=$carBottomY, height=$carHeight px\n";
echo 'Car height ratio to groom: '.round(($carHeight / $groomHeight) * 100, 1)."%\n";
