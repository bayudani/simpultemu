{{-- Basic Harmony Charcoal - Split Offset Card (Dark Theme) --}}
<div class="min-h-screen text-[#FAF5EE]" style="background: radial-gradient(circle at 50% 0%, #333333 0%, #1e1e1e 100%); font-family: 'Urbanist', sans-serif;">
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Urbanist:wght@300;400;600&display=swap');
@keyframes pulse-soft {0%, 100% {opacity: 1;} 50% {opacity: 0.6;}}
.animate-pulse-soft {animation: pulse-soft 3s ease-in-out infinite;}
.font-heading {font-family: 'DM Serif Display', serif;}
</style>

<!-- HERO SECTION -->
<section id="section-cover" class="relative min-h-screen flex items-center justify-center text-white overflow-hidden" style="background: linear-gradient(135deg, #262626 0%, #171717 100%);">
    @if($invitation->cover_photo || $invitation->photos->first())
    @php $coverSrc = $invitation->cover_photo ?? $invitation->photos->first()->path; @endphp
    <div class="absolute inset-0 opacity-20">
        <img src="{{ Str::startsWith($coverSrc, ['http://', 'https://']) ? $coverSrc : asset('storage/'.ltrim($coverSrc, '/')) }}" class="w-full h-full object-cover" alt="Cover">
    </div>
    @endif
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Geometric Monogram Ornaments (NO EMOJI) -->
    <div class="absolute top-6 left-6 w-12 h-12 text-amber-400/40 animate-pulse-soft">
        <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5">
            <polygon points="24,4 44,24 24,44 4,24"/>
            <polygon points="24,10 38,24 24,38 10,24"/>
            <line x1="24" y1="14" x2="24" y2="34"/>
            <line x1="14" y1="24" x2="34" y2="24"/>
            <circle cx="24" cy="24" r="3" fill="currentColor"/>
        </svg>
    </div>
    <div class="absolute bottom-6 right-6 w-12 h-12 text-amber-400/40 animate-pulse-soft">
        <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5">
            <polygon points="24,4 44,24 24,44 4,24"/>
            <polygon points="24,10 38,24 24,38 10,24"/>
            <line x1="24" y1="14" x2="24" y2="34"/>
            <line x1="14" y1="24" x2="34" y2="24"/>
            <circle cx="24" cy="24" r="3" fill="currentColor"/>
        </svg>
    </div>

    <div class="relative z-10 text-center px-4 max-w-4xl py-16">
        @if(isset($guest))
        <p class="text-xs uppercase tracking-[0.3em] mb-2 text-amber-300">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
        <p class="text-2xl font-heading mb-8 text-white">{{ $guest->name }}</p>
        @endif

        <span class="inline-block px-4 py-1 rounded-full text-xs uppercase tracking-widest bg-amber-400/10 border border-amber-400/40 text-amber-300 font-semibold mb-6">
            {{ $invitation->title ?? 'Pernikahan' }}
        </span>

        <h1 class="text-5xl sm:text-7xl font-heading mb-4 text-amber-200 font-normal tracking-wide">
            {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}
        </h1>
        <p class="text-lg tracking-wider text-stone-300 mt-2 font-light">
            {{ $invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : '' }}
        </p>

        <!-- Countdown Box (Integer Clean Format) -->
        <div class="mt-8 inline-grid grid-cols-4 gap-2 text-center bg-black/60 backdrop-blur-md p-4 rounded-2xl border border-amber-400/30 font-mono text-xs shadow-xl">
            <div class="px-3 py-1"><span id="cd-days" class="block text-xl font-bold text-amber-400">{{ $invitation->days_remaining }}</span> Hari</div>
            <div class="px-3 py-1"><span id="cd-hours" class="block text-xl font-bold text-amber-400">{{ $invitation->event_time ? $invitation->event_time->format('H') : '00' }}</span> Jam</div>
            <div class="px-3 py-1"><span id="cd-mins" class="block text-xl font-bold text-amber-400">{{ $invitation->event_time ? $invitation->event_time->format('i') : '00' }}</span> Menit</div>
            <div class="px-3 py-1"><span id="cd-secs" class="block text-xl font-bold text-amber-400">00</span> Detik</div>
        </div>
    </div>
</section>

<!-- KUTIPAN SUCI (CONDITIONAL RENDERING) -->
@if($invitation->show_quote && $invitation->quran_text)
<section class="py-20 px-4 bg-stone-900 border-y border-stone-800">
    <div class="max-w-3xl mx-auto text-center">
        <div class="w-10 h-10 mx-auto mb-4 text-amber-400">
            <svg class="w-full h-full" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
        </div>
        <p class="text-2xl sm:text-3xl mb-6 leading-relaxed font-heading text-amber-200" dir="rtl">
            {{ $invitation->quran_text }}
        </p>
        <p class="text-base sm:text-lg italic text-stone-300 mb-3 max-w-2xl mx-auto leading-relaxed">
            "{{ $invitation->quran_translation }}"
        </p>
        @if($invitation->quote_source)
        <p class="text-xs font-semibold uppercase tracking-wider text-amber-400">{{ $invitation->quote_source }}</p>
        @endif
    </div>
