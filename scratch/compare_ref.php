<?php

$fRef = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570003075_96304698.png';
$fSunset = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-pendopo-sunset.jpg';

$ref = imagecreatefrompng($fRef);
$sun = imagecreatefromjpeg($fSunset);

echo 'Ref size: '.imagesx($ref).'x'.imagesy($ref)."\n";
echo 'Sunset size: '.imagesx($sun).'x'.imagesy($sun)."\n";
