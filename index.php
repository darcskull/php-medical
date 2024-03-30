<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div><a href="register.php">Registration</a></div>
<h2>Login</h2>
<form action="functions/login.php" method="POST">
    <div>Email:</div>
    <div>
        <label for="email"></label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>Password:</div>
    <div>
        <label for="password"></label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit" name="login">Login</button>
</form>
<div id="errorMessage" style="color: red;">
    <?php
    if (!isset($_GET['login'])) {
        exit();
    } else {
        $signupCheck = $_GET['login'];

        if ($signupCheck == "empty") {
            echo "You did not fill all fields";
            exit();
        } else if ($signupCheck == "emailDoesNotExist") {
            echo "This email is not registered";
            exit();
        } else if ($signupCheck == "wrongPassword") {
            echo "Wrong password!";
            exit();
        }
    }
    ?>
</div>
</body>
</html>
