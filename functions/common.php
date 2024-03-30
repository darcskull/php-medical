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


function diagnoseExists($conn, $userId, $diseaseId)
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