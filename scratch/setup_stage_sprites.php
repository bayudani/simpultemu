<?php

$dir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/melayu-pixelated';
if (! file_exists("$dir/characters")) {
    mkdir("$dir/characters", 0777, true);
}

$files = [
    'media_1795606144536_e7daa5c5.png' => 'characters/kompang_1.png',
    'media_1795606144549_451cf066.png' => 'characters/kompang_2.png',
    'media_1795606144549_0bc9fe6a.png' => 'characters/bride_groom.png',
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
