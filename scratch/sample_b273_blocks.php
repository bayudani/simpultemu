<?php

// Let's inspect b27302dd.jpg in chunks
$im = imagecreatefromjpeg('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794721028728_b27302dd.jpg');
$w = imagesx($im);
$h = imagesy($im);

// Let's inspect the top portion (y=0 to 200), middle (200 to 400), bottom (400 to 567)
echo "Image dimensions: {$w}x{$h}\n";

// Is there a header in b27302dd.jpg?
// Let's check average luminance in blocks
for ($row = 0; $row < 10; $row++) {
    $y1 = intval($row * $h / 10);
    $y2 = intval(($row + 1) * $h / 10);
    $leftLum = 0;
    $rightLum = 0;
    $count = 0;
    for ($y = $y1; $y < $y2; $y += 3) {
        for ($x = 10; $x < intval($w / 2) - 5; $x += 3) {
            $c = imagecolorat($im, $x, $y);
            $leftLum += 0.299 * (($c >> 16) & 0xFF) + 0.587 * (($c >> 8) & 0xFF) + 0.114 * ($c & 0xFF);
            $count++;
        }
        for ($x = intval($w / 2) + 5; $x < $w - 10; $x += 3) {
            $c = imagecolorat($im, $x, $y);
            $rightLum += 0.299 * (($c >> 16) & 0xFF) + 0.587 * (($c >> 8) & 0xFF) + 0.114 * ($c & 0xFF);
        }
    }
    printf("Row %d (y=%d..%d): Left Lum=%.1f, Right Lum=%.1f\n", $row, $y1, $y2, $leftLum / $count, $rightLum / $count);
}
