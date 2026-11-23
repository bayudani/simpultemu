import { Link } from '@inertiajs/react';
import { useState, useEffect } from 'react';
import AppLayout from '@/Layouts/AppLayout';
import ThemePhoneMockup from '@/Components/ThemePhoneMockup';

// Lokasi foto background hero banner
const HERO_BACKGROUND_IMAGE = '/images/hero-banner.png';
const WORDS = ['Momen.', 'Kisah.', 'Langkah.', 'Kenangan.', 'Impian.'];

export default function Home({ auth, themes }) {
    const [wordIndex, setWordIndex] = useState(0);
    const [displayedText, setDisplayedText] = useState('');
    const [isDeleting, setIsDeleting] = useState(false);

    useEffect(() => {
        const currentWord = WORDS[wordIndex];
        let timer;

        if (!isDeleting) {
            if (displayedText.length < currentWord.length) {
                timer = setTimeout(() => {
                    setDisplayedText(currentWord.slice(0, displayedText.length + 1));
                }, 120);
            } else {
                timer = setTimeout(() => {
                    setIsDeleting(true);
                }, 1800);
            }
        } else {
            if (displayedText.length > 0) {
                timer = setTimeout(() => {
                    setDisplayedText(currentWord.slice(0, displayedText.length - 1));
                }, 60);
            } else {
                setIsDeleting(false);
                setWordIndex((prev) => (prev + 1) % WORDS.length);
            }
        }

        return () => clearTimeout(timer);
    }, [displayedText, isDeleting, wordIndex]);

    // Scroll Reveal IntersectionObserver Engine (Silky Smooth)
    useEffect(() => {
        let observer;
        const timer = setTimeout(() => {
            const observerCallback = (entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal-active');
                        obs.unobserve(entry.target);
                    }
                });
            };

            observer = new IntersectionObserver(observerCallback, {
                root: null,
                rootMargin: '0px 0px -50px 0px',
                threshold: 0.05,
            });

            const elements = document.querySelectorAll('.reveal-init');
            elements.forEach((el) => observer.observe(el));
        }, 50);

        return () => {
            clearTimeout(timer);
            if (observer) observer.disconnect();
        };
    }, [themes]);

    return (
        <AppLayout auth={auth}>
            {/* Hero Section - Dark Navy Atmosphere & Triple Smartphone Mockup */}
            <section
                id="beranda"
                className="relative overflow-hidden pt-20 pb-16 sm:pt-24 sm:pb-24 md:pt-28 md:pb-32 lg:pt-28 lg:pb-36 xl:pt-32 xl:pb-40 bg-[#0B132B] bg-cover bg-[center_35%] sm:bg-center min-h-[480px] sm:min-h-[560px] lg:min-h-[640px] xl:min-h-[700px] flex items-center"
                style={{
                    backgroundImage: `url('${HERO_BACKGROUND_IMAGE}')`,
                    backgroundSize: 'cover',
                }}
            >
                {/* Multi-layer Dark Gradient Overlay */}
                <div className="absolute inset-0 bg-gradient-to-br from-[#0B132B]/95 via-[#1E293B]/85 to-[#0F172A]/90 z-0 pointer-events-none" />

                <div className="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-6 xl:gap-8 items-center">
                        {/* Left Column: Slogan, Typewriter, Description, CTAs */}
                        <div className="lg:col-span-7 text-center lg:text-left space-y-4 sm:space-y-6 z-10">
                            {/* Platform Badge (Persegi) */}
                            <div className="reveal-init reveal-down delay-100 pt-2 sm:pt-4">
                                <div className="inline-flex items-center gap-2 px-3.5 py-1.5 sm:px-4 sm:py-2 rounded-xl bg-[#FF2E3A]/10 border border-[#FF2E3A]/40 text-white text-xs sm:text-sm font-semibold shadow-[0_0_18px_rgba(255,46,58,0.2)] backdrop-blur-md">
                                    <svg className="w-3.5 h-3.5 sm:w-4 sm:h-4 text-[#FF2E3A] shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2l2.4 7.2L22 12l-7.6 2.8L12 22l-2.4-7.2L2 12l7.6-2.8z" />
                                    </svg>
                                    <span>Platform Undangan Digital Modern</span>
                                </div>
                            </div>

                            <h1 className="reveal-init reveal-up delay-250 text-white font-heading font-bold text-2xl sm:text-3xl md:text-4xl lg:text-[36px] xl:text-[42px] 2xl:text-[48px] leading-tight lg:whitespace-nowrap min-h-[3.2rem] sm:min-h-[4rem] lg:min-h-[1.3em]">
                                Bersama dalam Setiap{' '}
                                <span id="typewriter-text" className="text-[#FF2E3A] border-r-2 border-[#FF2E3A] pr-1">
                                    {displayedText}
                                </span>
                            </h1>

                            <p className="reveal-init reveal-up delay-400 font-sans text-slate-300 text-xs sm:text-base lg:text-xl font-normal leading-relaxed max-w-xl mx-auto lg:mx-0">
                                Rayakan momen berharga pernikahan Anda dengan undangan digital eksklusif yang dirancang elegan, interaktif, dan mudah dibagikan kepada keluarga serta kerabat tercinta.
                            </p>

                            <div className="reveal-init reveal-up delay-550 flex flex-row gap-2.5 sm:gap-4 justify-center lg:justify-start pt-1 sm:pt-2">
                                <a
                                    href="/tema"
                                    className="group flex-1 sm:flex-initial px-4 sm:px-8 py-2.5 sm:py-4 rounded-xl text-white text-xs sm:text-base lg:text-lg font-semibold bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-[0_4px_14px_rgba(255,46,58,0.35)] hover:shadow-[0_6px_20px_rgba(255,46,58,0.45)] transition-all duration-300 flex items-center justify-center gap-1.5 sm:gap-2 cursor-pointer text-center"
                                >
                                    <span className="sm:hidden">Lihat Tema</span>
                                    <span className="hidden sm:inline">Lihat Koleksi Tema</span>
                                    <svg className="w-3.5 h-3.5 sm:w-5 sm:h-5 group-hover:translate-x-1 transition-transform shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={1.5}>
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                                <a
                                    href={auth?.user ? '/dashboard' : '/register'}
                                    className="flex-1 sm:flex-initial px-4 sm:px-8 py-2.5 sm:py-4 rounded-xl text-xs sm:text-base lg:text-lg font-semibold border-2 border-white/30 text-white hover:bg-white/10 hover:border-white transition-all duration-300 flex items-center justify-center cursor-pointer text-center whitespace-nowrap"
                                >
                                    <span className="sm:hidden">{auth?.user ? 'Dashboard' : 'Buat Gratis'}</span>
                                    <span className="hidden sm:inline">{auth?.user ? 'Ke Dashboard Saya' : 'Buat Undangan Gratis'}</span>
                                </a>
                            </div>

                            {/* Trust badges */}
                            <div className="reveal-init reveal-up delay-700 pt-2 sm:pt-4 flex flex-wrap items-center justify-center lg:justify-start gap-2.5 sm:gap-6 text-[10px] sm:text-sm text-slate-300">
                                <span className="flex items-center gap-1 font-medium">
                                    <svg className="w-3.5 h-3.5 sm:w-4 sm:h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" strokeWidth={2} viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    20 Pilihan Tema
                                </span>
                                <span className="flex items-center gap-1 font-medium">
                                    <svg className="w-3.5 h-3.5 sm:w-4 sm:h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" strokeWidth={2} viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    RSVP & Lagu
                                </span>
                                <span className="flex items-center gap-1 font-medium">
                                    <svg className="w-3.5 h-3.5 sm:w-4 sm:h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" strokeWidth={2} viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    Amplop Digital
                                </span>
                            </div>
                        </div>

                        {/* Right Column: 3D Dual-Phone Mockup (Official User Asset) - Shifted slightly left for balanced center spacing */}
                        <div className="lg:col-span-5 relative w-full flex items-center justify-center lg:justify-start lg:pl-2 xl:pl-6 z-20 mt-8 lg:mt-4 pt-3 sm:pt-5 lg:pt-7 xl:pt-8">
                            <div className="reveal-init reveal-scale delay-200 relative w-full max-w-[280px] sm:max-w-[330px] md:max-w-[360px] lg:max-w-[375px] xl:max-w-[400px] group">
                                {/* Soft Ambient Radial Glow Behind Phones */}
                                <div className="absolute inset-0 bg-gradient-to-tr from-[#FF2E3A]/25 via-[#DBF6FF]/15 to-amber-500/10 rounded-full blur-3xl -z-10 transform scale-95 pointer-events-none" />

                                {/* Floating 3D Phones Graphic */}
                                <div className="relative animate-float transition-all duration-700 ease-out group-hover:scale-[1.03] group-hover:-translate-y-2">
                                    <a
                                        href="/tema/1/demo"
                                        className="block cursor-pointer focus:outline-none"
                                        title="Buka Demo Undangan SimpulTemu"
                                    >
                                        <img
                                            src="/images/hero-3d-phones.png"
                                            alt="Model 3D Undangan Digital SimpulTemu"
                                            className="w-full h-auto max-h-[380px] sm:max-h-[420px] lg:max-h-[440px] xl:max-h-[460px] object-contain drop-shadow-[0_16px_30px_rgba(0,0,0,0.55)] select-none"
                                            loading="eager"
                                        />
                                    </a>

                                    {/* Interactive Live Demo Floating Badge - Positioned at bottom right of the phones */}
                                    <div className="absolute -bottom-2 sm:-bottom-2.5 right-1 sm:right-3 md:right-4 z-30 pointer-events-auto">
                                        <a
                                            href="/tema/1/demo"
                                            className="inline-flex items-center gap-1.5 sm:gap-2 px-4 sm:px-5 py-2 sm:py-2.5 rounded-full bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-xs sm:text-sm font-bold shadow-[0_8px_20px_rgba(255,46,58,0.45)] hover:shadow-[0_12px_28px_rgba(255,46,58,0.6)] transition-all duration-300 transform hover:scale-105 active:scale-95 cursor-pointer whitespace-nowrap"
                                        >
                                            <svg className="w-3.5 h-3.5 sm:w-4 sm:h-4 shrink-0" fill="currentColor" viewBox="0 0 24 24">
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

                {/* Dual-Layer Curved SVG Shape Divider at Bottom */}
                <div className="absolute bottom-0 left-0 right-0 w-full overflow-hidden leading-none z-20 pointer-events-none">
                    <svg className="relative block w-full h-[60px] md:h-[100px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M0,0 C180,95 380,-30 520,65 C680,165 920,15 1200,45 L1200,120 L0,120 Z" fill="#DBF6FF" opacity="0.3"></path>
                        <path d="M0,35 C320,125 620,15 920,85 C1060,115 1160,65 1200,55 L1200,120 L0,120 Z" fill="#FFFFFF"></path>
                    </svg>
                </div>
            </section>

            {/* Featured Themes Section */}
            <section id="tema-pilihan" className="relative py-24 bg-white border-b border-slate-200 overflow-hidden">
                <SideGeometricMesh hasTopWave={true} />

                <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-16 space-y-3">
                        <span className="reveal-init reveal-down delay-100 inline-block px-4 py-1.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                            Koleksi Desain Pernikahan
                        </span>
                        <h2 className="reveal-init reveal-up delay-250 font-heading text-3xl sm:text-4xl md:text-5xl font-bold text-slate-900">
                            Pilihan Tema <span className="text-[#FF2E3A]">Eksklusif</span>
                        </h2>
                        <p className="reveal-init reveal-up delay-400 text-base sm:text-lg text-slate-600 max-w-2xl mx-auto font-normal">
                            Dirancang khusus dengan estetika modern, sentuhan editorial, dan palet warna romantis untuk hari istimewa Anda.
                        </p>
                    </div>

                    <div className="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-3.5 lg:gap-4 xl:gap-5">
                        {themes.map((theme, index) => {
                            const delayClass = `delay-${100 + (index % 4) * 150}`;
                            return (
                                <div
                                    key={theme.id}
                                    className={`reveal-init reveal-up ${delayClass} bg-white rounded-xl sm:rounded-2xl overflow-hidden shadow-xs hover:shadow-xl border border-slate-200 transform hover:-translate-y-1.5 flex flex-col justify-between group`}
                                >
                                    {/* Top Section with Phone Mockup */}
                                    <div className="p-2 sm:p-2.5 md:p-2.5 lg:p-3 bg-gradient-to-b from-[#F7F4EE] to-[#EBE4D8] flex flex-col items-center justify-center relative overflow-hidden">
                                        {/* Pill badges inside card matching Katalog Tema */}
                                        <div className="w-full flex items-center justify-between mb-1.5 sm:mb-2 z-10">
                                            <span className="px-1.5 sm:px-2 py-0.5 rounded-full text-[8px] sm:text-[9.5px] font-semibold uppercase tracking-wider bg-white/90 backdrop-blur-md text-stone-700 border border-stone-200 shadow-2xs">
                                                {theme.is_premium || theme.tier === 'premium' ? 'Premium' : 'Basic'}
                                            </span>
                                            <span className={`px-1.5 sm:px-2 py-0.5 rounded-full text-[8px] sm:text-[9.5px] font-semibold uppercase tracking-wider shadow-2xs ${
                                                theme.is_premium || theme.tier === 'premium'
                                                    ? 'bg-amber-500 text-stone-950 font-bold'
                                                    : 'bg-emerald-600 text-white'
                                            }`}>
                                                {theme.price > 0 ? `Rp ${theme.price.toLocaleString('id-ID')}` : 'Gratis'}
                                            </span>
                                        </div>

                                        {/* Smartphone Mockup View inside card (Exact replica of live invitation open screen) */}
                                        <ThemePhoneMockup theme={theme} size="catalog" />
                                    </div>

                                    {/* Details & Actions */}
                                    <div className="p-2.5 sm:p-3 md:p-3 lg:p-3.5 flex-1 flex flex-col justify-between space-y-2 sm:space-y-2.5 bg-white">
                                        <div>
                                            <div className="flex items-center justify-between gap-1">
                                                <h3 className="font-heading font-serif text-xs sm:text-sm lg:text-[15px] font-bold text-stone-900 group-hover:text-[#FF2E3A] transition-colors truncate">
                                                    {theme.name}
                                                </h3>
                                                {theme.layout && (
                                                    <span className="text-[7.5px] sm:text-[8.5px] uppercase font-mono px-1.5 py-0.5 rounded bg-stone-100 text-stone-500 shrink-0">
                                                        {theme.layout}
                                                    </span>
                                                )}
                                            </div>
                                            <p className="text-[10px] sm:text-xs text-slate-600 line-clamp-2 mt-1 leading-relaxed">
                                                {theme.description}
                                            </p>
                                        </div>

                                        <div className="pt-2 sm:pt-2.5 border-t border-slate-100 flex items-center justify-between gap-1">
                                            <span className="text-xs sm:text-sm lg:text-base font-bold text-[#FF2E3A]">
                                                {theme.price > 0 ? `Rp ${theme.price.toLocaleString('id-ID')}` : 'Gratis'}
                                            </span>
                                            <a
                                                href={`/tema/${theme.id}`}
                                                className="text-[9.5px] sm:text-xs font-semibold px-2 sm:px-3 py-1 sm:py-1.5 rounded-lg text-[#FF2E3A] bg-[#DBF6FF] hover:bg-[#FF2E3A] hover:text-white border border-[#BAEAF8] transition-all duration-300 cursor-pointer whitespace-nowrap"
                                            >
                                                <span className="sm:hidden">Detail →</span>
                                                <span className="hidden sm:inline">Lihat Detail →</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            );
                        })}
                    </div>

                    <div className="mt-14 text-center">
                        <a
                            href="/tema"
                            className="reveal-init reveal-scale delay-200 inline-block px-10 py-4 rounded-full text-white font-semibold bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 cursor-pointer"
                        >
                            Jelajahi Semua 20 Tema
                        </a>
                    </div>
                </div>
            </section>

            {/* Features Section */}
            <section id="fitur" className="py-12 sm:py-24 bg-[#F8FAFC] border-b border-slate-200">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-8 sm:mb-16 space-y-2 sm:space-y-3">
                        <span className="reveal-init reveal-down delay-100 inline-block px-3 py-1 sm:px-4 sm:py-1.5 rounded-full text-[10px] sm:text-xs font-semibold tracking-wider uppercase bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                            Fitur Terlengkap
                        </span>
                        <h2 className="reveal-init reveal-up delay-250 font-heading text-2xl sm:text-4xl md:text-5xl font-bold text-slate-900">
                            Semua Kebutuhan Acara dalam <span className="text-[#FF2E3A]">Satu Tautan</span>
                        </h2>
                        <p className="reveal-init reveal-up delay-400 text-xs sm:text-lg text-slate-600 max-w-2xl mx-auto font-normal">
                            Dilengkapi beragam fitur modern yang membuat undangan digital Anda terasa interaktif, personal, dan berkesan bagi para tamu.
                        </p>
                    </div>

                    <div className="grid grid-cols-2 gap-2.5 sm:gap-6 md:grid-cols-2 lg:grid-cols-4">
                        {features.map((feature, index) => (
                            <FeatureCard key={index} index={index} {...feature} />
                        ))}
                    </div>
                </div>
            </section>

            {/* Why Choose Us Section */}
            <section id="tentang" className="relative py-12 sm:py-24 bg-white border-b border-slate-200 overflow-hidden">
                <SideGeometricMesh />

                <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-8 sm:mb-16 space-y-2 sm:space-y-3">
                        <span className="reveal-init reveal-down delay-100 inline-block px-3 py-1 sm:px-4 sm:py-1.5 rounded-full text-[10px] sm:text-xs font-semibold tracking-wider uppercase bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                            Keunggulan SimpulTemu
                        </span>
                        <h2 className="reveal-init reveal-up delay-250 font-heading text-2xl sm:text-4xl md:text-5xl font-bold text-slate-900">
                            Mengapa Memilih Kami?
                        </h2>
                    </div>

                    <div className="grid grid-cols-2 md:grid-cols-3 gap-2.5 sm:gap-8">
                        {benefits.map((benefit, index) => {
                            const directionClass = index === 0 ? 'reveal-left delay-150' : index === 1 ? 'reveal-up delay-350' : 'reveal-right delay-550';
                            const spanClass = index === 2 ? 'col-span-2 md:col-span-1' : '';
                            return (
                                <div
                                    key={index}
                                    className={`reveal-init ${directionClass} ${spanClass} bg-white p-3.5 sm:p-8 rounded-xl sm:rounded-3xl text-center border border-slate-200 shadow-xs hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-start`}
                                >
                                    <div className="inline-flex items-center justify-center w-10 h-10 sm:w-16 sm:h-16 rounded-xl sm:rounded-2xl bg-[#DBF6FF] text-[#FF2E3A] mb-2.5 sm:mb-6 border border-[#BAEAF8] shrink-0 [&>svg]:w-5 [&>svg]:h-5 sm:[&>svg]:w-8 sm:[&>svg]:h-8">
                                        {benefit.icon}
                                    </div>
                                    <h3 className="font-heading text-xs sm:text-xl font-bold mb-1 sm:mb-3 text-slate-900">
                                        {benefit.title}
                                    </h3>
                                    <p className="text-slate-600 font-normal leading-relaxed text-[11px] sm:text-base">{benefit.description}</p>
                                </div>
                            );
                        })}
                    </div>
                </div>
            </section>

            {/* CTA Section */}
            <section className="py-14 sm:py-24 bg-gradient-to-b from-[#F8FAFC] to-[#DBF6FF]/30 overflow-hidden">
                <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 sm:space-y-7">
                    <span className="reveal-init reveal-down delay-100 inline-block px-3 py-1 sm:px-4 sm:py-1.5 rounded-full text-[10px] sm:text-xs font-semibold tracking-wider uppercase bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                        Wujudkan Hari Istimewa
                    </span>
                    <h2 className="reveal-init reveal-up delay-250 font-heading text-2xl sm:text-4xl md:text-5xl font-bold text-slate-900 leading-tight">
                        Siap Membagikan Kebahagiaan Anda dengan <span className="text-[#FF2E3A]">Undangan Sempurna?</span>
                    </h2>
                    <p className="reveal-init reveal-up delay-400 text-xs sm:text-lg text-slate-600 font-normal max-w-2xl mx-auto">
                        Mulai sekarang juga. Pilih tema favorit Anda secara gratis, atau upgrade ke tema Premium kapan saja.
                    </p>
                    <div className="reveal-init reveal-scale delay-550 pt-2">
                        <a
                            href={auth?.user ? '/dashboard' : '/register'}
                            className="inline-block px-8 py-3.5 sm:px-12 sm:py-5 rounded-full text-white font-semibold text-sm sm:text-lg bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 cursor-pointer"
                        >
                            {auth?.user ? 'Kelola Undangan di Dashboard' : 'Buat Undangan Sekarang'}
                        </a>
                    </div>
                </div>
            </section>
        </AppLayout>
    );
}

