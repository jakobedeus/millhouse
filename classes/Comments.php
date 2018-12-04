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
   $post_id = $_SESSION["post_id"];
   $datetime = date('Y/m/d H:i:s');






 $statement_insert_comment = $this->pdo->prepare("INSERT INTO comments
 (content, post_id, created_by, date) VALUES (:content, :post_id, :created_by, :date)");

 $statement_insert_comment->execute(
 [
   ":content" => $content,
   ":post_id" => $post_id,
   ":created_by" => $created_by,
   ":date" => $datetime
 ]
 );

 $insert_comment = $statement_insert_comment;
 return $insert_comment;
}
}

/* we need to access the class, we do this by creating an object that contains
*   all the information regarding the class. Am object is just an variable.
we call the $object/add_comment.
*/
