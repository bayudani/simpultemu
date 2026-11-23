{{-- Premium Museum of Love (Classical Art Gallery & Antique European Museum Theme) --}}
@php
    $t16CoverPhoto = !empty($invitation->cover_photo)
        ? (Str::startsWith($invitation->cover_photo, ['http://', 'https://']) ? $invitation->cover_photo : asset('storage/' . $invitation->cover_photo))
        : 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80';

    $t16HeroPhoto = !empty($invitation->hero_photo)
        ? (Str::startsWith($invitation->hero_photo, ['http://', 'https://']) ? $invitation->hero_photo : asset('storage/' . $invitation->hero_photo))
        : 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1000&auto=format&fit=crop&q=80';

    $t16BridePhoto = !empty($invitation->bride_photo)
        ? (Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo))
        : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&auto=format&fit=crop&q=80';

    $t16GroomPhoto = !empty($invitation->groom_photo)
        ? (Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo))
        : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80';
@endphp

<div class="min-h-screen text-[#2A1F1D] theme-museum-canvas" style="background-color: #F7F2E8; background-image: radial-gradient(circle at 50% 0%, rgba(212,175,55,0.1) 0%, transparent 60%), radial-gradient(circle at 100% 100%, rgba(139,30,34,0.06) 0%, transparent 50%), radial-gradient(#d4af37 0.8px, transparent 0.8px), radial-gradient(#8b1e22 0.6px, #F7F2E8 0.6px); background-size: 100% 100%, 100% 100%, 28px 28px, 28px 28px; background-position: 0 0, 0 0, 0 0, 14px 14px; font-family: 'Cormorant Garamond', Georgia, serif;">
<style>
@import url('https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700;900&family=Cinzel:wght@500;600;700;800&family=Pinyon+Script&family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap');

.font-museum-title { font-family: 'Cinzel Decorative', 'Cinzel', serif; }
.font-museum-sub { font-family: 'Cinzel', serif; }
.font-museum-script { font-family: 'Pinyon Script', cursive; }
.font-museum-body { font-family: 'Cormorant Garamond', Georgia, serif; }

@keyframes lantern-sway-left {
    0%, 100% { transform: rotate(-3deg); }
    50% { transform: rotate(3deg); }
}
@keyframes lantern-sway-right {
    0%, 100% { transform: rotate(3deg); }
    50% { transform: rotate(-3deg); }
}
.anim-lantern-left {
    transform-origin: top center;
    animation: lantern-sway-left 4.5s ease-in-out infinite;
}
.anim-lantern-right {
    transform-origin: top center;
    animation: lantern-sway-right 4.5s ease-in-out infinite;
}
.museum-frame-container {
    position: relative;
    width: 100%;
    max-width: 280px;
    margin: 0 auto;
}
.museum-frame-photo {
    position: absolute;
    left: 21.5%;
    right: 21.5%;
    top: 14%;
    bottom: 13%;
    width: 57%;
    height: 73%;
    border-radius: 20px;
    object-fit: cover;
}
</style>

