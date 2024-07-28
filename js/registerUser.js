function send() {
    if (document.getElementById('password').value != document.getElementById('confirmPassword').value) {
        document.getElementById('confirmPassword').style.border = '1px solid red';
        document.getElementById('notEqual').style.display = 'flex';
    }
    else {
        document.getElementById('create').type = 'submit';
    }
}