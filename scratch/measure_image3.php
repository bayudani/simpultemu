<?php

$f3 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795571766238_36bccb95.png';
$im3 = imagecreatefrompng($f3);
$w = imagesx($im3);
$h = imagesy($im3);

// Let's find where the card image starts and ends
// In Image 3, the card has a border or background
// Let's sample colors down the vertical center
for ($y = 0; $y < $h; $y += 10) {
    $rgb = imagecolorsforindex($im3, imagecolorat($im3, (int) ($w / 2), $y));
    // echo "$y: {$rgb['red']},{$rgb['green']},{$rgb['blue']}\n";
}

// Let's find where the couple is located in Image 3:
// The bride wears white kebaya with flowers: center x ~ w/2
// Let's scan x from w*0.4 to w*0.6
$foundCoupleTop = null;
$foundCoupleBottom = null;
for ($y = 100; $y < 450; $y++) {
    for ($x = (int) ($w * 0.45); $x <= (int) ($w * 0.55); $x++) {
        $rgb = imagecolorsforindex($im3, imagecolorat($im3, $x, $y));
        // Groom's black peci: R < 40, G < 40, B < 40
        if ($rgb['red'] < 45 && $rgb['green'] < 45 && $rgb['blue'] < 45) {
            if ($foundCoupleTop === null) {
                $foundCoupleTop = $y;
            }
            $foundCoupleBottom = $y;
        }
    }
}
echo "Couple in Image 3: Y from $foundCoupleTop to $foundCoupleBottom\n";

// Let's find where the card bottom is
// Below the card is the white/cream paper with text: "Kedua mempelai menunggu di depan pendopo."
for ($y = 350; $y < $h; $y++) {
    $rgb = imagecolorsforindex($im3, imagecolorat($im3, 50, $y));
    // Cream paper: R ~ 250, G ~ 247, B ~ 242
    if ($rgb['red'] > 240 && $rgb['green'] > 235 && $rgb['blue'] > 230) {
        echo "Card bottom border is around Y = $y\n";
        break;
    }
}
