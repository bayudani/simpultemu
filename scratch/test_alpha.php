<?php

$c = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/couple-pendopo.png';
$src = imagecreatefrompng($c);
$w = imagesx($src);
$h = imagesy($src);

// Let's check the alpha at (0,0) and center (w/2, h/2)
$rgba0 = imagecolorsforindex($src, imagecolorat($src, 0, 0));
$rgbaCenter = imagecolorsforindex($src, imagecolorat($src, (int) ($w / 2), (int) ($h / 2)));

echo "(0,0) alpha: {$rgba0['alpha']}, r: {$rgba0['red']}, g: {$rgba0['green']}, b: {$rgba0['blue']}\n";
echo "Center alpha: {$rgbaCenter['alpha']}, r: {$rgbaCenter['red']}, g: {$rgbaCenter['green']}, b: {$rgbaCenter['blue']}\n";