</section>
@endif

<!-- MEMPELAI (BINGKAI MODERN MINIMALIS ELEGAN - ASPECT 3/4) -->
<section id="section-mempelai" class="py-24 px-4 bg-[#1f1f1f]">
    <div class="max-w-4xl mx-auto text-center">
        <span class="text-xs uppercase tracking-[0.3em] font-semibold block mb-2 text-amber-400">THE COUPLE</span>
        <h2 class="text-4xl font-heading text-white mb-16">Kedua Mempelai</h2>

        <div class="grid md:grid-cols-2 gap-12 items-start max-w-2xl mx-auto">
            <!-- Pria -->
            <div class="flex flex-col items-center">
                <div class="w-36 h-48 mx-auto rounded-t-full overflow-hidden border-2 border-[#D4AF37] relative flex items-center justify-center ring-4 ring-[#D4AF37]/25 shadow-xl transition-all duration-500">
                    @if(!empty($invitation->groom_photo))
                        <img src="{{ Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo) }}?v={{ time() }}" alt="Mempelai Pria" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700">
                    @else
                        <!-- Placeholder hanya muncul jika foto belum diunggah -->
                        <div class="placeholder-avatar w-full h-full bg-[#8B3A1C] flex items-center justify-center">
                            <svg class="w-12 h-12 text-cream opacity-50" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                    @endif
                </div>
               <h3 class="mt-4 text-2xl md:text-3xl font-heading font-bold tracking-wide text-amber-200">{{ $invitation->groom_name }}</h3>
                <p class="text-xs font-sans tracking-widest uppercase opacity-75 mt-1.5 max-w-md text-stone-300">{{ $invitation->groom_parents ?? 'Putra dari Bapak & Ibu' }}</p>
                @if($invitation->groom_instagram)
                <span class="text-xs font-sans tracking-widest uppercase opacity-75 font-semibold text-amber-400 mt-1 block">@ {{ ltrim($invitation->groom_instagram, '@') }}</span>
                @endif
            </div>

            <!-- Wanita -->
            <div class="flex flex-col items-center">
                <div class="w-36 h-48 mx-auto rounded-t-full overflow-hidden border-2 border-[#D4AF37] relative flex items-center justify-center ring-4 ring-[#D4AF37]/25 shadow-xl transition-all duration-500">
                    @if(!empty($invitation->bride_photo))
                        <img src="{{ Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo) }}?v={{ time() }}" alt="Mempelai Wanita" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700">
                    @else
                        <!-- Placeholder hanya muncul jika foto belum diunggah -->
                        <div class="placeholder-avatar w-full h-full bg-[#65011E] flex items-center justify-center">
                            <svg class="w-12 h-12 text-cream opacity-50" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                    @endif
                </div>
               <h3 class="mt-4 text-2xl md:text-3xl font-heading font-bold tracking-wide text-amber-200">{{ $invitation->bride_name }}</h3>
                <p class="text-xs font-sans tracking-widest uppercase opacity-75 mt-1.5 max-w-md text-stone-300">{{ $invitation->bride_parents ?? 'Putri dari Bapak & Ibu' }}</p>
                @if($invitation->bride_instagram)
                <span class="text-xs font-sans tracking-widest uppercase opacity-75 font-semibold text-amber-400 mt-1 block">@ {{ ltrim($invitation->bride_instagram, '@') }}</span>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- ACARA SECTION -->
