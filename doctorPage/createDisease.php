<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Disease</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form method="post" action="../functions/logout.php">
    <button type="submit">Logout</button>
</form>
<form action="diseasesView.php" method="get">
    <button type="submit">Back to Diseases</button>
</form>
<h2>Create Disease</h2>
<form action="../functions/createDisease.php" method="POST">
    <div>Disease Type:</div>
    <div>
        <input type="text" id="type" name="type" required>
    </div>
    <div>Disease Name:</div>
    <div>
        <input type="text" id="name" name="name" required>
    </div>
    <div>Disease Description:</div>
    <div>
        <textarea id="description" name="description" required></textarea>
    </div>
    <button type="submit">Create Disease</button>
</form>
<div id="errorMessage">
    <?php
    if (!isset($_GET['disease'])) {
        exit();
    } else {
        $statusCheck = $_GET['disease'];

        if ($statusCheck == "alreadyExist") {
            echo "<span style='color: red;'>The disease already exist</span>";
            exit();
        } else if ($statusCheck == "empty") {
            echo "<span style='color: red;'>You did not fill all fields</span>";
            exit();
        } else if ($statusCheck == "success") {
            echo "<span style='color: green;'>The disease was registered successfully</span>";
            exit();
        }
    }
    ?>
</div>
</body>
</html>
