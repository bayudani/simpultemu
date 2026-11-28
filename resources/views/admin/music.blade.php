@extends('layouts.dashboard')

@section('title', 'Pustaka Musik - Admin')
@section('container_max_width', 'max-w-[1720px] w-full')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Pustaka Musik Undangan</h1>
            <p class="text-sm text-slate-500 mt-1">Kelola musik latar yang dapat dipilih oleh calon pengantin untuk undangan pernikahan mereka.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <div class="hidden sm:flex items-center gap-2 text-xs font-semibold text-slate-500 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                <span>Aktif: <strong class="text-emerald-600">{{ $totalActive }}</strong> / {{ $totalTracks }} Lagu</span>
            </div>
            <button type="button" onclick="openAddMusicModal()" class="px-4 py-2.5 rounded-xl bg-[#FF2E3A] hover:bg-[#E02631] text-white text-xs sm:text-sm font-bold transition shadow-xs flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>Tambah Lagu Baru</span>
            </button>
        </div>
    </div>

    <!-- Navigation Bar -->
    @include('partials.admin-nav')

    <!-- Flash Notification Messages -->
    @if(session('success'))
    <div class="p-4 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-center gap-3 text-emerald-800 text-sm shadow-xs animate-fade-in">
        <svg class="w-5 h-5 shrink-0 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="font-medium">{{ session('success') }}</span>
    </div>
    @endif

    @if($errors->any())
    <div class="p-4 bg-red-50 border border-red-200 rounded-2xl flex flex-col gap-1 text-red-800 text-sm shadow-xs">
        <div class="flex items-center gap-2 font-bold text-red-900">
            <svg class="w-5 h-5 shrink-0 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Terdapat kendala saat menyimpan lagu:</span>
        </div>
        <ul class="list-disc list-inside text-xs mt-1 space-y-0.5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Search & Filter Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-4 sm:p-5">
        <form method="GET" action="{{ route('admin.music.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            <!-- Search Query -->
            <div class="sm:col-span-6 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul lagu atau nama artis/komposer..." 
                       class="w-full pl-10 pr-4 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]">
            </div>

            <!-- Status Filter -->
            <div class="sm:col-span-2">
                <select name="status" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A] bg-white">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Non-aktif</option>
                </select>
            </div>

            <!-- Tier Filter -->
            <div class="sm:col-span-2">
                <select name="tier" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A] bg-white">
                    <option value="">Semua Paket</option>
                    <option value="basic" {{ request('tier') === 'basic' ? 'selected' : '' }}>Basic (5 Lagu)</option>
                    <option value="basic_addon_1" {{ request('tier') === 'basic_addon_1' ? 'selected' : '' }}>Add-On 1 (10 Lagu)</option>
                    <option value="basic_addon_2" {{ request('tier') === 'basic_addon_2' ? 'selected' : '' }}>Add-On 2 (20 Lagu)</option>
                    <option value="premium" {{ request('tier') === 'premium' ? 'selected' : '' }}>Premium</option>
                </select>
            </div>

            <!-- Submit Button & Reset -->
            <div class="sm:col-span-2 flex items-center gap-2">
                <button type="submit" class="flex-1 px-4 py-2 rounded-xl bg-[#FF2E3A] hover:bg-[#E02631] text-white text-xs font-bold transition shadow-xs">
                    Filter
                </button>
                @if(request()->hasAny(['q', 'status', 'tier']))
                <a href="{{ route('admin.music.index') }}" class="px-3 py-2 rounded-xl border border-slate-200 text-slate-500 hover:text-slate-800 text-xs font-semibold hover:bg-slate-50 transition">
                    Reset
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Music List Table Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="p-4 sm:p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
            <div>
                <h2 class="font-bold text-slate-900 text-base">Daftar Pustaka Musik ({{ $musicList->total() }})</h2>
                <p class="text-xs text-slate-500">Lagu yang berstatus aktif akan langsung muncul di pilihan musik pengantin saat membuat undangan.</p>
            </div>
            <!-- Global Audio Player Indicator -->
            <div id="active-audio-status-bar" class="hidden items-center gap-2 bg-rose-50 border border-rose-200 px-3 py-1.5 rounded-xl text-xs text-[#FF2E3A] font-semibold">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#FF2E3A]"></span>
                </span>
                <span id="playing-track-name" class="truncate max-w-[200px]">Memutar lagu...</span>
                <button type="button" onclick="stopGlobalAudio()" class="ml-1 text-slate-400 hover:text-[#FF2E3A] font-bold">✕</button>
            </div>
        </div>

        <!-- Tab Pemilah Paket Cepat (Basic, Add-On 1, Add-On 2, Premium) -->
        <div class="px-4 sm:px-5 py-3 bg-slate-50/70 border-b border-slate-100 flex items-center gap-2 overflow-x-auto text-xs font-semibold">
            <span class="text-slate-400 uppercase tracking-wider text-[10px] font-bold shrink-0 mr-1">Pilah Paket:</span>
            <a href="{{ route('admin.music.index', array_merge(request()->except(['tier', 'page']))) }}" 
               style="{{ !request('tier') ? 'background-color: #0f172a !important; color: #ffffff !important;' : 'background-color: #ffffff; color: #475569; border-color: #e2e8f0;' }}"
               class="px-3 py-1.5 rounded-xl transition shrink-0 {{ !request('tier') ? 'bg-slate-900 text-white shadow-xs font-bold' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200 hover:bg-slate-100' }}">
                Semua ({{ $tierCounts['all'] ?? $totalTracks }})
            </a>
            <a href="{{ route('admin.music.index', array_merge(request()->except('page'), ['tier' => 'basic'])) }}" 
               style="{{ request('tier') === 'basic' ? 'background-color: #059669 !important; color: #ffffff !important;' : 'background-color: #ffffff; color: #065f46; border-color: #a7f3d0;' }}"
               class="px-3 py-1.5 rounded-xl transition shrink-0 flex items-center gap-1.5 {{ request('tier') === 'basic' ? 'bg-emerald-600 text-white shadow-xs font-bold' : 'bg-white text-emerald-800 border border-emerald-200 hover:bg-emerald-50' }}">
                <span style="{{ request('tier') === 'basic' ? 'background-color: #ffffff !important;' : 'background-color: #10b981 !important;' }}" class="w-2 h-2 rounded-full {{ request('tier') === 'basic' ? 'bg-white' : 'bg-emerald-500' }}"></span>
                <span>Basic ({{ $tierCounts['basic'] ?? 0 }})</span>
            </a>
            <a href="{{ route('admin.music.index', array_merge(request()->except('page'), ['tier' => 'basic_addon_1'])) }}" 
               style="{{ request('tier') === 'basic_addon_1' ? 'background-color: #d97706 !important; color: #ffffff !important;' : 'background-color: #ffffff; color: #92400e; border-color: #fde68a;' }}"
               class="px-3 py-1.5 rounded-xl transition shrink-0 flex items-center gap-1.5 {{ request('tier') === 'basic_addon_1' ? 'bg-amber-500 text-white shadow-xs font-bold' : 'bg-white text-amber-800 border border-amber-200 hover:bg-amber-50' }}">
                <span style="{{ request('tier') === 'basic_addon_1' ? 'background-color: #ffffff !important;' : 'background-color: #f59e0b !important;' }}" class="w-2 h-2 rounded-full {{ request('tier') === 'basic_addon_1' ? 'bg-white' : 'bg-amber-500' }}"></span>
                <span>Add-On 1 ({{ $tierCounts['basic_addon_1'] ?? 0 }})</span>
            </a>
            <a href="{{ route('admin.music.index', array_merge(request()->except('page'), ['tier' => 'basic_addon_2'])) }}" 
               style="{{ request('tier') === 'basic_addon_2' ? 'background-color: #9333ea !important; color: #ffffff !important;' : 'background-color: #ffffff; color: #6b21a8; border-color: #e9d5ff;' }}"
               class="px-3 py-1.5 rounded-xl transition shrink-0 flex items-center gap-1.5 {{ request('tier') === 'basic_addon_2' ? 'bg-purple-600 text-white shadow-xs font-bold' : 'bg-white text-purple-800 border border-purple-200 hover:bg-purple-50' }}">
                <span style="{{ request('tier') === 'basic_addon_2' ? 'background-color: #ffffff !important;' : 'background-color: #a855f7 !important;' }}" class="w-2 h-2 rounded-full {{ request('tier') === 'basic_addon_2' ? 'bg-white' : 'bg-purple-500' }}"></span>
                <span>Add-On 2 ({{ $tierCounts['basic_addon_2'] ?? 0 }})</span>
            </a>
            <a href="{{ route('admin.music.index', array_merge(request()->except('page'), ['tier' => 'premium'])) }}" 
               style="{{ request('tier') === 'premium' ? 'background: linear-gradient(to right, #f59e0b, #f43f5e) !important; color: #ffffff !important;' : 'background-color: #ffffff; color: #9f1239; border-color: #fecdd3;' }}"
               class="px-3 py-1.5 rounded-xl transition shrink-0 flex items-center gap-1.5 {{ request('tier') === 'premium' ? 'bg-gradient-to-r from-amber-500 to-rose-500 text-white shadow-xs font-bold' : 'bg-white text-rose-800 border border-rose-200 hover:bg-rose-50' }}">
                <svg class="w-3 h-3 fill-current shrink-0" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg>
                <span>Premium ({{ $tierCounts['premium'] ?? 0 }})</span>
            </a>
        </div>

        @if($musicList->isEmpty())
        <div class="p-12 text-center">
            <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                </svg>
            </div>
            <h3 class="text-base font-bold text-slate-900 mb-1">Belum ada lagu ditemukan</h3>
            <p class="text-xs text-slate-500 max-w-sm mx-auto mb-5">
                {{ request()->hasAny(['q', 'status']) ? 'Tidak ada lagu yang cocok dengan kriteria filter Anda.' : 'Pustaka musik masih kosong. Tambahkan lagu latar pertama untuk platform ini.' }}
            </p>
            <button type="button" onclick="openAddMusicModal()" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#FF2E3A] text-white text-xs font-bold hover:bg-[#E02631] transition shadow-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>Tambah Lagu Baru</span>
            </button>
        </div>
        @else
        <!-- 1. Tampilan Desktop & Tablet (Tabel Ramping, Pas di Layar, Kolom Aksi Sticky di Kanan) -->
        <div class="hidden md:block overflow-x-auto relative">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50/90 border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3 px-2 w-20 text-center whitespace-nowrap" title="Urutan nomor posisi lagu secara global">Urutan No.</th>
                        <th class="py-3 px-2 w-18 text-center whitespace-nowrap" title="Nomor urut lagu di dalam paketnya">No. Paket</th>
                        <th class="py-3 px-2 w-10 text-center whitespace-nowrap">Putar</th>
                        <th class="py-3 px-3 min-w-[160px]">Judul Lagu &amp; Artis</th>
                        <th class="py-3 px-2.5 whitespace-nowrap">Paket Akses Lagu</th>
                        <th class="py-3 px-2 text-center whitespace-nowrap">Tipe Sumber</th>
                        <th class="py-3 px-2 text-center whitespace-nowrap">Durasi</th>
                        <th class="py-3 px-2 text-center whitespace-nowrap">Dipakai di</th>
                        <th class="py-3 px-2.5 text-center whitespace-nowrap">Status</th>
                        <th class="py-3 px-3 text-right whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($musicList as $item)
                    @php
                        $isExternal = str_starts_with($item->file_path, 'http://') || str_starts_with($item->file_path, 'https://');
                    @endphp
                    <tr class="hover:bg-slate-50/70 transition group" id="track-row-{{ $item->id }}">
                        <!-- 0. Urutan Global & Naik/Turun -->
                        <td class="py-3 px-2 align-middle whitespace-nowrap">
                            <div class="flex items-center justify-center gap-1">
                                <form action="{{ route('admin.music.move', $item) }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="direction" value="up">
                                    <button type="submit" 
                                            @if($item->order <= 1) disabled @endif
                                            class="w-6 h-6 rounded-md flex items-center justify-center transition cursor-pointer {{ $item->order <= 1 ? 'opacity-20 cursor-not-allowed text-slate-300' : 'text-slate-600 hover:text-white hover:bg-[#FF2E3A] border border-slate-200 hover:border-[#FF2E3A] bg-white shadow-2xs active:scale-95' }}"
                                            title="{{ $item->order <= 1 ? 'Sudah teratas' : 'Naikkan ke #'.($item->order - 1) }}">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"/></svg>
                                    </button>
                                </form>

                                <button type="button" 
                                        onclick="openReorderMusicModal('{{ $item->id }}', '{{ addslashes($item->title) }}', '{{ $item->order }}', '{{ $item->tier_label }}', '{{ $item->tier_order ?? ($tierOrders[$item->id] ?? 1) }}')"
                                        class="min-w-7 h-7 px-1.5 rounded-lg bg-slate-100 hover:bg-[#DBF6FF] text-slate-800 hover:text-[#FF2E3A] font-extrabold font-mono text-xs border border-slate-200 hover:border-[#FF2E3A]/40 shadow-2xs flex items-center justify-center transition cursor-pointer"
                                        title="Urutan Global #{{ $item->order }} (Klik untuk pindahkan)">
                                    #{{ $item->order }}
                                </button>

                                <form action="{{ route('admin.music.move', $item) }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="direction" value="down">
                                    <button type="submit" 
                                            @if($item->order >= $totalTracks) disabled @endif
                                            class="w-6 h-6 rounded-md flex items-center justify-center transition cursor-pointer {{ $item->order >= $totalTracks ? 'opacity-20 cursor-not-allowed text-slate-300' : 'text-slate-600 hover:text-white hover:bg-[#FF2E3A] border border-slate-200 hover:border-[#FF2E3A] bg-white shadow-2xs active:scale-95' }}"
                                            title="{{ $item->order >= $totalTracks ? 'Sudah terbawah' : 'Turunkan ke #'.($item->order + 1) }}">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>

                        <!-- 0B. Nomor Paket -->
                        <td class="py-3 px-2 text-center align-middle whitespace-nowrap">
                            <div class="inline-flex flex-col items-center justify-center">
                                <span style="{{ $item->tier === 'basic_addon_2' ? 'background-color: #f3e8ff; color: #581c87; border-color: #e9d5ff;' : ($item->tier === 'basic_addon_1' ? 'background-color: #fef3c7; color: #78350f; border-color: #fde68a;' : ($item->tier === 'basic' ? 'background-color: #d1fae5; color: #064e3b; border-color: #a7f3d0;' : 'background: linear-gradient(to right, #f59e0b, #f43f5e); color: #ffffff;')) }}"
                                      class="inline-flex items-center justify-center min-w-8 h-6 px-2 rounded-lg text-xs font-black font-mono shadow-2xs {{ 
                                    $item->tier === 'premium' ? 'bg-gradient-to-r from-amber-500 to-rose-500 text-white shadow-amber-500/20' : (
                                    $item->tier === 'basic_addon_2' ? 'bg-purple-100 text-purple-900 border border-purple-200' : (
                                    $item->tier === 'basic_addon_1' ? 'bg-amber-100 text-amber-900 border border-amber-200' : 
                                    'bg-emerald-100 text-emerald-900 border border-emerald-200')) }}">
                                    #{{ $item->tier_order ?? ($tierOrders[$item->id] ?? 1) }}
                                </span>
                                <span class="text-[9px] font-bold text-slate-400 tracking-tight mt-0.5">
                                    {{ $item->tier_label }}
                                </span>
                            </div>
                        </td>

                        <!-- 1. Play Button -->
                        <td class="py-3 px-2 text-center align-middle whitespace-nowrap">
                            <button type="button" 
                                    onclick="togglePlayAudio('{{ $item->id }}', '{{ $item->audio_url }}', '{{ addslashes($item->title) }}')"
                                    id="play-btn-{{ $item->id }}"
                                    class="play-btn-{{ $item->id }} w-8 h-8 rounded-full bg-slate-100 hover:bg-[#FF2E3A] text-slate-700 hover:text-white transition flex items-center justify-center shadow-2xs cursor-pointer mx-auto">
                                <svg class="w-3.5 h-3.5 play-icon" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                <svg class="w-3.5 h-3.5 pause-icon hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                            </button>
                        </td>

                        <!-- 2. Track & Artist -->
                        <td class="py-3 px-3 align-middle">
                            <div class="font-bold text-slate-900 text-sm group-hover:text-[#FF2E3A] transition-colors leading-snug">
                                {{ $item->title }}
                            </div>
                            <div class="text-xs text-slate-500 mt-0.5 flex items-center gap-1.5 flex-wrap">
                                <span>{{ $item->artist }}</span>
                                <span class="text-slate-300">•</span>
                                <span class="text-[11px] text-slate-400">{{ $item->category }}</span>
                            </div>
                        </td>

                        <!-- 2B. Paket Akses Lagu -->
                        <td class="py-3 px-2.5 align-middle whitespace-nowrap">
                            <form action="{{ route('admin.music.updateTier', $item) }}" method="POST" class="inline-flex items-center" title="Ubah Akses Paket Lagu Ini">
                                @csrf
                                <select name="tier" onchange="this.form.submit()" class="px-2 py-1 text-xs font-semibold rounded-lg border border-slate-200 bg-white text-slate-800 shadow-2xs hover:border-[#FF2E3A] focus:outline-none focus:ring-1 focus:ring-[#FF2E3A] cursor-pointer">
                                    <option value="basic" {{ ($item->tier ?: 'basic') === 'basic' ? 'selected' : '' }}>Basic (5 Lagu)</option>
                                    <option value="basic_addon_1" {{ $item->tier === 'basic_addon_1' ? 'selected' : '' }}>Add-On 1 (10 Lagu)</option>
                                    <option value="basic_addon_2" {{ $item->tier === 'basic_addon_2' ? 'selected' : '' }}>Add-On 2 (20 Lagu)</option>
                                    <option value="premium" {{ $item->tier === 'premium' ? 'selected' : '' }}>Premium</option>
                                </select>
                            </form>
                        </td>

                        <!-- 3. Source Type -->
                        <td class="py-3 px-2 text-center align-middle whitespace-nowrap">
                            @if($isExternal)
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-sky-50 text-sky-700 border border-sky-200" title="Link MP3 Online">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                <span>URL Online</span>
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-indigo-50 text-indigo-700 border border-indigo-200" title="File Upload Lokal">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                <span>File MP3</span>
                            </span>
                            @endif
                        </td>

                        <!-- 4. Duration -->
                        <td class="py-3 px-2 text-center align-middle font-mono text-xs text-slate-600 whitespace-nowrap">
                            {{ $item->formatted_duration }}
                        </td>

                        <!-- 5. Usage Count -->
                        <td class="py-3 px-2 text-center align-middle whitespace-nowrap">
                            <span class="inline-block px-2 py-0.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-700">
                                {{ $item->invitations_count ?? 0 }} Undangan
                            </span>
                        </td>

                        <!-- 6. Status -->
                        <td class="py-3 px-2.5 text-center align-middle whitespace-nowrap">
                            <form action="{{ route('admin.music.toggleActive', $item) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold border transition cursor-pointer whitespace-nowrap {{ $item->is_active ? 'bg-emerald-50 text-emerald-700 border-emerald-200 hover:bg-emerald-100' : 'bg-slate-100 text-slate-600 border-slate-200 hover:bg-slate-200' }}" title="{{ $item->is_active ? 'Klik untuk nonaktifkan' : 'Klik untuk aktifkan' }}">
                                    <span class="w-1.5 h-1.5 rounded-full shrink-0 {{ $item->is_active ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                    <span>{{ $item->is_active ? 'Aktif' : 'Non-aktif' }}</span>
                                </button>
                            </form>
                        </td>

                        <!-- 7. Actions -->
                        <td class="py-3 px-3 text-right align-middle whitespace-nowrap">
                            <div class="flex items-center justify-end gap-1">
                                <!-- Toggle Active Status Icon -->
                                <form action="{{ route('admin.music.toggleActive', $item) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" 
                                            class="w-7 h-7 rounded-lg border border-slate-200 hover:bg-slate-100 text-slate-600 hover:text-slate-900 transition flex items-center justify-center cursor-pointer"
                                            title="{{ $item->is_active ? 'Nonaktifkan Lagu' : 'Aktifkan Lagu' }}">
                                        @if($item->is_active)
                                        <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        @else
                                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                        @endif
                                    </button>
                                </form>

                                <!-- Edit Music Button -->
                                <button type="button" 
                                        onclick="openEditMusicModal({{ json_encode([
                                            'id' => $item->id,
                                            'title' => $item->title,
                                            'artist' => $item->artist,
                                            'tier' => $item->tier,
                                            'duration' => $item->formatted_duration,
                                            'is_active' => (bool) $item->is_active,
                                            'source_type' => $isExternal ? 'url' : 'file',
                                            'audio_url' => $isExternal ? $item->file_path : '',
                                        ]) }})"
                                        class="w-7 h-7 rounded-lg border border-slate-200 hover:border-amber-400 hover:bg-amber-50 text-slate-600 hover:text-amber-600 transition flex items-center justify-center cursor-pointer"
                                        title="Edit Informasi Lagu">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </button>

                                <!-- Reorder / Jump Button -->
                                <button type="button" 
                                        onclick="openReorderMusicModal('{{ $item->id }}', '{{ addslashes($item->title) }}', '{{ $item->order }}', '{{ $item->tier_label }}', '{{ $item->tier_order ?? ($tierOrders[$item->id] ?? 1) }}')"
                                        class="w-7 h-7 rounded-lg border border-slate-200 hover:border-[#FF2E3A]/40 hover:bg-[#DBF6FF]/30 text-slate-600 hover:text-[#FF2E3A] transition flex items-center justify-center cursor-pointer"
                                        title="Pindah Urutan Lagu (Lompat ke No. X)">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/></svg>
                                </button>

                                <!-- Delete Button -->
                                <button type="button" 
                                        onclick="confirmDeleteMusic('{{ $item->id }}', '{{ addslashes($item->title) }}', '{{ $item->invitations_count ?? 0 }}')"
                                        class="w-7 h-7 rounded-lg border border-red-200 bg-red-50/50 hover:bg-red-100 text-red-600 transition flex items-center justify-center cursor-pointer"
                                        title="Hapus Lagu">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- 2. Tampilan Smartphone & Mobile (Kartu Responsif, Tanpa Scroll Horizontal) -->
        <div class="md:hidden divide-y divide-slate-100">
            @foreach($musicList as $item)
            @php
                $isExternal = str_starts_with($item->file_path, 'http://') || str_starts_with($item->file_path, 'https://');
            @endphp
            <div class="p-4 hover:bg-slate-50/60 transition space-y-3" id="mobile-track-{{ $item->id }}">
                <!-- Header Kartu: Urutan Global, Nomor Paket, Status & Tombol Panah -->
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-1.5 flex-wrap">
                        <button type="button" 
                                onclick="openReorderMusicModal('{{ $item->id }}', '{{ addslashes($item->title) }}', '{{ $item->order }}', '{{ $item->tier_label }}', '{{ $item->tier_order ?? ($tierOrders[$item->id] ?? 1) }}')"
                                class="px-2 py-0.5 rounded-lg bg-slate-100 text-slate-800 font-extrabold font-mono text-xs border border-slate-200 shadow-2xs">
                            #{{ $item->order }}
                        </button>
                        <span style="{{ $item->tier === 'basic_addon_2' ? 'background-color: #f3e8ff; color: #581c87; border-color: #e9d5ff;' : ($item->tier === 'basic_addon_1' ? 'background-color: #fef3c7; color: #78350f; border-color: #fde68a;' : ($item->tier === 'basic' ? 'background-color: #d1fae5; color: #064e3b; border-color: #a7f3d0;' : 'background: linear-gradient(to right, #f59e0b, #f43f5e); color: #ffffff;')) }}"
                              class="inline-flex items-center px-2 py-0.5 rounded-lg text-xs font-black font-mono shadow-2xs {{ 
                            $item->tier === 'premium' ? 'bg-gradient-to-r from-amber-500 to-rose-500 text-white' : (
                            $item->tier === 'basic_addon_2' ? 'bg-purple-100 text-purple-900 border border-purple-200' : (
                            $item->tier === 'basic_addon_1' ? 'bg-amber-100 text-amber-900 border border-amber-200' : 
                            'bg-emerald-100 text-emerald-900 border border-emerald-200')) }}">
                            #{{ $item->tier_order ?? ($tierOrders[$item->id] ?? 1) }} {{ $item->tier_label }}
                        </span>
                        <form action="{{ route('admin.music.toggleActive', $item) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold transition border {{ $item->is_active ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-slate-100 text-slate-500 border-slate-200' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $item->is_active ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                <span>{{ $item->is_active ? 'Aktif' : 'Non-aktif' }}</span>
                            </button>
                        </form>
                    </div>

                    <div class="flex items-center gap-1 shrink-0">
                        <form action="{{ route('admin.music.move', $item) }}" method="POST" class="inline">
                            @csrf
                            <input type="hidden" name="direction" value="up">
                            <button type="submit" @if($item->order <= 1) disabled @endif class="w-7 h-7 rounded-lg flex items-center justify-center transition {{ $item->order <= 1 ? 'opacity-20 cursor-not-allowed text-slate-300' : 'text-slate-600 hover:text-white hover:bg-[#FF2E3A] border border-slate-200 bg-white shadow-2xs' }}" title="Naik">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"/></svg>
                            </button>
                        </form>
                        <form action="{{ route('admin.music.move', $item) }}" method="POST" class="inline">
                            @csrf
                            <input type="hidden" name="direction" value="down">
                            <button type="submit" @if($item->order >= $totalTracks) disabled @endif class="w-7 h-7 rounded-lg flex items-center justify-center transition {{ $item->order >= $totalTracks ? 'opacity-20 cursor-not-allowed text-slate-300' : 'text-slate-600 hover:text-white hover:bg-[#FF2E3A] border border-slate-200 bg-white shadow-2xs' }}" title="Turun">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Info Lagu & Tombol Putar -->
                <div class="flex items-center gap-3">
                    <button type="button" 
                            onclick="togglePlayAudio('{{ $item->id }}', '{{ $item->audio_url }}', '{{ addslashes($item->title) }}')"
                            id="mobile-play-btn-{{ $item->id }}"
                            class="play-btn-{{ $item->id }} w-10 h-10 rounded-full bg-slate-100 hover:bg-[#FF2E3A] text-slate-700 hover:text-white transition flex items-center justify-center shadow-2xs shrink-0 cursor-pointer">
                        <svg class="w-4 h-4 play-icon" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        <svg class="w-4 h-4 pause-icon hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                    </button>
                    <div class="min-w-0 flex-1">
                        <h4 class="font-bold text-slate-900 text-sm truncate">{{ $item->title }}</h4>
                        <p class="text-xs text-slate-500 truncate">{{ $item->artist }} • {{ $item->category }}</p>
                        <div class="flex items-center gap-2 mt-1 text-[11px] text-slate-400 flex-wrap">
                            <span class="font-mono text-slate-600 font-semibold">{{ $item->formatted_duration }}</span>
                            <span>•</span>
                            <span class="text-sky-700 font-medium">{{ $isExternal ? 'URL Online' : 'MP3 Upload' }}</span>
                            <span>•</span>
                            <span class="text-slate-600 font-medium">{{ $item->invitations_count ?? 0 }} Undangan</span>
                        </div>
                    </div>
                </div>

                <!-- Footer Kartu: Dropdown Akses Paket & Aksi (Edit, Reorder, Delete) -->
                <div class="pt-2.5 border-t border-slate-100 flex items-center justify-between gap-2">
                    <form action="{{ route('admin.music.updateTier', $item) }}" method="POST" class="flex-1 max-w-[170px]">
                        @csrf
                        <select name="tier" onchange="this.form.submit()" class="w-full px-2 py-1 text-xs font-semibold rounded-lg border border-slate-200 bg-white text-slate-800 shadow-2xs focus:outline-none">
                            <option value="basic" {{ ($item->tier ?: 'basic') === 'basic' ? 'selected' : '' }}>Basic (5 Lagu)</option>
                            <option value="basic_addon_1" {{ $item->tier === 'basic_addon_1' ? 'selected' : '' }}>Add-On 1 (10 Lagu)</option>
                            <option value="basic_addon_2" {{ $item->tier === 'basic_addon_2' ? 'selected' : '' }}>Add-On 2 (20 Lagu)</option>
                            <option value="premium" {{ $item->tier === 'premium' ? 'selected' : '' }}>Premium</option>
                        </select>
                    </form>

                    <div class="flex items-center gap-1.5 shrink-0">
                        <button type="button" 
                                onclick="openEditMusicModal({{ json_encode([
                                    'id' => $item->id,
                                    'title' => $item->title,
                                    'artist' => $item->artist,
                                    'tier' => $item->tier,
                                    'duration' => $item->formatted_duration,
                                    'is_active' => (bool) $item->is_active,
                                    'source_type' => $isExternal ? 'url' : 'file',
                                    'audio_url' => $isExternal ? $item->file_path : '',
                                ]) }})"
                                class="p-1.5 rounded-lg border border-slate-200 hover:border-amber-400 hover:bg-amber-50 text-slate-600 hover:text-amber-600 transition"
                                title="Edit Informasi Lagu">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </button>

                        <button type="button" 
                                onclick="openReorderMusicModal('{{ $item->id }}', '{{ addslashes($item->title) }}', '{{ $item->order }}', '{{ $item->tier_label }}', '{{ $item->tier_order ?? ($tierOrders[$item->id] ?? 1) }}')"
                                class="p-1.5 rounded-lg border border-slate-200 hover:border-[#FF2E3A]/40 hover:bg-[#DBF6FF]/30 text-slate-600 hover:text-[#FF2E3A] transition"
                                title="Lompat ke No. X">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/></svg>
                        </button>

                        <button type="button" 
                                onclick="confirmDeleteMusic('{{ $item->id }}', '{{ addslashes($item->title) }}', '{{ $item->invitations_count ?? 0 }}')"
                                class="p-1.5 rounded-lg border border-red-200 bg-red-50/50 hover:bg-red-100 text-red-600 transition"
                                title="Hapus Lagu">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($musicList->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50/50">
            {{ $musicList->links() }}
        </div>
        @endif
        @endif
    </div>
</div>

<!-- ================= MODAL TAMBAH LAGU BARU ================= -->
<div id="add-music-modal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-xs flex items-center justify-center p-3 sm:p-6 hidden">
    <div class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden animate-scale-up">
        <!-- Header -->
        <div class="p-5 sm:p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/60">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-rose-100 text-rose-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 text-base">Tambah Lagu ke Pustaka</h3>
                    <p class="text-xs text-slate-500">Unggah MP3 atau masukkan link audio online.</p>
                </div>
            </div>
            <button type="button" onclick="closeAddMusicModal()" class="w-8 h-8 rounded-full bg-slate-200/80 hover:bg-slate-300 text-slate-600 hover:text-slate-900 flex items-center justify-center transition cursor-pointer">
                ✕
            </button>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.music.store') }}" method="POST" enctype="multipart/form-data" class="p-5 sm:p-6 space-y-4">
            @csrf

            <!-- 1. Title -->
            <div>
                <label for="music_title" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Judul Lagu <span class="text-red-500">*</span></label>
                <input type="text" id="music_title" name="title" required placeholder="Contoh: A Thousand Years" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]">
            </div>

            <!-- 2. Artist -->
            <div>
                <label for="music_artist" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Artis / Penyanyi / Komposer <span class="text-red-500">*</span></label>
                <input type="text" id="music_artist" name="artist" required placeholder="Contoh: Christina Perri (Acoustic Cover)" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]">
            </div>

            <!-- 2B. Paket Akses Lagu -->
            <div>
                <label for="music_tier" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Paket Akses Lagu <span class="text-red-500">*</span></label>
                <select id="music_tier" name="tier" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A] bg-white">
                    <option value="basic">Basic (5 Lagu Awal)</option>
                    <option value="basic_addon_1">Add-On 1 (+5 Lagu = Total 10 Lagu)</option>
                    <option value="basic_addon_2">Add-On 2 (+10 Lagu = Total 20 Lagu)</option>
                    <option value="premium">Premium (Eksklusif Premium)</option>
                </select>
            </div>

            <!-- 2C. Nomor Urut Lagu -->
            <div>
                <label for="music_order" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                    Nomor Urut Posisi Lagu (Opsional)
                </label>
                <input type="number" id="music_order" name="order" min="1" max="{{ $totalTracks + 1 }}" 
                       placeholder="Otomatis (Nomor #{{ $totalTracks + 1 }})" 
                       class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]">
                <p class="text-[11px] text-slate-500 mt-1">
                    Kosongkan untuk otomatis masuk nomor terakhir (<strong>#{{ $totalTracks + 1 }}</strong>), atau isi nomor spesifik untuk menyisipkan posisi lagu.
                </p>
            </div>

            <!-- 3. Source Type Selector -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Tipe Sumber Audio <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-2 gap-3">
                    <label class="flex items-center gap-2 p-3 rounded-xl border-2 border-slate-200 cursor-pointer hover:border-[#FF2E3A]/40 transition has-checked:border-[#FF2E3A] has-checked:bg-rose-50/20">
                        <input type="radio" name="source_type" value="file" checked onchange="toggleSourceType('file')" class="text-[#FF2E3A] focus:ring-[#FF2E3A]">
                        <div>
                            <span class="block text-xs font-bold text-slate-900">Upload File</span>
                            <span class="block text-[11px] text-slate-500">MP3, WAV, OGG</span>
                        </div>
                    </label>

                    <label class="flex items-center gap-2 p-3 rounded-xl border-2 border-slate-200 cursor-pointer hover:border-[#FF2E3A]/40 transition has-checked:border-[#FF2E3A] has-checked:bg-rose-50/20">
                        <input type="radio" name="source_type" value="url" onchange="toggleSourceType('url')" class="text-[#FF2E3A] focus:ring-[#FF2E3A]">
                        <div>
                            <span class="block text-xs font-bold text-slate-900">Tautan / URL</span>
                            <span class="block text-[11px] text-slate-500">Link MP3 Online</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- 4A. File Upload Container -->
            <div id="file-source-container">
                <label for="audio_file" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Pilih File Audio (.mp3, .wav, .ogg, max 25MB)</label>
                <input type="file" id="audio_file" name="audio_file" accept="audio/*,.mp3,.wav,.ogg,.m4a" class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100 cursor-pointer border border-slate-200 rounded-xl p-1.5">
            </div>

            <!-- 4B. URL Input Container -->
            <div id="url-source-container" class="hidden">
                <label for="audio_url" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">URL Audio Online (Direct MP3 URL)</label>
                <input type="url" id="audio_url" name="audio_url" placeholder="https://example.com/audio/song.mp3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]">
            </div>

            <!-- 5. Duration (Optional) -->
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label for="music_duration" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Durasi (Opsional)</label>
                    <input type="text" id="music_duration" name="duration" placeholder="Contoh: 03:45" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]">
                </div>

                <div class="flex items-center pt-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" checked class="rounded text-[#FF2E3A] focus:ring-[#FF2E3A]">
                        <span class="text-xs font-bold text-slate-700">Langsung Aktifkan</span>
                    </label>
                </div>
            </div>

            <!-- Actions -->
            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-2.5">
                <button type="button" onclick="closeAddMusicModal()" class="px-4 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-semibold transition cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#FF2E3A] hover:bg-[#E02631] text-white text-xs font-bold transition shadow-xs cursor-pointer">
                    Simpan Lagu
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ================= MODAL EDIT INFORMASI LAGU ================= -->
<div id="edit-music-modal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-xs flex items-center justify-center p-3 sm:p-6 hidden">
    <div class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden animate-scale-up">
        <!-- Header -->
        <div class="p-5 sm:p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/60">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 text-base">Edit Informasi Lagu</h3>
                    <p class="text-xs text-slate-500">Perbarui judul, nama artis, paket akses, atau ganti file audio.</p>
                </div>
            </div>
            <button type="button" onclick="closeEditMusicModal()" class="w-8 h-8 rounded-full bg-slate-200/80 hover:bg-slate-300 text-slate-600 hover:text-slate-900 flex items-center justify-center transition cursor-pointer">
                ✕
            </button>
        </div>

        <!-- Form -->
        <form id="edit-music-form" action="" method="POST" enctype="multipart/form-data" class="p-5 sm:p-6 space-y-4">
            @csrf
            @method('PUT')

            <!-- 1. Title -->
            <div>
                <label for="edit_music_title" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Judul Lagu <span class="text-red-500">*</span></label>
                <input type="text" id="edit_music_title" name="title" required placeholder="Contoh: Perfect" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500">
            </div>

            <!-- 2. Artist -->
            <div>
                <label for="edit_music_artist" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Artis / Penyanyi / Komposer <span class="text-red-500">*</span></label>
                <input type="text" id="edit_music_artist" name="artist" required placeholder="Contoh: Ed Sheeran" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500">
            </div>

            <!-- 2B. Paket Akses Lagu -->
            <div>
                <label for="edit_music_tier" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Paket Akses Lagu <span class="text-red-500">*</span></label>
                <select id="edit_music_tier" name="tier" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 bg-white">
                    <option value="basic">Basic (5 Lagu Awal)</option>
                    <option value="basic_addon_1">Add-On 1 (+5 Lagu = Total 10 Lagu)</option>
                    <option value="basic_addon_2">Add-On 2 (+10 Lagu = Total 20 Lagu)</option>
                    <option value="premium">Premium (Eksklusif Premium)</option>
                </select>
            </div>

            <!-- 3. Duration & Active -->
            <div class="grid grid-cols-2 gap-3 items-center">
                <div>
                    <label for="edit_music_duration" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Durasi</label>
                    <input type="text" id="edit_music_duration" name="duration" placeholder="Contoh: 03:45" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500">
                </div>

                <div class="flex items-center pt-5">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="edit_music_is_active" name="is_active" value="1" class="rounded text-amber-600 focus:ring-amber-500">
                        <span class="text-xs font-bold text-slate-700">Status Aktif</span>
                    </label>
                </div>
            </div>

            <!-- 4. Ganti Sumber Audio (Opsional) -->
            <div class="pt-2 border-t border-slate-100">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Ganti File Audio / Tautan (Opsional)</label>
                
                <div class="grid grid-cols-3 gap-2 mb-3">
                    <label class="flex items-center gap-1.5 p-2 rounded-xl border border-slate-200 cursor-pointer text-center hover:bg-slate-50 transition has-checked:border-amber-500 has-checked:bg-amber-50/30">
                        <input type="radio" name="source_type" value="keep" checked onchange="toggleEditSourceType('keep')" class="text-amber-600 focus:ring-amber-500">
                        <span class="text-xs font-semibold text-slate-800">Tetap Gunakan</span>
                    </label>
                    <label class="flex items-center gap-1.5 p-2 rounded-xl border border-slate-200 cursor-pointer text-center hover:bg-slate-50 transition has-checked:border-amber-500 has-checked:bg-amber-50/30">
                        <input type="radio" name="source_type" value="file" onchange="toggleEditSourceType('file')" class="text-amber-600 focus:ring-amber-500">
                        <span class="text-xs font-semibold text-slate-800">Upload MP3 Baru</span>
                    </label>
                    <label class="flex items-center gap-1.5 p-2 rounded-xl border border-slate-200 cursor-pointer text-center hover:bg-slate-50 transition has-checked:border-amber-500 has-checked:bg-amber-50/30">
                        <input type="radio" name="source_type" value="url" onchange="toggleEditSourceType('url')" class="text-amber-600 focus:ring-amber-500">
                        <span class="text-xs font-semibold text-slate-800">Tautan Baru</span>
                    </label>
                </div>

                <div id="edit-keep-container" class="p-2.5 bg-slate-50 rounded-xl text-xs text-slate-500 flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span class="truncate">Audio saat ini tetap dipertahankan.</span>
                </div>

                <div id="edit-file-container" class="hidden">
                    <input type="file" id="edit_audio_file" name="audio_file" accept="audio/*,.mp3,.wav,.ogg,.m4a" class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-800 hover:file:bg-amber-100 cursor-pointer border border-slate-200 rounded-xl p-1.5">
                </div>

                <div id="edit-url-container" class="hidden">
                    <input type="url" id="edit_audio_url" name="audio_url" placeholder="https://example.com/audio/song.mp3" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500">
                </div>
            </div>

            <!-- Footer Buttons -->
            <div class="flex items-center justify-end gap-2.5 pt-3 border-t border-slate-100">
                <button type="button" onclick="closeEditMusicModal()" class="px-4 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-semibold transition cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-stone-950 text-xs font-bold transition shadow-xs cursor-pointer">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ================= MODAL KONFIRMASI HAPUS LAGU ================= -->
