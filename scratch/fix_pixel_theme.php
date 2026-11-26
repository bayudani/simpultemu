<?php

$file = 'resources/views/invitations/themes/premium-melayu-pixelated.blade.php';
$content = file_get_contents($file);

// 1. Update <style> block to strictly enforce dark brown text on retro cards & modals
$oldStyle = '    border-color: #8B2500 !important;
    background-color: #FAF0D7 !important;
    box-shadow: 0 0 0 2px #D4AF37, 0 4px 0 #3D271D !important;
}
</style>';

$newStyle = '    border-color: #8B2500 !important;
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
</style>';

if (strpos($content, $oldStyle) !== false) {
    $content = str_replace($oldStyle, $newStyle, $content);
    echo "1. Updated <style> block\n";
} else {
    echo "1. <style> target not found\n";
}

// 2. Cover Screen: Make bride & groom bigger and ensure text color is explicit
$oldCoverSprite = '<div class="w-20 sm:w-24 h-auto my-1 drop-shadow-[0_8px_16px_rgba(0,0,0,0.6)] pixel-crisp">';
$newCoverSprite = '<div class="w-32 sm:w-40 h-auto my-2 drop-shadow-[0_8px_16px_rgba(0,0,0,0.6)] pixel-crisp">';
if (strpos($content, $oldCoverSprite) !== false) {
    $content = str_replace($oldCoverSprite, $newCoverSprite, $content);
    echo "2. Enlarged cover bride & groom sprite\n";
}

// Explicit text color on cover elements
$oldCoverH1 = '<h1 class="text-base sm:text-lg font-pixel-title text-[#2C1810] leading-tight">';
$newCoverH1 = '<h1 class="text-base sm:text-lg font-pixel-title text-[#2C1810] !text-[#2C1810] leading-tight font-bold">';
$content = str_replace($oldCoverH1, $newCoverH1, $content);

$oldCoverP = '<p class="text-[10px] sm:text-xs font-pixel-body text-[#78543E]">';
$newCoverP = '<p class="text-[10px] sm:text-xs font-pixel-body text-[#5C3D2E] !text-[#5C3D2E] font-semibold">';
$content = str_replace($oldCoverP, $newCoverP, $content);

$oldCoverGuest = '<div class="py-1 px-3 rounded-lg bg-[#EFE5CD] border border-[#3D271D]/40 text-xs font-pixel-body text-[#3D271D]">';
$newCoverGuest = '<div class="py-1 px-3 rounded-lg bg-[#EFE5CD] border border-[#3D271D]/40 text-xs font-pixel-body text-[#2C1810] !text-[#2C1810]">';
$content = str_replace($oldCoverGuest, $newCoverGuest, $content);

$oldCoverBtn = '<button type="button" onclick="startMelayuPixelQuest()" class="retro-btn w-full py-2.5 sm:py-3 rounded-xl font-pixel-title text-xs sm:text-sm text-[#3D271D] tracking-wider uppercase flex items-center justify-center gap-2 cursor-pointer">';
$newCoverBtn = '<button type="button" onclick="startMelayuPixelQuest()" class="retro-btn w-full py-2.5 sm:py-3 rounded-xl font-pixel-title text-xs sm:text-sm text-[#2C1810] !text-[#2C1810] font-bold tracking-wider uppercase flex items-center justify-center gap-2 cursor-pointer">';
$content = str_replace($oldCoverBtn, $newCoverBtn, $content);

echo "3. Enforced explicit cover text colors\n";

// 3. Stage Bride & Groom: Enlarge from width: 17% to width: 27%
$oldStageSprite = '<div id="bride-groom-stage" class="absolute z-10 pixel-crisp cursor-pointer pelaminan-breathe" style="left: 49.5%; top: 13.5%; width: 17%;" onclick="openModal(\'pasangan\')">';
$newStageSprite = '<div id="bride-groom-stage" class="absolute z-10 pixel-crisp cursor-pointer pelaminan-breathe" style="left: 49.5%; top: 14.5%; width: 27%;" onclick="openModal(\'pasangan\')">';
if (strpos($content, $oldStageSprite) !== false) {
    $content = str_replace($oldStageSprite, $newStageSprite, $content);
    echo "4. Enlarged stage bride & groom sprite to 27%\n";
} else {
    echo "4. Stage sprite target not found\n";
}

