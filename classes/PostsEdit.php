<?php

$pdo = new PDO(
    "mysql:host=localhost;dbname=millhouse;charset=utf8",
    "root", //user
    "root"  //password

);

class PostsEdit {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function deletePost() {
        // If hidden value $_POST["single_post_id_delete"] is set in post, run this script.
        if(isset($_POST["single_post_id_delete"])){
            $post_id = $_POST["single_post_id_delete"];
            // Delete from two tables at the same time
            $delete_post_statement = $this->pdo->prepare(
            "DELETE FROM posts WHERE id = :id;
            DELETE FROM comments WHERE post_id = :id;");

            $delete_post_statement->execute(
                [
                    ":id" => $post_id
                ]
            );

            $delete_post = $delete_post_statement;
            return $delete_post;
            }
        }

    public function updatePost() {
        // If hidden value $_POST["single_post_id_update"] is set, run this code. 
        $id = $_POST["single_post_id_update"];

        $title = $_POST["title"];
        $content = $_POST["content"];

        // Define the value of the array. Point out the exact number to insert to database.
            $update_post_statement = $this->pdo->prepare(
            "UPDATE posts
            SET title = :title, content = :content
            WHERE id = :id");

            $update_post_statement->execute(
                [
                    ":title" => $title,
                    ":content" => $content,
                    "id" => $id
                ]
            );

            $update_post = $update_post_statement;
            return $update_post;
    }
}
    
