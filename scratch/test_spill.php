<?php

$frame = imagecreatefrompng(__DIR__.'/../public/images/themes/champagne-bloom/frame-circle.png');
$fw = imagesx($frame);
$fh = imagesy($frame);

// Let's create a solid bright red circle where the photo would be, to see if red ever spills over the frame!
$canvas = imagecreatetruecolor($fw, $fh);
// Fill with white
$white = imagecolorallocate($canvas, 255, 255, 255);
imagefill($canvas, 0, 0, $white);

// Test coordinate percentages
// Target: left=6.53%, top=8.01%, size=75%
$px = intval($fw * 0.068);
$py = intval($fh * 0.082);
$pw = intval($fw * 0.74);
$ph = intval($fh * 0.74);

// Draw filled ellipse (photo)
$red = imagecolorallocate($canvas, 255, 0, 0);
imagefilledellipse($canvas, $px + intval($pw / 2), $py + intval($ph / 2), $pw, $ph, $red);

// Copy frame on top
imagecopy($canvas, $frame, 0, 0, 0, 0, $fw, $fh);

// Now check: is there any red pixel ($red = (255, 0, 0)) visible outside the gold ring or floral decorations?
// The outer boundary of the frame shouldn't have red
$spillCount = 0;
for ($y = 0; $y < $fh; $y++) {
    for ($x = 0; $x < $fw; $x++) {
        $rgb = imagecolorat($canvas, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        if ($r > 200 && $g < 50 && $b < 50) {
            // This is our red circle!
            // Let's check distance from circle center (451, 466)
            $dist = sqrt(pow($x - 451, 2) + pow($y - 466, 2));
            if ($dist > 380) { // Spilling outside the 384 radius ring!
                $spillCount++;
            }
        }
    }
}

echo "Spill count with w=74%, top=8.2%, left=6.8%: $spillCount\n";
