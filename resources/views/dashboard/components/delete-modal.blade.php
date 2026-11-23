<!-- Modal Konfirmasi Hapus Undangan -->
<div id="delete-invitation-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-xs opacity-0 pointer-events-none transition-all duration-300">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl border border-stone-200 transform scale-95 transition-transform duration-300 space-y-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 stroke-current" fill="none" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-serif font-bold text-lg text-stone-900">Hapus Undangan Ini?</h3>
                <p id="delete-invitation-title" class="text-xs font-semibold text-stone-500 truncate max-w-xs"></p>
            </div>
        </div>

        <p class="text-sm text-stone-600 leading-relaxed">
            Hapus Undangan Ini? Seluruh data mempelai, jadwal acara, daftar tamu, dan foto terkait undangan ini akan dihapus secara permanen.
        </p>

        <div class="flex items-center justify-end gap-3 pt-2">
            <button type="button" id="btn-cancel-delete" class="px-4 py-2 rounded-xl border border-stone-300 text-stone-700 hover:bg-stone-100 text-xs font-semibold transition cursor-pointer">
                Batal
            </button>
            <button type="button" id="btn-confirm-delete" class="px-4 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-semibold shadow-sm transition flex items-center gap-1.5 cursor-pointer">
                <svg class="w-4 h-4 stroke-current" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                <span>Ya, Hapus</span>
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let targetDeleteId = null;
    const modal = document.getElementById('delete-invitation-modal');
    const modalTitle = document.getElementById('delete-invitation-title');
    const btnCancel = document.getElementById('btn-cancel-delete');
    const btnConfirm = document.getElementById('btn-confirm-delete');

    function openModal(id, title) {
        targetDeleteId = id;
        if (modalTitle) {
            modalTitle.textContent = title ? `"${title}"` : '';
        }
        if (modal) {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            const card = modal.querySelector('div');
            if (card) card.classList.remove('scale-95');
        }
    }

    function closeModal() {
        targetDeleteId = null;
        if (modal) {
            modal.classList.add('opacity-0', 'pointer-events-none');
            const card = modal.querySelector('div');
            if (card) card.classList.add('scale-95');
        }
    }

    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-delete-invitation');
        if (btn) {
            e.preventDefault();
            const id = btn.getAttribute('data-id');
            const title = btn.getAttribute('data-title');
            openModal(id, title);
        }
    });

    if (btnCancel) {
        btnCancel.addEventListener('click', closeModal);
    }

    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) closeModal();
        });
    }

    if (btnConfirm) {
        btnConfirm.addEventListener('click', function() {
            if (!targetDeleteId) return;

            btnConfirm.disabled = true;
            btnConfirm.innerHTML = '<span class="inline-block animate-spin mr-1">↻</span> Menghapus...';

            fetch(`/dashboard/undangan/${targetDeleteId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(res => {
                if (!res.ok) {
                    throw new Error('Gagal menghapus undangan');
                }
                return res.json().catch(() => ({ success: true }));
            })
            .then(data => {
                closeModal();
                btnConfirm.disabled = false;
                btnConfirm.innerHTML = 'Ya, Hapus';

                const targetRow = document.getElementById(`invitation-row-${targetDeleteId}`) || document.getElementById(`invitation-card-${targetDeleteId}`);
                if (targetRow) {
                    targetRow.style.transition = 'all 0.3s ease';
                    targetRow.style.opacity = '0';
                    targetRow.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        targetRow.remove();
                        const remaining = document.querySelectorAll('.btn-delete-invitation');
                        if (remaining.length === 0) {
                            window.location.reload();
                        }
                    }, 300);
                } else {
                    window.location.reload();
                }
            })
            .catch(err => {
                alert(err.message || 'Terjadi kesalahan saat menghapus undangan.');
                btnConfirm.disabled = false;
                btnConfirm.innerHTML = 'Ya, Hapus';
            });
        });
    }
});
</script>

