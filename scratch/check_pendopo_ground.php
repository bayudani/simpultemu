<?php

$p = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-pendopo-sunset.jpg';
$im = imagecreatefromjpeg($p);
$w = imagesx($im);
$h = imagesy($im);
echo "bg-pendopo-sunset.jpg: {$w}x{$h}\n";

// Let's check from bottom (y = h-1) upwards
for ($y = $h - 1; $y >= (int) ($h * 0.7); $y -= (int) ($h * 0.02)) {
    $pctFromBottom = round((($h - 1 - $y) / $h) * 100, 1);
    $c = imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), $y));
    $cLeft = imagecolorsforindex($im, imagecolorat($im, (int) ($w * 0.15), $y));
    echo "bottom: {$pctFromBottom}% (y=$y) -> mid: R{$c['red']} G{$c['green']} B{$c['blue']}, left: R{$cLeft['red']} G{$cLeft['green']} B{$cLeft['blue']}\n";
}