// 4. Floating Station Badges (Replace emojis with SVGs & Shift Upward)
$svgHeart = '<svg class="w-3.5 h-3.5 text-rose-600 fill-current inline-block shrink-0" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>';
$svgCalendar = '<svg class="w-3.5 h-3.5 text-emerald-700 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>';
$svgGallery = '<svg class="w-3.5 h-3.5 text-blue-700 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>';
$svgEnvelope = '<svg class="w-3.5 h-3.5 text-amber-700 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>';
$svgGift = '<svg class="w-3.5 h-3.5 text-rose-600 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>';
$svgCamera = '<svg class="w-3.5 h-3.5 text-purple-700 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>';

$oldBadgesSection = '        <!-- 2.3 FLOATING STATION BADGES OVER INTERACTIVE OBJECTS (Matching ref-gameplay-hud.jpg) -->
        <!-- PASANGAN -->
        <div class="absolute z-20 station-pulse cursor-pointer" style="left: 50%; top: 27.5%;" onclick="openModal(\'pasangan\')">
            <div class="retro-card-sm px-2.5 py-1 rounded-md text-[8.5px] sm:text-[9.5px] font-pixel-title text-[#3D271D] flex items-center gap-1 hover:brightness-105">
                <span class="text-rose-600">&#9829;</span>
                <span>PASANGAN</span>
            </div>
        </div>

        <!-- ACARA -->
        <div class="absolute z-20 station-pulse cursor-pointer" style="left: 26%; top: 48%;" onclick="openModal(\'acara\')">
            <div class="retro-card-sm px-2 py-0.5 rounded-md text-[8px] sm:text-[9px] font-pixel-title text-[#3D271D] flex items-center gap-1 hover:brightness-105">
                <span class="text-emerald-700">&#128197;</span>
                <span>ACARA</span>
            </div>
        </div>

        <!-- GALERI -->
        <div class="absolute z-20 station-pulse cursor-pointer" style="left: 77.5%; top: 48%;" onclick="openModal(\'galeri\')">
            <div class="retro-card-sm px-2 py-0.5 rounded-md text-[8px] sm:text-[9px] font-pixel-title text-[#3D271D] flex items-center gap-1 hover:brightness-105">
                <span class="text-blue-700">&#128444;</span>
                <span>GALERI</span>
            </div>
        </div>

        <!-- UCAPAN & RSVP -->
        <div class="absolute z-20 station-pulse cursor-pointer" style="left: 25.5%; top: 65%;" onclick="openModal(\'rsvp\')">
            <div class="retro-card-sm px-2 py-0.5 rounded-md text-[7.5px] sm:text-[8.5px] font-pixel-title text-[#3D271D] flex items-center gap-1 hover:brightness-105">
                <span class="text-amber-700">&#9993;</span>
                <span>UCAPAN &amp; RSVP</span>
            </div>
        </div>

        <!-- PHOTOBOX -->
        <div class="absolute z-20 station-pulse cursor-pointer" style="left: 78%; top: 65%;" onclick="openModal(\'photobox\')">
            <div class="retro-card-sm px-2 py-0.5 rounded-md text-[8px] sm:text-[9px] font-pixel-title text-[#3D271D] flex items-center gap-1 hover:brightness-105">
                <span class="text-purple-700">&#128247;</span>
                <span>PHOTOBOX</span>
            </div>
        </div>

        <!-- HADIAH -->
        <div class="absolute z-20 station-pulse cursor-pointer" style="left: 25.5%; top: 81%;" onclick="openModal(\'hadiah\')">
            <div class="retro-card-sm px-2 py-0.5 rounded-md text-[8px] sm:text-[9px] font-pixel-title text-[#3D271D] flex items-center gap-1 hover:brightness-105">
                <span class="text-rose-700">&#127873;</span>
                <span>HADIAH</span>
            </div>
        </div>';

