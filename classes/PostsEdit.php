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

        if(isset($_POST["single_post_id_delete"])){        
            $delete_post_statement = $this->pdo->prepare(
            "DELETE FROM posts WHERE id = :id");
            
            $delete_post_statement->execute(
                [
                    ":id" => $post_id
                ]
            );
            
            $delete_post = $delete_post_statement;
            return $delete_post;

            //header('Location: feed.php');
        }
    }
}
}