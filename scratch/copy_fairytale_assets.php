<?php

$srcDir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$dstDir = 'public/images/themes/fairytale-castle/';

$map = [
    'media_1794797891946_270e7383.png' => 'floral-corner-tl.png',
    'media_1794797891964_1d7ed610.png' => 'floral-corner-tr.png',
    'media_1794797891957_3ffcc74b.png' => 'floral-divider.png',
    'media_1794797891947_322d179d.jpg' => 'castle-vertical.jpg',
    'media_1794797891947_5bd0580d.jpg' => 'castle-landscape.jpg',
];

foreach ($map as $src => $dst) {
    copy($srcDir.$src, $dstDir.$dst);
    echo "Copied {$src} -> {$dst}\n";
}
