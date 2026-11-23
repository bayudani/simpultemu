<!-- Modal Upgrade Premium Duitku (Pop-up Mode Sandbox) -->
<div id="upgrade-premium-modal" class="fixed inset-0 z-50 bg-slate-900/75 backdrop-blur-sm flex items-center justify-center p-3 sm:p-4 hidden transition-all duration-300" role="dialog" aria-modal="true" aria-labelledby="upgrade-modal-title">
    <div class="bg-white rounded-3xl max-w-lg w-full shadow-2xl border border-slate-200 overflow-hidden transform transition-all duration-300 scale-95 opacity-0 flex flex-col max-h-[94vh]" id="upgrade-modal-card">
        
        <!-- Header with gradient & crown -->
        <div class="relative px-6 py-5 bg-gradient-to-r from-amber-500 via-rose-500 to-[#FF2E3A] text-white shrink-0 overflow-hidden">
            <div class="absolute -right-4 -bottom-6 w-32 h-32 bg-white/10 rounded-full blur-xl pointer-events-none"></div>
            
            <div class="flex items-center justify-between relative z-10">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center shadow-xs border border-white/30 shrink-0">
                        <svg class="w-6 h-6 text-amber-200" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider bg-white/25 border border-white/30 text-white mb-0.5">
                            Paket Eksklusif
                        </span>
                        <h3 id="upgrade-modal-title" class="font-heading text-lg sm:text-xl font-bold text-white">Upgrade Premium Serenade</h3>
                    </div>
                </div>

                <button type="button" onclick="closeUpgradeModal()" class="w-8 h-8 rounded-xl bg-white/15 hover:bg-white/25 text-white flex items-center justify-center transition cursor-pointer" title="Tutup Modal">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Body -->
        <div class="p-5 sm:p-6 overflow-y-auto space-y-4">
            
            <!-- Price highlight box -->
            <div class="p-4 rounded-2xl bg-gradient-to-br from-rose-50 via-amber-50 to-orange-50 border border-rose-200/80 flex items-center justify-between">
                <div>
                    <span class="text-[11px] font-bold text-rose-800 uppercase tracking-wider">Investasi Satu Kali</span>
                    <div class="flex items-baseline gap-1 mt-0.5">
                        <span class="font-serif text-2xl sm:text-3xl font-extrabold text-[#FF2E3A]">Rp 59.000</span>
                        <span class="text-xs text-slate-600 font-medium">/ undangan</span>
                    </div>
                    <span class="text-[10px] text-slate-500 font-medium">Bukan biaya langganan bulanan / per akun</span>
                </div>
                <div class="text-right">
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-rose-600 text-white shadow-xs">
                        Aktif Selamanya
                    </span>
                </div>
            </div>

            <p class="text-xs text-slate-600 leading-relaxed font-normal">
                Batas maksimal 20 tamu pada paket Basic telah tercapai. Buka akses penuh fitur eksklusif tanpa batasan:
            </p>

            <!-- Feature list -->
            <div class="space-y-2.5 pt-1">
                <div class="flex items-start gap-3 p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                    <div class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-900">Tamu Undangan Tanpa Batas (Unlimited)</h4>
                        <p class="text-[11px] text-slate-500">Tambah dan sebar undangan ke ratusan hingga ribuan tamu tanpa batas.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                    <div class="w-7 h-7 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center shrink-0 mt-0.5 font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-900">Akses 10 Tema Premium Luxury</h4>
                        <p class="text-[11px] text-slate-500">Pilihan tema eksklusif dengan ornamen mewah beresolusi tinggi.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                    <div class="w-7 h-7 rounded-lg bg-sky-100 text-sky-700 flex items-center justify-center shrink-0 mt-0.5 font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-900">Musik Latar &amp; Lagu Kustom</h4>
                        <p class="text-[11px] text-slate-500">Auto-play pemutar musik romantis dan upload lagu favorit Anda.</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                    <div class="w-7 h-7 rounded-lg bg-purple-100 text-purple-700 flex items-center justify-center shrink-0 mt-0.5 font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-900">Galeri Foto &amp; Prewedding Interaktif</h4>
                        <p class="text-[11px] text-slate-500">Slideshow interaktif untuk mengabadikan momen terindah pernikahan.</p>
                    </div>
                </div>
            </div>

            <!-- Duitku Payment Badge -->
            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-100 border border-slate-200 text-slate-600 text-xs">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span class="text-[11px] font-medium text-slate-700">Pembayaran aman didukung oleh Duitku Pop-up</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">QRIS / VA / E-Wallet</span>
            </div>
        </div>

        <!-- Footer Action -->
        <div class="p-4 sm:p-5 bg-slate-50 border-t border-slate-200 flex flex-col sm:flex-row items-center gap-2.5 shrink-0">
            <button type="button" onclick="closeUpgradeModal()" class="w-full sm:w-auto px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-semibold transition cursor-pointer order-2 sm:order-1">
                Nanti Saja
            </button>
            <button type="button" id="btn-pay-duitku-upgrade" onclick="executeUpgradePayment()" class="w-full sm:flex-1 py-3 px-5 rounded-xl bg-[#FF2E3A] hover:bg-[#E01E2A] active:bg-[#C71722] text-white font-bold text-xs sm:text-sm shadow-md hover:scale-[1.01] active:scale-[0.99] transition flex items-center justify-center gap-2 cursor-pointer order-1 sm:order-2">
                <span id="btn-pay-text">Bayar Rp 59.000 Sekarang</span>
                <svg id="btn-pay-spinner" class="hidden animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Duitku Sandbox Pop-up Script -->
