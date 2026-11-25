<?php

// Let's create small thumbnail pngs of both dd and aff
$f_dd = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570119947_dd68d8a8.jpg';
$f_aff = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570149520_5affb4d8.jpg';

$im_dd = imagecreatefromjpeg($f_dd);
$im_aff = imagecreatefromjpeg($f_aff);

echo 'dd: '.imagesx($im_dd).'x'.imagesy($im_dd)."\n";
echo 'aff: '.imagesx($im_aff).'x'.imagesy($im_aff)."\n";

// Let's check what is in dd: dd is a screenshot sent by user showing what was wrong!
// In dd (media_1795570119947_dd68d8a8.jpg): what did it show?
