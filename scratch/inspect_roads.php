<?php

$files = [
    'img_4d22' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795562614470_4d2215a2.jpg',
    'img_5aff' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570149520_5affb4d8.jpg',
    'img_343a' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795530525135_343ae2e4.jpg',
    'bg_beach' => 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-beach-scene.jpg',
];

foreach ($files as $name => $f) {
    if (file_exists($f)) {
        $info = getimagesize($f);
        echo "$name: {$info[0]}x{$info[1]} (".filesize($f)." bytes)\n";
    }
}
