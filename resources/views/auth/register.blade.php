@extends('layouts.app')

@section('title', 'Daftar - SimpulTemu')

@push('styles')
<style>
body {
    background-color: #0B132B !important;
}

@keyframes slide-up-smooth {
    0% {
        opacity: 0;
        transform: translateY(18px) scale(0.99);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
.animate-slide-up {
    animation: slide-up-smooth 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    will-change: transform, opacity;
}

.auth-split-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    max-width: 1180px;
    margin: 0 auto;
    position: relative;
    z-index: 10;
}
.auth-left-col {
    display: none;
    width: 100%;
}
.auth-right-col {
    display: flex;
    justify-content: center;
    width: 100%;
}
.auth-card {
    width: 100%;
    max-width: 420px;
    min-width: 300px;
}
@media (min-width: 1024px) {
    .auth-split-wrapper {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        gap: 3rem;
    }
    .auth-left-col {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        flex: 1 1 58%;
        max-width: 660px;
    }
    .auth-right-col {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        flex: 1 1 42%;
        max-width: 450px;
    }
}
</style>
@endpush

@section('content')
<div class="min-h-screen flex items-center justify-center pt-24 pb-8 sm:pt-28 sm:pb-12 lg:pt-24 lg:pb-8 px-4 sm:px-6 lg:px-8 bg-[#0B132B] relative overflow-hidden" 
     style="min-height: 100vh; background-image: url('{{ asset('images/hero-banner.png') }}'); background-size: cover; background-position: center 35%;">
    
    <!-- Multi-layer Dark Navy Gradient Overlay persis Banner Beranda -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#0B132B]/95 via-[#1E293B]/85 to-[#0F172A]/90 z-0 pointer-events-none"></div>

    <!-- Ambient Glows -->
    <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-[#0284C7]/20 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 rounded-full bg-[#FF2E3A]/15 blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full bg-[#0B132B]/40 blur-3xl pointer-events-none"></div>

    <div class="auth-split-wrapper w-full max-w-6xl mx-auto flex flex-col lg:flex-row items-center justify-center lg:justify-between gap-8 lg:gap-12 relative z-10">
        
        <!-- Kolom Kiri: Headline & Gambar 3D Mockup Banner Beranda (Desktop) -->
        <div class="auth-left-col hidden lg:flex flex-col justify-center items-start animate-slide-up">
            <!-- Badge Platform -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold tracking-wide text-[#7CD6F7] bg-[#0284C7]/20 border border-[#0284C7]/40 mb-3.5 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-[#38BDF8] animate-pulse"></span>
                <span>Mulai Buat Undangan Gratis</span>
            </div>

            <!-- Headline Utama (Gaya Banner Beranda / Satu Platform) -->
            <h1 class="font-heading text-3xl sm:text-4xl xl:text-5xl font-bold text-white leading-[1.18] mb-3">
                Mulai Undangan Digital Anda dalam <span class="text-[#FF2E3A] inline-block">Satu Platform</span>
            </h1>

            <p class="font-sans text-sm sm:text-base text-slate-300 leading-relaxed max-w-xl mb-5">
                Daftar akun sekarang dan nikmati kemudahan mendesain undangan pernikahan eksklusif dengan 20 pilihan tema berkelas, musik latar, galeri foto, dan RSVP otomatis.
            </p>

            <!-- Gambar Banner 3D Phones dari Beranda (Proporsional & Pas dengan Form) -->
            <div class="relative w-full max-w-[340px] xl:max-w-[390px] 2xl:max-w-[430px] group mb-5">
                <div class="absolute inset-0 bg-gradient-to-tr from-[#FF2E3A]/25 via-[#0284C7]/30 to-amber-500/15 rounded-full blur-2xl transform scale-95 pointer-events-none"></div>
                <img
                    src="{{ asset('images/hero-3d-phones.png') }}"
                    alt="Model 3D Undangan Digital SimpulTemu"
                    class="relative z-10 w-full h-auto max-h-[250px] xl:max-h-[290px] 2xl:max-h-[320px] object-contain drop-shadow-[0_20px_35px_rgba(0,0,0,0.45)] transition-transform duration-500 group-hover:scale-[1.02]"
                >
            </div>

            <!-- Fitur Unggulan (Pill Badges) -->
            <div class="flex flex-wrap items-center gap-2.5 pt-1 text-xs sm:text-sm text-slate-200">
                <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/15 px-3.5 py-1.5 rounded-full shadow-2xs font-medium">
                    <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m4.5 12.75 6 6 9-13.5"/></svg>
                    20 Pilihan Tema
                </span>
                <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/15 px-3.5 py-1.5 rounded-full shadow-2xs font-medium">
                    <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m4.5 12.75 6 6 9-13.5"/></svg>
                    RSVP &amp; Amplop Digital
                </span>
                <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/15 px-3.5 py-1.5 rounded-full shadow-2xs font-medium">
                    <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m4.5 12.75 6 6 9-13.5"/></svg>
                    Kirim Sekali Klik
                </span>
            </div>
        </div>

        <!-- Kolom Kanan: Kartu Form Register Ramping & Pas di Layar Desktop (Tanpa Scroll) -->
        <div class="auth-right-col w-full flex justify-center lg:justify-end animate-slide-up">
            <div class="auth-card w-full max-w-[390px] sm:max-w-[420px] bg-[#FAF7F2] rounded-2xl sm:rounded-3xl border border-[#EAE3D9] shadow-[0_20px_50px_rgba(0,0,0,0.35)] p-5 sm:p-6 md:p-6 backdrop-blur-sm">
                
                <!-- Logo & Judul -->
                <div class="text-center mb-2.5">
                    <a href="{{ route('home') }}" class="inline-block mb-1.5 transition-transform hover:scale-105 focus:outline-none" aria-label="SimpulTemu Beranda">
                        <img src="{{ asset('images/logo/logo-simpultemu.png') }}" alt="SimpulTemu" class="h-7 sm:h-8 w-auto mx-auto object-contain">
                    </a>
                    <h2 class="text-lg sm:text-xl font-heading font-bold text-slate-900 leading-tight">Daftar SimpulTemu</h2>
                    <p class="mt-0.5 text-xs text-slate-500 font-sans">Mulai buat undangan pernikahan digitalmu</p>
                </div>

                <!-- Tombol Daftar dengan Google -->
                <div class="mb-2.5">
                    <a href="{{ route('auth.google') }}" class="w-full flex items-center justify-center gap-2.5 px-3.5 py-2 border border-slate-200 rounded-xl text-slate-700 bg-white hover:bg-slate-50 hover:border-slate-300 shadow-2xs transition-all duration-200 font-medium text-xs sm:text-sm group">
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:scale-110 shrink-0" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        <span>Daftar dengan Google</span>
                    </a>
                </div>

                <!-- Divider Pemisah -->
                <div class="relative my-2">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-200"></div>
                    </div>
                    <div class="relative flex justify-center text-[10px] sm:text-[11px] uppercase tracking-wider">
                        <span class="px-2.5 bg-[#FAF7F2] text-slate-400 font-medium">atau daftar dengan email</span>
                    </div>
                </div>

                @if($errors->any())
                    <div class="mb-2 bg-red-50 border border-red-200 text-red-600 px-3 py-1.5 rounded-xl text-xs">
                        <ul class="list-disc list-inside space-y-0.5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Register -->
                <form method="POST" action="{{ route('register') }}" class="space-y-2 sm:space-y-2.5" id="authRegisterForm">
                    @csrf
                    <div>
                        <label for="name" class="block text-xs font-medium text-slate-700 mb-0.5">Nama Lengkap</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                            </span>
                            <input id="name" name="name" type="text" required value="{{ old('name') }}" class="w-full pl-9 pr-3.5 py-1.5 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#FF2E3A] focus:ring-2 focus:ring-[#FF2E3A]/20 transition-all duration-200" placeholder="Nama Lengkap">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-medium text-slate-700 mb-0.5">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                            </span>
                            <input id="email" name="email" type="email" required value="{{ old('email') }}" class="w-full pl-9 pr-3.5 py-1.5 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#FF2E3A] focus:ring-2 focus:ring-[#FF2E3A]/20 transition-all duration-200" placeholder="nama@email.com">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        <div>
                            <label for="password" class="block text-xs font-medium text-slate-700 mb-0.5">Password</label>
                            <div class="relative">
                                <input id="password" name="password" type="password" required class="w-full pl-3 pr-8 py-1.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#FF2E3A] focus:ring-2 focus:ring-[#FF2E3A]/20 transition-all duration-200" placeholder="Min. 8 karakter">
                                <button type="button" onclick="togglePasswordVisibility('password', this)" class="absolute inset-y-0 right-0 pr-2.5 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none cursor-pointer" title="Lihat password">
                                    <svg class="w-3.5 h-3.5 eye-icon-show" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                                    <svg class="w-3.5 h-3.5 eye-icon-hide hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"/></svg>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-xs font-medium text-slate-700 mb-0.5">Ulangi Password</label>
                            <div class="relative">
                                <input id="password_confirmation" name="password_confirmation" type="password" required class="w-full pl-3 pr-8 py-1.5 bg-white border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#FF2E3A] focus:ring-2 focus:ring-[#FF2E3A]/20 transition-all duration-200" placeholder="Konfirmasi">
                                <button type="button" onclick="togglePasswordVisibility('password_confirmation', this)" class="absolute inset-y-0 right-0 pr-2.5 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none cursor-pointer" title="Lihat konfirmasi password">
                                    <svg class="w-3.5 h-3.5 eye-icon-show" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                                    <svg class="w-3.5 h-3.5 eye-icon-hide hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pt-1">
                        <button type="submit" id="btnRegisterSubmit" class="w-full py-2.5 px-5 rounded-xl font-semibold text-white bg-[#FF2E3A] hover:bg-[#E01E2A] active:bg-[#C71722] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:shadow-[0_6px_20px_rgba(255,46,58,0.35)] text-xs sm:text-sm transition-all duration-200 flex items-center justify-center cursor-pointer">
                            Daftar
                        </button>
                    </div>
                </form>

                <!-- Switch ke Login -->
                <p class="mt-3 text-center text-xs text-slate-500">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-semibold text-[#FF2E3A] hover:text-[#E01E2A] hover:underline transition-colors ml-1">Masuk sekarang</a>
                </p>

                <!-- Footer Ketentuan Layanan (Gaya Sevima) -->
                <p class="mt-2.5 pt-2 border-t border-slate-200/70 text-center text-[10px] text-slate-400 leading-tight">
                    Dengan mendaftar, Anda menyetujui Ketentuan &amp; Kebijakan Privasi SimpulTemu.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function togglePasswordVisibility(inputId, button) {
    const input = document.getElementById(inputId);
    if (!input) return;
    const showIcon = button.querySelector('.eye-icon-show');
    const hideIcon = button.querySelector('.eye-icon-hide');
    if (input.type === 'password') {
        input.type = 'text';
        if (showIcon) showIcon.classList.add('hidden');
        if (hideIcon) hideIcon.classList.remove('hidden');
    } else {
        input.type = 'password';
        if (showIcon) showIcon.classList.remove('hidden');
        if (hideIcon) hideIcon.classList.add('hidden');
    }
}
</script>
@endsection
