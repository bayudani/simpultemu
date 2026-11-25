<?php

$f = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795571766238_36bccb95.png';
$im = imagecreatefrompng($f);
$w = imagesx($im);
$h = imagesy($im);
echo "36bccb95.png (reference): {$w}x{$h}\n";

// Let's find where the card ends and where the couple feet are in this reference
// Let's check vertical line through the couple center (approx w*0.5)
for ($y = $h - 1; $y >= (int) ($h * 0.7); $y -= 5) {
    $c = imagecolorsforindex($im, imagecolorat($im, (int) ($w * 0.5), $y));
    // Check if black or dark (shoes/trousers)
    echo "y=$y: R{$c['red']} G{$c['green']} B{$c['blue']}\n";
}
