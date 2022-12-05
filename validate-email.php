<?php
// require the database
$mysqli = require __DIR__ ."/database.php";
 // select record based on the email address
 $sql = sprintf("SELECT * FROM user
                 WHERE email = '%s'",
                 $mysqli->real_escape_string($_GET["email"]));
//call query method on the mysqli object and assign to result variable, with sql as an argument
$result = $mysqli->query($sql);
// check if the email address is available using num_rows and assign the boolean to a variable
$is_available = $result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]);
