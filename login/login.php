<?php
session_start();
include '../db.php';
$_SESSION['userName'] = "";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/login.js"></script>
</head>

<body class="bg-light d-flex flex-column">
    <div class="container d-flex align-items-center justify-content-center my-auto">
        <div class="row align-items-center justify-content-center mt-1 main-box d-flex col-9 col-md-8 col-lg-6 col-xl-5 ">
            <div class="col-12 col-sm-11 col-lg-12 d-flex justify-content-center mb-4" style="color:#0082fd;font-size:175%;">
                <b>Login</b>
            </div>
            <form class="col-lg-12" method="post">
                <div class="col-12 d-flex justify-content-start mt-2"><a class="link-offset-2 link-primary link-underline link-underline-opacity-0" href="./registerUser.php"><b>create an account
                        </b></a></div>

                <label for="userName" class="col-12 form-label">username</label>
                <div class="col-lg-12 d-flex justify-content-center  position-relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" id="personIcon" class="bi bi-person position-absolute top-50 end-0 translate-middle-y me-1" style="display: block;" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" id="checkUserIcon" class="bi bi-check-lg  position-absolute top-50 end-0 translate-middle-y me-1" style="display: none; color: green;" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" id="warningUserIcon" class="bi bi-exclamation-circle position-absolute top-50 end-0 translate-middle-y me-2" style="display: none; color: red;" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                    </svg>
                    <input type="text" class="form-control" id="userName" name="userName">
                </div>
                <label for="password" class="form-label">password</label>
                <div class="col-lg-12 d-flex justify-content-center  position-relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" id="eyeVisible" onclick="visible()" class="bi bi-eye position-absolute top-50 end-0 translate-middle-y me-2" style="display: block;" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" id="eyeInvisible" onclick="inVisible()" class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-2" viewBox="0 0 16 16" style="display: none;">
                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                        <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" id="checkPassIcon" class="bi bi-check-lg  position-absolute top-50 end-0 translate-middle-y me-1" style="display: none; color: green;" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" id="warningPassIcon" class="bi bi-exclamation-circle position-absolute top-50 end-0 translate-middle-y me-2" style="display: none; color: rgb(239, 10, 67);" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                    </svg>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <p></p>
                <input type="submit" class="col-5 d-flex justify-content-center btn btn-outline-primary mt-4 mb-4 mx-auto" name="login" style="border-radius: 15px 3px 15px 3px;" value="Login" required>
            </form>
        </div>
    </div>


</body>

<?php
ini_set("erorr_reporting", E_ALL);
if (isset($_POST['userName'])) {
    $userName = base64_encode($_POST['userName']);
    $sqlS = "SELECT * FROM Users WHERE Username='$userName'";
    $dbPassword = dbSelect($sqlS, 'Password');
    echo $userName;

    if (!empty($dbPassword)) {
        $userName = base64_decode($userName);
        echo "<script>document.getElementById('userName').style.border='1px solid green'</script>";
        echo "<script>document.getElementById('userName').value='$userName'</script>";
        echo "<script>document.getElementById('userName').style.color='green'</script>";
        echo "<script>document.getElementById('personIcon').style.display='none'</script>";
        echo "<script>document.getElementById('checkUserIcon').style.display='block'</script>";
        if ($dbPassword == base64_encode($_POST['password'])) {
            $_SESSION['userName'] = base64_encode($userName);
            echo '<script> window.location="../adminpage/adminpage.php"; </script> ';
        } else {
            echo "<script>document.getElementById('password').style.border='1px solid rgb(239, 10, 67)'</script>";
            echo "<script>document.getElementById('warningPassIcon').style.display='block'</script>";
            echo "<script>document.getElementById('eyeVisible').style.display='none'</script>";
            echo "<script>document.getElementById('eyeInvisible').style.display='none'</script>";
            var_dump($dbPassword);
        }
    } else {
        echo "<script>document.getElementById('userName').style.border='1px solid rgb(239, 10, 67)'</script>";
        echo "<script>document.getElementById('warningUserIcon').style.display='block'</script>";
    }
}
?>