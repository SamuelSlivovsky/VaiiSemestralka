var modalEdit = document.getElementById("editModal");
var modalDelete = document.getElementById("deleteModal");
// Get the button that opens the modal
var btnEdit = document.getElementById("btnEdit");
var btnDelete = document.getElementById("btnDelete");

// Get the <span> element that closes the modal
var spanEdit = document.getElementById("closeEdit");
var spanDelete = document.getElementById("closeDelete");

// When the user clicks the button, open the modal
btnEdit.onclick = function () {
    modalEdit.style.display = "block";
};

btnDelete.onclick = function () {
    modalDelete.style.display = "block";
};
// When the user clicks on <span> (x), close the modal
spanEdit.onclick = function () {
    modalEdit.style.display = "none";
};

spanDelete.onclick = function () {
    modalDelete.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modalEdit) {
        modalEdit.style.display = "none";
    }
    if (event.target == modalDelete) {
        modalDelete.style.display = "none";
    }
};
