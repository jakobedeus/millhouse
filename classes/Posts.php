<?php
//include '../includes/database-connection.php';

$pdo = new PDO(
    "mysql:host=localhost;dbname=millhouse;charset=utf8",
    "root", //user
    "root"  //password

);

class Posts
{
    private $pdo;
    /* Inject the pdo connection so it is available inside of the class
    * so we can call it with '$this->pdo', always available inside of the class
    */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAll()
    {
        /*$fetch_all_posts_statement = $this->pdo->prepare("SELECT * FROM posts");
        $fetch_all_posts_statement->execute();
        $all_posts = $fetch_all_posts_statement->fetchAll(PDO::FETCH_ASSOC);*/

        $fetch_all_posts_statement = $this->pdo->prepare(
        "SELECT posts.title, posts.date, posts.image, posts.content,
        posts.category, posts.id, categories.category, users.username
        FROM posts
        JOIN categories
        ON posts.category = categories.id
        JOIN users
        ON users.id = posts.created_by
        ");
        $fetch_all_posts_statement->execute();
        $all_posts = $fetch_all_posts_statement->fetchAll(PDO::FETCH_ASSOC);

        return $all_posts;
    }

    public function fetchSinglePost()
    {
    /* RONJA ska fixas när Parmis är klar med sin del.
    session_start();

    $post_id = $_POST["id"];

    $single_post_Statement = $pdo->prepare("SELECT * FROM posts
        WHERE id = :id");

    $single_post_Statement->execute(
        [
            ":id" => $post_id
        ]
    );

    $single_post = $single_post_Statement->fetch(PDO::FETCH_ASSOC);

    */
    }
    public function deletePost()
    {
        if(isset($_GET["id"])){        
            $statement = $pdo->prepare(
            "DELETE FROM posts WHERE id = :id");
            
            $statement->execute(
                [
                    ":id" => $_GET["id"]
                ]
            );
            
           // header('Location: checkout.php');
        
        }

    }

}
