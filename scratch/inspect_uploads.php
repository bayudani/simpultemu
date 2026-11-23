<?php

$uploadDir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$files = glob($uploadDir.'*179473790*.*');
foreach ($files as $f) {
    $info = getimagesize($f);
    echo basename($f).' | size: '.filesize($f).' bytes | '.($info ? "{$info[0]}x{$info[1]} {$info['mime']}" : 'unknown')."\n";
}
