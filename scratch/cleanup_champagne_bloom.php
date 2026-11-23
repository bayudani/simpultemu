<?php

$filePath = __DIR__.'/../resources/views/invitations/show.blade.php';
$content = file_get_contents($filePath);

// Read the exact definition of $t12Cover from apply_champagne_bloom_theme.php
require_once __DIR__.'/apply_champagne_bloom_theme.php';

// Re-read file
$content = file_get_contents($filePath);

// 1. Remove all instances of $t12Cover
$content = str_replace($t12Cover, '', $content);

// 2. Insert $t12Cover ONCE into the Cover Overlay section
$uniqueCoverTarget = "@elseif(\$currentThemeId == 7 || \$isLilacBlooms)\n        <!-- ================= THEME 7 BESPOKE COVER (BASIC LILAC BLOOMS DUAL PANE) ================= -->";
if (strpos($content, $uniqueCoverTarget) !== false) {
    $content = str_replace($uniqueCoverTarget, $t12Cover.$uniqueCoverTarget, $content);
    echo "Cover overlay correctly inserted once.\n";
} else {
    echo "Cover overlay target NOT found!\n";
}

// 3. Remove all instances of $t12Mempelai
$content = str_replace($t12Mempelai, '', $content);

// 4. Insert $t12Mempelai ONCE into section-mempelai
// Let's find the exact unique target for section-mempelai
$uniqueMempelaiTarget = "@else\n            <div class=\"theme-arch-frame bg-white p-6 sm:p-10 md:p-14 shadow-lg w-full mx-auto relative reveal-item anim-border\">\n                \n                @if(\$currentThemeId == 1)\n                <!-- Corner Botanical Sprigs for Theme 1 Profil Mempelai -->";
if (strpos($content, $uniqueMempelaiTarget) !== false) {
    $content = str_replace($uniqueMempelaiTarget, $t12Mempelai.$uniqueMempelaiTarget, $content);
    echo "Mempelai correctly inserted once.\n";
} else {
    echo "Mempelai target NOT found! Trying partial match...\n";
    $pos = strpos($content, '<!-- Corner Botanical Sprigs for Theme 1 Profil Mempelai -->');
    if ($pos !== false) {
        $before = substr($content, 0, $pos);
        $lastElse = strrpos($before, "@else\n            <div class=\"theme-arch-frame bg-white p-6");
        if ($lastElse !== false) {
            $matched = substr($content, $lastElse, $pos - $lastElse);
            $content = substr_replace($content, $t12Mempelai.$matched, $lastElse, strlen($matched));
            echo "Mempelai inserted via position match.\n";
        }
    }
}

file_put_contents($filePath, $content);
echo "Cleanup complete!\n";