<!-- ================= 1. HERO SECTION ================= -->
<section id="section-cover" class="relative min-h-screen flex items-center justify-center text-center px-4 py-16 overflow-hidden select-none">
    <!-- Hanging Wall Sconce Lanterns (Hidden on smartphone, visible on desktop) -->
    <div class="hidden md:block absolute top-2 left-2 sm:left-6 w-20 sm:w-28 h-auto pointer-events-none z-20 anim-lantern-left">
        <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-xl">
    </div>
    <div class="hidden md:block absolute top-2 right-2 sm:right-6 w-20 sm:w-28 h-auto pointer-events-none z-20 anim-lantern-right">
        <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="" class="w-full h-auto object-contain -scale-x-100 drop-shadow-xl">
    </div>

    <div class="relative z-10 max-w-xl mx-auto space-y-6 pt-6">
        @if(isset($guest))
        <div class="space-y-1">
            <p class="text-[10px] sm:text-xs font-museum-sub uppercase tracking-[0.35em] text-[#8B1E22] font-bold">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
            <p class="text-xl sm:text-2xl font-museum-title font-bold text-[#382318]">{{ $guest->name }}</p>
        </div>
        @endif

        <div class="space-y-1">
            <span class="inline-block px-4 py-1 rounded-full text-[10px] sm:text-xs uppercase tracking-[0.35em] bg-[#8B1E22] text-[#FAF5EC] font-museum-sub font-bold shadow-md">
                THE WEDDING OF
            </span>
            <h1 class="text-5xl sm:text-7xl font-museum-script text-[#8B1E22] font-bold tracking-tight pt-2">
                {{ $invitation->groom_nickname }} &amp; {{ $invitation->bride_nickname }}
            </h1>
            <p class="text-xs sm:text-sm font-museum-title tracking-widest text-[#382318] uppercase font-bold pt-1">
                {{ $invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : 'Senin, 11 Januari 2027' }}
            </p>
        </div>

        <!-- Couple Photo inside Baroque Gold Frame -->
        <div class="museum-frame-container py-2">
            <div class="relative w-full aspect-[916/1024]">
                <img src="{{ $t16HeroPhoto }}" alt="Hero Couple" class="museum-frame-photo">
                <img src="{{ asset('images/themes/museum-love/photo-frame.png') }}" alt="Baroque Frame" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10 drop-shadow-2xl">
            </div>
        </div>

        <!-- 4 Crimson Velvet Countdown Medallions with Stanchion Rope -->
        <div class="space-y-3 pt-2">
            <div class="grid grid-cols-4 gap-2.5 sm:gap-3 max-w-xs sm:max-w-sm mx-auto">
                <div class="p-2 sm:p-2.5 rounded-full aspect-square bg-[#8B1E22] border-2 border-[#D4AF37] shadow-xl text-center flex flex-col items-center justify-center text-[#FAF5EC]">
                    <span id="cd-days" class="text-lg sm:text-2xl font-bold font-mono leading-none">{{ $invitation->days_remaining ?? '00' }}</span>
                    <span class="text-[8px] sm:text-[9px] uppercase font-museum-sub tracking-wider text-[#F2D59B] mt-0.5">Hari</span>
                </div>
                <div class="p-2 sm:p-2.5 rounded-full aspect-square bg-[#8B1E22] border-2 border-[#D4AF37] shadow-xl text-center flex flex-col items-center justify-center text-[#FAF5EC]">
                    <span id="cd-hours" class="text-lg sm:text-2xl font-bold font-mono leading-none">{{ $invitation->event_time ? $invitation->event_time->format('H') : '00' }}</span>
                    <span class="text-[8px] sm:text-[9px] uppercase font-museum-sub tracking-wider text-[#F2D59B] mt-0.5">Jam</span>
                </div>
                <div class="p-2 sm:p-2.5 rounded-full aspect-square bg-[#8B1E22] border-2 border-[#D4AF37] shadow-xl text-center flex flex-col items-center justify-center text-[#FAF5EC]">
                    <span id="cd-mins" class="text-lg sm:text-2xl font-bold font-mono leading-none">{{ $invitation->event_time ? $invitation->event_time->format('i') : '00' }}</span>
                    <span class="text-[8px] sm:text-[9px] uppercase font-museum-sub tracking-wider text-[#F2D59B] mt-0.5">Menit</span>
                </div>
                <div class="p-2 sm:p-2.5 rounded-full aspect-square bg-[#8B1E22] border-2 border-[#D4AF37] shadow-xl text-center flex flex-col items-center justify-center text-[#FAF5EC]">
                    <span id="cd-secs" class="text-lg sm:text-2xl font-bold font-mono leading-none">00</span>
                    <span class="text-[8px] sm:text-[9px] uppercase font-museum-sub tracking-wider text-[#F2D59B] mt-0.5">Detik</span>
                </div>
            </div>

            <!-- Red Velvet Museum Stanchion Rope SVG -->
            <div class="w-56 sm:w-72 mx-auto pt-1 pointer-events-none">
                <svg viewBox="0 0 300 40" fill="none" class="w-full h-auto drop-shadow-md">
                    <circle cx="20" cy="8" r="7" fill="#D4AF37" stroke="#8F6C25" stroke-width="1.5"/>
                    <rect x="18" y="15" width="4" height="25" fill="#D4AF37"/>
                    <circle cx="280" cy="8" r="7" fill="#D4AF37" stroke="#8F6C25" stroke-width="1.5"/>
                    <rect x="278" y="15" width="4" height="25" fill="#D4AF37"/>
                    <path d="M 22 10 Q 150 42 278 10" stroke="#8B1E22" stroke-width="6" stroke-linecap="round" fill="none"/>
                    <path d="M 22 10 Q 150 42 278 10" stroke="#F2D59B" stroke-width="1" stroke-dasharray="3 3" fill="none"/>
                </svg>
            </div>
        </div>

        <!-- Bookshelf Divider Below Hero -->
        <div class="w-full max-w-sm sm:max-w-md mx-auto pt-4 pointer-events-none">
            <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
        </div>
    </div>
