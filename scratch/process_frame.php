<?php

$srcPath = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794797891950_ffb710c3.jpg';
$src = imagecreatefromjpeg($srcPath);
$w = imagesx($src);
$h = imagesy($src);

$dst = imagecreatetruecolor($w, $h);
imagesavealpha($dst, true);
$trans = imagecolorallocatealpha($dst, 0, 0, 0, 127);
imagefill($dst, 0, 0, $trans);

for ($y = 0; $y < $h; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $rgb = imagecolorat($src, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        $brightness = max($r, max($g, $b));

        // Threshold: pure black is 0. Transition zone 1 to 28 for soft antialiasing
        if ($brightness <= 3) {
            // fully transparent
            imagesetpixel($dst, $x, $y, $trans);
        } elseif ($brightness < 32) {
            // antialiased edge
            $alphaRatio = ($brightness - 3) / (32 - 3);
            $alpha = 127 - (int) ($alphaRatio * 127);
            $c = imagecolorallocatealpha($dst, $r, $g, $b, $alpha);
            imagesetpixel($dst, $x, $y, $c);
        } else {
            // frame pixel
            $c = imagecolorallocatealpha($dst, $r, $g, $b, 0);
            imagesetpixel($dst, $x, $y, $c);
        }
    }
}

imagepng($dst, 'public/images/themes/fairytale-castle/ornate-pink-frame.png', 8);
echo "Saved public/images/themes/fairytale-castle/ornate-pink-frame.png\n";
