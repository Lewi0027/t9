function getCurrentDateTime() {
    var currentDate = new Date();

    var minutes = addZero(currentDate.getMinutes());
    var seconds = addZero(currentDate.getSeconds());
    
    var formattedDate = currentDate.getMonth() + 1 + '/' + currentDate.getDate() + '/' + currentDate.getFullYear();
    var hours = currentDate.getHours()

    var formattedTime = hours + ':' + minutes + ':' + seconds;

    return formattedDate + ' at ' + formattedTime;
}

function addZero(number) {
    if (number < 10) {
        number = '0' + number;
    }
    return number;
}

function updateAccessDate() {
    var accessDateElement = document.getElementById('access-date');
    if (accessDateElement) {
        accessDateElement.textContent = 'Accessed on: ' + getCurrentDateTime();
    }
}

window.onload = updateAccessDate;