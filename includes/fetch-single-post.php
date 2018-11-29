<?php
include 'database-connection.php';
session_start();

    $post_id = $_POST["id"];

    $single_post_Statement = $pdo->prepare("SELECT * FROM posts
        WHERE id = :id");

    $single_post_Statement->execute(
        [
            ":id" => $post_id
        ]
    );

    $single_post = $single_post_Statement->fetch(PDO::FETCH_ASSOC);
    