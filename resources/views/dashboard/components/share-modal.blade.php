<!-- Modal Bagikan Undangan Digital (Share Modal Lengkap & Multi-Tamu) -->
<div id="share-invitation-modal" class="fixed inset-0 z-50 bg-slate-900/70 backdrop-blur-sm flex items-center justify-center p-3 sm:p-4 hidden transition-all duration-300" role="dialog" aria-modal="true" aria-labelledby="share-modal-title">
    <div class="bg-white rounded-3xl max-w-5xl w-full shadow-2xl border border-slate-200 overflow-hidden transform transition-all duration-300 scale-95 opacity-0 flex flex-col max-h-[92vh]" id="share-modal-card">
        
        <!-- Modal Header -->
        <div class="px-5 sm:px-6 py-4 sm:py-5 bg-gradient-to-r from-slate-50 via-white to-slate-50 border-b border-slate-200 flex items-center justify-between shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-200 shadow-xs shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                    </svg>
                </div>
                <div>
                    <h3 id="share-modal-title" class="font-heading text-lg font-bold text-slate-900">Bagikan Undangan</h3>
                    <p id="share-modal-subtitle" class="text-xs text-slate-500 font-medium">The Wedding of Rian &amp; Maya</p>
                </div>
            </div>
            <button type="button" onclick="closeShareModal()" class="w-8 h-8 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-400 hover:text-slate-700 flex items-center justify-center transition cursor-pointer" title="Tutup Modal">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Tab Navigation: Kirim Cepat vs Banyak Tamu -->
        <div class="flex items-center border-b border-slate-200 bg-slate-50/70 px-4 sm:px-6 pt-2 shrink-0 gap-2">
            <button type="button" id="tab-btn-quick" onclick="switchShareTab('quick')" class="px-4 py-2.5 text-xs sm:text-sm font-bold border-b-2 border-[#FF2E3A] text-[#FF2E3A] flex items-center gap-2 transition cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <span>Kirim Cepat (1 Tamu)</span>
            </button>
            <button type="button" id="tab-btn-guests" onclick="switchShareTab('guests')" class="px-4 py-2.5 text-xs sm:text-sm font-semibold border-b-2 border-transparent text-slate-600 hover:text-slate-900 flex items-center gap-2 transition cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <span>Daftar Tamu &amp; Sebar Massal</span>
                <span id="share-modal-guest-count-badge" class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-900 border border-amber-200">
                    0 Tamu
                </span>
            </button>
        </div>

        <!-- Modal Body (Scrollable) -->
        <div class="p-5 sm:p-6 overflow-y-auto space-y-5">
            
            <!-- Draft Status Warning Banner (Hidden by default, shown if status is draft) -->
            <div id="share-modal-draft-banner" class="hidden p-4 rounded-2xl bg-amber-50 border border-amber-200/80 text-amber-900 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="flex items-start gap-2.5">
                    <svg class="w-5 h-5 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <div>
                        <p class="text-xs font-bold text-amber-900">Undangan Berstatus Draf (Tautan Terkunci)</p>
                        <p class="text-[11px] text-amber-700 mt-0.5">Tautan belum aktif dan tombol Salin, Buka, serta WhatsApp dikunci sampai Anda klik Publikasikan Sekarang agar tamu tidak menemui error 404.</p>
                    </div>
                </div>
                <div class="shrink-0">
                    <button type="button" id="share-modal-publish-btn" onclick="publishShareModalInvitation()" class="w-full sm:w-auto px-3.5 py-1.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-xs font-semibold shadow-xs transition cursor-pointer">
                        Publikasikan Sekarang
                    </button>
                </div>
            </div>

            <!-- Published Status Active Banner (Shown when status is published) -->
            <div id="share-modal-published-banner" class="hidden p-3.5 rounded-2xl bg-emerald-50 border border-emerald-200/80 text-emerald-900 flex items-center gap-2.5">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <p class="text-xs font-bold text-emerald-900">Undangan Sudah Dipublikasikan &amp; Aktif</p>
                    <p class="text-[11px] text-emerald-700 mt-0.5">Tautan sudah dapat disalin, dibuka, dan dibagikan ke WhatsApp tamu.</p>
                </div>
            </div>

            <!-- ================= TAB 1: KIRIM CEPAT (1 TAMU) - LANDSCAPE 2-COLUMN ================= -->
            <div id="share-pane-quick" class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                
                <!-- Kolom Kiri (5 col) -->
                <div class="lg:col-span-5 space-y-4">
                    <!-- Status Koneksi & Host Link Undangan (Otomatis & Bersih) -->
                    <div id="share-host-box" class="p-3.5 rounded-2xl bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200/90 shadow-2xs transition-all duration-300">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex items-center gap-2.5 sm:gap-3 min-w-0">
                                <div id="share-host-indicator-icon" class="w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center shadow-xs shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <span id="share-host-badge-status" class="px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-emerald-600 text-white shadow-2xs">
                                            Link Publik Online Aktif
                                        </span>
                                    </div>
                                    <p id="share-active-host-display" class="text-xs font-mono text-emerald-700 font-bold truncate mt-0.5">
                                        {{ request()->getSchemeAndHttpHost() }}
                                    </p>
                                </div>
                            </div>
                            
                            <button type="button" id="share-host-switch-btn" onclick="toggleHostOptions()" class="shrink-0 px-2.5 py-1.5 rounded-xl bg-white/95 hover:bg-white text-slate-700 hover:text-slate-900 text-xs font-medium border border-slate-200/90 shadow-2xs transition flex items-center gap-1.5 cursor-pointer" title="Ganti mode jaringan (Lokal / Wi-Fi / Online)">
                                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Opsi</span>
                            </button>
                        </div>

                        <!-- Collapsible Host Switcher for Advanced Use -->
                        <div id="host-advanced-panel" class="hidden mt-3 pt-3 border-t border-emerald-200/70 space-y-2">
                            <div class="flex items-center gap-1.5 flex-wrap">
                                <span class="text-[11px] font-bold text-slate-700 mr-1">Pilih Mode:</span>
                                <button type="button" id="host-pill-custom" onclick="setShareHostMode('custom')" class="px-2.5 py-1 rounded-lg text-[11px] font-bold bg-emerald-600 text-white shadow-2xs transition cursor-pointer">
                                    <svg class="w-3.5 h-3.5 inline-block mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>Online (Cloudflare)
                                </button>
                                <button type="button" id="host-pill-wifi" onclick="setShareHostMode('wifi')" class="px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 transition cursor-pointer">
                                    <svg class="w-3.5 h-3.5 inline-block mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>Wi-Fi Lokal
                                </button>
                                <button type="button" id="host-pill-local" onclick="setShareHostMode('local')" class="px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 transition cursor-pointer">
                                    <svg class="w-3.5 h-3.5 inline-block mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>Laptop (Localhost)
                                </button>
                            </div>

                            <div id="custom-host-container" class="flex items-center gap-2 pt-1">
                                <input type="text" id="custom-host-input" value="{{ request()->getSchemeAndHttpHost() }}" placeholder="https://domain-anda.com" oninput="onCustomHostInput(this.value)" class="w-full px-3 py-1.5 bg-white border border-slate-300 rounded-lg text-xs font-mono text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-400">
                                <button type="button" onclick="checkCloudflareTunnel(true)" class="shrink-0 px-2.5 py-1.5 rounded-lg bg-emerald-100 hover:bg-emerald-200 text-emerald-800 text-[11px] font-bold transition cursor-pointer" title="Deteksi otomatis Cloudflare">
                                    <svg class="w-3.5 h-3.5 inline-block mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>Cek
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Bagian: Link Langsung & Salin Cepat -->
                    <div class="p-4 rounded-2xl bg-slate-50/80 border border-slate-200/90 shadow-2xs space-y-2">
                        <div class="flex items-center justify-between gap-2 flex-wrap">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Tautan Undangan Digital
                            </label>
                            <span id="share-modal-url-lock-badge" class="hidden inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 border border-amber-200 text-[10px] font-semibold">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                Terkunci (Belum Publikasi)
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="relative flex-1">
                                <input type="text" id="share-modal-url-input" readonly class="w-full pl-3 pr-8 py-2.5 rounded-xl bg-white border border-slate-200 text-xs sm:text-sm font-mono text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 select-all cursor-pointer" onclick="handleShareModalUrlClick(this)">
                            </div>
                            <button type="button" id="btn-copy-main-link" onclick="copyShareModalLink()" class="px-3.5 py-2.5 rounded-xl bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-xs font-semibold shadow-[0_4px_12px_rgba(255,46,58,0.25)] flex items-center gap-1.5 shrink-0 transition cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
                                </svg>
                                <span id="copy-main-btn-text">Salin</span>
                            </button>
                            <a id="share-modal-open-link" href="#" target="_blank" onclick="return handleShareModalOpenClick(event)" class="p-2.5 rounded-xl border border-slate-200 hover:border-slate-300 bg-white hover:bg-slate-50 text-slate-600 text-xs font-semibold flex items-center justify-center shrink-0 transition" title="Buka Undangan di Tab Baru">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                        </div>
                        <p id="share-modal-url-lock-note" class="hidden text-[11px] text-amber-700 font-medium">
                            Publikasikan undangan terlebih dahulu agar tautan aktif dan dapat disalin tanpa error 404.
                        </p>
                    </div>

                    <!-- Bagian: Personalisasi Nama Tamu Cepat -->
                    <div class="p-4 rounded-2xl bg-[#DBF6FF]/35 border border-[#BAEAF8] space-y-3 shadow-2xs">
                        <div class="flex items-center justify-between">
                            <label for="share-modal-guest-name" class="block text-xs font-bold text-slate-800">
                                Kirim ke Nama Tamu Khusus (Opsional)
                            </label>
                            <span class="text-[10px] font-semibold text-[#0284C7] bg-[#DBF6FF] px-2 py-0.5 rounded-full border border-[#BAEAF8]">
                                Personalisasi Otomatis
                            </span>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-2">
                            <input type="text" id="share-modal-guest-name" oninput="onShareGuestNameChange(this.value)" placeholder="Contoh: Reny Maelani / Budi & Pasangan" class="w-full px-3.5 py-2 rounded-xl bg-white border border-[#BAEAF8] text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#0284C7]/30 transition">
                            <button type="button" onclick="saveQuickGuestToDatabase()" class="px-3 py-2 rounded-xl bg-sky-600 hover:bg-sky-700 text-white text-xs font-bold shrink-0 transition flex items-center justify-center gap-1 cursor-pointer" title="Simpan tamu ini ke daftar banyak tamu">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span>Simpan</span>
                            </button>
                        </div>
                        <p class="text-[11px] text-slate-500 leading-relaxed">
                            Nama tamu otomatis muncul di sampul depan undangan digital dan terisi ke pesan WhatsApp.
                        </p>
                    </div>
                </div>

                <!-- Kolom Kanan (7 col) -->
                <div class="lg:col-span-7 space-y-3.5 bg-slate-50/70 p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-2xs">
                    <div class="flex items-center justify-between">
                        <div>
                            <label for="share-modal-whatsapp-preview" class="block text-xs font-bold uppercase tracking-wider text-slate-800">
                                Format Pesan WhatsApp
                            </label>
                            <p class="text-[11px] text-slate-500">Pesan otomatis yang dikirim ke kontak WhatsApp tamu.</p>
                        </div>
                        <button type="button" id="share-modal-copy-wa-btn" onclick="copyShareModalWhatsappText()" class="px-2.5 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-xs font-semibold text-emerald-700 hover:text-emerald-800 flex items-center gap-1 border border-emerald-200/80 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span id="copy-wa-text-label">Salin Pesan</span>
                        </button>
                    </div>
                    <div class="relative">
                        <textarea id="share-modal-whatsapp-preview" rows="7" class="w-full p-3.5 rounded-xl bg-white border border-slate-200 text-xs text-slate-700 leading-relaxed font-sans focus:outline-none focus:ring-2 focus:ring-emerald-500/20 resize-none select-all shadow-2xs"></textarea>
                    </div>
                    
                    <!-- Tombol Utama Kirim WhatsApp -->
                    <a id="share-modal-wa-btn" href="#" target="_blank" onclick="return handleShareModalWaClick(event)" class="w-full py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-semibold text-sm shadow-[0_4px_14px_rgba(16,185,129,0.3)] hover:scale-[1.005] active:scale-[0.99] transition-all flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <span id="share-modal-wa-btn-label">Buka &amp; Kirim via WhatsApp</span>
                    </a>
                </div>
            </div>

            <!-- ================= TAB 2: DAFTAR TAMU - LANDSCAPE 2-COLUMN ================= -->
            <div id="share-pane-guests" class="hidden grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                
                <!-- Kolom Kiri: Kuota & Tambah Tamu (5 col) -->
                <div class="lg:col-span-5 space-y-4">
                    <!-- Form Tambah Tamu Tunggal (Cepat) -->
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/90 shadow-2xs space-y-3">
                        <div class="flex items-center justify-between gap-2">
                            <h5 class="text-xs font-bold uppercase tracking-wider text-slate-800">Tambah Tamu Baru</h5>
                            <button type="button" onclick="toggleBulkAddSection()" id="btn-bulk-toggle" class="px-2.5 py-1 rounded-xl bg-rose-50 hover:bg-rose-100 text-[#FF2E3A] border border-rose-200/90 text-[11px] font-bold flex items-center gap-1 transition shadow-2xs cursor-pointer shrink-0">
                                <svg id="bulk-toggle-icon" class="w-3.5 h-3.5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span id="bulk-toggle-text">Tambah Banyak</span>
                            </button>
                        </div>
                        <div class="space-y-2">
                            <input type="text" id="modal-guest-name-input" onkeydown="if(event.key === 'Enter'){ event.preventDefault(); addGuestToModalList(); }" placeholder="Ketik nama tamu (misal: Reny Maelani)..." class="w-full px-3.5 py-2 bg-white border border-slate-300 rounded-xl text-xs sm:text-sm text-slate-800 focus:outline-none focus:border-[#FF2E3A] focus:ring-2 focus:ring-[#FF2E3A]/20 transition shadow-2xs">
                            <div class="flex gap-2">
                                <input type="text" id="modal-guest-phone-input" onkeydown="if(event.key === 'Enter'){ event.preventDefault(); addGuestToModalList(); }" placeholder="No. WA (Opsional)" class="w-full px-3.5 py-2 bg-white border border-slate-300 rounded-xl text-xs sm:text-sm text-slate-800 focus:outline-none focus:border-[#FF2E3A] transition shadow-2xs">
                                <button type="button" onclick="addGuestToModalList()" class="px-4 py-2 bg-[#FF2E3A] hover:bg-[#E01E2A] text-white rounded-xl text-xs font-bold shadow-xs flex items-center justify-center gap-1.5 transition cursor-pointer shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    <span>Tambah</span>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-[11px] text-slate-400">
                            <span>Tekan <kbd class="px-1.5 py-0.5 rounded bg-white border border-slate-200 font-mono text-[10px] text-slate-600">Enter</kbd> untuk simpan</span>
                            <span class="text-emerald-600 font-medium inline-flex items-center gap-1"><svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg><span>Siap WhatsApp</span></span>
                        </div>
                    </div>

                    <!-- Form Tambah Banyak Sekaligus (Collapsible Bulk Add) -->
                    <div id="bulk-add-section" class="hidden p-4 rounded-2xl bg-amber-50/90 border border-amber-200/90 space-y-3 shadow-2xs">
                        <div class="flex items-center justify-between">
                            <label class="block text-xs font-bold text-amber-900">
                                Tempel (Paste) Daftar Nama Tamu
                            </label>
                            <span class="text-[10px] text-amber-700 bg-amber-100 px-2 py-0.5 rounded-full font-medium">1 baris = 1 tamu</span>
                        </div>
                        <textarea id="bulk-guests-textarea" rows="4" placeholder="Reny Maelani&#10;Budi Santoso &amp; Pasangan&#10;Keluarga Bpk. Hendra" class="w-full p-3 rounded-xl bg-white border border-amber-300 text-xs sm:text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-400 font-sans leading-relaxed"></textarea>
                        <div class="flex items-center justify-end gap-2">
                            <button type="button" onclick="toggleBulkAddSection()" class="px-3 py-1.5 rounded-lg bg-slate-200 text-slate-700 text-xs font-semibold hover:bg-slate-300 transition cursor-pointer">
                                Batal
                            </button>
                            <button type="button" onclick="submitBulkGuestsToModal()" class="px-3.5 py-1.5 rounded-lg bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold shadow-xs transition cursor-pointer flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Simpan Semua</span>
                            </button>
                        </div>
                    </div>

                    <!-- Box Solusi & Edukasi: Edit Nama Tamu Bebas & Gratis Kapan Saja -->
                    <div class="p-3.5 rounded-2xl bg-sky-50/90 border border-sky-200/90 text-sky-950 space-y-2 text-xs">
                        <div class="flex items-center gap-2 font-bold text-sky-900">
                            <svg class="w-4 h-4 text-sky-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg><span>Ingin Ganti Nama Tamu? Bebas &amp; Gratis!</span>
                        </div>
                        <div class="text-[11px] text-sky-900/90 leading-relaxed space-y-1 pl-6">
                            <p>
                                Cukup klik kolom nama tamu atau tombol <strong>Edit</strong> di daftar samping. Tautan undangan (<code class="bg-white/80 px-1 py-0.5 rounded text-sky-700 font-mono">?to=NamaBaru</code>) otomatis berganti secara gratis.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Daftar Tamu (7 col) -->
                <div class="lg:col-span-7 space-y-3.5 bg-slate-50/60 p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-2xs flex flex-col">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 pb-2 border-b border-slate-200">
                        <div>
                            <h4 class="font-heading text-sm font-bold text-slate-800">Daftar Tamu Undangan</h4>
                            <p class="text-[11px] text-slate-500">Link personal unik otomatis dibuat untuk tiap tamu.</p>
                        </div>
                        <!-- Pencarian & Filter Tamu -->
                        <div id="guest-search-container" class="relative sm:w-56">
                            <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                            <input type="text" id="modal-guest-search-input" oninput="filterModalGuestList(this.value)" placeholder="Cari nama tamu..." class="w-full pl-8 pr-3 py-1.5 rounded-xl bg-white border border-slate-200 text-xs text-slate-700 focus:outline-none focus:bg-white focus:border-slate-300 transition">
                        </div>
                    </div>

                    <!-- Live Guest List Container (Scrollable) -->
                    <div id="modal-guests-list-container" class="space-y-2.5 max-h-[460px] overflow-y-auto pr-1">
                        <!-- Populated dynamically via JS -->
                    </div>

                    <!-- Footer Tab 2: Link ke Manajemen Tamu Lengkap -->
                    <div class="pt-2 border-t border-slate-200 flex items-center justify-between text-xs">
                        <span class="text-slate-500 text-[11px]">Ingin ekspor atau impor file Excel/CSV?</span>
                        <a id="share-modal-tamu-link" href="#" class="font-bold text-[#FF2E3A] hover:underline flex items-center gap-1">
                            <span>Buka Manajemen Tamu Lengkap &rarr;</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>

        <!-- Modal Footer -->
        <div class="px-5 sm:px-6 py-3.5 bg-slate-50 border-t border-slate-200 flex items-center justify-between shrink-0">
            <span class="text-[11px] text-slate-500 hidden sm:inline">
                SimpulTemu Digital Wedding Share Generator
            </span>
            <button type="button" onclick="closeShareModal()" class="px-5 py-2 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-semibold transition cursor-pointer ml-auto">
                Selesai
            </button>
        </div>

    </div>
