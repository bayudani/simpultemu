<?php

$fOld = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795562614470_4d2215a2.jpg';
$fNew = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570149520_5affb4d8.jpg';

echo 'Old size: '.filesize($fOld)." bytes\n";
echo 'New size: '.filesize($fNew)." bytes\n";

$oldInfo = getimagesize($fOld);
$newInfo = getimagesize($fNew);

echo "Old dimensions: {$oldInfo[0]}x{$oldInfo[1]}\n";
echo "New dimensions: {$newInfo[0]}x{$newInfo[1]}\n";
