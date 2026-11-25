<?php

$bg = imagecreatefromjpeg('c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-pendopo-sunset.jpg');
$bgW = imagesx($bg);
$bgH = imagesy($bg);

$couple = imagecreatefrompng('c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/couple-pendopo.png');
$cW = imagesx($couple);
$cH = imagesy($couple);

$car = imagecreatefrompng('c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/car-yellow-wagon.png');
$carW = imagesx($car);
$carH = imagesy($car);

echo "bg: {$bgW}x{$bgH}\n";
echo "couple: {$cW}x{$cH}\n";
echo "car: {$carW}x{$carH}\n";

// Let's test proportions:
// In a 831x1024 background:
// Couple width ~ 24% of 831 = 200px
// Couple height = 200 * (1024/682) = 300px
// Car width ~ 30% of 831 = 250px
// Car height = 250 * (carH/carW)
// Pendopo eaves/bushes are at y ~ 650 to 750
// Bottom of gravel is at y ~ 850
