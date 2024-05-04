import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'redPersonal': '#e74c3c',
                'yellowPersonalLight': '#fcda59',
                'yellowPersonal':'#fdd306',
                'orangePersonal': '#f39c12',
                'greenPersonal': '#18b596',
                'greenPistache': '#88bf48',
                'blueLighterPersonal': '#19c3e3',
                'blueLightPersonal': '#00b3e3',
                'blueDarkPersonal': '#037dbf',
                'grayPersonal':'#3e4f5e',
                'grayDarkerPersonal': '#34485e',
                'purplePersonal': '#9b59b6',
                'pinkPersonal': '#f54789',
                'brownPersonal':'#685723',
                'blackGray':'#343434',
                'softGray':'e5e5e5',
                'semidarkGray':'#c5c3c2',
                'btnGreen':'#2ebc98',

              },
        },

    },

    plugins: [forms],
};
