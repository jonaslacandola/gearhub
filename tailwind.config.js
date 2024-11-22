/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins, sans"],
                borel: ["Borel, cursive"],
            },
            colors: {
                "primary-orange": "#ff7811",
                "secondary-black": "#1b1b1b",
                "background-light": "#fafafa",
                "accent-gray": "#e8e8e8",
            },
        },
    },
};
