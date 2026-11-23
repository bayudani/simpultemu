@props(['invitationId'])

<form action="{{ route('rsvp.store', $invitationId) }}" method="POST" class="rsvp-form">
    @csrf
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" id="name" name="name" required value="{{ $guestName ?? '' }}" {{ isset($guestName) ? 'readonly' : '' }}>
    </div>

    <div class="form-group">
        <label for="attendance">Kehadiran</label>
        <select id="attendance" name="attendance" required>
            <option value="">Pilih</option>
            <option value="hadir">Hadir</option>
            <option value="tidak_hadir">Tidak Hadir</option>
            <option value="masih_ragu">Masih Ragu</option>
        </select>
    </div>

    <div class="form-group">
        <label for="guest_count">Jumlah Tamu</label>
        <input type="number" id="guest_count" name="guest_count" value="1" min="1" required>
    </div>

    <div class="form-group">
        <label for="message">Pesan (Opsional)</label>
        <textarea id="message" name="message" rows="3"></textarea>
    </div>

    <button type="submit" class="btn-submit">Kirim RSVP</button>
</form>

@if(session('rsvp_success'))
    <div class="alert alert-success">
        {{ session('rsvp_success') }}
    </div>
@endif
