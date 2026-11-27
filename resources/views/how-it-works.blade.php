@extends('layouts.app')

@section('title', 'Cara Membuat Undangan Pernikahan Digital Praktis 6 Langkah - SimpulTemu')
@section('description', 'Panduan cara membuat undangan pernikahan digital online dalam hitungan menit: pilih tema, isi data mempelai & acara, unggah foto & musik, lalu bagikan link personal ke tamu via WhatsApp.')
@section('keywords', 'cara membuat undangan pernikahan digital, tutorial buat undangan online gratis, langkah membuat undangan nikah digital, sebar undangan whatsapp, simpultemu')

@section('content')
<div class="relative pt-24 sm:pt-32 pb-16 sm:pb-24 bg-[#F8FAFC] min-h-screen overflow-hidden">
    @include('partials.side-diamond-ornament')

    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-14 space-y-4">
            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-semibold tracking-widest uppercase bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                Alur Praktis 6 Langkah
            </span>
            <h1 class="font-serif text-3xl sm:text-5xl font-bold text-slate-900 tracking-tight">
                Cara Kerja Membuat <span class="italic text-[#FF2E3A]">Undangan Impian</span>
            </h1>
            <p class="font-sans text-slate-600 text-base sm:text-lg font-light leading-relaxed max-w-2xl mx-auto">
                Tanpa ribet instal aplikasi, tanpa koding. Wujudkan undangan pernikahan digital elegan yang siap dibagikan dalam 6 langkah terstruktur.
            </p>
        </div>

        <!-- Horizontal Step Indicator (Desktop & Tablet) -->
        <div class="mb-14 hidden md:block">
            <div class="relative flex items-center justify-between">
                <div class="absolute top-1/2 left-8 right-8 -translate-y-1/2 h-0.5 bg-slate-200 -z-0"></div>
                <div class="absolute top-1/2 left-8 right-8 -translate-y-1/2 h-0.5 bg-[#FF2E3A] -z-0"></div>

                @php
                $indicators = [
                    ['step' => '1', 'title' => 'Pilih Tema', 'type' => 'palette'],
                    ['step' => '2', 'title' => 'Header & Foto Tema', 'type' => 'image'],
                    ['step' => '3', 'title' => 'Data Mempelai', 'type' => 'users'],
                    ['step' => '4', 'title' => 'Acara', 'type' => 'calendar'],
                    ['step' => '5', 'title' => 'Fitur & Kado', 'type' => 'gift'],
                    ['step' => '6', 'title' => 'Sebar & Tamu', 'type' => 'send'],
                ];
                @endphp

                @foreach($indicators as $ind)
                <div class="relative z-10 flex flex-col items-center group">
                    <div class="w-12 h-12 lg:w-14 lg:h-14 rounded-2xl bg-[#FF2E3A] text-white border-4 border-white shadow-md flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        @if($ind['type'] === 'palette')
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.563-2.512 5.563-5.563C22 6.5 17.5 2 12 2z"/></svg>
                        @elseif($ind['type'] === 'image')
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="8.5" cy="8.5" r="1.5"/><path stroke-linecap="round" stroke-linejoin="round" d="m21 15-5-5L5 21"/></svg>
                        @elseif($ind['type'] === 'users')
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0z"/></svg>
                        @elseif($ind['type'] === 'calendar')
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" stroke-linecap="round" stroke-linejoin="round"/><path stroke-linecap="round" stroke-linejoin="round" d="M16 2v4M8 2v4M3 10h18"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01M16 18h.01"/></svg>
                        @elseif($ind['type'] === 'gift')
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="3" y="8" width="18" height="4" rx="1" stroke-linecap="round" stroke-linejoin="round"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m7-9v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-8m7-4H7.5a2.5 2.5 0 1 1 0-5C11 3 12 8 12 8zm0 0h4.5a2.5 2.5 0 1 0 0-5C13 3 12 8 12 8z"/></svg>
                        @else
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"/></svg>
                        @endif
                    </div>
                    <span class="mt-2.5 font-serif font-semibold text-xs text-slate-900 text-center whitespace-nowrap">
                        {{ $ind['title'] }}
                    </span>
                    <span class="text-[10px] text-[#FF2E3A] font-mono font-medium">Langkah {{ $ind['step'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Step Cards Grid: 2 Kolom di Smartphone (grid-cols-2), 3 Kolom di Desktop (lg:grid-cols-3) -->
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-5 lg:gap-6 items-stretch">
            <!-- Step 1 -->
            <div class="reveal-init reveal-up delay-100 relative bg-white rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 lg:p-7 border border-slate-200/90 hover:border-slate-300 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                <div class="absolute -right-2 -bottom-3 sm:-right-4 sm:-bottom-6 font-serif text-5xl sm:text-7xl lg:text-8xl font-bold text-slate-100 select-none pointer-events-none group-hover:text-slate-200 transition-colors">
                    01
                </div>
                <div>
                    <div class="flex items-center justify-between gap-1.5 mb-2.5 sm:mb-4">
                        <div class="w-9 h-9 sm:w-12 sm:h-12 lg:w-14 lg:h-14 rounded-xl sm:rounded-2xl bg-[#DBF6FF] text-[#0284C7] flex items-center justify-center shadow-2xs border border-[#BAEAF8] shrink-0">
                            <svg class="w-4.5 h-4.5 sm:w-6 sm:h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.563-2.512 5.563-5.563C22 6.5 17.5 2 12 2z"/></svg>
                        </div>
                        <span class="px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-mono uppercase tracking-wider bg-[#DBF6FF] text-[#0284C7] font-semibold border border-[#BAEAF8] whitespace-nowrap">
                            Langkah 1
                        </span>
                    </div>
                    <div class="text-[9.5px] sm:text-xs text-slate-400 font-medium mb-1 truncate">
                        • Bebas Pilih
                    </div>
                    <h3 class="font-serif text-xs sm:text-lg lg:text-xl font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors leading-snug line-clamp-2 min-h-[2.5em] sm:min-h-[2.4em]">
                        Pilih Desain &amp; Tema Undangan
                    </h3>
                    <p class="text-slate-600 text-[10.5px] sm:text-xs lg:text-sm font-light leading-relaxed mt-1.5 sm:mt-2.5 line-clamp-3 sm:line-clamp-4">
                        Pilih dari koleksi 20 tema pernikahan yang dirancang profesional. Tersedia 10 tema Basic gratis serta 10 tema Premium dengan kemewahan ekstra dan musik latar.
                    </p>
                </div>
                <div class="pt-2.5 sm:pt-3.5 mt-2.5 sm:mt-3 border-t border-slate-100 flex flex-wrap gap-1 sm:gap-1.5 relative z-10">
                    <span class="bg-slate-50 border border-slate-200 px-1.5 sm:px-2 py-0.5 rounded text-[8.5px] sm:text-[10px] text-slate-600 font-mono">20 Tema Visual</span>
                    <span class="bg-slate-50 border border-slate-200 px-1.5 sm:px-2 py-0.5 rounded text-[8.5px] sm:text-[10px] text-slate-600 font-mono">10 Basic &amp; 10 Premium</span>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="reveal-init reveal-up delay-200 relative bg-white rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 lg:p-7 border border-slate-200/90 hover:border-slate-300 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                <div class="absolute -right-2 -bottom-3 sm:-right-4 sm:-bottom-6 font-serif text-5xl sm:text-7xl lg:text-8xl font-bold text-slate-100 select-none pointer-events-none group-hover:text-slate-200 transition-colors">
                    02
                </div>
                <div>
                    <div class="flex items-center justify-between gap-1.5 mb-2.5 sm:mb-4">
                        <div class="w-9 h-9 sm:w-12 sm:h-12 lg:w-14 lg:h-14 rounded-xl sm:rounded-2xl bg-[#DBF6FF] text-[#0284C7] flex items-center justify-center shadow-2xs border border-[#BAEAF8] shrink-0">
                            <svg class="w-4.5 h-4.5 sm:w-6 sm:h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="8.5" cy="8.5" r="1.5"/><path stroke-linecap="round" stroke-linejoin="round" d="m21 15-5-5L5 21"/></svg>
                        </div>
                        <span class="px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-mono uppercase tracking-wider bg-[#DBF6FF] text-[#0284C7] font-semibold border border-[#BAEAF8] whitespace-nowrap">
                            Langkah 2
                        </span>
                    </div>
                    <div class="text-[9.5px] sm:text-xs text-slate-400 font-medium mb-1 truncate">
                        • Studio Foto Khusus
                    </div>
                    <h3 class="font-serif text-xs sm:text-lg lg:text-xl font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors leading-snug line-clamp-2 min-h-[2.5em] sm:min-h-[2.4em]">
                        Header &amp; Studio Foto Tema
                    </h3>
                    <p class="text-slate-600 text-[10.5px] sm:text-xs lg:text-sm font-light leading-relaxed mt-1.5 sm:mt-2.5 line-clamp-3 sm:line-clamp-4">
                        Tentukan headline judul, custom slug tautan unik, dan unggah foto sesuai tema: Cover Buka Undangan, Countdown, Galeri Foto, hingga Love Story.
                    </p>
                </div>
                <div class="pt-2.5 sm:pt-3.5 mt-2.5 sm:mt-3 border-t border-slate-100 flex flex-wrap gap-1 sm:gap-1.5 relative z-10">
                    <span class="bg-slate-50 border border-slate-200 px-1.5 sm:px-2 py-0.5 rounded text-[8.5px] sm:text-[10px] text-slate-600 font-mono">Custom Slug URL</span>
                    <span class="bg-slate-50 border border-slate-200 px-1.5 sm:px-2 py-0.5 rounded text-[8.5px] sm:text-[10px] text-slate-600 font-mono">Cover &amp; Galeri</span>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="reveal-init reveal-up delay-300 relative bg-white rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 lg:p-7 border border-slate-200/90 hover:border-slate-300 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                <div class="absolute -right-2 -bottom-3 sm:-right-4 sm:-bottom-6 font-serif text-5xl sm:text-7xl lg:text-8xl font-bold text-slate-100 select-none pointer-events-none group-hover:text-slate-200 transition-colors">
                    03
                </div>
                <div>
                    <div class="flex items-center justify-between gap-1.5 mb-2.5 sm:mb-4">
                        <div class="w-9 h-9 sm:w-12 sm:h-12 lg:w-14 lg:h-14 rounded-xl sm:rounded-2xl bg-[#DBF6FF] text-[#0284C7] flex items-center justify-center shadow-2xs border border-[#BAEAF8] shrink-0">
                            <svg class="w-4.5 h-4.5 sm:w-6 sm:h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0z"/></svg>
                        </div>
                        <span class="px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-mono uppercase tracking-wider bg-[#DBF6FF] text-[#0284C7] font-semibold border border-[#BAEAF8] whitespace-nowrap">
                            Langkah 3
                        </span>
                    </div>
                    <div class="text-[9.5px] sm:text-xs text-slate-400 font-medium mb-1 truncate">
                        • Data Pasangan
                    </div>
                    <h3 class="font-serif text-xs sm:text-lg lg:text-xl font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors leading-snug line-clamp-2 min-h-[2.5em] sm:min-h-[2.4em]">
                        Lengkapi Data Mempelai
                    </h3>
                    <p class="text-slate-600 text-[10.5px] sm:text-xs lg:text-sm font-light leading-relaxed mt-1.5 sm:mt-2.5 line-clamp-3 sm:line-clamp-4">
                        Masukkan data mempelai pria &amp; wanita: nama lengkap, panggilan, data keluarga besar, tautan akun Instagram, serta foto avatar profil pengantin.
                    </p>
                </div>
                <div class="pt-2.5 sm:pt-3.5 mt-2.5 sm:mt-3 border-t border-slate-100 flex flex-wrap gap-1 sm:gap-1.5 relative z-10">
                    <span class="bg-slate-50 border border-slate-200 px-1.5 sm:px-2 py-0.5 rounded text-[8.5px] sm:text-[10px] text-slate-600 font-mono">Mempelai Pria &amp; Wanita</span>
                    <span class="bg-slate-50 border border-slate-200 px-1.5 sm:px-2 py-0.5 rounded text-[8.5px] sm:text-[10px] text-slate-600 font-mono">Data Orang Tua</span>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="reveal-init reveal-up delay-400 relative bg-white rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 lg:p-7 border border-slate-200/90 hover:border-slate-300 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                <div class="absolute -right-2 -bottom-3 sm:-right-4 sm:-bottom-6 font-serif text-5xl sm:text-7xl lg:text-8xl font-bold text-slate-100 select-none pointer-events-none group-hover:text-slate-200 transition-colors">
                    04
                </div>
                <div>
                    <div class="flex items-center justify-between gap-1.5 mb-2.5 sm:mb-4">
                        <div class="w-9 h-9 sm:w-12 sm:h-12 lg:w-14 lg:h-14 rounded-xl sm:rounded-2xl bg-[#DBF6FF] text-[#0284C7] flex items-center justify-center shadow-2xs border border-[#BAEAF8] shrink-0">
                            <svg class="w-4.5 h-4.5 sm:w-6 sm:h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" stroke-linecap="round" stroke-linejoin="round"/><path stroke-linecap="round" stroke-linejoin="round" d="M16 2v4M8 2v4M3 10h18"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01M16 18h.01"/></svg>
                        </div>
                        <span class="px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-mono uppercase tracking-wider bg-[#DBF6FF] text-[#0284C7] font-semibold border border-[#BAEAF8] whitespace-nowrap">
                            Langkah 4
                        </span>
                    </div>
                    <div class="text-[9.5px] sm:text-xs text-slate-400 font-medium mb-1 truncate">
                        • Waktu &amp; Lokasi
                    </div>
                    <h3 class="font-serif text-xs sm:text-lg lg:text-xl font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors leading-snug line-clamp-2 min-h-[2.5em] sm:min-h-[2.4em]">
                        Jadwal &amp; Navigasi Lokasi
                    </h3>
                    <p class="text-slate-600 text-[10.5px] sm:text-xs lg:text-sm font-light leading-relaxed mt-1.5 sm:mt-2.5 line-clamp-3 sm:line-clamp-4">
                        Atur tanggal dan waktu pelaksanaan akad nikah &amp; resepsi secara rinci, dilengkapi alamat gedung, navigasi Google Maps, dan countdown otomatis.
                    </p>
                </div>
                <div class="pt-2.5 sm:pt-3.5 mt-2.5 sm:mt-3 border-t border-slate-100 flex flex-wrap gap-1 sm:gap-1.5 relative z-10">
                    <span class="bg-slate-50 border border-slate-200 px-1.5 sm:px-2 py-0.5 rounded text-[8.5px] sm:text-[10px] text-slate-600 font-mono">Akad &amp; Resepsi</span>
                    <span class="bg-slate-50 border border-slate-200 px-1.5 sm:px-2 py-0.5 rounded text-[8.5px] sm:text-[10px] text-slate-600 font-mono">Google Maps</span>
                </div>
            </div>

            <!-- Step 5 -->
            <div class="reveal-init reveal-up delay-500 relative bg-white rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 lg:p-7 border border-slate-200/90 hover:border-slate-300 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                <div class="absolute -right-2 -bottom-3 sm:-right-4 sm:-bottom-6 font-serif text-5xl sm:text-7xl lg:text-8xl font-bold text-slate-100 select-none pointer-events-none group-hover:text-slate-200 transition-colors">
                    05
                </div>
                <div>
                    <div class="flex items-center justify-between gap-1.5 mb-2.5 sm:mb-4">
                        <div class="w-9 h-9 sm:w-12 sm:h-12 lg:w-14 lg:h-14 rounded-xl sm:rounded-2xl bg-[#DBF6FF] text-[#0284C7] flex items-center justify-center shadow-2xs border border-[#BAEAF8] shrink-0">
                            <svg class="w-4.5 h-4.5 sm:w-6 sm:h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="3" y="8" width="18" height="4" rx="1" stroke-linecap="round" stroke-linejoin="round"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m7-9v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-8m7-4H7.5a2.5 2.5 0 1 1 0-5C11 3 12 8 12 8zm0 0h4.5a2.5 2.5 0 1 0 0-5C13 3 12 8 12 8z"/></svg>
                        </div>
                        <span class="px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-mono uppercase tracking-wider bg-[#DBF6FF] text-[#0284C7] font-semibold border border-[#BAEAF8] whitespace-nowrap">
                            Langkah 5
                        </span>
                    </div>
                    <div class="text-[9.5px] sm:text-xs text-slate-400 font-medium mb-1 truncate">
                        • Amplop &amp; Musik
                    </div>
                    <h3 class="font-serif text-xs sm:text-lg lg:text-xl font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors leading-snug line-clamp-2 min-h-[2.5em] sm:min-h-[2.4em]">
                        Fitur Amplop Digital &amp; Musik
                    </h3>
                    <p class="text-slate-600 text-[10.5px] sm:text-xs lg:text-sm font-light leading-relaxed mt-1.5 sm:mt-2.5 line-clamp-3 sm:line-clamp-4">
                        Aktifkan kemudahan amplop digital (transfer bank &amp; QRIS), alamat kado fisik, kutipan ayat suci cinta, dan pemutar musik latar romantis.
                    </p>
                </div>
                <div class="pt-2.5 sm:pt-3.5 mt-2.5 sm:mt-3 border-t border-slate-100 flex flex-wrap gap-1 sm:gap-1.5 relative z-10">
                    <span class="bg-slate-50 border border-slate-200 px-1.5 sm:px-2 py-0.5 rounded text-[8.5px] sm:text-[10px] text-slate-600 font-mono">Amplop &amp; QRIS</span>
                    <span class="bg-slate-50 border border-slate-200 px-1.5 sm:px-2 py-0.5 rounded text-[8.5px] sm:text-[10px] text-slate-600 font-mono">Musik Romantis</span>
                </div>
            </div>

            <!-- Step 6 -->
            <div class="reveal-init reveal-up delay-600 relative bg-white rounded-2xl sm:rounded-3xl p-3.5 sm:p-6 lg:p-7 border border-slate-200/90 hover:border-slate-300 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                <div class="absolute -right-2 -bottom-3 sm:-right-4 sm:-bottom-6 font-serif text-5xl sm:text-7xl lg:text-8xl font-bold text-slate-100 select-none pointer-events-none group-hover:text-slate-200 transition-colors">
                    06
                </div>
                <div>
                    <div class="flex items-center justify-between gap-1.5 mb-2.5 sm:mb-4">
                        <div class="w-9 h-9 sm:w-12 sm:h-12 lg:w-14 lg:h-14 rounded-xl sm:rounded-2xl bg-[#DBF6FF] text-[#0284C7] flex items-center justify-center shadow-2xs border border-[#BAEAF8] shrink-0">
                            <svg class="w-4.5 h-4.5 sm:w-6 sm:h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"/></svg>
                        </div>
                        <span class="px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-mono uppercase tracking-wider bg-[#DBF6FF] text-[#0284C7] font-semibold border border-[#BAEAF8] whitespace-nowrap">
                            Langkah 6
                        </span>
                    </div>
                    <div class="text-[9.5px] sm:text-xs text-slate-400 font-medium mb-1 truncate">
                        • Sekali Klik
                    </div>
                    <h3 class="font-serif text-xs sm:text-lg lg:text-xl font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors leading-snug line-clamp-2 min-h-[2.5em] sm:min-h-[2.4em]">
                        Sebar Undangan WhatsApp &amp; Tamu
                    </h3>
                    <p class="text-slate-600 text-[10.5px] sm:text-xs lg:text-sm font-light leading-relaxed mt-1.5 sm:mt-2.5 line-clamp-3 sm:line-clamp-4">
                        Kelola tamu dan hasilkan tautan unik personal (?to=Nama). Bagikan langsung via WhatsApp 1-klik dengan pesan otomatis dan RSVP digital.
                    </p>
                </div>
                <div class="pt-2.5 sm:pt-3.5 mt-2.5 sm:mt-3 border-t border-slate-100 flex flex-wrap gap-1 sm:gap-1.5 relative z-10">
                    <span class="bg-slate-50 border border-slate-200 px-1.5 sm:px-2 py-0.5 rounded text-[8.5px] sm:text-[10px] text-slate-600 font-mono">Sebar WA 1-Klik</span>
                    <span class="bg-slate-50 border border-slate-200 px-1.5 sm:px-2 py-0.5 rounded text-[8.5px] sm:text-[10px] text-slate-600 font-mono">RSVP &amp; Buku Tamu</span>
                </div>
            </div>
        </div>

        <!-- Action Card -->
        <div class="mt-14 p-8 sm:p-10 rounded-3xl bg-gradient-to-br from-[#FF2E3A] to-[#C71722] text-white border border-[#E01E2A] text-center space-y-5 shadow-xl">
            <h3 class="font-serif text-2xl sm:text-3xl font-bold text-white">
                Siap Membuat Undangan Pernikahan Anda?
            </h3>
            <p class="text-sm sm:text-base text-white/90 font-light max-w-lg mx-auto">
                Hanya butuh beberapa menit untuk menyusun undangan yang indah dan berkesan.
            </p>
            <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a
                    href="{{ route('themes.index') }}"
                    class="px-8 py-3.5 rounded-full text-sm font-semibold border border-white text-white hover:bg-white hover:text-[#FF2E3A] transition-all duration-300"
                >
                    Lihat 20 Tema Pilihan
                </a>
                <a
                    href="{{ route('register') }}"
                    class="px-8 py-3.5 rounded-full text-sm font-bold text-[#FF2E3A] bg-white hover:bg-slate-50 transition-all duration-300 shadow"
                >
                    Daftar & Buat Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
