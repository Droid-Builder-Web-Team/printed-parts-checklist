const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        screens: {
            xs: "360px",
            sm: "575px",
            md: "767px",
            lg: "991px",
            xl: "1199px",
            xxl: "1366px",
            xxxl: "1680px",
            xxxxl: "1920px",
        },
        fontFamily: {
            oswald: ["Oswald", "sans-serif"],
        },
        extend: {
            colors: {
                "dark-blue": "#101430",
                "med-blue": "#218cbe",
                "light-blue": "#33b3d1",
                "med-yellow": "#f7ce0b",
                "med-white": "#fff",
                "light-grey": "#878e88",
                "dark-grey": "#141414",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require('flowbite/plugin'),
    ],
};
