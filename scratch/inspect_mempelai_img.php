<?php

// Let's inspect media_1794720855562_5397eb54.jpg
$im = imagecreatefromjpeg('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794720855562_5397eb54.jpg');
$w = imagesx($im);
$h = imagesy($im);
echo "5397eb54.jpg size: {$w}x{$h}\n";

// Sample center cross and search for images or text
// Let's find top circle and bottom circle
