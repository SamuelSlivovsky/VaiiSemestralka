var x = document.getElementById("myMenu");
var button = document.getElementById("hamburger");
var logButton = document.getElementById("logButton");
var isBlock = false;
button.addEventListener("click", function () {
    x.classList.toggle("responsive");
    button.classList.toggle("active");
    if (!isBlock) {
        logButton.style.display = "block";
        isBlock = true;
    } else {
        logButton.style.display = "none";
        isBlock = false;
    }
});
