<?php

$f = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795572922254_2257f078.jpg';
$im = imagecreatefromjpeg($f);
$w = imagesx($im);
$h = imagesy($im);
echo "User screenshot 1: {$w}x{$h}\n";

// Let's see what image was in public/images/themes/nostalgic-village/bg-coastal-road.jpg
$target = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-coastal-road.jpg';
$info = getimagesize($target);
echo "public bg-coastal-road.jpg: {$info[0]}x{$info[1]}, size: ".filesize($target)."\n";

// Check if bg-coastal-road matches media_1795562614478_5339ac4a.jpg or something else
$md5_target = md5_file($target);
$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
foreach (scandir($dir) as $file) {
    if (strpos($file, 'media_17955') === 0) {
        if (md5_file($dir.$file) === $md5_target) {
            echo "MATCHED with: $file\n";
        }
    }
}
