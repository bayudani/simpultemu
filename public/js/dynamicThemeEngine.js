/**
 * SimpulTemu Dynamic Multi-Theme Engine
 * Handles 20 Wedding Invitation Themes (10 Basic & 10 Premium)
 * Zero Emojis, Pure SVG Vectors, Dynamic Photo Layouts, Textured Backgrounds & Keyframe Animations.
 */

// SVG Vectors Library (High-Resolution, Sharp Vector Artwork - NO EMOJIS)
const THEME_SVG = {
    // Avatar Silhouettes (Fallback when no photo uploaded)
    avatarGroom: `<svg class="w-full h-full text-stone-400" viewBox="0 0 64 64" fill="currentColor">
        <path d="M32 10a12 12 0 100 24 12 12 0 000-24zm0 28c-14.33 0-26 10.45-26 23.33 0 1.47 1.2 2.67 2.67 2.67h46.66c1.47 0 2.67-1.2 2.67-2.67C58 48.45 46.33 38 32 38z"/>
        <path d="M26 44l6 7 6-7-2-2h-8l-2 2z" fill="#ffffff" fill-opacity="0.6"/>
    </svg>`,
    avatarBride: `<svg class="w-full h-full text-stone-400" viewBox="0 0 64 64" fill="currentColor">
        <path d="M32 8c-6.63 0-12 5.37-12 12 0 5.4 3.58 9.97 8.5 11.45-12.87 2.22-22.5 12.18-22.5 24.55 0 1.1.9 2 2 2h48c1.1 0 2-.9 2-2 0-12.37-9.63-22.33-22.5-24.55C40.42 29.97 44 25.4 44 20c0-6.63-5.37-12-12-12z"/>
        <path d="M22 14c2-4 7-6 10-6s8 2 10 6c-3 2-7 3-10 3s-7-1-10-3z" fill="#ffffff" fill-opacity="0.7"/>
    </svg>`,
    avatarCouple: `<svg class="w-full h-full text-stone-400" viewBox="0 0 64 64" fill="currentColor">
        <circle cx="24" cy="20" r="10"/>
        <circle cx="40" cy="22" r="9"/>
        <path d="M8 56c0-11 9-20 20-20h4c11 0 20 9 20 20H8z"/>
    </svg>`,

    // Theme Ornaments & Badges
    roseVintage: `<svg class="w-8 h-8 text-rose-800" viewBox="0 0 48 48" fill="currentColor">
        <path d="M24 4c-5.5 0-10 4.5-10 10 0 3.2 1.5 6 3.9 7.8-2.4 1.1-4.4 2.9-5.7 5.2C10.5 25.6 9 24 7 24c-2.8 0-5 2.2-5 5 0 4.5 4.5 9 11 12.5C18.2 44.2 21 45 24 45s5.8-.8 11-3.5c6.5-3.5 11-8 11-12.5 0-2.8-2.2-5-5-5-2 0-3.5 1.6-5.2 3-1.3-2.3-3.3-4.1-5.7-5.2 2.4-1.8 3.9-4.6 3.9-7.8 0-5.5-4.5-10-10-10zm0 4c3.3 0 6 2.7 6 6 0 2.2-1.2 4.1-3 5.1V18c0-1.7-1.3-3-3-3s-3 1.3-3 3v1.1c-1.8-1-3-2.9-3-5.1 0-3.3 2.7-6 6-6z"/>
    </svg>`,
    eucalyptusBranch: `<svg class="w-8 h-8 text-emerald-700" viewBox="0 0 48 48" fill="currentColor">
        <path d="M24 2c-1.1 0-2 .9-2 2v40c0 1.1.9 2 2 2s2-.9 2-2V4c0-1.1-.9-2-2-2zm-6 8c-4.4 0-8 3.6-8 8s3.6 8 8 8c1.4 0 2.6-.4 3.8-1V17c-1.2-.6-2.4-1-3.8-1zm12 10c-1.4 0-2.6.4-3.8 1v8c1.2.6 2.4 1 3.8 1 4.4 0 8-3.6 8-8s-3.6-8-8-8zm-12 12c-4.4 0-8 3.6-8 8s3.6 8 8 8c1.4 0 2.6-.4 3.8-1v-8c-1.2-.6-2.4-1-3.8-1z"/>
    </svg>`,
    geometricMonogram: `<svg class="w-8 h-8 text-amber-500" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5">
        <polygon points="24,4 44,24 24,44 4,24"/>
        <polygon points="24,10 38,24 24,38 10,24"/>
        <line x1="24" y1="14" x2="24" y2="34"/>
        <line x1="14" y1="24" x2="34" y2="24"/>
        <circle cx="24" cy="24" r="3" fill="currentColor"/>
    </svg>`,
    rosePetal: `<svg class="w-7 h-7 text-rose-400" viewBox="0 0 32 32" fill="currentColor">
        <path d="M16 2C9 2 4 8 4 15c0 8.5 7.5 15 12 15s12-6.5 12-15c0-7-5-13-12-13zm0 4c4.5 0 8 4 8 9 0 5-4.5 9.5-8 10.8C12.5 24.5 8 20 8 15c0-5 3.5-9 8-9z" opacity="0.85"/>
    </svg>`,
    modernMinimalCrest: `<svg class="w-7 h-7 text-stone-800" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.5">
        <circle cx="20" cy="20" r="16"/>
        <line x1="20" y1="6" x2="20" y2="34"/>
        <line x1="6" y1="20" x2="34" y2="20"/>
        <rect x="15" y="15" width="10" height="10" transform="rotate(45 20 20)"/>
    </svg>`,
    pampasGrass: `<svg class="w-8 h-8 text-amber-700" viewBox="0 0 48 48" fill="currentColor">
        <path d="M12 44c12-8 20-22 24-40-10 6-20 18-24 40zm12-2c6-4 12-12 14-22-6 3-11 10-14 22zm-8-4c4-3 9-9 11-18-5 2-8 8-11 18z"/>
    </svg>`,
    lavenderGarland: `<svg class="w-8 h-8 text-purple-600" viewBox="0 0 48 48" fill="currentColor">
        <path d="M24 6c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm-6 8c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm12 0c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm-9 7c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm6 0c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm-3 8c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm0 7v10h2V36h-2z"/>
    </svg>`,
    oliveBranch: `<svg class="w-8 h-8 text-lime-700" viewBox="0 0 48 48" fill="currentColor">
        <path d="M6 42c8-8 16-18 20-36-2 10-6 20-14 28l-6 8zm16-24c-3-3-7-4-10-3 1 3 3 7 6 9 3 1 6 0 7-2s-1-3-3-4zm8-6c-3-3-7-4-10-3 1 3 3 7 6 9 3 1 6 0 7-2s-1-3-3-4zm6 12c-2-3-5-4-8-4 0 3 2 6 4 8 2 1 5 1 6 0s0-3-2-4z"/>
    </svg>`,
    goldRibbon: `<svg class="w-8 h-8 text-amber-500" viewBox="0 0 48 48" fill="currentColor">
        <path d="M24 16c-3.3 0-6-2.7-6-6s2.7-6 6-6 6 2.7 6 6-2.7 6-6 6zm-1 4h2l8 22-6 2-3-10-3 10-6-2 8-22zm-7-10c0-2.2 1.8-4 4-4s4 1.8 4 4-1.8 4-4 4-4-1.8-4-4z"/>
    </svg>`,
    goldLineDivider: `<svg class="w-full h-4 text-amber-500" viewBox="0 0 200 16" fill="none">
        <line x1="10" y1="8" x2="80" y2="8" stroke="currentColor" stroke-width="0.8"/>
        <polygon points="100,3 105,8 100,13 95,8" fill="currentColor"/>
        <line x1="120" y1="8" x2="190" y2="8" stroke="currentColor" stroke-width="0.8"/>
    </svg>`,
    waxSeal3D: `<svg class="w-9 h-9 text-rose-900" viewBox="0 0 48 48" fill="currentColor">
        <circle cx="24" cy="24" r="22" fill="#7f1d1d" stroke="#b91c1c" stroke-width="2"/>
        <circle cx="24" cy="24" r="16" fill="#991b1b" stroke="#ca8a04" stroke-width="1.5" stroke-dasharray="2,2"/>
        <path d="M24 14l3 7h7l-5 4 2 7-7-4-7 4 2-7-5-4h7z" fill="#ca8a04"/>
    </svg>`,
    royalFiligree: `<svg class="w-9 h-9 text-amber-400" viewBox="0 0 48 48" fill="currentColor">
        <path d="M24 4c2 3 5 4 8 3s4-4 4-4 0 5 3 7 7 1 7 1-4 3-4 6 4 4 4 4-5 1-7 3-1 7-1 7-3-4-6-4-4 4-4 4 0-5-3-7-7-1-7-1 4-3 4-6-4-4-4-4 5-1 7-3 1-7 1-7 3 4 6 4z"/>
        <circle cx="24" cy="24" r="4" fill="#1e3a8a"/>
    </svg>`,
    fairyLights: `<svg class="w-8 h-8 text-amber-300" viewBox="0 0 48 48" fill="currentColor">
        <path d="M4 12c10 4 30 4 40 0" stroke="currentColor" stroke-width="1.5" fill="none"/>
        <circle cx="12" cy="18" r="4" fill="#fde047"/>
        <circle cx="24" cy="19" r="4" fill="#fde047"/>
        <circle cx="36" cy="18" r="4" fill="#fde047"/>
    </svg>`,
    hangingLantern: `<svg class="w-8 h-8 text-amber-500" viewBox="0 0 48 48" fill="currentColor">
        <line x1="24" y1="0" x2="24" y2="12" stroke="currentColor" stroke-width="2"/>
        <rect x="18" y="12" width="12" height="4" rx="1"/>
        <path d="M16 16l3 18h10l3-18H16z" fill="#b45309" stroke="#f59e0b" stroke-width="1.5"/>
        <circle cx="24" cy="25" r="4" fill="#fde047"/>
        <rect x="19" y="34" width="10" height="3" rx="1"/>
    </svg>`,
    goldMirrorFrame: `<svg class="w-9 h-9 text-amber-400" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.8">
        <rect x="8" y="6" width="32" height="36" rx="16"/>
        <rect x="12" y="10" width="24" height="28" rx="12" stroke-width="1"/>
        <circle cx="24" cy="4" r="2" fill="currentColor"/>
        <circle cx="24" cy="44" r="2" fill="currentColor"/>
    </svg>`,
    monsteraLeaf: `<svg class="w-8 h-8 text-emerald-600" viewBox="0 0 48 48" fill="currentColor">
        <path d="M24 4C14 4 6 12 6 22c0 14 14 22 18 22s18-8 18-22c0-10-8-18-18-18zm-2 10c2-1 4-1 6 0l-2 8h-2l-2-8zm-8 6c2-1 4 0 5 1l-2 7h-2l-1-8zm18 1c2-1 4-1 5 1l-2 7h-2l-1-8z"/>
    </svg>`,
    palmShadowFrond: `<svg class="w-9 h-9 text-stone-700" viewBox="0 0 48 48" fill="currentColor" opacity="0.65">
        <path d="M6 44c10-14 22-26 36-36-8 12-16 26-20 40l-16-4zm18-20c6-6 14-10 20-12-6 6-12 12-14 20l-6-8z"/>
    </svg>`,
    auroraWisp: `<svg class="w-9 h-9 text-purple-400" viewBox="0 0 48 48" fill="currentColor" opacity="0.75">
        <path d="M4 28c8-12 20-8 28-16 6-6 10-6 12-2-4 12-16 16-24 22-6 4-12 2-16-4z"/>
    </svg>`,
    cinematicFlame: `<svg class="w-8 h-8 text-amber-500" viewBox="0 0 48 48" fill="currentColor">
        <path d="M24 4c-2 8-8 12-8 20 0 8.8 7.2 16 16 16s16-7.2 16-16c0-10-10-14-12-24-3 5-4 9-4 14 0 4.4-3.6 8-8 8s-8-3.6-8-8c0-3 2-6 4-10z"/>
    </svg>`
};

