<?php

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$check = [
    '2' => 'media_1795562460695_58d4fd2e.jpg',
    '4' => 'media_1795562614470_4d2215a2.jpg',
    '5' => 'media_1795562614478_5339ac4a.jpg',
    '6' => 'media_1795562614524_4f7f7b9d.jpg',
];

foreach ($check as $idx => $f) {
    $p = $dir.$f;
    $info = getimagesize($p);
    echo "[$idx] $f: {$info[0]}x{$info[1]}\n";
}
