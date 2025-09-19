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
            colors: {
                'primary': '#111111',       // Nuestro Negro Suave
                'secondary': '#1F1F1F',    // Nuestro Gris Oscuro
                'accent': '#C9A959',        // Nuestro Dorado de Acento
                'light-text': '#F5F5F5',    // Nuestro Blanco Roto para texto
            },
            fontFamily: {
                'sans': ['Montserrat', ...defaultTheme.fontFamily.sans],     // Fuente para párrafos
                'serif': ['Cormorant Garamond', 'serif'], // Fuente para títulos
            },
        },
    },

    plugins: [forms],
};
