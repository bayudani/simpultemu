{{-- Global Floating Bottom Navigation Bar for All 20 Themes --}}
<div id="floating-bottom-nav-wrapper" class="fixed bottom-4 left-0 right-0 z-50 flex justify-center items-center pointer-events-none px-4" style="position: fixed; bottom: 16px; left: 0; right: 0; z-index: 9990; display: flex !important; justify-content: center !important; align-items: center !important; pointer-events: none !important;">
    <nav id="floating-bottom-nav" aria-label="Navigasi Undangan" class="pointer-events-auto bg-[#1A1A1A]/85 backdrop-blur-md border border-white/10 rounded-full px-3.5 sm:px-4 py-2 flex items-center justify-center gap-2 sm:gap-3 shadow-2xl transition-all duration-300 w-auto max-w-full" style="pointer-events: auto !important; display: flex !important; background-color: rgba(26, 26, 26, 0.88); box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.6), 0 0 20px -3px {{ $primaryColor ?? '#800000' }}45;">
        <!-- 1. Cover -->
        <a href="#section-cover" data-nav="cover" onclick="scrollToInvitationSection(event, 'section-cover')" class="bottom-nav-link flex flex-col items-center justify-center text-[10px] text-stone-300 hover:text-white transition-all group px-2 py-1 rounded-xl cursor-pointer">
            <svg class="w-4 h-4 mb-0.5 text-stone-400 group-hover:text-amber-300 group-[.active]:text-amber-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="group-hover:text-amber-200 group-[.active]:text-amber-200 font-medium">Cover</span>
        </a>

        <!-- 2. Mempelai -->
        <a href="#section-mempelai" data-nav="mempelai" onclick="scrollToInvitationSection(event, 'section-mempelai')" class="bottom-nav-link flex flex-col items-center justify-center text-[10px] text-stone-300 hover:text-white transition-all group px-2 py-1 rounded-xl cursor-pointer">
            <svg class="w-4 h-4 mb-0.5 text-stone-400 group-hover:text-amber-300 group-[.active]:text-amber-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
            <span class="group-hover:text-amber-200 group-[.active]:text-amber-200 font-medium">Mempelai</span>
        </a>

        <!-- 3. Acara -->
        <a href="#section-acara" data-nav="acara" onclick="scrollToInvitationSection(event, 'section-acara')" class="bottom-nav-link flex flex-col items-center justify-center text-[10px] text-stone-300 hover:text-white transition-all group px-2 py-1 rounded-xl cursor-pointer">
            <svg class="w-4 h-4 mb-0.5 text-stone-400 group-hover:text-amber-300 group-[.active]:text-amber-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span class="group-hover:text-amber-200 group-[.active]:text-amber-200 font-medium">Acara</span>
        </a>

        <!-- 4. Hadiah -->
        <a href="#section-hadiah" data-nav="hadiah" onclick="scrollToInvitationSection(event, 'section-hadiah')" class="bottom-nav-link flex flex-col items-center justify-center text-[10px] text-stone-300 hover:text-white transition-all group px-2 py-1 rounded-xl cursor-pointer">
            <svg class="w-4 h-4 mb-0.5 text-stone-400 group-hover:text-amber-300 group-[.active]:text-amber-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
            </svg>
            <span class="group-hover:text-amber-200 group-[.active]:text-amber-200 font-medium">Hadiah</span>
        </a>

        <!-- 5. RSVP -->
        <a href="#section-rsvp" data-nav="rsvp" onclick="scrollToInvitationSection(event, 'section-rsvp')" class="bottom-nav-link flex flex-col items-center justify-center text-[10px] text-stone-300 hover:text-white transition-all group px-2 py-1 rounded-xl cursor-pointer">
            <svg class="w-4 h-4 mb-0.5 text-stone-400 group-hover:text-amber-300 group-[.active]:text-amber-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
            </svg>
            <span class="group-hover:text-amber-200 group-[.active]:text-amber-200 font-medium">RSVP</span>
        </a>
    </nav>
</div>

