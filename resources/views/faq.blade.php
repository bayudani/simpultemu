@extends('layouts.app')

@section('title', 'Pertanyaan Umum (FAQ) Undangan Pernikahan Digital - SimpulTemu')
@section('description', 'Jawaban lengkap cara membuat undangan pernikahan digital gratis, pembagian link nama tamu via WhatsApp, sistem RSVP, musik latar, amplop digital, dan pembayaran di SimpulTemu.')
@section('keywords', 'faq undangan pernikahan digital, cara buat undangan pernikahan online, tanya jawab undangan digital gratis, cara kirim undangan whatsapp, rsvp undangan nikah, simpultemu')

@php
$faqs = [
    [
        'q' => 'Apakah SimpulTemu benar-benar gratis?',
        'a' => 'Ya, paket Basic Gratis berlaku untuk undangan pertama setiap akun dengan 10 pilihan tema Basic, kuota 5 nama tamu, dan 5 pilihan lagu beserta fitur lengkap RSVP, ucapan doa, hitung mundur, Google Maps, dan amplop digital. Setelah undangan pertama selesai dibuat dan diterbitkan, pembuatan undangan kedua dan seterusnya dikenakan biaya Rp 10.000 per undangan (penghapusan undangan sebelumnya tidak mengembalikan kuota gratis).'
    ],
    [
        'q' => 'Apa perbedaan paket Basic, Add-On, dan Premium?',
        'a' => 'Paket Basic (Gratis untuk 1 undangan pertama, lalu Rp 10.000/undangan untuk undangan kedua dst) memberikan 10 tema estetik dengan kuota 5 nama tamu dan 5 pilihan lagu. Paket Add-On berlaku per satu undangan tema Basic untuk menambah kuota (Add-On 1: total 12 tamu & 10 lagu seharga Rp 17.000; Add-On 2: total 17 tamu & 20 lagu seharga Rp 25.000). Paket Premium (Rp 59.000 per undangan) membuka seluruh 20 tema eksklusif, nama tamu tak terbatas, lagu tak terbatas termasuk upload musik sendiri, dan seluruh fitur Premium untuk undangan tersebut.'
    ],
    [
        'q' => 'Bagaimana cara mengirimkan undangan ke para tamu?',
        'a' => 'Cukup tambahkan daftar nama tamu di dashboard. Sistem akan secara otomatis mengenerate tautan personal unik untuk masing-masing tamu (misal: simpultemu.my.id/undangan/nama-mempelai/t/token?to=Nama+Tamu). Anda dapat langsung mengklik tombol bagikan via WhatsApp dengan draft pesan otomatis yang sudah tersusun rapi.'
    ],
    [
        'q' => 'Apakah setiap tamu mendapatkan link dengan nama mereka sendiri?',
        'a' => 'Tentu! Setiap tamu memiliki tautan personal yang menampilkan nama mereka secara eksklusif di layar pembuka undangan ("Kepada Yth: Bpk/Ibu [Nama Tamu]"). Hal ini memberikan kesan hangat, formal, dan sangat menghargai tamu yang Anda undang.'
    ],
    [
        'q' => 'Berapa lama masa aktif undangan digital saya?',
        'a' => 'Undangan digital Anda aktif selamanya tanpa batasan durasi atau biaya langganan bulanan. Anda dan keluarga dapat membuka kembali undangan ini kapan pun sebagai kenang-kenangan digital yang abadi.'
    ],
    [
        'q' => 'Bisakah saya mengedit data undangan setelah dipublikasikan?',
        'a' => 'Bisa dan bebas revisi kapan saja! Jika terdapat perubahan jam acara, lokasi gedung, atau nomor rekening hadiah, Anda cukup mengupdate data dari dashboard dan seluruh perubahan akan langsung sinkron secara real-time.'
    ],
    [
        'q' => 'Bagaimana sistem konfirmasi kehadiran (RSVP) bekerja?',
        'a' => 'Di halaman undangan terdapat formulir RSVP interaktif. Tamu dapat memilih konfirmasi "Hadir" atau "Tidak Hadir", memasukkan jumlah tamu yang mendampingi, serta menuliskan doa restu. Seluruh rekapitulasi RSVP masuk otomatis ke dashboard admin Anda.'
    ],
    [
        'q' => 'Apakah undangan nyaman dibuka di berbagai tipe smartphone?',
        'a' => 'Sangat nyaman. Seluruh tema SimpulTemu dirancang mobile-first dan responsif dengan rasio layar optimal untuk smartphone Android maupun iPhone, serta tetap tampil anggun di tablet dan laptop.'
    ],
    [
        'q' => 'Bisakah saya menambahkan lagu latar (background music) favorit?',
        'a' => 'Tentu bisa! Pada tema Basic gratis Anda dapat memilih dari 5 lagu romantis (dan hingga 20 lagu lewat paket Add-On). Sedangkan pada Paket Premium, Anda bebas memilih dari seluruh pustaka lagu atau mengunggah lagu kustom favorit Anda sendiri.'
    ],
    [
        'q' => 'Bagaimana alur pembayaran untuk paket Add-On atau Premium?',
        'a' => 'Pembayaran dilakukan sekali bayar per undangan tanpa biaya langganan bulanan. Didukung oleh integrasi gateway pembayaran Duitku Pop-up instan via QRIS, Virtual Account bank, dan e-wallet yang langsung aktif otomatis seketika setelah pembayaran terverifikasi.'
    ],
];

$faqSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array_map(fn ($item) => [
        '@type' => 'Question',
        'name' => $item['q'],
        'acceptedAnswer' => [
            '@type' => 'Answer',
            'text' => $item['a'],
        ],
    ], $faqs),
];
@endphp

