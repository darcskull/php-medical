<?php
session_start();
require_once '../functions/orderView.php';
require_once '../functions/initialDataBase.php';
$userId = $_SESSION["userid"];
$orderList = personalOrders($conn, $userId);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order List</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form action="../functions/logout.php" method="post">
    <button type="submit">Logout</button>
</form>
<form action="doctorsView.php" method="get" class="form-container">
    <button type="submit">List with Doctors</button>
</form>
<form action="personalMedicinesView.php" method="get" class="form-container">
    <button type="submit">Personal Medicines</button>
</form>
<form action="personalDiagnosisView.php" method="get" class="form-container">
    <button type="submit">Personal Diagnoses</button>
</form>
<form action="createOrder.php" method="get">
    <button type="submit">Create Order</button>
</form>
<h2>Order List</h2>
<table>
    <thead>
    <tr>
        <th>Order Number</th>
        <th>Medicine</th>
        <th>Quantity</th>
        <th>Price $</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone Number</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($orderList as $order): ?>
        <tr>
            <td><?php echo $order->id; ?></td>
            <td><?php echo $order->medicine; ?></td>
            <td><?php echo $order->number; ?></td>
            <td><?php echo $order->price; ?></td>
            <td><?php echo $order->address; ?></td>
            <td><?php echo $order->userEmail; ?></td>
            <td><?php echo $order->phoneNumber; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
