<?php
include 'database-connection.php';
$fetch_all_images_statement = $pdo->prepare("SELECT * FROM posts");
$fetch_all_images_statement->execute();
$all_images = $fetch_all_images_statement->fetchAll(PDO::FETCH_ASSOC);