<div id="delete-music-modal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-xs flex items-center justify-center p-4 hidden">
    <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-200 p-6 text-center animate-scale-up">
        <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-1">Hapus Lagu?</h3>
        <p class="text-xs text-slate-500 mb-3">
            Apakah Anda yakin ingin menghapus lagu <strong id="delete-music-title" class="text-slate-800"></strong> dari pustaka musik?
        </p>
        <div id="delete-music-usage-warning" class="hidden mb-4 p-3 bg-amber-50 border border-amber-200 rounded-xl text-xs text-amber-800 text-left">
            ⚠️ Lagu ini sedang digunakan oleh <span id="delete-music-usage-count" class="font-bold">0</span> undangan. Jika dihapus, undangan tersebut akan dialihkan menggunakan lagu bawaan tema.
        </div>

        <form id="delete-music-form" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="flex items-center justify-center gap-3">
                <button type="button" onclick="closeDeleteMusicModal()" class="flex-1 px-4 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-semibold transition cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-4 py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-bold transition shadow-xs cursor-pointer">
                    Ya, Hapus Lagu
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ================= MODAL PINDAH URUTAN NOMOR LAGU ================= -->
<div id="reorder-music-modal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-xs flex items-center justify-center p-4 hidden">
    <div class="relative w-full max-w-sm bg-white rounded-3xl shadow-2xl border border-slate-200 p-6 text-center animate-scale-up">
        <div class="w-12 h-12 rounded-2xl bg-rose-100 text-[#FF2E3A] flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
            </svg>
        </div>
        <h3 class="text-lg font-bold text-slate-900 mb-1">Pindah Urutan Lagu</h3>
        <p class="text-xs text-slate-500 mb-4">
            Atur nomor urut baru untuk lagu <strong id="reorder-music-title" class="text-slate-800"></strong>.
        </p>

        <form id="reorder-music-form" method="POST" action="">
            @csrf
            <div class="mb-5 text-left bg-slate-50 p-4 rounded-2xl border border-slate-200/80">
                <label for="reorder_target" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                    Pindah ke Nomor Urut (1 - {{ $totalTracks }})
                </label>
                <div class="flex items-center gap-3">
                    <div class="text-center">
                        <span class="block text-[10px] text-slate-400 font-bold uppercase">Nomor Asal</span>
                        <span id="reorder-current-order" class="inline-block mt-0.5 px-2.5 py-1 rounded-lg bg-slate-200 text-slate-700 font-mono font-bold text-sm">#1</span>
                        <span id="reorder-tier-badge" class="block text-[10px] text-slate-500 font-semibold mt-0.5"></span>
                    </div>
                    <span class="text-slate-400 font-bold">➔</span>
                    <div class="flex-1">
                        <span class="block text-[10px] text-slate-400 font-bold uppercase mb-0.5">Nomor Tujuan</span>
                        <input type="number" id="reorder_target" name="target_order" min="1" max="{{ $totalTracks }}" required 
                               class="w-full px-3 py-1.5 text-base font-bold font-mono text-center rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A] bg-white">
                    </div>
                </div>
                <p class="text-[11px] text-slate-500 mt-2">
                    Urutan lagu-lagu lainnya akan otomatis bergeser menyesuaikan nomor tujuan ini.
                </p>
            </div>

            <div class="flex items-center justify-center gap-3">
                <button type="button" onclick="closeReorderMusicModal()" class="flex-1 px-4 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-semibold transition cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-4 py-2.5 rounded-xl bg-[#FF2E3A] hover:bg-[#E02631] text-white text-xs font-bold transition shadow-xs cursor-pointer">
                    Terapkan Nomor
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let globalAudio = null;
let currentPlayingId = null;