<section id="section-acara" class="py-24 px-4 text-white" style="background-color: #171717;">
    <div class="max-w-4xl mx-auto text-center">
        <span class="text-xs uppercase tracking-[0.3em] mb-2 block text-amber-400">JADWAL PERAYAAN</span>
        <h2 class="text-4xl font-heading mb-12">Rangkaian Acara</h2>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-stone-800/80 backdrop-blur-md p-8 rounded-3xl border border-stone-700 text-center shadow-xl">
                <h3 class="text-xl font-heading font-bold text-amber-300 mb-3">Akad Nikah</h3>
                <p class="text-sm text-stone-300">{{ $invitation->akad_date ? $invitation->akad_date->translatedFormat('l, d F Y') : '-' }}</p>
                <p class="text-base font-semibold my-2 text-white">
                    {{ $invitation->akad_time ? $invitation->akad_time->format('H:i') : '08:00' }} - {{ $invitation->akad_end_time ?? '10:00' }} WIB
                </p>
                <p class="text-lg font-heading font-semibold mt-4 text-amber-100">{{ $invitation->akad_venue ?? 'Gedung Akad' }}</p>
                <p class="text-xs text-stone-400 mt-1">{{ $invitation->akad_address }}</p>
                @if($invitation->akad_maps_url)
                <a href="{{ $invitation->akad_maps_url }}" target="_blank" class="inline-block mt-4 px-5 py-2.5 bg-amber-500 text-stone-900 text-xs font-bold rounded-xl hover:bg-amber-400 transition shadow hover:scale-[1.02]">
                    Petunjuk Arah Maps
                </a>
                @endif
            </div>

            <div class="bg-stone-800/80 backdrop-blur-md p-8 rounded-3xl border border-stone-700 text-center shadow-xl">
                <h3 class="text-xl font-heading font-bold text-amber-300 mb-3">Resepsi Pernikahan</h3>
                <p class="text-sm text-stone-300">{{ $invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : '-' }}</p>
                <p class="text-base font-semibold my-2 text-white">
                    {{ $invitation->event_time ? $invitation->event_time->format('H:i') : '11:00' }} - {{ $invitation->event_end_time ?? '13:00' }} WIB
                </p>
                <p class="text-lg font-heading font-semibold mt-4 text-amber-100">{{ $invitation->venue }}</p>
                <p class="text-xs text-stone-400 mt-1">{{ $invitation->address }}</p>
                @if($invitation->maps_url)
                <a href="{{ $invitation->maps_url }}" target="_blank" class="inline-block mt-4 px-5 py-2.5 bg-amber-500 text-stone-900 text-xs font-bold rounded-xl hover:bg-amber-400 transition shadow hover:scale-[1.02]">
                    Petunjuk Arah Maps
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- RSVP & UCAPAN -->
<section id="section-rsvp" class="py-24 px-4 bg-[#262626]">
    <div class="max-w-2xl mx-auto text-center bg-stone-900/90 backdrop-blur-md p-8 sm:p-12 rounded-3xl border border-stone-700/80 shadow-2xl">
        <h2 class="text-3xl font-heading font-bold mb-4 text-white">Konfirmasi Kehadiran (RSVP)</h2>
        <p class="text-xs text-stone-400 mb-8">Mohon konfirmasikan kehadiran Anda untuk persiapan resepsi.</p>
        
        <form action="{{ route('rsvp.store', $invitation) }}" method="POST" class="space-y-4 text-left bg-stone-800/90 p-6 rounded-2xl border border-stone-700">
            @csrf
            @if(isset($guest))
            <input type="hidden" name="guest_token" value="{{ $guest->unique_token }}">
            <input type="hidden" name="name" value="{{ $guest->name }}">
            @else
            <input type="text" name="name" placeholder="Nama Lengkap Anda" required class="w-full px-4 py-2.5 bg-stone-900 border border-stone-700 text-white rounded-xl text-sm focus:outline-none focus:border-amber-400">
            @endif
            <div class="grid grid-cols-2 gap-3">
                <select name="attendance" required class="w-full px-4 py-2.5 bg-stone-900 border border-stone-700 text-white rounded-xl text-sm focus:outline-none focus:border-amber-400">
                    <option value="">Konfirmasi Kehadiran</option>
                    <option value="hadir">Pasti Hadir</option>
                    <option value="tidak_hadir">Berhalangan Hadir</option>
                </select>
                <input type="number" name="guest_count" value="1" min="1" max="5" placeholder="Jumlah Tamu" class="w-full px-4 py-2.5 bg-stone-900 border border-stone-700 text-white rounded-xl text-sm focus:outline-none focus:border-amber-400">
            </div>
            <textarea name="message" rows="3" placeholder="Pesan & Doa Restu untuk kedua mempelai..." class="w-full px-4 py-2.5 bg-stone-900 border border-stone-700 text-white rounded-xl text-sm focus:outline-none focus:border-amber-400"></textarea>
            <button type="submit" class="w-full py-3 rounded-xl bg-amber-500 text-stone-950 font-bold text-sm transition hover:bg-amber-400 hover:scale-[1.02] shadow-md cursor-pointer">
                Kirim Konfirmasi Kehadiran
            </button>
        </form>
    </div>
</section>

<!-- HADIAH & AMPLOP DIGITAL -->
@include('partials.invitation-gift-section', ['primaryColor' => '#fbbf24', 'isDark' => true])

<!-- FOOTER / CLOSING SECTION -->
@include('partials.invitation-closing-section', ['primaryColor' => '#fbbf24', 'isDark' => true])

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
