<?php

$dir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/melayu-pixelated/characters/male';
if (! file_exists($dir)) {
    mkdir($dir, 0777, true);
}

$files = [
    'media_1795605475840_34bb3430.png' => 'side_idle.png',
    'media_1795605475860_1772785d.png' => 'back_walk.png',
    'media_1795605475871_1fdf4833.png' => 'front_walk_1.png',
    'media_1795605475909_e00fd5e6.png' => 'side_walk.png',
    'media_1795605475917_8b30f0d9.png' => 'front_walk_2.png',
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
