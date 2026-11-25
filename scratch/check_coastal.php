<?php

// Let's inspect media_1795570119947_dd68d8a8.jpg and media_1795570149520_5affb4d8.jpg
$dd = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570119947_dd68d8a8.jpg';
$aff = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570149520_5affb4d8.jpg';

echo 'dd: '.filesize($dd)." bytes\n";
echo 'aff: '.filesize($aff)." bytes\n";

// Let's check what $t11BgCoastalRoad is currently set to in show.blade.php
$coastal = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-coastal-road.jpg';
echo 'bg-coastal-road: '.filesize($coastal)." bytes\n";
echo 'md5 aff: '.md5_file($aff)."\n";
echo 'md5 coastal: '.md5_file($coastal)."\n";