</div>

<!-- Floating Toast Notification for Feedback -->
<div id="share-toast-notification" class="fixed bottom-6 right-6 z-[70] transform translate-y-12 opacity-0 pointer-events-none transition-all duration-300 bg-slate-900 text-white px-4 py-2.5 rounded-2xl shadow-xl flex items-center gap-2.5 text-xs font-medium border border-slate-800">
    <div class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
        </svg>
    </div>
    <span id="share-toast-message">Teks berhasil disalin!</span>
</div>

<script>
let currentShareData = {
    id: null,
    slug: '',
    url: '',
    title: '',
    groom: '',
    bride: '',
    date: '',
    venue: '',
    status: 'published',
    tamuUrl: '#',
    sebarUrl: '#',
    publishUrl: '#',
    whatsappTemplate: ''
};

// Global state for guests in this modal
let modalGuests = [];
let modalActiveTab = 'quick';
let shareHostMode = 'custom';
let customHostUrl = window.location.origin;
const detectedWifiHost = 'http://172.16.170.222:8000';

function isProductionDomain() {
    const host = window.location.hostname.toLowerCase();
    return !host.endsWith('.test') && host !== 'localhost' && !host.includes('127.0.0.1') && !host.includes('trycloudflare.com');
}

function getShareBaseOrigin() {
    // If opened via trycloudflare.com or a production/custom domain, strictly use current origin
    if (isProductionDomain() || window.location.origin.includes('trycloudflare.com')) {
        return window.location.origin;
    }
    if (shareHostMode === 'wifi') {
        return detectedWifiHost;
    } else if (shareHostMode === 'custom' && customHostUrl.trim()) {
        let u = customHostUrl.trim();
        return u.replace(/\/+$/, '');
    }
    return window.location.origin;
}

