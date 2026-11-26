<?php

$file = 'resources/views/invitations/themes/premium-melayu-pixelated.blade.php';
$content = file_get_contents($file);

// Replace all emoji HTML entities with clean inline SVGs
$svgHeart = '<svg class="w-3.5 h-3.5 text-rose-600 fill-current inline-block shrink-0" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>';
$svgCalendar = '<svg class="w-3.5 h-3.5 text-emerald-800 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/><path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01"/></svg>';
$svgGallery = '<svg class="w-3.5 h-3.5 text-blue-800 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>';
$svgEnvelope = '<svg class="w-3.5 h-3.5 text-amber-800 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>';
$svgGift = '<svg class="w-3.5 h-3.5 text-rose-700 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>';
$svgCamera = '<svg class="w-3.5 h-3.5 text-purple-800 inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>';
$svgClock = '<svg class="w-3 h-3 text-[#5C3D2E] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>';
$svgPin = '<svg class="w-3 h-3 text-[#2C1810] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>';
$svgCopy = '<svg class="w-3 h-3 text-[#2C1810] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>';
$svgCard = '<svg class="w-3.5 h-3.5 text-[#2C1810] inline-block shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>';
$svgPlay = '<svg class="w-3 h-3 fill-current inline-block shrink-0" viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg>';

// Replace in headers & content
$content = str_replace('<span>&#128197;</span>', $svgCalendar, $content);
$content = str_replace('<span class="text-sm">&#128197;</span>', $svgCalendar, $content);
$content = str_replace('&#128197;', $svgCalendar, $content);

$content = str_replace('<span>&#128444;</span>', $svgGallery, $content);
$content = str_replace('<span class="text-sm">&#128444;</span>', $svgGallery, $content);
$content = str_replace('&#128444;', $svgGallery, $content);

$content = str_replace('<span>&#9993;</span>', $svgEnvelope, $content);
$content = str_replace('<span class="text-sm">&#9993;</span>', $svgEnvelope, $content);
$content = str_replace('&#9993;', $svgEnvelope, $content);

$content = str_replace('<span>&#127873;</span>', $svgGift, $content);
$content = str_replace('<span class="text-sm">&#127873;</span>', $svgGift, $content);
$content = str_replace('&#127873;', $svgGift, $content);

$content = str_replace('<span>&#128247;</span>', $svgCamera, $content);
$content = str_replace('<span class="text-sm">&#128247;</span>', $svgCamera, $content);
$content = str_replace('&#128247;', $svgCamera, $content);

$content = str_replace('&#128337;', $svgClock, $content);
$content = str_replace('<span>&#128506;</span>', $svgPin, $content);
$content = str_replace('&#128506;', $svgPin, $content);
$content = str_replace('<span>&#128203;</span>', $svgCopy, $content);
$content = str_replace('&#128203;', $svgCopy, $content);
$content = str_replace('<span>&#128179;</span>', $svgCard, $content);
$content = str_replace('&#128179;', $svgCard, $content);
$content = str_replace('&#128190;', $svgCopy, $content);
$content = str_replace('&#128172;', $svgEnvelope, $content);

// Replace play buttons
$content = str_replace('&#9654; MULAI JELAJAHI', $svgPlay.' MULAI JELAJAHI', $content);
$content = str_replace('&#9654; PUTAR VIDEO', $svgPlay.' PUTAR VIDEO', $content);

// Update Save to Date Calendar Button to dark background with high contrast text
$oldCalBtn = 'class="w-full py-2.5 rounded-xl bg-[#1B4332] hover:bg-[#255C45] border-2 border-[#D4AF37] text-amber-200 font-pixel-title text-[9px] sm:text-[10px] uppercase tracking-wider flex items-center justify-center gap-2 shadow-sm transition cursor-pointer"';
$newCalBtn = 'style="background-color: #1B4332 !important; color: #FDE047 !important; border: 2px solid #D4AF37 !important;" class="w-full py-2.5 rounded-xl font-pixel-title text-[9px] sm:text-[10px] font-bold uppercase tracking-wider flex items-center justify-center gap-2 shadow-sm transition cursor-pointer hover:brightness-110"';
$content = str_replace($oldCalBtn, $newCalBtn, $content);

