<?php

$bde = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795530034511_bde71393.jpg';
$p53 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795562614478_5339ac4a.jpg';

$imB = imagecreatefromjpeg($bde);
$im5 = imagecreatefromjpeg($p53);

echo 'bde: '.imagesx($imB).'x'.imagesy($imB)."\n";
echo 'p53: '.imagesx($im5).'x'.imagesy($im5)."\n";

// Let's check what is at the bottom of bde vs p53
// Save crops of the bottom 250px of each
$cropB = imagecreatetruecolor(imagesx($imB), 250);
imagecopy($cropB, $imB, 0, 0, 0, imagesy($imB) - 250, imagesx($imB), 250);
imagepng($cropB, 'c:/Users/USER/Herd/simpultemu_kami/scratch/bde_bottom.png');

$crop5 = imagecreatetruecolor(imagesx($im5), 250);
imagecopy($crop5, $im5, 0, 0, 0, imagesy($im5) - 250, imagesx($im5), 250);
imagepng($crop5, 'c:/Users/USER/Herd/simpultemu_kami/scratch/p53_bottom.png');

echo "Crops saved to scratch/bde_bottom.png and scratch/p53_bottom.png\n";
