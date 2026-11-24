<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - SimpulTemu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo-icon.png') }}">
    
    <!-- Script Preload: Langsung terapkan status collapsed agar tidak berkedip (No FOUC) -->
    <script>
        (function() {
            try {
                if (localStorage.getItem('simpultemu_sidebar_collapsed') === 'true' && window.innerWidth >= 768) {
                    document.documentElement.classList.add('sidebar-is-collapsed');
                }
            } catch (e) {}
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <style>
        /* Smooth transitions */
        #dashboard-sidebar {
            transition: width 0.28s cubic-bezier(0.4, 0, 0.2, 1), transform 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }
        #dashboard-main {
            transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Desktop: Collapsed Sidebar State (w-20 / 80px) */
        @media (min-width: 768px) {
            html.sidebar-is-collapsed #dashboard-sidebar,
            #dashboard-sidebar.is-collapsed {
                width: 5rem !important; /* 80px */
            }

            /* Sembunyikan elemen teks saat sidebar menyusut */
            html.sidebar-is-collapsed #dashboard-sidebar .sidebar-text,
            #dashboard-sidebar.is-collapsed .sidebar-text,
            html.sidebar-is-collapsed #dashboard-sidebar .sidebar-logo-full,
            #dashboard-sidebar.is-collapsed .sidebar-logo-full,
            html.sidebar-is-collapsed #dashboard-sidebar .sidebar-btn-collapse,
            #dashboard-sidebar.is-collapsed .sidebar-btn-collapse,
            html.sidebar-is-collapsed #dashboard-sidebar .sidebar-profile-full,
            #dashboard-sidebar.is-collapsed .sidebar-profile-full {
                display: none !important;
            }

            /* Tampilkan logo icon mini dan profil mini saat menyusut */
            html.sidebar-is-collapsed #dashboard-sidebar .sidebar-logo-mini,
            #dashboard-sidebar.is-collapsed .sidebar-logo-mini,
            html.sidebar-is-collapsed #dashboard-sidebar .sidebar-profile-mini,
            #dashboard-sidebar.is-collapsed .sidebar-profile-mini {
                display: flex !important;
            }

            html.sidebar-is-collapsed #dashboard-sidebar .sidebar-header-box,
            #dashboard-sidebar.is-collapsed .sidebar-header-box {
                padding: 0.625rem 0.5rem !important;
                justify-content: center !important;
            }

            /* Item navigasi menjadi di tengah (centered icon) */
            html.sidebar-is-collapsed #dashboard-sidebar .sidebar-nav-item,
            #dashboard-sidebar.is-collapsed .sidebar-nav-item {
                justify-content: center !important;
                padding-left: 0.5rem !important;
                padding-right: 0.5rem !important;
            }

            html.sidebar-is-collapsed #dashboard-sidebar .sidebar-nav-item svg,
            #dashboard-sidebar.is-collapsed .sidebar-nav-item svg {
                margin-right: 0 !important;
            }
        }

        /* Prevent any horizontal scrollbar on sidebar or its nav in all states */
        #dashboard-sidebar,
        #dashboard-sidebar nav,
        #dashboard-sidebar .overflow-y-auto {
            overflow-x: hidden !important;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            scrollbar-width: thin;
        }

        #dashboard-sidebar nav::-webkit-scrollbar {
            width: 4px;
        }
        #dashboard-sidebar nav::-webkit-scrollbar-track {
            background: transparent;
        }
        #dashboard-sidebar nav::-webkit-scrollbar-thumb {
            background: rgba(148, 163, 184, 0.3);
            border-radius: 9999px;
        }
        #dashboard-sidebar nav::-webkit-scrollbar-thumb:hover {
            background: rgba(148, 163, 184, 0.5);
        }

        #dashboard-sidebar nav::-webkit-scrollbar-horizontal,
        #dashboard-sidebar::-webkit-scrollbar-horizontal {
            display: none !important;
            height: 0 !important;
            width: 0 !important;
        }

        /* Admin Geometric Ornament Background (Ultra-subtle, Minimalist Watermark) */
        .admin-geometric-canvas {
            background-color: #F8FAFC;
            background-image: 
                radial-gradient(circle at 15% 10%, rgba(2, 132, 199, 0.03) 0%, transparent 45%),
                radial-gradient(circle at 85% 18%, rgba(2, 132, 199, 0.02) 0%, transparent 40%),
                url('{{ asset("images/patterns/admin-geometric-simple.svg") }}?v=20261122_03');
            background-repeat: no-repeat, no-repeat, repeat;
            background-size: 850px 650px, 650px 550px, 96px 96px;
            background-position: top left, top right, 0 0;
            background-attachment: local, local, local;
        }
    </style>
