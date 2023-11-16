/** @type {import('tailwindcss').Config} */
module.exports = {
  // Specify the files to scan for Tailwind CSS classes
  content: ["./src/**/*.{html,js,php}", "./create-your-profile/**/*.{html,js,php}"],
  
  // Customize your theme and extend variants
  theme: {
    variants: {
      extend: {
        backgroundColor: ['hover'],
        textColor: ['hover'],
        translate: ['hover'],
      },
    },
  },
  
  // Include any plugins if needed
  plugins: [],
};