</section>

<!-- ================= 2. KUTIPAN SUCI ================= -->
<section id="section-kutipan" class="py-16 px-4 text-center select-none">
    <div class="max-w-xl mx-auto rounded-2xl bg-[#382318] border-2 border-[#D4AF37]/60 p-6 sm:p-10 shadow-2xl text-center space-y-5 relative">
        <span class="text-[10px] sm:text-xs font-museum-sub uppercase tracking-[0.3em] text-[#D4AF37] font-bold block">
            KUTIPAN SUCI
        </span>

        <p class="text-2xl sm:text-3xl leading-relaxed font-serif text-[#F3E196]" dir="rtl">
            {{ $invitation->quran_text ?? 'وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا لِّتَسْكُنُوا إِلَيْهَا وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً' }}
        </p>

        <div class="w-16 h-0.5 bg-[#D4AF37]/50 mx-auto"></div>

        <p class="text-xs sm:text-sm font-museum-body italic text-[#FAF5EC]/90 leading-relaxed max-w-md mx-auto">
            "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}"
        </p>

        <p class="text-[10px] sm:text-xs font-museum-title font-bold uppercase tracking-wider text-[#D4AF37]">
            {{ $invitation->quote_source ?? 'QS. Ar-Rum: 21' }}
        </p>
    </div>

    <!-- Bookshelf Divider Below Kutipan -->
    <div class="w-full max-w-sm sm:max-w-md mx-auto pt-8 pointer-events-none">
        <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
    </div>
</section>

