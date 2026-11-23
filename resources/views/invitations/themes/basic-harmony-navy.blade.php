{{-- Basic Harmony Navy - Oceanic Waves & Modern Editorial Serif --}}
<div class="min-h-screen relative selection:bg-sky-100 selection:text-sky-900 scrollbar-none pb-28" style="background-color: #FFFFFF; font-family: 'Montserrat', sans-serif; color: #0F172A;">
<style>
@import url('https://fonts.googleapis.com/css2?family=Prata&family=Montserrat:wght@300;400;500;600;700&display=swap');
.font-heading { font-family: 'Prata', serif; }
.theme3-vertical-label {
    writing-mode: vertical-rl;
    text-orientation: mixed;
    transform: rotate(180deg);
}
.theme3-navy-card {
    background: #1E3A5F;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 1rem;
    box-shadow: 0 16px 36px -6px rgba(30, 58, 95, 0.28);
}
.theme3-btn-navy {
    background: #1E3A5F;
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #FFFFFF;
    box-shadow: 0 8px 20px -3px rgba(30, 58, 95, 0.4);
}
.theme3-btn-navy:hover {
    background: #162D4A;
    box-shadow: 0 12px 24px -3px rgba(30, 58, 95, 0.55);
    transform: translateY(-1px);
}
</style>

@php
    $groomNickname = $invitation->groom_nickname ?? 'Rian';
    $brideNickname = $invitation->bride_nickname ?? 'Maya';
    $groomName = $invitation->groom_name ?? 'Rian Pratama, S.Kom.';
    $brideName = $invitation->bride_name ?? 'Maya Anggraini, S.E.';
    $groomParents = $invitation->groom_parents ?? 'Putra pertama dari Bpk. Hendra & Ibu Susi';
    $brideParents = $invitation->bride_parents ?? 'Putri kedua dari Bpk. Bambang & Ibu Dewi';
    $groomInstagram = $invitation->groom_instagram ?? 'rian.pratama';
    $brideInstagram = $invitation->bride_instagram ?? 'maya.anggraini';
    $guestName = $guest->name ?? (request('to', 'Tamu Undangan'));
    $eventDate = $invitation->event_date ?? now()->addDays(62)->startOfDay();
    $eventDateFormatted = $eventDate->translatedFormat('l, d F Y');
    $eventDayName = strtoupper($eventDate->translatedFormat('l'));
    $akadDate = $invitation->akad_date ?? $eventDate;
    $akadDateFormatted = $akadDate->translatedFormat('l, d F Y');
    $akadTimeFormatted = ($invitation->akad_time ? $invitation->akad_time->format('H:i') : '08:00') . ' - ' . ($invitation->akad_end_time ?? 'Selesai') . ' WIB';
    $eventTimeFormatted = ($invitation->event_time ? $invitation->event_time->format('H:i') : '11:00') . ' - ' . ($invitation->event_end_time ?? 'Selesai') . ' WIB';
    $akadVenue = $invitation->akad_venue ?? ($invitation->venue ?? 'Masjid Raya Al-Muhajirin');
    $akadAddress = $invitation->akad_address ?? ($invitation->address ?? 'Jl. Gatot Subroto No. 45, Jakarta Selatan');
    $akadMapsUrl = $invitation->akad_maps_url ?? ($invitation->maps_url ?? 'https://maps.google.com');
    $eventVenue = $invitation->venue ?? 'Grand Ballroom Hotel Mulia';
    $eventAddress = $invitation->address ?? 'Jl. Asia Afrika No. 1, Senayan, Jakarta Pusat';
    $eventMapsUrl = $invitation->maps_url ?? 'https://maps.google.com';
    $galleryPhotos = $invitation->photos && $invitation->photos->count() > 0
        ? $invitation->photos->map(fn($p) => Str::startsWith($p->path, ['http://', 'https://']) ? $p->path : asset('storage/' . $p->path))->toArray()
        : [
            'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80'
        ];
    $bgPhoto = $invitation->background_photo_url ?? ($galleryPhotos[0] ?? '');
    $loveStories = !empty($invitation->love_stories) && is_array($invitation->love_stories) && count($invitation->love_stories) > 0
        ? $invitation->love_stories
        : [
            ['year' => '2020', 'title' => 'Pertama Kali Bertemu', 'story' => 'Takdir mempertemukan kami dalam sebuah seminar kampus.', 'image' => $galleryPhotos[0] ?? null],
            ['year' => '2022', 'title' => 'Menjalin Komitmen', 'story' => 'Kami sepakat untuk saling melangkah bersama.', 'image' => $galleryPhotos[1] ?? null],
            ['year' => '2024', 'title' => 'Momen Lamaran', 'story' => 'Di hadapan kedua keluarga besar, kami mengikat janji suci.', 'image' => $galleryPhotos[2] ?? null],
            ['year' => '2026', 'title' => 'Menuju Pelaminan', 'story' => 'Memulai babak baru kehidupan dengan ridho Allah SWT.', 'image' => $galleryPhotos[3] ?? null]
        ];