function getShareBaseInvitationUrl() {
    const origin = getShareBaseOrigin();
    return origin + '/undangan/' + encodeURIComponent(currentShareData.slug || '');
}

function toggleHostOptions() {
    const panel = document.getElementById('host-advanced-panel');
    if (panel) {
        panel.classList.toggle('hidden');
    }
}

function setShareHostMode(mode) {
    shareHostMode = mode;
    const boxEl = document.getElementById('share-host-box');
    const badgeStatus = document.getElementById('share-host-badge-status');
    const badgeSub = document.getElementById('share-host-badge-sub');
    const displayUrl = document.getElementById('share-active-host-display');
    const iconContainer = document.getElementById('share-host-indicator-icon');

    const pillLocal = document.getElementById('host-pill-local');
    const pillWifi = document.getElementById('host-pill-wifi');
    const pillCustom = document.getElementById('host-pill-custom');

    if (isProductionDomain()) {
        const switchBtn = document.getElementById('share-host-switch-btn');
        if (switchBtn) switchBtn.classList.add('hidden');
        if (boxEl) {
            boxEl.className = 'p-3.5 sm:p-4 rounded-2xl bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200/90 shadow-2xs transition-all duration-300';
        }
        if (iconContainer) {
            iconContainer.className = 'w-9 h-9 rounded-xl bg-emerald-500 text-white flex items-center justify-center shadow-xs shrink-0';
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
        renderShareUrls(document.getElementById('share-modal-guest-name')?.value.trim() || '');
        renderModalGuestsList();
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
            boxEl.className = 'p-3.5 sm:p-4 rounded-2xl bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200/90 shadow-2xs transition-all duration-300';
        }
        if (iconContainer) {
            iconContainer.className = 'w-9 h-9 rounded-xl bg-emerald-500 text-white flex items-center justify-center shadow-xs shrink-0';
        }
        if (badgeStatus) {
            badgeStatus.className = 'px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-emerald-600 text-white shadow-2xs';
            badgeStatus.innerText = 'Link Publik Online Aktif';
        }
        if (badgeSub) {
            badgeSub.className = 'text-xs font-semibold text-emerald-900';
            badgeSub.innerText = 'Bisa Dibuka di HP Mana Saja';
        }
        if (displayUrl) {
            displayUrl.className = 'text-xs font-mono text-emerald-700 font-bold truncate mt-0.5';
            displayUrl.innerText = customHostUrl || window.location.origin;
        }
    } else if (mode === 'wifi') {
        if (pillWifi) {
            pillWifi.classList.add('bg-blue-600', 'text-white', 'shadow-2xs');
            pillWifi.classList.remove('bg-white', 'text-slate-700');
        }
        if (boxEl) {
            boxEl.className = 'p-3.5 sm:p-4 rounded-2xl bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200/90 shadow-2xs transition-all duration-300';
        }
        if (iconContainer) {
            iconContainer.className = 'w-9 h-9 rounded-xl bg-blue-500 text-white flex items-center justify-center shadow-xs shrink-0';
        }
        if (badgeStatus) {
            badgeStatus.className = 'px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-blue-600 text-white shadow-2xs';
            badgeStatus.innerText = 'Mode Wi-Fi Lokal Aktif';
        }
        if (badgeSub) {
            badgeSub.className = 'text-xs font-semibold text-blue-900';
            badgeSub.innerText = 'Untuk HP yang Se-Wi-Fi';
        }
        if (displayUrl) {
            displayUrl.className = 'text-xs font-mono text-blue-700 font-bold truncate mt-0.5';
            displayUrl.innerText = detectedWifiHost;
        }
    } else { // local
        if (pillLocal) {
            pillLocal.classList.add('bg-slate-700', 'text-white', 'shadow-2xs');
            pillLocal.classList.remove('bg-white', 'text-slate-700');
        }
        if (boxEl) {
            boxEl.className = 'p-3.5 sm:p-4 rounded-2xl bg-gradient-to-r from-slate-50 to-gray-100 border border-slate-200 shadow-2xs transition-all duration-300';
        }
        if (iconContainer) {
            iconContainer.className = 'w-9 h-9 rounded-xl bg-slate-600 text-white flex items-center justify-center shadow-xs shrink-0';
        }
        if (badgeStatus) {
            badgeStatus.className = 'px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-slate-700 text-white shadow-2xs';
            badgeStatus.innerText = 'Mode Laptop (Localhost)';
        }
        if (badgeSub) {
            badgeSub.className = 'text-xs font-semibold text-slate-700';
            badgeSub.innerText = 'Hanya Dibuka di Laptop Ini';
        }
        if (displayUrl) {
            displayUrl.className = 'text-xs font-mono text-slate-600 font-bold truncate mt-0.5';
            displayUrl.innerText = window.location.origin;
        }
    }

    renderShareUrls(document.getElementById('share-modal-guest-name')?.value.trim() || '');
    renderModalGuestsList();
}

