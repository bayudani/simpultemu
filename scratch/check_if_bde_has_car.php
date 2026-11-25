<?php

$p = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795530034511_bde71393.jpg';
$im = imagecreatefromjpeg($p);
$w = imagesx($im);
$h = imagesy($im);

$hasCar = false;
for ($y = 700; $y < 950; $y += 5) {
    for ($x = 400; $x < 750; $x += 5) {
        $c = imagecolorsforindex($im, imagecolorat($im, $x, $y));
        if ($c['red'] > 220 && $c['green'] > 170 && $c['green'] < 220 && $c['blue'] < 50) {
            $hasCar = true;
            break 2;
        }
    }
}
echo 'Does bde71393.jpg have yellow car paint? '.($hasCar ? 'YES!' : 'NO!')."\n";
