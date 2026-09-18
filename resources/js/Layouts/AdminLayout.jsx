import React, { useState, useEffect } from 'react';
import { Head, Link, usePage, router } from '@inertiajs/react';
import { useTranslation } from 'react-i18next';
import {
    LayoutDashboard,
    MessageSquare,
    Settings,
    Home,
    LogOut,
    Menu,
    X,
    ChevronDown,
    FileText,
    FolderOpen,
    Sparkles,
} from 'lucide-react';
import LanguageSwitcher from '@/Components/LanguageSwitcher';

export default function AdminLayout({ children, title = '', unreadMessages = 0 }) {
    const { t } = useTranslation();
    const page = usePage();
    const { url } = page;
    const { auth, settings, flash, locale } = page.props;
    const [sidebarOpen, setSidebarOpen] = useState(false);
    const [toastVisible, setToastVisible] = useState(true);
    const [scrolled, setScrolled] = useState(false);

    const displayTitle = title || t('dashboard');
    const message = flash?.success || flash?.error;
    const isError = Boolean(flash?.error);

    useEffect(() => {
        const onScroll = () => setScrolled(window.scrollY > 8);
        window.addEventListener('scroll', onScroll, { passive: true });
        return () => window.removeEventListener('scroll', onScroll);
    }, []);

    // Auto-hide toast after 5s
    useEffect(() => {
        if (!message) return;
        setToastVisible(true);
        const id = setTimeout(() => setToastVisible(false), 5200);
        return () => clearTimeout(id);
    }, [message]);

    const navItems = [
        { label: t('dashboard'), href: `/${locale}/admin`, icon: LayoutDashboard },
        { label: t('pages_cms'), href: `/${locale}/admin/pages`, icon: FileText },
        { label: t('documents'), href: `/${locale}/admin/documents`, icon: FolderOpen },
        {
            label: t('messages'),
            href: `/${locale}/admin/messages`,
            icon: MessageSquare,
            badge: unreadMessages > 0 ? unreadMessages : null,
        },
        { label: t('settings'), href: `/${locale}/admin/settings`, icon: Settings },
    ];

    const logout = () => router.post(`/${locale}/logout`);

    return (
        <div className="min-h-screen bg-section-soft-gray selection:bg-brand-blue selection:text-white" dir={locale === 'ar' ? 'rtl' : 'ltr'}>
            <Head title={displayTitle} />

            {/* Toast — premium with icon + progress */}
            {message && toastVisible && (
                <div className="fixed end-4 top-4 z-[60] w-full max-w-sm animate-slide-in-right" role="alert" aria-live="polite">
                    <div
                        className={`relative overflow-hidden flex items-center justify-between gap-3 rounded-2xl border p-4 shadow-glass-strong backdrop-blur-xl ${
                            isError ? 'border-red-200/60 bg-red-50/95 text-red-700' : 'border-emerald-200/60 bg-white/95 text-slate-800'
                        }`}
                    >
                        {!isError && <span className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-blue to-brand-green" />}
                        <div className="flex items-center gap-3">
                            <span
                                className={`flex h-8 w-8 shrink-0 items-center justify-center rounded-xl text-sm ${
                                    isError ? 'bg-red-100 text-red-600' : 'bg-emerald-100 text-emerald-700'
                                }`}
                            >
                                {isError ? '!' : '✓'}
                            </span>
                            <span className="text-sm font-semibold leading-snug">{message}</span>
                        </div>
                        <button
                            type="button"
                            onClick={() => setToastVisible(false)}
                            className="shrink-0 rounded-lg p-1.5 text-slate-400 hover:bg-black/5 hover:text-slate-600 transition-colors"
                            aria-label={t('close')}
                        >
                            <X className="h-4 w-4" />
                        </button>
                    </div>
                </div>
            )}

            {/* Desktop sidebar — glass + subtle gradient mesh */}
            <aside className="fixed inset-y-0 start-0 z-40 hidden w-64 flex-col border-e border-slate-200/60 bg-white/90 backdrop-blur-2xl lg:flex shadow-soft">
                {/* Subtle mesh glow */}
                <div className="pointer-events-none absolute inset-x-0 top-0 h-40 bg-gradient-to-b from-brand-blue/[0.04] via-transparent to-transparent" />
                <SidebarContent url={url} settings={settings} navItems={navItems} locale={locale} t={t} />
            </aside>

            {/* Mobile sidebar */}
            {sidebarOpen && (
                <div className="fixed inset-0 z-50 lg:hidden">
                    <div
                        className="absolute inset-0 bg-slate-900/30 backdrop-blur-sm transition-opacity animate-fade-in"
                        onClick={() => setSidebarOpen(false)}
                        aria-hidden="true"
                    />
                    <aside className="absolute inset-y-0 start-0 flex w-64 flex-col bg-white/95 shadow-glass-strong ring-1 ring-slate-900/5 backdrop-blur-2xl ltr:animate-slide-in-left rtl:animate-slide-in-right">
                        <SidebarContent
                            url={url}
                            settings={settings}
                            navItems={navItems}
                            onClose={() => setSidebarOpen(false)}
                            locale={locale}
                            t={t}
                        />
                    </aside>
                </div>
            )}

            {/* Main */}
            <div className="flex min-h-screen flex-col lg:ps-64">
                <header
                    className={`sticky top-0 z-30 flex h-16 items-center justify-between gap-4 border-b px-4 sm:px-6 transition-all duration-300 ${
                        scrolled
                            ? 'border-slate-200/60 bg-white/80 backdrop-blur-xl shadow-soft'
                            : 'border-slate-200/40 bg-white/60 backdrop-blur-xl shadow-sm'
                    }`}
                >
                    <div className="flex items-center gap-3">
                        <button
                            type="button"
                            onClick={() => setSidebarOpen(true)}
                            className="rounded-xl p-2 text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors lg:hidden"
                            aria-label={t('menu')}
                        >
                            <Menu className="h-5 w-5" />
                        </button>
                        <div className="flex items-center gap-2.5">
                            <h1 className="text-sm font-extrabold uppercase tracking-widest text-gray-900 sm:text-[15px]">{displayTitle}</h1>
                            <span className="hidden sm:inline-flex items-center gap-1 rounded-full bg-slate-900 px-2 py-0.5 text-[10px] font-bold uppercase tracking-widest text-white">
                                <Sparkles className="h-3 w-3" /> Admin
                            </span>
                        </div>
                    </div>

                    <div className="flex items-center gap-2 sm:gap-3">
                        <LanguageSwitcher />

                        <Link
                            href={`/${locale}/`}
                            className="hidden sm:inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-600 shadow-soft transition-all hover:bg-slate-50 hover:border-slate-300 hover:shadow-medium"
                        >
                            <Home className="h-3.5 w-3.5" />
                            {t('view_site')}
                        </Link>
                        <Link
                            href={`/${locale}/`}
                            className="inline-flex sm:hidden items-center justify-center rounded-xl border border-slate-200 bg-white p-2 text-slate-600 shadow-soft"
                            aria-label={t('view_site')}
                        >
                            <Home className="h-4 w-4" />
                        </Link>

                        <div className="hidden sm:flex items-center gap-2 rounded-xl border border-slate-200 bg-white py-1 pe-2 ps-1.5 shadow-soft">
                            <div className="flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-br from-brand-blue to-brand-blue-hover text-xs font-bold text-white shadow-sm">
                                {(auth.user?.name || 'A').charAt(0).toUpperCase()}
                            </div>
                            <div className="hidden leading-tight xl:block pe-1">
                                <p className="text-xs font-bold text-gray-900 leading-none">{auth.user?.name}</p>
                                <p className="text-[11px] text-slate-500">{auth.user?.email}</p>
                            </div>
                            <ChevronDown className="h-3.5 w-3.5 text-slate-400 hidden xl:block" />
                        </div>

                        <button
                            type="button"
                            onClick={logout}
                            className="inline-flex items-center gap-1.5 rounded-xl bg-slate-900 px-3.5 py-2.5 text-xs font-bold text-white shadow-soft transition-all hover:bg-slate-800 hover:shadow-medium hover:-translate-y-px active:translate-y-0"
                        >
                            <LogOut className="h-3.5 w-3.5" />
                            <span className="hidden sm:inline">{t('logout')}</span>
                        </button>
                    </div>
                </header>

                <main className="flex-1 py-6 sm:py-8 animate-fade-in">
                    <div className="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">{children}</div>
                </main>

                <footer className="border-t border-slate-200/60 bg-white/40 backdrop-blur-sm px-4 py-3 text-center text-[11px] font-medium text-slate-400 sm:px-6">
                    MesPlatsTémoins — Cabinet BEROCERT CONSULTING • {new Date().getFullYear()}
                </footer>
            </div>
        </div>
    );
}

function SidebarContent({ url, settings, navItems, onClose, locale, t }) {
    const logo = settings?.siteLogo || '/images/logo.webp';
    return (
        <>
            <div className="flex h-16 items-center justify-between border-b border-slate-200/60 px-5 backdrop-blur-sm">
                <Link href={`/${locale}/admin`} className="flex items-center gap-3 group">
                    <span className="relative flex h-9 w-9 items-center justify-center rounded-xl bg-white border border-slate-200 shadow-soft group-hover:shadow-medium transition-all">
                        <img src={logo} alt={t('logo_alt')} className="h-7 w-7 rounded-lg object-cover" />
                        <span className="absolute -right-1 -top-1 flex h-3 w-3 items-center justify-center rounded-full bg-brand-green ring-2 ring-white">
                            <span className="h-1.5 w-1.5 rounded-full bg-white animate-pulse-soft" />
                        </span>
                    </span>
                    <div className="leading-tight">
                        <p className="text-sm font-extrabold uppercase tracking-widest text-gray-900 group-hover:text-brand-blue transition-colors">
                            {t('admin')}
                        </p>
                        <p className="text-[11px] font-medium text-slate-500">MesPlatsTémoins</p>
                    </div>
                </Link>
                {onClose && (
                    <button
                        type="button"
                        onClick={onClose}
                        className="rounded-xl p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition-colors"
                        aria-label={t('close')}
                    >
                        <X className="h-5 w-5" />
                    </button>
                )}
            </div>

            <nav className="flex-1 space-y-1.5 overflow-y-auto p-3">
                <p className="px-3 pt-3 pb-2 text-[10px] font-bold uppercase tracking-[0.12em] text-slate-400">{t('menu')}</p>
                {navItems.map((item) => {
                    const Icon = item.icon;
                    const active = url === item.href || (item.href !== `/${locale}/admin` && url.startsWith(item.href));
                    return (
                        <Link
                            key={item.href}
                            href={item.href}
                            onClick={onClose}
                            className={`group flex items-center justify-between gap-2 rounded-xl px-3 py-2.5 text-sm font-semibold transition-all duration-200 ${
                                active
                                    ? 'bg-gradient-to-r from-brand-blue to-brand-blue-hover text-white shadow-md shadow-brand-blue/20 ltr:translate-x-0.5 rtl:-translate-x-0.5'
                                    : 'text-slate-600 hover:bg-slate-100/80 hover:text-slate-900 hover:ltr:translate-x-0.5 hover:rtl:-translate-x-0.5'
                            }`}
                        >
                            <span className="flex items-center gap-3">
                                <span
                                    className={`flex h-8 w-8 items-center justify-center rounded-lg transition-colors ${
                                        active ? 'bg-white/15 text-white' : 'bg-slate-100 text-slate-500 group-hover:bg-white group-hover:text-brand-blue'
                                    }`}
                                >
                                    <Icon className="h-4 w-4" />
                                </span>
                                {item.label}
                            </span>
                            {item.badge != null && (
                                <span className="inline-flex h-5 min-w-5 items-center justify-center rounded-full bg-red-500 px-1.5 text-[11px] font-bold text-white shadow-sm ring-2 ring-white">
                                    {item.badge}
                                </span>
                            )}
                        </Link>
                    );
                })}
            </nav>

            <div className="border-t border-slate-200/60 bg-slate-50/50 p-3">
                <div className="rounded-xl bg-white border border-slate-200/60 p-3 shadow-soft">
                    <p className="text-xs font-semibold text-slate-700 leading-snug flex items-center gap-1.5">
                        <Sparkles className="h-3.5 w-3.5 text-brand-blue" /> {t('admin_panel')}
                    </p>
                    <p className="mt-1 text-[11px] leading-relaxed text-slate-500">{t('admin_panel_sub')}</p>
                </div>
            </div>
        </>
    );
}
