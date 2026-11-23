import React from 'react';

// 20 Themes Visual Presets for React Preview Mockup
const THEME_PRESETS = {
    1: {
        bg: 'linear-gradient(135deg, rgba(80,10,20,0.92) 0%, rgba(30,4,8,0.95) 100%), url("/images/themes/bg/bg-basic-maroon.jpg")',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'36\' height=\'36\' viewBox=\'0 0 36 36\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M18 0l18 18-18 18L0 18z\' fill=\'%23e5c378\' fill-opacity=\'0.12\'/%3E%3Ccircle cx=\'18\' cy=\'18\' r=\'4\' fill=\'%23e5c378\' fill-opacity=\'0.18\'/%3E%3C/svg%3E")',
        motifName: 'Songket Damask Floral',
        accentColor: '#E5C378',
        textColor: '#FFF5EA',
        tagBg: 'bg-rose-950/70 border-rose-800/60',
        icon: (
            <svg className="w-5 h-5 text-amber-200" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/>
            </svg>
        ),
    },
    2: {
        bg: 'radial-gradient(circle at 50% 25%, #065f46 0%, #022c22 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'48\' height=\'48\' viewBox=\'0 0 48 48\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M24 0l7 17 17 7-17 7-7 17-7-17L0 24l17-7z\' fill=\'%23d4af37\' fill-opacity=\'0.14\'/%3E%3Ccircle cx=\'24\' cy=\'24\' r=\'6\' stroke=\'%23d4af37\' stroke-width=\'1\' stroke-opacity=\'0.2\' fill=\'none\'/%3E%3C/svg%3E")',
        motifName: 'Arabesque Islamic Lattice',
        accentColor: '#D4AF37',
        textColor: '#ECFDF5',
        tagBg: 'bg-emerald-950/70 border-emerald-800/60',
        icon: (
            <svg className="w-5 h-5 text-emerald-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8">
                <polygon points="12,2 15,9 22,9 17,14 19,21 12,17 5,21 7,14 2,9 9,9"/>
            </svg>
        ),
    },
    3: {
        bg: 'radial-gradient(circle at 50% 20%, #1e293b 0%, #060a14 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'46\' height=\'46\' viewBox=\'0 0 46 46\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'23\' cy=\'23\' r=\'1.5\' fill=\'%23ffffff\' fill-opacity=\'0.45\'/%3E%3Ccircle cx=\'8\' cy=\'8\' r=\'1\' fill=\'%23fde047\' fill-opacity=\'0.4\'/%3E%3Ccircle cx=\'38\' cy=\'38\' r=\'1\' fill=\'%23fde047\' fill-opacity=\'0.4\'/%3E%3Cpath d=\'M23 23L8 8M23 23L38 38\' stroke=\'%2394a3b8\' stroke-width=\'0.6\' stroke-opacity=\'0.3\'/%3E%3C/svg%3E")',
        motifName: 'Celestial Constellation',
        accentColor: '#DBF6FF',
        textColor: '#F8FAFC',
        tagBg: 'bg-slate-950/70 border-slate-700/60',
        icon: (
            <svg className="w-5 h-5 text-sky-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8">
                <circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/>
            </svg>
        ),
    },
    4: {
        bg: 'radial-gradient(circle at 50% 25%, #9d174d 0%, #4a0422 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'42\' height=\'42\' viewBox=\'0 0 42 42\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'21\' cy=\'13\' r=\'7\' fill=\'%23fda4af\' fill-opacity=\'0.14\'/%3E%3Ccircle cx=\'13\' cy=\'25\' r=\'7\' fill=\'%23fda4af\' fill-opacity=\'0.14\'/%3E%3Ccircle cx=\'29\' cy=\'25\' r=\'7\' fill=\'%23fda4af\' fill-opacity=\'0.14\'/%3E%3Ccircle cx=\'21\' cy=\'21\' r=\'3.5\' fill=\'%23fbcfe8\' fill-opacity=\'0.2\'/%3E%3C/svg%3E")',
        motifName: 'Romantic Rose Blossom',
        accentColor: '#FBCFE8',
        textColor: '#FFF1F2',
        tagBg: 'bg-rose-950/70 border-rose-800/60',
        icon: (
            <svg className="w-5 h-5 text-pink-300" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
        ),
    },
    5: {
        bg: 'radial-gradient(circle at 50% 25%, #262626 0%, #0a0a0a 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'50\' height=\'50\' viewBox=\'0 0 50 50\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Crect x=\'0\' y=\'0\' width=\'50\' height=\'50\' fill=\'none\' stroke=\'%23ffffff\' stroke-width=\'0.6\' stroke-opacity=\'0.14\'/%3E%3Cline x1=\'0\' y1=\'0\' x2=\'50\' y2=\'50\' stroke=\'%23ffffff\' stroke-width=\'0.4\' stroke-opacity=\'0.08\'/%3E%3C/svg%3E")',
        motifName: 'Editorial Marble Lines',
        accentColor: '#E5E5E5',
        textColor: '#FFFFFF',
        tagBg: 'bg-neutral-900/80 border-neutral-700/60',
        icon: (
            <svg className="w-5 h-5 text-neutral-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8">
                <rect x="4" y="4" width="16" height="16" rx="2"/><line x1="4" y1="12" x2="20" y2="12"/><line x1="12" y1="4" x2="12" y2="20"/>
            </svg>
        ),
    },
    6: {
        bg: 'radial-gradient(circle at 50% 20%, #c2410c 0%, #541c07 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'46\' height=\'46\' viewBox=\'0 0 46 46\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M23 8a15 15 0 0 1 15 15v15H8V23a15 15 0 0 1 15-15z\' fill=\'none\' stroke=\'%23fed7aa\' stroke-width=\'1\' stroke-opacity=\'0.16\'/%3E%3Ccircle cx=\'23\' cy=\'23\' r=\'3.5\' fill=\'%23fed7aa\' fill-opacity=\'0.18\'/%3E%3C/svg%3E")',
        motifName: 'Bohemian Clay Arch',
        accentColor: '#FED7AA',
        textColor: '#FFF7ED',
        tagBg: 'bg-orange-950/70 border-orange-800/60',
        icon: (
            <svg className="w-5 h-5 text-amber-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8">
                <path d="M12 3a9 9 0 0 0-9 9v9h18v-9a9 9 0 0 0-9-9z"/><circle cx="12" cy="12" r="3"/>
            </svg>
        ),
    },
    7: {
        bg: 'radial-gradient(circle at 50% 25%, #7e22ce 0%, #35075c 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'38\' height=\'38\' viewBox=\'0 0 38 38\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M19 4c2 4 4 6 4 9s-2 5-4 5-4-2-4-5 2-5 4-9z\' fill=\'%23e9d5ff\' fill-opacity=\'0.15\'/%3E%3Ccircle cx=\'19\' cy=\'28\' r=\'2\' fill=\'%23e9d5ff\' fill-opacity=\'0.2\'/%3E%3C/svg%3E")',
        motifName: 'Lavender Floral Wreath',
        accentColor: '#E9D5FF',
        textColor: '#FAF5FF',
        tagBg: 'bg-purple-950/70 border-purple-800/60',
        icon: (
            <svg className="w-5 h-5 text-purple-300" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
            </svg>
        ),
    },
    8: {
        bg: 'radial-gradient(circle at 50% 25%, #3f6212 0%, #152405 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'42\' height=\'42\' viewBox=\'0 0 42 42\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M21 5c4 6 6 11 4 16-4 0-9-4-11-9 4-4 5-5 7-7z\' fill=\'%23d9f99d\' fill-opacity=\'0.14\'/%3E%3Cpath d=\'M21 37c-4-6-6-11-4-16 4 0 9 4 11 9-4 4-5 5-7 7z\' fill=\'%23d9f99d\' fill-opacity=\'0.14\'/%3E%3C/svg%3E")',
        motifName: 'Botanical Olive Foliage',
        accentColor: '#D9F99D',
        textColor: '#F7FEE7',
        tagBg: 'bg-lime-950/70 border-lime-800/60',
        icon: (
            <svg className="w-5 h-5 text-lime-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8">
                <path d="M12 2c-4 4-8 10-8 15a8 8 0 0 0 16 0c0-5-4-11-8-15z"/>
            </svg>
        ),
    },
    9: {
        bg: 'radial-gradient(circle at 50% 25%, #b45309 0%, #3d1602 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'38\' height=\'38\' viewBox=\'0 0 38 38\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpolygon points=\'19,2 36,19 19,36 2,19\' fill=\'none\' stroke=\'%23fde68a\' stroke-width=\'0.9\' stroke-opacity=\'0.18\'/%3E%3Ccircle cx=\'19\' cy=\'19\' r=\'3\' fill=\'%23fef3c7\' fill-opacity=\'0.28\'/%3E%3C/svg%3E")',
        motifName: 'Champagne Gilded Harlequin',
        accentColor: '#FDE68A',
        textColor: '#FEF3C7',
        tagBg: 'bg-amber-950/70 border-amber-800/60',
        icon: (
            <svg className="w-5 h-5 text-amber-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8">
                <polygon points="12,2 15,9 22,9 17,14 19,21 12,17 5,21 7,14 2,9 9,9"/>
            </svg>
        ),
    },
    10: {
        bg: 'radial-gradient(circle at 50% 25%, #333333 0%, #0d0d0d 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'44\' height=\'38\' viewBox=\'0 0 44 38\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpolygon points=\'22,2 41,11 41,27 22,36 3,27 3,11\' fill=\'none\' stroke=\'%23facc15\' stroke-width=\'0.8\' stroke-opacity=\'0.16\'/%3E%3C/svg%3E")',
        motifName: 'Slate Hexagon Wireframe',
        accentColor: '#FACC15',
        textColor: '#FAFAFA',
        tagBg: 'bg-neutral-900/80 border-neutral-700/60',
        icon: (
            <svg className="w-5 h-5 text-amber-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8">
                <polygon points="12,2 21,7 21,17 12,22 3,17 3,7"/>
            </svg>
        ),
    },

    // === 10 PREMIUM THEMES ===
    11: {
        bg: 'radial-gradient(circle at 50% 20%, #5a0b18 0%, #170206 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'48\' height=\'48\' viewBox=\'0 0 48 48\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M24 4c3 6 8 8 13 6-2 6 0 11 4 14-6 1-9 5-9 10-4-4-9-3-13 2-3-5-8-6-13-2 0-5-3-9-9-10 4-3 6-8 4-14 5 2 10 0 13-6z\' fill=\'%23fbbf24\' fill-opacity=\'0.2\'/%3E%3Ccircle cx=\'24\' cy=\'24\' r=\'4\' fill=\'%23ca8a04\' fill-opacity=\'0.3\'/%3E%3C/svg%3E")',
        motifName: 'Royal Velvet & Gold Filigree',
        accentColor: '#FCD34D',
        textColor: '#FFFBEB',
        tagBg: 'bg-rose-950/85 border-amber-400/50',
        icon: (
            <svg className="w-6 h-6 text-amber-300" viewBox="0 0 24 24" fill="currentColor">
                <path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/>
            </svg>
        ),
    },
    12: {
        bg: 'radial-gradient(circle at 50% 20%, #064e3b 0%, #021a12 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'56\' height=\'56\' viewBox=\'0 0 56 56\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M28 56C28 40.5 40.5 28 56 28 40.5 28 28 15.5 28 0 28 15.5 15.5 28 0 28 15.5 28 28 40.5 28 56z\' fill=\'%23facc15\' fill-opacity=\'0.2\'/%3E%3Cpath d=\'M28 42C28 34.3 34.3 28 42 28 34.3 28 28 21.7 28 14 28 21.7 21.7 28 14 28 21.7 28 28 34.3 28 42z\' fill=\'none\' stroke=\'%23facc15\' stroke-width=\'0.9\' stroke-opacity=\'0.25\'/%3E%3C/svg%3E")',
        motifName: 'Imperial Art Deco Emerald',
        accentColor: '#FACC15',
        textColor: '#F0FDF4',
        tagBg: 'bg-emerald-950/85 border-amber-400/50',
        icon: (
            <svg className="w-6 h-6 text-amber-300" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
            </svg>
        ),
    },
    13: {
        bg: 'radial-gradient(circle at 50% 20%, #1d63b8 0%, #efece6 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'40\' height=\'40\' viewBox=\'0 0 40 40\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M0 20 L20 0 L40 20 L20 40 Z\' fill=\'none\' stroke=\'%231d63b8\' stroke-width=\'0.8\' stroke-opacity=\'0.15\'/%3E%3C/svg%3E")',
        motifName: 'Summer Beach & Vintage Stamp',
        accentColor: '#D94B26',
        textColor: '#1E293B',
        tagBg: 'bg-white/85 border-blue-400/50',
        icon: (
            <svg className="w-6 h-6 text-[#D94B26]" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
        ),
    },
    14: {
        bg: 'radial-gradient(circle at 50% 20%, #9d174d 0%, #3b031b 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'48\' height=\'48\' viewBox=\'0 0 48 48\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'24\' cy=\'24\' r=\'16\' fill=\'none\' stroke=\'%23fbcfe8\' stroke-width=\'0.8\' stroke-opacity=\'0.24\' stroke-dasharray=\'3,3\'/%3E%3Ccircle cx=\'24\' cy=\'24\' r=\'9\' fill=\'%23f472b6\' fill-opacity=\'0.16\'/%3E%3Ccircle cx=\'24\' cy=\'8\' r=\'2.5\' fill=\'%23fde047\' fill-opacity=\'0.4\'/%3E%3Ccircle cx=\'24\' cy=\'40\' r=\'2.5\' fill=\'%23fde047\' fill-opacity=\'0.4\'/%3E%3C/svg%3E")',
        motifName: 'Rose Gold Bridal Lace',
        accentColor: '#FBCFE8',
        textColor: '#FFF1F2',
        tagBg: 'bg-pink-950/85 border-amber-400/50',
        icon: (
            <svg className="w-6 h-6 text-pink-300" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
        ),
    },
    15: {
        bg: 'radial-gradient(circle at 50% 20%, #451a03 0%, #150601 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'56\' height=\'28\' viewBox=\'0 0 56 28\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cline x1=\'0\' y1=\'14\' x2=\'56\' y2=\'14\' stroke=\'%23d97706\' stroke-width=\'0.9\' stroke-opacity=\'0.2\'/%3E%3Cpath d=\'M10 5c10 2 20 5 30 2\' stroke=\'%23b45309\' stroke-width=\'0.6\' stroke-opacity=\'0.22\' fill=\'none\'/%3E%3Cpath d=\'M20 23c15-2 25-4 30-2\' stroke=\'%23b45309\' stroke-width=\'0.6\' stroke-opacity=\'0.22\' fill=\'none\'/%3E%3C/svg%3E")',
        motifName: 'Mahogany Wood & Lanterns',
        accentColor: '#FBBF24',
        textColor: '#FEF3C7',
        tagBg: 'bg-amber-950/85 border-amber-400/50',
        icon: (
            <svg className="w-6 h-6 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8">
                <rect x="5" y="3" width="14" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/>
            </svg>
        ),
    },
    16: {
        bg: 'radial-gradient(circle at 50% 25%, #2a1f04 0%, #060501 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'50\' height=\'50\' viewBox=\'0 0 50 50\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpolygon points=\'25,4 31,19 46,25 31,31 25,46 19,31 4,25 19,19\' fill=\'%23facc15\' fill-opacity=\'0.26\'/%3E%3Ccircle cx=\'25\' cy=\'25\' r=\'3\' fill=\'%23ffffff\' fill-opacity=\'0.6\'/%3E%3Ccircle cx=\'9\' cy=\'9\' r=\'1.5\' fill=\'%23fde047\' fill-opacity=\'0.45\'/%3E%3C/svg%3E")',
        motifName: 'Glittering Gold Starburst',
        accentColor: '#FDE047',
        textColor: '#FEF08A',
        tagBg: 'bg-amber-950/90 border-amber-300/60',
        icon: (
            <svg className="w-6 h-6 text-yellow-300" viewBox="0 0 24 24" fill="currentColor">
                <polygon points="12,2 15,9 22,9 17,14 19,21 12,17 5,21 7,14 2,9 9,9"/>
            </svg>
        ),
    },
    17: {
        bg: 'radial-gradient(circle at 50% 20%, #14532d 0%, #041a0c 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'52\' height=\'52\' viewBox=\'0 0 52 52\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M26 6c8 0 15 7 15 16s-6 15-15 15-15-6-15-15S18 6 26 6zm-2 7c-3 2-4 5-4 9 2 0 6-2 7-4 1-2 1-4-3-5zm6 4c3 2 4 5 4 9-2 0-6-2-7-4-1-2-1-4 3-5z\' fill=\'%23facc15\' fill-opacity=\'0.22\'/%3E%3C/svg%3E")',
        motifName: 'Gold Monstera Greenhouse',
        accentColor: '#86EFAC',
        textColor: '#F0FDF4',
        tagBg: 'bg-emerald-950/85 border-amber-400/50',
        icon: (
            <svg className="w-6 h-6 text-emerald-300" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2c-4 4-8 10-8 15a8 8 0 0 0 16 0c0-5-4-11-8-15z"/>
            </svg>
        ),
    },
    18: {
        bg: 'radial-gradient(circle at 50% 25%, #f8fafc 0%, #cbd5e1 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'56\' height=\'56\' viewBox=\'0 0 56 56\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M8 48Q22 28 38 42T56 8\' stroke=\'%23d4af37\' stroke-width=\'0.9\' stroke-opacity=\'0.35\' fill=\'none\'/%3E%3Cpath d=\'M0 18Q18 14 32 28T52 52\' stroke=\'%2364748b\' stroke-width=\'0.5\' stroke-opacity=\'0.3\' fill=\'none\'/%3E%3C/svg%3E")',
        motifName: 'Calacatta Marble & Gold Arch',
        accentColor: '#0F172A',
        textColor: '#0F172A',
        tagBg: 'bg-white/90 border-slate-400/50',
        icon: (
            <svg className="w-6 h-6 text-slate-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8">
                <circle cx="12" cy="12" r="9"/><line x1="3" y1="12" x2="21" y2="12"/>
            </svg>
        ),
    },
    19: {
        bg: 'radial-gradient(circle at 50% 20%, #3b0764 0%, #120121 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'48\' height=\'48\' viewBox=\'0 0 48 48\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M0 24c14-9 34 9 48 0v24H0z\' fill=\'%23c084fc\' fill-opacity=\'0.16\'/%3E%3Ccircle cx=\'17\' cy=\'14\' r=\'2\' fill=\'%23fde047\' fill-opacity=\'0.45\'/%3E%3Ccircle cx=\'34\' cy=\'11\' r=\'1.5\' fill=\'%23ffffff\' fill-opacity=\'0.55\'/%3E%3C/svg%3E")',
        motifName: 'Enchanted Aurora Stardust',
        accentColor: '#E9D5FF',
        textColor: '#FAF5FF',
        tagBg: 'bg-purple-950/85 border-amber-400/50',
        icon: (
            <svg className="w-6 h-6 text-purple-300" viewBox="0 0 24 24" fill="currentColor">
                <polygon points="12,2 15,9 22,9 17,14 19,21 12,17 5,21 7,14 2,9 9,9"/>
            </svg>
        ),
    },
    20: {
        bg: 'radial-gradient(circle at 50% 20%, #261207 0%, #08080a 100%)',
        pattern: 'url("data:image/svg+xml,%3Csvg width=\'52\' height=\'52\' viewBox=\'0 0 52 52\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'26\' cy=\'26\' r=\'2.5\' fill=\'%23fbbf24\' fill-opacity=\'0.7\'/%3E%3Ccircle cx=\'13\' cy=\'15\' r=\'3.5\' fill=\'%23f59e0b\' fill-opacity=\'0.4\'/%3E%3Ccircle cx=\'41\' cy=\'19\' r=\'2\' fill=\'%23fbbf24\' fill-opacity=\'0.5\'/%3E%3Ccircle cx=\'35\' cy=\'39\' r=\'3\' fill=\'%23d97706\' fill-opacity=\'0.45\'/%3E%3C/svg%3E")',
        motifName: 'Obsidian & Molten Gold',
        accentColor: '#FBBF24',
        textColor: '#FFFBEB',
        tagBg: 'bg-zinc-950/90 border-amber-400/60',
        icon: (
            <svg className="w-6 h-6 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2c-2 8-8 12-8 20 0 8.8 7.2 16 16 16s16-7.2 16-16c0-10-10-14-12-24z"/>
            </svg>
        ),
    },
};

