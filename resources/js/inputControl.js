var inputGrade = document.querySelector(".max-two-chars");
console.log(inputGrade);
for (let i = 0; i < inputGrade.length; i++) {
    const input = inputGrade[i];
    input.addEventListener("change", () => {
        checkGrade(input);
    });
}
function checkGrade(input) {
    if (input.value > 2) {
        console.log("object");
    }
}
