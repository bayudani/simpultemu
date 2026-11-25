<?php

$f = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-pendopo-sunset.jpg';
$im = imagecreatefromjpeg($f);
$w = imagesx($im);
$h = imagesy($im);
echo "Pendopo sunset: {$w}x{$h}\n";

// In Image 2 (media_1795573026909_409601d6.png), the user showed the couple floating!
// Let's measure where the gravel ground is relative to the bottom of the image:
// Gravel ground starts below the potted plants and bushes.
// Let's sample colors from bottom up in the center x=w/2:
for ($y = $h - 1; $y >= (int) ($h * 0.6); $y -= 20) {
    $rgb = imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), $y));
    $pctFromBottom = round((($h - 1 - $y) / $h) * 100, 1);
    // Green bushes have G > R and G > B
    $isBush = ($rgb['green'] > $rgb['red'] + 10 && $rgb['green'] > $rgb['blue']);
    echo "Y=$y ($pctFromBottom% from bottom): R={$rgb['red']}, G={$rgb['green']}, B={$rgb['blue']} ".($isBush ? '[BUSH]' : '[GRAVEL]')."\n";
}
