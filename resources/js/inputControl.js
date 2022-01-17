var inputGrade = document.getElementById("max-two-chars");
if (inputGrade != null) {
    inputGrade.addEventListener("change", function () {
        if (
            inputGrade.value > 2 ||
            (isNaN(inputGrade.value[0]) &&
                (inputGrade.value[1] != "+" || "-") &&
                inputGrade.value != "") ||
            (isNaN(inputGrade.value[0]) && inputGrade.value != "")
        ) {
            document.getElementById("error-two-chars").innerHTML =
                "Zadali ste nespravnu hodnotu, hodnotu zadavjte v tvare cislo plus znamienko +/- [6 alebo 6+ alebo 6-]";
        } else {
            document.getElementById("error-two-chars").innerHTML = "";
        }
    });
}

var inputTries = document.getElementById("only-numbers");
if (inputTries != null) {
    inputTries.addEventListener("change", function () {
        if (isNaN(inputTries.value)) {
            console.log(isNaN(inputTries.value));
            document.getElementById("error-tries").innerHTML =
                "Zadali ste nespravnu hodnotu, hodnotu zadavjte v tvare cisla";
        } else {
            //console.log(isNaN(inputTries.value));
            document.getElementById("error-tries").innerHTML = "";
        }
    });
}
