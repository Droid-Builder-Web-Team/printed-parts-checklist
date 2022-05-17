const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix.disableNotifications();

// mix.js("resources/js/app.js", "public/js")
//     .sass("resources/sass/app.scss")
//     .options({
//         postCss: [tailwindcss("./tailwind.config.js")],
//     })

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .options({
        postCss: [tailwindcss("./tailwind.config.js")],
    })
    .version();
