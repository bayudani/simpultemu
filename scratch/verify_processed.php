<?php

$targetDir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/wanted-poster/';

$imTorn = imagecreatefrompng($targetDir.'torn-paper.png');
echo 'Torn size: '.imagesx($imTorn).'x'.imagesy($imTorn)."\n";
$rgbCorner = imagecolorat($imTorn, 5, 5);
$alphaCorner = ($rgbCorner >> 24) & 0x7F;
echo "Torn corner alpha: $alphaCorner (127 is fully transparent)\n";

$rgbCenter = imagecolorat($imTorn, 500, 200);
$alphaCenter = ($rgbCenter >> 24) & 0x7F;
echo "Torn center alpha: $alphaCenter (0 is fully opaque)\n";

$imAngel = imagecreatefrompng($targetDir.'angel-ornament.png');
echo 'Angel size: '.imagesx($imAngel).'x'.imagesy($imAngel)."\n";
$rgbACorner = imagecolorat($imAngel, 5, 5);
$alphaACorner = ($rgbACorner >> 24) & 0x7F;
echo "Angel corner alpha: $alphaACorner (127 is fully transparent)\n";
