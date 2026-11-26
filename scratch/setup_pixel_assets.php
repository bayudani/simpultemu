<?php

$dir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/melayu-pixelated';
if (! file_exists($dir)) {
    mkdir($dir, 0777, true);
}

$uploads = [
    'bg-hall-clean.jpg' => 'media_1795604948421_21d49546.jpg',
    'ref-modal-gallery.jpg' => 'media_1795604948217_b0bc609d.jpg',
    'ref-modal-couple.jpg' => 'media_1795604948225_01d09806.jpg',
    'ref-gameplay-hud.jpg' => 'media_1795604948370_745b4c6c.jpg',
    'ref-dock-icons.jpg' => 'media_1795604948368_e33523f6.jpg',
];

$srcDir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
foreach ($uploads as $destName => $srcFile) {
    $src = $srcDir.$srcFile;
    $dst = "$dir/$destName";
    if (file_exists($src)) {
        copy($src, $dst);
        $info = getimagesize($dst);
        echo "$destName: {$info[0]}x{$info[1]}, size: ".filesize($dst)." bytes\n";
    } else {
        echo "Missing: $srcFile\n";
    }
}
