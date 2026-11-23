<?php

$files = [
    'event_ref' => 'media_1794728114762_76bc8011.jpg',
    'gallery_ref' => 'media_1794728114762_d7ee0ea8.jpg',
    'desktop_ref' => 'media_1794728114762_8fc0ae8b.jpg',
    'lovestory_ref' => 'media_1794728114762_f5716d25.jpg',
    'mempelai_ref' => 'media_1794728114762_a0b97e3d.jpg',
    'bg_parchment' => 'media_1794728115147_81c6a538.jpg',
    'torn_paper' => 'media_1794728115210_ff2fc181.jpg',
    'angel_ornament' => 'media_1794728115172_6b3e59d2.jpg',
    'full_mockup' => 'media_1794728115171_2eec7187.png',
];
$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
foreach ($files as $k => $f) {
    $path = $dir.$f;
    if (file_exists($path)) {
        $sz = getimagesize($path);
        echo $k.': '.$sz[0].'x'.$sz[1].' ('.$sz['mime'].")\n";
    } else {
        echo $k.": NOT FOUND\n";
    }
}
