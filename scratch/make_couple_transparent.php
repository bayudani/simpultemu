<?php

ini_set('memory_limit', '512M');

$srcPath = 'C:/Users/USER/.gemini/antigravity/brain/e10c6ab3-a508-483a-aa95-ed6d0f544d35/.user_uploaded/media_1795571723078_e336f065.jpg';
$dstPath = 'c:/Users/USER/Herd/simpultemu_kami/public/images/themes/nostalgic-village/couple-pendopo.png';

$src = imagecreatefromjpeg($srcPath);
$w = imagesx($src);
$h = imagesy($src);

// Create transparent truecolor image
$dst = imagecreatetruecolor($w, $h);
imagealphablending($dst, false);
imagesavealpha($dst, true);

// Visited string/byte array: 0 = unvisited, 1 = background
$mask = str_repeat("\0", $w * $h);

// SplQueue for BFS flood fill
$queue = new SplQueue;

// Seed all border pixels
for ($x = 0; $x < $w; $x++) {
    $queue->enqueue($x); // y=0
    $queue->enqueue(($h - 1) * $w + $x); // y=h-1
}
for ($y = 0; $y < $h; $y++) {
    $queue->enqueue($y * $w); // x=0
    $queue->enqueue($y * $w + ($w - 1)); // x=w-1
}

$threshold = 28; // Max RGB component for black background

while (! $queue->isEmpty()) {
    $idx = $queue->dequeue();
    if ($mask[$idx] !== "\0") {
        continue;
    }

    $x = $idx % $w;
    $y = (int) ($idx / $w);

    $rgb = imagecolorat($src, $x, $y);
    $r = ($rgb >> 16) & 0xFF;
    $g = ($rgb >> 8) & 0xFF;
    $b = $rgb & 0xFF;

    $brightness = max($r, max($g, $b));
    if ($brightness <= $threshold) {
        $mask[$idx] = "\1"; // Mark as background

        if ($x > 0 && $mask[$idx - 1] === "\0") {
            $queue->enqueue($idx - 1);
        }
        if ($x < $w - 1 && $mask[$idx + 1] === "\0") {
            $queue->enqueue($idx + 1);
        }
        if ($y > 0 && $mask[$idx - $w] === "\0") {
            $queue->enqueue($idx - $w);
        }
        if ($y < $h - 1 && $mask[$idx + $w] === "\0") {
            $queue->enqueue($idx + $w);
        }
    }
}

echo "Flood fill completed.\n";

// Copy pixels with smooth alpha
for ($y = 0; $y < $h; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $idx = $y * $w + $x;
        if ($mask[$idx] === "\1") {
            // Transparent
            $color = imagecolorallocatealpha($dst, 0, 0, 0, 127);
            imagesetpixel($dst, $x, $y, $color);
        } else {
            $rgb = imagecolorat($src, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;

            // Check if adjacent to background for edge smoothing
            $isEdge = false;
            if ($x > 0 && $mask[$idx - 1] === "\1") {
                $isEdge = true;
            } elseif ($x < $w - 1 && $mask[$idx + 1] === "\1") {
                $isEdge = true;
            } elseif ($y > 0 && $mask[$idx - $w] === "\1") {
                $isEdge = true;
            } elseif ($y < $h - 1 && $mask[$idx + $w] === "\1") {
                $isEdge = true;
            }

            $maxC = max($r, max($g, $b));
            if ($isEdge && $maxC < 55) {
                $alphaVal = (int) (127 - ($maxC / 55.0) * 127);
                $alphaVal = max(0, min(127, $alphaVal));
                $color = imagecolorallocatealpha($dst, $r, $g, $b, $alphaVal);
            } else {
                $color = imagecolorallocatealpha($dst, $r, $g, $b, 0);
            }
            imagesetpixel($dst, $x, $y, $color);
        }
    }
}

imagepng($dst, $dstPath, 9);
echo "Saved transparent PNG to $dstPath (".filesize($dstPath)." bytes)\n";
