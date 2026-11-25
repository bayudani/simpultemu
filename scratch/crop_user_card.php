<?php

$f22 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795572922254_2257f078.jpg';
$im = imagecreatefromjpeg($f22);
$w = imagesx($im);
$h = imagesy($im);

// Let's crop the card from 2257f078.jpg
// The card is roughly x = 40..495, y = 20..400
$card = imagecreatetruecolor(455, 380);
imagecopy($card, $im, 0, 0, 40, 20, 455, 380);
imagepng($card, 'c:/Users/USER/Herd/simpultemu_kami/scratch/user_card_2257.png');
echo "Card from user screenshot saved to scratch/user_card_2257.png\n";
