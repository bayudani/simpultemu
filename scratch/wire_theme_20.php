<?php

$showFile = 'resources/views/invitations/show.blade.php';
$content = file_get_contents($showFile);

// 1. Update $allThemes[20]
$oldTheme20 = "            20 => [
                'name' => 'Premium Serenade Dark Elegance',
                'slug' => 'premium-serenade-dark-elegance',
                'tier' => 'premium',
                'bgCanvas' => '#070807',
                'bgCard' => '#131713',
                'bgAccentBlock' => '#1A211A',
                'bgAccentLight' => '#212A21',
                'textMain' => '#FAF7F2',
                'textMuted' => '#9EB092',
                'textAccent' => '#9EB092',
                'textSecondary' => '#FAF7F2',
                'borderFrame' => '#9EB092',
                'frameRadius' => '24px',
                'frameBorder' => '1.5px solid #9EB092',
                'frameShadow' => '0 25px 60px -10px rgba(0, 0, 0, 0.7)',
                'photoRadius' => '24px',
                'heroPhotoRadius' => '9999px',
                'profilePhotoRadius' => '24px',
                'fontHeading' => \"'Cinzel', Georgia, serif\",
                'fontScript' => \"'Alex Brush', cursive\",
                'fontBody' => \"'Urbanist', sans-serif\",
                'ornamentPrimary' => '#9EB092',
                'ornamentSecondary' => '#588157',
            ],";

$newTheme20 = "            20 => [
                'name' => 'Premium Melayu Pixelated',
                'slug' => 'premium-melayu-pixelated',
                'tier' => 'premium',
                'bgCanvas' => '#1A0E08',
                'bgCard' => '#FAF4E6',
                'bgAccentBlock' => '#3D271D',
                'bgAccentLight' => '#FAF0D7',
                'textMain' => '#2C1810',
                'textMuted' => '#78543E',
                'textAccent' => '#8B2500',
                'textSecondary' => '#FAF4E6',
                'borderFrame' => '#3D271D',
                'frameRadius' => '16px',
                'frameBorder' => '3px solid #3D271D',
                'frameShadow' => '0 6px 0 #2A170E',
                'photoRadius' => '12px',
                'heroPhotoRadius' => '12px',
                'profilePhotoRadius' => '12px',
                'fontHeading' => \"'Press Start 2P', monospace\",
                'fontScript' => \"'Silkscreen', monospace\",
                'fontBody' => \"'Silkscreen', monospace\",
                'ornamentPrimary' => '#D4AF37',
                'ornamentSecondary' => '#1B4332',
            ],";

if (strpos($content, $oldTheme20) !== false) {
    $content = str_replace($oldTheme20, $newTheme20, $content);
    echo "1. Updated \$allThemes[20]\n";
} else {
    echo "1. \$allThemes[20] not matched or already updated\n";
}

// 2. Update $isDarkElegance / $isMelayuPixelated variable
$oldVar = "        // Theme 20 (Premium Serenade Dark Elegance) Bespoke Variables & Photo Assets\n        \$isDarkElegance = (\$currentThemeId == 20) || (\$currentThemeSlug === 'premium-serenade-dark-elegance') || (request()->route('theme') == 20);";
$newVar = "        // Theme 20 (Premium Melayu Pixelated) Bespoke Variables & Photo Assets\n        \$isMelayuPixelated = (\$currentThemeId == 20) || (\$currentThemeSlug === 'premium-melayu-pixelated') || (\$currentThemeSlug === 'premium-serenade-dark-elegance') || (request()->route('theme') == 20);\n        \$isDarkElegance = false;";

if (strpos($content, $oldVar) !== false) {
    $content = str_replace($oldVar, $newVar, $content);
    echo "2. Updated isMelayuPixelated variable\n";
} else {
    echo "2. Variable not matched or already updated\n";
}

// 3. Update CSS styling for theme 20
$oldCss = "        /* ================= THEME 20: PREMIUM SERENADE DARK ELEGANCE BESPOKE STYLING ================= */\n        [data-theme-id=\"20\"] {\n            background-color: #070807 !important;\n            color: #FAF7F2 !important;\n        }";
$newCss = "        /* ================= THEME 20: PREMIUM MELAYU PIXELATED BESPOKE STYLING ================= */\n        [data-theme-id=\"20\"], [data-theme-slug=\"premium-melayu-pixelated\"] {\n            background-color: #1A0E08 !important;\n            color: #FAF4E6 !important;\n        }\n\n        [data-theme-id=\"20\"] #floating-autoscroll-container,\n        [data-theme-slug=\"premium-melayu-pixelated\"] #floating-autoscroll-container,\n        [data-theme-id=\"20\"] #floating-bottom-nav-wrapper,\n        [data-theme-slug=\"premium-melayu-pixelated\"] #floating-bottom-nav-wrapper,\n        [data-theme-id=\"20\"] #floating-music-container,\n        [data-theme-slug=\"premium-melayu-pixelated\"] #floating-music-container {\n            display: none !important;\n        }";

if (strpos($content, $oldCss) !== false) {
    $content = str_replace($oldCss, $newCss, $content);
    echo "3. Updated Theme 20 CSS in show.blade.php\n";
} else {
    echo "3. CSS not matched or already updated\n";
}

// 4. Branching after <body ...>
$bodyTarget = "      data-tier=\"{{ \$currentThemeTier }}\">\n\n    @if(\$currentThemeId == 15 || \$isMidnightAmber)";
$bodyReplacement = "      data-tier=\"{{ \$currentThemeTier }}\">\n\n    @if(\$isMelayuPixelated)\n        @include('invitations.themes.premium-melayu-pixelated')\n    @else\n    @if(\$currentThemeId == 15 || \$isMidnightAmber)";

if (strpos($content, $bodyTarget) !== false) {
    $content = str_replace($bodyTarget, $bodyReplacement, $content);
    echo "4. Added @if(\$isMelayuPixelated) branch after <body>\n";
} else {
    echo "4. Body target not matched or already updated\n";
}

// 5. Close @if($isMelayuPixelated) before <audio id="bg-music"
$endTarget = "    </main>\n\n    <audio id=\"bg-music\" class=\"bgMusic\" loop preload=\"auto\">";
$endReplacement = "    </main>\n    @endif\n\n    <audio id=\"bg-music\" class=\"bgMusic\" loop preload=\"auto\">";

if (strpos($content, $endTarget) !== false) {
    $content = str_replace($endTarget, $endReplacement, $content);
    echo "5. Closed @if(\$isMelayuPixelated) before <audio id=\"bg-music\">\n";
} else {
    echo "5. End target not matched or already updated\n";
}

file_put_contents($showFile, $content);
echo "Successfully updated $showFile\n";
