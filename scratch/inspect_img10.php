<?php

// Inspect media_1794721028728_b27302dd.jpg
$im = imagecreatefromjpeg('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794721028728_b27302dd.jpg');
$w = imagesx($im);
$h = imagesy($im);
echo "Image 10 dimensions: {$w}x{$h}\n";

// Let's divide into a 4x6 grid of brightness and color
for ($y = 0; $y < $h; $y += intval($h / 6)) {
    for ($x = 0; $x < $w; $x += intval($w / 4)) {
        $rgb = imagecolorat($im, $x, $y);
        echo sprintf('[%d, %d]: #%02x%02x%02x ', $x, $y, ($rgb >> 16) & 0xFF, ($rgb >> 8) & 0xFF, $rgb & 0xFF);
    }
    echo "\n";
}
