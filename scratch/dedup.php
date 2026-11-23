<?php

$filePath = __DIR__.'/../resources/views/invitations/show.blade.php';
$c = file_get_contents($filePath);

// Deduplicate helper: keeps only the first occurrence of a block
function keepFirst($content, $startMarker, $endMarker)
{
    $firstPos = strpos($content, $startMarker);
    if ($firstPos === false) {
        return $content;
    }

    // Look for a second occurrence
    $secondPos = strpos($content, $startMarker, $firstPos + strlen($startMarker));
    if ($secondPos === false) {
        return $content;
    }

    // Find where the second block ends
    $endPos = strpos($content, $endMarker, $secondPos);
    if ($endPos === false) {
        return $content;
    }

    // Cut out the second block
    echo 'Deduplicating: '.$startMarker."\n";

    return substr($content, 0, $secondPos).substr($content, $endPos);
}

// 1. Sidebar: starts with @if($currentThemeId == 12 || $isChampagneBloom)\n    <!-- Desktop Fixed Sidebar for Theme 12
$c = keepFirst($c, '@if($currentThemeId == 12 || $isChampagneBloom)', '@if($currentThemeId == 14 || $isNightSky)');

// 2. Hero: starts with @elseif($currentThemeId == 12 || $isChampagneBloom)\n            <!-- ================= THEME 12: BESPOKE HERO SECTION
$c = keepFirst($c, '<!-- ================= THEME 12: BESPOKE HERO SECTION', '@else');

// 3. Kutipan:
$c = keepFirst($c, '<!-- ================= THEME 12 BESPOKE KUTIPAN SUCI', '@else');

// 4. Acara:
$c = keepFirst($c, '<!-- ================= THEME 12 BESPOKE RANGKAIAN ACARA', '@elseif($currentThemeId == 7 || $isLilacBlooms)');

// 5. Love Story:
$c = keepFirst($c, '<!-- ================= THEME 12 BESPOKE LOVE STORY', '@elseif($currentThemeId == 7 || $isLilacBlooms)');

// 6. Galeri:
$c = keepFirst($c, '<!-- ================= THEME 12 BESPOKE GALERI FOTO', '@else');

// 7. Hadiah:
$c = keepFirst($c, '<!-- ================= THEME 12 BESPOKE TITIP HADIAH', '@elseif($currentThemeId == 7 || $isLilacBlooms)');

// 8. Penutup:
$c = keepFirst($c, '<!-- ================= THEME 12 BESPOKE CLOSING & TERIMA KASIH', '@elseif($currentThemeId == 19 || $isLavenderMist)');

file_put_contents($filePath, $c);
echo "Deduplication finished.\n";
