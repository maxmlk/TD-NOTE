module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    mode: "jit",
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/forms"),
    ],
}
