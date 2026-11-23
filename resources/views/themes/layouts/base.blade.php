<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }} - Undangan Pernikahan</title>
    <meta name="description" content="Undangan Pernikahan {{ $invitation->groom_name }} & {{ $invitation->bride_name }}">
    
    <!-- Open Graph -->
    <meta property="og:title" content="{{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }} - Undangan Pernikahan">
    <meta property="og:description" content="Undangan Pernikahan {{ $invitation->groom_name }} & {{ $invitation->bride_name }}">
    <meta property="og:type" content="website">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Google Fonts -->
    @stack('fonts')
    
    <!-- Theme Styles -->
    @stack('theme-styles')
    
    <style>
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body>
    @if(isset($guestName))
        <!-- Personalized Cover -->
        <div id="invitation-cover" x-data="{ open: false }" class="invitation-cover">
            <div class="cover-content">
                <h1>Kepada Yth.</h1>
                <h2>{{ $guestName }}</h2>
                <p>Mohon maaf apabila ada kesalahan penulisan nama/gelar</p>
                <button @click="open = true; document.getElementById('invitation-cover').style.display = 'none'" class="btn-open">
                    Buka Undangan
                </button>
            </div>
        </div>
    @endif

    <main class="invitation-main">
        @yield('invitation-content')
    </main>

    <!-- Music Player -->
    @if($invitation->music)
        @include('themes.components.music-player', ['musicPath' => $invitation->music->file_path, 'musicTitle' => $invitation->music->title])
    @endif

    @stack('scripts')
</body>
</html>
