<?php

// check if the name fields are empty

if (empty($_POST["fname"])){
    die("First Name Is Required!");
}
if (empty($_POST["lname"])){
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

print_r($_POST);
var_dump($password_hash);

