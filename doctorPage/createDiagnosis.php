<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Diagnosis</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form method="post" action="../functions/logout.php">
    <button type="submit">Logout</button>
</form>
<form action="diagnosisView.php" method="get" class="form-container">
    <button type="submit">Back to Diagnosis</button>
</form>
<h2>Create Diagnosis</h2>
<form action="../functions/TODO.php" method="POST">
    <label for="user">Select Patient:</label>
    <select id="user" name="user">
        <?php foreach ($users as $user): ?>
            <option value="<?php echo $user['id']; ?>"><?php echo $user['email']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="disease">Select Disease:</label>
    <select id="disease" name="disease">
        <?php foreach ($diseases as $disease): ?>
            <option value="<?php echo $disease['id']; ?>"><?php echo $disease['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <button type="submit">Create Diagnose</button>
</form>
<div id="errorMessage" style="color: red;"></div>
</body>
</html>
