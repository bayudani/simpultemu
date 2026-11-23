<?php

$im = imagecreatefrompng('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794720800620_3cbcb0c2.png');
$w = imagesx($im);
$h = imagesy($im);
echo "3cbcb0c2.png size: {$w}x{$h}\n";

// Sample a few pixels across the image to see background and text colors
$bgColors = [];
for ($y = 0; $y < $h; $y += 5) {
    for ($x = 0; $x < $w; $x += 10) {
        $rgb = imagecolorat($im, $x, $y);
        $hex = sprintf('#%02x%02x%02x', ($rgb >> 16) & 0xFF, ($rgb >> 8) & 0xFF, $rgb & 0xFF);
        $bgColors[$hex] = ($bgColors[$hex] ?? 0) + 1;
    }
}
arsort($bgColors);
echo "Top 10 colors in user crop:\n";
$i = 0;
foreach ($bgColors as $hex => $count) {
    echo "$hex: $count\n";
    if (++$i >= 10) {
        break;
    }
}