@endphp

<!-- ================= 1. COVER SECTION (MATCHING IMAGE 1) ================= -->
<section id="section-cover" class="relative min-h-screen flex flex-col justify-between items-center px-4 py-8 overflow-hidden bg-gradient-to-b from-[#CBDCE7] via-[#2E4D71] to-[#1E3A5F] text-white">
    <!-- Top Layered Organic Waves SVG -->
    <div class="absolute inset-x-0 top-0 w-full pointer-events-none z-0">
        <img src="/images/themes/bg/navy-wave-top.svg" alt="" class="w-full h-24 sm:h-36 object-cover object-bottom opacity-90 transform rotate-180">
    </div>

    <!-- Top Title Badge -->
    <div class="relative z-10 pt-4 text-center">
        <span class="inline-block px-4 py-1 rounded-full text-[10px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-white/90 bg-white/10 backdrop-blur-md border border-white/20">
            {{ $invitation->title ?? 'THE WEDDING OF' }}
        </span>
    </div>

    <!-- Center Frosted Glassmorphism Card (Directly Matching Image 1) -->
    <div class="relative z-10 w-full max-w-sm sm:max-w-md mx-auto my-auto py-4">
        <div class="rounded-2xl p-6 sm:p-8 bg-white/10 backdrop-blur-md border border-white/25 text-center text-white shadow-2xl space-y-4 sm:space-y-5">
            <p class="font-heading text-xs sm:text-sm tracking-[0.25em] uppercase text-white/80 font-medium">
                {{ $invitation->title ?? 'THE WEDDING OF' }}
            </p>

            <h2 class="font-heading text-3xl sm:text-4xl md:text-5xl font-normal text-white tracking-wide">
                {{ $groomNickname }} &amp; {{ $brideNickname }}
            </h2>

            <div class="pt-2 space-y-1">
                <p class="text-[11px] sm:text-xs uppercase tracking-widest text-white/75 font-light">
                    Kpd Bpk/Ibu/Saudara/i
                </p>
                <h3 class="text-lg sm:text-xl font-bold text-white tracking-wide">
                    {{ $guestName }}
                </h3>
            </div>

            <div class="pt-3">
                <a href="#section-hero" class="px-8 sm:px-10 py-3 rounded-full bg-white/20 hover:bg-white/30 border border-white/60 text-white font-bold text-xs sm:text-sm tracking-wider uppercase shadow-lg inline-flex items-center justify-center gap-2 cursor-pointer transition transform active:scale-95 group">
                    <svg class="w-4 h-4 text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Buka Undangan</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Bottom Chevron Indicator -->
    <div class="relative z-10 pb-2 text-white/80 animate-bounce pointer-events-none">
        <svg class="w-6 h-6 mx-auto stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>

