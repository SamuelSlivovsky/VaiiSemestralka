const { default: axios } = require("axios");

const inputTries = document.querySelectorAll(".tries-input");
if (inputTries) {
    for (let i = 0; i < inputTries.length; i++) {
        const element = inputTries[i];
        element.addEventListener("input", () => {
            sendToApi(element.dataset.id, element.value);
        });
    }
}

function sendToApi(id, value) {
    axios
        .post("/api/tries", {
            id: parseInt(id),
            tries: parseInt(value),
        })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
}
