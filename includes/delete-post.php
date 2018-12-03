<?php


    if(isset($_GET["id"])){
        
        $post_id_delete = $_GET["id"];
        
        $delete_post_statement = $pdo->prepare(
        "DELETE FROM posts WHERE id = :id");
        
        $delete_post_statement->execute(
            [
                ":id" => $post_id_delete
            ]
        );
    
        header('Location: ../views/feed.php');
  
    }
