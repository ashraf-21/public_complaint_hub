document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".admin-form");
    const message = document.querySelector(".message");

    form.style.opacity = "0";
    form.style.transform = "translateY(20px)";

    setTimeout(() => {
        form.style.transition = "all 0.5s ease";
        form.style.opacity = "1";
        form.style.transform = "translateY(0)";
    }, 200);

    if (message) {
        setTimeout(() => {
            message.style.transition = "0.5s";
            message.style.opacity = "0";
        }, 3000);
    }
});