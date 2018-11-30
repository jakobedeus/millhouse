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

     /*public function fetchPostByCategory(); 
    {

        $category_id = $_GET["category"];

        $fetch_post_by_category = $this->pdo->prepare("SELECT * FROM posts WHERE category = :category");

        $fetch_post_by_category->execute(
            [
                ":category" => $category_id
            ]
        );
        $post_category = $fetch_post_by_category->fetchAll(PDO::FETCH_ASSOC);

        return $post_category;
    }
*/

    public function fetchSinglePost()
    {
        
        $post_id = $_GET["id"];
        
        $fetch_single_post_statement = $this->pdo->prepare("SELECT * FROM posts WHERE id = :id");

        $fetch_single_post_statement->execute(
            [
                ":id" => $post_id
            ]
        );
        $single_posts = $fetch_single_post_statement->fetchAll(PDO::FETCH_ASSOC);

        return $single_posts;


    }
}
