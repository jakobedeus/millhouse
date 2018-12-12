<?php
$pdo = new PDO(
   "mysql:host=localhost;dbname=millhouse;charset=utf8",
   "root", //user
   "root"  //password
);

class CommentsEdit
{

    private $pdo;

    public function __construct($pdo)
    {
      $this->pdo = $pdo;
    }

    public function deleteComments ()
    {
  
        // if hidden value $_POST["single_comment_id_delete"] is set, convert to new variable.
      $comment_id = $_POST["single_comment_id_delete"];

      // Delete from comments table where comment_id = $_POST["single_comment_id_delete"] 
      $delete_comment_statement = $this->pdo->prepare("DELETE FROM comments where comment_id = :comment_id");
      $delete_comment_statement->execute(
        [
          ":comment_id" => $comment_id
        ]
      );

      $delete_comment = $delete_comment_statement;
      return $delete_comment;
    }

}
