<?php

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$files = scandir($dir);
foreach ($files as $f) {
    if (strpos($f, 'media_17955') === 0) {
        $p = $dir.$f;
        $info = @getimagesize($p);
        if ($info) {
            echo "$f: {$info[0]}x{$info[1]} mime:{$info['mime']} size:".filesize($p)."\n";
        }
    }
}
