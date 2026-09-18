import React from 'react';
import { Head, Link, usePage } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';
import { FileText, Edit, Layers, Sparkles } from 'lucide-react';
import { useTranslation } from 'react-i18next';

export default function Index({ pages }) {
    const { t } = useTranslation();
    const { locale } = usePage().props;

    return (
        <AdminLayout title={t('pages_title')}>
            <Head title={t('pages_title')} />

            <div className="space-y-6">
                <div className="flex items-end justify-between gap-4">
                    <div>
                        <h1 className="inline-flex items-center gap-2 text-2xl font-extrabold tracking-tight text-gray-900">
                            <span className="flex h-8 w-8 items-center justify-center rounded-xl bg-brand-blue/10 text-brand-blue">
                                <Layers className="h-4 w-4" />
                            </span>
                            {t('pages_title')}
                        </h1>
                        <p className="mt-1.5 text-sm text-slate-500 max-w-xl">{t('pages_desc')}</p>
                    </div>
                    <span className="hidden sm:inline-flex items-center gap-1.5 rounded-full bg-white border border-slate-200 px-3 py-1 text-xs font-semibold text-slate-600 shadow-soft">
                        <Sparkles className="h-3.5 w-3.5 text-brand-blue" /> {pages.length} pages
                    </span>
                </div>

                <div className="relative overflow-hidden rounded-2xl border border-slate-200/60 bg-white shadow-card">
                    <div className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-blue to-brand-green" />
                    <div className="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/60 to-transparent" />

                    {pages.length === 0 ? (
                        <div className="px-6 py-16 text-center">
                            <span className="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                <FileText className="h-6 w-6" />
                            </span>
                            <p className="mt-4 text-sm font-semibold text-gray-900">Aucune page</p>
                            <p className="mt-1 text-xs text-slate-500">Les pages CMS apparaîtront ici une fois créées.</p>
                        </div>
                    ) : (
                        <div className="overflow-x-auto">
                            <table className="w-full text-start text-sm">
                                <thead className="bg-slate-50/70 text-xs uppercase text-slate-500 backdrop-blur-sm">
                                    <tr>
                                        <th className="px-6 py-4 font-bold uppercase tracking-widest">{t('page_title_col')}</th>
                                        <th className="px-6 py-4 font-bold uppercase tracking-widest">{t('page_slug_col')}</th>
                                        <th className="px-6 py-4 font-bold uppercase tracking-widest">{t('page_status_col')}</th>
                                        <th className="px-6 py-4 text-end font-bold uppercase tracking-widest">{t('actions')}</th>
                                    </tr>
                                </thead>
                                <tbody className="divide-y divide-slate-100">
                                    {pages.map((page) => (
                                        <tr key={page.id} className="group transition-colors hover:bg-slate-50/60">
                                            <td className="px-6 py-4">
                                                <div className="flex items-center gap-3">
                                                    <div className="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-blue/10 text-brand-blue ring-1 ring-brand-blue/10 group-hover:bg-brand-blue group-hover:text-white transition-colors">
                                                        <FileText className="h-5 w-5" />
                                                    </div>
                                                    <div className="font-semibold text-gray-900">{page.title}</div>
                                                </div>
                                            </td>
                                            <td className="px-6 py-4">
                                                <span className="inline-flex rounded-full border border-slate-200 bg-slate-50 px-2.5 py-1 text-xs font-medium text-slate-600">
                                                    /{page.slug}
                                                </span>
                                            </td>
                                            <td className="px-6 py-4">
                                                {page.status === 'published' ? (
                                                    <span className="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-emerald-200">
                                                        <span className="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse-soft"></span>
                                                        {t('published')}
                                                    </span>
                                                ) : (
                                                    <span className="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600 ring-1 ring-slate-200">
                                                        <span className="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                                        {t('draft')}
                                                    </span>
                                                )}
                                            </td>
                                            <td className="px-6 py-4 text-end">
                                                <Link
                                                    href={`/${locale}/admin/pages/${page.slug}`}
                                                    className="inline-flex items-center justify-center rounded-xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white shadow-soft transition-all hover:bg-slate-800 hover:shadow-medium hover:-translate-y-px active:translate-y-0"
                                                >
                                                    <Edit className="me-2 h-4 w-4" />
                                                    {t('edit')}
                                                </Link>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    )}
                </div>
            </div>
        </AdminLayout>
    );
}