function checkCloudflareTunnel(userInitiated = false) {
    if (isProductionDomain()) {
        setShareHostMode('production');
        return;
    }

    if (window.location.origin.includes('trycloudflare.com')) {
        customHostUrl = window.location.origin;
        const inputEl = document.getElementById('custom-host-input');
        if (inputEl) inputEl.value = customHostUrl;
        const displayEl = document.getElementById('share-active-host-display');
        if (displayEl) displayEl.innerText = customHostUrl;
        setShareHostMode('custom');
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
                customHostUrl = cleanUrl;
                const inputEl = document.getElementById('custom-host-input');
                if (inputEl) inputEl.value = cleanUrl;
                const displayEl = document.getElementById('share-active-host-display');
                if (displayEl) displayEl.innerText = cleanUrl;

                setShareHostMode('custom');

                if (userInitiated) {
                    showShareToast('Link Cloudflare online terhubung!');
                }
            }
        })
        .catch(() => {
            if (userInitiated) {
                showShareToast('Tunnel belum aktif. Pastikan cloudflared berjalan', 'info');
            }
        });
}

function onCustomHostInput(val) {
    customHostUrl = val;
    renderShareUrls(document.getElementById('share-modal-guest-name')?.value.trim() || '');
    renderModalGuestsList();
}

function switchShareTab(tab) {
    modalActiveTab = tab;
    const paneQuick = document.getElementById('share-pane-quick');
    const paneGuests = document.getElementById('share-pane-guests');
    const btnQuick = document.getElementById('tab-btn-quick');
    const btnGuests = document.getElementById('tab-btn-guests');

    if (tab === 'quick') {
        if (paneQuick) paneQuick.classList.remove('hidden');
        if (paneGuests) paneGuests.classList.add('hidden');
        if (btnQuick) {
            btnQuick.classList.add('border-[#FF2E3A]', 'text-[#FF2E3A]', 'font-bold');
            btnQuick.classList.remove('border-transparent', 'text-slate-600');
        }
        if (btnGuests) {
            btnGuests.classList.remove('border-[#FF2E3A]', 'text-[#FF2E3A]', 'font-bold');
            btnGuests.classList.add('border-transparent', 'text-slate-600');
        }
    } else {
        if (paneQuick) paneQuick.classList.add('hidden');
        if (paneGuests) paneGuests.classList.remove('hidden');
        if (btnGuests) {
            btnGuests.classList.add('border-[#FF2E3A]', 'text-[#FF2E3A]', 'font-bold');
            btnGuests.classList.remove('border-transparent', 'text-slate-600');
        }
        if (btnQuick) {
            btnQuick.classList.remove('border-[#FF2E3A]', 'text-[#FF2E3A]', 'font-bold');
            btnQuick.classList.add('border-transparent', 'text-slate-600');
        }
    }
}

