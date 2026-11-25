<?php

$f = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/car-yellow-wagon.png';
$info = getimagesize($f);
echo "car-yellow-wagon.png: {$info[0]}x{$info[1]}, size: ".filesize($f)."\n";
