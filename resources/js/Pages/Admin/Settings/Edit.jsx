import React from 'react';
import { useForm, router, usePage } from '@inertiajs/react';
import { useTranslation } from 'react-i18next';
import { Loader2, Save, RotateCcw, User, Footprints, Megaphone } from 'lucide-react';
import AdminLayout from '@/Layouts/AdminLayout';

const inputClass =
    'mt-1.5 w-full rounded-lg border-slate-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder:text-slate-400 shadow-sm transition-all focus:border-brand-blue focus:ring-1 focus:ring-brand-blue/50';

const Field = ({ label, hint }) => (
    <label className="block text-xs font-semibold uppercase tracking-wider text-gray-600">
        {label}
        {hint && <span className="ms-1 font-normal normal-case text-gray-400">— {hint}</span>}
    </label>
);

function SettingsCard({ icon: Icon, title, description, children }) {
    return (
        <section className="relative overflow-hidden rounded-2xl border border-slate-200/60 bg-white shadow-sm">
            <div className="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-brand-blue to-brand-green" />
            <div className="flex items-start gap-3 border-b border-slate-100 px-6 py-4">
                <div className="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-brand-blue/10 text-brand-blue">
                    <Icon className="h-4.5 w-4.5" style={{ width: 18, height: 18 }} />
                </div>
                <div>
                    <h2 className="text-sm font-bold uppercase tracking-wider text-gray-900">{title}</h2>
                    {description && <p className="mt-0.5 text-xs text-slate-500">{description}</p>}
                </div>
            </div>
            <div className="grid gap-5 p-6 sm:grid-cols-2">{children}</div>
        </section>
    );
}

