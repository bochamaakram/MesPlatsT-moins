import React, { useRef, useState } from 'react';
import { Head, Link, useForm, usePage } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';
import { Save, ArrowLeft, ArrowRight, Upload, FileText, X, Loader2 } from 'lucide-react';
import { useTranslation } from 'react-i18next';

const inputClass =
    'w-full rounded-lg border-slate-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder:text-slate-400 shadow-sm transition-all focus:border-brand-blue focus:ring-1 focus:ring-brand-blue/50';

export default function DocumentsEdit({ document = null }) {
    const { t } = useTranslation();
    const { locale } = usePage().props;
    const isRtl = locale === 'ar';
    const isEditing = Boolean(document);
    const [selectedName, setSelectedName] = useState('');
    const fileInputRef = useRef(null);

    const { data, setData, post, put, processing, errors } = useForm({
        title: document?.title ?? '',
        category: document?.category ?? '',
        description: document?.description ?? '',
        file: null,
    });

    const submit = (e) => {
        e.preventDefault();
        const url = isEditing ? `/${locale}/admin/documents/${document.id}` : `/${locale}/admin/documents`;

        if (isEditing) {
            put(url);
        } else {
            post(url);
        }
    };

    const onFileChange = (e) => {
        const file = e.target.files?.[0] || null;
        setData('file', file);
        setSelectedName(file ? file.name : '');
        e.target.value = '';
    };

    const backHref = `/${locale}/admin/documents`;

    return (
        <AdminLayout title={isEditing ? t('edit_document') : t('add_document')}>
            <Head title={isEditing ? t('edit_document') : t('add_document')} />

            <form onSubmit={submit} className="mx-auto max-w-3xl px-4 pb-12 sm:px-0">
                <div className="mb-6 flex items-center justify-between">
                    <div className="flex items-center gap-4">
                        <Link
                            href={backHref}
                            className="rounded-full border border-slate-200 bg-white p-2 text-slate-400 shadow-sm transition-colors hover:bg-slate-50 hover:text-slate-600"
                        >
                            {isRtl ? <ArrowRight className="h-5 w-5" /> : <ArrowLeft className="h-5 w-5" />}
                        </Link>
                        <div>
                            <h1 className="text-2xl font-extrabold text-gray-900">
                                {isEditing ? t('edit_document') : t('add_document')}
                            </h1>
                            <p className="text-sm text-slate-500">{t('documents_desc')}</p>
                        </div>
                    </div>
                    <button
                        type="submit"
                        disabled={processing}
                        className="inline-flex items-center gap-2 rounded-lg bg-slate-900 px-5 py-2.5 text-sm font-bold text-white shadow-sm transition-colors hover:bg-slate-700 focus:ring-2 focus:ring-slate-900 focus:ring-offset-2 disabled:opacity-50"
                    >
                        {processing ? <Loader2 className="h-5 w-5 animate-spin" /> : <Save className="h-5 w-5" />}
                        {isEditing ? t('save') : t('save_document')}
                    </button>
                </div>

                <div className="space-y-5">
                    <section className="relative overflow-hidden rounded-2xl border border-slate-200/60 bg-white shadow-sm">
                        <div className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-blue to-brand-green" />
                        <div className="border-b border-slate-100 bg-slate-50/60 px-6 py-4">
                            <h3 className="text-sm font-bold uppercase tracking-wider text-gray-900">{t('document_details')}</h3>
                        </div>
                        <div className="space-y-5 p-6">
                            <div>
                                <label className="mb-1 block text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    {t('document_title')}
                                    <span className="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    className={inputClass}
                                    value={data.title}
                                    onChange={(e) => setData('title', e.target.value)}
                                    placeholder={t('document_title_placeholder')}
                                />
                                {errors.title && <p className="mt-1.5 text-xs font-semibold text-red-600">{errors.title}</p>}
                            </div>

                            <div>
                                <label className="mb-1 block text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    {t('document_category')}
                                </label>
                                <input
                                    type="text"
                                    className={inputClass}
                                    value={data.category}
                                    onChange={(e) => setData('category', e.target.value)}
                                    placeholder={t('document_category_placeholder')}
                                />
                                {errors.category && <p className="mt-1.5 text-xs font-semibold text-red-600">{errors.category}</p>}
                            </div>

                            <div>
                                <label className="mb-1 block text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    {t('document_description')}
                                </label>
                                <textarea
                                    rows={4}
                                    className={inputClass}
                                    value={data.description}
                                    onChange={(e) => setData('description', e.target.value)}
                                    placeholder={t('document_description_placeholder')}
                                />
                                {errors.description && (
                                    <p className="mt-1.5 text-xs font-semibold text-red-600">{errors.description}</p>
                                )}
                            </div>
                        </div>
                    </section>

                    <section className="relative overflow-hidden rounded-2xl border border-slate-200/60 bg-white shadow-sm">
                        <div className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-blue to-brand-green" />
                        <div className="border-b border-slate-100 bg-slate-50/60 px-6 py-4">
                            <h3 className="text-sm font-bold uppercase tracking-wider text-gray-900">{t('document_file_section')}</h3>
                        </div>
                        <div className="p-6">
                            {isEditing && document.url && (
                                <div className="mb-4 flex items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3">
                                    <div className="flex min-w-0 items-center gap-3">
                                        <div className="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-brand-blue/10 text-brand-blue">
                                            <FileText className="h-4.5 w-4.5" style={{ width: 18, height: 18 }} />
                                        </div>
                                        <a
                                            href={document.url}
                                            target="_blank"
                                            rel="noreferrer"
                                            className="truncate text-sm font-semibold text-brand-blue hover:underline"
                                        >
                                            {document.file_name}
                                        </a>
                                    </div>
                                    <span className="shrink-0 text-xs text-slate-500">{document.size_for_humans}</span>
                                </div>
                            )}

                            <input ref={fileInputRef} type="file" className="sr-only" onChange={onFileChange} />

                            <button
                                type="button"
                                onClick={() => fileInputRef.current?.click()}
                                className="flex w-full flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-300 bg-white px-6 py-8 text-center shadow-sm transition-colors hover:border-brand-blue hover:bg-brand-blue/5"
                            >
                                {selectedName ? (
                                    <span className="text-sm font-semibold text-gray-900">{selectedName}</span>
                                ) : (
                                    <>
                                        <Upload className="h-7 w-7 text-brand-blue" />
                                        <span className="text-sm font-semibold text-gray-700">
                                            {t(isEditing ? 'replace_file' : 'choose_file')}
                                        </span>
                                        <span className="text-xs text-slate-500">{t('file_hint')}</span>
                                    </>
                                )}
                            </button>

                            {selectedName && (
                                <button
                                    type="button"
                                    onClick={() => {
                                        setData('file', null);
                                        setSelectedName('');
                                    }}
                                    className="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-slate-500 hover:text-red-600"
                                >
                                    <X className="h-3.5 w-3.5" />
                                    {t('remove_file')}
                                </button>
                            )}

                            {errors.file && <p className="mt-1.5 text-xs font-semibold text-red-600">{errors.file}</p>}
                        </div>
                    </section>
                </div>
            </form>
        </AdminLayout>
    );
}
