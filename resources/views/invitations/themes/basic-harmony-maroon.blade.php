{{-- Basic Harmony Maroon - Vertical Stack Classic --}}
<div class="min-h-screen relative overflow-x-hidden selection:bg-rose-900 selection:text-white" style="background-image: url('/images/themes/bg/bg-basic-maroon.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed; font-family: 'Lato', sans-serif; color: #1c1917;">
    <!-- Lapisan overlay warna hangat transparan di atas background agar motif damask menyatu lembut (blend) -->
    <div class="fixed inset-0 pointer-events-none z-0" style="background-color: rgba(65, 10, 18, 0.72); backdrop-filter: blur(1.5px); -webkit-backdrop-filter: blur(1.5px);"></div>
    <div class="relative z-10">
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Lato:wght@300;400;700&display=swap');
@keyframes float-slow {0%, 100% {transform: translateY(0);} 50% {transform: translateY(-8px);}}
.animate-float-slow {animation: float-slow 3.5s ease-in-out infinite;}
.font-heading {font-family: 'Playfair Display', serif;}
</style>

<!-- HERO SECTION (SEAMLESS DAMASK BLEND - NO ABRUPT SOLID BLOCKS) -->
<section id="section-cover" class="relative min-h-screen flex items-center justify-center text-white overflow-hidden">
    @if($invitation->photos->first() || $invitation->cover_photo)
    <div class="absolute inset-0 opacity-20">
        <img src="{{ Storage::url($invitation->cover_photo ?? $invitation->photos->first()->path) }}" class="w-full h-full object-cover" alt="Cover">
    </div>
    @endif
    <div class="absolute inset-0 bg-black/20"></div>

    <!-- Rose Vector Ornaments in corners -->
    <div class="absolute top-6 left-6 w-12 h-12 text-rose-300/40 animate-float-slow">
        <svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4c-5.5 0-10 4.5-10 10 0 3.2 1.5 6 3.9 7.8-2.4 1.1-4.4 2.9-5.7 5.2C10.5 25.6 9 24 7 24c-2.8 0-5 2.2-5 5 0 4.5 4.5 9 11 12.5C18.2 44.2 21 45 24 45s5.8-.8 11-3.5c6.5-3.5 11-8 11-12.5 0-2.8-2.2-5-5-5-2 0-3.5 1.6-5.2 3-1.3-2.3-3.3-4.1-5.7-5.2 2.4-1.8 3.9-4.6 3.9-7.8 0-5.5-4.5-10-10-10z"/></svg>
    </div>
    <div class="absolute bottom-6 right-6 w-12 h-12 text-rose-300/40 animate-float-slow transform rotate-180">
        <svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4c-5.5 0-10 4.5-10 10 0 3.2 1.5 6 3.9 7.8-2.4 1.1-4.4 2.9-5.7 5.2C10.5 25.6 9 24 7 24c-2.8 0-5 2.2-5 5 0 4.5 4.5 9 11 12.5C18.2 44.2 21 45 24 45s5.8-.8 11-3.5c6.5-3.5 11-8 11-12.5 0-2.8-2.2-5-5-5-2 0-3.5 1.6-5.2 3-1.3-2.3-3.3-4.1-5.7-5.2 2.4-1.8 3.9-4.6 3.9-7.8 0-5.5-4.5-10-10-10z"/></svg>
    </div>

    <div class="relative z-10 text-center px-4 max-w-4xl py-16">
        @if(isset($guest))
        <p class="text-xs uppercase tracking-[0.3em] mb-2 opacity-80">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
        <p class="text-2xl font-heading mb-8 text-amber-200">{{ $guest->name }}</p>
        @endif

        <span class="inline-block px-4 py-1 rounded-full text-xs uppercase tracking-widest bg-white/20 backdrop-blur-xs font-semibold mb-6">
            {{ $invitation->title ?? 'Pernikahan' }}
        </span>

        <h1 class="text-5xl sm:text-7xl font-heading mb-4 text-amber-100 font-bold tracking-tight">
            {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}
        </h1>
        <p class="text-lg tracking-wider text-stone-200 mt-2 font-light">
            {{ $invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : '' }}
        </p>

        <!-- Countdown Box (Integer Clean Format) -->
        <div class="mt-8 inline-grid grid-cols-4 gap-2 text-center bg-black/40 backdrop-blur-md p-4 rounded-2xl border border-white/20 font-mono text-xs shadow-xl">
            <div class="px-3 py-1"><span id="cd-days" class="block text-xl font-bold text-amber-300">{{ $invitation->days_remaining }}</span> Hari</div>
            <div class="px-3 py-1"><span id="cd-hours" class="block text-xl font-bold text-amber-300">{{ $invitation->event_time ? $invitation->event_time->format('H') : '00' }}</span> Jam</div>
            <div class="px-3 py-1"><span id="cd-mins" class="block text-xl font-bold text-amber-300">{{ $invitation->event_time ? $invitation->event_time->format('i') : '00' }}</span> Menit</div>
            <div class="px-3 py-1"><span id="cd-secs" class="block text-xl font-bold text-amber-300">00</span> Detik</div>
        </div>
    </div>
