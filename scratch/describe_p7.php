<?php

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$p7 = [
    '1' => 'media_1795569760275_13377399.png',
    '2' => 'media_1795569812162_88848432.png',
    '3' => 'media_1795569973550_01705ac0.jpg',
    '4' => 'media_1795570003075_96304698.png',
    '5' => 'media_1795570073568_12fec939.jpg',
    '6' => 'media_1795570073569_273556e1.jpg',
    '7' => 'media_1795570119947_dd68d8a8.jpg',
    '8' => 'media_1795570149520_5affb4d8.jpg',
];

foreach ($p7 as $num => $f) {
    $p = $dir.$f;
    $info = getimagesize($p);
    echo "[$num] $f ({$info[0]}x{$info[1]})\n";
}
