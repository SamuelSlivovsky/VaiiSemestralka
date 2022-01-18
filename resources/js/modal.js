var modalEdit = document.getElementById("editModal");
var modalDelete = document.getElementById("deleteModal");
var modalEditTutorial = document.getElementById("editTutorialModal");

var btnEdit = document.getElementById("btnEdit");
var btnDelete = document.getElementById("btnDelete");
var btnEditTutorial = document.getElementById("btnEditTutorial");

var spanEdit = document.getElementById("closeEdit");
var spanDelete = document.getElementById("closeDelete");
var spanEditTutorial = document.getElementById("closeEditTutorial");

if (btnEdit != null) {
    btnEdit.onclick = function () {
        modalEdit.style.display = "block";
    };
}

if (btnDelete != null) {
    btnDelete.onclick = function () {
        modalDelete.style.display = "block";
    };
}

btnEditTutorial.onclick = function () {
    modalEditTutorial.style.display = "block";
};

if (spanEdit != null) {
    spanEdit.onclick = function () {
        modalEdit.style.display = "none";
    };
}

if (spanDelete != null) {
    spanDelete.onclick = function () {
        modalDelete.style.display = "none";
    };
}

if (spanEditTutorial != null) {
    spanEditTutorial.onclick = function () {
        modalEditTutorial.style.display = "none";
    };
}

window.onclick = function (event) {
    if (event.target == modalEdit) {
        modalEdit.style.display = "none";
    }
    if (event.target == modalDelete) {
        modalDelete.style.display = "none";
    }

    if (event.target == modalEditTutorial) {
        modalEditTutorial.style.display = "none";
    }
};
