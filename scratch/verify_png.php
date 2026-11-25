<?php

$c = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/couple-pendopo.png';
$src = imagecreatefrompng($c);
$w = imagesx($src);
$h = imagesy($src);

$c00 = imagecolorsforindex($src, imagecolorat($src, 0, 0));
$center = imagecolorsforindex($src, imagecolorat($src, (int) ($w / 2), (int) ($h / 2)));

echo "(0,0) alpha: {$c00['alpha']} (127 means 100% transparent)\n";
echo "center alpha: {$center['alpha']} (0 means 100% opaque)\n";
