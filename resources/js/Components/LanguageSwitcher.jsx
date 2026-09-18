import React, { useState } from 'react';
import { Globe, ChevronDown } from 'lucide-react';
import { usePage } from '@inertiajs/react';
import { useTranslation } from 'react-i18next';

const FLAGS = { fr: '\uD83C\uDDEB\uD83C\uDDF7', en: '\uD83C\uDDEC\uD83C\uDDE7', ar: '\uD83C\uDDF8\uD83C\uDDE6' };

export default function LanguageSwitcher({ className = '' }) {
    const { t } = useTranslation();
    const { locale } = usePage().props;
    const [langOpen, setLangOpen] = useState(false);

    const languages = [
        { code: 'fr', label: t('lang_fr'), flag: FLAGS.fr },
        { code: 'en', label: t('lang_en'), flag: FLAGS.en },
        { code: 'ar', label: t('lang_ar'), flag: FLAGS.ar },
    ];

    const switchLanguage = (code) => {
        const path = window.location.pathname;
        let newPath;
        if (path.match(/^\/(fr|en|ar)(\/|$)/)) {
            newPath = path.replace(/^\/(fr|en|ar)/, `/${code}`);
        } else {
            // If there's no locale prefix in the URL (e.g. /login), inject it
            newPath = `/${code}${path === '/' ? '' : path}`;
        }
        setLangOpen(false);
        window.location.href = newPath;
    };

    const currentLang = languages.find((l) => l.code === locale) || languages[0];

    return (
        <div className={`relative ${className}`}>
            <button
                type="button"
                onClick={() => setLangOpen(!langOpen)}
                className="inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-700 shadow-sm transition-colors hover:bg-slate-50"
            >
                <Globe className="h-3.5 w-3.5" />
                <span>{currentLang.flag} {currentLang.code.toUpperCase()}</span>
                <ChevronDown className="h-3 w-3" />
            </button>
            {langOpen && (
                <>
                    <div className="fixed inset-0 z-10" onClick={() => setLangOpen(false)} />
                    <div className="absolute end-0 z-20 mt-1 w-40 rounded-lg border border-slate-200 bg-white py-1 shadow-card">
                        {languages.map((lang) => (
                            <button
                                key={lang.code}
                                type="button"
                                onClick={() => switchLanguage(lang.code)}
                                className={`flex w-full items-center gap-2 px-3 py-2 text-xs font-semibold transition-colors ${
                                    locale === lang.code
                                        ? 'bg-brand-blue/10 text-brand-blue'
                                        : 'text-slate-600 hover:bg-slate-50'
                                }`}
                            >
                                <span>{lang.flag}</span>
                                <span>{lang.label}</span>
                            </button>
                        ))}
                    </div>
                </>
            )}
        </div>
    );
}
