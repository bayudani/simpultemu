@extends('layouts.dashboard')

@section('title', 'Pesan & RSVP Masuk')

@section('content')
<div class="mb-4 sm:mb-8">
    <span class="inline-block px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full text-[10px] sm:text-xs font-semibold tracking-wider uppercase text-[#0284C7] bg-[#DBF6FF] border border-[#BAEAF8] mb-1 sm:mb-2">
        Interaksi Tamu
    </span>
    <h1 class="font-heading text-xl sm:text-3xl font-bold text-slate-900">
        Pesan &amp; RSVP Masuk
    </h1>
    <p class="text-slate-500 text-xs sm:text-sm mt-0.5 sm:mt-1">Daftar konfirmasi kehadiran serta ucapan dan doa restu dari para tamu undangan Anda.</p>
</div>

<!-- Filter Tabs Cepat di Ponsel (Hanya tampil di mobile < lg) -->
<div class="flex items-center gap-1.5 mb-3 lg:hidden overflow-x-auto pb-1 scrollbar-none">
    <button type="button" onclick="filterMessagesMobile('all')" id="tab-msg-all" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-[#FF2E3A] text-white shadow-2xs transition cursor-pointer shrink-0">
        Semua
    </button>
    <button type="button" onclick="filterMessagesMobile('rsvp')" id="tab-msg-rsvp" class="px-3 py-1.5 rounded-xl text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 transition cursor-pointer flex items-center gap-1.5 shrink-0">
        <span>RSVP</span>
        <span class="px-1.5 py-0.2 rounded-full text-[10px] font-bold bg-[#DBF6FF] text-[#0284C7]">{{ $rsvps->total() }}</span>
    </button>
    <button type="button" onclick="filterMessagesMobile('comments')" id="tab-msg-comments" class="px-3 py-1.5 rounded-xl text-xs font-semibold bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 transition cursor-pointer flex items-center gap-1.5 shrink-0">
        <span>Ucapan</span>
        <span class="px-1.5 py-0.2 rounded-full text-[10px] font-bold bg-[#DBF6FF] text-[#0284C7]">{{ $comments->total() }}</span>
    </button>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-3 sm:gap-6 lg:gap-8">
    <!-- Kolom 1: Konfirmasi Kehadiran (RSVP) -->
    <div id="section-rsvp" class="bg-white rounded-xl sm:rounded-2xl border border-slate-200 shadow-xs overflow-hidden flex flex-col justify-between">
        <div>
            <div class="p-3.5 sm:p-6 border-b border-slate-200 bg-slate-50/60 flex items-center justify-between gap-2">
                <div>
                    <h2 class="font-heading text-sm sm:text-lg font-bold text-slate-900 flex items-center gap-1.5 sm:gap-2">
                        <span>Konfirmasi Kehadiran (RSVP)</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] sm:text-xs font-semibold bg-[#DBF6FF] text-[#FF2E3A] border border-[#BAEAF8]">
                            {{ $rsvps->total() }}
                        </span>
                    </h2>
                    <p class="text-[10px] sm:text-xs text-slate-500 mt-0.5">Respons kehadiran yang dikirimkan oleh tamu</p>
                </div>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($rsvps as $rsvp)
                <div class="p-3 sm:p-5 hover:bg-[#DBF6FF]/15 transition-colors">
                    <div class="flex items-start justify-between gap-2 mb-1.5">
                        <div class="min-w-0 flex-1">
                            <h3 class="font-semibold text-slate-900 text-xs sm:text-sm truncate">{{ $rsvp->name }}</h3>
                            <p class="text-[10px] sm:text-xs text-slate-500 truncate">Undangan: <span class="font-medium text-slate-700">{{ $rsvp->invitation->groom_nickname ?? '' }} &amp; {{ $rsvp->invitation->bride_nickname ?? '' }}</span></p>
                        </div>
                        <div class="shrink-0">
                            @if($rsvp->attendance === 'hadir')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] sm:text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                    Hadir ({{ $rsvp->guest_count }} org)
                                </span>
                            @elseif($rsvp->attendance === 'tidak_hadir')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] sm:text-xs font-semibold bg-red-100 text-red-800 border border-red-200">
                                    Tidak Hadir
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] sm:text-xs font-semibold bg-[#DBF6FF] text-[#0284C7] border border-[#BAEAF8]">
                                    Masih Ragu
                                </span>
                            @endif
                        </div>
                    </div>

                    @if($rsvp->message)
                    <p class="text-[11px] sm:text-xs text-slate-600 bg-slate-50 p-2 sm:p-3 rounded-lg sm:rounded-xl border border-slate-200/80 italic mt-1.5 leading-relaxed">
                        "{{ $rsvp->message }}"
                    </p>
                    @endif

                    <p class="text-[9px] sm:text-[10px] text-slate-400 mt-1 sm:mt-1.5 text-right">
                        {{ $rsvp->created_at->diffForHumans() }}
                    </p>
                </div>
                @empty
                <div class="text-center py-6 sm:py-12 px-3 sm:px-4 text-slate-500">
                    <div class="w-8 h-8 sm:w-12 sm:h-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-2">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <p class="font-heading font-semibold text-slate-700 text-xs sm:text-sm">Belum ada data RSVP masuk</p>
                    <p class="text-[10px] sm:text-xs text-slate-400 mt-0.5 max-w-xs mx-auto">Konfirmasi kehadiran dari tamu akan muncul di sini secara otomatis.</p>
                </div>
                @endforelse
            </div>
        </div>

        @if($rsvps->hasPages())
        <div class="p-2.5 sm:p-4 border-t border-slate-200">
            {{ $rsvps->links() }}
        </div>
        @endif
    </div>

    <!-- Kolom 2: Ucapan & Doa Restu (Comments) -->
    <div id="section-comments" class="bg-white rounded-xl sm:rounded-2xl border border-slate-200 shadow-xs overflow-hidden flex flex-col justify-between">
        <div>
            <div class="p-3.5 sm:p-6 border-b border-slate-200 bg-slate-50/60 flex items-center justify-between gap-2">
                <div>
                    <h2 class="font-heading text-sm sm:text-lg font-bold text-slate-900 flex items-center gap-1.5 sm:gap-2">
                        <span>Ucapan &amp; Doa Restu</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] sm:text-xs font-semibold bg-[#DBF6FF] text-[#FF2E3A] border border-[#BAEAF8]">
                            {{ $comments->total() }}
                        </span>
                    </h2>
                    <p class="text-[10px] sm:text-xs text-slate-500 mt-0.5">Doa dan ungkapan kebahagiaan dari sahabat dan keluarga</p>
                </div>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($comments as $comment)
                <div class="p-3 sm:p-5 hover:bg-[#DBF6FF]/15 transition-colors">
                    <div class="flex items-start justify-between gap-2 mb-1.5">
                        <div class="min-w-0 flex-1">
                            <h3 class="font-semibold text-slate-900 text-xs sm:text-sm truncate">{{ $comment->name }}</h3>
                            <p class="text-[10px] sm:text-xs text-slate-500 truncate">Undangan: <span class="font-medium text-slate-700">{{ $comment->invitation->groom_nickname ?? '' }} &amp; {{ $comment->invitation->bride_nickname ?? '' }}</span></p>
                        </div>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9px] sm:text-[10px] font-semibold shrink-0 {{ $comment->isApproved() ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-700' }}">
                            {{ ucfirst($comment->status) }}
                        </span>
                    </div>

                    <p class="text-[11px] sm:text-xs text-slate-700 bg-slate-50 p-2 sm:p-3 rounded-lg sm:rounded-xl border border-slate-200 mt-1.5 leading-relaxed">
                        {{ $comment->message }}
                    </p>

                    <p class="text-[9px] sm:text-[10px] text-slate-400 mt-1 sm:mt-1.5 text-right">
                        {{ $comment->created_at->diffForHumans() }}
                    </p>
                </div>
                @empty
                <div class="text-center py-6 sm:py-12 px-3 sm:px-4 text-slate-500">
                    <div class="w-8 h-8 sm:w-12 sm:h-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-2">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                    </div>
                    <p class="font-heading font-semibold text-slate-700 text-xs sm:text-sm">Belum ada ucapan atau doa yang masuk</p>
                    <p class="text-[10px] sm:text-xs text-slate-400 mt-0.5 max-w-xs mx-auto">Pesan dari buku tamu digital akan terkumpul di sini.</p>
                </div>
                @endforelse
            </div>
        </div>

        @if($comments->hasPages())
        <div class="p-2.5 sm:p-4 border-t border-slate-200">
            {{ $comments->links() }}
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
function filterMessagesMobile(type) {
    const secRsvp = document.getElementById('section-rsvp');
    const secComments = document.getElementById('section-comments');
    const tabAll = document.getElementById('tab-msg-all');
    const tabRsvp = document.getElementById('tab-msg-rsvp');
    const tabComments = document.getElementById('tab-msg-comments');

    const activeClasses = ['bg-[#FF2E3A]', 'text-white', 'shadow-2xs', 'font-bold'];
    const inactiveClasses = ['bg-white', 'border', 'border-slate-200', 'text-slate-700', 'font-semibold'];

    [tabAll, tabRsvp, tabComments].forEach(tab => {
        if (!tab) return;
        tab.classList.remove(...activeClasses);
        tab.classList.add(...inactiveClasses);
    });

    if (type === 'rsvp') {
        if (secRsvp) secRsvp.classList.remove('hidden');
        if (secComments) secComments.classList.add('hidden');
        if (tabRsvp) {
            tabRsvp.classList.remove(...inactiveClasses);
            tabRsvp.classList.add(...activeClasses);
        }
    } else if (type === 'comments') {
        if (secRsvp) secRsvp.classList.add('hidden');
        if (secComments) secComments.classList.remove('hidden');
        if (tabComments) {
            tabComments.classList.remove(...inactiveClasses);
            tabComments.classList.add(...activeClasses);
        }
    } else {
        if (secRsvp) secRsvp.classList.remove('hidden');
        if (secComments) secComments.classList.remove('hidden');
        if (tabAll) {
            tabAll.classList.remove(...inactiveClasses);
            tabAll.classList.add(...activeClasses);
        }
    }
}
</script>
@endpush
@endsection
