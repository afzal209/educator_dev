function startTimer() {
    var presentTime = document.getElementById('countdown').innerHTML;
    var timeArray = presentTime.split(/[:]+/);
    var m = timeArray[0];
    var s = checkSecond((timeArray[1] - 1));
    if (s == 59) { m = m - 1 }
    if (m == 0 && s == 00) { document.getElementById("next").onclick(); }
    document.getElementById('countdown').innerHTML =
        m + ":" + s;
    setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
    if (sec < 10 && sec >= 0) { sec = "0" + sec }; // add zero in front of numbers < 10
    if (sec < 0) { sec = "59" };
    return sec;
    if (sec == 0 && m == 0) { alert('stop it') };
}

$(document).ready(function() {
    startTimer();
});