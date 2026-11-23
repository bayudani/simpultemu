<?php

$im = imagecreatefromjpeg('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794721028728_b27302dd.jpg');
$w = imagesx($im);
$h = imagesy($im);

// Let's detect photo boxes (regions with high variance or bordered rectangles)
// In b27302dd.jpg, how are photos arranged?
// Is it:
// 1 large photo on left, 2 smaller stacked on right?
// Or 2 columns masonry?
// Or a photo collage?
// Let's sample along horizontal lines at y=0.25*h, y=0.5*h, y=0.75*h
echo "Sampling image 10:\n";
// Let's create a 120x60 ascii art with more contrast
$targetW = 60;
$targetH = 40;
$thumb = imagecreatetruecolor($targetW, $targetH);
imagecopyresampled($thumb, $im, 0, 0, 0, 0, $targetW, $targetH, $w, $h);
$chars = ' .:-=+*#%@';
for ($y = 0; $y < $targetH; $y++) {
    $line = '';
    for ($x = 0; $x < $targetW; $x++) {
        $rgb = imagecolorat($thumb, $x, $y);
        $lum = intval(0.299 * (($rgb >> 16) & 0xFF) + 0.587 * (($rgb >> 8) & 0xFF) + 0.114 * ($rgb & 0xFF));
        $line .= $chars[intval(($lum / 255) * (strlen($chars) - 1))];
    }
    echo $line."\n";
}
