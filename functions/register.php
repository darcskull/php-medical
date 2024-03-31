<?php
if (isset($_POST['register'])) {
    require_once 'initialDataBase.php';
    require_once 'common.php';

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $personalNumber = $_POST['personalNumber'];
    $isDoctor = $_POST['isDoctor'] === 'on';

    if (emptyInputRegistration($firstName, $lastName, $email, $phoneNumber, $personalNumber)) {
        header("Location: ../register.php?register=empty");
        exit();
    }
    if (emailExists($conn, $email)) {
        header("Location: ../register.php?register=emailExist");
        exit();
    }
    createUser($conn, $firstName, $lastName, $password, $email, $phoneNumber, $personalNumber, $isDoctor);
} else {
    header("Location: ../register.php?register=error");
    exit();
}

function emptyInputRegistration($username, $password, $email, $phoneNumber, $personalNumber): bool
{
    return empty($username) || empty($password) || empty($email) || empty($phoneNumber) || empty($personalNumber);
}

function createUser($conn, $firstName, $lastName, $password, $email, $phoneNumber, $personalNumber, $isDoctor)
{
    $sql = "INSERT INTO `user_data` (`firstName`, `lastName`, `password`, `email`, `phoneNumber`, `personalNumber`, `isDoctor`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $firstName, $lastName, $password, $email, $phoneNumber, $personalNumber, $isDoctor);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../register.php?register=success");
}