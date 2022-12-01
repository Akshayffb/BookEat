const category = document.querySelectorAll(".category");

category.forEach(category => {
    category.addEventListener("click", () => {
        category.classList.toggle("active");
    });
});