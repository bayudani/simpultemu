<?php

$targetDir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/';
$wantedDir = $targetDir.'wanted-poster/';

// Create 600x800 preview card
$card = imagecreatetruecolor(600, 800);
$bgParchment = imagecreatefromjpeg($wantedDir.'bg-parchment.jpg');
imagecopyresampled($card, $bgParchment, 0, 0, 0, 0, 600, 800, imagesx($bgParchment), imagesy($bgParchment));

// Place cover photo in middle
$cover = imagecreatefromjpeg($wantedDir.'cover.jpg');
$cw = 480;
$ch = (int) (imagesy($cover) * ($cw / imagesx($cover)));
$cx = 60;
$cy = 140;

// Border around photo
$dark = imagecolorallocate($card, 42, 27, 14);
imagefilledrectangle($card, $cx - 4, $cy - 4, $cx + $cw + 4, $cy + $ch + 4, $dark);
imagecopyresampled($card, $cover, $cx, $cy, 0, 0, $cw, $ch, imagesx($cover), imagesy($cover));

// Save as basic-wanted-poster.jpg
imagejpeg($card, $targetDir.'basic-wanted-poster.jpg', 92);
if (is_dir('c:/Users/USER/Herd/simpultemu_kami/public/themes')) {
    imagejpeg($card, 'c:/Users/USER/Herd/simpultemu_kami/public/themes/basic-wanted-poster.jpg', 92);
}
echo "Created basic-wanted-poster.jpg preview!\n";
