import React, { useState } from 'react';
import { Head, Link, useForm, usePage } from '@inertiajs/react';
import AdminLayout from '@/Layouts/AdminLayout';
import { Save, ArrowLeft, ArrowRight, Plus, Trash2, ChevronDown, ChevronUp } from 'lucide-react';
import { useTranslation } from 'react-i18next';

const fieldInputClass =
    'w-full rounded-lg border-slate-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder:text-slate-400 shadow-sm transition-all focus:border-brand-blue focus:ring-1 focus:ring-brand-blue/50';

function FieldInput({ field, value, onChange }) {
    const { t } = useTranslation();

    if (field.type === 'textarea') {
        return (
            <textarea
                className={fieldInputClass}
                rows={4}
                value={value || ''}
                onChange={(e) => onChange(e.target.value)}
            />
        );
    }

    if (field.type === 'array') {
        const items = Array.isArray(value) ? value : [];
        return (
            <div className="space-y-2">
                {items.map((item, index) => (
                    <div key={index} className="flex gap-2">
                        <input
                            type="text"
                            className={fieldInputClass}
                            value={item}
                            onChange={(e) => {
                                const newItems = [...items];
                                newItems[index] = e.target.value;
                                onChange(newItems);
                            }}
                        />
                        <button
                            type="button"
                            onClick={() => {
                                const newItems = [...items];
                                newItems.splice(index, 1);
                                onChange(newItems);
                            }}
                            className="rounded-lg bg-red-50 p-2.5 text-red-600 transition-colors hover:bg-red-100"
                        >
                            <Trash2 className="h-4 w-4" />
                        </button>
                    </div>
                ))}
                <button
                    type="button"
                    onClick={() => onChange([...items, ''])}
                    className="flex items-center gap-1 text-sm font-semibold text-brand-blue hover:text-brand-blue-hover"
                >
                    <Plus className="h-4 w-4" /> {t('add_item')}
                </button>
            </div>
        );
    }

    return (
        <input
            type="text"
            className={fieldInputClass}
            value={value || ''}
            onChange={(e) => onChange(e.target.value)}
        />
    );
}

function SectionGroup({ section, data, setData }) {
    const { t } = useTranslation();
    const sectionData = data[section.key] || {};

    return (
        <div className="space-y-4">
            {Object.entries(section.fields).map(([fieldKey, field]) => (
                <div key={fieldKey}>
                    <label className="mb-1 block text-xs font-semibold uppercase tracking-wider text-gray-600">
                        {t(field.label)}
                    </label>
                    <FieldInput
                        field={field}
                        value={sectionData[fieldKey]}
                        onChange={(val) => {
                            setData({
                                ...data,
                                [section.key]: {
                                    ...sectionData,
                                    [fieldKey]: val,
                                },
                            });
                        }}
                    />
                </div>
            ))}
            {section.extra &&
                Object.entries(section.extra).map(([fieldKey, field]) => (
                    <div key={fieldKey}>
                        <label className="mb-1 block text-xs font-semibold uppercase tracking-wider text-gray-600">
                            {t(field.label)}
                        </label>
                        <FieldInput
                            field={field}
                            value={sectionData[fieldKey]}
                            onChange={(val) => {
                                setData({
                                    ...data,
                                    [section.key]: {
                                        ...sectionData,
                                        [fieldKey]: val,
                                    },
                                });
                            }}
                        />
                    </div>
                ))}
        </div>
    );
}

