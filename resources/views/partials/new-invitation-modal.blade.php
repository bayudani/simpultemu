<!-- ================= MODAL BELI SLOT UNDANGAN BARU (RP 10.000 BASIC / RP 59.000 PREMIUM) ================= -->
<div id="new-invitation-slot-modal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-3 sm:p-5 hidden" style="z-index: 9999;">
    <div class="relative w-full max-w-3xl bg-white rounded-2xl sm:rounded-3xl shadow-2xl border border-slate-200 flex flex-col max-h-[94vh] overflow-hidden animate-scale-up">

        <!-- Header -->
        <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between bg-gradient-to-r from-[#DBF6FF]/50 via-white to-rose-50/40 shrink-0">
            <div class="min-w-0">
                <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8] mb-1">
                    Buat Undangan Berikutnya
                </span>
                <h3 class="font-heading text-base sm:text-xl font-bold text-slate-900 leading-tight">
                    Pilih Paket Pembuatan Undangan Baru
                </h3>
                <p id="new-inv-modal-subtitle" class="text-[11px] sm:text-xs text-slate-500 mt-0.5">
                    Paket Basic gratis hanya berlaku untuk 1 undangan pertama per akun (tidak reset meski undangan dihapus).
                </p>
            </div>
            <button type="button" onclick="closeNewInvitationModal()" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 hover:text-slate-800 flex items-center justify-center transition cursor-pointer shrink-0 ml-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Optional Pending Free Draft Helper -->
        @php
            $modalPendingDraft = auth()->check()
                ? auth()->user()->invitations()->where('payment_status', 'free')->where('status', 'draft')->latest()->first()
                : null;
        @endphp
        @if($modalPendingDraft)
        <div class="px-5 py-2.5 bg-amber-50 border-b border-amber-200/80 flex flex-col sm:flex-row sm:items-center justify-between gap-2 text-xs text-amber-900">
            <span>Anda masih memiliki <strong>1 draf undangan pertama gratis</strong> yang belum diterbitkan (<strong>{{ $modalPendingDraft->groom_nickname }} &amp; {{ $modalPendingDraft->bride_nickname }}</strong>).</span>
            <a href="{{ route('dashboard.invitations.edit', $modalPendingDraft) }}" class="px-3 py-1 rounded-lg bg-amber-600 hover:bg-amber-700 text-white font-bold text-[11px] text-center shrink-0 transition">
                Lanjutkan Draf Gratis &rarr;
            </a>
        </div>
        @endif

        <!-- Two Package Cards -->
        <div class="p-4 sm:p-6 overflow-y-auto bg-slate-50/60">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-stretch">

                <!-- Option 1: Undangan Basic Baru (Rp10.000) -->
                <div class="bg-white border-2 border-slate-200 hover:border-[#0284C7]/50 rounded-2xl p-4 sm:p-5 flex flex-col justify-between shadow-xs transition">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                                Basic Per Undangan
                            </span>
                            <span class="text-[10px] font-semibold text-slate-400">1 Undangan Baru</span>
                        </div>
                        <div>
                            <h4 class="font-heading text-base sm:text-lg font-bold text-slate-900">Undangan Basic Baru</h4>
                            <div class="mt-1 flex items-baseline gap-1.5">
                                <span class="font-serif text-2xl sm:text-3xl font-extrabold text-[#FF2E3A]">Rp10.000</span>
                                <span class="text-xs text-slate-500">/ undangan</span>
                            </div>
                        </div>
                        <ul class="space-y-2 pt-2 border-t border-slate-100 text-xs text-slate-700">
                            <li class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span><strong>1 Slot Undangan Baru</strong> (Aktif selamanya)</span>
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
                    <div class="pt-4">
                        <button type="button" onclick="checkoutNewInvitationSlot('basic_slot', this)" class="w-full py-2.5 px-4 rounded-xl border-2 border-[#FF2E3A] text-[#FF2E3A] hover:bg-[#FF2E3A] hover:text-white font-bold text-xs sm:text-sm transition cursor-pointer flex items-center justify-center gap-1.5 shadow-2xs">
                            <span>Bayar Rp10.000 &amp; Buat Undangan</span>
                        </button>
                    </div>
                </div>

                <!-- Option 2: Undangan Premium Baru (Rp59.000) -->
                <div class="bg-gradient-to-br from-[#FF2E3A] to-[#D61824] text-white rounded-2xl p-4 sm:p-5 flex flex-col justify-between shadow-lg ring-2 ring-[#FF2E3A]/30">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-white/20 text-white border border-white/30">
                                Premium Full Akses
                            </span>
                            <span class="text-[10px] font-semibold text-white/85">1 Undangan Baru</span>
                        </div>
                        <div>
                            <h4 class="font-heading text-base sm:text-lg font-bold text-white">Undangan Premium Baru</h4>
                            <div class="mt-1 flex items-baseline gap-1.5">
                                <span class="font-serif text-2xl sm:text-3xl font-extrabold text-white">Rp59.000</span>
                                <span class="text-xs text-white/80">/ undangan</span>
                            </div>
                        </div>
                        <ul class="space-y-2 pt-2 border-t border-white/20 text-xs text-white/95">
                            <li class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0">
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span><strong>Nama Tamu Tak Terbatas</strong></span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0">
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span><strong>Lagu Tak Terbatas</strong> + Upload MP3 Sendiri</span>
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
                    <div class="pt-4">
                        <button type="button" onclick="checkoutNewInvitationSlot('premium_slot', this)" class="w-full py-2.5 px-4 rounded-xl bg-white hover:bg-slate-100 text-[#FF2E3A] font-extrabold text-xs sm:text-sm transition cursor-pointer flex items-center justify-center gap-1.5 shadow-md">
                            <span>Bayar Rp59.000 &amp; Buat Undangan</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer & Sandbox Simulator -->
        <div class="px-5 py-3 border-t border-slate-200 bg-white flex flex-col sm:flex-row items-center justify-between gap-2.5 text-[11px] text-slate-500">
            <span>Pembayaran otomatis via Duitku (QRIS, Virtual Account, E-Wallet). Berlaku per 1 undangan.</span>
            @if(config('services.duitku.base_url', '') === 'https://api-sandbox.duitku.com/api/merchant/createInvoice' || env('DUITKU_SANDBOX_MODE', true))
            <div class="flex items-center gap-1.5 shrink-0">
                <span class="font-semibold text-slate-400">Simulasi:</span>
                <button type="button" onclick="simulateNewSlotPayment('basic_slot')" class="px-2 py-0.5 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-300 font-semibold cursor-pointer">
                    + Basic Rp10k
                </button>
                <button type="button" onclick="simulateNewSlotPayment('premium_slot')" class="px-2 py-0.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-[#FF2E3A] border border-rose-300 font-bold cursor-pointer">
                    + Premium Rp59k
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
let targetSlotInvitationId = null;

