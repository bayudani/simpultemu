@php $invitation = $invitation ?? new \App\Models\Invitation(); @endphp
@extends('layouts.dashboard')

@section('title', isset($invitation) ? 'Edit Undangan - ' . $invitation->groom_nickname . ' & ' . $invitation->bride_nickname : 'Editor Undangan')
@section('container_max_width', 'max-w-[1680px] w-full')

@push('styles')
<style>
/* Keyframe Animations untuk Ornamen Dynamic Multi-Theme Engine */
@keyframes gentle-sway {
    0%, 100% { transform: rotate(-3deg); }
    50% { transform: rotate(3deg); }
}
.animate-gentle-sway {
    animation: gentle-sway 3.5s ease-in-out infinite;
}

@keyframes floating-leaf {
    0% { transform: translateY(-4px) rotate(-2deg); opacity: 0.8; }
    50% { transform: translateY(5px) rotate(3deg); opacity: 1; }
    100% { transform: translateY(-4px) rotate(-2deg); opacity: 0.8; }
}
.animate-floating-leaf {
    animation: floating-leaf 4s ease-in-out infinite;
}

@keyframes shimmer-gold {
    0% { filter: drop-shadow(0 0 1px rgba(234,179,8,0.3)); opacity: 0.75; }
    50% { filter: drop-shadow(0 0 6px rgba(250,204,21,0.95)); opacity: 1; }
    100% { filter: drop-shadow(0 0 1px rgba(234,179,8,0.3)); opacity: 0.75; }
}
.animate-shimmer-gold {
    animation: shimmer-gold 2.5s ease-in-out infinite;
}

@keyframes sparkle {
    0%, 100% { opacity: 0.4; transform: scale(0.96); }
    50% { opacity: 1; transform: scale(1.06); }
}
.animate-sparkle {
    animation: sparkle 2s ease-in-out infinite;
}

@keyframes float-slow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}
.animate-float-slow {
    animation: float-slow 3s ease-in-out infinite;
}

@keyframes pulse-soft {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.03); }
}
.animate-pulse-soft {
    animation: pulse-soft 2.5s ease-in-out infinite;
}

/* Responsive Phone Mockup Scaler for Multi-Column Grid in Editor */
.catalog-phone-mockup {
    transform-origin: top center;
    transition: transform 0.3s ease;
    transform: scale(0.55);
    margin-bottom: -155px;
}
@media (min-width: 480px) {
    .catalog-phone-mockup {
        transform: scale(0.60);
        margin-bottom: -138px;
    }
}
@media (min-width: 640px) {
    .catalog-phone-mockup {
        transform: scale(0.64);
        margin-bottom: -125px;
    }
}
@media (min-width: 1024px) {
    .catalog-phone-mockup {
        transform: scale(0.66);
        margin-bottom: -118px;
    }
}
@media (min-width: 1280px) {
    .catalog-phone-mockup {
        transform: scale(0.68);
        margin-bottom: -110px;
    }
}
@media (min-width: 1536px) {
    .catalog-phone-mockup {
        transform: scale(0.72);
        margin-bottom: -96px;
    }
}
</style>
@endpush

@section('content')
<!-- Header & Form Actions Bar -->
<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <div class="flex items-center gap-2 mb-1">
            <a href="{{ route('dashboard.invitations.index') }}" class="text-xs font-semibold text-[#FF2E3A] hover:underline flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Undangan Saya
            </a>
            <span class="text-slate-300">•</span>
            <span class="text-xs font-medium text-slate-500">Edit Draf & Publikasi</span>
        </div>
        <h1 class="font-serif text-2xl sm:text-3xl font-bold text-slate-900">
            {{ isset($invitation) && $invitation->exists ? 'Edit Undangan: ' . $invitation->groom_nickname . ' & ' . $invitation->bride_nickname : 'Buat Undangan Baru' }}
        </h1>
        <p class="text-xs sm:text-sm text-slate-500 mt-0.5">
            Perbarui informasi dan sesuaikan detail undangan pernikahan Anda.
        </p>
    </div>

    <!-- Quick Top Action Buttons -->
    <div class="grid grid-cols-3 gap-1.5 sm:flex sm:items-center sm:gap-2.5 w-full sm:w-auto">
        <button type="button" id="btn-preview-invitation" onclick="openPreviewInvitation()" class="px-2 sm:px-4 py-2 sm:py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 text-[11px] sm:text-xs font-semibold transition shadow-xs flex items-center justify-center gap-1 sm:gap-1.5 cursor-pointer text-center" title="Lihat pratinjau langsung di tab baru">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <span class="truncate">
                <span class="sm:hidden">Pratinjau</span>
                <span class="hidden sm:inline">Pratinjau Undangan</span>
            </span>
        </button>

        <button type="button" onclick="submitFormWithAction('save')" class="px-2 sm:px-4 py-2 sm:py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 text-[11px] sm:text-xs font-semibold transition shadow-xs flex items-center justify-center gap-1 sm:gap-1.5 cursor-pointer text-center">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
            </svg>
            <span class="truncate">
                @if(isset($invitation) && $invitation->exists && $invitation->isPublished())
                    <span class="sm:hidden">Simpan</span>
                    <span class="hidden sm:inline">Simpan Perubahan</span>
                @else
                    <span>Simpan Draf</span>
                @endif
            </span>
        </button>

        @if(isset($invitation) && $invitation->exists && $invitation->isPublished())
        <a href="{{ route('invitation.show', $invitation->slug) }}" target="_blank" class="px-2 sm:px-5 py-2 sm:py-2.5 rounded-xl text-white bg-[#1E3A5F] hover:bg-[#162D4A] shadow-[0_4px_14px_rgba(30,58,95,0.25)] text-[11px] sm:text-xs font-semibold transition flex items-center justify-center gap-1 sm:gap-1.5 cursor-pointer text-center" title="Buka tautan website publik undangan ini">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
            <span class="truncate">
                <span class="sm:hidden">Buka Link</span>
                <span class="hidden sm:inline">Buka Undangan Publik</span>
            </span>
        </a>
        @else
        <button type="button" onclick="submitFormWithAction('publish')" class="px-2 sm:px-5 py-2 sm:py-2.5 rounded-xl text-white bg-[#FF2E3A] hover:bg-[#E01E2A] text-white shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:scale-[1.01] text-[11px] sm:text-xs font-semibold transition flex items-center justify-center gap-1 sm:gap-1.5 cursor-pointer text-center">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span class="truncate">
                <span class="sm:hidden">Publikasi</span>
                <span class="hidden sm:inline">Publikasikan Undangan</span>
            </span>
        </button>
        @endif
    </div>
</div>

