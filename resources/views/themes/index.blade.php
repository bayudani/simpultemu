@extends('layouts.app')

@section('title', 'Katalog Tema - SimpulTemu Wedding')
@section('description', 'Koleksi 20 tema undangan pernikahan digital mewah, hangat, dan berkelas dengan arsitektur Dynamic Multi-Theme Engine.')

@push('styles')
<style>
/* Animations for Themes Vector Ornaments */
@keyframes gentle-sway {
    0%, 100% { transform: rotate(-3deg); }
    50% { transform: rotate(3deg); }
}
.animate-gentle-sway {
    animation: gentle-sway 3.5s ease-in-out infinite;
}

@keyframes floating-leaf {
    0% { transform: translateY(-4px) rotate(-2deg); opacity: 0.8; }
    50% { transform: translateY(5px) rotate(3deg); opacity: 1; }
    100% { transform: translateY(-4px) rotate(-2deg); opacity: 0.8; }
}
.animate-floating-leaf {
    animation: floating-leaf 4s ease-in-out infinite;
}

@keyframes shimmer-gold {
    0% { filter: drop-shadow(0 0 1px rgba(234,179,8,0.3)); opacity: 0.75; }
    50% { filter: drop-shadow(0 0 6px rgba(250,204,21,0.95)); opacity: 1; }
    100% { filter: drop-shadow(0 0 1px rgba(234,179,8,0.3)); opacity: 0.75; }
}
.animate-shimmer-gold {
    animation: shimmer-gold 2.5s ease-in-out infinite;
}

@keyframes float-slow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}
.animate-float-slow {
    animation: float-slow 3s ease-in-out infinite;
}

/* Responsive Phone Mockup Scaler for 4-Column Grid */
.catalog-phone-mockup {
    transform-origin: top center;
    transition: transform 0.3s ease;
    transform: scale(0.68);
    margin-bottom: -115px;
}
@media (min-width: 640px) {
    .catalog-phone-mockup {
        transform: scale(0.78);
        margin-bottom: -78px;
    }
}
@media (min-width: 768px) {
    .catalog-phone-mockup {
        transform: scale(0.72);
        margin-bottom: -100px;
    }
}
@media (min-width: 1024px) {
    .catalog-phone-mockup {
        transform: scale(0.82);
        margin-bottom: -65px;
    }
}
@media (min-width: 1280px) {
    .catalog-phone-mockup {
        transform: scale(0.88);
        margin-bottom: -43px;
    }
}
</style>
@endpush

@section('content')
<!-- SVG ClipPath Definition for the Curved Banner (Smooth Crescent Arc) -->
<svg width="0" height="0" class="absolute pointer-events-none" style="position: absolute; width: 0; height: 0; overflow: hidden;" aria-hidden="true">
    <defs>
        <clipPath id="katalog-banner-curve" clipPathUnits="objectBoundingBox">
            <path d="M 0,0 L 1,0 L 1,0.88 C 0.72,0.98 0.28,0.98 0,0.88 Z" />
        </clipPath>
    </defs>
</svg>

