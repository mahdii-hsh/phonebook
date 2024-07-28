<!DOCTYPE html>
<html>

<head>
    <title>Create Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/PhoneBook//css//registerUser.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/registerUser.js"></script>
</head>

<body class="bg-light d-flex flex-column">
    <div class="container d-flex align-items-center justify-content-center my-auto">
        <form class="row align-items-center justify-content-center mt-1 main-box  d-flex col-11 col-xl-7 " method="post" action="./registerUser.php">
            <div class="title col-12" style="color:#0082fd;font-size:200%;"><b>Create User</b></div>
            <div class="col-md-6 col-lg-5 mt-1">
                <label for="FName-input" class="form-label">First Name</label>
                <input type="text" class="form-control" id="FName-input" name="fName" required minlength="3">
            </div>

            <div class="col-md-6 col-lg-5 mt-1">
                <label for="LName-input" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="LName-input" name="lName" required minlength="3">
            </div>
            <div class="col-md-6 col-lg-5 mt-1">
                <label for="Address-input" class="form-label">Email</label>
                <input type="text" class="form-control" id="email-input" name="email">
            </div>
            <div class="col-md-6 col-lg-5 mt-1">
                <label for="Username-input" class="form-label">Username</label>
                <input type="text" class="form-control" id="Username-input" name="userName" required minlength="6">
            </div>
            <div class="col-md-6 col-lg-5 mt-1">
                <label for="Password-input" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required minlength="6">
            </div>
            <div class="col-md-6 col-lg-5 mt-1">
                <label for="Password-input" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required minlength="6">
            </div>
            <div class="col-md-10 ms-2" style="display: none;color: red;font-size: xx-small;" id="notEqual">Password and confirmPassword are not equal</div>
            <div class="col-md-6 col-lg-5 mt-2 me-3 d-flex justify-content-center">
                <input type="button" id="create" onclick="send()" class="btn btn-outline-primary" style="border-radius: 15px 3px 15px 3px;" name="Register" value="Create" required>
            </div>
        </form>
    </div>
</body>

<?php
session_start();
include '../db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fName=$_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $userName = base64_encode($_POST['userName']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if($password ==$confirmPassword){
    $password = base64_encode($_POST['password']);
    $sqlI = "INSERT INTO Users(FName,LName,Email,Username,Password) VALUES('$fName','$lName','$email','$userName','$password');";
    dbInsert($sqlI);
    $_SESSION['userName'] = $userName;
    echo '<script> window.location="/PhoneBook//adminpage//adminpage.php"; </script> ';
    }
}
?>