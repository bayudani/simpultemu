@extends('layouts.dashboard')

@section('title', 'Manajemen Tema & Musik - Admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Katalog Tema Undangan</h1>
            <p class="text-sm text-slate-500 mt-1">Kelola status aktif/nonaktif, tier harga, dan konfigurasi template lagu preset seluruh 20 tema pernikahan.</p>
        </div>
        <div class="flex items-center gap-2 flex-wrap">
            <button type="button" onclick="openBatchMusicModal()" 
                    class="px-4 py-2 rounded-xl bg-amber-500 hover:bg-amber-600 text-stone-950 font-bold text-xs shadow-xs transition flex items-center gap-1.5 cursor-pointer">
                <svg class="w-4 h-4 text-stone-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                <span>Kelola Semua Lagu Tema</span>
            </button>
            <span class="text-xs font-semibold text-slate-500 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                Total: <span class="text-[#FF2E3A] font-bold">{{ count($themes) }}</span> Tema
            </span>
        </div>
    </div>

    <!-- Navigation Bar -->
    @include('partials.admin-nav')

    <!-- Search & Filter Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-4 sm:p-5">
        <form method="GET" action="{{ route('admin.themes.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            <!-- Search Query -->
            <div class="sm:col-span-6 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama atau slug tema..." 
                       class="w-full pl-10 pr-4 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]">
            </div>

            <!-- Tier Filter -->
            <div class="sm:col-span-2">
                <select name="tier" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A] bg-white">
                    <option value="">Semua Tier</option>
                    <option value="basic" {{ request('tier') === 'basic' ? 'selected' : '' }}>Basic</option>
                    <option value="premium" {{ request('tier') === 'premium' ? 'selected' : '' }}>Premium</option>
                </select>
            </div>

            <!-- Status Filter -->
            <div class="sm:col-span-2">
                <select name="status" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A] bg-white">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <!-- Submit Button & Reset -->
            <div class="sm:col-span-2 flex items-center gap-2">
                <button type="submit" class="flex-1 px-4 py-2 rounded-xl bg-[#FF2E3A] hover:bg-[#E02631] text-white text-xs font-bold transition shadow-xs">
                    Filter
                </button>
                @if(request()->hasAny(['q', 'tier', 'status']))
                <a href="{{ route('admin.themes.index') }}" class="px-3 py-2 rounded-xl border border-slate-200 text-slate-500 hover:text-slate-800 text-xs font-semibold hover:bg-slate-50 transition">
                    Reset
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Themes Grid Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($themes as $theme)
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden flex flex-col justify-between hover:shadow-md transition-all group">
            <!-- Top Part -->
            <div>
                <!-- Mockup Preview Banner Header -->
                <div class="relative h-44 bg-slate-100 overflow-hidden flex items-center justify-center border-b border-slate-100">
                    <div class="w-24 h-40 transform scale-90 -translate-y-2 pointer-events-none">
                        @include('partials.theme-phone-mockup', ['theme' => $theme])
                    </div>
                    
                    <!-- Top Badges -->
                    <div class="absolute top-3 left-3 flex items-center gap-1.5">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $theme->tier === 'premium' ? 'bg-amber-500 text-white shadow-xs' : 'bg-slate-800 text-white' }}">
                            {{ $theme->tier }}
                        </span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-white/90 backdrop-blur-xs text-slate-700 shadow-2xs">
                            ID: {{ $theme->id }}
                        </span>
                    </div>

                    <!-- Status Toggle Badge (Top Right) -->
                    <div class="absolute top-3 right-3">
                        @if($theme->is_active)
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800 shadow-xs">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Aktif
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-slate-200 text-slate-700 shadow-xs">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                            Nonaktif
                        </span>
                        @endif
                    </div>
                </div>

                <!-- Theme Info -->
                <div class="p-4 sm:p-5">
                    <div class="flex items-start justify-between gap-2">
                        <div>
                            <h3 class="font-bold text-slate-900 text-base group-hover:text-[#FF2E3A] transition-colors">{{ $theme->name }}</h3>
                            <p class="text-xs text-slate-400 font-mono mt-0.5">{{ $theme->slug }}</p>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="text-sm font-bold text-slate-900">
                                {{ $theme->price > 0 ? 'Rp ' . number_format($theme->price, 0, ',', '.') : 'Gratis' }}
                            </span>
                        </div>
                    </div>

                    <p class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                        {{ $theme->description ?? 'Tema undangan pernikahan digital dengan desain modern dan responsif.' }}
                    </p>

                    <!-- Template Lagu (Musik Preset) Section -->
                    <div class="mt-3.5 p-3 bg-slate-50 border border-slate-200/80 rounded-xl flex items-center justify-between gap-2.5">
                        <div class="flex items-center gap-2.5 min-w-0">
                            <div class="w-8 h-8 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                            </div>
                            <div class="min-w-0">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block leading-tight">Musik Preset (Template Lagu)</span>
                                <span class="text-xs font-bold text-slate-800 truncate block mt-0.5" title="{{ $theme->preset_music_label }}">
                                    {{ $theme->preset_music_label }}
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 shrink-0">
                            @if($theme->default_music && $theme->default_music->audio_url)
                            <button type="button" 
                                    onclick="toggleCardAudioPreview('{{ $theme->default_music->audio_url }}', this)" 
                                    class="w-7 h-7 rounded-lg bg-white border border-slate-200 hover:border-amber-400 text-slate-600 hover:text-amber-600 flex items-center justify-center transition shadow-2xs" 
                                    title="Putar Cuplikan Lagu">
                                <svg class="w-3.5 h-3.5 play-icon" fill="currentColor" viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                                <svg class="w-3.5 h-3.5 pause-icon hidden" fill="currentColor" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
                            </button>
                            @endif
                            <button type="button" 
                                    onclick="openQuickMusicModal({{ $theme->id }}, '{{ addslashes($theme->name) }}', {{ $theme->default_music_id ?? 'null' }})" 
                                    class="px-2.5 py-1.5 rounded-lg bg-white border border-slate-200 hover:border-amber-500 hover:text-amber-600 text-slate-700 text-[11px] font-bold transition shadow-2xs flex items-center gap-1 cursor-pointer"
                                    title="Ganti Template Lagu">
                                <svg class="w-3 h-3 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                <span>Ganti</span>
                            </button>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <span>Digunakan: <strong class="text-slate-800 font-semibold">{{ $theme->invitations_count }}</strong> undangan</span>
                        <a href="{{ route('themes.demo', $theme->slug) }}" target="_blank" class="inline-flex items-center gap-1 text-[#FF2E3A] hover:underline font-semibold">
                            <span>Preview Demo</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Actions -->
            <div class="p-4 pt-0 flex items-center gap-2">
                <!-- Toggle Status Button -->
                <form method="POST" action="{{ route('admin.themes.toggleActive', $theme) }}" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full py-2 px-3 rounded-xl border text-xs font-bold transition {{ $theme->is_active ? 'border-slate-200 text-slate-700 hover:bg-slate-100' : 'border-emerald-300 bg-emerald-50 text-emerald-800 hover:bg-emerald-100' }}">
                        {{ $theme->is_active ? 'Nonaktifkan' : 'Aktifkan Tema' }}
                    </button>
                </form>

                <!-- Edit Button (Opens Modal) -->
                <button type="button" onclick="openEditThemeModal({{ $theme->id }}, '{{ addslashes($theme->name) }}', '{{ $theme->tier }}', {{ $theme->price }}, '{{ addslashes($theme->description ?? '') }}', {{ $theme->default_music_id ?? 'null' }})" 
                        class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-1 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    <span>Edit</span>
                </button>
            </div>
        </div>
        @empty
        <div class="col-span-full py-12 text-center text-slate-400 bg-white rounded-2xl border border-slate-200">
            Tidak ditemukan tema yang cocok dengan filter pencarian.
        </div>
        @endforelse
    </div>
