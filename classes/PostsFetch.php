<?php
include "../includes/database-connection.php";

// Fetch posts with different methods and different types of data. 
class PostsFetch {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    // Fetch all posts
    public function fetchAll() {

        $fetch_all_posts_statement = $this->pdo->prepare(

        "SELECT posts.title, posts.date, posts.image, posts.content,
        posts.id, categories.category, users.username
        FROM posts
        JOIN categories
        ON posts.id_category = categories.id
        JOIN users
        ON users.id = posts.created_by
        ");
        $fetch_all_posts_statement->execute();
        $all_posts = $fetch_all_posts_statement->fetchAll(PDO::FETCH_ASSOC);

        // Return value in variable to use when looping out fetched data.
        return $all_posts;
    }

    // Fetch all posts from table catgories.
    public function fetchCategory() {
        $fetch_category = $this->pdo->prepare(
        "SELECT category, id FROM categories");
        $fetch_category->execute();
        $all_category = $fetch_category->fetchAll(PDO::FETCH_ASSOC);
        
        // Return value in variable to use when looping out fetched data.
        return $all_category;
    }

    public function fetchPostByCategory() {
        // If $_GET["category"] is set. Which comes to clicking on feed.php, run this code.
        if(isset($_GET['category'])){ 
        $category_id = $_GET["category"];
        $fetch_post_by_category = $this->pdo->prepare(

            "SELECT posts.title, posts.date, posts.image, posts.content, 
            posts.id, categories.category, users.username
            FROM posts
            JOIN categories
            ON posts.id_category = categories.id
            JOIN users
            ON users.id = posts.created_by
            WHERE category = :category
            ");
            $fetch_post_by_category->execute(
            [
                ":category" => $category_id
            ]
            );
            $post_category = $fetch_post_by_category->fetchAll(PDO::FETCH_ASSOC);

            // Return value in variable to use when looping out fetched data. Contains posts by category
            return $post_category;

        }
    }


    public function fetchSinglePost() {
        // If $_GET["id"] is set, which is the post id on views/post.php run this code.
        if(isset($_GET['id'])){ 

        $post_id = $_GET["id"];
        $fetch_single_post_statement = $this->pdo->prepare(
            
            "SELECT posts.title, posts.date, posts.image, posts.content, 
            posts.id, categories.category, users.username, posts.id_category
            FROM posts
            JOIN categories
            ON posts.id_category = categories.id
            JOIN users
            ON users.id = posts.created_by
            WHERE posts.id = :id
            ");

        $fetch_single_post_statement->execute(
            [
                ":id" => $post_id
            ]
        );
        $one_posts = $fetch_single_post_statement->fetchAll(PDO::FETCH_ASSOC);

        // Return fetched data in a variable.
        return $one_posts;

        }
    }
}