<div id="invitation-toast" class="fixed top-5 inset-x-0 mx-auto w-max max-w-xs z-50 px-4 py-2.5 rounded-2xl bg-stone-900/95 backdrop-blur-md text-white text-xs font-medium shadow-2xl border border-amber-400/40 opacity-0 pointer-events-none transition-all duration-300 transform -translate-y-2 flex items-center gap-2" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 10000;">
    <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
    </svg>
    <span id="invitation-toast-message">Teks tersalin ke clipboard</span>
</div>

<script>
function scrollToInvitationSection(e, sectionId) {
    if (e) {
        e.preventDefault();
        e.stopPropagation();
    }
    const cleanId = (sectionId || '').replace(/^#/, '');
    const withoutPrefix = cleanId.replace(/^section-/, '');
    const withPrefix = 'section-' + withoutPrefix;

    if (withoutPrefix === 'cover') {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        setActiveBottomNav('cover');
        try { history.replaceState(null, '', '#section-cover'); } catch (_) {}
        return;
    }

    const target = document.getElementById(cleanId) 
        || document.getElementById(withPrefix) 
        || document.getElementById(withoutPrefix);

    if (target) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        setActiveBottomNav(withoutPrefix);
        try { history.replaceState(null, '', '#' + (target.id || cleanId)); } catch (_) {}
    } else {
        console.warn('Target section not found for:', sectionId);
    }
}

function setActiveBottomNav(sectionId) {
    const clean = (sectionId || '').replace(/^#/, '').replace(/^section-/, '');
    document.querySelectorAll('.bottom-nav-link').forEach(link => {
        const linkNav = (link.getAttribute('data-nav') || '').replace(/^section-/, '');
        if (linkNav === clean) {
            link.classList.add('active', 'bg-white/10');
        } else {
            link.classList.remove('active', 'bg-white/10');
        }
    });
}

// Scrollspy auto highlight active section
document.addEventListener('DOMContentLoaded', function() {
    // Pastikan navbar selalu aktif dan tidak tersembunyi
    const bottomNavWrapper = document.getElementById('floating-bottom-nav-wrapper');
    if (bottomNavWrapper) {
        bottomNavWrapper.classList.remove('hidden');
        bottomNavWrapper.style.display = 'flex';
        bottomNavWrapper.style.visibility = 'visible';
    }
    const bottomNav = document.getElementById('floating-bottom-nav');
    if (bottomNav) {
        bottomNav.classList.remove('hidden');
        bottomNav.style.display = 'flex';
        bottomNav.style.visibility = 'visible';
    }

    const sectionNames = ['cover', 'mempelai', 'acara', 'hadiah', 'rsvp'];
    const sectionEls = sectionNames.map(name => {
        return document.getElementById('section-' + name) || document.getElementById(name);
    }).filter(Boolean);

    if ('IntersectionObserver' in window && sectionEls.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setActiveBottomNav(entry.target.id);
                }
            });
        }, { threshold: 0.25 });

        sectionEls.forEach(el => observer.observe(el));
    }
});

function showInvitationToast(message) {
    const toast = document.getElementById('invitation-toast');
    const toastMsg = document.getElementById('invitation-toast-message');
    if (!toast) return;
    if (toastMsg) toastMsg.innerText = message;
    toast.classList.remove('opacity-0', 'pointer-events-none', '-translate-y-2');
    toast.classList.add('opacity-100', 'translate-y-0');
    setTimeout(() => {
        toast.classList.add('opacity-0', 'pointer-events-none', '-translate-y-2');
        toast.classList.remove('opacity-100', 'translate-y-0');
    }, 2500);
}

function copyInvitationText(text, successMsg = 'Berhasil disalin ke clipboard!') {
    if (!text) return;
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(() => {
            showInvitationToast(successMsg);
        }).catch(() => {
            legacyCopy(text, successMsg);
        });
    } else {
        legacyCopy(text, successMsg);
    }
}

function legacyCopy(text, successMsg) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    try {
        document.execCommand('copy');
        showInvitationToast(successMsg);
    } catch (err) {
        alert('Gagal menyalin: ' + text);
    }
    document.body.removeChild(textarea);
}
</script>
