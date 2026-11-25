<?php

function describeCrop($path, $label)
{
    $im = imagecreatefrompng($path);
    $w = imagesx($im);
    $h = imagesy($im);
    echo "=== $label ({$w}x{$h}) ===\n";
    // Check y=0 (which is 250px from bottom of original), y=50, y=100, y=150, y=200, y=240
    for ($y = 0; $y < $h; $y += 40) {
        $cLeft = imagecolorsforindex($im, imagecolorat($im, (int) ($w * 0.2), $y));
        $cMid = imagecolorsforindex($im, imagecolorat($im, (int) ($w * 0.5), $y));
        $cRight = imagecolorsforindex($im, imagecolorat($im, (int) ($w * 0.8), $y));
        echo "y=$y: L(R{$cLeft['red']} G{$cLeft['green']} B{$cLeft['blue']}) M(R{$cMid['red']} G{$cMid['green']} B{$cMid['blue']}) R(R{$cRight['red']} G{$cRight['green']} B{$cRight['blue']})\n";
    }
}

describeCrop('c:/Users/USER/Herd/simpultemu_kami/scratch/bde_bottom.png', 'bde (bde71393)');
describeCrop('c:/Users/USER/Herd/simpultemu_kami/scratch/p53_bottom.png', 'p53 (5339ac4a)');
