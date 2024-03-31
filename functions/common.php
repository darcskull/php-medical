<?php

function emailExists($conn, $email)
{
    $sql = "SELECT * FROM `user_data` WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    return false;
}

function getDisease($conn, $id) {
    $sql = "SELECT * FROM DISEASE WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($resultData);
}

function getUser($conn, $id) {
    $sql = "SELECT * FROM `user_data` WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($resultData);
}


function diagnoseExists($conn, $userId, $diseaseId): bool
{
    $sql = "SELECT * FROM DIAGNOSIS WHERE userId = ? AND diseaseId = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $userId, $diseaseId);
    mysqli_stmt_execute($stmt);
    if (mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))) {
        return true;
    }
    return false;
}

function createDiagnose($conn, $userId, $diseaseId)
{
    $sql = "INSERT INTO DIAGNOSIS (userId, diseaseId) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $userId, $diseaseId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function diseaseExists($conn, $name): bool
{
    $sql = "SELECT * FROM DISEASE WHERE name = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    if (mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))) {
        return true;
    }
    return false;
}

function createDisease($conn, $name, $type, $description)
{
    $sql = "INSERT INTO DISEASE (name, type, description) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $type, $description);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function medicineExists($conn, $name): bool
{
    $sql = "SELECT * FROM MEDICINE WHERE name = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    if (mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))) {
        return true;
    }
    return false;
}

function createMedicine($conn, $name, $description, $diseaseId, $price)
{
    $sql = "INSERT INTO MEDICINE (name, description, diseaseId, price) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $description, $diseaseId, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}