function openShareModalFromBtn(button) {
    const data = {
        id: button.dataset.id,
        slug: button.dataset.slug,
        url: button.dataset.url || (window.location.origin + '/undangan/' + button.dataset.slug),
        title: button.dataset.title || 'The Wedding',
        groom: button.dataset.groom || 'Mempelai Pria',
        bride: button.dataset.bride || 'Mempelai Wanita',
        date: button.dataset.date || '',
        venue: button.dataset.venue || 'Tempat Acara',
        status: button.dataset.status || 'published',
        tamuUrl: button.dataset.tamuUrl || `/dashboard/undangan/${button.dataset.id}/tamu`,
        sebarUrl: button.dataset.sebarUrl || `/dashboard/undangan/${button.dataset.id}/sebar`,
        publishUrl: button.dataset.publishUrl || `/dashboard/undangan/${button.dataset.id}/publish`,
        whatsappTemplate: button.dataset.template || ''
    };

    openShareModal(data);
}

function openShareModal(data) {
    currentShareData = Object.assign({}, currentShareData, data);

    const modal = document.getElementById('share-invitation-modal');
    const card = document.getElementById('share-modal-card');
    const titleEl = document.getElementById('share-modal-title');
    const subtitleEl = document.getElementById('share-modal-subtitle');
    const guestInput = document.getElementById('share-modal-guest-name');
    const tamuLink = document.getElementById('share-modal-tamu-link');
    const draftBanner = document.getElementById('share-modal-draft-banner');
    const publishForm = document.getElementById('share-modal-publish-form');

    if (titleEl) titleEl.innerText = "Bagikan Undangan";
    if (subtitleEl) subtitleEl.innerText = `${currentShareData.groom} & ${currentShareData.bride}`;
    if (guestInput) guestInput.value = '';

    if (tamuLink) tamuLink.href = currentShareData.tamuUrl;

    // Reset view to Quick Share tab by default
    switchShareTab('quick');
    renderShareUrls('');
    syncShareModalPublishUI();

    // Fetch guests for this invitation via AJAX
    fetchModalGuests();

    // Check if Cloudflare Tunnel is running
    checkCloudflareTunnel(false);

    modal.classList.remove('hidden');
    setTimeout(() => {
        card.classList.remove('scale-95', 'opacity-0');
        card.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeShareModal() {
    const modal = document.getElementById('share-invitation-modal');
    const card = document.getElementById('share-modal-card');

    card.classList.remove('scale-100', 'opacity-100');
    card.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 200);
}

function onShareGuestNameChange(guestName) {
    renderShareUrls(guestName.trim());
}

function renderShareUrls(guestName) {
    const baseUrl = getShareBaseInvitationUrl();
    let finalUrl = baseUrl;
    if (guestName) {
        finalUrl += (baseUrl.includes('?') ? '&' : '?') + 'to=' + encodeURIComponent(guestName);
    }

    const urlInput = document.getElementById('share-modal-url-input');
    const openLink = document.getElementById('share-modal-open-link');
    const waPreview = document.getElementById('share-modal-whatsapp-preview');
    const waBtn = document.getElementById('share-modal-wa-btn');

    if (urlInput) urlInput.value = finalUrl;
    if (openLink) openLink.href = finalUrl;

    const message = composeWhatsAppMessage(guestName, finalUrl);

    if (waPreview) waPreview.value = message;
    if (waBtn) waBtn.href = `https://api.whatsapp.com/send?text=${encodeURIComponent(message)}`;
}

function composeWhatsAppMessage(guestName, invitationUrl) {
    if (currentShareData.whatsappTemplate && currentShareData.whatsappTemplate.trim()) {
        let tmpl = currentShareData.whatsappTemplate;
        tmpl = tmpl.replace(/\{nama_tamu\}/g, guestName || 'Bapak/Ibu/Saudara/i');
        tmpl = tmpl.replace(/\{link_undangan\}/g, invitationUrl);
        return tmpl;
    }

    const guestGreeting = guestName ? `Kepada Yth. Bapak/Ibu/Saudara/i\n*${guestName}*\n\n` : `Kepada Yth. Bapak/Ibu/Saudara/i,\n\n`;
    const coupleText = `*${currentShareData.groom} & ${currentShareData.bride}*`;
    const dateText = currentShareData.date ? `\n📅 Hari/Tanggal: ${currentShareData.date}` : '';
    const venueText = currentShareData.venue ? `\n📍 Tempat: ${currentShareData.venue}` : '';

    return `Assalamu'alaikum Warahmatullahi Wabarakatuh / Salam Sejahtera\n\n` +
        guestGreeting +
        `Tanpa mengurangi rasa hormat, perkenankan kami mengundang Anda untuk hadir dan memberikan doa restu pada momen bahagia pernikahan kami:\n\n` +
        coupleText + `\n` +
        dateText +
        venueText + `\n\n` +
        `Untuk informasi jadwal lengkap acara & konfirmasi kehadiran, silakan kunjungi tautan undangan digital kami berikut:\n` +
        invitationUrl + `\n\n` +
        `Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir.\n\n` +
        `Terima kasih atas doa dan perhatiannya.\n\n` +
        `Wassalamu'alaikum Warahmatullahi Wabarakatuh\n\n` +
        `Kami yang berbahagia,\n` +
        `${currentShareData.groom} & ${currentShareData.bride}`;
}

// ================= GUESTS MANAGEMENT & AJAX SYNC =================

function fetchModalGuests() {
    if (!currentShareData.id) return;
    
    fetch(`/dashboard/undangan/${currentShareData.id}/tamu`, {
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success && Array.isArray(data.guests)) {
            modalGuests = data.guests;
            if (data.invitation && data.invitation.whatsapp_template) {
                currentShareData.whatsappTemplate = data.invitation.whatsapp_template;
                renderShareUrls(document.getElementById('share-modal-guest-name')?.value.trim() || '');
            }
            updateGuestCountBadge();
            renderModalGuestsList();
        }
    })
    .catch(err => {
        console.log('Load guests error:', err);
    });
}

function updateGuestCountBadge() {
    const badge = document.getElementById('share-modal-guest-count-badge');
    const searchContainer = document.getElementById('guest-search-container');
    if (badge) badge.innerText = `${modalGuests.length} Tamu`;
    if (searchContainer) {
        if (modalGuests.length > 3) {
            searchContainer.classList.remove('hidden');
        } else {
            searchContainer.classList.add('hidden');
        }
    }
}

function renderModalGuestsList(filteredGuests = null) {
    const container = document.getElementById('modal-guests-list-container');
    if (!container) return;

    const listToRender = filteredGuests !== null ? filteredGuests : modalGuests;

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

    const baseInvUrl = getShareBaseInvitationUrl();
    const isPublished = isShareModalPublished();
    let html = '';

    listToRender.forEach((guest, idx) => {
        const guestName = guest.name || 'Tamu Undangan';
        const guestLink = `${baseInvUrl}?to=${encodeURIComponent(guestName)}`;
        const phone = guest.phone ? guest.phone.replace(/[^0-9]/g, '') : '';
        const guestWaMsg = composeWhatsAppMessage(guestName, guestLink);
        const waHref = phone ? `https://api.whatsapp.com/send?phone=${phone}&text=${encodeURIComponent(guestWaMsg)}` : `https://api.whatsapp.com/send?text=${encodeURIComponent(guestWaMsg)}`;

        const copyBtnHtml = isPublished
            ? `<button type="button" onclick="copyCustomLink('${escapeHtml(guestLink)}', this)" class="px-2.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-[11px] font-semibold flex items-center gap-1 transition cursor-pointer" title="Salin link khusus tamu ini">
                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                    <span>Salin</span>
               </button>`
            : `<button type="button" onclick="notifyShareModalMustPublish()" aria-disabled="true" class="px-2.5 py-1.5 rounded-lg bg-slate-100 text-slate-400 border border-slate-200 text-[11px] font-semibold flex items-center gap-1 cursor-not-allowed opacity-75" title="Publikasikan undangan terlebih dahulu untuk menyalin link">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    <span>Salin</span>
               </button>`;

        const waBtnHtml = isPublished
            ? `<a href="${waHref}" target="_blank" class="px-2.5 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-[11px] font-semibold flex items-center gap-1 transition shadow-2xs cursor-pointer" title="Kirim via WhatsApp">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    <span>WA</span>
               </a>`
            : `<button type="button" onclick="notifyShareModalMustPublish()" aria-disabled="true" class="px-2.5 py-1.5 rounded-lg bg-slate-200 text-slate-400 text-[11px] font-semibold flex items-center gap-1 cursor-not-allowed opacity-80" title="Publikasikan undangan terlebih dahulu untuk kirim WhatsApp">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    <span>WA</span>
               </button>`;

        const openBarBtnHtml = isPublished
            ? `<a href="${guestLink}" target="_blank" class="text-sky-600 hover:underline font-sans font-semibold shrink-0 text-[10px] flex items-center gap-0.5">
                    <span>Buka</span>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
               </a>`
            : `<button type="button" onclick="notifyShareModalMustPublish()" aria-disabled="true" class="text-slate-400 font-sans font-semibold shrink-0 text-[10px] flex items-center gap-0.5 cursor-not-allowed" title="Publikasikan undangan terlebih dahulu">
                    <span>Terkunci</span>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
               </button>`;

        html += `
            <div class="p-3 bg-white hover:bg-slate-50 border border-slate-200/90 rounded-2xl space-y-2 transition shadow-2xs">
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-2 flex-1 min-w-0">
                        <span class="w-6 h-6 rounded-lg bg-amber-50 text-amber-800 border border-amber-200/60 font-bold text-[10px] flex items-center justify-center shrink-0">
                            #${idx + 1}
                        </span>
                        <input type="text" value="${escapeHtml(guestName)}" onchange="updateGuestName(${guest.id}, this.value)" class="w-full px-2.5 py-1 bg-slate-50/60 hover:bg-white border border-slate-200 rounded-lg text-xs font-bold text-slate-800 focus:outline-none focus:bg-white focus:border-[#FF2E3A] focus:ring-1 focus:ring-[#FF2E3A]/30 transition" title="Klik untuk mengedit nama tamu">
                        ${guest.phone ? `<span class="text-[10px] font-mono text-slate-400 shrink-0 hidden sm:inline">(${escapeHtml(guest.phone)})</span>` : ''}
                    </div>

                    <!-- Action buttons -->
                    <div class="flex items-center gap-1.5 shrink-0">
                        ${copyBtnHtml}
                        ${waBtnHtml}
                        <button type="button" onclick="deleteGuestFromModal(${guest.id})" class="p-1 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition cursor-pointer" title="Hapus tamu">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                </div>

                <!-- URL preview bar -->
                <div class="flex items-center gap-1.5 bg-slate-50 px-2.5 py-1 rounded-lg border border-slate-200 text-[11px] font-mono text-slate-500">
                    <span class="text-slate-400 font-sans text-[10px] uppercase font-bold shrink-0">Link:</span>
                    <span class="truncate flex-1 ${isPublished ? 'select-all text-slate-600' : 'select-none text-slate-400 opacity-75'}" title="${isPublished ? escapeHtml(guestLink) : 'Publikasikan undangan terlebih dahulu'}">${escapeHtml(guestLink)}</span>
                    ${openBarBtnHtml}
                </div>
            </div>
        `;
    });

    container.innerHTML = html;
}

function filterModalGuestList(query) {
    const q = (query || '').toLowerCase().trim();
    if (!q) {
        renderModalGuestsList(null);
        return;
    }
    const filtered = modalGuests.filter(g => (g.name || '').toLowerCase().includes(q) || (g.phone || '').includes(q));
    renderModalGuestsList(filtered);
}

function addGuestToModalList() {
    const nameInput = document.getElementById('modal-guest-name-input');
    const phoneInput = document.getElementById('modal-guest-phone-input');
    const name = nameInput ? nameInput.value.trim() : '';
    const phone = phoneInput ? phoneInput.value.trim() : '';

    if (!name) {
        if (nameInput) nameInput.focus();
        return;
    }

    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    fetch(`/dashboard/undangan/${currentShareData.id}/tamu`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf,
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ name, phone })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success && data.guest) {
            modalGuests.unshift(data.guest);
            updateGuestCountBadge();
            renderModalGuestsList();
            showShareToast(`Tamu "${name}" berhasil ditambahkan!`);
            if (nameInput) nameInput.value = '';
            if (phoneInput) phoneInput.value = '';
            if (nameInput) nameInput.focus();
        } else {
            if (data.requires_upgrade && typeof openUpgradeModal === 'function') {
                openUpgradeModal(currentShareData.id, data.message || 'Batas kuota tamu paket ini telah tercapai. Tambah kuota dengan Add-On (mulai Rp17.000) atau Paket Premium!', 'addon');
            }
            showShareToast(data.message || 'Gagal menambahkan tamu');
        }
    })
    .catch(err => {
        console.error(err);
        showShareToast('Gagal menambahkan tamu');
    });
}