function togglePlayAudio(id, url, title) {
    if (!globalAudio) {
        globalAudio = new Audio();
        globalAudio.addEventListener('ended', () => {
            resetAudioUi();
        });
    }

    if (currentPlayingId === id && !globalAudio.paused) {
        // Pause
        globalAudio.pause();
        resetAudioUi();
    } else {
        // Reset previous buttons
        resetAudioUi();

        // Play new track
        globalAudio.src = url;
        globalAudio.play().then(() => {
            currentPlayingId = id;
            updateTrackUi(id, true);
            showStatusBar(title);
        }).catch(err => {
            console.error('Audio play error:', err);
            alert('Tidak dapat memutar audio: format atau URL tidak dapat diakses.');
            resetAudioUi();
        });
    }
}

function stopGlobalAudio() {
    if (globalAudio) {
        globalAudio.pause();
        globalAudio.currentTime = 0;
    }
    resetAudioUi();
}

function updateTrackUi(id, isPlaying) {
    const btns = document.querySelectorAll('.play-btn-' + id);
    if (!btns || btns.length === 0) return;
    btns.forEach(btn => {
        const playIcon = btn.querySelector('.play-icon');
        const pauseIcon = btn.querySelector('.pause-icon');

        if (isPlaying) {
            btn.classList.add('bg-[#FF2E3A]', 'text-white');
            btn.classList.remove('bg-slate-100', 'text-slate-700');
            if (playIcon) playIcon.classList.add('hidden');
            if (pauseIcon) pauseIcon.classList.remove('hidden');
        } else {
            btn.classList.remove('bg-[#FF2E3A]', 'text-white');
            btn.classList.add('bg-slate-100', 'text-slate-700');
            if (playIcon) playIcon.classList.remove('hidden');
            if (pauseIcon) pauseIcon.classList.add('hidden');
        }
    });
}

