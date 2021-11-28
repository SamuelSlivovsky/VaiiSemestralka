const { default: axios } = require("axios");

const ascendType = document.querySelectorAll(".ascend-type");
if (ascendType) {
    for (let i = 0; i < ascendType.length; i++) {
        const element = ascendType[i];
        element.addEventListener("change", () => {
            sendToApi(element.dataset.id, element.value);
        });
    }
}

function sendToApi(id, value) {
    axios
        .post("/api/ascendType", {
            id: parseInt(id),
            value: value,
        })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
}
