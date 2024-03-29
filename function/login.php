<?php
session_start();

if (isset($_POST["login"])) {
    require_once 'initialDataBase.php';
    require_once 'common.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (emptyInputLogin($email, $password)) {
        header("Location: ../index.php?login=empty");
        exit();
    }
    loginUser($conn, $email, $password);
} else {
    header("location: ../index.php");
    exit();
}

function emptyInputLogin($email, $password)
{
    return empty($email) || empty($password);
}

function loginUser($conn, $email, $password)
{
    $usernameExists = usernameExists($conn, $email);

    if ($usernameExists === false) {
        header("Location: ../index.php?login=usernameDoesNotExist");
        exit();
    }
    $passwordData = $usernameExists["password"];

    if ($password != $passwordData) {
        header("Location: ../index.php?login=wrongPassword");
    } else {
        $_SESSION["userid"] = $usernameExists["id"];
        $_SESSION["email"] = $usernameExists["email"];
        $_SESSION["isDoctor"] = $usernameExists["isDoctor"];
        $_SESSION["phoneNumber"] = $usernameExists["phoneNumber"];
        $_SESSION["personalNumber"] = $usernameExists["personalNumber"];
        header("Location: ../patientsView.php");
    }
    exit();
}
