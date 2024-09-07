import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'custom-white': '#F4F9FC',
                'custom-blue': {
                    DEFAULT: '#0f1b61',
                    50: '#e6e7f8',
                    100: '#c1c4ee',
                    200: '#9ba1e4',
                    300: '#747eda',
                    400: '#4e5bd0',
                    500: '#0f1b61',
                    600: '#31367b',
                    700: '#252970',
                    800: '#191c65',
                    900: '#0d0f5a'
                  },
            }
        }
    },

    plugins: [forms],
    darkMode: 'class'
};
