<?php

// Let's inspect the car in car_sim_50, 54, 58
foreach ([50, 54, 58] as $w) {
    $im = imagecreatefrompng("c:/Users/USER/Herd/simpultemu_kami/scratch/car_sim_{$w}.png");
    $imgW = imagesx($im);
    $imgH = imagesy($im);

    // Check groom height:
    // Groom feet y is around imgH - (imgH * 0.035) = 1024 - 36 = 988
    // Groom head y is around 988 - (imgW * 0.18 * 1.5) = 988 - 224 = 764
    // Groom height = 224px

    // Car height = imgW * (w/100) * 0.5:
    $carH = (int) ($imgW * ($w / 100) * 0.5);
    $carRoofH = (int) ($carH * 0.72); // roof without luggage is ~72% of total car image
    $carHoodH = (int) ($carH * 0.42); // hood height is ~42% of total car image

    echo "=== width: {$w}% ===\n";
    echo "  Total car height (with luggage): {$carH}px (".round(($carH / 224) * 100)."% of groom height)\n";
    echo "  Car metal roof height: {$carRoofH}px (".round(($carRoofH / 224) * 100)."% of groom height)\n";
    echo "  Car hood height: {$carHoodH}px (".round(($carHoodH / 224) * 100)."% of groom height)\n";
}