@push('structured_data')
<script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
<div class="relative pt-24 sm:pt-32 pb-16 sm:pb-24 min-h-screen overflow-hidden" style="background-color: #F2FBFF;">
    @include('partials.light-blue-square-grid')

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-14 space-y-4">
            <span class="inline-block px-4 py-1.5 rounded-full text-xs font-semibold tracking-widest uppercase bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                Pusat Bantuan & Edukasi
            </span>
            <h1 class="font-serif text-3xl sm:text-5xl font-bold tracking-tight" style="color: #162E54;">
                Pertanyaan yang <span class="italic text-[#FF2E3A]">Sering Diajukan</span>
            </h1>
            <p class="font-sans text-slate-600 text-base sm:text-lg font-light leading-relaxed max-w-2xl mx-auto">
                Temukan jawaban lengkap seputar cara pembuatan, fitur undangan, pengelolaan tamu, dan paket SimpulTemu.
            </p>
        </div>

        <!-- Interactive Accordion List -->
        <div class="space-y-4" id="faq-accordion">

            @foreach($faqs as $index => $faq)
            <div class="faq-item bg-white rounded-2xl border border-slate-200 shadow-sm hover:border-[#FF2E3A]/40 transition-all duration-300 overflow-hidden">
                <button
                    type="button"
                    class="faq-toggle w-full flex items-center justify-between p-5 sm:p-6 text-left focus:outline-none transition-colors duration-200"
                    onclick="toggleFaq({{ $index }})"
                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                >
                    <span class="font-serif text-base sm:text-lg font-semibold text-slate-900 pr-4">
                        {{ $faq['q'] }}
                    </span>
                    <span class="faq-icon flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center text-sm transition-transform duration-300 {{ $index === 0 ? 'rotate-180 bg-[#FF2E3A] text-white' : 'bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                        </svg>
                    </span>
                </button>
                <div
                    id="faq-content-{{ $index }}"
                    class="faq-content px-5 sm:px-6 pb-6 pt-1 text-sm sm:text-base text-slate-600 font-light leading-relaxed border-t border-slate-100 {{ $index === 0 ? 'block' : 'hidden' }}"
                >
                    <p>{{ $faq['a'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Help CTA Card wrapper -->
        <div class="mt-14 p-8 sm:p-10 rounded-3xl bg-white border border-slate-200 text-center space-y-5 shadow-sm text-slate-900">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-[#DBF6FF] border border-[#BAEAF8] flex items-center justify-center text-[#FF2E3A] shadow-sm">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0zm4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0zm4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 1 0-7.25-3.667L3 21l3.667-1.75A8.96 8.96 0 0 0 12 21z"/>
                </svg>
            </div>
            <div class="space-y-2">
                <h3 class="font-serif text-2xl sm:text-3xl font-bold text-slate-900">
                    Masih Memiliki Pertanyaan Lain?
                </h3>
                <p class="text-sm sm:text-base text-slate-600 font-light max-w-lg mx-auto">
                    Tim dukungan SimpulTemu siap membantu merencanakan undangan pernikahan impian Anda kapan saja.
                </p>
            </div>
            <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a
                    href="mailto:simpultemu2026@gmail.com"
                    class="px-8 py-3 rounded-full text-sm font-semibold border border-slate-300 text-slate-700 hover:border-[#FF2E3A] hover:text-[#FF2E3A] hover:bg-[#DBF6FF]/30 transition-all duration-300 shadow-sm flex items-center gap-2"
                >
                    <svg class="w-4 h-4 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Email Customer Care
                </a>
                <a
                    href="https://instagram.com/simpultemu.my.id"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="px-8 py-3 rounded-full text-sm font-semibold border border-slate-300 text-slate-700 hover:border-[#FF2E3A] hover:text-[#FF2E3A] hover:bg-[#FFE4E6]/40 transition-all duration-300 shadow-sm flex items-center gap-2"
                >
                    <svg class="w-4 h-4 text-[#FF2E3A]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                    Instagram
                </a>
                <a
                    href="https://wa.me/6285113272182"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="px-8 py-3 rounded-full text-sm font-semibold border border-slate-300 text-slate-700 hover:border-[#25D366] hover:text-[#25D366] hover:bg-[#DCFCE7]/40 transition-all duration-300 shadow-sm flex items-center gap-2"
                >
                    <svg class="w-4 h-4 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    WhatsApp (085113272182)
                </a>
                <a
                    href="{{ route('register') }}"
                    class="px-8 py-3 rounded-full text-sm font-semibold text-white bg-[#FF2E3A] hover:bg-[#E01E2A] transition-all duration-300 shadow-[0_4px_14px_rgba(255,46,58,0.25)]"
                >
                    Mulai Buat Undangan Gratis
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function toggleFaq(index) {
    const targetContent = document.getElementById('faq-content-' + index);
    const targetButton = targetContent.previousElementSibling;
    const targetIcon = targetButton.querySelector('.faq-icon');

    const isCurrentlyOpen = !targetContent.classList.contains('hidden');

    if (isCurrentlyOpen) {
        targetContent.classList.add('hidden');
        targetIcon.classList.remove('rotate-180', 'bg-[#FF2E3A]', 'text-white');
        targetIcon.classList.add('bg-[#DBF6FF]', 'text-[#0284C7]', 'border', 'border-[#BAEAF8]');
        targetButton.setAttribute('aria-expanded', 'false');
    } else {
        targetContent.classList.remove('hidden');
        targetIcon.classList.remove('bg-[#DBF6FF]', 'text-[#0284C7]', 'border', 'border-[#BAEAF8]');
        targetIcon.classList.add('rotate-180', 'bg-[#FF2E3A]', 'text-white');
        targetButton.setAttribute('aria-expanded', 'true');
    }
}
</script>
@endsection
