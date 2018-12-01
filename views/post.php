<?php
include "../includes/head-views.php";
//include '../classes/Posts.php';
include "../includes/fetch-single-post.php";


$single_post = new Posts($pdo);
$single_posts = $single_post->fetchSinglePost(); 
$delete_post = $delete_post->deletePost;
?>

    <main class="container">

        <section>
                <?php
        foreach($single_posts as $post):?>
        
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
                <a href="../classes/Posts.php?id=<?= $post["id"]; ?>">Delete Post</a>
                <?php
                var_dump($post["id"]);?>
            </div>
        </div>

        <?php
        endforeach;
    
        ?>
        

            <div class="row mb-4 border border-dark justify.content-between">
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



    <?php
/*

    foreach(array_reverse($all_comments) as $comment):



    echo $comment["content"];
    echo $comment["created_by"];
    endforeach;*/
    ?>

    <?php
    include "../includes/footer-views.php";
    ?>
