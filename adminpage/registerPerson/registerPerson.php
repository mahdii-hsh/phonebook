<?php
session_start();
include '../db.php';
if (empty($_SESSION['userName'])) {
    echo '<script> window.location="../../login/login.php"; </script> ';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/registerPerson.css">
</head>

<body class="bg-light d-flex flex-column">

    <div class="container d-flex align-items-center justify-content-center my-auto">
        <form class="row align-items-center justify-content-center mt-5 main-box d-flex col-11 col-md-10 col-lg-8" method="post" action="./addNumber.php" enctype="multipart/form-data">
            <div class="title col-12"><b>PhoneBook</b></div>
            <div class="col-6 col-sm-5 mt-1">
                <label for="FName-input" class="form-label">First Name</label>
                <input type="text" class="form-control" id="FName-input" name="FName" required  maxlength="6" minlength="3">
            </div>
            <div class="col-6 col-sm-5 mt-1">
                <label for="LName-input" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="LName-input" name="LName" required minlength="3">
            </div>
            <div class="col-6 col-sm-3 mt-1">
                <label for="Birth-input" class="form-label">BirthDate</label>
                <input type="date" class="form-control" id="Birth-input" name="BirthDate">
            </div>
            <div class="col-6 col-sm-7 mt-1">
                <label for="Address-input" class="form-label">Address</label>
                <input type="text" class="form-control" id="Address-input" name="Address">
            </div>
            <div class="col-6 col-sm-4 mt-1">
                <label for="Address-input" class="form-label d-block m-0">Sex</label>
                <div class="form-check form-check-inline me-1">
                    <label class="form-check-label" for="inlineRadio1">male</label>
                    <input class="form-check-input" type="radio" name="JobTitle" id="inlineRadio1" value="2" required>
                </div>
                <div class="form-check form-check-inline me-1">
                    <label class="form-check-label" for="inlineRadio2">famale</label>
                    <input class="form-check-input" type="radio" name="JobTitle" id="inlineRadio2" value="2" required>
                </div>
            </div>
            <div class="col-6 col-sm-6 mt-1">
                <label for="groups" class="form-label">GroupId</label>
                <select class="form-select" aria-label="Default select example" id="groups" name="GroupId" required>
                    <option value="1" selected>relatives</option>
                    <option value="2">other relatives </option>
                    <option value="3">friends</option>
                    <option value="4">other friends </option>
                    <option value="5">partners </option>
                    <option value="6">other </option>
                </select>
            </div>
            <div class="col-5 col-sm-4 mt-1">
                <label for="jub-input" class="form-label">Job Title</label>
                <input type="text" class="form-control" id="jub-input" name="JobTitle">
            </div>

            <div class="col-7 col-sm-6 mt-1">
                <label for="email-input" class="form-label">Email</label>
                <input type="email" class="form-control" id="email-input" name="Email" >
            </div>
            <div class="col-sm-10 mt-1">
                <label for="formFile" class="form-label">Choose Image</label>
                <input class="form-control" type="file" id="formFile" name="Image">
            </div>
            <div class="col-sm-10 mt-1 ">
                <label for="Note-input" class="form-label">Note</label>
                <textarea class="form-control" id="Note-input" rows="2" name="Note"></textarea>
            </div>
            <div class="col-sm-10 mt-4 d-flex  justify-content-start justify-content-sm-center">
                <input type="submit" id="register" oninput="test_info()" class="btn btn-outline-primary" style="border-radius: 15px 3px 15px 3px;" name="Register" value="Register Information " required>
            </div>
        </form>
    </div>
</body>