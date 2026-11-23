<?php

$sourceDir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$targetDir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/whispering-garden/';

if (! is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// 1. Process Gazebo (0f47ed50.jpg) -> gazebo.png
$srcGazebo = imagecreatefromjpeg($sourceDir.'media_1794737906664_0f47ed50.jpg');
$gw = imagesx($srcGazebo);
$gh = imagesy($srcGazebo);

$dstGazebo = imagecreatetruecolor($gw, $gh);
imagealphablending($dstGazebo, false);
imagesavealpha($dstGazebo, true);
$trans = imagecolorallocatealpha($dstGazebo, 0, 0, 0, 127);
imagefilledrectangle($dstGazebo, 0, 0, $gw, $gh, $trans);

for ($y = 0; $y < $gh; $y++) {
    for ($x = 0; $x < $gw; $x++) {
        $rgb = imagecolorat($srcGazebo, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        $brightness = ($r * 0.299 + $g * 0.587 + $b * 0.114);

        if ($brightness < 18) {
            imagesetpixel($dstGazebo, $x, $y, $trans);
        } else {
            $alpha = 127 - (int) min(127, ($brightness / 255) * 127);
            // Warm rich brown sepia ink: #523725
            $col = imagecolorallocatealpha($dstGazebo, 82, 55, 37, $alpha);
            imagesetpixel($dstGazebo, $x, $y, $col);
        }
    }
}
imagepng($dstGazebo, $targetDir.'gazebo.png');
imagedestroy($srcGazebo);
imagedestroy($dstGazebo);
echo "1. Processed gazebo.png\n";

// 2. Process Tree (f32a79d9.jpg) -> tree.png
$srcTree = imagecreatefromjpeg($sourceDir.'media_1794737906664_f32a79d9.jpg');
$tw = imagesx($srcTree);
$th = imagesy($srcTree);

$dstTree = imagecreatetruecolor($tw, $th);
imagealphablending($dstTree, false);
imagesavealpha($dstTree, true);
imagefilledrectangle($dstTree, 0, 0, $tw, $th, $trans);

for ($y = 0; $y < $th; $y++) {
    for ($x = 0; $x < $tw; $x++) {
        $rgb = imagecolorat($srcTree, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        $brightness = ($r * 0.299 + $g * 0.587 + $b * 0.114);

        if ($brightness < 18) {
            imagesetpixel($dstTree, $x, $y, $trans);
        } else {
            $alpha = 127 - (int) min(127, ($brightness / 255) * 127);
            // Warm rich brown sepia ink: #523725
            $col = imagecolorallocatealpha($dstTree, 82, 55, 37, $alpha);
            imagesetpixel($dstTree, $x, $y, $col);
        }
    }
}
imagepng($dstTree, $targetDir.'tree.png');
imagedestroy($srcTree);
imagedestroy($dstTree);
echo "2. Processed tree.png\n";

// 3. Copy Garland (611950b6.png) -> garland.png
copy($sourceDir.'media_1794737906659_611950b6.png', $targetDir.'garland.png');
echo "3. Copied garland.png\n";

// 4. Crop a delicate butterfly from garland.png -> butterfly.png
$srcGarland = imagecreatefrompng($targetDir.'garland.png');
$dstButterfly = imagecreatetruecolor(120, 100);
imagealphablending($dstButterfly, false);
imagesavealpha($dstButterfly, true);
$tB = imagecolorallocatealpha($dstButterfly, 0, 0, 0, 127);
imagefilledrectangle($dstButterfly, 0, 0, 120, 100, $tB);
// Butterfly 1 is around x=305..395, y=50..145 in garland
imagecopyresampled($dstButterfly, $srcGarland, 0, 0, 310, 50, 120, 100, 100, 85);
imagepng($dstButterfly, $targetDir.'butterfly.png');
imagedestroy($srcGarland);
imagedestroy($dstButterfly);
echo "4. Created butterfly.png\n";

echo "Assets creation complete!\n";