function resetAudioUi() {
    if (currentPlayingId) {
        updateTrackUi(currentPlayingId, false);
        currentPlayingId = null;
    }
    const statusBar = document.getElementById('active-audio-status-bar');
    if (statusBar) statusBar.classList.add('hidden');
}

function showStatusBar(title) {
    const statusBar = document.getElementById('active-audio-status-bar');
    const trackName = document.getElementById('playing-track-name');
    if (statusBar && trackName) {
        trackName.textContent = title;
        statusBar.classList.remove('hidden');
        statusBar.classList.add('flex');
    }
}

// Modal Functions
function openAddMusicModal() {
    document.getElementById('add-music-modal').classList.remove('hidden');
}

function closeAddMusicModal() {
    document.getElementById('add-music-modal').classList.add('hidden');
}

function toggleSourceType(type) {
    const fileContainer = document.getElementById('file-source-container');
    const urlContainer = document.getElementById('url-source-container');
    const fileInput = document.getElementById('audio_file');
    const urlInput = document.getElementById('audio_url');

    if (type === 'file') {
        fileContainer.classList.remove('hidden');
        urlContainer.classList.add('hidden');
        if (urlInput) urlInput.value = '';
    } else {
        fileContainer.classList.add('hidden');
        urlContainer.classList.remove('hidden');
        if (fileInput) fileInput.value = '';
    }
}

