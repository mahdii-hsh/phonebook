<?php
session_start();
include '../../db.php';
include '../navbar.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addPerson'])) {
        $CreatedDate = date("Y-m-d");
        $number1 = $_POST['number1'];
        $teleType1 = $_POST['teleType1'];

        //insert number1
        {
            $sqlS = "SELECT * FROM Person WHERE AutoId=(SELECT MAX(AutoId) FROM Person)";
            $AutoId = dbSelect($sqlS, 'AutoId');
            echo $AutoId;
            $sqlI = "INSERT INTO PersonTelephones(PersonId,Number,Tele_Type,WorkExt,CreatedDate,LastModifiedDate) VALUES($AutoId,$number1,'$teleType1','none','$CreatedDate','$CreatedDate')";
            dbInsert($sqlI);
        }
        //insert number2
        {
            if (!empty($_POST['number2'])) {
                $number2 = $_POST['number2'];
                $teleType2 = $_POST['teleType2'];
                $sqlS = "SELECT * FROM Person WHERE AutoId=(SELECT MAX(AutoId) FROM Person)";
                $AutoId = dbSelect($sqlS, 'AutoId');
                $sqlI = "INSERT INTO PersonTelephones(PersonId,Number,Tele_Type,WorkExt,CreatedDate,LastModifiedDate) VALUES($AutoId,$number2,'$teleType2','none','$CreatedDate','$CreatedDate')";
                dbInsert($sqlI);
            }
        }
        //insert number3
        {
            if (!empty($_POST['number3'])) {
                $number2 = $_POST['number3'];
                $teleType2 = $_POST['teleType3'];
                $sqlS = "SELECT * FROM Person WHERE AutoId=(SELECT MAX(AutoId) FROM Person)";
                $AutoId = dbSelect($sqlS, 'AutoId');
                echo $AutoId;
                $sqlI = "INSERT INTO PersonTelephones(PersonId,Number,Tele_Type,WorkExt,CreatedDate,LastModifiedDate) VALUES($AutoId,$number3,'$teleType3','none','$CreatedDate','$CreatedDate')";
                dbInsert($sqlI);
            }
        }
        //insert number4
        {
            if (!empty($_POST['number4'])) {
                $number2 = $_POST['number4'];
                $teleType2 = $_POST['teleType4'];
                $sqlS = "SELECT * FROM Person WHERE AutoId=(SELECT MAX(AutoId) FROM Person)";
                $AutoId = dbSelect($sqlS, 'AutoId');
                echo $AutoId;
                $sqlI = "INSERT INTO PersonTelephones(PersonId,Number,Tele_Type,WorkExt,CreatedDate,LastModifiedDate) VALUES($AutoId,$number4,'$teleType4','none','$CreatedDate','$CreatedDate')";
                dbInsert($sqlI);
            }
        }
        // echo '<script> window.location="/PhoneBook/adminpage/showPerson.php"; </script> ';
        // echo '<a href="">Click!</a>';
    } else {
        $FName = $_POST["FName"];
        $LName = $_POST["LName"];
        $GroupId = $_POST["GroupId"];
        $JobTitle = $_POST["JobTitle"];
        $Sex = (int)$_POST["Sex"];
        $BirthDate = $_POST["BirthDate"];
        $Address = $_POST["Address"];
        $Email = $_POST["Email"];
        $Note = $_POST["Note"];
        $CreatedDate = date("Y-m-d");
        $userName = $_SESSION["userName"];
        $sqlSU = "SELECT * FROM Users  WHERE Username = '$userName';";
        $userId = dbSelect($sqlSU, 'AutoId');
        echo $userId;
        $sql = "INSERT INTO Person(FName,LName,JobTitle,GroupId,Sex,BirthDate,Address,Email,Note,CreatedDate,LastModifiedDate,UserId) VALUES('$FName','$LName','$JobTitle','$GroupId',1,'$BirthDate','$Address','$Email','$Note','$CreatedDate','$CreatedDate','$userId')";
        dbInsert($sql);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Numbers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/addNumber.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/addNumber.js"></script>
</head>



<body class="bg-light d-flex flex-column">
    <div class="container d-flex align-items-center justify-content-center my-auto">
        <div class="row align-items-center d-flex justify-content-center main-box col-8">
            <div class="col-12 d-flex justify-content-center mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="name of person">
                <p><b><?php echo $_POST["FName"] . " " . $_POST["LName"] ?></b></p>
            </div>
            <div class="explanation col-12 d-flex justify-content-center">
                <h6>Please input number and type of telephone.maximum = 4
                </h6>
            </div>
            <form action="./addNumber.php" method="post">
                <div class="add_box col-12 d-flex justify-content-center" id="add1">
                    <div class="col-3 mt-1 justify-content-center">
                        <!-- <label for="Address-input" class="form-label">Number</label> -->
                        <input type="number" class=" form-control" id="number1-input" name="number1" data-bs-toggle="tooltip" data-bs-placement="top" title="number" min="8" required maxlength="11" minlength="8">
                    </div>
                    <div class="col-3 mt-1 ms-2 justify-content-center">
                        <!-- <label for="groups" class="form-label">Type of Telephone</label> -->
                        <select class="form-select" aria-label="Default select example" id="groups" name="teleType1" data-bs-toggle="tooltip" data-bs-placement="top" title="type of telephone">
                            <option value="celephone">CelePhone</option>
                            <option value="home">Home</option>
                            <option value="job">Job</option>
                        </select>
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-end ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" onclick="add_child1()" id="plus1" class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash-circle invisible" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                        </svg>
                    </div>
                </div>
                <div class="add_box col-12  justify-content-center" id="add2" style="display: none;">
                    <div class="col-3 mt-1 justify-content-center">
                        <!-- <label for="Address-input" class="form-label">Number</label> -->
                        <input type="number" class=" form-control" id="Address-input" name="number2" data-bs-toggle="tooltip" data-bs-placement="top" title="number" minlength="8">
                    </div>
                    <div class="col-3 mt-1 ms-2 justify-content-center">
                        <!-- <label for="groups" class="form-label">Type of Telephone</label> -->
                        <select class="form-select" aria-label="Default select example" id="groups" name="teleType2" data-bs-toggle="tooltip" data-bs-placement="top" title="type of telephone">
                            <option>CelePhone</option>
                            <option value="1" selected>Home</option>
                            <option value="2">Job</option>
                        </select>
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-end ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" onclick="add_child2()" id="plus2" class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" onclick="remove_child2()" id="minus2" class="bi bi-dash-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                        </svg>
                    </div>
                </div>
                <div class="add_box col-12  justify-content-center" id="add3" style="display: none;">
                    <div class="col-3 mt-1 justify-content-center">
                        <!-- <label for="Address-input" class="form-label">Number</label> -->
                        <input type="number" class=" form-control" id="Address-input" name="number3" data-bs-toggle="tooltip" data-bs-placement="top" title="number" minlength="8">
                    </div>
                    <div class="col-3 mt-1 ms-2 justify-content-center">
                        <!-- <label for="groups" class="form-label">Type of Telephone</label> -->
                        <select class="form-select" aria-label="Default select example" id="groups" name="teleType3" data-bs-toggle="tooltip" data-bs-placement="top" title="type of telephone">
                            <option>CelePhone</option>
                            <option value="1">Home</option>
                            <option value="2" selected>Job</option>
                        </select>
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-end ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" onclick="add_child3()" id="plus3" class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" onclick="remove_child3()" id="minus3" class="bi bi-dash-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                        </svg>
                    </div>
                </div>
                <div class="add_box col-12 justify-content-center" id="add4" style="display: none;">
                    <div class="col-3 mt-1 justify-content-center">
                        <!-- <label for="Address-input" class="form-label">Number</label> -->
                        <input type="number" class=" form-control" id="Address-input" name="number4" data-bs-toggle="tooltip" data-bs-placement="top" title="number" minlength="8">
                    </div>
                    <div class="col-3 mt-1 ms-2 justify-content-center">
                        <!-- <label for="groups" class="form-label">Type of Telephone</label> -->
                        <select class="form-select" aria-label="Default select example" id="groups" name="teleType4" data-bs-toggle="tooltip" data-bs-placement="top" title="type of telephone">
                            <option selected>CelePhone</option>
                            <option value="1">Home</option>
                            <option value="2">Job</option>
                        </select>
                    </div>

                    <div class="col-1 d-flex justify-content-center align-items-end ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" onclick="remove_child4()" id="minus4" class="bi bi-dash-circle me-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" id="plus4" class="bi bi-plus-circle invisible" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                    </div>
                </div>
                <div class="col-12 mt-4 d-flex justify-content-center">
                    <input type="submit" id="add_person" oninput="test_info()" class="btn btn-outline-primary" name="addPerson" value="Add Person" required>
                </div>
            </form>

        </div>
    </div>
</body>

</html>