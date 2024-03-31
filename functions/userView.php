<?php
require_once 'initialDataBase.php';
require_once 'common.php';
function findAllUsers($conn, $isDoctor): array
{
    $users = [];
    $sql = "SELECT * FROM `user_data` WHERE isDoctor = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $isDoctor);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($resultData)) {
        $user = new stdClass();
        $user->id = $row['id'];
        $user->firstName = $row['firstName'];
        $user->lastName = $row['lastName'];
        $user->phoneNumber = $row['phoneNumber'];
        $user->personalNumber = $row['personalNumber'];
        $user->email = $row['email'];
        $user->isDoctor = $row['isDoctor'];
        $users[] = $user;
    }

    return $users;
}