$newBadgesSection = "        <!-- 2.3 FLOATING STATION BADGES OVER INTERACTIVE OBJECTS (Matching ref-gameplay-hud.jpg) -->
        <!-- PASANGAN (Pelaminan Panggung) -->
        <div class=\"absolute z-20 station-pulse cursor-pointer\" style=\"left: 50%; top: 25%;\" onclick=\"openModal('pasangan')\">
            <div class=\"retro-card-sm px-2.5 py-1 rounded-md text-[8.5px] sm:text-[9.5px] font-pixel-title text-[#2C1810] !text-[#2C1810] flex items-center gap-1.5 hover:brightness-105 shadow-md\">
                $svgHeart
                <span class=\"font-bold text-[#2C1810] !text-[#2C1810]\">PASANGAN</span>
            </div>
        </div>

        <!-- ACARA (Meja Acara / Cermin Kiri Atas) -->
        <div class=\"absolute z-20 station-pulse cursor-pointer\" style=\"left: 26%; top: 34.5%;\" onclick=\"openModal('acara')\">
            <div class=\"retro-card-sm px-2.5 py-1 rounded-md text-[8px] sm:text-[9px] font-pixel-title text-[#2C1810] !text-[#2C1810] flex items-center gap-1.5 hover:brightness-105 shadow-md\">
                $svgCalendar
                <span class=\"font-bold text-[#2C1810] !text-[#2C1810]\">ACARA</span>
            </div>
        </div>

        <!-- GALERI (Jendela Galeri Kanan Atas) -->
        <div class=\"absolute z-20 station-pulse cursor-pointer\" style=\"left: 77.5%; top: 34.5%;\" onclick=\"openModal('galeri')\">
            <div class=\"retro-card-sm px-2.5 py-1 rounded-md text-[8px] sm:text-[9px] font-pixel-title text-[#2C1810] !text-[#2C1810] flex items-center gap-1.5 hover:brightness-105 shadow-md\">
                $svgGallery
                <span class=\"font-bold text-[#2C1810] !text-[#2C1810]\">GALERI</span>
            </div>
        </div>

        <!-- UCAPAN & RSVP (Meja Buku Tamu Kiri Tengah) -->
        <div class=\"absolute z-20 station-pulse cursor-pointer\" style=\"left: 25.5%; top: 50.5%;\" onclick=\"openModal('rsvp')\">
            <div class=\"retro-card-sm px-2.5 py-1 rounded-md text-[7.5px] sm:text-[8.5px] font-pixel-title text-[#2C1810] !text-[#2C1810] flex items-center gap-1.5 hover:brightness-105 shadow-md\">
                $svgEnvelope
                <span class=\"font-bold text-[#2C1810] !text-[#2C1810]\">UCAPAN &amp; RSVP</span>
            </div>
        </div>

        <!-- PHOTOBOX (Stan Foto Kanan Tengah) -->
        <div class=\"absolute z-20 station-pulse cursor-pointer\" style=\"left: 78%; top: 50.5%;\" onclick=\"openModal('photobox')\">
            <div class=\"retro-card-sm px-2.5 py-1 rounded-md text-[8px] sm:text-[9px] font-pixel-title text-[#2C1810] !text-[#2C1810] flex items-center gap-1.5 hover:brightness-105 shadow-md\">
                $svgCamera
                <span class=\"font-bold text-[#2C1810] !text-[#2C1810]\">PHOTOBOX</span>
            </div>
        </div>

        <!-- HADIAH (Meja Kado Kiri Bawah) -->
        <div class=\"absolute z-20 station-pulse cursor-pointer\" style=\"left: 25.5%; top: 68.5%;\" onclick=\"openModal('hadiah')\">
            <div class=\"retro-card-sm px-2.5 py-1 rounded-md text-[8px] sm:text-[9px] font-pixel-title text-[#2C1810] !text-[#2C1810] flex items-center gap-1.5 hover:brightness-105 shadow-md\">
                $svgGift
                <span class=\"font-bold text-[#2C1810] !text-[#2C1810]\">HADIAH</span>
            </div>
        </div>";

