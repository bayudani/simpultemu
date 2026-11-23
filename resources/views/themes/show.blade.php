@extends('layouts.app')

@section('title', $theme->name . ' - SimpulTemu Wedding')
@section('description', $theme->description)

@push('styles')
<style>
@keyframes float-slow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}
.animate-float-slow {
    animation: float-slow 3s ease-in-out infinite;
}
</style>
@endpush

@section('content')
@php
    $config = is_array($theme->theme_config) ? $theme->theme_config : (json_decode($theme->theme_config, true) ?? []);
    $primaryColor = $config['primary_color'] ?? ($config['colors']['primary'] ?? '#800000');
    $layout = $config['layout'] ?? 'vertical_stack';
@endphp

<div class="py-5 sm:py-8 lg:py-10 bg-[#F8FAFC] min-h-[calc(100vh-64px)] flex items-center">
    <div class="max-w-4xl lg:max-w-5xl mx-auto px-3.5 sm:px-6 lg:px-8 w-full">
        <!-- Breadcrumb / Back Link -->
        <div class="mb-3 sm:mb-4">
            <a href="{{ route('themes.index') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-slate-500 hover:text-[#FF2E3A] transition">
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                <span>Kembali ke Katalog Tema</span>
            </a>
        </div>

        <!-- 2-Column Responsive Card: Side-by-Side on Desktop, Stacked on Mobile -->
        <div class="bg-white border border-slate-200/90 rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row items-stretch">
            
            <!-- Left Column: Compact Smartphone Showcase -->
            <div class="w-full md:w-[42%] lg:w-[40%] p-4 sm:p-5 lg:p-6 bg-gradient-to-b from-slate-50 to-slate-100/70 flex flex-col items-center justify-center relative overflow-hidden shrink-0 border-b md:border-b-0 md:border-r border-slate-200/80">
                <div class="relative z-10 w-full flex justify-center py-1 sm:py-2">
                    @include('partials.theme-phone-mockup', ['theme' => $theme, 'size' => 'detail'])
                </div>
            </div>

            <!-- Right Column: Details & Actions -->
            <div class="w-full md:w-[58%] lg:w-[60%] p-4 sm:p-6 lg:p-7 flex flex-col justify-between">
                <div class="space-y-3 sm:space-y-4">
                    <!-- Title, Badge & Price Header -->
                    <div class="flex items-start justify-between gap-3 flex-wrap">
                        <div>
                            <div class="flex items-center gap-2 flex-wrap">
                                <h1 class="font-serif text-xl sm:text-2xl lg:text-3xl font-bold text-slate-900 leading-tight">
                                    {{ $theme->name }}
                                </h1>
                                @if($theme->isPremium())
                                    <span class="px-2.5 py-0.5 text-[10px] sm:text-xs font-semibold uppercase tracking-wider text-[#0284C7] bg-[#DBF6FF] border border-[#BAEAF8] rounded-full shadow-2xs">
                                        ★ Premium
                                    </span>
                                @else
                                    <span class="px-2.5 py-0.5 text-[10px] sm:text-xs font-semibold uppercase tracking-wider text-slate-700 bg-slate-100 border border-slate-200 rounded-full">
                                        Basic Gratis
                                    </span>
                                @endif
                            </div>
                            <div class="mt-2 flex items-center gap-2">
                                <span class="text-[11px] sm:text-xs text-slate-500">Tata Letak:</span>
                                <span class="text-[10.5px] sm:text-xs font-mono font-semibold px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 uppercase">
                                    {{ str_replace('_', ' ', $layout) }}
                                </span>
                            </div>
                        </div>

                        <!-- Price Tag -->
                        <div class="md:text-right shrink-0">
                            <span class="text-[10px] sm:text-xs text-slate-400 uppercase tracking-wider block font-semibold">Investasi</span>
                            <span class="font-serif text-2xl sm:text-3xl font-extrabold text-[#FF2E3A] leading-tight">
                                @if($theme->price > 0)
                                    Rp {{ number_format($theme->price, 0, ',', '.') }}
                                @else
                                    Gratis
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-xs sm:text-sm text-slate-600 font-light leading-relaxed">
                        {{ $theme->description }}
                    </p>

                    <!-- Feature Highlights -->
                    <div class="grid grid-cols-2 gap-2 pt-1 text-[11px] sm:text-xs text-slate-600">
                        <div class="flex items-center gap-1.5 p-2 rounded-xl bg-slate-50 border border-slate-100">
                            <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="truncate">Audio Real-Time</span>
                        </div>
                        <div class="flex items-center gap-1.5 p-2 rounded-xl bg-slate-50 border border-slate-100">
                            <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="truncate">Amplop &amp; Hadiah</span>
                        </div>
                        <div class="flex items-center gap-1.5 p-2 rounded-xl bg-slate-50 border border-slate-100">
                            <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="truncate">Buku Tamu &amp; RSVP</span>
                        </div>
                        <div class="flex items-center gap-1.5 p-2 rounded-xl bg-slate-50 border border-slate-100">
                            <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="truncate">Navigasi Peta Lokasi</span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons Footer -->
                <div class="pt-4 mt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center gap-2.5 sm:gap-3">
                    <button type="button" onclick="openThemeDemoModal({{ $theme->id }}, {{ json_encode($theme->name) }}, {{ json_encode($theme->tier) }}, {{ json_encode($theme->preset_music_label) }})" class="w-full sm:flex-1 py-2 sm:py-2.5 px-4 rounded-xl border border-slate-300 hover:border-[#FF2E3A] text-slate-700 hover:text-[#FF2E3A] hover:bg-rose-50/50 text-xs sm:text-sm font-semibold transition flex items-center justify-center gap-1.5 cursor-pointer shadow-2xs">
                        <svg class="w-4 h-4 text-slate-500 group-hover:text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <span>Lihat Demo Interaktif</span>
                    </button>

                    <div class="w-full sm:flex-1">
                        @auth
                            <a href="{{ route('dashboard.invitations.create', ['theme_id' => $theme->id]) }}" class="block w-full py-2 sm:py-2.5 px-4 rounded-xl bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-xs sm:text-sm font-semibold transition shadow-[0_4px_14px_rgba(255,46,58,0.25)] text-center">
                                Gunakan Tema Ini &rarr;
                            </a>
                        @else
                            <a href="{{ route('login') }}?redirect={{ urlencode(route('dashboard.invitations.create', ['theme_id' => $theme->id])) }}" class="block w-full py-2 sm:py-2.5 px-4 rounded-xl bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-xs sm:text-sm font-semibold transition shadow-[0_4px_14px_rgba(255,46,58,0.25)] text-center">
                                Gunakan Tema Ini &rarr;
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('partials.theme-demo-modal')
@endsection

@push('scripts')
<script src="{{ asset('js/dynamicThemeEngine.js') }}"></script>
<script>
// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeThemeDemoModal();
    }
});
</script>
@endpush
