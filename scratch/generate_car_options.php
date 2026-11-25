<?php

$bgP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-pendopo-sunset.jpg';
$carP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/car-yellow-wagon.png';
$cplP = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/couple-pendopo.png';

$car = imagecreatefrompng($carP);
$cpl = imagecreatefrompng($cplP);
$cplOrigW = imagesx($cpl);
$cplOrigH = imagesy($cpl);
$carOrigW = imagesx($car);
$carOrigH = imagesy($car);

$tests = [
    ['w' => 40, 'left' => 2, 'b' => 2.5],
    ['w' => 43, 'left' => 1, 'b' => 2.5],
    ['w' => 46, 'left' => 0.5, 'b' => 2.5],
    ['w' => 48, 'left' => 0, 'b' => 2.5],
];

$html = "<html><body style='background:#181818; color:#eee; font-family:sans-serif;'>
<h2 style='text-align:center;'>Testing Car Sizes (Compared to Couple)</h2>
<div style='display:flex; justify-content:center; gap:20px; flex-wrap:wrap;'>";

foreach ($tests as $idx => $t) {
    $bg = imagecreatefromjpeg($bgP);
    $w = imagesx($bg);
    $h = imagesy($bg);

    // Couple: width 18%
    $cplW = (int) ($w * 0.18);
    $cplH = (int) ($cplW * ($cplOrigH / $cplOrigW));
    $cplX = (int) (($w - $cplW) / 2);
    $cplY = (int) ($h - $cplH - ($h * 0.035));

    // Car
    $carW = (int) ($w * ($t['w'] / 100));
    $carH = (int) ($carW * ($carOrigH / $carOrigW));
    $carX = (int) ($w * ($t['left'] / 100));
    $carY = (int) ($h - $carH - ($h * ($t['b'] / 100)));

    // Car first (z-index 10), couple second (z-index 20)
    imagecopyresampled($bg, $car, $carX, $carY, 0, 0, $carW, $carH, $carOrigW, $carOrigH);
    imagecopyresampled($bg, $cpl, $cplX, $cplY, 0, 0, $cplW, $cplH, $cplOrigW, $cplOrigH);

    $imgPath = "c:/Users/USER/Herd/simpultemu_kami/scratch/option_{$t['w']}.png";
    imagepng($bg, $imgPath);

    $b64 = base64_encode(file_get_contents($imgPath));
    $html .= "<div style='text-align:center;'>
        <h4>width: {$t['w']}%, left: {$t['left']}%</h4>
        <img src='data:image/png;base64,$b64' style='width:320px; border-radius:12px; border:2px solid #555;'>
    </div>";
}

$html .= '</div></body></html>';
file_put_contents('c:/Users/USER/Herd/simpultemu_kami/scratch/car_options.html', $html);
echo "Written to scratch/car_options.html\n";
