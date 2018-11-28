<?php
include '../includes/database-connection.php';

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

    public function showDate($date)
    {
        return date('F j, Y, g:i a', strtotime($date));
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
?>

<?php/*
include '../classes/Posts.php';

$post = new Posts();
echo $post->showDate();

*/?>