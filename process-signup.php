<?php

// check if the name fields are empty

if (empty($_POST["first_name"])){
    die("First Name Is Required!");
}
if (empty($_POST["last_name"])){
    die("Last Name Is Required!");
}

// check if the email entered is valid if not return false with the msg

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid Email Is Required!");
}

// check if password is 8 chars long
if(strlen($_POST["password"]) < 8){
    die("Password must be at least 8 characters");
}

// check if the password contains at least 1 letter 
if ( ! preg_match("/[a-z]/i", $_POST["password"])){
    die("Password must contain at least one letter");
}

// check if the password contains at least 1 number
if ( ! preg_match("/[0-9]/", $_POST["password"])){
    die("Password must contain at least one number");
}

// check if password entered also matches the confirm password entered by user
if ($_POST["password"] !== $_POST["cpass"]){
    die("Password doesn't match!");
}

// hash the plain password given by the user and store in a new variable using password default

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// require the database file using the DIR CONSTANTS
$mysqli = require __DIR__ ."/database.php";

//Insert new record into user table, and the columns/field names and use placeholders as values
$sql = "INSERT INTO user (first_name, last_name, email, password_hash)
        VALUES (?, ?, ?, ?)";

//Call the stmt init() on the mysqli connection object
$stmt = $mysqli->stmt_init();

//Prepare mysqli for execution, pass sql as argument
if( ! $stmt ->prepare($sql)){
    die("SQL error: " .$mysqli->error);
}
// bind the values into the placeholders
$stmt ->bind_param("ssss",
                   $_POST["first_name"],
                   $_POST["last_name"],
                   $_POST["email"],
                   $password_hash);
// call the execute method on the statement object
// $stmt->execute();
// prevent duplicate emails from being stored again in the DB
if( $stmt -> execute()){
    header("location: signup-success.html");
    exit;
}
else {
    // detect the specific error code and return specific error msg
    if($mysqli->errno === 1062) {
        die("Email already taken!");
    }
    die($mysqli->error . " " .$mysqli->errno);
}


                   

// print_r($_POST);
// var_dump($password_hash);