function confirmDeleteMusic(id, title, usageCount) {
    const modal = document.getElementById('delete-music-modal');
    const titleEl = document.getElementById('delete-music-title');
    const form = document.getElementById('delete-music-form');
    const usageWarning = document.getElementById('delete-music-usage-warning');
    const usageCountEl = document.getElementById('delete-music-usage-count');

    if (titleEl) titleEl.textContent = title;
    if (form) form.action = '/admin/music/' + id;

    if (parseInt(usageCount) > 0) {
        if (usageCountEl) usageCountEl.textContent = usageCount;
        if (usageWarning) usageWarning.classList.remove('hidden');
    } else {
        if (usageWarning) usageWarning.classList.add('hidden');
    }

    modal.classList.remove('hidden');
}

function closeDeleteMusicModal() {
    document.getElementById('delete-music-modal').classList.add('hidden');
}

// Reorder Modal Functions
function openReorderMusicModal(id, title, currentOrder, tierLabel, tierOrder) {
    const modal = document.getElementById('reorder-music-modal');
    const form = document.getElementById('reorder-music-form');
    const titleEl = document.getElementById('reorder-music-title');
    const currentOrderEl = document.getElementById('reorder-current-order');
    const targetInput = document.getElementById('reorder_target');
    const tierBadgeEl = document.getElementById('reorder-tier-badge');

    if (!modal || !form) return;

    form.action = '/admin/music/' + id + '/move';
    if (titleEl) titleEl.textContent = `"${title}"`;
    if (currentOrderEl) currentOrderEl.textContent = '#' + currentOrder;
    if (tierBadgeEl) {
        tierBadgeEl.textContent = tierLabel ? `${tierLabel} #${tierOrder || 1}` : '';
    }
    if (targetInput) {
        targetInput.value = currentOrder;
        setTimeout(() => targetInput.focus(), 50);
    }

    modal.classList.remove('hidden');
}