<!-- ================= 3. MEMPELAI ================= -->
<section id="section-mempelai" class="py-16 px-4 text-center select-none">
    <div class="max-w-xl mx-auto space-y-8">
        <div class="space-y-1">
            <span class="text-[10px] sm:text-xs font-museum-sub uppercase tracking-[0.35em] text-[#8B1E22] font-bold block">
                THE EXHIBIT OF COUPLE
            </span>
            <h2 class="text-3xl sm:text-4xl font-museum-title font-bold text-[#382318]">
                Kedua Mempelai
            </h2>
            <div class="w-16 h-0.5 bg-[#8B1E22] mx-auto my-2"></div>
        </div>

        <!-- Bride Portrait in Baroque Frame -->
        <div class="space-y-4">
            <div class="museum-frame-container">
                <div class="relative w-full aspect-[916/1024]">
                    <img src="{{ $t16BridePhoto }}" alt="{{ $invitation->bride_name }}" class="museum-frame-photo">
                    <img src="{{ asset('images/themes/museum-love/photo-frame.png') }}" alt="Baroque Frame" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10 drop-shadow-2xl">
                </div>
            </div>
            <div class="space-y-1">
                <h3 class="font-museum-script text-4xl sm:text-5xl text-[#8B1E22] font-bold">{{ $invitation->bride_name }}</h3>
                <p class="font-museum-body text-xs sm:text-sm text-[#5C4033]">{{ $invitation->bride_parents ?? 'Putri tercinta dari Bapak & Ibu' }}</p>
            </div>
        </div>

        <!-- Center Baroque Gold Ampersand Brooch Medallion -->
        <div class="py-2 flex items-center justify-center">
            <img src="{{ asset('images/themes/museum-love/gold-brooch.png') }}" alt="Gold Brooch" class="w-24 sm:w-28 h-auto object-contain drop-shadow-md hover:scale-105 transition-transform duration-300">
        </div>

        <!-- Groom Portrait in Baroque Frame -->
        <div class="space-y-4">
            <div class="museum-frame-container">
                <div class="relative w-full aspect-[916/1024]">
                    <img src="{{ $t16GroomPhoto }}" alt="{{ $invitation->groom_name }}" class="museum-frame-photo">
                    <img src="{{ asset('images/themes/museum-love/photo-frame.png') }}" alt="Baroque Frame" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10 drop-shadow-2xl">
                </div>
            </div>
            <div class="space-y-1">
                <h3 class="font-museum-script text-4xl sm:text-5xl text-[#8B1E22] font-bold">{{ $invitation->groom_name }}</h3>
                <p class="font-museum-body text-xs sm:text-sm text-[#5C4033]">{{ $invitation->groom_parents ?? 'Putra tercinta dari Bapak & Ibu' }}</p>
            </div>
        </div>

        <!-- Gifts Divider Below Mempelai -->
        <div class="w-full max-w-xs sm:max-w-sm mx-auto pt-6 pointer-events-none">
            <img src="{{ asset('images/themes/museum-love/gifts-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
        </div>
    </div>
</section>

