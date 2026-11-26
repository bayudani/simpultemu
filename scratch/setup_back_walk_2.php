<?php

$maleDst = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/melayu-pixelated/characters/male/back_walk_2.png';
$femaleDst = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/melayu-pixelated/characters/female/back_walk_2.png';

copy('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795606695506_3a94bf3b.png', $maleDst);
copy('C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795606695514_a70afeee.png', $femaleDst);

echo 'Male back_walk_2: '.filesize($maleDst)." bytes\n";
echo 'Female back_walk_2: '.filesize($femaleDst)." bytes\n";
