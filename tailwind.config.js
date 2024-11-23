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
            animation: {
                'slide-left': 'slideLeft 1s ease-out forwards',
                'slide-right': 'slideRight 1s ease-out forwards', // New animation for the image
              },
              keyframes: {
                slideLeft: {
                  '0%': { transform: 'translateX(-100%)', opacity: '0' },
                  '100%': { transform: 'translateX(0)', opacity: '1' },
                },
                slideRight: {
                  '0%': { transform: 'translateX(100%)', opacity: '0' },
                  '100%': { transform: 'translateX(0)', opacity: '1' },
                },
              },
        },
    },

    plugins: [forms],
};
