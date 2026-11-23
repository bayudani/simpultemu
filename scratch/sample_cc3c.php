<?php

$p = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1794714064552_cc3c3991.png';
if (file_exists($p)) {
    $info = getimagesize($p);
    echo "media_1794714064552_cc3c3991.png: {$info[0]}x{$info[1]}\n";
}