<!-- ================= 4. ACARA ================= -->
<section id="section-acara" class="py-16 px-4 text-center select-none">
    <div class="max-w-2xl mx-auto space-y-8">
        <div class="space-y-2">
            <span class="text-[10px] sm:text-xs font-museum-sub uppercase tracking-[0.35em] text-[#8B1E22] font-bold block">
                WEDDING EXHIBITION &amp; EVENT
            </span>
            <h2 class="text-3xl sm:text-4xl font-museum-title font-bold text-[#382318]">
                Rangkaian Acara
            </h2>
            <div class="w-16 h-0.5 bg-[#8B1E22] mx-auto my-2"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-6 text-center">
            <!-- Akad Nikah Placard -->
            <div class="rounded-2xl border-2 border-[#D4AF37]/45 bg-[#FFFDF9] p-6 shadow-md space-y-4">
                <span class="inline-block px-4 py-1 rounded-full bg-[#8B1E22] text-[#FAF5EC] font-museum-sub text-[10px] tracking-widest uppercase font-bold">
                    AKAD NIKAH
                </span>
                <h3 class="font-museum-script text-3xl text-[#8B1E22]">Akad Nikah</h3>
                <div class="border-y border-[#D4AF37]/30 py-3 bg-[#FAF6EE] rounded-lg">
                    <p class="font-museum-title text-sm font-bold text-[#382318]">{{ $invitation->akad_date ? $invitation->akad_date->translatedFormat('l, d F Y') : '-' }}</p>
                    <p class="font-museum-sub text-xs text-[#8B1E22] font-semibold">{{ $invitation->akad_time ? $invitation->akad_time->format('H:i') : '08:00' }} - {{ $invitation->akad_end_time ?? '10:00' }} WIB</p>
                </div>
                <div class="space-y-1 text-xs">
                    <p class="font-museum-title font-bold text-[#382318]">{{ $invitation->akad_venue ?? 'Gedung Akad' }}</p>
                    <p class="font-museum-body text-[#5C4033]">{{ $invitation->akad_address }}</p>
                </div>
                @if($invitation->akad_maps_url)
                <a href="{{ $invitation->akad_maps_url }}" target="_blank" class="inline-block px-5 py-2 rounded-full bg-[#8B1E22] hover:bg-[#6D1619] border border-[#D4AF37]/80 text-[#FAF5EC] text-xs font-museum-sub font-bold tracking-wider uppercase shadow-md transition">
                    Buka Google Maps
                </a>
                @endif
            </div>

            <!-- Resepsi Placard -->
            <div class="rounded-2xl border-2 border-[#D4AF37]/45 bg-[#FFFDF9] p-6 shadow-md space-y-4">
                <span class="inline-block px-4 py-1 rounded-full bg-[#8B1E22] text-[#FAF5EC] font-museum-sub text-[10px] tracking-widest uppercase font-bold">
                    RESEPSI PERNIKAHAN
                </span>
                <h3 class="font-museum-script text-3xl text-[#8B1E22]">Resepsi Pernikahan</h3>
                <div class="border-y border-[#D4AF37]/30 py-3 bg-[#FAF6EE] rounded-lg">
                    <p class="font-museum-title text-sm font-bold text-[#382318]">{{ $invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : '-' }}</p>
                    <p class="font-museum-sub text-xs text-[#8B1E22] font-semibold">{{ $invitation->event_time ? $invitation->event_time->format('H:i') : '11:00' }} - {{ $invitation->event_end_time ?? '13:00' }} WIB</p>
                </div>
                <div class="space-y-1 text-xs">
                    <p class="font-museum-title font-bold text-[#382318]">{{ $invitation->venue }}</p>
                    <p class="font-museum-body text-[#5C4033]">{{ $invitation->address }}</p>
                </div>
                @if($invitation->maps_url)
                <a href="{{ $invitation->maps_url }}" target="_blank" class="inline-block px-5 py-2 rounded-full bg-[#8B1E22] hover:bg-[#6D1619] border border-[#D4AF37]/80 text-[#FAF5EC] text-xs font-museum-sub font-bold tracking-wider uppercase shadow-md transition">
                    Buka Google Maps
                </a>
                @endif
            </div>
        </div>

        <!-- Bookshelf Divider Below Acara -->
        <div class="w-full max-w-sm sm:max-w-md mx-auto pt-6 pointer-events-none">
            <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
        </div>
    </div>
</section>

