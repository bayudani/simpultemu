<?php

$img = imagecreatefrompng('c:/Users/USER/Herd/simpultemu_kami/public/images/themes/melayu-pixelated/characters/male/front_walk_1.png');
$rgba = imagecolorat($img, 10, 10);
$colors = imagecolorsforindex($img, $rgba);
echo "Pixel (10,10): R={$colors['red']}, G={$colors['green']}, B={$colors['blue']}, Alpha={$colors['alpha']}\n";
// Alpha in GD: 0 is completely opaque, 127 is completely transparent.
