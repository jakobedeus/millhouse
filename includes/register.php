<?php 

session_start();
include "database-connection.php";

// strip_tags to secure input fields from inserting harmful code to database.

$username = strip_tags($_POST["username"]);
$password = strip_tags($_POST["password"]);
$email = strip_tags($_POST["email"]);
$admin  = $_POST["admin"];

    $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username ");

    $statement->execute(
        [
            ":username" => $username
        ]
    );
     

    $fetched_user = $statement->fetch();
    // Make password hashed.
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Check if input fields are empty. 
    if(empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        
        header("Location: ../index.php?register_failed=true");
        // Check if username already exists in database. To create unique usernames to make it easier to identify users.
    } elseif ($username == $fetched_user["username"]){
        header ("location: ../index.php?register_failed_exist=true");

    }else {
        // If all is good, insert into database. Redirect to index to make the user login with the correct credentials.
        $statement = $pdo->prepare("INSERT INTO users
        (username, password, mail, admin) VALUES (:username, :password, :mail, :admin)");

        $statement->execute (
            [
                ":username" => $username,
                ":password" => $hashed_password,
                ":mail" => $email,
                ":admin" => $admin
            ]
        );
        header ("location: ../index.php");
    }





