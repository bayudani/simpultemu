<?php

$sourceDir = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/';
$targetDir = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/wanted-poster/';

if (! is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// 1. Copy bg-parchment.jpg
copy($sourceDir.'media_1794728115147_81c6a538.jpg', $targetDir.'bg-parchment.jpg');
echo "1. Saved bg-parchment.jpg\n";

// 2. Process torn-paper.png
$srcTorn = imagecreatefromjpeg($sourceDir.'media_1794728115210_ff2fc181.jpg');
$w = imagesx($srcTorn);
$h = imagesy($srcTorn);

$dstTorn = imagecreatetruecolor($w, $h);
imagealphablending($dstTorn, false);
imagesavealpha($dstTorn, true);
$transparent = imagecolorallocatealpha($dstTorn, 0, 0, 0, 127);
imagefilledrectangle($dstTorn, 0, 0, $w, $h, $transparent);

for ($y = 0; $y < $h; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $rgb = imagecolorat($srcTorn, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        // Checkerboard is grey/white neutral: R, G, B are very close together
        $diffRG = abs($r - $g);
        $diffRB = abs($r - $b);
        $diffGB = abs($g - $b);
        $maxDiff = max($diffRG, $diffRB, $diffGB);

        // Paper has warm hue: R > G > B, and $r - $b > 30
        if ($maxDiff < 18 && $r > 150) {
            // Checkerboard pixel -> transparent
            imagesetpixel($dstTorn, $x, $y, $transparent);
        } else {
            // Paper pixel
            $col = imagecolorallocatealpha($dstTorn, $r, $g, $b, 0);
            imagesetpixel($dstTorn, $x, $y, $col);
        }
    }
}
imagepng($dstTorn, $targetDir.'torn-paper.png');
echo "2. Saved torn-paper.png\n";

// 3. Process angel-ornament.png
$srcAngel = imagecreatefromjpeg($sourceDir.'media_1794728115172_6b3e59d2.jpg');
$aw = imagesx($srcAngel);
$ah = imagesy($srcAngel);

$dstAngel = imagecreatetruecolor($aw, $ah);
imagealphablending($dstAngel, false);
imagesavealpha($dstAngel, true);
$transAngel = imagecolorallocatealpha($dstAngel, 0, 0, 0, 127);
imagefilledrectangle($dstAngel, 0, 0, $aw, $ah, $transAngel);

for ($y = 0; $y < $ah; $y++) {
    for ($x = 0; $x < $aw; $x++) {
        $rgb = imagecolorat($srcAngel, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        $brightness = ($r * 0.299 + $g * 0.587 + $b * 0.114);

        if ($brightness < 20) {
            imagesetpixel($dstAngel, $x, $y, $transAngel);
        } else {
            // Map brightness to alpha (0 = opaque, 127 = transparent)
            // Bright pixels in original become opaque dark sepia ink
            $alpha = 127 - (int) min(127, ($brightness / 255) * 127);
            // Vintage dark charcoal-sepia ink: #2D1E12
            $inkCol = imagecolorallocatealpha($dstAngel, 45, 30, 18, $alpha);
            imagesetpixel($dstAngel, $x, $y, $inkCol);
        }
    }
}
imagepng($dstAngel, $targetDir.'angel-ornament.png');
echo "3. Saved angel-ornament.png\n";

// 4. Create stamp-wanted.svg
$svgContent = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 120" width="320" height="120">
    <defs>
        <filter id="grunge" x="-10%" y="-10%" width="120%" height="120%">
            <feTurbulence type="fractalNoise" baseFrequency="0.08" numOctaves="4" result="noise" />
            <feDisplacementMap in="SourceGraphic" in2="noise" scale="3" xChannelSelector="R" yChannelSelector="G" />
        </filter>
    </defs>
    <g filter="url(#grunge)" transform="rotate(-6 160 60)">
        <!-- Outer Border -->
        <rect x="10" y="10" width="300" height="100" rx="6" fill="none" stroke="#B91C1C" stroke-width="6" stroke-dasharray="140,2,80,3,90" />
        <!-- Inner Border -->
        <rect x="20" y="20" width="280" height="80" rx="3" fill="none" stroke="#B91C1C" stroke-width="2.5" opacity="0.85" />
        <!-- WANTED Text -->
        <text x="160" y="78" font-family="'Impact', 'Arial Black', sans-serif" font-size="56" font-weight="900" fill="#B91C1C" text-anchor="middle" letter-spacing="6">WANTED</text>
    </g>
</svg>
SVG;
file_put_contents($targetDir.'stamp-wanted.svg', $svgContent);
echo "4. Saved stamp-wanted.svg\n";