</head>
<body class="bg-[#F8FAFC] text-slate-800 font-sans antialiased min-h-screen selection:bg-[#DBF6FF] selection:text-[#FF2E3A]">
    
    <!-- Mobile Sticky Top Bar (< md) -->
    <header class="md:hidden sticky top-0 z-40 bg-white border-b border-slate-200 px-4 py-3 flex items-center justify-between shadow-xs">
        <div class="flex items-center gap-2.5">
            <button type="button" onclick="openMobileSidebar()" class="p-2 -ml-1 text-slate-600 hover:text-slate-900 hover:bg-slate-100 rounded-xl transition cursor-pointer" aria-label="Buka Menu Sidebar">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <a href="{{ route('home') }}" class="flex items-center focus:outline-none">
                <img src="{{ asset('images/logo/logo-simpultemu.png') }}" alt="SimpulTemu" class="h-8 w-auto object-contain">
            </a>
        </div>
        
        <div class="flex items-center gap-2">
            <a href="{{ route('dashboard') }}" class="w-8 h-8 rounded-full bg-gradient-to-br from-[#FF2E3A] to-[#C71722] text-white flex items-center justify-center font-bold text-xs shadow-xs" title="{{ auth()->user()->name }}">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </a>
        </div>
    </header>

    <!-- Mobile Backdrop Overlay -->
    <div id="mobile-sidebar-backdrop" onclick="closeMobileSidebar()" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-40 hidden opacity-0 transition-opacity duration-300 md:hidden" aria-hidden="true"></div>

    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar Kiri (Desktop Sticky & Mobile Drawer) -->
        <aside id="dashboard-sidebar" class="fixed md:sticky top-0 inset-y-0 left-0 z-50 md:z-30 w-72 md:w-64 lg:w-72 h-screen bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 shadow-2xl md:shadow-none -translate-x-full md:translate-x-0 transition-all duration-300 ease-in-out">
            <div class="flex flex-col flex-1 min-h-0 overflow-hidden">
                <!-- Sidebar Header: Logo & Tombol Tutup/Buka Sidebar di dalam Sidebar (Seperti Google) -->
                <div class="sidebar-header-box p-4 sm:p-5 border-b border-slate-100 flex items-center justify-between gap-2 min-h-[72px]">
                    <!-- 1. Full Brand Logo (Saat Expanded di Desktop & Mobile) -->
                    <a href="{{ route('home') }}" class="sidebar-logo-full flex items-center gap-2 focus:outline-none transition-transform hover:scale-[1.02] overflow-hidden" aria-label="SimpulTemu Beranda">
                        <img src="{{ asset('images/logo/logo-simpultemu.png') }}" alt="SimpulTemu" class="h-9 sm:h-10 w-auto object-contain shrink-0">
                    </a>

                    <!-- 2. Tombol Tutup Sidebar di Dalam Sidebar (Desktop, Saat Expanded) - Seperti Contoh Google [|<] -->
                    <button type="button" 
                            id="sidebar-collapse-btn"
                            onclick="toggleDesktopSidebar()" 
                            data-sidebar-tooltip="Tutup sidebar"
                            class="sidebar-btn-collapse hidden md:flex items-center justify-center p-2 rounded-xl text-slate-400 hover:text-slate-800 hover:bg-slate-100 transition-colors cursor-pointer shrink-0" 
                            title="Tutup sidebar" 
                            aria-label="Tutup sidebar">
                        <svg class="w-5 h-5 text-slate-500 hover:text-slate-800 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="3" width="18" height="18" rx="5"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v18"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 9l-3 3 3 3"/>
                        </svg>
                    </button>

                    <!-- 3. Mini Brand Logo Icon & Tombol Buka Sidebar (Desktop, Saat Collapsed) -->
                    <div class="sidebar-logo-mini hidden flex-col items-center justify-center gap-1.5 mx-auto py-0.5 w-full">
                        <a href="{{ route('home') }}" data-sidebar-tooltip="SimpulTemu Beranda" class="flex items-center justify-center p-1 rounded-xl hover:bg-slate-100 transition-colors cursor-pointer focus:outline-none" aria-label="SimpulTemu Beranda">
                            <img src="{{ asset('images/logo/logo-icon.png') }}" alt="SimpulTemu" class="h-8 w-auto object-contain">
                        </a>
                        <button type="button" 
                                onclick="toggleDesktopSidebar()" 
                                data-sidebar-tooltip="Buka sidebar"
                                class="sidebar-btn-expand flex items-center justify-center p-1.5 rounded-xl text-slate-500 hover:text-[#FF2E3A] hover:bg-[#DBF6FF]/40 border border-slate-100 hover:border-[#FF2E3A]/20 transition-all cursor-pointer group" 
                                title="Buka sidebar" 
                                aria-label="Buka sidebar">
                            <svg class="w-4.5 h-4.5 text-slate-600 group-hover:text-[#FF2E3A] transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="3" y="3" width="18" height="18" rx="5"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v18"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 9l3 3-3 3"/>
                            </svg>
                        </button>
                    </div>

                    <!-- 4. Mobile Close Button (✕) -->
                    <button type="button" onclick="closeMobileSidebar()" class="md:hidden p-2 rounded-xl text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition-colors cursor-pointer" aria-label="Tutup Menu">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Navigation Menu -->
                <nav class="p-3 sm:p-4 space-y-1.5 overflow-y-auto overflow-x-hidden flex-1">
                    <!-- 1. Menu: Dashboard -->
                    <a href="{{ route('dashboard') }}" data-sidebar-tooltip="Dashboard" class="sidebar-nav-item group relative flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') && !request()->routeIs('dashboard.*') ? 'bg-[#DBF6FF] text-[#FF2E3A] font-semibold border-r-2 border-[#FF2E3A] shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-[#DBF6FF]/20' }}">
                        <svg class="w-5 h-5 mr-3 shrink-0 {{ request()->routeIs('dashboard') && !request()->routeIs('dashboard.*') ? 'text-[#FF2E3A]' : 'text-slate-400 group-hover:text-slate-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span class="sidebar-text truncate">Dashboard</span>
                    </a>

                    <!-- 2. Menu: Undangan Saya -->
                    <a href="{{ route('dashboard.invitations.index') }}" data-sidebar-tooltip="Undangan Saya" class="sidebar-nav-item group relative flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard.invitations.*') || request()->routeIs('dashboard.editor') ? 'bg-[#DBF6FF] text-[#FF2E3A] font-semibold border-r-2 border-[#FF2E3A] shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-[#DBF6FF]/20' }}">
                        <svg class="w-5 h-5 mr-3 shrink-0 {{ request()->routeIs('dashboard.invitations.*') || request()->routeIs('dashboard.editor') ? 'text-[#FF2E3A]' : 'text-slate-400 group-hover:text-slate-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="sidebar-text truncate">Undangan Saya</span>
                    </a>

                    <!-- 3. Menu: Pesan & RSVP Masuk -->
                    <a href="{{ route('dashboard.messages') }}" data-sidebar-tooltip="Pesan &amp; RSVP Masuk" class="sidebar-nav-item group relative flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard.messages') ? 'bg-[#DBF6FF] text-[#FF2E3A] font-semibold border-r-2 border-[#FF2E3A] shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-[#DBF6FF]/20' }}">
                        <svg class="w-5 h-5 mr-3 shrink-0 {{ request()->routeIs('dashboard.messages') ? 'text-[#FF2E3A]' : 'text-slate-400 group-hover:text-slate-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                        <span class="sidebar-text truncate">Pesan &amp; RSVP Masuk</span>
                    </a>

                    <!-- 4. Bagian Khusus Admin & Aksi Cepat Admin -->
                    @if(auth()->user()->isAdmin())
                    <div class="my-2 border-t border-slate-200/80"></div>
                    <div class="sidebar-text px-3 pt-1 pb-0.5">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Panel Admin</p>
                    </div>

                    <!-- Admin Overview -->
                    <a href="{{ route('admin.index') }}" data-sidebar-tooltip="Admin Overview" class="sidebar-nav-item group relative flex items-center px-4 py-2.5 sm:py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.index') ? 'bg-[#DBF6FF] text-[#FF2E3A] font-semibold border-r-2 border-[#FF2E3A] shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-[#DBF6FF]/20' }}">
                        <svg class="w-5 h-5 mr-3 shrink-0 {{ request()->routeIs('admin.index') ? 'text-[#FF2E3A]' : 'text-slate-400 group-hover:text-slate-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="sidebar-text truncate">Admin Overview</span>
                    </a>

                    <!-- Manage Users -->
                    <a href="{{ route('admin.users.index') }}" data-sidebar-tooltip="Kelola Pengguna (Manage Users)" class="sidebar-nav-item group relative flex items-center px-4 py-2.5 sm:py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.users.*') ? 'bg-[#DBF6FF] text-[#FF2E3A] font-semibold border-r-2 border-[#FF2E3A] shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-[#DBF6FF]/20' }}">
                        <svg class="w-5 h-5 mr-3 shrink-0 {{ request()->routeIs('admin.users.*') ? 'text-[#FF2E3A]' : 'text-slate-400 group-hover:text-slate-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <span class="sidebar-text truncate">Manage Users</span>
                    </a>

                    <!-- Manage Themes -->
                    <a href="{{ route('admin.themes.index') }}" data-sidebar-tooltip="Kelola Tema (Manage Themes)" class="sidebar-nav-item group relative flex items-center px-4 py-2.5 sm:py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.themes.*') ? 'bg-[#DBF6FF] text-[#FF2E3A] font-semibold border-r-2 border-[#FF2E3A] shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-[#DBF6FF]/20' }}">
                        <svg class="w-5 h-5 mr-3 shrink-0 {{ request()->routeIs('admin.themes.*') ? 'text-[#FF2E3A]' : 'text-slate-400 group-hover:text-slate-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                        </svg>
                        <span class="sidebar-text truncate">Manage Themes</span>
                    </a>

                    <!-- Moderate Comments -->
                    <a href="{{ route('admin.comments.index') }}" data-sidebar-tooltip="Moderasi Komentar (Moderate Comments)" class="sidebar-nav-item group relative flex items-center px-4 py-2.5 sm:py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.comments.*') ? 'bg-[#DBF6FF] text-[#FF2E3A] font-semibold border-r-2 border-[#FF2E3A] shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-[#DBF6FF]/20' }}">
                        <svg class="w-5 h-5 mr-3 shrink-0 {{ request()->routeIs('admin.comments.*') ? 'text-[#FF2E3A]' : 'text-slate-400 group-hover:text-slate-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                        <span class="sidebar-text truncate">Moderate Comments</span>
                    </a>

                    <!-- Manage Invitations -->
                    <a href="{{ route('admin.invitations.index') }}" data-sidebar-tooltip="Kelola Undangan (Manage Invitations)" class="sidebar-nav-item group relative flex items-center px-4 py-2.5 sm:py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.invitations.*') ? 'bg-[#DBF6FF] text-[#FF2E3A] font-semibold border-r-2 border-[#FF2E3A] shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-[#DBF6FF]/20' }}">
                        <svg class="w-5 h-5 mr-3 shrink-0 {{ request()->routeIs('admin.invitations.*') ? 'text-[#FF2E3A]' : 'text-slate-400 group-hover:text-slate-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="sidebar-text truncate">Manage Invitations</span>
                    </a>

                    <!-- Manage Music -->
                    <a href="{{ route('admin.music.index') }}" data-sidebar-tooltip="Pustaka Musik (Manage Music)" class="sidebar-nav-item group relative flex items-center px-4 py-2.5 sm:py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.music.*') ? 'bg-[#DBF6FF] text-[#FF2E3A] font-semibold border-r-2 border-[#FF2E3A] shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-[#DBF6FF]/20' }}">
                        <svg class="w-5 h-5 mr-3 shrink-0 {{ request()->routeIs('admin.music.*') ? 'text-[#FF2E3A]' : 'text-slate-400 group-hover:text-slate-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                        </svg>
                        <span class="sidebar-text truncate">Manage Music</span>
                    </a>
                    @endif
                </nav>
            </div>

            <!-- Bagian Bawah: Profil Pengguna & Logout -->
            <div class="p-3 sm:p-4 border-t border-slate-200 bg-slate-50/50">
                <!-- 1. Full Profile (Saat Expanded) -->
                <div class="sidebar-profile-full flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#FF2E3A] to-[#C71722] text-white flex items-center justify-center font-bold text-sm shadow-sm shrink-0">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-slate-900 truncate">{{ auth()->user()->name }}</p>
                            <div class="flex items-center gap-1.5 mt-0.5">
                                @if(auth()->user()->isAdmin())
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-rose-50 text-rose-600 border border-rose-200">
                                        Admin
                                    </span>
                                @elseif(auth()->user()->hasLifetimePremium())
                                    <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800 border border-amber-300 shadow-2xs">
                                        <svg class="w-3 h-3 text-amber-600 fill-current shrink-0" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg>
                                        <span>Premium Selamanya</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-slate-100 text-slate-600 border border-slate-200">
                                        Member
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="shrink-0">
                        @csrf
                        <button type="submit" title="Keluar" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- 2. Mini Profile (Saat Collapsed di Desktop) -->
                <div class="sidebar-profile-mini hidden flex-col items-center gap-2.5 relative group">
                    <div data-sidebar-tooltip="{{ auth()->user()->name }} ({{ auth()->user()->isAdmin() ? 'Admin' : (auth()->user()->hasLifetimePremium() ? 'Premium Selamanya' : 'Member') }})" class="w-10 h-10 rounded-full bg-gradient-to-br from-[#FF2E3A] to-[#C71722] text-white flex items-center justify-center font-bold text-sm shadow-sm shrink-0 cursor-default">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <form method="POST" action="{{ route('logout') }}" class="shrink-0" data-sidebar-tooltip="Keluar">
                        @csrf
                        <button type="submit" title="Keluar" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main id="dashboard-main" class="flex-1 overflow-y-auto min-w-0 {{ request()->routeIs('admin.*') ? 'admin-geometric-canvas' : 'bg-[#F8FAFC]' }}">
            <!-- Desktop Top Bar -->
            <div class="hidden md:flex items-center justify-between px-6 lg:px-10 py-3.5 bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-20">
                <div class="flex items-center gap-3">
                    <span class="text-xs font-semibold text-slate-500">
                        @yield('title', 'Dashboard')
                    </span>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" class="px-3.5 py-1.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-600 hover:text-[#FF2E3A] hover:border-[#FF2E3A]/40 bg-white shadow-2xs hover:shadow-xs flex items-center gap-1.5 transition">
                        <span>Lihat Website</span>
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Page Content -->
            <div class="p-3 sm:p-6 lg:p-8 @yield('container_max_width', 'max-w-7xl') mx-auto">
                @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex flex-col sm:flex-row sm:items-center justify-between gap-3 shadow-sm">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                    @if(session('published_url'))
                    <a href="{{ session('published_url') }}" target="_blank" class="self-start sm:self-auto inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold shadow-xs transition cursor-pointer">
                        <span>Buka Undangan</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                    @endif
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-2xl shadow-sm">
                    <div class="flex items-center gap-2 mb-2 font-semibold text-sm">
                        <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        Mohon periksa kesalahan berikut:
                    </div>
                    <ul class="list-disc list-inside text-sm space-y-1 text-red-700">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <!-- Floating Tooltip untuk Sidebar saat Collapsed (Position Fixed, Bebas Overflow & Scrollbar) -->
    <div id="sidebar-floating-tooltip" class="sidebar-tooltip fixed pointer-events-none z-[100] px-3 py-1.5 bg-slate-900 text-white text-xs font-semibold rounded-lg shadow-xl whitespace-nowrap opacity-0 -translate-x-2 transition-all duration-150 ease-out hidden"></div>

    <!-- Script Manajemen Sidebar (Desktop Collapsible, Tooltips & Mobile Drawer) -->
    <script>
        // Floating Tooltip Engine for Collapsed Sidebar
        (function() {
            let hideTimeout = null;

            function isCollapsed() {
                const sidebar = document.getElementById('dashboard-sidebar');
                return sidebar &&
                    (document.documentElement.classList.contains('sidebar-is-collapsed') ||
                     sidebar.classList.contains('is-collapsed')) &&
                    window.innerWidth >= 768;
            }

            window.hideSidebarTooltip = function() {
                const tooltip = document.getElementById('sidebar-floating-tooltip');
                if (!tooltip) return;
                tooltip.classList.remove('opacity-100', 'translate-x-0');
                tooltip.classList.add('opacity-0', '-translate-x-2');
                clearTimeout(hideTimeout);
                hideTimeout = setTimeout(function() {
                    if (tooltip.classList.contains('opacity-0')) {
                        tooltip.classList.add('hidden');
                    }
                }, 150);
            };

            window.showSidebarTooltip = function(el) {
                const tooltip = document.getElementById('sidebar-floating-tooltip');
                if (!tooltip) return;

                const isCollapseBtn = el.classList.contains('sidebar-btn-collapse');
                if (!isCollapseBtn && !isCollapsed()) return;

                const text = el.getAttribute('data-sidebar-tooltip');
                if (!text) return;

                clearTimeout(hideTimeout);
                tooltip.textContent = text;
                tooltip.classList.remove('hidden');

                const rect = el.getBoundingClientRect();
                const tooltipHeight = tooltip.offsetHeight || 28;
                const top = rect.top + (rect.height / 2) - (tooltipHeight / 2);
                const left = rect.right + 12;

                tooltip.style.top = Math.max(8, top) + 'px';
                tooltip.style.left = left + 'px';

                requestAnimationFrame(function() {
                    tooltip.classList.remove('opacity-0', '-translate-x-2');
                    tooltip.classList.add('opacity-100', 'translate-x-0');
                });
            };

            document.addEventListener('DOMContentLoaded', function() {
                const sidebar = document.getElementById('dashboard-sidebar');
                if (!sidebar) return;

                document.querySelectorAll('[data-sidebar-tooltip]').forEach(function(item) {
                    item.addEventListener('mouseenter', function() {
                        window.showSidebarTooltip(this);
                    });
                    item.addEventListener('mouseleave', function() {
                        window.hideSidebarTooltip();
                    });
                    item.addEventListener('focus', function() {
                        window.showSidebarTooltip(this);
                    });
                    item.addEventListener('blur', function() {
                        window.hideSidebarTooltip();
                    });
                });

                window.addEventListener('scroll', window.hideSidebarTooltip, { passive: true });
                sidebar.addEventListener('scroll', window.hideSidebarTooltip, { passive: true });
            });
        })();

        // Toggle Desktop Sidebar Collapse
        window.toggleDesktopSidebar = function() {
            if (typeof window.hideSidebarTooltip === 'function') {
                window.hideSidebarTooltip();
            }
            const sidebar = document.getElementById('dashboard-sidebar');
            if (!sidebar) return;

            const isCollapsed = sidebar.classList.toggle('is-collapsed');
            if (isCollapsed) {
                document.documentElement.classList.add('sidebar-is-collapsed');
                try { localStorage.setItem('simpultemu_sidebar_collapsed', 'true'); } catch (e) {}
            } else {
                document.documentElement.classList.remove('sidebar-is-collapsed');
                try { localStorage.setItem('simpultemu_sidebar_collapsed', 'false'); } catch (e) {}
            }
        };

        // Mobile Drawer Management
        window.openMobileSidebar = function() {
            const sidebar = document.getElementById('dashboard-sidebar');
            const backdrop = document.getElementById('mobile-sidebar-backdrop');
            if (!sidebar || !backdrop) return;

            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');

            backdrop.classList.remove('hidden');
            requestAnimationFrame(() => {
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
            });
            document.body.classList.add('overflow-hidden');
        };

        window.closeMobileSidebar = function() {
            const sidebar = document.getElementById('dashboard-sidebar');
            const backdrop = document.getElementById('mobile-sidebar-backdrop');
            if (!sidebar || !backdrop) return;

            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');

            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            setTimeout(() => {
                backdrop.classList.add('hidden');
            }, 300);
            document.body.classList.remove('overflow-hidden');
        };

        // Keyboard Accessibility (Esc to close mobile drawer)
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMobileSidebar();
            }
        });

        // Initialize state on DOMContentLoaded
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('dashboard-sidebar');
            try {
                if (localStorage.getItem('simpultemu_sidebar_collapsed') === 'true' && window.innerWidth >= 768 && sidebar) {
                    sidebar.classList.add('is-collapsed');
                    document.documentElement.classList.add('sidebar-is-collapsed');
                }
            } catch (e) {}
        });
    </script>

    @include('partials.upgrade-modal')
    @stack('scripts')
</body>
</html>
