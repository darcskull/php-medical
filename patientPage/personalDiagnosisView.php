<!DOCTYPE html>
<?php
session_start();
require_once '../functions/diagnoseView.php';
require_once '../functions/initialDataBase.php';
$userId = $_SESSION["userid"];
$diagnosisViews = findPersonalDiagnoses($conn, $userId);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Diagnosis</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form method="post" action="../functions/logout.php">
    <button type="submit">Logout</button>
</form>
<form action="doctorsView.php" method="get" class="form-container">
    <button type="submit">Doctors</button>
</form>
<form action="personalMedicinesView.php" method="get" class="form-container">
    <button type="submit">Personal Medicines</button>
</form>
<form action="personalOrdersView.php" method="get" class="form-container">
    <button type="submit">Personal Orders</button>
</form>
<h2>Diagnosis</h2>
<table>
    <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Personal Number</th>
        <th>Disease Name</th>
        <th>Disease Type</th>
        <th>Disease Description</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($diagnosisViews as $diagnosis): ?>
        <tr>
            <td><?php echo $diagnosis->firstName; ?></td>
            <td><?php echo $diagnosis->lastName; ?></td>
            <td><?php echo $diagnosis->email; ?></td>
            <td><?php echo $diagnosis->phoneNumber; ?></td>
            <td><?php echo $diagnosis->personalNumber; ?></td>
            <td><?php echo $diagnosis->diseaseName; ?></td>
            <td><?php echo $diagnosis->diseaseType; ?></td>
            <td><?php echo $diagnosis->diseaseDescription; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
