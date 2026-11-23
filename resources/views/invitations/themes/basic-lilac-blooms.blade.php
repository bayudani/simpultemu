{{-- Basic Lilac Blooms - Cartoon Wedding Theme --}}
<div class="min-h-screen" style="background-color: #FAF7FC; background-image: radial-gradient(rgba(126,34,206,0.05) 1px, transparent 0); background-size: 12px 12px; font-family: 'Outfit', sans-serif; color: #3b0764;">
<style>
@import url('https://fonts.googleapis.com/css2?family=Alex+Brush&family=Outfit:wght@300;400;500;600;700&display=swap');
@keyframes gentle-sway {0%, 100% {transform: rotate(-3deg);} 50% {transform: rotate(3deg);}}
.animate-gentle-sway {animation: gentle-sway 3.5s ease-in-out infinite;}
.font-heading {font-family: 'Alex Brush', cursive;}
</style>

<!-- HERO SECTION -->
<section id="section-cover" class="relative min-h-screen flex items-center justify-center text-white overflow-hidden" style="background: linear-gradient(135deg, #7e22ce 0%, #4c1d95 100%);">
    <div class="absolute inset-0 opacity-20">
        <img src="{{ asset('images/themes/lilac-blooms/bg-floral-portrait.jpg') }}" class="w-full h-full object-cover" alt="Background">
    </div>
    <div class="absolute inset-0 bg-black/25"></div>

    <!-- Lavender Garland SVG Ornaments (NO EMOJI) -->
    <div class="absolute top-6 left-6 w-12 h-12 text-purple-300/50 animate-gentle-sway">
        <svg viewBox="0 0 48 48" fill="currentColor">
            <path d="M24 6c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm-6 8c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm12 0c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm-9 7c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm6 0c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm-3 8c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm0 7v10h2V36h-2z"/>
        </svg>
    </div>
    <div class="absolute bottom-6 right-6 w-12 h-12 text-purple-300/50 animate-gentle-sway transform rotate-180">
        <svg viewBox="0 0 48 48" fill="currentColor">
            <path d="M24 6c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm-6 8c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm12 0c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm-9 7c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm6 0c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm-3 8c-1.5 0-3 1.5-3 3s1.5 3 3 3 3-1.5 3-3-1.5-3-3-3zm0 7v10h2V36h-2z"/>
        </svg>
    </div>

    <div class="relative z-10 text-center px-4 max-w-4xl py-16">
        @if(isset($guest))
        <p class="text-xs uppercase tracking-[0.3em] mb-2 text-purple-200">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
        <p class="text-3xl font-heading mb-8 text-white">{{ $guest->name }}</p>
        @endif

        <span class="inline-block px-4 py-1 rounded-full text-xs uppercase tracking-widest bg-white/20 backdrop-blur-xs font-semibold mb-6 text-purple-100">
            {{ $invitation->title ?? 'Pernikahan' }}
        </span>

        <!-- Cartoon Couple Illustration in Cover -->
        <div class="w-36 h-36 mx-auto mb-6 rounded-full overflow-hidden border-2 border-purple-300/40 shadow-xl bg-purple-900/30 flex items-center justify-center">
            <img src="{{ asset('images/themes/lilac-blooms/couple-cartoon.png') }}" alt="Mempelai" class="w-full h-full object-cover">
        </div>

        <h1 class="text-5xl sm:text-7xl font-heading mb-4 text-purple-100 font-normal">
            {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}
        </h1>
        <p class="text-base tracking-widest uppercase text-purple-200 mt-2 font-light">
            {{ $invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : '' }}
        </p>

        <!-- Countdown Box (Integer Clean Format) -->
        <div class="mt-8 inline-grid grid-cols-4 gap-2 text-center bg-black/40 backdrop-blur-md p-4 rounded-2xl border border-white/20 font-mono text-xs shadow-xl">
            <div class="px-3 py-1"><span id="cd-days" class="block text-xl font-bold text-purple-300">{{ $invitation->days_remaining }}</span> Hari</div>
            <div class="px-3 py-1"><span id="cd-hours" class="block text-xl font-bold text-purple-300">{{ $invitation->event_time ? $invitation->event_time->format('H') : '00' }}</span> Jam</div>
            <div class="px-3 py-1"><span id="cd-mins" class="block text-xl font-bold text-purple-300">{{ $invitation->event_time ? $invitation->event_time->format('i') : '00' }}</span> Menit</div>
            <div class="px-3 py-1"><span id="cd-secs" class="block text-xl font-bold text-purple-300">00</span> Detik</div>
        </div>
    </div>
