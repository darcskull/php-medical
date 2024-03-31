<?php
session_start();
require_once 'initialDataBase.php';
require_once 'common.php';

$name = $_POST['name'];
$type = $_POST['type'];
$description = $_POST['description'];

if (emptyInputDisease($name, $type, $description)) {
    header("Location: ../doctorPage/createDisease.php?disease=empty");
    exit();
}

if (diseaseExists($conn, $name)) {
    header("Location: ../doctorPage/createDisease.php?disease=alreadyExist");
} else {
    createDisease($conn, $name, $type, $description);
    header("Location: ../doctorPage/createDisease.php?disease=success");
}
exit();

function emptyInputDisease($name, $type, $description): bool
{
    return empty($name) || empty($type) || empty($description);
}