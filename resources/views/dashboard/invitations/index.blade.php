@extends('layouts.dashboard')

@section('title', 'Undangan Saya')

@section('content')
@php
    $invUser = auth()->user();
@endphp
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4 mb-4 sm:mb-8">
    <div>
        <span class="inline-block px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full text-[10px] sm:text-xs font-semibold tracking-wider uppercase text-[#0284C7] bg-[#DBF6FF] border border-[#BAEAF8] mb-1 sm:mb-2">
            Manajemen Undangan
        </span>
        <h1 class="font-heading text-xl sm:text-3xl font-bold text-slate-900">Undangan Saya</h1>
        <p class="text-slate-500 text-xs sm:text-sm mt-0.5 sm:mt-1">Kelola, edit, bagikan, dan pantau status publikasi setiap undangan Anda.</p>
        <div class="mt-2 flex flex-wrap items-center gap-2">
            @if($invUser->hasLifetimePremium())
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[11px] font-bold bg-amber-100 text-amber-900 border border-amber-300">
                    Akun VIP: Undangan Premium Tanpa Batas
                </span>
            @elseif($invUser->availablePaidSlotsCount() > 0)
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[11px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
                    Slot Tersedia: {{ $invUser->basic_invitation_credits > 0 ? $invUser->basic_invitation_credits . ' Basic ' : '' }}{{ $invUser->premium_invitation_credits > 0 ? $invUser->premium_invitation_credits . ' Premium' : '' }}
                </span>
            @elseif($invUser->canUseFreeQuota())
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[11px] font-semibold bg-[#DBF6FF]/80 text-[#0284C7] border border-[#BAEAF8]">
                    Kuota Gratis Pertama Tersedia (1 Undangan Basic)
                </span>
            @else
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-[11px] font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                    Kuota gratis terpakai &bull; Undangan berikutnya Rp10.000/undangan
                </span>
            @endif
        </div>
    </div>
    @if($invUser->canStartNewInvitation())
        <a href="{{ route('dashboard.invitations.create') }}" class="inline-flex items-center justify-center gap-1.5 sm:gap-2 px-4 py-2 sm:px-6 sm:py-3 rounded-xl font-semibold text-xs sm:text-sm text-white bg-[#FF2E3A] hover:bg-[#E01E2A] active:bg-[#C71722] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:scale-[1.01] transition-all">
            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Buat Undangan Baru</span>
        </a>
    @else
        <button type="button" onclick="openNewInvitationModal()" class="inline-flex items-center justify-center gap-1.5 sm:gap-2 px-4 py-2 sm:px-6 sm:py-3 rounded-xl font-semibold text-xs sm:text-sm text-white bg-[#FF2E3A] hover:bg-[#E01E2A] active:bg-[#C71722] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:scale-[1.01] transition-all cursor-pointer">
            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Buat Undangan Baru (Rp10.000)</span>
        </button>
    @endif
</div>

@if($invitations->isEmpty())
    <div class="text-center py-10 sm:py-16 px-4 bg-white rounded-2xl border border-slate-200 shadow-xs">
        <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-full bg-[#DBF6FF] text-[#FF2E3A] flex items-center justify-center mx-auto mb-3 sm:mb-4 border border-[#BAEAF8]">
            <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </div>
        <h3 class="font-heading text-lg sm:text-xl font-bold text-slate-900">Belum ada undangan</h3>
        <p class="text-slate-500 text-xs sm:text-sm max-w-sm mx-auto mt-1 mb-4 sm:mb-6">Mulai dengan membuat undangan digital pertama Anda dengan editor interaktif.</p>
        <a href="{{ route('dashboard.invitations.create') }}" class="inline-flex items-center gap-1.5 sm:gap-2 px-5 py-2 sm:px-6 sm:py-2.5 rounded-xl font-semibold text-xs sm:text-sm text-white bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-md transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Buat Undangan Sekarang</span>
        </a>
    </div>
@else
    <!-- Grid 2-Kolom di Ponsel / Layar Kecil, 3-Kolom di Desktop -->
    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-2.5 sm:gap-6">
        @foreach($invitations as $invitation)
        <div id="invitation-card-{{ $invitation->id }}" class="bg-white rounded-xl sm:rounded-2xl border border-slate-200 shadow-xs hover:border-[#FF2E3A]/40 hover:shadow-lg transition-all duration-300 flex flex-col justify-between overflow-hidden group">
            <div class="p-2.5 sm:p-6 flex-1 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between gap-1 mb-2 sm:mb-3 flex-wrap">
                        <span class="px-1.5 py-0.5 sm:px-2.5 sm:py-1 rounded-full text-[9px] sm:text-[11px] font-semibold uppercase tracking-wider bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8] truncate max-w-[110px] sm:max-w-none" title="{{ $invitation->theme->name ?? 'Tema' }}">
                            {{ $invitation->theme->name ?? 'Tema' }}
                        </span>
                        @if($invitation->isPublished())
                            <span class="px-1.5 py-0.5 sm:px-2.5 sm:py-0.5 rounded-full text-[9px] sm:text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200 shrink-0">
                                Published
                            </span>
                        @else
                            <span class="px-1.5 py-0.5 sm:px-2.5 sm:py-0.5 rounded-full text-[9px] sm:text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200 shrink-0">
                                Draft
                            </span>
                        @endif
                    </div>

                    <h3 class="font-heading text-xs sm:text-xl font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors truncate" title="{{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}">
                        {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}
                    </h3>

                    <!-- Paket & Status Pembayaran Terpisah -->
                    @php
                        $cardPkgTier = $invitation->getPackageTier();
                        $cardPayKey = $invitation->getPaymentStatusKey();
                    @endphp
                    <div class="mt-2 p-2 sm:p-2.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1 text-[10px] sm:text-xs">
                        <div class="flex items-center justify-between gap-1.5">
                            <span class="text-slate-500 font-medium">Paket</span>
                            <span class="px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-bold {{ $cardPkgTier === 'premium' ? 'bg-amber-100 text-amber-900 border border-amber-300' : (in_array($cardPkgTier, ['basic_addon_1', 'basic_addon_2'], true) ? 'bg-sky-100 text-sky-800 border border-sky-200' : 'bg-white text-slate-700 border border-slate-200') }}">
                                {{ $invitation->getPackageShortName() }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between gap-1.5">
                            <span class="text-slate-500 font-medium">Pembayaran</span>
                            <span class="px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-bold {{ $cardPayKey === 'paid' ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : ($cardPayKey === 'unpaid' ? 'bg-rose-100 text-rose-700 border border-rose-200' : 'bg-sky-50 text-sky-700 border border-sky-200') }}">
                                {{ $invitation->getPaymentStatusLabel() }}@if($cardPayKey === 'paid' && $invitation->paid_amount > 0) (Rp{{ number_format($invitation->paid_amount, 0, ',', '.') }})@endif
                            </span>
                        </div>
                        @if($cardPayKey === 'unpaid')
                            <button type="button" onclick="openNewInvitationModal({{ $invitation->id }}, 'Selesaikan pembayaran Rp10.000 (Basic) atau Rp59.000 (Premium) untuk mengaktifkan undangan ini.')" class="w-full mt-1 py-1 px-2 rounded-lg bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-[10px] font-bold transition cursor-pointer text-center">
                                Bayar Sekarang (Rp10k / Rp59k)
                            </button>
                        @elseif($invitation->theme && $invitation->theme->isPremium() && !$invitation->is_premium)
                            <button type="button" onclick="openUpgradeModal({{ $invitation->id }})" class="w-full mt-1 py-1 px-2 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-300 text-[10px] font-bold transition cursor-pointer flex items-center justify-center gap-1" title="Bayar Tema Premium (Rp 59.000)">
                                <svg class="w-2.5 h-2.5 text-amber-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <span>Aktifkan Tema Premium (Rp59k)</span>
                            </button>
                        @elseif($cardPkgTier !== 'premium')
                            <button type="button" onclick="openUpgradeModal({{ $invitation->id }}, 'Tambah kuota tamu/lagu atau upgrade undangan ini ke Premium.')" class="w-full mt-1 py-1 px-2 rounded-lg bg-white hover:bg-rose-50 text-[#FF2E3A] border border-rose-200 text-[10px] font-semibold transition cursor-pointer text-center">
                                Upgrade / Add-On
                            </button>
                        @endif
                    </div>
                    
                    <p class="text-[10px] sm:text-xs text-slate-500 mt-1 flex items-center gap-1 sm:gap-1.5 truncate">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="truncate">{{ $invitation->event_date ? $invitation->event_date->format('d M Y') : '-' }}</span>
                    </p>

                    <p class="text-[10px] sm:text-xs text-slate-500 mt-0.5 flex items-center gap-1 sm:gap-1.5 truncate">
                        <svg class="w-3 h-3 sm:w-4 sm:h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="truncate">{{ $invitation->venue ?? 'Tempat belum diisi' }}</span>
                    </p>
                </div>
            </div>

            <!-- Tombol Aksi Kompak: 2-Kolom di HP, Flex di Layar Lebar -->
            <div class="p-2 sm:px-6 sm:py-4 bg-slate-50/70 border-t border-slate-200">
                <div class="grid grid-cols-2 gap-1 sm:gap-2">
                    <a href="{{ route('dashboard.invitations.edit', $invitation) }}" class="py-1 px-1 sm:px-3.5 sm:py-1.5 text-[10px] sm:text-xs font-semibold rounded-lg sm:rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 hover:border-slate-300 transition-colors shadow-2xs text-center flex items-center justify-center gap-1">
                        <span>Editor</span>
                    </a>
                    
                    <button type="button" class="btn-share-invitation py-1 px-1 sm:px-3.5 sm:py-1.5 text-[10px] sm:text-xs font-semibold rounded-lg sm:rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white transition-all shadow-2xs flex items-center justify-center gap-1 cursor-pointer"
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
                    <a href="{{ route('invitation.show', $invitation->slug) }}" target="_blank" class="py-1 px-1 sm:px-3.5 sm:py-1.5 text-[10px] sm:text-xs font-semibold rounded-lg sm:rounded-xl bg-[#FF2E3A] text-white hover:bg-[#E01E2A] transition-colors shadow-2xs flex items-center justify-center gap-0.5">
                        <span>Lihat</span>
                        <svg class="w-2.5 h-2.5 sm:w-3.5 sm:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </a>
                    @endif

                    <button type="button" class="btn-delete-invitation py-1 px-1 sm:px-3 sm:py-1.5 rounded-lg sm:rounded-xl border border-red-200 text-red-600 hover:bg-red-50 text-[10px] sm:text-xs font-medium flex items-center justify-center gap-1 cursor-pointer {{ !$invitation->isPublished() ? 'col-span-2' : '' }}" data-id="{{ $invitation->id }}" data-title="{{ $invitation->title ?? 'Undangan' }}">
                        <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 stroke-current" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        <span>Hapus</span>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif

@include('dashboard.components.delete-modal')
@include('dashboard.components.share-modal')
@endsection
