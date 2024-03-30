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
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false) {
        header("Location: ../index.php?login=emailDoesNotExist");
        exit();
    }
    $passwordData = $emailExists["password"];

    if ($password != $passwordData) {
        header("Location: ../index.php?login=wrongPassword");
    } else {
        $_SESSION["userid"] = $emailExists["id"];
        $_SESSION["email"] = $emailExists["email"];
        $_SESSION["isDoctor"] = $emailExists["isDoctor"];
        $_SESSION["phoneNumber"] = $emailExists["phoneNumber"];
        $_SESSION["personalNumber"] = $emailExists["personalNumber"];
        if ($emailExists["isDoctor"]) {
            header("Location: ../doctorPage/patientsView.php");
        } else {
            header("Location: ../patientPage/doctorsView.php");
        }
    }
    exit();
}
