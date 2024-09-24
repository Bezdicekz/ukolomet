/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        ctprim: '#015f01', // text primární
        ctsec: '#438d43', // text sekundární
        cb1: '#d7ffec', // pozadí 1
        cb2: '#004200', //pozadí 2
        cb3: '#e5fdf3', // pozadí 3
        cbtprim: '#006000', // tlačítko primární
        cbtsec: '#7eaf7e', // tlačítko sekundární
        cbttprim: '#d5d5d5', // tlačítko text primární
        cbttsec: '#015f01', // tlačítko text sekundární
      }
    },
  },
  plugins: [],
}