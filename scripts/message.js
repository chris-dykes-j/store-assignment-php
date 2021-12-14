
function displayMessage() {
    var date = new Date();
    var hour = date.getHours();
    var message;
    if (hour >= 6 && hour < 12) {
        message = "Good Morning Sunshine!";
    }
    else if (hour >=12 && hour < 18) {
        message = "Good Afternoon!";
    }
    else if (hour >= 18 && hour < 24) {
        message = "Good Evening!";
    }
    else {
        message = "Good Morning, you must be an early bird!";
    }
    var paragraph = document.getElementById("time");
    paragraph.textContent += message;
}

displayMessage();