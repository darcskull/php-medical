<?php
session_start();
require_once 'initialDataBase.php';
require_once 'common.php';

$address = $_POST['address'];
$number = $_POST['number'];
$medicineId = $_POST['medicine'];
$price = $_POST['price'];
$userId = $_SESSION["userid"];
$phoneNumber = $_SESSION["phoneNumber"];

if (empty($address)) {
    header("Location: ../patientPage/createOrder.php?order=emptyAddress");
} else {
    createOrder($conn, $medicineId, $number, $price, $address, $userId, $phoneNumber);
    header("Location: ../patientPage/createOrder.php?order=success");
}
exit();