<?php

$files = [
    'bde71393' => 'media_1795530034511_bde71393.jpg',
    '4d2215a2' => 'media_1795562614470_4d2215a2.jpg',
    '5339ac4a' => 'media_1795562614478_5339ac4a.jpg',
    '4f7f7b9d' => 'media_1795562614524_4f7f7b9d.jpg',
    '1d0aef91' => 'media_1795562767376_1d0aef91.jpg',
    '96304698' => 'media_1795570003075_96304698.png',
    '12fec939' => 'media_1795570073568_12fec939.jpg',
    '273556e1' => 'media_1795570073569_273556e1.jpg',
    'dd68d8a8' => 'media_1795570119947_dd68d8a8.jpg',
    '5affb4d8' => 'media_1795570149520_5affb4d8.jpg',
    'b45990e4' => 'media_1795571682106_b45990e4.png',
    'e336f065' => 'media_1795571723078_e336f065.jpg',
    '36bccb95' => 'media_1795571766238_36bccb95.png',
    '2257f078' => 'media_1795572922254_2257f078.jpg',
    '409601d6' => 'media_1795573026909_409601d6.png',
];
$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';

foreach ($files as $tag => $f) {
    $p = $dir.$f;
    if (! file_exists($p)) {
        continue;
    }
    $ext = pathinfo($f, PATHINFO_EXTENSION);
    $im = ($ext === 'png') ? imagecreatefrompng($p) : imagecreatefromjpeg($p);
    $w = imagesx($im);
    $h = imagesy($im);

    // Check if bottom 10% is dark asphalt
    $darkBottomCount = 0;
    for ($y = (int) ($h * 0.92); $y < $h; $y += 5) {
        for ($x = 0; $x < $w; $x += 20) {
            $c = imagecolorsforindex($im, imagecolorat($im, $x, $y));
            if ($c['red'] < 120 && $c['green'] < 120 && $c['blue'] < 120) {
                $darkBottomCount++;
            }
        }
    }

    // Average color of middle
    $rMid = 0;
    $gMid = 0;
    $bMid = 0;
    $cnt = 0;
    for ($y = (int) ($h * 0.4); $y < (int) ($h * 0.6); $y += 10) {
        for ($x = (int) ($w * 0.2); $x < (int) ($w * 0.8); $x += 20) {
            $c = imagecolorsforindex($im, imagecolorat($im, $x, $y));
            $rMid += $c['red'];
            $gMid += $c['green'];
            $bMid += $c['blue'];
            $cnt++;
        }
    }
    $rMid = round($rMid / $cnt);
    $gMid = round($gMid / $cnt);
    $bMid = round($bMid / $cnt);

    echo "[$tag] $f ({$w}x{$h}): mid(R$rMid G$gMid B$bMid), darkBotSamples: $darkBottomCount\n";
}
