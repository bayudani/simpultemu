<?php

// Check bottom 100 rows of img_4d22, img_5aff, and img_343a
$files = [
    'img_4d22' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795562614470_4d2215a2.jpg',
    'img_5aff' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570149520_5affb4d8.jpg',
    'img_343a' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795530525135_343ae2e4.jpg',
];

foreach ($files as $name => $f) {
    $im = imagecreatefromjpeg($f);
    $w = imagesx($im);
    $h = imagesy($im);
    // Sample color at bottom center (x=w/2, y=h-10)
    $rgb = imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), $h - 10));
    echo "$name bottom center: R={$rgb['red']}, G={$rgb['green']}, B={$rgb['blue']}\n";

    // Sample color at bottom y=h-50
    $rgb50 = imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), $h - 50));
    echo "$name bottom y-50: R={$rgb50['red']}, G={$rgb50['green']}, B={$rgb50['blue']}\n";
}
