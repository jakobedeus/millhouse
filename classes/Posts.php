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

        $fetch_all_posts_statement = $this->pdo->prepare("SELECT * FROM posts");
        $fetch_all_posts_statement->execute();
        $all_posts = $fetch_all_posts_statement->fetchAll(PDO::FETCH_ASSOC);

        return $all_posts;
    }
}
