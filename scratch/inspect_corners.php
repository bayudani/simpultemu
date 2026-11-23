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
    echo "$name ($w x $h):\n";

    // Sample the four quadrant pixel densities (which corner has the flower cluster vs empty space)
    $q_tl = 0;
    $q_tr = 0;
    $q_bl = 0;
    $q_br = 0;
    for ($y = 0; $y < $h; $y += 5) {
        for ($x = 0; $x < $w; $x += 5) {
            $alpha = (imagecolorat($im, $x, $y) >> 24) & 0x7F;
            if ($alpha < 100) { // solid pixel
                if ($x < $w / 2 && $y < $h / 2) {
                    $q_tl++;
                }
                if ($x >= $w / 2 && $y < $h / 2) {
                    $q_tr++;
                }
                if ($x < $w / 2 && $y >= $h / 2) {
                    $q_bl++;
                }
                if ($x >= $w / 2 && $y >= $h / 2) {
                    $q_br++;
                }
            }
        }
    }
    echo "  Pixel density: Top-Left=$q_tl, Top-Right=$q_tr, Bottom-Left=$q_bl, Bottom-Right=$q_br\n";

    // Also check which corner is closest to the corner of the image
    // If it's a corner ornament designed for Top-Left corner:
    // It will sit at the corner and extend inward.
}
