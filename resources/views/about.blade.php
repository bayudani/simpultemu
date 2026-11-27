@extends('layouts.app')

@section('title', 'Tentang SimpulTemu - Platform Undangan Pernikahan Digital Modern')
@section('description', 'Mengenal SimpulTemu, platform pembuatan undangan pernikahan digital online yang membantu calon pengantin membuat dan membagikan undangan elegan secara praktis.')
@section('keywords', 'tentang simpultemu, platform undangan pernikahan digital, website undangan pernikahan indonesia, undangan online praktis, simpultemu')

@section('content')
<div class="relative pt-24 sm:pt-32 pb-12 bg-white overflow-hidden">
    @include('partials.side-diamond-ornament')

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">
                Tentang SimpulTemu
            </h1>
            <p class="mt-4 text-xl text-gray-500">
                Bersama dalam Setiap Momen
            </p>
        </div>

        <div class="mt-12 prose prose-lg max-w-none">
            <p class="text-lg text-gray-700 leading-relaxed">
                SimpulTemu adalah platform undangan digital pernikahan yang dirancang untuk membantu pasangan menciptakan undangan yang elegan, personal, dan mudah dibagikan.
            </p>

            <p class="text-lg text-gray-700 leading-relaxed mt-6">
                Kami percaya bahwa setiap pernikahan adalah momen istimewa yang layak dirayakan dengan cara yang berkesan. Melalui SimpulTemu, kami ingin membuat proses pembuatan dan penyebaran undangan menjadi lebih mudah, efisien, dan menyenangkan.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mt-12">Misi Kami</h2>
            <p class="text-lg text-gray-700 leading-relaxed">
                Memberikan solusi undangan digital yang tidak hanya cantik secara visual, tetapi juga praktis dan personal untuk setiap pasangan yang akan menikah.
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mt-12">Mengapa SimpulTemu?</h2>
            <ul class="space-y-4 text-lg text-gray-700">
                <li>
                    <strong>Desain Profesional:</strong> Tema dirancang oleh desainer berpengalaman dengan perhatian pada detail dan estetika.
                </li>
                <li>
                    <strong>Personal untuk Setiap Tamu:</strong> Sistem link personal memastikan setiap tamu merasa diundang secara khusus.
                </li>
                <li>
                    <strong>Mudah Digunakan:</strong> Interface yang intuitif membuat siapa saja dapat membuat undangan tanpa perlu skill teknis.
                </li>
                <li>
                    <strong>Ramah Lingkungan:</strong> Undangan digital mengurangi penggunaan kertas dan lebih ramah lingkungan.
                </li>
                <li>
                    <strong>Hemat Biaya:</strong> Gratis untuk fitur lengkap, atau upgrade ke Premium dengan harga terjangkau.
                </li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 mt-12 mb-4">Hubungi Kami</h2>
            <p class="text-lg text-gray-700 leading-relaxed mb-6">
                Ada pertanyaan, kerjasama, atau masukan untuk SimpulTemu? Tim kami selalu senang mendengar dari Anda.
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 not-prose">
                <a href="mailto:simpultemu2026@gmail.com" class="flex items-center gap-4 p-5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-[#FF2E3A] hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-[#DBF6FF] text-[#FF2E3A] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-xs uppercase font-semibold text-slate-400 tracking-wider">Email Resmi</span>
                        <p class="text-sm font-semibold text-slate-900 group-hover:text-[#FF2E3A] transition-colors truncate">simpultemu2026@gmail.com</p>
                    </div>
                </a>

                <a href="https://instagram.com/simpultemu.my.id" target="_blank" rel="noopener noreferrer" class="flex items-center gap-4 p-5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-[#FF2E3A] hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-[#FFE4E6] text-[#FF2E3A] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-xs uppercase font-semibold text-slate-400 tracking-wider">Instagram</span>
                        <p class="text-sm font-semibold text-slate-900 group-hover:text-[#FF2E3A] transition-colors truncate">simpultemu.my.id</p>
                    </div>
                </a>

                <a href="https://wa.me/6285113272182" target="_blank" rel="noopener noreferrer" class="flex items-center gap-4 p-5 rounded-2xl bg-slate-50 border border-slate-200 hover:border-[#25D366] hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-[#DCFCE7] text-[#25D366] flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-xs uppercase font-semibold text-slate-400 tracking-wider">WhatsApp</span>
                        <p class="text-sm font-semibold text-slate-900 group-hover:text-[#25D366] transition-colors truncate">085113272182</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
