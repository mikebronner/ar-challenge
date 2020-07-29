const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        backgroundColor: ["even", "focus", "hover", "responsive"],
    },
    plugins: [
        require('@tailwindcss/ui'),
        require('@tailwindcss/custom-forms'),
    ],
    purge: {
        enabled: false,
        content: [
            './resources/css/**/*.css',
            './resources/views/**/*.html',
            './resources/js/**/*.js',
            './resources/js/**/*.vue',
        ],
    },
}
