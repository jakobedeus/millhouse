<?php
include "../includes/database-connection.php";

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
        $image = $_FILES["image"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $id_category = $_POST["category_list"];
        foreach($id_category as $key => $value) {
            $id_category = $value;

        }

        // If no image has been selected, choose the existing one to upload.
        if (empty($image["tmp_name"])) {
            $new_location = $_POST["existing_image"];
            $update_post = true;
            
            // Else upload new image.
        } else {
            $temporary_location = $image["tmp_name"];
            $new_location = "../images/uploads/" . $image["name"];
            $update_post = move_uploaded_file($temporary_location, $new_location);
        }

        
        // Insert variables to correct rows in table.
        if($update_post) {
            // Define the value of the array. Point out the exact number to insert to database.
            $update_post_statement = $this->pdo->prepare(
            "UPDATE posts
            SET title = :title, content = :content, image = :image, id_category = :id_category
            WHERE id = :id");

            $update_post_statement->execute(
                [
                    ":title" => $title,
                    ":content" => $content,
                    "id" => $id,
                    ":image" => $new_location,
                    ":id_category" => $id_category
                ]
            );

            $update_post = $update_post_statement;
            return $update_post;
        }
    }
}  
