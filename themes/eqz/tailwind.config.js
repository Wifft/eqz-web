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
            },
            backgroundImage: {
                'noisy-primary': "url('data:image/png;base64,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')"
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
