import React from 'react';
import { Link, useForm, usePage } from '@inertiajs/react';
import { useTranslation } from 'react-i18next';
import { Loader2, LockKeyhole } from 'lucide-react';
import GuestLayout from '@/Layouts/GuestLayout';

const inputClass =
    'mt-1.5 w-full rounded-lg border-slate-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder:text-slate-400 shadow-sm transition-all focus:border-brand-blue focus:ring-1 focus:ring-brand-blue/50';

export default function Login({ status }) {
    const { t } = useTranslation();
    const { locale } = usePage().props;
    const { data, setData, post, processing, errors, setError } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();
        post(`/${locale}/login`);
    };

    return (
        <GuestLayout title={t('login_title')}>
            <div className="mb-1 text-center">
                <h1 className="text-xl font-extrabold tracking-tight text-gray-900">{t('login_title')}</h1>
                <p className="mt-1 text-sm text-slate-500">{t('login_subtitle')}</p>
            </div>

            {status && (
                <p className="mb-4 mt-5 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-2.5 text-xs font-semibold text-emerald-700">
                    {status}
                </p>
            )}

            <form onSubmit={submit} className="mt-6 space-y-5">
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
                        placeholder="admin@mesplatstemoins.ma"
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
                        autoComplete="current-password"
                        onChange={(e) => {
                            setData('password', e.target.value);
                            setError('password', undefined);
                        }}
                        className={inputClass}
                        placeholder="••••••••"
                    />
                    {errors.password && <p className="mt-1.5 text-xs font-semibold text-red-600">{errors.password}</p>}
                </div>

                <label className="flex items-center gap-2 text-sm text-gray-600">
                    <input
                        type="checkbox"
                        checked={data.remember}
                        onChange={(e) => setData('remember', e.target.checked)}
                        className="h-4 w-4 rounded border-slate-300 text-brand-blue focus:ring-brand-blue"
                    />
                    {t('remember_me')}
                </label>

                <button
                    type="submit"
                    disabled={processing}
                    className="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-slate-900 px-6 py-3 text-sm font-bold uppercase tracking-wider text-white shadow-sm transition-colors hover:bg-slate-700 disabled:opacity-60"
                >
                    {processing ? <Loader2 className="h-4 w-4 animate-spin" /> : <LockKeyhole className="h-4 w-4" />}
                    {t('sign_in')}
                </button>
            </form>

            <p className="mt-6 text-center text-sm text-slate-500">
                {t('no_account')}{' '}
                <Link href={`/${locale}/register`} className="font-bold text-brand-blue underline-offset-2 hover:underline">
                    {t('register_link')}
                </Link>
            </p>
        </GuestLayout>
    );
}