function FeatureCard({ icon, title, index = 0 }) {
    const colIndex = index % 4;
    const rowIndex = Math.floor(index / 4);
    const delayClass = `delay-${100 + colIndex * 150 + rowIndex * 100}`;
    return (
        <div className={`reveal-init reveal-up ${delayClass} p-3 sm:p-6 rounded-xl sm:rounded-2xl bg-white border border-slate-200 hover:border-[#FF2E3A] text-center shadow-xs hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-center`}>
            <div className="inline-flex items-center justify-center w-10 h-10 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl bg-[#DBF6FF] text-[#FF2E3A] mb-2 sm:mb-4 border border-[#BAEAF8] shrink-0 [&>svg]:w-5 [&>svg]:h-5 sm:[&>svg]:w-7 sm:[&>svg]:h-7">
                {icon}
            </div>
            <h3 className="font-heading font-bold text-xs sm:text-base text-slate-900 line-clamp-2">
                {title}
            </h3>
        </div>
    );
}

const features = [
    {
        icon: <svg className="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" strokeWidth={1.5} viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" d="m22 2-7 20-4-9-9-4Z"/><path strokeLinecap="round" strokeLinejoin="round" d="M22 2 11 13"/></svg>,
        title: 'Unlimited Share'
    },
    {
        icon: <svg className="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" strokeWidth={1.5} viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path strokeLinecap="round" strokeLinejoin="round" d="M22 21v-2a4 4 0 0 0-3-3.87"/><path strokeLinecap="round" strokeLinejoin="round" d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>,
        title: 'Custom Nama Tamu'
    },
    {
        icon: <svg className="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" strokeWidth={1.5} viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>,
        title: 'RSVP'
    },
    {
        icon: <svg className="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" strokeWidth={1.5} viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path strokeLinecap="round" strokeLinejoin="round" d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>,
        title: 'Gallery Foto'
    },
    {
        icon: <svg className="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" strokeWidth={1.5} viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>,
        title: 'Countdown'
    },
    {
        icon: <svg className="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" strokeWidth={1.5} viewBox="0 0 24 24"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>,
        title: 'Amplop Digital'
    },
    {
        icon: <svg className="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" strokeWidth={1.5} viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>,
        title: 'Ucapan & Doa'
    },
    {
        icon: <svg className="w-7 h-7 text-[#FF2E3A]" fill="none" stroke="currentColor" strokeWidth={1.5} viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>,
        title: 'Navigasi Maps'
    }
];

