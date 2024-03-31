<!DOCTYPE html>
<?php
require_once '../functions/diseaseView.php';
require_once '../functions/initialDataBase.php';
$diseases = findAllDiseases($conn);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Medicine</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form method="post" action="../functions/logout.php">
    <button type="submit">Logout</button>
</form>
<form action="medicinesView.php" method="get">
    <button type="submit">Medicines</button>
</form>
<h2>Create Medicine</h2>
<form action="../functions/createMedicine.php" method="POST">
    <div>Medicine Name:</div>
    <div>
        <input type="text" id="name" name="name" required>
    </div>
    <div>Medicine Description:</div>
    <div>
        <textarea id="description" name="description" required></textarea>
    </div>
    <div>Price:</div>
    <div>
        <input type="text" id="price" name="price" value="0" required pattern="\d+(\.\d+)?">
    </div>
    <div>Disease Name:</div>
    <div>
        <select id="disease" name="disease" required>
            <?php foreach ($diseases as $disease): ?>
                <option value="<?php echo $disease->id; ?>"><?php echo $disease->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit">Create Medicine</button>
</form>
<div id="errorMessage">
    <?php
    if (!isset($_GET['medicine'])) {
        exit();
    } else {
        $statusCheck = $_GET['medicine'];

        if ($statusCheck == "alreadyExist") {
            echo "<span style='color: red;'>The medicine already exist</span>";
            exit();
        } else if ($statusCheck == "empty") {
            echo "<span style='color: red;'>You did not fill all fields</span>";
            exit();
        } else if ($statusCheck == "invalidPrice") {
            echo "<span style='color: red;'>The provided price is not a valid number</span>";
            exit();
        } else if ($statusCheck == "success") {
            echo "<span style='color: green;'>The medicine was registered successfully</span>";
            exit();
        }
    }
    ?>
</div>
</body>
</html>
