{{-- Reusable Gift Section: Amplop Digital & Kirim Kado Fisik --}}
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
    <div class="max-w-4xl mx-auto text-center p-6 sm:p-12 rounded-3xl border border-[#E8DFC8] shadow-sm bg-[#FEFCEF] text-[#1F1F1F]">
        <!-- Section Header -->
        <span class="text-xs uppercase tracking-[0.3em] font-semibold block mb-2 text-[#8B3A1C]">WEDDING GIFT</span>
        <h2 class="text-3xl sm:text-4xl font-heading font-bold mb-4" style="color: {{ $primaryColor ?? '#800000' }};">Tanda Kasih</h2>
        <p class="text-xs sm:text-sm max-w-xl mx-auto mb-10 leading-relaxed font-sans text-stone-600">
            Doa restu Anda merupakan hadiah terindah bagi kami. Namun jika Anda bermaksud memberi tanda kasih secara digital maupun fisik, kami menyediakan informasi berikut:
        </p>

        <div class="grid grid-cols-1 {{ ($hasBank && $hasPhysicalGift) ? 'md:grid-cols-2' : 'max-w-md mx-auto' }} gap-6 sm:gap-8 items-stretch text-left">
            <!-- CARD 1: AMPLOP DIGITAL (TRANSFER BANK) -->
            @if($hasBank)
            <div class="p-6 sm:p-8 rounded-3xl border border-[#E8DFC8] shadow-sm flex flex-col justify-between relative overflow-hidden group bg-white text-stone-900 transition-all duration-300 hover:shadow-md">
                <div class="absolute -top-10 -right-10 w-28 h-28 rounded-full bg-amber-400/10 pointer-events-none blur-xl"></div>
                <div>
                    <div class="w-12 h-12 mb-4 rounded-2xl flex items-center justify-center bg-amber-500/10 text-amber-700 shadow-xs">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                    </div>
                    <span class="text-[11px] uppercase tracking-wider font-semibold block text-stone-500 mb-1 font-sans">Amplop Digital</span>
                    <h3 class="text-xl font-heading font-bold mb-3 text-stone-900">{{ $bankName }}</h3>
                    <div class="p-3.5 rounded-2xl bg-[#FAF8F5] border border-[#E8DFC8] font-mono text-base sm:text-xl font-bold tracking-wider my-2 text-stone-900 select-all shadow-inner flex items-center justify-between">
                        <span id="bankAccNumberVal">{{ $accNumber ?? '1234567890' }}</span>
                    </div>
                    <p class="text-xs text-stone-600 mt-1 font-sans">a.n. <span class="font-bold text-stone-900">{{ $accHolder }}</span></p>
                </div>
                <div class="mt-6 pt-4 border-t border-[#E8DFC8]">
                    <button type="button" onclick="copyInvitationText('{{ $accNumber ?? '1234567890' }}', 'Nomor rekening {{ $bankName }} berhasil disalin!')" class="w-full py-3 px-4 rounded-xl text-xs font-semibold text-white transition-all duration-200 flex items-center justify-center gap-2 hover:scale-[1.02] hover:brightness-110 active:scale-95 cursor-pointer shadow-md" style="background-color: {{ $primaryColor ?? '#800000' }};">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
                        </svg>
                        <span>Salin Nomor Rekening</span>
                    </button>
                </div>
            </div>
            @endif

            <!-- CARD 2: KIRIM KADO FISIK -->
            @if($hasPhysicalGift)
            <div class="p-6 sm:p-8 rounded-3xl border border-[#E8DFC8] shadow-sm flex flex-col justify-between relative overflow-hidden group bg-white text-stone-900 transition-all duration-300 hover:shadow-md">
                <div class="absolute -top-10 -right-10 w-28 h-28 rounded-full bg-emerald-400/10 pointer-events-none blur-xl"></div>
                <div>
                    <div class="w-12 h-12 mb-4 rounded-2xl flex items-center justify-center bg-amber-500/10 text-amber-700 shadow-xs">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <span class="text-[11px] uppercase tracking-wider font-semibold block text-stone-500 mb-1 font-sans">Kirim Kado Fisik</span>
                    <h3 class="text-xl font-heading font-bold mb-2 text-stone-900">Alamat Pengiriman</h3>
                    <div class="text-xs sm:text-sm text-stone-700 space-y-1 mb-2">
                        <p class="font-bold text-stone-900">{{ $recipient }}</p>
                        @if($phone)
                        <p class="text-stone-500 font-mono text-xs">No. Telp / WA: {{ $phone }}</p>
                        @endif
                    </div>
                    <div class="p-3.5 rounded-2xl bg-[#FAF8F5] border border-[#E8DFC8] text-xs sm:text-sm text-stone-800 leading-relaxed text-left shadow-inner">
                        {{ $address }}
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-[#E8DFC8] flex flex-col sm:flex-row gap-2.5">
                    <button type="button" onclick="copyInvitationText('{{ addslashes($address) }}', 'Alamat pengiriman kado berhasil disalin!')" class="flex-1 py-3 px-4 rounded-xl text-xs font-semibold text-white transition-all duration-200 flex items-center justify-center gap-1.5 hover:scale-[1.02] hover:brightness-110 active:scale-95 cursor-pointer shadow-md" style="background-color: {{ $primaryColor ?? '#800000' }};">
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
