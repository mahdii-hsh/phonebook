<?php
session_start();

include '../db.php';
if (empty($_SESSION['userName'])) {
    echo '<script> window.location="../login/login.php"; </script> ';
} else {
    $userName = $_SESSION['userName'];
    $sqlSA = "SELECT * FROM Users  WHERE Username = '$userName';";
    $autoId = dbSelect($sqlSA, 'AutoId');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newFName = $_POST['fName'];
    $newLName = $_POST['lName'];
    $newEmail = $_POST['email'];
    $newUserName = base64_encode($_POST['userName']);
    $newPassword = base64_encode($_POST['password']);
    $sqlU = "UPDATE Users SET FName = '$newFName', LName = '$newLName', Email= '$newEmail', Username = '$newUserName', Password='$newPassword' WHERE AutoId ='$autoId';";
    dbInsert($sqlU);
    $sqlSA2 = "SELECT * FROM Users  WHERE AutoId = '$autoId';";
    $_SESSION['userName'] = "";
    $_SESSION["userName"] = dbSelect($sqlSA2, 'Username');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/adminpage.css">
    <link rel="stylesheet" href="../css//navbar.css">
    <script src="../js/adminpage.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light d-flex flex-column">
    <?php
    include './navbar.php';
    ?>
    <div class="container d-flex align-items-center justify-content-center my-auto">
        <form class="row align-items-center justify-content-center mt-1 main-box d-flex col-9 " method="post" action="./adminpage.php">

            <?php
            $userName = $_SESSION["userName"];
            $sqlS = "SELECT * FROM Users WHERE Username = '$userName';";
            ?>
            <div class="col-12 col-sm-11 col-lg-10 d-flex justify-content-center" style="color:#0082fd;font-size:150%;">
                <b>Information</b>
            </div>
            <div class="col-12 col-sm-11 col-lg-10 ms-1">
                <label for="FName-input" class="form-label " style="font-size: x-small; margin:0;">FName</label>
                <input type="text" class="form-control fName" id="FName-input" name="fName" style="font-size: x-small;" value='<?= dbSelect($sqlS, 'FName') ?>' required minlength="3" disabled>
            </div>
            <div class="col-12 col-sm-11 col-lg-10 ms-1">
                <label for="LName-input" class="form-label" style="font-size: x-small; margin:0;">Last Name</label>
                <input type="text" class="form-control lName" id="LName-input" name="lName" style="font-size: x-small;" value='<?= dbSelect($sqlS, 'LName') ?>' required minlength="3" disabled>
            </div>
            <div class="col-12 col-sm-11 col-lg-10 ms-1">
                <label for="Email-input" class="form-label" style="font-size: x-small; margin:0;">Email</label>
                <input type="email" class="form-control email" id="email-input" name="email" style="font-size: x-small;" value='<?= dbSelect($sqlS, 'Email') ?>' disabled>
            </div>
            <div class="col-12 col-sm-11 col-lg-10 ms-1">
                <label for="Username-input" class="form-label" style="font-size: x-small; margin:0;">UserId</label>
                <input type="text" class="form-control address" id="UserId-input" name="userId" style="font-size: x-small;" value='<?= dbSelect($sqlS, 'AutoId') ?>' required disabled>
            </div>
            <div class="col-12 col-sm-11 col-lg-10 ms-1">
                <label for="UserId-input" class="form-label" style="font-size: x-small; margin:0;">Username</label>
                <input type="text" class="form-control userId" id="Username-input" name="userName" style="font-size: x-small;" value='<?= base64_decode(dbSelect($sqlS, 'Username')) ?>' required minlength="6" disabled>
            </div>
            <div class="col-12 col-sm-11 col-lg-10 ms-1">
                <label for="Password-input" class="form-label" style="font-size: x-small; margin:0;">Password</label>
                <input type="text" class="form-control password" id="Password-input" name="password" style="font-size: x-small;" value='<?= base64_decode(dbSelect($sqlS, 'Password')) ?>' required minlength="6" disabled>
            </div>
            <div class="col-sm-5 col-lg-5 ms-1 d-flex justify-content-center">
                <button type="button" class="btn btn-light mt-3 col-6 col-sm-11 col-lg-5" id="editBtn" onclick="edit()" style="border: 1px solid #0082fd; display: block;border-radius: 15px 3px 15px 3px;">Edit</button>
                <button type="submit" class="btn btn-light mt-3 col-6 col-sm-11 col-lg-5" id="saveBtn" style="border: 1px solid #0082fd;border-radius: 15px 3px 15px 3px; display: none;">Save</button>
            </div>
        </form>
    </div>
</body>

</html>