<?php

// Let's sample colors or save a test thumbnail to inspect
$im1 = imagecreatefromjpeg('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570073568_12fec939.jpg');
// Let's check size
$w = imagesx($im1);
$h = imagesy($im1);
echo "w=$w, h=$h\n";

$imRef = imagecreatefrompng('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570003075_96304698.png');
echo 'ref w='.imagesx($imRef).', h='.imagesy($imRef)."\n";
