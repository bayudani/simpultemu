@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')
@section('container_max_width', 'max-w-[1720px] w-full')

@section('content')
<div class="space-y-6">
    <!-- Header Title -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Admin Dashboard</h1>
            <p class="text-sm text-slate-500 mt-1">Kelola seluruh pengguna, katalog tema, undangan, dan moderasi komentar dalam satu kendali.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Sistem Aktif
            </span>
        </div>
    </div>

    <!-- Navigation Bar -->
    @include('partials.admin-nav')

    <!-- Metrics Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-5">
        <!-- 1. Total Users -->
        <a href="{{ route('admin.users.index') }}" class="group bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#FF2E3A]/40 transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Pengguna</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1 group-hover:text-[#FF2E3A] transition-colors">{{ number_format($totalUsers) }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-1 text-xs text-blue-600 font-medium">
                <span>Kelola pengguna</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </div>
        </a>

        <!-- 2. Total Invitations -->
        <a href="{{ route('admin.invitations.index') }}" class="group bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#FF2E3A]/40 transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Undangan</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1 group-hover:text-[#FF2E3A] transition-colors">{{ number_format($totalInvitations) }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-1 text-xs text-purple-600 font-medium">
                <span>Lihat semua undangan</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </div>
        </a>

        <!-- 3. Active Themes -->
        <a href="{{ route('admin.themes.index') }}" class="group bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#FF2E3A]/40 transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Tema Aktif</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1 group-hover:text-[#FF2E3A] transition-colors">{{ number_format($activeThemes) }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-1 text-xs text-emerald-600 font-medium">
                <span>Kelola katalog tema</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </div>
        </a>

        <!-- 4. Total Comments -->
        <a href="{{ route('admin.comments.index') }}" class="group bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#FF2E3A]/40 transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Ucapan</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1 group-hover:text-[#FF2E3A] transition-colors">{{ number_format($totalComments) }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-1 text-xs text-amber-600 font-medium">
                <span>Moderasi ucapan</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </div>
        </a>

        <!-- 5. Total Music -->
        <a href="{{ route('admin.music.index') }}" class="group bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#FF2E3A]/40 transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pustaka Lagu</p>
                    <h3 class="text-2xl font-bold text-slate-900 mt-1 group-hover:text-[#FF2E3A] transition-colors">{{ number_format($totalMusic ?? 0) }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-1 text-xs text-rose-600 font-medium">
                <span>Kelola musik</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </div>
        </a>
    </div>

    <!-- Quick Actions Card Section -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-bold text-slate-900">Aksi Cepat Admin</h2>
                <p class="text-xs text-slate-500">Pilih menu di bawah untuk membuka modul pengelolaan sistem secara langsung.</p>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <!-- Action 1: Manage Users -->
            <a href="{{ route('admin.users.index') }}" class="p-5 border-2 border-slate-100 rounded-xl hover:border-[#FF2E3A] hover:bg-red-50/20 transition-all group flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors text-base">Manage Users</h3>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">Kelola semua akun, atur role admin/user, dan aktivasi paket Premium.</p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-blue-600">
                    <span>Buka Pengguna</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>

            <!-- Action 2: Manage Themes -->
            <a href="{{ route('admin.themes.index') }}" class="p-5 border-2 border-slate-100 rounded-xl hover:border-[#FF2E3A] hover:bg-red-50/20 transition-all group flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors text-base">Manage Themes</h3>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">Aktif/nonaktifkan 20 tema pernikahan, ubah tier, dan sesuaikan harga.</p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-emerald-600">
                    <span>Buka Katalog Tema</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>

            <!-- Action 3: Moderate Comments -->
            <a href="{{ route('admin.comments.index') }}" class="p-5 border-2 border-slate-100 rounded-xl hover:border-[#FF2E3A] hover:bg-red-50/20 transition-all group flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors text-base">Moderate Comments</h3>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">Pantau ucapan & doa dari tamu undangan, setujui, tolak, atau hapus spam.</p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-amber-600">
                    <span>Moderasi Komentar</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>

            <!-- Action 4: Manage Invitations -->
            <a href="{{ route('admin.invitations.index') }}" class="p-5 border-2 border-slate-100 rounded-xl hover:border-[#FF2E3A] hover:bg-red-50/20 transition-all group flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors text-base">Manage Invitations</h3>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">Lihat seluruh undangan pernikahan yang sedang dibuat atau sudah dipublikasi.</p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-purple-600">
                    <span>Lihat Undangan</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>

            <!-- Action 5: Manage Music -->
            <a href="{{ route('admin.music.index') }}" class="p-5 border-2 border-slate-100 rounded-xl hover:border-[#FF2E3A] hover:bg-red-50/20 transition-all group flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-slate-900 group-hover:text-[#FF2E3A] transition-colors text-base">Manage Music</h3>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">Tambah atau hapus lagu latar (MP3/URL) yang dapat dipilih pengguna.</p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-rose-600">
                    <span>Pustaka Lagu</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>
        </div>
        </div>
    </div>

    <!-- Recent Activity Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Users Table -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-5 sm:p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-bold text-slate-900">Pengguna Terbaru</h3>
                <a href="{{ route('admin.users.index') }}" class="text-xs font-semibold text-[#FF2E3A] hover:underline">Lihat Semua &rarr;</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-slate-100 text-slate-400 font-semibold uppercase">
                            <th class="py-2.5">User</th>
                            <th class="py-2.5">Role</th>
                            <th class="py-2.5">Paket</th>
                            <th class="py-2.5 text-right">Terdaftar</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($recentUsers as $u)
                        <tr class="hover:bg-slate-50/70 transition">
                            <td class="py-3">
                                <div class="font-bold text-slate-800">{{ $u->name }}</div>
                                <div class="text-slate-400 text-[11px]">{{ $u->email }}</div>
                            </td>
                            <td class="py-3">
                                @if($u->role === 'admin')
                                <span class="px-2 py-0.5 rounded-full bg-red-100 text-red-700 text-[10px] font-bold">Admin</span>
                                @else
                                <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[10px] font-medium">User</span>
                                @endif
                            </td>
                            <td class="py-3">
                                @if($u->is_premium)
                                <span class="px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[10px] font-bold">Premium</span>
                                @else
                                <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[10px]">Basic</span>
                                @endif
                            </td>
                            <td class="py-3 text-right text-slate-400">
                                {{ $u->created_at ? $u->created_at->diffForHumans() : '-' }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-4 text-center text-slate-400">Belum ada pengguna.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Comments Table -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-5 sm:p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-bold text-slate-900">Ucapan &amp; Doa Terbaru</h3>
                <a href="{{ route('admin.comments.index') }}" class="text-xs font-semibold text-[#FF2E3A] hover:underline">Lihat Semua &rarr;</a>
            </div>
            <div class="space-y-3">
                @forelse($recentComments as $c)
                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100/80 flex flex-col gap-1.5 text-xs">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-slate-800">{{ $c->name }}</span>
                        <span class="text-[10px] text-slate-400">{{ $c->created_at ? $c->created_at->diffForHumans() : '-' }}</span>
                    </div>
                    <p class="text-slate-600 line-clamp-2 italic">"{{ $c->message }}"</p>
                    <div class="flex items-center justify-between pt-1 border-t border-slate-200/60 text-[11px]">
                        <span class="text-slate-500">Undangan: <strong class="text-slate-700">{{ $c->invitation->title ?? 'Undangan #' . $c->invitation_id }}</strong></span>
                        @if($c->status === 'approved')
                        <span class="text-emerald-600 font-semibold">Disetujui</span>
                        @elseif($c->status === 'rejected')
                        <span class="text-red-500 font-semibold">Ditolak</span>
                        @else
                        <span class="text-amber-600 font-semibold">Pending</span>
                        @endif
                    </div>
                </div>
                @empty
                <div class="py-8 text-center text-slate-400 text-xs">Belum ada ucapan yang masuk.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
