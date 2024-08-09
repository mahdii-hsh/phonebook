<?php
session_start();
include '../db.php';

if (empty($_SESSION['userName'])) {
    echo '<script> window.location="../login/login.php"; </script> ';
}

$userName = $_SESSION['userName'];
$sqlSU = "SELECT * FROM Users  WHERE Username = '$userName';";
$userId = dbSelect($sqlSU, 'AutoId');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['btnDelete'])) {
    $getIndex = $_POST['autoId'];
    $newFName = $_POST['fName'];
    $newLName = $_POST['lName'];
    $newJobTitle = $_POST["jobTitle"];
    $newAddress = $_POST['address'];
    $newGroupId = $_POST["groupId"];
    $newEmail = $_POST['email'];
    $newNote = $_POST['note'];
    $LastModifiedDate = date("Y-m-d");
    $sqlU = "UPDATE Person SET FName= '$newFName', LName= '$newLName', JobTitle= '$newJobTitle', Address= '$newAddress', GroupId= '$newGroupId', Email= '$newEmail', Note= '$newNote', LastModifiedDate= '$LastModifiedDate',UserId='$userId' WHERE AutoId =$getIndex;";
    dbInsert($sqlU);
    if ($_POST['changeNumber']) {
        $sqlD = "DELETE FROM PersonTelephones WHERE PersonId =$getIndex;";
        dbInsert($sqlD);
        $number1 = $_POST['number1'];
        $teleType1 = $_POST['teleType1'];
        $sqlI = "INSERT INTO PersonTelephones(PersonId,Number,Tele_Type,WorkExt,CreatedDate,LastModifiedDate) VALUES($getIndex,$number1,'$teleType1','none','$LastModifiedDate','$LastModifiedDate')";
        dbInsert($sqlI);
        if (!empty($_POST['number2'])) {
            $number2 = $_POST['number2'];
            $teleType2 = $_POST['teleType2'];
            $sqlI2 = "INSERT INTO PersonTelephones(PersonId,Number,Tele_Type,WorkExt,CreatedDate,LastModifiedDate) VALUES($getIndex,$number2,'$teleType2','none','$LastModifiedDate','$LastModifiedDate')";
            dbInsert($sqlI2);
        }
        if (!empty($_POST['number3'])) {
            $number3 = $_POST['number3'];
            $teleType3 = $_POST['teleType3'];
            $sqlI3 = "INSERT INTO PersonTelephones(PersonId,Number,Tele_Type,WorkExt,CreatedDate,LastModifiedDate) VALUES($getIndex,$number3,'$teleType3','none','$LastModifiedDate','$LastModifiedDate')";
            dbInsert($sqlI3);
        }
        if (!empty($_POST['number4'])) {
            $number4 = $_POST['number4'];
            $teleType4 = $_POST['teleType4'];
            $sqlI4 = "INSERT INTO PersonTelephones(PersonId,Number,Tele_Type,WorkExt,CreatedDate,LastModifiedDate) VALUES($getIndex,$number4,'$teleType4','none','$LastModifiedDate','$LastModifiedDate')";
            dbInsert($sqlI4);
        }
    }
}
if (isset($_POST['btnDelete'])) {
    $getIndex = $_POST['autoId'];
    $sqlD = "DELETE FROM Person  WHERE AutoId ='$getIndex';";
    dbInsert($sqlD);
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Persons</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/showPerson.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/showPerson.js"></script>
</head>

<body class="bg-light d-flex flex-column">
    <?php
    include './navbar.php';
    ?>
    <div class="container-fluid d-flex align-items-start justify-content-center ">
        <div class="row align-items-center justify-content-center mt-2 col-12 col-sm-11 col-lg-11 col-xl-9 d-flex">
            <div class="col-12 d-flex  mt-5 pb-2 pt-2 ">
                <div class="col-1 col-lg-1 " style="font-size: small;"><b>#Id</b></div>
                <div class="col-2 col-lg-2 me-1" style="font-size: small;"><b>First Name</b></div>
                <div class="col-2 col-lg-2 me-1" style="font-size: small;"><b>Last Name</b></div>
                <div class="d-none d-lg-flex col-lg-1" style="font-size: small;"><b>Gender</b></div>
                <div class="col-2 col-lg-2 ms-1" style="font-size: small;"><b>Group Id</b></div>
                <div class="col-5 col-lg-4 ms-sm-2 " style="font-size: small;"><b>Info</b></div>
            </div>
            <?php
            $ind = 0;
            $sqlS1 = "SELECT * FROM Person WHERE UserId='$userId';";
            $persons = dbRowMultiSelect($sqlS1, 'AutoId');
            $sqlS2 = "SELECT * FROM PersonTelephones;";
            foreach ($persons as $key => $index) {
                $autoid = $index['AutoId'];
                $sqlMS = "SELECT * FROM PersonTelephones  WHERE PersonId= $autoid";

            ?>
                <div class="col-12 d-flex pb-2 pt-2">
                    <div class="col-1 col-lg-1 col-xl-1"><?= $key + 1 ?></div>
                    <div class="col-2 col-lg-2 col-xl-2 me-1 "><?= $index["FName"] ?></div>
                    <div class="col-2 col-lg-2 col-xl-2 me-1"><?= $index["LName"] ?></div>
                    <div class="d-none d-lg-flex col-lg-1 col-xl-1 ">
                        <?php
                        if ($index["Sex"] == 1)
                            echo 'Male';
                        else echo 'Famale';
                        ?></div>
                    <div class="col-2 col-lg-2 col-xl-2 ms-1">
                        <?php
                        $dbGroupId;
                        if ($index["GroupId"] == 1) {
                            echo 'relatives';
                            $dbGroupId = 'relatives';
                        }
                        if ($index["GroupId"] == 2) {
                            echo 'other relatives';
                            $dbGroupId = 'other relatives';
                        }
                        if ($index["GroupId"] == 3) {
                            echo 'friends';
                            $dbGroupId = 'friends';
                        }
                        if ($index["GroupId"] == 4) {
                            echo 'other friends';
                            $dbGroupId = 'ohter friends';
                        }
                        if ($index["GroupId"] == 5) {
                            echo 'partners';
                            $dbGroupId = 'partners';
                        }
                        if ($index["GroupId"] == 6) {
                            echo 'other';
                            $dbGroupId = 'other';
                        }
                        ?></div>
                    <div class="col-5 col-lg-4 col-xl-4">
                        <button class="btn btn-light rounded-pill ms-sm-1 ms-md-1 d-none d-md-inline" style="border: 1px solid #0082fd;color: #0082fd ;font-size: small;" type="button" data-bs-toggle="offcanvas" data-bs-target=<?= "#offcanvasRight" . $index["AutoId"] ?> aria-controls="offcanvasRight">information</button>
                        <button class="btn btn-light rounded-pill ms-sm-1 ms-md-1 d-md-none" style="border: 1px solid #0082fd;color: #0082fd ;font-size: small;" type="button" data-bs-toggle="offcanvas" data-bs-target=<?= "#offcanvasRight" . $index["AutoId"] ?> aria-controls="offcanvasRight">info</button>
                        <button class="btn btn-light rounded-pill ms-sm-1 d-none d-sm-inline btnDelete" style="border: 1px solid red; color: red; font-size: small;" type="button" data-bs-toggle="modal" data-bs-target=<?= "#exampleModal" . $index["AutoId"] ?>>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-circle align-self-center d-none d-lg-inline" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                            </svg>
                            Delete
                        </button>
                        <button class="btn btn-light rounded-pill ms-sm-1 d-sm-none  btnDelete" style="border: 1px solid red;color: red; font-size: small;" type="button" data-bs-toggle="modal" data-bs-target=<?= "#exampleModal" . $index["AutoId"] ?>>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-circle align-self-center d-none" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                            </svg>
                            Del
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id=<?= "exampleModal" . $index["AutoId"] ?> tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?= $index["FName"] . " " . $index["LName"] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light rounded-pill" style="border: 1px solid #787878;color: #787878; font-size: x-small;" data-bs-dismiss="modal">Close</button>
                                    <form action="./showPerson.php" method="post">
                                        <input type="text" style="display: none;" name="autoId" value=<?= $index["AutoId"] ?>>
                                        <button type="submit" class="btn btn-light rounded-pill" name="btnDelete" . <?= $index['AutoId'] ?> style="border: 1px solid red;color: red; font-size: x-small;">Delete</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id=<?= "offcanvasRight" . $index["AutoId"] ?> aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h3 id="offcanvasRightLabel"><?= $index["FName"] . ' ' . $index["LName"] ?></h3>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <form id=<?= "formData" . $index['AutoId'] ?> class="data-form">
                                <p style="font-size: xx-small;">CreatedDate:<?= $index["CreatedDate"] ?></p>
                                <p style="font-size: xx-small;">LastModifiedDate:<?= $index["LastModifiedDate"] ?></p>

                                <label for="FName-input" class="form-label" style="font-size: x-small; margin:0;">First Name</label>
                                <input type="text" class="form-control fName" id="FName-input" name="fName" style="font-size: x-small;" value='<?= $index["FName"] ?>' required disabled>

                                <label for="LName-input" class="form-label" style="font-size: x-small; margin:0;">Last Name</label>
                                <input type="text" class="form-control lName" id="LName-input" name="lName" style="font-size: x-small;" value='<?= $index["LName"] ?>' required disabled>

                                <label for="Birth-input" class="form-label" style="font-size: x-small; margin:0;">BirthDate</label>
                                <input type="date" class="form-control birthDate" id="Birth-input" name="birthDate" style="font-size: x-small;" value=<?= $index["BirthDate"] ?> required disabled>

                                <label for="Address-input" class="form-label" style="font-size: x-small; margin:0;">Address</label>
                                <input type="text" class="form-control address" id="Address-input" name="address" style="font-size: x-small;" value='<?= $index["Address"] ?>' required disabled>

                                <label for="jobtitle-input" class="form-label" style="font-size: x-small; margin:0;">Job Title</label>
                                <input type="text" class="form-control jobTitle" id="jobtitle-input" name="jobTitle" style="font-size: x-small;" value='<?= $index["JobTitle"] ?>' required disabled>

                                <label for="groups" class="form-label" style="font-size: x-small; margin:0;">GroupId</label>
                                <select class="form-select groupId" aria-label="Default select example" id="groups" name="groupId" style="font-size: x-small;" required disabled>
                                    <option value="1" <?= $index["GroupId"] == '1' ? "selected" : "" ?>>relatives</option>
                                    <option value="2" <?= $index["GroupId"] == '2' ? "selected" : "" ?>>other relatives </option>
                                    <option value="3" <?= $index["GroupId"] == '3' ? "selected" : "" ?>>friends</option>
                                    <option value="4" <?= $index["GroupId"] == '4' ? "selected" : "" ?>>other friends </option>
                                    <option value="5" <?= $index["GroupId"] == '5' ? "selected" : "" ?>>partners </option>
                                    <option value="6" <?= $index["GroupId"] == '6' ? "selected" : "" ?>>other </option>
                                </select>

                                <label for="email-input" class="form-label" style="font-size: x-small; margin:0;">Email</label>
                                <input type="email" class="form-control email" id="email-input" name="email" style="font-size: x-small;" value=<?= $index["Email"] ?> required disabled>

                                <label for="email-input" class="form-label" style="font-size: x-small; margin:0;">Note</label>
                                <textarea class="form-control note" id="email-input" name="note" style="font-size: x-small;" value=<?= $index["Note"] ?> disabled></textarea>

                                <div class="lblNumber1" style="display: block;">
                                    <label for="number1-input" class="form-label" style="font-size: x-small; margin:0; width: 55%; ">Number1</label>
                                    <label for="teleType1" class="form-label" style="font-size: x-small; margin:0; width: 35%;">TeleType</label>
                                </div>

                                <div class="inpNumber1" style="display: block;">
                                    <input type="number" class="form-control number1" id="number1-input" name="number1" onchange="change()" style="font-size: x-small; width: 55%; margin-right: 2.5px; display: inline;" value=<?= dbColumnMultiSelect($sqlMS, 'Number')[0] ?> disabled>
                                    <select class="form-select teleType1 " aria-label="Default select example" id="teleType1" name="teleType1" style="font-size: x-small; width: 40%; display: inline; " required disabled>
                                        <option value="home" <?= dbColumnMultiSelect($sqlMS, 'Tele_Type')[0] == 'home' ? "selected" : "" ?>>home</option>
                                        <option value="cellphone" <?= dbColumnMultiSelect($sqlMS, 'Tele_Type')[0] == 'cellphone' ? "selected" : "" ?>>cellphone</option>
                                        <option value="job" <?= dbColumnMultiSelect($sqlMS, 'Tele_Type')[0] == 'job' ? "selected" : "" ?>>job</option>
                                    </select>
                                </div>

                                <div class="lblNumber2" style="display: block;">
                                    <label for="number2-input" class="form-label" style="font-size: x-small; margin:0; width: 55%; ">Number2</label>
                                    <label for="teleType2" class="form-label" style="font-size: x-small; margin:0; width: 35%;">TeleType</label>
                                </div>

                                <div class="inpNumber2" style="display: block;">
                                    <input type="number" class=" form-control number2" id="number2-input" name="number2" onchange="change()" style="font-size: x-small; width: 55%; margin-right: 2.5px; display: inline;" value=<?= dbColumnMultiSelect($sqlMS, 'Number')[1] ?> disabled>
                                    <select class="form-select teleType2" aria-label="Default select example" id="teleType2" name="teleType2" style="font-size: x-small; width: 40%; display: inline; " required disabled>
                                        <option value="home" <?= dbColumnMultiSelect($sqlMS, 'Tele_Type')[1] == 'home' ? "selected" : "" ?>>home</option>
                                        <option value="cellphone" <?= dbColumnMultiSelect($sqlMS, 'Tele_Type')[1] == 'cellphone' ? "selected" : "" ?>>cellphone</option>
                                        <option value="job" <?= dbColumnMultiSelect($sqlMS, 'Tele_Type')[1] == 'job' ? "selected" : "" ?>>job</option>
                                    </select>
                                </div>

                                <div class="lblNumber3" style="display: block;">
                                    <label for="number3-input" class="form-label" style="font-size: x-small; margin:0; width: 55%; ">Number3</label>
                                    <label for="teleType3" class="form-label" style="font-size: x-small; margin:0; width: 35%;">TeleType</label>
                                </div>

                                <div class="inpNumber3" style="display: block;">
                                    <input type="number" class=" form-control number3" id="number3-input" name="number3" onchange="change()" style="font-size: x-small; width: 55%; margin-right: 2.5px; display: inline;" value=<?= dbColumnMultiSelect($sqlMS, 'Number')[2] ?> disabled>
                                    <select class="form-select teleType3" aria-label="Default select example" id="teleType3" name="teleType3" style="font-size: x-small; width: 40%; display: inline; " required disabled>
                                        <option value="home" <?= dbColumnMultiSelect($sqlMS, 'Tele_Type')[2] == 'home' ? "selected" : "" ?>>home</option>
                                        <option value="cellphone" <?= dbColumnMultiSelect($sqlMS, 'Tele_Type')[2] == 'cellphone' ? "selected" : "" ?>>cellphone</option>
                                        <option value="job" <?= dbColumnMultiSelect($sqlMS, 'Tele_Type')[2] == 'job' ? "selected" : "" ?>>job</option>
                                    </select>
                                </div>

                                <div class="lblNumber4" style="display: block;">
                                    <label for="number4-input" class="form-label" style="font-size: x-small; margin:0; width: 55%; ">Number4</label>
                                    <label for="teleType4" class="form-label" style="font-size: x-small; margin:0; width: 35%;">TeleType</label>
                                </div>

                                <div class="inpNumber4" style="display: block;">
                                    <input type="number" class=" form-control number4" id="number4-input" name="number4" onchange="change()" style="font-size: x-small; width: 55%; margin-right: 2.5px; display: inline;" value=<?= dbColumnMultiSelect($sqlMS, 'Number')[3] ?> disabled>
                                    <select class="form-select teleType4" aria-label="Default select example" id="teleType4" name="teleType4" style="font-size: x-small; width: 40%; display: inline; " required disabled>
                                        <option value="home" <?= dbColumnMultiSelect($sqlMS, 'Tele_Type')[3] == 'home' ? "selected" : "" ?>>home</option>
                                        <option value="cellphone" <?= dbColumnMultiSelect($sqlMS, 'Tele_Type')[3] == 'cellphone' ? "selected" : "" ?>>cellphone</option>
                                        <option value="job" <?= dbColumnMultiSelect($sqlMS, 'Tele_Type')[3] == 'job' ? "selected" : "" ?>>job</option>
                                    </select>
                                </div>
                                <input type="text" style="display: none;" name="autoId" value=<?= $index["AutoId"] ?>>

                                <button type="button" class="btn btn-light mt-3 col-5 editBtn " onclick=<?= "edit(" . $key . ")" ?> style="border: 1px solid #0082fd;">Edit</button>

                                <button type="button" class="btn btn-light mt-3 col-5 saveBtn " onclick=<?= "send(" . $index['AutoId'] . ")" ?> style="border: 1px solid #0082fd; display: none;">Save</button>

                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>