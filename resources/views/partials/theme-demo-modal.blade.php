<!-- ================= MODAL PRATINJAU / DEMO TEMA (RESPONSIF PENUH SESUAI DEVICE) ================= -->
<div id="theme-demo-modal" class="fixed inset-0 z-50 bg-stone-950 flex flex-col hidden transition-all duration-300">
    <!-- Modal Top Header Bar -->
    <div class="px-4 sm:px-6 py-2.5 sm:py-3 bg-stone-950/95 backdrop-blur border-b border-stone-800 flex items-center justify-between text-white shrink-0 gap-3 z-30">
        <!-- Left: Theme Info -->
        <div class="flex items-center gap-2.5 sm:gap-3 min-w-0">
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse shrink-0"></span>
            <div class="min-w-0">
                <div class="flex items-center gap-2 flex-wrap">
                    <h3 id="demo-modal-theme-name" class="font-serif font-bold text-sm sm:text-base text-amber-200 truncate">Basic Harmony Maroon</h3>
                    <span id="demo-modal-theme-tier" class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-emerald-500 text-white shrink-0">BASIC</span>
                </div>
                <p class="text-[10px] text-stone-400 font-sans truncate mt-0.5">Musik Preset: <span id="demo-modal-theme-song" class="text-stone-300 font-medium">Solo Acoustic Serenade</span></p>
            </div>
        </div>

        <!-- Right: Close Button [X] -->
        <div class="flex items-center gap-2 shrink-0">
            <button type="button" onclick="closeThemeDemoModal()" class="w-9 h-9 rounded-xl bg-stone-900 border border-stone-800 hover:bg-stone-800 text-stone-300 hover:text-white flex items-center justify-center transition cursor-pointer" title="Tutup Demo">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Modal Body: Full Responsive Viewport Display (Natural Device View - No Fake Smartphone Bezel) -->
    <div id="demo-viewport-outer" class="flex-1 w-full h-full relative bg-black flex flex-col overflow-hidden">
        <!-- Kept element IDs for JS backward compatibility, with full width & height -->
        <div id="preview-mockup-frame" data-viewport-wrapper="demo-viewport-wrapper" class="w-full h-full flex-1 relative flex flex-col overflow-hidden bg-black">
            <div id="phone-screen-container" class="relative w-full h-full flex-1 overflow-hidden bg-black flex flex-col">
                <!-- Real Public Single-Engine Template Iframe -->
                <iframe id="theme-demo-iframe" src="about:blank" class="w-full h-full border-0 bg-transparent flex-1 scrollbar-none" allow="autoplay; fullscreen" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <!-- Modal Footer Action Bar (Sticky CTA) -->
    <div class="px-4 sm:px-6 py-2.5 sm:py-3 bg-stone-950/95 backdrop-blur border-t border-stone-800 flex items-center justify-between gap-3 shrink-0 z-30">
        <button type="button" onclick="closeThemeDemoModal()" class="px-4 py-2 sm:py-2.5 rounded-xl border border-stone-700 hover:bg-stone-800 text-stone-300 text-xs font-semibold transition cursor-pointer">
            Tutup Demo
        </button>
        <button type="button" onclick="selectThemeFromDemo()" class="px-5 sm:px-6 py-2 sm:py-2.5 rounded-xl bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-xs font-semibold shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:scale-[1.02] active:scale-[0.98] transition flex items-center gap-1.5 cursor-pointer">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
            </svg>
            <span>Buat dengan Tema Ini</span>
        </button>
    </div>
</div>

@php
    $themeMusicMap = \App\Models\Theme::where('is_active', true)->get()->mapWithKeys(function ($t) {
        return [$t->id => [
            'id' => $t->default_music_id,
            'label' => $t->preset_music_label,
            'title' => $t->default_music?->title,
            'artist' => $t->default_music?->artist,
        ]];
    });
@endphp
<script>
    window.THEME_PRESET_MUSIC = @json($themeMusicMap);
    if (typeof THEMES_CONFIG !== 'undefined' && window.THEME_PRESET_MUSIC) {
        for (const [tId, m] of Object.entries(window.THEME_PRESET_MUSIC)) {
            if (THEMES_CONFIG[tId]) {
                if (m.id) THEMES_CONFIG[tId].defaultMusicId = m.id;
                if (m.label) THEMES_CONFIG[tId].defaultMusic = m.label;
            }
        }
    }
</script>
