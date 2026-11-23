<?php

$im = imagecreatefrompng(__DIR__.'/../public/images/themes/champagne-bloom/frame-circle.png');
$w = imagesx($im);
$h = imagesy($im);

// Let's sample the circular gold boundary:
// Top point of circle (around x=450-500)
// Left point of circle (around y=450-500)
// Let's test candidate centers (cx, cy) and radius r to see what fits the circular gold ring!

// First let's find the circle top: scanning down from y=0 at x=450
for ($y = 0; $y < 500; $y++) {
    $alpha = (imagecolorat($im, 450, $y) >> 24) & 0x7F;
    if ($alpha < 60) {
        echo "At x=450, outer ring starts at y=$y\n";
        break;
    }
}
// Find where it ends (inner hole starts)
for ($y = $y; $y < 500; $y++) {
    $alpha = (imagecolorat($im, 450, $y) >> 24) & 0x7F;
    if ($alpha > 100) {
        echo "At x=450, inner hole starts at y=$y\n";
        break;
    }
}

// Find circle left at y=450:
for ($x = 0; $x < 500; $x++) {
    $alpha = (imagecolorat($im, $x, 450) >> 24) & 0x7F;
    if ($alpha < 60) {
        echo "At y=450, outer ring starts at x=$x\n";
        break;
    }
}
for ($x = $x; $x < 500; $x++) {
    $alpha = (imagecolorat($im, $x, 450) >> 24) & 0x7F;
    if ($alpha > 100) {
        echo "At y=450, inner hole starts at x=$x\n";
        break;
    }
}

// Let's find 3 points on the inner circle boundary:
// (x, y) where alpha changes from <60 to >100
$points = [];
// Scan along angles from theta = 120 deg to 240 deg (the upper and left side where there are no flowers!)
// Guess center around (450, 450)
$guessCx = 450;
$guessCy = 450;
for ($angle = 100; $angle <= 260; $angle += 20) {
    $rad = deg2rad($angle);
    $cos = cos($rad);
    $sin = sin($rad);
    // Scan from inside ($r = 200) to outside ($r = 450)
    for ($r = 200; $r <= 450; $r++) {
        $px = intval($guessCx + $r * $cos);
        $py = intval($guessCy + $r * $sin);
        $alpha = (imagecolorat($im, $px, $py) >> 24) & 0x7F;
        if ($alpha < 80) { // hit the inner gold ring boundary
            $points[] = [$px, $py];
            break;
        }
    }
}

echo 'Found '.count($points)." circle boundary points:\n";
foreach ($points as $p) {
    echo "Point: ({$p[0]}, {$p[1]})\n";
}

// Fit circle: (x - a)^2 + (y - b)^2 = r^2
// Using linear least squares: x^2 + y^2 = 2*a*x + 2*b*y + (r^2 - a^2 - b^2)
// let c = r^2 - a^2 - b^2
// [2x 2y 1] [a; b; c] = [x^2 + y^2]
$n = count($points);
$sumX = 0;
$sumY = 0;
$sumX2 = 0;
$sumY2 = 0;
$sumXY = 0;
$sumX3 = 0;
$sumY3 = 0;
$sumX1Y2 = 0;
$sumX2Y1 = 0;
foreach ($points as $p) {
    $x = $p[0];
    $y = $p[1];
    $sumX += $x;
    $sumY += $y;
    $sumX2 += $x * $x;
    $sumY2 += $y * $y;
    $sumXY += $x * $y;
    $sumX3 += $x * $x * $x;
    $sumY3 += $y * $y * $y;
    $sumX1Y2 += $x * $y * $y;
    $sumX2Y1 += $x * $x * $y;
}
$C = $n * $sumX2 - $sumX * $sumX;
$D = $n * $sumXY - $sumX * $sumY;
$E = $n * $sumX3 + $n * $sumX1Y2 - ($sumX2 + $sumY2) * $sumX;
$G = $n * $sumY2 - $sumY * $sumY;
$H = $n * $sumX2Y1 + $n * $sumY3 - ($sumX2 + $sumY2) * $sumY;

$a = ($G * $E - $D * $H) / (2 * ($C * $G - $D * $D));
$b = ($C * $H - $D * $E) / (2 * ($C * $G - $D * $D));
$r2 = 0;
foreach ($points as $p) {
    $r2 += pow($p[0] - $a, 2) + pow($p[1] - $b, 2);
}
$r = sqrt($r2 / $n);

echo "\n--- FIT CIRCLE ---\n";
echo "Circle Center: ($a, $b)\n";
echo "Circle Radius: $r\n";
echo 'Circle Diameter: '.($r * 2)."\n";
echo 'Left edge: '.($a - $r).' ('.round(($a - $r) / $w * 100, 2)."%)\n";
echo 'Top edge: '.($b - $r).' ('.round(($b - $r) / $h * 100, 2)."%)\n";
echo 'Diameter percentage: '.round(($r * 2) / $w * 100, 2)."%\n";
