import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#326273',
                'secondary': '#C2E812',
                'tertiary': '#5C9EAD',
                'success': '#28a745',
                'info': '#17a2b8',
                'warning': '#ffc107',
                'danger': '#dc3545',
                'dark': '#343a40',
                'white': '#EEEEEE',
            }
        },
    },
    plugins: [],
};
