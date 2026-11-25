<?php

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$files = scandir($dir);
foreach ($files as $f) {
    if (strpos($f, 'media_17955') === 0 && preg_match('/\.(jpg|png)$/i', $f)) {
        $p = $dir.$f;
        $info = @getimagesize($p);
        if (! $info) {
            continue;
        }
        $w = $info[0];
        $h = $info[1];

        $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
        $im = ($ext === 'png') ? @imagecreatefrompng($p) : @imagecreatefromjpeg($p);
        if (! $im) {
            continue;
        }

        // Sample several horizontal stripes: y = 0.2, 0.5, 0.7, 0.85, 0.95
        $pts = [
            '20%' => imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), (int) ($h * 0.2))),
            '50%' => imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), (int) ($h * 0.5))),
            '70%' => imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), (int) ($h * 0.7))),
            '85%' => imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), (int) ($h * 0.85))),
            '95%' => imagecolorsforindex($im, imagecolorat($im, (int) ($w / 2), (int) ($h * 0.95))),
        ];

        echo "$f ({$w}x{$h}):\n";
        foreach ($pts as $k => $c) {
            echo "  $k: R{$c['red']} G{$c['green']} B{$c['blue']}\n";
        }
    }
}
