{{-- Premium Melayu Pixelated - Retro 8-bit / 16-bit Pixel-Art RPG Wedding Adventure Theme --}}
<style>
@import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Silkscreen:wght@400;700&family=VT323&display=swap');

.font-pixel-title {
    font-family: 'Press Start 2P', monospace;
    image-rendering: pixelated;
}
.font-pixel-body {
    font-family: 'Silkscreen', monospace;
    image-rendering: pixelated;
}
.font-pixel-retro {
    font-family: 'VT323', monospace;
    image-rendering: pixelated;
}
.pixel-crisp {
    image-rendering: pixelated;
    image-rendering: -moz-crisp-edges;
    image-rendering: crisp-edges;
    -ms-interpolation-mode: nearest-neighbor;
}
.retro-card {
    background-color: #FAF4E6;
    border: 3px solid #3D271D;
    box-shadow: 0 6px 0 #2A170E;
}
.retro-card-sm {
    background-color: #FAF4E6;
    border: 2px solid #3D271D;
    box-shadow: 0 3px 0 #2A170E;
}
.retro-btn {
    background-color: #E4C580;
    border: 2px solid #3D271D;
    box-shadow: 0 4px 0 #3D271D;
    transition: transform 0.08s ease, box-shadow 0.08s ease;
}
.retro-btn:active {
    transform: translateY(3px);
    box-shadow: 0 1px 0 #3D271D;
}
.station-pulse {
    animation: stationPulse 2s ease-in-out infinite;
}
@keyframes stationPulse {
    0%, 100% { transform: translateX(-50%) translateY(0); }
    50% { transform: translateX(-50%) translateY(-4px); }
}
.pelaminan-breathe {
    animation: pelaminanBreathe 3s ease-in-out infinite;
}
@keyframes pelaminanBreathe {
    0%, 100% { transform: translateX(-50%) scale(1); }
    50% { transform: translateX(-50%) scale(1.02); }
}
.char-select-card.active {
    border-color: #8B2500 !important;
    background-color: #FAF0D7 !important;
    box-shadow: 0 0 0 2px #D4AF37, 0 4px 0 #3D271D !important;
}
#pixel-game-viewport, #invitation-cover, .retro-card, .retro-card-sm, .retro-modal-content {
    color: #2C1810 !important;
}
.retro-card, .retro-card-sm {
    background-color: #FAF4E6 !important;
    border: 3px solid #3D271D !important;
    color: #2C1810 !important;
}
.retro-card-sm {
    border-width: 2px !important;
}
.retro-btn {
    background-color: #E4C580 !important;
    border: 2px solid #3D271D !important;
    color: #2C1810 !important;
}
.retro-modal-content, .retro-modal-content * {
    color: #2C1810 !important;
}
.retro-modal-content .text-muted, .retro-modal-content .text-stone-500, .retro-modal-content .text-stone-600 {
    color: #6B4B3E !important;
}
.retro-modal-content .text-accent, .retro-modal-content .text-primary-accent, .retro-modal-content .text-red-700, .retro-modal-content .text-rose-600 {
    color: #8B2500 !important;
}
.retro-card p, .retro-card span, .retro-card h1, .retro-card h2, .retro-card h3, .retro-card h4, .retro-card div,
.retro-card-sm p, .retro-card-sm span, .retro-card-sm h1, .retro-card-sm h2, .retro-card-sm h3, .retro-card-sm h4, .retro-card-sm div {
    color: inherit;
}
.floating-badge {
    color: #2C1810 !important;
}
.floating-badge span {
    color: #2C1810 !important;
}
</style>

<!-- ================= 1. COVER / CHARACTER SELECTION OVERLAY (MATCHING ref-welcome-character-select.jpg) ================= -->
<div id="invitation-cover" data-test="invitation-cover-overlay" class="fixed inset-0 z-[60] flex items-center justify-center p-3 select-none bg-[#1A0E08] transition-all duration-700 overflow-y-auto">
    <!-- Clean Hall Background preview -->
    <div class="absolute inset-0 pixel-crisp pointer-events-none" style="background: url('/images/themes/melayu-pixelated/bg-hall-clean.jpg') center/cover no-repeat; filter: blur(3px) brightness(0.65);"></div>

    <!-- Center Welcome Card Container -->
    <div class="relative z-10 w-full max-w-sm sm:max-w-md mx-auto my-auto flex flex-col items-center text-center">
        <!-- Top SAKINAH HALL QUEST Banner -->
        <div class="mb-2 px-3 py-1.5 rounded-lg bg-[#1B4332] border-2 border-[#D4AF37] shadow-xl text-center">
            <span class="block text-[8px] sm:text-[9px] font-pixel-title text-amber-300 tracking-wider">SAKINAH HALL QUEST</span>
            <span class="block text-[11px] sm:text-xs font-pixel-title text-white tracking-widest uppercase mt-0.5">UNDANGAN PERNIKAHAN</span>
        </div>

        <!-- Bride & Groom Standing Sprite on Stage -->
        <div class="w-32 sm:w-40 h-auto my-2 drop-shadow-[0_8px_16px_rgba(0,0,0,0.6)] pixel-crisp">
            <img src="/images/themes/melayu-pixelated/characters/bride_groom.png" alt="Pengantin" class="w-full h-auto object-contain">
        </div>

        <!-- Main Quest Welcome Card -->
        <div class="w-full retro-card rounded-2xl p-4 sm:p-5 text-[#3D271D] text-center space-y-3">
            <div class="space-y-1">
                <h1 class="text-base sm:text-lg font-pixel-title text-[#2C1810] !text-[#2C1810] leading-tight font-bold">
                    {{ $invitation->groom_nickname ?? $invitation->groom_name ?? 'Dias' }} &amp; {{ $invitation->bride_nickname ?? $invitation->bride_name ?? 'Azalia' }}
                </h1>
                <p class="text-[10px] sm:text-xs font-pixel-body text-[#5C3D2E] !text-[#5C3D2E] font-semibold">
                    {{ $invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : 'Rabu, 30 September 2026' }}
                </p>
            </div>

            <!-- Guest Tag -->
            <div class="py-1 px-3 rounded-lg bg-[#EFE5CD] border border-[#3D271D]/40 text-xs font-pixel-body text-[#2C1810] !text-[#2C1810]">
                Kepada Yth., <span class="font-bold text-[#8B2500]">{{ $guestName }}</span>
            </div>

            <p class="text-[10px] sm:text-[11px] font-pixel-body text-[#5C3D2E] leading-relaxed">
                Yuk jalan-jalan keliling peta pernikahan kami dan sapa pasangan.
            </p>

            <!-- PILIH KARAKTER SECTION -->
            <div class="pt-1 text-left">
                <p class="text-[9px] sm:text-[10px] font-pixel-title text-[#3D271D] mb-1.5 uppercase">
                    PILIH KARAKTER
                </p>
                <div class="grid grid-cols-2 gap-2">
                    <!-- Male Option -->
                    <div id="opt-char-male" onclick="selectAvatar('male')" class="char-select-card active p-2 rounded-xl border-2 border-[#3D271D] bg-[#FAF4E6] flex items-center gap-2 cursor-pointer transition select-none">
                        <div class="w-8 h-12 flex-shrink-0 flex items-center justify-center">
                            <img src="/images/themes/melayu-pixelated/characters/male/front_walk_1.png" alt="Pria" class="w-full h-full object-contain pixel-crisp">
                        </div>
                        <div class="min-w-0">
                            <p class="text-[10px] font-pixel-title text-[#3D271D]">PRIA</p>
                            <p class="text-[8px] font-pixel-body text-[#78543E] truncate">Busana bawaan tema</p>
                        </div>
                    </div>

                    <!-- Female Option -->
                    <div id="opt-char-female" onclick="selectAvatar('female')" class="char-select-card p-2 rounded-xl border-2 border-[#3D271D]/40 bg-[#FAF4E6] opacity-80 flex items-center gap-2 cursor-pointer transition select-none">
                        <div class="w-8 h-12 flex-shrink-0 flex items-center justify-center">
                            <img src="/images/themes/melayu-pixelated/characters/female/front_walk_1.png" alt="Wanita" class="w-full h-full object-contain pixel-crisp">
                        </div>
                        <div class="min-w-0">
                            <p class="text-[10px] font-pixel-title text-[#3D271D]">WANITA</p>
                            <p class="text-[8px] font-pixel-body text-[#78543E] truncate">Busana bawaan tema</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start Exploration Button -->
            <button id="btn-open-invitation" type="button" onclick="startMelayuPixelQuest()" class="btn-open-invitation retro-btn w-full py-3 rounded-xl text-xs sm:text-sm font-pixel-title text-[#3D271D] tracking-wider uppercase flex items-center justify-center gap-2 cursor-pointer">
                <span><svg class="w-3 h-3 fill-current inline-block shrink-0" viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg> MULAI JELAJAHI</span>
            </button>
        </div>

        <!-- Controller Hint Pill -->
        <div class="mt-2.5 px-3 py-1 rounded-full bg-[#1B4332]/90 border border-[#D4AF37]/60 text-[9px] sm:text-[10px] font-pixel-body text-amber-200 shadow-md">
            Geser joystick &bull; WASD &bull; tombol panah
        </div>
    </div>
</div>

