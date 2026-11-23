<?php

function asciiThumbnail($path, $targetW = 60)
{
    $info = getimagesize($path);
    $mime = $info['mime'];
    if ($mime === 'image/jpeg') {
        $im = imagecreatefromjpeg($path);
    } elseif ($mime === 'image/png') {
        $im = imagecreatefrompng($path);
    } else {
        return;
    }

    $w = imagesx($im);
    $h = imagesy($im);
    $targetH = intval($targetW * ($h / $w) * 0.45);
    $thumb = imagecreatetruecolor($targetW, $targetH);
    imagecopyresampled($thumb, $im, 0, 0, 0, 0, $targetW, $targetH, $w, $h);

    $chars = ' .:-=+*#%@';
    for ($y = 0; $y < $targetH; $y++) {
        $line = '';
        for ($x = 0; $x < $targetW; $x++) {
            $rgb = imagecolorat($thumb, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            $lum = intval(0.299 * $r + 0.587 * $g + 0.114 * $b);
            $idx = intval(($lum / 255) * (strlen($chars) - 1));
            $line .= $chars[$idx];
        }
        echo $line."\n";
    }
}

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
foreach ([
    'media_1794720855562_5397eb54.jpg',
    'media_1794720946187_a53332dd.png',
    'media_1794721028728_b27302dd.jpg',
    'media_1794721081249_ace8c37a.png',
] as $f) {
    echo "\n================= $f =================\n";
    asciiThumbnail($dir.$f, 50);
}
