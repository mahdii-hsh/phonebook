function visible() {
    document.getElementById('eyeVisible').style.display = "none";
    document.getElementById('eyeInvisible').style.display = "block";
    document.getElementById('password').type = "text";
}
function inVisible() {
    document.getElementById('eyeVisible').style.display = "block";
    document.getElementById('eyeInvisible').style.display = "none";
    document.getElementById('password').type = "password";
}
