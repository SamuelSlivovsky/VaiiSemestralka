var inputGrade = document.getElementById("max-two-chars");
var btn = document.getElementById("submit-button");
if (inputGrade != null) {
    inputGrade.addEventListener("change", function () {
        console.log(inputGrade.value);
        if (inputGrade.value[2] != null) {
            document.getElementById("error-two-chars").innerHTML =
                "Zadali ste nespravnu hodnotu, hodnotu zadavjte v tvare cislo plus znamienko +/- [6 alebo 6+ alebo 6-]";
            btn.disabled = true;
        } else if (
            (isNaN(inputGrade.value[0]) &&
                (inputGrade.value[1] != "+" || "-") &&
                inputGrade.value != "") ||
            (isNaN(inputGrade.value[0]) && inputGrade.value != "")
        ) {
            document.getElementById("error-two-chars").innerHTML =
                "Zadali ste nespravnu hodnotu, hodnotu zadavjte v tvare cislo plus znamienko +/- [6 alebo 6+ alebo 6-]";
            btn.disabled = true;
        } else {
            document.getElementById("error-two-chars").innerHTML = "";
            btn.disabled = false;
        }
    });
}

var inputTries = document.getElementById("only-numbers");
if (inputTries != null) {
    inputTries.addEventListener("change", function () {
        if (isNaN(inputTries.value)) {
            document.getElementById("error-tries").innerHTML =
                "Zadali ste nespravnu hodnotu, hodnotu zadavjte v tvare cisla";
            btn.disabled = true;
        } else {
            document.getElementById("error-tries").innerHTML = "";
            btn.disabled = false;
        }
    });
}
