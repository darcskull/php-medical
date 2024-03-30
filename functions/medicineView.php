<?php
require_once 'initialDataBase.php';
require_once 'common.php';
function findAllMedicines($conn)
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
