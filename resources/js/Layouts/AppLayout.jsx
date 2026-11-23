import { Link, usePage } from '@inertiajs/react';
import { useState } from 'react';

// Path logo navbar dan footer
const NAVBAR_LOGO = '/images/logo/logo-simpultemu.png';
const FOOTER_LOGO = '/images/logo/logo-simpultemu-dark.png';

export default function AppLayout({ children, auth: propAuth }) {
    const pageProps = usePage()?.props || {};
    const auth = propAuth || pageProps.auth;
    const csrfToken = pageProps?.csrf_token || (typeof document !== 'undefined' ? document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') : '') || '';
    const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

    return (
        <div className="min-h-screen flex flex-col justify-between bg-[#F8FAFC] text-slate-800 font-sans">
            {/* Floating Glassmorphism Navbar (Compact & Sleek) */}
            <header className="fixed top-2 sm:top-3 inset-x-0 z-50 px-3 sm:px-6 lg:px-8 pointer-events-none transition-all duration-300">
                <nav className="max-w-7xl mx-auto pointer-events-auto bg-white/90 backdrop-blur-xl border border-white/70 shadow-[0_8px_30px_rgba(15,23,42,0.08),0_1px_3px_rgba(0,0,0,0.04)] rounded-2xl sm:rounded-full px-3.5 sm:px-5 py-1.5 transition-all duration-300">
                    <div className="flex justify-between items-center h-8 sm:h-9">
                        <div className="flex items-center">
                            <div className="flex-shrink-0 flex items-center">
                                <Link href="/" className="flex items-center focus:outline-none transition-transform duration-300 hover:scale-[1.02]" aria-label="SimpulTemu Beranda">
                                    <img
                                        src={NAVBAR_LOGO}
                                        alt="SimpulTemu"
                                        className="h-6.5 sm:h-7.5 w-auto object-contain"
                                    />
                                </Link>
                            </div>
                            <div className="hidden md:ml-6 lg:ml-8 md:flex items-center space-x-1 lg:space-x-1.5">
                                <NavLink href="/" active={route().current('home')}>Beranda</NavLink>
                                <NavLink href="/tema" active={route().current('themes.*')}>Katalog Tema</NavLink>
                                <NavLink href="/harga" active={route().current('pricing*')}>Harga</NavLink>
                                <NavLink href="/cara-kerja" active={route().current('how-it-works*')}>Cara Kerja</NavLink>
                                <NavLink href="/faq" active={route().current('faq')}>FAQ</NavLink>
                            </div>
                        </div>
                        <div className="hidden md:flex items-center space-x-2.5 lg:space-x-3.5">
                            {auth?.user ? (
                                <>
                                    <form method="POST" action="/logout" className="inline">
                                        {csrfToken && <input type="hidden" name="_token" value={csrfToken} />}
                                        <button type="submit" className="text-slate-600 hover:text-[#FF2E3A] text-xs lg:text-[13px] font-medium px-2.5 py-1 rounded-full hover:bg-slate-100/70 transition-all duration-200 cursor-pointer">
                                            Logout
                                        </button>
                                    </form>
                                    <a href="/dashboard" className="px-4 lg:px-4.5 py-1.5 rounded-full text-white text-xs lg:text-[13px] font-semibold transition-all duration-300 bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:shadow-[0_6px_20px_rgba(255,46,58,0.35)] transform hover:-translate-y-0.5">
                                        Dashboard
                                    </a>
                                </>
                            ) : (
                                <>
                                    <a href="/login" className="text-slate-600 hover:text-[#FF2E3A] text-xs lg:text-[13px] font-medium px-2.5 py-1 rounded-full hover:bg-slate-100/70 transition-all duration-200">
                                        Login
                                    </a>
                                    <a href="/register" className="px-4 lg:px-4.5 py-1.5 rounded-full text-white text-xs lg:text-[13px] font-semibold transition-all duration-300 bg-[#FF2E3A] hover:bg-[#E01E2A] shadow-[0_4px_14px_rgba(255,46,58,0.25)] hover:shadow-[0_6px_20px_rgba(255,46,58,0.35)] transform hover:-translate-y-0.5">
                                        Daftar Sekarang
                                    </a>
                                </>
                            )}
                        </div>
                        <div className="flex items-center md:hidden">
                            <button
                                type="button"
                                onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
                                className="inline-flex items-center justify-center p-1.5 rounded-full text-slate-700 hover:text-[#FF2E3A] hover:bg-slate-100/80 focus:outline-none transition-all duration-200"
                                aria-label="Toggle menu"
                            >
                                {mobileMenuOpen ? (
                                    <svg className="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                ) : (
                                    <svg className="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                )}
                            </button>
                        </div>
                    </div>
                </nav>

                {/* Floating Mobile Dropdown Menu */}
                {mobileMenuOpen && (
                    <div className="md:hidden mt-2 max-w-7xl mx-auto pointer-events-auto bg-white/95 backdrop-blur-2xl border border-slate-200/80 shadow-[0_12px_36px_rgba(0,0,0,0.12)] rounded-2xl p-3 sm:p-4 space-y-2 transition-all duration-300">
                        <div className="space-y-1">
                            <MobileNavLink href="/" active={route().current('home')}>Beranda</MobileNavLink>
                            <MobileNavLink href="/tema" active={route().current('themes.*')}>Katalog Tema</MobileNavLink>
                            <MobileNavLink href="/harga" active={route().current('pricing*')}>Harga</MobileNavLink>
                            <MobileNavLink href="/cara-kerja" active={route().current('how-it-works*')}>Cara Kerja</MobileNavLink>
                            <MobileNavLink href="/faq" active={route().current('faq')}>FAQ</MobileNavLink>
                        </div>
                        <div className="pt-3 mt-2 border-t border-slate-100 space-y-2">
                            {auth?.user ? (
                                <div className="space-y-2">
                                    <a href="/dashboard" className="block text-center px-4 py-2.5 rounded-full text-sm font-semibold text-white bg-[#FF2E3A] hover:bg-[#E01E2A] transition-all duration-300 shadow-[0_4px_14px_rgba(255,46,58,0.25)]">
                                        Dashboard
                                    </a>
                                    <form method="POST" action="/logout">
                                        {csrfToken && <input type="hidden" name="_token" value={csrfToken} />}
                                        <button type="submit" className="block w-full text-center px-3 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-[#FF2E3A] hover:bg-slate-50 transition-all duration-300 cursor-pointer">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            ) : (
                                <div className="space-y-2">
                                    <a href="/login" className="block text-center px-3 py-2 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-50 transition-all duration-300">
                                        Login
                                    </a>
                                    <a href="/register" className="block text-center px-4 py-2.5 rounded-full text-sm font-semibold text-white bg-[#FF2E3A] hover:bg-[#E01E2A] transition-all duration-300 shadow-[0_4px_14px_rgba(255,46,58,0.25)]">
                                        Daftar Sekarang
                                    </a>
                                </div>
                            )}
                        </div>
                    </div>
                )}
            </header>

            <main className="flex-grow">{children}</main>

            <footer className="text-slate-300 bg-[#0F172A] border-t border-slate-800">
                <div className="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 md:grid-cols-4 gap-10">
                        <div className="reveal-init reveal-up delay-100 space-y-4">
                            <Link href="/" className="inline-block focus:outline-none transition-transform duration-300 hover:scale-[1.02]" aria-label="SimpulTemu Beranda">
                                <img src={FOOTER_LOGO} alt="SimpulTemu" className="h-10 sm:h-11 w-auto object-contain" />
                            </Link>
                            <p className="text-sm text-slate-400 font-normal leading-relaxed">
                                Platform undangan digital pernikahan yang modern, berkelas, dan personal. Mengabadikan cinta dalam satu tautan berharga.
                            </p>
                            <div className="pt-2 text-xs text-[#DBF6FF] font-medium">
                                "Bersama dalam Setiap Momen"
                            </div>
                            <div className="flex items-center gap-3 pt-1">
                                <a href="https://instagram.com/simpultemu.my.id" target="_blank" rel="noopener noreferrer" className="w-8 h-8 rounded-full bg-slate-800 hover:bg-[#FF2E3A] text-slate-300 hover:text-white flex items-center justify-center transition-all duration-300" title="Instagram @simpultemu.my.id">
                                    <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                                <a href="https://wa.me/6285113272182" target="_blank" rel="noopener noreferrer" className="w-8 h-8 rounded-full bg-slate-800 hover:bg-[#25D366] text-slate-300 hover:text-white flex items-center justify-center transition-all duration-300" title="WhatsApp 085113272182">
                                    <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                </a>
                                <a href="mailto:simpultemu2026@gmail.com" className="w-8 h-8 rounded-full bg-slate-800 hover:bg-[#FF2E3A] text-slate-300 hover:text-white flex items-center justify-center transition-all duration-300" title="Email simpultemu2026@gmail.com">
                                    <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </a>
                            </div>
                        </div>
                        <div className="reveal-init reveal-up delay-250">
                            <h4 className="font-heading text-base font-semibold text-white mb-4 tracking-wide">Koleksi Desain</h4>
                            <ul className="space-y-2.5 text-sm">
                                <li><a href="/tema" className="hover:text-[#DBF6FF] transition-all duration-300">Katalog Tema Basic & Premium</a></li>
                                <li><a href="/harga" className="hover:text-[#DBF6FF] transition-all duration-300">Paket & Harga</a></li>
                            </ul>
                        </div>
                        <div className="reveal-init reveal-up delay-400">
                            <h4 className="font-heading text-base font-semibold text-white mb-4 tracking-wide">Pusat Bantuan</h4>
                            <ul className="space-y-2.5 text-sm">
                                <li><a href="/cara-kerja" className="hover:text-[#DBF6FF] transition-all duration-300">Alur Cara Kerja</a></li>
                                <li><a href="/faq" className="hover:text-[#DBF6FF] transition-all duration-300">Tanya Jawab (FAQ)</a></li>
                            </ul>
                        </div>
                        <div className="reveal-init reveal-up delay-550">
                            <h4 className="font-heading text-base font-semibold text-white mb-4 tracking-wide">Tentang & Kontak</h4>
                            <ul className="space-y-3 text-sm">
                                <li>
                                    <a href="/tentang-kami" className="hover:text-[#DBF6FF] transition-all duration-300">Visi & Cerita Kami</a>
                                </li>
                                <li>
                                    <a href="mailto:simpultemu2026@gmail.com" className="hover:text-[#DBF6FF] transition-all duration-300 flex items-center gap-2 group">
                                        <svg className="w-4 h-4 text-[#FF2E3A] group-hover:scale-110 transition-transform shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        <span className="truncate">simpultemu2026@gmail.com</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://instagram.com/simpultemu.my.id" target="_blank" rel="noopener noreferrer" className="hover:text-[#DBF6FF] transition-all duration-300 flex items-center gap-2 group">
                                        <svg className="w-4 h-4 text-[#FF2E3A] group-hover:scale-110 transition-transform shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                        <span>simpultemu.my.id</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/6285113272182" target="_blank" rel="noopener noreferrer" className="hover:text-[#DBF6FF] transition-all duration-300 flex items-center gap-2 group">
                                        <svg className="w-4 h-4 text-[#25D366] group-hover:scale-110 transition-transform shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                        </svg>
                                        <span>085113272182</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div className="reveal-init reveal-up delay-700 mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400 gap-4">
                        <p>&copy; {new Date().getFullYear()} SimpulTemu Wedding. Hak Cipta Dilindungi.</p>
                        <div className="flex items-center gap-6 text-slate-400">
                            <span>Eksklusif & Modern</span>
                            <span>•</span>
                            <span>Ramah Mobile</span>
                            <span>•</span>
                            <span>RSVP Terintegrasi</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    );
}

function NavLink({ href, active, children }) {
    const isBladeRoute = href !== '/' && !href.startsWith('#') && !href.startsWith('/#');

    const className = `inline-flex items-center px-3 lg:px-3.5 py-1.5 rounded-full text-xs lg:text-sm font-medium transition-all duration-200 ${
        active
            ? 'text-[#FF2E3A] bg-[#FF2E3A]/10 font-semibold shadow-2xs'
            : 'text-slate-700 hover:text-[#FF2E3A] hover:bg-slate-100/70'
    }`;

    if (isBladeRoute) {
        return (
            <a href={href} className={className}>
                {children}
            </a>
        );
    }

    return (
        <Link href={href} className={className}>
            {children}
        </Link>
    );
}

function MobileNavLink({ href, active, children }) {
    const isBladeRoute = href !== '/' && !href.startsWith('#') && !href.startsWith('/#');

    const className = `block px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 ${
        active
            ? 'bg-[#FF2E3A]/10 text-[#FF2E3A] font-semibold'
            : 'text-slate-700 hover:bg-slate-50 hover:text-[#FF2E3A]'
    }`;

    if (isBladeRoute) {
        return (
            <a href={href} className={className}>
                {children}
            </a>
        );
    }

    return (
        <Link href={href} className={className}>
            {children}
        </Link>
    );
}
