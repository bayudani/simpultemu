<?php

$bgPath = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794721054818_7371e535.jpg';
$size = getimagesize($bgPath);
echo 'Image 11 (new background uploaded): '.$size[0].'x'.$size[1].' (filesize: '.filesize($bgPath).')'.PHP_EOL;
