<?php

$sourceDir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$targetDir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/wanted-poster/';

// 1. Mempelai photos
$m = imagecreatefromjpeg($sourceDir.'media_1794728114762_a0b97e3d.jpg');
$mw = imagesx($m);
$mh = imagesy($m);
echo "Mempelai image size: {$mw}x{$mh}\n";

// Bride is on left: let's crop inside the inner frame
// Groom is on right: let's crop inside the inner frame

// 2. Cover photo from desktop_ref
$d = imagecreatefromjpeg($sourceDir.'media_1794728114762_8fc0ae8b.jpg');
$dw = imagesx($d);
$dh = imagesy($d);
echo "Desktop image size: {$dw}x{$dh}\n";

// 3. Gallery photos from gallery_ref
$g = imagecreatefromjpeg($sourceDir.'media_1794728114762_d7ee0ea8.jpg');
$gw = imagesx($g);
$gh = imagesy($g);
echo "Gallery image size: {$gw}x{$gh}\n";

// 4. Story photos from lovestory_ref
$s = imagecreatefromjpeg($sourceDir.'media_1794728114762_f5716d25.jpg');
$sw = imagesx($s);
$sh = imagesy($s);
echo "Story image size: {$sw}x{$sh}\n";
