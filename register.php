<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div><a href="index.php">Back to Login</a></div>
<h2>User Registration</h2>
<form action="function/register.php" method="post">
    <div>First Name:</div>
    <input type="text" name="firstName" required><br>

    <div>Last Name:</div>
    <input type="text" name="lastName" required><br>

    <div>Password:</div>
    <input type="password" name="password" required><br>

    <div>Email:</div>
    <input type="email" name="email" required><br>

    <div>Phone Number:</div>
    <input type="text" name="phoneNumber" required><br>

    <div>Personal Number:</div>
    <input type="text" name="personalNumber" required><br>

    <label for="isDoctor">Are you a doctor?</label>
    <input type="checkbox" id="isDoctor" name="isDoctor"><br>

    <button type="submit" name="register">Register</button>
</form>
<div id="errorMessage">
    <?php
    if (!isset($_GET['register'])) {
        exit();
    } else {
        $registerCheck = $_GET['register'];

        if ($registerCheck == "empty") {
            echo "<span style='color: red;'>You did not fill all fields</span>";
            exit();
        } else if ($registerCheck == "emailExist") {
            echo "<span style='color: red;'>Email already exist</span>";
            exit();
        } else if ($registerCheck == "error") {
            echo "<span style='color: red;'>An unexpected error have occurred</span>";
            exit();
        } else if ($registerCheck == "success") {
            echo "<span style='color: green;'>Your registration was successful</span>";
            exit();
        }
    }
    ?>
</div>
</body>
</html>
