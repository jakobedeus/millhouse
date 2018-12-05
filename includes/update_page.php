<?php

session_start();
include "../includes/head-views.php";
include "../includes/header-views.php";

$update = new PostsEdit($pdo);
$update_post = $update->updatePost();

$delete= new PostsEdit($pdo);
$delete_post = $delete->deletePost();

$insert_post = new PostsInsert($pdo);
$upload_ok = $insert_post->InsertPosts();


if (isset($_POST["single_post_id_delete"])){
    header('Location: ../views/feed.php');
}
elseif (isset($_POST["single_post_id_update"])) {
    header('Location: ../views/post.php?id='.$_POST["single_post_id_update"]);
}
else {
    header('Location: ../views/feed.php');
}


?>