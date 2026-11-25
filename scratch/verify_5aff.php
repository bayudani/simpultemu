<?php

$f5a = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570149520_5affb4d8.jpg';
$f22 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795572922254_2257f078.jpg';

$im5a = imagecreatefromjpeg($f5a);
$im22 = imagecreatefromjpeg($f22);

echo '5affb4d8: '.imagesx($im5a).'x'.imagesy($im5a)."\n";
echo '2257f078 (user screenshot): '.imagesx($im22).'x'.imagesy($im22)."\n";

// In 5affb4d8, what is at the bottom 100 pixels?
$h = imagesy($im5a);
$w = imagesx($im5a);
echo "Bottom pixels of 5affb4d8 (road area):\n";
for ($y = $h - 90; $y < $h; $y += 15) {
    $c = imagecolorsforindex($im5a, imagecolorat($im5a, (int) ($w / 2), $y));
    echo "y=$y: R{$c['red']} G{$c['green']} B{$c['blue']}\n";
}
