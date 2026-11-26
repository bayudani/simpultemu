<!-- ================= UNIVERSAL UPGRADE & ADD-ON MODAL (DUITKU INTEGRATED) ================= -->
<div id="universal-upgrade-modal" class="fixed inset-0 z-[100] bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-2.5 sm:p-4 lg:p-6 hidden">
    <div class="relative w-full max-w-4xl lg:max-w-5xl bg-white rounded-2xl sm:rounded-3xl shadow-2xl border border-slate-200 flex flex-col max-h-[96vh] sm:max-h-[92vh] lg:max-h-[88vh] overflow-hidden animate-scale-up">
        
        <!-- Header -->
        <div class="px-4 sm:px-6 py-2.5 sm:py-3.5 border-b border-slate-100 flex items-center justify-between bg-gradient-to-r from-rose-50/50 via-white to-amber-50/30 shrink-0">
            <div class="flex items-center gap-2.5 sm:gap-3 min-w-0">
                <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl sm:rounded-2xl bg-[#FF2E3A] text-white flex items-center justify-center shadow-xs shrink-0">
                    <svg class="w-4 h-4 sm:w-4.5 sm:h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h3 id="upgrade-modal-title" class="font-serif text-sm sm:text-base lg:text-lg font-bold text-slate-900 leading-tight truncate">
                        Pilih Paket Yang Sesuai Dengan Kebutuhanmu
                    </h3>
                    <p id="upgrade-modal-subtitle" class="text-[10px] sm:text-xs text-slate-500 mt-0.5 leading-snug truncate">
                        Tingkatkan kuota nama tamu &amp; buka akses lebih banyak lagu pilihan pernikahan impian Anda.
                    </p>
                </div>
            </div>
            <button type="button" onclick="closeUpgradeModal()" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 hover:text-slate-800 flex items-center justify-center transition cursor-pointer shrink-0 ml-2">
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Alert Notification (Contextual why modal opened) -->
        <div id="upgrade-modal-alert-box" class="px-4 sm:px-5 py-1.5 sm:py-2 bg-amber-50 border-b border-amber-200/80 flex items-center gap-2 text-[10.5px] sm:text-xs text-amber-900 shrink-0 hidden">
            <svg class="w-3.5 h-3.5 shrink-0 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span id="upgrade-modal-alert-text" class="font-medium">Kuota paket saat ini telah mencapai batas. Pilih paket upgrade di bawah untuk melanjutkan.</span>
        </div>

        <!-- Cards Container -->
        <div class="flex-1 overflow-y-auto p-3 sm:p-4 lg:p-4.5 bg-slate-50/50">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2.5 sm:gap-3.5 lg:gap-4 items-stretch">
                
                <!-- CARD 1: Add-On Paket Basic 1 -->
                <div id="card-package-basic_addon_1" class="relative bg-white border-2 border-slate-200 hover:border-slate-300 rounded-xl sm:rounded-2xl p-3 sm:p-3.5 lg:p-4 flex flex-col justify-between shadow-xs transition group">
                    <div class="space-y-2.5 sm:space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="w-8 h-8 rounded-xl bg-rose-50 text-[#FF2E3A] flex items-center justify-center border border-rose-200 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                </svg>
                            </div>
                            <span class="px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-bold uppercase tracking-wider bg-slate-100 text-slate-700">
                                Add-On 1
                            </span>
                        </div>
                        <div>
                            <h4 class="font-serif text-sm sm:text-base font-bold text-slate-900 leading-tight">Add-On Paket Basic 1</h4>
                            <p class="text-[10px] sm:text-[11px] text-slate-500 mt-0.5 leading-snug">Solusi pas untuk menambah undangan keluarga dekat.</p>
                            <div id="badge-addon1-theme-warning" class="hidden mt-1.5 p-1 rounded-lg bg-amber-50 text-amber-800 border border-amber-200 text-[9px] sm:text-[9.5px] font-bold text-center flex items-center justify-center gap-1">
                                <svg class="w-3 h-3 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <span>Hanya Tambah Tamu (Tidak Buka Tema Premium)</span>
                            </div>
                        </div>
                        <div class="pt-2 sm:pt-2.5 border-t border-slate-100">
                            <div class="font-serif text-xl sm:text-2xl font-extrabold text-slate-900 leading-none">
                                Rp17.000
                            </div>
                            <span class="text-[9.5px] sm:text-[10px] text-slate-400 mt-0.5 block">Sekali bayar per undangan</span>
                        </div>
                        <ul class="space-y-1.5 sm:space-y-2 pt-1 text-[10.5px] sm:text-[11px] text-slate-700">
                            <li class="flex items-center gap-1.5 sm:gap-2">
                                <span class="w-3.5 h-3.5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                    <svg class="w-2 h-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Tambahan 7 Nama Tamu (<strong>Total 12 Tamu</strong>)</span>
                            </li>
                            <li class="flex items-center gap-1.5 sm:gap-2">
                                <span class="w-3.5 h-3.5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                    <svg class="w-2 h-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Tambahan 5 Lagu (<strong>Total 10 Lagu</strong>)</span>
                            </li>
                            <li class="flex items-center gap-1.5 sm:gap-2 text-slate-500">
                                <span class="w-3.5 h-3.5 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center shrink-0">
                                    <svg class="w-2 h-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Akses 10 Tema Basic Pilihan</span>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-3 sm:pt-3.5">
                        <button type="button" id="btn-checkout-addon-1" onclick="checkoutPackage('basic_addon_1', this)" class="w-full py-1.5 sm:py-2 px-3 rounded-xl border-2 border-[#FF2E3A] text-[#FF2E3A] hover:bg-[#FF2E3A] hover:text-white font-bold text-[11px] sm:text-xs text-center transition cursor-pointer flex items-center justify-center gap-1 shadow-2xs">
                            <span>Dapatkan Sekarang</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </div>

                <!-- CARD 2: Add-On Paket Basic 2 -->
                <div id="card-package-basic_addon_2" class="relative bg-white border-2 border-slate-200 hover:border-slate-300 rounded-xl sm:rounded-2xl p-3 sm:p-3.5 lg:p-4 flex flex-col justify-between shadow-xs transition group">
                    <div class="space-y-2.5 sm:space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="w-8 h-8 rounded-xl bg-rose-50 text-[#FF2E3A] flex items-center justify-center border border-rose-200 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                </svg>
                            </div>
                            <span class="px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-bold uppercase tracking-wider bg-slate-100 text-slate-700">
                                Add-On 2
                            </span>
                        </div>
                        <div>
                            <h4 class="font-serif text-sm sm:text-base font-bold text-slate-900 leading-tight">Add-On Paket Basic 2</h4>
                            <p class="text-[10px] sm:text-[11px] text-slate-500 mt-0.5 leading-snug">Pilihan terbaik untuk undangan kerabat &amp; teman kantor.</p>
                            <div id="badge-addon2-theme-warning" class="hidden mt-1.5 p-1 rounded-lg bg-amber-50 text-amber-800 border border-amber-200 text-[9px] sm:text-[9.5px] font-bold text-center flex items-center justify-center gap-1">
                                <svg class="w-3 h-3 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <span>Hanya Tambah Tamu (Tidak Buka Tema Premium)</span>
                            </div>
                        </div>
                        <div class="pt-2 sm:pt-2.5 border-t border-slate-100">
                            <div class="font-serif text-xl sm:text-2xl font-extrabold text-slate-900 leading-none">
                                Rp25.000
                            </div>
                            <span class="text-[9.5px] sm:text-[10px] text-slate-400 mt-0.5 block">Sekali bayar per undangan</span>
                        </div>
                        <ul class="space-y-1.5 sm:space-y-2 pt-1 text-[10.5px] sm:text-[11px] text-slate-700">
                            <li class="flex items-center gap-1.5 sm:gap-2">
                                <span class="w-3.5 h-3.5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                    <svg class="w-2 h-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Tambahan 12 Nama Tamu (<strong>Total 17 Tamu</strong>)</span>
                            </li>
                            <li class="flex items-center gap-1.5 sm:gap-2">
                                <span class="w-3.5 h-3.5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                    <svg class="w-2 h-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Akses Lengkap 20 Lagu (<strong>Total 20 Lagu</strong>)</span>
                            </li>
                            <li class="flex items-center gap-1.5 sm:gap-2 text-slate-500">
                                <span class="w-3.5 h-3.5 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center shrink-0">
                                    <svg class="w-2 h-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Akses 10 Tema Basic Pilihan</span>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-3 sm:pt-3.5">
                        <button type="button" id="btn-checkout-addon-2" onclick="checkoutPackage('basic_addon_2', this)" class="w-full py-1.5 sm:py-2 px-3 rounded-xl border-2 border-[#FF2E3A] text-[#FF2E3A] hover:bg-[#FF2E3A] hover:text-white font-bold text-[11px] sm:text-xs text-center transition cursor-pointer flex items-center justify-center gap-1 shadow-2xs">
                            <span>Dapatkan Sekarang</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </div>

                <!-- CARD 3: Premium (Highlighted Red) -->
                <div id="card-package-premium" class="relative bg-gradient-to-br from-[#FF2E3A] to-[#D61824] text-white rounded-xl sm:rounded-2xl p-3 sm:p-3.5 lg:p-4 flex flex-col justify-between shadow-xl ring-2 ring-[#FF2E3A]/40 transition group">
                    <div class="absolute -top-2.5 right-3">
                        <span class="px-2.5 py-0.5 rounded-full text-[9px] font-extrabold uppercase tracking-wider bg-white text-[#FF2E3A] shadow-md border border-rose-200">
                            Paling Populer
                        </span>
                    </div>
                    <div class="space-y-2.5 sm:space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="w-8 h-8 rounded-xl bg-white/20 text-white flex items-center justify-center border border-white/30 shrink-0">
                                <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24">
                                    <path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/>
                                </svg>
                            </div>
                            <span class="px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-extrabold uppercase tracking-wider bg-white/20 text-white border border-white/30">
                                Full Akses
                            </span>
                        </div>
                        <div>
                            <h4 class="font-serif text-sm sm:text-base font-bold text-white leading-tight">Premium</h4>
                            <p class="text-[10px] sm:text-[11px] text-white/90 mt-0.5 leading-snug">Pengalaman megah paripurna tanpa batasan apa pun.</p>
                            <div id="badge-premium-theme-exclusive" class="hidden mt-1.5 p-1 rounded-lg bg-white/25 text-white border border-white/40 text-[9px] sm:text-[9.5px] font-bold text-center flex items-center justify-center gap-1">
                                <svg class="w-3 h-3 text-amber-200 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l2.4 7.4H22l-6 4.6 2.3 7.2L12 16.8 5.7 21.2 8 14l-6-4.6h7.6z"/>
                                </svg>
                                <span>Satu-satunya Paket untuk Membuka Tema Premium &amp; Lanjut Langkah 2</span>
                            </div>
                        </div>
                        <div class="pt-2 sm:pt-2.5 border-t border-white/20">
                            <div class="font-serif text-xl sm:text-2xl font-extrabold text-white leading-none">
                                Rp59.000
                            </div>
                            <span class="text-[9.5px] sm:text-[10px] text-white/80 mt-0.5 block">Sekali bayar per undangan</span>
                        </div>
                        <ul class="space-y-1.5 sm:space-y-2 pt-1 text-[10.5px] sm:text-[11px] text-white/95">
                            <li class="flex items-center gap-1.5 sm:gap-2">
                                <span class="w-3.5 h-3.5 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0 font-bold">
                                    <svg class="w-2 h-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span><strong>Nama Tamu Tak Terbatas</strong> (Unlimited)</span>
                            </li>
                            <li class="flex items-center gap-1.5 sm:gap-2">
                                <span class="w-3.5 h-3.5 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0 font-bold">
                                    <svg class="w-2 h-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span><strong>Lagu Tak Terbatas</strong> (Semua Preset &amp; Upload Lagu Sendiri)</span>
                            </li>
                            <li class="flex items-center gap-1.5 sm:gap-2">
                                <span class="w-3.5 h-3.5 rounded-full bg-white text-[#FF2E3A] flex items-center justify-center shrink-0 font-bold">
                                    <svg class="w-2 h-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span><strong>Buka Seluruh 20 Tema</strong> (Basic + 10 Tema Premium)</span>
                            </li>
                            <li class="flex items-center gap-1.5 sm:gap-2">
                                <span class="w-3.5 h-3.5 rounded-full bg-white/20 text-white flex items-center justify-center shrink-0 font-bold">
                                    <svg class="w-2 h-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                </span>
                                <span>Galeri Foto Lengkap &amp; Story Timeline</span>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-3 sm:pt-3.5">
                        <button type="button" onclick="checkoutPackage('premium', this)" class="w-full py-1.5 sm:py-2 px-3 rounded-xl bg-white hover:bg-slate-100 text-[#FF2E3A] font-extrabold text-[11px] sm:text-xs text-center transition cursor-pointer flex items-center justify-center gap-1 shadow-md">
                            <span>Dapatkan Sekarang</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="px-4 sm:px-6 py-2.5 sm:py-3 border-t border-slate-200 bg-white flex flex-col sm:flex-row items-center justify-between gap-2.5 text-[10.5px] sm:text-xs text-slate-500 shrink-0">
            <div class="flex items-center gap-1.5 sm:gap-2 text-slate-600">
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <span class="text-[10px] sm:text-[11px]">Pembayaran aman instan via <strong>Duitku</strong> (QRIS, Virtual Account, &amp; E-Wallet).</span>
            </div>
            <div class="flex items-center gap-2 flex-wrap justify-end">
                @if(config('services.duitku.base_url', '') === 'https://api-sandbox.duitku.com/api/merchant/createInvoice' || env('DUITKU_SANDBOX_MODE', true))
                <div class="flex items-center gap-1 sm:gap-1.5 flex-wrap">
                    <span class="text-[10px] sm:text-[11px] font-semibold text-slate-500 flex items-center gap-1">
                        <svg class="w-3 h-3 text-amber-500 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span>Simulasi:</span>
                    </span>
                    <button type="button" id="sim-btn-addon-1" onclick="simulateSandboxPayment('basic_addon_1')" class="px-2 py-0.5 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-300 text-[9.5px] sm:text-[10px] font-semibold transition cursor-pointer" title="Simulasi Bayar Add-On 1">
                        + Add-On 1 (12 Tamu)
                    </button>
                    <button type="button" id="sim-btn-addon-2" onclick="simulateSandboxPayment('basic_addon_2')" class="px-2 py-0.5 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-300 text-[9.5px] sm:text-[10px] font-semibold transition cursor-pointer" title="Simulasi Bayar Add-On 2">
                        + Add-On 2 (17 Tamu)
                    </button>
                    <button type="button" onclick="simulateSandboxPayment('premium')" class="px-2 py-0.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-[#FF2E3A] border border-rose-300 text-[9.5px] sm:text-[10px] font-bold transition cursor-pointer flex items-center gap-1" title="Simulasi Bayar Premium">
                        <svg class="w-2.5 h-2.5 fill-current" viewBox="0 0 24 24">
                            <path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/>
                        </svg>
                        <span>Premium</span>
                    </button>
                </div>
                @endif
                <button type="button" onclick="closeUpgradeModal()" class="px-3.5 py-1 sm:py-1.5 rounded-xl border border-slate-200 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-[11px] transition cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>

    </div>
</div>

<!-- ================= DUITKU POPUP JS LOADER & CHECKOUT SCRIPT ================= -->
@if(str_contains(config('services.duitku.base_url', ''), 'sandbox') || env('DUITKU_SANDBOX_MODE', true))
<script src="https://app-sandbox.duitku.com/lib/js/duitku.js"></script>
@else
<script src="https://app.duitku.com/lib/js/duitku.js"></script>
@endif
<script>
let currentUpgradeInvitationId = null;
let currentFocusedTier = null;

function openUpgradeModal(invitationId = null, reasonText = '', focusedTier = null) {
    currentUpgradeInvitationId = invitationId;
    currentFocusedTier = focusedTier;
    const modal = document.getElementById('universal-upgrade-modal');
    const alertBox = document.getElementById('upgrade-modal-alert-box');
    const alertText = document.getElementById('upgrade-modal-alert-text');
    const subtitle = document.getElementById('upgrade-modal-subtitle');

    const addon1Card = document.getElementById('card-package-basic_addon_1');
    const addon2Card = document.getElementById('card-package-basic_addon_2');
    const premCard = document.getElementById('card-package-premium');
    const addon1Badge = document.getElementById('badge-addon1-theme-warning');
    const addon2Badge = document.getElementById('badge-addon2-theme-warning');
    const premBadge = document.getElementById('badge-premium-theme-exclusive');

    if (reasonText && alertBox && alertText) {
        alertText.innerHTML = reasonText;
        alertBox.classList.remove('hidden');
    } else if (alertBox) {
        alertBox.classList.add('hidden');
    }

    if (focusedTier === 'premium') {
        if (subtitle) {
            subtitle.innerText = 'Buka akses 10 tema eksklusif luxury, tamu tak terbatas, dan lagu kustom untuk hari istimewa Anda.';
        }
        if (addon1Badge) addon1Badge.classList.remove('hidden');
        if (addon2Badge) addon2Badge.classList.remove('hidden');
        if (premBadge) premBadge.classList.remove('hidden');
        if (addon1Card) addon1Card.classList.add('opacity-60');
        if (addon2Card) addon2Card.classList.add('opacity-60');
        if (premCard) {
            premCard.classList.remove('opacity-60');
            premCard.classList.add('scale-[1.02]', 'ring-4', 'ring-[#FF2E3A]');
        }

        // Nonaktifkan tombol Dapatkan Sekarang pada Add-On karena tema Premium hanya bisa dibuka lewat Paket Premium
        const btnAddon1 = document.getElementById('btn-checkout-addon-1');
        const btnAddon2 = document.getElementById('btn-checkout-addon-2');
        if (btnAddon1) {
            btnAddon1.disabled = true;
            btnAddon1.classList.remove('border-[#FF2E3A]', 'text-[#FF2E3A]', 'hover:bg-[#FF2E3A]', 'hover:text-white', 'cursor-pointer');
            btnAddon1.classList.add('bg-slate-100', 'border-slate-300', 'text-slate-400', 'cursor-not-allowed');
            btnAddon1.innerHTML = '<span>Hanya untuk Tema Basic</span>';
        }
        if (btnAddon2) {
            btnAddon2.disabled = true;
            btnAddon2.classList.remove('border-[#FF2E3A]', 'text-[#FF2E3A]', 'hover:bg-[#FF2E3A]', 'hover:text-white', 'cursor-pointer');
            btnAddon2.classList.add('bg-slate-100', 'border-slate-300', 'text-slate-400', 'cursor-not-allowed');
            btnAddon2.innerHTML = '<span>Hanya untuk Tema Basic</span>';
        }

        const simBtn1 = document.getElementById('sim-btn-addon-1');
        const simBtn2 = document.getElementById('sim-btn-addon-2');
        if (simBtn1) simBtn1.classList.add('hidden');
        if (simBtn2) simBtn2.classList.add('hidden');

        setTimeout(() => {
            if (premCard) {
                premCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }, 150);
    } else {
        if (subtitle) {
            subtitle.innerText = 'Tingkatkan kuota nama tamu & buka akses lebih banyak lagu pilihan pernikahan impian Anda.';
        }
        if (addon1Badge) addon1Badge.classList.add('hidden');
        if (addon2Badge) addon2Badge.classList.add('hidden');
        if (premBadge) premBadge.classList.add('hidden');
        if (addon1Card) addon1Card.classList.remove('opacity-60');
        if (addon2Card) addon2Card.classList.remove('opacity-60');
        if (premCard) {
            premCard.classList.remove('scale-[1.02]', 'ring-4', 'ring-[#FF2E3A]');
        }

        // Aktifkan kembali tombol Add-On untuk tema Basic
        const btnAddon1 = document.getElementById('btn-checkout-addon-1');
        const btnAddon2 = document.getElementById('btn-checkout-addon-2');
        if (btnAddon1) {
            btnAddon1.disabled = false;
            btnAddon1.classList.add('border-[#FF2E3A]', 'text-[#FF2E3A]', 'hover:bg-[#FF2E3A]', 'hover:text-white', 'cursor-pointer');
            btnAddon1.classList.remove('bg-slate-100', 'border-slate-300', 'text-slate-400', 'cursor-not-allowed');
            btnAddon1.innerHTML = '<span>Dapatkan Sekarang</span><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>';
        }
        if (btnAddon2) {
            btnAddon2.disabled = false;
            btnAddon2.classList.add('border-[#FF2E3A]', 'text-[#FF2E3A]', 'hover:bg-[#FF2E3A]', 'hover:text-white', 'cursor-pointer');
            btnAddon2.classList.remove('bg-slate-100', 'border-slate-300', 'text-slate-400', 'cursor-not-allowed');
            btnAddon2.innerHTML = '<span>Dapatkan Sekarang</span><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>';
        }

        const simBtn1 = document.getElementById('sim-btn-addon-1');
        const simBtn2 = document.getElementById('sim-btn-addon-2');
        if (simBtn1) simBtn1.classList.remove('hidden');
        if (simBtn2) simBtn2.classList.remove('hidden');
    }

    if (modal) {
        modal.classList.remove('hidden');
    }
}

function closeUpgradeModal() {
    const modal = document.getElementById('universal-upgrade-modal');
    if (modal) {
        modal.classList.add('hidden');
    }
}

function resetPayButton(buttonEl, originalHtml) {
    if (buttonEl && originalHtml) {
        buttonEl.disabled = false;
        buttonEl.innerHTML = originalHtml;
    }
}

async function handlePaymentSuccess(result, packageTier, buttonEl = null, originalHtml = '') {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const confirmEndpoint = currentUpgradeInvitationId 
        ? `/dashboard/undangan/${currentUpgradeInvitationId}/upgrade/confirm` 
        : '/dashboard/upgrade-package/confirm';

    try {
        const response = await fetch(confirmEndpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                package_tier: packageTier,
                invitation_id: currentUpgradeInvitationId,
                merchant_order_id: result?.merchantOrderId || null,
                reference: result?.reference || null
            })
        });

        const confirmData = await response.json();

        if (confirmData.success) {
            const isPremiumTier = (packageTier === 'premium');

            window.dispatchEvent(new CustomEvent('duitku-payment-success', {
                detail: {
                    invitationId: currentUpgradeInvitationId || confirmData.invitation_id,
                    packageTier: packageTier,
                    isPremium: isPremiumTier
                }
            }));

            // If Premium unlocked, advance wizard to Step 2
            if (isPremiumTier && typeof window.onWizardPremiumUnlocked === 'function') {
                closeUpgradeModal();
                resetPayButton(buttonEl, originalHtml);
                window.onWizardPremiumUnlocked(currentUpgradeInvitationId || confirmData.invitation_id);
                return;
            }

            // If Add-On purchased, notify quota increase without advancing step 2 if premium theme is selected
            if (!isPremiumTier && typeof window.onWizardAddOnPurchased === 'function') {
                closeUpgradeModal();
                resetPayButton(buttonEl, originalHtml);
                window.onWizardAddOnPurchased(packageTier, currentUpgradeInvitationId || confirmData.invitation_id);
                return;
            }

            alert('Pembayaran berhasil! Paket Anda telah aktif.');
            window.location.reload();
        } else {
            alert(confirmData.message || 'Pembayaran berhasil dikonfirmasi. Halaman akan dimuat ulang.');
            window.location.reload();
        }
    } catch (e) {
        console.error('Confirmation error:', e);
        if (packageTier === 'premium' && typeof window.onWizardPremiumUnlocked === 'function') {
            closeUpgradeModal();
            resetPayButton(buttonEl, originalHtml);
            window.onWizardPremiumUnlocked(currentUpgradeInvitationId);
            return;
        } else if (packageTier !== 'premium' && typeof window.onWizardAddOnPurchased === 'function') {
            closeUpgradeModal();
            resetPayButton(buttonEl, originalHtml);
            window.onWizardAddOnPurchased(packageTier, currentUpgradeInvitationId);
            return;
        }
        window.location.reload();
    }
}

async function simulateSandboxPayment(packageTier = 'premium') {
    if (currentFocusedTier === 'premium' && (packageTier === 'basic_addon_1' || packageTier === 'basic_addon_2')) {
        alert('Paket Add-On hanya untuk tema Basic. Untuk membuka tema Premium dan lanjut ke Langkah 2, silakan pilih Paket Premium (Rp 59.000).');
        return;
    }
    if (!confirm('Apakah Anda ingin menyimulasikan konfirmasi pembayaran Duitku berhasil untuk paket ' + packageTier.toUpperCase() + '?')) return;
    await handlePaymentSuccess({
        merchantOrderId: 'SIM-' + Date.now(),
        reference: 'SIM-REF-' + Date.now()
    }, packageTier);
}

async function checkoutPackage(packageTier, buttonEl = null) {
    if (currentFocusedTier === 'premium' && (packageTier === 'basic_addon_1' || packageTier === 'basic_addon_2')) {
        alert('Paket Add-On hanya untuk tema Basic. Untuk membuka tema Premium dan lanjut ke Langkah 2, silakan pilih Paket Premium (Rp 59.000).');
        return;
    }
    let originalHtml = '';
    if (buttonEl) {
        originalHtml = buttonEl.innerHTML;
        buttonEl.disabled = true;
        buttonEl.innerHTML = `
            <svg class="animate-spin w-4 h-4 mx-auto" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="ml-1.5">Memproses Duitku...</span>
        `;
    }

    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const endpoint = currentUpgradeInvitationId 
            ? `/dashboard/undangan/${currentUpgradeInvitationId}/upgrade` 
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
                package_tier: packageTier,
                invitation_id: currentUpgradeInvitationId
            })
        });

        const data = await response.json();

        if (data.success && (data.reference || data.payment_url)) {
            // Check if Duitku Pop-up script is supported (supports both checkout.process and duitku.checkout)
            const duitkuPopup = (typeof checkout !== 'undefined' && typeof checkout.process === 'function') 
                ? checkout.process 
                : ((typeof duitku !== 'undefined' && typeof duitku.checkout === 'function') ? duitku.checkout : null);

            if (duitkuPopup && data.reference) {
                duitkuPopup(data.reference, {
                    defaultLanguage: 'id',
                    successEvent: async function(result) {
                        await handlePaymentSuccess(result, packageTier, buttonEl, originalHtml);
                    },
                    pendingEvent: async function(result) {
                        await handlePaymentSuccess(result, packageTier, buttonEl, originalHtml);
                    },
                    errorEvent: function(result) {
                        alert('Pembayaran dibatalkan atau terjadi kendala.');
                        resetPayButton(buttonEl, originalHtml);
                    },
                    closeEvent: function() {
                        resetPayButton(buttonEl, originalHtml);
                    }
                });
            } else if (data.payment_url) {
                // Direct redirect to Duitku payment page fallback
                window.location.href = data.payment_url;
            } else {
                alert('Berhasil membuat invoice Duitku (Reference: ' + data.reference + '). Menunggu pembayaran.');
                resetPayButton(buttonEl, originalHtml);
            }
        } else {
            alert(data.message || 'Gagal memproses pembayaran ke Duitku. Silakan coba kembali.');
            resetPayButton(buttonEl, originalHtml);
        }
    } catch (err) {
        console.error('Checkout error:', err);
        alert('Terjadi kesalahan koneksi saat menghubungi server pembayaran: ' + err.message);
        resetPayButton(buttonEl, originalHtml);
    }
}

// Global expose
window.openUpgradeModal = openUpgradeModal;
window.closeUpgradeModal = closeUpgradeModal;
window.checkoutPackage = checkoutPackage;
window.simulateSandboxPayment = simulateSandboxPayment;
</script>
