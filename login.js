document.addEventListener("DOMContentLoaded", function () {
    const message = document.querySelector("p");

    if (message) {
        message.classList.add("message");

        setTimeout(() => {
            message.style.opacity = "0";
            message.style.transition = "0.5s";
        }, 3000);
    }
});