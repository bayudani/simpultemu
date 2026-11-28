@extends('layouts.dashboard')

@section('title', 'Ringkasan Dashboard')

@section('content')
<!-- Header & Welcome Banner Card -->
<div
    class="relative overflow-hidden rounded-2xl sm:rounded-3xl border border-[#BAEAF8] shadow-xs mb-5 sm:mb-8 sm:min-h-[245px] lg:min-h-[275px] flex flex-col justify-between sm:justify-center"
    style="background: linear-gradient(180deg, #87CEFA 0%, #BCE7FE 68%, #E1E7F9 86%, #D8DCF5 100%);"
>
    <!-- Desktop/Tablet Panoramic Background Image (Full Height, Uncropped Floor & Couple on Right) -->
    <img
        src="{{ asset('images/dashboard-welcome-banner.jpg') }}"
        alt="Banner Selamat Datang SimpulTemu"
        class="hidden sm:block absolute inset-y-0 right-0 h-full w-auto max-w-none object-contain object-right-bottom pointer-events-none select-none"
        style="-webkit-mask-image: linear-gradient(to right, transparent 0%, black 16%); mask-image: linear-gradient(to right, transparent 0%, black 16%);"
    >

    <!-- Desktop/Tablet Readability Scrim (Hanya di sisi kiri agar sisi kanan & lantai tetap cerah utuh) -->
    <div
        class="hidden sm:block absolute inset-0 pointer-events-none"
        style="background: linear-gradient(90deg, rgba(240, 249, 255, 0.90) 0%, rgba(224, 242, 254, 0.74) 38%, rgba(224, 242, 254, 0.25) 54%, rgba(224, 242, 254, 0) 68%);"
    ></div>

    <div class="relative z-10 p-5 pb-3 sm:p-7 lg:p-9 sm:max-w-[54%] lg:max-w-[52%]">
        <span class="inline-block px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full text-[10px] sm:text-xs font-semibold tracking-wider uppercase text-[#0284C7] bg-[#DBF6FF]/95 border border-[#BAEAF8] mb-2 sm:mb-2.5 shadow-2xs">
            Ringkasan Akun
        </span>
        <h1 class="font-heading text-xl sm:text-2xl lg:text-3xl font-bold text-slate-900 leading-tight">
            Selamat Datang, <span class="text-[#FF2E3A]">{{ auth()->user()->name }}</span>
        </h1>
        <p class="text-slate-700 text-xs sm:text-sm mt-1 sm:mt-1.5 leading-relaxed max-w-md">
            Kelola dan pantau seluruh undangan pernikahan digital Anda di satu tempat.
        </p>
        @php
            $dashUser = auth()->user();
        @endphp
        <div class="mt-2.5 flex flex-wrap items-center gap-2">
            @if($dashUser->hasLifetimePremium())
                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[11px] font-bold bg-amber-100/95 text-amber-900 border border-amber-300 shadow-2xs">
                    Akun VIP: Undangan Premium Tanpa Batas
                </span>
            @elseif($dashUser->availablePaidSlotsCount() > 0)
                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[11px] font-bold bg-emerald-100/95 text-emerald-900 border border-emerald-300 shadow-2xs">
                    Kredit Tersedia: {{ $dashUser->basic_invitation_credits > 0 ? $dashUser->basic_invitation_credits . ' Slot Basic ' : '' }}{{ $dashUser->premium_invitation_credits > 0 ? $dashUser->premium_invitation_credits . ' Slot Premium' : '' }}
                </span>
            @elseif($dashUser->canUseFreeQuota())
                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[11px] font-bold bg-white/90 text-sky-900 border border-[#BAEAF8] shadow-2xs">
                    Kuota Gratis Pertama Tersedia (1 Undangan Basic)
                </span>
            @else
                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-white/90 text-slate-700 border border-slate-200 shadow-2xs">
                    Kuota gratis terpakai &bull; Undangan berikutnya Rp10.000/undangan
                </span>
            @endif
        </div>
        <div class="mt-3.5 sm:mt-4">
            @if($dashUser->canStartNewInvitation())
                <a href="{{ route('dashboard.invitations.create') }}" class="inline-flex items-center justify-center gap-2 w-full sm:w-auto px-5 py-2.5 sm:px-6 sm:py-3 rounded-xl font-semibold text-xs sm:text-sm text-white bg-[#FF2E3A] hover:bg-[#E01E2A] active:bg-[#C71722] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:shadow-[0_6px_20px_rgba(255,46,58,0.35)] hover:scale-[1.01] active:scale-[0.99] transition-all duration-200">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Undangan Baru
                </a>
            @else
                <button type="button" onclick="openNewInvitationModal()" class="inline-flex items-center justify-center gap-2 w-full sm:w-auto px-5 py-2.5 sm:px-6 sm:py-3 rounded-xl font-semibold text-xs sm:text-sm text-white bg-[#FF2E3A] hover:bg-[#E01E2A] active:bg-[#C71722] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:shadow-[0_6px_20px_rgba(255,46,58,0.35)] hover:scale-[1.01] active:scale-[0.99] transition-all duration-200 cursor-pointer">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Undangan Baru (Rp10.000)
                </button>
            @endif
        </div>
    </div>

    <!-- Mobile Panoramic Image (Tampil utuh tanpa crop di bawah teks) -->
    <div class="sm:hidden relative z-10 w-full mt-1">
        <img
            src="{{ asset('images/dashboard-welcome-banner.jpg') }}"
            alt="Banner Selamat Datang SimpulTemu"
            class="w-full h-auto block object-cover pointer-events-none select-none"
        >
    </div>
</div>

<!-- 3 Kartu Ringkasan Stat (Compact 2-Cols on Mobile, 3-Cols on Desktop) -->
<div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5 sm:gap-6 mb-6 sm:mb-10">
    <!-- Stat 1: Total Undangan -->
    <div class="bg-white p-3.5 sm:p-6 rounded-xl sm:rounded-2xl border border-slate-200 shadow-xs hover:border-[#FF2E3A]/40 hover:shadow-md transition-all duration-300">
        <div class="flex items-center justify-between gap-2">
            <div>
                <p class="text-slate-500 text-[10px] sm:text-xs font-semibold uppercase tracking-wider">Total Undangan</p>
                <p class="font-heading text-2xl sm:text-4xl font-bold text-slate-900 mt-1 sm:mt-2">{{ $stats['total_invitations'] }}</p>
                <p class="text-[10px] sm:text-xs text-slate-400 mt-0.5 sm:mt-1 truncate">Dibuat di SimpulTemu</p>
            </div>
            <div class="w-9 h-9 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-[#DBF6FF] text-[#FF2E3A] flex items-center justify-center border border-[#BAEAF8] shadow-xs shrink-0">
                <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Stat 2: Undangan Published -->
    <div class="bg-white p-3.5 sm:p-6 rounded-xl sm:rounded-2xl border border-slate-200 shadow-xs hover:border-emerald-400/50 hover:shadow-md transition-all duration-300">
        <div class="flex items-center justify-between gap-2">
            <div>
                <p class="text-slate-500 text-[10px] sm:text-xs font-semibold uppercase tracking-wider">Published</p>
                <p class="font-heading text-2xl sm:text-4xl font-bold text-emerald-800 mt-1 sm:mt-2">{{ $stats['published'] }}</p>
                <p class="text-[10px] sm:text-xs text-slate-400 mt-0.5 sm:mt-1 truncate">Aktif & dapat diakses</p>
            </div>
            <div class="w-9 h-9 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center border border-emerald-200/60 shadow-xs shrink-0">
                <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Stat 3: Pesan & RSVP Masuk (Full-width on mobile row 2) -->
    <a href="{{ route('dashboard.messages') }}" class="col-span-2 sm:col-span-1 bg-white p-3.5 sm:p-6 rounded-xl sm:rounded-2xl border border-slate-200 shadow-xs hover:border-[#0284C7]/40 hover:shadow-md transition-all duration-300 block group">
        <div class="flex items-center justify-between gap-2">
            <div>
                <p class="text-slate-500 text-[10px] sm:text-xs font-semibold uppercase tracking-wider group-hover:text-[#0284C7] transition-colors">Pesan &amp; RSVP Masuk</p>
                <p class="font-heading text-2xl sm:text-4xl font-bold text-slate-900 mt-1 sm:mt-2">{{ ($stats['total_rsvps'] ?? 0) + ($stats['total_comments'] ?? 0) }}</p>
                <p class="text-[10px] sm:text-xs text-slate-400 mt-0.5 sm:mt-1 truncate">Konfirmasi kehadiran &amp; ucapan doa</p>
            </div>
            <div class="w-9 h-9 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-[#DBF6FF] text-[#0284C7] flex items-center justify-center border border-[#BAEAF8] shadow-xs group-hover:scale-105 transition-transform shrink-0">
                <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
            </div>
        </div>
    </a>
</div>

<!-- Kartu Daftar Undangan Terbaru -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="p-3.5 sm:p-6 border-b border-slate-200 flex items-center justify-between bg-slate-50/60">
        <div>
            <h2 class="font-heading text-sm sm:text-xl font-bold text-slate-900">Undangan Terbaru</h2>
            <p class="text-[10px] sm:text-xs text-slate-500 mt-0.5">Daftar undangan yang baru-baru ini Anda kelola</p>
        </div>
        <a href="{{ route('dashboard.invitations.index') }}" class="text-xs font-semibold text-[#FF2E3A] hover:text-[#E01E2A] hover:underline flex items-center gap-1 transition-colors">
            <span>Lihat Semua</span>
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    <div class="divide-y divide-slate-100">
        @forelse($recentInvitations as $invitation)
        <div id="invitation-row-{{ $invitation->id }}" class="p-3 sm:p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4 hover:bg-[#DBF6FF]/15 transition-colors">
            <div class="flex items-center gap-2.5 sm:gap-4">
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-[#DBF6FF] text-[#FF2E3A] flex items-center justify-center font-heading font-bold text-sm sm:text-lg border border-[#BAEAF8] shrink-0">
                    {{ substr($invitation->groom_nickname ?? 'W', 0, 1) }}&{{ substr($invitation->bride_nickname ?? 'W', 0, 1) }}
                </div>
                <div class="min-w-0">
                    <h3 class="font-heading font-semibold text-slate-900 text-xs sm:text-base truncate">
                        {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}
                    </h3>
                    <div class="flex flex-wrap items-center gap-1.5 sm:gap-2 mt-0.5 sm:mt-1 text-[10px] sm:text-xs text-slate-500">
                        <span>Tema: <strong class="text-slate-700">{{ $invitation->theme->name ?? 'Default' }}</strong></span>
                        <span>•</span>
                        <span>{{ $invitation->event_date ? $invitation->event_date->format('d M Y') : '-' }}</span>
                        <span>•</span>
                        @if($invitation->isPublished())
                            <span class="inline-flex items-center px-1.5 py-0.2 sm:px-2 sm:py-0.5 rounded-full text-[9px] sm:text-[10px] font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                Published
                            </span>
                        @else
                            <span class="inline-flex items-center px-1.5 py-0.2 sm:px-2 sm:py-0.5 rounded-full text-[9px] sm:text-[10px] font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                                Draft
                            </span>
                        @endif
                    </div>
                    <!-- Paket & Status Pembayaran Terpisah Per Undangan -->
                    @php
                        $rowPkgTier = $invitation->getPackageTier();
                        $rowPayStatus = $invitation->getPaymentStatusKey();
                    @endphp
                    <div class="flex flex-wrap items-center gap-1.5 mt-1.5 text-[10px] sm:text-[11px]">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md font-bold {{ $rowPkgTier === 'premium' ? 'bg-amber-100 text-amber-900 border border-amber-300' : (in_array($rowPkgTier, ['basic_addon_1', 'basic_addon_2'], true) ? 'bg-sky-50 text-sky-800 border border-sky-200' : 'bg-slate-100 text-slate-700 border border-slate-200') }}">
                            Paket: {{ $invitation->getPackageShortName() }}
                        </span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-md font-semibold {{ $rowPayStatus === 'paid' ? 'bg-emerald-50 text-emerald-800 border border-emerald-200' : ($rowPayStatus === 'unpaid' ? 'bg-rose-50 text-rose-700 border border-rose-200' : 'bg-sky-50 text-sky-700 border border-sky-200') }}">
                            Pembayaran: {{ $invitation->getPaymentStatusLabel() }}@if($rowPayStatus === 'paid' && $invitation->paid_amount > 0) (Rp{{ number_format($invitation->paid_amount, 0, ',', '.') }})@endif
                        </span>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-1.5 sm:gap-2 shrink-0 flex-wrap">
                <a href="{{ route('dashboard.invitations.edit', $invitation) }}" class="px-3 py-1.5 sm:px-4 sm:py-2 text-[10px] sm:text-xs font-semibold rounded-lg sm:rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 hover:border-slate-300 transition-colors shadow-2xs">
                    Editor
                </a>
                <button type="button" class="btn-share-invitation px-3 py-1.5 sm:px-4 sm:py-2 text-[10px] sm:text-xs font-semibold rounded-lg sm:rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white transition-all shadow-2xs flex items-center gap-1 sm:gap-1.5 cursor-pointer"
                    data-id="{{ $invitation->id }}"
                    data-slug="{{ $invitation->slug }}"
                    data-url="{{ url('/undangan/'.$invitation->slug) }}"
                    data-title="{{ $invitation->title ?? 'Undangan' }}"
                    data-groom="{{ $invitation->groom_nickname }}"
                    data-bride="{{ $invitation->bride_nickname }}"
                    data-date="{{ $invitation->event_date ? $invitation->event_date->translatedFormat('l, d F Y') : '-' }}"
                    data-venue="{{ $invitation->venue ?? 'Tempat Acara' }}"
                    data-status="{{ $invitation->status }}"
                    data-tamu-url="{{ route('dashboard.guests.index', $invitation) }}"
                    data-sebar-url="{{ route('dashboard.guests.share', $invitation) }}"
                    data-publish-url="{{ route('dashboard.invitations.publish', $invitation) }}"
                    title="Bagikan Tautan Undangan">
                    <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                    </svg>
                    <span>Bagikan</span>
                </button>
                @if($invitation->isPublished())
                <a href="{{ route('invitation.show', $invitation->slug) }}" target="_blank" class="px-4 py-2 text-xs font-semibold rounded-xl bg-[#FF2E3A] text-white hover:bg-[#E01E2A] transition-colors shadow-2xs flex items-center gap-1">
                    <span>Lihat</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
                @endif
                <button type="button" class="btn-delete-invitation px-3 py-1.5 rounded-lg border border-red-200 text-red-600 hover:bg-red-50 text-xs font-medium flex items-center gap-1 cursor-pointer" data-id="{{ $invitation->id }}" data-title="{{ $invitation->title ?? 'Undangan' }}">
                    <svg class="w-3.5 h-3.5 stroke-current" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    Hapus
                </button>
            </div>
        </div>
        @empty
        <div class="text-center py-12 px-4">
            <div class="w-16 h-16 rounded-full bg-[#DBF6FF] text-[#FF2E3A] flex items-center justify-center mx-auto mb-4 border border-[#BAEAF8]">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h3 class="font-heading text-lg font-bold text-slate-900">Belum ada undangan dibuat</h3>
            <p class="text-sm text-slate-500 max-w-sm mx-auto mt-1 mb-6">
                Mulai abadikan momen sakral pernikahan Anda dengan membuat undangan digital interaktif dan berkelas.
            </p>
            <a href="{{ route('dashboard.invitations.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl font-semibold text-white bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-md transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Undangan Pertama
            </a>
        </div>
        @endforelse
    </div>
</div>

@include('dashboard.components.delete-modal')
@include('dashboard.components.share-modal')
@endsection
