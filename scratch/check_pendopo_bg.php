<?php

$f = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-pendopo-sunset.jpg';
$src = imagecreatefromjpeg($f);
$w = imagesx($src);
$h = imagesy($src);
echo "bg-pendopo-sunset.jpg: {$w}x{$h}\n";

// Let's create a 400x300 downsampled PNG to save in scratch/ and inspect
$thumb = imagecreatetruecolor(400, (int) (400 * $h / $w));
imagecopyresampled($thumb, $src, 0, 0, 0, 0, 400, (int) (400 * $h / $w), $w, $h);
imagepng($thumb, 'c:/Users/USER/Herd/simpultemu_kami/scratch/thumb_pendopo.png');
echo "Saved scratch/thumb_pendopo.png\n";
