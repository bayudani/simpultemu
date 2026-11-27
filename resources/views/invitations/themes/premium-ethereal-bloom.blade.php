{{-- Premium Ethereal Bloom - Watercolor Blue & Gold Floral Wreath Theme --}}
<div class="min-h-screen text-slate-800 antialiased" style="background-color: #F0F7FD; background-image: url('{{ asset('images/themes/ethereal-bloom/bg-watercolor-portrait.jpg') }}'); background-size: cover; background-position: center top; font-family: 'Plus Jakarta Sans', sans-serif;">
<style>
@import url('https://fonts.googleapis.com/css2?family=Alex+Brush&family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
.font-script { font-family: 'Alex Brush', cursive; }
.font-heading { font-family: 'Playfair Display', serif; }
@keyframes ethereal-float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-8px) rotate(1.5deg); }
}
@keyframes ethereal-pulse {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.02); opacity: 0.95; }
}
.anim-ethereal-float { animation: ethereal-float 5s ease-in-out infinite; }
.anim-ethereal-pulse { animation: ethereal-pulse 3.5s ease-in-out infinite; }
</style>

<!-- HERO SECTION -->
<section id="section-hero" class="relative min-h-screen flex flex-col items-center justify-center text-center px-4 py-16 overflow-hidden">
    <!-- Header Garland -->
    <div class="w-64 max-w-xs mx-auto mb-4 anim-ethereal-float">
        <img src="{{ !empty($invitation->custom_ornament_header) ? (Str::startsWith($invitation->custom_ornament_header, ['http://', 'https://']) ? $invitation->custom_ornament_header : asset('storage/'.ltrim($invitation->custom_ornament_header, '/'))) : asset('images/themes/ethereal-bloom/floral-header-garland.png') }}" alt="" class="w-full h-auto object-contain">
    </div>

    <p class="text-xs uppercase tracking-[0.35em] text-blue-600 font-semibold mb-2">WEDDING INVITATION</p>
    <h1 class="text-5xl sm:text-7xl font-script text-[#1D4ED8] mb-2 leading-tight">
        {{ $invitation->groom_nickname ?? 'Justin' }} & {{ $invitation->bride_nickname ?? 'Sisca' }}
    </h1>
    <p class="text-sm tracking-wide text-slate-600 font-medium mb-6">
        {{ $invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : 'Rabu, 18 Februari 2026' }}
    </p>

    <!-- Couple Portrait in Round Floral Frame -->
    <div class="relative w-64 h-64 sm:w-72 sm:h-72 mx-auto my-4 flex items-center justify-center">
        <!-- Portrait Inside Wreath -->
        <div class="w-48 h-48 sm:w-56 sm:h-56 rounded-full overflow-hidden shadow-xl ring-4 ring-white/80">
            @php
                $rawHeroPhoto = !empty($invitation->cover_photo) ? $invitation->cover_photo : ($invitation->background_photo ?? null);
                $heroPhoto = $rawHeroPhoto
                    ? (Str::startsWith($rawHeroPhoto, ['http://', 'https://']) ? $rawHeroPhoto : asset('storage/'.ltrim($rawHeroPhoto, '/')))
                    : 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80';
            @endphp
            <img src="{{ $heroPhoto }}" alt="Couple" class="w-full h-full object-cover">
        </div>
        <!-- Floral Round Frame Overlay -->
        <img src="{{ asset('images/themes/ethereal-bloom/floral-frame-round.png') }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10 anim-ethereal-pulse">
    </div>

    <!-- Countdown Timer Boxes -->
    <div class="grid grid-cols-4 gap-2.5 sm:gap-3 max-w-xs mx-auto mt-6 text-white font-mono text-center">
        <div class="bg-[#3B82F6] rounded-xl py-2 px-2 shadow-md">
            <span class="block text-lg sm:text-xl font-bold">{{ $invitation->days_remaining ?? '00' }}</span>
            <span class="text-[10px] uppercase tracking-wider text-blue-100">DAY</span>
        </div>
        <div class="bg-[#3B82F6] rounded-xl py-2 px-2 shadow-md">
            <span class="block text-lg sm:text-xl font-bold">{{ $invitation->event_time ? $invitation->event_time->format('H') : '00' }}</span>
            <span class="text-[10px] uppercase tracking-wider text-blue-100">HOUR</span>
        </div>
        <div class="bg-[#3B82F6] rounded-xl py-2 px-2 shadow-md">
            <span class="block text-lg sm:text-xl font-bold">{{ $invitation->event_time ? $invitation->event_time->format('i') : '00' }}</span>
            <span class="text-[10px] uppercase tracking-wider text-blue-100">MINUTE</span>
        </div>
        <div class="bg-[#3B82F6] rounded-xl py-2 px-2 shadow-md">
            <span class="block text-lg sm:text-xl font-bold">00</span>
            <span class="text-[10px] uppercase tracking-wider text-blue-100">SECOND</span>
        </div>
    </div>

    <!-- CTA Save Date -->
    <div class="mt-6">
        <a href="#section-acara" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-[#1D4ED8] text-white text-xs font-semibold uppercase tracking-wider shadow-lg hover:bg-[#1E40AF] transition-transform duration-300 hover:scale-105">
            Simpan Tanggal Acara
        </a>
    </div>
</section>

<!-- SALAM PEMBUKA / AYAT SECTION -->
@if($invitation->show_quote)
<section class="py-16 px-4 text-center bg-white/70 backdrop-blur-sm border-y border-blue-100">
    <div class="max-w-2xl mx-auto space-y-4">
        <div class="w-48 max-w-xs mx-auto mb-2">
            <img src="{{ !empty($invitation->custom_ornament_header) ? (Str::startsWith($invitation->custom_ornament_header, ['http://', 'https://']) ? $invitation->custom_ornament_header : asset('storage/'.ltrim($invitation->custom_ornament_header, '/'))) : asset('images/themes/ethereal-bloom/floral-header-garland.png') }}" alt="" class="w-full h-auto object-contain">
        </div>
        <h2 class="text-3xl font-script text-[#1D4ED8]">Salam Pembuka</h2>
        <p class="text-xs uppercase tracking-widest text-slate-500 font-semibold">Atas Rahmat Tuhan Yang Maha Esa</p>
        <p class="text-sm sm:text-base leading-relaxed text-slate-700 italic px-4">
            "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}"
        </p>
        <p class="text-xs font-semibold uppercase tracking-wider text-blue-700">
            {{ $invitation->quote_source ?? 'QS. Ar-Rum: 21' }}
        </p>
    </div>
</section>
@endif

<!-- MEMPELAI SECTION -->
<section id="section-mempelai" class="py-20 px-4 text-center">
    <div class="max-w-3xl mx-auto">
        <p class="text-xs uppercase tracking-[0.3em] font-semibold text-blue-600 mb-1">THE HAPPY COUPLE</p>
        <h2 class="text-4xl sm:text-5xl font-script text-[#1D4ED8] mb-12">Kedua Mempelai</h2>

        <div class="grid md:grid-cols-2 gap-10 items-start max-w-2xl mx-auto">
            <!-- Mempelai Pria -->
            <div class="flex flex-col items-center">
                <div class="relative w-56 h-56 flex items-center justify-center">
                    <div class="w-40 h-40 rounded-full overflow-hidden shadow-lg ring-4 ring-white">
                        @if(!empty($invitation->groom_photo))
                            <img src="{{ Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo) }}" alt="Mempelai Pria" class="w-full h-full object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80" alt="Mempelai Pria" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <img src="{{ asset('images/themes/ethereal-bloom/floral-frame-round.png') }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10">
                </div>
                <h3 class="mt-3 text-2xl font-heading font-bold text-[#1D4ED8]">{{ $invitation->groom_name ?? 'Tobias Justin, S.Kom.' }}</h3>
                <p class="text-xs font-semibold uppercase tracking-wider text-blue-600 mt-1">Putra Dari:</p>
                <p class="text-xs text-slate-600 mt-0.5 max-w-xs">{{ $invitation->groom_parents ?? 'Bapak Ayah Justin & Ibu Ibu Justin' }}</p>
                @if(!empty($invitation->groom_instagram))
                <a href="https://instagram.com/{{ ltrim($invitation->groom_instagram, '@') }}" target="_blank" class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-medium border border-blue-200 hover:bg-blue-100 transition">
                    <span>@</span>{{ ltrim($invitation->groom_instagram, '@') }}
                </a>
                @endif
            </div>

            <!-- Mempelai Wanita -->
            <div class="flex flex-col items-center">
                <div class="relative w-56 h-56 flex items-center justify-center">
                    <div class="w-40 h-40 rounded-full overflow-hidden shadow-lg ring-4 ring-white">
                        @if(!empty($invitation->bride_photo))
                            <img src="{{ Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo) }}" alt="Mempelai Wanita" class="w-full h-full object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&auto=format&fit=crop&q=80" alt="Mempelai Wanita" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <img src="{{ asset('images/themes/ethereal-bloom/floral-frame-round.png') }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10">
                </div>
                <h3 class="mt-3 text-2xl font-heading font-bold text-[#1D4ED8]">{{ $invitation->bride_name ?? 'Sisca Kohl, S.E.' }}</h3>
                <p class="text-xs font-semibold uppercase tracking-wider text-blue-600 mt-1">Putri Dari:</p>
                <p class="text-xs text-slate-600 mt-0.5 max-w-xs">{{ $invitation->bride_parents ?? 'Bapak Ayah Sisca & Ibu Ibu Sisca' }}</p>
                @if(!empty($invitation->bride_instagram))
                <a href="https://instagram.com/{{ ltrim($invitation->bride_instagram, '@') }}" target="_blank" class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-medium border border-blue-200 hover:bg-blue-100 transition">
                    <span>@</span>{{ ltrim($invitation->bride_instagram, '@') }}
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- JADWAL ACARA (3 CARDS SEPERTI DI GAMBAR MOCKUP) -->
<section id="section-acara" class="py-20 px-4 text-center bg-white/60 backdrop-blur-sm">
    <div class="max-w-xl mx-auto space-y-10">
        <!-- Event 1: Resepsi Pernikahan -->
        <div class="space-y-2">
            <h3 class="text-4xl font-script text-[#1D4ED8]">Resepsi Pernikahan</h3>
            <p class="text-sm font-semibold text-slate-700">Anggara, 04 Maret 2025</p>
            <p class="text-xs text-slate-500">Jam Bebas</p>
            <p class="text-xs text-slate-600">{{ $invitation->venue ?? 'Rumah Justin di Jakarta' }}</p>
            <div class="pt-2">
                <a href="{{ $invitation->maps_url ?? '#' }}" target="_blank" class="inline-block px-4 py-1.5 rounded-lg border border-[#1D4ED8] text-[#1D4ED8] text-xs font-semibold hover:bg-[#1D4ED8] hover:text-white transition">
                    Maps Lokasi Acara
                </a>
            </div>
        </div>

        <!-- Garland Divider -->
        <div class="w-48 mx-auto opacity-75">
            <img src="{{ !empty($invitation->custom_ornament_header) ? (Str::startsWith($invitation->custom_ornament_header, ['http://', 'https://']) ? $invitation->custom_ornament_header : asset('storage/'.ltrim($invitation->custom_ornament_header, '/'))) : asset('images/themes/ethereal-bloom/floral-header-garland.png') }}" alt="" class="w-full h-auto object-contain">
        </div>

        <!-- Event 2: Akad Pernikahan -->
        <div class="space-y-2">
            <h3 class="text-4xl font-script text-[#1D4ED8]">Akad Pernikahan</h3>
            <p class="text-sm font-semibold text-slate-700">Rabu, 18 Februari 2026</p>
            <p class="text-xs text-slate-500">Pukul 02:39 WIB - 08:00 WIB</p>
            <p class="text-xs text-slate-600">{{ $invitation->akad_address ?? 'Jalan gunung batur, no 78, Denpasar, Bali' }}</p>
            <div class="pt-2">
                <a href="{{ $invitation->akad_maps_url ?? '#' }}" target="_blank" class="inline-block px-4 py-1.5 rounded-lg bg-emerald-600 text-white text-xs font-semibold hover:bg-emerald-700 transition">
                    Maps Lokasi Acara
                </a>
            </div>
        </div>

        <!-- Garland Divider -->
        <div class="w-48 mx-auto opacity-75">
            <img src="{{ !empty($invitation->custom_ornament_header) ? (Str::startsWith($invitation->custom_ornament_header, ['http://', 'https://']) ? $invitation->custom_ornament_header : asset('storage/'.ltrim($invitation->custom_ornament_header, '/'))) : asset('images/themes/ethereal-bloom/floral-header-garland.png') }}" alt="" class="w-full h-auto object-contain">
        </div>

        <!-- Event 3: Makan Malam -->
        <div class="space-y-2">
            <h3 class="text-4xl font-script text-[#1D4ED8]">Makan Malam</h3>
            <p class="text-sm font-semibold text-slate-700">Kamis, 15 Mei 2025</p>
            <p class="text-xs text-slate-500">Pukul 21:00 WIB Sampai Larut</p>
            <p class="text-xs text-slate-600">Restoran Makan Padang</p>
            <div class="pt-2">
                <a href="{{ $invitation->maps_url ?? '#' }}" target="_blank" class="inline-block px-4 py-1.5 rounded-lg border border-[#1D4ED8] text-[#1D4ED8] text-xs font-semibold hover:bg-[#1D4ED8] hover:text-white transition">
                    Maps Lokasi Acara
                </a>
            </div>
        </div>
    </div>
</section>

<!-- LOVE STORY SECTION -->
@if($invitation->show_love_story)
<section id="section-cerita" class="py-20 px-4 text-center">
    <div class="max-w-xl mx-auto">
        <p class="text-xs uppercase tracking-[0.3em] font-semibold text-blue-600 mb-1">SEBUAH KISAH</p>
        <h2 class="text-4xl sm:text-5xl font-script text-[#1D4ED8] mb-8">Our Story</h2>

        <div class="space-y-4 text-left">
            <div class="p-5 rounded-2xl bg-white/80 backdrop-blur-sm border border-blue-100 shadow-sm">
                <h4 class="text-base font-bold text-[#1D4ED8] mb-1">1. Pertemuan Di Kereta Api</h4>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Momen manis awal pertemuan kami di stasiun dan gerbong kereta api, obrolan singkat yang berlanjut menjadi ikatan yang abadi.
                </p>
            </div>
            <div class="p-5 rounded-2xl bg-white/80 backdrop-blur-sm border border-blue-100 shadow-sm">
                <h4 class="text-base font-bold text-[#1D4ED8] mb-1">2. Lanjut Ke Pelaminan</h4>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Setelah melalui suka dan duka bersama, kami mantap melangkah ke jenjang pernikahan yang suci ini.
                </p>
            </div>
        </div>
    </div>
</section>
@endif

<!-- GALERI FOTO SECTION -->
<section id="section-galeri" class="py-20 px-4 text-center bg-white/60 backdrop-blur-sm">
    <div class="max-w-3xl mx-auto">
        <p class="text-xs uppercase tracking-[0.3em] font-semibold text-blue-600 mb-1">OUR MOMENTS</p>
        <h2 class="text-4xl sm:text-5xl font-script text-[#1D4ED8] mb-10">Gallery</h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
            @php
                $galleryItems = !empty($invitation->photos) && $invitation->photos->count() > 0 ? $invitation->photos : collect([
                    (object)['path' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80'],
                    (object)['path' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80'],
                    (object)['path' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80'],
                    (object)['path' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80'],
                    (object)['path' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80'],
                    (object)['path' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=800&auto=format&fit=crop&q=80'],
                ]);
            @endphp
            @foreach($galleryItems as $photo)
            <div class="aspect-square rounded-2xl overflow-hidden shadow-md ring-2 ring-blue-100 hover:scale-[1.02] transition duration-300">
                <img src="{{ Str::startsWith($photo->path, ['http://', 'https://']) ? $photo->path : asset('storage/' . $photo->path) }}" alt="Gallery" class="w-full h-full object-cover">
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- TITIP HADIAH / TANDA KASIH SECTION -->
<section id="section-hadiah" class="py-20 px-4 text-center">
    <div class="max-w-xl mx-auto">
        <p class="text-xs uppercase tracking-[0.3em] font-semibold text-blue-600 mb-1">TANDA KASIH</p>
        <h2 class="text-4xl sm:text-5xl font-script text-[#1D4ED8] mb-4">Titip Hadiah</h2>
        <p class="text-xs text-slate-600 mb-8 max-w-md mx-auto leading-relaxed">
            Doa restu Anda merupakan hadiah terindah bagi kami. Namun jika Anda ingin memberikan tanda kasih secara digital, Anda dapat melalui rekening berikut:
        </p>

        <div class="space-y-4">
            <!-- Bank 1: BCA -->
            <div class="p-5 rounded-2xl bg-white/90 backdrop-blur-sm border border-blue-200 shadow-md flex flex-col items-center">
                <span class="text-xs uppercase tracking-wider font-bold text-[#1D4ED8]">Bank Central Asia (BCA)</span>
                <p class="text-xl font-mono font-bold text-slate-800 my-2">12345678</p>
                <p class="text-xs text-slate-500 mb-3">a/n Sisca Kohl</p>
                <button type="button" onclick="navigator.clipboard.writeText('12345678'); alert('Nomor rekening BCA berhasil disalin!');" class="px-4 py-1.5 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold border border-blue-300 hover:bg-blue-600 hover:text-white transition cursor-pointer">
                    Salin No. Rekening
                </button>
            </div>

            <!-- Bank 2: Sinarmas -->
            <div class="p-5 rounded-2xl bg-white/90 backdrop-blur-sm border border-blue-200 shadow-md flex flex-col items-center">
                <span class="text-xs uppercase tracking-wider font-bold text-[#1D4ED8]">Bank Sinarmas</span>
                <p class="text-xl font-mono font-bold text-slate-800 my-2">0982309823</p>
                <p class="text-xs text-slate-500 mb-3">a/n Tobias Justin</p>
                <button type="button" onclick="navigator.clipboard.writeText('0982309823'); alert('Nomor rekening Sinarmas berhasil disalin!');" class="px-4 py-1.5 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold border border-blue-300 hover:bg-blue-600 hover:text-white transition cursor-pointer">
                    Salin No. Rekening
                </button>
            </div>

            <!-- Bank 3: BRI -->
            <div class="p-5 rounded-2xl bg-white/90 backdrop-blur-sm border border-blue-200 shadow-md flex flex-col items-center">
                <span class="text-xs uppercase tracking-wider font-bold text-[#1D4ED8]">Bank BRI</span>
                <p class="text-xl font-mono font-bold text-slate-800 my-2">99787238</p>
                <p class="text-xs text-slate-500 mb-3">a/n Papanya Sisca</p>
                <button type="button" onclick="navigator.clipboard.writeText('99787238'); alert('Nomor rekening BRI berhasil disalin!');" class="px-4 py-1.5 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold border border-blue-300 hover:bg-blue-600 hover:text-white transition cursor-pointer">
                    Salin No. Rekening
                </button>
            </div>
        </div>
    </div>
</section>

<!-- RSVP & BUKU TAMU SECTION -->
<section id="section-rsvp" class="py-20 px-4 text-center bg-white/60 backdrop-blur-sm">
    <div class="max-w-xl mx-auto">
        <p class="text-xs uppercase tracking-[0.3em] font-semibold text-blue-600 mb-1">KONFIRMASI KEHADIRAN</p>
        <h2 class="text-4xl sm:text-5xl font-script text-[#1D4ED8] mb-6">RSVP & Ucapan</h2>

        <div class="p-6 rounded-2xl bg-white/90 backdrop-blur-sm border border-blue-200 shadow-md text-left">
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ $guest->name ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Nama Anda">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Konfirmasi Kehadiran</label>
                    <select name="attendance" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="hadir">Hadir</option>
                        <option value="tidak_hadir">Tidak Hadir</option>
                        <option value="ragu">Masih Ragu</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Pesan & Doa Restu</label>
                    <textarea name="message" rows="3" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Tulis ucapan dan doa Anda..."></textarea>
                </div>
                <button type="submit" class="w-full py-2.5 rounded-full bg-[#1D4ED8] text-white text-xs font-bold uppercase tracking-wider shadow-md hover:bg-[#1E40AF] transition">
                    Kirim Konfirmasi
                </button>
            </form>
        </div>
    </div>
</section>

<!-- CLOSING SECTION DENGAN BOTTOM FLORAL BICYCLE -->
<section id="section-penutup" class="relative pt-20 pb-28 px-4 text-center overflow-hidden">
    <div class="max-w-xl mx-auto space-y-4 relative z-10">
        <!-- Couple Portrait in Round Floral Frame -->
        <div class="relative w-48 h-48 mx-auto flex items-center justify-center">
            <div class="w-36 h-36 rounded-full overflow-hidden shadow-lg ring-4 ring-white">
                <img src="{{ $heroPhoto }}" alt="Closing" class="w-full h-full object-cover">
            </div>
            <img src="{{ asset('images/themes/ethereal-bloom/floral-frame-round.png') }}" alt="" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10">
        </div>

        <p class="text-xs text-slate-600 max-w-md mx-auto leading-relaxed pt-2">
            Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu kepada kedua mempelai.
        </p>

        <h3 class="text-3xl font-heading font-bold text-slate-800">Terima Kasih</h3>
        <p class="text-4xl font-script text-[#1D4ED8]">
            {{ $invitation->groom_nickname ?? 'Justin' }} & {{ $invitation->bride_nickname ?? 'Sisca' }}
        </p>
    </div>

    <!-- Floral Footer with Bicycle & Tree -->
    <div class="w-full max-w-md mx-auto mt-8 -mb-28 pointer-events-none">
        <img src="{{ asset('images/themes/ethereal-bloom/floral-footer-bicycle.png') }}" alt="" class="w-full h-auto object-contain">
    </div>
</section>
</div>
