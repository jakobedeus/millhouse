<?php
$pdo = new PDO(
   "mysql:host=localhost;dbname=millhouse;charset=utf8",
   "root", //user
   "root"  //password
);

class CommentsFetch
{

    private $pdo;

    public function __construct($pdo)
    {
      $this->pdo = $pdo;
    }

    public function fetchComments ()
    {
    // Fetch comments to correct post
      $post_id = $_GET["id"];
      $fetch_all_comments_statement = $this->pdo->prepare(
        "SELECT comments.created_by, users.id, users.username, comments.date, comments.content, comments.post_id, comments.comment_id
        FROM users
        JOIN comments
        ON users.id = comments.created_by
        WHERE comments.post_id = :post_id");

      $fetch_all_comments_statement->execute(
        [
          ":post_id" => $post_id
        ]
      );

      $comments_for_specific_post = $fetch_all_comments_statement->fetchAll(PDO::FETCH_ASSOC);
      return  $comments_for_specific_post;
    }

    // Fetch number of comments to display on feed.
    public function fetchCommentsAmount ()
    {
      $fetch_amount_of_comments_statement = $this->pdo->prepare(
        "SELECT posts.id, COUNT(comments.post_id) as totalcomment
        FROM posts 
        LEFT JOIN comments 
        ON posts.id = comments.post_id
        GROUP BY posts.id, comments.post_id");

      $fetch_amount_of_comments_statement->execute();
      
      $comments_amount_for_specific_post = $fetch_amount_of_comments_statement->fetchAll(PDO::FETCH_ASSOC);
      return $comments_amount_for_specific_post;
    }
}