module.exports = {
    purge: [
        "./resources/views/**/*.html",
        "./resources/css/**/*.css",
        "./resources/js/**/*.vue",
        "./resources/js/**/*.js"
    ],
    theme: {},
    variants: {},
    plugins: [
        require("@tailwindcss/ui"),
    ],
};
