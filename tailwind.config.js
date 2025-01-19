import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                Poppins : ['Poppins'],
                Lato : ['Lato']
            },
            colors: {
                primary: {
                  1: "#fe008f",
                  2: "#007bff",
                  3: "#ffd700",
                  4: "#1ec9b8",
                  5: "#00feae",
                  6: "#fe5878",
                  7: "#4A4A4A",
                  8: "#ffc2cd",
                  9: "#897a78",
                  10: "#5e3f41",
                  11: "#dee9f1",
                  12: "#dee9f1"
                },
                secondary: {
                  1: "#FFFFFF",
                  2: "#B76E79",
                  3: "#4A4A4A",
                  4: "#FFC1CC",
                  5: "#D2A6A1",
                  6: "#DAA520",
                  7: "#FFFFF0",
                  8: "#D6C3E6",
                  9: "#002c3e",
                  10: "#e91e63"
                }
              },
              screens: {
                mm : "884px",
                ss : "560px",
                vs: "500px",
                vvs: "430px",
                sss: "390px"
              },

              fontSize: {
                small: "12px"
              },
              width: {
                half: "50vw",
                ninety: "95%",
                eighty: "80vw",
                mini: "30vw",
                fin : "20vw",
                200: "200%",
                thirty: "31.5%",
                twenty: "28%",
                tw: "25vw"

              },
              height: {
                250: "250px",
                eighty: "80vh",
                seventy: "70vh",
                sixty: "60vh",
                fifty: "50vh",
                forty: "40vh",
                thirty: "30vh",
                tht: "33vh",
                custom: "270px",
                hundred: "100vh"
              }
        },
    },

    plugins: [forms, typography],
};
