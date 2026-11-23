@php
    $themeId = is_object($theme) ? $theme->id : ($theme['id'] ?? 1);
    $themeSlug = is_object($theme) ? ($theme->slug ?? '') : ($theme['slug'] ?? '');
    $isPremium = is_object($theme) ? (method_exists($theme, 'isPremium') ? $theme->isPremium() : (($theme->tier ?? '') === 'premium' || ($theme->price ?? 0) > 0)) : (!empty($theme['is_premium']) || ($theme['tier'] ?? '') === 'premium' || ($theme['price'] ?? 0) > 0);
    $themeName = is_object($theme) ? $theme->name : ($theme['name'] ?? 'Theme');
    $size = $size ?? 'normal'; // 'compact', 'normal', 'large'

    $isTheme20 = ($themeId == 20) || str_contains($themeSlug, 'dark-elegance');
    $isTheme19 = ($themeId == 19) || str_contains($themeSlug, 'sahala') || str_contains($themeSlug, 'lavender');
    $isTheme16 = ($themeId == 16) || str_contains($themeSlug, 'museum-of-love') || str_contains($themeSlug, 'golden-glam');
    $isTheme15 = ($themeId == 15) || str_contains($themeSlug, 'midnight-amber') || str_contains($themeSlug, 'rustic-wood');
    $isTheme14 = ($themeId == 14) || str_contains($themeSlug, 'fairytale-castle') || str_contains($themeSlug, 'night-sky') || str_contains($themeSlug, 'blush-pink');
    $isTheme13 = ($themeId == 13) || str_contains($themeSlug, 'summer-vibes') || str_contains($themeSlug, 'royal-blue');
    $isTheme12 = ($themeId == 12) || str_contains($themeSlug, 'champagne-bloom') || str_contains($themeSlug, 'serenade-emerald');
    $isTheme11 = ($themeId == 11) || str_contains($themeSlug, 'misty-romance') || str_contains($themeSlug, 'serenade-maroon');
    $isTheme10 = ($themeId == 10) || str_contains($themeSlug, 'newspaper') || str_contains($themeSlug, 'charcoal');
    $isTheme9 = ($themeId == 9) || str_contains($themeSlug, 'whispering-garden') || str_contains($themeSlug, 'harmony-champagne');
    $isTheme8 = ($themeId == 8) || str_contains($themeSlug, 'sunny-botanical') || str_contains($themeSlug, 'harmony-sage');
    $isTheme7 = ($themeId == 7) || str_contains($themeSlug, 'lilac-blooms') || str_contains($themeSlug, 'harmony-lilac');
    $isTheme6 = ($themeId == 6) || str_contains($themeSlug, 'blue-blossom') || str_contains($themeSlug, 'terracotta');
    $isTheme5 = ($themeId == 5) || str_contains($themeSlug, 'monochrome');
    $isTheme4 = ($themeId == 4) || str_contains($themeSlug, 'wanted-poster') || str_contains($themeSlug, 'harmony-rose');
    $isTheme3 = ($themeId == 3) || str_contains($themeSlug, 'navy');
    $isTheme2 = ($themeId == 2) || str_contains($themeSlug, 'emerald');
    $isTheme1 = ($themeId == 1) || str_contains($themeSlug, 'maroon');
    $isTheme18 = ($themeId == 18) || str_contains($themeSlug, 'crayon-dreams') || str_contains($themeSlug, 'minimalist-white');
    $isTheme17 = ($themeId == 17) || str_contains($themeSlug, 'ethereal-bloom') || str_contains($themeSlug, 'serenade-botanical');

    // Height and width sizing based on modern 19.5:9 flagship smartphone proportions
    $dimensions = match($size) {
        'compact' => 'w-[175px] sm:w-[190px] h-[350px] sm:h-[380px]',
        'detail' => 'w-[145px] sm:w-[155px] lg:w-[170px] h-[290px] sm:h-[310px] lg:h-[340px]',
        'large' => 'w-[145px] sm:w-[155px] lg:w-[170px] h-[290px] sm:h-[310px] lg:h-[340px]',
        'catalog' => 'w-[180px] h-[360px]',
        default => 'w-[185px] sm:w-[195px] h-[370px] sm:h-[390px]'
    };

    // 20 Themes Visual Preset Library: Motif, Corak, Gradient & SVG Ornaments
    $themePresets = [
        // === 10 BASIC THEMES (GRATIS) ===
        1 => [
            'bg' => 'linear-gradient(135deg, rgba(80,10,20,0.92) 0%, rgba(30,4,8,0.95) 100%), url("/images/themes/bg/bg-basic-maroon.jpg")',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=%2236%22 height=%2236%22 viewBox=%220 0 36 36%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath d=%22M18 0l18 18-18 18L0 18z%22 fill=%22%23e5c378%22 fill-opacity=%220.12%22/%3E%3Ccircle cx=%2218%22 cy=%2218%22 r=%224%22 fill=%22%23e5c378%22 fill-opacity=%220.18%22/%3E%3C/svg%3E")',
            'motifName' => 'Songket Damask Floral',
            'accentColor' => '#E5C378',
            'textColor' => '#FFF5EA',
            'tagBg' => 'bg-rose-950/70 border-rose-800/60',
            'iconSvg' => '<svg class="w-5 h-5 text-amber-200" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/></svg>',
        ],
        2 => [
            'bg' => 'linear-gradient(145deg, #247E64 0%, #1E6B52 50%, #165640 100%)',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=%2248%22 height=%2248%22 viewBox=%220 0 48 48%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath d=%22M24 0l7 17 17 7-17 7-7 17-7-17L0 24l17-7z%22 fill=%22%23d4af37%22 fill-opacity=%220.18%22/%3E%3Ccircle cx=%2224%22 cy=%2224%22 r=%226%22 stroke=%22%23d4af37%22 stroke-width=%221%22 stroke-opacity=%220.25%22 fill=%22none%22/%3E%3C/svg%3E")',
            'motifName' => 'Emerald Card & Royal Crest',
            'accentColor' => '#D4AF37',
            'textColor' => '#FFFFFF',
            'tagBg' => 'bg-emerald-950/80 border-[#D4AF37]/60',
            'iconSvg' => '<svg class="w-5 h-5 text-[#E5C158]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="12,2 15,9 22,9 17,14 19,21 12,17 5,21 7,14 2,9 9,9"/></svg>',
        ],
        3 => [
            'bg' => 'linear-gradient(180deg, #CBDCE7 0%, #2E4D71 40%, #1E3A5F 100%)',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=%22100%22 height=%2220%22 viewBox=%220 0 100 20%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath d=%22M0 10 Q25 20 50 10 T100 10 L100 20 L0 20 Z%22 fill=%22%23ffffff%22 fill-opacity=%220.15%22/%3E%3C/svg%3E")',
            'motifName' => 'Oceanic Wave & Frosted Glass',
            'accentColor' => '#CBDCEB',
            'textColor' => '#FFFFFF',
            'tagBg' => 'bg-[#1E3A5F]/85 border-white/30',
            'iconSvg' => '<svg class="w-5 h-5 text-sky-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12c3-4 6-4 10 0s7 4 10 0"/><path d="M2 17c3-4 6-4 10 0s7 4 10 0"/></svg>',
        ],
        4 => [
            'bg' => 'radial-gradient(circle at 50% 25%, #9d174d 0%, #4a0422 100%)',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=%2242%22 height=%2242%22 viewBox=%220 0 42 42%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Ccircle cx=%2221%22 cy=%2213%22 r=%227%22 fill=%22%23fda4af%22 fill-opacity=%220.14%22/%3E%3Ccircle cx=%2213%22 cy=%2225%22 r=%227%22 fill=%22%23fda4af%22 fill-opacity=%220.14%22/%3E%3Ccircle cx=%2229%22 cy=%2225%22 r=%227%22 fill=%22%23fda4af%22 fill-opacity=%220.14%22/%3E%3Ccircle cx=%2221%22 cy=%2221%22 r=%223.5%22 fill=%22%23fbcfe8%22 fill-opacity=%220.2%22/%3E%3C/svg%3E")',
            'motifName' => 'Romantic Rose Blossom',
            'accentColor' => '#FBCFE8',
            'textColor' => '#FFF1F2',
            'tagBg' => 'bg-rose-950/70 border-rose-800/60',
            'iconSvg' => '<svg class="w-5 h-5 text-pink-300" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>',
        ],
        5 => [
            'bg' => 'radial-gradient(circle at 50% 25%, #262626 0%, #0a0a0a 100%)',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=%2250%22 height=%2250%22 viewBox=%220 0 50 50%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Crect x=%220%22 y=%220%22 width=%2250%22 height=%2250%22 fill=%22none%22 stroke=%22%23ffffff%22 stroke-width=%220.6%22 stroke-opacity=%220.14%22/%3E%3Cline x1=%220%22 y1=%220%22 x2=%2250%22 y2=%2250%22 stroke=%22%23ffffff%22 stroke-width=%220.4%22 stroke-opacity=%220.08%22/%3E%3C/svg%3E")',
            'motifName' => 'Editorial Marble Lines',
            'accentColor' => '#E5E5E5',
            'textColor' => '#FFFFFF',
            'tagBg' => 'bg-neutral-900/80 border-neutral-700/60',
            'iconSvg' => '<svg class="w-5 h-5 text-neutral-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="4" width="16" height="16" rx="2"/><line x1="4" y1="12" x2="20" y2="12"/><line x1="12" y1="4" x2="12" y2="20"/></svg>',
        ],
        6 => [
            'bg' => 'linear-gradient(180deg, #F0F9FF 0%, #E0F2FE 40%, #FFFFFF 100%)',
            'pattern' => 'none',
            'motifName' => 'Blue Blossom & Floral Arches',
            'accentColor' => '#38B6FF',
            'textColor' => '#1E293B',
            'tagBg' => 'bg-sky-500/20 border-sky-400/60',
            'iconSvg' => '<svg class="w-5 h-5 text-[#38B6FF]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/></svg>',
        ],
        7 => [
            'bg' => 'url("' . asset('images/themes/lilac-blooms/bg-floral-portrait.jpg') . '") center/cover no-repeat',
            'pattern' => 'none',
            'motifName' => 'Lilac Blooms Watercolor & Muslim Couple Cartoon',
            'accentColor' => '#5C3D8D',
            'textColor' => '#2E1A47',
            'tagBg' => 'bg-purple-100 text-[#5C3D8D] border border-purple-300',
            'iconSvg' => '<svg class="w-5 h-5 text-purple-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>',
        ],
        8 => [
            'bg' => 'linear-gradient(180deg, #FFFDF7 0%, #FEF7E6 100%)',
            'pattern' => 'none',
            'motifName' => 'Sunny Golden Botanical',
            'accentColor' => '#E67E22',
            'textColor' => '#4A3B2C',
            'tagBg' => 'bg-amber-100/90 border-amber-300/60',
            'iconSvg' => '<svg class="w-5 h-5 text-amber-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0V3a1 1 0 0 1 1-1zm0 16a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0v-2a1 1 0 0 1 1-1zm10-7a1 1 0 0 1-1 1h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1zM5 12a1 1 0 0 1-1 1H2a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1zm14.071-7.071a1 1 0 0 1 0 1.414l-1.414 1.414a1 1 0 0 1-1.414-1.414l1.414-1.414a1 1 0 0 1 1.414 0zM6.343 17.657a1 1 0 0 1 0 1.414l-1.414 1.414a1 1 0 0 1-1.414-1.414l1.414-1.414a1 1 0 0 1 1.414 0zm12.728 0a1 1 0 0 1-1.414 0l-1.414-1.414a1 1 0 0 1 1.414-1.414l1.414 1.414a1 1 0 0 1 0 1.414zM4.929 4.929a1 1 0 0 1 1.414 0l1.414 1.414a1 1 0 0 1-1.414 1.414L4.93 6.343a1 1 0 0 1 0-1.414zM12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10z"/></svg>',
        ],
        9 => [
            'bg' => 'radial-gradient(circle at 50% 25%, #b45309 0%, #3d1602 100%)',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=%2238%22 height=%2238%22 viewBox=%220 0 38 38%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpolygon points=%2219,2 36,19 19,36 2,19%22 fill=%22none%22 stroke=%22%23fde68a%22 stroke-width=%220.9%22 stroke-opacity=%220.18%22/%3E%3Ccircle cx=%2219%22 cy=%2219%22 r=%223%22 fill=%22%23fef3c7%22 fill-opacity=%220.28%22/%3E%3C/svg%3E")',
            'motifName' => 'Champagne Gilded Harlequin',
            'accentColor' => '#FDE68A',
            'textColor' => '#FEF3C7',
            'tagBg' => 'bg-amber-950/70 border-amber-800/60',
            'iconSvg' => '<svg class="w-5 h-5 text-amber-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="12,2 15,9 22,9 17,14 19,21 12,17 5,21 7,14 2,9 9,9"/></svg>',
        ],
        10 => [
            'bg' => '#F4F4F4',
            'pattern' => 'none',
            'motifName' => 'Classic Monochrome Editorial Newspaper',
            'accentColor' => '#111111',
            'textColor' => '#111111',
            'tagBg' => 'bg-neutral-100 text-[#111111] border border-black/40',
            'iconSvg' => '<svg class="w-5 h-5 text-neutral-800" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>',
        ],

        // === 10 PREMIUM THEMES (RP 59.000) - ULTRA LUXURIOUS ===
        11 => [
            'bg' => 'radial-gradient(circle at 50% 20%, #5a0b18 0%, #170206 100%)',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=%2248%22 height=%2248%22 viewBox=%220 0 48 48%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath d=%22M24 4c3 6 8 8 13 6-2 6 0 11 4 14-6 1-9 5-9 10-4-4-9-3-13 2-3-5-8-6-13-2 0-5-3-9-9-10 4-3 6-8 4-14 5 2 10 0 13-6z%22 fill=%22%23fbbf24%22 fill-opacity=%220.2%22/%3E%3Ccircle cx=%2224%22 cy=%2224%22 r=%224%22 fill=%22%23ca8a04%22 fill-opacity=%220.3%22/%3E%3C/svg%3E")',
            'motifName' => 'Royal Velvet & Gold Filigree',
            'accentColor' => '#FCD34D',
            'textColor' => '#FFFBEB',
            'tagBg' => 'bg-rose-950/85 border-amber-400/50',
            'iconSvg' => '<svg class="w-6 h-6 text-amber-300" viewBox="0 0 24 24" fill="currentColor"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg>',
        ],
        12 => [
            'bg' => 'radial-gradient(circle at 50% 20%, #064e3b 0%, #021a12 100%)',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=%2256%22 height=%2256%22 viewBox=%220 0 56 56%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath d=%22M28 56C28 40.5 40.5 28 56 28 40.5 28 28 15.5 28 0 28 15.5 15.5 28 0 28 15.5 28 28 40.5 28 56z%22 fill=%22%23facc15%22 fill-opacity=%220.2%22/%3E%3Cpath d=%22M28 42C28 34.3 34.3 28 42 28 34.3 28 28 21.7 28 14 28 21.7 21.7 28 14 28 21.7 28 28 34.3 28 42z%22 fill=%22none%22 stroke=%22%23facc15%22 stroke-width=%220.9%22 stroke-opacity=%220.25%22/%3E%3C/svg%3E")',
            'motifName' => 'Imperial Art Deco Emerald',
            'accentColor' => '#FACC15',
            'textColor' => '#F0FDF4',
            'tagBg' => 'bg-emerald-950/85 border-amber-400/50',
            'iconSvg' => '<svg class="w-6 h-6 text-amber-300" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>',
        ],
        13 => [
            'bg' => 'linear-gradient(180deg, #FFF7ED 0%, #EFECE6 100%)',
            'pattern' => 'none',
            'motifName' => 'Summer Vibes Tropical Stamp',
            'accentColor' => '#D94B26',
            'textColor' => '#1E293B',
            'tagBg' => 'bg-amber-100 text-[#D94B26] border border-amber-300',
            'iconSvg' => '<svg class="w-6 h-6 text-orange-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 14.5v-9l6 4.5-6 4.5z"/></svg>',
        ],
        14 => [
            'bg' => 'linear-gradient(180deg, #F8B8C8 0%, #F597AC 100%)',
            'pattern' => 'none',
            'motifName' => 'Fairytale Castle & Floral Ornate Frame',
            'accentColor' => '#8A1538',
            'textColor' => '#8A1538',
            'tagBg' => 'bg-pink-100/90 border-[#8A1538]/30',
            'iconSvg' => '<svg class="w-6 h-6 text-[#8A1538]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>',
        ],
        15 => [
            'bg' => '#161514',
            'pattern' => 'none',
            'motifName' => 'Obsidian & Amber Gold',
            'accentColor' => '#DDA74F',
            'textColor' => '#FAF5EC',
            'tagBg' => 'bg-neutral-950/90 border-[#DDA74F]/60',
            'iconSvg' => '<svg class="w-6 h-6 text-[#DDA74F]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>',
        ],
        16 => [
            'bg' => '#F7F2E8',
            'pattern' => 'none',
            'motifName' => 'Museum of Love & Baroque Gold',
            'accentColor' => '#8B1E22',
            'textColor' => '#2A1F1D',
            'tagBg' => 'bg-[#8B1E22]/15 border-[#D4AF37]/60',
            'iconSvg' => '<svg class="w-6 h-6 text-[#8B1E22]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>',
        ],
        17 => [
            'bg' => 'url("' . asset('images/themes/ethereal-bloom/bg-watercolor-portrait.jpg') . '") center/cover no-repeat',
            'pattern' => 'none',
            'motifName' => 'Ethereal Blue Watercolor & Floral Bloom',
            'accentColor' => '#1D4ED8',
            'textColor' => '#1E3A8A',
            'tagBg' => 'bg-blue-100 text-[#1D4ED8] border border-blue-300',
            'iconSvg' => '<svg class="w-6 h-6 text-blue-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>',
        ],
        18 => [
            'bg' => 'url("' . asset('images/themes/crayon-dreams/bg-crayon-texture.jpg') . '") center/cover no-repeat',
            'pattern' => 'none',
            'motifName' => 'Crayon Dreams Sketchbook',
            'accentColor' => '#E85A4F',
            'textColor' => '#4A3E3D',
            'tagBg' => 'bg-amber-100/90 border-coral-400/50',
            'iconSvg' => '<svg class="w-6 h-6 text-red-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>',
        ],
        19 => [
            'bg' => 'linear-gradient(180deg, rgba(66,7,13,0.85) 0%, rgba(42,5,8,0.95) 100%), url("/images/themes/sahala-pattern/bg-cultural-damask.jpg") center/cover no-repeat',
            'pattern' => 'none',
            'motifName' => 'Toraja Ethnic Sahala Pattern',
            'accentColor' => '#E5A93C',
            'textColor' => '#FFFFFF',
            'tagBg' => 'bg-[#500A12]/90 border-[#E5A93C]/50',
            'iconSvg' => '<svg class="w-6 h-6 text-[#E5A93C]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L1 21h22L12 2zm0 4.5l6.5 11.5h-13L12 6.5z"/></svg>',
        ],
        20 => [
            'bg' => 'radial-gradient(circle at 50% 20%, #261207 0%, #08080a 100%)',
            'pattern' => 'url("data:image/svg+xml,%3Csvg width=%2252%22 height=%2252%22 viewBox=%220 0 52 52%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Ccircle cx=%2226%22 cy=%2226%22 r=%222.5%22 fill=%22%23fbbf24%22 fill-opacity=%220.7%22/%3E%3Ccircle cx=%2213%22 cy=%2215%22 r=%223.5%22 fill=%22%23f59e0b%22 fill-opacity=%220.4%22/%3E%3Ccircle cx=%2241%22 cy=%2219%22 r=%222%22 fill=%22%23fbbf24%22 fill-opacity=%220.5%22/%3E%3Ccircle cx=%2235%22 cy=%2239%22 r=%223%22 fill=%22%23d97706%22 fill-opacity=%220.45%22/%3E%3C/svg%3E")',
            'motifName' => 'Obsidian & Molten Gold',
            'accentColor' => '#FBBF24',
            'textColor' => '#FFFBEB',
            'tagBg' => 'bg-zinc-950/90 border-amber-400/60',
            'iconSvg' => '<svg class="w-6 h-6 text-amber-400" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2c-2 8-8 12-8 20 0 8.8 7.2 16 16 16s16-7.2 16-16c0-10-10-14-12-24z"/></svg>',
        ],
    ];

    $preset = $themePresets[$themeId] ?? $themePresets[1];

    $phoneBorderClass = match(true) {
        $isTheme18 => 'border-[3.5px] border-[#E85A4F]/70 shadow-[0_16px_40px_-8px_rgba(232,90,79,0.35)] ring-1 ring-[#FEEAA1]/50 ring-offset-1 ring-offset-black/90',
        $isTheme17 => 'border-[3.5px] border-[#1D4ED8]/70 shadow-[0_16px_40px_-8px_rgba(29,78,216,0.35)] ring-1 ring-blue-300/40 ring-offset-1 ring-offset-black/90',
        $isTheme14 => 'border-[3.5px] border-[#F492A7] shadow-[0_16px_40px_-8px_rgba(229,91,130,0.35)] ring-1 ring-pink-300/60 ring-offset-1 ring-offset-black/90',
        $isTheme12 => 'border-[3.5px] border-[#A3704C]/70 shadow-[0_16px_40px_-8px_rgba(163,112,76,0.35)] ring-1 ring-[#D8B48D]/50 ring-offset-1 ring-offset-black/90',
        $isTheme11 => 'border-[3.5px] border-slate-500/70 shadow-[0_16px_40px_-8px_rgba(15,23,42,0.5)] ring-1 ring-slate-300/40 ring-offset-1 ring-offset-black/90',
        $isTheme9 => 'border-[3.5px] border-[#6B442A]/70 shadow-[0_16px_40px_-8px_rgba(107,68,42,0.35)] ring-1 ring-amber-200/40 ring-offset-1 ring-offset-black/90',
        $isTheme8 => 'border-[3.5px] border-[#E67E22]/70 shadow-[0_16px_40px_-8px_rgba(230,126,34,0.35)] ring-1 ring-amber-300/50 ring-offset-1 ring-offset-black/90',
        $isTheme7 => 'border-[3.5px] border-[#5C3D8D]/70 shadow-[0_16px_40px_-8px_rgba(92,61,141,0.35)] ring-1 ring-purple-300/40 ring-offset-1 ring-offset-black/90',
        $isTheme6 => 'border-[3.5px] border-[#38B6FF]/70 shadow-[0_16px_40px_-8px_rgba(56,182,255,0.35)] ring-1 ring-sky-300/40 ring-offset-1 ring-offset-black/90',
        $isTheme20 => 'border-[3.5px] border-[#9EB092]/60 shadow-[0_16px_40px_-8px_rgba(158,176,146,0.35)] ring-1 ring-[#9EB092]/40 ring-offset-1 ring-offset-black/90',
        $isTheme19 => 'border-[3.5px] border-[#E5A93C]/80 shadow-[0_16px_40px_-8px_rgba(229,169,60,0.4)] ring-1 ring-[#E5A93C]/50 ring-offset-1 ring-offset-black/90',
        $isTheme16 => 'border-[3.5px] border-[#D4AF37]/80 shadow-[0_16px_40px_-8px_rgba(139,30,34,0.35)] ring-1 ring-[#D4AF37]/50 ring-offset-1 ring-offset-black/90',
        $isTheme15 => 'border-[3.5px] border-[#DDA74F]/70 shadow-[0_16px_40px_-8px_rgba(221,167,79,0.4)] ring-1 ring-[#F2D59B]/50 ring-offset-1 ring-offset-black/90',
        $isTheme13 => 'border-[3.5px] border-[#1D63B8]/70 shadow-[0_16px_40px_-8px_rgba(29,99,184,0.35)] ring-1 ring-[#D94B26]/50 ring-offset-1 ring-offset-black/90',
        $isTheme1 => 'border-[3.5px] border-[#620000]/60 shadow-[0_16px_40px_-8px_rgba(98,0,0,0.35)] ring-1 ring-[#FFDADA]/40 ring-offset-1 ring-offset-black/90',
        $isTheme2 => 'border-[3.5px] border-[#1E6B52]/60 shadow-[0_16px_40px_-8px_rgba(30,107,82,0.35)] ring-1 ring-[#D4AF37]/40 ring-offset-1 ring-offset-black/90',
        $isTheme3 => 'border-[3.5px] border-[#1E3A5F]/70 shadow-[0_16px_40px_-8px_rgba(30,58,95,0.4)] ring-1 ring-sky-300/40 ring-offset-1 ring-offset-black/90',
        $isTheme4 => 'border-[3.5px] border-[#2A1B0E]/70 shadow-[0_16px_40px_-8px_rgba(42,27,14,0.35)] ring-1 ring-[#8C6239]/40 ring-offset-1 ring-offset-black/90',
        $isTheme5 => 'border-[3.5px] border-neutral-600/70 shadow-[0_16px_40px_-8px_rgba(0,0,0,0.5)] ring-1 ring-white/30 ring-offset-1 ring-offset-black/90',
        $isTheme10 => 'border-[3.5px] border-neutral-900/90 shadow-[0_16px_40px_-8px_rgba(0,0,0,0.4)] ring-1 ring-neutral-400/40 ring-offset-1 ring-offset-black/90',
        $isPremium => 'border-[3.5px] border-amber-500/80 shadow-[0_16px_40px_-8px_rgba(217,119,6,0.4)] ring-1 ring-amber-400/40 ring-offset-1 ring-offset-black/90',
        default => 'border-[3.5px] border-neutral-700/70 shadow-2xl ring-1 ring-white/10 ring-offset-1 ring-offset-black/90',
    };
    $scalerClasses = match($size) {
        'large' => 'w-full flex justify-center items-center',
        'detail' => 'w-full flex justify-center items-center',
        'compact' => 'w-full flex justify-center items-center overflow-hidden py-0.5',
        'catalog' => 'w-full flex justify-center items-center overflow-hidden py-0.5',
        default => 'w-full flex justify-center items-center overflow-hidden py-0.5',
    };
    $innerScale = match($size) {
        'large' => '',
        'detail' => '',
        'compact' => 'transform scale-[0.56] xs:scale-[0.66] sm:scale-100 origin-top -mb-38 xs:-mb-28 sm:mb-0 transition-transform duration-300',
        'catalog' => 'catalog-phone-mockup',
        default => 'transform scale-[0.58] xs:scale-[0.70] sm:scale-100 origin-top -mb-38 xs:-mb-26 sm:mb-0 transition-transform duration-300',
    };
