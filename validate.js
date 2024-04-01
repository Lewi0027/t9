let inputForm = document.querySelector("#inputForm");
inputForm.addEventListener("submit", checkForm);

function checkForm(event) {
    inputForm.input1.style.backgroundColor = "LightGreen";
    inputForm.input2.style.backgroundColor = "LightGreen";

    let value1 = inputForm.input1.value;
    let value2 = inputForm.input2.value;

    if (isNaN(value1) || value1 < 1 || value1 > 26) {
        let invalidInput1 = "Invalid input. Input should be a number between 1 and 26.";
        document.getElementById("errorMessage1").textContent = invalidInput1;
        inputForm.input1.style.backgroundColor = "Red";
        event.preventDefault();
    }else {
        document.getElementById("errorMessage1").textContent = invalidInput1;
    }

    if (isNaN(value2) || value2 < 1 || value2 > 10) {
        let invalidInput2 = "Invalid input. Input should be a number between 1 and 10.";
        document.getElementById("errorMessage2").textContent = invalidInput2;
        inputForm.input2.style.backgroundColor = "Red";
        event.preventDefault();
    }else {
        document.getElementById("errorMessage2").textContent = invalidInput2;
    }
}