// 20 Themes Full Configuration Engine Data
const THEMES_CONFIG = {
    // === 10 TEMA BASIC (GRATIS) ===
    1: {
        id: 1,
        slug: 'basic-harmony-maroon',
        name: 'Basic Harmony Maroon',
        tier: 'basic',
        layout: 'vertical_stack',
        fontHeading: "'Playfair Display', serif",
        fontBody: "'Lato', sans-serif",
        googleFonts: 'Playfair+Display:ital,wght@0,400;0,700;1,400&family=Lato:wght@300;400;700',
        bgColor: '#3b0811',
        bgCover: 'linear-gradient(135deg, rgba(65, 10, 18, 0.95) 0%, rgba(35, 5, 10, 0.98) 100%)',
        bgTextureStyle: "background-image: url('/images/themes/bg/bg-basic-maroon.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;",
        bgOverlay: 'bg-[rgba(65,10,18,0.72)] backdrop-blur-[1.5px]',
        bgOverlayStyle: 'background-color: rgba(65, 10, 18, 0.72); backdrop-filter: blur(1.5px); -webkit-backdrop-filter: blur(1.5px);',
        primary: '#800000',
        secondary: '#991b1b',
        accent: '#ca8a04',
        textColor: '#1c1917',
        textLight: '#FAF5EE',
        cardBg: '#ffffff',
        borderColor: '#E7E0D6',
        isDark: false,
        animationClass: 'animate-float-slow',
        ornamentTop: THEME_SVG.roseVintage,
        ornamentBottom: THEME_SVG.roseVintage,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Solo Acoustic Serenade – Jason Shaw',
        defaultMusicId: 1
    },
    2: {
        id: 2,
        slug: 'basic-harmony-emerald',
        name: 'Basic Harmony Emerald',
        tier: 'basic',
        layout: 'side_arch',
        fontHeading: "'Cinzel', serif",
        fontBody: "'Montserrat', sans-serif",
        googleFonts: 'Cinzel:wght@400;600;700&family=Montserrat:wght@300;400;600',
        bgColor: '#FAFCFA',
        bgCover: 'linear-gradient(145deg, #247E64 0%, #1E6B52 50%, #165640 100%)',
        bgTextureStyle: 'background-color: #FAFCFA;',
        primary: '#1E6B52',
        secondary: '#247E64',
        accent: '#D4AF37',
        textColor: '#1A382B',
        textLight: '#FAFCFA',
        cardBg: '#1E6B52',
        borderColor: '#D4AF37',
        isDark: false,
        animationClass: 'animate-gentle-sway',
        ornamentTop: '/images/themes/bg/emerald-royal-crest.svg',
        ornamentBottom: '/images/themes/bg/emerald-interlocking-rings.svg',
        dividerSvg: '/images/themes/bg/emerald-interlocking-rings.svg',
        defaultMusic: 'Acoustic Meditation – Jason Shaw',
        defaultMusicId: 2
    },
    3: {
        id: 3,
        slug: 'basic-harmony-navy',
        name: 'Basic Harmony Navy',
        tier: 'basic',
        layout: 'oceanic_waves',
        fontHeading: "'Prata', serif",
        fontBody: "'Montserrat', sans-serif",
        googleFonts: 'Prata&family=Montserrat:wght@300;400;500;600;700',
        bgColor: '#FFFFFF',
        bgCover: 'linear-gradient(180deg, #CBDCE7 0%, #2E4D71 40%, #1E3A5F 100%)',
        bgTextureStyle: 'background-color: #FFFFFF;',
        primary: '#1E3A5F',
        secondary: '#2E4D71',
        accent: '#4B6B94',
        textColor: '#0F172A',
        textLight: '#F8FAFC',
        cardBg: '#1E3A5F',
        borderColor: '#CBDCEB',
        isDark: false,
        animationClass: 'animate-pulse-soft',
        ornamentTop: THEME_SVG.geometricMonogram,
        ornamentBottom: THEME_SVG.geometricMonogram,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Green Leaves Romance – Jason Shaw',
        defaultMusicId: 3
    },
    4: {
        id: 4,
        slug: 'basic-harmony-rose',
        name: 'Basic Harmony Rose',
        tier: 'basic',
        layout: 'circular_overlap',
        fontHeading: "'Cormorant Garamond', serif",
        fontBody: "'Poppins', sans-serif",
        googleFonts: 'Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Poppins:wght@300;400;500',
        bgColor: '#FDF8F8',
        bgCover: 'linear-gradient(135deg, #be185d 0%, #881337 100%)',
        bgTextureStyle: 'background-color: #FDF8F8; background-image: radial-gradient(circle at 10% 20%, rgba(254,205,211,0.3) 0%, transparent 40%), radial-gradient(circle at 90% 80%, rgba(253,164,175,0.2) 0%, transparent 40%);',
        primary: '#be185d',
        secondary: '#f43f5e',
        accent: '#fb7185',
        textColor: '#881337',
        textLight: '#FFF1F2',
        cardBg: '#ffffff',
        borderColor: '#FFE4E6',
        isDark: false,
        animationClass: 'animate-pulse-soft',
        ornamentTop: THEME_SVG.rosePetal,
        ornamentBottom: THEME_SVG.rosePetal,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Serenity Strings – Jason Shaw',
        defaultMusicId: 4
    },
    5: {
        id: 5,
        slug: 'basic-harmony-monochrome',
        name: 'Basic Harmony Monochrome',
        tier: 'basic',
        layout: 'editorial_tall',
        fontHeading: "'Bodoni Moda', serif",
        fontBody: "'Space Grotesk', sans-serif",
        googleFonts: 'Bodoni+Moda:ital,opsz,wght@0,6..96,400;0,6..96,700;1,6..96,400&family=Space+Grotesk:wght@300;400;600',
        bgColor: '#FAFAFA',
        bgCover: 'linear-gradient(135deg, #171717 0%, #000000 100%)',
        bgTextureStyle: 'background-color: #FAFAFA; border: 1px solid #171717;',
        primary: '#171717',
        secondary: '#404040',
        accent: '#737373',
        textColor: '#171717',
        textLight: '#FAFAFA',
        cardBg: '#ffffff',
        borderColor: '#171717',
        isDark: false,
        animationClass: 'animate-float-slow',
        ornamentTop: THEME_SVG.modernMinimalCrest,
        ornamentBottom: THEME_SVG.modernMinimalCrest,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Calmant (Peaceful Acoustic) – Kevin MacLeod',
        defaultMusicId: 5
    },
    6: {
        id: 6,
        slug: 'basic-blue-blossom',
        name: 'Basic Soft Blue Botanical',
        tier: 'basic',
        layout: 'blue_blossom',
        fontHeading: "'Alex Brush', cursive",
        fontBody: "'Plus Jakarta Sans', sans-serif",
        googleFonts: 'Alex+Brush&family=Plus+Jakarta+Sans:wght@300;400;500;600;700',
        bgColor: '#F4F8FC',
        bgCover: 'linear-gradient(135deg, #1B365D 0%, #0F2341 100%)',
        bgTextureStyle: 'background-color: #F4F8FC;',
        primary: '#1B365D',
        secondary: '#2C4F77',
        accent: '#FDEEB5',
        textColor: '#1B365D',
        textLight: '#FFFFFF',
        cardBg: '#ffffff',
        borderColor: 'rgba(27, 54, 93, 0.2)',
        isDark: false,
        animationClass: 'anim-blossom-sway',
        ornamentTop: '<img src="/images/themes/soft-blue-botanical/corner-top-left.png" class="w-10 h-auto object-contain mx-auto">',
        ornamentBottom: '<img src="/images/themes/soft-blue-botanical/divider-flower.png" class="w-16 h-auto object-contain mx-auto">',
        dividerSvg: '<img src="/images/themes/soft-blue-botanical/divider-flower.png" class="w-20 h-auto object-contain mx-auto">',
        defaultMusic: 'Solo Acoustic Serenade – Jason Shaw',
        defaultMusicId: 1
    },
    7: {
        id: 7,
        slug: 'basic-harmony-lilac',
        name: 'Basic Harmony Lilac',
        tier: 'basic',
        layout: 'rounded_hexagon',
        fontHeading: "'Alex Brush', cursive",
        fontBody: "'Outfit', sans-serif",
        googleFonts: 'Alex+Brush&family=Outfit:wght@300;400;600',
        bgColor: '#FAF7FC',
        bgCover: 'linear-gradient(135deg, #7e22ce 0%, #4c1d95 100%)',
        bgTextureStyle: 'background-color: #FAF7FC; background-image: radial-gradient(rgba(126,34,206,0.05) 1px, transparent 0); background-size: 12px 12px;',
        primary: '#7e22ce',
        secondary: '#9333ea',
        accent: '#c084fc',
        textColor: '#3b0764',
        textLight: '#FAF5FF',
        cardBg: '#ffffff',
        borderColor: '#E9D5FF',
        isDark: false,
        animationClass: 'animate-gentle-sway',
        ornamentTop: THEME_SVG.lavenderGarland,
        ornamentBottom: THEME_SVG.lavenderGarland,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Acoustic Meditation – Jason Shaw',
        defaultMusicId: 2
    },
    8: {
        id: 8,
        slug: 'basic-harmony-sage',
        name: 'Basic Harmony Sage',
        tier: 'basic',
        layout: 'oval_side',
        fontHeading: "'EB Garamond', serif",
        fontBody: "'Nunito Sans', sans-serif",
        googleFonts: 'EB+Garamond:ital,wght@0,400;0,600;1,400&family=Nunito+Sans:wght@300;400;600',
        bgColor: '#F4F7F4',
        bgCover: 'linear-gradient(135deg, #4d7c0f 0%, #365314 100%)',
        bgTextureStyle: 'background-color: #F4F7F4; background-image: radial-gradient(circle at 50% 50%, rgba(77,124,15,0.04) 2px, transparent 2px); background-size: 20px 20px;',
        primary: '#4d7c0f',
        secondary: '#65a30d',
        accent: '#84cc16',
        textColor: '#14532d',
        textLight: '#F7FEE7',
        cardBg: '#ffffff',
        borderColor: '#D9F99D',
        isDark: false,
        animationClass: 'animate-floating-leaf',
        ornamentTop: THEME_SVG.oliveBranch,
        ornamentBottom: THEME_SVG.oliveBranch,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Green Leaves Romance – Jason Shaw',
        defaultMusicId: 3
    },
    9: {
        id: 9,
        slug: 'basic-harmony-champagne',
        name: 'Basic Harmony Champagne',
        tier: 'basic',
        layout: 'diamond_pill',
        fontHeading: "'Marcellus', serif",
        fontBody: "'Raleway', sans-serif",
        googleFonts: 'Marcellus&family=Raleway:wght@300;400;600',
        bgColor: '#FBF9F4',
        bgCover: 'linear-gradient(135deg, #b45309 0%, #78350f 100%)',
        bgTextureStyle: 'background-color: #FBF9F4; background-image: repeating-linear-gradient(45deg, rgba(217,119,6,0.03) 0px, rgba(217,119,6,0.03) 1px, transparent 1px, transparent 16px);',
        primary: '#b45309',
        secondary: '#d97706',
        accent: '#f59e0b',
        textColor: '#451a03',
        textLight: '#FEF3C7',
        cardBg: '#ffffff',
        borderColor: '#FDE68A',
        isDark: false,
        animationClass: 'animate-shimmer-gold',
        ornamentTop: THEME_SVG.goldRibbon,
        ornamentBottom: THEME_SVG.goldRibbon,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Serenity Strings – Jason Shaw',
        defaultMusicId: 4
    },
    10: {
        id: 10,
        slug: 'basic-harmony-charcoal',
        name: 'Basic Harmony Charcoal',
        tier: 'basic',
        layout: 'split_offset',
        fontHeading: "'DM Serif Display', serif",
        fontBody: "'Urbanist', sans-serif",
        googleFonts: 'DM+Serif+Display:ital@0;1&family=Urbanist:wght@300;400;600',
        bgColor: '#262626',
        bgCover: 'linear-gradient(135deg, #262626 0%, #171717 100%)',
        bgTextureStyle: 'background: radial-gradient(circle at 50% 0%, #333333 0%, #1e1e1e 100%);',
        primary: '#ca8a04',
        secondary: '#eab308',
        accent: '#fde047',
        textColor: '#FAF5EE',
        textLight: '#FAF5EE',
        cardBg: '#333333',
        borderColor: '#ca8a04',
        isDark: true,
        animationClass: 'animate-pulse-soft',
        ornamentTop: THEME_SVG.geometricMonogram,
        ornamentBottom: THEME_SVG.geometricMonogram,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Calmant (Peaceful Acoustic) – Kevin MacLeod',
        defaultMusicId: 5
    },

    // === 10 TEMA PREMIUM (RP 80.000) ===
    11: {
        id: 11,
        slug: 'premium-serenade-maroon',
        name: 'Premium Serenade Maroon',
        tier: 'premium',
        layout: 'luxury_layered',
        fontHeading: "'Playfair Display', serif",
        fontBody: "'Cormorant Infant', serif",
        googleFonts: 'Playfair+Display:wght@700;900&family=Cormorant+Infant:ital,wght@0,400;0,600;1,400',
        bgColor: '#3B0A12',
        bgCover: 'radial-gradient(ellipse at center, #520f1b 0%, #29050b 100%)',
        bgTextureStyle: 'background: radial-gradient(ellipse at center, #4c0d17 0%, #29050b 100%);',
        primary: '#800000',
        secondary: '#991b1b',
        accent: '#ca8a04',
        textColor: '#FDFBF7',
        textLight: '#FDFBF7',
        cardBg: '#4a0d17',
        borderColor: '#ca8a04',
        isDark: true,
        animationClass: 'animate-floating-leaf',
        ornamentTop: THEME_SVG.waxSeal3D,
        ornamentBottom: THEME_SVG.waxSeal3D,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Bridal Chorus – Richard Wagner',
        defaultMusicId: 12
    },
    12: {
        id: 12,
        slug: 'premium-serenade-emerald',
        name: 'Premium Serenade Emerald',
        tier: 'premium',
        layout: 'triple_floating',
        fontHeading: "'Cinzel Decorative', serif",
        fontBody: "'Montserrat', sans-serif",
        googleFonts: 'Cinzel+Decorative:wght@400;700&family=Montserrat:wght@300;400;600',
        bgColor: '#062B20',
        bgCover: 'linear-gradient(135deg, #062B20 0%, #041c15 100%)',
        bgTextureStyle: 'background: linear-gradient(135deg, #062B20 0%, #0a3a2c 50%, #041c15 100%);',
        primary: '#059669',
        secondary: '#10b981',
        accent: '#d4af37',
        textColor: '#F7F9F6',
        textLight: '#F7F9F6',
        cardBg: '#093d2e',
        borderColor: '#d4af37',
        isDark: true,
        animationClass: 'animate-shimmer-gold',
        ornamentTop: THEME_SVG.eucalyptusBranch,
        ornamentBottom: THEME_SVG.eucalyptusBranch,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Wedding March – Felix Mendelssohn',
        defaultMusicId: 13
    },
    13: {
        id: 13,
        slug: 'premium-summer-vibes',
        name: 'Premium Summer Vibes',
        tier: 'premium',
        layout: 'summer_vibes',
        fontHeading: "'Shrikhand', cursive",
        fontBody: "'Plus Jakarta Sans', sans-serif",
        googleFonts: 'Shrikhand&family=Plus+Jakarta+Sans:wght@300;400;500;600;700',
        bgColor: '#EDE8DF',
        bgCover: 'radial-gradient(circle at 50% 20%, #1D63B8 0%, #EDE8DF 100%)',
        bgTextureStyle: 'background: #EDE8DF;',
        primary: '#1D63B8',
        secondary: '#D94B26',
        accent: '#F4A261',
        textColor: '#1E293B',
        textLight: '#FAF5EC',
        cardBg: '#FAF8F5',
        borderColor: '#1D63B8',
        isDark: false,
        animationClass: 'animate-summer-sway',
        ornamentTop: THEME_SVG.goldLineDivider,
        ornamentBottom: THEME_SVG.goldLineDivider,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Over the Rainbow – Israel Kamakawiwoʻole',
        defaultMusicId: 18
    },
    14: {
        id: 14,
        slug: 'premium-serenade-blush-pink',
        name: 'Premium Serenade Blush Pink',
        tier: 'premium',
        layout: 'polaroid_gallery',
        fontHeading: "'Great Vibes', cursive",
        fontBody: "'Poppins', sans-serif",
        googleFonts: 'Great+Vibes&family=Poppins:wght@300;400;600',
        bgColor: '#FFF5F5',
        bgCover: 'linear-gradient(135deg, #f43f5e 0%, #e11d48 100%)',
        bgTextureStyle: 'background-color: #FFF5F5; background-image: radial-gradient(circle at 20% 30%, rgba(255,182,193,0.3) 0%, transparent 25%), radial-gradient(circle at 80% 70%, rgba(254,205,211,0.4) 0%, transparent 35%);',
        primary: '#e11d48',
        secondary: '#f43f5e',
        accent: '#fb7185',
        textColor: '#4c0519',
        textLight: '#FFF1F2',
        cardBg: '#ffffff',
        borderColor: '#FECDD3',
        isDark: false,
        animationClass: 'animate-sparkle',
        ornamentTop: THEME_SVG.fairyLights,
        ornamentBottom: THEME_SVG.fairyLights,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Windswept Harmony – Kevin MacLeod',
        defaultMusicId: 6
    },
    15: {
        id: 15,
        slug: 'premium-serenade-midnight-amber',
        name: 'Premium Serenade Midnight Amber',
        tier: 'premium',
        layout: 'midnight_amber',
        fontHeading: "'Cinzel', serif",
        fontScript: "'Great Vibes', cursive",
        fontBody: "'Plus Jakarta Sans', sans-serif",
        googleFonts: 'Cinzel:wght@400;600;700&family=Great+Vibes&family=Plus+Jakarta+Sans:wght@300;400;500;600;700',
        bgColor: '#161514',
        bgCover: 'linear-gradient(135deg, #161514 0%, #1c1a18 100%)',
        bgTextureStyle: 'background: #161514;',
        primary: '#DDA74F',
        secondary: '#2C5E6B',
        accent: '#E8C37D',
        textColor: '#FAF5EC',
        textLight: '#FAF5EC',
        cardBg: '#1C1A18',
        borderColor: '#DDA74F',
        isDark: true,
        animationClass: 'animate-gentle-sway',
        ornamentTop: THEME_SVG.goldLineDivider,
        ornamentBottom: THEME_SVG.goldLineDivider,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'A Thousand Years – Christina Perri',
        defaultMusicId: 17
    },
    16: {
        id: 16,
        slug: 'premium-museum-of-love',
        name: 'Premium Museum of Love',
        tier: 'premium',
        layout: 'museum_gallery',
        fontHeading: "'Cinzel Decorative', 'Cinzel', serif",
        fontBody: "'Plus Jakarta Sans', sans-serif",
        googleFonts: 'Cinzel+Decorative:wght@700;900&family=Cinzel:wght@600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700',
        bgColor: '#F7F2E8',
        bgCover: 'radial-gradient(circle at 50% 20%, #FFFDF8 0%, #F5EFE3 55%, #EDE4D1 100%)',
        bgTextureStyle: 'background: radial-gradient(circle at 50% 15%, rgba(255, 248, 230, 0.95) 0%, rgba(247, 242, 232, 0.4) 60%);',
        primary: '#8B1E22',
        secondary: '#D4AF37',
        accent: '#5C1417',
        textColor: '#2A1F1D',
        textLight: '#FAF5EC',
        cardBg: '#FFFFFF',
        borderColor: '#D4AF37',
        isDark: false,
        animationClass: 'animate-museum-spotlight',
        ornamentTop: THEME_SVG.goldLineDivider,
        ornamentBottom: THEME_SVG.goldLineDivider,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Clair de Lune – Claude Debussy',
        defaultMusicId: 1
    },
    17: {
        id: 17,
        slug: 'premium-serenade-botanical',
        name: 'Premium Serenade Botanical',
        tier: 'premium',
        layout: 'greenhouse_pavilion',
        fontHeading: "'Allison', cursive",
        fontBody: "'Cormorant Garamond', serif",
        googleFonts: 'Allison&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400',
        bgColor: '#162E24',
        bgCover: 'linear-gradient(180deg, #1a382c 0%, #102119 100%)',
        bgTextureStyle: 'background: linear-gradient(180deg, #162E24 0%, #0f2119 100%);',
        primary: '#16a34a',
        secondary: '#22c55e',
        accent: '#86efac',
        textColor: '#F0FDF4',
        textLight: '#F0FDF4',
        cardBg: '#1b3b2e',
        borderColor: '#22c55e',
        isDark: true,
        animationClass: 'animate-gentle-sway',
        ornamentTop: THEME_SVG.monsteraLeaf,
        ornamentBottom: THEME_SVG.monsteraLeaf,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Plantation Sunset – Jason Shaw',
        defaultMusicId: 9
    },
    18: {
        id: 18,
        slug: 'premium-crayon-dreams',
        name: 'Premium Crayon Dreams',
        tier: 'premium',
        layout: 'crayon_dreams',
        fontHeading: "'Comic Neue', cursive, sans-serif",
        fontBody: "'Plus Jakarta Sans', sans-serif",
        googleFonts: 'Comic+Neue:wght@400;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700',
        bgColor: '#E8F1FA',
        bgCover: 'radial-gradient(circle at 50% 20%, #E8F1FA 0%, #D0E3F5 100%)',
        bgTextureStyle: 'background-color: #E8F1FA; background-image: url("/images/themes/crayon-dreams/bg-crayon-texture.jpg"); background-size: cover; background-repeat: repeat;',
        primary: '#8B3A4A',
        secondary: '#3B82F6',
        accent: '#F59E0B',
        textColor: '#2D3748',
        textLight: '#FFFDF7',
        cardBg: '#FFFDF7',
        borderColor: '#8B3A4A',
        isDark: false,
        animationClass: 'animate-crayon-float',
        ornamentTop: THEME_SVG.goldLineDivider,
        ornamentBottom: THEME_SVG.goldLineDivider,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Sweet Pastel Serenade – Jason Shaw',
        defaultMusicId: 18
    },
    19: {
        id: 19,
        slug: 'premium-serenade-lavender-mist',
        name: 'Premium Serenade Lavender Mist',
        tier: 'premium',
        layout: 'frosted_capsule',
        fontHeading: "'Playfair Display', serif",
        fontBody: "'Urbanist', sans-serif",
        googleFonts: 'Playfair+Display:ital,wght@0,600;0,700;1,400&family=Urbanist:wght@300;400;600',
        bgColor: '#FAF7FC',
        bgCover: 'linear-gradient(180deg, rgba(30,15,45,0.4) 0%, rgba(20,10,35,0.7) 100%), url(https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80)',
        bgTextureStyle: 'background-color: #FAF7FC; background-image: radial-gradient(rgba(155,136,179,0.12) 1px, transparent 0); background-size: 16px 16px;',
        primary: '#9B88B3',
        secondary: '#846B9C',
        accent: '#4C1D95',
        textColor: '#2E1A47',
        textLight: '#FFFFFF',
        cardBg: '#FFFFFF',
        borderColor: '#D6C8E3',
        isDark: false,
        animationClass: 'animate-float-slow',
        ornamentTop: THEME_SVG.auroraWisp,
        ornamentBottom: THEME_SVG.auroraWisp,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: 'Acoustic Meadow Waltz – SoundHelix',
        defaultMusicId: 10
    },
    20: {
        id: 20,
        slug: 'premium-serenade-dark-elegance',
        name: 'Premium Serenade Dark Elegance',
        tier: 'premium',
        layout: 'cinematic_spotlight',
        fontHeading: "'Mea Culpa', cursive",
        fontBody: "'DM Serif Display', serif",
        googleFonts: 'Mea+Culpa&family=DM+Serif+Display:ital@0;1',
        bgColor: '#0D0D0D',
        bgCover: 'radial-gradient(circle at 50% 20%, #24140b 0%, #0D0D0D 80%)',
        bgTextureStyle: 'background: radial-gradient(circle at 50% 20%, #202020 0%, #0D0D0D 80%);',
        primary: '#ea580c',
        secondary: '#c2410c',
        accent: '#fb923c',
        textColor: '#FAF5EE',
        textLight: '#FAF5EE',
        cardBg: '#171717',
        borderColor: '#ea580c',
        isDark: true,
        animationClass: 'animate-sparkle',
        ornamentTop: THEME_SVG.cinematicFlame,
        ornamentBottom: THEME_SVG.cinematicFlame,
        dividerSvg: THEME_SVG.goldLineDivider,
        defaultMusic: "Jesu, Joy of Man's Desiring – J.S. Bach",
        defaultMusicId: 15
    }
};

