<?php

$files = [
    'img2' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794720746380_a69432fb.png',
    'img3' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794720746461_1d63d5b2.png',
    'img4' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794720746477_38c6de52.png',
    'img5' => 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794720746488_4927d20c.png',
];

foreach ($files as $name => $path) {
    $im = imagecreatefrompng($path);
    $w = imagesx($im);
    $h = imagesy($im);
    echo "\n=== $name ($w x $h) ===\n";
    $rows = 25;
    $cols = 50;
    for ($r = 0; $r < $rows; $r++) {
        $line = '';
        for ($c = 0; $c < $cols; $c++) {
            $x = (int) ($c * $w / $cols);
            $y = (int) ($r * $h / $rows);
            $alpha = (imagecolorat($im, $x, $y) >> 24) & 0x7F;
            $line .= ($alpha < 100) ? '#' : '.';
        }
        echo $line."\n";
    }
}
