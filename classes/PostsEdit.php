<?php
//include '../includes/database-connection.php';


$pdo = new PDO(
    "mysql:host=localhost;dbname=millhouse;charset=utf8",
    "root", //user
    "root"  //password

);



class PostsEdit
{
    private $pdo;
    /* Inject the pdo connection so it is available inside of the class
    * so we can call it with '$this->pdo', always available inside of the class
    */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function deletePost()
    {
        if(isset($_POST["single_post_id_delete"])){
            $post_id = $_POST["single_post_id_delete"];
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

    public function updatePost()
    {

        if(isset($_POST["title"])) {
        $id = $_POST["single_post_id_update"];

        $title = $_POST["title"];
        $content = $_POST["content"];
        //$image = $_FILES["image"];
        /*$id_category = $_POST["category_checkbox"];
        $date = date('Y/m/d H:i:s');*/

            $update_post_statement = $this->pdo->prepare(
            "UPDATE posts
            SET title = :title, content = :content
            WHERE id = :id");

            $update_post_statement->execute(
                [
                    ":title" => $title,
                    ":content" => $content,
                    /*":image" => $image,
                    ":date" => $date,
                    */
                    "id" => $id
                ]
            );

            $update_post = $update_post_statement;
            return $update_post;
        }
    }
    }
