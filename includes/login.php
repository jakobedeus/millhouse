<?php
session_start();

$_SESSION["username"] = $fetched_user ["username"];
$_SESSION["user_id"] = $fetched_user ["id"];

// database_connection.php (connection with our database)  
include 'database-connection.php';

/* 
 * I want to login with username and password that's registered in the database.
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
$is_password_correct = password_verify($password, $fetched_user["password"]);

/* 
 * I do a session of the username. 
 * The user will keep inlogged until the user press the logout button.  
 */
if($is_password_correct){
    
  $_SESSION["username"] = $fetched_user["username"];
  
  header('Location: ../views/feed.php');
} else {

  header('Location: ../index.php?login_failed=true');
}

