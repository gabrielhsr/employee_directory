var modal = document.getElementById("modal");
var span = document.getElementById("modal_close");


span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function show_modal() {
    modal.style.display = "block";
}