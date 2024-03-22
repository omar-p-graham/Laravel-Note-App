import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
              disappear: {
                '0%': { opacity: 0 },
                '10%': { opacity: 1 },
                '50%': { opacity: 0.5 },
                '100%': { opacity: 0, width: 0, height: 0 },
              }
            },
            animation: {
                disappear: 'disappear 3s ease',
            }
        },
    },

    plugins: [forms],
};
