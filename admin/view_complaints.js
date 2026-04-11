document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const table = document.getElementById("complaintTable");
    const rows = table.getElementsByTagName("tr");

    searchInput.addEventListener("keyup", function () {
        const filter = searchInput.value.toLowerCase();

        for (let i = 1; i < rows.length; i++) {
            const idCell = rows[i].getElementsByTagName("td")[0];
            if (idCell) {
                const text = idCell.textContent || idCell.innerText;
                rows[i].style.display = text.toLowerCase().includes(filter) ? "" : "none";
            }
        }
    });
});