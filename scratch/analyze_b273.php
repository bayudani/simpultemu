<?php

$im = imagecreatefromjpeg('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794721028728_b27302dd.jpg');
$w = imagesx($im);
$h = imagesy($im);

// Let's sample colors in b27302dd.jpg to see what blocks exist
// We can check each horizontal band
for ($y = 0; $y < $h; $y += 20) {
    // Left side average color (x: 10 to w/2 - 10)
    $lr = 0;
    $lg = 0;
    $lb = 0;
    $lcount = 0;
    for ($x = 10; $x < intval($w / 2) - 10; $x += 10) {
        $c = imagecolorat($im, $x, $y);
        $lr += ($c >> 16) & 0xFF;
        $lg += ($c >> 8) & 0xFF;
        $lb += $c & 0xFF;
        $lcount++;
    }
    // Right side average color (x: w/2 + 10 to w - 10)
    $rr = 0;
    $rg = 0;
    $rb = 0;
    $rcount = 0;
    for ($x = intval($w / 2) + 10; $x < $w - 10; $x += 10) {
        $c = imagecolorat($im, $x, $y);
        $rr += ($c >> 16) & 0xFF;
        $rg += ($c >> 8) & 0xFF;
        $rb += $c & 0xFF;
        $rcount++;
    }
    printf("y=%3d | Left: #%02x%02x%02x | Right: #%02x%02x%02x\n",
        $y,
        intval($lr / $lcount), intval($lg / $lcount), intval($lb / $lcount),
        intval($rr / $rcount), intval($rg / $rcount), intval($rb / $rcount)
    );
}
