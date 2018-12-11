<?php

/*
* This page will run the correct script which is based on information sent in $_POST and redirect to wanted page.
* The reason we chose to use this solution is to make the user experience as good as possible. To not use another page 
* with only an input field.
*/

session_start();
include "../includes/head-views.php";
include "../includes/header-views.php";


if(empty($_POST["title"]) || empty($_FILES["image"]) || empty($_POST["text"]) || empty($_POST["category_checkbox"])) {
  
  header ('location: ../views/feed.php?create_post_fail=true');
  
}else{

  $insert_post = new PostsInsert($pdo);
  $upload_ok = $insert_post->InsertPosts();
  header('Location: ../views/feed.php');

}

// If hidden value is set in $_POST when deleting post this script will run and redirect.
if (isset($_POST["single_post_id_delete"])){
  $delete= new PostsEdit($pdo);
  $delete_post = $delete->deletePost();
  header('Location: ../views/feed.php');
}

// If hidden value is set in $_POST when updating post this script will run and redirect.
if (isset($_POST["single_post_id_update"])) {
  $update = new PostsEdit($pdo);
  $update_post = $update->updatePost();
  header('Location: ../views/post.php?id='.$_POST["single_post_id_update"]);
}

// If hidden value is set in $_POST when posting a comment this script will run and redirect.
if (isset($_POST["comment_post_id"])){
  $add_comment = new CommentsFetch($pdo);
  $insert_comment = $add_comment->insertComments();
  header('Location:../views/post.php?id='.$_POST["comment_post_id"]);
}

// If hidden value is set in $_POST when deleting a comment this script will run and redirect.
if (isset($_POST["single_comment_id_delete"])){
  $comment_delete = new CommentsFetch($pdo);
  $delete_comment = $comment_delete->deleteComments();
  header('Location:../views/post.php?id='.$_POST["single_comment_id_delete_redirect"]);
}