function saveQuickGuestToDatabase() {
    const quickInput = document.getElementById('share-modal-guest-name');
    const name = quickInput ? quickInput.value.trim() : '';
    if (!name) {
        if (quickInput) quickInput.focus();
        return;
    }

    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    fetch(`/dashboard/undangan/${currentShareData.id}/tamu`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf,
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ name })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success && data.guest) {
            modalGuests.unshift(data.guest);
            updateGuestCountBadge();
            renderModalGuestsList();
            showShareToast(`Tamu "${name}" tersimpan ke daftar!`);
            switchShareTab('guests');
        } else {
            if (data.requires_upgrade && typeof openUpgradeModal === 'function') {
                openUpgradeModal(currentShareData.id, data.message || 'Batas kuota tamu paket ini telah tercapai. Tambah kuota dengan Add-On (mulai Rp17.000) atau Paket Premium!', 'addon');
            }
            showShareToast(data.message || 'Gagal menyimpan tamu');
        }
    })
    .catch(err => {
        console.error(err);
        showShareToast('Gagal menyimpan tamu');
    });
}

function toggleBulkAddSection() {
    const sec = document.getElementById('bulk-add-section');
    const toggleText = document.getElementById('bulk-toggle-text');
    const toggleIcon = document.getElementById('bulk-toggle-icon');
    if (!sec) return;

    if (sec.classList.contains('hidden')) {
        sec.classList.remove('hidden');
        if (toggleText) toggleText.innerText = 'Tutup Form';
        if (toggleIcon) toggleIcon.classList.add('rotate-45');
        document.getElementById('bulk-guests-textarea')?.focus();
    } else {
        sec.classList.add('hidden');
        if (toggleText) toggleText.innerText = 'Tambah Banyak Sekaligus';
        if (toggleIcon) toggleIcon.classList.remove('rotate-45');
    }
}

