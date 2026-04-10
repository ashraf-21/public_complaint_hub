document.getElementById("searchInput").addEventListener("keyup", function () {
    let input = this.value.toLowerCase();
    let table = document.getElementById("complaintTable");
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        let idCell = rows[i].getElementsByTagName("td")[0];

        if (idCell) {
            let idText = idCell.textContent || idCell.innerText;

            if (idText.toLowerCase().indexOf(input) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
});