<?php

$ref = imagecreatefromjpeg('c:/Users/USER/Herd/simpultemu_kami/public/images/themes/melayu-pixelated/ref-dock-icons.jpg');
$w = imagesx($ref);
$h = imagesy($ref);
echo "ref-dock-icons dimensions: {$w}x{$h}\n";

$hud = imagecreatefromjpeg('c:/Users/USER/Herd/simpultemu_kami/public/images/themes/melayu-pixelated/ref-gameplay-hud.jpg');
$hw = imagesx($hud);
$hh = imagesy($hud);
echo "ref-gameplay-hud dimensions: {$hw}x{$hh}\n";
