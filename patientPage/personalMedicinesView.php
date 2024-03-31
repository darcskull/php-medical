<!DOCTYPE html>
<?php
require_once '../functions/medicineView.php';
require_once '../functions/initialDataBase.php';
$medicines = findAllMedicines($conn);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Medicines</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form method="post" action="../functions/logout.php">
    <button type="submit">Logout</button>
</form>
<form action="doctorsView.php" method="get" class="form-container">
    <button type="submit">Doctors</button>
</form>
<form action="personalDiagnosisView.php" method="get" class="form-container">
    <button type="submit">Personal Diseases</button>
</form>
<form action="personalOrdersView.php" method="get" class="form-container">
    <button type="submit">Personal Orders</button>
</form>
<form action="createOrder.php" method="get">
    <button type="submit">Create new Order</button>
</form>
<h2>Medicines</h2>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Disease</th>
        <th>Price $</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($medicines as $medicine): ?>
        <tr>
            <td><?php echo $medicine->name; ?></td>
            <td><?php echo $medicine->description; ?></td>
            <td><?php echo $medicine->disease; ?></td>
            <td><?php echo $medicine->price; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