function SectionRepeater({ section, data, setData }) {
    const { t } = useTranslation();
    const items = Array.isArray(data[section.key]) ? data[section.key] : [];

    const addItem = () => {
        const newItem = {};
        Object.keys(section.fields).forEach((k) => (newItem[k] = ''));
        setData({
            ...data,
            [section.key]: [...items, newItem],
        });
    };

    const updateItem = (index, fieldKey, val) => {
        const newItems = [...items];
        newItems[index] = { ...newItems[index], [fieldKey]: val };
        setData({ ...data, [section.key]: newItems });
    };

    const removeItem = (index) => {
        const newItems = [...items];
        newItems.splice(index, 1);
        setData({ ...data, [section.key]: newItems });
    };

    const moveItem = (index, direction) => {
        if (direction === -1 && index === 0) return;
        if (direction === 1 && index === items.length - 1) return;
        const newItems = [...items];
        const temp = newItems[index];
        newItems[index] = newItems[index + direction];
        newItems[index + direction] = temp;
        setData({ ...data, [section.key]: newItems });
    };

    return (
        <div className="space-y-6">
            {items.map((item, index) => (
                <div key={index} className="relative rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <div className="absolute end-4 top-4 flex items-center gap-1.5">
                        <button
                            type="button"
                            onClick={() => moveItem(index, -1)}
                            disabled={index === 0}
                            className="rounded-md p-1.5 text-slate-400 transition-colors hover:bg-slate-100 hover:text-slate-700 disabled:opacity-40"
                        >
                            <ChevronUp className="h-4 w-4" />
                        </button>
                        <button
                            type="button"
                            onClick={() => moveItem(index, 1)}
                            disabled={index === items.length - 1}
                            className="rounded-md p-1.5 text-slate-400 transition-colors hover:bg-slate-100 hover:text-slate-700 disabled:opacity-40"
                        >
                            <ChevronDown className="h-4 w-4" />
                        </button>
                        <button
                            type="button"
                            onClick={() => removeItem(index)}
                            className="rounded-md p-1.5 text-red-500 transition-colors hover:bg-red-50 hover:text-red-700"
                        >
                            <Trash2 className="h-4 w-4" />
                        </button>
                    </div>

                    <h4 className="mb-4 text-xs font-bold uppercase tracking-wider text-slate-600">
                        {t('item_number', { count: index + 1 })}
                    </h4>

                    <div className="space-y-4">
                        {Object.entries(section.fields).map(([fieldKey, field]) => (
                            <div key={fieldKey}>
                                <label className="mb-1 block text-xs font-semibold uppercase tracking-wider text-gray-600">
                                    {t(field.label)}
                                </label>
                                <FieldInput
                                    field={field}
                                    value={item[fieldKey]}
                                    onChange={(val) => updateItem(index, fieldKey, val)}
                                />
                            </div>
                        ))}
                    </div>
                </div>
            ))}

            <button
                type="button"
                onClick={addItem}
                className="flex w-full items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-300 bg-white py-4 text-sm font-semibold text-slate-500 shadow-sm transition-colors hover:border-brand-blue hover:bg-brand-blue/5 hover:text-brand-blue"
            >
                <Plus className="h-5 w-5" />
                {t('add_item_to', { section: t(section.label) })}
            </button>
        </div>
    );
}

