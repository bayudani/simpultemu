<?php

// Let's create flipped corner florals so we have all 4 corners ready
function flipImage($srcPath, $dstPath, $mode)
{
    $img = imagecreatefrompng($srcPath);
    imageflip($img, $mode);
    imagesavealpha($img, true);
    imagepng($img, $dstPath, 8);
    imagedestroy($img);
}

flipImage('public/images/themes/fairytale-castle/floral-corner-tr.png', 'public/images/themes/fairytale-castle/floral-corner-bl.png', IMG_FLIP_BOTH);
flipImage('public/images/themes/fairytale-castle/floral-corner-tl.png', 'public/images/themes/fairytale-castle/floral-corner-br.png', IMG_FLIP_BOTH);

echo "Created bl and br corner florals\n";