const benefits = [
    {
        icon: <svg className="w-8 h-8 text-[#FF2E3A]" fill="none" stroke="currentColor" strokeWidth={1.5} viewBox="0 0 24 24"><line x1="12" x2="12" y1="2" y2="22"/><path strokeLinecap="round" strokeLinejoin="round" d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>,
        title: 'Harga Terjangkau',
        description: 'Dengan harga terjangkau, kamu akan mendapatkan undangan digital premium berkualitas tinggi'
    },
    {
        icon: <svg className="w-8 h-8 text-[#FF2E3A]" fill="none" stroke="currentColor" strokeWidth={1.5} viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path strokeLinecap="round" strokeLinejoin="round" d="M21 3v5h-5"/><path strokeLinecap="round" strokeLinejoin="round" d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path strokeLinecap="round" strokeLinejoin="round" d="M8 16H3v5"/></svg>,
        title: 'Bebas Revisi',
        description: 'Revisi data undangan tanpa batasan dan tanpa biaya tambahan kapan saja'
    },
    {
        icon: <svg className="w-8 h-8 text-[#FF2E3A]" fill="none" stroke="currentColor" strokeWidth={1.5} viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>,
        title: 'Pengerjaan Cepat',
        description: 'Buat undangan dalam hitungan menit secara mandiri tanpa koding'
    }
];

