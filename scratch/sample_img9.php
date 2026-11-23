<?php

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';

// Check media_1794720946187_a53332dd.png (Image 9)
$im9 = imagecreatefrompng($dir.'media_1794720946187_a53332dd.png');
$w9 = imagesx($im9);
$h9 = imagesy($im9);
echo "Image 9 dimensions: {$w9}x{$h9}\n";

// Let's sample the background color and card color of Image 9
// Top left corner pixel
$bg = imagecolorat($im9, 5, 5);
echo sprintf("Image 9 Background color: #%02x%02x%02x\n", ($bg >> 16) & 0xFF, ($bg >> 8) & 0xFF, $bg & 0xFF);
// Card center (e.g. x = w/2, y = 60)
$card = imagecolorat($im9, intval($w9 / 2), 60);
echo sprintf("Image 9 Card color: #%02x%02x%02x\n", ($card >> 16) & 0xFF, ($card >> 8) & 0xFF, $card & 0xFF);

// Check button color inside Card 1 (around y = 90-110, x = w/2)
for ($y = 70; $y < 120; $y++) {
    $c = imagecolorat($im9, intval($w9 / 2), $y);
    $r = ($c >> 16) & 0xFF;
    $g = ($c >> 8) & 0xFF;
    $b = $c & 0xFF;
    if ($r > 120 && $g > 70 && $b < 90) {
        echo sprintf("Button found at y=%d: #%02x%02x%02x\n", $y, $r, $g, $b);
        break;
    }
}
