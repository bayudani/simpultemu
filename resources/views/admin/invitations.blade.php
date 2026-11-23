@extends('layouts.dashboard')

@section('title', 'Daftar Seluruh Undangan - Admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Daftar Seluruh Undangan</h1>
            <p class="text-sm text-slate-500 mt-1">Pantau seluruh undangan digital yang dibuat oleh pengguna di sistem.</p>
        </div>
        <div class="text-xs font-semibold text-slate-500 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
            Total: <span class="text-[#FF2E3A] font-bold">{{ $invitations->total() }}</span> Undangan
        </div>
    </div>

    <!-- Navigation Bar -->
    @include('partials.admin-nav')

    <!-- Search & Filter Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-4 sm:p-5">
        <form method="GET" action="{{ route('admin.invitations.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            <!-- Search Query -->
            <div class="sm:col-span-8 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul, nama mempelai, atau slug undangan..." 
                       class="w-full pl-10 pr-4 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]">
            </div>

            <!-- Status Filter -->
            <div class="sm:col-span-2">
                <select name="status" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A] bg-white">
                    <option value="">Semua Status</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            <!-- Submit Button & Reset -->
            <div class="sm:col-span-2 flex items-center gap-2">
                <button type="submit" class="flex-1 px-4 py-2 rounded-xl bg-[#FF2E3A] hover:bg-[#E02631] text-white text-xs font-bold transition shadow-xs">
                    Filter
                </button>
                @if(request()->hasAny(['q', 'status']))
                <a href="{{ route('admin.invitations.index') }}" class="px-3 py-2 rounded-xl border border-slate-200 text-slate-500 hover:text-slate-800 text-xs font-semibold hover:bg-slate-50 transition">
                    Reset
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Invitations Table Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-200 text-slate-500 text-xs font-bold uppercase tracking-wider">
                        <th class="py-3.5 px-5">Undangan &amp; Pasangan</th>
                        <th class="py-3.5 px-4">Pemilik Akun</th>
                        <th class="py-3.5 px-4">Tema Digunakan</th>
                        <th class="py-3.5 px-4">Tanggal Acara</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-center">Ucapan</th>
                        <th class="py-3.5 px-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($invitations as $inv)
                    <tr class="hover:bg-slate-50/80 transition">
                        <!-- Invitation Title & Couple -->
                        <td class="py-4 px-5">
                            <div class="font-bold text-slate-900">{{ $inv->title ?? ($inv->groom_name . ' & ' . $inv->bride_name) }}</div>
                            <div class="text-xs text-slate-500 font-mono mt-0.5">/undangan/{{ $inv->slug }}</div>
                        </td>

                        <!-- Creator -->
                        <td class="py-4 px-4 whitespace-nowrap">
                            @if($inv->user)
                            <div class="font-semibold text-slate-800 text-xs">{{ $inv->user->name }}</div>
                            <div class="text-[11px] text-slate-400">{{ $inv->user->email }}</div>
                            @else
                            <span class="text-xs text-slate-400 italic">User terhapus</span>
                            @endif
                        </td>

                        <!-- Theme -->
                        <td class="py-4 px-4 whitespace-nowrap">
                            @if($inv->theme)
                            <div class="flex items-center gap-1.5">
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-bold uppercase {{ $inv->theme->tier === 'premium' ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-700' }}">
                                    {{ $inv->theme->tier }}
                                </span>
                                <span class="text-xs font-medium text-slate-800">{{ $inv->theme->name }}</span>
                            </div>
                            @else
                            <span class="text-xs text-slate-400">-</span>
                            @endif
                        </td>

                        <!-- Event Date -->
                        <td class="py-4 px-4 whitespace-nowrap text-xs text-slate-600">
                            <div>{{ $inv->event_date ? date('d M Y', strtotime($inv->event_date)) : '-' }}</div>
                            <div class="text-[11px] text-slate-400 truncate max-w-[140px]">{{ $inv->venue ?? '-' }}</div>
                        </td>

                        <!-- Status Badge -->
                        <td class="py-4 px-4 whitespace-nowrap">
                            @if($inv->status === 'published')
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Published
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                Draft
                            </span>
                            @endif
                        </td>

                        <!-- Comments Count -->
                        <td class="py-4 px-4 text-center whitespace-nowrap">
                            <span class="inline-block px-2 py-0.5 rounded-lg bg-slate-100 text-slate-700 font-semibold text-xs">
                                {{ $inv->comments_count }}
                            </span>
                        </td>

                        <!-- Actions -->
                        <td class="py-4 px-5 text-right whitespace-nowrap">
                            <div class="flex items-center justify-end gap-1.5">
                                <!-- Preview Link -->
                                <a href="{{ route('invitation.show', $inv->slug) }}" target="_blank" class="p-1.5 rounded-lg border border-slate-200 text-slate-600 hover:text-blue-600 hover:bg-blue-50 transition" title="Lihat Undangan">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>

                                <!-- Delete Invitation -->
                                <form method="POST" action="{{ route('admin.invitations.destroy', $inv) }}" class="inline" onsubmit="return confirm('Yakin ingin menghapus undangan ini? Tindakan ini tidak dapat dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition" title="Hapus Undangan">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-10 text-center text-slate-400">
                            Tidak ditemukan undangan yang sesuai.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($invitations->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50/50">
            {{ $invitations->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
