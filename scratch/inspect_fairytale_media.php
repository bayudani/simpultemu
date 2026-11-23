<?php

$files = glob('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_179479789*');
foreach ($files as $f) {
    $info = getimagesize($f);
    echo basename($f).': '.($info ? "{$info[0]}x{$info[1]} {$info['mime']}" : 'unknown')."\n";
}