<script src="https://app-sandbox.duitku.com/lib/js/duitku.js"></script>

<script>
let currentUpgradeInvitationId = null;

function openUpgradeModal(invitationId) {
    currentUpgradeInvitationId = invitationId;
    const modal = document.getElementById('upgrade-premium-modal');
    const card = document.getElementById('upgrade-modal-card');
    if (!modal || !card) return;

    modal.classList.remove('hidden');
    requestAnimationFrame(() => {
        card.classList.remove('scale-95', 'opacity-0');
        card.classList.add('scale-100', 'opacity-100');
    });
}

function closeUpgradeModal() {
    const modal = document.getElementById('upgrade-premium-modal');
    const card = document.getElementById('upgrade-modal-card');
    if (!modal || !card) return;

    card.classList.remove('scale-100', 'opacity-100');
    card.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 200);
}

function executeUpgradePayment() {
    if (!currentUpgradeInvitationId) {
        alert('ID Undangan tidak ditemukan.');
        return;
    }

    const btn = document.getElementById('btn-pay-duitku-upgrade');
    const btnText = document.getElementById('btn-pay-text');
    const btnSpinner = document.getElementById('btn-pay-spinner');

    if (btn) btn.disabled = true;
    if (btnText) btnText.innerText = 'Menghubungkan Duitku...';
    if (btnSpinner) btnSpinner.classList.remove('hidden');

    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    fetch(`/dashboard/undangan/${currentUpgradeInvitationId}/upgrade`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf,
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (btn) btn.disabled = false;
        if (btnText) btnText.innerText = 'Bayar Rp 59.000 Sekarang';
        if (btnSpinner) btnSpinner.classList.add('hidden');

        if (data.success && data.reference) {
            // Panggil checkout.process dari Duitku pop-up
            if (typeof checkout !== 'undefined' && checkout.process) {
                checkout.process(data.reference, {
                    defaultLanguage: 'id',
                    successEvent: function(result) {
                        alert('Pembayaran berhasil! Undangan Anda telah diupgrade ke Premium.');
                        window.location.reload();
                    },
                    pendingEvent: function(result) {
                        alert('Pembayaran sedang diproses. Mohon selesaikan instruksi pembayaran.');
                        window.location.reload();
                    },
                    errorEvent: function(result) {
                        alert('Pembayaran gagal atau dibatalkan.');
                    },
                    closeEvent: function() {
                        console.log('Customer closed Duitku checkout pop-up');
                    }
                });
            } else if (data.payment_url) {
                // Fallback jika checkout pop-up gagal memuat
                window.location.href = data.payment_url;
            } else {
                alert('Berhasil membuat invoice. Reference: ' + data.reference);
            }
        } else {
            alert(data.message || 'Gagal membuat tagihan pembayaran.');
        }
    })
    .catch(err => {
        console.error(err);
        if (btn) btn.disabled = false;
        if (btnText) btnText.innerText = 'Bayar Rp 59.000 Sekarang';
        if (btnSpinner) btnSpinner.classList.add('hidden');
        alert('Terjadi kesalahan saat memproses pembayaran.');
    });
}
</script>

@if(session('show_upgrade_modal') && session('upgrade_invitation_id'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        if (typeof openUpgradeModal === 'function') {
            openUpgradeModal({{ session('upgrade_invitation_id') }});
        }
    }, 350);
});
</script>
@endif
