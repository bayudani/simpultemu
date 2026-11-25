<?php

$bde = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795530034511_bde71393.jpg';
$p53 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795562614478_5339ac4a.jpg';

$imB = imagecreatefromjpeg($bde);
$im5 = imagecreatefromjpeg($p53);

echo 'bde: '.imagesx($imB).'x'.imagesy($imB)."\n";
echo 'p53: '.imagesx($im5).'x'.imagesy($im5)."\n";

// Let's sample colors at bottom of bde vs p53
for ($y = 800; $y < 1024; $y += 30) {
    $cB = imagecolorsforindex($imB, imagecolorat($imB, 400, $y));
    $c5 = imagecolorsforindex($im5, imagecolorat($im5, 400, $y));
    echo "y=$y: bde(R{$cB['red']} G{$cB['green']} B{$cB['blue']}) vs p53(R{$c5['red']} G{$c5['green']} B{$c5['blue']})\n";
}