<!-- Form Builder & Live Mockup Container -->
<form action="{{ isset($invitation) && $invitation->exists ? route('dashboard.invitations.update', $invitation) : route('dashboard.invitations.store') }}" method="POST" enctype="multipart/form-data" id="invitationForm">
    @csrf
    @if(isset($invitation) && $invitation->exists)
        @method('PUT')
    @endif
    <input type="hidden" name="action" id="formActionInput" value="draft">

    <!-- ================= MULTI-STEP WIZARD FORM BUILDER ================= -->
    <div class="w-full max-w-[1680px] mx-auto space-y-6">
            
            <!-- ================= BILAH NAVIGASI LANGKAH WIZARD (STEPPER BAR) ================= -->
            <div class="bg-white rounded-2xl border border-[#E7E0D6] p-4 sm:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)]">
                <!-- Stepper Header Info -->
                <div class="flex items-center justify-between pb-3 mb-4 border-b border-[#E7E0D6]/70">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#FF2E3A] bg-amber-100/80 px-2.5 py-0.5 rounded-full">
                            Multi-Step Wizard
                        </span>
                        <h2 id="current-step-title" class="font-serif text-base sm:text-lg font-bold text-stone-900 mt-1">
                            Langkah 1: Pilih Tema Undangan
                        </h2>
                    </div>
                    <div class="text-right">
                        <span class="text-xs font-semibold text-stone-500">Progres Pengisian</span>
                        <p id="current-step-counter" class="font-mono text-sm font-bold text-[#FF2E3A]">
                            1 / 6
                        </p>
                    </div>
                </div>

                <!-- Stepper Circles & Connectors (Scrollable on small screens with arrow navigation) -->
                <div class="relative flex items-center gap-1.5 sm:gap-2">
                    <!-- Left Arrow Button (Mobile only) -->
                    <button type="button" onclick="scrollStepper('left')" id="stepper-arrow-left" 
                            class="w-8 h-8 rounded-full bg-white border border-stone-200 shadow-xs flex sm:hidden items-center justify-center text-stone-600 hover:text-[#FF2E3A] hover:border-[#FF2E3A] active:scale-95 transition cursor-pointer shrink-0 z-20" 
                            title="Langkah Sebelumnya">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                    </button>

                    <!-- Scrollable Stepper Track -->
                    <div id="stepper-scroll-container" class="overflow-x-auto scroll-smooth py-1 px-1 touch-pan-x flex-1 scrollbar-none" style="-webkit-overflow-scrolling: touch; touch-action: pan-x;">
                        <div class="flex items-center justify-between min-w-[560px] sm:min-w-0 relative px-2">
                            <!-- Background connecting line across all steps -->
                            <div class="absolute left-6 right-6 top-5 -translate-y-1/2 h-1 bg-stone-200 z-0"></div>
                            <!-- Dynamic active progress bar overlay -->
                            <div id="stepper-progress-line" class="absolute left-6 top-5 -translate-y-1/2 h-1 bg-[#FF2E3A] z-0 transition-all duration-300" style="width: 0%;"></div>

                            <!-- Step 1 Button -->
                            <button type="button" onclick="goToStep(1)" id="step-btn-1" class="step-nav-btn relative z-10 flex flex-col items-center group cursor-pointer focus:outline-none shrink-0 sm:shrink">
                                <div id="step-circle-1" class="w-10 h-10 rounded-xl bg-[#FF2E3A] text-white flex items-center justify-center font-bold text-sm shadow-md ring-4 ring-[#FF2E3A]/20 transition-all duration-200">
                                    <span id="step-num-1">1</span>
                                    <svg id="step-check-1" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span id="step-label-1" class="text-[11px] font-bold text-[#FF2E3A] mt-2 transition text-center whitespace-nowrap">
                                    Pilih Tema
                                </span>
                            </button>

                            <!-- Step 2 Button -->
                            <button type="button" onclick="goToStep(2)" id="step-btn-2" class="step-nav-btn relative z-10 flex flex-col items-center group cursor-pointer focus:outline-none shrink-0 sm:shrink">
                                <div id="step-circle-2" class="w-10 h-10 rounded-xl bg-stone-100 text-stone-500 border border-stone-300 flex items-center justify-center font-bold text-sm transition-all duration-200 group-hover:bg-stone-200">
                                    <span id="step-num-2">2</span>
                                    <svg id="step-check-2" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span id="step-label-2" class="text-[11px] font-medium text-stone-500 mt-2 transition text-center whitespace-nowrap">
                                    Header &amp; Foto Tema
                                </span>
                            </button>

                            <!-- Step 3 Button -->
                            <button type="button" onclick="goToStep(3)" id="step-btn-3" class="step-nav-btn relative z-10 flex flex-col items-center group cursor-pointer focus:outline-none shrink-0 sm:shrink">
                                <div id="step-circle-3" class="w-10 h-10 rounded-xl bg-stone-100 text-stone-500 border border-stone-300 flex items-center justify-center font-bold text-sm transition-all duration-200 group-hover:bg-stone-200">
                                    <span id="step-num-3">3</span>
                                    <svg id="step-check-3" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span id="step-label-3" class="text-[11px] font-medium text-stone-500 mt-2 transition text-center whitespace-nowrap">
                                    Data Mempelai
                                </span>
                            </button>

                            <!-- Step 4 Button -->
                            <button type="button" onclick="goToStep(4)" id="step-btn-4" class="step-nav-btn relative z-10 flex flex-col items-center group cursor-pointer focus:outline-none shrink-0 sm:shrink">
                                <div id="step-circle-4" class="w-10 h-10 rounded-xl bg-stone-100 text-stone-500 border border-stone-300 flex items-center justify-center font-bold text-sm transition-all duration-200 group-hover:bg-stone-200">
                                    <span id="step-num-4">4</span>
                                    <svg id="step-check-4" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span id="step-label-4" class="text-[11px] font-medium text-stone-500 mt-2 transition text-center whitespace-nowrap">
                                    Acara
                                </span>
                            </button>

                            <!-- Step 5 Button -->
                            <button type="button" onclick="goToStep(5)" id="step-btn-5" class="step-nav-btn relative z-10 flex flex-col items-center group cursor-pointer focus:outline-none shrink-0 sm:shrink">
                                <div id="step-circle-5" class="w-10 h-10 rounded-xl bg-stone-100 text-stone-500 border border-stone-300 flex items-center justify-center font-bold text-sm transition-all duration-200 group-hover:bg-stone-200">
                                    <span id="step-num-5">5</span>
                                    <svg id="step-check-5" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span id="step-label-5" class="text-[11px] font-medium text-stone-500 mt-2 transition text-center whitespace-nowrap">
                                    Fitur & Kado
                                </span>
                            </button>

                            <!-- Step 6 Button -->
                            <button type="button" onclick="goToStep(6)" id="step-btn-6" class="step-nav-btn relative z-10 flex flex-col items-center group cursor-pointer focus:outline-none shrink-0 sm:shrink">
                                <div id="step-circle-6" class="w-10 h-10 rounded-xl bg-stone-100 text-stone-500 border border-stone-300 flex items-center justify-center font-bold text-sm transition-all duration-200 group-hover:bg-stone-200">
                                    <span id="step-num-6">6</span>
                                    <svg id="step-check-6" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span id="step-label-6" class="text-[11px] font-medium text-stone-500 mt-2 transition text-center whitespace-nowrap">
                                    Sebar & Tamu
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Right Arrow Button (Mobile only) -->
                    <button type="button" onclick="scrollStepper('right')" id="stepper-arrow-right" 
                            class="w-8 h-8 rounded-full bg-white border border-stone-200 shadow-xs flex sm:hidden items-center justify-center text-stone-600 hover:text-[#FF2E3A] hover:border-[#FF2E3A] active:scale-95 transition cursor-pointer shrink-0 z-20" 
                            title="Langkah Berikutnya">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

            <!-- ================= STEP 1: PILIH TEMA ================= -->
            <div id="step-content-1" class="wizard-step-pane space-y-6">
                <div class="bg-white rounded-2xl border border-[#E7E0D6] p-3 sm:p-4.5 lg:p-5 shadow-[0_4px_20px_rgba(0,0,0,0.02)] space-y-4 sm:space-y-5">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5">
                        <div class="flex items-center gap-2.5 sm:gap-3">
                            <span class="w-7 h-7 sm:w-8 sm:h-8 rounded-xl bg-amber-100 text-[#FF2E3A] flex items-center justify-center font-bold text-xs sm:text-sm shrink-0">1</span>
                            <div>
                                <h2 class="font-serif text-base sm:text-lg font-bold text-stone-900">Pilih Tema Undangan (20 Tema)</h2>
                                <p class="text-[11px] sm:text-xs text-stone-500">Pilih salah satu dari 20 tema visual eksklusif untuk desain undangan pernikahan Anda</p>
                            </div>
                        </div>
                        <!-- Filter Tabs -->
                        <div class="flex items-center gap-1 p-1 bg-stone-100 rounded-xl text-[11px] sm:text-xs overflow-x-auto scrollbar-none">
                            <button type="button" onclick="filterThemes('all')" id="tab-all" class="theme-tab-btn px-2.5 sm:px-3 py-1 rounded-lg font-semibold bg-white text-stone-900 shadow-xs transition whitespace-nowrap">Semua ({{ $themes->count() }})</button>
                            <button type="button" onclick="filterThemes('basic')" id="tab-basic" class="theme-tab-btn px-2.5 sm:px-3 py-1 rounded-lg font-semibold text-stone-600 hover:text-stone-900 transition whitespace-nowrap">Basic Gratis (10)</button>
                            <button type="button" onclick="filterThemes('premium')" id="tab-premium" class="theme-tab-btn px-2.5 sm:px-3 py-1 rounded-lg font-semibold text-stone-600 hover:text-stone-900 transition whitespace-nowrap">Premium (10)</button>
                        </div>
                    </div>

                    <!-- Banner Alert jika memilih Tema Premium -->
                    <div id="premium-theme-notice-banner" class="hidden p-3.5 sm:p-4 rounded-2xl bg-gradient-to-r from-amber-50 via-rose-50 to-orange-50 border border-amber-300 text-amber-950 flex flex-col sm:flex-row sm:items-center justify-between gap-3 shadow-2xs transition-all duration-300">
                        <div class="flex items-start gap-2.5">
                            <span class="w-8 h-8 rounded-xl bg-amber-500 text-white flex items-center justify-center font-bold shrink-0 shadow-xs mt-0.5">
                                ⭐
                            </span>
                            <div>
                                <h4 class="text-xs sm:text-sm font-bold text-slate-900" id="premium-banner-title">Tema Premium Serenade Terpilih (Rp 59.000 / undangan)</h4>
                                <p class="text-[11px] sm:text-xs text-slate-600 mt-0.5">Termasuk tamu undangan tanpa batas (unlimited), pemutar musik otomatis, & galeri foto eksklusif.</p>
                            </div>
                        </div>
                        <button type="button" onclick="triggerEditorPremiumUpgrade()" id="btn-editor-pay-premium" class="px-4 py-2 rounded-xl bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-xs font-bold shadow-xs transition flex items-center justify-center gap-1.5 shrink-0 cursor-pointer">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg>
                            <span>Beli &amp; Bayar via Duitku</span>
                        </button>
                    </div>

                    @php
                        $basicThemes = $themes->filter(fn($t) => $t->tier !== 'premium');
                        $premiumThemes = $themes->filter(fn($t) => $t->tier === 'premium');
                    @endphp

                    <!-- ================= SEKSI 1: TEMA BASIC (10 TEMA) ================= -->
                    <div id="section-basic-container" class="space-y-3.5 sm:space-y-4">
                        <div class="flex items-center justify-between gap-2 pb-2.5 border-b border-stone-100">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 ring-4 ring-emerald-100"></span>
                                <h3 class="font-serif text-sm sm:text-base font-bold text-stone-900">Koleksi Tema Basic</h3>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    {{ $basicThemes->count() }} Tema Gratis
                                </span>
                            </div>
                            <span class="text-[11px] text-stone-400 font-medium hidden sm:inline">Gratis selamanya tanpa syarat</span>
                        </div>

                        <!-- Grid Tema Basic (5 Kolom di Layar Lebar, 2 Kolom di Mobile) -->
                        <div class="grid grid-cols-2 gap-3.5 sm:gap-4.5 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 p-0 sm:p-0.5" id="basicThemesGrid">
                            @foreach($basicThemes as $theme)
                                @include('partials.editor-theme-card', ['theme' => $theme, 'selectedThemeId' => $selectedThemeId ?? null, 'invitation' => $invitation ?? null])
                            @endforeach
                        </div>
                    </div>

                    <!-- ================= SEKSI 2: TEMA PREMIUM (10 TEMA) - DENGAN BATASAN & JARAK ================= -->
                    <div id="section-premium-container" class="pt-6 sm:pt-8 mt-6 sm:mt-8 border-t-2 border-dashed border-stone-200 space-y-3.5 sm:space-y-4">
                        <!-- Banner Header Seksi Premium -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-3.5 sm:p-4.5 rounded-2xl bg-gradient-to-r from-amber-500/10 via-rose-500/10 to-orange-500/5 border border-amber-300/80 shadow-2xs">
                            <div class="flex items-center gap-3">
                                <span class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-500 to-rose-500 text-white flex items-center justify-center font-bold text-lg shadow-md shrink-0">
                                    👑
                                </span>
                                <div>
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <h3 class="font-serif text-sm sm:text-base font-bold text-stone-900">Koleksi Tema Eksklusif Premium</h3>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-gradient-to-r from-amber-500 to-rose-500 text-white shadow-xs">
                                            {{ $premiumThemes->count() }} Tema VIP
                                        </span>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-900 border border-amber-300">
                                            Rp 59.000 / Undangan
                                        </span>
                                    </div>
                                    <p class="text-[11px] sm:text-xs text-stone-600 mt-0.5">
                                        Desain mewah berestetika tinggi dilengkapi fitur foto galeri tanpa batas, kuota tamu tak terbatas, &amp; upload musik kustom.
                                    </p>
                                </div>
                            </div>
                            <div class="shrink-0 flex items-center">
                                <span class="inline-flex items-center gap-1.5 text-[11px] sm:text-xs font-bold text-amber-900 bg-white/90 px-3 py-1.5 rounded-xl border border-amber-200 shadow-2xs">
                                    <svg class="w-3.5 h-3.5 text-amber-600 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                    <span>Bisa Dicoba &amp; Disesuaikan</span>
                                </span>
                            </div>
                        </div>

                        <!-- Grid Tema Premium (5 Kolom di Layar Lebar, 2 Kolom di Mobile) -->
                        <div class="grid grid-cols-2 gap-3.5 sm:gap-4.5 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 p-0 sm:p-0.5" id="premiumThemesGrid">
                            @foreach($premiumThemes as $theme)
                                @include('partials.editor-theme-card', ['theme' => $theme, 'selectedThemeId' => $selectedThemeId ?? null, 'invitation' => $invitation ?? null])
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Bottom Navigation Step 1 -->
                <div class="p-5 sm:p-6 bg-white rounded-2xl border border-[#E7E0D6] flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-[0_4px_20px_rgba(0,0,0,0.02)]">
                    <a href="{{ route('dashboard.invitations.index') }}" class="px-5 py-2.5 rounded-xl border border-[#E7E0D6] text-stone-700 hover:bg-stone-50 text-xs sm:text-sm font-semibold transition text-center cursor-pointer">
                        Batal & Kembali
                    </a>
                    <button type="button" onclick="nextStep()" class="px-6 py-2.5 rounded-xl font-medium text-white bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-sm text-xs sm:text-sm transition flex items-center justify-center gap-2 cursor-pointer">
                        <span>Lanjut: Header & URL</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            

            <!-- ================= STEP 2: HEADER & URL ================= -->
            <div id="step-content-2" class="wizard-step-pane hidden space-y-6">
                <div class="bg-white rounded-2xl border border-[#E7E0D6] p-6 sm:p-7 shadow-[0_4px_20px_rgba(0,0,0,0.02)] space-y-5">
                    <div class="flex items-center gap-3 pb-3 border-b border-[#E7E0D6]/70">
                        <span class="w-8 h-8 rounded-xl bg-amber-100 text-[#FF2E3A] flex items-center justify-center font-bold text-sm shrink-0">2</span>
                        <div>
                            <h2 class="font-serif text-lg font-bold text-stone-900">Header Undangan &amp; Studio Foto Tema</h2>
                            <p class="text-xs text-stone-500">Judul headline pembuka, tautan URL kustom, serta upload foto khusus tema terpilih</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-stone-600 mb-1.5">Judul Acara (Headline) *</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $invitation->title ?? 'Pernikahan') }}" required class="w-full px-4 py-2.5 bg-[#FAF8F5] border border-[#E7E0D6] rounded-xl text-stone-800 placeholder-stone-400 focus:outline-none focus:border-[#C2410C] focus:ring-2 focus:ring-[#B45309]/20 transition text-sm" placeholder="Contoh: Pernikahan, Walimatul 'Ursy">
                        </div>

                        <div>
                            <label for="slug" class="block text-xs font-semibold uppercase tracking-wider text-stone-600 mb-1.5">Custom Slug URL Undangan</label>
                            <div class="flex rounded-xl overflow-hidden border border-[#E7E0D6] bg-stone-50 focus-within:border-[#C2410C] focus-within:ring-2 focus-within:ring-[#B45309]/20 transition">
                                <span class="inline-flex items-center px-3 text-xs text-stone-500 bg-stone-100 border-r border-[#E7E0D6] select-none font-mono">
                                    /undangan/
                                </span>
                                <input type="text" name="slug" id="slug" value="{{ old('slug', $invitation->slug ?? '') }}" oninput="updateCustomSlug(this.value)" class="flex-1 px-3 py-2.5 bg-white text-stone-800 text-sm font-mono focus:outline-none" placeholder="rian-dan-maya">
                            </div>
                        </div>
                    </div>

                    <!-- ================= DYNAMIC THEME PHOTO STUDIO & GUIDE CONTAINER ================= -->
                    <div id="theme-photo-studio-card" class="pt-5 border-t border-[#E7E0D6]/80 space-y-6">
                        <!-- Active Theme Introduction Banner (Clean, Minimalist Card with Lucide Icon) -->
                        <div id="theme-banner-box" class="p-4 sm:p-5 rounded-2xl bg-[#FAF8F5] border border-[#E7E0D6] shadow-xs space-y-3">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <div id="theme-banner-icon-box" class="w-10 h-10 rounded-xl bg-white border border-[#E7E0D6] flex items-center justify-center shrink-0 shadow-xs">
                                        <!-- Lucide SVG injected via JS -->
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-[10px] font-bold uppercase tracking-wider text-stone-500" id="theme-banner-step-subtitle">Studio &amp; Panduan Foto Khusus Tema</span>
                                            <span id="theme-banner-tier" class="px-2 py-0.5 rounded-full text-[9px] font-extrabold uppercase bg-emerald-100 text-emerald-800 border border-emerald-300 shadow-2xs">Basic Gratis</span>
                                        </div>
                                        <h3 id="theme-banner-name" class="font-serif text-base sm:text-lg font-bold text-stone-900 tracking-wide">Basic Harmony Maroon</h3>
                                    </div>
                                </div>
                                <span id="theme-banner-id-pill" class="px-3 py-1 rounded-full text-xs font-mono bg-white text-stone-600 border border-[#E7E0D6] self-start sm:self-center shadow-xs">
                                    Tema #1
                                </span>
                            </div>
                            <p id="theme-banner-desc" class="text-xs text-stone-600 leading-relaxed">
                                Di bawah ini adalah formulir upload foto yang disesuaikan khusus untuk tema ini. Setiap foto yang diunggah akan otomatis terhubung ke sistem dan ditampilkan pada posisi yang sesuai di undangan publik.
                            </p>
                            <div id="theme-banner-tags" class="flex flex-wrap items-center gap-1.5 pt-1">
                                <!-- Dynamic tags populated by JS -->
                            </div>
                        </div>

                        <!-- 1. Foto Cover Buka Undangan (background_photo) -->
                        <div id="cover-photo-section" class="p-4 sm:p-5 bg-[#FAF8F5] rounded-2xl border border-[#E7E0D6] space-y-3">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-2 border-b border-[#E7E0D6]/70">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-xl bg-[#8B1E2D]/10 text-[#8B1E2D] flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                    <div>
                                        <h4 id="cover-photo-title" class="font-serif font-bold text-stone-900 text-sm">1. Foto Cover Pembuka Undangan (Cover Buka Undangan)</h4>
                                        <p id="cover-photo-subtitle" class="text-xs text-stone-500">Foto portrait utama saat tamu pertama kali membuka tautan undangan Anda</p>
                                    </div>
                                </div>
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-[#8B1E2D]/10 text-[#8B1E2D] border border-[#8B1E2D]/20 w-fit">
                                    Cover Buka Undangan
                                </span>
                            </div>

                            <div class="flex flex-col sm:flex-row items-center gap-4 pt-1">
                                <div class="w-24 h-32 rounded-xl overflow-hidden border-2 border-[#8B1E2D]/40 bg-white flex items-center justify-center shrink-0 shadow-md relative group">
                                    <img id="preview-background-photo" src="{{ isset($invitation) && $invitation->background_photo ? Storage::url($invitation->background_photo) : '' }}" class="{{ isset($invitation) && $invitation->background_photo ? '' : 'hidden' }} w-full h-full object-cover">
                                    <div id="fallback-background-photo" class="{{ isset($invitation) && $invitation->background_photo ? 'hidden' : '' }} flex flex-col items-center justify-center text-stone-400 p-2 text-center">
                                        <svg class="w-8 h-8 text-stone-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        <span class="text-[9px] mt-1 font-medium">Cover Kosong</span>
                                    </div>
                                </div>
                                <div class="flex-1 w-full space-y-2">
                                    <label for="background_photo" class="block text-xs font-semibold text-stone-700">Pilih Foto Cover Utama (Portrait 3:4 atau 9:16)</label>
                                    <input type="file" name="background_photo" id="background_photo" accept="image/jpeg,image/png,image/jpg,image/webp" class="block w-full text-xs text-stone-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#8B1E2D]/10 file:text-[#8B1E2D] hover:file:bg-[#8B1E2D]/20 cursor-pointer">
                                    <input type="hidden" name="background_photo_base64" id="background_photo_base64">
                                    <p id="cover-photo-guide-text" class="text-[11px] text-stone-500 leading-relaxed">
                                        Foto ini ditampilkan pada halaman pembuka sebelum tamu menekan tombol "Buka Undangan". Di desktop/laptop, foto ini mengisi panel pembuka yang sinematik. Jika dikosongkan, tema otomatis menggunakan foto default tema.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Foto Galeri Pengantin (gallery_photos[]) - Dynamic Capacity -->
                        <div id="theme-gallery-section" class="p-4 sm:p-5 bg-[#FAF8F5] rounded-2xl border border-[#E7E0D6] space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-2 border-b border-[#E7E0D6]/70">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                    </div>
                                    <div>
                                        <h4 class="font-serif font-bold text-stone-900 text-sm">2. Galeri Foto Pengantin</h4>
                                        <p class="text-xs text-stone-500">Unggah foto pre-wedding &amp; kenangan bahagia Anda untuk seksi galeri tema ini</p>
                                    </div>
                                </div>
                                <span id="theme-gallery-quota-badge" class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800 border border-emerald-300 w-fit">
                                    Kapasitas Rekomendasi: 8 Foto
                                </span>
                            </div>

                            <div class="space-y-3">
                                <!-- Dynamic Slot Tracker -->
                                <div id="theme-gallery-slot-tracker" class="p-3 bg-white rounded-xl border border-[#E7E0D6] flex flex-wrap items-center justify-between gap-2 shadow-2xs">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        <span class="text-xs font-semibold text-stone-800">Slot Galeri Tersedia:</span>
                                    </div>
                                    <div id="theme-gallery-slot-pills" class="flex flex-wrap items-center gap-1">
                                        <!-- Dynamically generated pills for slots 1 to 8 -->
                                    </div>
                                </div>

                                <div class="p-3.5 bg-white rounded-xl border border-[#E7E0D6] space-y-1.5">
                                    <label for="galleryPhotoInput" class="block text-xs font-semibold text-stone-700">Pilih / Tambah Foto Galeri (Bisa Pilih Banyak Sekaligus)</label>
                                    <input type="file" name="gallery_photos[]" id="galleryPhotoInput" multiple accept="image/jpeg,image/png,image/jpg,image/webp" class="block w-full text-xs text-stone-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-600/10 file:text-emerald-700 hover:file:bg-emerald-600/20 cursor-pointer">
                                    <p id="theme-gallery-tip-text" class="text-[11px] text-stone-500 leading-relaxed">
                                        ★ Pada tema ini, galeri dapat menampilkan hingga <strong>8 foto</strong> dengan tata letak estetik. Format: JPG, PNG, WebP (Maks 25MB per foto).
                                    </p>
                                </div>

                                <!-- Preview Stored / Uploaded Photos -->
                                <div id="photoGalleryContainer" class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-1">
                                    @if(isset($invitation) && $invitation->photos && $invitation->photos->count() > 0)
                                        @foreach($invitation->photos as $idx => $photo)
                                        <div class="relative group rounded-xl overflow-hidden border border-[#E7E0D6] bg-white shadow-xs aspect-[4/3]" data-photo-id="{{ $photo->id }}">
                                            <img src="{{ Storage::url($photo->path) }}" class="w-full h-full object-cover">
                                            <span class="absolute bottom-1.5 left-1.5 px-1.5 py-0.5 rounded bg-black/60 text-white text-[9px] font-mono">
                                                Slot #{{ $idx + 1 }}
                                            </span>
                                            <button type="button" onclick="deleteGalleryPhoto({{ $photo->id }})" class="absolute top-1.5 right-1.5 bg-red-600 text-white p-1.5 rounded-full opacity-90 sm:opacity-0 sm:group-hover:opacity-100 transition shadow cursor-pointer" title="Hapus Foto">
                                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div id="newPhotosPreviewContainer" class="grid grid-cols-2 sm:grid-cols-4 gap-3"></div>

                                <!-- Dynamic Empty Slot Placeholders up to theme limit (e.g. 8 slots) -->
                                <div id="emptyGallerySlotsContainer" class="grid grid-cols-2 sm:grid-cols-4 gap-3"></div>
                            </div>
                        </div>

                        <!-- 3. Foto Love Story / Our Story / Cerita Kita - Dynamic Visibility -->
                        <div id="theme-story-section" class="p-4 sm:p-5 bg-[#FAF8F5] rounded-2xl border border-[#E7E0D6] space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-2 border-b border-[#E7E0D6]/70">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                    </div>
                                    <div>
                                        <h4 id="theme-story-title" class="font-serif font-bold text-stone-900 text-sm">3. Foto Love Story / Cerita Kita</h4>
                                        <p id="theme-story-subtitle" class="text-xs text-stone-500">Foto potret khusus untuk seksi perjalanan cinta tema ini</p>
                                    </div>
                                </div>
                                <span id="theme-story-quota-badge" class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-pink-100 text-pink-700 border border-pink-200 w-fit">
                                    Slot Foto Love Story
                                </span>
                            </div>

                            <p id="theme-story-guide-text" class="text-xs text-stone-600 leading-relaxed">
                                Tema ini memiliki seksi visual <strong>Love Story / Our Story</strong>. Unggah foto untuk mengilustrasikan awal kisah pertemuan hingga momen menuju pelaminan:
                            </p>

                            <div class="space-y-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <!-- Story Photo 1 -->
                                    <div id="slot-story-photo-1" class="flex items-center gap-3 p-3 bg-white rounded-xl border border-[#E7E0D6] shadow-2xs">
                                        <div class="w-20 h-24 rounded-lg overflow-hidden border border-stone-300 bg-stone-100 shrink-0 relative flex items-center justify-center">
                                            <img id="preview-story-photo-1" src="{{ isset($invitation) && $invitation->story_photo_1 ? Storage::url($invitation->story_photo_1) : '' }}" class="{{ isset($invitation) && $invitation->story_photo_1 ? '' : 'hidden' }} w-full h-full object-cover">
                                            <div id="fallback-story-photo-1" class="{{ isset($invitation) && $invitation->story_photo_1 ? 'hidden' : '' }} text-stone-400 text-center p-1">
                                                <svg class="w-6 h-6 mx-auto text-stone-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                <span class="text-[8px] font-medium">Foto Cerita 1</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0 space-y-1">
                                            <label for="story_photo_1" class="block text-xs font-semibold text-stone-700">Foto Cerita 1</label>
                                            <input type="file" name="story_photo_1" id="story_photo_1" accept="image/jpeg,image/png,image/jpg,image/webp" class="block w-full text-[11px] text-stone-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-pink-500/10 file:text-pink-700 hover:file:bg-pink-500/20 cursor-pointer">
                                            <input type="hidden" name="story_photo_1_base64" id="story_photo_1_base64">
                                            <p id="story-label-1" class="text-[10px] text-stone-400">Rasio 3:4 atau 9:16 (Momen #1: Awal Bertemu)</p>
                                        </div>
                                    </div>

                                    <!-- Story Photo 2 -->
                                    <div id="slot-story-photo-2" class="flex items-center gap-3 p-3 bg-white rounded-xl border border-[#E7E0D6] shadow-2xs">
                                        <div class="w-20 h-24 rounded-lg overflow-hidden border border-stone-300 bg-stone-100 shrink-0 relative flex items-center justify-center">
                                            <img id="preview-story-photo-2" src="{{ isset($invitation) && $invitation->story_photo_2 ? Storage::url($invitation->story_photo_2) : '' }}" class="{{ isset($invitation) && $invitation->story_photo_2 ? '' : 'hidden' }} w-full h-full object-cover">
                                            <div id="fallback-story-photo-2" class="{{ isset($invitation) && $invitation->story_photo_2 ? 'hidden' : '' }} text-stone-400 text-center p-1">
                                                <svg class="w-6 h-6 mx-auto text-stone-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                <span class="text-[8px] font-medium">Foto Cerita 2</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0 space-y-1">
                                            <label for="story_photo_2" class="block text-xs font-semibold text-stone-700">Foto Cerita 2</label>
                                            <input type="file" name="story_photo_2" id="story_photo_2" accept="image/jpeg,image/png,image/jpg,image/webp" class="block w-full text-[11px] text-stone-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-pink-500/10 file:text-pink-700 hover:file:bg-pink-500/20 cursor-pointer">
                                            <input type="hidden" name="story_photo_2_base64" id="story_photo_2_base64">
                                            <p id="story-label-2" class="text-[10px] text-stone-400">Rasio 3:4 atau 9:16 (Momen #2: Komitmen)</p>
                                        </div>
                                    </div>

                                    <!-- Story Photo 3 -->
                                    <div id="slot-story-photo-3" class="flex items-center gap-3 p-3 bg-white rounded-xl border border-[#E7E0D6] shadow-2xs">
                                        <div class="w-20 h-24 rounded-lg overflow-hidden border border-stone-300 bg-stone-100 shrink-0 relative flex items-center justify-center">
                                            <img id="preview-story-photo-3" src="{{ isset($invitation) && $invitation->story_photo_3 ? Storage::url($invitation->story_photo_3) : '' }}" class="{{ isset($invitation) && $invitation->story_photo_3 ? '' : 'hidden' }} w-full h-full object-cover">
                                            <div id="fallback-story-photo-3" class="{{ isset($invitation) && $invitation->story_photo_3 ? 'hidden' : '' }} text-stone-400 text-center p-1">
                                                <svg class="w-6 h-6 mx-auto text-stone-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                <span class="text-[8px] font-medium">Foto Cerita 3</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0 space-y-1">
                                            <label for="story_photo_3" class="block text-xs font-semibold text-stone-700">Foto Cerita 3</label>
                                            <input type="file" name="story_photo_3" id="story_photo_3" accept="image/jpeg,image/png,image/jpg,image/webp" class="block w-full text-[11px] text-stone-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-pink-500/10 file:text-pink-700 hover:file:bg-pink-500/20 cursor-pointer">
                                            <input type="hidden" name="story_photo_3_base64" id="story_photo_3_base64">
                                            <p id="story-label-3" class="text-[10px] text-stone-400">Rasio 3:4 atau 9:16 (Momen #3: Menuju Pelaminan)</p>
                                        </div>
                                    </div>

                                    <!-- Story Photo 4 -->
                                    <div id="slot-story-photo-4" class="flex items-center gap-3 p-3 bg-white rounded-xl border border-[#E7E0D6] shadow-2xs hidden">
                                        <div class="w-20 h-24 rounded-lg overflow-hidden border border-stone-300 bg-stone-100 shrink-0 relative flex items-center justify-center">
                                            <img id="preview-story-photo-4" src="{{ isset($invitation) && $invitation->story_photo_4 ? Storage::url($invitation->story_photo_4) : '' }}" class="{{ isset($invitation) && $invitation->story_photo_4 ? '' : 'hidden' }} w-full h-full object-cover">
                                            <div id="fallback-story-photo-4" class="{{ isset($invitation) && $invitation->story_photo_4 ? 'hidden' : '' }} text-stone-400 text-center p-1">
                                                <svg class="w-6 h-6 mx-auto text-stone-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                <span class="text-[8px] font-medium">Foto Cerita 4</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0 space-y-1">
                                            <label for="story_photo_4" class="block text-xs font-semibold text-stone-700">Foto Cerita 4</label>
                                            <input type="file" name="story_photo_4" id="story_photo_4" accept="image/jpeg,image/png,image/jpg,image/webp" class="block w-full text-[11px] text-stone-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-pink-500/10 file:text-pink-700 hover:file:bg-pink-500/20 cursor-pointer">
                                            <input type="hidden" name="story_photo_4_base64" id="story_photo_4_base64">
                                            <p id="story-label-4" class="text-[10px] text-stone-400">Rasio 3:4 atau 9:16 (Momen #4: Pernikahan)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 4. Foto Latar Hitung Mundur & Ayat (Khusus Basic Harmony Monochrome) -->
                        <div id="countdown-photo-section" class="p-4 sm:p-5 bg-[#FAF8F5] rounded-2xl border border-[#E7E0D6] space-y-3 hidden">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-2 border-b border-[#E7E0D6]/70">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-xl bg-stone-200 text-stone-700 flex items-center justify-center shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    </div>
                                    <div>
                                        <h4 class="font-serif font-bold text-stone-900 text-sm">Foto Latar Hitung Mundur &amp; Ayat (Khusus Basic Harmony Monochrome)</h4>
                                        <p class="text-xs text-stone-500">Foto sekunder bernuansa hitam-putih untuk latar belakang hitung mundur dan penutup</p>
                                    </div>
                                </div>
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-stone-200 text-stone-800 border border-stone-300 w-fit">
                                    Latar Hero &amp; Countdown
                                </span>
                            </div>

                            <div class="flex flex-col sm:flex-row items-center gap-4 pt-1">
                                <div class="w-24 h-32 rounded-xl border border-stone-300 bg-white flex items-center justify-center shrink-0 shadow-xs relative overflow-hidden group">
                                    <img id="preview-countdown-photo" src="{{ isset($invitation) && $invitation->countdown_photo ? Storage::url($invitation->countdown_photo) : '' }}" class="{{ isset($invitation) && $invitation->countdown_photo ? '' : 'hidden' }} w-full h-full object-cover">
                                    <div id="fallback-countdown-photo" class="{{ isset($invitation) && $invitation->countdown_photo ? 'hidden' : '' }} flex flex-col items-center justify-center text-stone-400 p-2 text-center">
                                        <svg class="w-8 h-8 text-stone-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        <span class="text-[9px] mt-1 font-medium">Latar Kosong</span>
                                    </div>
                                </div>
                                <div class="flex-1 w-full space-y-2">
                                    <label for="countdown_photo" class="block text-xs font-semibold text-stone-700">Pilih Foto Hitung Mundur / Penutup</label>
                                    <input type="file" name="countdown_photo" id="countdown_photo" accept="image/jpeg,image/png,image/jpg,image/webp" class="block w-full text-xs text-stone-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-stone-200 file:text-stone-800 hover:file:bg-stone-300 cursor-pointer">
                                    <input type="hidden" name="countdown_photo_base64" id="countdown_photo_base64">
                                    <p class="text-[11px] text-stone-500 leading-relaxed">
                                        Foto latar dramatis untuk seksi Count The Date &amp; kutipan ayat suci.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 6. Kartu Rincian Slot Foto Tema (Dynamic Theme Guide Card - Clean Modern Style) -->
                        <div id="theme-slots-guide-box" class="p-4 sm:p-5 rounded-2xl bg-[#FAF8F5] text-stone-800 border border-[#E7E0D6] shadow-xs space-y-3">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span id="theme-guide-title" class="text-xs font-bold tracking-wide uppercase text-stone-800">Panduan Penempatan Foto Tema Ini</span>
                                </div>
                                <span id="theme-guide-badge" class="px-2 py-0.5 rounded text-[10px] font-mono bg-white text-stone-600 border border-[#E7E0D6] shadow-2xs">Tema Terpilih</span>
                            </div>
                            <p id="theme-guide-summary" class="text-xs text-stone-600 leading-relaxed">
                                Berikut rincian penempatan masing-masing foto pada tema yang Anda pilih:
                            </p>
                            <div id="theme-slots-grid" class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-[11px] text-stone-700">
                                <!-- Dynamically populated slots -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom Navigation Step 2 -->
                <div class="p-5 sm:p-6 bg-white rounded-2xl border border-[#E7E0D6] flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-[0_4px_20px_rgba(0,0,0,0.02)]">
                    <button type="button" onclick="prevStep()" class="px-5 py-2.5 rounded-xl border border-[#E7E0D6] text-stone-700 hover:bg-stone-50 text-xs sm:text-sm font-semibold transition flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Sebelumnya: Pilih Tema</span>
                    </button>
                    <button type="button" onclick="nextStep()" class="px-6 py-2.5 rounded-xl font-medium text-white bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-sm text-xs sm:text-sm transition flex items-center justify-center gap-2 cursor-pointer">
                        <span>Lanjut: Data Mempelai</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            

            <!-- ================= STEP 3: DATA MEMPELAI ================= -->
            <div id="step-content-3" class="wizard-step-pane hidden space-y-6">
                <div class="bg-white rounded-2xl border border-[#E7E0D6] p-6 sm:p-7 shadow-[0_4px_20px_rgba(0,0,0,0.02)] space-y-6">
                    <div class="flex items-center gap-3 pb-3 border-b border-[#E7E0D6]/70">
                        <span class="w-8 h-8 rounded-xl bg-amber-100 text-[#FF2E3A] flex items-center justify-center font-bold text-sm shrink-0">3</span>
                        <div>
                            <h2 class="font-serif text-lg font-bold text-stone-900">Data Mempelai</h2>
                            <p class="text-xs text-stone-500">Profil lengkap, avatar lingkaran, nama orang tua, dan akun Instagram</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Mempelai Pria -->
                        <div class="p-5 rounded-2xl bg-[#FAF8F5] border border-[#E7E0D6] space-y-4">
                            <div class="flex items-center justify-between pb-3 border-b border-[#E7E0D6]">
                                <h3 class="font-serif font-bold text-stone-900 text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Mempelai Pria
                                </h3>
                                <span class="text-[10px] font-semibold text-[#FF2E3A] uppercase tracking-wider bg-amber-100/70 px-2 py-0.5 rounded-full">Groom</span>
                            </div>

                            <!-- Upload Avatar Pria (Preview Bulat Instan) -->
                            <div id="groom-avatar-container">
                                <label class="block text-xs font-semibold text-stone-700 mb-1.5">Upload Foto Profil Avatar Pria</label>
                                
                                <div id="groom-avatar-upload-box" class="flex items-center gap-3">
                                    <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-[#FF2E3A] bg-white flex items-center justify-center shrink-0 shadow-sm relative">
                                        <img id="preview-groom-avatar" src="{{ isset($invitation) && $invitation->groom_photo ? Storage::url($invitation->groom_photo) : '' }}" class="{{ isset($invitation) && $invitation->groom_photo ? '' : 'hidden' }} w-full h-full object-cover">
                                        <div id="fallback-groom-avatar" class="{{ isset($invitation) && $invitation->groom_photo ? 'hidden' : '' }} w-10 h-10 text-stone-400 p-1">
                                            <svg class="w-full h-full" viewBox="0 0 64 64" fill="currentColor">
                                                <path d="M32 10a12 12 0 100 24 12 12 0 000-24zm0 28c-14.33 0-26 10.45-26 23.33 0 1.47 1.2 2.67 2.67 2.67h46.66c1.47 0 2.67-1.2 2.67-2.67C58 48.45 46.33 38 32 38z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <input type="file" name="groom_photo" id="groom_photo" accept="image/jpeg,image/png,image/jpg,image/webp,image/*" class="block w-full text-xs text-stone-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#DBF6FF] file:text-[#0284C7] hover:file:bg-[#BAEAF8] cursor-pointer">
                                        <p class="text-[10px] text-stone-400 mt-1">Preview bulat instan (Maks 5MB)</p>
                                        @error('groom_photo')
                                        <p class="text-[11px] text-rose-600 font-medium mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="groom_nickname" class="block text-xs font-semibold text-stone-700 mb-1">Nama Panggilan *</label>
                                <input type="text" name="groom_nickname" id="groom_nickname" value="{{ old('groom_nickname', $invitation->groom_nickname ?? 'Rian') }}" required class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C] focus:ring-2 focus:ring-[#B45309]/20 transition" placeholder="Contoh: Rian">
                            </div>

                            <div>
                                <label for="groom_name" class="block text-xs font-semibold text-stone-700 mb-1">Nama Lengkap & Gelar *</label>
                                <input type="text" name="groom_name" id="groom_name" value="{{ old('groom_name', $invitation->groom_name ?? 'Rian Pratama, S.Kom.') }}" required class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C] focus:ring-2 focus:ring-[#B45309]/20 transition" placeholder="Contoh: Rian Pratama, S.Kom.">
                            </div>

                            <div>
                                <label for="groom_parents" class="block text-xs font-semibold text-stone-700 mb-1">Format Nama Orang Tua</label>
                                <input type="text" name="groom_parents" id="groom_parents" value="{{ old('groom_parents', $invitation->groom_parents ?? 'Putra dari Bapak Hendra & Ibu Susi') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C] focus:ring-2 focus:ring-[#B45309]/20 transition" placeholder="Putra dari Bapak [Nama] & Ibu [Nama]">
                            </div>

                            <div>
                                <label for="groom_instagram" class="block text-xs font-semibold text-stone-700 mb-1">Akun Instagram</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-xs text-stone-400 select-none">@</span>
                                    <input type="text" name="groom_instagram" id="groom_instagram" value="{{ old('groom_instagram', $invitation->groom_instagram ?? 'rian.pratama') }}" class="w-full pl-8 pr-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C] focus:ring-2 focus:ring-[#B45309]/20 transition" placeholder="rian.pratama">
                                </div>
                            </div>
                        </div>

                        <!-- Mempelai Wanita -->
                        <div class="p-5 rounded-2xl bg-[#FAF8F5] border border-[#E7E0D6] space-y-4">
                            <div class="flex items-center justify-between pb-3 border-b border-[#E7E0D6]">
                                <h3 class="font-serif font-bold text-stone-900 text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    Mempelai Wanita
                                </h3>
                                <span class="text-[10px] font-semibold text-[#FF2E3A] uppercase tracking-wider bg-amber-100/70 px-2 py-0.5 rounded-full">Bride</span>
                            </div>

                            <!-- Upload Avatar Wanita (Preview Bulat Instan) -->
                            <div id="bride-avatar-container">
                                <label class="block text-xs font-semibold text-stone-700 mb-1.5">Upload Foto Profil Avatar Wanita</label>

                                <div id="bride-avatar-upload-box" class="flex items-center gap-3">
                                    <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-[#FF2E3A] bg-white flex items-center justify-center shrink-0 shadow-sm relative">
                                        <img id="preview-bride-avatar" src="{{ isset($invitation) && $invitation->bride_photo ? Storage::url($invitation->bride_photo) : '' }}" class="{{ isset($invitation) && $invitation->bride_photo ? '' : 'hidden' }} w-full h-full object-cover">
                                        <div id="fallback-bride-avatar" class="{{ isset($invitation) && $invitation->bride_photo ? 'hidden' : '' }} w-10 h-10 text-stone-400 p-1">
                                            <svg class="w-full h-full" viewBox="0 0 64 64" fill="currentColor">
                                                <path d="M32 8c-6.63 0-12 5.37-12 12 0 5.4 3.58 9.97 8.5 11.45-12.87 2.22-22.5 12.18-22.5 24.55 0 1.1.9 2 2 2h48c1.1 0 2-.9 2-2 0-12.37-9.63-22.33-22.5-24.55C40.42 29.97 44 25.4 44 20c0-6.63-5.37-12-12-12z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <input type="file" name="bride_photo" id="bride_photo" accept="image/jpeg,image/png,image/jpg,image/webp,image/*" class="block w-full text-xs text-stone-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#DBF6FF] file:text-[#0284C7] hover:file:bg-[#BAEAF8] cursor-pointer">
                                        <p class="text-[10px] text-stone-400 mt-1">Preview bulat instan (Maks 5MB)</p>
                                        @error('bride_photo')
                                        <p class="text-[11px] text-rose-600 font-medium mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="bride_nickname" class="block text-xs font-semibold text-stone-700 mb-1">Nama Panggilan *</label>
                                <input type="text" name="bride_nickname" id="bride_nickname" value="{{ old('bride_nickname', $invitation->bride_nickname ?? 'Maya') }}" required class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C] focus:ring-2 focus:ring-[#B45309]/20 transition" placeholder="Contoh: Maya">
                            </div>

                            <div>
                                <label for="bride_name" class="block text-xs font-semibold text-stone-700 mb-1">Nama Lengkap & Gelar *</label>
                                <input type="text" name="bride_name" id="bride_name" value="{{ old('bride_name', $invitation->bride_name ?? 'Maya Anggraini, S.E.') }}" required class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C] focus:ring-2 focus:ring-[#B45309]/20 transition" placeholder="Contoh: Maya Anggraini, S.E.">
                            </div>

                            <div>
                                <label for="bride_parents" class="block text-xs font-semibold text-stone-700 mb-1">Format Nama Orang Tua</label>
                                <input type="text" name="bride_parents" id="bride_parents" value="{{ old('bride_parents', $invitation->bride_parents ?? 'Putri dari Bapak Bambang & Ibu Dewi') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C] focus:ring-2 focus:ring-[#B45309]/20 transition" placeholder="Putri dari Bapak [Nama] & Ibu [Nama]">
                            </div>

                            <div>
                                <label for="bride_instagram" class="block text-xs font-semibold text-stone-700 mb-1">Akun Instagram</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-xs text-stone-400 select-none">@</span>
                                    <input type="text" name="bride_instagram" id="bride_instagram" value="{{ old('bride_instagram', $invitation->bride_instagram ?? 'maya.anggra') }}" class="w-full pl-8 pr-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C] focus:ring-2 focus:ring-[#B45309]/20 transition" placeholder="maya.anggra">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom Navigation Step 3 -->
                <div class="p-5 sm:p-6 bg-white rounded-2xl border border-[#E7E0D6] flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-[0_4px_20px_rgba(0,0,0,0.02)]">
                    <button type="button" onclick="prevStep()" class="px-5 py-2.5 rounded-xl border border-[#E7E0D6] text-stone-700 hover:bg-stone-50 text-xs sm:text-sm font-semibold transition flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Sebelumnya: Header & URL</span>
                    </button>
                    <button type="button" onclick="nextStep()" class="px-6 py-2.5 rounded-xl font-medium text-white bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-sm text-xs sm:text-sm transition flex items-center justify-center gap-2 cursor-pointer">
                        <span>Lanjut: Rangkaian Acara</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            

            <!-- ================= STEP 4: ACARA (AKAD & RESEPSI) ================= -->
            <div id="step-content-4" class="wizard-step-pane hidden space-y-6">
                <div class="bg-white rounded-2xl border border-[#E7E0D6] p-6 sm:p-7 shadow-[0_4px_20px_rgba(0,0,0,0.02)] space-y-6">
                    <div class="flex items-center gap-3 pb-3 border-b border-[#E7E0D6]/70">
                        <span class="w-8 h-8 rounded-xl bg-amber-100 text-[#FF2E3A] flex items-center justify-center font-bold text-sm shrink-0">4</span>
                        <div>
                            <h2 class="font-serif text-lg font-bold text-stone-900">Detail Rangkaian Acara (Akad & Resepsi)</h2>
                            <p class="text-xs text-stone-500">Jadwal tanggal, jam mulai-selesai, tempat, dan peta lokasi</p>
                        </div>
                    </div>

                    <!-- Akad Nikah -->
                    <div class="p-5 rounded-2xl bg-[#FAF8F5] border border-[#E7E0D6] space-y-4">
                        <h3 class="font-serif font-bold text-stone-900 text-sm flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="9" cy="12" r="5" stroke-width="1.8"/>
                                <circle cx="15" cy="12" r="5" stroke-width="1.8"/>
                            </svg>
                            Akad Nikah (Ijab Qabul)
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="akad_date" class="block text-xs font-semibold text-stone-700 mb-1">Tanggal Akad</label>
                                <input type="date" name="akad_date" id="akad_date" value="{{ old('akad_date', isset($invitation) && $invitation->akad_date ? $invitation->akad_date->format('Y-m-d') : '2026-12-12') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label for="akad_time" class="block text-xs font-semibold text-stone-700 mb-1">Jam Mulai</label>
                                    <input type="time" name="akad_time" id="akad_time" value="{{ old('akad_time', isset($invitation) && $invitation->akad_time ? $invitation->akad_time->format('H:i') : '08:00') }}" class="w-full px-3 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]">
                                </div>
                                <div>
                                    <label for="akad_end_time" class="block text-xs font-semibold text-stone-700 mb-1">Jam Selesai</label>
                                    <input type="time" name="akad_end_time" id="akad_end_time" value="{{ old('akad_end_time', $invitation->akad_end_time ?? '10:00') }}" class="w-full px-3 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]">
                                </div>
                            </div>
                            <div>
                                <label for="akad_venue" class="block text-xs font-semibold text-stone-700 mb-1">Nama Tempat / Gedung</label>
                                <input type="text" name="akad_venue" id="akad_venue" value="{{ old('akad_venue', $invitation->akad_venue ?? 'Masjid Agung Al-Azhar') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="Contoh: Masjid Agung Al-Azhar">
                            </div>
                            <div>
                                <label for="akad_maps_url" class="block text-xs font-semibold text-stone-700 mb-1">Link Google Maps Akad</label>
                                <input type="url" name="akad_maps_url" id="akad_maps_url" value="{{ old('akad_maps_url', $invitation->akad_maps_url ?? 'https://maps.google.com') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="https://maps.google.com/...">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="akad_address" class="block text-xs font-semibold text-stone-700 mb-1">Alamat Lengkap</label>
                                <input type="text" name="akad_address" id="akad_address" value="{{ old('akad_address', $invitation->akad_address ?? 'Jl. Sisingamangaraja, Kebayoran Baru, Jakarta Selatan') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="Alamat lengkap lokasi akad">
                            </div>
                        </div>
                    </div>

                    <!-- Resepsi Pernikahan -->
                    <div class="p-5 rounded-2xl bg-[#FAF8F5] border border-[#E7E0D6] space-y-4">
                        <h3 class="font-serif font-bold text-stone-900 text-sm flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Resepsi Pernikahan (Utama)
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="event_date" class="block text-xs font-semibold text-stone-700 mb-1">Tanggal Resepsi *</label>
                                <input type="date" name="event_date" id="event_date" value="{{ old('event_date', isset($invitation) && $invitation->event_date ? $invitation->event_date->format('Y-m-d') : '2026-12-12') }}" required class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label for="event_time" class="block text-xs font-semibold text-stone-700 mb-1">Jam Mulai *</label>
                                    <input type="time" name="event_time" id="event_time" value="{{ old('event_time', isset($invitation) && $invitation->event_time ? $invitation->event_time->format('H:i') : '11:00') }}" required class="w-full px-3 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]">
                                </div>
                                <div>
                                    <label for="event_end_time" class="block text-xs font-semibold text-stone-700 mb-1">Jam Selesai</label>
                                    <input type="time" name="event_end_time" id="event_end_time" value="{{ old('event_end_time', $invitation->event_end_time ?? '13:00') }}" class="w-full px-3 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]">
                                </div>
                            </div>
                            <div>
                                <label for="venue" class="block text-xs font-semibold text-stone-700 mb-1">Nama Tempat / Gedung *</label>
                                <input type="text" name="venue" id="venue" value="{{ old('venue', $invitation->venue ?? 'Grand Ballroom Hotel Mulia') }}" required class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="Contoh: Grand Ballroom Hotel Mulia">
                            </div>
                            <div>
                                <label for="maps_url" class="block text-xs font-semibold text-stone-700 mb-1">Link Google Maps Resepsi</label>
                                <input type="url" name="maps_url" id="maps_url" value="{{ old('maps_url', $invitation->maps_url ?? 'https://maps.google.com') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="https://maps.google.com/...">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="address" class="block text-xs font-semibold text-stone-700 mb-1">Alamat Lengkap</label>
                                <input type="text" name="address" id="address" value="{{ old('address', $invitation->address ?? 'Jl. Asia Afrika, Gelora, Tanah Abang, Jakarta Pusat') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="Alamat lengkap lokasi resepsi">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom Navigation Step 4 -->
                <div class="p-5 sm:p-6 bg-white rounded-2xl border border-[#E7E0D6] flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-[0_4px_20px_rgba(0,0,0,0.02)]">
                    <button type="button" onclick="prevStep()" class="px-5 py-2.5 rounded-xl border border-[#E7E0D6] text-stone-700 hover:bg-stone-50 text-xs sm:text-sm font-semibold transition flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Sebelumnya: Data Mempelai</span>
                    </button>
                    <button type="button" onclick="nextStep()" class="px-6 py-2.5 rounded-xl font-medium text-white bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-sm text-xs sm:text-sm transition flex items-center justify-center gap-2 cursor-pointer">
                        <span>Lanjut: Fitur & Kado</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            

            <!-- ================= STEP 5: FITUR, KADO & PENUTUP ================= -->
            <div id="step-content-5" class="wizard-step-pane hidden space-y-6">
                <div class="bg-white rounded-2xl border border-[#E7E0D6] p-6 sm:p-7 shadow-[0_4px_20px_rgba(0,0,0,0.02)] space-y-6">
                    <div class="flex items-center gap-3 pb-3 border-b border-[#E7E0D6]/70">
                        <span class="w-8 h-8 rounded-xl bg-amber-100 text-[#FF2E3A] flex items-center justify-center font-bold text-sm shrink-0">5</span>
                        <div>
                            <h2 class="font-serif text-lg font-bold text-stone-900">Fitur Pelengkap, Kado & Penutup</h2>
                            <p class="text-xs text-stone-500">Kutipan suci, amplop digital, musik latar, kado fisik, dan kartu ucapan terima kasih</p>
                        </div>
                    </div>

                    <!-- Hidden Cover Photo Reference for Step 5 Script -->
                    <div class="hidden">
                        <img id="preview-background-photo-step5" src="{{ isset($invitation) && $invitation->background_photo ? Storage::url($invitation->background_photo) : '' }}" class="{{ isset($invitation) && $invitation->background_photo ? '' : 'hidden' }}">
                        <div id="fallback-background-photo-step5" class="{{ isset($invitation) && $invitation->background_photo ? 'hidden' : '' }}"></div>
                    </div>

                    <!-- Switch Toggle Ayat / Kutipan Suci -->
                    <div class="p-5 rounded-2xl bg-[#FAF8F5] border border-[#E7E0D6] space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2.5">
                                <svg class="w-4 h-4 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                <div>
                                    <h3 class="font-serif font-bold text-stone-900 text-sm">Tampilkan Ayat / Kutipan</h3>
                                    <p class="text-xs text-stone-500">Menyembunyikan atau menampilkan seksi ayat pada undangan</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="show_quote" id="show_quote" value="1" {{ old('show_quote', $invitation->show_quote ?? true) ? 'checked' : '' }} onchange="toggleQuoteSection(this.checked)" class="sr-only peer">
                                <div class="w-11 h-6 bg-stone-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-stone-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#FF2E3A]"></div>
                                <span id="quote-toggle-label" class="ml-2 text-xs font-semibold text-stone-700">Aktif</span>
                            </label>
                        </div>

                        <!-- Preset Selector & Inputs (Collapsible) -->
                        <div id="quote-input-fields" class="space-y-3 pt-3 border-t border-[#E7E0D6]">
                            <div class="flex items-center gap-2">
                                <label class="text-xs font-semibold text-stone-700 shrink-0">Pilih Preset:</label>
                                <select id="quote-preset-picker" onchange="applyQuotePreset(this.value)" class="w-full px-3 py-1.5 bg-white border border-[#E7E0D6] rounded-xl text-xs text-stone-700 focus:outline-none">
                                    <option value="ar_rum">QS. Ar-Rum: 21 (Kasih & Sayang)</option>
                                    <option value="an_nur">QS. An-Nur: 32 (Anjuran Menikah)</option>
                                    <option value="romantic">Kutipan Romantis (Kahlil Gibran)</option>
                                </select>
                            </div>

                            <div>
                                <label for="quran_text" class="block text-xs font-semibold text-stone-700 mb-1">Teks Ayat Arab / Kaligrafi</label>
                                <textarea name="quran_text" id="quran_text" rows="2" dir="rtl" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm font-serif leading-relaxed focus:outline-none focus:border-[#C2410C]">{{ old('quran_text', $invitation->quran_text ?? 'وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا لِّتَسْكُنُوا إِلَيْهَا وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً') }}</textarea>
                            </div>

                            <div>
                                <label for="quran_translation" class="block text-xs font-semibold text-stone-700 mb-1">Terjemahan / Arti Kutipan</label>
                                <textarea name="quran_translation" id="quran_translation" rows="2" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-xs italic focus:outline-none focus:border-[#C2410C]">{{ old('quran_translation', $invitation->quran_translation ?? 'Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.') }}</textarea>
                            </div>

                            <div>
                                <label for="quote_source" class="block text-xs font-semibold text-stone-700 mb-1">Sumber / Nama Surat</label>
                                <input type="text" name="quote_source" id="quote_source" value="{{ old('quote_source', $invitation->quote_source ?? 'QS. Ar-Rum: 21') }}" class="w-full px-3.5 py-2 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-xs focus:outline-none focus:border-[#C2410C]">
                            </div>
                        </div>
                    </div>

                    <!-- Switch Toggle Cerita Cinta / Love Story -->
                    <div class="p-5 rounded-2xl bg-[#FAF8F5] border border-[#E7E0D6] space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2.5">
                                <svg class="w-4 h-4 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                <div>
                                    <h3 class="font-serif font-bold text-stone-900 text-sm">Tampilkan Kisah Cinta (Love Story)</h3>
                                    <p class="text-xs text-stone-500">Timeline perjalanan cinta mulai dari awal bertemu hingga hari pernikahan</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="show_love_story" id="show_love_story" value="1" {{ old('show_love_story', $invitation->show_love_story ?? true) ? 'checked' : '' }} onchange="toggleLoveStorySection(this.checked)" class="sr-only peer">
                                <div class="w-11 h-6 bg-stone-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-stone-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#FF2E3A]"></div>
                                <span id="love-story-toggle-label" class="ml-2 text-xs font-semibold text-stone-700">Aktif</span>
                            </label>
                        </div>

                        <!-- Milestones Input Fields (Collapsible) -->
                        <div id="love-story-input-fields" class="space-y-4 pt-3 border-t border-[#E7E0D6]">
                            @php
                                $milestones = old('love_stories', $invitation->milestones ?? []);
                            @endphp
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @for($i = 0; $i < 4; $i++)
                                @php
                                    $m = $milestones[$i] ?? [
                                        'year' => ($i == 0 ? 'Tahun 2020' : ($i == 1 ? 'Tahun 2022' : ($i == 2 ? 'Tahun 2024' : 'Tahun 2026'))),
                                        'title' => ($i == 0 ? 'Awal Bertemu' : ($i == 1 ? 'Komitmen Bersama' : ($i == 2 ? 'Bertunangan' : 'Hari Pernikahan'))),
                                        'story' => ''
                                    ];
                                @endphp
                                <div class="p-3.5 bg-white border border-[#E7E0D6] rounded-xl space-y-2.5">
                                    <div class="flex items-center justify-between pb-1.5 border-b border-[#E7E0D6]">
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#FF2E3A] bg-amber-100/70 px-2 py-0.5 rounded-full">
                                            Momen #{{ $i + 1 }}
                                        </span>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label class="block text-[11px] font-semibold text-stone-600 mb-1">Tahun / Waktu</label>
                                            <input type="text" name="love_stories[{{ $i }}][year]" value="{{ $m['year'] ?? '' }}" class="w-full px-3 py-1.5 bg-[#FAF8F5] border border-[#E7E0D6] rounded-lg text-xs text-stone-800 focus:outline-none focus:border-[#C2410C]" placeholder="Contoh: Tahun 2020">
                                        </div>
                                        <div>
                                            <label class="block text-[11px] font-semibold text-stone-600 mb-1">Judul Momen</label>
                                            <input type="text" name="love_stories[{{ $i }}][title]" value="{{ $m['title'] ?? '' }}" class="w-full px-3 py-1.5 bg-[#FAF8F5] border border-[#E7E0D6] rounded-lg text-xs text-stone-800 focus:outline-none focus:border-[#C2410C]" placeholder="Contoh: Awal Bertemu">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-[11px] font-semibold text-stone-600 mb-1">Cerita Singkat</label>
                                        <textarea name="love_stories[{{ $i }}][story]" rows="2" class="w-full px-3 py-1.5 bg-[#FAF8F5] border border-[#E7E0D6] rounded-lg text-xs text-stone-800 focus:outline-none focus:border-[#C2410C]" placeholder="Ceritakan momen singkat ini...">{{ $m['story'] ?? '' }}</textarea>
                                    </div>
                                </div>
                                @endfor
                            </div>

                            <!-- Info Foto Love Story -->
                            <div class="mt-4 p-3.5 bg-pink-50/60 rounded-xl border border-pink-200/70 flex flex-col sm:flex-row sm:items-center justify-between gap-2.5">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-pink-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                    <p class="text-xs text-pink-900">
                                        Foto Love Story telah dikonfigurasi pada <strong>Studio Foto Khusus Tema</strong> di Langkah 2.
                                    </p>
                                </div>
                                <button type="button" onclick="goToStep(2)" class="px-3 py-1 rounded-lg bg-pink-600 text-white text-[11px] font-semibold hover:bg-pink-700 transition cursor-pointer self-start sm:self-center shrink-0">
                                    Kelola Foto di Langkah 2
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Galeri Foto Undangan (Status Overview) -->
                    <div class="p-5 rounded-2xl bg-[#FAF8F5] border border-[#E7E0D6] space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                            <div class="flex items-center gap-2.5">
                                <svg class="w-4 h-4 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <div>
                                    <h3 class="font-serif font-bold text-stone-900 text-sm">Galeri Foto Undangan (Pre-Wedding)</h3>
                                    <p class="text-xs text-stone-500">Foto galeri tema telah dipusatkan di Langkah 2 (Studio Foto Tema)</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span id="photo-count-badge" class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-100 text-[#FF2E3A] w-fit">
                                    {{ isset($invitation) && $invitation->photos ? $invitation->photos->count() : 0 }} Foto Tersimpan
                                </span>
                                <button type="button" onclick="goToStep(2)" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-stone-900 text-white text-xs font-semibold hover:bg-stone-800 transition cursor-pointer">
                                    <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    <span>Tambah / Edit di Langkah 2</span>
                                </button>
                            </div>
                        </div>

                        <!-- Ringkasan Foto Galeri -->
                        <div id="step5GallerySummaryContainer" class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-1">
                            @if(isset($invitation) && $invitation->photos && $invitation->photos->count() > 0)
                                @foreach($invitation->photos as $idx => $photo)
                                <div class="relative group rounded-xl overflow-hidden border border-[#E7E0D6] bg-white shadow-xs aspect-[4/3]">
                                    <img src="{{ Storage::url($photo->path) }}" class="w-full h-full object-cover">
                                    <span class="absolute bottom-1.5 left-1.5 px-1.5 py-0.5 rounded bg-black/60 text-white text-[9px] font-mono">
                                        #{{ $idx + 1 }}
                                    </span>
                                </div>
                                @endforeach
                            @else
                                <div class="col-span-full p-4 rounded-xl bg-white border border-dashed border-stone-300 text-center text-xs text-stone-500">
                                    Belum ada foto galeri tersimpan. Anda dapat mengunggah foto galeri langsung pada <strong>Langkah 2: Studio Foto Tema</strong>.
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Amplop Digital & Hadiah Rekening -->
                    <div class="p-5 rounded-2xl bg-[#FAF8F5] border border-[#E7E0D6] space-y-4">
                        <h3 class="font-serif font-bold text-stone-900 text-sm flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            Data Hadiah & Rekening (Amplop Digital)
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div>
                                <label for="gift_bank_name" class="block text-xs font-semibold text-stone-700 mb-1">Bank / E-Wallet</label>
                                <select name="gift_bank_name" id="gift_bank_name" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]">
                                    <option value="Bank BCA" {{ old('gift_bank_name', $invitation->gift_bank_name ?? '') == 'Bank BCA' ? 'selected' : '' }}>Bank BCA</option>
                                    <option value="Bank Mandiri" {{ old('gift_bank_name', $invitation->gift_bank_name ?? '') == 'Bank Mandiri' ? 'selected' : '' }}>Bank Mandiri</option>
                                    <option value="Bank BRI" {{ old('gift_bank_name', $invitation->gift_bank_name ?? '') == 'Bank BRI' ? 'selected' : '' }}>Bank BRI</option>
                                    <option value="Bank BNI" {{ old('gift_bank_name', $invitation->gift_bank_name ?? '') == 'Bank BNI' ? 'selected' : '' }}>Bank BNI</option>
                                    <option value="Bank Syariah Indonesia" {{ old('gift_bank_name', $invitation->gift_bank_name ?? '') == 'Bank Syariah Indonesia' ? 'selected' : '' }}>BSI</option>
                                    <option value="GoPay / OVO / Dana" {{ old('gift_bank_name', $invitation->gift_bank_name ?? '') == 'GoPay / OVO / Dana' ? 'selected' : '' }}>E-Wallet (GoPay/OVO/Dana)</option>
                                </select>
                            </div>
                            <div>
                                <label for="gift_account_number" class="block text-xs font-semibold text-stone-700 mb-1">Nomor Rekening / No. HP</label>
                                <input type="text" name="gift_account_number" id="gift_account_number" value="{{ old('gift_account_number', $invitation->gift_account_number ?? '1234567890') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm font-mono focus:outline-none focus:border-[#C2410C]" placeholder="Contoh: 1234567890">
                            </div>
                            <div>
                                <label for="gift_account_holder" class="block text-xs font-semibold text-stone-700 mb-1">Nama Pemilik Rekening</label>
                                <input type="text" name="gift_account_holder" id="gift_account_holder" value="{{ old('gift_account_holder', $invitation->gift_account_holder ?? 'Rian Pratama') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="Contoh: Rian Pratama">
                            </div>
                        </div>

                        <!-- Kirim Kado Fisik -->
                        <div class="pt-3 border-t border-[#E7E0D6] space-y-3">
                            <h4 class="text-xs font-bold text-stone-800 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Alamat Pengiriman Kado Fisik
                            </h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label for="gift_recipient_name" class="block text-xs font-semibold text-stone-700 mb-1">Nama Penerima Paket</label>
                                    <input type="text" name="gift_recipient_name" id="gift_recipient_name" value="{{ old('gift_recipient_name', $invitation->gift_recipient_name ?? '') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="Contoh: Rian & Maya">
                                </div>
                                <div>
                                    <label for="gift_phone" class="block text-xs font-semibold text-stone-700 mb-1">Nomor Telepon Penerima</label>
                                    <input type="text" name="gift_phone" id="gift_phone" value="{{ old('gift_phone', $invitation->gift_phone ?? '') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="Contoh: 081234567890">
                                </div>
                            </div>
                            <div>
                                <label for="gift_address" class="block text-xs font-semibold text-stone-700 mb-1">Alamat Lengkap Pengiriman</label>
                                <textarea name="gift_address" id="gift_address" rows="2" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="Alamat lengkap penerima bingkisan fisik...">{{ old('gift_address', $invitation->gift_address ?? '') }}</textarea>
                            </div>
                            <div>
                                <label for="gift_maps_url" class="block text-xs font-semibold text-stone-700 mb-1">Link Google Maps Titik Pengiriman</label>
                                <input type="url" name="gift_maps_url" id="gift_maps_url" value="{{ old('gift_maps_url', $invitation->gift_maps_url ?? '') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="https://maps.google.com/?q=...">
                            </div>
                        </div>
                    </div>

                    <!-- Musik Latar Undangan -->
                    <div class="p-5 rounded-2xl bg-[#FAF8F5] border border-[#E7E0D6] space-y-3">
                        <h3 class="font-serif font-bold text-stone-900 text-sm flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12 0c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                            </svg>
                            Pengaturan Musik Latar Undangan
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-3.5 bg-white border border-[#E7E0D6] rounded-xl flex flex-col justify-between space-y-3">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-stone-400 block">Lagu Latar Terpilih</span>
                                    @php
                                        $selectedThemeIdForMusic = (int) (old('theme_id', request('theme_id', $selectedThemeId ?? ($invitation->theme_id ?? 1))));
                                        $currentThemeForMusic = $themes->firstWhere('id', $selectedThemeIdForMusic) ?? $themes->first();
                                        $presetMusic = $currentThemeForMusic?->default_music;
                                        $initialMusicId = old('music_id', $invitation->music_id ?? ($presetMusic?->id ?? 1));
                                        $initialMusicLabel = isset($invitation->music)
                                            ? ($invitation->music->title . ' – ' . $invitation->music->artist)
                                            : ($presetMusic ? ($presetMusic->title . ' – ' . $presetMusic->artist) : 'Solo Acoustic Serenade – Jason Shaw (Default Tema)');
                                    @endphp
                                    <h4 id="active-music-title-display" class="font-serif font-bold text-sm text-stone-900 mt-1 truncate">
                                        {{ $initialMusicLabel }}
                                    </h4>
                                    <input type="hidden" name="music_id" id="music_id" value="{{ $initialMusicId }}" data-user-modified="{{ old('music_id', $invitation->music_id ?? null) ? 'true' : 'false' }}">
                                </div>

                                <div class="flex items-center gap-2 pt-1">
                                    <button type="button" onclick="openMusicLibraryModal()" class="flex-1 px-3 py-2 bg-[#FF2E3A] hover:bg-[#E01E2A] text-white rounded-xl text-xs font-semibold transition shadow-xs flex items-center justify-center gap-1.5 cursor-pointer">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12 0c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                        </svg>
                                        <span>Pilih dari Pustaka (20 Lagu)</span>
                                    </button>
                                    <button type="button" onclick="toggleMockupMusic()" class="px-3 py-2 bg-stone-100 hover:bg-stone-200 text-stone-800 rounded-xl text-xs font-semibold transition shadow-2xs flex items-center justify-center gap-1 cursor-pointer" title="Putar/Jeda Preview">
                                        <svg class="w-3.5 h-3.5 text-stone-600" fill="currentColor" viewBox="0 0 24 24">
                                            <polygon points="5 3 19 12 5 21 5 3"/>
                                        </svg>
                                        <span>Test</span>
                                    </button>
                                </div>
                            </div>

                            <div class="p-3.5 bg-white border border-[#E7E0D6] rounded-xl flex flex-col justify-between space-y-2">
                                <div>
                                    <label for="custom_music" class="block text-xs font-semibold text-stone-700 mb-1">Upload MP3 Kustom (Opsional)</label>
                                    <p class="text-[11px] text-stone-400">Gunakan file audio sendiri jika tidak ingin menggunakan pustaka preset.</p>
                                </div>
                                <input type="file" name="custom_music" id="custom_music" accept="audio/mpeg,audio/mp3" class="block w-full text-xs text-stone-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#DBF6FF] file:text-[#0284C7] hover:file:bg-[#BAEAF8] cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <!-- Seksi Penutup / Ucapan Terima Kasih (Closing Section) -->
                    <div class="p-5 rounded-2xl bg-[#FAF8F5] border border-[#E7E0D6] space-y-3">
                        <h3 class="font-serif font-bold text-stone-900 text-sm flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                            </svg>
                            Seksi Penutup / Ucapan Terima Kasih
                        </h3>
                        <p class="text-xs text-stone-500">Sesuaikan kalimat penutup, pesan rasa syukur, dan tanda tangan keluarga yang tampil di bagian akhir undangan.</p>
                        <div>
                            <label for="closing_title" class="block text-xs font-semibold text-stone-700 mb-1">Judul Penutup</label>
                            <input type="text" name="closing_title" id="closing_title" value="{{ old('closing_title', $invitation->closing_title ?? 'Terima Kasih') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="Terima Kasih">
                        </div>
                        <div>
                            <label for="closing_message" class="block text-xs font-semibold text-stone-700 mb-1">Paragraf Pesan Penutup</label>
                            <textarea name="closing_message" id="closing_message" rows="3" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.">{{ old('closing_message', $invitation->closing_message ?? 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.') }}</textarea>
                        </div>
                        <div>
                            <label for="closing_signature" class="block text-xs font-semibold text-stone-700 mb-1">Teks Tanda Tangan Keluarga</label>
                            <input type="text" name="closing_signature" id="closing_signature" value="{{ old('closing_signature', $invitation->closing_signature ?? ('Kami yang berbahagia, ' . ($invitation->groom_nickname ?? 'Rian') . ' & ' . ($invitation->bride_nickname ?? 'Maya') . ' beserta Seluruh Keluarga Besar')) }}" class="w-full px-3.5 py-2.5 bg-white border border-[#E7E0D6] rounded-xl text-stone-800 text-sm focus:outline-none focus:border-[#C2410C]" placeholder="Kami yang berbahagia, Mempelai beserta Seluruh Keluarga Besar">
                        </div>
                    </div>
                </div>

                <!-- Bottom Navigation Step 5 -->
                <div class="p-5 sm:p-6 bg-white rounded-2xl border border-[#E7E0D6] flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-[0_4px_20px_rgba(0,0,0,0.02)]">
                    <button type="button" onclick="prevStep()" class="px-5 py-2.5 rounded-xl border border-[#E7E0D6] text-stone-700 hover:bg-stone-50 text-xs sm:text-sm font-semibold transition flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Sebelumnya: Rangkaian Acara</span>
                    </button>
                    <button type="button" onclick="nextStep()" class="px-6 py-2.5 rounded-xl font-medium text-white bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-sm text-xs sm:text-sm transition flex items-center justify-center gap-2 cursor-pointer">
                        <span>Lanjut: Sebar Undangan & Tamu</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            

            <!-- ================= STEP 6: SEBAR UNDANGAN & MANAJEMEN TAMU ================= -->
            <div id="step-content-6" class="wizard-step-pane hidden space-y-6">
                
                <!-- Main Card: Full Landscape 2-Column Desktop Layout -->
                <div class="bg-white rounded-3xl w-full max-w-[1680px] mx-auto shadow-lg border border-slate-200 overflow-hidden flex flex-col" id="step6-share-card">
                    
                    <!-- Card Header -->
                    <div class="px-5 sm:px-6 py-4 sm:py-5 bg-gradient-to-r from-slate-50 via-white to-slate-50 border-b border-slate-200 flex items-center justify-between shrink-0">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-200 shadow-xs shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-heading text-lg font-bold text-slate-900">Bagikan Undangan</h3>
                                <p id="step6-card-subtitle" class="text-xs text-slate-500 font-medium">
                                    {{ $invitation->groom_nickname ?? 'Rian' }} &amp; {{ $invitation->bride_nickname ?? 'Maya' }}
                                </p>
                            </div>
                        </div>
                        <div class="w-8 h-8 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center text-xs font-bold" title="Langkah Terakhir">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Tab Navigation: Kirim Cepat vs Banyak Tamu -->
                    <div class="flex items-center border-b border-slate-200 bg-slate-50/70 px-4 sm:px-6 pt-2 shrink-0 gap-2">
                        <button type="button" id="step6-tab-btn-quick" onclick="switchStep6Tab('quick')" class="px-4 py-2.5 text-xs sm:text-sm font-bold border-b-2 border-[#FF2E3A] text-[#FF2E3A] flex items-center gap-2 transition cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <span>Kirim Cepat (1 Tamu)</span>
                        </button>
                        <button type="button" id="step6-tab-btn-guests" onclick="switchStep6Tab('guests')" class="px-4 py-2.5 text-xs sm:text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-slate-900 flex items-center gap-2 transition cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <span>Daftar Tamu &amp; Sebar Massal</span>
                            <span id="step6-guest-count-badge" class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-900 border border-amber-200">
                                {{ isset($invitation) && $invitation->guests ? $invitation->guests->count() : 0 }} Tamu
                            </span>
                        </button>
                    </div>

                    <!-- Card Body -->
                    <div class="p-5 sm:p-6 space-y-5">
                        
                        <!-- Draft Status Warning Banner (Shown if status is draft or not yet published) -->
                        @php
                            $isPublished = isset($invitation) && $invitation->exists && $invitation->isPublished();
                        @endphp
                        <div id="step6-draft-banner" class="{{ $isPublished ? 'hidden' : '' }} p-4 rounded-2xl bg-amber-50 border border-amber-200/80 text-amber-900 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="flex items-start gap-2.5">
                                <svg class="w-5 h-5 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <div>
                                    <p class="text-xs font-bold text-amber-900">Undangan Berstatus Draf</p>
                                    <p class="text-[11px] text-amber-700 mt-0.5">Tamu tidak dapat mengakses tautan sebelum undangan ini dipublikasikan.</p>
                                </div>
                            </div>
                            <button type="button" onclick="submitFormWithAction('publish')" class="w-full sm:w-auto px-3.5 py-1.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-xs font-semibold shadow-xs transition cursor-pointer">
                                Publikasikan Sekarang
                            </button>
                        </div>

                        <!-- ================= TAB 1: KIRIM CEPAT (1 TAMU) - LANDSCAPE GRID ================= -->
                        <div id="step6-pane-quick" class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                            
                            <!-- Kolom Kiri: Status Koneksi, Tautan & Tamu Cepat (5 col) -->
                            <div class="lg:col-span-5 space-y-4">
                                <!-- Status Koneksi & Host Link Undangan (Otomatis & Bersih) -->
                                <div id="step6-host-box" class="p-3.5 rounded-2xl bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200/90 shadow-2xs transition-all duration-300">
                                    <div class="flex items-center justify-between gap-3">
                                        <div class="flex items-center gap-2.5 sm:gap-3 min-w-0">
                                            <div id="step6-host-indicator-icon" class="w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center shadow-xs shrink-0">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div class="min-w-0">
                                                <div class="flex items-center gap-2 flex-wrap">
                                                    <span id="step6-host-badge-status" class="px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-emerald-600 text-white shadow-2xs">
                                                        Link Publik Online Aktif
                                                    </span>
                                                </div>
                                                <p id="step6-active-host-display" class="text-xs font-mono text-emerald-700 font-bold truncate mt-0.5">
                                                    {{ request()->getSchemeAndHttpHost() }}
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <button type="button" id="step6-host-switch-btn" onclick="toggleStep6HostOptions()" class="shrink-0 px-2.5 py-1.5 rounded-xl bg-white/95 hover:bg-white text-slate-700 hover:text-slate-900 text-xs font-medium border border-slate-200/90 shadow-2xs transition flex items-center gap-1.5 cursor-pointer" title="Ganti mode jaringan (Lokal / Wi-Fi / Online)">
                                            <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span>Opsi</span>
                                        </button>
                                    </div>

                                    <!-- Collapsible Host Switcher for Advanced Use -->
                                    <div id="step6-host-advanced-panel" class="hidden mt-3 pt-3 border-t border-emerald-200/70 space-y-2">
                                        <div class="flex items-center gap-1.5 flex-wrap">
                                            <span class="text-[11px] font-bold text-slate-700 mr-1">Pilih Mode:</span>
                                            <button type="button" id="step6-host-pill-custom" onclick="setStep6HostMode('custom')" class="px-2.5 py-1 rounded-lg text-[11px] font-bold bg-emerald-600 text-white shadow-2xs transition cursor-pointer">
                                                🌐 Online (Cloudflare)
                                            </button>
                                            <button type="button" id="step6-host-pill-wifi" onclick="setStep6HostMode('wifi')" class="px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 transition cursor-pointer">
                                                📱 Wi-Fi Lokal
                                            </button>
                                            <button type="button" id="step6-host-pill-local" onclick="setStep6HostMode('local')" class="px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 transition cursor-pointer">
                                                💻 Laptop (Localhost)
                                            </button>
                                        </div>

                                        <div id="step6-custom-host-container" class="flex items-center gap-2 pt-1">
                                            <input type="text" id="step6-custom-host-input" value="{{ request()->getSchemeAndHttpHost() }}" placeholder="https://domain-anda.com" oninput="onStep6CustomHostInput(this.value)" class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-lg text-xs font-mono text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-400">
                                            <button type="button" onclick="checkStep6CloudflareTunnel(true)" class="shrink-0 px-2.5 py-1.5 rounded-lg bg-emerald-100 hover:bg-emerald-200 text-emerald-800 text-[11px] font-bold transition cursor-pointer" title="Deteksi otomatis Cloudflare">
                                                🔄 Cek
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bagian: Link Langsung & Salin Cepat -->
                                <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/90 shadow-2xs space-y-2">
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                                        Tautan Undangan Digital
                                    </label>
                                    <div class="flex items-center gap-2">
                                        <div class="relative flex-1">
                                            <input type="text" id="step6-url-input" readonly class="w-full pl-3 pr-8 py-2.5 rounded-xl bg-white border border-slate-200 text-xs sm:text-sm font-mono text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 select-all cursor-pointer" onclick="this.select()">
                                        </div>
                                        <button type="button" id="step6-btn-copy-main-link" onclick="copyStep6MainLink()" class="px-3.5 py-2.5 rounded-xl bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-xs font-semibold shadow-[0_4px_12px_rgba(255,46,58,0.25)] flex items-center gap-1.5 shrink-0 transition cursor-pointer">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
                                            </svg>
                                            <span id="step6-copy-main-btn-text">Salin</span>
                                        </button>
                                        <a id="step6-open-link" href="#" target="_blank" class="p-2.5 rounded-xl border border-slate-200 hover:border-slate-300 bg-white hover:bg-slate-50 text-slate-600 text-xs font-semibold flex items-center justify-center shrink-0 transition" title="Buka Undangan di Tab Baru">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                                <!-- Bagian: Personalisasi Nama Tamu Cepat -->
                                <div class="p-4 rounded-2xl bg-[#DBF6FF]/35 border border-[#BAEAF8] space-y-3 shadow-2xs">
                                    <div class="flex items-center justify-between">
                                        <label for="step6-guest-name" class="block text-xs font-bold text-slate-800">
                                            Kirim ke Nama Tamu Khusus (Opsional)
                                        </label>
                                        <span class="text-[10px] font-semibold text-[#0284C7] bg-[#DBF6FF] px-2 py-0.5 rounded-full border border-[#BAEAF8]">
                                            Personalisasi Otomatis
                                        </span>
                                    </div>
                                    <div class="flex flex-col sm:flex-row gap-2">
                                        <input type="text" id="step6-guest-name" oninput="onStep6GuestNameChange(this.value)" onkeydown="if(event.key === 'Enter'){ event.preventDefault(); saveQuickGuestToStep6(); }" placeholder="Contoh: Reny Maelani / Budi & Pasangan" class="w-full px-3.5 py-2 rounded-xl bg-white border border-[#BAEAF8] text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#0284C7]/30 transition">
                                        <button type="button" onclick="saveQuickGuestToStep6()" class="px-3 py-2 rounded-xl bg-sky-600 hover:bg-sky-700 text-white text-xs font-bold shrink-0 transition flex items-center justify-center gap-1 cursor-pointer" title="Simpan tamu ini ke daftar banyak tamu">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            <span>+ Simpan</span>
                                        </button>
                                    </div>
                                    <p class="text-[11px] text-slate-500 leading-relaxed">
                                        Nama tamu otomatis muncul di sampul depan undangan digital dan terisi ke pesan WhatsApp.
                                    </p>
                                </div>
                            </div>

                            <!-- Kolom Kanan: Format Pesan & Bagikan WhatsApp (7 col) -->
                            <div class="lg:col-span-7 space-y-3.5 bg-slate-50/70 p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-2xs">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <label for="step6-whatsapp-preview" class="block text-xs font-bold uppercase tracking-wider text-slate-800">
                                            Format Pesan WhatsApp
                                        </label>
                                        <p class="text-[11px] text-slate-500">Pesan otomatis yang dikirim ke kontak WhatsApp tamu.</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button type="button" onclick="resetStep6WhatsAppTemplate()" class="px-2 py-1 rounded-lg text-xs text-slate-500 hover:text-slate-700 font-medium hover:bg-slate-200/60 transition cursor-pointer" title="Kembalikan format standar">
                                            Reset
                                        </button>
                                        <button type="button" onclick="copyStep6WhatsappText()" class="px-2.5 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-xs font-semibold text-emerald-700 hover:text-emerald-800 flex items-center gap-1 border border-emerald-200/80 cursor-pointer">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                            </svg>
                                            <span id="step6-copy-wa-label">Salin Pesan</span>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="relative whatsapp-live-preview-box">
                                    <textarea id="step6-whatsapp-preview" name="whatsapp_template" rows="7" oninput="onStep6WhatsappTextareaInput(this.value)" class="whatsapp_template_editor w-full p-3.5 rounded-xl bg-white border border-slate-200 text-xs text-slate-700 leading-relaxed font-sans focus:outline-none focus:ring-2 focus:ring-emerald-500/20 resize-none select-all shadow-2xs">{{ old('whatsapp_template', (isset($invitation) && $invitation ? $invitation->whatsapp_template : null) ?? '') }}</textarea>
                                </div>
                                
                                <div class="flex items-center gap-2 text-[10px] text-slate-500 pt-0.5">
                                    <span>Variabel:</span>
                                    <code class="px-1.5 py-0.5 rounded bg-white border border-slate-200 font-mono text-emerald-700">{nama_tamu}</code>
                                    <code class="px-1.5 py-0.5 rounded bg-white border border-slate-200 font-mono text-emerald-700">{link_undangan}</code>
                                </div>
                                
                                <!-- Tombol Utama Kirim WhatsApp -->
                                <a id="step6-wa-btn" href="#" target="_blank" onclick="ensureStep6Published()" class="w-full py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold text-sm shadow-[0_4px_14px_rgba(16,185,129,0.3)] hover:scale-[1.005] active:scale-[0.99] transition-all flex items-center justify-center gap-2 cursor-pointer">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                    <span>Buka &amp; Kirim via WhatsApp</span>
                                </a>
                            </div>
                        </div>

                        <!-- ================= TAB 2: DAFTAR TAMU & SEBAR MASSAL - LANDSCAPE GRID ================= -->
                        <div id="step6-pane-guests" class="hidden grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                            
                            <!-- Kolom Kiri: Box Kuota, Form Tambah Tamu & Solusi (5 col) -->
                            <div class="lg:col-span-5 space-y-4">
                                <!-- Box Kuota Tamu & Upgrade Alert -->
                                <div id="step6-quota-box" class="p-4 rounded-2xl bg-gradient-to-r from-slate-50 via-white to-rose-50/40 border border-slate-200/90 shadow-2xs space-y-3">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center justify-between gap-2">
                                            <div class="flex items-center gap-2 min-w-0">
                                                <div class="w-8 h-8 rounded-xl bg-rose-50 text-[#FF2E3A] flex items-center justify-center shrink-0 border border-rose-200/80">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                </div>
                                                <h4 class="font-heading text-xs sm:text-sm font-bold text-slate-900 truncate">Kapasitas Kuota Tamu</h4>
                                            </div>
                                            <span id="step6-quota-badge" class="shrink-0 px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-slate-100 text-slate-700 border border-slate-200">
                                                Paket Basic (Gratis)
                                            </span>
                                        </div>
                                        <p id="step6-quota-text" class="text-xs text-slate-500">
                                            Terpakai: <strong>0</strong> dari <strong>5</strong> Tamu (5 slot tersisa)
                                        </p>
                                    </div>

                                    <!-- Progress Bar Kuota -->
                                    <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden border border-slate-200/60">
                                        <div id="step6-quota-progress-bar" class="h-2 rounded-full bg-sky-500 transition-all duration-300" style="width: 0%"></div>
                                    </div>

                                    <div class="pt-1">
                                        <button type="button" id="step6-quota-upgrade-btn" onclick="openUpgradeModal(window.CURRENT_INVITATION_ID, 'Tingkatkan kapasitas nama tamu dengan Add-On (mulai Rp17.000) atau akses tanpa batas dengan Paket Premium (Rp59.000).', 'addon')" class="w-full py-2 px-3 rounded-xl bg-gradient-to-r from-[#FF2E3A] to-[#D61824] hover:brightness-110 text-white text-xs font-bold shadow-xs transition cursor-pointer flex items-center justify-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                                            <span>Tambah Kuota / Upgrade Paket</span>
                                        </button>
                                    </div>

                                    <!-- Alert Saat Kuota Penuh (5 Tamu Terisi) -->
                                    <div id="step6-quota-limit-warning" class="hidden p-3 rounded-xl bg-amber-50 border border-amber-300 text-amber-900 text-xs space-y-2">
                                        <div class="flex items-start gap-2">
                                            <span class="text-base shrink-0">⚠️</span>
                                            <span class="leading-relaxed"><strong>Batas Kuota Tercapai (5 Tamu):</strong> Tidak dapat menambah nama tamu baru lagi pada paket Basic. Anda tetap bisa <u>mengedit/mengganti nama tamu</u> di daftar secara <strong>Gratis</strong> kapan saja tanpa bayar, atau beli paket Add-On di bawah untuk menambah kuota!</span>
                                        </div>
                                        <button type="button" onclick="openUpgradeModal(window.CURRENT_INVITATION_ID, 'Batas maksimal 5 tamu paket Basic telah tercapai. Beli Add-On (mulai Rp17.000) atau upgrade ke Premium untuk menambah kuota tamu!', 'addon')" class="w-full py-1.5 px-3 rounded-lg bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs transition cursor-pointer shadow-2xs text-center">
                                            Beli Add-On Tamu (Mulai Rp 17.000)
                                        </button>
                                    </div>
                                </div>

                                <!-- Form Tambah Tamu Tunggal (Cepat) -->
                                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/90 shadow-2xs space-y-3" id="step6-single-guest-card">
                                    <div class="flex items-center justify-between gap-2">
                                        <h5 class="text-xs font-bold uppercase tracking-wider text-slate-800">Tambah Tamu Baru</h5>
                                        <button type="button" onclick="toggleStep6BulkAddSection()" id="step6-btn-bulk-toggle" class="px-2.5 py-1 rounded-xl bg-rose-50 hover:bg-rose-100 text-[#FF2E3A] border border-rose-200/90 text-[11px] font-bold flex items-center gap-1 transition shadow-2xs cursor-pointer shrink-0">
                                            <svg id="step6-bulk-toggle-icon" class="w-3.5 h-3.5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            <span id="step6-bulk-toggle-text">Tambah Banyak Sekaligus</span>
                                        </button>
                                    </div>
                                    <div class="space-y-2">
                                        <input type="text" id="step6-single-guest-name" name="new_guest_name_input" data-test="new_guest_name_input" onkeydown="if(event.key === 'Enter'){ event.preventDefault(); addGuestToStep6List(); }" placeholder="Ketik nama tamu (misal: Reny Maelani)..." class="w-full px-3.5 py-2 bg-white border border-slate-300 rounded-xl text-xs sm:text-sm text-slate-800 focus:outline-none focus:border-[#FF2E3A] focus:ring-2 focus:ring-[#FF2E3A]/20 transition shadow-2xs">
                                        <div class="flex gap-2">
                                            <input type="text" id="step6-single-guest-phone" name="new_guest_phone_input" data-test="new_guest_phone_input" onkeydown="if(event.key === 'Enter'){ event.preventDefault(); addGuestToStep6List(); }" placeholder="No. WA (Opsional)" class="w-full px-3.5 py-2 bg-white border border-slate-300 rounded-xl text-xs sm:text-sm text-slate-800 focus:outline-none focus:border-[#FF2E3A] transition shadow-2xs">
                                            <button type="button" id="step6-btn-add-guest" onclick="addGuestToStep6List()" class="px-4 py-2 bg-[#FF2E3A] hover:bg-[#E01E2A] text-white rounded-xl text-xs font-bold shadow-xs flex items-center justify-center gap-1.5 transition cursor-pointer shrink-0">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                </svg>
                                                <span>Tambah</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between text-[11px] text-slate-400">
                                        <span>Tekan <kbd class="px-1.5 py-0.5 rounded bg-white border border-slate-200 font-mono text-[10px] text-slate-600">Enter</kbd> untuk simpan</span>
                                        <span class="text-emerald-600 font-medium">✓ Siap WhatsApp</span>
                                    </div>
                                </div>

                                <!-- Form Tambah Banyak Sekaligus (Collapsible Bulk Add) -->
                                <div id="step6-bulk-add-section" class="hidden p-4 rounded-2xl bg-amber-50/90 border border-amber-200/90 space-y-3 shadow-2xs">
                                    <div class="flex items-center justify-between">
                                        <label class="block text-xs font-bold text-amber-900">
                                            Tempel (Paste) Daftar Nama Tamu
                                        </label>
                                        <span class="text-[10px] text-amber-700 bg-amber-100 px-2 py-0.5 rounded-full font-medium">1 baris = 1 tamu</span>
                                    </div>
                                    <textarea id="step6-bulk-guests-textarea" rows="4" placeholder="Reny Maelani&#10;Budi Santoso &amp; Pasangan&#10;Keluarga Bpk. Hendra" class="w-full p-3 rounded-xl bg-white border border-amber-300 text-xs sm:text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-400 font-sans leading-relaxed"></textarea>
                                    <div class="flex items-center justify-end gap-2">
                                        <button type="button" onclick="toggleStep6BulkAddSection()" class="px-3 py-1.5 rounded-lg bg-slate-200 text-slate-700 text-xs font-semibold hover:bg-slate-300 transition cursor-pointer">
                                            Batal
                                        </button>
                                        <button type="button" onclick="submitBulkGuestsToStep6()" class="px-3.5 py-1.5 rounded-lg bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold shadow-xs transition cursor-pointer flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            <span>Simpan Tamu</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Box Solusi & Edukasi: Edit Nama Tamu Bebas & Gratis Kapan Saja -->
                                <div class="p-3.5 sm:p-4 rounded-2xl bg-sky-50/90 border border-sky-200/90 text-sky-950 space-y-2 text-xs">
                                    <div class="flex items-center gap-2 font-bold text-sky-900">
                                        <svg class="w-4 h-4 text-sky-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>💡 Ingin Ganti Nama Tamu? Bebas &amp; 100% Gratis!</span>
                                    </div>
                                    <div class="text-[11px] text-sky-900/90 leading-relaxed space-y-1 pl-6">
                                        <p>
                                            • <strong>Edit Gratis Kapan Saja:</strong> Cukup klik kolom nama tamu atau tombol <strong>Edit</strong> di daftar samping. Tautan undangan (<code class="bg-white/80 px-1 py-0.5 rounded text-sky-700 font-mono">?to=NamaBaru</code>) otomatis berganti instan.
                                        </p>
                                        <p>
                                            • <strong>Hapus Slot:</strong> Hapus tamu yang tidak jadi diundang untuk membebaskan kuota Anda.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom Kanan: Daftar Tamu Undangan (7 col) -->
                            <div class="lg:col-span-7 space-y-3.5 bg-slate-50/60 p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-2xs flex flex-col">
                                <!-- Sub Header & Filter Pencarian -->
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 pb-2 border-b border-slate-200">
                                    <div>
                                        <h4 class="font-heading text-sm font-bold text-slate-800">Daftar Tamu Undangan</h4>
                                        <p class="text-[11px] text-slate-500">Link personal unik dibuat otomatis untuk tiap tamu.</p>
                                    </div>
                                    
                                    <!-- Pencarian Tamu -->
                                    <div id="step6-guest-search-container" class="relative sm:w-56">
                                        <input type="text" id="step6-guest-search-input" oninput="filterStep6GuestList(this.value)" placeholder="🔍 Cari nama tamu..." class="w-full pl-8 pr-3 py-1.5 rounded-xl bg-white border border-slate-200 text-xs text-slate-700 focus:outline-none focus:bg-white focus:border-slate-300 transition">
                                    </div>
                                </div>

                                <!-- Live Guest List Container (Scrollable) -->
                                <div id="step6-guests-list-container" class="space-y-2.5 max-h-[460px] overflow-y-auto pr-1">
                                    <div id="guest-table-body"></div>
                                    <!-- Populated dynamically via JS -->
                                </div>

                                <!-- Footer Tab 2: Link ke Manajemen Tamu Lengkap -->
                                <div class="pt-2 border-t border-slate-200 flex items-center justify-between text-xs">
                                    <span class="text-slate-500 text-[11px]">Ingin ekspor atau impor Excel/CSV?</span>
                                    @if(isset($invitation) && $invitation->exists)
                                    <a href="{{ route('dashboard.guests.index', $invitation) }}" class="font-bold text-[#FF2E3A] hover:underline flex items-center gap-1">
                                        <span>Buka Manajemen Tamu Lengkap &rarr;</span>
                                    </a>
                                    @else
                                    <span class="text-slate-400 italic text-[11px]">Tersedia setelah disimpan</span>
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Card Inner Footer -->
                    <div class="px-5 sm:px-6 py-3.5 bg-slate-50 border-t border-slate-200 flex items-center justify-between shrink-0">
                        <span class="text-[11px] text-slate-500 hidden sm:inline">
                            SimpulTemu Digital Wedding Share Generator
                        </span>
                        <button type="button" onclick="submitFormWithAction('publish')" class="px-5 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-semibold transition cursor-pointer ml-auto">
                            Selesai
                        </button>
                    </div>

                </div>

                <!-- Hidden Input for Form Submission to Save Guests -->
                <input type="hidden" name="guests_json" id="guestsJsonInput" value="">
                <input type="hidden" id="new_guest_phone_input" value="">
                <div id="guest-table-body" class="hidden"></div>
                </div>

                <!-- Bottom Navigation Step 6 -->
                <div class="p-5 sm:p-6 bg-white rounded-2xl border border-[#E7E0D6] flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-[0_4px_20px_rgba(0,0,0,0.02)]">
                    <button type="button" onclick="goToStep(5)" class="px-5 py-2.5 rounded-xl border border-[#E7E0D6] text-stone-700 hover:bg-stone-50 text-xs sm:text-sm font-semibold transition flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Sebelumnya: Fitur & Kado</span>
                    </button>

                    <div class="grid grid-cols-3 gap-1.5 sm:flex sm:items-center sm:gap-2.5 w-full sm:w-auto">
                        <button type="button" onclick="openPreviewInvitation()" class="px-2 sm:px-4 py-2 sm:py-2.5 rounded-xl border border-[#E7E0D6] bg-white text-stone-800 hover:bg-stone-50 text-[11px] sm:text-xs font-semibold transition shadow-xs flex items-center justify-center gap-1 sm:gap-1.5 cursor-pointer text-center" title="Lihat pratinjau langsung di tab baru">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-stone-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span class="truncate">
                                <span class="sm:hidden">Pratinjau</span>
                                <span class="hidden sm:inline">Pratinjau Undangan</span>
                            </span>
                        </button>

                        <button type="button" onclick="submitFormWithAction('save')" class="px-2 sm:px-4 py-2 sm:py-2.5 rounded-xl border border-[#E7E0D6] bg-white text-stone-800 hover:bg-stone-50 text-[11px] sm:text-xs font-semibold transition shadow-xs flex items-center justify-center gap-1 sm:gap-1.5 cursor-pointer text-center">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-stone-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                            <span class="truncate">
                                @if(isset($invitation) && $invitation->exists && $invitation->isPublished())
                                    <span class="sm:hidden">Simpan</span>
                                    <span class="hidden sm:inline">Simpan Perubahan</span>
                                @else
                                    <span>Simpan Draf</span>
                                @endif
                            </span>
                        </button>

                        @if(isset($invitation) && $invitation->exists && $invitation->isPublished())
                        <a href="{{ route('invitation.show', $invitation->slug) }}" target="_blank" class="px-2 sm:px-4 py-2 sm:py-2.5 rounded-xl font-medium text-white bg-[#1E3A5F] hover:bg-[#162D4A] shadow-[0_4px_14px_rgba(30,58,95,0.25)] text-[11px] sm:text-xs transition flex items-center justify-center gap-1 sm:gap-1.5 cursor-pointer text-center">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            <span class="truncate">
                                <span class="sm:hidden">Buka Link</span>
                                <span class="hidden sm:inline">Buka Undangan Publik</span>
                            </span>
                        </a>
                        @else
                        <button type="button" onclick="submitFormWithAction('publish')" class="px-2 sm:px-4 py-2 sm:py-2.5 rounded-xl font-medium text-white bg-[#FF2E3A] hover:bg-[#E01E2A] text-white shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:scale-[1.01] active:scale-[0.99] text-[11px] sm:text-xs transition flex items-center justify-center gap-1 sm:gap-1.5 cursor-pointer text-center">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="truncate">
                                <span class="sm:hidden">Publikasi</span>
                                <span class="hidden sm:inline">Publikasikan Undangan</span>
                            </span>
                        </button>
                        @endif
                    </div>
                </div>
            </div>

        </div>
</form>

@include('partials.theme-demo-modal')

<!-- ================= MODAL PUSTAKA MUSIK (20 LAGU: MODERN ACOUSTIC & CLASSICAL SACRED) ================= -->
<div id="music-library-modal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-md flex items-center justify-center p-3 sm:p-6 hidden">
    <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-200 flex flex-col max-h-[90vh] overflow-hidden">
        <!-- Header Bar -->
        <div class="p-5 sm:p-6 border-b border-slate-200 flex items-center justify-between bg-[#FAF8F5]">
            <div>
                <h3 class="font-serif text-lg font-bold text-slate-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#FF2E3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12 0c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                    </svg>
                    <span>Pustaka Musik Undangan (20 Lagu Bebas Royalti)</span>
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">Dengarkan preview audio instrumen legal bebas royalti atau unggah lagu Anda sendiri.</p>
            </div>
            <button type="button" onclick="closeMusicLibraryModal()" class="w-8 h-8 rounded-full bg-slate-200/80 hover:bg-slate-300 text-slate-600 hover:text-slate-900 flex items-center justify-center transition cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- In-Modal Direct MP3 Upload Section -->
        <div class="px-4 sm:px-6 py-3 border-b border-slate-200 bg-amber-50/60 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div class="flex items-center gap-2.5 min-w-0">
                <div class="w-8 h-8 rounded-lg bg-amber-100 border border-amber-300 text-[#FF2E3A] flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs font-semibold text-slate-900 leading-tight">Ingin Menggunakan Lagu Pop / Pilihan Sendiri?</p>
                    <p class="text-[11px] text-slate-500 truncate">Unggah file audio .mp3 dari perangkat Anda tanpa keluar dari modal.</p>
                </div>
            </div>
            <div class="shrink-0 flex items-center gap-2">
                <input type="file" id="modal_custom_music_input" accept="audio/mpeg,audio/mp3,audio/*" onchange="handleModalCustomAudioUpload(this)" class="hidden">
                <button type="button" onclick="document.getElementById('modal_custom_music_input').click()" class="w-full sm:w-auto px-3.5 py-1.5 bg-[#FF2E3A] hover:bg-[#E01E2A] text-white rounded-xl text-xs font-semibold transition shadow-xs flex items-center justify-center gap-1.5 cursor-pointer">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    <span>Upload Lagu Sendiri (.mp3)</span>
                </button>
            </div>
        </div>
        <div id="modal-custom-audio-status" class="px-4 sm:px-6 py-2 bg-white border-b border-slate-200 hidden"></div>

        <!-- Filter & Search Toolbar -->
        <div class="p-4 sm:p-5 border-b border-slate-200 bg-white flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
            <!-- Search Input -->
            <div class="relative flex-1">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" id="music-search-input" oninput="renderMusicLibraryList()" placeholder="Cari judul lagu atau nama komposer/artis..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-800 placeholder-stone-400 focus:outline-none focus:border-[#C2410C]">
            </div>

            <!-- Category Filter Tabs -->
            <div class="flex items-center gap-1.5 p-1 bg-slate-100 rounded-xl text-xs shrink-0 overflow-x-auto">
                <button type="button" onclick="filterMusicCategory('all')" data-category="all" class="music-tab-btn px-3 py-1.5 rounded-lg font-semibold bg-[#FF2E3A] text-white shadow-xs transition cursor-pointer shrink-0">Semua (20)</button>
                <button type="button" onclick="filterMusicCategory('Modern Acoustic')" data-category="Modern Acoustic" class="music-tab-btn px-3 py-1.5 rounded-lg font-semibold bg-slate-100 text-slate-700 hover:text-slate-900 transition cursor-pointer shrink-0">Modern Acoustic (10)</button>
                <button type="button" onclick="filterMusicCategory('Classical & Sacred')" data-category="Classical & Sacred" class="music-tab-btn px-3 py-1.5 rounded-lg font-semibold bg-slate-100 text-slate-700 hover:text-slate-900 transition cursor-pointer shrink-0">Classical & Sacred (10)</button>
            </div>
        </div>

        <!-- Tracks List Scroll Container -->
        <div class="flex-1 overflow-y-auto p-4 sm:p-6 bg-[#FAF8F5]">
            <div id="music-tracks-container" class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <!-- Populated via renderMusicLibraryList() -->
            </div>
        </div>

        <!-- Footer -->
        <div class="p-4 border-t border-slate-200 bg-white flex items-center justify-between text-xs text-slate-500">
            <span>Pilih lagu latar terbaik untuk undangan pernikahan Anda.</span>
            <button type="button" onclick="closeMusicLibraryModal()" class="px-4 py-2 rounded-xl border border-slate-200 bg-slate-100 text-slate-800 hover:bg-slate-200 font-semibold transition cursor-pointer">
                Selesai
            </button>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast-notification" class="fixed top-6 right-6 z-[100] transform transition-all duration-300 -translate-y-24 opacity-0 pointer-events-none bg-slate-900/95 text-white px-5 py-3 rounded-2xl shadow-2xl text-xs font-semibold flex items-center gap-2.5 border border-slate-700/60 backdrop-blur-md">
    <div class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
        </svg>
    </div>
    <span id="toast-message">Pesan notifikasi</span>
</div>
@endsection

@push('scripts')
<script>
    window.CURRENT_INVITATION_ID = @json($invitation->id ?? null);
    window.CURRENT_USER_PACKAGE_TIER = @json(isset($invitation) && $invitation ? $invitation->getPackageTier() : (auth()->user()?->getPackageTier() ?? 'basic'));
    window.CURRENT_GUEST_LIMIT = @json(isset($invitation) && $invitation ? $invitation->getGuestLimit() : (auth()->user()?->getGuestLimit() ?? 5));
    window.CURRENT_SONG_LIMIT = @json(isset($invitation) && $invitation ? $invitation->getSongLimit() : (auth()->user()?->getSongLimit() ?? 5));
    @if(isset($music) && count($music) > 0)
    window.DYNAMIC_MUSIC_TRACKS = @json($music);
    @endif
</script>
<!-- Dynamic Multi-Theme Engine Script -->
<script src="{{ asset('js/dynamicThemeEngine.js') }}"></script>
<script>
// State Wizard & Stepper
let currentStep = 1;
const TOTAL_STEPS = 6;
const STEP_TITLES = [
    'Pilih Tema Undangan',
    'Header Undangan & Studio Foto Tema',
    'Data Mempelai (Groom & Bride)',
    'Detail Rangkaian Acara (Akad & Resepsi)',
    'Fitur Pelengkap, Kado & Penutup',
    'Sebar Undangan & Manajemen Tamu'
];

function goToStep(step) {
    if (step < 1 || step > TOTAL_STEPS) return;

    // Guard: Mencegah lanjut ke Langkah 2 jika tema premium dipilih tapi belum di-unlock
    if (step > 1) {
        const selectedRadio = document.querySelector('.theme-radio-input:checked');
        const selectedWrapper = selectedRadio 
            ? selectedRadio.closest('.theme-card-wrapper') 
            : document.querySelector(`.theme-card-wrapper[data-theme-id="${activeThemeId}"]`);
        const isPremiumTheme = selectedWrapper && selectedWrapper.getAttribute('data-tier') === 'premium';
        const hasPremium = isUserPremium || isInvitationPremium;

        if (isPremiumTheme && !hasPremium) {
            const themeName = selectedWrapper ? selectedWrapper.getAttribute('data-name') : 'Premium';
            triggerEditorPremiumUpgrade(activeThemeId, themeName, true);
            return;
        }
    }

    currentStep = step;

    // 1. Show active step, hide others
    for (let i = 1; i <= TOTAL_STEPS; i++) {
        const pane = document.getElementById('step-content-' + i);
        if (pane) {
            if (i === currentStep) {
                pane.classList.remove('hidden');
            } else {
                pane.classList.add('hidden');
            }
        }
    }

    // 2. Update Stepper Bar UI
    updateStepperBar();

    if (step === 2) {
        updateThemePhotoGuide(activeThemeId);
    }
    if (step === 6) {
        initStep6ShareCard();
    }

    // 3. Scroll smoothly to top of form
    const formEl = document.getElementById('invitationForm');
    if (formEl) {
        formEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

function nextStep() {
    if (currentStep < TOTAL_STEPS) {
        goToStep(currentStep + 1);
    }
}

function prevStep() {
    if (currentStep > 1) {
        goToStep(currentStep - 1);
    }
}

function scrollStepper(direction) {
    const scrollContainer = document.getElementById('stepper-scroll-container');
    if (!scrollContainer) return;
    const scrollAmount = 140;
    scrollContainer.scrollBy({
        left: direction === 'right' ? scrollAmount : -scrollAmount,
        behavior: 'smooth'
    });
}

function updateStepperBar() {
    const titleEl = document.getElementById('current-step-title');
    const counterEl = document.getElementById('current-step-counter');
    if (titleEl) titleEl.innerText = `Langkah ${currentStep}: ${STEP_TITLES[currentStep - 1]}`;
    if (counterEl) counterEl.innerText = `${currentStep} / ${TOTAL_STEPS}`;

    const progressLine = document.getElementById('stepper-progress-line');
    if (progressLine) {
        const percent = ((currentStep - 1) / (TOTAL_STEPS - 1)) * 100;
        progressLine.style.width = `${percent}%`;
    }

    for (let i = 1; i <= TOTAL_STEPS; i++) {
        const circle = document.getElementById('step-circle-' + i);
        const numSpan = document.getElementById('step-num-' + i);
        const checkSvg = document.getElementById('step-check-' + i);
        const label = document.getElementById('step-label-' + i);

        if (!circle) continue;

        if (i < currentStep) {
            // Selesai (Completed): Hijau emerald dengan ceklis
            circle.className = 'w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold text-sm shadow-xs transition-all duration-200 cursor-pointer';
            if (numSpan) numSpan.classList.add('hidden');
            if (checkSvg) checkSvg.classList.remove('hidden');
            if (label) label.className = 'text-[11px] font-semibold text-stone-700 mt-2 transition text-center whitespace-nowrap';
        } else if (i === currentStep) {
            // Aktif (Current): Warna tegas dengan focus ring
            circle.className = 'w-10 h-10 rounded-xl bg-[#FF2E3A] text-white flex items-center justify-center font-bold text-sm shadow-md ring-4 ring-[#FF2E3A]/20 transition-all duration-200 cursor-pointer';
            if (numSpan) numSpan.classList.remove('hidden');
            if (checkSvg) checkSvg.classList.add('hidden');
            if (label) label.className = 'text-[11px] font-bold text-[#FF2E3A] mt-2 transition text-center whitespace-nowrap';
        } else {
            // Belum (Inactive): Netral stone
            circle.className = 'w-10 h-10 rounded-xl bg-stone-100 text-stone-500 border border-stone-300 flex items-center justify-center font-bold text-sm transition-all duration-200 group-hover:bg-stone-200 cursor-pointer';
            if (numSpan) numSpan.classList.remove('hidden');
            if (checkSvg) checkSvg.classList.add('hidden');
            if (label) label.className = 'text-[11px] font-medium text-stone-400 mt-2 transition text-center whitespace-nowrap';
        }
    }

    // Auto-scroll stepper container on mobile to center the active step
    const activeBtn = document.getElementById('step-btn-' + currentStep);
    const scrollContainer = document.getElementById('stepper-scroll-container');
    if (activeBtn && scrollContainer) {
        const containerWidth = scrollContainer.clientWidth;
        const btnLeft = activeBtn.offsetLeft;
        const btnWidth = activeBtn.clientWidth;
        const targetScroll = btnLeft - (containerWidth / 2) + (btnWidth / 2);
        scrollContainer.scrollTo({
            left: Math.max(0, targetScroll),
            behavior: 'smooth'
        });
    }
}

// Toast notification helper
function showToast(msg) {
    const toast = document.getElementById('toast-notification');
    const label = document.getElementById('toast-message');
    if (toast && label) {
        label.innerText = msg;
        toast.classList.remove('-translate-y-24', 'opacity-0', 'pointer-events-none');
        toast.classList.add('translate-y-0', 'opacity-100');
        setTimeout(() => {
            toast.classList.add('-translate-y-24', 'opacity-0', 'pointer-events-none');
            toast.classList.remove('translate-y-0', 'opacity-100');
        }, 3200);
    }
}

// State foto preview
let currentGroomPhotoUrl = "{{ isset($invitation) && $invitation->groom_photo ? Storage::url($invitation->groom_photo) : '' }}";
let currentBridePhotoUrl = "{{ isset($invitation) && $invitation->bride_photo ? Storage::url($invitation->bride_photo) : '' }}";
let currentBackgroundPhotoUrl = "{{ isset($invitation) && $invitation->background_photo ? Storage::url($invitation->background_photo) : '' }}";
let currentCountdownPhotoUrl = "{{ isset($invitation) && $invitation->countdown_photo ? Storage::url($invitation->countdown_photo) : '' }}";
let currentStoryPhoto1Url = "{{ isset($invitation) && $invitation->story_photo_1 ? Storage::url($invitation->story_photo_1) : '' }}";
let currentStoryPhoto2Url = "{{ isset($invitation) && $invitation->story_photo_2 ? Storage::url($invitation->story_photo_2) : '' }}";
let currentStoryPhoto3Url = "{{ isset($invitation) && $invitation->story_photo_3 ? Storage::url($invitation->story_photo_3) : '' }}";
let currentStoryPhoto4Url = "{{ isset($invitation) && $invitation->story_photo_4 ? Storage::url($invitation->story_photo_4) : '' }}";
let activeThemeId = parseInt(document.querySelector('.theme-radio-input:checked')?.value || 1);
let isUserPremium = @json((bool) (auth()->user()?->isPremium() ?? false));
let isInvitationPremium = @json((bool) (isset($invitation) && $invitation && $invitation->is_premium));

// Helper untuk memperbarui CSRF token dan menjaga sesi tetap aktif
async function refreshCsrfToken() {
    try {
        const res = await fetch('{{ route("csrf.refresh") }}', {
            headers: { 'Accept': 'application/json' }
        });
        if (res.ok) {
            const data = await res.json();
            if (data.token) {
                document.querySelectorAll('input[name="_token"]').forEach(el => el.value = data.token);
                document.querySelector('meta[name="csrf-token"]')?.setAttribute('content', data.token);
                return data.token;
            }
        }
    } catch (e) {
        console.warn('Could not refresh CSRF token:', e);
    }
    return null;
}

// Action form submission
async function submitFormWithAction(actionType) {
    const form = document.getElementById('invitationForm');
    form.removeAttribute('target');
    document.getElementById('formActionInput').value = actionType;
    if (typeof updateGuestsJsonInput === 'function') {
        updateGuestsJsonInput();
    }

    if (actionType === 'publish') {
        const selectedThemeCard = document.querySelector('.theme-card-wrapper[data-theme-id="' + activeThemeId + '"]');
        const isThemePremium = selectedThemeCard && selectedThemeCard.getAttribute('data-tier') === 'premium';
        if (isThemePremium && !isUserPremium && !isInvitationPremium) {
            triggerEditorPremiumUpgrade();
            return;
        }

        // Validate all required fields in steps 1 to 5
        for (let s = 1; s <= 5; s++) {
            const pane = document.getElementById('step-content-' + s);
            if (pane) {
                const inputs = pane.querySelectorAll('input[required], select[required], textarea[required]');
                for (let input of inputs) {
                    if (!input.checkValidity()) {
                        goToStep(s);
                        setTimeout(() => input.reportValidity(), 200);
                        return;
                    }
                }
            }
        }
    } else {
        // Save / Draft bypasses required HTML5 validation
        if (form) form.noValidate = true;
    }

    // Refresh CSRF token sebelum submit form agar tidak terjadi 419 Page Expired
    await refreshCsrfToken();
    form.submit();
}

// Buka Pratinjau Undangan di Tab Baru dengan perubahan data & tema secara real-time
async function openPreviewInvitation() {
    const form = document.getElementById('invitationForm');
    document.getElementById('formActionInput').value = 'preview';
    if (typeof updateGuestsJsonInput === 'function') {
        updateGuestsJsonInput();
    }
    
    // Refresh CSRF token otomatis sebelum submit preview
    await refreshCsrfToken();

    form.noValidate = true;
    form.target = '_blank';
    form.submit();
    setTimeout(() => {
        form.removeAttribute('target');
        document.getElementById('formActionInput').value = 'save';
    }, 400);
}

// Preset kutipan
const QUOTE_PRESETS = {
    ar_rum: {
        text: 'وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا لِّتَسْكُنُوا إِلَيْهَا وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً',
        translation: 'Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.',
        source: 'QS. Ar-Rum: 21'
    },
    an_nur: {
        text: 'وَأَنكِحُوا الْأَيَامَىٰ مِنكُمْ وَالصَّالِحِينَ مِنْ عِبَادِكُمْ وَإِمَائِكُمْ',
        translation: 'Dan nikahkanlah orang-orang yang masih membujang di antara kamu, dan orang-orang yang layak (berkeluarga) dari hamba-hamba sahayamu.',
        source: 'QS. An-Nur: 32'
    },
    romantic: {
        text: '',
        translation: 'Cinta tidak memiliki dan tidak ingin dimiliki, karena cinta telah cukup bagi cinta itu sendiri. Menyatukan dua jiwa dalam satu ikatan suci yang abadi.',
        source: 'Kahlil Gibran'
    }
};

function applyQuotePreset(key) {
    if (QUOTE_PRESETS[key]) {
        document.getElementById('quran_text').value = QUOTE_PRESETS[key].text;
        document.getElementById('quran_translation').value = QUOTE_PRESETS[key].translation;
        document.getElementById('quote_source').value = QUOTE_PRESETS[key].source;
        syncAllFields();
    }
}

// Toggle switch kutipan
function toggleQuoteSection(isChecked) {
    const fields = document.getElementById('quote-input-fields');
    const label = document.getElementById('quote-toggle-label');
    const mockupQuote = document.getElementById('mockup-section-quote');

    if (isChecked) {
        if (fields) fields.classList.remove('hidden');
        if (label) label.innerText = 'Aktif';
        if (mockupQuote) mockupQuote.style.display = 'block';
    } else {
        if (fields) fields.classList.add('hidden');
        if (label) label.innerText = 'Nonaktif';
        if (mockupQuote) mockupQuote.style.display = 'none';
    }
    syncAllFields();
}

// Scroll navigation bar di mockup HP
function scrollMockupTo(sectionId) {
    const target = document.getElementById(sectionId);
    if (target) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// Filter Tema
function filterThemes(tier) {
    document.querySelectorAll('.theme-tab-btn').forEach(b => {
        b.classList.remove('bg-white', 'text-stone-900', 'shadow-xs');
        b.classList.add('text-stone-600');
    });
    const activeBtn = document.getElementById('tab-' + tier);
    if (activeBtn) {
        activeBtn.classList.add('bg-white', 'text-stone-900', 'shadow-xs');
        activeBtn.classList.remove('text-stone-600');
    }

    const basicSection = document.getElementById('section-basic-container');
    const premiumSection = document.getElementById('section-premium-container');

    if (tier === 'all') {
        if (basicSection) basicSection.classList.remove('hidden');
        if (premiumSection) premiumSection.classList.remove('hidden');
    } else if (tier === 'basic') {
        if (basicSection) basicSection.classList.remove('hidden');
        if (premiumSection) premiumSection.classList.add('hidden');
    } else if (tier === 'premium') {
        if (basicSection) basicSection.classList.add('hidden');
        if (premiumSection) premiumSection.classList.remove('hidden');
    }

    document.querySelectorAll('.theme-card-wrapper').forEach(card => {
        if (tier === 'all' || card.classList.contains(tier)) {
            card.classList.remove('hidden');
        } else {
            card.classList.add('hidden');
        }
    });
}

// Handle Theme Change
function handleThemeChange(radio) {
    if (!radio) return;
    activeThemeId = parseInt(radio.value);
    const hasPremium = isUserPremium || isInvitationPremium;

    // Update all theme cards visual feedback immediately
    document.querySelectorAll('.theme-card-wrapper').forEach(card => {
        const r = card.querySelector('.theme-radio-input');
        const box = card.querySelector('.theme-card-box');
        const badge = card.querySelector('.theme-card-badge');
        const badgeText = card.querySelector('.theme-card-badge-text');
        const badgeIcon = card.querySelector('.theme-card-badge-icon');
        const checkIcon = card.querySelector('.theme-card-check');
        const isCurrent = (r && parseInt(r.value) === activeThemeId);
        const isPremiumCard = card.getAttribute('data-tier') === 'premium';

        if (r) r.checked = isCurrent;

        if (box) {
            if (isCurrent) {
                box.classList.add('border-[#FF2E3A]', 'ring-4', 'ring-[#FF2E3A]/20', 'shadow-lg');
                box.classList.remove('border-[#E7E0D6]');
            } else {
                box.classList.remove('border-[#FF2E3A]', 'ring-4', 'ring-[#FF2E3A]/20', 'shadow-lg');
                box.classList.add('border-[#E7E0D6]');
            }
        }

        if (badge) {
            if (isCurrent) {
                badge.classList.add('bg-[#FF2E3A]', 'text-white', 'border-[#FF2E3A]');
                badge.classList.remove('bg-[#FAF8F5]', 'text-[#FF2E3A]', 'border-[#E7E0D6]');
                if (badgeText) {
                    badgeText.innerText = (isPremiumCard && !hasPremium) ? 'Bayar untuk Unlock' : 'Terpilih';
                }
                if (badgeIcon) {
                    if (isPremiumCard && !hasPremium) {
                        badgeIcon.classList.add('hidden');
                    } else {
                        badgeIcon.classList.remove('hidden');
                    }
                }
            } else {
                badge.classList.remove('bg-[#FF2E3A]', 'text-white', 'border-[#FF2E3A]');
                badge.classList.add('bg-[#FAF8F5]', 'text-[#FF2E3A]', 'border-[#E7E0D6]');
                if (badgeText) badgeText.innerText = 'Pilih';
                if (badgeIcon) badgeIcon.classList.add('hidden');
            }
        }

        if (checkIcon) {
            if (isCurrent) {
                checkIcon.classList.remove('hidden');
                checkIcon.classList.add('flex');
            } else {
                checkIcon.classList.add('hidden');
                checkIcon.classList.remove('flex');
            }
        }
    });

    // Auto-sync preset music jika pengguna belum memilih lagu khusus secara manual
    const musicInput = document.getElementById('music_id');
    if (musicInput && musicInput.getAttribute('data-user-modified') !== 'true') {
        const presetMusicId = (window.THEME_PRESET_MUSIC && window.THEME_PRESET_MUSIC[activeThemeId]) 
            ? window.THEME_PRESET_MUSIC[activeThemeId].id 
            : (THEMES_CONFIG[activeThemeId]?.defaultMusicId || 1);
        if (presetMusicId) {
            musicInput.value = presetMusicId;
        }
    }

    updateThemePhotoGuide(activeThemeId);
    updateTheme7PhotoToggles();
    updatePremiumBanner();
    syncAllFields();
}

function updatePremiumBanner() {
    const selectedWrapper = document.querySelector(`.theme-card-wrapper[data-theme-id="${activeThemeId}"]`);
    const isPremiumTheme = selectedWrapper && selectedWrapper.getAttribute('data-tier') === 'premium';
    const banner = document.getElementById('premium-theme-notice-banner');
    const bannerTitle = document.getElementById('premium-banner-title');
    const hasPremium = isUserPremium || isInvitationPremium;

    if (banner) {
        if (isPremiumTheme && !hasPremium) {
            const themeName = selectedWrapper ? selectedWrapper.getAttribute('data-name') : 'Serenade';
            if (bannerTitle) {
                bannerTitle.innerText = `Tema Premium ${themeName} Terpilih (Rp 59.000 / undangan)`;
            }
            banner.classList.remove('hidden');
        } else {
            banner.classList.add('hidden');
        }
    }
}

function triggerEditorPremiumUpgrade(themeId = null, themeName = null, isStepGate = false) {
    const targetThemeId = themeId || activeThemeId;
    const selectedWrapper = document.querySelector(`.theme-card-wrapper[data-theme-id="${targetThemeId}"]`);
    const targetThemeName = themeName || (selectedWrapper ? selectedWrapper.getAttribute('data-name') : 'Premium');

    const invIdInput = document.getElementById('invitation_id_input') || document.querySelector('input[name="invitation_id"]');
    const existingId = invIdInput && invIdInput.value ? invIdInput.value : '{{ $invitation->id ?? "" }}';

    const reason = isStepGate
        ? `Tema <strong>${targetThemeName}</strong> adalah tema Premium. Silakan selesaikan pembayaran Rp 59.000 untuk membuka tema ini agar bisa lanjut ke langkah ke-2.`
        : `Buka akses tema premium <strong>${targetThemeName}</strong> dan nikmati seluruh 10 tema eksklusif + tamu undangan tanpa batas dengan Paket Premium (Rp 59.000).`;

    if (existingId) {
        if (typeof openUpgradeModal === 'function') {
            openUpgradeModal(existingId, reason, 'premium');
        }
        return;
    }

    // Auto-save draft via AJAX first to obtain invitation id
    const btn = document.getElementById('btn-editor-pay-premium');
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = `<svg class="animate-spin w-3.5 h-3.5 text-white inline-block" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> <span>Menyiapkan Duitku...</span>`;
    }

    const form = document.getElementById('invitationForm');
    const formData = new FormData(form);
    formData.set('action', 'draft');
    formData.set('theme_id', targetThemeId);

    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    fetch('{{ route("dashboard.invitations.saveDraft") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrf,
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = `<svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg> <span>Beli &amp; Bayar via Duitku</span>`;
        }
        if (data.success && data.id) {
            let input = document.getElementById('invitation_id_input');
            if (!input) {
                input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'invitation_id';
                input.id = 'invitation_id_input';
                form.appendChild(input);
            }
            input.value = data.id;
            if (typeof openUpgradeModal === 'function') {
                openUpgradeModal(data.id, reason, 'premium');
            }
        } else {
            alert(data.message || 'Gagal menyiapkan draf undangan untuk pembayaran.');
        }
    })
    .catch(err => {
        console.error(err);
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = `<svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg> <span>Beli &amp; Bayar via Duitku</span>`;
        }
        alert('Terjadi kesalahan saat menyiapkan pembayaran.');
    });
}

function onWizardPremiumUnlocked(invitationId) {
    isUserPremium = true;
    isInvitationPremium = true;

    let input = document.getElementById('invitation_id_input');
    if (!input) {
        input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'invitation_id';
        input.id = 'invitation_id_input';
        const f = document.getElementById('invitationForm');
        if (f) f.appendChild(input);
    }
    if (input && invitationId) {
        input.value = invitationId;
    }

    // Refresh active theme radio state
    const radio = document.querySelector(`.theme-card-wrapper[data-theme-id="${activeThemeId}"] .theme-radio-input`);
    if (radio) {
        radio.checked = true;
        handleThemeChange(radio);
    }

    const selectedWrapper = document.querySelector(`.theme-card-wrapper[data-theme-id="${activeThemeId}"]`);
    const themeName = selectedWrapper ? selectedWrapper.getAttribute('data-name') : 'Premium';

    showToast(`✅ Pembayaran berhasil! Tema Premium ${themeName} terbuka. Melanjutkan ke Langkah 2...`);

    // Advance to Step 2 automatically
    setTimeout(() => {
        goToStep(2);
    }, 800);
}
window.onWizardPremiumUnlocked = onWizardPremiumUnlocked;

function onWizardAddOnPurchased(packageTier, invitationId) {
    let input = document.getElementById('invitation_id_input');
    if (!input) {
        input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'invitation_id';
        input.id = 'invitation_id_input';
        const f = document.getElementById('invitationForm');
        if (f) f.appendChild(input);
    }
    if (input && invitationId) {
        input.value = invitationId;
    }

    window.CURRENT_INVITATION_ID = invitationId;
    window.CURRENT_USER_PACKAGE_TIER = packageTier;

    if (packageTier === 'basic_addon_1') {
        window.CURRENT_GUEST_LIMIT = 12;
        window.CURRENT_SONG_LIMIT = 10;
        showToast('✅ Berhasil beli Add-On 1! Kuota bertambah menjadi 12 nama tamu & 10 lagu.');
    } else if (packageTier === 'basic_addon_2') {
        window.CURRENT_GUEST_LIMIT = 17;
        window.CURRENT_SONG_LIMIT = 20;
        showToast('✅ Berhasil beli Add-On 2! Kuota bertambah menjadi 17 nama tamu & 20 lagu.');
    }

    if (typeof updateStep6GuestQuotaDisplay === 'function') {
        updateStep6GuestQuotaDisplay();
    }

    // Notice: Add-On DOES NOT unlock premium themes!
    const selectedRadio = document.querySelector('.theme-radio-input:checked');
    const selectedWrapper = selectedRadio ? selectedRadio.closest('.theme-card-wrapper') : document.querySelector(`.theme-card-wrapper[data-theme-id="${activeThemeId}"]`);
    const isPremiumTheme = selectedWrapper && selectedWrapper.getAttribute('data-tier') === 'premium';
    if (isPremiumTheme && !isUserPremium && !isInvitationPremium) {
        setTimeout(() => {
            alert('Perhatian: Paket Add-On Anda berhasil aktif (kuota tamu & lagu bertambah). Namun tema yang saat ini Anda pilih adalah tema Premium. Paket Add-On tidak membuka tema Premium. Untuk membuka tema Premium dan lanjut ke Langkah 2, silakan upgrade ke Paket Premium (Rp 59.000) atau pilih tema Basic gratis.');
        }, 400);
    }
}
window.onWizardAddOnPurchased = onWizardAddOnPurchased;

// ================= THEME PHOTO STUDIO CONFIG (ALL 20 THEMES) =================
const THEME_PHOTO_CONFIG = {
    1: {
        id: 1,
        name: "Basic Harmony Maroon",
        tier: "basic",
        iconSvg: '<svg class="w-5 h-5 text-rose-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5a3 3 0 1 1 3 3m-3-3a3 3 0 1 0-3 3m3-3v12m0 0c-1.5 0-3-1-3-3s1.5-3 3-3 3 1 3 3-1.5 3-3 3m-6-6a3 3 0 1 0 3-3m-3 3a3 3 0 1 1 3 3m12-3a3 3 0 1 0-3-3m3 3a3 3 0 1 1-3 3"/></svg>',
        desc: "Classic romantic editorial bernuansa maroon elegan dan aksen emas. Desktop menggunakan tata letak dua sisi sinematik (kiri panel foto besar, kanan konten undangan ber-scroll).",
        tags: ["Cover Buka Undangan", "Cerita Cinta (3 Foto)", "Galeri (6 Foto)", "Mempelai (Pria & Wanita)"],
        coverTitle: "1. Foto Cover Buka Undangan (Portrait 3:4 / 9:16)",
        coverSubtitle: "Tampil di layar pembuka & panel kiri desktop dengan gradasi maroon sinematik",
        coverGuide: "Foto ini menjadi tampilan pembuka utama saat tamu menerima tautan undangan. Pada desktop, foto ini mengisi panel kiri besar yang megah. Jika tidak diunggah, sistem memakai foto default.",
        hasStoryPhotos: true,
        storyPhotosCount: 3,
        storySubtitle: "3 Foto perjalanan kisah cinta mempelai (Awal Bertemu, Merajut Komitmen, dan Menuju Pernikahan)",
        storyGuide: "Unggah 3 foto untuk momen perjalanan cinta: Foto 1 untuk Awal Bertemu, Foto 2 untuk Merajut Komitmen, dan Foto 3 untuk Menuju Pelaminan.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 6,
        galleryTip: "Kapasitas galeri rekomendasi 6 foto pre-wedding berhias ornamen mawar klasik.",
        slots: [
            { title: "1. Foto Cover Buka Undangan", desc: "Diatur di Langkah 2 (background_photo). Tampil di layar cover pembuka & panel kiri desktop." },
            { title: "2. Cerita Cinta (3 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 s/d 3). 3 foto perjalanan asmara berbingkai editorial maroon." },
            { title: "3. Galeri Foto Bahagia (6 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). Grid 6 foto pre-wedding dengan resolusi tajam." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Avatar lingkaran mempelai berhias bingkai mawar." }
        ]
    },
    2: {
        id: 2,
        name: "Basic Harmony Emerald",
        tier: "basic",
        iconSvg: '<svg class="w-5 h-5 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>',
        desc: "Desain kubah lengkung modern (Side Arch) berlatar soft ivory dan aksen hijau zamrud alami dengan ranting eucalyptus berayun lembut.",
        tags: ["Cover Kubah Lengkung", "Galeri (6 Foto)", "Mempelai (Pria & Wanita)"],
        coverTitle: "1. Foto Cover Buka Undangan (Arch Dome Frame)",
        coverSubtitle: "Foto utama pasangan dalam bingkai kubah lengkung (side arch) emerald",
        coverGuide: "Tampil di kartu cover pembuka berbingkai kubah lengkung (side arch) bernuansa eucalyptus zamrud. Jika tidak diunggah, menggunakan foto default.",
        hasStoryPhotos: false,
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 6,
        galleryTip: "Kapasitas galeri rekomendasi 6 foto dalam tata letak kubah lengkung emerald yang elegan.",
        slots: [
            { title: "1. Foto Cover Kubah Lengkung", desc: "Diatur di Langkah 2 (background_photo). Ditampilkan dalam bingkai lengkung kubah emerald." },
            { title: "2. Galeri Bahagia (6 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). 6 foto tersusun rapi dalam bingkai emas emerald." },
            { title: "3. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Profil mempelai berhias garis eucalyptus." }
        ]
    },
    3: {
        id: 3,
        name: "Basic Harmony Navy",
        tier: "basic",
        iconSvg: '<svg class="w-5 h-5 text-blue-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.8 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>',
        desc: "Gaya formal maskulin dengan frame simetris elegan, aksen midnight navy pinstripe ganda dan monogram geometris emas.",
        tags: ["Cover Formal Persegi", "Love Story (3 Foto)", "Galeri (6 Foto)", "Mempelai (Pria & Wanita)"],
        coverTitle: "1. Foto Cover Buka Undangan (Formal Square Frame)",
        coverSubtitle: "Foto formal dalam bingkai simetris midnight navy dan aksen emas",
        coverGuide: "Tampil di bingkai simetris navy formal pada kartu pembuka dan layar utama. Jika tidak diunggah, memakai foto default.",
        hasStoryPhotos: true,
        storyPhotosCount: 3,
        storySubtitle: "3 Foto love story perjalanan cinta berbingkai formal midnight navy",
        storyGuide: "Unggah 3 foto momen cinta: Momen Perkenalan, Menjalin Hubungan, dan Janji Suci Pernikahan.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 6,
        galleryTip: "Kapasitas galeri rekomendasi 6 foto dalam tata letak formal square simetris midnight navy.",
        slots: [
            { title: "1. Foto Cover Buka Undangan", desc: "Diatur di Langkah 2 (background_photo). Bingkai formal persegi midnight navy bergaris emas." },
            { title: "2. Foto Love Story (3 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 s/d 3). 3 foto perjalanan asmara bergaris emas elegan." },
            { title: "3. Galeri Our Moments (6 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). Koleksi 6 foto berbaris dalam layout editorial formal." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Profil mempelai simetris elegan." }
        ]
    },
    4: {
        id: 4,
        name: "Basic Wanted Poster",
        tier: "basic",
        iconSvg: '<svg class="w-5 h-5 text-amber-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 21h12a2 2 0 0 0 2-2v-2H10v2a2 2 0 1 1-4 0V5a2 2 0 1 0-4 0v3h4"/><path d="M19 17V5a2 2 0 0 0-2-2H4"/></svg>',
        desc: "Desain vintage western Wanted Poster dengan tekstur kertas usang, font gothic blackletter, layout dua sisi, ornamen malaikat klasik, dan cap WANTED merah.",
        tags: ["Cover Wanted Poster", "Love Story (2 Foto)", "Galeri (5 Foto)", "Mempelai"],
        coverTitle: "1. Foto Cover Utama (Wanted Poster Frame)",
        coverSubtitle: "Foto pasangan berbingkai poster buronan vintage western lengkap dengan cap WANTED",
        coverGuide: "Foto pasangan berbingkai poster buronan vintage western lengkap dengan cap WANTED dan tekstur kertas usang.",
        hasStoryPhotos: true,
        storyPhotosCount: 2,
        storySubtitle: "2 Foto kisah cinta berbingkai kertas usang sepia (Awal Bertemu & Komitmen Bersama)",
        storyGuide: "Tema ini menampilkan 2 foto perjalanan cinta berbingkai lembaran kertas usang vintage ala barat: Bab 1 (Awal Bertemu) dan Bab 2 (Komitmen Bersama).",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 5,
        galleryTip: "Kapasitas galeri rekomendasi 5 foto dalam kolase polaroid vintage barat.",
        slots: [
            { title: "1. Foto Cover Poster Wanted", desc: "Diatur di Langkah 2 (background_photo). Foto utama di tengah poster buronan barat klasik." },
            { title: "2. Foto Love Story (2 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 & 2). 2 foto kisah cinta berbingkai lembaran kertas usang sepia." },
            { title: "3. Galeri Foto Wanted (5 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). Kolase 5 foto ala selebaran barat tempo dulu." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Profil mempelai gaya koboi vintage." }
        ]
    },
    5: {
        id: 5,
        name: "Basic Harmony Monochrome",
        tier: "basic",
        iconSvg: '<svg class="w-5 h-5 text-stone-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="10" r="10"/><path d="M12 18a6 6 0 0 0 0-12v12z"/></svg>',
        desc: "Desain high-fashion hitam-putih monokrom dengan foto sampul editorial sinematik, pita foto bergulir otomatis (rolling strip), dan galeri modern.",
        tags: ["Foto Sampul", "6 Foto Rolling Strip Otomatis", "Galeri (6 Foto)", "Mempelai"],
        coverTitle: "1. Foto Sampul Buka Undangan (Editorial Sinematik)",
        coverSubtitle: "Layar pembuka monokrom dengan gradasi gelap kebawah yang elegan dan dramatis",
        coverGuide: "Foto sampul utama bergradasi sinematik monokrom modern. Di desktop terbagi menjadi 2 panel editorial berkelas.",
        hasStoryPhotos: false,
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 6,
        galleryTip: "Kapasitas galeri 6 foto: foto-foto ini otomatis mengisi animasi pita foto bergulir (rolling strip) dan seksi galeri foto utama.",
        slots: [
            { title: "1. Foto Sampul Buka Undangan", desc: "Diatur di Langkah 2 (background_photo). Tampil di layar cover pembuka monokrom sinematik." },
            { title: "2. 6 Foto Otomatis Scroll & Galeri", desc: "Diatur di Langkah 2 (gallery_photos). 6 foto pre-wedding otomatis tampil di rolling strip bergulir & grid galeri." },
            { title: "3. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Frame kapsul hitam modern #2C2D2F." }
        ]
    },
    6: {
        id: 6,
        name: "Basic Soft Blue Botanical",
        tier: "basic",
        iconSvg: '<svg class="w-5 h-5 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 8a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/></svg>',
        desc: "Pesona botani biru lembut editorial dengan ornamen dedaunan biru anggun, layout kubah arch modern, aksen pastel kuning hangat, dan panel desktop denim elegan.",
        tags: ["Cover Soft Blue", "Galeri Kubah (6 Foto)", "Mempelai"],
        coverTitle: "1. Foto Cover Buka Undangan (Portrait 3:4)",
        coverSubtitle: "Foto potret utama di layar pembuka & panel hero berhias ornamen botani biru lembut",
        coverGuide: "Foto potret utama yang tampil pada kartu pembuka dan panel hero berhias ornamen dedaunan botanical.",
        hasStoryPhotos: false,
        storyPhotosCount: 0,
        storySubtitle: "",
        storyGuide: "",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 6,
        galleryTip: "Kapasitas galeri rekomendasi 6 foto dengan grid kubah arch 3 kolom x 2 baris yang estetik.",
        slots: [
            { title: "1. Foto Cover Buka Undangan", desc: "Diatur di Langkah 2 (background_photo). Foto potret utama berhias ornamen botani biru lembut." },
            { title: "2. Galeri Foto Bahagia (6 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). 6 foto pre-wedding berformat grid kubah arch 3x2." },
            { title: "3. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Avatar lingkaran mempelai berbingkai double ring biru." }
        ]
    },
    7: {
        id: 7,
        name: "Basic Lilac Blooms",
        tier: "basic",
        iconSvg: '<svg class="w-5 h-5 text-purple-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>',
        desc: "Nuansa ungu lilac ceria dan romantis dengan layout dua sisi desktop, ilustrasi bunga lilac manis, dan navigasi melengkung ungu.",
        tags: ["Cover Lilac Circle", "Galeri (6 Foto)", "Mempelai"],
        coverTitle: "1. Foto Cover Buka Undangan (Lilac Circle Frame)",
        coverSubtitle: "Foto utama pasangan dalam bingkai melingkar ungu lilac di layar pembuka",
        coverGuide: "Foto utama berdua dalam bingkai melingkar ungu lilac di layar pembuka & panel kiri desktop.",
        hasStoryPhotos: false,
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 6,
        galleryTip: "Kapasitas galeri rekomendasi 6 foto dalam nuansa ungu lilac lembut.",
        slots: [
            { title: "1. Foto Cover Buka Undangan", desc: "Diatur di Langkah 2 (background_photo). Bingkai melingkar ungu lilac di cover pembuka." },
            { title: "2. Galeri Foto Lilac (6 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). Grid 6 foto pre-wedding berbingkai lilac." },
            { title: "3. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Avatar lingkaran mempelai ungu lilac." }
        ]
    },
    8: {
        id: 8,
        name: "Basic Sunny Botanical",
        tier: "basic",
        iconSvg: '<svg class="w-5 h-5 text-amber-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>',
        desc: "Kesegaran dedaunan botani hijau sage dengan nuansa hangat matahari, tipografi serif modern, dan kartu organic soft.",
        tags: ["Cover Daun Sage", "Our Story (2 Foto)", "Galeri (5 Foto)", "Mempelai"],
        coverTitle: "1. Foto Cover Buka Undangan (Botanical Sage Frame)",
        coverSubtitle: "Foto utama diapit dedaunan botani hijau sage di bagian atas dan bawah kartu cover",
        coverGuide: "Foto utama diapit dedaunan botani hijau sage di bagian atas dan bawah kartu cover pembuka. Tampil alami dan asri.",
        hasStoryPhotos: true,
        storyPhotosCount: 2,
        storySubtitle: "2 Foto Our Story khusus perjalanan cinta: Pertemuan Pertama & Menuju Pelaminan",
        storyGuide: "Unggah 2 foto kisah cinta: Foto 1 untuk momen pertemuan pertama, dan Foto 2 untuk momen menuju pelaminan berhias dedaunan sage.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 5,
        galleryTip: "Kapasitas galeri rekomendasi 5 foto dalam tata letak botani alami hijau sage.",
        slots: [
            { title: "1. Foto Cover Buka Undangan", desc: "Diatur di Langkah 2 (background_photo). Foto utama berhias dedaunan botani hijau sage." },
            { title: "2. Foto Our Story (2 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 & 2). 2 foto perjalanan cinta (Pertemuan & Pelaminan)." },
            { title: "3. Galeri Foto Botani (5 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). Grid 5 foto pre-wedding berbingkai sage natural." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Profil mempelai berhias ilustrasi daun sage." }
        ]
    },
    9: {
        id: 9,
        name: "Basic Whispering Garden",
        tier: "basic",
        iconSvg: '<svg class="w-5 h-5 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/></svg>',
        desc: "Romansa pesta kebun berbisik dengan ornamen gazebo, pepohonan rindang, kupu-kupu terbang, dan nuansa alam asri.",
        tags: ["Cover Gazebo Taman", "Our Story (3 Foto)", "Galeri (6 Foto)", "Mempelai"],
        coverTitle: "1. Foto Cover Buka Undangan (Garden Gazebo Frame)",
        coverSubtitle: "Foto utama di dalam lengkungan gazebo taman bunga berhias dedaunan asri",
        coverGuide: "Foto utama di dalam lengkungan gazebo taman bunga dengan sentuhan dedaunan asri pesta kebun.",
        hasStoryPhotos: true,
        storyPhotosCount: 3,
        storySubtitle: "3 Foto Our Story berbingkai taman bunga asri (Awal Jumpa, Kencan Pertama, dan Bahagia Bersama)",
        storyGuide: "Unggah 3 foto perjalanan asmara berlatar suasana kebun romantis.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 6,
        galleryTip: "Kapasitas galeri rekomendasi 6 foto berlatar suasana pesta kebun asri.",
        slots: [
            { title: "1. Foto Cover Gazebo", desc: "Diatur di Langkah 2 (background_photo). Lengkungan gazebo taman pesta kebun." },
            { title: "2. Foto Our Story (3 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 s/d 3). 3 foto kisah cinta bertema taman kebun." },
            { title: "3. Galeri Foto Taman (6 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). 6 foto pre-wedding berhias ornamen kebun." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Profil mempelai di bawah rindang pepohonan." }
        ]
    },
    10: {
        id: 10,
        name: "Basic Editorial Newspaper",
        tier: "basic",
        iconSvg: '<svg class="w-5 h-5 text-stone-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>',
        desc: "Gaya koran vintage berkelas dengan kolom surat kabar era 1920-an, headline tebal The Wedding Gazette, dan cuplikan artikel pernikahan.",
        tags: ["Headline Utama Koran", "Our Story (2 Foto)", "Kolase Koran (5 Foto)", "Mempelai"],
        coverTitle: "1. Foto Headline Utama Koran (The Wedding Gazette)",
        coverSubtitle: "Foto headline berita utama di halaman depan koran vintage The Wedding Gazette",
        coverGuide: "Foto utama berdua di halaman depan surat kabar The Wedding Gazette dengan teks berita vintage.",
        hasStoryPhotos: true,
        storyPhotosCount: 2,
        storySubtitle: "2 Foto dokumenter liputan Our Story kedua mempelai dalam format koran klasik",
        storyGuide: "2 Foto berita dokumenter perjalanan cinta Anda berdua ala liputan khusus surat kabar tempo dulu.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 5,
        galleryTip: "Kapasitas galeri rekomendasi 5 foto dalam kolase kliping koran bersejarah.",
        slots: [
            { title: "1. Foto Headline Koran", desc: "Diatur di Langkah 2 (background_photo). Foto headline berita utama halaman depan koran." },
            { title: "2. Foto Our Story (2 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 & 2). 2 foto dokumenter perjalanan asmara kedua mempelai." },
            { title: "3. Kolase Foto Bersejarah (5 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). Kolase 5 foto kliping surat kabar vintage." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Foto profil hitam-putih/sepia kolom redaksi." }
        ]
    },
    11: {
        id: 11,
        name: "Premium Nostalgic Village",
        tier: "premium",
        iconSvg: '<svg class="w-5 h-5 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
        desc: "Nuansa pedesaan hangat & nostalgia romantis dengan pemandangan sawah terasering, animasi mobil interaktif, pendopo senja, dan 8 foto galeri polaroid kenangan indah.",
        tags: ["Cover Landscape Pedesaan", "Perjalanan Kami", "Galeri Polaroid (8 Foto)", "Mempelai"],
        coverTitle: "1. Foto Cover Buka Undangan (Polaroid Nostalgia Pedesaan)",
        coverSubtitle: "Foto cover portrait/landscape dengan bingkai polaroid klasik di panel pembuka & panel kiri desktop",
        coverGuide: "Foto pasangan berdua dalam kartu polaroid klasik berlatar pemandangan pedesaan asri dengan countdown timer fungsional.",
        hasStoryPhotos: true,
        storyPhotosCount: 2,
        storySubtitle: "2 Foto Cerita Cinta / Perjalanan Kami berbingkai polaroid klasik",
        storyGuide: "Unggah 2 foto potret untuk seksi perjalanan cinta kami dengan ornamen sepeda dan mobil pedesaan.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 8,
        galleryTip: "Kapasitas galeri hingga 8 foto polaroid kenangan indah dengan tombol navigasi geser & lightbox.",
        slots: [
            { title: "1. Foto Cover Utama", desc: "Diatur di Langkah 2 (background_photo). Polaroid utama di halaman pembuka & panel kiri desktop." },
            { title: "2. Cerita Cinta / Perjalanan Kami (2 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 & 2). 2 foto perjalanan cinta bernuansa nostalgia pedesaan." },
            { title: "3. Galeri Foto Polaroid (8 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). 8 foto polaroid kenangan dengan tombol navigasi geser & lightbox." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Foto portrait mempelai berlatar kertas klasik yang elegan." }
        ]
    },
    12: {
        id: 12,
        name: "Premium Champagne Bloom",
        tier: "premium",
        iconSvg: '<svg class="w-5 h-5 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 22h8"/><path d="M7 10h10"/><path d="M12 15v7"/><path d="M12 15a5 5 0 0 0 5-5c0-2-.5-4-2-8H9c-1.5 4-2 6-2 8a5 5 0 0 0 5 5Z"/></svg>',
        desc: "Boho Pampas & Champagne Bloom dengan tekstur watercolor champagne hangat, circular floral ring frame, pampas grass kering, dan aksen terracotta gold luxury.",
        tags: ["Cover Lingkaran Boho Pampas", "Our Story (2 Foto)", "Galeri (6 Foto)", "Mempelai"],
        coverTitle: "1. Foto Cover Buka Undangan (Boho Circle Pampas Frame)",
        coverSubtitle: "Foto pasangan dalam bingkai lingkaran bunga pampas grass kering berlatar watercolor champagne hangat",
        coverGuide: "Foto pasangan berdua di dalam bingkai lingkaran (circular floral ring) berhias pampas grass kering dan bunga mawar champagne mewah.",
        hasStoryPhotos: true,
        storyPhotosCount: 2,
        storySubtitle: "2 Foto Our Story berbingkai kartu watercolor champagne & pampas grass",
        storyGuide: "2 Foto kisah perjalanan cinta Anda berdua dalam nuansa boho pampas & champagne hangat.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 6,
        galleryTip: "Kapasitas galeri rekomendasi 6 foto pre-wedding berhias ornamen floral pampas grass dan aksen emas champagne.",
        slots: [
            { title: "1. Foto Cover Lingkaran Pampas", desc: "Diatur di Langkah 2 (background_photo). Bingkai circular floral ring pampas grass di layar pembuka." },
            { title: "2. Foto Our Story (2 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 & 2). 2 foto kisah cinta beraksen pampas terracotta." },
            { title: "3. Galeri Champagne Bloom (6 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). 6 foto pre-wedding berlatar watercolor champagne." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Profil mempelai berbingkai lingkaran boho pampas." }
        ]
    },
    13: {
        id: 13,
        name: "Premium Summer Vibes",
        tier: "premium",
        iconSvg: '<svg class="w-5 h-5 text-amber-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 10V2"/><path d="m4.93 10.93 1.41 1.41"/><path d="M2 18h2"/><path d="M20 18h2"/><path d="m19.07 10.93-1.41 1.41"/><path d="M22 22H2"/><path d="m16 6-4 4-4-4"/><path d="M16 18a4 4 0 0 0-8 0"/></svg>',
        desc: "Suasana ceria musim panas dengan palet hangat keemasan, frame kartu pos liburan, dan ornamen tropis yang hidup.",
        tags: ["Cover Kartu Pos", "Cerita Cinta Kita (3 Foto)", "Galeri Pos (8 Foto)", "Mempelai"],
        coverTitle: "1. Foto Cover Buka Undangan (Summer Postcard Frame)",
        coverSubtitle: "Foto outdoor ceria berbingkai kartu pos musim panas berhias stempel pos eksotis",
        coverGuide: "Foto outdoor ceria berbingkai kartu pos musim panas berhias stempel pos eksotis.",
        hasStoryPhotos: true,
        storyPhotosCount: 3,
        storySubtitle: "3 Foto kartu pos Cerita Cinta Kita / Our Love Journey",
        storyGuide: "Unggah 3 foto kartu pos kenangan manis cinta berdua: Pertemuan Pertama, Petualangan Bersama, dan Menuju Selamanya.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 8,
        galleryTip: "Kapasitas galeri rekomendasi 8 foto dalam tata letak kartu pos polaroid liburan musim panas.",
        slots: [
            { title: "1. Foto Cover Kartu Pos", desc: "Diatur di Langkah 2 (background_photo). Kartu pos outdoor ceria musim panas." },
            { title: "2. Cerita Cinta Kita (3 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 s/d 3). 3 foto kartu pos kenangan musim panas." },
            { title: "3. Galeri Kartu Pos (8 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). Kolase kartu pos polaroid musim panas." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Profil mempelai bergaya santai ceria." }
        ]
    },
    14: {
        id: 14,
        name: "Premium Fairytale Castle",
        tier: "premium",
        iconSvg: '<svg class="w-5 h-5 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 20v-9H2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2Z"/><path d="M18 11V4H6v7"/><path d="M15 22v-4a3 3 0 0 0-6 0v4"/><path d="M22 11V9"/><path d="M2 11V9"/><path d="M6 4V2"/><path d="M18 4V2"/><path d="M10 4V2"/><path d="M14 4V2"/></svg>',
        desc: "Dunia dongeng kerajaan istana megah berlatar awan merah muda, kastil impian, dan kilauan cahaya peri yang memesona.",
        tags: ["Cover Istana Dongeng", "Kisah Cinta (2 Foto)", "Galeri Kerajaan (5 Foto)", "Mempelai"],
        coverTitle: "1. Foto Cover Buka Undangan (Fairytale Oval Arch Frame)",
        coverSubtitle: "Foto portrait dalam bingkai kubah kastil ajaib berhias bunga mawar merah muda",
        coverGuide: "Foto portrait dalam bingkai kubah kastil ajaib berhias bunga mawar merah muda di depan istana peri.",
        hasStoryPhotos: true,
        storyPhotosCount: 2,
        storySubtitle: "2 Foto kisah cinta berlatar kerajaan dongeng (Pertemuan & Ikatan Selamanya)",
        storyGuide: "2 Foto kisah cinta berlatar istana dongeng impian kedua mempelai.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 5,
        galleryTip: "Kapasitas galeri rekomendasi 5 foto dalam album dongeng kerajaan merah muda.",
        slots: [
            { title: "1. Foto Cover Istana Peri", desc: "Diatur di Langkah 2 (background_photo). Bingkai kubah kastil ajaib berhias mawar merah muda." },
            { title: "2. Kisah Cinta Dongeng (2 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 & 2). 2 foto kisah cinta berlatar istana dongeng." },
            { title: "3. Galeri Kerajaan (5 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). 5 foto album istana dongeng romantis." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Profil pangeran & putri kerajaan." }
        ]
    },
    15: {
        id: 15,
        name: "Premium Amber Serenade",
        tier: "premium",
        iconSvg: '<svg class="w-5 h-5 text-amber-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/><path d="M20 3v4"/><path d="M22 5h-4"/></svg>',
        desc: "Kemewahan malam bertabur gemerlap amber emas hangat berlatar hitam pekat, ornamen mawar emas sudut simetris, dan kaligrafi berkelas tinggi.",
        tags: ["Cover Amber Glow", "Love Story (3 Foto)", "Galeri Mewah (5 Foto)", "Mempelai"],
        coverTitle: "1. Foto Cover Buka Undangan (Amber Serenade Glow Frame)",
        coverSubtitle: "Foto dramatis berlatar malam bertabur cahaya lampu amber keemasan",
        coverGuide: "Foto dramatis berlatar malam bertabur cahaya lampu amber keemasan di layar pembuka.",
        hasStoryPhotos: true,
        storyPhotosCount: 3,
        storySubtitle: "3 Foto Love Story berhias aura amber emas berkilau",
        storyGuide: "Unggah 3 foto perjalanan cinta bertabur cahaya keemasan lampu amber mewah.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 5,
        galleryTip: "Kapasitas galeri rekomendasi 5 foto mewah dalam nuansa black & gold amber.",
        slots: [
            { title: "1. Foto Cover Amber Glow", desc: "Diatur di Langkah 2 (background_photo). Foto malam dramatis berhias gemerlap lampu amber." },
            { title: "2. Foto Love Story (3 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 s/d 3). 3 foto perjalanan cinta bertabur cahaya keemasan." },
            { title: "3. Galeri Midnight Luxury (5 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). 5 foto pre-wedding beraksen emas amber." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Profil mewah dengan garis emas berkilau." }
        ]
    },
    16: {
        id: 16,
        name: "Premium Museum of Love",
        tier: "premium",
        iconSvg: '<svg class="w-5 h-5 text-amber-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="2" x2="22" y1="22" y2="22"/><line x1="6" x2="6" y1="18"/><line x1="10" x2="10" y1="18"/><line x1="14" x2="14" y1="18"/><line x1="18" x2="18" y1="18"/><polygon points="12 2 20 7 4 7"/></svg>',
        desc: "Konsep pameran karya seni museum bertaraf internasional dengan pigura emas klasik, pencahayaan galeri eksklusif, dan nomor kurasi.",
        tags: ["Mahakarya Lukisan Emas", "Cerita Kita (2 Foto)", "Galeri Kurasi (5 Foto)", "Mempelai"],
        coverTitle: "1. Foto Mahakarya Utama (Museum Gold Painting Frame)",
        coverSubtitle: "Masterpiece foto utama berbingkai pigura lukisan museum emas",
        coverGuide: "Masterpiece foto utama berbingkai pigura lukisan museum emas dengan kurasi eksklusif pameran seni cinta.",
        hasStoryPhotos: true,
        storyPhotosCount: 2,
        storySubtitle: "2 Foto Cerita Kita di koridor pameran mahakarya museum cinta",
        storyGuide: "2 Foto karya seni perjalanan cinta di ruang pameran eksklusif bernomor kurasi.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 5,
        galleryTip: "Kapasitas galeri hingga 5 foto dalam pigura pameran mahakarya museum seni internasional.",
        slots: [
            { title: "1. Foto Mahakarya Utama", desc: "Diatur di Langkah 2 (background_photo). Masterpiece lukisan museum pigura emas klasik." },
            { title: "2. Cerita Kita (2 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 & 2). 2 foto karya seni perjalanan cinta di ruang pameran." },
            { title: "3. Galeri Kurasi Mahakarya (5 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). 5 pigura seni dengan nomor kurasi museum." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Lukisan potret mempelai berbingkai emas." }
        ]
    },
    17: {
        id: 17,
        name: "Premium Ethereal Bloom",
        tier: "premium",
        iconSvg: '<svg class="w-5 h-5 text-pink-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h12l4 6-10 12L2 9Z"/><path d="M11 3 8 9l4 12 4-12-3-6"/><path d="M2 9h20"/></svg>',
        desc: "Nuansa kelopak bunga melayang di udara dengan transisi halus, frame melingkar putih estetik, dan aksen biru lembut.",
        tags: ["Cover Melingkar Melayang", "Our Story (2 Foto)", "Galeri Bloom (8 Foto)", "Mempelai"],
        coverTitle: "1. Foto Cover Buka Undangan (Ethereal Floating Circle Frame)",
        coverSubtitle: "Foto pasangan dalam frame lingkaran putih anggun melayang di antara kelopak bunga",
        coverGuide: "Foto pasangan dalam frame lingkaran putih anggun melayang di antara kelopak bunga sakura biru.",
        hasStoryPhotos: true,
        storyPhotosCount: 2,
        storySubtitle: "2 Foto Our Story berhias kelopak bunga melayang di udara",
        storyGuide: "2 Foto kisah cinta dalam kartu kelopak bunga mekar melayang.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 8,
        galleryTip: "Kapasitas galeri hingga 8 foto dengan kartu kelopak bunga melayang yang estetik.",
        slots: [
            { title: "1. Foto Cover Buka Undangan", desc: "Diatur di Langkah 2 (background_photo). Frame lingkaran putih melayang di antara kelopak bunga." },
            { title: "2. Foto Our Story (2 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 & 2). 2 foto kisah cinta berhias kelopak bunga." },
            { title: "3. Galeri Ethereal (8 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). 8 foto pre-wedding berhias bunga mekar." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Avatar bulat berbingkai kelopak bunga halus." }
        ]
    },
    18: {
        id: 18,
        name: "Premium Crayon Dreams",
        tier: "premium",
        iconSvg: '<svg class="w-5 h-5 text-rose-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg>',
        desc: "Estetika coretan krayon pastel lucu & doodle hand-drawn menggemaskan, polaroid cinta, burung merpati, dan pesawat kertas.",
        tags: ["Polaroid Krayon Ceria", "Cerita Cinta Kita (3 Foto)", "Galeri Polaroid (8 Foto)", "Mempelai Doodle"],
        coverTitle: "1. Foto Cover Buka Undangan (Pastel Crayon Polaroid Frame)",
        coverSubtitle: "Foto berbingkai polaroid sketsa krayon pastel dengan jepitan kayu lucu",
        coverGuide: "Foto berbingkai polaroid sketsa krayon pastel dengan jepitan kayu lucu dan pesawat kertas.",
        hasStoryPhotos: true,
        storyPhotosCount: 3,
        storySubtitle: "3 Foto Cerita Cinta Kita manis berhias coretan pensil warna pastel",
        storyGuide: "3 Foto doodle kisah cinta manis warna pastel berhias stiker doodle menggemaskan.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 8,
        galleryTip: "Kapasitas galeri rekomendasi 8 foto dalam koleksi polaroid sketsa krayon lucu.",
        slots: [
            { title: "1. Foto Cover Polaroid Krayon", desc: "Diatur di Langkah 2 (background_photo). Polaroid sketsa krayon pastel dengan jepitan kayu." },
            { title: "2. Cerita Cinta Kita (3 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 s/d 3). 3 foto doodle kisah cinta bertabur stiker lucu." },
            { title: "3. Galeri Polaroid Crayon (8 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). 8 polaroid ceria berhias pesawat kertas." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Avatar kartun/doodle mempelai yang menggemaskan." }
        ]
    },
    19: {
        id: 19,
        name: "Premium Sahala Pattern",
        tier: "premium",
        iconSvg: '<svg class="w-5 h-5 text-amber-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L1 21h22L12 2zm0 4.5l6.5 11.5h-13L12 6.5z"/></svg>',
        desc: "Kemewahan motif etnik nusantara geometris Toraja/Batak dengan palet merah marun tua, bingkai ukiran etnik, dan ornamen rumah adat emas yang agung.",
        tags: ["Cover Etnik Sahala", "Love Story (2 Foto)", "Galeri Adat Emas", "Mempelai"],
        coverTitle: "1. Foto Cover Buka Undangan (Bingkai Etnik Sahala)",
        coverSubtitle: "Foto potret sampul berbingkai ukiran etnik Toraja/Batak dengan latar motif marun",
        coverGuide: "Foto sampul utama tampil berbingkai etnik di cover pembuka dan bagian paling atas undangan (Hero). Format: JPG, PNG, WebP.",
        hasStoryPhotos: true,
        storyPhotosCount: 2,
        storySubtitle: "2 Foto potret khusus perjalanan cinta berbingkai kartu marun etnik (Pertemuan Pertama & Lamaran)",
        storyGuide: "Unggah 2 foto untuk mengilustrasikan perjalanan cinta Anda (Foto 1: Pertemuan Pertama, Foto 2: Lamaran) berlatar merah marun etnik.",
        hasHeroCountdown: true,
        hasFloralOrnaments: false,
        galleryLimit: 6,
        galleryTip: "Kapasitas galeri rekomendasi 6 foto dengan 3 thumbnail di atas dan 1 foto utama besar diapit ornamen Rumah Adat Emas di bawah.",
        slots: [
            { title: "1. Foto Cover Etnik", desc: "Diatur di Langkah 2 (background_photo). Foto sampul berbingkai ukiran etnik di cover pembuka & hero." },
            { title: "2. Foto Love Story (2 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 & story_photo_2). 2 foto perjalanan cinta (Pertemuan Pertama & Lamaran)." },
            { title: "3. Galeri Foto Adat (6 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). 3 thumbnail atas dan 1 foto utama diapit rumah adat emas." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Foto kedua mempelai berbingkai ukiran etnik." }
        ]
    },
    20: {
        id: 20,
        name: "Premium Serenade Dark Elegance",
        tier: "premium",
        iconSvg: '<svg class="w-5 h-5 text-neutral-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M7 3v18"/><path d="M3 7.5h4"/><path d="M3 12h18"/><path d="M3 16.5h4"/><path d="M17 3v18"/><path d="M17 7.5h4"/><path d="M17 16.5h4"/></svg>',
        desc: "Sorotan lampu sinematik (Cinematic Wide Spotlight) bernuansa noir megah dengan aksen tembaga bara api dan mawar hitam.",
        tags: ["Cover Layar Lebar Noir", "Love Story (3 Foto)", "Galeri Sinematik (8 Foto)", "Mempelai"],
        coverTitle: "1. Foto Cover Layar Lebar (Cinematic Spotlight Frame)",
        coverSubtitle: "Foto horizontal sinematik di bawah lampu sorot panggung dramatis",
        coverGuide: "Foto horizontal sinematik di bawah lampu sorot panggung dramatis dengan percikan bara api hangat.",
        hasStoryPhotos: true,
        storyPhotosCount: 3,
        storySubtitle: "3 Foto Love Story spotlight kisah cinta bernuansa gelap mewah dan tembaga sinematik",
        storyGuide: "Unggah 3 foto kisah cinta berlatar gelap sinematik dengan aksen lampu sorot panggung mewah.",
        hasHeroCountdown: false,
        hasFloralOrnaments: false,
        galleryLimit: 8,
        galleryTip: "Kapasitas galeri hingga 8 foto sinematik layar lebar dark elegance bernuansa noir.",
        slots: [
            { title: "1. Foto Cover Layar Lebar", desc: "Diatur di Langkah 2 (background_photo). Foto horizontal sinematik di bawah lampu spotlight." },
            { title: "2. Foto Love Story (3 Foto)", desc: "Diatur di Langkah 2 (story_photo_1 s/d 3). 3 foto kisah cinta berlatar gelap sinematik." },
            { title: "3. Galeri Sinematik Noir (8 Foto)", desc: "Diatur di Langkah 2 (gallery_photos). 8 foto format layar lebar beraksen bara api." },
            { title: "4. Foto Mempelai Pria & Wanita", desc: "Diatur di Langkah 3 (Data Mempelai). Potret mempelai bernuansa hitam elegan." }
        ]
    }
};

function updateThemePhotoGuide(themeId) {
    const config = THEME_PHOTO_CONFIG[themeId] || THEME_PHOTO_CONFIG[1];

    // Banner elements
    const nameEl = document.getElementById('theme-banner-name');
    const tierEl = document.getElementById('theme-banner-tier');
    const pillEl = document.getElementById('theme-banner-id-pill');
    const descEl = document.getElementById('theme-banner-desc');
    const iconBox = document.getElementById('theme-banner-icon-box');
    const tagsContainer = document.getElementById('theme-banner-tags');

    if (nameEl) nameEl.innerText = config.name;
    if (pillEl) pillEl.innerText = `Tema #${config.id}`;
    if (descEl) descEl.innerText = config.desc;
    if (iconBox) iconBox.innerHTML = config.iconSvg || '<svg class="w-5 h-5 text-stone-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M2 12h20"/></svg>';

    if (tierEl) {
        if (config.tier === 'premium') {
            tierEl.className = 'px-2 py-0.5 rounded-full text-[9px] font-extrabold uppercase bg-amber-100 text-amber-800 border border-amber-300 shadow-2xs';
            tierEl.innerText = 'PREMIUM';
        } else {
            tierEl.className = 'px-2 py-0.5 rounded-full text-[9px] font-extrabold uppercase bg-emerald-100 text-emerald-800 border border-emerald-300 shadow-2xs';
            tierEl.innerText = 'BASIC GRATIS';
        }
    }

    if (tagsContainer && Array.isArray(config.tags)) {
        tagsContainer.innerHTML = config.tags.map(tag => `
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[10px] font-semibold bg-white text-stone-700 border border-[#E7E0D6] shadow-2xs">
                ${tag}
            </span>
        `).join('');
    }

    // Cover section
    const coverTitle = document.getElementById('cover-photo-title');
    const coverSubtitle = document.getElementById('cover-photo-subtitle');
    const coverGuideText = document.getElementById('cover-photo-guide-text');
    if (coverTitle) coverTitle.innerText = config.coverTitle;
    if (coverSubtitle) coverSubtitle.innerText = config.coverSubtitle;
    if (coverGuideText) coverGuideText.innerText = config.coverGuide;

    // Gallery section
    const quotaBadge = document.getElementById('theme-gallery-quota-badge');
    const tipText = document.getElementById('theme-gallery-tip-text');
    if (quotaBadge) quotaBadge.innerText = `Kapasitas: ${config.galleryLimit} Slot Foto`;
    if (tipText) tipText.innerHTML = `★ Pada tema ini, galeri dapat menampilkan hingga <strong>${config.galleryLimit} foto</strong> dengan tata letak estetik. Format: JPG, PNG, WebP (Maks 25MB per foto).`;
    if (typeof renderGallerySlotPlaceholders === 'function') {
        renderGallerySlotPlaceholders(config.galleryLimit || 8);
    }

    // Love Story section
    const storySection = document.getElementById('theme-story-section');
    const storySubtitle = document.getElementById('theme-story-subtitle');
    const storyGuide = document.getElementById('theme-story-guide-text');
    const storyQuotaBadge = document.getElementById('theme-story-quota-badge');
    const slot1 = document.getElementById('slot-story-photo-1');
    const slot2 = document.getElementById('slot-story-photo-2');
    const slot3 = document.getElementById('slot-story-photo-3');
    const slot4 = document.getElementById('slot-story-photo-4');

    if (storySection) {
        if (config.hasStoryPhotos) {
            storySection.classList.remove('hidden');
            const storyCount = config.storyPhotosCount || 2;
            if (storySubtitle) storySubtitle.innerText = config.storySubtitle || `${storyCount} Foto potret khusus untuk seksi Love Story tema ini`;
            if (storyGuide) storyGuide.innerText = config.storyGuide || `Unggah ${storyCount} foto untuk mengilustrasikan perjalanan cinta Anda:`;
            if (storyQuotaBadge) storyQuotaBadge.innerText = `${storyCount} Slot Foto Cerita Cinta`;

            if (slot1) slot1.classList.toggle('hidden', storyCount < 1);
            if (slot2) slot2.classList.toggle('hidden', storyCount < 2);
            if (slot3) slot3.classList.toggle('hidden', storyCount < 3);
            if (slot4) slot4.classList.toggle('hidden', storyCount < 4);
        } else {
            storySection.classList.add('hidden');
        }
    }

    // Countdown photo section: HANYA untuk Tema 5 (Basic Harmony Monochrome)
    const countdownSection = document.getElementById('countdown-photo-section');
    if (countdownSection) {
        const isMonochrome = parseInt(themeId) === 5 || (config.slug && config.slug.includes('monochrome'));
        if (isMonochrome) {
            countdownSection.classList.remove('hidden');
        } else {
            countdownSection.classList.add('hidden');
        }
    }

    // Slots Guide Grid
    const slotsGrid = document.getElementById('theme-slots-grid');
    const guideTitle = document.getElementById('theme-guide-title');
    const guideBadge = document.getElementById('theme-guide-badge');
    if (guideTitle) guideTitle.innerText = `Panduan Penempatan Foto ${config.name}`;
    if (guideBadge) guideBadge.innerText = `Tema #${config.id}`;

    if (slotsGrid && Array.isArray(config.slots)) {
        slotsGrid.innerHTML = config.slots.map(s => `
            <div class="p-2.5 rounded-xl bg-white border border-[#E7E0D6] space-y-1 shadow-2xs">
                <strong class="text-stone-900 block font-semibold text-xs">${s.title}</strong>
                <span class="text-stone-600 text-[11px] leading-relaxed">${s.desc}</span>
            </div>
        `).join('');
    }
}

function updateTheme7PhotoToggles() {
    // All 20 themes allow full custom photo uploads for groom, bride, cover, and gallery
}

// ================= STEP 6: SHARE GENERATOR & GUEST MANAGEMENT =================
@php
    $initialGuestsList = [];
    if (isset($invitation) && $invitation && $invitation->guests) {
        foreach ($invitation->guests as $gItem) {
            $initialGuestsList[] = [
                'id' => $gItem->id,
                'name' => $gItem->name,
                'phone' => $gItem->phone ?? '',
                'token' => $gItem->unique_token,
            ];
        }
    }
    $defaultWaTemplate = "Kepada Yth. {nama_tamu},\n\nTanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri hari bahagia pernikahan kami.\n\nInformasi lengkap & link undangan digital:\n{link_undangan}\n\nMerupakan suatu kehormatan dan kebahagiaan bagi kami apabila berkenan hadir dan memberikan doa restu.\n\nTerima kasih,\n[Nama Mempelai]";
    $currentWaTemplate = old('whatsapp_template', (isset($invitation) && $invitation ? $invitation->whatsapp_template : null) ?? $defaultWaTemplate);
@endphp
let guestsList = @json($initialGuestsList);
let step6ActiveTab = 'quick';
let step6HostMode = 'custom';
let step6CustomHostUrl = window.location.origin;
const step6DetectedWifiHost = 'http://172.16.170.222:8000';
let step6MasterTemplate = @json($currentWaTemplate);

function isStep6ProductionDomain() {
    const host = window.location.hostname.toLowerCase();
    return !host.includes('test') && !host.includes('localhost') && !host.includes('127.0.0.1') && !host.includes('trycloudflare.com');
}

function escapeHtml(str) {
    if (!str) return '';
    return String(str)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

function getStep6BaseOrigin() {
    if (isStep6ProductionDomain() || window.location.origin.includes('trycloudflare.com')) {
        return window.location.origin;
    }
    if (step6HostMode === 'wifi') {
        return step6DetectedWifiHost;
    } else if (step6HostMode === 'custom' && step6CustomHostUrl.trim()) {
        let u = step6CustomHostUrl.trim();
        return u.replace(/\/+$/, '');
    }
    return window.location.origin;
}

function getStep6InvitationSlug() {
    const slugInput = document.getElementById('slug');
    let slug = slugInput ? slugInput.value.trim() : '';
    if (!slug) {
        slug = '{{ $invitation->slug ?? "undangan-kami" }}';
    }
    return slug.toLowerCase().replace(/[^a-z0-9-]/g, '-').replace(/-+/g, '-');
}

function getStep6InvitationUrl(guestName = '') {
    const origin = getStep6BaseOrigin();
    const slug = getStep6InvitationSlug();
    const baseUrl = origin + '/undangan/' + encodeURIComponent(slug);
    const cleanGuest = (guestName || '').trim();
    return cleanGuest ? `${baseUrl}?to=${encodeURIComponent(cleanGuest)}` : baseUrl;
}

// Backward-compatibility wrappers
function getInvitationBaseUrl() {
    return getStep6InvitationUrl('');
}

function getGuestLink(guestName) {
    return getStep6InvitationUrl(guestName);
}

function updateGuestsJsonInput() {
    const hiddenInput = document.getElementById('guestsJsonInput');
    if (hiddenInput) {
        hiddenInput.value = JSON.stringify(guestsList);
    }
}

function toggleStep6HostOptions() {
    const panel = document.getElementById('step6-host-advanced-panel');
    if (panel) {
        panel.classList.toggle('hidden');
    }
}

function setStep6HostMode(mode) {
    step6HostMode = mode;
    const boxEl = document.getElementById('step6-host-box');
    const badgeStatus = document.getElementById('step6-host-badge-status');
    const badgeSub = document.getElementById('step6-host-badge-sub');
    const displayUrl = document.getElementById('step6-active-host-display');
    const iconContainer = document.getElementById('step6-host-indicator-icon');

    const pillLocal = document.getElementById('step6-host-pill-local');
    const pillWifi = document.getElementById('step6-host-pill-wifi');
    const pillCustom = document.getElementById('step6-host-pill-custom');

    if (isStep6ProductionDomain()) {
        const switchBtn = document.getElementById('step6-host-switch-btn');
        if (switchBtn) switchBtn.classList.add('hidden');
        if (boxEl) {
            boxEl.className = 'p-3 sm:p-3.5 rounded-2xl bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200/90 shadow-2xs transition-all duration-300';
        }
        if (iconContainer) {
            iconContainer.className = 'w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center shadow-xs shrink-0';
        }
        if (badgeStatus) {
            badgeStatus.className = 'px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-emerald-600 text-white shadow-2xs';
            badgeStatus.innerText = 'Domain Resmi Aktif';
        }
        if (badgeSub) {
            badgeSub.className = 'text-xs font-semibold text-emerald-900 hidden sm:inline';
            badgeSub.innerText = 'Tautan Siap Disebarkan';
        }
        if (displayUrl) {
            displayUrl.className = 'text-xs font-mono text-emerald-700 font-bold truncate mt-0.5';
            displayUrl.innerText = window.location.origin;
        }
        renderShareUrls(document.getElementById('step6-guest-name')?.value.trim() || '');
        renderStep6GuestsList();
        return;
    }

    [pillLocal, pillWifi, pillCustom].forEach(p => {
        if (!p) return;
        p.classList.remove('bg-emerald-600', 'bg-blue-600', 'bg-slate-700', 'text-white', 'shadow-2xs');
        p.classList.add('bg-white', 'text-slate-700', 'border', 'border-slate-200');
    });

    if (mode === 'custom') {
        if (pillCustom) {
            pillCustom.classList.add('bg-emerald-600', 'text-white', 'shadow-2xs');
            pillCustom.classList.remove('bg-white', 'text-slate-700');
        }
        if (boxEl) {
            boxEl.className = 'p-3 sm:p-3.5 rounded-2xl bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200/90 shadow-2xs transition-all duration-300';
        }
        if (iconContainer) {
            iconContainer.className = 'w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center shadow-xs shrink-0';
        }
        if (badgeStatus) {
            badgeStatus.className = 'px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-emerald-600 text-white shadow-2xs';
            badgeStatus.innerText = 'Link Publik Online Aktif';
        }
        if (badgeSub) {
            badgeSub.className = 'text-xs font-semibold text-emerald-900 hidden sm:inline';
            badgeSub.innerText = 'Bisa Dibuka di HP Mana Saja';
        }
        if (displayUrl) {
            displayUrl.className = 'text-xs font-mono text-emerald-700 font-bold truncate mt-0.5';
            displayUrl.innerText = step6CustomHostUrl || window.location.origin;
        }
    } else if (mode === 'wifi') {
        if (pillWifi) {
            pillWifi.classList.add('bg-blue-600', 'text-white', 'shadow-2xs');
            pillWifi.classList.remove('bg-white', 'text-slate-700');
        }
        if (boxEl) {
            boxEl.className = 'p-3 sm:p-3.5 rounded-2xl bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200/90 shadow-2xs transition-all duration-300';
        }
        if (iconContainer) {
            iconContainer.className = 'w-8 h-8 rounded-xl bg-blue-500 text-white flex items-center justify-center shadow-xs shrink-0';
        }
        if (badgeStatus) {
            badgeStatus.className = 'px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-blue-600 text-white shadow-2xs';
            badgeStatus.innerText = 'Mode Wi-Fi Lokal Aktif';
        }
        if (badgeSub) {
            badgeSub.className = 'text-xs font-semibold text-blue-900 hidden sm:inline';
            badgeSub.innerText = 'Untuk HP yang Se-Wi-Fi';
        }
        if (displayUrl) {
            displayUrl.className = 'text-xs font-mono text-blue-700 font-bold truncate mt-0.5';
            displayUrl.innerText = step6DetectedWifiHost;
        }
    } else { // local
        if (pillLocal) {
            pillLocal.classList.add('bg-slate-700', 'text-white', 'shadow-2xs');
            pillLocal.classList.remove('bg-white', 'text-slate-700');
        }
        if (boxEl) {
            boxEl.className = 'p-3 sm:p-3.5 rounded-2xl bg-gradient-to-r from-slate-50 to-gray-100 border border-slate-200 shadow-2xs transition-all duration-300';
        }
        if (iconContainer) {
            iconContainer.className = 'w-8 h-8 rounded-xl bg-slate-600 text-white flex items-center justify-center shadow-xs shrink-0';
        }
        if (badgeStatus) {
            badgeStatus.className = 'px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-slate-700 text-white shadow-2xs';
            badgeStatus.innerText = 'Mode Laptop (Localhost)';
        }
        if (badgeSub) {
            badgeSub.className = 'text-xs font-semibold text-slate-700 hidden sm:inline';
            badgeSub.innerText = 'Hanya Dibuka di Laptop Ini';
        }
        if (displayUrl) {
            displayUrl.className = 'text-xs font-mono text-slate-600 font-bold truncate mt-0.5';
            displayUrl.innerText = window.location.origin;
        }
    }

    renderShareUrls(document.getElementById('step6-guest-name')?.value.trim() || '');
    renderStep6GuestsList();
}

function checkStep6CloudflareTunnel(userInitiated = false) {
    if (isStep6ProductionDomain()) {
        setStep6HostMode('production');
        return;
    }

    if (window.location.origin.includes('trycloudflare.com')) {
        step6CustomHostUrl = window.location.origin;
        const inputEl = document.getElementById('step6-custom-host-input');
        if (inputEl) inputEl.value = step6CustomHostUrl;
        const displayEl = document.getElementById('step6-active-host-display');
        if (displayEl) displayEl.innerText = step6CustomHostUrl;
        setStep6HostMode('custom');
        return;
    }

    fetch('/tunnel_url.txt?t=' + Date.now())
        .then(res => {
            if (res.ok) return res.text();
            throw new Error('Not running');
        })
        .then(url => {
            const cleanUrl = url.trim();
            if (cleanUrl.startsWith('http')) {
                step6CustomHostUrl = cleanUrl;
                const inputEl = document.getElementById('step6-custom-host-input');
                if (inputEl) inputEl.value = cleanUrl;
                const displayEl = document.getElementById('step6-active-host-display');
                if (displayEl) displayEl.innerText = cleanUrl;

                setStep6HostMode('custom');

                if (userInitiated && typeof showToast === 'function') {
                    showToast('⚡ Link Cloudflare online terhubung!');
                }
            }
        })
        .catch(() => {
            if (userInitiated && typeof showToast === 'function') {
                showToast('Tunnel belum aktif. Pastikan cloudflared berjalan');
            }
        });
}

function onStep6CustomHostInput(val) {
    step6CustomHostUrl = val;
    renderShareUrls(document.getElementById('step6-guest-name')?.value.trim() || '');
    renderStep6GuestsList();
}

function switchStep6Tab(tab) {
    step6ActiveTab = tab;
    const paneQuick = document.getElementById('step6-pane-quick');
    const paneGuests = document.getElementById('step6-pane-guests');
    const btnQuick = document.getElementById('step6-tab-btn-quick');
    const btnGuests = document.getElementById('step6-tab-btn-guests');

    if (tab === 'quick') {
        if (paneQuick) paneQuick.classList.remove('hidden');
        if (paneGuests) paneGuests.classList.add('hidden');
        if (btnQuick) {
            btnQuick.className = 'px-4 py-2.5 text-xs sm:text-sm font-bold border-b-2 border-[#FF2E3A] text-[#FF2E3A] flex items-center gap-2 transition cursor-pointer';
        }
        if (btnGuests) {
            btnGuests.className = 'px-4 py-2.5 text-xs sm:text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-slate-900 flex items-center gap-2 transition cursor-pointer';
        }
    } else {
        if (paneQuick) paneQuick.classList.add('hidden');
        if (paneGuests) paneGuests.classList.remove('hidden');
        if (btnGuests) {
            btnGuests.className = 'px-4 py-2.5 text-xs sm:text-sm font-bold border-b-2 border-[#FF2E3A] text-[#FF2E3A] flex items-center gap-2 transition cursor-pointer';
        }
        if (btnQuick) {
            btnQuick.className = 'px-4 py-2.5 text-xs sm:text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-slate-900 flex items-center gap-2 transition cursor-pointer';
        }
    }
}

// Master template reference
// step6MasterTemplate is initialized from $currentWaTemplate above

function composeWhatsAppMessage(guestName, invitationUrl) {
    const groomNick = document.getElementById('groom_nickname')?.value.trim() || 'Rian';
    const brideNick = document.getElementById('bride_nickname')?.value.trim() || 'Maya';

    let tmpl = step6MasterTemplate || "Kepada Yth. {nama_tamu},\n\nTanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri hari bahagia pernikahan kami.\n\nInformasi lengkap & link undangan digital:\n{link_undangan}\n\nMerupakan suatu kehormatan dan kebahagiaan bagi kami apabila berkenan hadir dan memberikan doa restu.\n\nTerima kasih,\n[Nama Mempelai]";

    const recipient = guestName ? guestName : 'Bapak/Ibu/Saudara/i';
    tmpl = tmpl.replace(/\{nama_tamu\}/g, recipient);
    tmpl = tmpl.replace(/\{link_undangan\}/g, invitationUrl);
    tmpl = tmpl.replace(/\[Nama Mempelai\]/g, `${groomNick} & ${brideNick}`);

    return tmpl;
}

function onStep6GuestNameChange(guestName) {
    renderShareUrls(guestName.trim());
}

function renderShareUrls(guestName = '') {
    const finalUrl = getStep6InvitationUrl(guestName);

    const urlInput = document.getElementById('step6-url-input');
    const openLink = document.getElementById('step6-open-link');
    const waPreview = document.getElementById('step6-whatsapp-preview');
    const waBtn = document.getElementById('step6-wa-btn');

    if (urlInput) urlInput.value = finalUrl;
    if (openLink) openLink.href = finalUrl;

    const message = composeWhatsAppMessage(guestName, finalUrl);

    if (waPreview) waPreview.value = message;
    if (waBtn) waBtn.href = `https://api.whatsapp.com/send?text=${encodeURIComponent(message)}`;

    // Sync with Live Mockup if on screen
    const displayInput = document.getElementById('guest_link_display');
    if (displayInput) displayInput.value = finalUrl;
}

function onStep6WhatsappTextareaInput(val) {
    step6MasterTemplate = val;
    const waBtn = document.getElementById('step6-wa-btn');
    if (waBtn) waBtn.href = `https://api.whatsapp.com/send?text=${encodeURIComponent(val)}`;
}

function resetStep6WhatsAppTemplate() {
    step6MasterTemplate = "Kepada Yth. {nama_tamu},\n\nTanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri hari bahagia pernikahan kami.\n\nInformasi lengkap & link undangan digital:\n{link_undangan}\n\nMerupakan suatu kehormatan dan kebahagiaan bagi kami apabila berkenan hadir dan memberikan doa restu.\n\nTerima kasih,\n[Nama Mempelai]";
    const currentGuest = document.getElementById('step6-guest-name')?.value.trim() || '';
    renderShareUrls(currentGuest);
    if (typeof showToast === 'function') {
        showToast('Format pesan direset ke default');
    }
}

function copyToClipboard(text, onSuccess) {
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).then(() => {
            if (onSuccess) onSuccess();
        }).catch(() => fallbackClipboardCopy(text, onSuccess));
    } else {
        fallbackClipboardCopy(text, onSuccess);
    }
}

function fallbackClipboardCopy(text, onSuccess) {
    const temp = document.createElement('textarea');
    temp.value = text;
    temp.style.position = 'fixed';
    temp.style.left = '-9999px';
    document.body.appendChild(temp);
    temp.focus();
    temp.select();
    try {
        document.execCommand('copy');
        if (onSuccess) onSuccess();
    } catch (e) {
        prompt('Salin teks berikut secara manual:', text);
    }
    document.body.removeChild(temp);
}

function ensureStep6Published() {
    const invIdInput = document.querySelector('input[name="invitation_id"]');
    const invId = invIdInput ? invIdInput.value : ('{{ isset($invitation) ? $invitation->id : "" }}');
    if (!invId) return;

    const draftBanner = document.getElementById('step6-draft-banner');
    if (draftBanner && !draftBanner.classList.contains('hidden')) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        fetch(`/dashboard/undangan/${invId}/publish`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.json())
        .then(data => {
            draftBanner.classList.add('hidden');
            if (typeof showToast === 'function') {
                showToast('Undangan berhasil dipublikasikan! Tautan kini aktif untuk semua tamu.');
            }
        })
        .catch(err => console.log('Auto-publish error:', err));
    }
}

function copyStep6MainLink() {
    ensureStep6Published();
    const urlInput = document.getElementById('step6-url-input');
    if (!urlInput) return;
    copyToClipboard(urlInput.value, () => {
        if (typeof showToast === 'function') showToast('Link undangan berhasil disalin!');
        const btnText = document.getElementById('step6-copy-main-btn-text');
        if (btnText) {
            const orig = btnText.innerText;
            btnText.innerText = 'Tersalin!';
            setTimeout(() => { btnText.innerText = orig; }, 1800);
        }
    });
}

function copyStep6WhatsappText() {
    const waPreview = document.getElementById('step6-whatsapp-preview');
    if (!waPreview) return;
    copyToClipboard(waPreview.value, () => {
        if (typeof showToast === 'function') showToast('Teks pesan WhatsApp berhasil disalin!');
        const label = document.getElementById('step6-copy-wa-label');
        if (label) {
            const orig = label.innerText;
            label.innerText = 'Tersalin!';
            setTimeout(() => { label.innerText = orig; }, 1800);
        }
    });
}

// Helper sentral untuk menentukan batas kuota tamu efektif
function getEffectiveGuestLimit() {
    if (typeof isUserPremium !== 'undefined' && isUserPremium) return null;
    if (typeof isInvitationPremium !== 'undefined' && isInvitationPremium) return null;
    if (window.CURRENT_USER_PACKAGE_TIER === 'premium') return null;
    if (window.CURRENT_USER_PACKAGE_TIER === 'basic_addon_1') return 12;
    if (window.CURRENT_USER_PACKAGE_TIER === 'basic_addon_2') return 17;
    if (typeof window.CURRENT_GUEST_LIMIT === 'number' && window.CURRENT_GUEST_LIMIT > 0) {
        return window.CURRENT_GUEST_LIMIT;
    }
    return 5;
}

function showGuestQuotaExceededModal(limit = 5) {
    let tierName = 'Paket Basic (Gratis)';
    if (limit === 12) tierName = 'Add-On 1';
    else if (limit === 17) tierName = 'Add-On 2';

    const msg = `⚠️ <strong>Batas Kuota Tercapai (${limit} Tamu):</strong> Anda telah mencapai batas maksimal ${limit} nama tamu pada ${tierName}. Beli Add-On (mulai Rp17.000) atau upgrade ke Premium untuk menambah kuota nama tamu!<br><br>💡 <em>Tips Hemat: Anda tetap bisa <u>mengedit atau menghapus</u> nama tamu di daftar secara <strong>100% Gratis</strong> tanpa biaya tambahan kapan saja!</em>`;

    if (typeof openUpgradeModal === 'function') {
        openUpgradeModal(window.CURRENT_INVITATION_ID, msg, 'addon');
    } else {
        alert(`Batas maksimal ${limit} tamu pada ${tierName} tercapai. Silakan upgrade paket untuk menambah kuota!`);
    }
}

function saveQuickGuestToStep6() {
    const limit = getEffectiveGuestLimit();
    if (limit !== null && guestsList.length >= limit) {
        showGuestQuotaExceededModal(limit);
        return;
    }

    const input = document.getElementById('step6-guest-name');
    if (!input) return;
    const name = input.value.trim();
    if (!name) {
        input.focus();
        return;
    }

    const exists = guestsList.some(g => (g.name || '').toLowerCase() === name.toLowerCase());
    if (exists) {
        if (typeof showToast === 'function') showToast(`Tamu "${name}" sudah ada di daftar.`);
        return;
    }

    guestsList.push({
        id: null,
        name: name,
        phone: '',
        token: Math.random().toString(36).substring(2, 10).toUpperCase()
    });

    updateGuestsJsonInput();
    updateStep6GuestCountBadge();
    updateStep6GuestQuotaDisplay();
    renderStep6GuestsList();
    if (typeof showToast === 'function') showToast(`✓ Tamu "${name}" disimpan ke daftar!`);
}

// ================= TAB 2: GUEST LIST & BULK ADD =================

function toggleStep6BulkAddSection() {
    const section = document.getElementById('step6-bulk-add-section');
    const btn = document.getElementById('step6-btn-bulk-toggle');
    const icon = document.getElementById('step6-bulk-toggle-icon');
    const text = document.getElementById('step6-bulk-toggle-text');

    if (!section) return;

    if (section.classList.contains('hidden')) {
        section.classList.remove('hidden');
        if (btn) btn.className = 'px-2.5 py-1 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-300 text-[11px] font-bold flex items-center gap-1 transition shadow-2xs cursor-pointer shrink-0';
        if (icon) icon.classList.add('rotate-45');
        if (text) text.innerText = 'Tutup Form';
        const ta = document.getElementById('step6-bulk-guests-textarea');
        if (ta) ta.focus();
    } else {
        section.classList.add('hidden');
        if (btn) btn.className = 'px-2.5 py-1 rounded-xl bg-rose-50 hover:bg-rose-100 text-[#FF2E3A] border border-rose-200/90 text-[11px] font-bold flex items-center gap-1 transition shadow-2xs cursor-pointer shrink-0';
        if (icon) icon.classList.remove('rotate-45');
        if (text) text.innerText = 'Tambah Banyak Sekaligus';
    }
}

function addGuestToStep6List() {
    const limit = getEffectiveGuestLimit();
    if (limit !== null && guestsList.length >= limit) {
        showGuestQuotaExceededModal(limit);
        return;
    }

    const nameInput = document.getElementById('step6-single-guest-name');
    const phoneInput = document.getElementById('step6-single-guest-phone');
    const name = nameInput ? nameInput.value.trim() : '';
    const phone = phoneInput ? phoneInput.value.trim() : '';

    if (!name) {
        if (nameInput) nameInput.focus();
        return;
    }

    guestsList.unshift({
        id: null,
        name: name,
        phone: phone,
        token: Math.random().toString(36).substring(2, 10).toUpperCase()
    });

    if (nameInput) nameInput.value = '';
    if (phoneInput) phoneInput.value = '';
    if (nameInput) nameInput.focus();

    updateGuestsJsonInput();
    updateStep6GuestCountBadge();
    updateStep6GuestQuotaDisplay();
    renderStep6GuestsList();
    if (typeof showToast === 'function') showToast(`✓ Tamu "${name}" berhasil ditambahkan!`);
}

function submitBulkGuestsToStep6() {
    const textarea = document.getElementById('step6-bulk-guests-textarea');
    if (!textarea) return;
    const text = textarea.value.trim();
    if (!text) return;

    const lines = text.split(/\r?\n/).map(l => l.trim()).filter(l => l.length > 0);
    if (lines.length === 0) return;

    const limit = getEffectiveGuestLimit();
    if (limit !== null && (guestsList.length + lines.length) > limit) {
        const remaining = Math.max(0, limit - guestsList.length);
        const msg = `⚠️ <strong>Melebihi Batas Kuota:</strong> Anda memasukkan ${lines.length} nama tamu, melebihi sisa kuota paket Anda (${remaining} slot tersisa dari maksimal ${limit} tamu). Silakan beli Add-On (mulai Rp17.000) atau upgrade ke Premium!`;
        if (typeof openUpgradeModal === 'function') {
            openUpgradeModal(window.CURRENT_INVITATION_ID, msg, 'addon');
        } else {
            alert(msg.replace(/<[^>]+>/g, ''));
        }
        return;
    }

    let addedCount = 0;
    lines.forEach(line => {
        let name = line;
        let phone = '';
        if (line.includes(',')) {
            const parts = line.split(',');
            name = parts[0].trim();
            phone = parts[1].trim();
        } else if (line.includes(' - ')) {
            const parts = line.split(' - ');
            name = parts[0].trim();
            phone = parts[1].trim();
        }

        if (name) {
            guestsList.push({
                id: null,
                name: name,
                phone: phone,
                token: Math.random().toString(36).substring(2, 10).toUpperCase()
            });
            addedCount++;
        }
    });

    textarea.value = '';
    toggleStep6BulkAddSection();
    updateGuestsJsonInput();
    updateStep6GuestCountBadge();
    updateStep6GuestQuotaDisplay();
    renderStep6GuestsList();
    if (typeof showToast === 'function') showToast(`✓ Berhasil menambahkan ${addedCount} tamu!`);
}

function updateStep6GuestName(index, newName) {
    if (guestsList[index]) {
        const trimmed = (newName || '').trim();
        if (!trimmed) {
            alert('Nama tamu tidak boleh kosong.');
            renderStep6GuestsList();
            return;
        }
        guestsList[index].name = trimmed;
        updateGuestsJsonInput();
        renderStep6GuestsList();
        updateStep6GuestQuotaDisplay();
        if (typeof showToast === 'function') {
            showToast(`✓ Nama tamu diperbarui menjadi "${trimmed}". Link otomatis disesuaikan!`);
        }
    }
}

function focusGuestInput(index) {
    const input = document.getElementById(`guest-name-input-${index}`);
    if (input) {
        input.focus();
        input.select();
        if (typeof showToast === 'function') {
            showToast('Silakan ubah nama tamu, link personal otomatis berganti secara gratis.');
        }
    }
}

function deleteStep6Guest(index) {
    const guest = guestsList[index];
    const name = guest ? guest.name : 'tamu ini';
    if (confirm(`Hapus "${name}" dari daftar? Menghapus tamu akan membebaskan 1 slot kuota Anda.`)) {
        guestsList.splice(index, 1);
        updateGuestsJsonInput();
        updateStep6GuestCountBadge();
        updateStep6GuestQuotaDisplay();
        renderStep6GuestsList();
        if (typeof showToast === 'function') showToast('✓ Tamu dihapus. 1 slot kuota kini kembali tersedia.');
    }
}

function copyStep6GuestLink(index, btn) {
    const guest = guestsList[index];
    if (!guest) return;
    const link = getStep6InvitationUrl(guest.name);
    copyToClipboard(link, () => {
        if (typeof showToast === 'function') showToast('Link khusus tamu berhasil disalin!');
        if (btn) {
            const orig = btn.innerHTML;
            btn.innerHTML = `<svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg><span class="text-emerald-600 font-bold">Tersalin</span>`;
            setTimeout(() => { btn.innerHTML = orig; }, 1800);
        }
    });
}

function shareStep6GuestWhatsApp(index) {
    const guest = guestsList[index];
    if (!guest) return;
    const guestName = guest.name || 'Tamu Undangan';
    const guestLink = getStep6InvitationUrl(guestName);
    const guestWaMsg = composeWhatsAppMessage(guestName, guestLink);
    const phone = guest.phone ? guest.phone.replace(/[^0-9]/g, '') : '';
    const waHref = phone ? `https://api.whatsapp.com/send?phone=${phone}&text=${encodeURIComponent(guestWaMsg)}` : `https://api.whatsapp.com/send?text=${encodeURIComponent(guestWaMsg)}`;
    window.open(waHref, '_blank');
}

function updateStep6GuestCountBadge() {
    const badge = document.getElementById('step6-guest-count-badge');
    const searchContainer = document.getElementById('step6-guest-search-container');
    if (badge) badge.innerText = `${guestsList.length} Tamu`;
    if (searchContainer) {
        if (guestsList.length > 3) {
            searchContainer.classList.remove('hidden');
        } else {
            searchContainer.classList.add('hidden');
        }
    }
}

function updateStep6GuestQuotaDisplay() {
    const limit = getEffectiveGuestLimit();
    const isUnlimited = (limit === null);
    const count = (typeof guestsList !== 'undefined') ? guestsList.length : 0;

    const barEl = document.getElementById('step6-quota-progress-bar');
    const textEl = document.getElementById('step6-quota-text');
    const badgeEl = document.getElementById('step6-quota-badge');
    const btnUpgrade = document.getElementById('step6-quota-upgrade-btn');
    const limitWarning = document.getElementById('step6-quota-limit-warning');
    const singleInput = document.getElementById('step6-single-guest-name');
    const addBtn = document.getElementById('step6-btn-add-guest');

    if (isUnlimited) {
        if (textEl) textEl.innerHTML = `Terdaftar: <strong>${count}</strong> Tamu &bull; <span class="text-emerald-600 font-bold inline-flex items-center gap-1"><svg class="w-3.5 h-3.5 text-amber-500 fill-current inline shrink-0" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg> Unlimited (Tanpa Batas Tamu)</span>`;
        if (barEl) {
            barEl.style.width = '100%';
            barEl.className = 'h-2 rounded-full bg-emerald-500 transition-all duration-300';
        }
        if (badgeEl) {
            badgeEl.innerHTML = `<span class="inline-flex items-center gap-1"><svg class="w-3 h-3 text-[#FF2E3A] fill-current shrink-0" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg> Paket Premium</span>`;
            badgeEl.className = 'px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase bg-rose-100 text-[#FF2E3A] border border-rose-200';
        }
        if (btnUpgrade) btnUpgrade.classList.add('hidden');
        if (limitWarning) limitWarning.classList.add('hidden');
        if (singleInput) {
            singleInput.placeholder = 'Ketik nama tamu (misal: Reny Maelani)...';
            singleInput.classList.remove('bg-rose-50/50', 'border-rose-300');
        }
        return;
    }

    const percent = Math.min(100, Math.round((count / limit) * 100));
    const isFull = count >= limit;
    const isOverLimit = count > limit;
    const remaining = Math.max(0, limit - count);

    let tierLabel = 'Paket Basic (Gratis)';
    if (window.CURRENT_USER_PACKAGE_TIER === 'basic_addon_1' || limit === 12) tierLabel = 'Add-On 1 (Maks 12 Tamu)';
    else if (window.CURRENT_USER_PACKAGE_TIER === 'basic_addon_2' || limit === 17) tierLabel = 'Add-On 2 (Maks 17 Tamu)';

    if (badgeEl) {
        badgeEl.innerText = tierLabel;
        badgeEl.className = isFull 
            ? 'px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase bg-rose-100 text-rose-800 border border-rose-300 animate-pulse'
            : 'px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase bg-slate-100 text-slate-700 border border-slate-200';
    }

    if (textEl) {
        if (isOverLimit) {
            textEl.innerHTML = `<span class="text-rose-600 font-bold">⚠️ Melebihi Batas:</span> <strong>${count}</strong> dari maksimal <strong>${limit}</strong> Tamu (<span class="text-rose-600 font-bold">Kelebihan ${count - limit} tamu</span>)`;
        } else {
            textEl.innerHTML = `Terpakai: <strong>${count}</strong> dari <strong>${limit}</strong> Tamu (${remaining > 0 ? remaining + ' slot tersisa' : '<span class="text-rose-600 font-bold">Kuota Penuh</span>'})`;
        }
    }

    if (barEl) {
        barEl.style.width = `${percent}%`;
        barEl.className = isFull 
            ? 'h-2 rounded-full bg-[#FF2E3A] transition-all duration-300' 
            : (percent >= 80 ? 'h-2 rounded-full bg-amber-500 transition-all duration-300' : 'h-2 rounded-full bg-sky-500 transition-all duration-300');
    }

    if (btnUpgrade) {
        btnUpgrade.classList.remove('hidden');
    }

    if (limitWarning) {
        if (isFull) {
            limitWarning.classList.remove('hidden');
            if (isOverLimit) {
                limitWarning.innerHTML = `
                    <div class="flex items-start gap-2">
                        <span class="text-base shrink-0">⚠️</span>
                        <div class="space-y-1">
                            <p class="font-bold text-rose-900 leading-tight">Melebihi Kuota Paket ${tierLabel}:</p>
                            <p class="text-[11px] text-rose-800 leading-relaxed">
                                Anda memiliki <strong>${count} nama tamu</strong> terdaftar, sedangkan paket saat ini dibatasi maksimal <strong>${limit} tamu</strong>. Tamu ke-6 dan seterusnya tidak dapat dibagikan dan tidak akan tersimpan tanpa peningkatan paket.
                            </p>
                        </div>
                    </div>
                    <button type="button" onclick="openUpgradeModal(window.CURRENT_INVITATION_ID, 'Kuota ${limit} tamu paket Basic telah tercapai. Tambah kuota dengan Add-On (mulai Rp17.000) atau upgrade ke Premium untuk menambah kuota nama tamu!', 'addon')" class="w-full py-1.5 px-3 rounded-lg bg-[#FF2E3A] hover:bg-[#E01E2A] text-white font-bold text-xs transition cursor-pointer shadow-2xs text-center">
                        Beli Add-On Tamu (Mulai Rp 17.000)
                    </button>
                `;
            }
        } else {
            limitWarning.classList.add('hidden');
        }
    }

    if (singleInput) {
        if (isFull) {
            singleInput.placeholder = `Kuota ${limit} tamu penuh. Hapus/edit tamu atau beli Add-On...`;
        } else {
            singleInput.placeholder = 'Ketik nama tamu (misal: Reny Maelani)...';
        }
    }
}
window.updateStep6GuestQuotaDisplay = updateStep6GuestQuotaDisplay;

function filterStep6GuestList(query) {
    const q = (query || '').toLowerCase().trim();
    if (!q) {
        renderStep6GuestsList(null);
        return;
    }
    const filtered = guestsList.filter(g => (g.name || '').toLowerCase().includes(q) || (g.phone || '').includes(q));
    renderStep6GuestsList(filtered);
}

function renderStep6GuestsList(filteredList = null) {
    const container = document.getElementById('step6-guests-list-container');
    if (!container) return;

    const listToRender = filteredList !== null ? filteredList : guestsList;

    if (listToRender.length === 0) {
        container.innerHTML = `
            <div class="py-8 px-4 text-center border-2 border-dashed border-slate-200 rounded-2xl bg-slate-50/50 space-y-2">
                <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h5 class="text-xs font-bold text-slate-700">Belum Ada Tamu Terdaftar</h5>
                <p class="text-[11px] text-slate-400 max-w-xs mx-auto">
                    Ketik nama tamu di atas lalu tekan <kbd class="px-1.5 py-0.5 rounded bg-white border border-slate-200 text-slate-700 font-mono text-[10px]">Enter</kbd> untuk membuat link personal instan.
                </p>
            </div>
        `;
        return;
    }

    let html = '';
    listToRender.forEach((guest, idx) => {
        const guestName = guest.name || 'Tamu Undangan';
        const guestLink = getStep6InvitationUrl(guestName);
        const phone = guest.phone ? guest.phone.replace(/[^0-9]/g, '') : '';
        const guestWaMsg = composeWhatsAppMessage(guestName, guestLink);
        const waHref = phone ? `https://api.whatsapp.com/send?phone=${phone}&text=${encodeURIComponent(guestWaMsg)}` : `https://api.whatsapp.com/send?text=${encodeURIComponent(guestWaMsg)}`;

        const realIndex = guestsList.indexOf(guest);
        const actualIdx = realIndex !== -1 ? realIndex : idx;

        html += `
            <div class="p-3 bg-white hover:bg-slate-50 border border-slate-200/90 rounded-2xl space-y-2 transition shadow-2xs">
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-2 flex-1 min-w-0">
                        <span class="w-6 h-6 rounded-lg bg-amber-50 text-amber-800 border border-amber-200/60 font-bold text-[10px] flex items-center justify-center shrink-0">
                            #${idx + 1}
                        </span>
                        <div class="relative flex-1">
                            <input type="text" id="guest-name-input-${actualIdx}" value="${escapeHtml(guestName)}" onchange="updateStep6GuestName(${actualIdx}, this.value)" class="w-full px-2.5 py-1 bg-slate-50/70 hover:bg-white border border-slate-200 rounded-lg text-xs font-bold text-slate-800 focus:outline-none focus:bg-white focus:border-[#FF2E3A] focus:ring-1 focus:ring-[#FF2E3A]/30 transition" title="Klik atau ketik untuk mengedit nama tamu (Gratis)">
                        </div>
                        ${guest.phone ? `<span class="text-[10px] font-mono text-slate-400 shrink-0 hidden sm:inline">(${escapeHtml(guest.phone)})</span>` : ''}
                    </div>

                    <!-- Action buttons -->
                    <div class="flex items-center gap-1.5 shrink-0">
                        <button type="button" onclick="focusGuestInput(${actualIdx})" class="px-2.5 py-1.5 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-800 text-[11px] font-semibold flex items-center gap-1 transition cursor-pointer border border-amber-200/70" title="Edit nama tamu ini">
                            <svg class="w-3.5 h-3.5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            <span>Edit</span>
                        </button>
                        <button type="button" onclick="copyStep6GuestLink(${actualIdx}, this)" class="px-2.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-[11px] font-semibold flex items-center gap-1 transition cursor-pointer" title="Salin link khusus tamu ini">
                            <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin</span>
                        </button>
                        <a href="${waHref}" target="_blank" class="px-2.5 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-[11px] font-semibold flex items-center gap-1 transition shadow-2xs cursor-pointer" title="Kirim via WhatsApp">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            <span>WA</span>
                        </a>
                        <button type="button" onclick="deleteStep6Guest(${actualIdx})" class="p-1 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition cursor-pointer" title="Hapus tamu (membebaskan 1 kuota)">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                </div>

                <!-- URL preview bar -->
                <div class="flex items-center gap-1.5 bg-slate-50 px-2.5 py-1 rounded-lg border border-slate-200 text-[11px] font-mono text-slate-500">
                    <span class="text-slate-400 font-sans text-[10px] uppercase font-bold shrink-0">Link:</span>
                    <span class="truncate flex-1 select-all" title="${guestLink}">${guestLink}</span>
                    <a href="${guestLink}" target="_blank" class="text-sky-600 hover:underline font-sans font-semibold shrink-0 text-[10px] flex items-center gap-0.5">
                        <span>Buka</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
            </div>
        `;
    });

    container.innerHTML = html;
}

// Backward-compatible aliases
function renderGuestTable() {
    renderStep6GuestsList();
}
function addNewGuest() {
    addGuestToStep6List();
}
function updateGuestName(index, newName) {
    updateStep6GuestName(index, newName);
}
function deleteGuest(index) {
    deleteStep6Guest(index);
}
function copyGuestLink(index, btn) {
    copyStep6GuestLink(index, btn);
}
function shareGuestWhatsApp(index) {
    shareStep6GuestWhatsApp(index);
}
function updateWhatsAppPreview() {
    renderShareUrls(document.getElementById('step6-guest-name')?.value.trim() || '');
}

function initStep6ShareCard() {
    const groomNick = document.getElementById('groom_nickname')?.value.trim() || 'Rian';
    const brideNick = document.getElementById('bride_nickname')?.value.trim() || 'Maya';
    const subTitle = document.getElementById('step6-card-subtitle');
    if (subTitle) subTitle.innerText = `${groomNick} & ${brideNick}`;

    checkStep6CloudflareTunnel(false);
    updateStep6GuestCountBadge();
    updateStep6GuestQuotaDisplay();
    renderStep6GuestsList();
    renderShareUrls(document.getElementById('step6-guest-name')?.value.trim() || '');
}

// Quick Link Generator & Share
function updateCustomSlug(val) {
    const clean = val.toLowerCase().replace(/[^a-z0-9-]/g, '-').replace(/-+/g, '-');
    document.getElementById('slug').value = clean;
    updateGuestLink();
    renderGuestTable();
    updateWhatsAppPreview();
}

function updateGuestLink() {
    const slug = document.getElementById('slug')?.value.trim() || '{{ $invitation->slug ?? "undangan-kami" }}';
    const firstGuest = (guestsList.length > 0 && guestsList[0].name) ? guestsList[0].name : '';
    const baseUrl = getInvitationBaseUrl();
    const finalUrl = firstGuest ? `${baseUrl}?to=${encodeURIComponent(firstGuest)}` : baseUrl;

    const displayInput = document.getElementById('guest_link_display');
    if (displayInput) displayInput.value = finalUrl;

    const coverGuest = document.getElementById('mockup-cover-guest');
    if (coverGuest) coverGuest.innerText = firstGuest || 'Tamu Undangan';

    const guestBox = document.getElementById('mockup-guest-box');
    const guestDisplay = document.getElementById('mockup-guest-name');
    if (guestBox && guestDisplay) {
        if (firstGuest) {
            guestDisplay.innerText = firstGuest;
            guestBox.classList.remove('hidden');
        } else {
            guestBox.classList.add('hidden');
        }
    }
}

// Format Tanggal Indonesia
function formatIdDate(isoDate) {
    if (!isoDate) return 'Sabtu, 12 Desember 2026';
    const d = new Date(isoDate);
    if (isNaN(d.getTime())) return isoDate;
    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    return `${days[d.getDay()]}, ${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`;
}

// Countdown Calculation
function updateCountdown() {
    const dateInput = document.getElementById('event_date')?.value;
    const timeInput = document.getElementById('event_time')?.value || '00:00';
    if (!dateInput) return;

    const target = new Date(`${dateInput}T${timeInput}:00`);
    const now = new Date();
    const diff = target - now;

    if (diff > 0) {
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
        const mins = Math.floor((diff / 1000 / 60) % 60);
        const secs = Math.floor((diff / 1000) % 60);

        const cdDays = document.getElementById('mockup-cd-days');
        const cdHours = document.getElementById('mockup-cd-hours');
        const cdMins = document.getElementById('mockup-cd-mins');
        const cdSecs = document.getElementById('mockup-cd-secs');

        if (cdDays) cdDays.innerText = String(days).padStart(2, '0');
        if (cdHours) cdHours.innerText = String(hours).padStart(2, '0');
        if (cdMins) cdMins.innerText = String(mins).padStart(2, '0');
        if (cdSecs) cdSecs.innerText = String(secs).padStart(2, '0');
    } else {
        const cdDays = document.getElementById('mockup-cd-days');
        const cdHours = document.getElementById('mockup-cd-hours');
        const cdMins = document.getElementById('mockup-cd-mins');
        const cdSecs = document.getElementById('mockup-cd-secs');

        if (cdDays) cdDays.innerText = '00';
        if (cdHours) cdHours.innerText = '00';
        if (cdMins) cdMins.innerText = '00';
        if (cdSecs) cdSecs.innerText = '00';
    }
}

// Avatar FileReader Setup
function setupAvatarReader(inputId, previewImgId, fallbackId, onUpdate) {
    const input = document.getElementById(inputId);
    if (!input) return;

    input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                const url = evt.target.result;
                const pImg = document.getElementById(previewImgId);
                const fb = document.getElementById(fallbackId);
                if (pImg) {
                    pImg.src = url;
                    pImg.classList.remove('hidden');
                }
                if (fb) fb.classList.add('hidden');
                const b64 = document.getElementById(inputId + '_base64');
                if (b64) b64.value = url;
                onUpdate(url);
            };
            reader.readAsDataURL(file);
        }
    });
}

// Gallery Photo Management & Instant Previews
function renderGallerySlotPlaceholders(limit = 8) {
    const pillsContainer = document.getElementById('theme-gallery-slot-pills');
    const emptyContainer = document.getElementById('emptyGallerySlotsContainer');
    const existingCards = document.querySelectorAll('#photoGalleryContainer [data-photo-id]');
    const existingCount = existingCards.length;
    const newPreviewCards = document.querySelectorAll('#newPhotosPreviewContainer > div');
    const totalFilled = existingCount + newPreviewCards.length;

    if (pillsContainer) {
        let pillsHtml = '';
        for (let i = 1; i <= limit; i++) {
            const isFilled = i <= totalFilled;
            pillsHtml += `
                <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold ${
                    isFilled ? 'bg-emerald-600 text-white shadow-2xs' : 'bg-stone-100 text-stone-500 border border-stone-200'
                }">
                    ${isFilled ? '✓ ' : ''}Slot #${i}
                </span>
            `;
        }
        pillsContainer.innerHTML = pillsHtml;
    }

    if (emptyContainer) {
        let emptyHtml = '';
        for (let i = totalFilled + 1; i <= limit; i++) {
            emptyHtml += `
                <div onclick="document.getElementById('galleryPhotoInput').click()" 
                     class="border-2 border-dashed border-[#D6C7B2] rounded-xl aspect-[4/3] bg-white/70 hover:bg-emerald-50/50 hover:border-emerald-500 flex flex-col items-center justify-center p-3 text-center cursor-pointer transition-all duration-200 group shadow-2xs"
                     title="Klik untuk memilih foto untuk Slot #${i}">
                    <div class="w-8 h-8 rounded-full bg-stone-100 group-hover:bg-emerald-100 text-stone-400 group-hover:text-emerald-700 flex items-center justify-center mb-1.5 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <span class="text-[11px] font-bold text-stone-700 group-hover:text-emerald-800">Slot Foto #${i}</span>
                    <span class="text-[9px] text-stone-400 group-hover:text-emerald-600">Klik untuk Unggah</span>
                </div>
            `;
        }
        emptyContainer.innerHTML = emptyHtml;
    }
}

const galleryPhotoInput = document.getElementById('galleryPhotoInput');
if (galleryPhotoInput) {
    galleryPhotoInput.addEventListener('change', function(e) {
        const container = document.getElementById('newPhotosPreviewContainer');
        if (!container) return;
        container.innerHTML = '';
        const files = Array.from(e.target.files);
        const existingCount = document.querySelectorAll('#photoGalleryContainer [data-photo-id]').length;
        const cfg = (typeof THEME_PHOTO_CONFIG !== 'undefined' && typeof activeThemeId !== 'undefined' && THEME_PHOTO_CONFIG[activeThemeId]) 
            ? THEME_PHOTO_CONFIG[activeThemeId] 
            : { galleryLimit: 8 };

        if (files.length === 0) {
            renderGallerySlotPlaceholders(cfg.galleryLimit || 8);
            return;
        }

        files.forEach((file, idx) => {
            const slotNum = existingCount + idx + 1;
            const reader = new FileReader();
            reader.onload = function(evt) {
                const div = document.createElement('div');
                div.className = 'relative rounded-xl overflow-hidden border-2 border-emerald-500 bg-white shadow-xs aspect-[4/3]';
                div.innerHTML = `
                    <img src="${evt.target.result}" class="w-full h-full object-cover">
                    <span class="absolute top-1.5 left-1.5 px-2 py-0.5 rounded-full bg-emerald-600 text-white text-[9px] font-bold shadow-xs">
                        Slot #${slotNum} • Siap Unggah
                    </span>
                `;
                container.appendChild(div);
                renderGallerySlotPlaceholders(cfg.galleryLimit || 8);
            };
            reader.readAsDataURL(file);
        });
    });
}

function deleteGalleryPhoto(photoId) {
    if (!confirm('Hapus foto ini dari galeri?')) return;

    fetch(`{{ url('/dashboard/undangan/' . ($invitation->id ?? 0) . '/photos') }}/${photoId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.querySelector(`[data-photo-id="${photoId}"]`)?.remove();
            const countBadge = document.getElementById('photo-count-badge');
            const remaining = document.querySelectorAll('#photoGalleryContainer [data-photo-id]').length;
            if (countBadge) {
                countBadge.innerText = `${remaining} Foto Tersimpan`;
            }
            if (typeof renderGallerySlotPlaceholders === 'function') {
                const cfg = (typeof THEME_PHOTO_CONFIG !== 'undefined' && typeof activeThemeId !== 'undefined' && THEME_PHOTO_CONFIG[activeThemeId]) 
                    ? THEME_PHOTO_CONFIG[activeThemeId] 
                    : { galleryLimit: 8 };
                renderGallerySlotPlaceholders(cfg.galleryLimit || 8);
            }
        } else {
            alert('Gagal menghapus foto.');
        }
    })
    .catch(() => alert('Terjadi kesalahan saat menghapus foto.'));
}

// Toggle switch Kisah Cinta / Love Story
function toggleLoveStorySection(isChecked) {
    const fields = document.getElementById('love-story-input-fields');
    const label = document.getElementById('love-story-toggle-label');
    if (isChecked) {
        if (fields) fields.classList.remove('hidden');
        if (label) label.innerText = 'Aktif';
    } else {
        if (fields) fields.classList.add('hidden');
        if (label) label.innerText = 'Nonaktif';
    }
}

// Synchronize all fields with the Live Mockup & Multi-Theme Engine
function syncAllFields() {
    // 1. Headline & Couple Names
    const titleVal = document.getElementById('title')?.value || 'Pernikahan';
    const mockupHeadline = document.getElementById('mockup-badge-headline');
    if (mockupHeadline) mockupHeadline.innerText = titleVal;

    const groomNick = document.getElementById('groom_nickname')?.value || 'Rian';
    const brideNick = document.getElementById('bride_nickname')?.value || 'Maya';
    const coupleNames = document.getElementById('mockup-couple-names');
    if (coupleNames) coupleNames.innerText = `${groomNick} & ${brideNick}`;

    const mGroomInit = document.getElementById('mockup-hero-initial-groom');
    const mBrideInit = document.getElementById('mockup-hero-initial-bride');
    if (mGroomInit) mGroomInit.innerText = (groomNick.trim().charAt(0) || 'D').toUpperCase();
    if (mBrideInit) mBrideInit.innerText = (brideNick.trim().charAt(0) || 'M').toUpperCase();

    // 2. Dates & Venues
    const eventDate = document.getElementById('event_date')?.value || '';
    const eventTime = document.getElementById('event_time')?.value || '';
    const eventEndTime = document.getElementById('event_end_time')?.value || '';
    const venue = document.getElementById('venue')?.value || '';
    const address = document.getElementById('address')?.value || '';

    const heroDate = document.getElementById('mockup-hero-date');
    if (heroDate) heroDate.innerText = formatIdDate(eventDate);

    const mEventDT = document.getElementById('mockup-event-datetime');
    if (mEventDT) {
        const timeStr = eventEndTime ? `${eventTime} - ${eventEndTime} WIB` : `${eventTime} WIB`;
        mEventDT.innerText = `${formatIdDate(eventDate)} • ${timeStr}`;
    }
    const mVenue = document.getElementById('mockup-venue');
    if (mVenue) mVenue.innerText = venue;
    const mAddress = document.getElementById('mockup-address');
    if (mAddress) mAddress.innerText = address;

    // Akad
    const akadDate = document.getElementById('akad_date')?.value || '';
    const akadTime = document.getElementById('akad_time')?.value || '';
    const akadEndTime = document.getElementById('akad_end_time')?.value || '';
    const akadVenue = document.getElementById('akad_venue')?.value || '';
    const akadAddress = document.getElementById('akad_address')?.value || '';

    const mAkadDT = document.getElementById('mockup-akad-datetime');
    if (mAkadDT) {
        const akadTimeStr = akadEndTime ? `${akadTime} - ${akadEndTime} WIB` : `${akadTime} WIB`;
        mAkadDT.innerText = `${formatIdDate(akadDate)} • ${akadTimeStr}`;
    }
    const mAkadVenue = document.getElementById('mockup-akad-venue');
    if (mAkadVenue) mAkadVenue.innerText = akadVenue;
    const mAkadAddress = document.getElementById('mockup-akad-address');
    if (mAkadAddress) mAkadAddress.innerText = akadAddress;

    // 3. Quotes
    const qText = document.getElementById('quran_text')?.value || '';
    const qTrans = document.getElementById('quran_translation')?.value || '';
    const qSource = document.getElementById('quote_source')?.value || '';
    const mqText = document.getElementById('mockup-quran-text');
    const mqTrans = document.getElementById('mockup-quran-trans');
    const mqSource = document.getElementById('mockup-quote-source');
    if (mqText) mqText.innerText = qText;
    if (mqTrans) mqTrans.innerText = qTrans ? `"${qTrans}"` : '';
    if (mqSource) mqSource.innerText = qSource;

    // 4. Hadiah Digital & Kado Fisik
    const bankName = document.getElementById('gift_bank_name')?.value || 'Bank BCA';
    const accNumber = document.getElementById('gift_account_number')?.value || '';
    const accHolder = document.getElementById('gift_account_holder')?.value || '';
    const mBank = document.getElementById('mockup-gift-bank');
    const mNumber = document.getElementById('mockup-gift-number');
    const mHolder = document.getElementById('mockup-gift-holder');
    if (mBank) mBank.innerText = bankName;
    if (mNumber) mNumber.innerText = accNumber || '-';
    if (mHolder) mHolder.innerText = accHolder ? `a.n. ${accHolder}` : '';

    const giftRecipient = document.getElementById('gift_recipient_name')?.value || `${groomNick} & ${brideNick}`;
    const giftPhone = document.getElementById('gift_phone')?.value || '';
    const giftAddr = document.getElementById('gift_address')?.value || '';
    const mGiftRec = document.getElementById('mockup-gift-recipient');
    const mGiftPhone = document.getElementById('mockup-gift-phone');
    const mGiftAddr = document.getElementById('mockup-gift-address');
    if (mGiftRec) mGiftRec.innerText = giftRecipient;
    if (mGiftPhone) mGiftPhone.innerText = giftPhone ? `Telp: ${giftPhone}` : '';
    if (mGiftAddr) mGiftAddr.innerText = giftAddr || 'Alamat kado fisik';

    // 5. Penutup / Closing
    const closingTitle = document.getElementById('closing_title')?.value || 'Terima Kasih';
    const closingMsg = document.getElementById('closing_message')?.value || '';
    const closingSig = document.getElementById('closing_signature')?.value || '';
    const mCloseTitle = document.getElementById('mockup-closing-title');
    const mCloseMsg = document.getElementById('mockup-closing-message');
    const mCloseSig = document.getElementById('mockup-closing-signature');
    if (mCloseTitle) mCloseTitle.innerText = closingTitle;
    if (mCloseMsg) mCloseMsg.innerText = closingMsg;
    if (mCloseSig) mCloseSig.innerText = closingSig;

    // 6. Music
    const musicInput = document.getElementById('music_id');
    const musicInd = document.getElementById('mockup-music-indicator');
    if (musicInput && musicInd) {
        const trackId = parseInt(musicInput.value);
        if (typeof MUSIC_TRACKS !== 'undefined') {
            const track = MUSIC_TRACKS.find(t => t.id === trackId);
            if (track) {
                musicInd.innerText = track.title;
                const activeDisp = document.getElementById('active-music-title-display');
                if (activeDisp) activeDisp.innerText = `${track.title} – ${track.artist}`;
            }
        }
    }

    // 7. Gather all data bundle for Dynamic Multi-Theme Engine
    const showQuote = document.getElementById('show_quote')?.checked ?? true;
    const payload = {
        groomNickname: groomNick,
        brideNickname: brideNick,
        groomName: document.getElementById('groom_name')?.value || 'Mempelai Pria',
        brideName: document.getElementById('bride_name')?.value || 'Mempelai Wanita',
        groomParents: document.getElementById('groom_parents')?.value || '',
        brideParents: document.getElementById('bride_parents')?.value || '',
        groomIg: document.getElementById('groom_instagram')?.value || '',
        brideIg: document.getElementById('bride_instagram')?.value || '',
        groomPhotoUrl: currentGroomPhotoUrl,
        bridePhotoUrl: currentBridePhotoUrl,
        eventDate: formatIdDate(eventDate),
        guestName: (guestsList.length > 0 && guestsList[0].name) ? guestsList[0].name : (document.getElementById('new_guest_name_input')?.value.trim() || 'Tamu Undangan'),
        showQuote: showQuote
    };

    // 8. Invoke Dynamic Multi-Theme Engine
    if (typeof applyThemeEngine === 'function') {
        applyThemeEngine(activeThemeId, payload);
    }

    updateCountdown();
    updateGuestLink();
}

document.addEventListener('DOMContentLoaded', function() {
    const reactiveInputs = [
        'title', 'slug', 'groom_nickname', 'bride_nickname', 'groom_name', 'bride_name',
        'groom_parents', 'bride_parents', 'groom_instagram', 'bride_instagram',
        'event_date', 'event_time', 'event_end_time', 'venue', 'address',
        'akad_date', 'akad_time', 'akad_end_time', 'akad_venue', 'akad_address',
        'quran_text', 'quran_translation', 'quote_source',
        'gift_bank_name', 'gift_account_number', 'gift_account_holder',
        'gift_recipient_name', 'gift_phone', 'gift_address', 'gift_maps_url',
        'closing_title', 'closing_message', 'closing_signature'
    ];

    reactiveInputs.forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            el.addEventListener('input', syncAllFields);
            el.addEventListener('change', syncAllFields);
        }
    });

    const musicSelect = document.getElementById('music_id');
    if (musicSelect) {
        musicSelect.addEventListener('change', syncAllFields);
    }

    const customMusic = document.getElementById('custom_music');
    if (customMusic) {
        customMusic.addEventListener('change', function(e) {
            if (e.target.files[0]) {
                const ind = document.getElementById('mockup-music-indicator');
                if (ind) ind.innerText = 'Audio: ' + e.target.files[0].name;
            }
        });
    }

    // Avatar upload setup
    setupAvatarReader('groom_photo', 'preview-groom-avatar', 'fallback-groom-avatar', function(url) {
        currentGroomPhotoUrl = url;
        syncAllFields();
    });
    setupAvatarReader('bride_photo', 'preview-bride-avatar', 'fallback-bride-avatar', function(url) {
        currentBridePhotoUrl = url;
        syncAllFields();
    });
    setupAvatarReader('background_photo', 'preview-background-photo', 'fallback-background-photo', function(url) {
        currentBackgroundPhotoUrl = url;
        const pStep5 = document.getElementById('preview-background-photo-step5');
        const fbStep5 = document.getElementById('fallback-background-photo-step5');
        if (pStep5) {
            pStep5.src = url;
            pStep5.classList.remove('hidden');
        }
        if (fbStep5) fbStep5.classList.add('hidden');
        syncAllFields();
    });
    setupAvatarReader('countdown_photo', 'preview-countdown-photo', 'fallback-countdown-photo', function(url) {
        currentCountdownPhotoUrl = url;
        syncAllFields();
    });
    setupAvatarReader('story_photo_1', 'preview-story-photo-1', 'fallback-story-photo-1', function(url) {
        currentStoryPhoto1Url = url;
        syncAllFields();
    });
    setupAvatarReader('story_photo_2', 'preview-story-photo-2', 'fallback-story-photo-2', function(url) {
        currentStoryPhoto2Url = url;
        syncAllFields();
    });
    setupAvatarReader('story_photo_3', 'preview-story-photo-3', 'fallback-story-photo-3', function(url) {
        currentStoryPhoto3Url = url;
        syncAllFields();
    });
    setupAvatarReader('story_photo_4', 'preview-story-photo-4', 'fallback-story-photo-4', function(url) {
        currentStoryPhoto4Url = url;
        syncAllFields();
    });
    setupAvatarReader('custom_ornament_header', 'preview-ornament-header', 'fallback-ornament-header', function(url) {
        syncAllFields();
    });
    setupAvatarReader('custom_ornament_side', 'preview-ornament-side', 'fallback-ornament-side', function(url) {
        syncAllFields();
    });

    // Setup click on theme card wrappers to guarantee instant selection or unlock modal
    document.querySelectorAll('.theme-card-wrapper').forEach(card => {
        card.addEventListener('click', function(e) {
            if (e.target.closest('button')) return; // Ignore demo button click
            if (e.target.tagName === 'INPUT' || e.target.classList.contains('theme-radio-input')) return;
            const radio = this.querySelector('.theme-radio-input');
            if (!radio) return;

            const themeId = parseInt(this.getAttribute('data-theme-id'));
            const themeName = this.getAttribute('data-name');
            const tier = this.getAttribute('data-tier');
            const hasPremium = isUserPremium || isInvitationPremium;

            if (tier === 'premium' && !hasPremium) {
                e.preventDefault();
                // Select visually on step 1
                radio.checked = true;
                handleThemeChange(radio);
                // Trigger pay/upgrade popup to unlock this theme
                triggerEditorPremiumUpgrade(themeId, themeName, false);
                return;
            }

            radio.checked = true;
            handleThemeChange(radio);
        });
    });

    // Initial trigger
    const checkedTheme = document.querySelector('.theme-radio-input:checked');
    if (checkedTheme) {
        handleThemeChange(checkedTheme);
        const parentCard = checkedTheme.closest('.theme-card-wrapper');
        if (parentCard && parentCard.classList.contains('premium')) {
            filterThemes('all');
        }
    } else {
        updateThemePhotoGuide(activeThemeId);
    }

    const quoteToggle = document.getElementById('show_quote');
    if (quoteToggle) {
        toggleQuoteSection(quoteToggle.checked);
    }

    const loveStoryToggle = document.getElementById('show_love_story');
    if (loveStoryToggle) {
        toggleLoveStorySection(loveStoryToggle.checked);
    }

    renderGuestTable();
    updateWhatsAppPreview();
    updateGuestsJsonInput();
    updateTheme7PhotoToggles();
    initStep6ShareCard();
    syncAllFields();
    setInterval(updateCountdown, 1000);
    // Heartbeat auto-refresh CSRF & keep session alive every 5 minutes
    setInterval(refreshCsrfToken, 5 * 60 * 1000);
});
</script>
@endpush