export default function ThemePhoneMockup({ theme, size = 'normal', mockupHtml = null }) {
    const rawHtml = mockupHtml || theme?.mockup_html;
    if (rawHtml) {
        return (
            <div
                className="w-full flex justify-center items-center"
                dangerouslySetInnerHTML={{ __html: rawHtml }}
            />
        );
    }

    const themeId = theme?.id || 1;
    const isPremium = theme?.is_premium || theme?.tier === 'premium' || (theme?.price || 0) > 0;
    const preset = THEME_PRESETS[themeId] || THEME_PRESETS[1];
    const isCatalog = size === 'catalog';

    return (
        <div className="w-full flex justify-center items-center overflow-hidden py-0.5">
            <div className={isCatalog ? 'catalog-phone-mockup' : 'transform scale-[0.58] xs:scale-[0.70] sm:scale-100 origin-top -mb-34 xs:-mb-24 sm:mb-0 transition-transform duration-300'}>
                <div
                    className={`${isCatalog ? 'w-[180px] h-[360px]' : 'w-[185px] h-[330px]'} rounded-[2rem] p-2 bg-stone-900 ${
                        isPremium
                            ? 'border-[3.5px] border-amber-500/70 shadow-[0_12px_35px_-6px_rgba(217,119,6,0.35)] ring-1 ring-amber-400/30'
                            : 'border-[3.5px] border-stone-800 shadow-xl'
                    } relative flex flex-col justify-between text-center overflow-hidden transition-all duration-300 group-hover:scale-[1.02]`}
                >
                    {/* Top Speaker Notch */}
                    <div className="w-12 h-1.5 bg-stone-950 rounded-full mx-auto mb-0.5 z-20 shrink-0 flex items-center justify-center">
                        <div className="w-4 h-0.5 bg-stone-800 rounded-full"></div>
                    </div>

            {/* Screen Canvas with Motif Texture & Pattern Overlay */}
            <div
                className="rounded-[1.4rem] h-full flex flex-col justify-between p-3 relative overflow-hidden select-none"
                style={{
                    background: preset.bg,
                    color: preset.textColor,
                }}
            >
                {/* Pattern Overlay SVG Layer */}
                <div
                    className="absolute inset-0 pointer-events-none opacity-85 z-0"
                    style={{
                        backgroundImage: preset.pattern,
                        backgroundSize: '42px 42px',
                        backgroundRepeat: 'repeat',
                    }}
                />

                {/* Extra Darkening Gradient for Text Legibility */}
                <div
                    className={`absolute inset-0 pointer-events-none z-0 ${
                        themeId === 18
                            ? 'bg-gradient-to-b from-white/40 via-transparent to-white/70'
                            : 'bg-gradient-to-b from-black/25 via-black/10 to-black/45'
                    }`}
                />

                {isPremium && (
                    <>
                        {/* Premium Royal Double Gold Hairline Border & Ornate Corners */}
                        <div className="absolute inset-2 border border-amber-300/40 rounded-xl pointer-events-none z-10">
                            <span className="absolute -top-1 -left-1 text-amber-300 text-[10px] leading-none font-serif">⌜</span>
                            <span className="absolute -top-1 -right-1 text-amber-300 text-[10px] leading-none font-serif">⌝</span>
                            <span className="absolute -bottom-1 -left-1 text-amber-300 text-[10px] leading-none font-serif">⌞</span>
                            <span className="absolute -bottom-1 -right-1 text-amber-300 text-[10px] leading-none font-serif">⌟</span>
                        </div>
                        {/* Golden Light Glimmer Beam */}
                        <div className="absolute -top-10 -right-10 w-28 h-28 bg-gradient-to-br from-amber-300/25 to-transparent rounded-full blur-xl pointer-events-none z-0" />
                    </>
                )}

                {/* Screen Top: Theme Badge & Header */}
                <div className="relative z-10 pt-1 space-y-1">
                    <div className="flex items-center justify-center gap-1.5">
                        {isPremium ? (
                            <span className="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[8px] font-extrabold uppercase tracking-widest bg-gradient-to-r from-amber-500 via-yellow-400 to-amber-600 text-stone-950 shadow-sm border border-yellow-200">
                                <svg className="w-2.5 h-2.5" viewBox="0 0 24 24" fill="currentColor"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5z"/></svg>
                                <span>PREMIUM</span>
                            </span>
                        ) : (
                            <span className="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[7px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-xs text-white border border-white/30">
                                <span>BASIC HARMONY</span>
                            </span>
                        )}
                    </div>

                    {/* Motif Icon Emblem */}
                    <div className="w-6 h-6 mx-auto my-0.5 flex items-center justify-center opacity-95">
                        {preset.icon}
                    </div>

                    <p className="text-[8px] tracking-[0.2em] uppercase font-sans opacity-80 leading-none">
                        The Wedding of
                    </p>
                    <h4
                        className="font-serif text-sm font-bold leading-tight truncate px-1"
                        style={
                            isPremium
                                ? { color: '#FDE047', textShadow: '0 1px 4px rgba(0,0,0,0.8)' }
                                : { color: preset.accentColor }
                        }
                    >
                        Raden &amp; Anisa
                    </h4>
                </div>

                {/* Screen Center: Bespoke Motif Description & Wedding Title Box */}
                <div className={`relative z-10 my-auto py-1 px-2 rounded-xl ${preset.tagBg} backdrop-blur-sm border border-white/20 shadow-sm space-y-0.5 text-center`}>
                    <span className="block text-[7px] font-mono uppercase tracking-widest opacity-75">
                        {preset.motifName}
                    </span>
                    <p className="font-serif italic text-[11px] font-semibold truncate" style={isPremium ? { color: '#FEF08A' } : undefined}>
                        {theme.name}
                    </p>
                    <div className="w-8 h-px mx-auto my-0.5" style={{ backgroundColor: preset.accentColor, opacity: 0.5 }} />
                    <p className="text-[7px] font-mono opacity-80">
                        12 • 12 • 2026
                    </p>
                </div>

                {/* Screen Bottom: Interactive Action Pill */}
                <div className="relative z-10 pb-0.5">
                    {isPremium ? (
                        <div className="w-full py-1.5 px-2 rounded-lg bg-gradient-to-r from-amber-500 via-yellow-400 to-amber-600 text-stone-950 font-bold text-[9px] shadow-[0_2px_8px_rgba(217,119,6,0.5)] border border-yellow-200 flex items-center justify-center gap-1">
                            <svg className="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 24 24"><polygon points="12,2 15,9 22,9 17,14 19,21 12,17 5,21 7,14 2,9 9,9"/></svg>
                            <span>Tema Eksklusif</span>
                        </div>
                    ) : (
                        <div className="w-full py-1.5 px-2 rounded-lg bg-white/20 backdrop-blur-sm text-white font-medium text-[9px] border border-white/30 flex items-center justify-center gap-1">
                            <span>Buka Undangan</span>
                        </div>
                    )}
                </div>
            </div>
        </div>
            </div>
        </div>
    );
}

