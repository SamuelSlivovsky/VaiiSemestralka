var x = document.getElementById("myMenu");
var button = document.getElementById("hamburger");
var logButton = document.getElementById("logButton");
var isBlock = false;
button.addEventListener("click", function () {
    x.classList.toggle("responsive");
    button.classList.toggle("active");
});