/**
 * Renders the exact Photo Layout for the given theme inside the live smartphone mockup
 */
function renderMockupPhotoLayout(theme, data) {
    const defaultGroom = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&auto=format&fit=crop&q=80';
    const defaultBride = 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=600&auto=format&fit=crop&q=80';
    const groomImg = data.groomPhotoUrl 
        ? `<img src="${data.groomPhotoUrl}" class="w-full h-full object-cover">` 
        : `<img src="${defaultGroom}" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='${THEME_SVG.avatarGroom}'">`;
    const brideImg = data.bridePhotoUrl 
        ? `<img src="${data.bridePhotoUrl}" class="w-full h-full object-cover">` 
        : `<img src="${defaultBride}" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='${THEME_SVG.avatarBride}'">`;
    const coupleImg = data.groomPhotoUrl || data.bridePhotoUrl 
        ? `<img src="${data.groomPhotoUrl || data.bridePhotoUrl}" class="w-full h-full object-cover">` 
        : `<img src="${defaultGroom}" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='${THEME_SVG.avatarCouple}'">`;

    const groomName = data.groomName || 'Mempelai Pria';
    const brideName = data.brideName || 'Mempelai Wanita';
    const groomParents = data.groomParents || '';
    const brideParents = data.brideParents || '';
    const groomIg = data.groomIg ? `<span class="text-[8px] opacity-80 block mt-0.5">@${data.groomIg.replace(/^@/, '')}</span>` : '';
    const brideIg = data.brideIg ? `<span class="text-[8px] opacity-80 block mt-0.5">@${data.brideIg.replace(/^@/, '')}</span>` : '';

    const textClass = theme.isDark ? 'text-white' : 'text-stone-900';
    const subTextClass = theme.isDark ? 'text-stone-300' : 'text-stone-600';

    switch (theme.layout) {
        // 1. Vertical Stack Classic - Arch Kubah Mewah (Theme 1)
        case 'vertical_stack':
            return `
            <div class="space-y-4 py-2">
                <!-- Mempelai Pria (Bingkai Arch Kubah Mewah) -->
                <div class="flex flex-col items-center text-center group">
                    <div class="w-24 h-32 rounded-t-full rounded-b-xl aspect-[3/4] overflow-hidden border-2 border-amber-400/80 ring-4 ring-amber-500/20 shadow-xl mb-2 bg-white hover:scale-105 transition-transform duration-300 relative mx-auto">
                        ${groomImg}
                    </div>
                    <h4 class="font-bold text-xs ${textClass}" style="font-family: ${theme.fontHeading};">${groomName}</h4>
                    <p class="text-[9px] ${subTextClass} mt-0.5 max-w-[200px] leading-tight">${groomParents}</p>
                    ${groomIg}
                </div>

                <div class="flex items-center justify-center gap-2">
                    <div class="w-12 h-px bg-amber-500/40"></div>
                    <span class="font-serif italic text-base text-amber-600">&</span>
                    <div class="w-12 h-px bg-amber-500/40"></div>
                </div>

                <!-- Mempelai Wanita (Bingkai Arch Kubah Mewah) -->
                <div class="flex flex-col items-center text-center group">
                    <div class="w-24 h-32 rounded-t-full rounded-b-xl aspect-[3/4] overflow-hidden border-2 border-amber-400/80 ring-4 ring-amber-500/20 shadow-xl mb-2 bg-white hover:scale-105 transition-transform duration-300 relative mx-auto">
                        ${brideImg}
                    </div>
                    <h4 class="font-bold text-xs ${textClass}" style="font-family: ${theme.fontHeading};">${brideName}</h4>
                    <p class="text-[9px] ${subTextClass} mt-0.5 max-w-[200px] leading-tight">${brideParents}</p>
                    ${brideIg}
                </div>
            </div>`;

        // 2. Side-by-Side Kubah Lengkung (Theme 2)
        case 'side_arch':
            return `
            <div class="grid grid-cols-2 gap-3 py-2">
                <div class="flex flex-col items-center text-center">
                    <div class="w-full aspect-[3/4] max-w-[105px] rounded-t-full rounded-b-md overflow-hidden border-2 shadow-md mb-1.5 bg-white" style="border-color: ${theme.primary};">
                        ${groomImg}
                    </div>
                    <h4 class="font-bold text-xs ${textClass}" style="font-family: ${theme.fontHeading};">${groomName}</h4>
                    <p class="text-[8px] ${subTextClass} mt-0.5 leading-tight">${groomParents}</p>
                    ${groomIg}
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="w-full aspect-[3/4] max-w-[105px] rounded-t-full rounded-b-md overflow-hidden border-2 shadow-md mb-1.5 bg-white" style="border-color: ${theme.primary};">
                        ${brideImg}
                    </div>
                    <h4 class="font-bold text-xs ${textClass}" style="font-family: ${theme.fontHeading};">${brideName}</h4>
                    <p class="text-[8px] ${subTextClass} mt-0.5 leading-tight">${brideParents}</p>
                    ${brideIg}
                </div>
            </div>`;

        // 3. Formal Square Frame with Gold Bevel (Theme 3)
        case 'formal_square':
            return `
            <div class="space-y-2 py-2">
                <div class="grid grid-cols-2 gap-3">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-20 h-20 rounded-md overflow-hidden border-2 shadow-md p-0.5 bg-white" style="border-color: ${theme.accent};">
                            <div class="w-full h-full rounded-xs overflow-hidden">
                                ${groomImg}
                            </div>
                        </div>
                        <h4 class="font-bold text-[11px] mt-1.5 ${textClass}" style="font-family: ${theme.fontHeading};">${groomName}</h4>
                        <p class="text-[8px] ${subTextClass} mt-0.5 leading-tight">${groomParents}</p>
                        ${groomIg}
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div class="w-20 h-20 rounded-md overflow-hidden border-2 shadow-md p-0.5 bg-white" style="border-color: ${theme.accent};">
                            <div class="w-full h-full rounded-xs overflow-hidden">
                                ${brideImg}
                            </div>
                        </div>
                        <h4 class="font-bold text-[11px] mt-1.5 ${textClass}" style="font-family: ${theme.fontHeading};">${brideName}</h4>
                        <p class="text-[8px] ${subTextClass} mt-0.5 leading-tight">${brideParents}</p>
                        ${brideIg}
                    </div>
                </div>
                <div class="flex justify-center pt-1">
                    <div class="w-6 h-6">${THEME_SVG.geometricMonogram}</div>
                </div>
            </div>`;

        // 4. Circular Overlap (Theme 4)
        case 'circular_overlap':
            return `
            <div class="flex flex-col items-center py-2">
                <div class="relative w-40 h-24 mb-3">
                    <div class="absolute left-1 top-0 w-20 h-20 rounded-full overflow-hidden border-2 border-white shadow-lg z-10 bg-white">
                        ${groomImg}
                    </div>
                    <div class="absolute right-1 bottom-0 w-20 h-20 rounded-full overflow-hidden border-2 border-white shadow-xl z-20 bg-white" style="outline: 2px solid ${theme.primary};">
                        ${brideImg}
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3 w-full text-center">
                    <div>
                        <h4 class="font-bold text-[11px] ${textClass}" style="font-family: ${theme.fontHeading};">${groomName}</h4>
                        <p class="text-[8px] ${subTextClass} mt-0.5 leading-tight">${groomParents}</p>
                        ${groomIg}
                    </div>
                    <div>
                        <h4 class="font-bold text-[11px] ${textClass}" style="font-family: ${theme.fontHeading};">${brideName}</h4>
                        <p class="text-[8px] ${subTextClass} mt-0.5 leading-tight">${brideParents}</p>
                        ${brideIg}
                    </div>
                </div>
            </div>`;

        // 5. Editorial Magazine Tall (Theme 5)
        case 'editorial_tall':
            return `
            <div class="space-y-3 py-2 text-left">
                <!-- Frame Hero 3:4 Grayscale -->
                <div class="w-full aspect-[3/4] rounded-sm overflow-hidden border border-stone-800 shadow-md grayscale bg-stone-100">
                    ${coupleImg}
                </div>
                <div class="grid grid-cols-2 gap-2 pt-1">
                    <div class="flex items-start gap-2 border-l-2 border-stone-800 pl-2">
                        <div class="w-9 h-9 rounded-xs overflow-hidden shrink-0 border border-stone-400 bg-white">
                            ${groomImg}
                        </div>
                        <div>
                            <h4 class="font-bold text-[10px] ${textClass}">${groomName}</h4>
                            <p class="text-[7px] ${subTextClass} leading-tight">${groomParents}</p>
                            ${groomIg}
                        </div>
                    </div>
                    <div class="flex items-start gap-2 border-l-2 border-stone-800 pl-2">
                        <div class="w-9 h-9 rounded-xs overflow-hidden shrink-0 border border-stone-400 bg-white">
                            ${brideImg}
                        </div>
                        <div>
                            <h4 class="font-bold text-[10px] ${textClass}">${brideName}</h4>
                            <p class="text-[7px] ${subTextClass} leading-tight">${brideParents}</p>
                            ${brideIg}
                        </div>
                    </div>
                </div>
            </div>`;

        // 6. Asymmetric Diagonal Polaroid (Theme 6)
        case 'asymmetric_polaroid':
            return `
            <div class="space-y-4 py-2">
                <div class="flex justify-start pl-2">
                    <div class="w-28 bg-white p-1.5 pb-4 rounded-xs shadow-md transform -rotate-3 border border-amber-900/10">
                        <div class="w-full aspect-square overflow-hidden bg-stone-100">
                            ${brideImg}
                        </div>
                        <p class="font-bold text-[9px] text-stone-800 text-center mt-1.5 truncate">${brideName}</p>
                    </div>
                </div>
                <div class="flex justify-end pr-2 -mt-4">
                    <div class="w-28 bg-white p-1.5 pb-4 rounded-xs shadow-md transform rotate-3 border border-amber-900/10">
                        <div class="w-full aspect-square overflow-hidden bg-stone-100">
                            ${groomImg}
                        </div>
                        <p class="font-bold text-[9px] text-stone-800 text-center mt-1.5 truncate">${groomName}</p>
                    </div>
                </div>
                <div class="text-center text-[9px] ${subTextClass} space-y-1 pt-1">
                    <p><span class="font-bold text-stone-900">${groomName}</span>: ${groomParents}</p>
                    <p><span class="font-bold text-stone-900">${brideName}</span>: ${brideParents}</p>
                </div>
            </div>`;

        // 7. Rounded Hexagon Frame (Theme 7)
        case 'rounded_hexagon':
            return `
            <div class="grid grid-cols-2 gap-3 py-2">
                <div class="flex flex-col items-center text-center">
                    <div class="w-20 h-20 rounded-2xl overflow-hidden border-2 shadow-md p-0.5 bg-white transform rotate-45 mb-4 mt-2" style="border-color: ${theme.primary};">
                        <div class="w-full h-full rounded-xl overflow-hidden transform -rotate-45 scale-125">
                            ${groomImg}
                        </div>
                    </div>
                    <h4 class="font-bold text-xs ${textClass}" style="font-family: ${theme.fontHeading};">${groomName}</h4>
                    <p class="text-[8px] ${subTextClass} mt-0.5 leading-tight">${groomParents}</p>
                    ${groomIg}
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="w-20 h-20 rounded-2xl overflow-hidden border-2 shadow-md p-0.5 bg-white transform rotate-45 mb-4 mt-2" style="border-color: ${theme.primary};">
                        <div class="w-full h-full rounded-xl overflow-hidden transform -rotate-45 scale-125">
                            ${brideImg}
                        </div>
                    </div>
                    <h4 class="font-bold text-xs ${textClass}" style="font-family: ${theme.fontHeading};">${brideName}</h4>
                    <p class="text-[8px] ${subTextClass} mt-0.5 leading-tight">${brideParents}</p>
                    ${brideIg}
                </div>
            </div>`;

        // 8. Oval Portrait Side-by-Side (Theme 8)
        case 'oval_side':
            return `
            <div class="grid grid-cols-2 gap-3 py-2">
                <div class="flex flex-col items-center text-center">
                    <div class="w-18 h-24 rounded-[50%] overflow-hidden border-2 shadow-md mb-2 p-0.5 bg-white" style="border-color: ${theme.primary};">
                        <div class="w-full h-full rounded-[50%] overflow-hidden">
                            ${groomImg}
                        </div>
                    </div>
                    <h4 class="font-bold text-xs ${textClass}" style="font-family: ${theme.fontHeading};">${groomName}</h4>
                    <p class="text-[8px] ${subTextClass} mt-0.5 leading-tight">${groomParents}</p>
                    ${groomIg}
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="w-18 h-24 rounded-[50%] overflow-hidden border-2 shadow-md mb-2 p-0.5 bg-white" style="border-color: ${theme.primary};">
                        <div class="w-full h-full rounded-[50%] overflow-hidden">
                            ${brideImg}
                        </div>
                    </div>
                    <h4 class="font-bold text-xs ${textClass}" style="font-family: ${theme.fontHeading};">${brideName}</h4>
                    <p class="text-[8px] ${subTextClass} mt-0.5 leading-tight">${brideParents}</p>
                    ${brideIg}
                </div>
            </div>`;

        // 9. Diamond Pill Shape (Theme 9)
        case 'diamond_pill':
            return `
            <div class="grid grid-cols-2 gap-3 py-2">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-28 rounded-full overflow-hidden border-2 shadow-md mb-2 p-0.5 bg-white" style="border-color: ${theme.accent};">
                        <div class="w-full h-full rounded-full overflow-hidden">
                            ${groomImg}
                        </div>
                    </div>
                    <h4 class="font-bold text-xs ${textClass}" style="font-family: ${theme.fontHeading};">${groomName}</h4>
                    <p class="text-[8px] ${subTextClass} mt-0.5 leading-tight">${groomParents}</p>
                    ${groomIg}
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-28 rounded-full overflow-hidden border-2 shadow-md mb-2 p-0.5 bg-white" style="border-color: ${theme.accent};">
                        <div class="w-full h-full rounded-full overflow-hidden">
                            ${brideImg}
                        </div>
                    </div>
                    <h4 class="font-bold text-xs ${textClass}" style="font-family: ${theme.fontHeading};">${brideName}</h4>
                    <p class="text-[8px] ${subTextClass} mt-0.5 leading-tight">${brideParents}</p>
                    ${brideIg}
                </div>
            </div>`;

        // 10. Split Offset Card (Theme 10)
        case 'split_offset':
            return `
            <div class="space-y-3 py-2">
                <div class="flex items-center gap-2.5 p-2 rounded-xl bg-stone-800/80 border border-stone-700 shadow-sm">
                    <div class="w-14 h-14 rounded-lg overflow-hidden shrink-0 border border-amber-500/40 bg-stone-900">
                        ${groomImg}
                    </div>
                    <div class="text-left flex-1">
                        <h4 class="font-bold text-xs text-amber-100" style="font-family: ${theme.fontHeading};">${groomName}</h4>
                        <p class="text-[8px] text-stone-300 mt-0.5 leading-tight">${groomParents}</p>
                        ${groomIg}
                    </div>
                </div>
                <div class="flex items-center gap-2.5 p-2 rounded-xl bg-stone-800/80 border border-stone-700 shadow-sm ml-3">
                    <div class="w-14 h-14 rounded-lg overflow-hidden shrink-0 border border-amber-500/40 bg-stone-900">
                        ${brideImg}
                    </div>
                    <div class="text-left flex-1">
                        <h4 class="font-bold text-xs text-amber-100" style="font-family: ${theme.fontHeading};">${brideName}</h4>
                        <p class="text-[8px] text-stone-300 mt-0.5 leading-tight">${brideParents}</p>
                        ${brideIg}
                    </div>
                </div>
            </div>`;

        // 11. Luxury Magazine Layered (Theme 11)
        case 'luxury_layered':
            return `
            <div class="relative py-2 text-center">
                <div class="w-full h-32 rounded-xl overflow-hidden shadow-lg border border-rose-900/40 bg-stone-900 relative">
                    ${coupleImg}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
                </div>
                <div class="relative -mt-10 mx-auto w-20 h-20 rounded-full p-1 bg-stone-900 border-2 border-amber-400 shadow-2xl z-20">
                    <div class="w-full h-full rounded-full overflow-hidden bg-rose-950">
                        ${groomImg}
                    </div>
                </div>
                <div class="mt-2 text-center text-white">
                    <h4 class="font-bold text-xs text-amber-200" style="font-family: ${theme.fontHeading};">${groomName} & ${brideName}</h4>
                    <p class="text-[8px] text-stone-300 mt-0.5 leading-tight">${groomParents} • ${brideParents}</p>
                </div>
            </div>`;

        // 12. Triple Floating Tiles (Theme 12)
        case 'triple_floating':
            return `
            <div class="relative py-2">
                <div class="flex items-center justify-center gap-1.5">
                    <div class="w-16 h-22 rounded-xl overflow-hidden shadow-md transform -translate-y-2 border border-emerald-400/40 bg-stone-900">
                        ${groomImg}
                    </div>
                    <div class="w-22 h-26 rounded-xl overflow-hidden shadow-xl z-10 border-2 border-amber-400 bg-stone-900">
                        ${coupleImg}
                    </div>
                    <div class="w-16 h-22 rounded-xl overflow-hidden shadow-md transform translate-y-2 border border-emerald-400/40 bg-stone-900">
                        ${brideImg}
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2 mt-3 text-center text-white">
                    <div>
                        <h4 class="font-bold text-[10px] text-amber-300">${groomName}</h4>
                        <p class="text-[7px] text-stone-300 leading-tight">${groomParents}</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-[10px] text-amber-300">${brideName}</h4>
                        <p class="text-[7px] text-stone-300 leading-tight">${brideParents}</p>
                    </div>
                </div>
            </div>`;

        // 13. Imperial Arch Window (Theme 13)
        case 'imperial_arch':
            return `
            <div class="py-2 text-center">
                <div class="w-40 mx-auto aspect-[3/4] rounded-t-full border-4 border-amber-400/80 p-1 shadow-2xl bg-stone-900 relative">
                    <div class="w-full h-full rounded-t-full overflow-hidden">
                        ${coupleImg}
                    </div>
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-8 h-8">${THEME_SVG.royalFiligree}</div>
                </div>
                <div class="mt-3 text-white">
                    <h4 class="font-bold text-sm text-amber-300" style="font-family: ${theme.fontHeading};">${groomName} & ${brideName}</h4>
                    <p class="text-[8px] text-stone-300 mt-1">${groomParents}</p>
                    <p class="text-[8px] text-stone-300">${brideParents}</p>
                </div>
            </div>`;

        // 14. Scraped Polaroid Gallery (Theme 14)
        case 'polaroid_gallery':
            return `
            <div class="py-2 space-y-3">
                <div class="flex items-center justify-center gap-2">
                    <div class="w-24 bg-white p-1 pb-3 rounded-xs shadow-lg transform -rotate-6 border border-rose-200 relative">
                        <div class="absolute -top-1.5 left-1/2 -translate-x-1/2 w-3 h-3 rounded-full bg-amber-400 shadow"></div>
                        <div class="w-full aspect-square overflow-hidden bg-rose-50">
                            ${groomImg}
                        </div>
                        <p class="text-[8px] font-bold text-rose-900 text-center mt-1 truncate">${groomName}</p>
                    </div>
                    <div class="w-24 bg-white p-1 pb-3 rounded-xs shadow-lg transform rotate-6 border border-rose-200 relative">
                        <div class="absolute -top-1.5 left-1/2 -translate-x-1/2 w-3 h-3 rounded-full bg-amber-400 shadow"></div>
                        <div class="w-full aspect-square overflow-hidden bg-rose-50">
                            ${brideImg}
                        </div>
                        <p class="text-[8px] font-bold text-rose-900 text-center mt-1 truncate">${brideName}</p>
                    </div>
                </div>
                <p class="text-center text-[8px] text-rose-900/80 leading-tight">${groomParents} • ${brideParents}</p>
            </div>`;

        // 15. Midnight Amber Luxury Arch (Theme 15)
        case 'midnight_amber':
        case 'rustic_wood':
            return `
            <div class="py-2 space-y-2 text-center">
                <div class="relative w-28 h-36 mx-auto rounded-t-[52px] rounded-b-md overflow-hidden border-2 border-[#DDA74F] shadow-2xl bg-[#1C1A18]">
                    ${coupleImg}
                </div>
                <div class="mt-2 text-[#FAF5EC]">
                    <h4 class="font-bold text-sm tracking-wide text-[#FAF5EC]" style="font-family: ${theme.fontHeading};">${groomName} &amp; ${brideName}</h4>
                    <p class="text-[8px] text-[#C4B5A5] mt-0.5">${groomParents} • ${brideParents}</p>
                </div>
            </div>`;

        // 16. Floating Gold Mirror (Theme 16)
        case 'gold_mirror':
            return `
            <div class="py-2 text-center">
                <div class="w-36 h-48 mx-auto rounded-[2rem] border-3 border-amber-400 p-1 shadow-2xl bg-stone-900 relative" style="box-shadow: 0 0 20px rgba(234,179,8,0.25);">
                    <div class="w-full h-full rounded-[1.8rem] overflow-hidden">
                        ${coupleImg}
                    </div>
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-8 h-8">${THEME_SVG.goldMirrorFrame}</div>
                </div>
                <div class="mt-2 text-amber-200">
                    <h4 class="font-bold text-sm" style="font-family: ${theme.fontHeading};">${groomName} & ${brideName}</h4>
                    <p class="text-[8px] text-stone-400 mt-0.5">${groomParents} • ${brideParents}</p>
                </div>
            </div>`;

        // 17. Greenhouse Glass Pavilion (Theme 17)
        case 'greenhouse_pavilion':
            return `
            <div class="py-2 text-center">
                <div class="w-40 mx-auto aspect-[3/4] rounded-2xl overflow-hidden border border-emerald-500/50 p-1 bg-stone-900/60 backdrop-blur-sm relative shadow-xl">
                    <div class="w-full h-full rounded-xl overflow-hidden">
                        ${coupleImg}
                    </div>
                    <div class="absolute top-1 left-1 w-6 h-6 text-emerald-400">${THEME_SVG.monsteraLeaf}</div>
                    <div class="absolute bottom-1 right-1 w-6 h-6 text-emerald-400 transform rotate-180">${THEME_SVG.monsteraLeaf}</div>
                </div>
                <div class="mt-2 text-emerald-100">
                    <h4 class="font-bold text-sm" style="font-family: ${theme.fontHeading};">${groomName} & ${brideName}</h4>
                    <p class="text-[8px] text-emerald-300/80 mt-0.5">${groomParents} • ${brideParents}</p>
                </div>
            </div>`;

        // 18. Monolith Vertical Split (Theme 18)
        case 'monolith_split':
            return `
            <div class="grid grid-cols-2 gap-2 py-2 items-center text-left">
                <div class="w-full aspect-[3/4] rounded-sm overflow-hidden border border-stone-300 shadow-md bg-stone-100">
                    ${coupleImg}
                </div>
                <div class="space-y-1.5 pl-1">
                    <span class="text-[7px] tracking-widest uppercase text-stone-400 font-bold block">MEMPELAI</span>
                    <h4 class="font-bold text-xs text-stone-900" style="font-family: ${theme.fontHeading};">${groomName}</h4>
                    <p class="text-[7px] text-stone-500 leading-tight">${groomParents}</p>
                    <div class="w-4 h-px bg-stone-400 my-1"></div>
                    <h4 class="font-bold text-xs text-stone-900" style="font-family: ${theme.fontHeading};">${brideName}</h4>
                    <p class="text-[7px] text-stone-500 leading-tight">${brideParents}</p>
                </div>
            </div>`;

        // 19. Frosted Glass Capsule (Theme 19 - Lavender Mist)
        case 'frosted_capsule':
            return `
            <div class="py-2 text-center relative">
                <div class="w-44 mx-auto rounded-3xl p-3.5 border border-purple-200/50 bg-[#9B88B3] text-white shadow-xl relative overflow-hidden">
                    <div class="w-20 h-24 mx-auto rounded-t-full rounded-b-lg overflow-hidden border-2 border-white/80 shadow mb-2 bg-stone-900">
                        ${coupleImg}
                    </div>
                    <span class="text-[7px] uppercase tracking-widest text-purple-100 font-semibold block mb-0.5">The Wedding of</span>
                    <h4 class="font-bold text-sm text-white drop-shadow-sm" style="font-family: ${theme.fontHeading};">${groomName} & ${brideName}</h4>
                    <p class="text-[7px] text-purple-100/90 mt-1 leading-tight">${groomParents}</p>
                    <p class="text-[7px] text-purple-100/90 leading-tight">${brideParents}</p>
                    <div class="mt-2 pt-1 border-t border-white/20 text-[6.5px] uppercase tracking-wider text-purple-200">
                        Wildflowers &amp; Lavender Mist
                    </div>
                </div>
            </div>`;

        // 20. Cinematic Wide Spotlight (Theme 20)
        case 'cinematic_spotlight':
            return `
            <div class="py-2 text-center">
                <div class="w-full aspect-[16/9] rounded-xl overflow-hidden border border-amber-600/40 shadow-2xl bg-black relative">
                    ${coupleImg}
                    <div class="absolute inset-0 bg-radial-at-c from-transparent via-black/40 to-black/80"></div>
                </div>
                <div class="mt-2 text-amber-100">
                    <h4 class="font-bold text-sm text-amber-400" style="font-family: ${theme.fontHeading};">${groomName} & ${brideName}</h4>
                    <p class="text-[8px] text-stone-400 mt-0.5">${groomParents} • ${brideParents}</p>
                </div>
            </div>`;

        default:
            return '';
    }
}

