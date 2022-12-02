<?php

session_start();

// print_r($_SESSION);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://kit.fontawesome.com/45d9d1fdf2.js" crossorigin="anonymous"></script>
    <title>Home Page</title>
</head>
<body>
    <h1>Home Page</h1>
    <br>
    <!-- check to see if the user id is set in the session  -->
    <?php if(isset($_SESSION["user_id"])) : ?>
        <!-- if the user is logged in print -->
        <p>You are logged in!</p>
        <!-- if the user is not logged in redirect to login & signup pages-->
    <?php else: ?>
        <p><a href="login.php">Login</a> or <a href="signup.html">Sign Up</a></p>
    <?php endif; ?>
</body>
</html>