</div>

<!-- ================= 1. MODAL EDIT DETAIL TEMA (LENGKAP) ================= -->
<div id="edit-theme-modal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-lg w-full shadow-2xl border border-slate-200 overflow-hidden transform transition-all max-h-[90vh] flex flex-col">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between shrink-0">
            <div>
                <h3 class="text-base font-bold text-slate-900">Edit Konfigurasi Tema</h3>
                <p class="text-xs text-slate-400 mt-0.5">Ubah nama, tier harga, template lagu preset, dan deskripsi tema.</p>
            </div>
            <button type="button" onclick="closeEditThemeModal()" class="text-slate-400 hover:text-slate-700 p-1 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form id="edit-theme-form" method="POST" action="" class="p-5 space-y-4 overflow-y-auto">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Nama Tema</label>
                <input type="text" id="modal-theme-name" name="name" required class="w-full px-3.5 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]">
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Tier</label>
                    <select id="modal-theme-tier" name="tier" required class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A] bg-white">
                        <option value="basic">Basic</option>
                        <option value="premium">Premium</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Harga (Rp)</label>
                    <input type="number" id="modal-theme-price" name="price" min="0" required class="w-full px-3.5 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]">
                </div>
            </div>

            <!-- Template Lagu (Musik Preset) -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Template Lagu (Musik Preset Katalog)</label>
                <select id="modal-theme-music" name="default_music_id" onchange="previewSelectMusicChange(this, 'modal-music-preview-box')" class="w-full px-3.5 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A] bg-white">
                    <option value="" data-url="">-- Gunakan Default Sistem (ID Tema / Lagu Pertama) --</option>
                    @foreach($musicList as $music)
                        <option value="{{ $music->id }}" data-url="{{ $music->audio_url }}" data-title="[{{ $music->tier_label }}] {{ $music->title }} – {{ $music->artist ?? 'Tanpa Artis' }}">
                            [{{ $music->tier_label }}] {{ $music->title }} – {{ $music->artist ?? 'Tanpa Artis' }}
                        </option>
                    @endforeach
                </select>
                
                <!-- Audio Preview Player inside modal -->
                <div id="modal-music-preview-box" class="mt-2.5 p-2.5 bg-amber-50 border border-amber-200/80 rounded-xl flex items-center justify-between gap-2 hidden">
                    <div class="flex items-center gap-2 min-w-0">
                        <svg class="w-4 h-4 text-amber-600 shrink-0" fill="currentColor" viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                        <span class="preview-title text-xs font-semibold text-amber-950 truncate">Pilih lagu untuk mendengarkan cuplikan</span>
                    </div>
                    <button type="button" onclick="toggleModalPreview('modal-music-preview-box')" class="px-3 py-1 rounded-lg bg-amber-500 hover:bg-amber-600 text-stone-950 text-xs font-bold transition shrink-0 cursor-pointer flex items-center gap-1">
                        <span class="preview-btn-text">Putar</span>
                    </button>
                </div>
                <p class="text-[11px] text-slate-400 mt-1">Lagu ini otomatis diputar di demo tema dan ditampilkan di header pratinjau modal sebagai "Musik Preset".</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi</label>
                <textarea id="modal-theme-desc" name="description" rows="3" class="w-full px-3.5 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]"></textarea>
            </div>

            <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2 shrink-0">
                <button type="button" onclick="closeEditThemeModal()" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 text-xs font-semibold cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 rounded-xl bg-[#FF2E3A] hover:bg-[#E02631] text-white text-xs font-bold transition shadow-xs cursor-pointer">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ================= 2. MODAL CEPAT GANTI LAGU TEMA ================= -->
<div id="quick-music-modal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl border border-slate-200 overflow-hidden transform transition-all">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h3 class="text-base font-bold text-slate-900">Atur Template Lagu Tema</h3>
                <p id="quick-music-theme-name" class="text-xs text-amber-700 font-semibold mt-0.5">Nama Tema</p>
            </div>
            <button type="button" onclick="closeQuickMusicModal()" class="text-slate-400 hover:text-slate-700 p-1 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form id="quick-music-form" method="POST" action="" class="p-5 space-y-4">
            @csrf
            @method('PATCH')
            
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">Pilih Template Lagu (Musik Preset)</label>
                <select id="quick-music-select" name="default_music_id" onchange="previewSelectMusicChange(this, 'quick-music-preview-box')" class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 bg-white">
                    <option value="" data-url="">-- Gunakan Default Sistem (ID Tema / Lagu Pertama) --</option>
                    @foreach($musicList as $music)
                        <option value="{{ $music->id }}" data-url="{{ $music->audio_url }}" data-title="[{{ $music->tier_label }}] {{ $music->title }} – {{ $music->artist ?? 'Tanpa Artis' }}">
                            [{{ $music->tier_label }}] {{ $music->title }} – {{ $music->artist ?? 'Tanpa Artis' }}
                        </option>
                    @endforeach
                </select>

                <!-- Audio Preview Player inside quick modal -->
                <div id="quick-music-preview-box" class="mt-3 p-3 bg-amber-50 border border-amber-200/80 rounded-xl flex items-center justify-between gap-2 hidden">
                    <div class="flex items-center gap-2 min-w-0">
                        <svg class="w-4 h-4 text-amber-600 shrink-0" fill="currentColor" viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                        <span class="preview-title text-xs font-semibold text-amber-950 truncate">Pilih lagu untuk mendengarkan cuplikan</span>
                    </div>
                    <button type="button" onclick="toggleModalPreview('quick-music-preview-box')" class="px-3 py-1 rounded-lg bg-amber-500 hover:bg-amber-600 text-stone-950 text-xs font-bold transition shrink-0 cursor-pointer flex items-center gap-1">
                        <span class="preview-btn-text">Putar</span>
                    </button>
                </div>
                <p class="text-[11px] text-slate-400 mt-2 leading-relaxed">
                    Pengunjung yang melihat demo tema ini di katalog publik (<code class="text-slate-600">/tema</code>) akan melihat nama lagu ini di header modal pratinjau dan mendengarkannya saat membuka undangan.
                </p>
            </div>

            <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2">
                <button type="button" onclick="closeQuickMusicModal()" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 text-xs font-semibold cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 rounded-xl bg-amber-500 hover:bg-amber-600 text-stone-950 text-xs font-bold transition shadow-xs cursor-pointer">
                    Simpan Lagu Preset
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ================= 3. MODAL MASSAL KELOLA SEMUA LAGU TEMA ================= -->
<div id="batch-music-modal" class="fixed inset-0 z-50 hidden bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-3xl w-full shadow-2xl border border-slate-200 overflow-hidden transform transition-all max-h-[90vh] flex flex-col">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between shrink-0">
            <div>
                <h3 class="text-base font-bold text-slate-900">Kelola Template Lagu Seluruh Tema (Katalog)</h3>
                <p class="text-xs text-slate-400 mt-0.5">Atur musik preset untuk setiap tema undangan yang ditampilkan di demo modal katalog.</p>
            </div>
            <button type="button" onclick="closeBatchMusicModal()" class="text-slate-400 hover:text-slate-700 p-1 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.themes.batchMusic') }}" class="flex flex-col flex-1 overflow-hidden">
            @csrf

            <!-- Search inside batch modal -->
            <div class="p-4 border-b border-slate-100 bg-slate-50/70 shrink-0">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <input type="text" id="batch-search-input" onkeyup="filterBatchThemeList()" placeholder="Cari nama tema di daftar..." 
                           class="w-full pl-9 pr-4 py-1.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 bg-white">
                </div>
            </div>

            <!-- Table of all themes -->
            <div class="overflow-y-auto flex-1 divide-y divide-slate-100 px-4">
                @foreach($themes as $theme)
                <div class="batch-theme-row py-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3" data-name="{{ strtolower($theme->name) }}">
                    <div class="flex items-center gap-2.5 min-w-0 sm:w-1/2">
                        <span class="w-6 h-6 rounded-md bg-slate-100 text-slate-600 font-mono text-[10px] font-bold flex items-center justify-center shrink-0">
                            {{ $theme->id }}
                        </span>
                        <div class="min-w-0">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-slate-900 text-xs truncate">{{ $theme->name }}</span>
                                <span class="px-1.5 py-0.5 rounded text-[9px] font-bold uppercase tracking-wider {{ $theme->tier === 'premium' ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-600' }}">
                                    {{ $theme->tier }}
                                </span>
                            </div>
                            <span class="text-[10px] text-slate-400 font-mono block truncate">{{ $theme->slug }}</span>
                        </div>
                    </div>
                    <div class="sm:w-1/2">
                        <select name="theme_music[{{ $theme->id }}]" class="w-full px-3 py-1.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 bg-white">
                            <option value="">-- Default Tema / Sistem --</option>
                            @foreach($musicList as $music)
                                <option value="{{ $music->id }}" {{ ($theme->default_music_id == $music->id) ? 'selected' : '' }}>
                                    [{{ $music->tier_label }}] {{ $music->title }} – {{ $music->artist ?? 'Tanpa Artis' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="p-4 border-t border-slate-100 flex items-center justify-end gap-2 shrink-0 bg-slate-50/50">
                <button type="button" onclick="closeBatchMusicModal()" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-white text-xs font-semibold cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 rounded-xl bg-amber-500 hover:bg-amber-600 text-stone-950 text-xs font-bold transition shadow-xs cursor-pointer">
                    Simpan Semua Template Lagu
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Shared Hidden Audio Element for Previews -->
<audio id="admin-preview-audio" preload="none"></audio>

<script>
    // Shared Audio State
    let activePlayingUrl = null;
    let activeCardButton = null;
    const previewAudio = document.getElementById('admin-preview-audio');

    previewAudio.addEventListener('ended', function() {
        resetAllCardAudioButtons();
    });

    previewAudio.addEventListener('pause', function() {
        if (activeCardButton) {
            activeCardButton.querySelector('.play-icon')?.classList.remove('hidden');
            activeCardButton.querySelector('.pause-icon')?.classList.add('hidden');
        }
    });

    previewAudio.addEventListener('play', function() {
        if (activeCardButton) {
            activeCardButton.querySelector('.play-icon')?.classList.add('hidden');
            activeCardButton.querySelector('.pause-icon')?.classList.remove('hidden');
        }
    });

    function toggleCardAudioPreview(url, btn) {
        if (!url) return;
        if (activePlayingUrl === url && !previewAudio.paused) {
            previewAudio.pause();
            resetAllCardAudioButtons();
            return;
        }

        resetAllCardAudioButtons();
        activePlayingUrl = url;
        activeCardButton = btn;
        previewAudio.src = url;
        previewAudio.play().catch(e => console.warn('Audio play restricted:', e));
    }

    function resetAllCardAudioButtons() {
        document.querySelectorAll('.play-icon').forEach(i => i.classList.remove('hidden'));
        document.querySelectorAll('.pause-icon').forEach(i => i.classList.add('hidden'));
    }

    // Modal Audio Preview Controller
    let currentModalPreviewUrl = '';
    function previewSelectMusicChange(selectEl, boxId) {
        const box = document.getElementById(boxId);
        if (!box) return;
        const selectedOption = selectEl.options[selectEl.selectedIndex];
        const audioUrl = selectedOption ? selectedOption.getAttribute('data-url') : '';
        const title = selectedOption ? selectedOption.getAttribute('data-title') : '';

        if (audioUrl) {
            currentModalPreviewUrl = audioUrl;
            box.querySelector('.preview-title').innerText = title || selectedOption.innerText;
            box.querySelector('.preview-btn-text').innerText = 'Putar';
            box.classList.remove('hidden');
        } else {
            currentModalPreviewUrl = '';
            box.classList.add('hidden');
            if (activePlayingUrl) previewAudio.pause();
        }
    }

    function toggleModalPreview(boxId) {
        const box = document.getElementById(boxId);
        if (!box || !currentModalPreviewUrl) return;
        const btnText = box.querySelector('.preview-btn-text');

        if (activePlayingUrl === currentModalPreviewUrl && !previewAudio.paused) {
            previewAudio.pause();
            btnText.innerText = 'Putar';
        } else {
            resetAllCardAudioButtons();
            activePlayingUrl = currentModalPreviewUrl;
            previewAudio.src = currentModalPreviewUrl;
            previewAudio.play().then(() => {
                btnText.innerText = 'Jeda';
            }).catch(e => console.warn(e));
        }
    }

    // 1. Edit Full Theme Modal
    function openEditThemeModal(id, name, tier, price, desc, defaultMusicId) {
        const form = document.getElementById('edit-theme-form');
        form.action = `/admin/themes/${id}`;
        document.getElementById('modal-theme-name').value = name;
        document.getElementById('modal-theme-tier').value = tier;
        document.getElementById('modal-theme-price').value = price;
        document.getElementById('modal-theme-desc').value = desc;

        const musicSelect = document.getElementById('modal-theme-music');
        musicSelect.value = defaultMusicId || '';
        previewSelectMusicChange(musicSelect, 'modal-music-preview-box');

        document.getElementById('edit-theme-modal').classList.remove('hidden');
    }

    function closeEditThemeModal() {
        if (!previewAudio.paused) previewAudio.pause();
        document.getElementById('edit-theme-modal').classList.add('hidden');
    }

    // 2. Quick Music Modal
    function openQuickMusicModal(themeId, themeName, defaultMusicId) {
        const form = document.getElementById('quick-music-form');
        form.action = `/admin/themes/${themeId}/music`;
        document.getElementById('quick-music-theme-name').innerText = themeName;
        const select = document.getElementById('quick-music-select');
        select.value = defaultMusicId || '';
        previewSelectMusicChange(select, 'quick-music-preview-box');
        document.getElementById('quick-music-modal').classList.remove('hidden');
    }

    function closeQuickMusicModal() {
        if (!previewAudio.paused) previewAudio.pause();
        document.getElementById('quick-music-modal').classList.add('hidden');
    }

    // 3. Batch Music Modal
    function openBatchMusicModal() {
        document.getElementById('batch-music-modal').classList.remove('hidden');
    }

    function closeBatchMusicModal() {
        document.getElementById('batch-music-modal').classList.add('hidden');
    }

    function filterBatchThemeList() {
        const query = document.getElementById('batch-search-input').value.toLowerCase().trim();
        document.querySelectorAll('.batch-theme-row').forEach(row => {
            const name = row.getAttribute('data-name') || '';
            row.style.display = name.includes(query) ? '' : 'none';
        });
    }
</script>
@endsection
