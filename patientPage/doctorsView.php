<!DOCTYPE html>
<?php
session_start();
require_once '../functions/userView.php';
require_once '../functions/initialDataBase.php';
$isDoctor = $_SESSION["isDoctor"];
$users = findAllUsers($conn, !$isDoctor);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Object Table</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form method="post" action="../functions/logout.php">
    <button type="submit">Logout</button>
</form>
<form action="personalMedicinesView.php" method="get" class="form-container">
    <button type="submit">Personal Medicines</button>
</form>
<form action="personalDiagnosisView.php" method="get" class="form-container">
    <button type="submit">Personal Diseases</button>
</form>
<form action="personalOrdersView.php" method="get" class="form-container">
    <button type="submit">Personal Orders</button>
</form>
<h2>Available Doctors</h2>
<table>
    <thead>
    <tr>
        <th>Identifier</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->firstName; ?></td>
            <td><?php echo $user->lastName; ?></td>
            <td><?php echo $user->email; ?></td>
            <td><?php echo $user->phoneNumber; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
