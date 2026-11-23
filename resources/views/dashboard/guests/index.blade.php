@extends('layouts.dashboard')

@section('content')
@php
    $guestLimit = $invitation->getGuestLimit();
    $packageTier = $invitation->getPackageTier();
    $packageLabel = $invitation->getPackageLabel();
    $isUnlimited = $guestLimit === null;
    $isLimitReached = !$isUnlimited && $stats['total'] >= $guestLimit;
@endphp
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <h1 class="text-2xl font-bold text-gray-900">Kelola Tamu</h1>
                @if($isUnlimited)
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-300 flex items-center gap-1 shadow-2xs">
                        <svg class="w-3.5 h-3.5 text-amber-600 fill-current" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/></svg>
                        <span>{{ $packageLabel }} (Tamu Unlimited)</span>
                    </span>
                @else
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                        {{ $packageLabel }} (Maks. {{ $guestLimit }} Tamu)
                    </span>
                @endif
            </div>
            <p class="text-sm text-gray-500">{{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}</p>
        </div>
        <div class="flex space-x-2.5 sm:space-x-3">
            <a href="{{ route('dashboard.guests.share', $invitation) }}" class="inline-flex items-center px-3.5 sm:px-4 py-2 border border-slate-300 shadow-xs text-xs sm:text-sm font-medium rounded-xl text-slate-700 bg-white hover:bg-slate-50 transition">
                Sebar Undangan
            </a>
            @if($isLimitReached)
                <button type="button" onclick="openUpgradeModal({{ $invitation->id }}, 'Batas {{ $guestLimit }} tamu untuk {{ $packageLabel }} telah tercapai. Tambah kuota atau upgrade ke Premium sekarang!')" class="inline-flex items-center px-3.5 sm:px-4 py-2 border border-transparent shadow-xs text-xs sm:text-sm font-bold rounded-xl text-white bg-gradient-to-r from-amber-500 to-[#FF2E3A] hover:opacity-95 cursor-pointer">
                    ✨ Tambah Kuota / Upgrade
                </button>
            @else
                <button type="button" onclick="document.getElementById('add-guest-modal').classList.remove('hidden')" class="inline-flex items-center px-3.5 sm:px-4 py-2 border border-transparent shadow-xs text-xs sm:text-sm font-semibold rounded-xl text-white bg-[#FF2E3A] hover:bg-[#E01E2A] cursor-pointer transition">
                    + Tambah Tamu
                </button>
            @endif
        </div>
    </div>

    <!-- Banner Info Kuota Tamu Paket Basic / Add-On / Premium -->
    @if(!$isUnlimited)
        <div class="mt-4 p-3.5 sm:p-4 rounded-2xl {{ $isLimitReached ? 'bg-rose-50 border-rose-200 text-rose-900' : 'bg-amber-50/80 border-amber-200 text-amber-900' }} border flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div class="flex items-start gap-2.5">
                <svg class="w-5 h-5 {{ $isLimitReached ? 'text-rose-600' : 'text-amber-600' }} shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <p class="text-xs sm:text-sm font-bold">
                        {{ $isLimitReached ? "Batas Maksimal {$guestLimit} Tamu Telah Tercapai" : "Kuota Tamu {$packageLabel}: {$stats['total']} / {$guestLimit} Tamu" }}
                    </p>
                    <p class="text-xs text-slate-600 mt-0.5">
                        {{ $isLimitReached ? "Paket Anda ({$packageLabel}) telah mencapai batas maksimal {$guestLimit} tamu. Tambah kuota dengan Add-On (mulai Rp 17.000) atau nikmati tamu tanpa batas dengan Premium (Rp 59.000)." : "Paket Anda ({$packageLabel}) memiliki batas kuota {$guestLimit} nama tamu. Tambah kuota kapan saja dengan Add-On atau nikmati tanpa batas dengan Premium." }}
                    </p>
                </div>
            </div>
            <button type="button" onclick="openUpgradeModal({{ $invitation->id }}, 'Tambah kuota nama tamu atau buka akses tak terbatas')" class="shrink-0 px-3.5 py-1.5 rounded-xl bg-[#FF2E3A] hover:bg-[#E01E2A] text-white text-xs font-bold shadow-xs transition cursor-pointer text-center">
                Tambah Kuota / Upgrade
            </button>
        </div>
    @endif
</div>

<div class="grid grid-cols-1 gap-5 sm:grid-cols-4 mb-8">
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Tamu</dt>
                        <dd class="text-lg font-semibold text-gray-900">{{ $stats['total'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Sudah Dikirim</dt>
                        <dd class="text-lg font-semibold text-gray-900">{{ $stats['sent'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Sudah Dibuka</dt>
                        <dd class="text-lg font-semibold text-gray-900">{{ $stats['opened'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Sudah RSVP</dt>
                        <dd class="text-lg font-semibold text-gray-900">{{ $stats['rsvp'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white shadow rounded-2xl border border-slate-200 overflow-hidden">
    <div class="p-6">
        @if($guests->isEmpty())
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <h3 class="mt-3 text-sm font-semibold text-gray-900">Belum ada daftar tamu</h3>
                <p class="mt-1 text-xs text-gray-500 max-w-sm mx-auto">Anda dapat menambahkan tamu secara manual atau langsung membagikan tautan undangan personal melalui tombol <strong>Bagikan</strong> di dashboard.</p>
                <div class="mt-4">
                    <button type="button" onclick="document.getElementById('add-guest-modal').classList.remove('hidden')" class="inline-flex items-center gap-1.5 px-4 py-2 border border-transparent shadow-xs text-xs font-semibold rounded-xl text-white bg-[#FF2E3A] hover:bg-[#E01E2A] cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <span>Tambah Tamu Manual</span>
                    </button>
                </div>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">WhatsApp</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($guests as $guest)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $guest->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $guest->phone ?? '-' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $guest->category ?? '-' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col space-y-1">
                                        @if($guest->opened_at)
                                            <span class="text-xs text-green-600">Dibuka</span>
                                        @elseif($guest->sent_at)
                                            <span class="text-xs text-blue-600">Terkirim</span>
                                        @else
                                            <span class="text-xs text-gray-500">Belum dikirim</span>
                                        @endif
                                        @if($guest->rsvp_status !== 'pending')
                                            <span class="text-xs text-green-600">RSVP</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="copyToClipboard('{{ $guest->invitation_url }}')" class="text-gray-600 hover:text-gray-900 mr-3" title="Copy Link">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                    </button>
                                    <a href="{{ $guest->phone ? 'https://wa.me/'.preg_replace('/[^0-9]/', '', $guest->phone).'?text='.urlencode($guest->whatsapp_message) : 'https://wa.me/?text='.urlencode($guest->whatsapp_message) }}" target="_blank" class="text-green-600 hover:text-green-900 mr-3 inline-block" title="Kirim via WhatsApp">
                                        <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                        </svg>
                                    </a>
                                    <button onclick="editGuest({{ $guest->id }}, '{{ $guest->name }}', '{{ $guest->phone }}', '{{ $guest->category }}')" class="text-gray-600 hover:text-gray-900 mr-3">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('dashboard.guests.destroy', [$invitation, $guest]) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus tamu ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

<!-- Add Guest Modal -->
<div id="add-guest-modal" class="hidden fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form action="{{ route('dashboard.guests.store', $invitation) }}" method="POST">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Tambah Tamu</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                            <input type="text" name="phone" id="phone" placeholder="08123456789" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select name="category" id="category" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                <option value="">Pilih Kategori</option>
                                <option value="Keluarga">Keluarga</option>
                                <option value="Teman">Teman</option>
                                <option value="Rekan Kerja">Rekan Kerja</option>
                                <option value="Tetangga">Tetangga</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-900 text-base font-medium text-white hover:bg-gray-800 sm:ml-3 sm:w-auto sm:text-sm">
                        Simpan
                    </button>
                    <button type="button" onclick="document.getElementById('add-guest-modal').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Guest Modal -->
<div id="edit-guest-modal" class="hidden fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form id="edit-guest-form" method="POST">
                @csrf
                @method('PUT')
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Tamu</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="edit_name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="name" id="edit_name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>
                        <div>
                            <label for="edit_phone" class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                            <input type="text" name="phone" id="edit_phone" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                        </div>
                        <div>
                            <label for="edit_category" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select name="category" id="edit_category" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm">
                                <option value="">Pilih Kategori</option>
                                <option value="Keluarga">Keluarga</option>
                                <option value="Teman">Teman</option>
                                <option value="Rekan Kerja">Rekan Kerja</option>
                                <option value="Tetangga">Tetangga</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-900 text-base font-medium text-white hover:bg-gray-800 sm:ml-3 sm:w-auto sm:text-sm">
                        Simpan
                    </button>
                    <button type="button" onclick="document.getElementById('edit-guest-modal').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
@if(session('requires_upgrade'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof openUpgradeModal === 'function') {
            openUpgradeModal({{ $invitation->id }});
        }
    });
</script>
@endif
<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('Link berhasil disalin!');
    });
}

function editGuest(id, name, phone, category) {
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_phone').value = phone || '';
    document.getElementById('edit_category').value = category || '';
    document.getElementById('edit-guest-form').action = '{{ route('dashboard.guests.update', [$invitation, '__ID__']) }}'.replace('__ID__', id);
    document.getElementById('edit-guest-modal').classList.remove('hidden');
}
</script>
@endpush
@endsection