<!-- ================= 2. HERO SECTION (MATCHING IMAGE 2 SECTION 1) ================= -->
<section id="section-hero" class="py-8 sm:py-12 px-4 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto space-y-4">
        <div class="w-full rounded-2xl overflow-hidden shadow-2xl relative aspect-[3/4] sm:aspect-[4/5] bg-slate-900 border border-slate-200">
            <img src="{{ $bgPhoto }}" alt="Foto Mempelai" class="w-full h-full object-cover">
            
            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-[#0E1A29]/95 via-[#1E3A5F]/80 to-transparent pt-20 pb-8 px-6 text-center text-white space-y-2">
                <p class="font-heading text-xs sm:text-sm tracking-[0.3em] uppercase text-white/80 font-medium">
                    {{ $invitation->title ?? 'THE WEDDING OF' }}
                </p>
                <h1 class="font-heading text-3xl sm:text-5xl font-bold tracking-wide text-white drop-shadow-md">
                    {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                </h1>
                <p class="text-xs sm:text-sm font-light tracking-widest text-slate-200 uppercase pt-1">
                    {{ $eventDateFormatted }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. KUTIPAN SUCI / AYAT (MATCHING IMAGE 2 SECTION 2) ================= -->
<section id="section-kutipan" class="relative bg-[#1E3A5F] text-white py-14 sm:py-18 px-4 sm:px-6 md:px-10 text-center overflow-hidden">
    <!-- Top Wave Transition -->
    <div class="absolute inset-x-0 top-0 w-full pointer-events-none">
        <img src="/images/themes/bg/navy-wave-top.svg" alt="" class="w-full h-8 sm:h-12 object-cover object-top opacity-80">
    </div>

    <div class="max-w-2xl mx-auto space-y-5 relative z-10 pt-2 pb-4">
        <!-- Botanical Feather Flourish Crest -->
        <div class="w-36 sm:w-44 h-9 mx-auto opacity-90">
            <img src="/images/themes/bg/navy-crest-feather.svg" alt="Emblem" class="w-full h-full object-contain">
        </div>

        @if(!empty($invitation->quran_text))
        <p class="text-xl sm:text-2xl leading-relaxed font-serif text-white/95" dir="rtl">
            {{ $invitation->quran_text }}
        </p>
        @endif

        <p class="text-xs sm:text-sm text-white/90 leading-relaxed italic font-light max-w-lg mx-auto">
            "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu pasangan-pasangan dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}"
        </p>

        <p class="text-[11px] sm:text-xs font-semibold text-sky-200 tracking-widest uppercase font-heading">
            ( {{ $invitation->quote_source ?? 'QS. Ar-Rum 21' }} )
        </p>
    </div>

    <!-- Bottom Wave Transition to White -->
    <div class="absolute inset-x-0 bottom-0 w-full pointer-events-none">
        <img src="/images/themes/bg/navy-wave-bottom.svg" alt="" class="w-full h-8 sm:h-12 object-cover object-bottom opacity-80">
    </div>
</section>

<!-- ================= 4. MEMPELAI (MATCHING IMAGE 2 SECTION 3 & 4) ================= -->
<section id="section-mempelai" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-10 sm:space-y-14">
        <!-- 1. Salam Pembuka Card with 3-Photo Preview Row on Pure White Background -->
        <div class="space-y-4 text-center">
            <h3 class="font-heading text-base sm:text-lg tracking-[0.2em] uppercase text-[#1E3A5F] font-bold">
                ASSALAMU'ALAIKUM WR. WB.
            </h3>
            <p class="text-xs sm:text-sm text-stone-600 leading-relaxed max-w-lg mx-auto font-light">
                Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan. Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk menghadiri hari bahagia pernikahan kami:
            </p>

            <!-- 3-Photo Mini Preview Row -->
            <div class="grid grid-cols-3 gap-2.5 sm:gap-3.5 max-w-xs sm:max-w-sm mx-auto pt-2">
                @for($p = 0; $p < 3; $p++)
                <div class="aspect-square rounded-xl overflow-hidden shadow-sm border border-slate-200 group">
                    <img src="{{ $galleryPhotos[$p] ?? $galleryPhotos[0] }}" alt="Preview {{ $p+1 }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                @endfor
            </div>
        </div>

        <!-- 2. The Bride & The Groom Cards with Vertical Side Labels (Matching Image 2 Section 4) -->
        <div class="space-y-6 sm:space-y-8">
            <div class="text-center">
                <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-stone-500 font-heading block">
                    PASANGAN MEMPELAI
                </span>
                <div class="w-12 h-0.5 bg-[#1E3A5F] mx-auto mt-2 opacity-60"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-10 items-stretch">
                <!-- CARD 1: THE BRIDE (Vertical Label on the Left) -->
                <div class="flex items-center gap-3 sm:gap-4 w-full">
                    <div class="theme3-vertical-label select-none text-xs sm:text-sm font-heading tracking-[0.3em] uppercase text-[#1E3A5F] font-bold py-2">
                        The Bride
                    </div>
                    <div class="flex-1 rounded-2xl overflow-hidden shadow-xl border border-slate-200 relative group aspect-[3/4] bg-slate-900">
                        @if(!empty($invitation->bride_photo))
                            <img src="{{ Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo) }}" alt="The Bride" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                            <img src="{{ $galleryPhotos[1] ?? $galleryPhotos[0] }}" alt="The Bride" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @endif
                        <!-- Dark Navy Glass Banner at Bottom -->
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-[#0A1626]/95 via-[#1E3A5F]/85 to-transparent pt-12 pb-5 px-4 text-center text-white">
                            <h4 class="font-heading text-lg sm:text-xl font-bold tracking-wide text-white">
                                {{ $brideName }}
                            </h4>
                            <p class="text-xs sm:text-sm text-slate-200 font-light mt-1">
                                {{ $brideParents }}
                            </p>
                            @if($brideInstagram)
                            <div class="pt-2">
                                <a href="https://instagram.com/{{ ltrim($brideInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-white/15 hover:bg-white/25 border border-white/30 text-[11px] text-white transition shadow-xs">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    <span>&#64;{{ ltrim($brideInstagram, '@') }}</span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- CARD 2: THE GROOM (Vertical Label on the Right) -->
                <div class="flex items-center gap-3 sm:gap-4 w-full">
                    <div class="flex-1 rounded-2xl overflow-hidden shadow-xl border border-slate-200 relative group aspect-[3/4] bg-slate-900">
                        @if(!empty($invitation->groom_photo))
                            <img src="{{ Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo) }}" alt="The Groom" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                            <img src="{{ $galleryPhotos[0] }}" alt="The Groom" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @endif
                        <!-- Dark Navy Glass Banner at Bottom -->
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-[#0A1626]/95 via-[#1E3A5F]/85 to-transparent pt-12 pb-5 px-4 text-center text-white">
                            <h4 class="font-heading text-lg sm:text-xl font-bold tracking-wide text-white">
                                {{ $groomName }}
                            </h4>
                            <p class="text-xs sm:text-sm text-slate-200 font-light mt-1">
                                {{ $groomParents }}
                            </p>
                            @if($groomInstagram)
                            <div class="pt-2">
                                <a href="https://instagram.com/{{ ltrim($groomInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-white/15 hover:bg-white/25 border border-white/30 text-[11px] text-white transition shadow-xs">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    <span>&#64;{{ ltrim($groomInstagram, '@') }}</span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="theme3-vertical-label select-none text-xs sm:text-sm font-heading tracking-[0.3em] uppercase text-[#1E3A5F] font-bold py-2">
                        The Groom
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. COUNTDOWN SECTION (MATCHING IMAGE 2 SECTION 5) ================= -->
<section id="section-countdown" class="py-10 sm:py-14 px-4 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto rounded-2xl shadow-xl bg-[#1E3A5F] text-white p-5 sm:p-7 relative border border-white/20">
        <div class="text-center space-y-4">
            <div>
                <span class="text-[10px] sm:text-xs font-semibold tracking-[0.3em] uppercase text-sky-200 font-heading block">
                    MENGHITUNG HARI
                </span>
                <h3 class="font-heading text-xl sm:text-2xl font-bold tracking-wider text-white mt-1">
                    COUNTDOWN
                </h3>
            </div>

            <div class="grid grid-cols-4 gap-2 sm:gap-3 py-2">
                <div class="bg-white/10 backdrop-blur-md rounded-xl p-2.5 sm:p-3.5 border border-white/20 text-center">
                    <span id="days-3" class="font-mono text-2xl sm:text-3xl font-bold text-white block">{{ $invitation->days_remaining ?? '00' }}</span>
                    <span class="text-[9px] sm:text-[10px] uppercase tracking-wider text-slate-200 mt-0.5 block">Hari</span>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-xl p-2.5 sm:p-3.5 border border-white/20 text-center">
                    <span id="hours-3" class="font-mono text-2xl sm:text-3xl font-bold text-white block">00</span>
                    <span class="text-[9px] sm:text-[10px] uppercase tracking-wider text-slate-200 mt-0.5 block">Jam</span>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-xl p-2.5 sm:p-3.5 border border-white/20 text-center">
                    <span id="minutes-3" class="font-mono text-2xl sm:text-3xl font-bold text-white block">00</span>
                    <span class="text-[9px] sm:text-[10px] uppercase tracking-wider text-slate-200 mt-0.5 block">Menit</span>
                </div>
                <div class="bg-white/10 backdrop-blur-md rounded-xl p-2.5 sm:p-3.5 border border-white/20 text-center">
                    <span id="seconds-3" class="font-mono text-2xl sm:text-3xl font-bold text-white block">00</span>
                    <span class="text-[9px] sm:text-[10px] uppercase tracking-wider text-slate-200 mt-0.5 block">Detik</span>
                </div>
            </div>

            <div class="pt-2">
                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode('Pernikahan ' . $groomNickname . ' & ' . $brideNickname) }}&dates={{ $eventDate->format('Ymd') }}T090000Z/{{ $eventDate->format('Ymd') }}T130000Z&details={{ urlencode('Pernikahan ' . $groomName . ' & ' . $brideName) }}&location={{ urlencode($eventVenue . ', ' . $eventAddress) }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2.5 rounded-full bg-white text-[#1E3A5F] hover:bg-slate-100 font-bold text-xs tracking-wider uppercase inline-flex items-center gap-2 transition shadow-md">
                    <svg class="w-4 h-4 text-[#1E3A5F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>SIMPAN KE KALENDER</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= 6. RANGKAIAN ACARA (MATCHING IMAGE 2 SECTION 6 & 7) ================= -->
<section id="section-acara" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-6 sm:space-y-8">
        <div class="text-center space-y-1">
            <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-stone-500 font-heading block">
                WAKTU &amp; TEMPAT
            </span>
            <h3 class="font-heading text-2xl sm:text-3xl font-bold tracking-wide text-stone-800">
                Rangkaian Acara
            </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 items-stretch">
            <!-- 1. KARTU AKAD (Arch Dome Shape matching Image 2) -->
            <div class="rounded-t-full rounded-b-2xl shadow-xl bg-gradient-to-b from-[#F4F8FC] to-white border border-[#CBDCEB] p-6 sm:p-8 text-center flex flex-col justify-between">
                <div class="space-y-4 pt-6">
                    <div class="inline-block px-5 py-1.5 rounded-full bg-[#1E3A5F] text-white font-heading text-xs font-bold tracking-widest uppercase shadow-xs">
                        AKAD NIKAH
                    </div>

                    <div class="py-2 space-y-1">
                        <p class="font-heading text-lg sm:text-xl font-bold text-[#1E3A5F] tracking-wide">
                            {{ strtoupper($akadDate->translatedFormat('l, d F Y')) }}
                        </p>
                        <p class="text-xs sm:text-sm text-stone-600 font-medium">
                            Pukul {{ $akadTimeFormatted }}
                        </p>
                    </div>

                    <div class="space-y-1 text-stone-700">
                        <p class="font-bold text-sm sm:text-base text-stone-900">{{ $akadVenue }}</p>
                        <p class="text-xs text-stone-600 leading-relaxed max-w-xs mx-auto">{{ $akadAddress }}</p>
                    </div>
                </div>

                <div class="pt-6">
                    <a href="{{ $akadMapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2.5 rounded-full bg-[#1E3A5F] hover:bg-[#162D4A] text-white font-semibold text-xs tracking-wider uppercase inline-flex items-center justify-center gap-2 shadow-md transition transform active:scale-95">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Google Maps</span>
                    </a>
                </div>
            </div>

            <!-- 2. KARTU RESEPSI (Arch Dome Shape matching Image 2) -->
            <div class="rounded-t-full rounded-b-2xl shadow-xl bg-gradient-to-b from-[#F4F8FC] to-white border border-[#CBDCEB] p-6 sm:p-8 text-center flex flex-col justify-between">
                <div class="space-y-4 pt-6">
                    <div class="inline-block px-5 py-1.5 rounded-full bg-[#1E3A5F] text-white font-heading text-xs font-bold tracking-widest uppercase shadow-xs">
                        RESEPSI
                    </div>

                    <div class="py-2 space-y-1">
                        <p class="font-heading text-lg sm:text-xl font-bold text-[#1E3A5F] tracking-wide">
                            {{ strtoupper($eventDate->translatedFormat('l, d F Y')) }}
                        </p>
                        <p class="text-xs sm:text-sm text-stone-600 font-medium">
                            Pukul {{ $eventTimeFormatted }}
                        </p>
                    </div>

                    <div class="space-y-1 text-stone-700">
                        <p class="font-bold text-sm sm:text-base text-stone-900">{{ $eventVenue }}</p>
                        <p class="text-xs text-stone-600 leading-relaxed max-w-xs mx-auto">{{ $eventAddress }}</p>
                    </div>
                </div>

                <div class="pt-6">
                    <a href="{{ $eventMapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2.5 rounded-full bg-[#1E3A5F] hover:bg-[#162D4A] text-white font-semibold text-xs tracking-wider uppercase inline-flex items-center justify-center gap-2 shadow-md transition transform active:scale-95">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Google Maps</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- 3. KARTU DRESSCODE (Matching Image 2 Section 7) -->
        <div class="rounded-2xl p-5 sm:p-6 bg-[#1E3A5F] text-white shadow-xl border border-white/20 text-center max-w-md mx-auto space-y-3">
            <span class="text-[10px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-sky-200 font-heading block">
                DRESSCODE
            </span>
            <div class="flex items-center justify-center gap-3 py-1">
                <span class="w-6 h-6 rounded-full bg-[#1E3A5F] border-2 border-white shadow-xs" title="Navy"></span>
                <span class="w-6 h-6 rounded-full bg-[#4B6B94] border-2 border-white shadow-xs" title="Slate Blue"></span>
                <span class="w-6 h-6 rounded-full bg-[#FFFFFF] border-2 border-slate-300 shadow-xs" title="White"></span>
                <span class="w-6 h-6 rounded-full bg-[#DCE7F0] border-2 border-white shadow-xs" title="Ice Blue"></span>
            </div>
            <p class="text-xs text-slate-200 font-light leading-relaxed max-w-xs mx-auto">
                Nuansa Pakaian: Navy / Biru / Putih. Para tamu undangan disarankan mengenakan pakaian formal yang rapi dan sopan.
            </p>
        </div>
    </div>
</section>

<!-- ================= 7. GALERI FOTO (MATCHING IMAGE 2 SECTION 8) ================= -->
<section id="section-galeri" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center bg-slate-50">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-6 sm:space-y-8">
        <div class="text-center space-y-1">
            <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-stone-500 font-heading block">
                OUR MOMENTS
            </span>
            <h3 class="font-heading text-2xl sm:text-3xl font-bold tracking-wide text-stone-800">
                Galeri Foto
            </h3>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5 sm:gap-3.5">
            @foreach($galleryPhotos as $idx => $photoUrl)
            <div class="{{ $idx === 2 ? 'col-span-2 md:col-span-2 row-span-1 aspect-[16/9]' : 'col-span-1 aspect-[3/4]' }} rounded-xl overflow-hidden shadow-md border border-slate-200 cursor-pointer group relative">
                <img src="{{ $photoUrl }}" alt="Galeri Foto {{ $idx+1 }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-[#1E3A5F]/0 group-hover:bg-[#1E3A5F]/30 transition-colors flex items-center justify-center">
                    <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ================= 8. LOVE STORY (MATCHING IMAGE 2 SECTION 9) ================= -->
@if($invitation->show_love_story ?? true)
<section id="section-cerita" class="relative bg-[#1E3A5F] text-white py-14 sm:py-20 px-4 sm:px-6 md:px-10 overflow-hidden">
    <!-- Top Wave Transition -->
    <div class="absolute inset-x-0 top-0 w-full pointer-events-none">
        <img src="/images/themes/bg/navy-wave-top.svg" alt="" class="w-full h-8 sm:h-12 object-cover object-top opacity-80">
    </div>

    <div class="max-w-2xl mx-auto space-y-6 sm:space-y-8 relative z-10 pt-2 pb-4">
        <div class="text-center space-y-1">
            <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-sky-200 font-heading block">
                PERJALANAN KAMI
            </span>
            <h3 class="font-heading text-2xl sm:text-3xl font-bold tracking-wide text-white">
                Love Story
            </h3>
        </div>

        <div class="space-y-6">
            @foreach($loveStories as $idx => $story)
            <div class="rounded-xl overflow-hidden bg-white/10 backdrop-blur-md border border-white/20 shadow-md">
                @if(!empty($story['image']))
                <div class="w-full aspect-[16/9] sm:aspect-[21/9] overflow-hidden">
                    <img src="{{ Str::startsWith($story['image'], ['http://', 'https://']) ? $story['image'] : asset('storage/' . $story['image']) }}" alt="{{ $story['title'] ?? 'Story' }}" class="w-full h-full object-cover">
                </div>
                @endif
                <div class="p-4 sm:p-5 space-y-2">
                    <div class="flex items-center justify-between text-sky-200 text-xs font-bold font-mono">
                        <span>#0{{ $idx+1 }}</span>
                        <span class="px-2.5 py-0.5 rounded-full bg-white/15 border border-white/30 text-[10px]">{{ $story['year'] ?? '' }}</span>
                    </div>
                    <h4 class="font-heading text-base sm:text-lg font-bold text-white">{{ $story['title'] ?? '' }}</h4>
                    <p class="text-xs sm:text-sm text-slate-200 font-light leading-relaxed">{{ $story['story'] ?? '' }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bottom Wave Transition to White -->
    <div class="absolute inset-x-0 bottom-0 w-full pointer-events-none">
        <img src="/images/themes/bg/navy-wave-bottom.svg" alt="" class="w-full h-8 sm:h-12 object-cover object-bottom opacity-80">
    </div>
</section>
@endif

<!-- ================= 9. RSVP & BUKU TAMU (MATCHING IMAGE 1 & IMAGE 2 SECTION 10 & 11) ================= -->
<section id="section-rsvp" class="py-12 sm:py-18 px-4 sm:px-6 md:px-10 bg-slate-50">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto space-y-8 sm:space-y-10">
        <!-- 1. RSVP via WhatsApp Card (Directly Matching Image 1 & Image 2) -->
        <div class="rounded-2xl p-6 sm:p-8 bg-[#1E3A5F] text-white shadow-2xl border border-white/20 space-y-5">
            <div class="text-center">
                <h3 class="font-heading text-3xl sm:text-4xl font-normal tracking-wide text-white">
                    RSVP
                </h3>
                <p class="text-xs sm:text-sm italic font-light text-sky-200 mt-1">
                    Reservasi kehadiranmu via whatsapp
                </p>
            </div>

            <div class="bg-white rounded-xl p-5 sm:p-6 text-stone-800 space-y-4 text-left">
                <div>
                    <label for="rsvp_guest_name_t3" class="block text-xs font-semibold text-stone-700 mb-1">Nama Lengkap</label>
                    <input type="text" id="rsvp_guest_name_t3" value="{{ $guestName }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-xs text-stone-800 focus:outline-none focus:border-[#1E3A5F]" placeholder="Nama Lengkap">
                </div>

                <div>
                    <label for="rsvp_guest_count_t3" class="block text-xs font-semibold text-stone-700 mb-1">Jumlah Tamu</label>
                    <select id="rsvp_guest_count_t3" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-xs text-stone-800 focus:outline-none focus:border-[#1E3A5F]">
                        <option value="1">1 Orang</option>
                        <option value="2">2 Orang</option>
                        <option value="3">3 Orang</option>
                        <option value="4">4 Orang</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-700 mb-1.5">Konfirmasi Kehadiran</label>
                    <div class="grid grid-cols-3 gap-2">
                        <label class="flex flex-col items-center justify-center p-2 rounded-xl border border-slate-200 cursor-pointer text-xs font-medium hover:bg-slate-50 transition">
                            <input type="radio" name="rsvp_status_t3" value="Hadir" checked class="text-[#1E3A5F] mb-1">
                            <span>Hadir</span>
                        </label>
                        <label class="flex flex-col items-center justify-center p-2 rounded-xl border border-slate-200 cursor-pointer text-xs font-medium hover:bg-slate-50 transition">
                            <input type="radio" name="rsvp_status_t3" value="Tidak Hadir" class="text-[#1E3A5F] mb-1">
                            <span>Tidak Hadir</span>
                        </label>
                        <label class="flex flex-col items-center justify-center p-2 rounded-xl border border-slate-200 cursor-pointer text-xs font-medium hover:bg-slate-50 transition">
                            <input type="radio" name="rsvp_status_t3" value="Ragu-ragu" class="text-[#1E3A5F] mb-1">
                            <span>Ragu-ragu</span>
                        </label>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="button" onclick="sendWhatsAppRSVPT3()" class="w-full py-3 rounded-full bg-[#1E3A5F] hover:bg-[#162D4A] text-white font-bold text-xs tracking-wider uppercase shadow-md flex items-center justify-center gap-2 transition cursor-pointer">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.592 2.654-.696c1.004.549 1.956.848 2.806.849h.001c3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.586-5.766-5.769-5.766zm0 10.378h-.001c-.808 0-1.603-.217-2.298-.629l-.165-.098-1.708.448.456-1.664-.107-.171c-.453-.72-.692-1.554-.691-2.498.001-2.539 2.067-4.605 4.607-4.605 2.539 0 4.605 2.066 4.606 4.606-.001 2.54-2.067 4.606-4.607 4.606zm2.528-3.454c-.139-.069-.821-.405-.948-.451-.128-.046-.221-.069-.314.07-.093.138-.36.451-.442.544-.081.092-.163.104-.302.035s-.588-.217-1.12-.691c-.414-.369-.693-.825-.774-.964-.081-.139-.009-.214.061-.283.063-.062.139-.163.209-.244.069-.081.093-.139.139-.232.046-.093.023-.174-.012-.244-.035-.069-.314-.755-.43-.1033-.113-.271-.227-.234-.313-.239l-.268-.005c-.093 0-.244.035-.372.174-.128.139-.488.476-.488 1.16s.5 1.346.57 1.439c.069.093.984 1.502 2.384 2.106.333.144.593.229.796.294.335.106.64.091.881.055.269-.04 821-.336.937-.661.116-.325.116-.603.081-.661-.034-.058-.127-.092-.266-.162z"/></svg>
                        <span>Kirim via WhatsApp</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. Guestbook Wishes Feed -->
        <div class="rounded-2xl p-6 sm:p-8 bg-white border border-slate-200 shadow-xl space-y-4 text-center">
            <h4 class="font-heading text-lg sm:text-xl font-bold tracking-wide text-stone-800">
                Buku Tamu &amp; Ucapan Doa
            </h4>
            <form id="comment-form-t3" onsubmit="submitComment(event)" class="space-y-3 text-left">
                @csrf
                <input type="hidden" name="invitation_id" value="{{ $invitation->id }}">
                <input type="text" name="name" required value="{{ $guestName !== 'Tamu Undangan' ? $guestName : '' }}" placeholder="Nama Anda" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-stone-800 text-xs focus:outline-none focus:border-[#1E3A5F]">
                <textarea name="comment" rows="3" required placeholder="Tulis ucapan &amp; doa restu..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-stone-800 text-xs focus:outline-none focus:border-[#1E3A5F]"></textarea>
                <button type="submit" class="w-full py-2.5 rounded-full bg-[#1E3A5F] hover:bg-[#162D4A] text-white font-bold text-xs tracking-wider uppercase transition shadow-md">
                    Kirim Doa Restu
                </button>
            </form>
        </div>
    </div>
</section>

<!-- ================= 10. KIRIM HADIAH (MATCHING IMAGE 2 SECTION 12) ================= -->
<section id="section-hadiah" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-6 sm:space-y-8">
        <div class="text-center space-y-1">
            <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-stone-500 font-heading block">
                TANDA KASIH
            </span>
            <h3 class="font-heading text-2xl sm:text-3xl font-bold tracking-wide text-stone-800">
                Kirim Hadiah
            </h3>
            <p class="text-xs text-stone-600 max-w-sm mx-auto">
                Doa restu Anda adalah karunia terindah bagi kami. Namun jika hendak memberikan tanda kasih, Anda dapat menyalurkannya melalui:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 items-stretch">
            <div class="rounded-2xl p-5 sm:p-6 bg-[#1E3A5F] text-white shadow-xl border border-white/20 text-center flex flex-col justify-between space-y-4">
                <div class="space-y-2">
                    <span class="text-[10px] sm:text-xs font-bold tracking-widest uppercase text-sky-200">
                        TRANSFER BANK
                    </span>
                    <p class="font-heading text-lg sm:text-xl font-bold text-white">
                        {{ $invitation->gift_bank_name ?? 'BCA' }}
                    </p>
                    <div class="py-2">
                        <p id="rekening-number-t3-1" class="font-mono text-xl sm:text-2xl font-bold tracking-wider text-sky-100">
                            {{ $invitation->gift_account_number ?? '1234567890' }}
                        </p>
                        <p class="text-xs text-slate-200 font-light mt-1">
                            a.n. {{ $invitation->gift_account_holder ?? ($groomNickname . ' & ' . $brideNickname) }}
                        </p>
                    </div>
                </div>
                <div>
                    <button type="button" onclick="copyToClipboard('{{ $invitation->gift_account_number ?? '1234567890' }}', 'Nomor rekening')" class="px-6 py-2 rounded-full bg-white/20 hover:bg-white/30 border border-white/40 text-white font-medium text-xs tracking-wider uppercase inline-flex items-center gap-1.5 transition active:scale-95">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                        <span>Salin No. Rekening</span>
                    </button>
                </div>
            </div>

            <div class="rounded-2xl p-5 sm:p-6 bg-[#1E3A5F] text-white shadow-xl border border-white/20 text-center flex flex-col justify-between space-y-4">
                <div class="space-y-2">
                    <span class="text-[10px] sm:text-xs font-bold tracking-widest uppercase text-sky-200">
                        KIRIM KADO FISIK
                    </span>
                    <p class="font-heading text-lg sm:text-xl font-bold text-white">
                        Alamat Pengiriman
                    </p>
                    <div class="py-2">
                        <p class="text-xs sm:text-sm text-slate-100 leading-relaxed font-light">
                            {{ $invitation->gift_address ?? ($eventVenue . ', ' . $eventAddress) }}
                        </p>
                        <p class="text-xs text-sky-200 font-medium mt-1">
                            Penerima: {{ $invitation->gift_recipient_name ?? ($groomNickname . ' / ' . $brideNickname) }}
                        </p>
                    </div>
                </div>
                <div>
                    <button type="button" onclick="copyToClipboard('{{ $invitation->gift_address ?? ($eventVenue . ', ' . $eventAddress) }}', 'Alamat kado')" class="px-6 py-2 rounded-full bg-white/20 hover:bg-white/30 border border-white/40 text-white font-medium text-xs tracking-wider uppercase inline-flex items-center gap-1.5 transition active:scale-95">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                        <span>Salin Alamat</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 11. CLOSING SECTION (MATCHING IMAGE 2 SECTION 13) ================= -->
<section class="relative bg-[#1E3A5F] text-white py-14 sm:py-20 px-4 sm:px-6 md:px-10 text-center overflow-hidden">
    <div class="max-w-xl mx-auto space-y-4 relative z-10">
        <div class="w-32 sm:w-40 h-8 mx-auto opacity-80">
            <img src="/images/themes/bg/navy-crest-feather.svg" alt="" class="w-full h-full object-contain">
        </div>

        <h3 class="font-heading text-2xl sm:text-3xl font-bold tracking-wide text-white">
            {{ $invitation->closing_title ?? 'Terima Kasih' }}
        </h3>

        <p class="text-xs sm:text-sm text-slate-200 leading-relaxed font-light max-w-md mx-auto">
            {{ $invitation->closing_message ?? 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kami.' }}
        </p>

        <p class="font-heading text-lg sm:text-xl font-bold tracking-wider text-sky-200 pt-3">
            {{ $invitation->closing_signature ?? ($groomNickname . ' & ' . $brideNickname) }}
        </p>
    </div>

    <div class="absolute inset-x-0 bottom-0 w-full pointer-events-none">
        <img src="/images/themes/bg/navy-wave-bottom.svg" alt="" class="w-full h-10 sm:h-14 object-cover object-bottom opacity-70">
    </div>
</section>

<!-- Toast Notification -->
<div id="copy-toast" class="fixed bottom-20 left-1/2 -translate-x-1/2 bg-stone-900/90 text-white text-xs px-4 py-2 rounded-full shadow-lg transition-opacity duration-300 opacity-0 pointer-events-none z-50">
    Berhasil disalin!
</div>

<script>
window.sendWhatsAppRSVPT3 = function() {
    const name = document.getElementById('rsvp_guest_name_t3')?.value || 'Tamu Undangan';
    const count = document.getElementById('rsvp_guest_count_t3')?.value || '1';
    const radios = document.getElementsByName('rsvp_status_t3');
    let status = 'Hadir';
    for (let r of radios) { if (r.checked) status = r.value; }
    const phone = '{{ preg_replace("/[^0-9]/", "", $invitation->gift_phone ?? "6281234567890") }}';
    const text = `Halo {{ $groomNickname }} & {{ $brideNickname }}, saya ${name} ingin mengonfirmasi kehadiran untuk acara pernikahan kalian. Status: ${status} (Jumlah: ${count} orang). Terima kasih!`;
    window.open(`https://wa.me/${phone}?text=${encodeURIComponent(text)}`, '_blank');
};

function copyToClipboard(text, label) {
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).then(() => showToast(label + ' berhasil disalin!'));
    } else {
        const input = document.createElement('input');
        input.value = text;
        document.body.appendChild(input);
        input.select();
        document.execCommand('copy');
        document.body.removeChild(input);
        showToast(label + ' berhasil disalin!');
    }
}

function showToast(msg) {
    const toast = document.getElementById('copy-toast');
    if (toast) {
        toast.innerText = msg;
        toast.classList.remove('opacity-0');
        setTimeout(() => toast.classList.add('opacity-0'), 2500);
    }
}
</script>
</div>