</section>

<!-- KUTIPAN SUCI (CONDITIONAL RENDERING) -->
@if($invitation->show_quote && $invitation->quran_text)
<section class="py-20 px-4">
    <div class="max-w-3xl mx-auto text-center bg-white/92 backdrop-blur-md p-8 sm:p-12 rounded-3xl border border-amber-400/20 shadow-2xl">
        <div class="w-10 h-10 mx-auto mb-4 text-[#800000]">
            <svg class="w-full h-full" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
        </div>
        <p class="text-2xl sm:text-3xl mb-6 leading-relaxed font-heading" dir="rtl" style="color: #800000;">
            {{ $invitation->quran_text }}
        </p>
        <p class="text-base sm:text-lg italic text-stone-700 mb-3 max-w-2xl mx-auto leading-relaxed">
            "{{ $invitation->quran_translation }}"
        </p>
        @if($invitation->quote_source)
        <p class="text-xs font-semibold uppercase tracking-wider text-amber-800">{{ $invitation->quote_source }}</p>
        @endif
    </div>
</section>
@endif

<!-- MEMPELAI (BINGKAI ARCH KUBAH MEWAH - ASPECT 3/4) -->
<section id="section-mempelai" class="py-20 px-4">
    <div class="max-w-3xl mx-auto text-center bg-white/92 backdrop-blur-md p-8 sm:p-14 rounded-3xl border border-amber-400/25 shadow-2xl">
        <span class="text-xs uppercase tracking-[0.3em] font-semibold block mb-2" style="color: #800000;">BRIDE & GROOM</span>
        <h2 class="text-4xl font-heading mb-14" style="color: #800000;">Kedua Mempelai</h2>

        <div class="space-y-12">
            <!-- Mempelai Pria (Bingkai Arch Kubah Mewah) -->
            <div class="flex flex-col items-center group">
                <div class="w-36 h-48 mx-auto rounded-t-full overflow-hidden border-2 border-[#D4AF37] relative flex items-center justify-center ring-4 ring-[#D4AF37]/25 shadow-xl transition-all duration-500">
                    @if(!empty($invitation->groom_photo))
                        <img src="{{ Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo) }}?v={{ time() }}" alt="Mempelai Pria" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700">
                    @else
                        <!-- Placeholder hanya muncul jika foto belum diunggah -->
                        <div class="placeholder-avatar w-full h-full bg-[#8B3A1C] flex items-center justify-center">
                            <svg class="w-12 h-12 text-[#FEFCEF] opacity-40 placeholder-avatar" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                    @endif
                </div>
               <h3 class="mt-4 text-2xl md:text-3xl font-heading font-bold tracking-wide" style="color: #800000;">{{ $invitation->groom_name }}</h3>
                <p class="text-xs font-sans tracking-widest uppercase opacity-75 mt-1.5 max-w-md">{{ $invitation->groom_parents ?? 'Putra dari Bapak & Ibu' }}</p>
                @if($invitation->groom_instagram)
                <span class="text-xs font-sans tracking-widest uppercase opacity-75 font-semibold text-amber-700 mt-1 block">@ {{ ltrim($invitation->groom_instagram, '@') }}</span>
                @endif
            </div>

            <div class="flex items-center justify-center gap-4">
                <div class="w-16 h-px bg-amber-600/40"></div>
                <span class="font-heading text-3xl italic text-amber-700">&</span>
                <div class="w-16 h-px bg-amber-600/40"></div>
            </div>

            <!-- Mempelai Wanita (Bingkai Arch Kubah Mewah) -->
            <div class="flex flex-col items-center group">
                <div class="w-36 h-48 mx-auto rounded-t-full overflow-hidden border-2 border-[#D4AF37] relative flex items-center justify-center ring-4 ring-[#D4AF37]/25 shadow-xl transition-all duration-500">
                    @if(!empty($invitation->bride_photo))
                        <img src="{{ Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo) }}?v={{ time() }}" alt="Mempelai Wanita" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700">
                    @else
                        <!-- Placeholder hanya muncul jika foto belum diunggah -->
                        <div class="placeholder-avatar w-full h-full bg-[#65011E] flex items-center justify-center">
                            <svg class="w-12 h-12 text-[#FEFCEF] opacity-40 placeholder-avatar" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                    @endif
                </div>
               <h3 class="mt-4 text-2xl md:text-3xl font-heading font-bold tracking-wide" style="color: #800000;">{{ $invitation->bride_name }}</h3>
                <p class="text-xs font-sans tracking-widest uppercase opacity-75 mt-1.5 max-w-md">{{ $invitation->bride_parents ?? 'Putri dari Bapak & Ibu' }}</p>
                @if($invitation->bride_instagram)
                <span class="text-xs font-sans tracking-widest uppercase opacity-75 font-semibold text-amber-700 mt-1 block">@ {{ ltrim($invitation->bride_instagram, '@') }}</span>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- ACARA SECTION (TRANSLUCENT CARD - SEAMLESS DAMASK FLOW) -->