export default function SettingsEdit({ settings }) {
    const { t } = useTranslation();
    const { locale } = usePage().props;
    const { data, setData, put, processing } = useForm({
        contact: settings.contact ?? {},
        footer: settings.footer ?? {},
        banner: settings.banner ?? {},
    });

    const set = (group, key, value) => setData(group, { ...data[group], [key]: value });

    const submit = (e) => {
        e.preventDefault();
        put(`/${locale}/admin/settings`, { preserveScroll: true });
    };

    const reset = () => {
        if (window.confirm(t('confirm_reset'))) {
            router.put(`/${locale}/admin/settings/reset`, {}, { preserveScroll: true });
        }
    };

    return (
        <AdminLayout title={t('settings_title')}>
            <div className="mx-auto max-w-4xl space-y-6 px-4 sm:px-0">
                <div className="flex flex-wrap items-center justify-between gap-3">
                    <p className="text-sm leading-relaxed text-slate-600">{t('settings_desc')}</p>
                    <div className="flex items-center gap-2.5">
                        <button
                            type="button"
                            onClick={reset}
                            className="inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-600 shadow-sm transition-colors hover:bg-slate-50"
                        >
                            <RotateCcw className="h-3.5 w-3.5" />
                            {t('reset')}
                        </button>
                        <button
                            type="button"
                            onClick={submit}
                            disabled={processing}
                            className="inline-flex items-center gap-2 rounded-lg bg-slate-900 px-4 py-2 text-xs font-bold uppercase tracking-wider text-white shadow-sm transition-colors hover:bg-slate-700 disabled:opacity-60"
                        >
                            {processing ? <Loader2 className="h-4 w-4 animate-spin" /> : <Save className="h-4 w-4" />}
                            {t('save')}
                        </button>
                    </div>
                </div>

                <form onSubmit={submit} className="space-y-5">
                    <SettingsCard icon={User} title={t('contact_info')} description={t('contact_info_desc')}>
                        <div className="sm:col-span-2">
                            <Field label={t('entity_name')} hint={t('entity_hint')} />
                            <input
                                type="text"
                                value={data.contact?.entity ?? ''}
                                onChange={(e) => set('contact', 'entity', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                        <div>
                            <Field label={t('email')} />
                            <input
                                type="email"
                                value={data.contact?.email ?? ''}
                                onChange={(e) => set('contact', 'email', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                        <div>
                            <Field label={t('phone_display')} hint={t('phone_display_hint')} />
                            <input
                                type="text"
                                value={data.contact?.phoneDisplay ?? ''}
                                onChange={(e) => set('contact', 'phoneDisplay', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                        <div>
                            <Field label={t('phone_raw')} hint={t('phone_raw_hint')} />
                            <input
                                type="text"
                                value={data.contact?.phoneRaw ?? ''}
                                onChange={(e) => set('contact', 'phoneRaw', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                        <div>
                            <Field label={t('whatsapp')} hint={t('whatsapp_hint')} />
                            <input
                                type="text"
                                value={data.contact?.whatsapp ?? ''}
                                onChange={(e) => set('contact', 'whatsapp', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                        <div>
                            <Field label={t('address')} />
                            <input
                                type="text"
                                value={data.contact?.address ?? ''}
                                onChange={(e) => set('contact', 'address', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                        <div>
                            <Field label={t('services')} hint={t('services_hint')} />
                            <input
                                type="text"
                                value={data.contact?.services ?? ''}
                                onChange={(e) => set('contact', 'services', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                        <div>
                            <Field label={t('hours')} />
                            <input
                                type="text"
                                value={data.contact?.hours ?? ''}
                                onChange={(e) => set('contact', 'hours', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                    </SettingsCard>

                    <SettingsCard icon={Footprints} title={t('footer_section')} description={t('footer_desc')}>
                        <div className="sm:col-span-2">
                            <Field label={t('mission_text')} />
                            <textarea
                                rows={3}
                                value={data.footer?.mission ?? ''}
                                onChange={(e) => set('footer', 'mission', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                        <div className="sm:col-span-2">
                            <Field label={t('newsletter_title')} />
                            <input
                                type="text"
                                value={data.footer?.newsletterTitle ?? ''}
                                onChange={(e) => set('footer', 'newsletterTitle', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                        <div className="sm:col-span-2">
                            <Field label={t('copyright')} />
                            <input
                                type="text"
                                value={data.footer?.copyright ?? ''}
                                onChange={(e) => set('footer', 'copyright', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                    </SettingsCard>

                    <SettingsCard icon={Megaphone} title={t('banner_section')} description={t('banner_desc')}>
                        <div className="sm:col-span-2">
                            <Field label={t('banner_title')} />
                            <input
                                type="text"
                                value={data.banner?.title ?? ''}
                                onChange={(e) => set('banner', 'title', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                        <div className="sm:col-span-2">
                            <Field label={t('banner_text')} />
                            <input
                                type="text"
                                value={data.banner?.text ?? ''}
                                onChange={(e) => set('banner', 'text', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                        <div>
                            <Field label={t('banner_cta')} />
                            <input
                                type="text"
                                value={data.banner?.cta ?? ''}
                                onChange={(e) => set('banner', 'cta', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                        <div>
                            <Field label={t('banner_href')} hint={t('banner_href_hint')} />
                            <input
                                type="text"
                                value={data.banner?.href ?? ''}
                                onChange={(e) => set('banner', 'href', e.target.value)}
                                className={inputClass}
                            />
                        </div>
                    </SettingsCard>
                </form>

                <div className="sticky bottom-4 flex justify-end">
                    <button
                        type="button"
                        onClick={submit}
                        disabled={processing}
                        className="inline-flex items-center gap-2 rounded-lg bg-slate-900 px-6 py-3 text-sm font-bold uppercase tracking-wider text-white shadow-glass-card transition-colors hover:bg-slate-700 disabled:opacity-60"
                    >
                        {processing ? <Loader2 className="h-4 w-4 animate-spin" /> : <Save className="h-4 w-4" />}
                        {t('save_settings')}
                    </button>
                </div>
            </div>
        </AdminLayout>
    );
}
