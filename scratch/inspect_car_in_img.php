<?php

// Let's inspect where the car is in 5affb4d8.jpg
$p = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570149520_5affb4d8.jpg';
$im = imagecreatefromjpeg($p);
$w = imagesx($im);
$h = imagesy($im);

// Let's crop x=400..700, y=750..950 from 5affb4d8.jpg and save it
$carCrop = imagecreatetruecolor(300, 200);
imagecopy($carCrop, $im, 0, 0, 400, 750, 300, 200);
imagepng($carCrop, 'c:/Users/USER/Herd/simpultemu_kami/scratch/5aff_car_region.png');

// Let's also crop the same region from 2257f078.jpg (user screenshot)
$u = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795572922254_2257f078.jpg';
$imU = imagecreatefromjpeg($u);
$wU = imagesx($imU);
$hU = imagesy($imU);
// In 2257f078, the car is visible. Let's find its bounding box in 2257f078!
echo "Saved scratch/5aff_car_region.png\n";
