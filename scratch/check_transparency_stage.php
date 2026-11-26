<?php

$img1 = imagecreatefrompng('c:/Users/USER/Herd/simpultemu_kami/public/images/themes/melayu-pixelated/characters/bride_groom.png');
$rgba1 = imagecolorat($img1, 10, 10);
$colors1 = imagecolorsforindex($img1, $rgba1);
echo "bride_groom (10,10): Alpha={$colors1['alpha']}\n";

$img2 = imagecreatefrompng('c:/Users/USER/Herd/simpultemu_kami/public/images/themes/melayu-pixelated/characters/kompang_1.png');
$rgba2 = imagecolorat($img2, 10, 10);
$colors2 = imagecolorsforindex($img2, $rgba2);
echo "kompang_1 (10,10): Alpha={$colors2['alpha']}\n";