/**
 * Apply selected theme across the live smartphone mockup
 */
function applyThemeEngine(themeId, data = {}) {
    const theme = THEMES_CONFIG[themeId] || THEMES_CONFIG[1];

    // 1. Dynamic Font Injection
    let fontLink = document.getElementById('dynamic-theme-font-link');
    if (!fontLink) {
        fontLink = document.createElement('link');
        fontLink.id = 'dynamic-theme-font-link';
        fontLink.rel = 'stylesheet';
        document.head.appendChild(fontLink);
    }
    fontLink.href = `https://fonts.googleapis.com/css2?family=${theme.googleFonts}&display=swap`;

    // 2. Mockup Screen Container Background & Texture
    const screen = document.getElementById('mockup-screen-container');
    if (screen) {
        screen.style.cssText = `${theme.bgTextureStyle} font-family: ${theme.fontBody}; color: ${theme.textColor};`;

        // Dynamic theme background overlay for optimal contrast
        let overlay = document.getElementById('mockup-theme-bg-overlay');
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.id = 'mockup-theme-bg-overlay';
            screen.prepend(overlay);
        }
        if (theme.bgOverlayStyle) {
            overlay.className = 'absolute inset-0 min-h-full w-full pointer-events-none z-0 transition-all duration-300';
            overlay.style.cssText = `${theme.bgOverlayStyle} position: absolute; inset: 0; min-height: 100%; width: 100%; pointer-events: none; z-index: 0;`;
            overlay.style.display = 'block';
        } else if (theme.bgOverlay) {
            overlay.className = `absolute inset-0 min-h-full w-full pointer-events-none z-0 ${theme.bgOverlay} transition-all duration-300`;
            overlay.style.cssText = '';
            overlay.style.display = 'block';
        } else {
            overlay.className = 'hidden';
            overlay.style.cssText = '';
            overlay.style.display = 'none';
        }
    }

    // 3. Hero Cover Styling
    const cover = document.getElementById('mockup-section-cover');
    if (cover) {
        cover.style.background = theme.bgCover;
        cover.style.fontFamily = theme.fontHeading;
    }

    // 4. Hero Names & Typography
    const coupleNames = document.getElementById('mockup-couple-names');
    if (coupleNames) {
        coupleNames.style.fontFamily = theme.fontHeading;
        coupleNames.style.color = theme.textLight;
    }

    // 5. Tier & Theme Badges
    const themeBadge = document.getElementById('mockup-theme-badge');
    if (themeBadge) {
        themeBadge.innerText = theme.name;
        themeBadge.style.fontFamily = theme.fontHeading;
    }
    const tierBadge = document.getElementById('mockup-tier-badge');
    if (tierBadge) {
        tierBadge.innerText = theme.tier.toUpperCase();
        tierBadge.className = theme.tier === 'premium'
            ? 'px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-amber-700 text-white shadow-xs'
            : 'px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-emerald-600 text-white shadow-xs';
    }

    // 6. Real SVG Ornaments (NO EMOJIS)
    const ornamentTop = document.getElementById('mockup-ornament-top');
    if (ornamentTop) {
        ornamentTop.innerHTML = theme.ornamentTop;
        ornamentTop.className = `w-8 h-8 mx-auto mb-1 ${theme.animationClass}`;
    }

    const dividerContainer = document.getElementById('mockup-ornament-divider');
    if (dividerContainer) {
        dividerContainer.innerHTML = theme.dividerSvg;
    }

    // 7. Dynamic Photo Layout Injection
    const photoContainer = document.getElementById('mockup-photo-layout-container');
    if (photoContainer) {
        photoContainer.innerHTML = renderMockupPhotoLayout(theme, data);
    }

    // 8. Quote Box Styling & Conditional Visibility
    const quoteContainer = document.getElementById('mockup-section-quote');
    const showQuote = data.showQuote !== undefined ? data.showQuote : true;
    if (quoteContainer) {
        if (!showQuote) {
            quoteContainer.style.display = 'none';
        } else {
            quoteContainer.style.display = 'block';
            quoteContainer.style.backgroundColor = theme.cardBg;
            quoteContainer.style.borderColor = theme.borderColor;
            const qQuran = document.getElementById('mockup-quran-text');
            const qTrans = document.getElementById('mockup-quran-trans');
            const qSource = document.getElementById('mockup-quote-source');
            if (qQuran) qQuran.style.color = theme.primary;
            if (qSource) qSource.style.color = theme.accent;
            if (qTrans) qTrans.style.color = theme.textColor;
        }
    }

    // 9. Countdown Box Highlights
    const cdDays = document.getElementById('mockup-cd-days');
    const cdHours = document.getElementById('mockup-cd-hours');
    const cdMins = document.getElementById('mockup-cd-mins');
    const cdSecs = document.getElementById('mockup-cd-secs');
    [cdDays, cdHours, cdMins, cdSecs].forEach(el => {
        if (el) el.style.color = theme.primary;
    });

    // 10. Default Music Auto-Selection
    const musicInput = document.getElementById('music_id');
    if (musicInput && !musicInput.dataset.userModified) {
        if (theme.defaultMusicId) {
            musicInput.value = theme.defaultMusicId;
            const ind = document.getElementById('mockup-music-indicator');
            if (ind) ind.innerText = theme.defaultMusic.split('–')[0].trim();
            const musicDisplay = document.getElementById('active-music-title-display');
            if (musicDisplay) musicDisplay.innerText = theme.defaultMusic;
        }
    }

    // 11. Cover Overlay Dynamic Styling
    const coverOverlay = document.getElementById('mockup-cover-overlay');
    if (coverOverlay) {
        coverOverlay.style.background = theme.bgCover;
        const covOrnament = document.getElementById('mockup-cover-ornament');
        if (covOrnament) {
            covOrnament.innerHTML = theme.ornamentTop;
            covOrnament.className = `w-10 h-10 mx-auto mb-2 ${theme.animationClass}`;
        }
        const covNames = document.getElementById('mockup-cover-names');
        if (covNames) {
            covNames.style.fontFamily = theme.fontHeading;
            const groomNick = data.groomNickname || 'Rian';
            const brideNick = data.brideNickname || 'Maya';
            covNames.innerText = `${groomNick} & ${brideNick}`;
        }
        const covDate = document.getElementById('mockup-cover-date');
        if (covDate && data.eventDate) {
            covDate.innerText = data.eventDate;
        }
        const covGuest = document.getElementById('mockup-cover-guest');
        if (covGuest) {
            const guestName = data.guestName || (new URLSearchParams(window.location.search).get('to')) || 'Tamu Undangan';
            covGuest.innerText = guestName;
        }
    }
}

