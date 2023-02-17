const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    safelist: [
        {
            pattern: /(bg|text|ring|border(-[btlr])?|fill|via)-(blue|emerald|violet|stone|cyan|lime|orange|pink|gray)-(50|[1-9]00)/ ,
            variants: ['lg', 'hover', 'focus'],
        },
        {
            pattern: /col-start-\d/,
            variants: ['sm', 'md', 'lg'],
        }
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                nova: ['Proxima Nova', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('tailwind-scrollbar-hide'),
        require('@tailwindcss/line-clamp'),
    ],
};
