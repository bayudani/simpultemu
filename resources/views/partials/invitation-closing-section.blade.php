{{-- Reusable Dynamic Closing Section for All 20 Themes --}}
@php
    $closingTitle = $invitation->closing_title ?: 'Terima Kasih';
    $closingMessage = $invitation->closing_message ?: 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.';
    $closingSignature = $invitation->closing_signature ?: ('Kami yang berbahagia, ' . $invitation->groom_nickname . ' & ' . $invitation->bride_nickname . ' Beserta Seluruh Keluarga Besar');
@endphp

<footer class="py-16 sm:py-20 px-4 text-center pb-24">
    <div class="max-w-3xl mx-auto bg-[#FEFCEF] rounded-3xl p-6 sm:p-12 border border-[#E8DFC8] shadow-sm text-center text-[#1F1F1F] space-y-6">
        <!-- Elegant Vector Ornament (NO EMOJI) -->
        <div class="w-10 h-10 mx-auto text-[#8B3A1C]">
            <svg class="w-full h-full" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
        </div>

        <h2 class="text-3xl sm:text-4xl font-heading font-bold" style="color: {{ $primaryColor ?? '#800000' }};">
            {{ $closingTitle }}
        </h2>

        <p class="text-sm sm:text-base leading-relaxed text-stone-700 max-w-xl mx-auto font-light font-sans">
            {{ $closingMessage }}
        </p>

        <div class="pt-4 space-y-2">
            <p class="text-xs uppercase tracking-[0.25em] font-semibold text-[#8B3A1C] font-sans">
                Salam Hangat Kami
            </p>
            <p class="text-xl sm:text-2xl font-heading font-bold" style="color: {{ $primaryColor ?? '#800000' }};">
                {{ $closingSignature }}
            </p>
        </div>

        <div class="pt-8 text-[11px] text-stone-500 font-sans border-t border-[#E8DFC8]/60">
            <p>&copy; {{ date('Y') }} SimpulTemu • Platform Undangan Digital Eksklusif</p>
        </div>
    </div>
</footer>

