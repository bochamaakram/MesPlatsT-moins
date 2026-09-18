import React from 'react';
import { Link, usePage } from '@inertiajs/react';
import { useTranslation } from 'react-i18next';
import { MessageSquare, ArrowRight, ArrowLeft, Sparkles, ShieldCheck, TrendingUp, Clock } from 'lucide-react';
import AdminLayout from '@/Layouts/AdminLayout';

const StatCard = ({ icon: Icon, label, value, tone = 'blue', hint }) => {
    const tones = {
        blue: 'bg-brand-blue/10 text-brand-blue ring-brand-blue/15',
        green: 'bg-emerald-50 text-emerald-700 ring-emerald-200',
        amber: 'bg-amber-50 text-amber-600 ring-amber-200',
        red: 'bg-red-50 text-red-600 ring-red-200',
        slate: 'bg-slate-100 text-slate-500 ring-slate-200',
    };
    return (
        <div className="group relative overflow-hidden rounded-2xl border border-slate-200/60 bg-white p-6 shadow-card transition-all duration-300 hover:shadow-card-hover hover:-translate-y-1">
            <div className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-slate-200/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity" />
            <div className="flex items-start justify-between gap-4">
                <div className="flex items-start gap-4">
                    <div className={`flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl ring-1 ${tones[tone]} shadow-soft`}>
                        <Icon className="h-5 w-5" />
                    </div>
                    <div>
                        <p className="text-3xl font-extrabold tracking-tight text-gray-900">{value}</p>
                        <p className="mt-1 text-[11px] font-bold uppercase tracking-widest text-slate-500">{label}</p>
                        {hint && <p className="mt-1 text-xs text-slate-400">{hint}</p>}
                    </div>
                </div>
                {tone === 'blue' && <TrendingUp className="h-4 w-4 text-slate-300 group-hover:text-brand-blue transition-colors" />}
                {tone === 'red' && value > 0 && <span className="h-2 w-2 rounded-full bg-red-500 animate-pulse-soft" />}
            </div>
        </div>
    );
};

export default function Dashboard({ stats }) {
    const { t } = useTranslation();
    const locale = usePage().props.locale;
    const isRtl = locale === 'ar';

    return (
        <AdminLayout title={t('dashboard')} unreadMessages={stats.unreadMessages}>
            <div className="space-y-6">
                {/* Hero — mesh gradient + floating badges */}
                <div className="relative overflow-hidden rounded-3xl border border-slate-200/60 bg-white p-8 shadow-card sm:p-10">
                    <div className="absolute inset-0 bg-gradient-to-br from-brand-blue/[0.06] via-transparent to-brand-green/[0.06]" />
                    <div className="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-brand-blue/10 blur-3xl" />
                    <div className="absolute -left-16 -bottom-16 h-56 w-56 rounded-full bg-brand-green/10 blur-3xl" />
                    <div className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-blue via-brand-blue to-brand-green" />

                    <div className="relative z-10">
                        <span className="inline-flex items-center gap-1.5 rounded-full bg-slate-900 px-3 py-1 text-[11px] font-bold uppercase tracking-widest text-white shadow-soft">
                            <Sparkles className="h-3 w-3" /> MesPlatsTémoins
                        </span>
                        <h2 className="mt-4 text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl flex items-center gap-2">
                            {t('welcome')} <span className="animate-float inline-block">👋</span>
                        </h2>
                        <p className="mt-3 max-w-2xl text-sm leading-relaxed text-slate-600 sm:text-[15px]">{t('welcome_desc')}</p>

                        <div className="mt-3 flex items-center gap-2 text-xs text-slate-500">
                            <span className="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2.5 py-1 font-semibold text-emerald-700 ring-1 ring-emerald-200">
                                <ShieldCheck className="h-3.5 w-3.5" /> HACCP & ISO 22000
                            </span>
                            <span className="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2.5 py-1 font-medium text-slate-600">
                                <Clock className="h-3.5 w-3.5" /> {t('real_time')}
                            </span>
                        </div>

                        <div className="mt-7 flex flex-wrap gap-3">
                            <Link
                                href={`/${locale}/admin/messages`}
                                className="group inline-flex items-center gap-2 rounded-xl bg-slate-900 px-6 py-3 text-xs font-bold uppercase tracking-wider text-white shadow-soft transition-all hover:bg-slate-800 hover:shadow-medium hover:-translate-y-0.5 active:translate-y-0"
                            >
                                <MessageSquare className="h-4 w-4 transition-transform group-hover:scale-110" />
                                {t('view_messages')}
                                {stats.unreadMessages > 0 && (
                                    <span className="ms-1 rounded-full bg-red-500 px-2 py-0.5 text-[11px] font-bold text-white">
                                        {stats.unreadMessages}
                                    </span>
                                )}
                            </Link>
                            <Link
                                href={`/${locale}/admin/settings`}
                                className="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-6 py-3 text-xs font-bold uppercase tracking-wider text-slate-700 shadow-soft transition-all hover:bg-slate-50 hover:border-slate-300 hover:shadow-medium hover:-translate-y-0.5 active:translate-y-0"
                            >
                                {isRtl ? <ArrowLeft className="h-4 w-4" /> : <ArrowRight className="h-4 w-4" />}
                                {t('settings')}
                            </Link>
                        </div>
                    </div>
                </div>

                <div className="grid gap-4 sm:grid-cols-2">
                    <StatCard
                        icon={MessageSquare}
                        label={t('total_messages')}
                        value={stats.messages}
                        tone="blue"
                        hint={stats.messages === 0 ? t('no_inquiries_yet') : t('all_inquiries_received')}
                    />
                    <StatCard
                        icon={MessageSquare}
                        label={t('unread_messages')}
                        value={stats.unreadMessages}
                        tone={stats.unreadMessages > 0 ? 'red' : 'slate'}
                        hint={stats.unreadMessages > 0 ? 'Nécessite une action' : 'Tout est à jour ✓'}
                    />
                </div>
            </div>
        </AdminLayout>
    );
}
