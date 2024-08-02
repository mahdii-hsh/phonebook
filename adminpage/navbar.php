<?php
session_start();
$userName = $_SESSION["userName"];
?>

<head>
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<nav class="col-12 col-sm-11 col-xl-10 navbar navbar-expand-lg bg-light navbar-light justify-content-center mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="./adminpage.php">PhoneBook</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./registerPerson/registerPerson.php">AddPerson</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/PhoneBook/adminpage/showPerson.php">Persons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login/login.php">Log out</a>
                </li>
            </ul>
            <a class="adminLink d-flex link-dark link-offset-2 link-underline link-underline-opacity-0 position-relative" href="/PhoneBook/adminpage/adminpage.php"><?= base64_decode($userName) ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-person-circle ms-1 end-0" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
            </a>

        </div>
    </div>
</nav>
