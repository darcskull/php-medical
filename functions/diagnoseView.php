<?php
require_once 'initialDataBase.php';
require_once 'common.php';
function findAllDiagnoses($conn): array
{
    $diagnoses = [];
    $sql = "SELECT * FROM DIAGNOSIS";
    $result = mysqli_query($conn, $sql);
    return getArr($result, $conn, $diagnoses);
}

function findPersonalDiagnoses($conn, $userId): array
{
    $diagnoses = [];
    $sql = "SELECT * FROM DIAGNOSIS WHERE userId = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $diagnoses = getArr($result, $conn, $diagnoses);
    }
    return $diagnoses;
}


function getArr(mysqli_result $result, $conn, array $diagnoses): array
{
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $diagnose = new stdClass();
            $rowUser = getUser($conn, $row['userId']);
            $rowDisease = getDisease($conn, $row['diseaseId']);
            $diagnose->firstName = $rowUser['firstName'];
            $diagnose->lastName = $rowUser['lastName'];
            $diagnose->email = $rowUser['email'];
            $diagnose->personalNumber = $rowUser['personalNumber'];
            $diagnose->phoneNumber = $rowUser['phoneNumber'];
            $diagnose->diseaseName = $rowDisease['name'];
            $diagnose->diseaseDescription = $rowDisease['description'];
            $diagnose->diseaseType = $rowDisease['type'];
            $diagnoses[] = $diagnose;
        }
    }
    return $diagnoses;
}