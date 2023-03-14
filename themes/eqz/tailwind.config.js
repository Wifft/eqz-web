module.exports = {
    content: [
        './pages/*.js',
        './pages/*.vue',
        './pages/*.htm',
        './pages/**/*.htm',
        './partials/**/*.htm',
        './layouts/*.htm',
        './../../plugins/**/*.htm'
    ],
    theme: {
        extend: {
            colors: {
                'primary': '#010519',
                'primary--translucent': '#010519d9',
                'secondary': '#44c4fd',
                'secondary--translucent': '#44c4fdd9',
                'overlay': 'rgba(88.0,88.0,88.0,0.5)',
                'overlay--v2': 'rgba(192.0,192.0,192.0,0.7)'
            }
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/line-clamp')
    ],
}