// ==========================================
// 20 MUSIC TRACKS REGISTRY (10 Modern Acoustic & 10 Classical & Sacred)
// ==========================================
let MUSIC_TRACKS = [
    // --- 10 Modern Acoustic ---
    {
        id: 1,
        title: 'Solo Acoustic Serenade',
        artist: 'Jason Shaw (Audionautix)',
        category: 'Modern Acoustic',
        duration: '03:45',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/b/bf/Jason_Shaw_-_SOLO_ACOUSTIC_GUITAR.ogg/Jason_Shaw_-_SOLO_ACOUSTIC_GUITAR.ogg.mp3'
    },
    {
        id: 2,
        title: 'Acoustic Meditation',
        artist: 'Jason Shaw (Fingerstyle Guitar)',
        category: 'Modern Acoustic',
        duration: '03:30',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/c/cb/Jason_Shaw_-_ACOUSTIC_MEDITATION.ogg/Jason_Shaw_-_ACOUSTIC_MEDITATION.ogg.mp3'
    },
    {
        id: 3,
        title: 'Green Leaves Romance',
        artist: 'Jason Shaw (Acoustic Guitar)',
        category: 'Modern Acoustic',
        duration: '02:32',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/e/ec/Jason_Shaw_-_GREEN_LEAVES.ogg/Jason_Shaw_-_GREEN_LEAVES.ogg.mp3'
    },
    {
        id: 4,
        title: 'Serenity Strings',
        artist: 'Jason Shaw (Soft Guitar)',
        category: 'Modern Acoustic',
        duration: '02:00',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/2/2d/Jason_Shaw_-_SERENITY.ogg/Jason_Shaw_-_SERENITY.ogg.mp3'
    },
    {
        id: 5,
        title: 'Calmant (Peaceful Acoustic)',
        artist: 'Kevin MacLeod (Incompetech)',
        category: 'Modern Acoustic',
        duration: '03:12',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/3/3c/Kevin_MacLeod_-_Calmant.ogg/Kevin_MacLeod_-_Calmant.ogg.mp3'
    },
    {
        id: 6,
        title: 'Windswept Harmony',
        artist: 'Kevin MacLeod (Acoustic Guitar & Flute)',
        category: 'Modern Acoustic',
        duration: '03:48',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/2/23/Kevin_MacLeod_-_Windswept.ogg/Kevin_MacLeod_-_Windswept.ogg.mp3'
    },
    {
        id: 7,
        title: 'Bach Cello Suite No. 1 Prelude',
        artist: 'John Michel (Solo Cello)',
        category: 'Modern Acoustic',
        duration: '02:14',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/4/43/JOHN_MICHEL_CELLO-J_S_BACH_CELLO_SUITE_1_in_G_Prelude.ogg/JOHN_MICHEL_CELLO-J_S_BACH_CELLO_SUITE_1_in_G_Prelude.ogg.mp3'
    },
    {
        id: 8,
        title: 'Bach Cello Suite No. 1 Minuets',
        artist: 'John Michel (Warm Cello)',
        category: 'Modern Acoustic',
        duration: '03:25',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/6/67/JOHN_MICHEL_CELLO-J_S_BACH_CELLO_SUITE_1_in_G_Minuets.ogg/JOHN_MICHEL_CELLO-J_S_BACH_CELLO_SUITE_1_in_G_Minuets.ogg.mp3'
    },
    {
        id: 9,
        title: 'Plantation Sunset',
        artist: 'Jason Shaw (Folk Acoustic)',
        category: 'Modern Acoustic',
        duration: '03:30',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/d/d7/Jason_Shaw_-_PLANTATION.ogg/Jason_Shaw_-_PLANTATION.ogg.mp3'
    },
    {
        id: 10,
        title: 'Acoustic Meadow Waltz',
        artist: 'SoundHelix (Acoustic Ensemble)',
        category: 'Modern Acoustic',
        duration: '06:12',
        url: 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3'
    },

    // --- 10 Classical & Sacred ---
    {
        id: 11,
        title: 'Canon in D Major',
        artist: 'Johann Pachelbel (Classical Guitar)',
        category: 'Classical & Sacred',
        duration: '03:00',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/a/ae/Pachelbel_-_Canon_in_D_major%2C_P._37_%28Guitar%29.ogg/Pachelbel_-_Canon_in_D_major%2C_P._37_%28Guitar%29.ogg.mp3'
    },
    {
        id: 12,
        title: 'Bridal Chorus (Here Comes the Bride)',
        artist: 'Richard Wagner (Wedding Orchestra)',
        category: 'Classical & Sacred',
        duration: '02:20',
        url: 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Wagner_Bridal_Chorus_%28ISRC_USUAN1100021%29.mp3'
    },
    {
        id: 13,
        title: 'Wedding March',
        artist: 'Felix Mendelssohn (Symphony Orchestra)',
        category: 'Classical & Sacred',
        duration: '04:45',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/c/cb/A_Midsummer_Night%27s_Dream_Op._61_Wedding_March_%28Mendelssohn%29_European_Archive.ogg/A_Midsummer_Night%27s_Dream_Op._61_Wedding_March_%28Mendelssohn%29_European_Archive.ogg.mp3'
    },
    {
        id: 14,
        title: 'Air on the G String',
        artist: 'Johann Sebastian Bach (Orchestral Suite)',
        category: 'Classical & Sacred',
        duration: '03:22',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/1/1e/Air_%28Bach%29.ogg/Air_%28Bach%29.ogg.mp3'
    },
    {
        id: 15,
        title: "Jesu, Joy of Man's Desiring",
        artist: 'Johann Sebastian Bach (Organ & Strings)',
        category: 'Classical & Sacred',
        duration: '03:15',
        url: 'https://upload.wikimedia.org/wikipedia/commons/5/51/Jesu%2C_Joy_of_Man%27s_Desiring_%28ISRC_USUAN1100189%29.mp3'
    },
    {
        id: 16,
        title: 'Clair de Lune',
        artist: 'Claude Debussy (Suite Bergamasque Piano)',
        category: 'Classical & Sacred',
        duration: '05:04',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/b/be/Clair_de_lune_%28Claude_Debussy%29_Suite_bergamasque.ogg/Clair_de_lune_%28Claude_Debussy%29_Suite_bergamasque.ogg.mp3'
    },
    {
        id: 17,
        title: 'Ave Maria',
        artist: 'Franz Schubert (Concert Heritage Band)',
        category: 'Classical & Sacred',
        duration: '04:30',
        url: 'https://upload.wikimedia.org/wikipedia/commons/3/3a/Ave_Maria_in_Due_-_Concert_Band_-_United_States_Air_Force_Heritage_of_America_Band.mp3'
    },
    {
        id: 18,
        title: 'Arrival of the Queen of Sheba',
        artist: 'George Frideric Handel (Baroque Strings)',
        category: 'Classical & Sacred',
        duration: '03:10',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/2/2d/Handel_-_Arrival_of_the_Queen_of_Sheba.ogg/Handel_-_Arrival_of_the_Queen_of_Sheba.ogg.mp3'
    },
    {
        id: 19,
        title: 'The Swan (Le Cygne)',
        artist: 'Camille Saint-Saëns (John Michel Cello & Piano)',
        category: 'Classical & Sacred',
        duration: '02:55',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/d/db/JOHN_MICHEL_CELLO-SAINT_SAENS_CARNIVAL_OF_ANIMALS_THE_SWAN.ogg/JOHN_MICHEL_CELLO-SAINT_SAENS_CARNIVAL_OF_ANIMALS_THE_SWAN.ogg.mp3'
    },
    {
        id: 20,
        title: 'Nocturne in C-sharp Minor',
        artist: 'Frédéric Chopin (Romantic Solo Piano)',
        category: 'Classical & Sacred',
        duration: '04:12',
        url: 'https://upload.wikimedia.org/wikipedia/commons/transcoded/1/12/Chopin%2C_Nocturne_in_C-sharp_minor%2C_Op._Posth.ogg/Chopin%2C_Nocturne_in_C-sharp_minor%2C_Op._Posth.ogg.mp3'
    }
];

