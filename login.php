<?php
//when the form is submitted check if email & pwd is in our DB
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    // connect to the DB
    $mysqli = require __DIR__ ."/database.php";
    // select record based on the email address
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));
    // call query method on the mysqli object and assign to result variable
    $result = $mysqli->query($sql);
    // call the fetch assoc method and return record if it is found and store in a variable
    $user = $result->fetch_assoc();
    // print the content in the assoc array
    print_r($user);
    exit();
    
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://kit.fontawesome.com/45d9d1fdf2.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Login Page</h1>
    <br>
    <br>

    <form method ="post">
        <label for="email">Email :</label>
        <input type="email" name="email" id="">

        <label for="password">Password :</label>
        <input type="password" name="password" id="">
        <br>

        <button>
            <i class="fa-solid fa-arrow-right-to-bracket"></i>
            <span>Login</span>
        </button>
    </form>
</body>
</html>