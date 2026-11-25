<?php

$f1 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570073568_12fec939.jpg';
$f2 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795562614524_4f7f7b9d.jpg';
echo 'md5 f1: '.md5_file($f1)."\n";
echo 'md5 f2: '.md5_file($f2)."\n";

// Let's check if couple-pendopo.png was cut out from f1!
$couple = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/couple-pendopo.png';
echo 'couple exists: '.(file_exists($couple) ? 'yes' : 'no')."\n";