// Update Video Button to dark green with yellow text
$oldVideoBtn = 'class="retro-btn w-full py-2.5 rounded-xl font-pixel-title text-[10px] sm:text-xs text-[#3D271D] uppercase tracking-wider flex items-center justify-center gap-2 cursor-pointer"';
$newVideoBtn = 'style="background-color: #E4C580 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-btn w-full py-2.5 rounded-xl font-pixel-title text-[10px] sm:text-xs text-[#2C1810] !text-[#2C1810] font-bold uppercase tracking-wider flex items-center justify-center gap-2 cursor-pointer"';
$content = str_replace($oldVideoBtn, $newVideoBtn, $content);

// Enforce color rules in all inner cards of modals
$content = str_replace('class="retro-card-sm rounded-xl p-3 space-y-1.5"', 'style="background-color: #FFFDF7 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-card-sm rounded-xl p-3 space-y-1.5 text-[#2C1810] !text-[#2C1810]"', $content);
$content = str_replace('class="retro-card-sm rounded-xl p-2.5 space-y-2"', 'style="background-color: #FFFDF7 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-card-sm rounded-xl p-2.5 space-y-2 text-[#2C1810] !text-[#2C1810]"', $content);
$content = str_replace('class="retro-card-sm rounded-xl p-3 text-center space-y-1.5 bg-[#FFFDF7]"', 'style="background-color: #FFFDF7 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-card-sm rounded-xl p-3 text-center space-y-1.5 text-[#2C1810] !text-[#2C1810]"', $content);
$content = str_replace('class="retro-card-sm rounded-xl p-3 space-y-2.5 bg-[#FFFDF7]"', 'style="background-color: #FFFDF7 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-card-sm rounded-xl p-3 space-y-2.5 text-[#2C1810] !text-[#2C1810]"', $content);
$content = str_replace('class="retro-card-sm rounded-xl p-3 space-y-2 bg-[#FFFDF7]"', 'style="background-color: #FFFDF7 !important; color: #2C1810 !important; border: 2px solid #3D271D !important;" class="retro-card-sm rounded-xl p-3 space-y-2 text-[#2C1810] !text-[#2C1810]"', $content);

// Ensure modal headers have explicit background and dark text
$oldHeader = '<div class="px-4 py-3 bg-[#EFE5CD] border-b-2 border-[#3D271D] flex items-center justify-between shrink-0">';
$newHeader = '<div style="background-color: #EFE5CD !important; border-bottom: 2px solid #3D271D !important; color: #2C1810 !important;" class="px-4 py-3 flex items-center justify-between shrink-0 text-[#2C1810] !text-[#2C1810]">';
$content = str_replace($oldHeader, $newHeader, $content);

// Ensure ESC button is always visible
$oldEsc = 'class="px-2.5 py-0.5 rounded bg-[#FAF4E6] border border-[#3D271D] font-pixel-body text-[10px] font-bold text-[#3D271D] shadow-xs hover:bg-white active:translate-y-0.5 cursor-pointer"';
$newEsc = 'style="background-color: #FAF4E6 !important; color: #2C1810 !important; border: 1.5px solid #3D271D !important;" class="px-2.5 py-1 rounded font-pixel-body text-[10px] font-bold text-[#2C1810] !text-[#2C1810] shadow-xs hover:bg-white active:translate-y-0.5 cursor-pointer"';
$content = str_replace($oldEsc, $newEsc, $content);

file_put_contents($file, $content);
echo "Successfully refactored $file with inline styles & crisp SVGs\n";
