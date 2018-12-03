<?php
include "../includes/head-views.php";
//include '../classes/Posts.php';
include "../includes/fetch-single-post.php";
//include "../includes/upload_comments.php";


$single_post = new Posts($pdo);
$single_posts = $single_post->fetchSinglePost();
$delete_post = $delete_post->deletePost;
?>

    <main class="container">

        <section>
                <?php
        foreach($single_posts as $post):?>

        <div class="row mb-4 border border-dark justify-content-between">
            <div class="col-10">
                <h2><?= $post["title"]; ?></h2>
                <p><?= $post["date"] . '<strong> Category: </strong>' . $post["category"] . '<strong> Wrote by: </strong>' . $post["username"]; ?></p>
                <p><?= $post["content"];  ?></p>
            </div>
            <div class="col-8">
                <img src="<?= $post["image"]; ?>" alt="Cool image.">
            </div>
            <div>
                <a href="../classes/Posts.php?id=<?= $post["id"]; ?>">Delete Post</a>
                <?php
                //var_dump($post["id"]);?>
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


    <div class="row mb-4 border border-dark justify-content-between">
      <div class="col-10">
        <h2>COMMENTS</h2>
        <?php
        foreach(array_reverse($comments_for_specific_post) as $comment){
        echo "<h3>" . $comment["created_by"] . "</h3>" ;
        echo $comment["content"]; echo "<br>";
        echo "<b>" . $_SESSION["date_time"] . "</b>";


    }
        ?>
      </div>
    </div>



    <?php
    include "../includes/footer-views.php";
    ?>