@endphp

<div class="{{ $scalerClasses }}">
    <div class="{{ $innerScale }}">
        <!-- Realistic Modern Smartphone Mockup (19.5:9 Flagship Dimensions) -->
        <div class="{{ $dimensions }} mx-auto rounded-[2.2rem] sm:rounded-[2.4rem] p-1.5 sm:p-2 bg-[#18181b] {{ $phoneBorderClass }} relative flex flex-col justify-between text-center overflow-visible transition-all duration-300 group-hover:scale-[1.03]">
    
    <!-- Physical Side Hardware Buttons (Left: Volume / Action) -->
    <div class="absolute -left-[3px] top-12 w-[2.5px] h-4 bg-neutral-600 rounded-l-xs pointer-events-none"></div>
    <div class="absolute -left-[3px] top-20 w-[2.5px] h-6 bg-neutral-600 rounded-l-xs pointer-events-none"></div>
    <!-- Physical Side Hardware Button (Right: Power) -->
    <div class="absolute -right-[3px] top-16 w-[2.5px] h-8 bg-neutral-600 rounded-r-xs pointer-events-none"></div>

    @if($isTheme20)
    <!-- Screen Canvas: EXACT MATCH TO THEME 20 (PREMIUM SERENADE DARK ELEGANCE) REAL COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2.5 sm:p-3 relative overflow-hidden select-none bg-[#070807] text-[#FAF7F2] font-serif">
        <!-- Radial Gradient Halo Glow behind circular photo -->
        <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(circle at 50% 28%, rgba(158, 176, 146, 0.35) 0%, rgba(7, 8, 7, 0.95) 55%, #070807 100%);"></div>

        <!-- Top Header & Circular Couple Avatar -->
        <div class="relative z-10 w-full pt-1 flex flex-col items-center space-y-1">
            <span class="text-[7.5px] sm:text-[8px] tracking-[0.25em] uppercase text-[#9EB092] font-semibold font-serif leading-none">
                THE WEDDING OF
            </span>

            <!-- Circular Photo with Glowing Halo -->
            <div class="relative my-0.5 sm:my-1 flex items-center justify-center">
                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full p-[2px] bg-gradient-to-b from-[#9EB092] via-[#9EB092]/50 to-[#131713] shadow-[0_0_22px_rgba(158,176,146,0.6)]">
                    <div class="w-full h-full rounded-full overflow-hidden border border-[#9EB092]/80">
                        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=400&auto=format&fit=crop&q=80" 
                             alt="Lisa & Theo" 
                             class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Couple Names & Date -->
            <div class="space-y-0.5 text-center">
                <h4 class="font-script text-xl sm:text-2xl text-white font-normal leading-tight drop-shadow-sm tracking-wide" style="font-family: 'Great Vibes', cursive;">
                    Lisa &amp; Theo
                </h4>
                <p class="text-[6.5px] sm:text-[7.5px] tracking-[0.22em] uppercase text-[#9EB092] font-semibold font-serif pt-0.5">
                    MINGGU, 10 JANUARI 2027
                </p>
            </div>
        </div>

        <!-- Recipient Card -->
        <div class="relative z-10 w-full px-1 my-auto">
            <div class="rounded-xl bg-[#131713] border border-[#9EB092]/45 p-2 sm:p-2.5 shadow-lg space-y-0.5 text-center">
                <p class="text-[5.5px] sm:text-[6.5px] tracking-[0.16em] uppercase text-[#9EB092] font-serif font-semibold">
                    KEPADA YTH. BAPAK/IBU/SAUDARA/I:
                </p>
                <p class="text-[9.5px] sm:text-[10.5px] font-bold text-[#FAF7F2] font-serif leading-tight">
                    BUDI SANTOSO &amp; PASANGAN
                </p>
                <p class="text-[5px] sm:text-[6px] italic text-[#D5DDD0]/70 font-serif">
                    *Mohon maaf apabila ada kesalahan penulisan nama/gelar
                </p>
            </div>
        </div>

        <!-- Bottom Floral Ornament & Buka Undangan Button -->
        <div class="relative z-10 w-full space-y-1.5 pb-0.5">
            <!-- Floral Divider -->
            <div class="w-24 sm:w-28 mx-auto pointer-events-none opacity-85">
                <img src="/images/themes/serenade-dark/floral-divider.png" alt="" class="w-full h-auto object-contain">
            </div>

            <!-- Buka Undangan Pill Button -->
            <div class="w-full py-1.5 px-3 rounded-full bg-[#9EB092] text-[#070807] font-bold text-[7.5px] sm:text-[8.5px] shadow-md flex items-center justify-center gap-1.5 uppercase tracking-wider font-serif">
                <svg class="w-2.5 h-2.5 text-[#070807]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span>BUKA UNDANGAN</span>
            </div>

            <!-- Home Bar Indicator -->
            <div class="w-10 sm:w-12 h-0.5 bg-[#9EB092]/40 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme15)
    <!-- THEME 15 BESPOKE SCREEN: EXACT REPLICA OF PREMIUM SERENADE MIDNIGHT AMBER COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2.5 sm:p-3 relative overflow-hidden select-none text-white font-serif bg-[#161514]">
        
        <!-- Corner Floral Ornaments (User Sourced Assets) -->
        <div class="absolute -top-3 -right-3 w-16 sm:w-20 pointer-events-none z-10 opacity-90">
            <img src="/images/themes/serenade-amber/floral-corner.png" alt="" class="w-full h-auto object-contain transform -scale-x-100 rotate-45">
        </div>
        <div class="absolute top-[32%] -left-3 w-14 sm:w-16 pointer-events-none z-10 opacity-80">
            <img src="/images/themes/serenade-amber/floral-corner.png" alt="" class="w-full h-auto object-contain rotate-12">
        </div>
        <div class="absolute -bottom-3 -left-3 w-16 sm:w-20 pointer-events-none z-10 opacity-90">
            <img src="/images/themes/serenade-amber/floral-corner.png" alt="" class="w-full h-auto object-contain">
        </div>
        <div class="absolute -bottom-3 -right-3 w-16 sm:w-20 pointer-events-none z-10 opacity-90">
            <img src="/images/themes/serenade-amber/floral-corner.png" alt="" class="w-full h-auto object-contain transform -scale-x-100">
        </div>

        <!-- Center Couple Arch Photo with Bottom Floral Crest -->
        <div class="relative z-10 w-full pt-1 flex flex-col items-center">
            <div class="relative w-20 sm:w-24 aspect-[3/4] mx-auto my-1">
                <div class="w-full h-full rounded-t-[48px] rounded-b-md overflow-hidden border-[1.5px] border-[#DDA74F] shadow-lg bg-[#1F1D1B]">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=400&auto=format&fit=crop&q=80" 
                         alt="" 
                         class="w-full h-full object-cover">
                </div>
                <!-- Floral Crest Wrapping Bottom of Arch -->
                <div class="absolute -bottom-3 -left-3 -right-3 pointer-events-none z-10 drop-shadow-md">
                    <img src="/images/themes/serenade-amber/floral-crest.png" alt="" class="w-full h-auto object-contain">
                </div>
            </div>

            <!-- "The Wedding Of" -->
            <span class="text-[6.5px] sm:text-[7.5px] tracking-[0.25em] uppercase text-[#E8C37D] font-semibold pt-1 leading-none font-serif">
                THE WEDDING OF
            </span>

            <!-- Couple Script Names -->
            <div class="space-y-0.5 text-center pt-0.5">
                <h4 class="text-base sm:text-lg text-[#F2D59B] font-normal leading-tight drop-shadow-sm tracking-wide" style="font-family: 'Great Vibes', cursive;">
                    Putra &amp; Putri
                </h4>
            </div>
        </div>

        <!-- Center Recipient Text -->
        <div class="relative z-10 w-full px-1 my-auto text-center space-y-0.5">
            <p class="text-[5.5px] sm:text-[6.5px] italic text-[#C4B5A5] font-serif">
                Kepada Yth :
            </p>
            <p class="text-[8.5px] sm:text-[9.5px] font-bold text-[#FAF5EC] font-serif leading-tight">
                Nama Tamu
            </p>
            <p class="text-[5px] sm:text-[6px] text-[#C4B5A5] font-serif">
                Ditempat
            </p>
        </div>

        <!-- Bottom Buka Undangan CTA Button -->
        <div class="relative z-10 w-full space-y-1.5 pb-0.5">
            <div class="w-full py-1.5 px-3 rounded-md bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] text-[#161514] font-bold text-[7px] sm:text-[8px] shadow-md flex items-center justify-center gap-1.5 uppercase tracking-wider font-serif">
                <svg class="w-2.5 h-2.5 text-[#161514]" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                <span>BUKA UNDANGAN</span>
            </div>

            <!-- Home Bar Indicator -->
            <div class="w-10 sm:w-12 h-0.5 bg-[#DDA74F]/40 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme16)
    <!-- THEME 16 BESPOKE SCREEN: EXACT REPLICA OF PREMIUM MUSEUM OF LOVE REAL COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2 sm:p-2.5 relative overflow-hidden select-none text-[#2A1F1D] font-serif shadow-inner"
         style="background-color: #F7F2E8; background-image: radial-gradient(ellipse at 50% 0%, rgba(255, 246, 219, 0.95) 0%, rgba(255, 238, 190, 0.45) 45%, transparent 80%);">
        
        <!-- Left Hanging Wall Sconce Lantern -->
        <div class="absolute top-1 left-1.5 w-7 sm:w-8.5 pointer-events-none z-20 drop-shadow-[0_4px_10px_rgba(234,179,8,0.45)]">
            <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="" class="w-full h-auto object-contain">
        </div>

        <!-- Right Hanging Wall Sconce Lantern -->
        <div class="absolute top-1 right-1.5 w-7 sm:w-8.5 pointer-events-none z-20 drop-shadow-[0_4px_10px_rgba(234,179,8,0.45)]">
            <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="" class="w-full h-auto object-contain -scale-x-100">
        </div>

        <!-- Center Couple Portrait in Arched Baroque Gold Frame -->
        <div class="relative z-10 w-full pt-1 flex flex-col items-center">
            <div class="relative w-22 sm:w-26 aspect-[338/441] mx-auto mt-1 sm:mt-1.5 drop-shadow-[0_8px_20px_rgba(0,0,0,0.32)]">
                <!-- Photo Aperture inside Arch Frame -->
                <div class="absolute overflow-hidden bg-[#241A15]" style="left: 9.2%; top: 9.3%; width: 79.3%; height: 80%; border-radius: 46% 46% 4px 4px;">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=500&auto=format&fit=crop&q=80" 
                         alt="Rian & Maya" 
                         class="w-full h-full object-cover">
                </div>
                <!-- Arched Baroque Gold Frame Overlay -->
                <img src="{{ asset('images/themes/museum-love/arch-frame.png') }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10">
            </div>

            <!-- "MUSEUM OF LOVE" Badge -->
            <div class="pt-1.5 text-center">
                <span class="inline-block px-3 py-0.5 rounded-sm bg-[#8B1E22]/10 border border-[#D4AF37]/60 text-[#8B1E22] text-[7px] sm:text-[8px] tracking-[0.3em] uppercase font-bold shadow-2xs">
                    MUSEUM OF LOVE
                </span>
            </div>

            <!-- Couple Names: RIAN & MAYA -->
            <div class="space-y-0 text-center pt-0.5">
                <h4 class="text-base sm:text-lg text-[#8B1E22] font-bold tracking-wider leading-tight drop-shadow-2xs">
                    RIAN <span class="text-[#D4AF37] font-normal">&amp;</span> MAYA
                </h4>
            </div>
        </div>

        <!-- Center Recipient Text Card -->
        <div class="relative z-10 w-full px-1 my-auto text-center space-y-0.5">
            <p class="text-[6px] sm:text-[7px] tracking-[0.2em] uppercase text-[#6B5A55] font-serif font-semibold">
                KEPADA YTH. TAMU UNDANGAN:
            </p>
            <p class="text-[9px] sm:text-[10px] font-bold text-[#2A1F1D] font-serif tracking-wide leading-tight">
                BUDI SANTOSO &amp; PASANGAN
            </p>
            <p class="text-[6px] sm:text-[7px] uppercase tracking-wider text-[#6B5A55] font-serif">
                DI TEMPAT
            </p>
        </div>

        <!-- Bottom Buka Undangan CTA Button & SimpulTemu Brand -->
        <div class="relative z-10 w-full space-y-1 pb-0.5 text-center">
            <!-- Buka Undangan Button with Book Icon -->
            <div class="w-full max-w-[130px] sm:max-w-[145px] mx-auto py-1.5 px-3 rounded-md bg-gradient-to-r from-[#8B1E22] via-[#A82B30] to-[#701518] text-white font-serif font-bold text-[7.5px] sm:text-[8.5px] tracking-[0.18em] uppercase shadow-[0_4px_15px_rgba(139,30,34,0.45)] border border-[#D4AF37] flex items-center justify-center gap-1.5 cursor-pointer">
                <svg class="w-2.5 h-2.5 text-[#F3D89A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <span>BUKA UNDANGAN</span>
            </div>

            <!-- Brand Footer -->
            <p class="text-[5.5px] sm:text-[6.5px] text-[#6B5A55]/80 uppercase tracking-widest font-serif pt-0.5">
                SIMPULTEMU &copy; 2026
            </p>

            <!-- Home Bar Indicator -->
            <div class="w-10 sm:w-12 h-0.5 bg-[#8B1E22]/30 rounded-full mx-auto pointer-events-none mt-0.5"></div>
        </div>
    </div>
    @elseif($isTheme13)
    <!-- THEME 13 BESPOKE SCREEN: EXACT REPLICA OF PREMIUM SUMMER VIBES REAL COVER (REFERENCE IMAGE 1) -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-center items-center p-2 sm:p-2.5 relative overflow-hidden select-none text-[#1E293B] shadow-inner"
         style="background-color: #EDE8DF; font-family: 'Plus Jakarta Sans', sans-serif;">
        
        <!-- Ticket Card Frame -->
        <div class="w-full h-full rounded-[1.2rem] sm:rounded-[1.4rem] border-[1.5px] border-dashed border-[#1D63B8] bg-[#FAF8F5] shadow-md flex flex-col justify-between overflow-hidden relative">
            
            <!-- Solid Blue Header Banner -->
            <div class="w-full bg-[#1D63B8] text-white py-1 px-2 text-center shrink-0">
                <span class="font-serif text-[6.5px] sm:text-[7.5px] font-bold tracking-[0.2em] uppercase">
                    WEDDING INVITATION
                </span>
            </div>

            <!-- Inner Content -->
            <div class="p-1.5 sm:p-2 text-center flex flex-col justify-between flex-1 relative overflow-hidden">
                <!-- Top-Right Scalloped Cloud Accent on Stamp -->
                <div class="absolute top-0 right-0 w-8 h-6 bg-[#1D63B8]/15 rounded-bl-2xl pointer-events-none z-0"></div>

                <!-- Center Couple Portrait in Postage Stamp Frame -->
                <div class="relative w-16 sm:w-20 aspect-[682/1024] mx-auto mt-0.5 drop-shadow-[0_4px_12px_rgba(29,99,184,0.2)] z-10">
                    <div class="absolute overflow-hidden rounded-[2px] bg-[#EDE8DF]" style="left: 9.7%; top: 7.8%; width: 80.6%; height: 84.0%;">
                        <img src="{{ asset('images/themes/summer-vibes/dea-dion-couple.jpg') }}" 
                             alt="Dea & Dion" 
                             class="w-full h-full object-cover">
                    </div>
                    <img src="{{ asset('images/themes/summer-vibes/stamp-frame.png') }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10">
                </div>

                <!-- Couple Names: Dea & Dion with 3D Hibiscus Ampersand -->
                <div class="space-y-0 text-center py-0.5 z-10">
                    <h4 class="text-[11px] sm:text-[13px] text-[#D94B26] font-normal leading-none" style="font-family: 'Shrikhand', 'Titan One', cursive;">
                        Dea
                    </h4>
                    <div class="w-4 sm:w-5 mx-auto my-0.5">
                        <img src="{{ asset('images/themes/summer-vibes/ampersand-hibiscus.png') }}" alt="&amp;" class="w-full h-auto object-contain">
                    </div>
                    <h4 class="text-[11px] sm:text-[13px] text-[#D94B26] font-normal leading-none" style="font-family: 'Shrikhand', 'Titan One', cursive;">
                        Dion
                    </h4>
                </div>

                <!-- Event Date in Cobalt Blue -->
                <p class="text-[5.5px] sm:text-[6.5px] font-bold text-[#1D63B8] tracking-widest uppercase z-10">
                    Thursday, 31 December 2026
                </p>

                <!-- Blue Pill Button: Open Invitation matching Reference Image 1 -->
                <div class="pt-0.5 pb-0.5 z-10">
                    <div class="w-full max-w-[105px] sm:max-w-[120px] mx-auto py-1 px-2 rounded-full bg-[#1D63B8] text-white font-bold text-[6px] sm:text-[7px] tracking-[0.14em] shadow-xs flex items-center justify-center gap-1 cursor-pointer">
                        <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                        <span>Open Invitation</span>
                    </div>
                </div>

                <!-- Guest Card Divider & Name -->
                <div class="w-full max-w-[140px] mx-auto text-center pt-0.5 space-y-0 border-t border-[#D94B26]/25 z-10">
                    <p class="text-[5px] sm:text-[6px] tracking-wider uppercase text-slate-500 font-semibold leading-tight">
                        To: Yth. Bapak/Ibu/Saudara/i
                    </p>
                    <p class="font-serif text-[6.5px] sm:text-[7.5px] font-bold text-[#D94B26] tracking-wide truncate">
                        Agus Budiardjo
                    </p>
                </div>

                <!-- Bottom Thin Horizontal Accent Line with Diamond -->
                <div class="w-full max-w-[120px] mx-auto pt-0.5 flex items-center justify-center gap-1 opacity-60 z-10">
                    <div class="h-[0.5px] flex-1 bg-[#D94B26]"></div>
                    <div class="w-1 h-1 rotate-45 bg-[#D94B26]"></div>
                    <div class="h-[0.5px] flex-1 bg-[#D94B26]"></div>
                </div>
            </div>
        </div>
    </div>
    @elseif($isTheme18)
    <!-- THEME 18 BESPOKE SCREEN: EXACT REPLICA OF PREMIUM CRAYON DREAMS COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-center items-center p-2 sm:p-2.5 relative overflow-hidden select-none text-[#4A3E3D] shadow-inner"
         style="background-image: url('{{ asset("images/themes/crayon-dreams/bg-crayon-texture.jpg") }}'); background-size: cover; background-position: center; font-family: 'Comic Neue', cursive, sans-serif;">
        
        <!-- Ticket Card Frame -->
        <div class="w-full h-full rounded-[1.2rem] sm:rounded-[1.4rem] border-[1.5px] border-dashed border-[#E85A4F] bg-[#FFFDF7] shadow-md flex flex-col justify-between overflow-hidden relative p-2 text-center">
            
            <!-- Top Lovebirds Header Banner -->
            <div class="w-16 sm:w-20 mx-auto pointer-events-none">
                <img src="{{ asset('images/themes/crayon-dreams/lovebirds.png') }}" alt="" class="w-full h-auto object-contain">
            </div>

            <!-- Capsule Header -->
            <div class="space-y-0.5">
                <span class="inline-block px-2.5 py-0.5 rounded-full bg-[#E85A4F]/10 border border-[#E85A4F]/30 text-[#E85A4F] text-[6.5px] sm:text-[7.5px] font-bold tracking-[0.2em] uppercase"
                      style="font-family: 'Patrick Hand', 'Comic Neue', cursive;">
                    WEDDING INVITATION
                </span>
            </div>

            <!-- Center Couple Portrait in Crayon Frame with Bow & Clouds -->
            <div class="relative w-20 sm:w-24 aspect-[3/4] mx-auto drop-shadow-sm">
                <div class="absolute inset-[10%] overflow-hidden rounded-[8px] bg-[#FEF9ED]">
                    <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=400&auto=format&fit=crop&q=80" 
                         alt="Azalia & Dias" 
                         class="w-full h-full object-cover">
                </div>
                <img src="{{ asset('images/themes/crayon-dreams/crayon-frame.png') }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10">
            </div>

            <!-- Couple Names: Azalia & Dias -->
            <div class="space-y-0 text-center">
                <h4 class="text-[13px] sm:text-[15px] text-[#8B2635] font-bold leading-tight" style="font-family: 'Patrick Hand', 'Comic Neue', cursive;">
                    Azalia <span class="text-[#E85A4F]">&amp;</span> Dias
                </h4>
                <p class="text-[5.5px] sm:text-[6.5px] font-bold text-[#8C7E7A] tracking-wider">
                    Sabtu, 14 November 2026
                </p>
            </div>

            <!-- Coral Pill Button: Buka Undangan -->
            <div class="pt-0.5 pb-0.5 z-10">
                <div class="w-full max-w-[105px] sm:max-w-[120px] mx-auto py-1 px-2 rounded-full bg-[#E85A4F] text-white font-bold text-[6.5px] sm:text-[7.5px] tracking-wider shadow-xs flex items-center justify-center gap-1 cursor-pointer"
                     style="font-family: 'Patrick Hand', 'Comic Neue', cursive;">
                    <svg class="w-2 h-2 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span>Buka Undangan</span>
                </div>
            </div>

            <!-- Guest Card Divider & Name -->
            <div class="w-full max-w-[130px] mx-auto text-center pt-0.5 space-y-0 border-t border-dashed border-[#E85A4F]/30 z-10">
                <p class="text-[5px] sm:text-[6px] tracking-wider uppercase text-[#8C7E7A] font-semibold leading-tight">
                    Kepada Yth:
                </p>
                <p class="text-[6.5px] sm:text-[7.5px] font-bold text-[#8B2635] tracking-wide truncate"
                   style="font-family: 'Patrick Hand', 'Comic Neue', cursive;">
                    Budi Santoso &amp; Pasangan
                </p>
            </div>

        </div>
    </div>
    @elseif($isTheme6)
    <!-- THEME 6 BESPOKE SCREEN: EXACT REPLICA OF BASIC SOFT BLUE BOTANICAL COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-center items-center p-2 sm:p-2.5 relative overflow-hidden select-none text-slate-800 shadow-inner bg-[#F4F8FC]">
        
        <!-- Ticket Card Frame with Soft Blue & Botanical Accent -->
        <div class="w-full h-full rounded-[1.2rem] sm:rounded-[1.4rem] border border-[#1B365D]/20 bg-white shadow-sm flex flex-col justify-between overflow-hidden relative p-2 text-center">
            
            <!-- Corner Botanical Leaf Branches (Top Left & Top Right) -->
            <div class="absolute -top-1.5 -left-1.5 w-7.5 pointer-events-none z-20 opacity-90">
                <img src="{{ asset('images/themes/soft-blue-botanical/corner-top-left.png') }}" alt="" class="w-full h-auto object-contain">
            </div>
            <div class="absolute -top-1.5 -right-1.5 w-7.5 pointer-events-none z-20 opacity-90">
                <img src="{{ asset('images/themes/soft-blue-botanical/corner-top-right.png') }}" alt="" class="w-full h-auto object-contain">
            </div>

            <!-- Soft Pastel Yellow Ambient Glow Behind -->
            <div class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-[#FDEEB5]/60 -z-0 pointer-events-none"></div>

            <!-- Top Badge Banner -->
            <div class="w-full pt-0.5 z-10">
                <span class="inline-block px-2 py-0.5 rounded-full bg-[#E5EFF7] text-[#1B365D] text-[5.5px] sm:text-[6.5px] font-bold tracking-[0.2em] uppercase">
                    WEDDING INVITATION
                </span>
            </div>

            <!-- Arch Framed Couple Portrait -->
            <div class="relative w-18 sm:w-20 aspect-[3/4] mx-auto p-0.5 bg-white rounded-t-[22px] rounded-b-md shadow-xs border border-[#1B365D]/20 z-10">
                <div class="w-full h-full overflow-hidden rounded-t-[20px] rounded-b-sm bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=400&auto=format&fit=crop&q=80" 
                         alt="Putri & Putra" 
                         class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Couple Names: Putri & Putra -->
            <div class="space-y-0 text-center z-10">
                <h4 class="text-[13px] sm:text-[15px] text-[#1B365D] leading-tight font-normal" style="font-family: 'Alex Brush', cursive;">
                    Putri <span class="text-[#2C4F77]">&amp;</span> Putra
                </h4>
                <p class="text-[5px] sm:text-[6px] font-medium text-slate-500 tracking-wider">
                    Senin, 11 Januari 2027
                </p>
            </div>

            <!-- Mini 4 Pastel Yellow Countdown Circles (SVG Protected from Browser Minimum Font-Size Clamping) -->
            <div class="w-full max-w-[125px] sm:max-w-[135px] mx-auto z-10 py-0.5">
                <svg viewBox="0 0 160 36" class="w-full h-auto" xmlns="http://www.w3.org/2000/svg">
                    <!-- Circle 1: Hari -->
                    <circle cx="20" cy="18" r="16" fill="#FDEEB5" stroke="#E6D396" stroke-width="0.8"/>
                    <text x="20" y="16" text-anchor="middle" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" font-size="11" fill="#1B365D">12</text>
                    <text x="20" y="27" text-anchor="middle" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" font-size="6.5" fill="#2C4F77" letter-spacing="0.5">HARI</text>

                    <!-- Circle 2: Jam -->
                    <circle cx="60" cy="18" r="16" fill="#FDEEB5" stroke="#E6D396" stroke-width="0.8"/>
                    <text x="60" y="16" text-anchor="middle" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" font-size="11" fill="#1B365D">08</text>
                    <text x="60" y="27" text-anchor="middle" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" font-size="6.5" fill="#2C4F77" letter-spacing="0.5">JAM</text>

                    <!-- Circle 3: Menit -->
                    <circle cx="100" cy="18" r="16" fill="#FDEEB5" stroke="#E6D396" stroke-width="0.8"/>
                    <text x="100" y="16" text-anchor="middle" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" font-size="11" fill="#1B365D">45</text>
                    <text x="100" y="27" text-anchor="middle" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" font-size="6.5" fill="#2C4F77" letter-spacing="0.5">MEN</text>

                    <!-- Circle 4: Detik -->
                    <circle cx="140" cy="18" r="16" fill="#FDEEB5" stroke="#E6D396" stroke-width="0.8"/>
                    <text x="140" y="16" text-anchor="middle" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" font-size="11" fill="#1B365D">20</text>
                    <text x="140" y="27" text-anchor="middle" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" font-size="6.5" fill="#2C4F77" letter-spacing="0.5">DET</text>
                </svg>
            </div>

            <!-- Navy Pill Button: Buka Undangan -->
            <div class="pt-0.5 z-10">
                <div class="w-full max-w-[105px] sm:max-w-[120px] mx-auto py-1 px-2 rounded-full bg-[#1B365D] text-white font-bold text-[6.5px] sm:text-[7.5px] tracking-wider shadow-xs flex items-center justify-center gap-1 cursor-pointer">
                    <svg class="w-2 h-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Buka Undangan</span>
                </div>
            </div>

            <!-- Guest Card Divider & Name -->
            <div class="w-full max-w-[130px] mx-auto text-center pt-0.5 space-y-0 border-t border-slate-200 z-10">
                <p class="text-[4.5px] sm:text-[5.5px] tracking-wider uppercase text-slate-400 font-semibold leading-tight">
                    Kepada Yth:
                </p>
                <p class="text-[6px] sm:text-[7px] font-bold text-[#1B365D] tracking-wide truncate">
                    Budi Santoso &amp; Pasangan
                </p>
            </div>

        </div>
    </div>
    @elseif($isTheme17)
    <!-- THEME 17 BESPOKE SCREEN: EXACT REPLICA OF PREMIUM ETHEREAL BLOOM REAL COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between items-center p-2.5 sm:p-3 relative overflow-hidden select-none text-slate-800 shadow-inner"
         style="background-image: url('{{ asset('images/themes/ethereal-bloom/bg-watercolor-portrait.jpg') }}'); background-size: cover; background-position: center;">
        
        <!-- Subtle Top Garland -->
        <div class="w-24 sm:w-28 mx-auto pointer-events-none drop-shadow-xs">
            <img src="{{ asset('images/themes/ethereal-bloom/floral-header-garland.png') }}" alt="" class="w-full h-auto object-contain">
        </div>

        <div class="space-y-0 text-center">
            <p class="text-[6px] sm:text-[7px] font-bold tracking-[0.25em] uppercase text-[#1D4ED8]">
                WEDDING INVITATION
            </p>
        </div>

        <!-- Center Couple Portrait in Round Floral Frame -->
        <div class="relative w-20 h-20 sm:w-24 sm:h-24 mx-auto flex items-center justify-center my-0.5">
            <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-full overflow-hidden shadow-md ring-2 ring-white -translate-y-1 sm:-translate-y-1.5">
                <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=400&auto=format&fit=crop&q=80" 
                     alt="Justin & Sisca" 
                     class="w-full h-full object-cover">
            </div>
            <img src="{{ asset('images/themes/ethereal-bloom/floral-frame-round.png') }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10">
        </div>

        <!-- Couple Names -->
        <div class="space-y-0 text-center">
            <h4 class="text-[15px] sm:text-[17px] text-[#1D4ED8] leading-tight font-normal" style="font-family: 'Alex Brush', cursive;">
                Justin <span class="text-[#2563EB]">&amp;</span> Sisca
            </h4>
            <p class="text-[5.5px] sm:text-[6.5px] font-semibold text-slate-500 tracking-wider">
                Anggara, 04 Maret 2025
            </p>
        </div>

        <!-- 4 Countdown Boxes: DAY, HR, MIN, SEC -->
        <div class="grid grid-cols-4 gap-1 w-full max-w-[140px] mx-auto text-white font-mono text-center">
            <div class="bg-[#3B82F6] rounded-md py-1 px-0.5 shadow-xs">
                <span class="block text-[8px] sm:text-[9px] font-bold leading-none">00</span>
                <span class="text-[4.5px] uppercase tracking-wider text-blue-100 font-sans block scale-90">DAY</span>
            </div>
            <div class="bg-[#3B82F6] rounded-md py-1 px-0.5 shadow-xs">
                <span class="block text-[8px] sm:text-[9px] font-bold leading-none">00</span>
                <span class="text-[4.5px] uppercase tracking-wider text-blue-100 font-sans block scale-90">HR</span>
            </div>
            <div class="bg-[#3B82F6] rounded-md py-1 px-0.5 shadow-xs">
                <span class="block text-[8px] sm:text-[9px] font-bold leading-none">00</span>
                <span class="text-[4.5px] uppercase tracking-wider text-blue-100 font-sans block scale-90">MIN</span>
            </div>
            <div class="bg-[#3B82F6] rounded-md py-1 px-0.5 shadow-xs">
                <span class="block text-[8px] sm:text-[9px] font-bold leading-none">00</span>
                <span class="text-[4.5px] uppercase tracking-wider text-blue-100 font-sans block scale-90">SEC</span>
            </div>
        </div>

        <!-- Blue Pill Button: Buka Undangan -->
        <div class="w-full max-w-[110px] sm:max-w-[125px] mx-auto py-1 px-2 rounded-full bg-[#1D4ED8] text-white font-bold text-[6.5px] sm:text-[7.5px] tracking-wider shadow-xs flex items-center justify-center gap-1 cursor-pointer">
            <svg class="w-2 h-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span>Buka Undangan</span>
        </div>

        <!-- Floral Bottom Bicycle Border -->
        <div class="w-24 sm:w-28 mx-auto -mb-1 pointer-events-none opacity-85">
            <img src="{{ asset('images/themes/ethereal-bloom/floral-footer-bicycle.png') }}" alt="" class="w-full h-auto object-contain">
        </div>

    </div>
    @elseif($isTheme7)
    <!-- THEME 7 BESPOKE SCREEN: EXACT REPLICA OF BASIC LILAC BLOOMS REAL COVER (ATTACHMENT 6) -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between items-center p-2.5 sm:p-3 relative overflow-hidden select-none text-slate-800 shadow-inner"
         style="background-image: url('{{ asset('images/themes/lilac-blooms/bg-floral-portrait.jpg') }}'); background-size: cover; background-position: center;">

        <!-- Top Header -->
        <div class="space-y-0.5 text-center pt-1">
            <p class="text-[6px] sm:text-[7px] font-bold tracking-[0.25em] uppercase text-[#4A2E76]">
                THE WEDDING OF
            </p>
        </div>

        <!-- Center Couple Cartoon in Soft Watercolor Circle -->
        <div class="relative w-20 h-20 sm:w-24 sm:h-24 mx-auto flex items-center justify-center my-0.5">
            <img src="{{ asset('images/themes/lilac-blooms/couple-cartoon.png') }}" 
                 alt="Mita & Angga" 
                 class="w-full h-full object-contain drop-shadow-sm">
        </div>

        <!-- Couple Names & Date -->
        <div class="space-y-0 text-center">
            <h4 class="text-[15px] sm:text-[17px] text-[#4A2E76] leading-tight font-normal" style="font-family: 'Alex Brush', cursive;">
                Mita <span class="text-[#7E57C2]">&amp;</span> Angga
            </h4>
            <p class="text-[5.5px] sm:text-[6.5px] font-semibold text-slate-600 tracking-wider">
                Sabtu, 30 Desember 2023
            </p>
        </div>

        <!-- 4 Countdown Boxes: Hari, Jam, Menit, Detik in Purple Pill Boxes -->
        <div class="grid grid-cols-4 gap-1 w-full max-w-[140px] mx-auto text-white font-mono text-center">
            <div class="bg-[#5C3D8D] rounded-md py-1 px-0.5 shadow-xs">
                <span class="block text-[8px] sm:text-[9px] font-bold leading-none">00</span>
                <span class="text-[4.5px] uppercase tracking-wider text-purple-200 font-sans block scale-90">Hari</span>
            </div>
            <div class="bg-[#5C3D8D] rounded-md py-1 px-0.5 shadow-xs">
                <span class="block text-[8px] sm:text-[9px] font-bold leading-none">00</span>
                <span class="text-[4.5px] uppercase tracking-wider text-purple-200 font-sans block scale-90">Jam</span>
            </div>
            <div class="bg-[#5C3D8D] rounded-md py-1 px-0.5 shadow-xs">
                <span class="block text-[8px] sm:text-[9px] font-bold leading-none">00</span>
                <span class="text-[4.5px] uppercase tracking-wider text-purple-200 font-sans block scale-90">Menit</span>
            </div>
            <div class="bg-[#5C3D8D] rounded-md py-1 px-0.5 shadow-xs">
                <span class="block text-[8px] sm:text-[9px] font-bold leading-none">00</span>
                <span class="text-[4.5px] uppercase tracking-wider text-purple-200 font-sans block scale-90">Detik</span>
            </div>
        </div>

        <!-- Purple Pill Button: Save to Calendar / Buka Undangan -->
        <div class="w-full max-w-[110px] sm:max-w-[125px] mx-auto py-1 px-2 rounded-full bg-[#5C3D8D] text-white font-bold text-[6.5px] sm:text-[7.5px] tracking-wider shadow-xs flex items-center justify-center gap-1 cursor-pointer">
            <svg class="w-2 h-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span>Save to Calendar</span>
        </div>

        <!-- Bottom Purple Strip with Ayat Preview -->
        <div class="w-full bg-[#A890C3]/35 rounded-lg py-1 px-1.5 text-center -mb-1">
            <p class="text-[4.5px] sm:text-[5px] text-[#3B2359] italic leading-tight truncate">
                Dan di antara tanda-tanda kekuasaan-Nya... (QS. Ar-Rum: 21)
            </p>
        </div>

    </div>
    @elseif($isTheme19)
    <!-- THEME 19 BESPOKE SCREEN: EXACT REPLICA OF PREMIUM SAHALA PATTERN COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2.5 sm:p-3 relative overflow-hidden select-none text-white font-serif"
         style="background-color: #42070D; background-image: linear-gradient(180deg, rgba(66, 7, 13, 0.9) 0%, rgba(80, 10, 18, 0.85) 50%, rgba(50, 5, 10, 0.95) 100%), url('/images/themes/sahala-pattern/bg-cultural-damask.jpg'); background-size: cover; background-position: center;">
        
        <!-- Top Floating Rumah Adat & Header -->
        <div class="relative z-10 w-full pt-1 flex flex-col items-center space-y-0.5">
            <div class="w-8 sm:w-10 mx-auto pointer-events-none drop-shadow-md">
                <img src="/images/themes/sahala-pattern/rumah-adat-gold.png" alt="" class="w-full h-auto object-contain">
            </div>

            <span class="text-[7px] sm:text-[7.5px] tracking-[0.25em] uppercase text-amber-200 font-semibold font-serif leading-none">
                THE WEDDING OF
            </span>

            <!-- Couple Serif Names & Date -->
            <div class="space-y-0.5 text-center">
                <h4 class="font-serif text-base sm:text-lg text-white font-bold leading-tight drop-shadow-md tracking-wide">
                    Arina &amp; Bagas
                </h4>
                <p class="text-[6px] sm:text-[7px] tracking-[0.22em] uppercase text-amber-200 font-semibold font-serif">
                    MINGGU, 10 JANUARI 2027
                </p>
            </div>
        </div>

        <!-- Center Framed Photo with Photo Frame -->
        <div class="relative z-10 w-24 sm:w-28 aspect-[447/558] mx-auto my-auto shadow-xl">
            <div class="absolute inset-[10%] rounded-xs overflow-hidden bg-black/30">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=400&auto=format&fit=crop&q=80" alt="Couple" class="w-full h-full object-cover">
            </div>
            <img src="/images/themes/sahala-pattern/photo-frame.png" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10">
        </div>

        <!-- Center Frosted Recipient Card -->
        <div class="relative z-10 w-full px-1 my-auto">
            <div class="rounded-xl bg-black/55 backdrop-blur-md border border-[#E5A93C]/40 p-2 sm:p-2.5 shadow-xl space-y-0.5 text-center">
                <p class="text-[5.5px] sm:text-[6.5px] tracking-[0.16em] uppercase text-amber-200 font-serif font-semibold">
                    KEPADA YTH. BAPAK/IBU/SAUDARA/I:
                </p>
                <p class="text-[9.5px] sm:text-[10.5px] font-bold text-white font-serif leading-tight">
                    BUDI SANTOSO &amp; PASANGAN
                </p>
                <p class="text-[5px] sm:text-[6px] italic text-amber-200/70 font-serif">
                    *Mohon maaf apabila ada kesalahan penulisan nama/gelar
                </p>
            </div>
        </div>

        <!-- Bottom Buka Undangan Button & Ribbon -->
        <div class="relative z-10 w-full space-y-1.5 pb-0.5">
            <!-- Buka Undangan Pill Button -->
            <div class="w-full py-1.5 px-3 rounded-full bg-gradient-to-r from-[#B8860B] via-[#E5A93C] to-[#B8860B] text-[#3A0409] font-bold text-[7.5px] sm:text-[8.5px] shadow-md flex items-center justify-center gap-1.5 uppercase tracking-wider font-serif">
                <svg class="w-2.5 h-2.5 text-[#3A0409]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span>BUKA UNDANGAN</span>
            </div>

            <!-- Home Bar Indicator -->
            <div class="w-10 sm:w-12 h-0.5 bg-amber-200/40 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme1)
    <!-- THEME 1 BESPOKE SCREEN: EXACT REPLICA OF BASIC HARMONY MAROON COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2.5 sm:p-3 relative overflow-hidden select-none text-white font-serif"
         style="background-image: linear-gradient(180deg, rgba(74, 5, 12, 0.78) 0%, rgba(55, 4, 9, 0.65) 40%, rgba(40, 4, 8, 0.95) 100%), url('https://images.unsplash.com/photo-1519741497674-611481863552?w=500&auto=format&fit=crop&q=80'); background-size: cover; background-position: center;">
        
        <!-- Top Right: Undangan Pernikahan & Couple Names -->
        <div class="relative z-10 w-full text-right pt-1.5 space-y-0.5">
            <p class="text-[6.5px] sm:text-[7.5px] text-white/90 tracking-wide font-medium font-serif">
                Undangan Pernikahan
            </p>
            <h3 class="font-serif text-sm sm:text-base text-white font-bold tracking-tight leading-tight">
                Rian &amp; Maya
            </h3>
        </div>

        <!-- Middle Left: Kepada Guest Name -->
        <div class="relative z-10 w-full text-left my-auto px-1 space-y-0.5">
            <p class="text-[6.5px] sm:text-[7.5px] text-white/80 font-light font-serif">
                Kepada:
            </p>
            <h4 class="font-serif text-xs sm:text-sm font-bold text-white tracking-wide leading-tight">
                Budi Santoso &amp; Pasangan
            </h4>
        </div>

        <!-- Bottom Right: Date, Line Divider, Pill Button -->
        <div class="relative z-10 w-full pb-0.5 flex flex-col items-end text-right space-y-1.5">
            <p class="font-serif text-[6.5px] sm:text-[7.5px] text-white/95 tracking-wide font-medium">
                12 Desember 2026
            </p>
            <div class="w-24 sm:w-28 h-[1px] bg-white/70"></div>
            <div class="px-3.5 sm:px-4 py-1.5 rounded-full bg-[#FFDADA] text-[#620000] font-serif font-bold text-[7.5px] sm:text-[8.5px] tracking-wide shadow-md flex items-center justify-center gap-1.5">
                <span>Buka Undangan</span>
            </div>
            <div class="w-10 sm:w-12 h-0.5 bg-white/40 rounded-full mx-auto mt-1 pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme2)
    <!-- THEME 2 BESPOKE SCREEN: EXACT REPLICA OF BASIC HARMONY EMERALD COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2.5 sm:p-3 relative overflow-hidden select-none bg-[#FAFCFA] text-stone-800 font-sans">
        <!-- Top Header: Couple Names in Tracked Uppercase on White Canvas -->
        <div class="relative z-10 w-full pt-1.5 text-center">
            <p class="text-[7.5px] sm:text-[8.5px] tracking-[0.25em] uppercase text-stone-700 font-bold font-serif leading-none">
                RIAN &amp; MAYA
            </p>
        </div>

        <!-- Center Asymmetric Emerald Card with Double Gold Border -->
        <div class="relative z-10 w-full px-0.5 my-auto">
            <div class="w-full rounded-tr-[28px] rounded-tl-xl rounded-b-xl shadow-lg bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-2 border border-[#D4AF37]/50">
                <div class="border border-[#D4AF37]/50 rounded-tr-[22px] rounded-tl-lg rounded-b-lg py-3 px-2 text-center flex flex-col items-center justify-center space-y-2">
                    <!-- Gold Interlocking Rings Divider -->
                    <div class="w-20 sm:w-24 h-4 mx-auto pointer-events-none">
                        <img src="/images/themes/bg/emerald-interlocking-rings.svg" alt="" class="w-full h-full object-contain">
                    </div>

                    <!-- Recipient Greeting Header -->
                    <div class="space-y-0.5">
                        <p class="text-[5.5px] sm:text-[6.5px] font-semibold tracking-[0.22em] uppercase text-[#E5C158] font-sans">
                            KEPADA YTH
                        </p>
                        <p class="font-serif text-[9px] sm:text-[10px] font-bold text-white tracking-wide leading-tight">
                            Budi Santoso &amp; Pasangan
                        </p>
                    </div>

                    <!-- Buka Undangan CTA Button with Gold Metallic Gradient -->
                    <div class="w-full pt-0.5">
                        <div class="w-full py-1.5 px-2 rounded-full bg-gradient-to-r from-[#9C782F] via-[#C59B3F] to-[#8F6C25] border border-[#F3E196]/80 text-white font-bold text-[7px] sm:text-[8px] tracking-wider uppercase shadow-md flex items-center justify-center gap-1 font-sans">
                            <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>BUKA UNDANGAN</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bouncing Chevron Down Icon on White Canvas & Home Bar -->
        <div class="relative z-10 w-full space-y-1.5 pb-0.5">
            <div class="text-[#1E6B52] animate-bounce pointer-events-none">
                <svg class="w-3.5 h-3.5 mx-auto stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
            <div class="w-10 sm:w-12 h-0.5 bg-[#1E6B52]/40 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme3)
    <!-- THEME 3 BESPOKE SCREEN: EXACT REPLICA OF BASIC HARMONY NAVY COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2.5 sm:p-3 relative overflow-hidden select-none text-white font-serif"
         style="background: linear-gradient(180deg, #CBDCE7 0%, #2E4D71 35%, #1E3A5F 100%);">
        
        <!-- Top Layered Organic Waves SVG -->
        <div class="absolute inset-x-0 top-0 w-full pointer-events-none z-0">
            <img src="/images/themes/bg/navy-wave-top.svg" alt="" class="w-full h-12 object-cover object-bottom opacity-90 transform rotate-180">
        </div>

        <!-- Top Title Badge -->
        <div class="relative z-10 pt-1 text-center">
            <span class="inline-block px-2.5 py-0.5 rounded-full text-[6.5px] sm:text-[7.5px] font-semibold tracking-[0.2em] uppercase text-white/95 bg-white/15 backdrop-blur-md border border-white/25">
                THE WEDDING OF
            </span>
        </div>

        <!-- Center Frosted Glassmorphism Card -->
        <div class="relative z-10 w-full px-0.5 my-auto">
            <div class="rounded-xl p-2.5 sm:p-3 bg-white/15 backdrop-blur-md border border-white/25 text-center text-white shadow-xl space-y-1.5">
                <p class="text-[6.5px] sm:text-[7px] tracking-[0.2em] uppercase text-white/80 font-medium font-sans">
                    THE WEDDING OF
                </p>
                <h3 class="font-serif text-sm sm:text-base font-normal text-white tracking-wide leading-tight">
                    Rian &amp; Maya
                </h3>
                <div class="pt-0.5 space-y-0.5 font-sans">
                    <p class="text-[5.5px] sm:text-[6.5px] uppercase tracking-wider text-white/75 font-light">
                        Kepada Yth.
                    </p>
                    <p class="text-[9px] sm:text-[10px] font-bold text-white tracking-wide leading-tight">
                        Budi Santoso &amp; Pasangan
                    </p>
                </div>
                <div class="pt-1">
                    <div class="w-full py-1.5 px-2 rounded-full bg-white/20 border border-white/60 text-white font-bold text-[7px] sm:text-[8px] tracking-wider uppercase shadow-md flex items-center justify-center gap-1 font-sans">
                        <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>Buka Undangan</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Chevron Indicator & Home Bar -->
        <div class="relative z-10 w-full space-y-1.5 pb-0.5">
            <div class="text-white/80 animate-bounce pointer-events-none">
                <svg class="w-3.5 h-3.5 mx-auto stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
            <div class="w-10 sm:w-12 h-0.5 bg-white/40 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme4)
    <!-- Screen Canvas: EXACT MATCH TO THEME 4 (BASIC WANTED POSTER) REAL COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2.5 sm:p-3 relative overflow-hidden select-none bg-[#F5EBE1] text-[#2A1B0E] font-serif"
         style="background-image: url('{{ asset('images/themes/wanted-poster/bg-parchment.jpg') }}'); background-size: cover; background-position: center;">
        
        <!-- Ambient Warm Tint -->
        <div class="absolute inset-0 bg-[#F5EBE1]/25 pointer-events-none"></div>

        <!-- Top Header & Stars -->
        <div class="relative z-10 text-center pt-3 sm:pt-4 space-y-0.5">
            <h4 class="text-[13px] sm:text-[15px] text-[#2A1B0E] font-bold tracking-wider uppercase font-serif"
                style="font-family: 'Pirata One', 'Playfair Display', serif;">
                Wedding Invitation
            </h4>
            <div class="flex items-center justify-center gap-1 text-[7px] text-[#8C6239] leading-none">
                <span>☆</span><span>☆</span><span>☆</span>
            </div>
            <p class="text-[6px] sm:text-[6.5px] font-serif text-[#2A1B0E] font-medium pt-0.5">
                Sunday, 22 February 2026
            </p>
        </div>

        <!-- Center: Framed Couple Photo (Western Wanted Style) -->
        <div class="relative z-10 my-auto py-1 flex flex-col items-center">
            <div class="relative p-1 bg-[#FAF6F0] border-2 border-[#2A1B0E] shadow-md max-w-[125px] sm:max-w-[140px] mx-auto">
                <div class="border border-[#2A1B0E] overflow-hidden aspect-[4/3]">
                    <img src="{{ asset('images/themes/wanted-poster/cover.jpg') }}" alt="Wanted Couple" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Couple Names Stacked -->
            <div class="text-center space-y-0 pt-1 font-serif">
                <p class="text-[11px] sm:text-[12px] font-bold text-[#2A1B0E] leading-tight">Anisa</p>
                <p class="text-[8px] text-[#8C6239] italic font-normal leading-none">&amp;</p>
                <p class="text-[11px] sm:text-[12px] font-bold text-[#2A1B0E] leading-tight">Raden</p>
            </div>
        </div>

        <!-- Bottom: Buka Undangan Button & Guest Name -->
        <div class="relative z-10 w-full text-center space-y-1.5 pb-0.5">
            <div class="w-full max-w-[125px] mx-auto py-1.5 px-3 rounded bg-[#2A1B0E] text-white flex items-center justify-center gap-1.5 text-[7px] sm:text-[8px] font-semibold tracking-wider shadow-sm">
                <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span>Buka Undangan</span>
            </div>

            <!-- Personalized Guest Box -->
            <div class="text-center space-y-0">
                <p class="text-[5.5px] uppercase tracking-wider text-[#705238] font-medium leading-none">To:</p>
                <p class="text-[7.5px] sm:text-[8.5px] font-bold text-[#2A1B0E] tracking-wide truncate">Budi Santoso &amp; Pasangan</p>
            </div>

            <!-- Home Bar Indicator -->
            <div class="w-10 sm:w-12 h-0.5 bg-[#2A1B0E]/30 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme5)
    <!-- THEME 5 BESPOKE SCREEN: EXACT REPLICA OF BASIC HARMONY MONOCHROME COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2.5 sm:p-3 relative overflow-hidden select-none bg-neutral-950 text-white font-serif"
         style="background-image: linear-gradient(180deg, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.85) 100%), url('https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=500&auto=format&fit=crop&q=80'); background-size: cover; background-position: center;">
        <!-- Top Header -->
        <div class="relative z-10 w-full pt-1.5 flex flex-col items-center space-y-1">
            <span class="text-[7.5px] sm:text-[8.5px] tracking-[0.25em] uppercase text-stone-300 font-semibold font-serif leading-none">
                THE WEDDING OF
            </span>
            <h4 class="font-script text-2xl sm:text-3xl text-white font-normal leading-tight drop-shadow-md tracking-wide" style="font-family: 'Great Vibes', cursive;">
                Dilan &amp; Milea
            </h4>
            <p class="text-[6.5px] sm:text-[7.5px] tracking-[0.2em] uppercase text-stone-300 font-serif">
                SABTU, 09 JANUARI 2027
            </p>
        </div>

        <!-- Recipient Card -->
        <div class="relative z-10 w-full px-1 my-auto">
            <div class="rounded-xl bg-black/60 backdrop-blur-md border border-white/25 p-2 sm:p-2.5 shadow-lg space-y-0.5 text-center">
                <p class="text-[5.5px] sm:text-[6.5px] tracking-[0.16em] uppercase text-stone-300 font-serif font-semibold">
                    Kepada Yth. Bapak/Ibu/Saudara/i:
                </p>
                <p class="text-[9.5px] sm:text-[10.5px] font-bold text-white font-serif leading-tight">
                    Budi Santoso &amp; Pasangan
                </p>
                <p class="text-[5px] sm:text-[6px] italic text-stone-300/80 font-serif">
                    *Mohon maaf apabila ada kesalahan penulisan nama/gelar
                </p>
            </div>
        </div>

        <!-- Bottom Buka Undangan Button -->
        <div class="relative z-10 w-full space-y-1.5 pb-0.5">
            <div class="w-full py-1.5 px-3 rounded-full bg-white/20 backdrop-blur-md border border-white/40 text-white font-semibold text-[7.5px] sm:text-[8.5px] shadow-md flex items-center justify-center gap-1.5 uppercase tracking-wider font-serif">
                <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span>BUKA UNDANGAN</span>
            </div>
            <div class="w-10 sm:w-12 h-0.5 bg-white/40 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme8)
    <!-- Screen Canvas: EXACT MATCH TO THEME 8 (BASIC SUNNY BOTANICAL) REAL COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2 sm:p-2.5 relative overflow-hidden select-none bg-[#FFFDF7] text-[#4A3B2C] font-serif">
        <!-- Top Botanical Foliage Hanging Down -->
        <img src="{{ asset('images/themes/sunny-botanical/botanical-top.png') }}" class="absolute top-0 inset-x-0 w-full h-auto max-h-16 object-cover object-top pointer-events-none z-10 opacity-95" alt="">
        
        <!-- Bottom Botanical Foliage Border -->
        <img src="{{ asset('images/themes/sunny-botanical/botanical-bottom.png') }}" class="absolute bottom-0 inset-x-0 w-full h-auto max-h-16 object-cover object-bottom pointer-events-none z-10 opacity-95" alt="">

        <!-- Top Header & Couple Names -->
        <div class="relative z-20 pt-6 sm:pt-7 text-center space-y-0.5">
            <p class="text-[6.5px] sm:text-[7.5px] tracking-[0.25em] uppercase text-[#E67E22] font-semibold">
                THE WEDDING OF
            </p>
            <h4 class="text-[14px] sm:text-[16px] text-[#3D2B1F] font-bold leading-tight tracking-wide">
                Baskara &amp; Anggun
            </h4>
        </div>

        <!-- Center Couple Photo in Elegant Arch Frame -->
        <div class="relative z-20 my-auto flex flex-col items-center">
            <div class="w-20 h-24 sm:w-22 sm:h-26 rounded-t-full rounded-b-xl overflow-hidden p-1 bg-white shadow-md border-2 border-[#E67E22]/35">
                <div class="w-full h-full rounded-t-full rounded-b-lg overflow-hidden bg-amber-50">
                    <img src="{{ asset('images/themes/sunny-botanical/cover.jpg') }}" class="w-full h-full object-cover" alt="Baskara &amp; Anggun">
                </div>
            </div>
        </div>

        <!-- Bottom: Recipient Card & Buka Undangan Button -->
        <div class="relative z-20 w-full space-y-1.5 pb-0.5 text-center">
            <!-- Recipient Box -->
            <div class="bg-white/90 border border-[#E67E22]/25 rounded-xl px-2 py-1 max-w-[140px] mx-auto shadow-2xs space-y-0.5">
                <p class="text-[5.5px] text-[#786C5E] tracking-wider uppercase font-semibold">
                    Kepada Bapak/Ibu/Saudara/i:
                </p>
                <p class="text-[8px] sm:text-[9px] font-bold text-[#3D2B1F] truncate">
                    Budi Santoso &amp; Pasangan
                </p>
            </div>

            <!-- Buka Undangan Button -->
            <div class="w-full max-w-[125px] mx-auto py-1.5 px-3 rounded-full bg-gradient-to-r from-[#E67E22] to-[#F39C12] text-white font-bold text-[7px] sm:text-[8px] tracking-wider uppercase shadow-md flex items-center justify-center gap-1.5">
                <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span>BUKA UNDANGAN</span>
            </div>

            <!-- Home Bar Indicator -->
            <div class="w-10 sm:w-12 h-0.5 bg-stone-300 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme9)
    <!-- Screen Canvas: EXACT MATCH TO THEME 9 (BASIC WHISPERING GARDEN) REAL COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2 sm:p-2.5 relative overflow-hidden select-none bg-[#F4EFEA] text-[#5C3D28] font-serif">
        <!-- Top Garland Foliage -->
        <img src="{{ asset('images/themes/whispering-garden/garland.png') }}" class="absolute top-0 inset-x-0 w-full h-auto max-h-12 object-contain object-top pointer-events-none z-10 opacity-70" alt="">
        <!-- Butterfly Accent -->
        <img src="{{ asset('images/themes/whispering-garden/butterfly.png') }}" class="absolute top-3 right-3 w-4 h-4 object-contain pointer-events-none z-10 opacity-75" alt="">

        <!-- Top Header & Couple Names -->
        <div class="relative z-20 pt-4 sm:pt-5 text-center space-y-0.5">
            <p class="text-[6.5px] sm:text-[7px] tracking-[0.25em] uppercase text-[#785D48] font-semibold">
                The Wedding of
            </p>
            <h4 class="text-[15px] sm:text-[17px] text-[#3D2B1F] italic font-normal leading-tight">
                Dias &amp; Azalia
            </h4>
            <p class="text-[6px] sm:text-[6.5px] tracking-widest text-[#5C3D28] font-medium">
                28 . 03 . 2026
            </p>
        </div>

        <!-- Center Couple Photo in Arch Frame with Polaroid White Border -->
        <div class="relative z-20 my-auto flex flex-col items-center">
            <div class="w-20 h-24 sm:w-22 sm:h-26 rounded-t-full rounded-b-xl overflow-hidden p-1 bg-white shadow-md border border-[#5C3D28]/15">
                <div class="w-full h-full rounded-t-full rounded-b-lg overflow-hidden bg-[#EFE8E1]">
                    <img src="{{ asset('images/themes/whispering-garden/cover.jpg') }}" class="w-full h-full object-cover" alt="Dias &amp; Azalia">
                </div>
            </div>
        </div>

        <!-- Bottom: Recipient Card & Buka Undangan Button -->
        <div class="relative z-20 w-full space-y-1.5 pb-0.5 text-center">
            <!-- Recipient Box -->
            <div class="bg-white/85 border border-[#5C3D28]/15 rounded-xl px-2 py-1 max-w-[140px] mx-auto shadow-2xs space-y-0.5">
                <p class="text-[5.5px] text-[#785D48] tracking-wider uppercase font-semibold">
                    Kepada Bapak/Ibu/Saudara/i:
                </p>
                <p class="text-[8px] sm:text-[9px] font-bold text-[#3D2B1F] truncate">
                    Budi Santoso &amp; Pasangan
                </p>
            </div>

            <!-- Buka Undangan Button -->
            <div class="w-full max-w-[125px] mx-auto py-1.5 px-3 rounded-full bg-[#6B442A] text-white font-bold text-[7px] sm:text-[8px] tracking-wider uppercase shadow-md flex items-center justify-center gap-1.5">
                <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span>BUKA UNDANGAN</span>
            </div>

            <!-- Home Bar Indicator -->
            <div class="w-10 sm:w-12 h-0.5 bg-[#5C3D28]/30 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme11)
    <!-- Screen Canvas: EXACT MATCH TO THEME 11 (PREMIUM MISTY ROMANCE) REAL COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2.5 sm:p-3 relative overflow-hidden select-none bg-slate-950 text-white font-serif"
         style="background-image: linear-gradient(180deg, rgba(15, 23, 42, 0.45) 0%, rgba(15, 23, 42, 0.25) 35%, rgba(15, 23, 42, 0.8) 100%), url('{{ asset('images/themes/misty-romance/demo-cover.jpg') }}'); background-size: cover; background-position: center;">
        
        <!-- Ambient Tint -->
        <div class="absolute inset-0 bg-slate-950/20 pointer-events-none"></div>

        <!-- Top: "THE WEDDING OF" & Couple Names -->
        <div class="relative z-10 text-center pt-5 sm:pt-6 space-y-1">
            <p class="text-[7px] sm:text-[7.5px] text-white/90 tracking-[0.3em] uppercase font-semibold">
                THE WEDDING OF
            </p>
            <h4 class="text-[17px] sm:text-[19px] text-white font-normal tracking-wide leading-tight drop-shadow-md">
                Habib &amp; Adiba
            </h4>
        </div>

        <!-- Bottom: Kepada & White Pill Buka Undangan Button (Matching Screenshot 1) -->
        <div class="relative z-10 w-full text-center space-y-2 pb-0.5">
            <div class="space-y-0.5 text-white/95">
                <p class="text-[6px] sm:text-[6.5px] text-white/85">
                    Kepada Bapak/Ibu/Saudara/i
                </p>
                <p class="text-[10px] sm:text-[11px] font-medium text-white tracking-wide truncate">
                    Budi Santoso &amp; Pasangan
                </p>
            </div>

            <!-- White Pill Button Matching Screenshot -->
            <div class="w-full max-w-[125px] sm:max-w-[135px] mx-auto py-1.5 px-3 rounded-full bg-white text-slate-900 font-semibold text-[7px] sm:text-[8px] tracking-wider uppercase shadow-[0_6px_20px_rgba(0,0,0,0.4)] flex items-center justify-center gap-1.5">
                <svg class="w-2.5 h-2.5 text-slate-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span>Buka Undangan</span>
            </div>

            <!-- Home Bar Indicator -->
            <div class="w-10 sm:w-12 h-0.5 bg-white/40 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme12)
    <!-- Screen Canvas: EXACT MATCH TO THEME 12 (PREMIUM CHAMPAGNE BLOOM) REAL COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2 sm:p-2.5 relative overflow-hidden select-none bg-[#FAF6F0] text-[#3D2B1F] font-serif"
         style="background-image: url('{{ asset('images/themes/champagne-bloom/bg-vertical.jpg') }}'); background-size: cover; background-position: center;">
        
        <!-- Corner Dried Pampas Flowers -->
        <img src="{{ asset('images/themes/champagne-bloom/flower-corner-tl.png') }}" class="absolute -top-1 -left-1 w-14 sm:w-16 pointer-events-none z-10 opacity-90 object-contain" alt="">
        <img src="{{ asset('images/themes/champagne-bloom/flower-corner-tr.png') }}" class="absolute -top-1 -right-1 w-14 sm:w-16 pointer-events-none z-10 opacity-90 object-contain" alt="">

        <!-- Top Header & Couple Names -->
        <div class="relative z-10 text-center pt-4 sm:pt-5 space-y-0.5">
            <p class="text-[6.5px] sm:text-[7px] text-[#A3704C] tracking-[0.25em] uppercase font-semibold">
                THE WEDDING OF
            </p>
            <h4 class="text-[15px] sm:text-[17px] text-[#3D2B1F] font-normal tracking-wide leading-tight">
                Rian &amp; Maya
            </h4>
        </div>

        <!-- Center: Round Boho Pampas Frame with Couple Photo -->
        <div class="relative z-10 my-auto py-1">
            <div class="relative w-22 h-22 sm:w-26 sm:h-26 aspect-square mx-auto">
                <div class="w-[71%] h-[71%] rounded-full overflow-hidden absolute top-[9%] left-[8.5%] shadow-inner bg-stone-100 z-10">
                    <img src="{{ asset('images/themes/champagne-bloom/couple-portrait.jpg') }}" alt="Rian &amp; Maya" class="w-full h-full object-cover">
                </div>
                <img src="{{ asset('images/themes/champagne-bloom/frame-circle.png') }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-20">
            </div>
        </div>

        <!-- Bottom: Recipient Card & High Contrast Terracotta & Ivory Buka Undangan Button -->
        <div class="relative z-10 w-full space-y-1.5 pb-0.5 text-center">
            <!-- Recipient Box -->
            <div class="bg-white/85 backdrop-blur-xs rounded-xl px-2 py-1 max-w-[140px] mx-auto border border-[#E8DCCF] shadow-2xs space-y-0.5">
                <p class="text-[5.5px] text-[#8A715D] tracking-wider uppercase">
                    Kepada Bapak/Ibu/Saudara/i:
                </p>
                <p class="text-[8px] sm:text-[9px] font-bold text-[#3D2B1F] truncate">
                    Budi Santoso &amp; Pasangan
                </p>
            </div>

            <!-- Buka Undangan Button -->
            <div class="w-full max-w-[125px] sm:max-w-[135px] mx-auto py-1.5 px-3 rounded-full bg-[#FAF6F0] text-[#3D2B1F] border border-[#A3704C] font-bold text-[7px] sm:text-[8px] tracking-wider uppercase shadow-md flex items-center justify-center gap-1.5">
                <svg class="w-2.5 h-2.5 text-[#A3704C]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span>Buka Undangan</span>
            </div>

            <!-- Home Bar Indicator -->
            <div class="w-10 sm:w-12 h-0.5 bg-[#A3704C]/30 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme14)
    <!-- Screen Canvas: EXACT MATCH TO THEME 14 (PREMIUM FAIRYTALE CASTLE) REAL COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2 sm:p-2.5 relative overflow-hidden select-none bg-[#F7A8BA] text-[#4A1525] font-serif"
         style="background-image: url('{{ asset('images/themes/fairytale-castle/castle-vertical.jpg') }}'); background-size: cover; background-position: center top;">
        
        <!-- Subtle Ambient Pink Overlay -->
        <div class="absolute inset-0 bg-white/10 pointer-events-none"></div>

        <!-- Four Corner Floral Bouquets (Matching Real Theme 14 Cover) -->
        <img src="{{ asset('images/themes/fairytale-castle/floral-corner-tl.png') }}" class="absolute -top-1 -left-1 w-14 sm:w-16 pointer-events-none z-10 object-contain drop-shadow-xs" alt="">
        <img src="{{ asset('images/themes/fairytale-castle/floral-corner-tr.png') }}" class="absolute -top-1 -right-1 w-14 sm:w-16 pointer-events-none z-10 object-contain drop-shadow-xs" alt="">
        <img src="{{ asset('images/themes/fairytale-castle/floral-corner-bl.png') }}" class="absolute -bottom-1 -left-1 w-14 sm:w-16 pointer-events-none z-10 object-contain drop-shadow-xs" alt="">
        <img src="{{ asset('images/themes/fairytale-castle/floral-corner-br.png') }}" class="absolute -bottom-1 -right-1 w-14 sm:w-16 pointer-events-none z-10 object-contain drop-shadow-xs" alt="">

        <!-- Inner Content (Matching Real Theme 14 Cover Layout) -->
        <div class="w-full h-full flex flex-col justify-between p-1.5 text-center relative z-20 overflow-hidden">
            
            <!-- Top Header Text -->
            <div class="pt-0.5">
                <span class="inline-block text-[6.5px] font-sans font-medium text-[#8A1538] tracking-widest uppercase">
                    Undangan Pernikahan
                </span>
            </div>

            <!-- Couple Portrait in Ornate Pink Baroque Frame Precision Fitted -->
            <div class="relative w-20 h-24 sm:w-22 sm:h-26 mx-auto my-auto flex items-center justify-center">
                <!-- Couple Photo Inside Oval Center -->
                <div class="absolute" style="left: 21.5%; top: 14.6%; width: 57%; height: 65.2%; border-radius: 50%; overflow: hidden; background-color: #F8B8C8;">
                    <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=400&auto=format&fit=crop&q=80" alt="Annisa &amp; Andrian" class="w-full h-full object-cover">
                </div>
                <!-- Baroque Pink Frame Overlay with Pearls & Roses -->
                <img src="{{ asset('images/themes/fairytale-castle/ornate-pink-frame.png') }}" alt="Ornate Frame" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10 drop-shadow-[0_4px_8px_rgba(138,21,56,0.25)]">
            </div>

            <!-- Couple Names in Cursive Script -->
            <div class="space-y-0.5 text-center">
                <h4 class="text-[13px] sm:text-[14px] text-[#8A1538] leading-tight"
                    style="font-family: 'Alex Brush', 'Great Vibes', cursive;">
                    Annisa &amp; Andrian
                </h4>
                <p class="text-[5.5px] text-[#8C5A6A] font-sans tracking-wider uppercase font-medium">
                    Rabu, 31 Desember 2025
                </p>
            </div>

            <!-- Guest Box -->
            <div class="rounded-lg bg-white/70 backdrop-blur-xs p-1 border border-white/80 text-center space-y-0.5 max-w-[130px] mx-auto w-full shadow-xs">
                <p class="text-[5px] uppercase tracking-wider text-[#8C5A6A] font-sans">
                    Kepada:
                </p>
                <p class="text-[7.5px] font-bold text-[#8A1538] truncate font-serif">
                    Andi Sanjaya
                </p>
            </div>

            <!-- Buka Undangan CTA Button (Deep Pink on White Pill) -->
            <div class="pt-0.5 pb-0.5">
                <div class="w-full max-w-[120px] mx-auto py-1 px-2.5 rounded-full bg-white border border-[#8A1538] text-[#8A1538] font-bold text-[6.5px] sm:text-[7.5px] tracking-wider uppercase shadow-[0_3px_8px_rgba(138,21,56,0.2)] flex items-center justify-center gap-1 cursor-pointer">
                    <svg class="w-2.5 h-2.5 text-[#8A1538]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span class="text-[#8A1538] font-bold">BUKA UNDANGAN</span>
                </div>
            </div>

            <!-- Home Bar Indicator -->
            <div class="w-10 sm:w-12 h-0.5 bg-[#8A1538]/30 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @elseif($isTheme10)
    <!-- Screen Canvas: EXACT MATCH TO THEME 10 (BASIC NEWSPAPER) REAL COVER -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2 sm:p-2.5 relative overflow-hidden select-none bg-[#F4F4F4] text-[#111111] font-serif"
         style="background-image: url('{{ asset('images/themes/newspaper/bg-vertical.jpg') }}'); background-size: cover; background-position: center;">
        
        <!-- Subtle Ambient Tint -->
        <div class="absolute inset-0 bg-white/30 pointer-events-none"></div>

        <!-- Top Running Header -->
        <div class="relative z-10 w-full pt-1 flex items-center justify-between pb-1 border-b border-black text-[6.5px] font-mono tracking-wider uppercase font-semibold text-black">
            <span>Undangan Pernikahan</span>
            <span>02</span>
        </div>

        <!-- Framed B&W Couple Photo in Solid Black Rectangular Border -->
        <div class="relative z-10 my-0.5 sm:my-1 flex items-center justify-center">
            <div class="w-20 h-20 sm:w-24 sm:h-24 p-0.5 border border-black bg-white shadow-sm">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=400&auto=format&fit=crop&q=80" 
                     alt="Selly & Angga" 
                     class="w-full h-full object-cover grayscale contrast-110">
            </div>
        </div>

        <!-- Couple Names & Date -->
        <div class="relative z-10 space-y-0.5 text-center">
            <h4 class="text-[15px] sm:text-[17px] text-black font-normal leading-tight" style="font-family: 'Alex Brush', cursive;">
                Selly &amp; Angga
            </h4>
            <p class="text-[5.5px] sm:text-[6px] tracking-widest uppercase text-black font-bold font-sans">
                Minggu, 18 Oktober 2026
            </p>
        </div>

        <!-- 4 Countdown Pills -->
        <div class="relative z-10 grid grid-cols-4 gap-1 max-w-[150px] mx-auto w-full my-0.5">
            <div class="p-0.5 text-center border border-black bg-white/80">
                <span class="block text-[7px] font-bold text-black font-mono leading-none">120</span>
                <span class="block text-[4.5px] uppercase tracking-wider text-black font-sans leading-none">Hari</span>
            </div>
            <div class="p-0.5 text-center border border-black bg-white/80">
                <span class="block text-[7px] font-bold text-black font-mono leading-none">08</span>
                <span class="block text-[4.5px] uppercase tracking-wider text-black font-sans leading-none">Jam</span>
            </div>
            <div class="p-0.5 text-center border border-black bg-white/80">
                <span class="block text-[7px] font-bold text-black font-mono leading-none">45</span>
                <span class="block text-[4.5px] uppercase tracking-wider text-black font-sans leading-none">Mnt</span>
            </div>
            <div class="p-0.5 text-center border border-black bg-white/80">
                <span class="block text-[7px] font-bold text-black font-mono leading-none">30</span>
                <span class="block text-[4.5px] uppercase tracking-wider text-black font-sans leading-none">Dtk</span>
            </div>
        </div>

        <!-- Guest Box -->
        <div class="relative z-10 border border-black bg-white/85 p-1 text-center max-w-[145px] mx-auto w-full space-y-0.5 shadow-2xs">
            <p class="text-[5px] uppercase tracking-wider text-black font-semibold font-sans">
                Kepada Bapak/Ibu/Saudara/i:
            </p>
            <p class="text-[8px] font-bold text-black truncate font-serif">
                Budi Santoso &amp; Pasangan
            </p>
        </div>

        <!-- Buka Undangan Button in Solid Black -->
        <div class="relative z-10 w-full max-w-[130px] mx-auto py-1 px-2.5 rounded-none bg-black text-white font-bold text-[7px] tracking-widest uppercase shadow-sm flex items-center justify-center gap-1 border border-black">
            <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span>BUKA UNDANGAN</span>
        </div>

        <!-- Running Newspaper Footer -->
        <div class="relative z-10 w-full pt-1 flex items-center justify-between border-t-2 border-b border-black text-[5.5px] font-mono tracking-wider uppercase font-semibold text-black pb-0.5">
            <span>Undangan Pernikahan</span>
            <span>Selly &amp; Angga</span>
        </div>

        <!-- Home Bar Indicator -->
        <div class="relative z-10 w-10 sm:w-12 h-0.5 bg-black/40 rounded-full mx-auto pointer-events-none mt-0.5"></div>
    </div>
    @else
    <!-- Screen Canvas with Motif Texture & Pattern Overlay (Generic) -->
    <div class="rounded-[1.6rem] sm:rounded-[1.8rem] h-full flex flex-col justify-between p-2.5 sm:p-3 relative overflow-hidden select-none"
         style="background: {{ $preset['bg'] }}; color: {{ $preset['textColor'] }};">
        
        <!-- Pattern Overlay SVG Layer -->
        <div class="absolute inset-0 pointer-events-none opacity-85 z-0"
             style="background-image: {{ $preset['pattern'] }}; background-size: 42px 42px; background-repeat: repeat;"></div>

        <!-- Extra Darkening Gradient for Text Legibility -->
        <div class="absolute inset-0 pointer-events-none z-0 {{ $themeId === 18 ? 'bg-gradient-to-b from-white/40 via-transparent to-white/70' : 'bg-gradient-to-b from-black/25 via-black/10 to-black/45' }}"></div>

        @if($isPremium)
            <!-- Premium Royal Double Gold Hairline Border & Ornate Corners -->
            <div class="absolute inset-1.5 sm:inset-2 border border-amber-300/40 rounded-xl pointer-events-none z-10">
                <span class="absolute -top-1 -left-1 text-amber-300 text-[10px] leading-none font-serif">⌜</span>
                <span class="absolute -top-1 -right-1 text-amber-300 text-[10px] leading-none font-serif">⌝</span>
                <span class="absolute -bottom-1 -left-1 text-amber-300 text-[10px] leading-none font-serif">⌞</span>
                <span class="absolute -bottom-1 -right-1 text-amber-300 text-[10px] leading-none font-serif">⌟</span>
            </div>
            <!-- Golden Light Glimmer Beam -->
            <div class="absolute -top-10 -right-10 w-28 h-28 bg-gradient-to-br from-amber-300/25 to-transparent rounded-full blur-xl pointer-events-none z-0"></div>
        @endif

        <!-- Screen Top: Theme Badge & Header -->
        <div class="relative z-10 pt-1 space-y-1">
            <div class="flex items-center justify-center gap-1.5">
                @if($isPremium)
                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[8px] font-extrabold uppercase tracking-widest bg-gradient-to-r from-amber-500 via-yellow-400 to-amber-600 text-stone-950 shadow-sm border border-yellow-200">
                        <svg class="w-2.5 h-2.5" viewBox="0 0 24 24" fill="currentColor"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5z"/></svg>
                        <span>PREMIUM</span>
                    </span>
                @else
                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[7px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-xs text-white border border-white/30">
                        <span>BASIC HARMONY</span>
                    </span>
                @endif
            </div>

            <!-- Motif Icon Emblem -->
            <div class="w-6 h-6 mx-auto my-0.5 flex items-center justify-center opacity-95">
                {!! $preset['iconSvg'] !!}
            </div>

            <p class="text-[7px] sm:text-[8px] tracking-[0.2em] uppercase font-sans opacity-80 leading-none">
                The Wedding of
            </p>
            <h4 class="font-serif text-xs sm:text-sm font-bold leading-tight truncate px-1" style="{{ $isPremium ? 'color: #FDE047; text-shadow: 0 1px 4px rgba(0,0,0,0.8);' : 'color: ' . $preset['accentColor'] . ';' }}">
                Raden &amp; Anisa
            </h4>
        </div>

        <!-- Screen Center: Bespoke Motif Description & Wedding Title Box -->
        <div class="relative z-10 my-auto py-1 px-2 rounded-xl {{ $preset['tagBg'] }} backdrop-blur-sm border border-white/20 shadow-sm space-y-0.5 text-center">
            <span class="block text-[7px] font-mono uppercase tracking-widest opacity-75">
                {{ $preset['motifName'] }}
            </span>
            <p class="font-serif italic text-[10px] sm:text-[11px] font-semibold truncate" style="{{ $isPremium ? 'color: #FEF08A;' : '' }}">
                {{ $themeName }}
            </p>
            <div class="w-8 h-px mx-auto my-0.5" style="background-color: {{ $preset['accentColor'] }}; opacity: 0.5;"></div>
            <p class="text-[7px] font-mono opacity-80">
                12 • 12 • 2026
            </p>
        </div>

        <!-- Screen Bottom: Interactive Action Pill & Home Bar -->
        <div class="relative z-10 pb-0.5 space-y-1">
            @if($isPremium)
                <div class="w-full py-1.5 px-2 rounded-lg bg-gradient-to-r from-amber-500 via-yellow-400 to-amber-600 text-stone-950 font-bold text-[8px] sm:text-[9px] shadow-[0_2px_8px_rgba(217,119,6,0.5)] border border-yellow-200 flex items-center justify-center gap-1">
                    <svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 24 24"><polygon points="12,2 15,9 22,9 17,14 19,21 12,17 5,21 7,14 2,9 9,9"/></svg>
                    <span>Tema Eksklusif</span>
                </div>
            @else
                <div class="w-full py-1.5 px-2 rounded-lg bg-white/20 backdrop-blur-sm text-white font-medium text-[8px] sm:text-[9px] border border-white/30 flex items-center justify-center gap-1">
                    <span>Buka Undangan</span>
                </div>
            @endif
            <div class="w-10 sm:w-12 h-0.5 bg-white/40 rounded-full mx-auto pointer-events-none"></div>
        </div>
    </div>
    @endif
</div>
    </div>
</div>

