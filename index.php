<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
</head>
<body>
    <div>
        <h1>Login</h1>
        <form action="dataBase/initialDataBase.php" method="POST">
            <div class="input">
                <input type="text" name="username" placeholder=" ">
                <label>Username:</label>
            </div>
            <div class="input">
                <input type="password" name="password" placeholder=" ">
                <label>Password:</label>
            </div>
            <div class="button">
                <button type="submit" name="loginButton">Log In</button>
            </div>
            <div class="link">
               <a href="registration.php">Registration</a>
            </div>
        </form>
        <?php
        if (!isset($_GET['loginButton'])) {
            exit();
        } else {
            $signupCheck = $_GET['login'];

            if ($signupCheck == "empty") {
                echo "<p class='error'>You did not fill all fields</p>";
                exit();
            } else if ($signupCheck == "usernameDoesNotExist") {
                echo '<script>alert("This username does not exist!")</script>';
                exit();
            } else if ($signupCheck == "wrongPassword") {
                echo '<script>alert("Wrong password!")</script>';
                exit();
            } else if ($signupCheck == "success") {
                echo '<script>alert("Logged in successfully!")</script>';
                exit();
            }
        }
        ?>
</body>

</html>