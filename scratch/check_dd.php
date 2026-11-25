<?php

// Let's inspect media_1795570119947_dd68d8a8.jpg
$im = imagecreatefromjpeg('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570119947_dd68d8a8.jpg');
// Let's save a thumb to scratch
imagejpeg($im, 'c:/Users/USER/Herd/simpultemu_kami/scratch/dd_thumb.jpg', 80);
echo "Saved dd_thumb.jpg\n";
