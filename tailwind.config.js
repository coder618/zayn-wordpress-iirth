/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./*.php",
        "./inc/**/*.php",
        "./components/**/*.php",
        "./template-parts/**/*.php",
        "./src/js/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primary: "var(--color-primary)",
                secondary: "var(--color-secondary)",
                accent: "var(--color-accent)",
            },
            fontFamily: {
                heading: ["var(--font-heading)", "sans-serif"],
                body: ["var(--font-body)", "sans-serif"],
                accent: ["var(--font-accent)", "sans-serif"],
                signature: ["var(--font-signature)", "cursive"],
                "din-ot": ["var(--font-din-ot)", "sans-serif"],
                brooklyn: ["var(--font-brooklyn)", "sans-serif"],
            },
        },
    },
    corePlugins: {
        container: false,
    },
    plugins: [],
};