function submitBulkGuestsToModal() {
    const textarea = document.getElementById('bulk-guests-textarea');
    const text = textarea ? textarea.value.trim() : '';
    if (!text) return;

    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    fetch(`/dashboard/undangan/${currentShareData.id}/tamu`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf,
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ names: text })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success && Array.isArray(data.guests)) {
            modalGuests = data.guests;
            updateGuestCountBadge();
            renderModalGuestsList();
            showShareToast(data.message || 'Tamu berhasil ditambahkan!');
            if (textarea) textarea.value = '';
            toggleBulkAddSection();
        } else {
            if (data.requires_upgrade && typeof openUpgradeModal === 'function') {
                openUpgradeModal(currentShareData.id, data.message || 'Batas kuota tamu paket ini telah tercapai. Tambah kuota dengan Add-On (mulai Rp17.000) atau Paket Premium!', 'addon');
            }
            showShareToast(data.message || 'Gagal menyimpan tamu');
        }
    })
    .catch(err => {
        console.error(err);
        showShareToast('Gagal menyimpan tamu');
    });
}

function updateGuestName(guestId, newName) {
    const trimmed = (newName || '').trim();
    if (!trimmed) return;

    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    fetch(`/dashboard/undangan/${currentShareData.id}/tamu/${guestId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf,
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ name: trimmed })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            const idx = modalGuests.findIndex(g => g.id === guestId);
            if (idx !== -1) {
                modalGuests[idx].name = trimmed;
                renderModalGuestsList();
            }
            showShareToast('Nama tamu diperbarui!');
        }
    })
    .catch(err => console.error(err));
}

function deleteGuestFromModal(guestId) {
    if (!confirm('Yakin ingin menghapus tamu ini dari daftar?')) return;

    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    fetch(`/dashboard/undangan/${currentShareData.id}/tamu/${guestId}`, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrf,
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            modalGuests = modalGuests.filter(g => g.id !== guestId);
            updateGuestCountBadge();
            renderModalGuestsList();
            showShareToast('Tamu berhasil dihapus!');
        }
    })
    .catch(err => console.error(err));
}

function isShareModalPublished() {
    return Boolean(currentShareData && currentShareData.status === 'published');
}

function notifyShareModalMustPublish() {
    showShareToast('Publikasikan undangan terlebih dahulu! Klik tombol Publikasikan Sekarang di atas agar tautan aktif dan dapat disalin.', 'warning');
    const draftBanner = document.getElementById('share-modal-draft-banner');
    if (draftBanner && !draftBanner.classList.contains('hidden')) {
        draftBanner.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
}

function syncShareModalPublishUI() {
    const isPublished = isShareModalPublished();
    const draftBanner = document.getElementById('share-modal-draft-banner');
    const publishedBanner = document.getElementById('share-modal-published-banner');
    const urlInput = document.getElementById('share-modal-url-input');
    const urlLockBadge = document.getElementById('share-modal-url-lock-badge');
    const urlLockNote = document.getElementById('share-modal-url-lock-note');
    const copyMainBtn = document.getElementById('btn-copy-main-link');
    const copyMainBtnText = document.getElementById('copy-main-btn-text');
    const openLink = document.getElementById('share-modal-open-link');
    const copyWaBtn = document.getElementById('share-modal-copy-wa-btn');
    const copyWaLabel = document.getElementById('copy-wa-text-label');
    const waPreview = document.getElementById('share-modal-whatsapp-preview');
    const waBtn = document.getElementById('share-modal-wa-btn');
    const waBtnLabel = document.getElementById('share-modal-wa-btn-label');

    if (draftBanner) draftBanner.classList.toggle('hidden', isPublished);
    if (publishedBanner) publishedBanner.classList.toggle('hidden', !isPublished);
    if (urlLockBadge) urlLockBadge.classList.toggle('hidden', isPublished);
    if (urlLockNote) urlLockNote.classList.toggle('hidden', isPublished);

    if (urlInput) {
        if (isPublished) {
            urlInput.classList.remove('select-none', 'cursor-not-allowed', 'bg-slate-100', 'text-slate-400');
            urlInput.classList.add('select-all', 'cursor-pointer', 'bg-white', 'text-slate-700');
            urlInput.title = 'Klik untuk memilih seluruh tautan';
        } else {
            urlInput.classList.remove('select-all', 'cursor-pointer', 'bg-white', 'text-slate-700');
            urlInput.classList.add('select-none', 'cursor-not-allowed', 'bg-slate-100', 'text-slate-400');
            urlInput.title = 'Publikasikan undangan terlebih dahulu untuk menyalin tautan';
        }
    }

    if (copyMainBtn) {
        if (isPublished) {
            copyMainBtn.classList.remove('bg-slate-200', 'text-slate-500', 'cursor-not-allowed', 'opacity-80');
            copyMainBtn.classList.add('bg-[#FF2E3A]', 'hover:bg-[#E01E2A]', 'text-white', 'shadow-[0_4px_12px_rgba(255,46,58,0.25)]', 'cursor-pointer');
            copyMainBtn.title = 'Salin tautan undangan';
            if (copyMainBtnText && copyMainBtnText.innerText === 'Terkunci') copyMainBtnText.innerText = 'Salin';
        } else {
            copyMainBtn.classList.remove('bg-[#FF2E3A]', 'hover:bg-[#E01E2A]', 'text-white', 'shadow-[0_4px_12px_rgba(255,46,58,0.25)]', 'cursor-pointer');
            copyMainBtn.classList.add('bg-slate-200', 'text-slate-500', 'cursor-not-allowed', 'opacity-80');
            copyMainBtn.title = 'Publikasikan undangan terlebih dahulu untuk menyalin tautan';
            if (copyMainBtnText) copyMainBtnText.innerText = 'Terkunci';
        }
    }

    if (openLink) {
        if (isPublished) {
            openLink.removeAttribute('aria-disabled');
            openLink.classList.remove('bg-slate-100', 'text-slate-400', 'cursor-not-allowed', 'opacity-75');
            openLink.classList.add('hover:border-slate-300', 'bg-white', 'hover:bg-slate-50', 'text-slate-600', 'cursor-pointer');
            openLink.title = 'Buka Undangan di Tab Baru';
        } else {
            openLink.setAttribute('aria-disabled', 'true');
            openLink.classList.remove('hover:border-slate-300', 'bg-white', 'hover:bg-slate-50', 'text-slate-600', 'cursor-pointer');
            openLink.classList.add('bg-slate-100', 'text-slate-400', 'cursor-not-allowed', 'opacity-75');
            openLink.title = 'Publikasikan undangan terlebih dahulu';
        }
    }

    if (copyWaBtn) {
        if (isPublished) {
            copyWaBtn.classList.remove('bg-slate-100', 'text-slate-400', 'border-slate-200', 'cursor-not-allowed', 'opacity-80');
            copyWaBtn.classList.add('bg-emerald-50', 'hover:bg-emerald-100', 'text-emerald-700', 'hover:text-emerald-800', 'border-emerald-200/80', 'cursor-pointer');
            copyWaBtn.title = 'Salin pesan WhatsApp';
            if (copyWaLabel && copyWaLabel.innerText === 'Terkunci') copyWaLabel.innerText = 'Salin Pesan';
        } else {
            copyWaBtn.classList.remove('bg-emerald-50', 'hover:bg-emerald-100', 'text-emerald-700', 'hover:text-emerald-800', 'border-emerald-200/80', 'cursor-pointer');
            copyWaBtn.classList.add('bg-slate-100', 'text-slate-400', 'border-slate-200', 'cursor-not-allowed', 'opacity-80');
            copyWaBtn.title = 'Publikasikan undangan terlebih dahulu untuk menyalin pesan';
            if (copyWaLabel) copyWaLabel.innerText = 'Terkunci';
        }
    }

    if (waPreview) {
        if (isPublished) {
            waPreview.classList.remove('select-none', 'bg-slate-100', 'text-slate-400', 'opacity-80');
            waPreview.classList.add('select-all', 'bg-white', 'text-slate-700');
        } else {
            waPreview.classList.remove('select-all', 'bg-white', 'text-slate-700');
            waPreview.classList.add('select-none', 'bg-slate-100', 'text-slate-400', 'opacity-80');
        }
    }

    if (waBtn) {
        if (isPublished) {
            waBtn.removeAttribute('aria-disabled');
            waBtn.classList.remove('bg-slate-200', 'text-slate-500', 'cursor-not-allowed', 'opacity-85');
            waBtn.classList.add('bg-emerald-600', 'hover:bg-emerald-700', 'active:bg-emerald-800', 'text-white', 'shadow-[0_4px_14px_rgba(16,185,129,0.3)]', 'hover:scale-[1.005]', 'active:scale-[0.99]', 'cursor-pointer');
            if (waBtnLabel) waBtnLabel.textContent = 'Buka & Kirim via WhatsApp';
        } else {
            waBtn.setAttribute('aria-disabled', 'true');
            waBtn.classList.remove('bg-emerald-600', 'hover:bg-emerald-700', 'active:bg-emerald-800', 'text-white', 'shadow-[0_4px_14px_rgba(16,185,129,0.3)]', 'hover:scale-[1.005]', 'active:scale-[0.99]', 'cursor-pointer');
            waBtn.classList.add('bg-slate-200', 'text-slate-500', 'cursor-not-allowed', 'opacity-85');
            if (waBtnLabel) waBtnLabel.textContent = 'Publikasikan Dulu untuk Kirim WhatsApp';
        }
    }
}

function handleShareModalUrlClick(inputEl) {
    if (!isShareModalPublished()) {
        if (inputEl && typeof inputEl.blur === 'function') inputEl.blur();
        notifyShareModalMustPublish();
        return;
    }
    if (inputEl && typeof inputEl.select === 'function') inputEl.select();
}

function handleShareModalOpenClick(event) {
    if (!isShareModalPublished()) {
        if (event) event.preventDefault();
        notifyShareModalMustPublish();
        return false;
    }
    return true;
}

function handleShareModalWaClick(event) {
    if (!isShareModalPublished()) {
        if (event) event.preventDefault();
        notifyShareModalMustPublish();
        return false;
    }
    return true;
}

function copyCustomLink(link, btnElement) {
    if (!isShareModalPublished()) {
        notifyShareModalMustPublish();
        return;
    }
    copyToClipboardCustom(link, 'Link tamu berhasil disalin!');
    if (btnElement) {
        const span = btnElement.querySelector('span');
        if (span) {
            const orig = span.innerText;
            span.innerText = 'Tersalin!';
            btnElement.classList.add('bg-emerald-50', 'text-emerald-700', 'border-emerald-300');
            setTimeout(() => {
                span.innerText = orig;
                btnElement.classList.remove('bg-emerald-50', 'text-emerald-700', 'border-emerald-300');
            }, 1800);
        }
    }
}

function publishShareModalInvitation(callback) {
    if (!currentShareData || !currentShareData.id) return;
    const btn = document.getElementById('share-modal-publish-btn');
    if (btn) {
        btn.disabled = true;
        btn.innerText = 'Memproses...';
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    fetch(`/dashboard/undangan/${currentShareData.id}/publish`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => {
        if (!res.ok) throw new Error('Publish gagal');
        return res.json();
    })
    .then(data => {
        currentShareData.status = data.status || 'published';
        syncShareModalPublishUI();
        renderModalGuestsList();

        const triggerBtn = document.querySelector(`.btn-share-invitation[data-id="${currentShareData.id}"]`);
        if (triggerBtn) {
            triggerBtn.dataset.status = 'published';
        }

        showShareToast('Undangan berhasil dipublikasikan! Tautan dan tombol salin kini aktif.', 'success');
        if (typeof callback === 'function') callback();
    })
    .catch(err => {
        showShareToast('Gagal mempublikasikan undangan. Pastikan undangan siap dipublikasikan lalu coba lagi.', 'error');
    })
    .finally(() => {
        if (btn) {
            btn.disabled = false;
            btn.innerText = 'Publikasikan Sekarang';
        }
    });
}

function copyShareModalLink() {
    if (!isShareModalPublished()) {
        notifyShareModalMustPublish();
        return;
    }
    const urlInput = document.getElementById('share-modal-url-input');
    if (!urlInput) return;

    copyToClipboardCustom(urlInput.value, 'Link undangan berhasil disalin ke clipboard!');
    const btnText = document.getElementById('copy-main-btn-text');
    if (btnText) {
        const orig = btnText.innerText;
        btnText.innerText = 'Tersalin!';
        setTimeout(() => { btnText.innerText = orig; }, 2000);
    }
}

function copyShareModalWhatsappText() {
    if (!isShareModalPublished()) {
        notifyShareModalMustPublish();
        return;
    }
    const waPreview = document.getElementById('share-modal-whatsapp-preview');
    if (!waPreview) return;

    copyToClipboardCustom(waPreview.value, 'Pesan WhatsApp berhasil disalin ke clipboard!');
    const label = document.getElementById('copy-wa-text-label');
    if (label) {
        const orig = label.innerText;
        label.innerText = 'Tersalin!';
        setTimeout(() => { label.innerText = orig; }, 2000);
    }
}

function copyToClipboardCustom(text, toastMsg) {
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).then(() => {
            showShareToast(toastMsg);
        }).catch(() => {
            fallbackCopy(text, toastMsg);
        });
    } else {
        fallbackCopy(text, toastMsg);
    }
}

function fallbackCopy(text, toastMsg) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.position = "fixed";
    textArea.style.left = "-999999px";
    textArea.style.top = "-999999px";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    try {
        document.execCommand('copy');
        showShareToast(toastMsg);
    } catch (err) {
        alert('Gagal menyalin. Silakan pilih dan salin teks secara manual.');
    }
    document.body.removeChild(textArea);
}

function showShareToast(message) {
    const toast = document.getElementById('share-toast-notification');
    const msgEl = document.getElementById('share-toast-message');
    if (!toast || !msgEl) return;

    msgEl.innerText = message || 'Teks berhasil disalin!';
    toast.classList.remove('translate-y-12', 'opacity-0', 'pointer-events-none');
    toast.classList.add('translate-y-0', 'opacity-100');

    setTimeout(() => {
        toast.classList.remove('translate-y-0', 'opacity-100');
        toast.classList.add('translate-y-12', 'opacity-0', 'pointer-events-none');
    }, 2800);
}

function escapeHtml(string) {
    const str = String(string || '');
    return str
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

// Global button listener delegation
document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('click', function(e) {
        const shareBtn = e.target.closest('.btn-share-invitation');
        if (shareBtn) {
            e.preventDefault();
            openShareModalFromBtn(shareBtn);
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeShareModal();
        }
    });

    checkCloudflareTunnel(false);
});
</script>
