<?php

$src = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/melayu-pixelated/ref-gameplay-hud.jpg';
$dst1 = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/premium-melayu-pixelated.jpg';
$dst2 = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/premium-serenade-dark-elegance.jpg';

copy($src, $dst1);
copy($src, $dst2);

echo "Preview image created successfully!\n";
