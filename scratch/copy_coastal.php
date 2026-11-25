<?php

$src = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795570149520_5affb4d8.jpg';
$dst = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/bg-coastal-road.jpg';
if (copy($src, $dst)) {
    echo 'Copied successfully! New size: '.filesize($dst)." bytes\n";
} else {
    echo "Failed to copy\n";
}
