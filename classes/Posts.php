<?php
//include '../includes/database-connection.php';

$pdo = new PDO(
    "mysql:host=localhost;dbname=millhouse;charset=utf8",
    "root", //user
    "root"  //password

);

class Posts
{
    /*private*/public $pdo;
    /* Inject the pdo connection so it is available inside of the class
    * so we can call it with '$this->pdo', always available inside of the class
    */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

        public function delete()
    {
        return true;
    }
    
        public function create($newPost)
    {
        return true;
    }
}


$db = new Posts($pdo);

?>