if (strpos($content, $oldBadgesSection) !== false) {
    $content = str_replace($oldBadgesSection, $newBadgesSection, $content);
    echo "5. Replaced emojis with SVG icons and shifted floating badges upward\n";
} else {
    echo "5. Badges section target not found\n";
}

// 5. Bottom Dock Menu Bar: Replace emojis with crisp SVGs and bold text
$oldDock = '        <!-- 2.9 BOTTOM DOCK MENU BAR (Matching ref-dock-icons.jpg & ref-gameplay-hud.jpg) -->
        <div id="bottom-dock-bar" class="absolute inset-x-0 bottom-0 z-30 pointer-events-auto retro-card rounded-t-2xl px-2 py-1.5 flex flex-col justify-between" style="height: 74px; border-bottom: none; border-left: none; border-right: none;">
            <div class="flex items-center justify-between gap-1 overflow-x-auto scrollbar-none px-1">
                <!-- PASANGAN -->
                <button type="button" onclick="openModal(\'pasangan\')" class="dock-item flex flex-col items-center justify-center min-w-[58px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer">
                    <img src="/images/themes/melayu-pixelated/characters/bride_groom.png" alt="Pasangan" class="w-6 h-6 object-contain pixel-crisp">
                    <span class="text-[7px] sm:text-[8px] font-pixel-title text-[#3D271D] mt-0.5">PASANGAN</span>
                </button>

                <!-- ACARA -->
                <button type="button" onclick="openModal(\'acara\')" class="dock-item flex flex-col items-center justify-center min-w-[58px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer">
                    <div class="w-6 h-6 flex items-center justify-center text-base">&#128197;</div>
                    <span class="text-[7px] sm:text-[8px] font-pixel-title text-[#3D271D] mt-0.5">ACARA</span>
                </button>

                <!-- GALERI -->
                <button type="button" onclick="openModal(\'galeri\')" class="dock-item flex flex-col items-center justify-center min-w-[58px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer">
                    <div class="w-6 h-6 flex items-center justify-center text-base">&#128444;</div>
                    <span class="text-[7px] sm:text-[8px] font-pixel-title text-[#3D271D] mt-0.5">GALERI</span>
                </button>

                <!-- UCAPAN & RSVP -->
                <button type="button" onclick="openModal(\'rsvp\')" class="dock-item flex flex-col items-center justify-center min-w-[68px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer">
                    <div class="w-6 h-6 flex items-center justify-center text-base">&#9993;</div>
                    <span class="text-[7px] sm:text-[8px] font-pixel-title text-[#3D271D] mt-0.5 whitespace-nowrap">UCAPAN &amp; RSVP</span>
                </button>

                <!-- HADIAH -->
                <button type="button" onclick="openModal(\'hadiah\')" class="dock-item flex flex-col items-center justify-center min-w-[58px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer">
                    <div class="w-6 h-6 flex items-center justify-center text-base">&#127873;</div>
                    <span class="text-[7px] sm:text-[8px] font-pixel-title text-[#3D271D] mt-0.5">HADIAH</span>
                </button>

                <!-- PHOTOBOX -->
                <button type="button" onclick="openModal(\'photobox\')" class="dock-item flex flex-col items-center justify-center min-w-[58px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer">
                    <div class="w-6 h-6 flex items-center justify-center text-base">&#128247;</div>
                    <span class="text-[7px] sm:text-[8px] font-pixel-title text-[#3D271D] mt-0.5">PHOTOBOX</span>
                </button>
            </div>';

$dockSvgCalendar = '<svg class="w-5 h-5 text-emerald-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>';
$dockSvgGallery = '<svg class="w-5 h-5 text-blue-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>';
$dockSvgEnvelope = '<svg class="w-5 h-5 text-amber-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>';
$dockSvgGift = '<svg class="w-5 h-5 text-rose-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>';
$dockSvgCamera = '<svg class="w-5 h-5 text-purple-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>';

