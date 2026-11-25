<?php

$f22 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795572922254_2257f078.jpg';
$fCar = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/car-yellow-wagon.png';
$f5a = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570149520_5affb4d8.jpg';

$im22 = imagecreatefromjpeg($f22);
$imCar = imagecreatefrompng($fCar);
$im5a = imagecreatefromjpeg($f5a);

// Crop car from 2257f078: it is around x=260..370, y=285..335 in 2257f078
$w22 = imagesx($im22);
$h22 = imagesy($im22);
echo "2257f078: {$w22}x{$h22}\n";

// Let's crop from 2257f078 around the car
$crop22 = imagecreatetruecolor(140, 70);
imagecopy($crop22, $im22, 0, 0, 260, 275, 140, 70);
imagepng($crop22, 'c:/Users/USER/Herd/simpultemu_kami/scratch/car_from_user_screenshot.png');

// Let's crop car from 5affb4d8: x=400..600, y=800..920
$crop5a = imagecreatetruecolor(200, 120);
imagecopy($crop5a, $im5a, 0, 0, 400, 800, 200, 120);
imagepng($crop5a, 'c:/Users/USER/Herd/simpultemu_kami/scratch/car_from_5aff.png');

echo "Crops saved to scratch/\n";
