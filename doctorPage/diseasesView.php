<!DOCTYPE html>
<?php
require_once '../functions/diseaseView.php';
require_once '../functions/initialDataBase.php';
$diseases = findAllDiseases($conn);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Diseases</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form method="post" action="../functions/logout.php">
    <button type="submit">Logout</button>
</form>
<form action="patientsView.php" method="get" class="form-container">
    <button type="submit">Patients</button>
</form>
<form action="medicinesView.php" method="get" class="form-container">
    <button type="submit">Medicines</button>
</form>
<form action="diagnosisView.php" method="get" class="form-container">
    <button type="submit">Diagnosis</button>
</form>
<form action="createDisease.php" method="get">
    <button type="submit">Add new Disease</button>
</form>
<h2>Diseases</h2>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($diseases as $disease): ?>
        <tr>
            <td><?php echo $disease->name; ?></td>
            <td><?php echo $disease->type; ?></td>
            <td><?php echo $disease->description; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