export default function Edit({ page: dbPage, schema }) {
    const { t } = useTranslation();
    const { locale } = usePage().props;
    const isRtl = locale === 'ar';
    const [activeTab, setActiveTab] = useState('fr');

    const { data, setData, put, processing } = useForm({
        content: dbPage.content || { fr: {}, en: {}, ar: {} },
        slugs: dbPage.slugs || { fr: dbPage.slug, en: dbPage.slug, ar: dbPage.slug },
    });

    const submit = (e) => {
        e.preventDefault();
        put(`/${locale}/admin/pages/${dbPage.slug}`);
    };

    const updateLangContent = (newContent) => {
        setData('content', {
            ...data.content,
            [activeTab]: newContent,
        });
    };

    const updateLangSlug = (newSlug) => {
        setData('slugs', {
            ...data.slugs,
            [activeTab]: newSlug,
        });
    };

    const tabs = [
        { id: 'fr', label: 'Français (FR)', flag: '🇫🇷' },
        { id: 'en', label: 'English (EN)', flag: '🇬🇧' },
        { id: 'ar', label: 'العربية (AR)', flag: '🇸🇦' },
    ];

    return (
        <AdminLayout title={t('edit_page', { name: t(schema.label) })}>
            <Head title={t('edit_page', { name: t(schema.label) })} />

            <form onSubmit={submit} className="mx-auto max-w-4xl px-4 pb-12 sm:px-0">
                <div className="mb-6 flex items-center justify-between">
                    <div className="flex items-center gap-4">
                        <Link
                            href={`/${locale}/admin/pages`}
                            className="rounded-full border border-slate-200 bg-white p-2 text-slate-400 shadow-sm transition-colors hover:bg-slate-50 hover:text-slate-600"
                        >
                            {isRtl ? <ArrowRight className="h-5 w-5" /> : <ArrowLeft className="h-5 w-5" />}
                        </Link>
                        <div>
                            <h1 className="text-2xl font-extrabold text-gray-900">{t(schema.label)}</h1>
                            <p className="text-sm text-slate-500">/{dbPage.slug}</p>
                        </div>
                    </div>
                    <button
                        type="submit"
                        disabled={processing}
                        className="inline-flex items-center gap-2 rounded-lg bg-slate-900 px-5 py-2.5 text-sm font-bold text-white shadow-sm transition-colors hover:bg-slate-700 focus:ring-2 focus:ring-slate-900 focus:ring-offset-2 disabled:opacity-50"
                    >
                        <Save className="h-5 w-5" />
                        {processing ? t('saving') : t('save')}
                    </button>
                </div>

                <div className="mb-6 flex gap-1 rounded-xl border border-slate-200 bg-slate-100/70 p-1 shadow-sm">
                    {tabs.map((tab) => (
                        <button
                            key={tab.id}
                            type="button"
                            onClick={() => setActiveTab(tab.id)}
                            className={`flex w-full items-center justify-center gap-2 rounded-lg py-2.5 text-sm font-semibold transition-all ${
                                activeTab === tab.id
                                    ? 'bg-white text-gray-900 shadow-sm'
                                    : 'text-slate-500 hover:bg-white/60 hover:text-slate-700'
                            }`}
                        >
                            <span>{tab.flag}</span>
                            {tab.label}
                        </button>
                    ))}
                </div>

                <div
                    className="relative mb-8 overflow-hidden rounded-2xl border border-slate-200/60 bg-white p-6 shadow-sm"
                    dir={activeTab === 'ar' ? 'rtl' : 'ltr'}
                >
                    <div className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-blue to-brand-green" />
                    <label className="mb-1 block text-xs font-semibold uppercase tracking-wider text-gray-600">
                        {t('url_for_lang', { lang: t('lang_' + activeTab) })}
                    </label>
                    <div className="flex items-center gap-2">
                        <span className="text-sm text-slate-400">/{activeTab}/</span>
                        <input
                            type="text"
                            className={fieldInputClass}
                            value={data.slugs[activeTab] || ''}
                            onChange={(e) => updateLangSlug(e.target.value)}
                        />
                    </div>
                    <p className="mt-1.5 text-xs text-slate-500">{t('url_hint', { lang: t('lang_' + activeTab) })}</p>
                </div>

                <div className="space-y-5" dir={activeTab === 'ar' ? 'rtl' : 'ltr'}>
                    {schema.sections.map((section) => (
                        <div
                            key={section.key}
                            className="relative overflow-hidden rounded-2xl border border-slate-200/60 bg-white shadow-sm"
                        >
                            <div className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-blue to-brand-green" />
                            <div className="border-b border-slate-100 bg-slate-50/60 px-6 py-4">
                                <h3 className="text-sm font-bold uppercase tracking-wider text-gray-900">
                                    {t(section.label)}
                                </h3>
                            </div>
                            <div className="p-6">
                                {section.type === 'group' ? (
                                    <SectionGroup
                                        section={section}
                                        data={data.content[activeTab] || {}}
                                        setData={updateLangContent}
                                    />
                                ) : (
                                    <SectionRepeater
                                        section={section}
                                        data={data.content[activeTab] || {}}
                                        setData={updateLangContent}
                                    />
                                )}
                            </div>
                        </div>
                    ))}
                </div>
            </form>
        </AdminLayout>
    );
}
