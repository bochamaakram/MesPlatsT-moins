import i18n from 'i18next';
import { initReactI18next } from 'react-i18next';
import LanguageDetector from 'i18next-browser-languagedetector';

import fr from './locales/fr.json';
import en from './locales/en.json';
import ar from './locales/ar.json';

const getLocaleFromUrl = () => {
    const match = window.location.pathname.match(/^\/(fr|en|ar)(\/|$)/);
    return match ? match[1] : 'fr';
};

const getDirFromLocale = (locale) => (locale === 'ar' ? 'rtl' : 'ltr');

const locale = getLocaleFromUrl();

i18n
    .use(LanguageDetector)
    .use(initReactI18next)
    .init({
        resources: {
            fr: { translation: fr },
            en: { translation: en },
            ar: { translation: ar },
        },
        fallbackLng: 'fr',
        lng: locale,
        interpolation: {
            escapeValue: false,
        },
        detection: {
            order: ['path', 'localStorage', 'navigator'],
            lookupFromPathIndex: 1,
        },
    });

i18n.on('languageChanged', (lng) => {
    document.documentElement.lang = lng;
    document.documentElement.dir = getDirFromLocale(lng);
});

document.documentElement.lang = locale;
document.documentElement.dir = getDirFromLocale(locale);

export default i18n;
