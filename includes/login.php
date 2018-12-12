<?php
session_start();


// database_connection.php (connection with our database)  
include 'database-connection.php';

/* 
 * Fetch data from database which matches the users input. 
 */
$username = $_POST["username"];
$password = $_POST["password"];
$username_select_statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$username_select_statement->execute(
  [
    ":username" => $username
  ]
);


$fetched_user = $username_select_statement->fetch();
// Verify if fetched users password is the same as input password.
$is_password_correct = password_verify($password, $fetched_user["password"]);

$_SESSION["admin"] = $fetched_user["admin"];

/* 
 * Set username session in order to present it on feed.php as a welcome text and to validate access in interface.
 * Set user_id session in to use when inserting comments and posts to database.
 */
if($is_password_correct){
    
  $_SESSION["username"] = $fetched_user["username"];
  $_SESSION["user_id"] = $fetched_user ["id"];
  
  header('Location: ../views/feed.php');
} else {

  header('Location: ../index.php?login_failed=true');
}