</section>

<!-- KUTIPAN SUCI (CONDITIONAL RENDERING) -->
@if($invitation->show_quote && $invitation->quran_text)
<section class="py-20 px-4" style="background-color: #F3E8FF;">
    <div class="max-w-3xl mx-auto text-center">
        <div class="w-10 h-10 mx-auto mb-4 text-[#7e22ce]">
            <svg class="w-full h-full" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
        </div>
        <p class="text-2xl sm:text-3xl mb-6 leading-relaxed font-serif" dir="rtl" style="color: #7e22ce;">
            {{ $invitation->quran_text }}
        </p>
        <p class="text-base sm:text-lg italic text-stone-600 mb-3 max-w-2xl mx-auto leading-relaxed">
            "{{ $invitation->quran_translation }}"
        </p>
        @if($invitation->quote_source)
        <p class="text-xs font-semibold uppercase tracking-wider text-purple-700">{{ $invitation->quote_source }}</p>
        @endif
    </div>
</section>
@endif

<!-- MEMPELAI (CARTOON TEMPLATE ILLUSTRATIONS) -->
<section id="section-mempelai" class="py-24 px-4 bg-white">
    <div class="max-w-4xl mx-auto text-center">
        <span class="text-xs uppercase tracking-[0.3em] font-semibold block mb-2" style="color: #7e22ce;">THE COUPLE</span>
        <h2 class="text-5xl font-heading mb-16" style="color: #7e22ce;">Kedua Mempelai</h2>

        <div class="grid md:grid-cols-2 gap-12 items-start max-w-2xl mx-auto">
            <!-- Pria -->
            <div class="flex flex-col items-center">
                <div class="w-44 h-44 mx-auto rounded-full overflow-hidden border-4 border-purple-200 relative flex items-center justify-center shadow-lg bg-purple-50">
                    <img src="{{ asset('images/themes/lilac-blooms/groom-cartoon.png') }}" alt="Mempelai Pria" class="w-full h-full object-cover">
                </div>
               <h3 class="mt-4 text-2xl md:text-3xl font-heading font-bold tracking-wide" style="color: #3b0764;">{{ $invitation->groom_name }}</h3>
                <p class="text-xs font-sans tracking-widest uppercase opacity-75 mt-1.5 max-w-md">{{ $invitation->groom_parents ?? 'Putra dari Bapak & Ibu' }}</p>
                @if($invitation->groom_instagram)
                <span class="text-xs font-sans tracking-widest uppercase opacity-75 font-semibold text-purple-700 mt-1 block">@ {{ ltrim($invitation->groom_instagram, '@') }}</span>
                @endif
            </div>

            <!-- Wanita -->
            <div class="flex flex-col items-center">
                <div class="w-44 h-44 mx-auto rounded-full overflow-hidden border-4 border-purple-200 relative flex items-center justify-center shadow-lg bg-purple-50">
                    <img src="{{ asset('images/themes/lilac-blooms/bride-cartoon.png') }}" alt="Mempelai Wanita" class="w-full h-full object-cover">
                </div>
               <h3 class="mt-4 text-2xl md:text-3xl font-heading font-bold tracking-wide" style="color: #3b0764;">{{ $invitation->bride_name }}</h3>
                <p class="text-xs font-sans tracking-widest uppercase opacity-75 mt-1.5 max-w-md">{{ $invitation->bride_parents ?? 'Putri dari Bapak & Ibu' }}</p>
                @if($invitation->bride_instagram)
                <span class="text-xs font-sans tracking-widest uppercase opacity-75 font-semibold text-purple-700 mt-1 block">@ {{ ltrim($invitation->bride_instagram, '@') }}</span>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- ACARA SECTION -->
