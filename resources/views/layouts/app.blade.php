<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Simpultemu - Buat Undangan Pernikahan Digital Praktis & Modern')</title>
    <meta name="description" content="@yield('description', 'Wujudkan undangan pernikahan digital impian dalam hitungan menit. Lengkap dengan fitur RSVP, musik latar, galeri foto, peta lokasi, dan amplop digital. Mulai buat undanganmu sekarang di Simpultemu.')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="SimpulTemu">
    <meta property="og:title" content="@yield('og_title', 'Simpultemu - Undangan Pernikahan Digital Praktis & Modern')">
    <meta property="og:description" content="@yield('og_description', 'Wujudkan undangan pernikahan digital impian dalam hitungan menit. Lengkap dengan fitur RSVP, musik latar, galeri foto, peta lokasi, dan amplop digital.')">
    <meta property="og:image" content="@yield('og_image', asset('images/hero-banner.png'))">
    <meta name="google-site-verification" content="GJrrJ1i_rESYWb1Krvsk2_19S31ZWjguQMfWMImE_gU" />
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Simpultemu - Undangan Pernikahan Digital Praktis & Modern')">
    <meta name="twitter:description" content="@yield('og_description', 'Wujudkan undangan pernikahan digital impian dalam hitungan menit. Lengkap dengan fitur RSVP, musik latar, galeri foto, peta lokasi, dan amplop digital.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/hero-banner.png'))">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Great+Vibes&family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Cormorant+Garamond:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo-icon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="antialiased bg-[#F8FAFC] text-slate-800 font-sans selection:bg-[#DBF6FF] selection:text-[#FF2E3A] min-h-screen flex flex-col justify-between">
    <!-- Floating Glassmorphism Navbar (Compact & Sleek) -->
    <header class="fixed top-2 sm:top-3 inset-x-0 z-50 px-3 sm:px-6 lg:px-8 pointer-events-none transition-all duration-300">
        <nav class="max-w-7xl mx-auto pointer-events-auto bg-white/90 backdrop-blur-xl border border-white/70 shadow-[0_8px_30px_rgba(15,23,42,0.08),0_1px_3px_rgba(0,0,0,0.04)] rounded-2xl sm:rounded-full px-3.5 sm:px-5 py-1.5 transition-all duration-300">
            <div class="flex justify-between items-center h-8 sm:h-9">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center focus:outline-none transition-transform duration-300 hover:scale-[1.02]" aria-label="SimpulTemu Beranda">
                            <img src="{{ asset('images/logo/logo-simpultemu.png') }}" alt="SimpulTemu" class="h-6.5 sm:h-7.5 w-auto object-contain">
                        </a>
                    </div>
                    <div class="hidden md:ml-6 lg:ml-8 md:flex items-center space-x-1 lg:space-x-1.5">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-2.5 lg:px-3 py-1 rounded-full text-xs lg:text-[13px] font-medium transition-all duration-200 {{ request()->routeIs('home') ? 'text-[#FF2E3A] bg-[#FF2E3A]/10 font-semibold shadow-2xs' : 'text-slate-700 hover:text-[#FF2E3A] hover:bg-slate-100/70' }}">
                            Beranda
                        </a>
                        <a href="{{ route('themes.index') }}" class="inline-flex items-center px-2.5 lg:px-3 py-1 rounded-full text-xs lg:text-[13px] font-medium transition-all duration-200 {{ request()->routeIs('themes.*') ? 'text-[#FF2E3A] bg-[#FF2E3A]/10 font-semibold shadow-2xs' : 'text-slate-700 hover:text-[#FF2E3A] hover:bg-slate-100/70' }}">
                            Katalog Tema
                        </a>
                        <a href="{{ route('pricing') }}" class="inline-flex items-center px-2.5 lg:px-3 py-1 rounded-full text-xs lg:text-[13px] font-medium transition-all duration-200 {{ request()->routeIs('pricing') ? 'text-[#FF2E3A] bg-[#FF2E3A]/10 font-semibold shadow-2xs' : 'text-slate-700 hover:text-[#FF2E3A] hover:bg-slate-100/70' }}">
                            Harga
                        </a>
                        <a href="{{ route('how-it-works') }}" class="inline-flex items-center px-2.5 lg:px-3 py-1 rounded-full text-xs lg:text-[13px] font-medium transition-all duration-200 {{ request()->routeIs('how-it-works') ? 'text-[#FF2E3A] bg-[#FF2E3A]/10 font-semibold shadow-2xs' : 'text-slate-700 hover:text-[#FF2E3A] hover:bg-slate-100/70' }}">
                            Cara Kerja
                        </a>
                        <a href="{{ route('faq') }}" class="inline-flex items-center px-2.5 lg:px-3 py-1 rounded-full text-xs lg:text-[13px] font-medium transition-all duration-200 {{ request()->routeIs('faq') ? 'text-[#FF2E3A] bg-[#FF2E3A]/10 font-semibold shadow-2xs' : 'text-slate-700 hover:text-[#FF2E3A] hover:bg-slate-100/70' }}">
                            FAQ
                        </a>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-2.5 lg:space-x-3.5">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-slate-600 hover:text-[#FF2E3A] text-xs lg:text-[13px] font-medium px-2.5 py-1 rounded-full hover:bg-slate-100/70 transition-all duration-200 cursor-pointer">Logout</button>
                        </form>
                        <a href="{{ route('dashboard') }}" class="px-4 lg:px-4.5 py-1.5 rounded-full text-white text-xs lg:text-[13px] font-semibold transition-all duration-300 bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:shadow-[0_6px_20px_rgba(255,46,58,0.35)] transform hover:-translate-y-0.5">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-slate-600 hover:text-[#FF2E3A] text-xs lg:text-[13px] font-medium px-2.5 py-1 rounded-full hover:bg-slate-100/70 transition-all duration-200">Login</a>
                        <a href="{{ route('register') }}" class="px-4 lg:px-4.5 py-1.5 rounded-full text-white text-xs lg:text-[13px] font-semibold transition-all duration-300 bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:shadow-[0_6px_20px_rgba(255,46,58,0.35)] transform hover:-translate-y-0.5">
                            Daftar Sekarang
                        </a>
                    @endauth
                </div>
                <div class="flex items-center md:hidden">
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-1.5 rounded-full text-slate-700 hover:text-[#FF2E3A] hover:bg-slate-100/80 focus:outline-none transition-all duration-200" aria-label="Toggle menu">
                        <svg class="hamburger-icon h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="close-icon hidden h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </nav>
        <div class="mobile-menu hidden md:hidden mt-2 max-w-7xl mx-auto pointer-events-auto bg-white/95 backdrop-blur-2xl border border-slate-200/80 shadow-[0_12px_36px_rgba(0,0,0,0.12)] rounded-2xl p-3 sm:p-4 space-y-2 transition-all duration-300">
            <div class="space-y-1">
                <a href="{{ route('home') }}" class="block px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('home') ? 'bg-[#FF2E3A]/10 text-[#FF2E3A] font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">Beranda</a>
                <a href="{{ route('themes.index') }}" class="block px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('themes.*') ? 'bg-[#FF2E3A]/10 text-[#FF2E3A] font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">Katalog Tema</a>
                <a href="{{ route('pricing') }}" class="block px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('pricing') ? 'bg-[#FF2E3A]/10 text-[#FF2E3A] font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">Harga</a>
                <a href="{{ route('how-it-works') }}" class="block px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('how-it-works') ? 'bg-[#FF2E3A]/10 text-[#FF2E3A] font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">Cara Kerja</a>
                <a href="{{ route('faq') }}" class="block px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('faq') ? 'bg-[#FF2E3A]/10 text-[#FF2E3A] font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">FAQ</a>
            </div>
            <div class="pt-3 mt-2 border-t border-slate-100 space-y-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="block text-center px-4 py-2.5 rounded-full text-sm font-semibold text-white bg-[#FF2E3A] hover:bg-[#E01E2A] transition-all duration-300 shadow-[0_4px_14px_rgba(255,46,58,0.25)]">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-center px-3 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-[#FF2E3A] hover:bg-slate-50 transition-all duration-300 cursor-pointer">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block text-center px-3 py-2 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-50 transition-all duration-300">Login</a>
                    <a href="{{ route('register') }}" class="block text-center px-4 py-2.5 rounded-full text-sm font-semibold text-white bg-[#FF2E3A] hover:bg-[#E01E2A] transition-all duration-300 shadow-[0_4px_14px_rgba(255,46,58,0.25)]">Daftar Sekarang</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-grow {{ request()->routeIs('home', 'login', 'register', 'themes.*', 'pricing', 'how-it-works', 'faq', 'about') ? '' : 'pt-16 sm:pt-20' }}">
        @yield('content')
    </main>

    <footer class="text-slate-300 bg-[#0F172A] border-t border-slate-800">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div class="reveal-init reveal-up delay-100 space-y-4">
                    <a href="{{ route('home') }}" class="inline-block focus:outline-none transition-transform duration-300 hover:scale-[1.02]" aria-label="SimpulTemu Beranda">
                        <img src="{{ asset('images/logo/logo-simpultemu-dark.png') }}" alt="SimpulTemu" class="h-10 sm:h-11 w-auto object-contain">
                    </a>
                    <p class="text-sm text-slate-400 font-normal leading-relaxed">
                        Platform undangan digital pernikahan yang modern, berkelas, dan personal. Mengabadikan cinta dalam satu tautan berharga.
                    </p>
                    <div class="pt-2 text-xs text-[#DBF6FF] font-medium">
                        "Bersama dalam Setiap Momen"
                    </div>
                    <div class="flex items-center gap-3 pt-1">
                        <a href="https://instagram.com/simpultemu.my.id" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-[#FF2E3A] text-slate-300 hover:text-white flex items-center justify-center transition-all duration-300" title="Instagram @simpultemu.my.id">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="https://wa.me/6285113272182" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-[#25D366] text-slate-300 hover:text-white flex items-center justify-center transition-all duration-300" title="WhatsApp 085113272182">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>
                        <a href="mailto:simpultemu2026@gmail.com" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-[#FF2E3A] text-slate-300 hover:text-white flex items-center justify-center transition-all duration-300" title="Email simpultemu2026@gmail.com">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </a>
                    </div>
                </div>
                <div class="reveal-init reveal-up delay-250">
                    <h4 class="font-heading text-base font-semibold text-white mb-4 tracking-wide">Koleksi Desain</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('themes.index') }}" class="hover:text-[#DBF6FF] transition-all duration-300">Katalog Tema Basic & Premium</a></li>
                        <li><a href="{{ route('pricing') }}" class="hover:text-[#DBF6FF] transition-all duration-300">Paket & Harga</a></li>
                    </ul>
                </div>
                <div class="reveal-init reveal-up delay-400">
                    <h4 class="font-heading text-base font-semibold text-white mb-4 tracking-wide">Pusat Bantuan</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('how-it-works') }}" class="hover:text-[#DBF6FF] transition-all duration-300">Alur Cara Kerja</a></li>
                        <li><a href="{{ route('faq') }}" class="hover:text-[#DBF6FF] transition-all duration-300">Tanya Jawab (FAQ)</a></li>
                    </ul>
                </div>
                <div class="reveal-init reveal-up delay-550">
                    <h4 class="font-heading text-base font-semibold text-white mb-4 tracking-wide">Tentang & Kontak</h4>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <a href="{{ route('about') }}" class="hover:text-[#DBF6FF] transition-all duration-300">Visi & Cerita Kami</a>
                        </li>
                        <li>
                            <a href="mailto:simpultemu2026@gmail.com" class="hover:text-[#DBF6FF] transition-all duration-300 flex items-center gap-2 group">
                                <svg class="w-4 h-4 text-[#FF2E3A] group-hover:scale-110 transition-transform shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="truncate">simpultemu2026@gmail.com</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/simpultemu.my.id" target="_blank" rel="noopener noreferrer" class="hover:text-[#DBF6FF] transition-all duration-300 flex items-center gap-2 group">
                                <svg class="w-4 h-4 text-[#FF2E3A] group-hover:scale-110 transition-transform shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                                <span>simpultemu.my.id</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/6285113272182" target="_blank" rel="noopener noreferrer" class="hover:text-[#DBF6FF] transition-all duration-300 flex items-center gap-2 group">
                                <svg class="w-4 h-4 text-[#25D366] group-hover:scale-110 transition-transform shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span>085113272182</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="reveal-init reveal-up delay-700 mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400 gap-4">
                <p>&copy; {{ date('Y') }} SimpulTemu Wedding. Hak Cipta Dilindungi.</p>
                <div class="flex items-center gap-6 text-slate-400">
                    <span>Eksklusif & Modern</span>
                    <span>•</span>
                    <span>Ramah Mobile</span>
                    <span>•</span>
                    <span>RSVP Terintegrasi</span>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const menuBtn = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');
        const hamburgerIcon = document.querySelector('.hamburger-icon');
        const closeIcon = document.querySelector('.close-icon');

        menuBtn?.addEventListener('click', function() {
            mobileMenu?.classList.toggle('hidden');
            hamburgerIcon?.classList.toggle('hidden');
            closeIcon?.classList.toggle('hidden');
        });

        // Universal Scroll Reveal Engine (Silky Smooth)
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver(function(entries, obs) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal-active');
                        obs.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px 0px -50px 0px',
                threshold: 0.05
            });

            document.querySelectorAll('.reveal-init').forEach(function(el) {
                observer.observe(el);
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