$newDock = "        <!-- 2.9 BOTTOM DOCK MENU BAR (Matching ref-dock-icons.jpg & ref-gameplay-hud.jpg) -->
        <div id=\"bottom-dock-bar\" class=\"absolute inset-x-0 bottom-0 z-30 pointer-events-auto retro-card rounded-t-2xl px-2 py-1.5 flex flex-col justify-between\" style=\"height: 74px; border-bottom: none; border-left: none; border-right: none; background-color: #FAF4E6;\">
            <div class=\"flex items-center justify-between gap-1 overflow-x-auto scrollbar-none px-1\">
                <!-- PASANGAN -->
                <button type=\"button\" onclick=\"openModal('pasangan')\" class=\"dock-item flex flex-col items-center justify-center min-w-[58px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer\">
                    <img src=\"/images/themes/melayu-pixelated/characters/bride_groom.png\" alt=\"Pasangan\" class=\"w-6 h-6 object-contain pixel-crisp drop-shadow-xs\">
                    <span class=\"text-[7.5px] sm:text-[8px] font-pixel-title text-[#2C1810] !text-[#2C1810] font-bold mt-0.5\">PASANGAN</span>
                </button>

                <!-- ACARA -->
                <button type=\"button\" onclick=\"openModal('acara')\" class=\"dock-item flex flex-col items-center justify-center min-w-[58px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer\">
                    <div class=\"w-6 h-6 flex items-center justify-center\">$dockSvgCalendar</div>
                    <span class=\"text-[7.5px] sm:text-[8px] font-pixel-title text-[#2C1810] !text-[#2C1810] font-bold mt-0.5\">ACARA</span>
                </button>

                <!-- GALERI -->
                <button type=\"button\" onclick=\"openModal('galeri')\" class=\"dock-item flex flex-col items-center justify-center min-w-[58px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer\">
                    <div class=\"w-6 h-6 flex items-center justify-center\">$dockSvgGallery</div>
                    <span class=\"text-[7.5px] sm:text-[8px] font-pixel-title text-[#2C1810] !text-[#2C1810] font-bold mt-0.5\">GALERI</span>
                </button>

                <!-- UCAPAN & RSVP -->
                <button type=\"button\" onclick=\"openModal('rsvp')\" class=\"dock-item flex flex-col items-center justify-center min-w-[68px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer\">
                    <div class=\"w-6 h-6 flex items-center justify-center\">$dockSvgEnvelope</div>
                    <span class=\"text-[7.5px] sm:text-[8px] font-pixel-title text-[#2C1810] !text-[#2C1810] font-bold mt-0.5 whitespace-nowrap\">UCAPAN &amp; RSVP</span>
                </button>

                <!-- HADIAH -->
                <button type=\"button\" onclick=\"openModal('hadiah')\" class=\"dock-item flex flex-col items-center justify-center min-w-[58px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer\">
                    <div class=\"w-6 h-6 flex items-center justify-center\">$dockSvgGift</div>
                    <span class=\"text-[7.5px] sm:text-[8px] font-pixel-title text-[#2C1810] !text-[#2C1810] font-bold mt-0.5\">HADIAH</span>
                </button>

                <!-- PHOTOBOX -->
                <button type=\"button\" onclick=\"openModal('photobox')\" class=\"dock-item flex flex-col items-center justify-center min-w-[58px] p-1 rounded-lg hover:bg-[#EFE5CD] active:scale-95 transition cursor-pointer\">
                    <div class=\"w-6 h-6 flex items-center justify-center\">$dockSvgCamera</div>
                    <span class=\"text-[7.5px] sm:text-[8px] font-pixel-title text-[#2C1810] !text-[#2C1810] font-bold mt-0.5\">PHOTOBOX</span>
                </button>
            </div>";

if (strpos($content, $oldDock) !== false) {
    $content = str_replace($oldDock, $newDock, $content);
    echo "6. Updated bottom dock icons & labels\n";
} else {
    echo "6. Dock target not found\n";
}

