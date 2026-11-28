@extends('layouts.app')

@section('title', 'Harga & Paket Undangan Pernikahan Digital Gratis hingga Premium - SimpulTemu')
@section('description', 'Buat undangan pernikahan digital gratis khusus undangan pertama dengan 10 tema Basic (5 tamu & 5 lagu). Undangan kedua dan seterusnya Rp10.000/undangan, Add-On mulai Rp17.000, atau Premium Rp59.000 per undangan.')
@section('keywords', 'harga undangan pernikahan digital, undangan pernikahan online gratis, paket undangan digital murah, undangan nikah sekali bayar, buat undangan online gratis, simpultemu')

@section('content')
<div class="relative pt-24 sm:pt-32 pb-10 sm:pb-16 md:pb-20 min-h-screen overflow-hidden" style="background-color: #F2FBFF;">
    @include('partials.light-blue-square-grid')

    <div class="relative z-10 max-w-7xl mx-auto px-3.5 sm:px-6 lg:px-8">
        
        <!-- Brand Header Section -->
        <div class="text-center max-w-3xl sm:max-w-4xl mx-auto space-y-3 sm:space-y-4">
            <!-- Modern Pill Badge -->
            <div class="inline-flex items-center gap-1.5 px-3.5 sm:px-4 py-1 sm:py-1.5 rounded-full bg-[#DBF6FF] text-[#0284C7] text-[10px] sm:text-xs font-bold tracking-wider uppercase shadow-2xs">
                <svg class="w-3.5 h-3.5 text-[#0284C7]" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                <span>PILIHAN PAKET &amp; INVESTASI</span>
            </div>
            
            <!-- Headline Title -->
            <h1 class="font-heading text-3xl sm:text-5xl lg:text-5xl xl:text-6xl font-extrabold tracking-tight leading-tight" style="color: #162E54;">
                Pilih Paket Yang Sesuai Dengan <span class="text-[#FF2E3A]">Kebutuhanmu</span>
            </h1>
            
            <!-- Subtitle -->
            <p class="font-sans text-slate-600 text-xs sm:text-base md:text-lg font-normal max-w-xl mx-auto leading-relaxed">
                Buat undangan lebih lengkap, semakin berkesan. Akses selamanya tanpa biaya langganan bulanan.
            </p>
        </div>

        <!-- 4 Columns Pricing Cards Grid: 2 Kolom di Smartphone (grid-cols-2), 4 Kolom di Desktop (lg:grid-cols-4) -->
        <div class="mt-8 sm:mt-12 lg:mt-14 grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5 lg:gap-6 items-stretch">
            
            <!-- CARD 1: Basic (Gratis) -->
            <div class="relative bg-white border border-slate-200/90 hover:border-slate-300 rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 lg:p-7 flex flex-col justify-between shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-md transition-all duration-300">
                <div class="space-y-4 sm:space-y-5">
                    <!-- Icon: Undangan Pernikahan / Surat Cinta -->
                    <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 rounded-xl sm:rounded-2xl bg-rose-50 border border-rose-100 flex items-center justify-center text-[#FF2E3A] shadow-xs">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                        </svg>
                    </div>

                    <!-- Title & Price -->
                    <div>
                        <h3 class="text-sm sm:text-lg lg:text-xl font-bold sm:font-extrabold text-slate-900 leading-tight">
                            Basic
                        </h3>
                        <div class="mt-1.5 sm:mt-2.5">
                            <span class="font-serif text-xl sm:text-3xl lg:text-4xl font-extrabold text-[#FF2E3A]">Gratis</span>
                        </div>
                        <p class="text-[10px] sm:text-xs font-semibold text-amber-700 mt-0.5">Khusus 1 undangan pertama per akun</p>
                    </div>

                    <!-- Features List -->
                    <div class="border-t border-slate-100 pt-3 sm:pt-4">
                        <ul class="space-y-2 sm:space-y-3 text-[11px] sm:text-xs lg:text-sm font-medium text-slate-700">
                            <li class="flex items-start gap-1.5 sm:gap-2.5">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-[#FF2E3A] text-white flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span><strong>1 Undangan</strong> (Khusus Undangan Pertama)</span>
                            </li>
                            <li class="flex items-start gap-1.5 sm:gap-2.5">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-[#FF2E3A] text-white flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>5 Nama Tamu</span>
                            </li>
                            <li class="flex items-start gap-1.5 sm:gap-2.5">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-[#FF2E3A] text-white flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>5 Pilihan Lagu</span>
                            </li>
                            <li class="flex items-start gap-1.5 sm:gap-2.5 text-slate-600">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>10 Tema Basic Estetik</span>
                            </li>
                        </ul>
                        <p class="mt-3 p-2 rounded-xl bg-amber-50 border border-amber-200/80 text-[10px] sm:text-[11px] text-amber-900 leading-relaxed">
                            Undangan ke-2 &amp; seterusnya: <strong>Rp10.000/undangan</strong>. Tidak ada gratis ulang meski undangan pertama dihapus.
                        </p>
                    </div>
                </div>

                <!-- Action Button: Menuju Halaman Register / Login -->
                <div class="mt-5 sm:mt-8 pt-2">
                    <a href="{{ auth()->check() ? route('dashboard.invitations.create') : route('register') }}" 
                       class="block w-full py-2 sm:py-2.5 lg:py-3 px-2 sm:px-4 rounded-xl sm:rounded-full border-2 border-[#FF2E3A] text-[#FF2E3A] hover:bg-[#FF2E3A] hover:text-white font-bold text-[11px] sm:text-xs lg:text-sm text-center transition-all duration-300 shadow-2xs">
                        Mulai Sekarang &rarr;
                    </a>
                </div>
            </div>

            <!-- CARD 2: Add-On Paket Basic 1 (Rp17.000) -->
            <div class="relative bg-white border border-slate-200/90 hover:border-slate-300 rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 lg:p-7 flex flex-col justify-between shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-md transition-all duration-300">
                <div class="space-y-4 sm:space-y-5">
                    <!-- Icon: Tambah Tamu (User Group Plus) -->
                    <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 rounded-xl sm:rounded-2xl bg-rose-50 border border-rose-100 flex items-center justify-center text-[#FF2E3A] shadow-xs">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.765z"/>
                        </svg>
                    </div>

                    <!-- Title & Price -->
                    <div>
                        <h3 class="text-sm sm:text-lg lg:text-xl font-bold sm:font-extrabold text-slate-900 leading-tight">
                            Add-On Paket<br class="hidden sm:inline"> Basic 1
                        </h3>
                        <div class="mt-1.5 sm:mt-2.5">
                            <span class="font-serif text-xl sm:text-3xl lg:text-4xl font-extrabold text-[#FF2E3A]">Rp17.000</span>
                        </div>
                        <p class="text-[10px] sm:text-xs text-slate-400 mt-0.5">Sekali bayar</p>
                    </div>

                    <!-- Features List -->
                    <div class="border-t border-slate-100 pt-3 sm:pt-4">
                        <ul class="space-y-2 sm:space-y-3 text-[11px] sm:text-xs lg:text-sm font-medium text-slate-700">
                            <li class="flex items-start gap-1.5 sm:gap-2.5">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-[#FF2E3A] text-white flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Tambahan 7 Nama Tamu<br><strong class="text-slate-900 font-bold">Total 12 Nama Tamu</strong></span>
                            </li>
                            <li class="flex items-start gap-1.5 sm:gap-2.5">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-[#FF2E3A] text-white flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Tambahan 5 Lagu<br><strong class="text-slate-900 font-bold">Total 10 Lagu</strong></span>
                            </li>
                            <li class="flex items-start gap-1.5 sm:gap-2.5 text-slate-500">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Berlaku untuk satu undangan</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Action Button: Menuju Halaman Register / Login -->
                <div class="mt-5 sm:mt-8 pt-2">
                    <a href="{{ auth()->check() ? route('dashboard.invitations.create') : route('register') }}" 
                       class="block w-full py-2 sm:py-2.5 lg:py-3 px-2 sm:px-4 rounded-xl sm:rounded-full border-2 border-[#FF2E3A] text-[#FF2E3A] hover:bg-[#FF2E3A] hover:text-white font-bold text-[11px] sm:text-xs lg:text-sm text-center transition-all duration-300 shadow-2xs">
                        Dapatkan Sekarang &rarr;
                    </a>
                </div>
            </div>

            <!-- CARD 3: Add-On Paket Basic 2 (Rp25.000) -->
            <div class="relative bg-white border border-slate-200/90 hover:border-slate-300 rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 lg:p-7 flex flex-col justify-between shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-md transition-all duration-300">
                <div class="space-y-4 sm:space-y-5">
                    <!-- Icon: Playlist Lagu & Audio Harmoni -->
                    <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 rounded-xl sm:rounded-2xl bg-rose-50 border border-rose-100 flex items-center justify-center text-[#FF2E3A] shadow-xs">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12 0c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                        </svg>
                    </div>

                    <!-- Title & Price -->
                    <div>
                        <h3 class="text-sm sm:text-lg lg:text-xl font-bold sm:font-extrabold text-slate-900 leading-tight">
                            Add-On Paket<br class="hidden sm:inline"> Basic 2
                        </h3>
                        <div class="mt-1.5 sm:mt-2.5">
                            <span class="font-serif text-xl sm:text-3xl lg:text-4xl font-extrabold text-[#FF2E3A]">Rp25.000</span>
                        </div>
                        <p class="text-[10px] sm:text-xs text-slate-400 mt-0.5">Sekali bayar</p>
                    </div>

                    <!-- Features List -->
                    <div class="border-t border-slate-100 pt-3 sm:pt-4">
                        <ul class="space-y-2 sm:space-y-3 text-[11px] sm:text-xs lg:text-sm font-medium text-slate-700">
                            <li class="flex items-start gap-1.5 sm:gap-2.5">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-[#FF2E3A] text-white flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Tambahan 12 Nama Tamu<br><strong class="text-slate-900 font-bold">Total 17 Tamu</strong></span>
                            </li>
                            <li class="flex items-start gap-1.5 sm:gap-2.5">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-[#FF2E3A] text-white flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Akses 20 Lagu<br><strong class="text-slate-900 font-bold">Total 20 Lagu</strong></span>
                            </li>
                            <li class="flex items-start gap-1.5 sm:gap-2.5 text-slate-500">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Berlaku untuk satu undangan</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Action Button: Menuju Halaman Register / Login -->
                <div class="mt-5 sm:mt-8 pt-2">
                    <a href="{{ auth()->check() ? route('dashboard.invitations.create') : route('register') }}" 
                       class="block w-full py-2 sm:py-2.5 lg:py-3 px-2 sm:px-4 rounded-xl sm:rounded-full border-2 border-[#FF2E3A] text-[#FF2E3A] hover:bg-[#FF2E3A] hover:text-white font-bold text-[11px] sm:text-xs lg:text-sm text-center transition-all duration-300 shadow-2xs">
                        Dapatkan Sekarang &rarr;
                    </a>
                </div>
            </div>

            <!-- CARD 4: Premium (Rp59.000) - RED CARD -->
            <div class="relative bg-[#FF2E3A] text-white rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 lg:p-7 flex flex-col justify-between shadow-[0_10px_30px_rgba(255,46,58,0.35)] hover:shadow-[0_15px_35px_rgba(255,46,58,0.45)] transition-all duration-300 ring-2 ring-[#FF2E3A]">
                <div class="space-y-4 sm:space-y-5">
                    <!-- Icon: Mahkota Royal VIP (Crown) -->
                    <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 rounded-xl sm:rounded-2xl bg-white/20 border border-white/30 backdrop-blur-xs flex items-center justify-center text-white shadow-xs">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-7 lg:h-7 fill-current" viewBox="0 0 24 24">
                            <path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/>
                        </svg>
                    </div>

                    <!-- Title & Price -->
                    <div>
                        <h3 class="text-sm sm:text-lg lg:text-xl font-bold sm:font-extrabold text-white leading-tight">
                            Premium
                        </h3>
                        <div class="mt-1.5 sm:mt-2.5">
                            <span class="font-serif text-xl sm:text-3xl lg:text-4xl font-extrabold text-white">Rp59.000</span>
                        </div>
                        <p class="text-[10px] sm:text-xs text-white/85 mt-0.5">Berlaku untuk satu undangan</p>
                    </div>

                    <!-- Features List -->
                    <div class="border-t border-white/20 pt-3 sm:pt-4">
                        <ul class="space-y-2 sm:space-y-3 text-[11px] sm:text-xs lg:text-sm font-semibold text-white">
                            <li class="flex items-start gap-1.5 sm:gap-2.5">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Nama Tamu Tak Terbatas</span>
                            </li>
                            <li class="flex items-start gap-1.5 sm:gap-2.5">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Lagu Tak Terbatas</span>
                            </li>
                            <li class="flex items-start gap-1.5 sm:gap-2.5 text-white/95">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Buka Seluruh 20 Tema Eksklusif</span>
                            </li>
                            <li class="flex items-start gap-1.5 sm:gap-2.5 text-white/95">
                                <span class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Akses Seluruh Fitur Premium</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Action Button: Menuju Halaman Register / Login -->
                <div class="mt-5 sm:mt-8 pt-2">
                    <a href="{{ auth()->check() ? route('dashboard.invitations.create') : route('register') }}" 
                       class="block w-full py-2 sm:py-2.5 lg:py-3 px-2 sm:px-4 rounded-xl sm:rounded-full bg-white hover:bg-slate-50 text-[#FF2E3A] font-extrabold text-[11px] sm:text-xs lg:text-sm text-center transition-all duration-300 shadow-lg">
                        Dapatkan Sekarang &rarr;
                    </a>
                </div>
            </div>

        </div>

        <!-- Info Banner: Pembuatan Undangan Kedua & Seterusnya (Rp10.000 / undangan) -->
        <div class="mt-6 sm:mt-8 bg-white border border-[#BAEAF8] rounded-2xl sm:rounded-3xl p-5 sm:p-7 shadow-[0_4px_20px_rgba(2,132,199,0.06)] flex flex-col lg:flex-row lg:items-center justify-between gap-5">
            <div class="space-y-2.5 max-w-3xl">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="px-3 py-0.5 rounded-full text-[10px] sm:text-xs font-bold uppercase tracking-wider bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                        Undangan Kedua &amp; Seterusnya
                    </span>
                    <span class="text-xs sm:text-sm font-extrabold text-[#FF2E3A]">Rp10.000 / undangan</span>
                </div>
                <h2 class="font-heading text-lg sm:text-2xl font-bold text-slate-900">
                    Butuh Membuat Lebih dari 1 Undangan dalam Satu Akun?
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Paket Basic gratis hanya berlaku untuk <strong>1 undangan pertama</strong> setiap akun (tidak ada gratis ulang meskipun undangan sebelumnya dihapus). Untuk pembuatan undangan kedua dan seterusnya, cukup bayar <strong>Rp10.000 per undangan</strong> untuk mendapatkan <strong>1 undangan baru</strong> dengan fasilitas <strong>5 Nama Tamu</strong>, <strong>5 Pilihan Lagu</strong>, dan akses <strong>10 Tema Basic</strong>.
                </p>
                <p class="text-[11px] sm:text-xs text-slate-500">
                    Catatan: Paket Add-On dan Premium berlaku khusus untuk undangan yang dibeli saja, tidak berlaku untuk undangan lainnya.
                </p>
            </div>
            <div class="shrink-0">
                @auth
                    @if(auth()->user()->canStartNewInvitation())
                        <a href="{{ route('dashboard.invitations.create') }}" class="inline-flex items-center justify-center w-full lg:w-auto px-6 py-3 rounded-xl bg-[#FF2E3A] hover:bg-[#E01E2A] text-white font-bold text-xs sm:text-sm shadow-sm transition">
                            Buat Undangan Sekarang &rarr;
                        </a>
                    @else
                        <button type="button" onclick="openNewInvitationModal()" class="inline-flex items-center justify-center w-full lg:w-auto px-6 py-3 rounded-xl bg-[#FF2E3A] hover:bg-[#E01E2A] text-white font-bold text-xs sm:text-sm shadow-sm transition cursor-pointer">
                            Beli Slot Undangan Baru (Rp10.000) &rarr;
                        </button>
                    @endif
                @else
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center w-full lg:w-auto px-6 py-3 rounded-xl bg-[#FF2E3A] hover:bg-[#E01E2A] text-white font-bold text-xs sm:text-sm shadow-sm transition">
                        Daftar &amp; Buat Undangan &rarr;
                    </a>
                @endauth
            </div>
        </div>

        <!-- Login Prompt & FAQ Footer -->
        <div class="mt-10 sm:mt-16 text-center space-y-2">
            @guest
            <p class="text-xs sm:text-sm text-slate-600">
                Sudah memiliki akun SimpulTemu? <a href="{{ route('login') }}" class="font-bold text-[#FF2E3A] hover:underline">Masuk ke Akun di Sini &rarr;</a>
            </p>
            @endguest
            <p class="text-xs sm:text-sm text-slate-500">
                Ada pertanyaan seputar paket atau fitur undangan? <a href="{{ route('faq') }}" class="font-bold text-[#FF2E3A] hover:underline">Baca FAQ Kami</a>
            </p>
        </div>
    </div>
</div>

@include('partials.upgrade-modal')
@include('partials.new-invitation-modal')
@endsection
