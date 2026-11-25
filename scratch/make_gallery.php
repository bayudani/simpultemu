<?php

$dir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$files = [
    'media_1795530034511_bde71393.jpg',
    'media_1795530034513_a9a37c6b.jpg',
    'media_1795562460695_58d4fd2e.jpg',
    'media_1795562614470_4d2215a2.jpg',
    'media_1795562614478_5339ac4a.jpg',
    'media_1795562614524_4f7f7b9d.jpg',
    'media_1795562767376_1d0aef91.jpg',
    'media_1795569760275_13377399.png',
    'media_1795570003075_96304698.png',
    'media_1795570073568_12fec939.jpg',
    'media_1795570073569_273556e1.jpg',
    'media_1795570119947_dd68d8a8.jpg',
    'media_1795570149520_5affb4d8.jpg',
    'media_1795571682106_b45990e4.png',
    'media_1795571723078_e336f065.jpg',
    'media_1795571766238_36bccb95.png',
    'media_1795572922254_2257f078.jpg',
    'media_1795573026909_409601d6.png',
];

$html = "<html><body><h1>Media Gallery</h1><div style='display:flex; flex-wrap:wrap; gap:20px;'>";
foreach ($files as $f) {
    $p = $dir.$f;
    if (! file_exists($p)) {
        continue;
    }
    $b64 = base64_encode(file_get_contents($p));
    $mime = (pathinfo($f, PATHINFO_EXTENSION) === 'png') ? 'image/png' : 'image/jpeg';
    $html .= "<div style='border:1px solid #ccc; padding:10px; width:300px;'>";
    $html .= "<h4>$f</h4>";
    $html .= "<img src='data:$mime;base64,$b64' style='max-width:100%; height:auto; display:block;' />";
    $html .= '</div>';
}
$html .= '</div></body></html>';
file_put_contents('c:/Users/USER/Herd/simpultemu_kami/scratch/gallery.html', $html);
echo "Gallery generated at scratch/gallery.html\n";
