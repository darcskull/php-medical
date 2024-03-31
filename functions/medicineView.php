<?php
require_once 'initialDataBase.php';
require_once 'common.php';
require_once 'diagnoseView.php';
function findAllMedicines($conn): array
{
    $medicines = [];
    $sql = "SELECT * FROM `Medicine`;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $medicine = new stdClass();
            $medicine->id = $row['id'];
            $medicine->name = $row['name'];
            $medicine->description = $row['description'];
            $medicine->diseaseId = $row['diseaseId'];
            $medicine->disease = getDisease($conn, $row['diseaseId'])["name"];
            $medicine->price = $row['price'];
            $medicines[] = $medicine;
        }
    }
    return $medicines;
}

function personalMedicines($conn, $userId): array
{
    $medicines = [];
    $diagnoses = findPersonalDiagnoses($conn, $userId);
    foreach ($diagnoses as $diagnose) {
        $sql = "SELECT * FROM MEDICINE WHERE diseaseId = ?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $diagnose->diseaseId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $medicine = new stdClass();
            $medicine->id = $row['id'];
            $medicine->name = $row['name'];
            $medicine->description = $row['description'];
            $medicine->diseaseId = $row['diseaseId'];
            $medicine->disease = $diagnose->diseaseId;
            $medicine->price = $row['price'];
            $medicines[] = $medicine;
        }
    }

    return $medicines;
}