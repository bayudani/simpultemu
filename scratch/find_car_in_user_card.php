<?php

$im = imagecreatefrompng('c:/Users/USER/Herd/simpultemu_kami/scratch/user_card_2257.png');
$w = imagesx($im);
$h = imagesy($im);
echo "User card size: {$w}x{$h}\n";

// Where is the yellow car in user_card_2257.png?
$yellowBox = ['minX' => $w, 'maxX' => 0, 'minY' => $h, 'maxY' => 0, 'count' => 0];
for ($y = 0; $y < $h; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $c = imagecolorsforindex($im, imagecolorat($im, $x, $y));
        // yellow car body: R > 200, G in 150..220, B < 60
        if ($c['red'] > 200 && $c['green'] > 150 && $c['green'] < 225 && $c['blue'] < 60) {
            $yellowBox['count']++;
            if ($x < $yellowBox['minX']) {
                $yellowBox['minX'] = $x;
            }
            if ($x > $yellowBox['maxX']) {
                $yellowBox['maxX'] = $x;
            }
            if ($y < $yellowBox['minY']) {
                $yellowBox['minY'] = $y;
            }
            if ($y > $yellowBox['maxY']) {
                $yellowBox['maxY'] = $y;
            }
        }
    }
}
echo "Yellow car in user card:\n";
print_r($yellowBox);
