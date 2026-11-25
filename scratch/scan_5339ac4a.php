<?php

// Let's examine the full media_1795562614478_5339ac4a.jpg from y = 0 to 1024
$p = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795562614478_5339ac4a.jpg';
$im = imagecreatefromjpeg($p);
$w = imagesx($im);
$h = imagesy($im);
echo "5339ac4a.jpg: {$w}x{$h}\n";

// Let's scan from y=500 down to 1023 in steps of 20
for ($y = 600; $y < $h; $y += 25) {
    $colors = [];
    for ($x = 50; $x < $w; $x += 100) {
        $c = imagecolorsforindex($im, imagecolorat($im, $x, $y));
        $colors[] = "R{$c['red']}G{$c['green']}B{$c['blue']}";
    }
    echo "y=$y: ".implode(' ', $colors)."\n";
}