<section id="section-acara" class="py-20 px-4">
    <div class="max-w-4xl mx-auto text-center bg-black/35 backdrop-blur-md p-8 sm:p-14 rounded-3xl border border-white/20 shadow-2xl text-white">
        <span class="text-xs uppercase tracking-[0.3em] mb-2 block opacity-80 text-amber-200">RANGKAIAN MOMEN</span>
        <h2 class="text-4xl font-heading mb-12 text-amber-100">Waktu & Tempat Acara</h2>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Akad -->
            <div class="bg-black/30 backdrop-blur-md p-8 rounded-2xl border border-white/20 text-center">
                <h3 class="text-xl font-heading font-bold text-amber-200 mb-3">Akad Nikah</h3>
                <p class="text-sm opacity-90">{{ $invitation->akad_date ? $invitation->akad_date->translatedFormat('l, d F Y') : '-' }}</p>
                <p class="text-base font-semibold my-2">
                    {{ $invitation->akad_time ? $invitation->akad_time->format('H:i') : '08:00' }} - {{ $invitation->akad_end_time ?? '10:00' }} WIB
                </p>
                <p class="text-lg font-heading font-semibold mt-4 text-amber-100">{{ $invitation->akad_venue ?? 'Gedung Akad' }}</p>
                <p class="text-xs opacity-80 mt-1">{{ $invitation->akad_address }}</p>
                @if($invitation->akad_maps_url)
                <a href="{{ $invitation->akad_maps_url }}" target="_blank" class="inline-block mt-4 px-5 py-2 bg-white text-[#800000] text-xs font-bold rounded-lg hover:bg-stone-100 transition shadow">
                    Petunjuk Arah Maps
                </a>
                @endif
            </div>

            <!-- Resepsi -->
            <div class="bg-black/30 backdrop-blur-md p-8 rounded-2xl border border-white/20 text-center">
                <h3 class="text-xl font-heading font-bold text-amber-200 mb-3">Resepsi Pernikahan</h3>
                <p class="text-sm opacity-90">{{ $invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : '-' }}</p>
                <p class="text-base font-semibold my-2">
                    {{ $invitation->event_time ? $invitation->event_time->format('H:i') : '11:00' }} - {{ $invitation->event_end_time ?? '13:00' }} WIB
                </p>
                <p class="text-lg font-heading font-semibold mt-4 text-amber-100">{{ $invitation->venue }}</p>
                <p class="text-xs opacity-80 mt-1">{{ $invitation->address }}</p>
                @if($invitation->maps_url)
                <a href="{{ $invitation->maps_url }}" target="_blank" class="inline-block mt-4 px-5 py-2 bg-white text-[#800000] text-xs font-bold rounded-lg hover:bg-stone-100 transition shadow">
                    Petunjuk Arah Maps
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- RSVP & UCAPAN -->
<section id="section-rsvp" class="py-20 px-4">
    <div class="max-w-2xl mx-auto text-center bg-white/92 backdrop-blur-md p-8 sm:p-12 rounded-3xl border border-amber-400/20 shadow-xl">
        <h2 class="text-3xl font-heading font-bold mb-4" style="color: #800000;">Konfirmasi Kehadiran (RSVP)</h2>
        <p class="text-xs text-stone-500 mb-8">Berikan kepastian kehadiran Anda untuk kemudahan pengaturan tempat.</p>
        
        <form action="{{ route('rsvp.store', $invitation) }}" method="POST" class="space-y-4 text-left bg-[#FDFBF7] p-6 rounded-2xl border border-[#E7E0D6]">
            @csrf
            @if(isset($guest))
            <input type="hidden" name="guest_token" value="{{ $guest->unique_token }}">
            <input type="hidden" name="name" value="{{ $guest->name }}">
            @else
            <input type="text" name="name" placeholder="Nama Lengkap Anda" required class="w-full px-4 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-sm focus:outline-none focus:border-[#800000]">
            @endif
            <div class="grid grid-cols-2 gap-3">
                <select name="attendance" required class="w-full px-4 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-sm focus:outline-none focus:border-[#800000]">
                    <option value="">Konfirmasi Kehadiran</option>
                    <option value="hadir">Pasti Hadir</option>
                    <option value="tidak_hadir">Berhalangan Hadir</option>
                </select>
                <input type="number" name="guest_count" value="1" min="1" max="5" placeholder="Jumlah Tamu" class="w-full px-4 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-sm focus:outline-none focus:border-[#800000]">
            </div>
            <textarea name="message" rows="3" placeholder="Pesan & Doa Restu untuk kedua mempelai..." class="w-full px-4 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-sm focus:outline-none focus:border-[#800000]"></textarea>
            <button type="submit" class="w-full py-3 rounded-xl text-white font-semibold text-sm transition hover:opacity-90 shadow-md" style="background-color: #800000;">
                Kirim Konfirmasi Kehadiran
            </button>
        </form>
    </div>
