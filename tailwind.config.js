module.exports = {
    darkMode: false,
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './vendor/lunarphp/stripe-payments/resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                nanum: ['"Nanum Myeongjo"', 'serif'],
            }
        }
    },
    plugins: [require('@tailwindcss/forms')],
};