<section id="section-acara" class="py-24 px-4 text-white" style="background-color: #7e22ce;">
    <div class="max-w-4xl mx-auto text-center">
        <span class="text-xs uppercase tracking-[0.3em] mb-2 block text-purple-200">JADWAL PERAYAAN</span>
        <h2 class="text-5xl font-heading mb-12">Rangkaian Acara</h2>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl border border-white/20 text-center shadow-xl">
                <h3 class="text-xl font-heading font-bold text-purple-200 mb-3">Akad Nikah</h3>
                <p class="text-sm opacity-90">{{ $invitation->akad_date ? $invitation->akad_date->translatedFormat('l, d F Y') : '-' }}</p>
                <p class="text-base font-semibold my-2">
                    {{ $invitation->akad_time ? $invitation->akad_time->format('H:i') : '08:00' }} - {{ $invitation->akad_end_time ?? '10:00' }} WIB
                </p>
                <p class="text-lg font-heading font-semibold mt-4 text-purple-100">{{ $invitation->akad_venue ?? 'Gedung Akad' }}</p>
                <p class="text-xs opacity-80 mt-1">{{ $invitation->akad_address }}</p>
                @if($invitation->akad_maps_url)
                <a href="{{ $invitation->akad_maps_url }}" target="_blank" class="inline-block mt-4 px-5 py-2.5 bg-white text-purple-900 text-xs font-bold rounded-xl hover:bg-stone-100 transition shadow hover:scale-[1.02]">
                    Petunjuk Arah Maps
                </a>
                @endif
            </div>

            <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl border border-white/20 text-center shadow-xl">
                <h3 class="text-xl font-heading font-bold text-purple-200 mb-3">Resepsi Pernikahan</h3>
                <p class="text-sm opacity-90">{{ $invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : '-' }}</p>
                <p class="text-base font-semibold my-2">
                    {{ $invitation->event_time ? $invitation->event_time->format('H:i') : '11:00' }} - {{ $invitation->event_end_time ?? '13:00' }} WIB
                </p>
                <p class="text-lg font-heading font-semibold mt-4 text-purple-100">{{ $invitation->venue }}</p>
                <p class="text-xs opacity-80 mt-1">{{ $invitation->address }}</p>
                @if($invitation->maps_url)
                <a href="{{ $invitation->maps_url }}" target="_blank" class="inline-block mt-4 px-5 py-2.5 bg-white text-purple-900 text-xs font-bold rounded-xl hover:bg-stone-100 transition shadow hover:scale-[1.02]">
                    Petunjuk Arah Maps
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- RSVP & UCAPAN -->
<section id="section-rsvp" class="py-24 px-4 bg-[#FAF7FC]">
    <div class="max-w-2xl mx-auto text-center bg-white/95 backdrop-blur-md p-8 sm:p-12 rounded-3xl border border-[#E9D5FF] shadow-xl">
        <h2 class="text-4xl font-heading mb-4" style="color: #7e22ce;">Konfirmasi Kehadiran</h2>
        <p class="text-xs text-stone-500 mb-8">Mohon konfirmasikan kehadiran Anda untuk persiapan resepsi.</p>
        
        <form action="{{ route('rsvp.store', $invitation) }}" method="POST" class="space-y-4 text-left bg-stone-50/80 p-6 rounded-2xl border border-[#E9D5FF]">
            @csrf
            @if(isset($guest))
            <input type="hidden" name="guest_token" value="{{ $guest->unique_token }}">
            <input type="hidden" name="name" value="{{ $guest->name }}">
            @else
            <input type="text" name="name" placeholder="Nama Lengkap Anda" required class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-purple-600">
            @endif
            <div class="grid grid-cols-2 gap-3">
                <select name="attendance" required class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-purple-600">
                    <option value="">Konfirmasi Kehadiran</option>
                    <option value="hadir">Pasti Hadir</option>
                    <option value="tidak_hadir">Berhalangan Hadir</option>
                </select>
                <input type="number" name="guest_count" value="1" min="1" max="5" placeholder="Jumlah Tamu" class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-purple-600">
            </div>
            <textarea name="message" rows="3" placeholder="Pesan & Doa Restu untuk kedua mempelai..." class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-purple-600"></textarea>
            <button type="submit" class="w-full py-3 rounded-xl text-white font-semibold text-sm transition hover:opacity-90 shadow-md" style="background-color: #7e22ce;">
                Kirim Konfirmasi Kehadiran
            </button>
        </form>
    </div>
</section>

<!-- HADIAH & AMPLOP DIGITAL -->
@include('partials.invitation-gift-section', ['primaryColor' => '#7e22ce', 'isDark' => false])

<!-- FOOTER / CLOSING SECTION -->
@include('partials.invitation-closing-section', ['primaryColor' => '#7e22ce', 'isDark' => true])

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
