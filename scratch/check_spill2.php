<?php

$frame = imagecreatefrompng(__DIR__.'/../public/images/themes/champagne-bloom/frame-circle.png');
$fw = imagesx($frame);
$fh = imagesy($frame);

foreach ([
    [71, 9.0, 8.5],
    [71.5, 8.8, 8.3],
    [72, 8.7, 8.0],
    [72.5, 8.5, 7.8],
    [73, 8.3, 7.5],
] as $p) {
    [$s, $top, $left] = $p;
    $canvas = imagecreatetruecolor($fw, $fh);
    $white = imagecolorallocate($canvas, 255, 255, 255);
    imagefill($canvas, 0, 0, $white);

    $pw = intval($fw * ($s / 100));
    $ph = intval($fh * ($s / 100));
    $px = intval($fw * ($left / 100));
    $py = intval($fh * ($top / 100));

    $red = imagecolorallocate($canvas, 255, 0, 0);
    imagefilledellipse($canvas, $px + intval($pw / 2), $py + intval($ph / 2), $pw, $ph, $red);
    imagecopy($canvas, $frame, 0, 0, 0, 0, $fw, $fh);

    // Count visible red pixels where frame is transparent outside the circle
    $spill = 0;
    for ($y = 0; $y < $fh; $y++) {
        for ($x = 0; $x < $fw; $x++) {
            $rgb = imagecolorat($canvas, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            if ($r > 220 && $g < 30 && $b < 30) {
                // If red is showing, check if frame at ($x, $y) has alpha > 110 (meaning frame is transparent here!)
                $falpha = (imagecolorat($frame, $x, $y) >> 24) & 0x7F;
                $dist = sqrt(pow($x - 451, 2) + pow($y - 466, 2));
                if ($falpha > 100 && $dist > 375) {
                    $spill++;
                }
            }
        }
    }
    echo "s=$s%, top=$top%, left=$left%: spill=$spill\n";
}
