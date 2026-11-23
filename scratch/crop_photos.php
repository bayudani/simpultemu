<?php

$sourceDir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$targetDir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/wanted-poster/';

// Let's inspect Mempelai:
// In 534x436:
// Bride square is roughly x: 70..195, y: 105..230
// Groom square is roughly x: 335..460, y: 105..230
$m = imagecreatefromjpeg($sourceDir.'media_1794728114762_a0b97e3d.jpg');

// Let's crop Bride:
$bride = imagecrop($m, ['x' => 70, 'y' => 110, 'width' => 125, 'height' => 125]);
if ($bride) {
    imagejpeg($bride, $targetDir.'bride.jpg', 95);
}

// Let's crop Groom:
$groom = imagecrop($m, ['x' => 335, 'y' => 110, 'width' => 125, 'height' => 125]);
if ($groom) {
    imagejpeg($groom, $targetDir.'groom.jpg', 95);
}

// Cover photo from desktop_ref (1024x518):
// Couple frame is around x: 705..978, y: 110..348
$d = imagecreatefromjpeg($sourceDir.'media_1794728114762_8fc0ae8b.jpg');
$cover = imagecrop($d, ['x' => 705, 'y' => 112, 'width' => 273, 'height' => 236]);
if ($cover) {
    imagejpeg($cover, $targetDir.'cover.jpg', 95);
}

// Story 1 and 2 from lovestory_ref (539x606):
$s = imagecreatefromjpeg($sourceDir.'media_1794728114762_f5716d25.jpg');
// Story 1 photo (left): around x: 53..216, y: 172..320
$story1 = imagecrop($s, ['x' => 53, 'y' => 172, 'width' => 163, 'height' => 148]);
if ($story1) {
    imagejpeg($story1, $targetDir.'story-1.jpg', 95);
}

// Story 2 photo (right): around x: 326..489, y: 395..543
$story2 = imagecrop($s, ['x' => 326, 'y' => 395, 'width' => 163, 'height' => 148]);
if ($story2) {
    imagejpeg($story2, $targetDir.'story-2.jpg', 95);
}

// Gallery photos from gallery_ref (528x546):
// Row 1 (y: ~180..315):
// Col 1: x ~ 46..180
// Col 2: x ~ 199..333
// Col 3: x ~ 352..486
// Row 2 (y: ~333..468):
// Col 1: x ~ 122..256
// Col 2: x ~ 276..410
$g = imagecreatefromjpeg($sourceDir.'media_1794728114762_d7ee0ea8.jpg');
$g1 = imagecrop($g, ['x' => 46, 'y' => 180, 'width' => 134, 'height' => 134]);
$g2 = imagecrop($g, ['x' => 199, 'y' => 180, 'width' => 134, 'height' => 134]);
$g3 = imagecrop($g, ['x' => 352, 'y' => 180, 'width' => 134, 'height' => 134]);
$g4 = imagecrop($g, ['x' => 122, 'y' => 333, 'width' => 134, 'height' => 134]);
$g5 = imagecrop($g, ['x' => 276, 'y' => 333, 'width' => 134, 'height' => 134]);

if ($g1) {
    imagejpeg($g1, $targetDir.'gallery-1.jpg', 95);
}
if ($g2) {
    imagejpeg($g2, $targetDir.'gallery-2.jpg', 95);
}
if ($g3) {
    imagejpeg($g3, $targetDir.'gallery-3.jpg', 95);
}
if ($g4) {
    imagejpeg($g4, $targetDir.'gallery-4.jpg', 95);
}
if ($g5) {
    imagejpeg($g5, $targetDir.'gallery-5.jpg', 95);
}

echo "Cropped all demo photos successfully!\n";