</section>

<!-- HADIAH & AMPLOP DIGITAL (CARD KONTRAINER CREAM ELEGAN) -->
@php
    $recipient = $invitation->gift_recipient_name ?? ($invitation->groom_nickname . ' & ' . $invitation->bride_nickname);
    $phone = $invitation->gift_phone ?? null;
    $address = $invitation->gift_address ?? null;
    $mapsUrl = $invitation->gift_maps_url ?? null;
    $hasPhysicalGift = !empty($address);
    $bankName = $invitation->gift_bank_name ?? 'Bank Central Asia (BCA)';
    $accNumber = $invitation->gift_account_number ?? null;
    $accHolder = $invitation->gift_account_holder ?? ($invitation->groom_nickname . ' & ' . $invitation->bride_nickname);
    $hasBank = !empty($accNumber) || ($invitation->giftAccounts && $invitation->giftAccounts->count() > 0);
@endphp

@if($hasBank || $hasPhysicalGift)
<section id="section-hadiah" class="py-20 px-4">
    <div class="max-w-3xl mx-auto text-center bg-[#FEFCEF] p-6 sm:p-12 rounded-3xl border border-[#E8DFC8] shadow-sm text-[#1F1F1F]">
        <!-- Header -->
        <span class="text-xs uppercase tracking-[0.3em] font-semibold block mb-2 text-[#8B3A1C]">WEDDING GIFT</span>
        <h2 class="text-3xl sm:text-4xl font-heading font-bold mb-4 text-[#65011E]">Tanda Kasih</h2>
        <p class="text-sm text-[#4A4A4A] max-w-xl mx-auto mb-10 leading-relaxed font-sans">
            Doa restu Anda merupakan hadiah terindah bagi kami. Namun jika Anda bermaksud memberi tanda kasih secara digital maupun fisik, kami menyediakan informasi berikut:
        </p>

        <div class="grid grid-cols-1 {{ ($hasBank && $hasPhysicalGift) ? 'md:grid-cols-2' : 'max-w-md mx-auto' }} gap-6 sm:gap-8 items-stretch text-left">
            <!-- Amplop Digital -->
            @if($hasBank)
            <div class="p-6 rounded-2xl bg-white border border-[#E8DFC8] shadow-sm flex flex-col justify-between relative overflow-hidden">
                <div>
                    <div class="w-11 h-11 mb-3 rounded-xl flex items-center justify-center bg-[#65011E]/10 text-[#65011E]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                    </div>
                    <span class="text-[11px] uppercase tracking-wider font-semibold block text-[#8B3A1C] mb-1 font-sans">Amplop Digital</span>
                    <h3 class="text-lg font-heading font-bold text-[#65011E] mb-2">{{ $bankName }}</h3>
                    <div class="p-3.5 rounded-xl bg-[#FAF8F5] border border-[#E8DFC8] font-mono text-base sm:text-lg font-bold tracking-wider text-[#65011E] my-2 select-all flex items-center justify-between">
                        <span id="bankAccNumber">{{ $accNumber ?? '1234567890' }}</span>
                    </div>
                    <p class="text-xs text-[#4A4A4A] mt-1 font-sans">a.n. <span class="font-bold text-[#1F1F1F]">{{ $accHolder }}</span></p>
                </div>
                <div class="mt-6 pt-4 border-t border-[#E8DFC8]">
                    <button type="button" onclick="copyInvitationText('{{ $accNumber ?? '1234567890' }}', 'Nomor rekening {{ $bankName }} berhasil disalin!')" class="w-full py-3 px-4 rounded-xl text-xs font-semibold text-white bg-[#65011E] hover:bg-[#800000] hover:scale-[1.02] active:scale-95 transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
                        </svg>
                        <span>Salin Nomor Rekening</span>
                    </button>
                </div>
            </div>
            @endif

            <!-- Kirim Kado Fisik -->
            @if($hasPhysicalGift)
            <div class="p-6 rounded-2xl bg-white border border-[#E8DFC8] shadow-sm flex flex-col justify-between relative overflow-hidden">
                <div>
                    <div class="w-11 h-11 mb-3 rounded-xl flex items-center justify-center bg-[#8B3A1C]/10 text-[#8B3A1C]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <span class="text-[11px] uppercase tracking-wider font-semibold block text-[#8B3A1C] mb-1 font-sans">Kirim Kado Fisik</span>
                    <h3 class="text-lg font-heading font-bold text-[#65011E] mb-2">Alamat Pengiriman</h3>
                    <div class="text-xs sm:text-sm text-[#4A4A4A] space-y-1 mb-2 font-sans">
                        <p class="font-bold text-[#1F1F1F]">{{ $recipient }}</p>
                        @if($phone)
                        <p class="text-[#4A4A4A] font-mono text-xs">No. Telp / WA: {{ $phone }}</p>
                        @endif
                    </div>
                    <div class="p-3.5 rounded-xl bg-[#FAF8F5] border border-[#E8DFC8] text-xs sm:text-sm text-[#4A4A4A] leading-relaxed font-sans">
                        {{ $address }}
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-[#E8DFC8] flex flex-col sm:flex-row gap-2.5">
                    <button type="button" onclick="copyInvitationText('{{ addslashes($address) }}', 'Alamat pengiriman kado berhasil disalin!')" class="flex-1 py-3 px-4 rounded-xl text-xs font-semibold text-white bg-[#65011E] hover:bg-[#800000] hover:scale-[1.02] active:scale-95 transition-all duration-200 flex items-center justify-center gap-1.5 cursor-pointer shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
                        </svg>
                        <span>Salin Alamat</span>
                    </button>
                    @if($mapsUrl)
                    <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="flex-1 py-3 px-4 rounded-xl text-xs font-semibold text-white bg-stone-900 hover:bg-stone-800 transition-all duration-200 flex items-center justify-center gap-1.5 hover:scale-[1.02] active:scale-95 shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Buka di Maps</span>
                    </a>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- FOOTER / CLOSING SECTION (CARD KONTRAINER CREAM ELEGAN) -->
@php
    $closingTitle = $invitation->closing_title ?: 'Terima Kasih';
    $closingMessage = $invitation->closing_message ?: 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.';
    $closingSignature = $invitation->closing_signature ?: ('Kami yang berbahagia, ' . $invitation->groom_nickname . ' & ' . $invitation->bride_nickname . ' Beserta Seluruh Keluarga Besar');
@endphp
<footer class="py-16 sm:py-20 px-4 text-center pb-24">
    <div class="max-w-3xl mx-auto bg-[#FEFCEF] p-6 sm:p-12 rounded-3xl border border-[#E8DFC8] shadow-sm text-[#1F1F1F] space-y-6">
        <!-- Elegant Vector Ornament -->
        <div class="w-10 h-10 mx-auto text-[#8B3A1C]">
            <svg class="w-full h-full" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
        </div>

        <h2 class="text-3xl sm:text-4xl font-heading font-bold text-[#65011E]">
            {{ $closingTitle }}
        </h2>

        <p class="text-sm sm:text-base leading-relaxed text-[#4A4A4A] max-w-xl mx-auto font-sans">
            {{ $closingMessage }}
        </p>

        <div class="pt-4 space-y-2">
            <p class="text-xs uppercase tracking-[0.25em] font-semibold text-[#8B3A1C] font-sans">
                Salam Hangat Kami
            </p>
            <p class="text-xl sm:text-2xl font-heading font-bold text-[#65011E]">
                {{ $closingSignature }}
            </p>
        </div>

        <div class="pt-8 text-[11px] text-[#4A4A4A]/80 font-sans border-t border-[#E8DFC8]/60">
            <p>&copy; {{ date('Y') }} SimpulTemu • Platform Undangan Digital Eksklusif</p>
        </div>
    </div>
</footer>

    </div>
</div>

@push('scripts')
<script>
function copyInvitationText(text, successMsg = 'Berhasil disalin ke clipboard!') {
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).then(() => {
            alert(successMsg);
        }).catch(() => {
            fallbackCopyText(text, successMsg);
        });
    } else {
        fallbackCopyText(text, successMsg);
    }
}

function fallbackCopyText(text, successMsg) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.opacity = '0';
    document.body.appendChild(textarea);
    textarea.focus();
    textarea.select();
    try {
        document.execCommand('copy');
        alert(successMsg);
    } catch (err) {
        prompt('Salin teks secara manual:', text);
    }
    document.body.removeChild(textarea);
}

function copyAccountNumber() {
    const acc = document.getElementById('bankAccNumber')?.innerText || '';
    if (acc) {
        copyInvitationText(acc, 'Nomor rekening berhasil disalin!');
    }
}

// Active real-time countdown with clean integer formatting (Math.floor)
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
