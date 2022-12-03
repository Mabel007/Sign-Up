<?php

session_start();
// check for the user id in the session array
if (isset($_SESSION["user_id"])){
    //require the database file
    $mysqli = require __DIR__ ."/database.php";
    //select record from the user table, where id equals the value in the session user's id
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
    // run query method on the mysqli object using sql as an argument and store in the resukt variable
    $result = $mysqli->query($sql);
    //get associative array using fetch_assoc() method and store in a variable
    $user = $result->fetch_assoc();
}

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
    <!-- check to see if the user id is set in the session  -->
    <?php if(isset($user)) : ?>
        <!-- if the user is logged in print -->
        <b>Hello! <?= htmlspecialchars($user["first_name"]) ?></b>
        <br>
        <br>
        <!-- add a logout link to this page -->
        <button type="button"><a href="logout.php">Log Out</a></button>
        <!-- if the user is not logged in redirect to login & signup pages-->
    <?php else: ?>
        <b>Please</b> <button type="button"><a href="login.php">Log In</a></button> <b>Or</b> <button type="button"><a href="signup.html">Sign Up</a></button>
    <?php endif; ?>
</body>
</html>