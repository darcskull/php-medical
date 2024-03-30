<?php
session_start();
require_once 'initialDataBase.php';
require_once 'common.php';

$userId = $_POST['user'];
$diseaseId = $_POST['disease'];

if (diagnoseExists($conn, $userId, $diseaseId)) {
    header("Location: ../doctorPage/createDiagnosis.php?diagnose=alreadyExist");
} else {
    createDiagnose($conn, $userId, $diseaseId);
    header("Location: ../doctorPage/createDiagnosis.php?diagnose=success");
}
exit();
