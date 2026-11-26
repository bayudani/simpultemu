<?php

$dir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/melayu-pixelated/characters/female';
if (! file_exists($dir)) {
    mkdir($dir, 0777, true);
}

$files = [
    'media_1795605870368_f310100d.png' => 'back_walk.png',
    'media_1795605870388_60fc05cb.png' => 'side_idle.png',
    'media_1795605870391_a8e52b17.png' => 'side_walk.png',
    'media_1795605870396_d13599f1.png' => 'front_walk_1.png',
    'media_1795605870406_03a21a99.png' => 'front_walk_2.png',
];

$base = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
foreach ($files as $srcFile => $dstName) {
    $src = $base.$srcFile;
    $dst = "$dir/$dstName";
    if (file_exists($src)) {
        copy($src, $dst);
        $info = getimagesize($dst);
        echo "$dstName: {$info[0]}x{$info[1]}, size: ".filesize($dst)." bytes\n";
    } else {
        echo "Missing: $srcFile\n";
    }
}
