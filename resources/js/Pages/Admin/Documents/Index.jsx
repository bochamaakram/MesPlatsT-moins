import React from 'react';
import { Head, Link, router, usePage } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';
import { FileText, Plus, Download, Pencil, Trash2, Inbox, Sparkles } from 'lucide-react';
import { useTranslation } from 'react-i18next';

const EXTENSION_COLORS = {
    pdf: 'bg-red-50 text-red-600 ring-red-200',
    doc: 'bg-blue-50 text-blue-600 ring-blue-200',
    docx: 'bg-blue-50 text-blue-600 ring-blue-200',
    xls: 'bg-emerald-50 text-emerald-700 ring-emerald-200',
    xlsx: 'bg-emerald-50 text-emerald-700 ring-emerald-200',
    ppt: 'bg-orange-50 text-orange-600 ring-orange-200',
    pptx: 'bg-orange-50 text-orange-600 ring-orange-200',
};

export default function DocumentsIndex({ documents }) {
    const { t } = useTranslation();
    const { locale } = usePage().props;

    const destroy = (document) => {
        if (window.confirm(t('confirm_delete_document', { name: document.title }))) {
            router.delete(`/${locale}/admin/documents/${document.id}`, { preserveScroll: true });
        }
    };

    return (
        <AdminLayout title={t('documents_title')}>
            <Head title={t('documents_title')} />

            <div className="space-y-6">
                <div className="flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <h1 className="inline-flex items-center gap-2 text-2xl font-extrabold tracking-tight text-gray-900">
                            <span className="flex h-8 w-8 items-center justify-center rounded-xl bg-brand-blue/10 text-brand-blue">
                                <FileText className="h-4 w-4" />
                            </span>
                            {t('documents_title')}
                        </h1>
                        <p className="mt-1.5 text-sm text-slate-500">{t('documents_desc')}</p>
                    </div>
                    <Link
                        href={`/${locale}/admin/documents/create`}
                        className="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-bold text-white shadow-soft transition-all hover:bg-slate-800 hover:shadow-medium hover:-translate-y-px active:translate-y-0"
                    >
                        <Plus className="h-4 w-4" />
                        {t('add_document')}
                    </Link>
                </div>

                {documents.length === 0 ? (
                    <div className="relative overflow-hidden rounded-2xl border border-slate-200/60 bg-white px-6 py-16 text-center shadow-card">
                        <div className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-blue to-brand-green" />
                        <div className="pointer-events-none absolute inset-0 bg-gradient-to-br from-brand-blue/[0.04] to-transparent" />
                        <span className="relative mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-50 border border-slate-200 text-slate-400 shadow-soft">
                            <Inbox className="h-7 w-7" />
                        </span>
                        <p className="relative mt-4 text-sm font-semibold text-gray-900">{t('no_documents')}</p>
                        <p className="relative mt-1 text-xs text-slate-500 max-w-md mx-auto">{t('no_documents_desc')}</p>
                        <Link
                            href={`/${locale}/admin/documents/create`}
                            className="relative mt-6 inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs font-bold uppercase tracking-wider text-slate-700 shadow-soft hover:bg-slate-50"
                        >
                            <Sparkles className="h-3.5 w-3.5 text-brand-blue" /> {t('add_document')}
                        </Link>
                    </div>
                ) : (
                    <div className="relative overflow-hidden rounded-2xl border border-slate-200/60 bg-white shadow-card">
                        <div className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-blue to-brand-green" />
                        <div className="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/60 to-transparent" />
                        <div className="overflow-x-auto">
                            <table className="w-full text-start text-sm">
                                <thead className="bg-slate-50/70 text-xs uppercase text-slate-500">
                                    <tr>
                                        <th className="px-6 py-4 font-bold uppercase tracking-widest">{t('document_title_col')}</th>
                                        <th className="px-6 py-4 font-bold uppercase tracking-widest">{t('document_category_col')}</th>
                                        <th className="px-6 py-4 font-bold uppercase tracking-widest">{t('document_file_col')}</th>
                                        <th className="px-6 py-4 text-end font-bold uppercase tracking-widest">{t('actions')}</th>
                                    </tr>
                                </thead>
                                <tbody className="divide-y divide-slate-100">
                                    {documents.map((document) => {
                                        const extension = document.file_name.split('.').pop().toLowerCase();
                                        const badge = EXTENSION_COLORS[extension] || 'bg-slate-50 text-slate-600 ring-slate-200';

                                        return (
                                            <tr key={document.id} className="group transition-colors hover:bg-slate-50/60">
                                                <td className="px-6 py-4">
                                                    <div className="flex items-center gap-3">
                                                        <div className="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-blue/10 text-brand-blue ring-1 ring-brand-blue/10 group-hover:bg-brand-blue group-hover:text-white transition-colors">
                                                            <FileText className="h-5 w-5" />
                                                        </div>
                                                        <div>
                                                            <div className="font-semibold text-gray-900">{document.title}</div>
                                                            {document.description && (
                                                                <p className="mt-0.5 max-w-md truncate text-xs text-slate-500">{document.description}</p>
                                                            )}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td className="px-6 py-4">
                                                    {document.category && (
                                                        <span className="inline-flex rounded-full border border-slate-200 bg-slate-50 px-2.5 py-1 text-xs font-medium text-slate-600">
                                                            {document.category}
                                                        </span>
                                                    )}
                                                </td>
                                                <td className="px-6 py-4 whitespace-nowrap">
                                                    <span className={`inline-flex rounded-full px-2.5 py-1 text-xs font-bold uppercase ring-1 ${badge}`}>
                                                        {extension}
                                                    </span>
                                                    <span className="ms-2 text-xs text-slate-500 whitespace-nowrap">{document.size_for_humans}</span>
                                                </td>
                                                <td className="px-6 py-4">
                                                    <div className="flex items-center justify-end gap-1">
                                                        <a
                                                            href={document.url}
                                                            download
                                                            target="_blank"
                                                            rel="noreferrer"
                                                            className="inline-flex items-center gap-1.5 rounded-xl px-3 py-2 text-sm font-semibold text-slate-600 transition-colors hover:bg-slate-100"
                                                        >
                                                            <Download className="h-4 w-4" />
                                                            {t('download')}
                                                        </a>
                                                        <Link
                                                            href={`/${locale}/admin/documents/${document.id}/edit`}
                                                            className="inline-flex items-center gap-1.5 rounded-xl px-3 py-2 text-sm font-semibold text-brand-blue transition-colors hover:bg-brand-blue/5"
                                                        >
                                                            <Pencil className="h-4 w-4" />
                                                            {t('edit')}
                                                        </Link>
                                                        <button
                                                            type="button"
                                                            onClick={() => destroy(document)}
                                                            className="inline-flex items-center gap-1.5 rounded-xl px-3 py-2 text-sm font-semibold text-red-600 transition-colors hover:bg-red-50"
                                                        >
                                                            <Trash2 className="h-4 w-4" />
                                                            {t('delete')}
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        );
                                    })}
                                </tbody>
                            </table>
                        </div>
                    </div>
                )}
            </div>
        </AdminLayout>
    );
}
