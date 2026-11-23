<?php

$frame = imagecreatefrompng(__DIR__.'/../public/images/themes/champagne-bloom/frame-circle.png');
$fw = imagesx($frame);
$fh = imagesy($frame);

// Circle center from our fit was (450.9, 466.0), radius = 384
// Let's test varying center (cx, cy) and diameter d
$bestSpill = 999999;
$bestParams = [];

// The inner radius of the gold ring:
// In frame-circle.png, the gold ring has some thickness.
// Let's find the inner hole boundary!
for ($sizePct = 71; $sizePct <= 75; $sizePct += 0.5) {
    for ($topPct = 8.0; $topPct <= 10.0; $topPct += 0.5) {
        for ($leftPct = 6.5; $leftPct <= 8.5; $leftPct += 0.5) {
            $pw = intval($fw * ($sizePct / 100));
            $ph = intval($fh * ($sizePct / 100));
            $px = intval($fw * ($leftPct / 100));
            $py = intval($fh * ($topPct / 100));
            $cx = $px + $pw / 2;
            $cy = $py + $ph / 2;
            $r = $pw / 2;

            // Check if any point on this circle is outside the inner hole (i.e. where frame is NOT transparent or beyond frame)
            // Or where distance from circle center (451, 466) is > 375
            $spill = 0;
            // Sample perimeter of circle
            for ($deg = 0; $deg < 360; $deg += 2) {
                $x = intval($cx + $r * cos(deg2rad($deg)));
                $y = intval($cy + $r * sin(deg2rad($deg)));
                if ($x < 0 || $x >= $fw || $y < 0 || $y >= $fh) {
                    $spill += 10;

                    continue;
                }
                // Check if this pixel is in an area where the frame is completely transparent
                // In frame-circle.png, the gold ring is opaque (alpha < 50).
                // If the circle perimeter extends BEYOND the gold ring to the outer transparent area, that's a spill!
                $dist = sqrt(pow($x - 451, 2) + pow($y - 466, 2));
                if ($dist > 376) {
                    $spill += ($dist - 376);
                }
            }

            if ($spill < $bestSpill) {
                $bestSpill = $spill;
                $bestParams = [$sizePct, $topPct, $leftPct, $cx, $cy, $r];
            }
        }
    }
}

echo "Best Params: size={$bestParams[0]}%, top={$bestParams[1]}%, left={$bestParams[2]}%\n";
echo "Center: ({$bestParams[3]}, {$bestParams[4]}), Radius: {$bestParams[5]}, Spill: $bestSpill\n";
