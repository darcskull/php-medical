<?php
session_start();
require_once 'initialDataBase.php';
require_once 'common.php';

$name = $_POST['name'];
$diseaseId = $_POST['disease'];
$description = $_POST['description'];
$price = $_POST['price'];

if (emptyInputMedicine($name, $description, $diseaseId, $price)) {
    header("Location: ../doctorPage/createMedicine.php?medicine=empty");
    exit();
}

if (!is_numeric($price)) {
    header("Location: ../doctorPage/createMedicine.php?medicine=invalidPrice");
    exit();
}

if (medicineExists($conn, $name)) {
    header("Location: ../doctorPage/createMedicine.php?medicine=alreadyExist");
} else {
    createMedicine($conn, $name, $description, $diseaseId, $price);
    header("Location: ../doctorPage/createMedicine.php?medicine=success");
}
exit();


function emptyInputMedicine($name, $description, $diseaseId, $price): bool
{
    return empty($name) || empty($diseaseId) || empty($description) || empty($price);
}