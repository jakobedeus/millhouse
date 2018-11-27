<?php 

session_start();
include 'database-connection.php';

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$admin  = $_POST["admin"];

    $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username ");

    $statement->execute(
        [
            ":username" => $username
        ]
    );
     
    $fetched_user = $statement->fetch();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if(empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])) {

        header('Location: ../index.php?register_failed=true');

    } elseif ($username == $fetched_user["username"]){
        header ('location: ../index.php?register_failed_exist=true');

    }else {

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
        header ('location: ../index.php');
    }





