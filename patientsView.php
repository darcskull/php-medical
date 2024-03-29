<!DOCTYPE html>
<?php
require_once 'function/userView.php';
require_once 'function/initialDataBase.php';
$users = findAllUsers($conn,false);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Object Table</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div><a href="index.php">Logout</a></div>
<form action="/medicines" method="get" class="form-container">
    <button type="submit">Medicines</button>
</form>
<form action="/diseases" method="get" class="form-container">
    <button type="submit">Diseases</button>
</form>
<form action="/diagnosis" method="get" class="form-container">
    <button type="submit">Diagnosis</button>
</form>
<h2>Patients</h2>
<table>
    <thead>
    <tr>
        <th>Personal Identifier</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->personalNumber; ?></td>
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
