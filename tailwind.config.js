/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/*.blade.php",
    "./resources/views/**/*.blade.php",
  ],
  theme: {
    extend: {},
    screens: {
      "xs": '480px',
      'sm': '576px',
      'md': '768px',
      "lg": '992px',
      "xl": '1200px'
  }
  },
  plugins: [],
}
