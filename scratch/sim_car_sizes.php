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

$variations = [
    ['w' => 50, 'left' => -2, 'b' => 2.2],
    ['w' => 54, 'left' => -4, 'b' => 2.0],
    ['w' => 58, 'left' => -6, 'b' => 1.8],
    ['w' => 62, 'left' => -8, 'b' => 1.6],
];

$html = "<html><body style='background:#181818; color:#eee; font-family:sans-serif;'>
<h2 style='text-align:center;'>Testing Realistic Car Sizes Relative to Groom</h2>
<div style='display:flex; justify-content:center; gap:20px; flex-wrap:wrap;'>";

foreach ($variations as $v) {
    $bg = imagecreatefromjpeg($bgP);
    $w = imagesx($bg);
    $h = imagesy($bg);

    // Couple: width 18%
    $cplW = (int) ($w * 0.18);
    $cplH = (int) ($cplW * ($cplOrigH / $cplOrigW));
    $cplX = (int) (($w - $cplW) / 2);
    $cplY = (int) ($h - $cplH - ($h * 0.035));

    // Car
    $carW = (int) ($w * ($v['w'] / 100));
    $carH = (int) ($carW * ($carOrigH / $carOrigW));
    $carX = (int) ($w * ($v['left'] / 100));
    $carY = (int) ($h - $carH - ($h * ($v['b'] / 100)));

    // Layer car first, then couple
    imagecopyresampled($bg, $car, $carX, $carY, 0, 0, $carW, $carH, $carOrigW, $carOrigH);
    imagecopyresampled($bg, $cpl, $cplX, $cplY, 0, 0, $cplW, $cplH, $cplOrigW, $cplOrigH);

    $outPath = "c:/Users/USER/Herd/simpultemu_kami/scratch/car_sim_{$v['w']}.png";
    imagepng($bg, $outPath);
    $b64 = base64_encode(file_get_contents($outPath));

    $html .= "<div style='text-align:center;'>
        <h4>width: {$v['w']}%, left: {$v['left']}%</h4>
        <img src='data:image/png;base64,$b64' style='width:340px; border-radius:14px; border:2px solid #666;'>
    </div>";
}
$html .= '</div></body></html>';
file_put_contents('c:/Users/USER/Herd/simpultemu_kami/scratch/car_sim_results.html', $html);
echo "Written to scratch/car_sim_results.html\n";
