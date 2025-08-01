module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './vendor/lunarphp/stripe-payments/resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                poiret: ['Poiret One', 'sans-serif'],
            }
        }
    },
    plugins: [require('@tailwindcss/forms')],
};
