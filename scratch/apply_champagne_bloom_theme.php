<?php

$filePath = __DIR__.'/../resources/views/invitations/show.blade.php';
$content = file_get_contents($filePath);

// 1. Cover Overlay container class
$search1 = 'class="fixed inset-0 z-[60] flex items-center justify-center {{ ($currentThemeId == 1 || $currentThemeId == 5 || $currentThemeId == 6 || $currentThemeId == 7 || $isLilacBlooms || $currentThemeId == 11 || $isMistyRomance || $currentThemeId == 13';
$replace1 = 'class="fixed inset-0 z-[60] flex items-center justify-center {{ ($currentThemeId == 1 || $currentThemeId == 5 || $currentThemeId == 6 || $currentThemeId == 7 || $isLilacBlooms || $currentThemeId == 11 || $isMistyRomance || $currentThemeId == 12 || $isChampagneBloom || $currentThemeId == 13';
if (strpos($content, $search1) !== false) {
    $content = str_replace($search1, $replace1, $content);
    echo "1. Cover class updated.\n";
} else {
    echo "1. Cover class NOT found!\n";
}

// 2. Cover Overlay Branch
$t12Cover = <<<'BLADE'
        @elseif($currentThemeId == 12 || $isChampagneBloom)
        <!-- ================= THEME 12 BESPOKE COVER (PREMIUM CHAMPAGNE BLOOM DUAL PANE) ================= -->
        <div class="w-full h-full min-h-screen flex flex-col md:flex-row relative overflow-hidden select-none bg-[#FAF6F0] text-[#3D2B1F]">
            
            <!-- Desktop Left Pane (Mirroring Fixed Sidebar for Seamless Unfold) -->
            <div class="hidden md:flex md:w-[58%] lg:w-[60%] h-full flex-col items-center justify-center p-6 lg:p-12 select-none relative shadow-2xl overflow-hidden"
                 style="background-image: url('{{ $t12BgHorizontal }}'); background-size: cover; background-position: center;">
                
                <!-- Ambient Warm Tint -->
                <div class="absolute inset-0 bg-[#FAF6F0]/40 backdrop-blur-[1px] pointer-events-none"></div>

                <!-- Dried Pampas Grass Floral Corners (Top-Left & Bottom-Right) -->
                <div class="absolute -top-4 -left-4 w-48 lg:w-64 pointer-events-none z-10 anim-pampas-tl opacity-90">
                    <img src="{{ $t12CornerTL }}" alt="" class="w-full h-auto object-contain">
                </div>
                <div class="absolute -bottom-4 -right-4 w-48 lg:w-64 pointer-events-none z-10 anim-pampas-tr opacity-90">
                    <img src="{{ $t12CornerBR }}" alt="" class="w-full h-auto object-contain">
                </div>

                <!-- Center Content Card -->
                <div class="relative z-20 max-w-lg w-full text-center space-y-5 px-8 py-10 rounded-3xl bg-[#FFFDF9]/92 backdrop-blur-md border border-[#E8DCCF] shadow-[0_20px_50px_rgba(61,43,31,0.14)]">
                    <div class="space-y-1">
                        <span class="inline-block px-4 py-1 rounded-full bg-[#A3704C]/10 border border-[#A3704C]/30 text-[#A3704C] text-[10px] lg:text-xs font-semibold tracking-[0.35em] uppercase font-champagne-title">
                            THE WEDDING OF
                        </span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl text-[#3D2B1F] leading-tight font-champagne-heading font-normal tracking-wide">
                        {{ $groomNickname }} <span class="font-champagne-script italic font-normal text-3xl sm:text-4xl lg:text-5xl text-[#A3704C]">&amp;</span> {{ $brideNickname }}
                    </h1>

                    <p class="text-xs lg:text-sm text-[#7A5C43] font-champagne-title tracking-[0.25em] uppercase">
                        {{ $eventDateFormatted }}
                    </p>

                    <div class="w-24 h-[1.5px] bg-gradient-to-r from-transparent via-[#A3704C]/50 to-transparent mx-auto my-3"></div>

                    <!-- Personalized Guest Invitation Box -->
                    <div class="bg-[#FAF6F0] rounded-2xl p-4 border border-[#E8DCCF] max-w-xs mx-auto space-y-1 shadow-xs">
                        <p class="text-[10px] uppercase tracking-wider text-[#8A715D] font-champagne-body">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
                        <p class="text-base font-semibold text-[#3D2B1F] tracking-wide font-champagne-heading">{{ $guestName }}</p>
                    </div>
                </div>
            </div>

            <!-- Mobile & Right Pane: Invitation Cover (Matching Reference Flow) -->
            <div class="w-full md:w-[42%] lg:w-[40%] h-full flex flex-col items-center justify-between p-6 sm:p-10 relative overflow-y-auto"
                 style="background-image: url('{{ $t12BgVertical }}'); background-size: cover; background-position: center;">
                
                <!-- Corner Flowers -->
                <div class="absolute -top-3 -left-3 w-36 sm:w-44 pointer-events-none z-10 anim-pampas-tl opacity-90">
                    <img src="{{ $t12CornerTL }}" alt="" class="w-full h-auto object-contain">
                </div>
                <div class="absolute -top-3 -right-3 w-36 sm:w-44 pointer-events-none z-10 anim-pampas-tr opacity-90">
                    <img src="{{ $t12CornerTR }}" alt="" class="w-full h-auto object-contain">
                </div>

                <!-- Top: "THE WEDDING OF" & Couple Names -->
                <div class="relative z-10 text-center pt-8 sm:pt-10 space-y-1.5 reveal-item anim-fade-up">
                    <p class="text-xs sm:text-sm text-[#A3704C] font-champagne-title tracking-[0.3em] uppercase font-semibold">
                        THE WEDDING OF
                    </p>
                    <h2 class="text-3xl sm:text-4xl text-[#3D2B1F] font-champagne-heading font-normal tracking-wide leading-tight">
                        {{ $groomNickname }} <span class="font-champagne-script italic font-normal text-2xl sm:text-3xl text-[#A3704C]">&amp;</span> {{ $brideNickname }}
                    </h2>
                </div>

                <!-- Center: Round Boho Pampas Frame with Couple Photo -->
                <div class="relative z-10 my-auto py-4 reveal-item anim-boho-pulse">
                    <div class="relative w-52 sm:w-60 aspect-square mx-auto">
                        <div class="w-[76%] h-[76%] rounded-full overflow-hidden absolute top-[7%] left-[6%] shadow-inner bg-stone-100 z-10">
                            <img src="{{ $t12HeroPhoto }}" alt="{{ $groomNickname }} &amp; {{ $brideNickname }}" class="w-full h-full object-cover">
                        </div>
                        <img src="{{ $t12CircleFrame }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-20">
                    </div>
                </div>

                <!-- Bottom: Kepada & Buka Undangan Button -->
                <div class="relative z-10 w-full max-w-xs text-center space-y-4 pb-8 sm:pb-10 reveal-item anim-fade-up delay-1">
                    <div class="bg-white/85 backdrop-blur-xs rounded-2xl p-3.5 border border-[#E8DCCF] space-y-1 shadow-sm">
                        <p class="text-[11px] font-champagne-body text-[#8A715D]">
                            Kepada Bapak/Ibu/Saudara/i:
                        </p>
                        <h3 class="text-lg sm:text-xl font-champagne-heading font-bold text-[#3D2B1F] tracking-wide">
                            {{ $guestName }}
                        </h3>
                    </div>

                    <!-- Buka Undangan Button (Terracotta Pill) -->
                    <div class="pt-1">
                        <button type="button" onclick="openInvitation()" class="btn-open-invitation w-full py-3 px-8 rounded-full bg-[#A3704C] hover:bg-[#8B5E3C] text-white font-semibold text-xs sm:text-sm tracking-wider uppercase shadow-[0_10px_25px_rgba(163,112,76,0.35)] hover:scale-[1.03] active:scale-95 transition-all flex items-center justify-center gap-2 group cursor-pointer font-champagne-body">
                            <svg class="w-4 h-4 text-white group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>Buka Undangan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

BLADE;

$target2 = '@elseif($currentThemeId == 7 || $isLilacBlooms)';
if (strpos($content, $target2) !== false) {
    $content = str_replace($target2, $t12Cover.$target2, $content);
    echo "2. Cover Branch inserted.\n";
} else {
    echo "2. Target for Cover Branch NOT found!\n";
}

// 3. Desktop Fixed Sidebar
$t12Sidebar = <<<'BLADE'
    @if($currentThemeId == 12 || $isChampagneBloom)
    <!-- Desktop Fixed Sidebar for Theme 12 (Premium Champagne Bloom) -->
    <aside id="t12-desktop-sidebar" class="hidden md:flex fixed top-0 left-0 md:w-[58%] lg:w-[60%] h-screen text-[#3D2B1F] z-20 flex-col items-center justify-center p-6 lg:p-12 select-none shadow-2xl overflow-hidden"
           style="background-image: url('{{ $t12BgHorizontal }}'); background-size: cover; background-position: center;">
        
        <!-- Ambient Warm Tint -->
        <div class="absolute inset-0 bg-[#FAF6F0]/40 backdrop-blur-[1px] pointer-events-none"></div>

        <!-- Dried Pampas Grass Floral Corners (Top-Left & Bottom-Right) -->
        <div class="absolute -top-4 -left-4 w-48 lg:w-64 pointer-events-none z-10 anim-pampas-tl opacity-90">
            <img src="{{ $t12CornerTL }}" alt="" class="w-full h-auto object-contain">
        </div>
        <div class="absolute -bottom-4 -right-4 w-48 lg:w-64 pointer-events-none z-10 anim-pampas-tr opacity-90">
            <img src="{{ $t12CornerBR }}" alt="" class="w-full h-auto object-contain">
        </div>

        <!-- Center Content Card -->
        <div class="relative z-20 max-w-lg w-full text-center space-y-5 px-8 py-10 rounded-3xl bg-[#FFFDF9]/92 backdrop-blur-md border border-[#E8DCCF] shadow-[0_20px_50px_rgba(61,43,31,0.14)]">
            <div class="space-y-1">
                <span class="inline-block px-4 py-1 rounded-full bg-[#A3704C]/10 border border-[#A3704C]/30 text-[#A3704C] text-[10px] lg:text-xs font-semibold tracking-[0.35em] uppercase font-champagne-title">
                    THE WEDDING OF
                </span>
            </div>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl text-[#3D2B1F] leading-tight font-champagne-heading font-normal tracking-wide">
                {{ $groomNickname }} <span class="font-champagne-script italic font-normal text-3xl sm:text-4xl lg:text-5xl text-[#A3704C]">&amp;</span> {{ $brideNickname }}
            </h1>

            <p class="text-xs lg:text-sm text-[#7A5C43] font-champagne-title tracking-[0.25em] uppercase">
                {{ $eventDateFormatted }}
            </p>

            <div class="w-24 h-[1.5px] bg-gradient-to-r from-transparent via-[#A3704C]/50 to-transparent mx-auto my-3"></div>

            <!-- Personalized Guest Invitation Box -->
            <div class="bg-[#FAF6F0] rounded-2xl p-4 border border-[#E8DCCF] max-w-xs mx-auto space-y-1 shadow-xs">
                <p class="text-[10px] uppercase tracking-wider text-[#8A715D] font-champagne-body">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
                <p class="text-base font-semibold text-[#3D2B1F] tracking-wide font-champagne-heading">{{ $guestName }}</p>
            </div>
        </div>
    </aside>
    @endif

BLADE;

$target3 = '@if($currentThemeId == 14 || $isNightSky)';
if (strpos($content, $target3) !== false) {
    $content = str_replace($target3, $t12Sidebar.$target3, $content);
    echo "3. Desktop Sidebar inserted.\n";
} else {
    echo "3. Target for Desktop Sidebar NOT found!\n";
}

// 4. Hero Section container class
$search4 = '<section id="section-hero" class="relative {{ ($currentThemeId == 5 || $currentThemeId == 6 || $currentThemeId == 7 || $isLilacBlooms || $currentThemeId == 11 || $isMistyRomance || $currentThemeId == 13';
$replace4 = '<section id="section-hero" class="relative {{ ($currentThemeId == 5 || $currentThemeId == 6 || $currentThemeId == 7 || $isLilacBlooms || $currentThemeId == 11 || $isMistyRomance || $currentThemeId == 12 || $isChampagneBloom || $currentThemeId == 13';
if (strpos($content, $search4) !== false) {
    $content = str_replace($search4, $replace4, $content);
    echo "4. Hero class updated.\n";
} else {
    echo "4. Hero class NOT found!\n";
}

// 5. Hero Section Branch
$t12Hero = <<<'BLADE'
            @elseif($currentThemeId == 12 || $isChampagneBloom)
            <!-- ================= THEME 12: BESPOKE HERO SECTION (PREMIUM CHAMPAGNE BLOOM) ================= -->
            <div class="w-full relative overflow-hidden select-none text-[#3D2B1F] py-12 sm:py-16 px-4 sm:px-6 flex flex-col items-center justify-center space-y-6"
                 style="background-image: url('{{ $t12BgVertical }}'); background-size: cover; background-position: center;">
                
                <!-- Swaying Floral Corners -->
                <div class="absolute -top-3 -left-3 w-36 sm:w-48 pointer-events-none z-10 anim-pampas-tl opacity-90">
                    <img src="{{ $t12CornerTL }}" alt="" class="w-full h-auto object-contain">
                </div>
                <div class="absolute -top-3 -right-3 w-36 sm:w-48 pointer-events-none z-10 anim-pampas-tr opacity-90">
                    <img src="{{ $t12CornerTR }}" alt="" class="w-full h-auto object-contain">
                </div>

                <!-- Round Boho Pampas Frame with Couple Photo -->
                <div class="relative z-10 max-w-sm mx-auto text-center space-y-5 reveal-item anim-fade-up">
                    <div class="relative w-56 sm:w-64 md:w-72 aspect-square mx-auto anim-boho-pulse">
                        <div class="w-[76%] h-[76%] rounded-full overflow-hidden absolute top-[7%] left-[6%] shadow-inner bg-stone-100 z-10">
                            <img src="{{ $t12HeroPhoto }}" alt="{{ $groomNickname }} &amp; {{ $brideNickname }}" class="w-full h-full object-cover">
                        </div>
                        <img src="{{ $t12CircleFrame }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-20">
                    </div>

                    <!-- "The Wedding Of" Title & Couple Names (Matching Reference cc3c3991.png) -->
                    <div class="space-y-2 pt-1">
                        <p class="text-3xl sm:text-4xl text-[#3D2B1F] font-champagne-script italic">
                            The Wedding Of
                        </p>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-champagne-heading text-[#3D2B1F] tracking-wide font-normal">
                            {{ $groomNickname }} <span class="font-champagne-script italic font-normal text-2xl sm:text-3xl text-[#A3704C]">&amp;</span> {{ $brideNickname }}
                        </h1>
                    </div>

                    <!-- Welcome Intro Text (Matching Reference cc3c3991.png) -->
                    <p class="text-xs sm:text-sm text-[#7A5C43] font-champagne-body leading-relaxed max-w-sm mx-auto px-2">
                        Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga, apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do'a restu kepada kami.
                    </p>

                    <!-- Event Date -->
                    <p class="text-xs sm:text-sm font-champagne-title tracking-[0.2em] uppercase text-[#A3704C] font-semibold">
                        {{ $eventDate->translatedFormat('l, d F Y') }}
                    </p>

                    <!-- Countdown Timer 4 Pills in Terracotta (#A3704C) matching cc3c3991.png -->
                    <div class="grid grid-cols-4 gap-2 sm:gap-3 max-w-xs mx-auto pt-2" data-countdown-date="{{ $eventDate->format('Y-m-d') }} {{ $invitation->event_time ? (is_string($invitation->event_time) ? $invitation->event_time : $invitation->event_time->format('H:i:s')) : '09:00:00' }}">
                        <div class="bg-[#A3704C] text-white rounded-2xl py-2.5 px-1 shadow-md text-center">
                            <span class="block text-xl sm:text-2xl font-bold font-champagne-heading leading-tight" data-countdown="days">00</span>
                            <span class="text-[9px] sm:text-[10px] tracking-wider uppercase opacity-90 font-champagne-body">Hari</span>
                        </div>
                        <div class="bg-[#A3704C] text-white rounded-2xl py-2.5 px-1 shadow-md text-center">
                            <span class="block text-xl sm:text-2xl font-bold font-champagne-heading leading-tight" data-countdown="hours">00</span>
                            <span class="text-[9px] sm:text-[10px] tracking-wider uppercase opacity-90 font-champagne-body">Jam</span>
                        </div>
                        <div class="bg-[#A3704C] text-white rounded-2xl py-2.5 px-1 shadow-md text-center">
                            <span class="block text-xl sm:text-2xl font-bold font-champagne-heading leading-tight" data-countdown="minutes">00</span>
                            <span class="text-[9px] sm:text-[10px] tracking-wider uppercase opacity-90 font-champagne-body">Menit</span>
                        </div>
                        <div class="bg-[#A3704C] text-white rounded-2xl py-2.5 px-1 shadow-md text-center">
                            <span class="block text-xl sm:text-2xl font-bold font-champagne-heading leading-tight" data-countdown="seconds">00</span>
                            <span class="text-[9px] sm:text-[10px] tracking-wider uppercase opacity-90 font-champagne-body">Detik</span>
                        </div>
                    </div>

                    <!-- "Simpan Tanggal" Button (Matching Reference cc3c3991.png) -->
                    @php
                        $t12CalTitle = urlencode("Pernikahan " . $groomNickname . " & " . $brideNickname);
                        $t12CalDate = $eventDate->format('Ymd');
                        $t12CalUrl = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$t12CalTitle}&dates={$t12CalDate}/{$t12CalDate}&details=Pernikahan+{$groomNickname}+dan+{$brideNickname}&location=" . urlencode($venue);
                    @endphp
                    <div class="pt-2">
                        <a href="{{ $t12CalUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-[#A3704C] hover:bg-[#8B5E3C] text-white text-xs font-semibold tracking-wider uppercase shadow-md transition-all active:scale-95 font-champagne-body">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                            <span>Simpan Tanggal</span>
                        </a>
                    </div>

                    <!-- Animated Scroll Pill Indicator -->
                    <div class="pt-2">
                        <div class="w-5 h-8 sm:w-6 sm:h-9 rounded-full border-2 border-[#A3704C]/60 flex items-start justify-center p-1 mx-auto cursor-pointer shadow-xs bg-white/40 backdrop-blur-xs"
                             onclick="smoothScrollTo(null, 'section-kutipan')" title="Scroll ke bawah">
                            <span class="w-1 h-2 bg-[#A3704C] rounded-full anim-misty-scroll-dot"></span>
                        </div>
                    </div>
                </div>
            </div>

BLADE;

$target5 = "@else\n            <div class=\"theme-arch-frame bg-white p-5 sm:p-8 md:p-12 shadow-lg w-full mx-auto relative reveal-item anim-border\">";
if (strpos($content, $target5) !== false) {
    $content = str_replace($target5, $t12Hero.$target5, $content);
    echo "5. Hero Branch inserted.\n";
} else {
    echo "5. Target for Hero Branch NOT found!\n";
}

// 6. Kutipan Suci Section
$t12Kutipan = <<<'BLADE'
        @elseif($currentThemeId == 12 || $isChampagneBloom)
        <!-- ================= THEME 12 BESPOKE KUTIPAN SUCI (PREMIUM CHAMPAGNE BLOOM) ================= -->
        <section id="section-kutipan" class="py-12 sm:py-16 px-4 sm:px-6 md:px-10 text-center relative overflow-hidden text-[#3D2B1F]"
                 style="background-image: url('{{ $t12BgVertical }}'); background-size: cover; background-position: center;">
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto rounded-3xl bg-white/90 backdrop-blur-md border border-[#E8DCCF] p-6 sm:p-8 shadow-xl relative space-y-5 reveal-item anim-fade-up">
                
                <!-- Horizontal Garland Header -->
                <div class="w-48 sm:w-64 mx-auto pointer-events-none -mt-2">
                    <img src="{{ $t12Garland }}" alt="" class="w-full h-auto object-contain">
                </div>

                @if(!empty($invitation->quran_text))
                <p class="text-xl sm:text-2xl leading-loose font-serif text-[#3D2B1F] drop-shadow-xs pt-1" dir="rtl">
                    {{ $invitation->quran_text }}
                </p>
                @endif

                <p class="text-xs sm:text-sm text-[#5C4535] leading-relaxed italic font-champagne-body max-w-lg mx-auto">
                    "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir.' }}"
                </p>

                <p class="text-xs font-champagne-title font-semibold text-[#A3704C] tracking-widest uppercase">
                    ( {{ $invitation->quote_source ?? 'QS. Ar-Rum: 21' }} )
                </p>
            </div>
        </section>

BLADE;

$target6 = "@else\n        <section id=\"section-kutipan\" class=\"py-12 sm:py-16 px-6 bg-[var(--bg-accent-block)]";
if (strpos($content, $target6) !== false) {
    $content = str_replace($target6, $t12Kutipan.$target6, $content);
    echo "6. Kutipan Branch inserted.\n";
} else {
    echo "6. Target for Kutipan Branch NOT found!\n";
}

// 7. Mempelai Section
$t12Mempelai = <<<'BLADE'
            @elseif($currentThemeId == 12 || $isChampagneBloom)
            <!-- ================= THEME 12 BESPOKE PROFIL MEMPELAI (PREMIUM CHAMPAGNE BLOOM - MATCHING CC3C3991.PNG) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto rounded-[32px] sm:rounded-[40px] bg-white/92 backdrop-blur-md border border-[#E8DCCF] p-6 sm:p-10 shadow-2xl relative text-center space-y-7 select-none reveal-item anim-fade-up">
                
                <!-- Swaying Pampas Garland at Top of Card -->
                <div class="w-48 sm:w-64 mx-auto pointer-events-none -mt-3 mb-1">
                    <img src="{{ $t12Garland }}" alt="" class="w-full h-auto object-contain">
                </div>

                <!-- Greeting & Invitation Wording -->
                <div class="space-y-2 text-[#3D2B1F]">
                    <h3 class="font-champagne-heading text-xl sm:text-2xl font-normal tracking-wide text-[#3D2B1F]">
                        Assalamu'alaikum Wr. Wb.
                    </h3>
                    <p class="text-xs sm:text-sm text-[#7A5C43] font-champagne-body leading-relaxed max-w-sm mx-auto">
                        Tanpa mengurangi rasa hormat, kami mengundang Bapak/Ibu/Saudara/i serta kerabat sekalian untuk menghadiri hari bahagia pernikahan kami:
                    </p>
                </div>

                <!-- Groom (Mempelai Pria) with Boho Pampas Circular Frame -->
                <div class="space-y-4 pt-2">
                    <div class="relative w-48 sm:w-56 aspect-square mx-auto">
                        <div class="w-[76%] h-[76%] rounded-full overflow-hidden absolute top-[7%] left-[6%] shadow-inner bg-stone-100 z-10">
                            <img src="{{ $t12GroomPhoto }}" alt="{{ $groomName }}" class="w-full h-full object-cover">
                        </div>
                        <img src="{{ $t12CircleFrame }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-20">
                    </div>
                    <div class="space-y-1.5">
                        <h4 class="text-2xl sm:text-3xl font-champagne-heading font-normal text-[#3D2B1F] tracking-wide">
                            {{ $groomName }}
                        </h4>
                        <p class="text-xs sm:text-sm text-[#7A5C43] font-champagne-body leading-relaxed max-w-xs mx-auto">
                            {{ $invitation->groom_parents ?? 'Putra Kedua dari Bapak M. Dawam & (Almh) Ibu Dewi Sudarwati' }}
                        </p>
                        @if(!empty($invitation->groom_instagram))
                        <div class="pt-1.5">
                            <a href="https://instagram.com/{{ ltrim($invitation->groom_instagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-[#A3704C] hover:bg-[#8B5E3C] text-white text-xs font-semibold shadow-sm transition active:scale-95 cursor-pointer font-champagne-body" title="Instagram">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                <span>{{ $invitation->groom_instagram }}</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Ampersand Script Divider -->
                <div class="my-2">
                    <span class="font-champagne-script italic text-4xl sm:text-5xl text-[#A3704C]">&amp;</span>
                </div>

                <!-- Bride (Mempelai Wanita) with Boho Pampas Circular Frame -->
                <div class="space-y-4">
                    <div class="relative w-48 sm:w-56 aspect-square mx-auto">
                        <div class="w-[76%] h-[76%] rounded-full overflow-hidden absolute top-[7%] left-[6%] shadow-inner bg-stone-100 z-10">
                            <img src="{{ $t12BridePhoto }}" alt="{{ $brideName }}" class="w-full h-full object-cover">
                        </div>
                        <img src="{{ $t12CircleFrame }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-20">
                    </div>
                    <div class="space-y-1.5">
                        <h4 class="text-2xl sm:text-3xl font-champagne-heading font-normal text-[#3D2B1F] tracking-wide">
                            {{ $brideName }}
                        </h4>
                        <p class="text-xs sm:text-sm text-[#7A5C43] font-champagne-body leading-relaxed max-w-xs mx-auto">
                            {{ $invitation->bride_parents ?? 'Putri Pertama dari Bapak Anas Rifai & Ibu Kholifah' }}
                        </p>
                        @if(!empty($invitation->bride_instagram))
                        <div class="pt-1.5">
                            <a href="https://instagram.com/{{ ltrim($invitation->bride_instagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-[#A3704C] hover:bg-[#8B5E3C] text-white text-xs font-semibold shadow-sm transition active:scale-95 cursor-pointer font-champagne-body" title="Instagram">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                <span>{{ $invitation->bride_instagram }}</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

BLADE;

$target7 = "@else\n            <div class=\"theme-arch-frame bg-white p-6 sm:p-10 md:p-14 shadow-lg w-full mx-auto relative reveal-item anim-border\">";
if (strpos($content, $target7) !== false) {
    $content = str_replace($target7, $t12Mempelai.$target7, $content);
    echo "7. Mempelai Branch inserted.\n";
} else {
    echo "7. Target for Mempelai Branch NOT found!\n";
}

// 8. Countdown exclude Theme 12
$search8 = '@if($currentThemeId != 1 && $currentThemeId != 6 && !$isBlueBlossom && $currentThemeId != 7 && !$isLilacBlooms && $currentThemeId != 11 && !$isMistyRomance && $currentThemeId != 14 && !$isNightSky && $currentThemeId != 17 && !$isEtherealBloom && $currentThemeId != 18 && !$isCrayonDreams)';
$replace8 = '@if($currentThemeId != 1 && $currentThemeId != 6 && !$isBlueBlossom && $currentThemeId != 7 && !$isLilacBlooms && $currentThemeId != 11 && !$isMistyRomance && $currentThemeId != 12 && !$isChampagneBloom && $currentThemeId != 14 && !$isNightSky && $currentThemeId != 17 && !$isEtherealBloom && $currentThemeId != 18 && !$isCrayonDreams)';
if (strpos($content, $search8) !== false) {
    $content = str_replace($search8, $replace8, $content);
    echo "8. Countdown exclude condition updated.\n";
} else {
    echo "8. Countdown exclude condition NOT found!\n";
}

// 9. Acara Section Branch
$t12Acara = <<<'BLADE'
            @elseif($currentThemeId == 12 || $isChampagneBloom)
            <!-- ================= THEME 12 BESPOKE RANGKAIAN ACARA (PREMIUM CHAMPAGNE BLOOM) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-3xl mx-auto space-y-6 sm:space-y-8 select-none text-[#3D2B1F]">
                <div class="text-center space-y-2 reveal-item anim-fade-up">
                    <span class="inline-block px-3.5 py-0.5 rounded-full bg-[#A3704C]/10 border border-[#A3704C]/30 text-[#A3704C] text-[10px] sm:text-xs font-semibold tracking-[0.35em] uppercase font-champagne-title">
                        WAKTU &amp; TEMPAT
                    </span>
                    <h3 class="text-3xl sm:text-4xl font-champagne-heading font-normal text-[#3D2B1F] tracking-wide">
                        Rangkaian Acara
                    </h3>
                    <p class="text-xs sm:text-sm text-[#7A5C43] font-champagne-body max-w-md mx-auto leading-relaxed">
                        Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Anda untuk hadir di momen bahagia kami:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 text-left">
                    <!-- Akad Nikah Card -->
                    <div class="rounded-3xl bg-white/95 backdrop-blur-md border border-[#E8DCCF] p-6 sm:p-8 shadow-xl relative space-y-4 reveal-item anim-fade-up">
                        <div class="flex items-center justify-between border-b border-[#E8DCCF] pb-3">
                            <h4 class="text-xl sm:text-2xl font-champagne-heading font-normal text-[#3D2B1F]">Akad Nikah</h4>
                            <span class="text-[10px] uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-[#A3704C]/10 text-[#A3704C] font-champagne-title font-semibold">Sacred Vow</span>
                        </div>
                        <div class="space-y-2.5 text-xs sm:text-sm text-[#5C4535] font-champagne-body">
                            <p class="font-medium text-[#3D2B1F] flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#A3704C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>{{ $invitation->akad_date ? $invitation->akad_date->translatedFormat('l, d F Y') : $eventDate->translatedFormat('l, d F Y') }}</span>
                            </p>
                            <p class="flex items-center gap-2 text-[#5C4535]">
                                <svg class="w-4 h-4 text-[#A3704C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>Pukul {{ $invitation->akad_time ? (is_string($invitation->akad_time) ? $invitation->akad_time : $invitation->akad_time->format('H:i')) : '08:00' }} WIB - Selesai</span>
                            </p>
                            <p class="flex items-start gap-2 text-[#5C4535] pt-1">
                                <svg class="w-4 h-4 text-[#A3704C] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span><strong>{{ $akadVenue }}</strong><br><span class="text-xs text-[#7A5C43]">{{ $akadAddress }}</span></span>
                            </p>
                        </div>
                        <div class="pt-2">
                            <a href="{{ $akadMapsUrl }}" target="_blank" rel="noopener noreferrer" class="w-full py-2.5 px-4 rounded-xl bg-[#A3704C] hover:bg-[#8B5E3C] text-white font-medium text-xs tracking-wider uppercase shadow-md flex items-center justify-center gap-2 transition active:scale-95 cursor-pointer font-champagne-body">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Buka Google Maps</span>
                            </a>
                        </div>
                    </div>

                    <!-- Resepsi Card -->
                    <div class="rounded-3xl bg-white/95 backdrop-blur-md border border-[#E8DCCF] p-6 sm:p-8 shadow-xl relative space-y-4 reveal-item anim-fade-up delay-1">
                        <div class="flex items-center justify-between border-b border-[#E8DCCF] pb-3">
                            <h4 class="text-xl sm:text-2xl font-champagne-heading font-normal text-[#3D2B1F]">Resepsi Pernikahan</h4>
                            <span class="text-[10px] uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-[#A3704C]/10 text-[#A3704C] font-champagne-title font-semibold">Celebration</span>
                        </div>
                        <div class="space-y-2.5 text-xs sm:text-sm text-[#5C4535] font-champagne-body">
                            <p class="font-medium text-[#3D2B1F] flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#A3704C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>{{ $eventDate->translatedFormat('l, d F Y') }}</span>
                            </p>
                            <p class="flex items-center gap-2 text-[#5C4535]">
                                <svg class="w-4 h-4 text-[#A3704C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>Pukul {{ $invitation->event_time ? (is_string($invitation->event_time) ? $invitation->event_time : $invitation->event_time->format('H:i')) : '11:00' }} WIB - Selesai</span>
                            </p>
                            <p class="flex items-start gap-2 text-[#5C4535] pt-1">
                                <svg class="w-4 h-4 text-[#A3704C] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span><strong>{{ $venueName }}</strong><br><span class="text-xs text-[#7A5C43]">{{ $venueAddress }}</span></span>
                            </p>
                        </div>
                        <div class="pt-2">
                            <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="w-full py-2.5 px-4 rounded-xl bg-[#A3704C] hover:bg-[#8B5E3C] text-white font-medium text-xs tracking-wider uppercase shadow-md flex items-center justify-center gap-2 transition active:scale-95 cursor-pointer font-champagne-body">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Buka Google Maps</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

BLADE;

$target9 = '@elseif($currentThemeId == 7 || $isLilacBlooms)'."\n".'            <!-- ================= THEME 7 BESPOKE ACARA';
if (strpos($content, $target9) !== false) {
    $content = str_replace($target9, $t12Acara.$target9, $content);
    echo "9. Acara Branch inserted.\n";
} else {
    echo "9. Target for Acara Branch NOT found!\n";
}

// 10. Love Story Section Branch
$t12Story = <<<'BLADE'
            @elseif($currentThemeId == 12 || $isChampagneBloom)
            <!-- ================= THEME 12 BESPOKE LOVE STORY (PREMIUM CHAMPAGNE BLOOM - MATCHING CC3C3991.PNG) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto space-y-6 text-center select-none">
                <!-- Our Story Banner in Terracotta (#A3704C) matching reference -->
                <div class="rounded-2xl bg-[#A3704C] text-white py-4 px-6 shadow-md reveal-item anim-fade-up">
                    <h3 class="text-3xl sm:text-4xl font-champagne-heading font-normal tracking-wide">
                        Our Story
                    </h3>
                    <div class="w-16 h-[1px] bg-white/60 mx-auto mt-2"></div>
                </div>

                @php
                    $t12Stories = !empty($invitation->love_stories) ? $invitation->love_stories : (!empty($invitation->milestones) ? $invitation->milestones : [
                        ['title' => 'Awal Pertemuan', 'story' => 'Pertemuan pertama yang tak disengaja membawa kami pada percakapan-percakapan hangat yang tak pernah usai. Seiring waktu, kenyamanan itu tumbuh menjadi komitmen tulus.'],
                        ['title' => 'Menuju Hari Bahagia', 'story' => 'Dengan doa dan restu kedua orang tua, kami mantap melangkah bersama menuju ikatan suci pernikahan. Menyatukan dua hati, dua keluarga, dalam berkah cinta abadi.']
                    ]);
                    $t12StoryImgs = [$t12StoryPhoto1, $t12StoryPhoto2];
                @endphp

                <div class="space-y-6 pt-2">
                    @foreach($t12Stories as $idx => $s)
                    @if(!empty($s['title']) || !empty($s['story']))
                    <div class="rounded-3xl bg-[#FFFDF9] border border-[#E8DCCF] p-5 sm:p-6 shadow-xl space-y-4 text-center reveal-item anim-fade-up delay-{{ ($idx % 2) + 1 }}">
                        @if(isset($t12StoryImgs[$idx]))
                        <div class="w-full h-48 sm:h-56 rounded-2xl overflow-hidden shadow-md bg-stone-100 group">
                            <img src="{{ $t12StoryImgs[$idx] }}" alt="{{ $s['title'] ?? 'Story Photo' }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                        </div>
                        @endif
                        <div class="space-y-1.5 pt-1">
                            <h4 class="text-xl sm:text-2xl font-champagne-heading font-normal text-[#3D2B1F]">
                                {{ $s['title'] ?? '' }}
                            </h4>
                            <p class="text-xs sm:text-sm text-[#7A5C43] font-champagne-body leading-relaxed max-w-sm mx-auto">
                                {{ $s['story'] ?? '' }}
                            </p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>

BLADE;

$target10 = '@elseif($currentThemeId == 7 || $isLilacBlooms)'."\n".'            <!-- ================= THEME 7 BESPOKE LOVE STORY';
if (strpos($content, $target10) !== false) {
    $content = str_replace($target10, $t12Story.$target10, $content);
    echo "10. Story Branch inserted.\n";
} else {
    echo "10. Target for Story Branch NOT found!\n";
}

// 11. Galeri Section Branch
$t12Galeri = <<<'BLADE'
            @elseif($currentThemeId == 12 || $isChampagneBloom)
            <!-- ================= THEME 12 BESPOKE GALERI FOTO (PREMIUM CHAMPAGNE BLOOM - MATCHING 309024BF.JPG COLLAGE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-3xl mx-auto space-y-6 sm:space-y-8 select-none text-[#3D2B1F]">
                <!-- Header -->
                <div class="text-center space-y-2 reveal-item anim-fade-up">
                    <span class="inline-block px-3.5 py-0.5 rounded-full bg-[#A3704C]/10 border border-[#A3704C]/30 text-[#A3704C] text-[10px] sm:text-xs font-semibold tracking-[0.35em] uppercase font-champagne-title">
                        OUR MOMENTS
                    </span>
                    <h3 class="text-3xl sm:text-4xl font-champagne-heading font-normal tracking-wide text-[#3D2B1F]">
                        Galeri Bahagia
                    </h3>
                    <p class="text-xs sm:text-sm text-[#7A5C43] font-champagne-body max-w-md mx-auto leading-relaxed">
                        Momen-momen indah perjalanan cinta kami yang penuh kehangatan dan kebahagiaan.
                    </p>
                </div>

                <!-- 2-Column Asymmetric Photo Collage Matching 309024bf.jpg -->
                <div class="rounded-3xl bg-[#FAF6F0] border-4 border-[#A3704C] p-3 sm:p-5 shadow-2xl reveal-item anim-fade-up">
                    <div class="grid grid-cols-2 gap-3 sm:gap-4">
                        <!-- Column 1 (Left: Photo 1, Photo 2, Photo 3) -->
                        <div class="space-y-3 sm:space-y-4 flex flex-col">
                            @if(isset($t12GalleryPhotos[0]))
                            <div class="aspect-[4/3] rounded-xl overflow-hidden shadow-md group cursor-pointer relative" onclick="openLightbox('{{ $t12GalleryPhotos[0] }}')">
                                <img src="{{ $t12GalleryPhotos[0] }}" alt="Galeri 1" class="w-full h-full object-cover transform group-hover:scale-108 transition-transform duration-500">
                                <div class="absolute inset-0 bg-[#3D2B1F]/10 group-hover:bg-transparent transition-colors"></div>
                            </div>
                            @endif

                            @if(isset($t12GalleryPhotos[1]))
                            <div class="aspect-[4/3] rounded-xl overflow-hidden shadow-md group cursor-pointer relative" onclick="openLightbox('{{ $t12GalleryPhotos[1] }}')">
                                <img src="{{ $t12GalleryPhotos[1] }}" alt="Galeri 2" class="w-full h-full object-cover transform group-hover:scale-108 transition-transform duration-500">
                                <div class="absolute inset-0 bg-[#3D2B1F]/10 group-hover:bg-transparent transition-colors"></div>
                            </div>
                            @endif

                            @if(isset($t12GalleryPhotos[2]))
                            <div class="aspect-[3/4] rounded-xl overflow-hidden shadow-md group cursor-pointer relative" onclick="openLightbox('{{ $t12GalleryPhotos[2] }}')">
                                <img src="{{ $t12GalleryPhotos[2] }}" alt="Galeri 3" class="w-full h-full object-cover transform group-hover:scale-108 transition-transform duration-500">
                                <div class="absolute inset-0 bg-[#3D2B1F]/10 group-hover:bg-transparent transition-colors"></div>
                            </div>
                            @endif
                        </div>

                        <!-- Column 2 (Right: Photo 4, Photo 5, Photo 6) -->
                        <div class="space-y-3 sm:space-y-4 flex flex-col">
                            @if(isset($t12GalleryPhotos[3]))
                            <div class="aspect-[3/4] rounded-xl overflow-hidden shadow-md group cursor-pointer relative" onclick="openLightbox('{{ $t12GalleryPhotos[3] }}')">
                                <img src="{{ $t12GalleryPhotos[3] }}" alt="Galeri 4" class="w-full h-full object-cover transform group-hover:scale-108 transition-transform duration-500">
                                <div class="absolute inset-0 bg-[#3D2B1F]/10 group-hover:bg-transparent transition-colors"></div>
                            </div>
                            @endif

                            @if(isset($t12GalleryPhotos[4]))
                            <div class="aspect-[3/4] rounded-xl overflow-hidden shadow-md group cursor-pointer relative" onclick="openLightbox('{{ $t12GalleryPhotos[4] }}')">
                                <img src="{{ $t12GalleryPhotos[4] }}" alt="Galeri 5" class="w-full h-full object-cover transform group-hover:scale-108 transition-transform duration-500">
                                <div class="absolute inset-0 bg-[#3D2B1F]/10 group-hover:bg-transparent transition-colors"></div>
                            </div>
                            @endif

                            @if(isset($t12GalleryPhotos[5]))
                            <div class="aspect-[3/4] rounded-xl overflow-hidden shadow-md group cursor-pointer relative" onclick="openLightbox('{{ $t12GalleryPhotos[5] }}')">
                                <img src="{{ $t12GalleryPhotos[5] }}" alt="Galeri 6" class="w-full h-full object-cover transform group-hover:scale-108 transition-transform duration-500">
                                <div class="absolute inset-0 bg-[#3D2B1F]/10 group-hover:bg-transparent transition-colors"></div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <p class="text-[10px] sm:text-xs text-[#8A715D] italic text-center pt-3 font-champagne-body">
                        *Klik foto untuk melihat dalam resolusi penuh
                    </p>
                </div>
            </div>

BLADE;

$target11 = "@else\n            <div class=\"theme-arch-frame bg-white p-5 sm:p-10 shadow-lg w-full mx-auto relative reveal-item anim-border\">";
if (strpos($content, $target11) !== false) {
    $content = str_replace($target11, $t12Galeri.$target11, $content);
    echo "11. Galeri Branch inserted.\n";
} else {
    echo "11. Target for Galeri Branch NOT found!\n";
}

// 12. Titip Hadiah Section Branch
$t12Hadiah = <<<'BLADE'
            @elseif($currentThemeId == 12 || $isChampagneBloom)
            <!-- ================= THEME 12 BESPOKE TITIP HADIAH (PREMIUM CHAMPAGNE BLOOM) ================= -->
            @php
                $t12Gifts = $giftAccounts ?? ($invitation->giftAccounts ?? collect());
            @endphp
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto space-y-6 text-center select-none text-[#3D2B1F]">
                <div class="space-y-2 reveal-item anim-fade-up">
                    <span class="inline-block px-3.5 py-0.5 rounded-full bg-[#A3704C]/10 border border-[#A3704C]/30 text-[#A3704C] text-[10px] sm:text-xs font-semibold tracking-[0.35em] uppercase font-champagne-title">
                        TANDA KASIH
                    </span>
                    <h3 class="text-3xl sm:text-4xl font-champagne-heading font-normal tracking-wide text-[#3D2B1F]">
                        Kirim Hadiah Digital
                    </h3>
                    <p class="text-xs sm:text-sm text-[#7A5C43] font-champagne-body max-w-md mx-auto leading-relaxed">
                        Doa restu Anda merupakan karunia terindah bagi kami. Namun jika Anda bermaksud memberikan tanda kasih, dapat melalui rekening di bawah ini:
                    </p>
                </div>

                <div class="space-y-4">
                    @forelse($t12Gifts as $g)
                    <div class="rounded-2xl bg-white/95 backdrop-blur-md border border-[#E8DCCF] p-5 shadow-lg relative flex flex-col sm:flex-row items-center justify-between gap-4 text-left reveal-item anim-fade-up">
                        <div class="space-y-1 w-full sm:w-auto font-champagne-body">
                            <p class="text-xs font-bold text-[#A3704C] uppercase tracking-wider">{{ $g->bank_name }}</p>
                            <p class="text-xl font-mono font-bold text-[#3D2B1F] tracking-widest">{{ $g->account_number }}</p>
                            <p class="text-xs text-[#7A5C43]">a.n {{ $g->account_holder }}</p>
                        </div>
                        <button type="button" onclick="copyToClipboard('{{ $g->account_number }}', 'Nomor rekening {{ $g->bank_name }} berhasil disalin!')" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-[#A3704C] text-white hover:bg-[#8B5E3C] text-xs font-semibold flex items-center justify-center gap-1.5 transition active:scale-95 shadow-md cursor-pointer font-champagne-body">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            <span>Salin Rekening</span>
                        </button>
                    </div>
                    @empty
                    <div class="rounded-2xl bg-white/95 backdrop-blur-md border border-[#E8DCCF] p-5 shadow-lg relative flex flex-col sm:flex-row items-center justify-between gap-4 text-left reveal-item anim-fade-up">
                        <div class="space-y-1 w-full sm:w-auto font-champagne-body">
                            <p class="text-xs font-bold text-[#A3704C] uppercase tracking-wider">{{ $invitation->gift_bank_name ?? 'Bank Central Asia (BCA)' }}</p>
                            <p class="text-xl font-mono font-bold text-[#3D2B1F] tracking-widest">{{ $invitation->gift_account_number ?? '8801234567' }}</p>
                            <p class="text-xs text-[#7A5C43]">a.n {{ $invitation->gift_account_holder ?? $groomName }}</p>
                        </div>
                        <button type="button" onclick="copyToClipboard('{{ $invitation->gift_account_number ?? '8801234567' }}', 'Nomor rekening berhasil disalin!')" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-[#A3704C] text-white hover:bg-[#8B5E3C] text-xs font-semibold flex items-center justify-center gap-1.5 transition active:scale-95 shadow-md cursor-pointer font-champagne-body">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            <span>Salin Rekening</span>
                        </button>
                    </div>
                    @endforelse
                </div>
            </div>

BLADE;

$target12 = '@elseif($currentThemeId == 7 || $isLilacBlooms)'."\n".'            <!-- ================= THEME 7 BESPOKE TITIP HADIAH';
if (strpos($content, $target12) !== false) {
    $content = str_replace($target12, $t12Hadiah.$target12, $content);
    echo "12. Hadiah Branch inserted.\n";
} else {
    echo "12. Target for Hadiah Branch NOT found!\n";
}

// 13. Penutup Section Branch
$t12Penutup = <<<'BLADE'
        @elseif($currentThemeId == 12 || $isChampagneBloom)
        <!-- ================= THEME 12 BESPOKE CLOSING & TERIMA KASIH (PREMIUM CHAMPAGNE BLOOM) ================= -->
        <section id="section-penutup" class="py-14 sm:py-20 px-4 sm:px-6 md:px-10 text-center relative overflow-hidden select-none text-[#3D2B1F] flex flex-col items-center justify-center space-y-6 pb-36 sm:pb-48"
                 style="background-image: url('{{ $t12BgVertical }}'); background-size: cover; background-position: center;">
            
            <!-- Bottom Corner Flowers -->
            <div class="absolute -bottom-4 -left-4 w-36 sm:w-48 pointer-events-none z-10 opacity-90">
                <img src="{{ $t12CornerBL }}" alt="" class="w-full h-auto object-contain">
            </div>
            <div class="absolute -bottom-4 -right-4 w-36 sm:w-48 pointer-events-none z-10 opacity-90">
                <img src="{{ $t12CornerBR }}" alt="" class="w-full h-auto object-contain">
            </div>

            <!-- Content Container -->
            <div class="relative z-10 max-w-md mx-auto space-y-6 text-center reveal-item anim-fade-up">
                <!-- Top Garland -->
                <div class="w-48 sm:w-64 mx-auto pointer-events-none -mt-2">
                    <img src="{{ $t12Garland }}" alt="" class="w-full h-auto object-contain">
                </div>

                <!-- Round Boho Pampas Couple Photo Frame -->
                <div class="relative w-48 sm:w-56 aspect-square mx-auto anim-boho-pulse">
                    <div class="w-[76%] h-[76%] rounded-full overflow-hidden absolute top-[7%] left-[6%] shadow-inner bg-stone-100 z-10">
                        <img src="{{ $t12HeroPhoto }}" alt="{{ $groomNickname }} &amp; {{ $brideNickname }}" class="w-full h-full object-cover">
                    </div>
                    <img src="{{ $t12CircleFrame }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-20">
                </div>

                <!-- Thank You Message -->
                <p class="text-xs sm:text-sm text-[#7A5C43] font-champagne-body leading-relaxed max-w-sm mx-auto">
                    {{ $invitation->closing_message ?? 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu kepada kami.' }}
                </p>

                <!-- Salam Penutup & Signature -->
                <div class="space-y-1.5 pt-1">
                    <p class="text-xs font-champagne-body font-medium text-[#7A5C43]">
                        Wassalamu'alaikum Wr. Wb.
                    </p>
                    <p class="text-[10px] sm:text-xs font-champagne-title uppercase tracking-widest text-[#A3704C] pt-2 font-semibold">
                        KAMI YANG BERBAHAGIA,
                    </p>
                    <h4 class="text-3xl sm:text-4xl text-[#3D2B1F] font-champagne-heading tracking-wide py-1 font-normal">
                        {{ $groomNickname }} <span class="font-champagne-script italic font-normal text-2xl sm:text-3xl text-[#A3704C]">&amp;</span> {{ $brideNickname }}
                    </h4>
                    <p class="text-[10px] sm:text-xs font-champagne-body uppercase tracking-widest text-[#7A5C43]">
                        {{ $invitation->closing_signature ?? 'Beserta Seluruh Keluarga Besar' }}
                    </p>
                </div>
            </div>
        </section>

BLADE;

$target13 = '@elseif($currentThemeId == 19 || $isLavenderMist)'."\n".'        <!-- ================= THEME 19 BESPOKE CLOSING & TERIMA KASIH';
if (strpos($content, $target13) !== false) {
    $content = str_replace($target13, $t12Penutup.$target13, $content);
    echo "13. Penutup Branch inserted.\n";
} else {
    echo "13. Target for Penutup Branch NOT found!\n";
}

file_put_contents($filePath, $content);
echo "show.blade.php updated successfully!\n";
