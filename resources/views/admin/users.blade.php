@extends('layouts.dashboard')

@section('title', 'Manajemen Pengguna - Admin')
@section('container_max_width', 'max-w-[1720px] w-full')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Manajemen Pengguna</h1>
            <p class="text-sm text-slate-500 mt-1">Pantau dan kelola seluruh akun pengguna terdaftar di platform SimpulTemu.</p>
        </div>
        <div class="text-xs font-semibold text-slate-500 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
            Total: <span class="text-[#FF2E3A] font-bold">{{ $users->total() }}</span> Pengguna
        </div>
    </div>

    <!-- Navigation Bar -->
    @include('partials.admin-nav')

    <!-- Search & Filter Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-4 sm:p-5">
        <form method="GET" action="{{ route('admin.users.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            <!-- Search Query -->
            <div class="sm:col-span-6 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama atau email pengguna..." 
                       class="w-full pl-10 pr-4 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]">
            </div>

            <!-- Role Filter -->
            <div class="sm:col-span-2">
                <select name="role" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A] bg-white">
                    <option value="">Semua Role</option>
                    <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <!-- Status Filter -->
            <div class="sm:col-span-2">
                <select name="tier" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A] bg-white">
                    <option value="">Semua Status Akun</option>
                    <option value="basic" {{ request('tier') === 'basic' ? 'selected' : '' }}>Reguler (Bayar Per Undangan)</option>
                    <option value="premium" {{ request('tier') === 'premium' ? 'selected' : '' }}>Premium Selamanya</option>
                </select>
            </div>

            <!-- Submit Button & Reset -->
            <div class="sm:col-span-2 flex items-center gap-2">
                <button type="submit" class="flex-1 px-4 py-2 rounded-xl bg-[#FF2E3A] hover:bg-[#E02631] text-white text-xs font-bold transition shadow-xs">
                    Filter
                </button>
                @if(request()->hasAny(['q', 'role', 'tier']))
                <a href="{{ route('admin.users.index') }}" class="px-3 py-2 rounded-xl border border-slate-200 text-slate-500 hover:text-slate-800 text-xs font-semibold hover:bg-slate-50 transition">
                    Reset
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Users Table Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto relative">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50/90 border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3.5 px-4 sm:px-5">Pengguna</th>
                        <th class="py-3.5 px-3">Role</th>
                        <th class="py-3.5 px-3">Status Akun</th>
                        <th class="py-3.5 px-3 text-center">Undangan</th>
                        <th class="py-3.5 px-3 whitespace-nowrap">Terdaftar</th>
                        <th class="py-3.5 px-4 text-right whitespace-nowrap sticky right-0 bg-slate-50/95 backdrop-blur-xs z-10 shadow-[-6px_0_10px_-4px_rgba(0,0,0,0.06)]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($users as $user)
                    <tr class="hover:bg-slate-50/70 transition group {{ $user->id === auth()->id() ? 'bg-amber-50/30' : '' }}">
                        <!-- Name & Email -->
                        <td class="py-3 px-4 sm:px-5">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-[#FF2E3A] to-[#C71722] text-white flex items-center justify-center font-bold text-xs shadow-xs shrink-0">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <div class="font-bold text-slate-900 flex items-center gap-1.5">
                                        <span>{{ $user->name }}</span>
                                        @if($user->id === auth()->id())
                                        <span class="px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[10px] font-bold">Anda</span>
                                        @endif
                                    </div>
                                    <div class="text-xs text-slate-500 truncate">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>

                        <!-- Role -->
                        <td class="py-3 px-3">
                            @if($user->role === 'admin')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-700">
                                Admin
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-700">
                                User
                            </span>
                            @endif
                        </td>

                        <!-- Status Akun -->
                        <td class="py-3 px-3">
                            @if($user->hasLifetimePremium())
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-300 shadow-2xs">
                                <svg class="w-3.5 h-3.5 text-amber-600 fill-current shrink-0" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg>
                                <span>Premium Selamanya</span>
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">
                                Reguler (Bayar Per Undangan)
                            </span>
                            @endif
                        </td>

                        <!-- Total Invitations -->
                        <td class="py-3 px-3 text-center">
                            <span class="inline-block px-2.5 py-0.5 rounded-lg bg-slate-100 text-slate-700 font-semibold text-xs">
                                {{ $user->invitations_count }}
                            </span>
                        </td>

                        <!-- Joined Date -->
                        <td class="py-3 px-3 text-xs text-slate-500 whitespace-nowrap">
                            {{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}
                        </td>

                        <!-- Actions -->
                        <td class="py-3 px-4 text-right whitespace-nowrap sticky right-0 bg-white group-hover:bg-slate-50/90 transition z-10 shadow-[-6px_0_10px_-4px_rgba(0,0,0,0.06)]">
                            <div class="flex items-center justify-end gap-2">
                                <!-- 1. Atur Status Akun Pengguna -->
                                <form method="POST" action="{{ route('admin.users.updatePackage', $user) }}" class="inline-flex items-center" title="Ubah Status Akun">
                                    @csrf
                                    <select name="package_tier" onchange="this.form.submit()" class="px-2.5 py-1.5 text-xs font-semibold rounded-lg border border-slate-200 bg-white text-slate-800 shadow-2xs hover:border-[#FF2E3A] focus:outline-none focus:ring-1 focus:ring-[#FF2E3A] cursor-pointer">
                                        <option value="basic" {{ !$user->hasLifetimePremium() ? 'selected' : '' }}>Reguler (Bayar Per Undangan)</option>
                                        <option value="premium" {{ $user->hasLifetimePremium() ? 'selected' : '' }}>Premium Selamanya (Bebas Buat Undangan)</option>
                                    </select>
                                </form>

                                <!-- 2. Toggle Role -->
                                @if($user->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.users.toggleRole', $user) }}" class="inline" onsubmit="return confirm('Ubah role {{ $user->name }} menjadi {{ $user->role === 'admin' ? 'User' : 'Admin' }}?')">
                                    @csrf
                                    <button type="submit" class="px-2.5 py-1.5 rounded-lg border text-xs font-semibold transition {{ $user->role === 'admin' ? 'border-slate-200 text-slate-700 hover:bg-slate-100' : 'border-red-200 text-red-600 hover:bg-red-50' }}"
                                            title="Ubah Role">
                                        {{ $user->role === 'admin' ? 'Jadikan User' : 'Jadikan Admin' }}
                                    </button>
                                </form>
                                @endif

                                <!-- 3. Delete User -->
                                @if($user->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline" onsubmit="return confirm('Yakin ingin menghapus pengguna {{ $user->name }} beserta seluruh undangannya? Tindakan ini tidak dapat dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition" title="Hapus Pengguna">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-10 text-center text-slate-400">
                            Tidak ditemukan data pengguna yang cocok.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($users->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50/50">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
