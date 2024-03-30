<?php
require_once 'initialDataBase.php';
require_once 'common.php';
function findAllDiagnoses($conn)
{
    $diagnoses = [];
    $sql = "SELECT * FROM DIAGNOSIS";
    $result = mysqli_query($conn, $sql);
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
            $diagnose->diseaseType= $rowDisease['type'];
            $diagnoses[] = $diagnose;
        }
    }
    return $diagnoses;
}