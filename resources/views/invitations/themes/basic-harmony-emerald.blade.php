{{-- Basic Harmony Emerald - Asymmetric Emerald & Royal Gold --}}
<div class="min-h-screen relative selection:bg-amber-100 selection:text-amber-900 scrollbar-none pb-28" style="background-color: #FAFCFA; font-family: 'Montserrat', sans-serif; color: #1A382B;">
<style>
@import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap');
.font-heading { font-family: 'Cinzel', serif; }
.theme2-card {
    background: linear-gradient(145deg, #247E64 0%, #1E6B52 50%, #165640 100%);
    border: 1px solid rgba(212, 175, 55, 0.45);
    border-radius: 1rem 2.75rem 1rem 1rem;
    box-shadow: 0 16px 36px -6px rgba(22, 86, 64, 0.28);
}
.theme2-inset {
    border: 1px solid rgba(212, 175, 55, 0.5);
    border-radius: 0.75rem 2.25rem 0.75rem 0.75rem;
}
.theme2-btn-gold {
    background: linear-gradient(135deg, #9C782F 0%, #C59B3F 50%, #8F6C25 100%);
    border: 1px solid rgba(243, 225, 150, 0.8);
    color: #FFFFFF;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0 8px 20px -3px rgba(156, 120, 47, 0.45);
}
.theme2-btn-gold:hover {
    background: linear-gradient(135deg, #AD8737 0%, #D4AF37 50%, #9C782F 100%);
    box-shadow: 0 12px 24px -3px rgba(156, 120, 47, 0.6);
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
@endphp

<!-- ================= 1. COVER SECTION (MATCHING IMAGE 1) ================= -->
<section id="section-cover" class="min-h-screen flex items-center justify-center p-4 text-center">
    <div class="w-full max-w-sm sm:max-w-md mx-auto py-6 sm:py-8 flex flex-col items-center justify-between min-h-[85vh]">
        <div class="text-center pt-2 pb-4">
            <p class="font-heading text-xs sm:text-sm tracking-[0.3em] uppercase text-stone-700 font-semibold">
                {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
            </p>
        </div>

        <div class="w-full theme2-card text-white p-3 sm:p-4 relative">
            <div class="theme2-inset py-8 sm:py-10 px-5 sm:px-8 text-center flex flex-col items-center justify-center space-y-5">
                <div class="w-48 sm:w-56 h-6 mx-auto">
                    <img src="/images/themes/bg/emerald-interlocking-rings.svg" alt="Rings" class="w-full h-full object-contain">
                </div>

                <div class="space-y-1.5">
                    <p class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-[#E5C158]">
                        KEPADA YTH
                    </p>
                    <h3 class="font-heading text-xl sm:text-2xl font-bold text-white tracking-wide truncate max-w-xs px-2">
                        {{ $guestName }}
                    </h3>
                </div>

                <div class="pt-2">
                    <a href="#section-hero" class="theme2-btn-gold px-8 sm:px-10 py-3 rounded-full font-bold text-xs sm:text-sm tracking-wider uppercase inline-flex items-center justify-center gap-2 transition active:scale-95">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>BUKA UNDANGAN</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-4 text-[#1E6B52] animate-bounce pointer-events-none">
            <svg class="w-6 h-6 mx-auto stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
        </div>
    </div>
</section>

<!-- ================= 2. HERO SECTION (MATCHING IMAGE 2) ================= -->
<section id="section-hero" class="py-8 sm:py-12 px-4 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto space-y-4">
        <div class="text-center space-y-1 py-2">
            <div class="w-24 sm:w-28 h-8 mx-auto">
                <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
            </div>
            <p class="font-heading text-xs sm:text-sm tracking-[0.3em] uppercase text-stone-700 font-semibold">
                {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
            </p>
        </div>

        <div class="w-full theme2-card text-white p-2.5 sm:p-3 relative">
            <div class="theme2-inset overflow-hidden flex flex-col justify-between">
                <div class="pt-5 pb-3 text-center">
                    <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-white/90 font-heading">
                        THE WEDDING OF
                    </span>
                </div>

                <div class="px-4 sm:px-6">
                    <div class="w-full aspect-[4/3] sm:aspect-[16/11] rounded-lg overflow-hidden border-2 border-[#D4AF37]/70 shadow-lg relative group">
                        <img src="{{ $bgPhoto }}" alt="Foto Mempelai" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="px-5 sm:px-8 py-4 text-center">
                    <p class="text-xs sm:text-sm font-light italic text-white/95 leading-relaxed">
                        "Thinking of you keeps me awake. Dreaming of you keeps me asleep. Being with you keeps me alive."
                    </p>
                </div>

                <div class="bg-[#134A37] border-t border-[#D4AF37]/35 py-3 px-4 text-center">
                    <p class="text-xs sm:text-sm font-bold tracking-[0.25em] uppercase text-white/95 font-heading">
                        {{ strtoupper($eventDate->translatedFormat('F . d . Y')) }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 3. QURAN VERSE SECTION (MATCHING IMAGE 3 TOP) ================= -->
@if(($invitation->show_quote ?? true) && !empty($invitation->quran_text))
<section id="section-kutipan" class="py-6 sm:py-10 px-4 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto theme2-card text-white p-2.5 sm:p-3 relative">
        <div class="theme2-inset p-6 sm:p-8 text-center space-y-4">
            <div class="w-44 sm:w-52 h-6 mx-auto">
                <img src="/images/themes/bg/emerald-interlocking-rings.svg" alt="Rings" class="w-full h-full object-contain">
            </div>

            <p class="text-xl sm:text-2xl leading-relaxed font-serif text-white/95" dir="rtl">
                {{ $invitation->quran_text }}
            </p>

            <p class="text-xs sm:text-sm text-white/90 leading-relaxed italic font-light max-w-lg mx-auto">
                "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri...' }}"
            </p>

            <p class="text-[11px] sm:text-xs font-semibold text-[#E5C158] tracking-widest uppercase font-heading">
                ( {{ $invitation->quote_source ?? 'QS. Ar-Rum 21' }} )
            </p>
        </div>
    </div>
</section>
@endif

<!-- ================= 4. SALAM PEMBUKA & PASANGAN MEMPELAI (MATCHING IMAGES 3, 4, 5) ================= -->
<section id="section-mempelai" class="py-10 sm:py-16 px-4 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-8 sm:space-y-12">
        <!-- Salam Card -->
        <div class="space-y-3.5">
            <div class="text-center space-y-1 py-1">
                <div class="w-24 sm:w-28 h-8 mx-auto">
                    <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
                </div>
                <p class="font-heading text-xs sm:text-sm tracking-[0.3em] uppercase text-stone-700 font-semibold">
                    {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                </p>
            </div>

            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto theme2-card text-white p-2.5 sm:p-3 relative">
                <div class="theme2-inset p-6 sm:p-8 text-center space-y-4">
                    <h3 class="font-heading text-xs sm:text-sm font-bold tracking-[0.2em] uppercase text-[#E5C158]">
                        ASSALAMUALAIKUM WR. WB.
                    </h3>
                    <p class="text-xs sm:text-sm text-white/95 leading-relaxed italic font-light max-w-md mx-auto">
                        "Tanpa mengurangi rasa hormat, kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami"
                    </p>

                    <div class="grid grid-cols-3 gap-2 pt-2">
                        <div class="aspect-square rounded-lg overflow-hidden border border-[#D4AF37]/60 shadow-sm">
                            <img src="{{ $galleryPhotos[0] }}" alt="Foto 1" class="w-full h-full object-cover">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden border border-[#D4AF37]/60 shadow-sm">
                            <img src="{{ $galleryPhotos[1] ?? $galleryPhotos[0] }}" alt="Foto 2" class="w-full h-full object-cover">
                        </div>
                        <div class="aspect-square rounded-lg overflow-hidden border border-[#D4AF37]/60 shadow-sm">
                            <img src="{{ $galleryPhotos[2] ?? $galleryPhotos[0] }}" alt="Foto 3" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Bride & The Groom (Side by Side on PC) -->
        <div class="space-y-4">
            <div class="text-center space-y-1 py-1">
                <div class="w-24 sm:w-28 h-8 mx-auto">
                    <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
                </div>
                <p class="font-heading text-xs sm:text-sm tracking-[0.3em] uppercase text-stone-700 font-semibold">
                    {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 items-stretch">
                <!-- THE BRIDE -->
                <div class="theme2-card text-white p-2.5 sm:p-3 relative flex flex-col justify-between">
                    <div class="theme2-inset p-5 sm:p-7 text-center space-y-4 flex flex-col justify-between h-full">
                        <div class="space-y-3.5">
                            <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-white/90 font-heading block">
                                THE BRIDE
                            </span>
                            <div class="w-44 sm:w-52 aspect-[3/4] mx-auto rounded-lg overflow-hidden border-2 border-[#D4AF37]/70 shadow-lg">
                                <img src="{{ $invitation->bride_photo ? (Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo)) : ($galleryPhotos[1] ?? $galleryPhotos[0]) }}" alt="The Bride" class="w-full h-full object-cover">
                            </div>
                            <h4 class="font-heading text-lg sm:text-xl font-bold tracking-wider text-[#E5C158] pt-1">
                                {{ strtoupper($brideName) }}
                            </h4>
                            <p class="text-xs sm:text-sm text-white/90 font-light leading-relaxed max-w-xs mx-auto">
                                {{ $brideParents }}
                            </p>
                        </div>
                        @if($brideInstagram)
                        <div class="pt-2">
                            <a href="https://instagram.com/{{ ltrim($brideInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-[#D4AF37]/50 text-white text-xs font-medium transition">
                                <span>&#64;{{ ltrim($brideInstagram, '@') }}</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- THE GROOM -->
                <div class="theme2-card text-white p-2.5 sm:p-3 relative flex flex-col justify-between">
                    <div class="theme2-inset p-5 sm:p-7 text-center space-y-4 flex flex-col justify-between h-full">
                        <div class="space-y-3.5">
                            <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-white/90 font-heading block">
                                THE GROOM
                            </span>
                            <div class="w-44 sm:w-52 aspect-[3/4] mx-auto rounded-lg overflow-hidden border-2 border-[#D4AF37]/70 shadow-lg">
                                <img src="{{ $invitation->groom_photo ? (Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo)) : ($galleryPhotos[0] ?? '') }}" alt="The Groom" class="w-full h-full object-cover">
                            </div>
                            <h4 class="font-heading text-lg sm:text-xl font-bold tracking-wider text-[#E5C158] pt-1">
                                {{ strtoupper($groomName) }}
                            </h4>
                            <p class="text-xs sm:text-sm text-white/90 font-light leading-relaxed max-w-xs mx-auto">
                                {{ $groomParents }}
                            </p>
                        </div>
                        @if($groomInstagram)
                        <div class="pt-2">
                            <a href="https://instagram.com/{{ ltrim($groomInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-[#D4AF37]/50 text-white text-xs font-medium transition">
                                <span>&#64;{{ ltrim($groomInstagram, '@') }}</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 5. RANGKAIAN ACARA (AKAD & RESEPSI) ================= -->
<section id="section-acara" class="py-10 sm:py-16 px-4 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-6 sm:space-y-8">
        <div class="text-center space-y-1 py-1">
            <div class="w-24 sm:w-28 h-8 mx-auto">
                <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
            </div>
            <p class="font-heading text-xs sm:text-sm tracking-[0.3em] uppercase text-stone-700 font-semibold">
                {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
            </p>
            <h3 class="font-heading text-lg sm:text-2xl font-bold text-stone-800 tracking-wider">
                RANGKAIAN ACARA
            </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 items-stretch">
            <!-- AKAD -->
            <div class="theme2-card text-white p-2.5 sm:p-3 relative flex flex-col justify-between">
                <div class="theme2-inset p-5 sm:p-7 text-center space-y-5 flex flex-col justify-between h-full">
                    <div class="space-y-4">
                        <div class="w-10 h-10 mx-auto rounded-full bg-white/10 border border-[#D4AF37]/60 flex items-center justify-center text-[#E5C158]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h4 class="font-heading text-sm sm:text-base font-bold tracking-[0.25em] uppercase text-[#E5C158]">AKAD NIKAH</h4>
                        <div class="bg-[#134A37] border border-[#D4AF37]/35 rounded-xl py-3 px-4 space-y-1">
                            <p class="font-heading text-xs sm:text-sm font-bold text-white">{{ $eventDayName }}, {{ $eventDate->translatedFormat('d F Y') }}</p>
                            <p class="text-xs text-emerald-200">Pukul 08:00 - 10:00 WIB</p>
                        </div>
                        <div class="space-y-1">
                            <p class="font-bold text-sm sm:text-base text-white">{{ $invitation->akad_venue ?? 'Masjid Agung Al-Azhar' }}</p>
                            <p class="text-xs text-white/80 font-light">{{ $invitation->akad_address ?? 'Jakarta Selatan' }}</p>
                        </div>
                    </div>
                    <div class="pt-3">
                        <a href="{{ $invitation->akad_maps_url ?? 'https://maps.google.com' }}" target="_blank" rel="noopener noreferrer" class="theme2-btn-gold px-6 py-2.5 rounded-full font-bold text-xs tracking-wider uppercase inline-flex items-center justify-center gap-2">
                            <span>Buka Google Maps</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- RESEPSI -->
            <div class="theme2-card text-white p-2.5 sm:p-3 relative flex flex-col justify-between">
                <div class="theme2-inset p-5 sm:p-7 text-center space-y-5 flex flex-col justify-between h-full">
                    <div class="space-y-4">
                        <div class="w-10 h-10 mx-auto rounded-full bg-white/10 border border-[#D4AF37]/60 flex items-center justify-center text-[#E5C158]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18z"/></svg>
                        </div>
                        <h4 class="font-heading text-sm sm:text-base font-bold tracking-[0.25em] uppercase text-[#E5C158]">RESEPSI PERNIKAHAN</h4>
                        <div class="bg-[#134A37] border border-[#D4AF37]/35 rounded-xl py-3 px-4 space-y-1">
                            <p class="font-heading text-xs sm:text-sm font-bold text-white">{{ $eventDayName }}, {{ $eventDate->translatedFormat('d F Y') }}</p>
                            <p class="text-xs text-emerald-200">Pukul 11:00 - 13:00 WIB</p>
                        </div>
                        <div class="space-y-1">
                            <p class="font-bold text-sm sm:text-base text-white">{{ $invitation->venue ?? 'Grand Ballroom Hotel Mulia' }}</p>
                            <p class="text-xs text-white/80 font-light">{{ $invitation->address ?? 'Jakarta Pusat' }}</p>
                        </div>
                    </div>
                    <div class="pt-3">
                        <a href="{{ $invitation->maps_url ?? 'https://maps.google.com' }}" target="_blank" rel="noopener noreferrer" class="theme2-btn-gold px-6 py-2.5 rounded-full font-bold text-xs tracking-wider uppercase inline-flex items-center justify-center gap-2">
                            <span>Buka Google Maps</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 6. COUNTDOWN TIMER ================= -->
<section id="section-countdown" class="py-10 sm:py-16 px-4 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto theme2-card text-white p-2.5 sm:p-3 relative">
        <div class="theme2-inset p-6 sm:p-8 text-center space-y-5">
            <div class="w-44 sm:w-52 h-6 mx-auto">
                <img src="/images/themes/bg/emerald-interlocking-rings.svg" alt="Rings" class="w-full h-full object-contain">
            </div>
            <div class="space-y-1">
                <p class="text-[10px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-emerald-200">SAVE THE DATE</p>
                <h3 class="font-heading text-lg sm:text-2xl font-bold text-white tracking-wider">Menuju Hari Bahagia</h3>
            </div>
            <div class="grid grid-cols-4 gap-2 sm:gap-3 max-w-xs sm:max-w-sm mx-auto pt-2">
                <div class="p-2 sm:p-3 rounded-xl bg-[#134A37] border border-[#D4AF37]/50 text-center">
                    <span class="block text-xl sm:text-2xl font-black font-mono text-[#E5C158]">{{ $invitation->days_remaining ?? '00' }}</span>
                    <span class="text-[9px] uppercase tracking-wider text-emerald-200 mt-1 block">Hari</span>
                </div>
                <div class="p-2 sm:p-3 rounded-xl bg-[#134A37] border border-[#D4AF37]/50 text-center">
                    <span class="block text-xl sm:text-2xl font-black font-mono text-[#E5C158]">{{ now()->format('H') }}</span>
                    <span class="text-[9px] uppercase tracking-wider text-emerald-200 mt-1 block">Jam</span>
                </div>
                <div class="p-2 sm:p-3 rounded-xl bg-[#134A37] border border-[#D4AF37]/50 text-center">
                    <span class="block text-xl sm:text-2xl font-black font-mono text-[#E5C158]">{{ now()->format('i') }}</span>
                    <span class="text-[9px] uppercase tracking-wider text-emerald-200 mt-1 block">Menit</span>
                </div>
                <div class="p-2 sm:p-3 rounded-xl bg-[#134A37] border border-[#D4AF37]/50 text-center">
                    <span class="block text-xl sm:text-2xl font-black font-mono text-[#E5C158]">{{ now()->format('s') }}</span>
                    <span class="text-[9px] uppercase tracking-wider text-emerald-200 mt-1 block">Detik</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 7. GALERI FOTO ================= -->
<section id="section-galeri" class="py-10 sm:py-16 px-4 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-6 sm:space-y-8">
        <div class="text-center space-y-1 py-1">
            <div class="w-24 sm:w-28 h-8 mx-auto">
                <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
            </div>
            <p class="font-heading text-xs sm:text-sm tracking-[0.3em] uppercase text-stone-700 font-semibold">
                {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
            </p>
            <h3 class="font-heading text-lg sm:text-2xl font-bold text-stone-800 tracking-wider">GALERI BAHAGIA</h3>
        </div>

        <div class="theme2-card text-white p-3 sm:p-4 relative">
            <div class="theme2-inset p-5 sm:p-8 space-y-4">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                    @foreach($galleryPhotos as $idx => $photo)
                    <div class="aspect-square rounded-lg overflow-hidden border-2 border-[#D4AF37]/70 shadow-md">
                        <img src="{{ $photo }}" alt="Galeri Foto {{ $idx+1 }}" class="w-full h-full object-cover">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 8. KIRIM HADIAH ================= -->
<section id="section-hadiah" class="py-10 sm:py-16 px-4 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-6 sm:space-y-8">
        <div class="text-center space-y-1 py-1">
            <div class="w-24 sm:w-28 h-8 mx-auto">
                <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
            </div>
            <h3 class="font-heading text-lg sm:text-2xl font-bold text-stone-800 tracking-wider">TANDA KASIH</h3>
        </div>

        <div class="theme2-card text-white p-3 sm:p-4 relative">
            <div class="theme2-inset p-5 sm:p-8 space-y-6">
                <div class="w-44 sm:w-52 h-6 mx-auto">
                    <img src="/images/themes/bg/emerald-interlocking-rings.svg" alt="Rings" class="w-full h-full object-contain">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                    <div class="p-4 rounded-xl bg-[#134A37] border border-[#D4AF37]/45 space-y-2">
                        <span class="font-black text-sm text-white">BANK BCA</span>
                        <p class="font-mono font-bold text-base text-[#E5C158]">{{ $invitation->gift_account_number ?? '8801234567' }}</p>
                        <p class="text-xs text-white/85">a.n. {{ $invitation->gift_account_holder ?? $groomName }}</p>
                    </div>
                    <div class="p-4 rounded-xl bg-[#134A37] border border-[#D4AF37]/45 space-y-2">
                        <span class="font-black text-sm text-white">BANK MANDIRI</span>
                        <p class="font-mono font-bold text-base text-[#E5C158]">1230009876543</p>
                        <p class="text-xs text-white/85">a.n. {{ $brideName }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 9. TERIMA KASIH (CLOSING) ================= -->
<section class="py-10 sm:py-16 px-4 text-center">
    <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto theme2-card text-white p-2.5 sm:p-3 relative">
        <div class="theme2-inset p-6 sm:p-8 text-center space-y-5">
            <div class="w-44 sm:w-52 h-6 mx-auto">
                <img src="/images/themes/bg/emerald-interlocking-rings.svg" alt="Rings" class="w-full h-full object-contain">
            </div>
            <h3 class="font-heading text-xl sm:text-3xl text-white font-bold">Terima Kasih</h3>
            <p class="text-xs sm:text-sm text-white/90 font-light leading-relaxed max-w-md mx-auto">
                {{ $invitation->closing_message ?? 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.' }}
            </p>
            <div class="pt-2 space-y-1">
                <p class="font-heading text-lg sm:text-xl font-bold tracking-wider text-[#E5C158]">
                    {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                </p>
                <p class="text-[10px] sm:text-xs uppercase tracking-widest text-emerald-200">
                    {{ $invitation->closing_signature ?? 'Beserta Keluarga Besar' }}
                </p>
            </div>
        </div>
    </div>
</section>

</div>
