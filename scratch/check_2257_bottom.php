<?php

$f22 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795572922254_2257f078.jpg';
$im = imagecreatefromjpeg($f22);
$w = imagesx($im);
$h = imagesy($im);

// Where is the bottom of the image card in 2257f078?
// Look at the text "Sentuh mobilnya untuk melaju."
// Above that text is the bottom border of the image card.
// Let's sample along x = 200 from y = 300 to y = 450
for ($y = 350; $y < 420; $y += 5) {
    $c = imagecolorsforindex($im, imagecolorat($im, 200, $y));
    echo "y=$y: R{$c['red']} G{$c['green']} B{$c['blue']}\n";
}
