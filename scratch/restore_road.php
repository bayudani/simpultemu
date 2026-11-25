<?php

$f4d22 = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795562614470_4d2215a2.jpg';
$dst = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-coastal-road.jpg';

if (copy($f4d22, $dst)) {
    echo 'Restored bg-coastal-road.jpg from 4d2215a2! Size: '.filesize($dst)." bytes\n";
} else {
    echo "Failed to restore\n";
}
