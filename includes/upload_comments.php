<?php
session_start();
$created_by = $_SESSION["user_id"];
$content = $_POST["content"];
$post_id = $_SESSION["post_id"];

include 'database-connection.php';



//content $content
//created by $username

//post_id
//putta in i databasen



$statement = $pdo->prepare("INSERT INTO comments
(content, post_id, created_by) VALUES (:content, :post_id, :created_by)");

$statement->execute(
  [
    ":content" => $content,
    ":post_id" => $post_id,
    ":created_by" => $created_by
  ]
);