function SideGeometricMesh({ hasTopWave = false }) {
    const topMask = hasTopWave
        ? "linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.05) 30px, rgba(0,0,0,0.5) 80px, black 160px)"
        : "linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.5) 20px, black 60px)";

    return (
        <>
            {/* Left Flank Ornament: Red geometric mesh + ambient glow + smooth gradient blur towards center */}
            <div
                className="absolute top-0 bottom-0 left-0 w-20 sm:w-32 md:w-[28%] lg:w-[32%] xl:w-[35%] max-w-[600px] pointer-events-none z-0 block overflow-hidden"
                style={{
                    WebkitMaskImage: topMask,
                    maskImage: topMask,
                }}
                aria-hidden="true"
            >
                {/* 1. Ambient soft blue blur glow (#0284C7 & #DBF6FF) */}
                <div className="absolute inset-0 bg-gradient-to-r from-[#0284C7]/[0.12] via-[#DBF6FF]/[0.08] to-transparent blur-xl md:blur-2xl" />

                {/* 2. Geometric mesh lattice pattern with smooth horizontal opacity fade */}
                <div
                    className="absolute inset-0"
                    style={{
                        backgroundImage: "url('/images/patterns/blue-geometric-mesh.svg?v=20261121_02')",
                        backgroundRepeat: "repeat",
                        backgroundSize: "52px 52px",
                        WebkitMaskImage: "linear-gradient(to right, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.28) 35%, rgba(0,0,0,0.08) 70%, rgba(0,0,0,0) 95%)",
                        maskImage: "linear-gradient(to right, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.28) 35%, rgba(0,0,0,0.08) 70%, rgba(0,0,0,0) 95%)",
                    }}
                />

                {/* 3. Soft gradient blur layer that diffuses the pattern towards the center */}
                <div
                    className="absolute inset-0 backdrop-blur-[2px] md:backdrop-blur-[3px]"
                    style={{
                        WebkitMaskImage: "linear-gradient(to right, transparent 20%, rgba(0,0,0,0.5) 55%, black 90%)",
                        maskImage: "linear-gradient(to right, transparent 20%, rgba(0,0,0,0.5) 55%, black 90%)",
                    }}
                />

                {/* 4. Top wave soft blur diffuser to seamlessly melt into the wave */}
                {hasTopWave && (
                    <div
                        className="absolute top-0 left-0 right-0 h-32 md:h-48 backdrop-blur-[2px] md:backdrop-blur-[3px]"
                        style={{
                            WebkitMaskImage: "linear-gradient(to bottom, black 0%, rgba(0,0,0,0.6) 40%, transparent 100%)",
                            maskImage: "linear-gradient(to bottom, black 0%, rgba(0,0,0,0.6) 40%, transparent 100%)",
                        }}
                    />
                )}
            </div>

            {/* Right Flank Ornament: Red geometric mesh + ambient glow + smooth gradient blur towards center */}
            <div
                className="absolute top-0 bottom-0 right-0 w-20 sm:w-32 md:w-[28%] lg:w-[32%] xl:w-[35%] max-w-[600px] pointer-events-none z-0 block overflow-hidden"
                style={{
                    WebkitMaskImage: topMask,
                    maskImage: topMask,
                }}
                aria-hidden="true"
            >
                {/* 1. Ambient soft blue blur glow (#0284C7 & #DBF6FF) */}
                <div className="absolute inset-0 bg-gradient-to-l from-[#0284C7]/[0.12] via-[#DBF6FF]/[0.08] to-transparent blur-xl md:blur-2xl" />

                {/* 2. Geometric mesh lattice pattern with smooth horizontal opacity fade */}
                <div
                    className="absolute inset-0"
                    style={{
                        backgroundImage: "url('/images/patterns/blue-geometric-mesh.svg?v=20261121_02')",
                        backgroundRepeat: "repeat",
                        backgroundSize: "52px 52px",
                        WebkitMaskImage: "linear-gradient(to left, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.28) 35%, rgba(0,0,0,0.08) 70%, rgba(0,0,0,0) 95%)",
                        maskImage: "linear-gradient(to left, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.28) 35%, rgba(0,0,0,0.08) 70%, rgba(0,0,0,0) 95%)",
                    }}
                />

                {/* 3. Soft gradient blur layer that diffuses the pattern towards the center */}
                <div
                    className="absolute inset-0 backdrop-blur-[2px] md:backdrop-blur-[3px]"
                    style={{
                        WebkitMaskImage: "linear-gradient(to left, transparent 20%, rgba(0,0,0,0.5) 55%, black 90%)",
                        maskImage: "linear-gradient(to left, transparent 20%, rgba(0,0,0,0.5) 55%, black 90%)",
                    }}
                />

                {/* 4. Top wave soft blur diffuser to seamlessly melt into the wave */}
                {hasTopWave && (
                    <div
                        className="absolute top-0 left-0 right-0 h-32 md:h-48 backdrop-blur-[2px] md:backdrop-blur-[3px]"
                        style={{
                            WebkitMaskImage: "linear-gradient(to bottom, black 0%, rgba(0,0,0,0.6) 40%, transparent 100%)",
                            maskImage: "linear-gradient(to bottom, black 0%, rgba(0,0,0,0.6) 40%, transparent 100%)",
                        }}
                    />
                )}
            </div>
        </>
    );
}
