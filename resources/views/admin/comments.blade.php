@extends('layouts.dashboard')

@section('title', 'Moderasi Ucapan & Doa - Admin')
@section('container_max_width', 'max-w-[1720px] w-full')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Moderasi Ucapan &amp; Doa</h1>
            <p class="text-sm text-slate-500 mt-1">Tinjau, setujui, sembunyikan, atau hapus ucapan dari para tamu undangan.</p>
        </div>
        <div class="text-xs font-semibold text-slate-500 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
            Total: <span class="text-[#FF2E3A] font-bold">{{ $comments->total() }}</span> Ucapan
        </div>
    </div>

    <!-- Navigation Bar -->
    @include('partials.admin-nav')

    <!-- Search & Filter Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-4 sm:p-5">
        <form method="GET" action="{{ route('admin.comments.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            <!-- Search Query -->
            <div class="sm:col-span-8 relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama pengirim atau isi ucapan..." 
                       class="w-full pl-10 pr-4 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A]">
            </div>

            <!-- Status Filter -->
            <div class="sm:col-span-2">
                <select name="status" class="w-full px-3 py-2 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#FF2E3A]/20 focus:border-[#FF2E3A] bg-white">
                    <option value="">Semua Status</option>
                    <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Disetujui</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <!-- Submit Button & Reset -->
            <div class="sm:col-span-2 flex items-center gap-2">
                <button type="submit" class="flex-1 px-4 py-2 rounded-xl bg-[#FF2E3A] hover:bg-[#E02631] text-white text-xs font-bold transition shadow-xs">
                    Filter
                </button>
                @if(request()->hasAny(['q', 'status']))
                <a href="{{ route('admin.comments.index') }}" class="px-3 py-2 rounded-xl border border-slate-200 text-slate-500 hover:text-slate-800 text-xs font-semibold hover:bg-slate-50 transition">
                    Reset
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Comments List / Table Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto relative">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50/90 border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3.5 px-4 sm:px-5">Pengirim</th>
                        <th class="py-3.5 px-3">Undangan</th>
                        <th class="py-3.5 px-4 min-w-[240px]">Pesan Ucapan</th>
                        <th class="py-3.5 px-3">Status</th>
                        <th class="py-3.5 px-3 whitespace-nowrap">Waktu</th>
                        <th class="py-3.5 px-4 text-right whitespace-nowrap sticky right-0 bg-slate-50/95 backdrop-blur-xs z-10 shadow-[-6px_0_10px_-4px_rgba(0,0,0,0.06)]">Aksi Moderasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($comments as $comment)
                    <tr class="hover:bg-slate-50/70 transition group">
                        <!-- Sender Name -->
                        <td class="py-3 px-4 sm:px-5">
                            <div class="font-bold text-slate-900">{{ $comment->name }}</div>
                            <div class="text-[11px] text-slate-400">ID #{{ $comment->id }}</div>
                        </td>

                        <!-- Invitation Link -->
                        <td class="py-3 px-3 whitespace-nowrap">
                            @if($comment->invitation)
                            <a href="{{ route('invitation.show', $comment->invitation->slug) }}" target="_blank" class="font-semibold text-blue-600 hover:underline text-xs flex items-center gap-1">
                                <span>{{ Str::limit($comment->invitation->title ?? ($comment->invitation->groom_name . ' & ' . $comment->invitation->bride_name), 26) }}</span>
                                <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                            @else
                            <span class="text-xs text-slate-400 italic">Undangan telah dihapus</span>
                            @endif
                        </td>

                        <!-- Message -->
                        <td class="py-3 px-4">
                            <p class="text-xs text-slate-700 leading-relaxed italic line-clamp-2 md:line-clamp-3">
                                "{{ $comment->message }}"
                            </p>
                        </td>

                        <!-- Status Badge -->
                        <td class="py-3 px-3 whitespace-nowrap">
                            @if($comment->status === 'approved')
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Disetujui
                            </span>
                            @elseif($comment->status === 'rejected')
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-700">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                Ditolak
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                Pending
                            </span>
                            @endif
                        </td>

                        <!-- Created Time -->
                        <td class="py-3 px-3 text-xs text-slate-500 whitespace-nowrap">
                            {{ $comment->created_at ? $comment->created_at->format('d M Y, H:i') : '-' }}
                        </td>

                        <!-- Actions -->
                        <td class="py-3 px-4 text-right whitespace-nowrap sticky right-0 bg-white group-hover:bg-slate-50/90 transition z-10 shadow-[-6px_0_10px_-4px_rgba(0,0,0,0.06)]">
                            <div class="flex items-center justify-end gap-1.5">
                                <!-- Approve Button -->
                                @if($comment->status !== 'approved')
                                <form method="POST" action="{{ route('admin.comments.toggleStatus', $comment) }}" class="inline">
                                    @csrf
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="px-2.5 py-1.5 rounded-lg border border-emerald-300 bg-emerald-50 text-emerald-800 hover:bg-emerald-100 text-xs font-semibold transition" title="Setujui Ucapan">
                                        Setujui
                                    </button>
                                </form>
                                @endif

                                <!-- Reject Button -->
                                @if($comment->status !== 'rejected')
                                <form method="POST" action="{{ route('admin.comments.toggleStatus', $comment) }}" class="inline">
                                    @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="px-2.5 py-1.5 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-100 text-xs font-semibold transition" title="Tolak / Sembunyikan Ucapan">
                                        Tolak
                                    </button>
                                </form>
                                @endif

                                <!-- Delete Button -->
                                <form method="POST" action="{{ route('admin.comments.destroy', $comment) }}" class="inline" onsubmit="return confirm('Hapus ucapan dari {{ $comment->name }} secara permanen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition" title="Hapus Permanen">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-10 text-center text-slate-400">
                            Tidak ditemukan ucapan atau komentar yang sesuai.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($comments->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50/50">
            {{ $comments->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
