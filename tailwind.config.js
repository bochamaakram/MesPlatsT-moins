import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', 'Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    blue: '#1667A8',
                    'blue-hover': '#115392',
                    'blue-dark': '#0F3D63',
                    'blue-light': '#E0F2FE',
                    'blue-muted': '#EBF5FF',
                    green: '#1E7A3C',
                    'green-hover': '#186734',
                    'green-light': '#DCFCE7',
                    'green-muted': '#EBF7EE',
                },
                section: {
                    'light-green': '#EBF7EE',
                    'light-blue': '#EEF6FC',
                    'soft-gray': '#F1F5F9',
                    'soft-gray-deep': '#E2E8F0',
                },
                footer: {
                    bg: '#1B2838',
                    bottom: '#141E2B',
                    border: '#2D3B4E',
                    text: '#94A3B8',
                },
            },
            boxShadow: {
                card: '0 1px 2px 0 rgb(0 0 0 / 0.05)',
                'card-hover': '0 8px 24px -8px rgb(15 23 42 / 0.12), 0 2px 8px -2px rgb(15 23 42 / 0.06)',
                'card-elevated': '0 12px 32px -12px rgb(15 23 42 / 0.14), 0 4px 12px -4px rgb(15 23 42 / 0.08)',
                'glass-card': '0 4px 20px -6px rgb(15 23 42 / 0.10)',
                'glass-strong': '0 8px 32px -8px rgb(15 23 42 / 0.16)',
                'inset-soft': 'inset 0 1px 0 0 rgb(255 255 255 / 0.6)',
                soft: '0 2px 12px -2px rgb(15 23 42 / 0.08)',
                medium: '0 4px 16px -4px rgb(15 23 42 / 0.10)',
            },
            borderRadius: {
                '2xl': '16px',
                '3xl': '20px',
            },
            keyframes: {
                'slide-in-right': {
                    '0%': { transform: 'translateX(100%)', opacity: 0 },
                    '100%': { transform: 'translateX(0)', opacity: 1 },
                },
                'slide-in-left': {
                    '0%': { transform: 'translateX(-100%)', opacity: 0 },
                    '100%': { transform: 'translateX(0)', opacity: 1 },
                },
                'fade-in': {
                    '0%': { opacity: 0, transform: 'translateY(6px)' },
                    '100%': { opacity: 1, transform: 'translateY(0)' },
                },
                'fade-in-scale': {
                    '0%': { opacity: 0, transform: 'scale(0.98)' },
                    '100%': { opacity: 1, transform: 'scale(1)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-6px)' },
                },
                'pulse-soft': {
                    '0%, 100%': { opacity: 1 },
                    '50%': { opacity: 0.85 },
                },
                shimmer: {
                    '0%': { transform: 'translateX(-100%)' },
                    '100%': { transform: 'translateX(100%)' },
                },
            },
            animation: {
                'slide-in-right': 'slide-in-right 0.32s cubic-bezier(0.16,1,0.3,1) forwards',
                'slide-in-left': 'slide-in-left 0.32s cubic-bezier(0.16,1,0.3,1) forwards',
                'fade-in': 'fade-in 0.4s cubic-bezier(0.16,1,0.3,1) forwards',
                'fade-in-scale': 'fade-in-scale 0.3s cubic-bezier(0.16,1,0.3,1) forwards',
                float: 'float 4s ease-in-out infinite',
                'pulse-soft': 'pulse-soft 2s ease-in-out infinite',
                shimmer: 'shimmer 2s infinite',
            },
        },
    },

    plugins: [forms],
};
