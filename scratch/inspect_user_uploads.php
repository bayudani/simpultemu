<?php

$files = [
    'media_1794720691397_c11bb894.png',
    'media_1794720800620_3cbcb0c2.png',
    'media_1794720855562_5397eb54.jpg',
    'media_1794720946187_a53332dd.png',
    'media_1794721028728_b27302dd.jpg',
    'media_1794721054818_7371e535.jpg',
    'media_1794721081249_ace8c37a.png',
];

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
foreach ($files as $f) {
    $p = $dir.$f;
    if (file_exists($p)) {
        $info = getimagesize($p);
        echo "$f: {$info[0]}x{$info[1]} ({$info['mime']})\n";
    } else {
        echo "$f: NOT FOUND\n";
    }
}