// Hydrate dynamic tracks from database if provided by server
if (typeof window !== 'undefined' && window.DYNAMIC_MUSIC_TRACKS && Array.isArray(window.DYNAMIC_MUSIC_TRACKS) && window.DYNAMIC_MUSIC_TRACKS.length > 0) {
    MUSIC_TRACKS = window.DYNAMIC_MUSIC_TRACKS.map(m => {
        let fallbackTier = 'basic';
        if (m.id > 10) fallbackTier = 'basic_addon_2';
        else if (m.id > 5) fallbackTier = 'basic_addon_1';

        const tier = m.tier || fallbackTier;
        let tierLabel = m.tier_label;
        if (!tierLabel) {
            if (tier === 'premium') tierLabel = 'Premium';
            else if (tier === 'basic_addon_2') tierLabel = 'Add-On 2';
            else if (tier === 'basic_addon_1') tierLabel = 'Add-On 1';
            else tierLabel = 'Basic Gratis';
        }

        return {
            id: m.id,
            title: m.title,
            artist: m.artist,
            category: m.category || (m.id <= 10 ? 'Modern Acoustic' : 'Classical & Sacred'),
            duration: m.formatted_duration || m.duration || '03:00',
            url: m.audio_url || m.url || m.file_path,
            tier: tier,
            tier_label: tierLabel
        };
    });
}

// ==========================================
// SINGLETON SIMPUL AUDIO ENGINE
// ==========================================
const SimpulAudioEngine = {
    audio: null,
    currentTrackId: null,
    currentUrl: null,
    isPlaying: false,

    init() {
        if (!this.audio) {
            this.audio = new Audio();
            this.audio.loop = true;
            this.audio.addEventListener('play', () => {
                this.isPlaying = true;
                this.updateUi();
            });
            this.audio.addEventListener('pause', () => {
                this.isPlaying = false;
                this.updateUi();
            });
            this.audio.addEventListener('ended', () => {
                this.isPlaying = false;
                this.updateUi();
            });
            this.audio.addEventListener('error', (e) => {
                console.warn('Audio playback notice:', e);
            });
        }
    },

    playTrack(url, trackId = null) {
        this.init();
        const fullUrl = url.startsWith('http') ? url : (window.location.origin + (url.startsWith('/') ? '' : '/') + url);
        if (this.currentUrl !== fullUrl) {
            this.audio.src = fullUrl;
            this.currentUrl = fullUrl;
        }
        this.currentTrackId = trackId;

        const playPromise = this.audio.play();
        if (playPromise !== undefined) {
            playPromise.then(() => {
                this.isPlaying = true;
                this.updateUi();
            }).catch(err => {
                console.log('Audio autoplay prevented waiting for user gesture:', err);
            });
        }
    },

    pauseTrack() {
        if (this.audio) {
            this.audio.pause();
            this.isPlaying = false;
            this.updateUi();
        }
    },

    stopTrack() {
        if (this.audio) {
            this.audio.pause();
            this.audio.currentTime = 0;
            this.isPlaying = false;
            this.updateUi();
        }
    },

    toggleTrack(url, trackId = null) {
        this.init();
        const fullUrl = url.startsWith('http') ? url : (window.location.origin + (url.startsWith('/') ? '' : '/') + url);
        if (this.isPlaying && (this.currentTrackId === trackId || this.currentUrl === fullUrl)) {
            this.pauseTrack();
        } else {
            this.playTrack(url, trackId);
        }
    },

    updateUi() {
        // 1. Vinyl discs spinning animation
        document.querySelectorAll('.vinyl-disc-spin').forEach(el => {
            if (this.isPlaying) {
                el.classList.add('animate-spin');
                el.style.animationPlayState = 'running';
            } else {
                el.style.animationPlayState = 'paused';
            }
        });

        // 2. Vinyl toggle buttons icon state
        document.querySelectorAll('.vinyl-toggle-btn').forEach(btn => {
            const playIcon = btn.querySelector('.vinyl-icon-play');
            const pauseIcon = btn.querySelector('.vinyl-icon-pause');
            if (playIcon && pauseIcon) {
                if (this.isPlaying) {
                    playIcon.classList.add('hidden');
                    pauseIcon.classList.remove('hidden');
                } else {
                    playIcon.classList.remove('hidden');
                    pauseIcon.classList.add('hidden');
                }
            }
        });

        // 3. Music Library preview buttons
        document.querySelectorAll('.music-preview-btn').forEach(btn => {
            const btnId = parseInt(btn.dataset.trackId);
            const isThis = this.isPlaying && (this.currentTrackId === btnId);
            const playSvg = btn.querySelector('.icon-play');
            const pauseSvg = btn.querySelector('.icon-pause');
            if (playSvg && pauseSvg) {
                if (isThis) {
                    playSvg.classList.add('hidden');
                    pauseSvg.classList.remove('hidden');
                    btn.classList.add('bg-[#FF2E3A]', 'text-white');
                    btn.classList.remove('bg-stone-100', 'text-stone-700');
                } else {
                    playSvg.classList.remove('hidden');
                    pauseSvg.classList.add('hidden');
                    btn.classList.remove('bg-[#FF2E3A]', 'text-white');
                    btn.classList.add('bg-stone-100', 'text-stone-700');
                }
            }
        });
    }
};

