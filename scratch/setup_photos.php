<?php

$targetDir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/whispering-garden/';
$monoDir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/monochrome/';
$champDir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/champagne-bloom/';
$pubDir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/';

copy($champDir.'couple-portrait.jpg', $targetDir.'cover.jpg');
copy($champDir.'bride.jpg', $targetDir.'bride.jpg');
copy($champDir.'groom.jpg', $targetDir.'groom.jpg');

copy($monoDir.'slide-1.jpg', $targetDir.'gallery-1.jpg');
copy($monoDir.'slide-2.jpg', $targetDir.'gallery-2.jpg');
copy($monoDir.'slide-3.jpg', $targetDir.'gallery-3.jpg');
copy($monoDir.'slide-4.jpg', $targetDir.'gallery-4.jpg');
copy($monoDir.'slide-5.jpg', $targetDir.'gallery-5.jpg');
copy($champDir.'demo-cover.jpg', $targetDir.'gallery-6.jpg');

copy($champDir.'story-1.jpg', $targetDir.'story-1.jpg');
copy($champDir.'story-2.jpg', $targetDir.'story-2.jpg');

echo "Demo photos ready in $targetDir\n";

// Generate preview card: basic-whispering-garden.jpg
$cardW = 600;
$cardH = 800;
$card = imagecreatetruecolor($cardW, $cardH);
// Background: #F4EFEA
$bg = imagecolorallocate($card, 244, 239, 234);
imagefilledrectangle($card, 0, 0, $cardW, $cardH, $bg);

// Add Gazebo illustration in center
$gazebo = imagecreatefrompng($targetDir.'gazebo.png');
$gw = imagesx($gazebo);
$gh = imagesy($gazebo);
$targetGw = 260;
$targetGh = (int) ($gh * ($targetGw / $gw));
imagecopyresampled($card, $gazebo, ($cardW - $targetGw) / 2, 140, 0, 0, $targetGw, $targetGh, $gw, $gh);
imagedestroy($gazebo);

// Add Garland at top
$garland = imagecreatefrompng($targetDir.'garland.png');
$garW = imagesx($garland);
$garH = imagesy($garland);
$targetGarW = 340;
$targetGarH = (int) ($garH * ($targetGarW / $garW));
imagecopyresampled($card, $garland, ($cardW - $targetGarW) / 2, 40, 0, 0, $targetGarW, $targetGarH, $garW, $garH);
imagedestroy($garland);

imagejpeg($card, 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/basic-whispering-garden.jpg', 90);
imagedestroy($card);
echo "Preview card basic-whispering-garden.jpg created!\n";
