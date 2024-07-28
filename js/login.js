const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
    toastTrigger.addEventListener('click', () => {
        const toast = new bootstrap.Toast(toastLiveExample)

        toast.show()
    })
}
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
// {/* <script> window.location="home/mahdii/www/PhoneBook/adminpage/adminpage.php"; </script>; */}
