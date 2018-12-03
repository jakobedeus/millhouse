<?php
session_start();


$created_by = $_SESSION["user_id"];
$content = $_POST["content"];
$post_id = $_SESSION["post_id"];
$datetime = date('Y/m/d H:i:s');
$_SESSION["date_time"] = $datetime;
var_dump($_SESSION["date_time"]);





include 'database-connection.php';







$statement = $pdo->prepare("INSERT INTO comments
(content, post_id, created_by, date) VALUES (:content, :post_id, :created_by, :date)");

$statement->execute(
 [
   ":content" => $content,
   ":post_id" => $post_id,
   ":created_by" => $created_by,
   ":date" => $datetime
 ]
);





$fetch_all_comments_statement = $pdo->prepare("SELECT * FROM comments WHERE post_id = :post_id");
$fetch_all_comments_statement->execute(
  [
    ":post_id" => $post_id
  ]
);

$comments_for_specific_post = $fetch_all_comments_statement->fetchAll(PDO::FETCH_ASSOC);





header ('location: ../views/post.php');