<div class="relative bg-[#F8FAFC] min-h-screen overflow-hidden">
    <!-- Side Diagonal Trellis Ornaments on Flanks across the full page -->
    @include('partials.side-diagonal-ornament')

    <!-- Top Curved Hero Banner (Matches Beranda dark atmosphere with custom smooth crescent curve boundary) -->
    <section class="relative z-10 pt-24 sm:pt-28 md:pt-32 pb-16 sm:pb-18 md:pb-20 text-center overflow-hidden">
        <!-- Clipped Dark Hero Background -->
        <div class="absolute inset-0 pointer-events-none -z-10" style="clip-path: url(#katalog-banner-curve); -webkit-clip-path: url(#katalog-banner-curve);">
            <div class="absolute inset-0 bg-[#0B132B] bg-cover bg-[center_35%] sm:bg-center" style="background-image: url('/images/hero-banner.png');"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-[#0B132B]/95 via-[#1E293B]/90 to-[#0F172A]/95"></div>
        </div>

        <!-- Glowing Decorative Curved Border Lines along the exact boundary (Crescent Arc) -->
        <div class="absolute inset-0 pointer-events-none z-10" aria-hidden="true">
            <svg class="w-full h-full block" viewBox="0 0 1000 1000" preserveAspectRatio="none">
                <defs>
                    <filter id="cyan-banner-glow" x="-20%" y="-20%" width="140%" height="140%">
                        <feGaussianBlur stdDeviation="4" result="blur" />
                        <feComposite in="SourceGraphic" in2="blur" operator="over" />
                    </filter>
                    <filter id="white-curve-soften" x="-20%" y="-40%" width="140%" height="180%">
                        <feGaussianBlur stdDeviation="8" />
                    </filter>
                </defs>
                <!-- Soft White Ambient Glow Underneath Curve to blend smoothly with white blur gradient -->
                <path d="M 0,884 C 280,984 720,984 1000,884" fill="none" stroke="#FFFFFF" stroke-width="14" filter="url(#white-curve-soften)" opacity="0.65" />
                <!-- Subtle Soft Cyan Accent Underline -->
                <path d="M 0,892 C 280,992 720,992 1000,892" fill="none" stroke="#DBF6FF" stroke-width="2.5" opacity="0.4" />
                <!-- Primary Glowing Blue Boundary Line -->
                <path d="M 0,880 C 280,980 720,980 1000,880" fill="none" stroke="#0284C7" stroke-width="3" filter="url(#cyan-banner-glow)" opacity="0.95" />
            </svg>
        </div>

        <!-- Banner Content -->
        <div class="relative z-20 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4 sm:space-y-5">
            <!-- Badge Pill -->
            <div>
                <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-semibold tracking-widest uppercase bg-sky-950/70 text-sky-300 border border-sky-400/40 shadow-[0_0_18px_rgba(2,132,199,0.3)] backdrop-blur-md">
                    <svg class="w-3.5 h-3.5 text-sky-400 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/>
                    </svg>
                    <span>Dynamic Multi-Theme Engine</span>
                </span>
            </div>

            <!-- Title -->
            <h1 class="font-serif text-3xl sm:text-5xl lg:text-6xl font-bold text-white tracking-tight drop-shadow-md">
                Katalog Tema <span class="text-[#FF2E3A]">Pernikahan</span>
            </h1>

            <!-- Subtitle Description -->
            <p class="font-sans text-slate-300 text-sm sm:text-base lg:text-lg font-normal leading-relaxed max-w-2xl mx-auto">
                Tersedia 20 desain undangan eksklusif: 10 tema Basic gratis dan 10 tema Premium bernuansa mewah dengan audio real-time, sampul pembuka interaktif, dan tata letak elegan.
            </p>

            <!-- Filter Tabs -->
            <div class="flex flex-wrap justify-center items-center gap-2.5 sm:gap-3.5 pt-2 sm:pt-3">
                <button type="button" onclick="filterCategory('all')" id="btn-all" class="theme-filter-btn px-5 sm:px-6 py-2 sm:py-2.5 rounded-full font-semibold text-xs sm:text-sm transition-all duration-300 bg-[#FF2E3A] text-white shadow-lg shadow-[#FF2E3A]/25 cursor-pointer">
                    Semua Tema ({{ $themes->count() }})
                </button>
                <button type="button" onclick="filterCategory('basic')" id="btn-basic" class="theme-filter-btn px-5 sm:px-6 py-2 sm:py-2.5 rounded-full font-medium text-xs sm:text-sm transition-all duration-300 bg-white/10 hover:bg-white/20 text-white border border-white/20 backdrop-blur-md shadow-xs cursor-pointer">
                    Basic Gratis ({{ $themes->where('tier', 'basic')->count() }})
                </button>
                <button type="button" onclick="filterCategory('premium')" id="btn-premium" class="theme-filter-btn px-5 sm:px-6 py-2 sm:py-2.5 rounded-full font-medium text-xs sm:text-sm transition-all duration-300 bg-white/10 hover:bg-white/20 text-white border border-white/20 backdrop-blur-md shadow-xs cursor-pointer">
                    Premium Rp59.000 ({{ $themes->where('tier', 'premium')->count() }})
                </button>
            </div>
        </div>
    </section>

    <!-- Theme Cards Section (Below the Curved Banner) -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 sm:pt-10 pb-14 sm:pb-20">

        <!-- ================= 10 TEMA BASIC (GRATIS) ================= -->
        <div id="section-basic" class="mb-20">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 pb-4 border-b border-[#E7E0D6] gap-2">
                <div>
                    <h2 class="font-serif text-2xl sm:text-3xl font-bold text-stone-900 flex items-center gap-3">
                        <span>Tema Basic Harmony</span>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200 font-sans">
                            100% Gratis
                        </span>
                    </h2>
                    <p class="text-sm text-stone-500 font-light mt-1">Desain esensial, anggun, dan responsif tanpa biaya tambahan</p>
                </div>
                <span class="text-xs sm:text-sm font-medium text-stone-500 font-mono">{{ $themes->where('tier', 'basic')->count() }} Desain Tersedia</span>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-3.5 lg:gap-4 xl:gap-5">
                @foreach($themes->where('tier', 'basic') as $theme)
                @php
                    $config = is_array($theme->theme_config) ? $theme->theme_config : (json_decode($theme->theme_config, true) ?? []);
                    $primaryColor = $config['primary_color'] ?? ($config['colors']['primary'] ?? '#800000');
                    $layout = $config['layout'] ?? 'vertical_stack';
                @endphp
                <div class="theme-card basic bg-white rounded-xl sm:rounded-2xl shadow-xs hover:shadow-xl transition-all duration-300 border border-[#E7E0D6] overflow-hidden flex flex-col justify-between group hover:-translate-y-1">
                    
                    <!-- Top Section with 9:16 Smartphone Mockup -->
                    <div class="p-2 sm:p-2.5 md:p-2.5 lg:p-3 bg-gradient-to-b from-[#F7F4EE] to-[#EBE4D8] flex flex-col items-center justify-center relative overflow-hidden">
                        <!-- Pill badges inside card -->
                        <div class="w-full flex items-center justify-between mb-1.5 sm:mb-2 z-10">
                            <span class="px-1.5 sm:px-2 py-0.5 rounded-full text-[8px] sm:text-[9.5px] font-semibold uppercase tracking-wider bg-white/90 backdrop-blur-md text-stone-700 border border-stone-200 shadow-2xs">
                                Basic
                            </span>
                            <span class="px-1.5 sm:px-2 py-0.5 rounded-full text-[8px] sm:text-[9.5px] font-semibold uppercase tracking-wider bg-emerald-600 text-white shadow-2xs">
                                Gratis
                            </span>
                        </div>

                        <!-- 9:16 Vertical Smartphone Mockup with Bespoke Motif & Corak -->
                        @include('partials.theme-phone-mockup', ['theme' => $theme, 'size' => 'catalog'])
                    </div>

                    <!-- Details & Actions -->
                    <div class="p-2.5 sm:p-3 md:p-3 lg:p-3.5 flex-1 flex flex-col justify-between space-y-2 sm:space-y-2.5 bg-white">
                        <div>
                            <div class="flex items-center justify-between gap-1">
                                <h3 class="font-serif text-xs sm:text-sm lg:text-[15px] font-bold text-stone-900 group-hover:text-[#FF2E3A] transition-colors truncate">
                                    {{ $theme->name }}
                                </h3>
                                <span class="text-[7.5px] sm:text-[8.5px] uppercase font-mono px-1.5 py-0.5 rounded bg-stone-100 text-stone-500 shrink-0">
                                    {{ str_replace('_', ' ', $layout) }}
                                </span>
                            </div>
                            <p class="text-stone-600 text-[10px] sm:text-[11px] mt-1 sm:mt-1.5 line-clamp-2 leading-relaxed font-light min-h-[1.85rem] sm:min-h-[2.1rem]">
                                {{ $theme->description }}
                            </p>
                        </div>

                        <div class="pt-2 sm:pt-2.5 border-t border-slate-100 space-y-2 sm:space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="text-[8.5px] sm:text-[9.5px] text-stone-500 uppercase tracking-wider font-semibold">Investasi</span>
                                <span class="font-serif text-xs sm:text-sm lg:text-[15px] font-extrabold text-emerald-700">Gratis</span>
                            </div>
                            <div class="grid grid-cols-2 gap-1 sm:gap-1.5">
                                <button
                                    type="button"
                                    onclick="openThemeDemoModal({{ $theme->id }}, {{ json_encode($theme->name) }}, {{ json_encode($theme->tier) }}, {{ json_encode($theme->preset_music_label) }})"
                                    class="text-center py-1.5 px-1 sm:px-1.5 rounded-lg border border-slate-200 hover:border-[#FF2E3A] text-slate-800 hover:text-[#FF2E3A] hover:bg-[#DBF6FF]/30 text-[9.5px] sm:text-[10.5px] lg:text-[11px] font-semibold transition-all duration-300 flex items-center justify-center gap-1 cursor-pointer"
                                >
                                    <svg class="w-3 h-3 text-slate-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <span class="sm:hidden md:inline lg:hidden">Demo</span>
                                    <span class="hidden sm:inline md:hidden lg:inline">Lihat Demo</span>
                                </button>
                                
                                @auth
                                <a
                                    href="{{ route('dashboard.invitations.create', ['theme_id' => $theme->id]) }}"
                                    class="text-center py-1.5 px-1 sm:px-1.5 rounded-lg bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-[9.5px] sm:text-[10.5px] lg:text-[11px] font-semibold transition-all duration-300 shadow-[0_4px_14px_rgba(255,46,58,0.25)] flex items-center justify-center gap-1 cursor-pointer"
                                >
                                    <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    <span class="sm:hidden md:inline lg:hidden">Pilih</span>
                                    <span class="hidden sm:inline md:hidden lg:inline">Pilih Tema</span>
                                </a>
                                @else
                                <a
                                    href="{{ route('login') }}?redirect={{ urlencode(route('dashboard.invitations.create', ['theme_id' => $theme->id])) }}"
                                    class="text-center py-1.5 px-1 sm:px-1.5 rounded-lg bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-[9.5px] sm:text-[10.5px] lg:text-[11px] font-semibold transition-all duration-300 shadow-[0_4px_14px_rgba(255,46,58,0.25)] flex items-center justify-center gap-1 cursor-pointer"
                                >
                                    <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    <span class="sm:hidden md:inline lg:hidden">Pilih</span>
                                    <span class="hidden sm:inline md:hidden lg:inline">Pilih Tema</span>
                                </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- ================= 10 TEMA PREMIUM (RP 59.000) ================= -->
        <div id="section-premium">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 pb-4 border-b border-slate-200 gap-2">
                <div>
                    <h2 class="font-serif text-2xl sm:text-3xl font-bold text-slate-900 flex items-center gap-3">
                        <span>Tema Premium Serenade</span>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8] font-sans">
                            Rp 59.000
                        </span>
                    </h2>
                    <p class="text-sm text-slate-500 font-light mt-1">Kemewahan editorial, animasi halus, musik latar romantis, dan tata letak eksklusif</p>
                </div>
                <span class="text-xs sm:text-sm font-medium text-slate-500 font-mono">{{ $themes->where('tier', 'premium')->count() }} Desain Tersedia</span>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-3.5 lg:gap-4 xl:gap-5">
                @foreach($themes->where('tier', 'premium') as $theme)
                @php
                    $config = is_array($theme->theme_config) ? $theme->theme_config : (json_decode($theme->theme_config, true) ?? []);
                    $primaryColor = $config['primary_color'] ?? ($config['colors']['primary'] ?? '#7C3AED');
                    $layout = $config['layout'] ?? 'luxury_layered';
                @endphp
                <div class="theme-card premium bg-white rounded-xl sm:rounded-2xl shadow-xs hover:shadow-xl transition-all duration-300 border border-slate-200 hover:border-[#FF2E3A]/40 overflow-hidden flex flex-col justify-between group hover:-translate-y-1 relative">
                    
                    <!-- Top Section with 9:16 Smartphone Mockup -->
                    <div class="p-2 sm:p-2.5 md:p-2.5 lg:p-3 bg-gradient-to-b from-slate-50 to-slate-100/70 flex flex-col items-center justify-center relative overflow-hidden">
                        <!-- Pill badges inside card -->
                        <div class="w-full flex items-center justify-between mb-1.5 sm:mb-2 z-10">
                            <span class="px-1.5 sm:px-2 py-0.5 rounded-full text-[8px] sm:text-[9.5px] font-semibold uppercase tracking-wider bg-[#FF2E3A] text-white shadow-xs">
                                Premium
                            </span>
                            <span class="px-1.5 sm:px-2 py-0.5 rounded-full text-[8px] sm:text-[9.5px] font-semibold uppercase tracking-wider bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8] shadow-2xs">
                                Rp 59k
                            </span>
                        </div>

                        <!-- 9:16 Vertical Smartphone Mockup with Ultra-Luxurious Motif & Corak -->
                        @include('partials.theme-phone-mockup', ['theme' => $theme, 'size' => 'catalog'])
                    </div>

                    <!-- Details & Actions -->
                    <div class="p-2.5 sm:p-3 md:p-3 lg:p-3.5 flex-1 flex flex-col justify-between space-y-2 sm:space-y-2.5 bg-white">
                        <div>
                            <div class="flex items-center justify-between gap-1">
                                <h3 class="font-serif text-xs sm:text-sm lg:text-[15px] font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors truncate">
                                    {{ $theme->name }}
                                </h3>
                                <span class="text-[7.5px] sm:text-[8.5px] uppercase font-mono px-1.5 py-0.5 rounded bg-[#DBF6FF]/60 text-[#0284C7] border border-[#BAEAF8] shrink-0 font-semibold">
                                    {{ str_replace('_', ' ', $layout) }}
                                </span>
                            </div>
                            <p class="text-slate-600 text-[10px] sm:text-[11px] mt-1 sm:mt-1.5 line-clamp-2 leading-relaxed font-light min-h-[1.85rem] sm:min-h-[2.1rem]">
                                {{ $theme->description }}
                            </p>
                        </div>

                        <div class="pt-2 sm:pt-2.5 border-t border-slate-100 space-y-2 sm:space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="text-[8.5px] sm:text-[9.5px] text-slate-500 uppercase tracking-wider font-semibold">Investasi</span>
                                <span class="font-serif text-xs sm:text-sm lg:text-[15px] font-extrabold text-[#FF2E3A]">Rp 59.000</span>
                            </div>
                            <div class="grid grid-cols-2 gap-1 sm:gap-1.5">
                                <button
                                    type="button"
                                    onclick="openThemeDemoModal({{ $theme->id }}, {{ json_encode($theme->name) }}, {{ json_encode($theme->tier) }}, {{ json_encode($theme->preset_music_label) }})"
                                    class="text-center py-1.5 px-1 sm:px-1.5 rounded-lg border border-slate-200 hover:border-[#FF2E3A] text-slate-800 hover:text-[#FF2E3A] hover:bg-[#DBF6FF]/30 text-[9.5px] sm:text-[10.5px] lg:text-[11px] font-semibold transition-all duration-300 flex items-center justify-center gap-1 cursor-pointer"
                                >
                                    <svg class="w-3 h-3 text-slate-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <span class="sm:hidden md:inline lg:hidden">Demo</span>
                                    <span class="hidden sm:inline md:hidden lg:inline">Lihat Demo</span>
                                </button>
                                
                                @auth
                                <a
                                    href="{{ route('dashboard.invitations.create', ['theme_id' => $theme->id]) }}"
                                    class="text-center py-1.5 px-1 sm:px-1.5 rounded-lg bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-[9.5px] sm:text-[10.5px] lg:text-[11px] font-semibold transition-all duration-300 shadow-[0_4px_14px_rgba(255,46,58,0.25)] flex items-center justify-center gap-1 cursor-pointer"
                                >
                                    <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    <span class="sm:hidden md:inline lg:hidden">Pilih</span>
                                    <span class="hidden sm:inline md:hidden lg:inline">Pilih Tema</span>
                                </a>
                                @else
                                <a
                                    href="{{ route('login') }}?redirect={{ urlencode(route('dashboard.invitations.create', ['theme_id' => $theme->id])) }}"
                                    class="text-center py-1.5 px-1 sm:px-1.5 rounded-lg bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-[9.5px] sm:text-[10.5px] lg:text-[11px] font-semibold transition-all duration-300 shadow-[0_4px_14px_rgba(255,46,58,0.25)] flex items-center justify-center gap-1 cursor-pointer"
                                >
                                    <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    <span class="sm:hidden md:inline lg:hidden">Pilih</span>
                                    <span class="hidden sm:inline md:hidden lg:inline">Pilih Tema</span>
                                </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@include('partials.theme-demo-modal')
@endsection

@push('scripts')
<script src="{{ asset('js/dynamicThemeEngine.js') }}"></script>
<script>
function filterCategory(category) {
    const secBasic = document.getElementById('section-basic');
    const secPremium = document.getElementById('section-premium');
    const btnAll = document.getElementById('btn-all');
    const btnBasic = document.getElementById('btn-basic');
    const btnPremium = document.getElementById('btn-premium');

    const activeClasses = ['bg-[#FF2E3A]', 'text-white', 'shadow-lg', 'shadow-[#FF2E3A]/25', 'font-semibold'];
    const inactiveClasses = ['bg-white/10', 'text-white', 'border', 'border-white/20', 'hover:bg-white/20', 'backdrop-blur-md', 'shadow-xs', 'font-medium'];

    [btnAll, btnBasic, btnPremium].forEach(btn => {
        btn.classList.remove(...activeClasses);
        btn.classList.add(...inactiveClasses);
    });

    if (category === 'basic') {
        secBasic.style.display = 'block';
        secPremium.style.display = 'none';
        btnBasic.classList.remove(...inactiveClasses);
        btnBasic.classList.add(...activeClasses);
    } else if (category === 'premium') {
        secBasic.style.display = 'none';
        secPremium.style.display = 'block';
        btnPremium.classList.remove(...inactiveClasses);
        btnPremium.classList.add(...activeClasses);
    } else {
        secBasic.style.display = 'block';
        secPremium.style.display = 'block';
        btnAll.classList.remove(...inactiveClasses);
        btnAll.classList.add(...activeClasses);
    }
}

// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeThemeDemoModal();
    }
});
</script>
@endpush