<!-- ================= 5. RSVP & BUKU TAMU ================= -->
<section id="section-rsvp" class="py-16 px-4 text-center select-none">
    <div class="max-w-xl mx-auto rounded-2xl bg-[#FFFDF9] border-2 border-[#D4AF37]/50 shadow-xl p-6 sm:p-10 space-y-6 text-left">
        <div class="text-center space-y-1">
            <span class="text-[10px] sm:text-xs font-museum-sub uppercase tracking-[0.35em] text-[#8B1E22] font-bold block">
                GUESTBOOK REGISTRY
            </span>
            <h2 class="text-3xl font-museum-title font-bold text-[#382318]">
                Buku Tamu &amp; Doa
            </h2>
            <div class="w-16 h-0.5 bg-[#8B1E22] mx-auto my-2"></div>
        </div>

        <form action="{{ route('rsvp.store', $invitation) }}" method="POST" class="space-y-4">
            @csrf
            @if(isset($guest))
            <input type="hidden" name="guest_token" value="{{ $guest->unique_token }}">
            <input type="hidden" name="name" value="{{ $guest->name }}">
            @else
            <div>
                <label class="block text-xs font-museum-title uppercase text-[#8B1E22] mb-1 font-bold">Nama Lengkap</label>
                <input type="text" name="name" placeholder="Nama Lengkap Anda" required class="w-full px-4 py-2.5 rounded-xl border border-[#D4AF37]/50 bg-[#FAF6EE] text-[#382318] text-xs sm:text-sm focus:outline-none focus:border-[#8B1E22]">
            </div>
            @endif

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-museum-title uppercase text-[#8B1E22] mb-1 font-bold">Kehadiran</label>
                    <select name="attendance" required class="w-full px-4 py-2.5 rounded-xl border border-[#D4AF37]/50 bg-[#FAF6EE] text-[#382318] text-xs sm:text-sm focus:outline-none focus:border-[#8B1E22]">
                        <option value="hadir">Pasti Hadir</option>
                        <option value="tidak_hadir">Berhalangan</option>
                        <option value="masih_ragu">Ragu-ragu</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-museum-title uppercase text-[#8B1E22] mb-1 font-bold">Jumlah Tamu</label>
                    <select name="guest_count" class="w-full px-4 py-2.5 rounded-xl border border-[#D4AF37]/50 bg-[#FAF6EE] text-[#382318] text-xs sm:text-sm focus:outline-none focus:border-[#8B1E22]">
                        <option value="1">1 Orang</option>
                        <option value="2">2 Orang</option>
                        <option value="3">3 Orang</option>
                        <option value="4">4 Orang</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-museum-title uppercase text-[#8B1E22] mb-1 font-bold">Pesan &amp; Doa</label>
                <textarea name="message" rows="3" placeholder="Tuliskan ucapan dan doa restu Anda..." class="w-full px-4 py-2.5 rounded-xl border border-[#D4AF37]/50 bg-[#FAF6EE] text-[#382318] text-xs sm:text-sm focus:outline-none focus:border-[#8B1E22]"></textarea>
            </div>

            <button type="submit" class="w-full py-3 rounded-full bg-[#8B1E22] hover:bg-[#6D1619] border border-[#D4AF37]/80 text-[#FAF5EC] text-xs font-bold uppercase tracking-wider shadow-lg transition font-museum-sub">
                Kirim Konfirmasi Kehadiran
            </button>
        </form>
    </div>
</section>

<!-- ================= 6. HADIAH & CLOSING ================= -->
@include('partials.invitation-gift-section', ['primaryColor' => '#8B1E22', 'isDark' => false])
@include('partials.invitation-closing-section', ['primaryColor' => '#8B1E22', 'isDark' => false])

<!-- Bookshelf Divider at Bottom of Page -->
<div class="w-full max-w-sm sm:max-w-md mx-auto py-8 text-center pointer-events-none">
    <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md mx-auto">
</div>

</div>

@push('scripts')
<script>
(function() {
    const eventDateStr = "{{ $invitation->event_date ? $invitation->event_date->format('Y-m-d') : '' }}";
    const eventTimeStr = "{{ $invitation->event_time ? $invitation->event_time->format('H:i:s') : '00:00:00' }}";
    if (!eventDateStr) return;

    const target = new Date(`${eventDateStr}T${eventTimeStr}`).getTime();
    if (isNaN(target)) return;

    function updateTimer() {
        const now = new Date().getTime();
        const difference = target - now;

        if (difference > 0) {
            const days = Math.floor(difference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((difference % (1000 * 60)) / (1000 * 60));
            const seconds = Math.floor((difference % (1000 * 60)) / 1000);

            const cdDays = document.getElementById('cd-days');
            const cdHours = document.getElementById('cd-hours');
            const cdMins = document.getElementById('cd-mins');
            const cdSecs = document.getElementById('cd-secs');

            if (cdDays) cdDays.innerText = days;
            if (cdHours) cdHours.innerText = String(hours).padStart(2, '0');
            if (cdMins) cdMins.innerText = String(minutes).padStart(2, '0');
            if (cdSecs) cdSecs.innerText = String(seconds).padStart(2, '0');
        } else {
            const cdDays = document.getElementById('cd-days');
            if (cdDays) cdDays.innerText = '0';
        }
    }
    updateTimer();
    setInterval(updateTimer, 1000);
})();
</script>
@endpush