// 6. Update Modals: Add retro-modal-content class to all modal bodies
$modals = ['modal-pasangan', 'modal-acara', 'modal-galeri', 'modal-rsvp', 'modal-hadiah', 'modal-photobox'];
foreach ($modals as $mId) {
    // Replace <div id="$mId" ...> <div class="w-full max-w-md retro-card rounded-2xl flex flex-col max-h-[88vh] overflow-hidden">
    $oldM = "<div id=\"$mId\" class=\"hidden fixed inset-0 z-[70] bg-black/65 backdrop-blur-xs flex items-center justify-center p-3 select-none\">\n    <div class=\"w-full max-w-md retro-card rounded-2xl flex flex-col max-h-[88vh] overflow-hidden\">";
    $newM = "<div id=\"$mId\" class=\"hidden fixed inset-0 z-[70] bg-black/65 backdrop-blur-xs flex items-center justify-center p-3 select-none\">\n    <div class=\"w-full max-w-md retro-card retro-modal-content rounded-2xl flex flex-col max-h-[88vh] overflow-hidden text-[#2C1810] !text-[#2C1810]\">";
    if (strpos($content, $oldM) !== false) {
        $content = str_replace($oldM, $newM, $content);
        echo "7. Added retro-modal-content to $mId\n";
    }
}

// 7. Update station coordinates in JavaScript
$oldStations = "    stations: [
        { id: 'pasangan', name: 'Pelaminan Pengantin', x: 50, y: 26, radius: 14, label: 'Dekat Pelaminan - Sapa Pengantin [A]' },
        { id: 'kompang', name: 'Pemain Kompang', x: 22, y: 19, radius: 13, label: 'Dekat Musisi - Dengar Kompang Melayu [A]' },
        { id: 'acara', name: 'Rangkaian Acara', x: 26, y: 46, radius: 12, label: 'Dekat Meja Acara - Buka Detail Acara [A]' },
        { id: 'rsvp', name: 'Ucapan & RSVP', x: 25.5, y: 63, radius: 12, label: 'Dekat Meja Tamu - Tulis Doa & RSVP [A]' },
        { id: 'hadiah', name: 'Kirim Hadiah', x: 25.5, y: 79, radius: 12, label: 'Dekat Meja Kado - Kirim Tanda Kasih [A]' },
        { id: 'galeri', name: 'Galeri Foto', x: 77.5, y: 46, radius: 12, label: 'Dekat Galeri - Buka Album Foto [A]' },
        { id: 'photobox', name: 'Photobox', x: 78, y: 63, radius: 12, label: 'Dekat Photobox - Abadikan Momen [A]' }
    ],";

$newStations = "    stations: [
        { id: 'pasangan', name: 'Pelaminan Pengantin', x: 50, y: 25, radius: 14, label: 'Dekat Pelaminan - Sapa Pengantin [A]' },
        { id: 'kompang', name: 'Pemain Kompang', x: 22, y: 19, radius: 13, label: 'Dekat Musisi - Dengar Kompang Melayu [A]' },
        { id: 'acara', name: 'Rangkaian Acara', x: 26, y: 34.5, radius: 12, label: 'Dekat Meja Acara - Buka Detail Acara [A]' },
        { id: 'rsvp', name: 'Ucapan & RSVP', x: 25.5, y: 50.5, radius: 12, label: 'Dekat Meja Tamu - Tulis Doa & RSVP [A]' },
        { id: 'hadiah', name: 'Kirim Hadiah', x: 25.5, y: 68.5, radius: 12, label: 'Dekat Meja Kado - Kirim Tanda Kasih [A]' },
        { id: 'galeri', name: 'Galeri Foto', x: 77.5, y: 34.5, radius: 12, label: 'Dekat Galeri - Buka Album Foto [A]' },
        { id: 'photobox', name: 'Photobox', x: 78, y: 50.5, radius: 12, label: 'Dekat Photobox - Abadikan Momen [A]' }
    ],";

if (strpos($content, $oldStations) !== false) {
    $content = str_replace($oldStations, $newStations, $content);
    echo "8. Updated station coordinates in JavaScript\n";
} else {
    echo "8. Station coordinates target not found\n";
}

file_put_contents($file, $content);
echo "Successfully updated $file\n";
