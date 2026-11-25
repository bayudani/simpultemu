<?php

$f = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795576126965_ffefd06d.png';
$im = imagecreatefrompng($f);
$w = imagesx($im);
$h = imagesy($im);

// In media_1795576126965_ffefd06d.png:
// Car bumper is at x=163, and groom is at x=160..219.
// So the car bumper is right at the groom's foot / coat!
// That is the 44% width version!
echo "Bumper at x=163, Groom starts at x=160\n";
