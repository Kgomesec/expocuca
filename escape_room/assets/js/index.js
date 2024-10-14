const items = document.querySelectorAll('.items-content .item');

items.forEach((item, index) => {
    item.onclick = () => {
        alert(`Você clicou na div ${index + 1}`);
    };
});

const hamburger = document.querySelector(".hamburger");
const nav = document.querySelector(".nav");

hamburger.addEventListener("click", () => nav.classList.toggle("active"));