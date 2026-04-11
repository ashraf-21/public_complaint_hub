document.addEventListener("DOMContentLoaded", function () {
    const table = document.querySelector("table");
    const noData = document.querySelector(".no-data");

    const target = table || noData;

    if (target) {
        target.style.opacity = "0";
        target.style.transform = "translateY(20px)";

        setTimeout(() => {
            target.style.transition = "all 0.5s ease";
            target.style.opacity = "1";
            target.style.transform = "translateY(0)";
        }, 200);
    }
});