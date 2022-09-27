const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['"Metropolis-Regular"', 'nunito', ...defaultTheme.fontFamily.sans],
                heading: ['"Metropolis-Bold"', 'nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'custom-blue': {
                    100: '#006FB4',
                    200: '#0A5AB4',
                    300: '#03356D',
                },
                'custom-red': {
                    100: '#CC0000',
                    200: '#B30000',
                },
                'custom-gray': {
                    100: '#f3f5f5',
                }
            },
            typography: {
                DEFAULT: {
                    css: {
                        h1: {
                            'letter-spacing': '0.025em',
                            'text-transform': 'uppercase',
                            'margin': '0rem',
                        },
                        h2: {
                            'letter-spacing': '0.025em',
                            'text-transform': 'uppercase',
                            'margin-top': '2rem',
                        },
                        h3: {
                            'letter-spacing': '0.025em',
                            'text-transform': 'uppercase',
                            'margin-top': '2rem',
                        },
                        h4: {
                            'letter-spacing': '0.025em',
                            'text-transform': 'uppercase',
                            'line-height': '1.5rem',
                            'margin-top': '2rem',
                            'color': '#006FB4',
                        },
                        a: {
                            color: '#006FB4',
                            '&:hover': {
                                color: '#CC0000!important',
                            },
                        },
                        strong: {
                            'font-family': 'Metropolis-Bold'
                        }

                    },
                },
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('@tailwindcss/aspect-ratio'), require('@tailwindcss/line-clamp')],
};
