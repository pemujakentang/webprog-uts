/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      spacing: {
        '1/2': '50%',
        '1/3': '33.33%',
        '2/3': '66.66%',
        '1/4': '25%',
        '3/4': '75%',
        '1/5': '20%',
        '3/5': '60%',
        '4/5': '80%',
        '9/10': '90%'
      },
      fontFamily: {
        bebasneueregular: ['Bebas Neue Regular'],
        bungeeregular: ['Bungee']
      },
    },
  },
  plugins: [],
}