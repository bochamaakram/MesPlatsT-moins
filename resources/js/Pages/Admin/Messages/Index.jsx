import React, { useState } from 'react';
import { Link, usePage, router } from '@inertiajs/react';
import { useTranslation } from 'react-i18next';
import { Mail, MailOpen, Trash2, Inbox, ChevronLeft, ChevronRight, Building2, Phone, MapPin } from 'lucide-react';
import AdminLayout from '@/Layouts/AdminLayout';

const LOCALE_MAP = {
    fr: 'fr-FR',
    en: 'en-US',
    ar: 'ar-MA',
};

const ESTABLISHMENT_I18N_KEYS = {
    Restaurant: 'establishment_restaurant',
    Hôtel: 'establishment_hotel',
    Traiteur: 'establishment_traiteur',
    'Cuisine Centrale': 'establishment_cuisine_centrale',
    'Cantine Scolaire': 'establishment_cantine_scolaire',
    'Restauration Hospitalière': 'establishment_restauration_hospitaliere',
    Autre: 'establishment_autre',
};

export default function MessagesIndex({ messages }) {
    const { t } = useTranslation();
    const { locale } = usePage().props;
    const [openId, setOpenId] = useState(null);
    const [filter, setFilter] = useState('all');

    const items = Array.isArray(messages?.data) ? messages.data : [];
    const filtered = filter === 'unread' ? items.filter((m) => !m.read_at) : items;

    const unreadCount = items.filter((m) => !m.read_at).length;

    const toggleRead = (m) => router.patch(`/${locale}/admin/messages/${m.id}/read`, {}, { preserveScroll: true });

    const destroy = (m) => {
        if (window.confirm(t('confirm_delete', { name: m.name }))) {
            router.delete(`/${locale}/admin/messages/${m.id}`, { preserveScroll: true });
        }
    };

    const formatDate = (d) => {
        if (!d) return '';
        const dt = new Date(d);
        return dt.toLocaleString(LOCALE_MAP[locale] || 'fr-FR', {
            day: '2-digit',
            month: 'short',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
        });
    };

    const getEstablishmentLabel = (type) => {
        if (!type) return '';
        const key = ESTABLISHMENT_I18N_KEYS[type];
        return key ? t(key) : type;
    };

    return (
        <AdminLayout title={t('total_messages')} unreadMessages={unreadCount}>
            <div className="mx-auto max-w-4xl space-y-5 px-4 sm:px-0">
                {/* Toolbar */}
                <div className="flex flex-wrap items-center justify-between gap-3">
                    <div className="flex rounded-xl border border-slate-200 bg-white p-1 shadow-sm">
                        {[
                            { value: 'all', label: t('all', { count: items.length }) },
                            { value: 'unread', label: t('unread', { count: unreadCount }) },
                        ].map((item) => (
                            <button
                                key={item.value}
                                type="button"
                                onClick={() => setFilter(item.value)}
                                className={`rounded-lg px-4 py-1.5 text-xs font-bold uppercase tracking-wider transition-colors ${
                                    filter === item.value
                                        ? 'bg-slate-900 text-white shadow-sm'
                                        : 'text-slate-500 hover:bg-slate-50'
                                }`}
                            >
                                {item.label}
                            </button>
                        ))}
                    </div>
                    <p className="text-xs font-medium text-slate-500">
                        {t(filtered.length === 1 ? 'messages_count' : 'messages_count_plural', { count: filtered.length })}
                    </p>
                </div>

                {/* List */}
                {filtered.length === 0 ? (
                    <div className="relative overflow-hidden rounded-2xl border border-slate-200/60 bg-white px-6 py-16 text-center shadow-sm">
                        <div className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-blue to-brand-green" />
                        <Inbox className="mx-auto h-10 w-10 text-slate-300" />
                        <p className="mt-3 text-sm font-semibold text-gray-700">{t('no_messages')}</p>
                        <p className="mt-1 text-xs text-slate-500">{t('no_messages_desc')}</p>
                    </div>
                ) : (
                    <ul className="space-y-3">
                        {filtered.map((m) => {
                            const isOpen = openId === m.id;
                            const isRead = Boolean(m.read_at);
                            return (
                                <li
                                    key={m.id}
                                    className={`overflow-hidden rounded-2xl border bg-white shadow-sm transition-colors ${
                                        isRead ? 'border-slate-200/60' : 'border-brand-blue/30'
                                    }`}
                                >
                                    {/* Header row */}
                                    <button
                                        type="button"
                                        onClick={() => setOpenId(isOpen ? null : m.id)}
                                        className="flex w-full items-center gap-3 px-4 py-3.5 text-start transition-colors hover:bg-slate-50/70"
                                    >
                                        <div
                                            className={`flex h-10 w-10 shrink-0 items-center justify-center rounded-xl ${
                                                isRead ? 'bg-slate-100 text-slate-400' : 'bg-brand-blue text-white shadow-sm'
                                            }`}
                                        >
                                            {isRead ? <MailOpen className="h-5 w-5" /> : <Mail className="h-5 w-5" />}
                                        </div>
                                        <div className="min-w-0 flex-1">
                                            <div className="flex flex-wrap items-center gap-2">
                                                <p className="truncate text-sm font-bold text-gray-900">
                                                    {m.name}
                                                    {!isRead && (
                                                        <span className="ms-2 inline-block h-2 w-2 rounded-full bg-brand-blue align-middle" />
                                                    )}
                                                </p>
                                                <span className="rounded-full bg-brand-blue/10 px-2 py-0.5 text-[10px] font-semibold text-brand-blue">
                                                    {m.subject}
                                                </span>
                                            </div>
                                            <p className="mt-0.5 truncate text-xs text-slate-500">
                                                {m.company}{' '}
                                                {m.establishment_type && `· ${getEstablishmentLabel(m.establishment_type)}`}
                                                {m.city && ` · ${m.city}`}
                                            </p>
                                        </div>
                                        <div className="flex shrink-0 items-center gap-2">
                                            <span className="hidden text-[11px] text-slate-400 sm:block">
                                                {formatDate(m.created_at)}
                                            </span>
                                            <span className="rounded-md text-slate-300">
                                                <ChevronRight
                                                    className={`h-4 w-4 transition-transform ${isOpen ? 'rotate-90' : ''}`}
                                                />
                                            </span>
                                        </div>
                                    </button>

                                    {/* Details */}
                                    {isOpen && (
                                        <div className="border-t border-slate-100 px-4 pt-4 pb-3 sm:px-5">
                                            <div className="grid gap-3 text-xs text-slate-600 sm:grid-cols-2">
                                                <a
                                                    href={`mailto:${m.email}`}
                                                    className="inline-flex items-center gap-2 font-semibold text-brand-blue hover:underline"
                                                >
                                                    <Mail className="h-3.5 w-3.5" />
                                                    {m.email}
                                                </a>
                                                <a
                                                    href={`tel:${m.phone}`}
                                                    className="inline-flex items-center gap-2 font-semibold text-brand-blue hover:underline"
                                                >
                                                    <Phone className="h-3.5 w-3.5" />
                                                    {m.phone}
                                                </a>
                                                {m.company && (
                                                    <span className="inline-flex items-center gap-2">
                                                        <Building2 className="h-3.5 w-3.5 text-slate-400" />
                                                        {m.company}
                                                        {m.city && (
                                                            <span className="inline-flex items-center gap-1 text-slate-400">
                                                                <MapPin className="h-3.5 w-3.5" />
                                                                {m.city}
                                                            </span>
                                                        )}
                                                    </span>
                                                )}
                                            </div>
                                            <p className="mt-4 rounded-xl border border-slate-100 bg-slate-50 px-4 py-3 text-sm leading-relaxed whitespace-pre-wrap text-gray-700">
                                                {m.message}
                                            </p>
                                            <div className="mt-3 flex items-center justify-between">
                                                <button
                                                    type="button"
                                                    onClick={() => toggleRead(m)}
                                                    className="rounded-lg px-3 py-1.5 text-xs font-semibold text-slate-600 transition-colors hover:bg-slate-50"
                                                >
                                                    {isRead ? t('mark_unread') : t('mark_read')}
                                                </button>
                                                <button
                                                    type="button"
                                                    onClick={() => destroy(m)}
                                                    className="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-semibold text-red-600 transition-colors hover:bg-red-50"
                                                >
                                                    <Trash2 className="h-3.5 w-3.5" />
                                                    {t('delete')}
                                                </button>
                                            </div>
                                        </div>
                                    )}
                                </li>
                            );
                        })}
                    </ul>
                )}

                {/* Pagination */}
                {messages?.last_page > 1 && (
                    <div className="flex items-center justify-between rounded-2xl border border-slate-200/60 bg-white px-4 py-3 shadow-sm">
                        <p className="text-xs font-medium text-slate-500">
                            {t('page_of', { current: messages.current_page, total: messages.last_page })}
                        </p>
                        <div className="flex gap-2">
                            <Link
                                href={messages.prev_page_url ?? '#'}
                                className={`inline-flex items-center gap-1 rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold shadow-sm ${
                                    messages.prev_page_url
                                        ? 'bg-white text-slate-600 hover:bg-slate-50'
                                        : 'pointer-events-none opacity-40'
                                }`}
                            >
                                <ChevronLeft className="h-3.5 w-3.5" />
                                {t('previous')}
                            </Link>
                            <Link
                                href={messages.next_page_url ?? '#'}
                                className={`inline-flex items-center gap-1 rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold shadow-sm ${
                                    messages.next_page_url
                                        ? 'bg-white text-slate-600 hover:bg-slate-50'
                                        : 'pointer-events-none opacity-40'
                                }`}
                            >
                                {t('next')}
                                <ChevronRight className="h-3.5 w-3.5" />
                            </Link>
                        </div>
                    </div>
                )}
            </div>
        </AdminLayout>
    );
}
