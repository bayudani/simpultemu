<?php

$c = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/couple-pendopo.png';
$u = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795571723078_e336f065.jpg';

echo 'couple-pendopo: '.(file_exists($c) ? filesize($c) : 'no')."\n";
echo 'uploaded couple: '.(file_exists($u) ? filesize($u) : 'no')."\n";

$infoU = getimagesize($u);
echo "uploaded couple size: {$infoU[0]}x{$infoU[1]} mime={$infoU['mime']}\n";

if (file_exists($c)) {
    $infoC = getimagesize($c);
    echo "couple-pendopo.png size: {$infoC[0]}x{$infoC[1]} mime={$infoC['mime']}\n";
}
