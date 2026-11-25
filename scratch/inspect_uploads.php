<?php

$files = [
    'sunset_ref' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570003075_96304698.png',
    'img_12fe' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570073568_12fec939.jpg',
    'img_2735' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570073569_273556e1.jpg',
    'img_5aff' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570149520_5affb4d8.jpg',
];

foreach ($files as $name => $path) {
    if (file_exists($path)) {
        $info = getimagesize($path);
        echo "$name ($path): {$info[0]}x{$info[1]} mime={$info['mime']}\n";
    } else {
        echo "$name not found\n";
    }
}