// ==========================================
// AUTO-SCROLL ENGINE (IDLE 3s, PAUSE ON HOVER/DRAG, RESUME 4s)
// ==========================================
const AutoScrollEngine = {
    timer: null,
    rafId: null,
    isScrolling: false,
    targetEl: null,
    speed: 0.85, // pixels per frame

    attach(element) {
        if (!element) return;
        this.clear();
        this.targetEl = element;

        const pauseEvents = ['mouseenter', 'touchstart', 'wheel', 'mousedown', 'scroll'];
        pauseEvents.forEach(evt => {
            element.addEventListener(evt, () => this.handleUserInteraction(), { passive: true });
        });

        const resumeEvents = ['mouseleave', 'touchend'];
        resumeEvents.forEach(evt => {
            element.addEventListener(evt, () => this.scheduleStart(4000), { passive: true });
        });
    },

    scheduleStart(delay = 3000) {
        this.clearTimer();
        this.timer = setTimeout(() => {
            this.start();
        }, delay);
    },

    start() {
        if (!this.targetEl) return;
        this.clearRaf();
        this.isScrolling = true;

        const scrollStep = () => {
            if (!this.isScrolling || !this.targetEl) return;
            const maxScroll = this.targetEl.scrollHeight - this.targetEl.clientHeight;
            if (this.targetEl.scrollTop < maxScroll - 1) {
                this.targetEl.scrollTop += this.speed;
                this.rafId = requestAnimationFrame(scrollStep);
            } else {
                this.isScrolling = false;
            }
        };
        this.rafId = requestAnimationFrame(scrollStep);
    },

    handleUserInteraction() {
        this.isScrolling = false;
        this.clearRaf();
        this.scheduleStart(4000);
    },

    clearTimer() {
        if (this.timer) {
            clearTimeout(this.timer);
            this.timer = null;
        }
    },

    clearRaf() {
        if (this.rafId) {
            cancelAnimationFrame(this.rafId);
            this.rafId = null;
        }
    },

    clear() {
        this.clearTimer();
        this.clearRaf();
        this.isScrolling = false;
    }
};

// ==========================================
// COVER OVERLAY & LIVE MOCKUP ACTIONS
// ==========================================
function openMockupCover() {
    const overlay = document.getElementById('mockup-cover-overlay');
    if (overlay) {
        overlay.style.transform = 'translateY(-100%)';
        overlay.style.opacity = '0';
        overlay.style.pointerEvents = 'none';
    }

    // Play current theme's song or selected song
    playCurrentMockupMusic();

    // Start auto-scroll on mockup screen after 3 seconds idle
    const screen = document.getElementById('mockup-screen-container');
    if (screen) {
        AutoScrollEngine.attach(screen);
        AutoScrollEngine.scheduleStart(3000);
    }
}

function resetMockupCover() {
    const overlay = document.getElementById('mockup-cover-overlay');
    if (overlay) {
        overlay.style.transform = 'translateY(0)';
        overlay.style.opacity = '1';
        overlay.style.pointerEvents = 'auto';
    }
    SimpulAudioEngine.stopTrack();
    AutoScrollEngine.clear();
    const screen = document.getElementById('mockup-screen-container');
    if (screen) screen.scrollTop = 0;
}

function playCurrentMockupMusic() {
    const musicInput = document.getElementById('music_id');
    let trackId = musicInput ? parseInt(musicInput.value) : null;
    let track = null;

    if (trackId) {
        track = MUSIC_TRACKS.find(t => t.id === trackId);
    }

    if (!track) {
        const activeThemeId = parseInt(document.querySelector('.theme-radio-input:checked')?.value || 1);
        const currentTheme = THEMES_CONFIG[activeThemeId] || THEMES_CONFIG[1];
        track = MUSIC_TRACKS.find(t => t.id === currentTheme.defaultMusicId) || MUSIC_TRACKS[0];
    }

    if (track) {
        SimpulAudioEngine.playTrack(track.url, track.id);
        const ind = document.getElementById('mockup-music-indicator');
        if (ind) ind.innerText = track.title;
    }
}

function toggleMockupMusic() {
    if (SimpulAudioEngine.isPlaying) {
        SimpulAudioEngine.pauseTrack();
    } else {
        playCurrentMockupMusic();
    }
}

// ==========================================
// THEME DEMO MODAL CONTROLLER (SINGLE ENGINE + MULTI-DEVICE TOGGLE)
// ==========================================
let activeDemoThemeId = 1;
let currentDemoViewport = 'mobile';

function getDemoMockupFrame() {
    return document.getElementById('preview-mockup-frame') || document.getElementById('demo-viewport-wrapper');
}

function applyActiveViewMode() {
    const isFullscreen = !!document.fullscreenElement;
    const wrapper = getDemoMockupFrame();
    const btnMobile = document.getElementById('demo-btn-mobile');
    const btnDesktop = document.getElementById('demo-btn-desktop');
    const btnFullscreen = document.getElementById('btn-toggle-fullscreen') || document.getElementById('demo-btn-fullscreen');
    const phoneParts = document.querySelectorAll('.phone-hardware-part');
    const desktopHeader = document.getElementById('desktop-browser-header');
    const screenContainer = document.getElementById('phone-screen-container');

    if (!wrapper) return;

    // Tampilan penuh responsif alami mengikuti device (tanpa frame mockup HP bertingkat)
    wrapper.className = 'w-full h-full flex-1 relative flex flex-col overflow-hidden bg-black border-0 p-0 m-0 shadow-none ring-0';
    if (screenContainer) {
        screenContainer.className = 'relative w-full h-full flex-1 overflow-hidden bg-black flex flex-col border-0 shadow-none';
    }
    phoneParts.forEach(el => el.classList.add('hidden'));
    if (desktopHeader) desktopHeader.classList.add('hidden');

    const activeClasses = ['bg-[#FF2E3A]', 'text-white', 'shadow-xs'];
    const inactiveClasses = ['text-stone-400', 'hover:text-white', 'hover:bg-stone-800'];

    if (isFullscreen) {
        if (btnFullscreen) {
            btnFullscreen.classList.add(...activeClasses);
            btnFullscreen.classList.remove(...inactiveClasses);
        }
        if (btnMobile) {
            btnMobile.classList.remove(...activeClasses);
            btnMobile.classList.add(...inactiveClasses);
        }
        if (btnDesktop) {
            btnDesktop.classList.remove(...activeClasses);
            btnDesktop.classList.add(...inactiveClasses);
        }
    } else {
        if (btnFullscreen) {
            btnFullscreen.classList.remove(...activeClasses);
            btnFullscreen.classList.add(...inactiveClasses);
        }
        if (btnMobile) {
            btnMobile.classList.add(...activeClasses);
            btnMobile.classList.remove(...inactiveClasses);
        }
        if (btnDesktop) {
            btnDesktop.classList.remove(...activeClasses);
            btnDesktop.classList.add(...inactiveClasses);
        }
    }
}

function setDemoViewport(mode) {
    currentDemoViewport = mode;
    applyActiveViewMode();
}

function toggleDemoFullscreen() {
    const modal = document.getElementById('theme-demo-modal') || document.documentElement;
    const wrapper = getDemoMockupFrame();

    if (!document.fullscreenElement) {
        // Masuk Fullscreen: request fullscreen DAN hapus batasan mockup HP
        if (wrapper) {
            wrapper.className = 'w-full h-full max-w-none rounded-none border-0 shadow-none overflow-hidden relative mx-auto bg-stone-900 transition-all duration-300 flex flex-col';
        }
        const req = modal.requestFullscreen || modal.webkitRequestFullscreen || modal.mozRequestFullScreen || modal.msRequestFullscreen;
        if (req) {
            req.call(modal).catch(err => {
                console.log('Fullscreen request error:', err);
                applyActiveViewMode();
            });
        }
    } else {
        const exit = document.exitFullscreen || document.webkitExitFullscreen || document.mozCancelFullScreen || document.msExitFullscreen;
        if (exit) {
            exit.call(document).catch(err => console.log('Exit fullscreen error:', err));
        }
    }
}

// Global Fullscreen Listeners
document.addEventListener('fullscreenchange', applyActiveViewMode);
document.addEventListener('webkitfullscreenchange', applyActiveViewMode);
document.addEventListener('mozfullscreenchange', applyActiveViewMode);
document.addEventListener('MSFullscreenChange', applyActiveViewMode);

// Listen to iframe theme switcher sync & demo ready
window.addEventListener('message', function(event) {
    if (event.data && (event.data.type === 'SIMPULTEMU_THEME_SWITCHED' || event.data.type === 'SIMPULTEMU_DEMO_READY')) {
        const themeId = event.data.themeId;
        if (themeId) activeDemoThemeId = themeId;
        const titleEl = document.getElementById('demo-modal-theme-name');
        if (titleEl && event.data.themeName) titleEl.innerText = event.data.themeName;
        const tierEl = document.getElementById('demo-modal-theme-tier');
        if (tierEl && event.data.tier) {
            tierEl.innerText = event.data.tier.toUpperCase();
            tierEl.className = event.data.tier === 'premium'
                ? 'px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-500 text-stone-950 shadow-xs'
                : 'px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500 text-white shadow-xs';
        }
        const songEl = document.getElementById('demo-modal-theme-song');
        if (songEl) {
            if (event.data.song) {
                songEl.innerText = event.data.song;
            } else if (window.THEME_PRESET_MUSIC && window.THEME_PRESET_MUSIC[themeId] && window.THEME_PRESET_MUSIC[themeId].label) {
                songEl.innerText = window.THEME_PRESET_MUSIC[themeId].label;
            } else if (THEMES_CONFIG[themeId]) {
                songEl.innerText = THEMES_CONFIG[themeId].defaultMusic;
            }
        }
    }
});

// Document-Level Event Delegation (Universal click handler for invitation open & fullscreen)
document.addEventListener('click', function(e) {
    // 1. Delegasi Buka Undangan (editor mockup / demo / parent pages)
    const openBtn = e.target.closest('#btn-open-invitation, .btn-open-invitation, [data-action="open-invitation"]');
    if (openBtn) {
        if (typeof openMockupCover === 'function') {
            openMockupCover();
        }
        if (typeof openDemoCover === 'function') {
            openDemoCover();
        }
    }

    // 2. Delegasi Tombol Toggle Fullscreen
    const fsBtn = e.target.closest('#btn-toggle-fullscreen, [data-legacy-id="demo-btn-fullscreen"]');
    if (fsBtn) {
        e.preventDefault();
        toggleDemoFullscreen();
    }
});