function closeReorderMusicModal() {
    const modal = document.getElementById('reorder-music-modal');
    if (modal) modal.classList.add('hidden');
}

// Edit Music Modal Functions
function openEditMusicModal(item) {
    const modal = document.getElementById('edit-music-modal');
    const form = document.getElementById('edit-music-form');
    if (!modal || !form) return;

    form.action = '/admin/music/' + item.id;
    document.getElementById('edit_music_title').value = item.title || '';
    document.getElementById('edit_music_artist').value = item.artist || '';
    document.getElementById('edit_music_tier').value = item.tier || 'basic';
    document.getElementById('edit_music_duration').value = item.duration || '03:00';
    document.getElementById('edit_music_is_active').checked = !!item.is_active;

    // Reset source type to keep
    const radioKeep = form.querySelector('input[name="source_type"][value="keep"]');
    if (radioKeep) radioKeep.checked = true;
    toggleEditSourceType('keep');

    modal.classList.remove('hidden');
}

function closeEditMusicModal() {
    const modal = document.getElementById('edit-music-modal');
    if (modal) modal.classList.add('hidden');
}

function toggleEditSourceType(type) {
    const keepBox = document.getElementById('edit-keep-container');
    const fileBox = document.getElementById('edit-file-container');
    const urlBox = document.getElementById('edit-url-container');
    const fileInput = document.getElementById('edit_audio_file');
    const urlInput = document.getElementById('edit_audio_url');

    if (keepBox) keepBox.classList.toggle('hidden', type !== 'keep');
    if (fileBox) fileBox.classList.toggle('hidden', type !== 'file');
    if (urlBox) urlBox.classList.toggle('hidden', type !== 'url');

    if (type !== 'file' && fileInput) fileInput.value = '';
    if (type !== 'url' && urlInput) urlInput.value = '';
}

// ESC Key Listener for all modals
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeAddMusicModal();
        closeEditMusicModal();
        closeDeleteMusicModal();
        closeReorderMusicModal();
    }
});

// Preserve Scroll Position across actions
window.addEventListener('beforeunload', function() {
    try {
        sessionStorage.setItem('music_admin_scroll_pos', window.scrollY);
    } catch(e) {}
});

document.addEventListener('DOMContentLoaded', function() {
    try {
        const savedPos = sessionStorage.getItem('music_admin_scroll_pos');
        if (savedPos !== null) {
            window.scrollTo({ top: parseInt(savedPos), behavior: 'instant' });
            sessionStorage.removeItem('music_admin_scroll_pos');
        }
    } catch(e) {}
});
</script>
@endsection
