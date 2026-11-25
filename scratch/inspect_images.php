<?php

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$files = [
    'media_1795562614470_4d2215a2.jpg',
    'media_1795562614478_5339ac4a.jpg',
    'media_1795562614524_4f7f7b9d.jpg',
    'media_1795570073568_12fec939.jpg',
    'media_1795570073569_273556e1.jpg',
    'media_1795570149520_5affb4d8.jpg',
    'media_1795571723078_e336f065.jpg',
    'media_1795572922254_2257f078.jpg',
    'media_1795573026909_409601d6.png',
];
foreach ($files as $f) {
    $p = $dir.$f;
    if (file_exists($p)) {
        $info = getimagesize($p);
        echo "$f: {$info[0]}x{$info[1]}, bytes: ".filesize($p)."\n";
    }
}
