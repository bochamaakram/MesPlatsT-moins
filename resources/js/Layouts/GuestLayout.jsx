import React from 'react';
import { Head, Link, usePage } from '@inertiajs/react';
import { useTranslation } from 'react-i18next';
import { ShieldCheck, Sparkles } from 'lucide-react';
import LanguageSwitcher from '@/Components/LanguageSwitcher';

export default function GuestLayout({ title, children }) {
    const { t } = useTranslation();
    const { locale } = usePage().props;

    return (
        <div
            className="relative flex min-h-screen items-center justify-center overflow-hidden bg-section-soft-gray px-4 py-10 selection:bg-brand-blue selection:text-white"
            dir={locale === 'ar' ? 'rtl' : 'ltr'}
        >
            <Head title={title} />

            <div className="absolute end-4 top-4 z-50">
                <LanguageSwitcher />
            </div>

            {/* Premium ambient — larger, softer, animated */}
            <div className="pointer-events-none absolute -top-40 end-0 z-0 h-[420px] w-[420px] rounded-full bg-brand-blue/10 blur-[80px] animate-float" />
            <div className="pointer-events-none absolute -bottom-40 start-0 z-0 h-[420px] w-[420px] rounded-full bg-brand-green/10 blur-[80px] animate-float" style={{ animationDelay: '1.2s' }} />
            <div className="pointer-events-none absolute top-1/2 start-1/2 -translate-x-1/2 -translate-y-1/2 h-[600px] w-[800px] rounded-full bg-gradient-to-r from-brand-blue/[0.04] to-brand-green/[0.04] blur-3xl" />

            <div className="relative z-10 w-full max-w-md animate-fade-in-scale">
                {/* Brand */}
                <div className="mb-8 text-center">
                    <Link href={`/${locale}/`} className="inline-flex flex-col items-center gap-4 group">
                        <span className="relative flex h-20 w-20 items-center justify-center rounded-3xl bg-white border border-slate-200 shadow-card-elevated group-hover:shadow-glass-strong group-hover:-translate-y-0.5 transition-all duration-300">
                            <img src="/images/logo.webp" alt={t('logo_alt')} className="h-14 w-14 rounded-2xl object-cover" />
                            <span className="absolute -right-1 -top-1 flex h-6 w-6 items-center justify-center rounded-full bg-white border border-slate-200 shadow-soft">
                                <ShieldCheck className="h-3.5 w-3.5 text-brand-green" />
                            </span>
                        </span>
                        <div className="leading-tight">
                            <p className="inline-flex items-center gap-1.5 text-sm font-extrabold uppercase tracking-[0.14em] text-gray-900">
                                MesPlatsTémoins <Sparkles className="h-3.5 w-3.5 text-brand-blue" />
                            </p>
                            <p className="mt-1 text-[11px] font-bold uppercase tracking-widest text-slate-500">{title}</p>
                        </div>
                    </Link>
                </div>

                <div className="relative overflow-hidden rounded-3xl border border-slate-200/60 bg-white/95 p-8 shadow-glass-strong backdrop-blur-xl saturate-150 sm:p-9">
                    {/* Top gradient + subtle inner highlight */}
                    <div className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-blue via-brand-blue to-brand-green" />
                    <div className="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/70 to-transparent" />
                    <div className="pointer-events-none absolute inset-0 rounded-3xl ring-1 ring-white/60" />
                    {children}
                </div>

                <p className="mt-6 text-center">
                    <Link
                        href={`/${locale}/`}
                        className="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 underline-offset-4 hover:text-slate-800 hover:underline transition-colors"
                    >
                        {t('back_to_site')}
                    </Link>
                </p>
                <p className="mt-3 text-center text-[11px] text-slate-400">© {new Date().getFullYear()} Cabinet BEROCERT CONSULTING</p>
            </div>
        </div>
    );
}
