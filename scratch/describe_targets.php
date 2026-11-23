<?php

// Describe user images by checking if OCR or dominant colors or layout
$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$targets = [
    'media_1794720800620_3cbcb0c2.png',
    'media_1794720855562_5397eb54.jpg',
    'media_1794720946187_a53332dd.png',
    'media_1794721028728_b27302dd.jpg',
    'media_1794721081249_ace8c37a.png',
];

foreach ($targets as $f) {
    $p = $dir.$f;
    $info = getimagesize($p);
    echo "--- $f ({$info[0]}x{$info[1]}) ---\n";
}
