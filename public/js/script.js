
const slider = document.getElementById("slider")
const sliderContent = document.getElementById("slidercontent")
const sliderWidth = slider.offsetWidth
const bullets = document.querySelectorAll(".bullets")
const next = document.getElementById("next")
const back = document.getElementById("back")
const arrival = document.getElementById("arrivals")
const scrollAmount = arrival.offsetWidth / 4
const nav = document.getElementById("nav")
const menu = document.getElementById("menu")
const closeMenu = document.getElementById("close")


//toggle menu
menu.addEventListener("click", () => {
  //nav.style.left = "50%"
  nav.style.display = "block"
})
closeMenu.addEventListener("click", () => {
  //nav.style.left = "-50%"
  nav.style.display = "none"
})


//categories dropdown
document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('firstbtn').addEventListener('click', function () {
    const dropdown = this.nextElementSibling;
    dropdown.classList.toggle('hidden');
  });
});

document.addEventListener('DOMContentLoaded', function () {
  document.getElementById("drop").addEventListener('click', function () {
    const dropdown = this.nextElementSibling
    dropdown.classList.toggle('hidden');
  });
});

document.addEventListener('DOMContentLoaded',function() {
    document.getElementById("pro").addEventListener('click', () => {
        document.getElementById("log").classList.toggle("hidden")
    })

    document.getElementById("slider").addEventListener('mouseenter', () => {
        document.getElementById("log").classList.add("hidden")
    })

})






