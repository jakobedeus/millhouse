<?php

session_start();
include "../includes/head-views.php";
include "../includes/header-views.php";

/*

    if(empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])) {

        header('Location: ../index.php?register_failed=true');

          header ('location: ../index.php?register_failed_exist=true');
*/

if(empty($_POST["title"]) || empty($_FILES["image"]) || empty($_POST["text"]) || empty($_POST["category_checkbox"])) {
  
  header ('location: ../views/feed.php?create_post_fail=true');
  
}else{

  $insert_post = new PostsInsert($pdo);
  $upload_ok = $insert_post->InsertPosts();
  header('Location: ../views/feed.php');

}

if (isset($_POST["single_post_id_delete"])){
  $delete= new PostsEdit($pdo);
  $delete_post = $delete->deletePost();
  header('Location: ../views/feed.php');
}

if (isset($_POST["single_post_id_update"])) {

  $update = new PostsEdit($pdo);
  $update_post = $update->updatePost();
  header('Location: ../views/post.php?id='.$_POST["single_post_id_update"]);
}

if (isset($_POST["comment_post_id"])){
  $add_comment = new CommentsFetch($pdo);
  $insert_comment = $add_comment->insertComments();
  header('Location:../views/post.php?id='.$_POST["comment_post_id"]);
}

if (isset($_POST["single_comment_id_delete"])){
  
  $comment_delete = new CommentsFetch($pdo);
  $delete_comment = $comment_delete->deleteComments();
  header('Location:../views/post.php?id='.$_POST["single_comment_id_delete_redirect"]);

}



