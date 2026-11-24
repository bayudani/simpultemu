@extends('layouts.app')

@section('title', 'SimpulTemu - Buat Undangan Pernikahan Digital Praktis & Modern')
@section('description', 'Rayakan momen berharga pernikahan Anda dengan undangan digital eksklusif yang dirancang elegan, interaktif, dan mudah dibagikan kepada keluarga serta kerabat tercinta.')

@section('content')
    <!-- Hero Section - Landscape Couple & Smartphone Mockup -->
    <section
        id="beranda"
        class="relative overflow-hidden pt-16 pb-14 sm:pt-20 sm:pb-20 md:pt-20 md:pb-24 lg:pt-20 lg:pb-28 xl:pt-24 xl:pb-32 bg-[#0B132B] bg-cover min-h-[480px] sm:min-h-[540px] lg:min-h-[600px] xl:min-h-[640px] flex items-center w-full"
        style="background-image: url('{{ asset('images/hero-couple.jpg') }}'); background-size: cover; background-position: center 85%;"
    >
        <!-- Enhanced Navy Atmosphere Overlay (Rona Navy Khas SimpulTemu Ditingkatkan Lebih Terasa) -->
        <div class="absolute inset-0 bg-[#0B132B]/55 z-0 pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B132B]/80 via-[#0B132B]/45 to-[#0B132B]/35 z-0 pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-[#0B132B]/50 via-transparent to-[#0B132B]/40 z-0 pointer-events-none"></div>

        <div class="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-6 xl:gap-8 items-center">
                <!-- Left Column: Slogan, Typewriter, Description, CTAs -->
                <div class="lg:col-span-7 text-center lg:text-left space-y-4 sm:space-y-5 z-10 lg:pr-2 xl:pr-4">
                    <!-- Slogan Badge: Bersama Dalam Setiap Momen (Italic & Kapital di Awal Kata) -->
                    <div class="reveal-init reveal-down delay-100">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 sm:px-4 sm:py-2 rounded-xl bg-[#FF2E3A]/10 border border-[#FF2E3A]/40 text-white text-xs sm:text-sm shadow-[0_0_18px_rgba(255,46,58,0.2)] backdrop-blur-md">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-[#FF2E3A] shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2l2.4 7.2L22 12l-7.6 2.8L12 22l-2.4-7.2L2 12l7.6-2.8z" />
                            </svg>
                            <span class="italic font-medium text-slate-100 tracking-wide">Bersama Dalam Setiap Momen</span>
                        </div>
                    </div>

                    <!-- Main Heading: Platform Undangan Digital Modern & Praktis (Kapital di Awal Kata) -->
                    <h1 class="reveal-init reveal-up delay-250 text-white font-heading font-bold text-3xl sm:text-4xl md:text-5xl lg:text-[40px] xl:text-[46px] 2xl:text-[50px] leading-[1.18] tracking-tight">
                        Platform Undangan Digital <span class="text-[#FF2E3A]">Modern & Praktis</span>
                    </h1>

                    <p class="reveal-init reveal-up delay-400 font-sans text-slate-300 text-xs sm:text-base lg:text-lg xl:text-xl font-normal leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Rayakan momen berharga pernikahan Anda dengan undangan digital eksklusif yang dirancang elegan, interaktif, dan mudah dibagikan kepada keluarga serta kerabat tercinta.
                    </p>

                    <div class="reveal-init reveal-up delay-550 flex flex-row gap-2.5 sm:gap-4 justify-center lg:justify-start pt-1 sm:pt-2">
                        <a
                            href="{{ route('themes.index') }}"
                            class="group flex-1 sm:flex-initial px-4 sm:px-7 py-2.5 sm:py-3.5 rounded-xl text-white text-xs sm:text-base lg:text-base font-semibold bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-[0_4px_14px_rgba(255,46,58,0.35)] hover:shadow-[0_6px_20px_rgba(255,46,58,0.45)] transition-all duration-300 flex items-center justify-center gap-1.5 sm:gap-2 cursor-pointer text-center"
                        >
                            <span class="sm:hidden">Lihat Tema</span>
                            <span class="hidden sm:inline">Lihat Koleksi Tema</span>
                            <svg class="w-3.5 h-3.5 sm:w-5 sm:h-5 group-hover:translate-x-1 transition-transform shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                        @auth
                            <a
                                href="{{ route('dashboard') }}"
                                class="flex-1 sm:flex-initial px-4 sm:px-7 py-2.5 sm:py-3.5 rounded-xl text-xs sm:text-base lg:text-base font-semibold border-2 border-white/30 text-white hover:bg-white/10 hover:border-white transition-all duration-300 flex items-center justify-center cursor-pointer text-center whitespace-nowrap"
                            >
                                <span class="sm:hidden">Dashboard</span>
                                <span class="hidden sm:inline">Ke Dashboard Saya</span>
                            </a>
                        @else
                            <a
                                href="{{ route('register') }}"
                                class="flex-1 sm:flex-initial px-4 sm:px-7 py-2.5 sm:py-3.5 rounded-xl text-xs sm:text-base lg:text-base font-semibold border-2 border-white/30 text-white hover:bg-white/10 hover:border-white transition-all duration-300 flex items-center justify-center cursor-pointer text-center whitespace-nowrap"
                            >
                                <span class="sm:hidden">Buat Gratis</span>
                                <span class="hidden sm:inline">Buat Undangan Gratis</span>
                            </a>
                        @endauth
                    </div>

                    <!-- Trust badges -->
                    <div class="reveal-init reveal-up delay-700 pt-1 sm:pt-2 flex flex-wrap items-center justify-center lg:justify-start gap-2.5 sm:gap-6 text-[10px] sm:text-sm text-slate-300">
                        <span class="flex items-center gap-1 font-medium">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            20 Pilihan Tema
                        </span>
                        <span class="flex items-center gap-1 font-medium">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            RSVP & Lagu
                        </span>
                        <span class="flex items-center gap-1 font-medium">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            Amplop Digital
                        </span>
                    </div>
                </div>

                <!-- Right Column: 3D Dual-Phone Mockup (Official User Asset) - Balanced Center Position -->
                <div class="lg:col-span-5 relative w-full flex items-center justify-center lg:justify-center z-20 mt-6 lg:mt-0 pt-2 sm:pt-4">
                    <div class="reveal-init reveal-scale delay-200 relative w-full max-w-[350px] sm:max-w-[450px] md:max-w-[520px] lg:max-w-[550px] xl:max-w-[600px] 2xl:max-w-[650px] group">
                        <!-- Soft Ambient Radial Glow Behind Phones -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-[#FF2E3A]/25 via-[#DBF6FF]/15 to-amber-500/10 rounded-full blur-3xl -z-10 transform scale-95 pointer-events-none"></div>

                        <!-- Floating 3D Phones Graphic -->
                        <div class="relative animate-float transition-all duration-700 ease-out group-hover:scale-[1.03] group-hover:-translate-y-2">
                            <a
                                href="{{ route('themes.demo', ['theme' => 1]) }}"
                                class="block cursor-pointer focus:outline-none"
                                title="Buka Demo Undangan SimpulTemu"
                            >
                                <img
                                    src="{{ asset('images/hero-3d-phones.png') }}?v=20261124_04"
                                    alt="Model 3D Undangan Digital SimpulTemu"
                                    class="w-full h-auto max-h-[470px] sm:max-h-[540px] lg:max-h-[580px] xl:max-h-[630px] 2xl:max-h-[680px] object-contain drop-shadow-[0_20px_35px_rgba(0,0,0,0.6)] select-none"
                                    loading="eager"
                                />
                            </a>

                            <!-- Interactive Live Demo Floating Badge -->
                            <div class="absolute -bottom-2 sm:-bottom-2.5 right-1 sm:right-3 md:right-4 z-30 pointer-events-auto">
                                <a
                                    href="{{ route('themes.demo', ['theme' => 1]) }}"
                                    class="inline-flex items-center gap-1.5 sm:gap-2 px-4 sm:px-5 py-2 sm:py-2.5 rounded-full bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-xs sm:text-sm font-bold shadow-[0_8px_20px_rgba(255,46,58,0.45)] hover:shadow-[0_12px_28px_rgba(255,46,58,0.6)] transition-all duration-300 transform hover:scale-105 active:scale-95 cursor-pointer whitespace-nowrap"
                                >
                                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z" />
                                    </svg>
                                    <span>Lihat Demo Live</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dual-Layer Curved SVG Shape Divider at Bottom -->
        <div class="absolute bottom-0 left-0 right-0 w-full overflow-hidden leading-none z-20 pointer-events-none">
            <svg class="relative block w-full h-[60px] md:h-[100px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 C180,95 380,-30 520,65 C680,165 920,15 1200,45 L1200,120 L0,120 Z" fill="#DBF6FF" opacity="0.3"></path>
                <path d="M0,35 C320,125 620,15 920,85 C1060,115 1160,65 1200,55 L1200,120 L0,120 Z" fill="#FFFFFF"></path>
            </svg>
        </div>
    </section>

    <!-- Featured Themes Section -->
    <section id="tema-pilihan" class="relative py-24 bg-white border-b border-slate-200 overflow-hidden">
        @include('partials.side-geometric-mesh', ['hasTopWave' => true])

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 space-y-3">
                <span class="reveal-init reveal-down delay-100 inline-block px-4 py-1.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                    Koleksi Desain Pernikahan
                </span>
                <h2 class="reveal-init reveal-up delay-250 font-heading text-3xl sm:text-4xl md:text-5xl font-bold text-slate-900">
                    Pilihan Tema <span class="text-[#FF2E3A]">Eksklusif</span>
                </h2>
                <p class="reveal-init reveal-up delay-400 text-base sm:text-lg text-slate-600 max-w-2xl mx-auto font-normal">
                    Dirancang khusus dengan estetika modern, sentuhan editorial, dan palet warna romantis untuk hari istimewa Anda.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-3.5 lg:gap-4 xl:gap-5">
                @foreach($themes as $index => $theme)
                    @php
                        $delayClass = 'delay-' . (100 + ($index % 4) * 150);
                        $isPremium = !empty($theme['is_premium']) || ($theme['tier'] ?? '') === 'premium';
                        $priceFormatted = ($theme['price'] ?? 0) > 0 ? 'Rp ' . number_format($theme['price'], 0, ',', '.') : 'Gratis';
                    @endphp
                    <div class="reveal-init reveal-up {{ $delayClass }} bg-white rounded-xl sm:rounded-2xl overflow-hidden shadow-xs hover:shadow-xl border border-slate-200 transform hover:-translate-y-1.5 flex flex-col justify-between group">
                        <!-- Top Section with Phone Mockup -->
                        <div class="p-2 sm:p-2.5 md:p-2.5 lg:p-3 bg-gradient-to-b from-[#F7F4EE] to-[#EBE4D8] flex flex-col items-center justify-center relative overflow-hidden">
                            <!-- Pill badges inside card matching Katalog Tema -->
                            <div class="w-full flex items-center justify-between mb-1.5 sm:mb-2 z-10">
                                <span class="px-1.5 sm:px-2 py-0.5 rounded-full text-[8px] sm:text-[9.5px] font-semibold uppercase tracking-wider bg-white/90 backdrop-blur-md text-stone-700 border border-stone-200 shadow-2xs">
                                    {{ $isPremium ? 'Premium' : 'Basic' }}
                                </span>
                                <span class="px-1.5 sm:px-2 py-0.5 rounded-full text-[8px] sm:text-[9.5px] font-semibold uppercase tracking-wider shadow-2xs {{ $isPremium ? 'bg-amber-500 text-stone-950 font-bold' : 'bg-emerald-600 text-white' }}">
                                    {{ $priceFormatted }}
                                </span>
                            </div>

                            <!-- Smartphone Mockup View inside card -->
                            {!! $theme['mockup_html'] !!}
                        </div>

                        <!-- Details & Actions -->
                        <div class="p-2.5 sm:p-3 md:p-3 lg:p-3.5 flex-1 flex flex-col justify-between space-y-2 sm:space-y-2.5 bg-white">
                            <div>
                                <div class="flex items-center justify-between gap-1">
                                    <h3 class="font-heading font-serif text-xs sm:text-sm lg:text-[15px] font-bold text-stone-900 group-hover:text-[#FF2E3A] transition-colors truncate">
                                        {{ $theme['name'] }}
                                    </h3>
                                    @if(!empty($theme['layout']))
                                        <span class="text-[7.5px] sm:text-[8.5px] uppercase font-mono px-1.5 py-0.5 rounded bg-stone-100 text-stone-500 shrink-0">
                                            {{ $theme['layout'] }}
                                        </span>
                                    @endif
                                </div>
                                <p class="text-[10px] sm:text-xs text-slate-600 line-clamp-2 mt-1 leading-relaxed">
                                    {{ $theme['description'] }}
                                </p>
                            </div>

                            <div class="pt-2 sm:pt-2.5 border-t border-slate-100 flex items-center justify-between gap-1">
                                <span class="text-xs sm:text-sm lg:text-base font-bold text-[#FF2E3A]">
                                    {{ $priceFormatted }}
                                </span>
                                <a
                                    href="{{ route('themes.show', $theme['id']) }}"
                                    class="text-[9.5px] sm:text-xs font-semibold px-2 sm:px-3 py-1 sm:py-1.5 rounded-lg text-[#FF2E3A] bg-[#DBF6FF] hover:bg-[#FF2E3A] hover:text-white border border-[#BAEAF8] transition-all duration-300 cursor-pointer whitespace-nowrap"
                                >
                                    <span class="sm:hidden">Detail &rarr;</span>
                                    <span class="hidden sm:inline">Lihat Detail &rarr;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-14 text-center">
                <a
                    href="{{ route('themes.index') }}"
                    class="reveal-init reveal-scale delay-200 inline-block px-10 py-4 rounded-full text-white font-semibold bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 cursor-pointer"
                >
                    Jelajahi Semua 20 Tema
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-12 sm:py-24 bg-[#F8FAFC] border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-16 space-y-2 sm:space-y-3">
                <span class="reveal-init reveal-down delay-100 inline-block px-3 py-1 sm:px-4 sm:py-1.5 rounded-full text-[10px] sm:text-xs font-semibold tracking-wider uppercase bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                    Fitur Terlengkap
                </span>
                <h2 class="reveal-init reveal-up delay-250 font-heading text-2xl sm:text-4xl md:text-5xl font-bold text-slate-900">
                    Semua Kebutuhan Acara dalam <span class="text-[#FF2E3A]">Satu Tautan</span>
                </h2>
                <p class="reveal-init reveal-up delay-400 text-xs sm:text-lg text-slate-600 max-w-2xl mx-auto font-normal">
                    Dilengkapi beragam fitur modern yang membuat undangan digital Anda terasa interaktif, personal, dan berkesan bagi para tamu.
                </p>
            </div>

            @php
                $featuresList = [
                    [
                        'title' => 'Unlimited Share',
                        'svg' => '<svg class="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m22 2-7 20-4-9-9-4Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M22 2 11 13"/></svg>'
                    ],
                    [
                        'title' => 'Custom Nama Tamu',
                        'svg' => '<svg class="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path stroke-linecap="round" stroke-linejoin="round" d="M22 21v-2a4 4 0 0 0-3-3.87"/><path stroke-linecap="round" stroke-linejoin="round" d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>'
                    ],
                    [
                        'title' => 'RSVP',
                        'svg' => '<svg class="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>'
                    ],
                    [
                        'title' => 'Gallery Foto',
                        'svg' => '<svg class="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path stroke-linecap="round" stroke-linejoin="round" d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>'
                    ],
                    [
                        'title' => 'Countdown',
                        'svg' => '<svg class="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>'
                    ],
                    [
                        'title' => 'Amplop Digital',
                        'svg' => '<svg class="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>'
                    ],
                    [
                        'title' => 'Ucapan & Doa',
                        'svg' => '<svg class="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>'
                    ],
                    [
                        'title' => 'Navigasi Maps',
                        'svg' => '<svg class="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>'
                    ],
                ];
            @endphp

            <div class="grid grid-cols-2 gap-2.5 sm:gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach($featuresList as $fIdx => $feat)
                    @php
                        $colIdx = $fIdx % 4;
                        $rowIdx = floor($fIdx / 4);
                        $featDelay = 'delay-' . (100 + $colIdx * 150 + $rowIdx * 100);
                    @endphp
                    <div class="reveal-init reveal-up {{ $featDelay }} p-3 sm:p-6 rounded-xl sm:rounded-2xl bg-white border border-slate-200 hover:border-[#FF2E3A] text-center shadow-xs hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-center">
                        <div class="inline-flex items-center justify-center w-10 h-10 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl bg-[#DBF6FF] text-[#FF2E3A] mb-2 sm:mb-4 border border-[#BAEAF8] shrink-0 [&>svg]:w-5 [&>svg]:h-5 sm:[&>svg]:w-7 sm:[&>svg]:h-7">
                            {!! $feat['svg'] !!}
                        </div>
                        <h3 class="font-heading font-bold text-xs sm:text-base text-slate-900 line-clamp-2">
                            {{ $feat['title'] }}
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="tentang" class="relative py-12 sm:py-24 bg-white border-b border-slate-200 overflow-hidden">
        @include('partials.side-geometric-mesh', ['hasTopWave' => false])

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-16 space-y-2 sm:space-y-3">
                <span class="reveal-init reveal-down delay-100 inline-block px-3 py-1 sm:px-4 sm:py-1.5 rounded-full text-[10px] sm:text-xs font-semibold tracking-wider uppercase bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                    Keunggulan SimpulTemu
                </span>
                <h2 class="reveal-init reveal-up delay-250 font-heading text-2xl sm:text-4xl md:text-5xl font-bold text-slate-900">
                    Mengapa <span class="text-[#FF2E3A]">Memilih</span> Kami?
                </h2>
            </div>

            @php
                $benefitsList = [
                    [
                        'title' => 'Harga Terjangkau',
                        'description' => 'Dengan harga terjangkau, kamu akan mendapatkan undangan digital premium berkualitas tinggi',
                        'svg' => '<svg class="w-8 h-8 text-[#FF2E3A]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><line x1="12" x2="12" y1="2" y2="22"/><path stroke-linecap="round" stroke-linejoin="round" d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
                        'class' => 'reveal-left delay-150',
                    ],
                    [
                        'title' => 'Bebas Revisi',
                        'description' => 'Revisi data undangan tanpa batasan dan tanpa biaya tambahan kapan saja',
                        'svg' => '<svg class="w-8 h-8 text-[#FF2E3A]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 3v5h-5"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H3v5"/></svg>',
                        'class' => 'reveal-up delay-350',
                    ],
                    [
                        'title' => 'Pengerjaan Cepat',
                        'description' => 'Buat undangan dalam hitungan menit secara mandiri tanpa koding',
                        'svg' => '<svg class="w-8 h-8 text-[#FF2E3A]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
                        'class' => 'reveal-right delay-550 col-span-2 md:col-span-1',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-2 md:grid-cols-3 gap-2.5 sm:gap-8">
                @foreach($benefitsList as $bIdx => $b)
                    <div class="reveal-init {{ $b['class'] }} bg-white p-3.5 sm:p-8 rounded-xl sm:rounded-3xl text-center border border-slate-200 shadow-xs hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-start">
                        <div class="inline-flex items-center justify-center w-10 h-10 sm:w-16 sm:h-16 rounded-xl sm:rounded-2xl bg-[#DBF6FF] text-[#FF2E3A] mb-2.5 sm:mb-6 border border-[#BAEAF8] shrink-0 [&>svg]:w-5 [&>svg]:h-5 sm:[&>svg]:w-8 sm:[&>svg]:h-8">
                            {!! $b['svg'] !!}
                        </div>
                        <h3 class="font-heading text-xs sm:text-xl font-bold mb-1 sm:mb-3 text-slate-900">
                            {{ $b['title'] }}
                        </h3>
                        <p class="text-slate-600 font-normal leading-relaxed text-[11px] sm:text-base">
                            {{ $b['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-14 sm:py-24 bg-gradient-to-b from-[#F8FAFC] to-[#DBF6FF]/30 overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 sm:space-y-7">
            <span class="reveal-init reveal-down delay-100 inline-block px-3 py-1 sm:px-4 sm:py-1.5 rounded-full text-[10px] sm:text-xs font-semibold tracking-wider uppercase bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                Wujudkan Hari Istimewa
            </span>
            <h2 class="reveal-init reveal-up delay-250 font-heading text-2xl sm:text-4xl md:text-5xl font-bold text-slate-900 leading-tight">
                Siap Membagikan Kebahagiaan Anda dengan <span class="text-[#FF2E3A]">Undangan Sempurna?</span>
            </h2>
            <p class="reveal-init reveal-up delay-400 text-xs sm:text-lg text-slate-600 font-normal max-w-2xl mx-auto">
                Mulai sekarang juga. Pilih tema favorit Anda secara gratis, atau upgrade ke tema Premium kapan saja.
            </p>
            <div class="reveal-init reveal-scale delay-550 pt-2">
                @auth
                    <a
                        href="{{ route('dashboard') }}"
                        class="inline-block px-8 py-3.5 sm:px-12 sm:py-5 rounded-full text-white font-semibold text-sm sm:text-lg bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 cursor-pointer"
                    >
                        Kelola Undangan di Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('register') }}"
                        class="inline-block px-8 py-3.5 sm:px-12 sm:py-5 rounded-full text-white font-semibold text-sm sm:text-lg bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 cursor-pointer"
                    >
                        Buat Undangan Sekarang
                    </a>
                @endauth
            </div>
        </div>
    </section>
@endsection

