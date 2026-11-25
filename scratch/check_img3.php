<?php

$f3 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795571766238_36bccb95.png';
$info = getimagesize($f3);
echo "Image 3 size: {$info[0]}x{$info[1]} mime={$info['mime']}\n";