function openThemeDemoModal(themeId, customName, customTier, customSong) {
    const theme = THEMES_CONFIG[themeId] || THEMES_CONFIG[1];
    activeDemoThemeId = theme.id;
    const modal = document.getElementById('theme-demo-modal');
    if (!modal) return;

    // 1. Info Bar
    const titleEl = document.getElementById('demo-modal-theme-name');
    if (titleEl) titleEl.innerText = customName || theme.name;
    const tierEl = document.getElementById('demo-modal-theme-tier');
    const currentTier = customTier || theme.tier;
    if (tierEl) {
        tierEl.innerText = currentTier.toUpperCase();
        tierEl.className = currentTier.toLowerCase() === 'premium'
            ? 'px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-500 text-stone-950 shadow-xs'
            : 'px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500 text-white shadow-xs';
    }
    const presetSong = customSong || (window.THEME_PRESET_MUSIC && window.THEME_PRESET_MUSIC[themeId] ? window.THEME_PRESET_MUSIC[themeId].label : (theme.defaultMusic || ''));
    const songEl = document.getElementById('demo-modal-theme-song');
    if (songEl) songEl.innerText = presetSong;

    // 2. Set Default Viewport: Mobile
    setDemoViewport('mobile');

    // 3. Single Engine: Load the EXACT public invitation template inside iframe
    const iframe = document.getElementById('theme-demo-iframe');
    if (iframe) {
        iframe.src = `/tema/${theme.id}/demo`;
    }

    // 4. Reveal Modal
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeThemeDemoModal() {
    const modal = document.getElementById('theme-demo-modal');
    if (modal) modal.classList.add('hidden');
    document.body.style.overflow = '';

    // CRUCIAL: Immediately stop music by clearing iframe src and any local audio
    const iframe = document.getElementById('theme-demo-iframe');
    if (iframe) {
        iframe.src = 'about:blank';
    }
    if (typeof SimpulAudioEngine !== 'undefined') {
        SimpulAudioEngine.stopTrack();
    }
    if (typeof AutoScrollEngine !== 'undefined') {
        AutoScrollEngine.clear();
    }

    // Exit fullscreen if active
    if (document.fullscreenElement) {
        document.exitFullscreen().catch(err => console.log('Exit fullscreen error:', err));
    }
}

function selectThemeFromDemo() {
    const themeId = activeDemoThemeId;
    closeThemeDemoModal();

    // Check if we are inside editor
    const radio = document.querySelector(`.theme-radio-input[value="${themeId}"]`);
    if (radio) {
        radio.checked = true;
        if (typeof window.handleThemeChange === 'function') {
            window.handleThemeChange(radio);
        } else {
            applyThemeEngine(themeId);
        }
        radio.scrollIntoView({ behavior: 'smooth', block: 'center' });
    } else {
        // We are on public catalog (/tema)
        window.location.href = `/dashboard/undangan/create?theme_id=${themeId}`;
    }
}

function openDemoCover() {
    // Legacy fallback
    const iframe = document.getElementById('theme-demo-iframe');
    if (iframe && iframe.contentWindow && typeof iframe.contentWindow.openPublicInvitation === 'function') {
        iframe.contentWindow.openPublicInvitation();
    }
}

function toggleDemoMusic() {
    // Legacy fallback
    const iframe = document.getElementById('theme-demo-iframe');
    if (iframe && iframe.contentWindow && typeof iframe.contentWindow.togglePublicMusic === 'function') {
        iframe.contentWindow.togglePublicMusic();
    }
}

// ==========================================
// MUSIC LIBRARY MODAL CONTROLLER
// ==========================================
let currentMusicCategoryFilter = 'all';

function openMusicLibraryModal() {
    const modal = document.getElementById('music-library-modal');
    if (!modal) return;
    if (typeof window.syncMusicPackageUI === 'function') {
        window.syncMusicPackageUI();
    }
    renderMusicLibraryList();
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeMusicLibraryModal() {
    const modal = document.getElementById('music-library-modal');
    if (modal) modal.classList.add('hidden');
    document.body.style.overflow = '';
}

function filterMusicCategory(cat) {
    currentMusicCategoryFilter = cat;
    document.querySelectorAll('.music-tab-btn').forEach(btn => {
        if (btn.dataset.category === cat) {
            btn.classList.add('bg-[#FF2E3A]', 'text-white', 'shadow-xs');
            btn.classList.remove('bg-stone-100', 'text-stone-700');
        } else {
            btn.classList.remove('bg-[#FF2E3A]', 'text-white', 'shadow-xs');
            btn.classList.add('bg-stone-100', 'text-stone-700');
        }
    });
    renderMusicLibraryList();
}

function isTrackAccessible(track) {
    const userTier = window.CURRENT_USER_PACKAGE_TIER || 'basic';
    if (userTier === 'premium') return true;
    const trackTier = track.tier || (track.id <= 5 ? 'basic' : (track.id <= 10 ? 'basic_addon_1' : 'basic_addon_2'));
    if (trackTier === 'basic') return true;
    if (userTier === 'basic_addon_2') {
        return trackTier === 'basic' || trackTier === 'basic_addon_1' || trackTier === 'basic_addon_2';
    }
    if (userTier === 'basic_addon_1') {
        return trackTier === 'basic' || trackTier === 'basic_addon_1';
    }
    return false;
}

function getTrackTierBadge(track) {
    const tier = track.tier || (track.id <= 5 ? 'basic' : (track.id <= 10 ? 'basic_addon_1' : 'basic_addon_2'));
    if (tier === 'premium') {
        return `<span class="px-2 py-0.5 rounded-full text-[9px] font-extrabold uppercase tracking-wide bg-gradient-to-r from-amber-500 to-rose-500 text-white shadow-2xs shrink-0 flex items-center gap-1"><svg class="w-2.5 h-2.5 fill-current text-white shrink-0" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg><span>Premium</span></span>`;
    }
    if (tier === 'basic_addon_2') {
        return `<span class="px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wide bg-purple-100 text-purple-800 border border-purple-200 shrink-0">Add-On 2 (20 Lagu)</span>`;
    }
    if (tier === 'basic_addon_1') {
        return `<span class="px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wide bg-amber-100 text-amber-800 border border-amber-200 shrink-0">Add-On 1 (10 Lagu)</span>`;
    }
    return `<span class="px-2 py-0.5 rounded-full text-[9px] font-semibold uppercase tracking-wide bg-slate-100 text-slate-700 border border-slate-200 shrink-0">Basic (5 Lagu)</span>`;
}

function promptTrackUpgrade(trackId) {
    const track = MUSIC_TRACKS.find(t => t.id === trackId);
    const trackName = track ? `"${track.title}"` : 'Lagu ini';
    const tier = track?.tier || (track && track.id <= 5 ? 'basic' : (track && track.id <= 10 ? 'basic_addon_1' : 'basic_addon_2'));
    let reqText = 'Add-On 1 (Rp 17.000 - Total 10 Lagu)';
    if (tier === 'basic_addon_2') reqText = 'Add-On 2 (Rp 25.000 - Total 20 Lagu)';
    if (tier === 'premium') reqText = 'Premium (Rp 59.000 - Lagu Tak Terbatas)';

    if (typeof openUpgradeModal === 'function') {
        openUpgradeModal(window.CURRENT_INVITATION_ID, `Lagu ${trackName} memerlukan paket ${reqText}. Upgrade paket Anda untuk memilih lagu ini!`);
    } else {
        alert(`Lagu ${trackName} membutuhkan ${reqText}. Silakan upgrade paket.`);
    }
}

function renderMusicLibraryList() {
    const container = document.getElementById('music-tracks-container');
    if (!container) return;

    const searchInput = document.getElementById('music-search-input');
    const query = (searchInput?.value || '').toLowerCase().trim();
    const currentSelectedId = parseInt(document.getElementById('music_id')?.value || 1);

    const filtered = MUSIC_TRACKS.filter(t => {
        const matchCat = (currentMusicCategoryFilter === 'all') || (t.category === currentMusicCategoryFilter);
        const matchQuery = !query || t.title.toLowerCase().includes(query) || t.artist.toLowerCase().includes(query);
        return matchCat && matchQuery;
    });

    if (filtered.length === 0) {
        container.innerHTML = `
            <div class="col-span-full py-12 text-center text-stone-400">
                <p class="text-sm">Tidak ada lagu yang cocok dengan pencarian.</p>
            </div>`;
        return;
    }

    container.innerHTML = filtered.map(track => {
        const isSelected = track.id === currentSelectedId;
        const isPlayingThis = SimpulAudioEngine.isPlaying && (SimpulAudioEngine.currentTrackId === track.id);
        const accessible = isTrackAccessible(track);
        const tierBadge = getTrackTierBadge(track);

        return `
        <div class="p-3.5 rounded-2xl border ${isSelected ? 'border-[#FF2E3A] bg-[#DBF6FF]/20 ring-2 ring-[#FF2E3A]/20' : (!accessible ? 'border-amber-200/90 bg-amber-50/30' : 'border-[#E7E0D6] bg-white hover:border-stone-400')} transition-all flex items-center justify-between gap-3 shadow-xs">
            <div class="flex items-center gap-3 min-w-0 flex-1">
                <button type="button" onclick="SimpulAudioEngine.toggleTrack('${track.url}', ${track.id})" data-track-id="${track.id}" class="music-preview-btn w-10 h-10 rounded-xl ${isPlayingThis ? 'bg-[#FF2E3A] text-white' : 'bg-stone-100 text-stone-700 hover:bg-stone-200'} shrink-0 flex items-center justify-center transition shadow-2xs cursor-pointer" title="Pratinjau Suara">
                    <svg class="icon-play w-4 h-4 ${isPlayingThis ? 'hidden' : ''}" fill="currentColor" viewBox="0 0 24 24">
                        <polygon points="5 3 19 12 5 21 5 3"/>
                    </svg>
                    <svg class="icon-pause w-4 h-4 ${isPlayingThis ? '' : 'hidden'}" fill="currentColor" viewBox="0 0 24 24">
                        <rect x="6" y="4" width="4" height="16"/>
                        <rect x="14" y="4" width="4" height="16"/>
                    </svg>
                </button>
                <div class="min-w-0 flex-1">
                    <div class="flex items-center gap-2 flex-wrap">
                        <h4 class="font-serif font-bold text-xs sm:text-sm text-stone-900 truncate">${track.title}</h4>
                        ${tierBadge}
                        <span class="px-2 py-0.5 rounded-full text-[9px] font-semibold ${track.category === 'Classical & Sacred' ? 'bg-indigo-100 text-indigo-800' : 'bg-[#DBF6FF] text-[#0284C7]'} shrink-0">${track.category}</span>
                    </div>
                    <p class="text-xs text-stone-500 truncate mt-0.5">${track.artist} • <span class="font-mono text-[10px] text-stone-400">${track.duration}</span></p>
                </div>
            </div>

            <div class="shrink-0">
                ${!accessible ? `
                    <button type="button" onclick="promptTrackUpgrade(${track.id})" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-amber-500 to-[#FF2E3A] text-white hover:opacity-95 transition cursor-pointer flex items-center gap-1.5 shadow-2xs" title="Upgrade untuk memilih lagu ini">
                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <span>Upgrade</span>
                    </button>
                ` : `
                    <button type="button" onclick="selectTrackFromLibrary(${track.id})" class="px-3.5 py-1.5 rounded-xl text-xs font-semibold ${isSelected ? 'bg-[#FF2E3A] text-white' : 'bg-stone-100 text-stone-800 hover:bg-[#DBF6FF] hover:text-[#FF2E3A]'} transition cursor-pointer flex items-center gap-1.5">
                        ${isSelected ? `
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Terpilih</span>
                        ` : 'Pilih Lagu'}
                    </button>
                `}
            </div>
        </div>`;
    }).join('');
}

function selectTrackFromLibrary(trackId) {
    const track = MUSIC_TRACKS.find(t => t.id === trackId);
    if (!track) return;

    if (!isTrackAccessible(track)) {
        promptTrackUpgrade(trackId);
        return;
    }

    const musicInput = document.getElementById('music_id');
    if (musicInput) {
        musicInput.value = track.id;
        musicInput.dataset.userModified = 'true';
    }

    // Reset file input if switching back to library preset
    const customMusic = document.getElementById('custom_music');
    if (customMusic) customMusic.value = '';
    const modalCustomInput = document.getElementById('modal_custom_music_input');
    if (modalCustomInput) modalCustomInput.value = '';
    const customStatus = document.getElementById('modal-custom-audio-status');
    if (customStatus) customStatus.classList.add('hidden');

    const titleDisplay = document.getElementById('active-music-title-display');
    if (titleDisplay) titleDisplay.innerText = `${track.title} – ${track.artist}`;

    const ind = document.getElementById('mockup-music-indicator');
    if (ind) ind.innerText = track.title;

    // Play preview
    SimpulAudioEngine.playTrack(track.url, track.id);

    closeMusicLibraryModal();
}

/**
 * Direct file upload handler from inside Music Library Modal
 */
function handleModalCustomAudioUpload(fileInput) {
    if ((window.CURRENT_USER_PACKAGE_TIER || 'basic') !== 'premium') {
        if (fileInput) fileInput.value = '';
        if (typeof openUpgradeModal === 'function') {
            openUpgradeModal(window.CURRENT_INVITATION_ID, 'Upload lagu MP3 sendiri hanya tersedia pada Paket Premium (Rp59.000).', 'premium');
        } else {
            alert('Upload lagu MP3 sendiri hanya tersedia pada Paket Premium (Rp59.000).');
        }
        return;
    }

    const file = fileInput.files && fileInput.files[0];
    if (!file) return;

    if (!file.type.includes('audio') && !file.name.match(/\.(mp3|wav|ogg|m4a)$/i)) {
        alert('Silakan pilih berkas audio berformat .mp3 yang valid.');
        return;
    }

    // 1. Sync file to the form's #custom_music input using DataTransfer
    const mainCustomInput = document.getElementById('custom_music');
    if (mainCustomInput) {
        try {
            const dt = new DataTransfer();
            dt.items.add(file);
            mainCustomInput.files = dt.files;
        } catch (e) {
            console.warn('Could not sync file to form custom_music:', e);
        }
    }

    // 2. Create object URL for instant preview playback
    const objectUrl = URL.createObjectURL(file);

    // 3. Update displays
    const titleDisplay = document.getElementById('active-music-title-display');
    if (titleDisplay) {
        titleDisplay.innerText = `Lagu Kustom: ${file.name}`;
    }

    const musicIndicator = document.getElementById('mockup-music-indicator');
    if (musicIndicator) {
        musicIndicator.innerText = `Audio: ${file.name}`;
    }

    const musicInput = document.getElementById('music_id');
    if (musicInput) {
        musicInput.value = '';
        musicInput.dataset.userModified = 'true';
    }

    // 4. Update status in modal
    const customStatus = document.getElementById('modal-custom-audio-status');
    if (customStatus) {
        customStatus.classList.remove('hidden');
        customStatus.innerHTML = `
            <div class="flex items-center justify-between text-xs text-amber-900 bg-amber-50 border border-amber-300 rounded-xl p-3 shadow-xs">
                <div class="flex items-center gap-2 min-w-0">
                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="font-medium truncate text-stone-800">Audio Anda: <strong>${file.name}</strong></span>
                </div>
                <span class="text-[10px] bg-emerald-100 text-emerald-800 font-bold px-2.5 py-0.5 rounded-full shrink-0">Lagu Sendiri Aktif</span>
            </div>`;
    }

    // 5. Play immediately in singleton audio engine
    SimpulAudioEngine.playTrack(objectUrl, 'custom');

    // 6. Refresh library list UI so no preset shows "Terpilih"
    renderMusicLibraryList();
}

// Global Exports
window.THEMES_CONFIG = THEMES_CONFIG;
window.THEME_SVG = THEME_SVG;
window.MUSIC_TRACKS = MUSIC_TRACKS;
window.SimpulAudioEngine = SimpulAudioEngine;
window.AutoScrollEngine = AutoScrollEngine;
window.applyThemeEngine = applyThemeEngine;
window.renderMockupPhotoLayout = renderMockupPhotoLayout;

// Global helper functions
window.openMockupCover = openMockupCover;
window.resetMockupCover = resetMockupCover;
window.toggleMockupMusic = toggleMockupMusic;
window.openThemeDemoModal = openThemeDemoModal;
window.closeThemeDemoModal = closeThemeDemoModal;
window.setDemoViewport = setDemoViewport;
window.applyActiveViewMode = applyActiveViewMode;
window.toggleDemoFullscreen = toggleDemoFullscreen;
window.openDemoCover = openDemoCover;
window.toggleDemoMusic = toggleDemoMusic;
window.selectThemeFromDemo = selectThemeFromDemo;
window.openMusicLibraryModal = openMusicLibraryModal;
window.closeMusicLibraryModal = closeMusicLibraryModal;
window.filterMusicCategory = filterMusicCategory;
window.renderMusicLibraryList = renderMusicLibraryList;
window.selectTrackFromLibrary = selectTrackFromLibrary;
window.handleModalCustomAudioUpload = handleModalCustomAudioUpload;
window.promptTrackUpgrade = promptTrackUpgrade;
window.isTrackAccessible = isTrackAccessible;