function openNewInvitationModal(invitationId = null, reasonText = '') {
    targetSlotInvitationId = invitationId;
    const modal = document.getElementById('new-invitation-slot-modal');
    const subtitle = document.getElementById('new-inv-modal-subtitle');
    if (subtitle && reasonText) {
        subtitle.textContent = reasonText;
    }
    if (modal) {
        modal.classList.remove('hidden');
    }
}

function closeNewInvitationModal() {
    const modal = document.getElementById('new-invitation-slot-modal');
    if (modal) {
        modal.classList.add('hidden');
    }
}

async function handleSlotPaymentConfirmed(result, slotTier) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const endpoint = targetSlotInvitationId
        ? `/dashboard/undangan/${targetSlotInvitationId}/upgrade/confirm`
        : '/dashboard/upgrade-package/confirm';

    const res = await fetch(endpoint, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            package_tier: slotTier,
            invitation_id: targetSlotInvitationId,
            merchant_order_id: result?.merchantOrderId || null,
            reference: result?.reference || null
        })
    });

    const data = await res.json();
    if (data.success) {
        closeNewInvitationModal();
        if (targetSlotInvitationId) {
            window.location.href = `/dashboard/undangan/${targetSlotInvitationId}/edit`;
        } else {
            window.location.href = '{{ route("dashboard.invitations.create") }}';
        }
    } else {
        alert(data.message || 'Pembayaran berhasil dikonfirmasi, memuat ulang halaman...');
        window.location.reload();
    }
}

async function simulateNewSlotPayment(slotTier = 'basic_slot') {
    const label = slotTier === 'premium_slot' ? 'Undangan Premium (Rp59.000)' : 'Undangan Basic (Rp10.000)';
    if (!confirm('Simulasikan pembayaran Duitku berhasil untuk ' + label + '?')) return;
    await handleSlotPaymentConfirmed({
        merchantOrderId: 'SIM-SLOT-' + Date.now(),
        reference: 'SIM-SLOT-REF-' + Date.now()
    }, slotTier);
}

async function checkoutNewInvitationSlot(slotTier, buttonEl = null) {
    const origHtml = buttonEl ? buttonEl.innerHTML : '';
    if (buttonEl) {
        buttonEl.disabled = true;
        buttonEl.innerHTML = '<span>Menyiapkan Pembayaran...</span>';
    }

    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const endpoint = targetSlotInvitationId
            ? `/dashboard/undangan/${targetSlotInvitationId}/upgrade`
            : '/dashboard/upgrade-package';

        const response = await fetch(endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                package_tier: slotTier,
                invitation_id: targetSlotInvitationId
            })
        });

        const data = await response.json();

        if (data.success && (data.reference || data.payment_url)) {
            const duitkuPopup = (typeof checkout !== 'undefined' && typeof checkout.process === 'function')
                ? checkout.process
                : ((typeof duitku !== 'undefined' && typeof duitku.checkout === 'function') ? duitku.checkout : null);

            if (duitkuPopup && data.reference) {
                duitkuPopup(data.reference, {
                    defaultLanguage: 'id',
                    successEvent: async function(result) {
                        await handleSlotPaymentConfirmed(result, slotTier);
                    },
                    pendingEvent: async function(result) {
                        await handleSlotPaymentConfirmed(result, slotTier);
                    },
                    errorEvent: function() {
                        alert('Pembayaran dibatalkan atau terjadi kendala.');
                        if (buttonEl) { buttonEl.disabled = false; buttonEl.innerHTML = origHtml; }
                    },
                    closeEvent: function() {
                        if (buttonEl) { buttonEl.disabled = false; buttonEl.innerHTML = origHtml; }
                    }
                });
            } else if (data.payment_url) {
                window.location.href = data.payment_url;
            }
        } else {
            alert(data.message || 'Gagal membuat tagihan Duitku.');
            if (buttonEl) { buttonEl.disabled = false; buttonEl.innerHTML = origHtml; }
        }
    } catch (err) {
        alert('Terjadi kesalahan koneksi pembayaran: ' + err.message);
        if (buttonEl) { buttonEl.disabled = false; buttonEl.innerHTML = origHtml; }
    }
}

window.openNewInvitationModal = openNewInvitationModal;
window.closeNewInvitationModal = closeNewInvitationModal;
window.checkoutNewInvitationSlot = checkoutNewInvitationSlot;
window.simulateNewSlotPayment = simulateNewSlotPayment;
</script>
