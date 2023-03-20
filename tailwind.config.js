/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/*.blade.php", 
    "./chirper-html/*.html"
  ],
  theme: {
    extend: {},
    screens: {
      "lg": '992px'
    }
  },
  plugins: [],
}
