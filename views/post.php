<?php
session_start();
include "../includes/head-views.php";
include "../includes/header-views.php";
//include '../classes/Posts.php';
//include "../includes/fetch-single-post.php";
//include "../includes/upload_comments.php";

//echo "Hej";

//var_dump($_SESSION["post_id"]);
//var_dump($_SESSION["id"]);


$single_post = new PostsFetch($pdo);
$one_post = $single_post->fetchSinglePost();

$bajs = new PostsEdit($pdo);
$delete_post = $bajs->deletePost();

?>

    <main class="container">

        <section>
                <?php
        foreach($one_post as $post):?>
        
        <div class="col-12 row mb-4 border border-dark justify-content-between">
            <div class="col-4">
                <h2><?= $post["title"]; ?></h2>
                <p><?= $post["date"] . '<strong> Category: </strong>' . $post["category"] . '<strong> Wrote by: </strong>' . $post["username"]; ?></p>
                <p><?= $post["content"];  ?></p>
            </div>
            <div class="col-8">
                <img src="<?= $post["image"]; ?>" alt="Cool image.">
            </div>
            <div>
                <form action="post.php" method="POST">
                    <input type="submit" value="DELETE">
                    <input type="hidden" name="single_post_id_delete" value="<?= $post['id']; ?>">
                </form>
                <?php 
                ?>
                <!--<a href="../classes/PostsEdit.php">Delete Post</a>-->
                

            </div>
        </div>

        <?php
        endforeach;

        ?>


            <div class="row mb-4 border border-dark justify-content-between">
              <div class="col-10">
                <h3>Comments</h3>
                <h4>Write your comment</h4>
                <form action="../includes/upload_comments.php" method="POST">
                  <label for="comments"></label>
                  <textarea name="content" rows="20" cols="100"></textarea>
                  <button type="submit" class="btn btn-dark">COMMENT ON POST</button>
                </form>

              </div>
            </div>

        </section>

    </main>


    <div class="row mb-4 border border-dark justify-content-center">
      <div class="col-">
        <?php
        /*foreach(array_reverse($comments_for_specific_post) as $comment){


    echo $comment["content"];
    echo $comment["created_by"];
    echo "<br>";
        }*/
    include "../includes/footer-views.php";
    ?>