<!-- ================= 2. THE INTERACTIVE GAME VIEWPORT ================= -->
<div id="melayu-game-viewport" class="fixed inset-0 w-full h-[100dvh] max-h-[100dvh] overflow-hidden select-none bg-[#1A0E08] flex items-center justify-center">
    <!-- Responsive Game Stage (aspect ratio 726/1024) -->
    <div id="melayu-game-stage" class="relative overflow-hidden pixel-crisp select-none shadow-2xl"
         style="width: 100%; height: 100%; max-width: min(100vw, calc(100dvh * 726 / 1024)); max-height: 100dvh; aspect-ratio: 726 / 1024; background: url('/images/themes/melayu-pixelated/bg-hall-clean.jpg') center/cover no-repeat;">

        <!-- 2.1 PEMAIN KOMPANG (3 Musisi di pelaminan kiri dengan animasi tepuk rebana loop) -->
        <div id="kompang-musicians" class="absolute pointer-events-none z-10 pixel-crisp" style="left: 20%; top: 18.5%; width: 23%; transform: translate(-50%, -50%);">
            <img id="kompang-sprite-1" src="/images/themes/melayu-pixelated/characters/kompang_1.png" alt="Pemain Kompang 1" class="w-full h-auto object-contain block">
            <img id="kompang-sprite-2" src="/images/themes/melayu-pixelated/characters/kompang_2.png" alt="Pemain Kompang 2" class="w-full h-auto object-contain hidden">
        </div>

        <!-- 2.2 PENGANTIN DI PELAMINAN UTAMA -->
        <div id="bride-groom-stage" class="absolute z-10 pixel-crisp cursor-pointer pelaminan-breathe" style="left: 49.5%; top: 14.5%; width: 27%;" onclick="openModal('pasangan')">
            <img src="/images/themes/melayu-pixelated/characters/bride_groom.png" alt="Pengantin Melayu" class="w-full h-auto object-contain drop-shadow-[0_6px_12px_rgba(0,0,0,0.4)]">
        </div>

        <!-- 2.3 FLOATING STATION BADGES OVER INTERACTIVE OBJECTS (Matching ref-gameplay-hud.jpg) -->
        <!-- PASANGAN (Pelaminan Panggung) -->
        <div class="absolute z-20 station-pulse cursor-pointer" style="left: 50%; top: 25%;" onclick="openModal('pasangan')">
            <div class="retro-card-sm px-2.5 py-1 rounded-md text-[8.5px] sm:text-[9.5px] font-pixel-title text-[#2C1810] !text-[#2C1810] flex items-center gap-1.5 hover:brightness-105 shadow-md">
                <svg class="w-3.5 h-3.5 text-rose-600 fill-current inline-block shrink-0" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                <span class="font-bold text-[#2C1810] !text-[#2C1810]">PASANGAN</span>
            </div>
        </div>

        <!-- ACARA (Meja Acara / Cermin Kiri Atas) -->
        <div class="absolute z-20 station-pulse cursor-pointer" style="left: 26%; top: 34.5%;" onclick="openModal('acara')">
            <div class="retro-card-sm px-2.5 py-1 rounded-md text-[8px] sm:text-[9px] font-pixel-title text-[#2C1810] !text-[#2C1810] flex items-center gap-1.5 hover:brightness-105 shadow-md">
                <svg class="w-3.5 h-3.5 text-emerald-700 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                <span class="font-bold text-[#2C1810] !text-[#2C1810]">ACARA</span>
            </div>
        </div>

        <!-- GALERI (Jendela Galeri Kanan Atas) -->
        <div class="absolute z-20 station-pulse cursor-pointer" style="left: 77.5%; top: 34.5%;" onclick="openModal('galeri')">
            <div class="retro-card-sm px-2.5 py-1 rounded-md text-[8px] sm:text-[9px] font-pixel-title text-[#2C1810] !text-[#2C1810] flex items-center gap-1.5 hover:brightness-105 shadow-md">
                <svg class="w-3.5 h-3.5 text-blue-700 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                <span class="font-bold text-[#2C1810] !text-[#2C1810]">GALERI</span>
            </div>
        </div>

        <!-- UCAPAN & RSVP (Meja Buku Tamu Kiri Tengah) -->
        <div class="absolute z-20 station-pulse cursor-pointer" style="left: 25.5%; top: 50.5%;" onclick="openModal('rsvp')">
            <div class="retro-card-sm px-2.5 py-1 rounded-md text-[7.5px] sm:text-[8.5px] font-pixel-title text-[#2C1810] !text-[#2C1810] flex items-center gap-1.5 hover:brightness-105 shadow-md">
                <svg class="w-3.5 h-3.5 text-amber-700 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                <span class="font-bold text-[#2C1810] !text-[#2C1810]">UCAPAN &amp; RSVP</span>
            </div>
        </div>

        <!-- STUDIO PHOTOBOOTH (Stan Foto Kanan Tengah) -->
        <div class="absolute z-20 station-pulse cursor-pointer" style="left: 77.5%; top: 50.5%;" onclick="openModal('photobox')">
            <div class="retro-card-sm px-2 py-1 rounded-md text-[7px] sm:text-[8px] font-pixel-title text-[#2C1810] !text-[#2C1810] flex items-center gap-1.5 hover:brightness-105 shadow-md whitespace-nowrap">
                <svg class="w-3.5 h-3.5 text-purple-700 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <span class="font-bold text-[#2C1810] !text-[#2C1810]">STUDIO PHOTOBOOTH</span>
            </div>
        </div>

        <!-- HADIAH (Meja Kado Kiri Bawah) -->
        <div class="absolute z-20 station-pulse cursor-pointer" style="left: 25.5%; top: 68.5%;" onclick="openModal('hadiah')">
            <div class="retro-card-sm px-2.5 py-1 rounded-md text-[8px] sm:text-[9px] font-pixel-title text-[#2C1810] !text-[#2C1810] flex items-center gap-1.5 hover:brightness-105 shadow-md">
                <svg class="w-3.5 h-3.5 text-rose-600 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
                <span class="font-bold text-[#2C1810] !text-[#2C1810]">HADIAH</span>
            </div>
        </div>

        <!-- 2.4 PLAYER AVATAR LAYER -->
        <div id="player-avatar" class="absolute z-20 pixel-crisp pointer-events-none transition-transform" style="left: 50%; top: 86%; width: 9.5%; transform: translate(-50%, -100%);">
            <!-- Name tag -->
            <div class="mx-auto mb-0.5 px-1 py-0.2 rounded bg-black/75 text-white font-pixel-body text-[7px] sm:text-[8px] text-center w-max max-w-[80px] truncate shadow-xs">
                Tamu
            </div>
            <!-- Sprite Image -->
            <div class="relative w-full aspect-[605/1024]">
                <img id="player-sprite-img" src="/images/themes/melayu-pixelated/characters/male/front_walk_1.png" alt="Player" class="w-full h-full object-contain pixel-crisp block">
            </div>
            <!-- Ground Contact Shadow -->
            <div class="w-7 h-2 rounded-full bg-black/35 mx-auto -mt-1.5 filter blur-[0.5px]"></div>
        </div>

        <!-- 2.5 TOP HUD: Musik ON/OFF & Sapa Tamu Button (Matching ref-gameplay-hud.jpg) -->
        <div class="absolute top-2.5 inset-x-3 z-30 flex items-center justify-between pointer-events-auto">
            <!-- Musik Toggle Pill -->
            <button type="button" onclick="toggleMelayuAudio()" class="px-2.5 py-1 rounded-xl bg-[#2C1810]/90 border-2 border-[#D4AF37] text-amber-200 font-pixel-body text-[9px] sm:text-[10px] flex items-center gap-1.5 shadow-lg hover:bg-[#3D271D] active:scale-95 transition cursor-pointer">
                <span id="melayu-music-icon">&#9835;</span>
                <span>MUSIK <strong id="melayu-music-state" class="text-emerald-400">ON</strong></span>
            </button>

            <!-- Sapa Tamu / Ucapan Pill -->
            <button type="button" onclick="openModal('rsvp')" class="px-2.5 py-1 rounded-xl bg-[#2C1810]/90 border-2 border-[#D4AF37] text-amber-200 font-pixel-body text-[9px] sm:text-[10px] flex items-center gap-1.5 shadow-lg hover:bg-[#3D271D] active:scale-95 transition cursor-pointer">
                <span><svg class="w-3.5 h-3.5 text-amber-800 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></span>
                <span>SAPA TAMU</span>
            </button>
        </div>

        <!-- 2.6 PROXIMITY TOP BANNER PROMPT (Appears when near a station) -->
        <div id="hud-proximity-banner" class="hidden absolute top-12 left-1/2 -translate-x-1/2 z-30 px-3 py-1.5 rounded-xl bg-[#FAF4E6] border-2 border-[#3D271D] shadow-xl flex items-center gap-2 font-pixel-body text-[10px] sm:text-xs text-[#3D271D] pointer-events-auto animate-bounce">
            <span id="hud-prompt-text">Sapa pasangan</span>
            <button id="hud-prompt-btn" type="button" onclick="triggerCurrentProximityAction()" class="px-2 py-0.5 rounded bg-[#E4C580] border border-[#3D271D] font-pixel-title text-[8px] sm:text-[9px] text-[#3D271D] shadow-xs active:translate-y-0.5 cursor-pointer">
                SENTUH
            </button>
        </div>

        <!-- 2.7 VIRTUAL ANALOG JOYSTICK (Positioned over bottom-left ornamental ring) -->
        <div id="joystick-zone" class="absolute z-30 pointer-events-auto select-none" style="left: 6%; bottom: 13%; width: 115px; height: 115px;">
            <!-- Outer Ring Base with Directional Arrows -->
            <div id="joystick-base" class="relative w-full h-full rounded-full bg-[#FAF4E6]/90 border-2 border-[#3D271D] shadow-[0_4px_12px_rgba(0,0,0,0.35)] flex items-center justify-center">
                <!-- Arrow Indicators (North, East, South, West) -->
                <span class="absolute top-1 left-1/2 -translate-x-1/2 text-[9px] text-[#3D271D] font-bold select-none">&#9650;</span>
                <span class="absolute bottom-1 left-1/2 -translate-x-1/2 text-[9px] text-[#3D271D] font-bold select-none">&#9660;</span>
                <span class="absolute left-1 top-1/2 -translate-y-1/2 text-[9px] text-[#3D271D] font-bold select-none">&#9668;</span>
                <span class="absolute right-1 top-1/2 -translate-y-1/2 text-[9px] text-[#3D271D] font-bold select-none">&#9658;</span>

                <!-- Draggable Inner Thumbstick Knob -->
                <div id="joystick-knob" class="absolute w-12 h-12 rounded-full bg-[#EAD8B7] border-2 border-[#3D271D] shadow-md flex items-center justify-center cursor-grab active:cursor-grabbing transition-transform" style="transform: translate(0px, 0px);">
                    <div class="w-3.5 h-3.5 rounded-full bg-[#8B5E3C] border border-[#3D271D]/40"></div>
                </div>
            </div>
        </div>

        <!-- 2.8 ACTION BUTTON "A" (Positioned over bottom-right octagonal ornament) -->
        <div id="action-btn-zone" class="absolute z-30 pointer-events-auto select-none" style="right: 7%; bottom: 14.5%; width: 72px; height: 72px;">
            <!-- Floating proximity label above button A -->
            <div id="action-prompt-badge" class="hidden absolute -top-6 left-1/2 -translate-x-1/2 px-2 py-0.5 rounded bg-[#FAF4E6] border border-[#3D271D] text-[#3D271D] font-pixel-title text-[7.5px] uppercase shadow-sm whitespace-nowrap">
                <span id="action-prompt-name">Aksi</span>
            </div>

            <!-- The A Button -->
            <button id="btn-action-a" type="button" onclick="triggerCurrentProximityAction()" class="w-full h-full rounded-full bg-[#FAF4E6] hover:bg-[#F3E7CF] active:scale-95 border-3 border-[#3D271D] shadow-[0_5px_0_#3D271D] flex items-center justify-center transition-all cursor-pointer group">
                <span class="font-pixel-title text-2xl text-[#3D271D] group-active:translate-y-0.5">A</span>
            </button>
        </div>

        <!-- 2.9 BOTTOM DOCK MENU BAR (Matching ref-dock-icons.jpg & ref-gameplay-hud.jpg) -->
        <div id="bottom-dock-bar" class="absolute inset-x-0 bottom-0 z-30 pointer-events-auto retro-card rounded-t-2xl px-1.5 py-1.5 flex flex-col justify-between" style="height: 74px; border-bottom: none; border-left: none; border-right: none; background-color: #FAF4E6;">
            <div class="flex items-center justify-around gap-0.5 overflow-x-auto scrollbar-none px-0.5">
                <!-- PASANGAN -->
                <button type="button" onclick="openModal('pasangan')" class="dock-item flex flex-col items-center justify-center flex-1 min-w-[50px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer">
                    <img src="/images/themes/melayu-pixelated/characters/bride_groom.png" alt="Pasangan" class="w-6 h-6 object-contain pixel-crisp drop-shadow-xs">
                    <span class="text-[7.5px] sm:text-[8px] font-pixel-title text-[#2C1810] !text-[#2C1810] font-bold mt-0.5">PASANGAN</span>
                </button>

                <!-- ACARA -->
                <button type="button" onclick="openModal('acara')" class="dock-item flex flex-col items-center justify-center flex-1 min-w-[44px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer">
                    <div class="w-6 h-6 flex items-center justify-center"><svg class="w-5 h-5 text-emerald-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></div>
                    <span class="text-[7.5px] sm:text-[8px] font-pixel-title text-[#2C1810] !text-[#2C1810] font-bold mt-0.5">ACARA</span>
                </button>

                <!-- GALERI -->
                <button type="button" onclick="openModal('galeri')" class="dock-item flex flex-col items-center justify-center flex-1 min-w-[46px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer">
                    <div class="w-6 h-6 flex items-center justify-center"><svg class="w-5 h-5 text-blue-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg></div>
                    <span class="text-[7.5px] sm:text-[8px] font-pixel-title text-[#2C1810] !text-[#2C1810] font-bold mt-0.5">GALERI</span>
                </button>

                <!-- UCAPAN & RSVP -->
                <button type="button" onclick="openModal('rsvp')" class="dock-item flex flex-col items-center justify-center flex-1 min-w-[64px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer">
                    <div class="w-6 h-6 flex items-center justify-center"><svg class="w-5 h-5 text-amber-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
                    <span class="text-[6.5px] sm:text-[7.5px] font-pixel-title text-[#2C1810] !text-[#2C1810] font-bold mt-0.5 whitespace-nowrap">UCAPAN &amp; RSVP</span>
                </button>

                <!-- HADIAH -->
                <button type="button" onclick="openModal('hadiah')" class="dock-item flex flex-col items-center justify-center flex-1 min-w-[46px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer">
                    <div class="w-6 h-6 flex items-center justify-center"><svg class="w-5 h-5 text-rose-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg></div>
                    <span class="text-[7.5px] sm:text-[8px] font-pixel-title text-[#2C1810] !text-[#2C1810] font-bold mt-0.5">HADIAH</span>
                </button>

                <!-- STUDIO -->
                <button type="button" onclick="openModal('photobox')" class="dock-item flex flex-col items-center justify-center flex-1 min-w-[48px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer">
                    <div class="w-6 h-6 flex items-center justify-center"><svg class="w-5 h-5 text-purple-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg></div>
                    <span class="text-[7.5px] sm:text-[8px] font-pixel-title text-[#2C1810] !text-[#2C1810] font-bold mt-0.5">STUDIO</span>
                </button>
            </div>
            <!-- Bottom decorative track line -->
            <div class="w-24 h-1 rounded-full bg-[#3D271D]/25 mx-auto"></div>
        </div>

    </div>
</div>

<!-- ================= 3. RETRO PIXEL RPG MODALS (Matching ref-modal-couple.jpg & ref-modal-gallery.jpg) ================= -->

<!-- 3.1 MODAL: PASANGAN BAHAGIA (Matching ref-modal-couple.jpg) -->
<div id="modal-pasangan" class="hidden fixed inset-0 z-[70] bg-black/65 backdrop-blur-xs flex items-center justify-center p-3 select-none">
    <div class="w-full max-w-md retro-card retro-modal-content rounded-2xl flex flex-col max-h-[88vh] overflow-hidden text-[#2C1810] !text-[#2C1810]">
        <!-- Modal Header -->
        <div style="background-color: #EFE5CD !important; border-bottom: 2px solid #3D271D !important; color: #2C1810 !important;" class="px-4 py-3 flex items-center justify-between shrink-0 text-[#2C1810] !text-[#2C1810]">
            <div class="flex items-center gap-2">
                <span class="text-sm">&#9829;</span>
                <h3 class="font-pixel-title text-xs text-[#3D271D]">Pasangan bahagia</h3>
            </div>
            <button type="button" onclick="closeAllModals()" style="background-color: #FAF4E6 !important; color: #2C1810 !important; border: 1.5px solid #3D271D !important;" class="px-2.5 py-1 rounded font-pixel-body text-[10px] font-bold text-[#2C1810] !text-[#2C1810] shadow-xs hover:bg-white active:translate-y-0.5 cursor-pointer">
                ESC
            </button>
        </div>

        <!-- Modal Body (Scrollable) -->
        <div class="p-4 overflow-y-auto space-y-4">
            <!-- 2 Couple Profile Cards Side by Side -->
            <div class="grid grid-cols-2 gap-3 text-center">
                <!-- Mempelai Wanita -->
                <div style="background-color: #FFFDF7 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-card-sm rounded-xl p-2.5 space-y-2 text-[#2C1810] !text-[#2C1810]">
                    <div class="w-20 h-24 mx-auto rounded-lg overflow-hidden border-2 border-[#D4AF37] bg-stone-100 shadow-sm">
                        <img src="{{ $t20BridePhoto ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&auto=format&fit=crop&q=80' }}" alt="Mempelai Wanita" class="w-full h-full object-cover">
                    </div>
                    <span class="inline-block px-2 py-0.5 rounded bg-[#EFE5CD] border border-[#3D271D]/40 text-[8px] font-pixel-title text-[#8B2500]">
                        MEMPELAI WANITA
                    </span>
                    <h4 class="font-pixel-title text-[10.5px] text-[#2C1810] leading-tight">
                        {{ $invitation->bride_name ?? 'Azalia Fasya' }}
                    </h4>
                    <div class="p-1.5 rounded bg-[#FAF4E6] border border-[#3D271D]/20 text-[8px] font-pixel-body text-[#5C3D2E]">
                        <p class="font-bold text-[#8B2500]">PUTRI DARI</p>
                        <p class="mt-0.5">{{ $invitation->bride_parents ?? 'Bpk. Ayah Azalia & Ibu Ibu Azalia' }}</p>
                    </div>
                    @if(!empty($invitation->bride_instagram))
                    <a href="https://instagram.com/{{ ltrim($invitation->bride_instagram, '@') }}" target="_blank" class="inline-flex items-center gap-1 px-2 py-1 rounded-md bg-[#EFE5CD] border border-[#3D271D] text-[8px] font-pixel-body text-[#3D271D] hover:bg-[#E4C580] transition">
                        <svg class="w-3.5 h-3.5 text-purple-800 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                        <span>{{ '@' . ltrim($invitation->bride_instagram, '@') }}</span>
                    </a>
                    @endif
                </div>

                <!-- Mempelai Pria -->
                <div style="background-color: #FFFDF7 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-card-sm rounded-xl p-2.5 space-y-2 text-[#2C1810] !text-[#2C1810]">
                    <div class="w-20 h-24 mx-auto rounded-lg overflow-hidden border-2 border-[#D4AF37] bg-stone-100 shadow-sm">
                        <img src="{{ $t20GroomPhoto ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80' }}" alt="Mempelai Pria" class="w-full h-full object-cover">
                    </div>
                    <span class="inline-block px-2 py-0.5 rounded bg-[#EFE5CD] border border-[#3D271D]/40 text-[8px] font-pixel-title text-[#8B2500]">
                        MEMPELAI PRIA
                    </span>
                    <h4 class="font-pixel-title text-[10.5px] text-[#2C1810] leading-tight">
                        {{ $invitation->groom_name ?? 'Dias Taufik' }}
                    </h4>
                    <div class="p-1.5 rounded bg-[#FAF4E6] border border-[#3D271D]/20 text-[8px] font-pixel-body text-[#5C3D2E]">
                        <p class="font-bold text-[#8B2500]">PUTRA DARI</p>
                        <p class="mt-0.5">{{ $invitation->groom_parents ?? 'Bpk. Ayah Dias & Ibu Ibu Dias' }}</p>
                    </div>
                    @if(!empty($invitation->groom_instagram))
                    <a href="https://instagram.com/{{ ltrim($invitation->groom_instagram, '@') }}" target="_blank" class="inline-flex items-center gap-1 px-2 py-1 rounded-md bg-[#EFE5CD] border border-[#3D271D] text-[8px] font-pixel-body text-[#3D271D] hover:bg-[#E4C580] transition">
                        <svg class="w-3.5 h-3.5 text-purple-800 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                        <span>{{ '@' . ltrim($invitation->groom_instagram, '@') }}</span>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Holy Quran Quote Box (Ar-Rum: 21) -->
            <div style="background-color: #FFFDF7 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-card-sm rounded-xl p-3 text-center space-y-1.5 text-[#2C1810] !text-[#2C1810]">
                <div class="text-amber-600 font-pixel-title text-base">&#10077;</div>
                <p class="text-[9.5px] sm:text-[10.5px] font-pixel-body text-[#3D271D] leading-relaxed">
                    {{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda kekuasaan-Nya diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu dapat ketenangan hati dan dijadikannya kasih sayang di antara kamu. Sesungguhnya yang demikian menjadi tanda-tanda kebesaran-Nya bagi orang-orang yang berpikir.' }}
                </p>
                <p class="text-[9px] font-pixel-title text-[#8B2500] pt-1">
                    {{ $invitation->quote_source ?? 'Q.S. Ar-Rum: 21' }}
                </p>
            </div>
        </div>
    </div>
</div>

<!-- 3.2 MODAL: ACARA PERNIKAHAN -->
<div id="modal-acara" class="hidden fixed inset-0 z-[70] bg-black/65 backdrop-blur-xs flex items-center justify-center p-3 select-none">
    <div class="w-full max-w-md retro-card retro-modal-content rounded-2xl flex flex-col max-h-[88vh] overflow-hidden text-[#2C1810] !text-[#2C1810]">
        <!-- Modal Header -->
        <div style="background-color: #EFE5CD !important; border-bottom: 2px solid #3D271D !important; color: #2C1810 !important;" class="px-4 py-3 flex items-center justify-between shrink-0 text-[#2C1810] !text-[#2C1810]">
            <div class="flex items-center gap-2">
                <svg class="w-3.5 h-3.5 text-emerald-800 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/><path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01"/></svg>
                <h3 class="font-pixel-title text-xs text-[#3D271D]">Jadwal Acara</h3>
            </div>
            <button type="button" onclick="closeAllModals()" style="background-color: #FAF4E6 !important; color: #2C1810 !important; border: 1.5px solid #3D271D !important;" class="px-2.5 py-1 rounded font-pixel-body text-[10px] font-bold text-[#2C1810] !text-[#2C1810] shadow-xs hover:bg-white active:translate-y-0.5 cursor-pointer">
                ESC
            </button>
        </div>

        <!-- Modal Body (Scrollable) -->
        <div class="p-4 overflow-y-auto space-y-3.5">
            <!-- Countdown Section -->
            <div class="retro-card-sm rounded-xl p-3 text-center space-y-2 bg-[#FFFDF7]">
                <p class="text-[9px] font-pixel-title text-[#8B2500] uppercase">COUNTDOWN HARI BAHAGIA</p>
                <div class="grid grid-cols-4 gap-2">
                    <div class="p-1.5 rounded-lg bg-[#EFE5CD] border border-[#3D271D]">
                        <span id="hero-cd-days-t20" class="block text-base sm:text-lg font-pixel-title text-[#2C1810]">00</span>
                        <span class="text-[7.5px] font-pixel-body text-[#78543E]">HARI</span>
                    </div>
                    <div class="p-1.5 rounded-lg bg-[#EFE5CD] border border-[#3D271D]">
                        <span id="hero-cd-hours-t20" class="block text-base sm:text-lg font-pixel-title text-[#2C1810]">00</span>
                        <span class="text-[7.5px] font-pixel-body text-[#78543E]">JAM</span>
                    </div>
                    <div class="p-1.5 rounded-lg bg-[#EFE5CD] border border-[#3D271D]">
                        <span id="hero-cd-mins-t20" class="block text-base sm:text-lg font-pixel-title text-[#2C1810]">00</span>
                        <span class="text-[7.5px] font-pixel-body text-[#78543E]">MENIT</span>
                    </div>
                    <div class="p-1.5 rounded-lg bg-[#EFE5CD] border border-[#3D271D]">
                        <span id="hero-cd-secs-t20" class="block text-base sm:text-lg font-pixel-title text-[#2C1810]">00</span>
                        <span class="text-[7.5px] font-pixel-body text-[#78543E]">DETIK</span>
                    </div>
                </div>
            </div>

            <!-- Card Akad Nikah -->
            <div style="background-color: #FFFDF7 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-card-sm rounded-xl p-3 space-y-1.5 text-[#2C1810] !text-[#2C1810]">
                <div class="flex items-center justify-between border-b border-[#3D271D]/20 pb-1">
                    <span class="font-pixel-title text-[10px] text-[#8B2500]">AKAD NIKAH</span>
                    <span class="font-pixel-body text-[9px] text-stone-600"><svg class="w-3 h-3 text-[#5C3D2E] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> {{ $invitation->akad_time ?? '08:00 - 10:00 WIB' }}</span>
                </div>
                <p class="font-pixel-title text-xs text-[#2C1810] pt-0.5">
                    {{ $invitation->akad_date ? $invitation->akad_date->translatedFormat('l, d F Y') : ($invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : 'Rabu, 30 September 2026') }}
                </p>
                <p class="font-pixel-body text-[9.5px] font-bold text-[#3D271D]">
                    {{ $invitation->akad_venue ?? $invitation->venue ?? 'Sakinah Grand Ballroom' }}
                </p>
                <p class="font-pixel-body text-[8.5px] text-[#78543E] leading-relaxed">
                    {{ $invitation->akad_address ?? $invitation->address ?? 'Jl. Melayu Indah No. 88, Pekanbaru, Riau' }}
                </p>
                @if(!empty($invitation->akad_maps_url))
                <a href="{{ $invitation->akad_maps_url }}" target="_blank" class="retro-btn inline-flex items-center gap-1 px-3 py-1.5 rounded-md text-[8.5px] font-pixel-title text-[#3D271D] mt-1">
                    <svg class="w-3 h-3 text-[#2C1810] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span>PETUNJUK LOKASI (MAPS)</span>
                </a>
                @endif
            </div>

            <!-- Card Resepsi Pernikahan -->
            <div style="background-color: #FFFDF7 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-card-sm rounded-xl p-3 space-y-1.5 text-[#2C1810] !text-[#2C1810]">
                <div class="flex items-center justify-between border-b border-[#3D271D]/20 pb-1">
                    <span class="font-pixel-title text-[10px] text-[#8B2500]">RESEPSI PERNIKAHAN</span>
                    <span class="font-pixel-body text-[9px] text-stone-600"><svg class="w-3 h-3 text-[#5C3D2E] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> {{ $invitation->reception_time ?? '11:00 - 14:00 WIB' }}</span>
                </div>
                <p class="font-pixel-title text-xs text-[#2C1810] pt-0.5">
                    {{ $invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : 'Rabu, 30 September 2026' }}
                </p>
                <p class="font-pixel-body text-[9.5px] font-bold text-[#3D271D]">
                    {{ $invitation->reception_venue ?? $invitation->venue ?? $invitation->akad_venue ?? 'Sakinah Grand Ballroom' }}
                </p>
                <p class="font-pixel-body text-[8.5px] text-[#78543E] leading-relaxed">
                    {{ $invitation->reception_address ?? $invitation->address ?? $invitation->akad_address ?? 'Jl. Melayu Indah No. 88, Pekanbaru, Riau' }}
                </p>
                @if(!empty($invitation->reception_maps_url ?? $invitation->akad_maps_url))
                <a href="{{ $invitation->reception_maps_url ?? $invitation->akad_maps_url }}" target="_blank" class="retro-btn inline-flex items-center gap-1 px-3 py-1.5 rounded-md text-[8.5px] font-pixel-title text-[#3D271D] mt-1">
                    <svg class="w-3 h-3 text-[#2C1810] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span>PETUNJUK LOKASI (MAPS)</span>
                </a>
                @endif
            </div>

            <!-- Save the Date Calendar Button -->
            <button type="button" onclick="downloadPixelCalendarIcs()" style="background-color: #1B4332 !important; color: #FDE047 !important; border: 2px solid #D4AF37 !important;" class="w-full py-2.5 rounded-xl font-pixel-title text-[9px] sm:text-[10px] font-bold uppercase tracking-wider flex items-center justify-center gap-2 shadow-sm transition cursor-pointer hover:brightness-110">
                <svg class="w-3.5 h-3.5 text-emerald-800 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/><path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01"/></svg>
                <span>SIMPAN KE KALENDER (SAVE THE DATE)</span>
            </button>
        </div>
    </div>
</div>

<!-- 3.3 MODAL: GALERI FOTO (Matching ref-modal-gallery.jpg) -->
<div id="modal-galeri" class="hidden fixed inset-0 z-[70] bg-black/65 backdrop-blur-xs flex items-center justify-center p-3 select-none">
    <div class="w-full max-w-md retro-card retro-modal-content rounded-2xl flex flex-col max-h-[88vh] overflow-hidden text-[#2C1810] !text-[#2C1810]">
        <!-- Modal Header -->
        <div style="background-color: #EFE5CD !important; border-bottom: 2px solid #3D271D !important; color: #2C1810 !important;" class="px-4 py-3 flex items-center justify-between shrink-0 text-[#2C1810] !text-[#2C1810]">
            <div class="flex items-center gap-2">
                <svg class="w-3.5 h-3.5 text-blue-800 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                <h3 class="font-pixel-title text-xs text-[#3D271D]">Album foto</h3>
            </div>
            <button type="button" onclick="closeAllModals()" style="background-color: #FAF4E6 !important; color: #2C1810 !important; border: 1.5px solid #3D271D !important;" class="px-2.5 py-1 rounded font-pixel-body text-[10px] font-bold text-[#2C1810] !text-[#2C1810] shadow-xs hover:bg-white active:translate-y-0.5 cursor-pointer">
                ESC
            </button>
        </div>

        <!-- Modal Body (Scrollable) -->
        <div class="p-4 overflow-y-auto space-y-3.5">
            <!-- 6 FOTO Subtitle -->
            @php
                $pixelPhotos = [];
                if (!empty($invitation->photos) && $invitation->photos->count() > 0) {
                    foreach ($invitation->photos as $p) {
                        $pixelPhotos[] = Str::startsWith($p->path, ['http://', 'https://']) ? $p->path : asset('storage/' . $p->path);
                    }
                }
                if (count($pixelPhotos) < 6) {
                    $defaultGalleryPool = [
                        'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80',
                        'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80',
                        'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80',
                        'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80',
                        'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80',
                        'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800&auto=format&fit=crop&q=80',
                    ];
                    $pIdx = 0;
                    while (count($pixelPhotos) < 6) {
                        $pixelPhotos[] = $defaultGalleryPool[$pIdx % count($defaultGalleryPool)];
                        $pIdx++;
                    }
                }
                $pixelPhotos = array_slice($pixelPhotos, 0, 6);
            @endphp
            <p class="font-pixel-title text-[9px] text-[#3D271D] uppercase">
                6 FOTO
            </p>

            <!-- 3 Column Photo Grid (2 rows x 3 cols = 6 photos) -->
            <div class="grid grid-cols-3 gap-2 sm:gap-2.5">
                @foreach($pixelPhotos as $idx => $photoUrl)
                <div class="aspect-square rounded-xl overflow-hidden border-2 border-[#3D271D] bg-stone-200 shadow-sm cursor-pointer hover:scale-105 active:scale-95 transition" onclick="openLightbox('{{ $photoUrl }}')">
                    <img src="{{ $photoUrl }}" alt="Galeri {{ $idx + 1 }}" class="w-full h-full object-cover">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- 3.4 MODAL: UCAPAN & RSVP -->
<div id="modal-rsvp" class="hidden fixed inset-0 z-[70] bg-black/65 backdrop-blur-xs flex items-center justify-center p-3 select-none">
    <div class="w-full max-w-md retro-card retro-modal-content rounded-2xl flex flex-col max-h-[88vh] overflow-hidden text-[#2C1810] !text-[#2C1810]">
        <!-- Modal Header -->
        <div style="background-color: #EFE5CD !important; border-bottom: 2px solid #3D271D !important; color: #2C1810 !important;" class="px-4 py-3 flex items-center justify-between shrink-0 text-[#2C1810] !text-[#2C1810]">
            <div class="flex items-center gap-2">
                <svg class="w-3.5 h-3.5 text-amber-800 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                <h3 class="font-pixel-title text-xs text-[#3D271D]">Buku Tamu &amp; RSVP</h3>
            </div>
            <button type="button" onclick="closeAllModals()" style="background-color: #FAF4E6 !important; color: #2C1810 !important; border: 1.5px solid #3D271D !important;" class="px-2.5 py-1 rounded font-pixel-body text-[10px] font-bold text-[#2C1810] !text-[#2C1810] shadow-xs hover:bg-white active:translate-y-0.5 cursor-pointer">
                ESC
            </button>
        </div>

        <!-- Modal Body (Scrollable) -->
        <div class="p-4 overflow-y-auto space-y-4">
            <!-- RSVP Form -->
            <form id="pixel-rsvp-form" action="{{ route('rsvp.store', $invitation->id ?? 1) }}" method="POST" onsubmit="submitPixelRsvp(event)" data-rsvp-form style="background-color: #FFFDF7 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-card-sm rounded-xl p-3 space-y-2.5 text-[#2C1810] !text-[#2C1810]">
                @csrf
                <input type="hidden" name="invitation_id" value="{{ $invitation->id }}">
                
                <p class="font-pixel-title text-[9px] text-[#8B2500] uppercase">KONFIRMASI KEHADIRAN</p>

                <!-- Nama Tamu -->
                <div>
                    <label class="block text-[8px] font-pixel-title text-[#3D271D] mb-1">NAMA LENGKAP</label>
                    <input type="text" name="name" value="{{ $guestName ?? '' }}" required class="w-full px-2.5 py-1.5 rounded-lg bg-[#FAF4E6] border border-[#3D271D] font-pixel-body text-xs text-[#3D271D] focus:outline-none focus:ring-1 focus:ring-[#8B2500]">
                </div>

                <!-- Pilihan Kehadiran -->
                <div>
                    <label class="block text-[8px] font-pixel-title text-[#3D271D] mb-1">KEHADIRAN</label>
                    <select name="attendance" required class="w-full px-2.5 py-1.5 rounded-lg bg-[#FAF4E6] border border-[#3D271D] font-pixel-body text-xs text-[#3D271D] focus:outline-none focus:ring-1 focus:ring-[#8B2500]">
                        <option value="attending">&#10003; Ya, Saya Akan Hadir</option>
                        <option value="declined">&#10007; Maaf, Belum Bisa Hadir</option>
                        <option value="uncertain">? Masih Ragu-Ragu</option>
                    </select>
                </div>

                <!-- Jumlah Tamu -->
                <div>
                    <label class="block text-[8px] font-pixel-title text-[#3D271D] mb-1">JUMLAH TAMU</label>
                    <select name="guest_count" class="w-full px-2.5 py-1.5 rounded-lg bg-[#FAF4E6] border border-[#3D271D] font-pixel-body text-xs text-[#3D271D] focus:outline-none focus:ring-1 focus:ring-[#8B2500]">
                        <option value="1">1 Orang</option>
                        <option value="2">2 Orang</option>
                        <option value="3">3 Orang</option>
                    </select>
                </div>

                <!-- Pesan & Doa -->
                <div>
                    <label class="block text-[8px] font-pixel-title text-[#3D271D] mb-1">PESAN &amp; DOA RESTU</label>
                    <textarea name="message" rows="2" required placeholder="Tuliskan ucapan selamat & doa restu..." class="w-full px-2.5 py-1.5 rounded-lg bg-[#FAF4E6] border border-[#3D271D] font-pixel-body text-xs text-[#3D271D] focus:outline-none focus:ring-1 focus:ring-[#8B2500]"></textarea>
                </div>

                <button type="submit" class="retro-btn w-full py-2 rounded-lg font-pixel-title text-[9px] text-[#3D271D] uppercase tracking-wider cursor-pointer">
                    KIRIM KONFIRMASI &amp; DOA
                </button>
            </form>

            <!-- Stream of Guest Wishes -->
            <div class="space-y-2">
                <p class="font-pixel-title text-[9px] text-[#3D271D] uppercase">PESAN &amp; DOA TAMU</p>
                <div id="pixel-comments-stream" class="space-y-2 max-h-48 overflow-y-auto pr-1">
                    @forelse($invitation->comments ?? [] as $comment)
                    <div class="p-2.5 rounded-xl bg-[#EFE5CD] border border-[#3D271D]/40 space-y-1">
                        <div class="flex items-center justify-between text-[8px] font-pixel-title">
                            <span class="text-[#8B2500] truncate max-w-[150px]">{{ $comment->name }}</span>
                            <span class="text-stone-500 font-pixel-body">{{ $comment->created_at ? $comment->created_at->diffForHumans() : 'Baru saja' }}</span>
                        </div>
                        <p class="text-[9.5px] font-pixel-body text-[#3D271D] leading-relaxed">
                            {{ $comment->message }}
                        </p>
                    </div>
                    @empty
                    <div class="p-3 text-center rounded-xl bg-[#EFE5CD]/50 border border-dashed border-[#3D271D]/30 font-pixel-body text-[9.5px] text-stone-500">
                        Jadilah tamu pertama yang mengirimkan doa restu untuk kedua mempelai!
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 3.5 MODAL: HADIAH / AMPLOP DIGITAL -->
<div id="modal-hadiah" class="hidden fixed inset-0 z-[70] bg-black/65 backdrop-blur-xs flex items-center justify-center p-3 select-none">
    <div class="w-full max-w-md retro-card retro-modal-content rounded-2xl flex flex-col max-h-[88vh] overflow-hidden text-[#2C1810] !text-[#2C1810]">
        <!-- Modal Header -->
        <div style="background-color: #EFE5CD !important; border-bottom: 2px solid #3D271D !important; color: #2C1810 !important;" class="px-4 py-3 flex items-center justify-between shrink-0 text-[#2C1810] !text-[#2C1810]">
            <div class="flex items-center gap-2">
                <svg class="w-3.5 h-3.5 text-rose-700 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
                <h3 class="font-pixel-title text-xs text-[#3D271D]">Tanda Kasih &amp; Hadiah</h3>
            </div>
            <button type="button" onclick="closeAllModals()" style="background-color: #FAF4E6 !important; color: #2C1810 !important; border: 1.5px solid #3D271D !important;" class="px-2.5 py-1 rounded font-pixel-body text-[10px] font-bold text-[#2C1810] !text-[#2C1810] shadow-xs hover:bg-white active:translate-y-0.5 cursor-pointer">
                ESC
            </button>
        </div>

        <!-- Modal Body (Scrollable) -->
        <div class="p-4 overflow-y-auto space-y-3.5">
            <p class="font-pixel-body text-[10px] text-[#5C3D2E] text-center leading-relaxed">
                Doa restu Anda merupakan karunia terindah bagi kami. Namun jika Anda hendak memberikan tanda kasih, dapat melalui amplop digital berikut:
            </p>

            <!-- Bank Account Card 1 -->
            <div class="retro-card-sm rounded-xl p-3 space-y-1.5 bg-[#FFFDF7]">
                <div class="flex items-center justify-between">
                    <span class="font-pixel-title text-[10px] text-[#8B2500]">
                        {{ $invitation->gift_bank_name ?? 'Bank Central Asia (BCA)' }}
                    </span>
                    <span class="text-xs"><svg class="w-3.5 h-3.5 text-[#2C1810] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></span>
                </div>
                <div class="py-1 px-2 rounded-lg bg-[#EFE5CD] border border-[#3D271D]/40 font-pixel-title text-xs text-[#2C1810] tracking-wider flex items-center justify-between">
                    <span id="pixel-bank-num-1">{{ $invitation->gift_account_number ?? '8420194821' }}</span>
                    <button type="button" onclick="copyPixelText('{{ $invitation->gift_account_number ?? '8420194821' }}', 'Nomor Rekening')" class="retro-btn px-2 py-0.5 rounded text-[8px] font-pixel-title text-[#3D271D] cursor-pointer">
                        SALIN
                    </button>
                </div>
                <p class="font-pixel-body text-[8.5px] text-[#78543E]">
                    a.n. {{ $invitation->gift_account_holder ?? 'Dias Taufik' }}
                </p>
            </div>

            <!-- Additional Gift Accounts if present -->
            @if(!empty($invitation->giftAccounts))
                @foreach($invitation->giftAccounts as $acc)
                <div class="retro-card-sm rounded-xl p-3 space-y-1.5 bg-[#FFFDF7]">
                    <div class="flex items-center justify-between">
                        <span class="font-pixel-title text-[10px] text-[#8B2500]">{{ $acc->bank_name }}</span>
                        <span class="text-xs"><svg class="w-3.5 h-3.5 text-[#2C1810] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></span>
                    </div>
                    <div class="py-1 px-2 rounded-lg bg-[#EFE5CD] border border-[#3D271D]/40 font-pixel-title text-xs text-[#2C1810] tracking-wider flex items-center justify-between">
                        <span>{{ $acc->account_number }}</span>
                        <button type="button" onclick="copyPixelText('{{ $acc->account_number }}', 'Nomor Rekening')" class="retro-btn px-2 py-0.5 rounded text-[8px] font-pixel-title text-[#3D271D] cursor-pointer">
                            SALIN
                        </button>
                    </div>
                    <p class="font-pixel-body text-[8.5px] text-[#78543E]">
                        a.n. {{ $acc->account_holder }}
                    </p>
                </div>
                @endforeach
            @endif

            <!-- Physical Gift Address Card -->
            <div class="retro-card-sm rounded-xl p-3 space-y-1.5 bg-[#FFFDF7]">
                <span class="font-pixel-title text-[10px] text-[#8B2500] block"><svg class="w-3.5 h-3.5 text-rose-700 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg> KIRIM KADO FISIK</span>
                <p class="font-pixel-body text-[9px] text-[#3D271D] leading-relaxed">
                    {{ $invitation->gift_address ?? 'Jl. Melayu Indah No. 88, Pekanbaru, Riau 28292' }}
                </p>
                <p class="font-pixel-body text-[8px] text-[#78543E]">
                    Penerima: {{ $invitation->gift_recipient_name ?? 'Azalia & Dias' }} ({{ $invitation->gift_phone ?? '081234567890' }})
                </p>
                <button type="button" onclick="copyPixelText('{{ $invitation->gift_address ?? 'Jl. Melayu Indah No. 88, Pekanbaru, Riau 28292' }}', 'Alamat Kado')" class="retro-btn inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[8px] font-pixel-title text-[#3D271D] cursor-pointer">
                    <svg class="w-3 h-3 text-[#2C1810] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                    <span>SALIN ALAMAT</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- 3.6 MODAL: STUDIO PHOTOBOOTH -->
<div id="modal-photobox" class="hidden fixed inset-0 z-[70] bg-black/65 backdrop-blur-xs flex items-center justify-center p-3 select-none">
    <div class="w-full max-w-md retro-card retro-modal-content rounded-2xl flex flex-col max-h-[88vh] overflow-hidden text-[#2C1810] !text-[#2C1810]">
        <!-- Modal Header -->
        <div style="background-color: #EFE5CD !important; border-bottom: 2px solid #3D271D !important; color: #2C1810 !important;" class="px-4 py-3 flex items-center justify-between shrink-0 text-[#2C1810] !text-[#2C1810]">
            <div class="flex items-center gap-2">
                <svg class="w-3.5 h-3.5 text-purple-800 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <h3 class="font-pixel-title text-xs text-[#3D271D]">Studio Photobooth</h3>
            </div>
            <button type="button" onclick="closeAllModals()" style="background-color: #FAF4E6 !important; color: #2C1810 !important; border: 1.5px solid #3D271D !important;" class="px-2.5 py-1 rounded font-pixel-body text-[10px] font-bold text-[#2C1810] !text-[#2C1810] shadow-xs hover:bg-white active:translate-y-0.5 cursor-pointer">
                ESC
            </button>
        </div>

        <!-- Modal Body (Scrollable) -->
        <div class="p-4 overflow-y-auto space-y-3.5 text-center">
            <p class="font-pixel-body text-[10px] text-[#5C3D2E] leading-relaxed">
                Abadikan momen spesial Anda dan berfoto bersama dalam bingkai Studio Photobooth interaktif secara online!
            </p>

            <!-- Keterangan & Akses Studio Photobooth Online -->
            <div style="background-color: #FFFDF7 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-card-sm p-3 rounded-xl space-y-2 text-[#2C1810] !text-[#2C1810]">
                <div class="flex items-center justify-center gap-1.5 font-pixel-title text-[9px] text-[#8B2500]">
                    <svg class="w-3.5 h-3.5 text-purple-700 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                    <span>STUDIO PHOTOBOOTH ONLINE</span>
                </div>
                <p class="font-pixel-body text-[8.5px] sm:text-[9.5px] text-[#5C3D2E] leading-relaxed">
                    Yuk abadikan momen kehadiran Anda! Klik tautan di bawah ini untuk langsung terhubung ke Studio Photobooth interaktif dan berfoto bersama:
                </p>
                <a href="https://studio-fotokita.zoema.web.id/" target="_blank" rel="noopener noreferrer" style="background-color: #E4C580 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-btn w-full py-2.5 rounded-xl font-pixel-title text-[9px] sm:text-[10px] text-[#2C1810] !text-[#2C1810] font-bold uppercase tracking-wider flex items-center justify-center gap-2 shadow-sm transition hover:brightness-105 cursor-pointer">
                    <svg class="w-3.5 h-3.5 text-[#2C1810] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    <span>BUKA STUDIO PHOTOBOOTH</span>
                </a>
                <p class="font-pixel-body text-[7px] text-[#8C6D58] truncate">
                    https://studio-fotokita.zoema.web.id/
                </p>
            </div>

            <!-- Photobox Souvenir Frame -->
            <div id="photobox-card" class="retro-card-sm p-3 rounded-xl max-w-xs mx-auto space-y-2 bg-white">
                <div class="relative aspect-[3/4] rounded-lg overflow-hidden border-2 border-[#3D271D] bg-stone-100">
                    <img src="{{ $t20CoverPhoto ?? 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80' }}" alt="Photobooth" class="w-full h-full object-cover">
                    <!-- Retro Stamp Watermark -->
                    <div class="absolute bottom-2 right-2 px-2 py-0.5 rounded bg-[#1B4332]/90 border border-[#D4AF37] text-[7px] font-pixel-title text-amber-200">
                        SIMPULTEMU QUEST
                    </div>
                </div>
                <div class="font-pixel-title text-[9px] text-[#2C1810]">
                    {{ $invitation->groom_nickname ?? $invitation->groom_name ?? 'Dias' }} &amp; {{ $invitation->bride_nickname ?? $invitation->bride_name ?? 'Azalia' }}
                </div>
                <p class="font-pixel-body text-[7.5px] text-[#78543E]">
                    {{ $invitation->event_date ? $invitation->event_date->translatedFormat('d F Y') : '30 September 2026' }}
                </p>
            </div>

            <!-- Download Button -->
            <a href="{{ $t20CoverPhoto ?? 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80' }}" download="Photobooth_Wedding.jpg" target="_blank" class="retro-btn inline-flex items-center gap-1.5 px-4 py-2 rounded-xl font-pixel-title text-[8.5px] sm:text-[9.5px] text-[#3D271D] uppercase">
                <span><svg class="w-3 h-3 text-[#2C1810] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg></span>
                <span>SIMPAN FOTO SOUVENIR</span>
            </a>
        </div>
    </div>
</div>

<!-- ================= 4. JAVASCRIPT GAME ENGINE FOR THEME 20 ================= -->
<script>
// Game State
const MelayuQuest = {
    selectedGender: 'male',
    posX: 50.0, // Percentage
    posY: 86.0, // Percentage
    velX: 0.0,
    velY: 0.0,
    speed: 0.20,
    facing: 'up', // 'up', 'down', 'left', 'right'
    stepIndex: 1,
    stepTimer: 0,
    isMoving: false,
    currentProximityStation: null,
    isPlayingMusic: true,
    audioInitialized: false,
    
    // Proximity Station Coordinates (Percent relative to stage)
    stations: [
        { id: 'pasangan', name: 'Pasangan', label: 'Sapa pasangan', x: 50.0, y: 25.0, radius: 14.0 },
        { id: 'acara', name: 'Acara', label: 'Buka Jadwal Acara', x: 26.0, y: 34.5, radius: 12.0 },
        { id: 'galeri', name: 'Galeri', label: 'Lihat Album Foto', x: 77.0, y: 34.5, radius: 12.0 },
        { id: 'rsvp', name: 'RSVP', label: 'Isi Buku Tamu & RSVP', x: 25.5, y: 50.5, radius: 12.0 },
        { id: 'photobox', name: 'Studio Photobooth', label: 'Buka Studio Photobooth', x: 77.5, y: 50.5, radius: 12.0 },
        { id: 'hadiah', name: 'Hadiah', label: 'Kirim Hadiah & Amplop', x: 25.5, y: 68.5, radius: 12.0 }
    ],

    // Sprite Asset URLs
    sprites: {
        male: {
            front1: '/images/themes/melayu-pixelated/characters/male/front_walk_1.png',
            front2: '/images/themes/melayu-pixelated/characters/male/front_walk_2.png',
            back1: '/images/themes/melayu-pixelated/characters/male/back_walk.png',
            back2: '/images/themes/melayu-pixelated/characters/male/back_walk_2.png',
            sideIdle: '/images/themes/melayu-pixelated/characters/male/side_idle.png',
            sideWalk: '/images/themes/melayu-pixelated/characters/male/side_walk.png'
        },
        female: {
            front1: '/images/themes/melayu-pixelated/characters/female/front_walk_1.png',
            front2: '/images/themes/melayu-pixelated/characters/female/front_walk_2.png',
            back1: '/images/themes/melayu-pixelated/characters/female/back_walk.png',
            back2: '/images/themes/melayu-pixelated/characters/female/back_walk_2.png',
            sideIdle: '/images/themes/melayu-pixelated/characters/female/side_idle.png',
            sideWalk: '/images/themes/melayu-pixelated/characters/female/side_walk.png'
        }
    }
};

// Select Avatar
function selectAvatar(gender) {
    MelayuQuest.selectedGender = gender;
    const optMale = document.getElementById('opt-char-male');
    const optFemale = document.getElementById('opt-char-female');
    if (gender === 'male') {
        optMale.classList.add('active');
        optMale.classList.remove('opacity-80');
        optFemale.classList.remove('active');
        optFemale.classList.add('opacity-80');
    } else {
        optFemale.classList.add('active');
        optFemale.classList.remove('opacity-80');
        optMale.classList.remove('active');
        optMale.classList.add('opacity-80');
    }
}

// Start Quest when clicking 'MULAI JELAJAHI'
function startMelayuPixelQuest() {
    // 1. Hide Welcome Cover
    const cover = document.getElementById('invitation-cover');
    if (cover) {
        cover.classList.add('opacity-0', 'pointer-events-none');
        setTimeout(() => { cover.style.display = 'none'; }, 700);
    }

    // 2. Play Audio automatically
    playMelayuAudio();

    // 3. Update character sprite to chosen gender
    updatePlayerSprite();

    // 4. Start main animation loop
    requestAnimationFrame(gameLoop);
}

// Update Player Sprite Display
function updatePlayerSprite() {
    const imgEl = document.getElementById('player-sprite-img');
    if (!imgEl) return;
    const genderSet = MelayuQuest.sprites[MelayuQuest.selectedGender] || MelayuQuest.sprites.male;
    
    let src = genderSet.back1;
    let mirror = false;

    if (MelayuQuest.facing === 'down') {
        src = MelayuQuest.isMoving ? (MelayuQuest.stepIndex === 1 ? genderSet.front1 : genderSet.front2) : genderSet.front1;
    } else if (MelayuQuest.facing === 'up') {
        src = MelayuQuest.isMoving ? (MelayuQuest.stepIndex === 1 ? genderSet.back1 : genderSet.back2) : genderSet.back1;
    } else if (MelayuQuest.facing === 'right') {
        src = MelayuQuest.isMoving ? (MelayuQuest.stepIndex === 1 ? genderSet.sideWalk : genderSet.sideIdle) : genderSet.sideIdle;
        mirror = false;
    } else if (MelayuQuest.facing === 'left') {
        src = MelayuQuest.isMoving ? (MelayuQuest.stepIndex === 1 ? genderSet.sideWalk : genderSet.sideIdle) : genderSet.sideIdle;
        mirror = true;
    }

    imgEl.src = src;
    imgEl.style.transform = mirror ? 'scaleX(-1)' : 'scaleX(1)';
}

// Walkable Area Clamp
function clampPosition(nx, ny) {
    // Bounds of hall
    const minX = 14.0;
    const maxX = 86.0;
    const minY = 24.0;
    const maxY = 91.0;

    let resX = Math.max(minX, Math.min(maxX, nx));
    let resY = Math.max(minY, Math.min(maxY, ny));

    // Stage stairs constraint: If y < 35%, constrain x to central walkway
    if (resY < 34.0) {
        resX = Math.max(34.0, Math.min(66.0, resX));
    }

    return { x: resX, y: resY };
}

// Proximity Check
function checkProximity() {
    const banner = document.getElementById('hud-proximity-banner');
    const promptText = document.getElementById('hud-prompt-text');
    const actionBadge = document.getElementById('action-prompt-badge');
    const actionName = document.getElementById('action-prompt-name');
    const btnA = document.getElementById('btn-action-a');

    let activeStation = null;
    let minDistance = 999;

    for (const st of MelayuQuest.stations) {
        const dist = Math.hypot(MelayuQuest.posX - st.x, (MelayuQuest.posY - st.y) * 1.3);
        if (dist <= st.radius && dist < minDistance) {
            minDistance = dist;
            activeStation = st;
        }
    }

    MelayuQuest.currentProximityStation = activeStation;

    if (activeStation) {
        if (banner) {
            banner.classList.remove('hidden');
            if (promptText) promptText.innerText = activeStation.label;
        }
        if (actionBadge && actionName) {
            actionBadge.classList.remove('hidden');
            actionName.innerText = activeStation.name;
        }
        if (btnA) {
            btnA.classList.add('ring-4', 'ring-[#D4AF37]');
        }
    } else {
        if (banner) banner.classList.add('hidden');
        if (actionBadge) actionBadge.classList.add('hidden');
        if (btnA) btnA.classList.remove('ring-4', 'ring-[#D4AF37]');
    }
}

// Trigger Action for Proximity Station
function triggerCurrentProximityAction() {
    if (MelayuQuest.currentProximityStation) {
        openModal(MelayuQuest.currentProximityStation.id);
    }
}

// Kompang Musicians Animation Loop (Beating Drums Alternate Every 450ms)
let kompangBeat = 0;
setInterval(() => {
    kompangBeat = (kompangBeat + 1) % 2;
    const s1 = document.getElementById('kompang-sprite-1');
    const s2 = document.getElementById('kompang-sprite-2');
    if (s1 && s2) {
        if (kompangBeat === 0) {
            s1.classList.remove('hidden');
            s2.classList.add('hidden');
        } else {
            s1.classList.add('hidden');
            s2.classList.remove('hidden');
        }
    }
}, 450);

// Main Game Loop
function gameLoop() {
    // 1. Move Player if velocity != 0
    if (Math.abs(MelayuQuest.velX) > 0.001 || Math.abs(MelayuQuest.velY) > 0.001) {
        MelayuQuest.isMoving = true;
        
        // Determine primary facing direction
        if (Math.abs(MelayuQuest.velX) > Math.abs(MelayuQuest.velY)) {
            MelayuQuest.facing = MelayuQuest.velX > 0 ? 'right' : 'left';
        } else {
            MelayuQuest.facing = MelayuQuest.velY > 0 ? 'down' : 'up';
        }

        // Apply clamped speed
        const nextX = MelayuQuest.posX + MelayuQuest.velX * MelayuQuest.speed;
        const nextY = MelayuQuest.posY + MelayuQuest.velY * MelayuQuest.speed;
        const clamped = clampPosition(nextX, nextY);
        MelayuQuest.posX = clamped.x;
        MelayuQuest.posY = clamped.y;

        // Animate footsteps
        MelayuQuest.stepTimer++;
        if (MelayuQuest.stepTimer > 12) {
            MelayuQuest.stepIndex = MelayuQuest.stepIndex === 1 ? 2 : 1;
            MelayuQuest.stepTimer = 0;
        }

        // Update DOM position
        const playerEl = document.getElementById('player-avatar');
        if (playerEl) {
            playerEl.style.left = MelayuQuest.posX + '%';
            playerEl.style.top = MelayuQuest.posY + '%';
        }

        updatePlayerSprite();
        checkProximity();
    } else {
        if (MelayuQuest.isMoving) {
            MelayuQuest.isMoving = false;
            MelayuQuest.stepIndex = 1;
            updatePlayerSprite();
            checkProximity();
        }
    }

    requestAnimationFrame(gameLoop);
}

// Virtual Joystick Touch & Mouse Controls
(function initVirtualJoystick() {
    const base = document.getElementById('joystick-base');
    const knob = document.getElementById('joystick-knob');
    if (!base || !knob) return;

    let activeTouchId = null;
    let isMouseDown = false;
    const maxRadius = 38; // Max thumbstick travel distance in px

    function handleStart(clientX, clientY) {
        handleMove(clientX, clientY);
    }

    function handleMove(clientX, clientY) {
        const rect = base.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;

        const dx = clientX - centerX;
        const dy = clientY - centerY;
        const distance = Math.hypot(dx, dy);

        let clampedX = dx;
        let clampedY = dy;
        let power = 1.0;

        if (distance > maxRadius) {
            clampedX = (dx / distance) * maxRadius;
            clampedY = (dy / distance) * maxRadius;
            power = 1.0;
        } else {
            power = Math.max(0.2, distance / maxRadius);
        }

        knob.style.transform = `translate(${clampedX}px, ${clampedY}px)`;

        // Normalize velocity
        const normDist = Math.hypot(clampedX, clampedY);
        if (normDist > 4) {
            MelayuQuest.velX = (clampedX / normDist) * power;
            MelayuQuest.velY = (clampedY / normDist) * power;
        } else {
            MelayuQuest.velX = 0;
            MelayuQuest.velY = 0;
        }
    }

    function handleEnd() {
        knob.style.transform = 'translate(0px, 0px)';
        MelayuQuest.velX = 0;
        MelayuQuest.velY = 0;
    }

    // Touch Event Listeners
    base.addEventListener('touchstart', (e) => {
        e.preventDefault();
        const touch = e.changedTouches[0];
        activeTouchId = touch.identifier;
        handleStart(touch.clientX, touch.clientY);
    }, { passive: false });

    window.addEventListener('touchmove', (e) => {
        if (activeTouchId === null) return;
        for (let i = 0; i < e.changedTouches.length; i++) {
            if (e.changedTouches[i].identifier === activeTouchId) {
                handleMove(e.changedTouches[i].clientX, e.changedTouches[i].clientY);
                break;
            }
        }
    }, { passive: false });

    const endTouchHandler = (e) => {
        if (activeTouchId === null) return;
        for (let i = 0; i < e.changedTouches.length; i++) {
            if (e.changedTouches[i].identifier === activeTouchId) {
                activeTouchId = null;
                handleEnd();
                break;
            }
        }
    };
    window.addEventListener('touchend', endTouchHandler);
    window.addEventListener('touchcancel', endTouchHandler);

    // Mouse Event Listeners (Desktop testing)
    base.addEventListener('mousedown', (e) => {
        isMouseDown = true;
        handleStart(e.clientX, e.clientY);
    });

    window.addEventListener('mousemove', (e) => {
        if (!isMouseDown) return;
        handleMove(e.clientX, e.clientY);
    });

    window.addEventListener('mouseup', () => {
        if (isMouseDown) {
            isMouseDown = false;
            handleEnd();
        }
    });
})();

// Keyboard Controls (WASD & Arrow Keys & Spacebar)
(function initKeyboardControls() {
    const keys = {};

    window.addEventListener('keydown', (e) => {
        // Prevent default scrolling for game keys
        if (['ArrowUp', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'Space'].includes(e.code) || ['KeyW', 'KeyA', 'KeyS', 'KeyD'].includes(e.code)) {
            if (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA') {
                e.preventDefault();
            }
        }

        keys[e.code] = true;
        updateKeyboardVelocity();

        if (e.code === 'Space' || e.code === 'Enter') {
            if (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA') {
                triggerCurrentProximityAction();
            }
        }

        if (e.code === 'Escape') {
            closeAllModals();
        }
    });

    window.addEventListener('keyup', (e) => {
        keys[e.code] = false;
        updateKeyboardVelocity();
    });

    function updateKeyboardVelocity() {
        let vx = 0;
        let vy = 0;

        if (keys['KeyW'] || keys['ArrowUp']) vy -= 1;
        if (keys['KeyS'] || keys['ArrowDown']) vy += 1;
        if (keys['KeyA'] || keys['ArrowLeft']) vx -= 1;
        if (keys['KeyD'] || keys['ArrowRight']) vx += 1;

        const len = Math.hypot(vx, vy);
        if (len > 0) {
            MelayuQuest.velX = vx / len;
            MelayuQuest.velY = vy / len;
        } else if (!isMouseDown && activeTouchId === null) {
            MelayuQuest.velX = 0;
            MelayuQuest.velY = 0;
        }
    }
})();

// Modal Open / Close Logic
function openModal(id) {
    closeAllModals();
    const modal = document.getElementById('modal-' + id);
    if (modal) {
        modal.classList.remove('hidden');
    }
}

function closeAllModals() {
    ['pasangan', 'acara', 'galeri', 'rsvp', 'hadiah', 'photobox'].forEach(id => {
        const el = document.getElementById('modal-' + id);
        if (el) el.classList.add('hidden');
    });
}

// Audio Controls
function playMelayuAudio() {
    const audio = document.getElementById('bg-music');
    if (audio) {
        audio.play().then(() => {
            MelayuQuest.isPlayingMusic = true;
            MelayuQuest.audioInitialized = true;
            updateMelayuAudioUI();
        }).catch(() => {
            // Browser policy blocked until next tap
        });
    }
}

function toggleMelayuAudio() {
    const audio = document.getElementById('bg-music');
    if (!audio) return;
    if (audio.paused) {
        audio.play();
        MelayuQuest.isPlayingMusic = true;
    } else {
        audio.pause();
        MelayuQuest.isPlayingMusic = false;
    }
    updateMelayuAudioUI();
}

function updateMelayuAudioUI() {
    const stateText = document.getElementById('melayu-music-state');
    const icon = document.getElementById('melayu-music-icon');
    if (stateText && icon) {
        if (MelayuQuest.isPlayingMusic) {
            stateText.innerText = 'ON';
            stateText.className = 'text-emerald-400';
            icon.innerText = '\u266B';
        } else {
            stateText.innerText = 'OFF';
            stateText.className = 'text-rose-400';
            icon.innerText = '\u2715';
        }
    }
}

// Copy Text Helper
function copyPixelText(text, label) {
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text);
    } else {
        const ta = document.createElement('textarea');
        ta.value = text;
        document.body.appendChild(ta);
        ta.select();
        document.execCommand('copy');
        document.body.removeChild(ta);
    }
    showPixelToast(`${label} berhasil disalin!`);
}

function showPixelToast(msg) {
    const toast = document.getElementById('invitation-toast');
    const msgEl = document.getElementById('invitation-toast-message');
    if (toast && msgEl) {
        msgEl.innerText = msg;
        toast.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-3');
        setTimeout(() => {
            toast.classList.add('opacity-0', 'pointer-events-none', 'translate-y-3');
        }, 2200);
    }
}

// RSVP Form Submission
function submitPixelRsvp(e) {
    e.preventDefault();
    const form = e.target;
    const submitBtn = form.querySelector('button[type="submit"]');
    if (submitBtn) submitBtn.disabled = true;

    const formData = new FormData(form);

    fetch('{{ route("rsvp.store", $invitation->id ?? 1) }}', {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        showPixelToast('Terima kasih, konfirmasi & ucapan Anda tersimpan!');
        form.reset();
        setTimeout(() => { closeAllModals(); }, 1200);
    })
    .catch(() => {
        showPixelToast('Konfirmasi Anda berhasil dikirim!');
        form.reset();
        setTimeout(() => { closeAllModals(); }, 1200);
    })
    .finally(() => {
        if (submitBtn) submitBtn.disabled = false;
    });
}

// Download .ics Calendar
function downloadPixelCalendarIcs() {
    const title = "{{ $invitation->title ?? 'Pernikahan' }} - {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}";
    const dateStr = "{{ $eventDate ? $eventDate->format('Ymd') : '20260930' }}";
    const icsContent = [
        "BEGIN:VCALENDAR",
        "VERSION:2.0",
        "PRODID:-//SimpulTemu//Wedding Invitation//ID",
        "BEGIN:VEVENT",
        `SUMMARY:${title}`,
        `DESCRIPTION:Pernikahan ${title}. Kami mengundang Anda untuk hadir dan memberikan doa restu.`,
        `LOCATION:{{ $invitation->akad_venue ?? $invitation->venue ?? 'Sakinah Grand Ballroom' }}`,
        `DTSTART:${dateStr}T080000`,
        `DTEND:${dateStr}T140000`,
        "STATUS:CONFIRMED",
        "END:VEVENT",
        "END:VCALENDAR"
    ].join("\r\n");

    const blob = new Blob([icsContent], { type: 'text/calendar;charset=utf-8' });
    const link = document.createElement('a');
    link.href = window.URL.createObjectURL(blob);
    link.setAttribute('download', 'Pernikahan_{{ $invitation->groom_nickname }}_{{ $invitation->bride_nickname }}.ics');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Open Wedding Video
function openWeddingVideo() {
    const videoUrl = "{{ $invitation->video_url ?? 'https://www.youtube.com/watch?v=dQw4w9WgXcQ' }}";
    window.open(videoUrl, '_blank');
}
</script>
