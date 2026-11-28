@extends('layouts.dashboard')

@section('title', 'Buat Undangan Baru')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Top Back Link -->
    <div class="flex items-center justify-between">
        <a href="{{ route('dashboard.invitations.index') }}" class="text-xs font-semibold text-[#FF2E3A] hover:underline flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali ke Undangan Saya
        </a>
    </div>

    <!-- Quota Gate Notice Card -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 sm:p-8 bg-gradient-to-r from-[#DBF6FF]/60 via-white to-rose-50/40 border-b border-slate-200">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-100 text-amber-800 border border-amber-200 mb-3">
                Kuota Undangan Pertama Sudah Digunakan
            </span>
            <h1 class="font-heading text-2xl sm:text-3xl font-bold text-slate-900">
                Buat Undangan Berikutnya
            </h1>
            <p class="text-sm text-slate-600 mt-1.5 leading-relaxed max-w-2xl">
                Paket Basic gratis hanya berlaku untuk <strong>1 undangan pertama</strong> setiap akun dan tidak kembali meski undangan sebelumnya dihapus. Untuk membuat undangan baru berikutnya, pilih paket per undangan di bawah ini.
            </p>

            @if($pendingFreeDraft)
            <div class="mt-4 p-4 rounded-2xl bg-amber-50 border border-amber-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="text-xs text-amber-900">
                    <p class="font-bold">Anda memiliki 1 draf undangan pertama gratis yang belum dipublikasikan:</p>
                    <p class="mt-0.5 text-amber-800">{{ $pendingFreeDraft->groom_nickname }} &amp; {{ $pendingFreeDraft->bride_nickname }} ({{ $pendingFreeDraft->theme->name ?? 'Tema Basic' }})</p>
                </div>
                <a href="{{ route('dashboard.invitations.edit', $pendingFreeDraft) }}" class="px-4 py-2 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold text-center shrink-0 transition">
                    Lanjutkan Edit Undangan Pertama &rarr;
                </a>
            </div>
            @endif
        </div>

        <div class="p-6 sm:p-8 bg-slate-50/60">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-stretch">
                <!-- Basic Slot Rp10.000 -->
                <div class="bg-white border-2 border-slate-200 hover:border-[#0284C7]/60 rounded-2xl p-5 sm:p-6 flex flex-col justify-between shadow-xs transition">
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                                Paket Basic
                            </span>
                            <span class="text-xs font-semibold text-slate-400">1 Undangan</span>
                        </div>
                        <div>
                            <h2 class="font-heading text-lg font-bold text-slate-900">Undangan Kedua &amp; Seterusnya</h2>
                            <div class="mt-1.5 flex items-baseline gap-1.5">
                                <span class="font-serif text-3xl font-extrabold text-[#FF2E3A]">Rp10.000</span>
                                <span class="text-xs text-slate-500">/ undangan</span>
                            </div>
                        </div>
                        <ul class="space-y-2.5 pt-3 border-t border-slate-100 text-xs sm:text-sm text-slate-700">
                            <li class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span><strong>1 Undangan Baru</strong> (Aktif selamanya)</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Maksimal <strong>5 Nama Tamu</strong></span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Maksimal <strong>5 Pilihan Lagu</strong></span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Akses <strong>10 Tema Basic Estetik</strong></span>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-5">
                        <button type="button" onclick="checkoutNewInvitationSlot('basic_slot', this)" class="w-full py-3 px-4 rounded-xl border-2 border-[#FF2E3A] text-[#FF2E3A] hover:bg-[#FF2E3A] hover:text-white font-bold text-xs sm:text-sm transition cursor-pointer">
                            Bayar Rp10.000 &amp; Buat Undangan
                        </button>
                    </div>
                </div>

                <!-- Premium Slot Rp59.000 -->
                <div class="bg-gradient-to-br from-[#FF2E3A] to-[#D61824] text-white rounded-2xl p-5 sm:p-6 flex flex-col justify-between shadow-lg ring-2 ring-[#FF2E3A]/30">
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-white/20 text-white border border-white/30">
                                Paket Premium
                            </span>
                            <span class="text-xs font-semibold text-white/85">1 Undangan</span>
                        </div>
                        <div>
                            <h2 class="font-heading text-lg font-bold text-white">Undangan Premium Baru</h2>
                            <div class="mt-1.5 flex items-baseline gap-1.5">
                                <span class="font-serif text-3xl font-extrabold text-white">Rp59.000</span>
                                <span class="text-xs text-white/85">/ undangan</span>
                            </div>
                        </div>
                        <ul class="space-y-2.5 pt-3 border-t border-white/20 text-xs sm:text-sm text-white/95">
                            <li class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0">
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span><strong>Nama Tamu Tidak Terbatas</strong></span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0">
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span><strong>Lagu Tidak Terbatas</strong> + Upload MP3 Sendiri</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0">
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Akses Seluruh <strong>20 Tema Eksklusif</strong></span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0">
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Akses Seluruh <strong>Fitur Premium</strong></span>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-5">
                        <button type="button" onclick="checkoutNewInvitationSlot('premium_slot', this)" class="w-full py-3 px-4 rounded-xl bg-white hover:bg-slate-100 text-[#FF2E3A] font-extrabold text-xs sm:text-sm transition cursor-pointer shadow-md">
                            Bayar Rp59.000 &amp; Buat Undangan
                        </button>
                    </div>
                </div>
            </div>

            @if(config('services.duitku.base_url', '') === 'https://api-sandbox.duitku.com/api/merchant/createInvoice' || env('DUITKU_SANDBOX_MODE', true))
            <div class="mt-5 p-3.5 rounded-2xl bg-amber-50 border border-amber-200 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-amber-900">
                <span class="font-semibold">Mode Sandbox Duitku: uji coba pembelian slot baru secara instan</span>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="simulateNewSlotPayment('basic_slot')" class="px-3 py-1.5 rounded-lg bg-white hover:bg-amber-100 border border-amber-300 font-bold cursor-pointer">
                        Simulasi Basic Rp10.000
                    </button>
                    <button type="button" onclick="simulateNewSlotPayment('premium_slot')" class="px-3 py-1.5 rounded-lg bg-[#FF2E3A] hover:bg-[#E01E2A] text-white font-bold cursor-pointer">
                        Simulasi Premium Rp59.000
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
