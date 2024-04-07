let inputForm = document.querySelector("#inputForm");
inputForm.addEventListener("submit", checkForm);

let dropdowns = document.querySelectorAll(".colorDropdown");

let colorSelected = [];
let lengthValue = parseInt(inputForm.input1.value);
colorSelected.length = lengthValue + 1;
colorSelected.fill(0);

function checkForm(event) {
    inputForm.input1.style.backgroundColor = "#3CBC8D";
    inputForm.input2.style.backgroundColor = "#3CBC8D";

    let value1 = inputForm.input1.value;
    let value2 = inputForm.input2.value;
    let invalidInput1 = "Invalid input. Input should be a number between 1 and 10.";
    let invalidInput2 = "Invalid input. Input should be a number between 1 and 26.";
    let isValid = true;

    if (isNaN(value1) || value1 < 1 || value1 > 10) {
        document.getElementById("errorMessage1").textContent = invalidInput1;
        inputForm.input1.style.backgroundColor = "Red";
        isValid = false;
    }else {
        document.getElementById("errorMessage1").textContent = "";
    }

    if (isNaN(value2) || value2 < 1 || value2 > 26) {
        document.getElementById("errorMessage2").textContent = invalidInput2;
        inputForm.input2.style.backgroundColor = "Red";
        isValid = false;
    }else {
        document.getElementById("errorMessage2").textContent = "";
    }

    if (!isValid) {
        event.preventDefault();
    }
}

dropdowns.forEach(function(dropdown, index) {
    dropdown.addEventListener('change', function(event) {
        let selectedColor = event.target.value;

        colorSelected[parseInt(selectedColor)] = 1;
        
        localStorage.setItem('colorSelected', JSON.stringify(colorSelected));

        dropdowns.forEach(function(dropdownCheck) {
            let options = dropdownCheck.options;
            for (let i = 0; i < options.length; i++) {
                options[i].disabled = colorSelected[i] === 1;
            }
        });
    });
});