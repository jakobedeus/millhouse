<?php
$pdo = new PDO(
   "mysql:host=localhost;dbname=millhouse;charset=utf8",
   "root", //user
   "root"  //password
);
//always use include on the file on your index site
//also on index call on $add_comment = new CommentsFetch;
//use extends after classname to fetch property & methods from other classes
//only when its public or protected!
class CommentsFetch
{
 //inherit $pdo and what it does by -> on index by $add_comment->$pdo
 //$addcomment is
 private $pdo;
 /* Inject the pdo connection so it is available inside of the class
 * so we can call it with '$this->pdo', always available inside of the class
 */
 //properties (variables) & methods (functions) goes here
 // property:
 public function __construct($pdo)
 {
   $this->pdo = $pdo;
 }
 public function insertComments()
 {

   $created_by = $_SESSION["user_id"];
   $content = $_POST["content"];
   $post_id_insert = $_POST["comment_post_id"];
   $datetime = date('Y/m/d H:i:s');

 $statement_insert_comment = $this->pdo->prepare("INSERT INTO comments
 (content, post_id, created_by, date) VALUES (:content, :post_id, :created_by, :date)");
 $statement_insert_comment->execute(
 [
   ":content" => $content,
   ":post_id" => $post_id_insert,
   ":created_by" => $created_by,
   ":date" => $datetime
 ]
 );
 $insert_comment = $statement_insert_comment;
 return $insert_comment;
}

public function fetchComments ()
{
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
  //var_dump($comments_for_specific_post);
}

public function deleteComments ()
{
  
  $comment_id = $_POST["single_comment_id_delete"];
  $delete_comment_statement = $this->pdo->prepare("DELETE FROM comments where comment_id = :comment_id");
  $delete_comment_statement->execute(
    [
      ":comment_id" => $comment_id
    ]
  );

  $delete_comment = $delete_comment_statement;
  return $delete_comment;
}

public function fetchCommentsAmount ()
{
  //$post_id = $_GET["id"];
  $fetch_amount_of_comments_statement = $this->pdo->prepare(
    "SELECT posts.id, COUNT(comments.comment_id)
    FROM posts
    JOIN comments
    WHERE posts.id = comments.post_id
    GROUP BY comments.comment_id");

/*$fetch_amount_of_comments_statement->execute(
   [
     ":post_id" => $post_id
   ]
  );*/

  $comments_amount_for_specific_post = $fetch_amount_of_comments_statement->fetchAll(PDO::FETCH_ASSOC);
  return $comments_amount_for_specific_post;
  //var_dump($comments_for_specific_post);
}


}
/* we need to access the class, we do this by creating an object that contains
*   all the information regarding the class. Am object is just an variable.
we call the $object/add_comment.
*/
