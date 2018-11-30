<?php
session_start();
include 'database-connection.php';

    $post_id = $_POST["id"];

    $single_post_Statement = $pdo->prepare("SELECT * FROM posts
        WHERE id = :id");

    $single_post_Statement->execute(
        [
            ":id" => $post_id
        ]
    );

    $_SESSION["post_id"] = $post_id;

    $single_post = $single_post_Statement->fetch(PDO::FETCH_ASSOC);
