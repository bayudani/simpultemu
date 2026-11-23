<?php

$files = [
    'img2' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794720746380_a69432fb.png',
    'img3' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794720746461_1d63d5b2.png',
    'img4' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794720746477_38c6de52.png',
    'img5' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794720746488_4927d20c.png',
];

foreach ($files as $name => $path) {
    $im = imagecreatefrompng($path);
    $w = imagesx($im);
    $h = imagesy($im);

    // Check edge pixels: top edge, bottom edge, left edge, right edge
    $top_solid = 0;
    $bottom_solid = 0;
    $left_solid = 0;
    $right_solid = 0;
    for ($x = 0; $x < $w; $x++) {
        if (((imagecolorat($im, $x, 0) >> 24) & 0x7F) < 100) {
            $top_solid++;
        }
        if (((imagecolorat($im, $x, $h - 1) >> 24) & 0x7F) < 100) {
            $bottom_solid++;
        }
    }
    for ($y = 0; $y < $h; $y++) {
        if (((imagecolorat($im, 0, $y) >> 24) & 0x7F) < 100) {
            $left_solid++;
        }
        if (((imagecolorat($im, $w - 1, $y) >> 24) & 0x7F) < 100) {
            $right_solid++;
        }
    }
    echo "$name: Top=$top_solid/$w, Bottom=$bottom_solid/$w, Left=$left_solid/$h, Right=$right_solid/$h\n";

    // Find where the 90 degree corner of the frame/flower is (i.e. where it hugs the container corner):
    // If it's a corner ornament designed to frame a card/screen, which corner of the image has flowers touching the edges?
}
