@extends('themes.layouts.base')

@push('fonts')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
@endpush

@push('theme-styles')
<style>
:root {
    --primary: #800020;
    --secondary: #FFF8E7;
    --accent: #FFD700;
}

body {
    font-family: 'Lato', sans-serif;
    color: #1c1917;
    background-image: url('/images/themes/bg/bg-basic-maroon.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: scroll;
    margin: 0;
    padding: 0;
    position: relative;
}

body::before {
    content: '';
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.2);
    backdrop-filter: brightness(0.95);
    pointer-events: none;
    z-index: 0;
}

.invitation-cover {
    position: fixed;
    inset: 0;
    background: linear-gradient(135deg, var(--primary) 0%, #5C001A 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    animation: fadeIn 1s ease;
}

.cover-content {
    text-align: center;
    color: var(--secondary);
    padding: 2rem;
}

.cover-content h1 {
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    margin-bottom: 1rem;
    font-weight: 400;
}

.cover-content h2 {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    margin-bottom: 1rem;
    font-weight: 700;
}

.cover-content p {
    font-size: 0.875rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.btn-open {
    background: var(--secondary);
    color: var(--primary);
    border: none;
    padding: 1rem 3rem;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    border-radius: 2px;
    transition: transform 0.3s;
}

.btn-open:hover {
    transform: scale(1.05);
}

/* Hero Section */
.hero {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 2rem;
    position: relative;
    background: var(--secondary);
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 200px;
    background: url('/storage/decorations/roses-top.png') no-repeat center top;
    background-size: contain;
    opacity: 0.3;
}

.couple-names {
    font-family: 'Playfair Display', serif;
    font-size: 4rem;
    color: var(--primary);
    margin: 2rem 0;
    font-weight: 700;
    animation: fadeInUp 1.5s ease;
}

.couple-names .ampersand {
    font-size: 3rem;
    color: var(--accent);
    margin: 0 1rem;
}

.event-date {
    font-size: 1.5rem;
    color: #666;
    margin-top: 1rem;
}

/* Section */
.section {
    max-width: 900px;
    margin: 4rem auto;
    padding: 0 2rem;
    animation: fadeIn 1s ease;
}

.section-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    color: var(--primary);
    text-align: center;
    margin-bottom: 2rem;
}

/* Quote */
.quote-section {
    text-align: center;
    font-style: italic;
    color: #555;
    line-height: 1.8;
    margin: 4rem auto;
    max-width: 700px;
    padding: 0 2rem;
}

.quote-text {
    font-size: 1.125rem;
    margin-bottom: 1rem;
}

.quote-source {
    font-size: 0.875rem;
    color: var(--primary);
    font-weight: 600;
}

/* Couple Profile */
.couple-profile {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    margin: 4rem auto;
    max-width: 800px;
    padding: 0 2rem;
}

.profile-card {
    text-align: center;
}

.profile-photo {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    object-fit: cover;
    margin: 0 auto 1.5rem;
    border: 4px solid var(--primary);
}

.profile-name {
    font-family: 'Playfair Display', serif;
    font-size: 1.75rem;
    color: var(--primary);
    margin-bottom: 0.5rem;
}

/* Event Details */
.event-cards {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.event-card {
    background: white;
    padding: 2rem;
    border-radius: 4px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    border-top: 3px solid var(--primary);
}

.event-card h3 {
    font-family: 'Playfair Display', serif;
    color: var(--primary);
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

.event-info {
    color: #666;
    line-height: 1.8;
}

.event-info strong {
    color: #333;
}

/* Countdown */
.countdown-container {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin: 3rem 0;
}

.countdown-item {
    text-align: center;
}

.countdown-value {
    display: block;
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    color: var(--primary);
    font-weight: 700;
}

.countdown-label {
    display: block;
    font-size: 0.875rem;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Gallery */
.gallery {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin: 3rem 0;
}

.gallery img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 4px;
}

/* RSVP & Comments */
.rsvp-form, .comments-section {
    background: white;
    padding: 2rem;
    border-radius: 4px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    margin: 2rem 0;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: var(--primary);
    font-weight: 600;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-family: 'Lato', sans-serif;
}

.btn-submit {
    background: var(--primary);
    color: white;
    border: none;
    padding: 1rem 2rem;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    border-radius: 4px;
    transition: background 0.3s;
}

.btn-submit:hover {
    background: #5C001A;
}

/* Gift */
.gift-accounts {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.gift-account {
    background: white;
    padding: 1.5rem;
    border-radius: 4px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    text-align: center;
}

.gift-bank {
    font-weight: 700;
    color: var(--primary);
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
}

.gift-account-number {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0.5rem 0;
}

.btn-copy {
    background: var(--secondary);
    color: var(--primary);
    border: 1px solid var(--primary);
    padding: 0.5rem 1.5rem;
    cursor: pointer;
    border-radius: 4px;
    margin-top: 1rem;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

/* Comments */
.comments-list {
    margin-top: 2rem;
}

.comment-item {
    border-bottom: 1px solid #eee;
    padding: 1rem 0;
}

.comment-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
}

.comment-date {
    font-size: 0.75rem;
    color: #999;
}

/* Music Player */
.music-player {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
}

.music-toggle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: var(--primary);
    color: white;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    transition: transform 0.3s;
}

.music-toggle:hover {
    transform: scale(1.1);
}

.music-toggle.playing {
    animation: pulse 2s infinite;
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

/* Responsive */
@media (max-width: 768px) {
    .couple-names {
        font-size: 2.5rem;
    }
    
    .couple-profile {
        grid-template-columns: 1fr;
    }
    
    .countdown-container {
        gap: 1rem;
    }
    
    .countdown-value {
        font-size: 2rem;
    }
    
    .gallery {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@section('invitation-content')
<!-- Hero -->
<section class="hero">
    <div class="couple-names">
        {{ $invitation->groom_nickname }}
        <span class="ampersand">&</span>
        {{ $invitation->bride_nickname }}
    </div>
    <div class="event-date">{{ $invitation->event_date->format('d F Y') }}</div>
</section>

<!-- Quote -->
@if($invitation->quran_text)
<section class="quote-section">
    <div class="quote-text">{{ $invitation->quran_text }}</div>
    @if($invitation->quran_translation)
    <div class="quote-text">"{{ $invitation->quran_translation }}"</div>
    @endif
    @if($invitation->quote_source)
    <div class="quote-source">— {{ $invitation->quote_source }}</div>
    @endif
</section>
@endif

<!-- Couple Profile -->
<section class="section">
    <h2 class="section-title">Mempelai</h2>
    <div class="couple-profile">
        <div class="profile-card">
            <div class="w-36 h-48 mx-auto rounded-t-full overflow-hidden border-2 border-[#D4AF37] relative flex items-center justify-center">
                @if(!empty($invitation->groom_photo))
                    <img src="{{ Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo) }}?v={{ time() }}" alt="Mempelai Pria" class="w-full h-full object-cover">
                @else
                    <!-- Placeholder hanya muncul jika foto belum diunggah -->
                    <div class="placeholder-avatar w-full h-full bg-[#8B3A1C] flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#FEFCEF] opacity-40 placeholder-avatar" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                @endif
            </div>
            <h3 class="profile-name">{{ $invitation->groom_name }}</h3>
        </div>
        <div class="profile-card">
            <div class="w-36 h-48 mx-auto rounded-t-full overflow-hidden border-2 border-[#D4AF37] relative flex items-center justify-center">
                @if(!empty($invitation->bride_photo))
                    <img src="{{ Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo) }}?v={{ time() }}" alt="Mempelai Wanita" class="w-full h-full object-cover">
                @else
                    <!-- Placeholder hanya muncul jika foto belum diunggah -->
                    <div class="placeholder-avatar w-full h-full bg-[#65011E] flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#FEFCEF] opacity-40 placeholder-avatar" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                @endif
            </div>
            <h3 class="profile-name">{{ $invitation->bride_name }}</h3>
        </div>
    </div>
</section>

<!-- Event Details -->
<section class="section">
    <h2 class="section-title">Acara</h2>
    <div class="event-cards">
        @if($invitation->akad_date)
        <div class="event-card">
            <h3>Akad Nikah</h3>
            <div class="event-info">
                <p><strong>Tanggal:</strong> {{ $invitation->akad_date->format('d F Y') }}</p>
                <p><strong>Waktu:</strong> {{ $invitation->akad_time->format('H:i') }} WIB</p>
                <p><strong>Tempat:</strong> {{ $invitation->akad_venue }}</p>
                @if($invitation->akad_address)
                <p><strong>Alamat:</strong> {{ $invitation->akad_address }}</p>
                @endif
            </div>
        </div>
        @endif
        
        <div class="event-card">
            <h3>Resepsi</h3>
            <div class="event-info">
                <p><strong>Tanggal:</strong> {{ $invitation->event_date->format('d F Y') }}</p>
                <p><strong>Waktu:</strong> {{ $invitation->event_time->format('H:i') }} WIB</p>
                <p><strong>Tempat:</strong> {{ $invitation->venue }}</p>
                @if($invitation->address)
                <p><strong>Alamat:</strong> {{ $invitation->address }}</p>
                @endif
                @if($invitation->maps_url)
                <a href="{{ $invitation->maps_url }}" target="_blank" class="btn-submit" style="display: inline-block; margin-top: 1rem; text-decoration: none;">Buka Google Maps</a>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Countdown -->
<section class="section">
    <h2 class="section-title">Hitung Mundur</h2>
    @include('themes.components.countdown', ['eventDate' => $invitation->event_date->format('Y-m-d H:i:s'), 'style' => 'default'])
</section>

<!-- Gallery -->
@if($invitation->photos->where('slot', 'gallery')->count() > 0)
<section class="section">
    <h2 class="section-title">Galeri</h2>
    <div class="gallery">
        @foreach($invitation->photos->where('slot', 'gallery') as $photo)
        <img src="{{ asset('storage/' . $photo->path) }}" alt="Gallery">
        @endforeach
    </div>
</section>
@endif

<!-- RSVP -->
<section class="section">
    <h2 class="section-title">RSVP</h2>
    @include('themes.components.rsvp-form', ['invitationId' => $invitation->id, 'guestName' => $guestName ?? null])
</section>

<!-- Comments -->
<section class="section">
    <h2 class="section-title">Ucapan & Doa</h2>
    @include('themes.components.comments', ['invitationId' => $invitation->id, 'comments' => $invitation->comments()->where('status', 'approved')->latest()->get()])
</section>

<!-- Gift -->
@if($invitation->giftAccounts->count() > 0)
<section class="section">
    <h2 class="section-title">Amplop Digital</h2>
    @include('themes.components.gift', ['giftAccounts' => $invitation->giftAccounts])
</section>
@endif

<!-- Closing -->
<section class="section" style="text-align: center; padding: 4rem 2rem;">
    <p style="font-style: italic; color: #666; margin-bottom: 1rem;">
        Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu kepada kami.
    </p>
    <div class="couple-names" style="font-size: 2rem; margin: 2rem 0;">
        {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}
    </div>
    <p style="color: #999; font-size: 0.875rem;">Terima kasih</p>
</section>
@endsection
