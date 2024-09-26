const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {

    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },

            colors : {
                'custom-blue': {
                    '50': '#edf3ff',
                    '100': '#dee8ff',
                    '200': '#c4d3ff',
                    '300': '#a1b6ff',
                    '400': '#7b8efe',
                    '500': '#5c68f8',
                    '600': '#3737ec', // Original
                    '700': '#3431d1',
                    '800': '#2b2aa9',
                    '900': '#2a2c85',
                    '950': '#19194d',
                },

            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
