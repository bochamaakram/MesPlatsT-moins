import React from 'react';
import { Link, useForm, usePage } from '@inertiajs/react';
import { useTranslation } from 'react-i18next';
import { Loader2, UserPlus } from 'lucide-react';
import GuestLayout from '@/Layouts/GuestLayout';

const inputClass =
    'mt-1.5 w-full rounded-lg border-slate-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder:text-slate-400 shadow-sm transition-all focus:border-brand-blue focus:ring-1 focus:ring-brand-blue/50';

export default function Register() {
    const { t } = useTranslation();
    const { locale } = usePage().props;
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post(`/${locale}/register`, {
            onFinish: () => reset('password', 'password_confirmation'),
        });
    };

    return (
        <GuestLayout title={t('register_title')}>
            <div className="mb-1 text-center">
                <h1 className="text-xl font-extrabold tracking-tight text-gray-900">{t('register_title')}</h1>
                <p className="mt-1 text-sm text-slate-500">{t('register_subtitle')}</p>
            </div>

            <form onSubmit={submit} className="mt-6 space-y-5">
                <div>
                    <label htmlFor="name" className="block text-xs font-semibold uppercase tracking-wider text-gray-600">
                        {t('full_name')}
                    </label>
                    <input
                        id="name"
                        type="text"
                        value={data.name}
                        autoComplete="name"
                        onChange={(e) => setData('name', e.target.value)}
                        className={inputClass}
                        placeholder={t('name_placeholder')}
                    />
                    {errors.name && <p className="mt-1.5 text-xs font-semibold text-red-600">{errors.name}</p>}
                </div>

                <div>
                    <label htmlFor="email" className="block text-xs font-semibold uppercase tracking-wider text-gray-600">
                        {t('email_label')}
                    </label>
                    <input
                        id="email"
                        type="email"
                        value={data.email}
                        autoComplete="username"
                        onChange={(e) => setData('email', e.target.value)}
                        className={inputClass}
                        placeholder={t('email_placeholder')}
                    />
                    {errors.email && <p className="mt-1.5 text-xs font-semibold text-red-600">{errors.email}</p>}
                </div>

                <div>
                    <label htmlFor="password" className="block text-xs font-semibold uppercase tracking-wider text-gray-600">
                        {t('password_label')}
                    </label>
                    <input
                        id="password"
                        type="password"
                        value={data.password}
                        autoComplete="new-password"
                        onChange={(e) => setData('password', e.target.value)}
                        className={inputClass}
                        placeholder={t('min_8_chars')}
                    />
                    {errors.password && <p className="mt-1.5 text-xs font-semibold text-red-600">{errors.password}</p>}
                </div>

                <div>
                    <label
                        htmlFor="password_confirmation"
                        className="block text-xs font-semibold uppercase tracking-wider text-gray-600"
                    >
                        {t('confirm_password')}
                    </label>
                    <input
                        id="password_confirmation"
                        type="password"
                        value={data.password_confirmation}
                        autoComplete="new-password"
                        onChange={(e) => setData('password_confirmation', e.target.value)}
                        className={inputClass}
                        placeholder="••••••••"
                    />
                </div>

                <button
                    type="submit"
                    disabled={processing}
                    className="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-slate-900 px-6 py-3 text-sm font-bold uppercase tracking-wider text-white shadow-sm transition-colors hover:bg-slate-700 disabled:opacity-60"
                >
                    {processing ? <Loader2 className="h-4 w-4 animate-spin" /> : <UserPlus className="h-4 w-4" />}
                    {t('sign_up')}
                </button>
            </form>

            <p className="mt-6 text-center text-sm text-slate-500">
                {t('already_registered')}{' '}
                <Link href={`/${locale}/login`} className="font-bold text-brand-blue underline-offset-2 hover:underline">
                    {t('sign_in_link')}
                </Link>
            </p>
        </GuestLayout>
    );
}
