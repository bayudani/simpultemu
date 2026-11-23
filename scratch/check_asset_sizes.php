<?php

$dir = __DIR__.'/../public/images/themes/champagne-bloom/';
foreach (['flower-corner-tl.png', 'flower-corner-tr.png', 'flower-corner-bl.png', 'flower-corner-br.png'] as $f) {
    $size = getimagesize($dir.$f);
    echo $f.': '.$size[0].'x'.$size[1].' (filesize: '.filesize($dir.$f).')'.PHP_EOL;
}
