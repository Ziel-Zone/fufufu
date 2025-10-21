/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        handwriting: ['"Pacifico"', 'cursive'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
