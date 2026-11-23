<div class="mb-6 bg-white rounded-2xl p-2 border border-slate-200/80 shadow-xs">
    <nav class="flex items-center gap-1.5 overflow-x-auto no-scrollbar py-0.5 text-sm font-medium">
        <!-- 1. Ringkasan -->
        <a href="{{ route('admin.index') }}" 
           class="px-4 py-2.5 rounded-xl whitespace-nowrap transition-all flex items-center gap-2 {{ request()->routeIs('admin.index') ? 'bg-[#FF2E3A] text-white shadow-xs font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
            </svg>
            <span>Ringkasan Dashboard</span>
        </a>

        <!-- 2. Manajemen Pengguna -->
        <a href="{{ route('admin.users.index') }}" 
           class="px-4 py-2.5 rounded-xl whitespace-nowrap transition-all flex items-center gap-2 {{ request()->routeIs('admin.users.*') ? 'bg-[#FF2E3A] text-white shadow-xs font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <span>Manajemen Pengguna</span>
        </a>

        <!-- 3. Manajemen Tema -->
        <a href="{{ route('admin.themes.index') }}" 
           class="px-4 py-2.5 rounded-xl whitespace-nowrap transition-all flex items-center gap-2 {{ request()->routeIs('admin.themes.*') ? 'bg-[#FF2E3A] text-white shadow-xs font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
            </svg>
            <span>Katalog Tema</span>
        </a>

        <!-- 4. Moderasi Komentar -->
        <a href="{{ route('admin.comments.index') }}" 
           class="px-4 py-2.5 rounded-xl whitespace-nowrap transition-all flex items-center gap-2 {{ request()->routeIs('admin.comments.*') ? 'bg-[#FF2E3A] text-white shadow-xs font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
            </svg>
            <span>Moderasi Ucapan &amp; Doa</span>
        </a>

        <!-- 5. Semua Undangan -->
        <a href="{{ route('admin.invitations.index') }}" 
           class="px-4 py-2.5 rounded-xl whitespace-nowrap transition-all flex items-center gap-2 {{ request()->routeIs('admin.invitations.*') ? 'bg-[#FF2E3A] text-white shadow-xs font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <span>Daftar Undangan</span>
        </a>

        <!-- 6. Pustaka Musik -->
        <a href="{{ route('admin.music.index') }}" 
           class="px-4 py-2.5 rounded-xl whitespace-nowrap transition-all flex items-center gap-2 {{ request()->routeIs('admin.music.*') ? 'bg-[#FF2E3A] text-white shadow-xs font-semibold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
            </svg>
            <span>Pustaka Musik</span>
        </a>
    </nav>
</div>
