function getCurrentDateTime() {
    var currentDate = new Date();

    var formattedDate = currentDate.getMonth() + 1 + '/' + currentDate.getDate() + '/' + currentDate.getFullYear();
    var formattedTime = currentDate.getHours() + ':' + currentDate.getMinutes() + ':' + currentDate.getSeconds();

    return formattedDate + ' at ' + formattedTime;
}

function updateAccessDate() {
    var accessDateElement = document.getElementById('access-date');
    if (accessDateElement) {
        accessDateElement.textContent = 'Accessed on: ' + getCurrentDateTime();
    }
}

window.onload = updateAccessDate;