<?php 
include "../includes/head-views.php"; 
include "../includes/fetch-single-post.php";
?>

    <main class="container">
    
        <section>

            <article>
            <?php 
            foreach(array_reverse($single_post) as $post): ?>
                <div class="col-12 row mb-4 border border-dark justify-content-between">
                    <div class="col-4">
                        <h2><?= $post["title"]; ?></h2>
                        <p><?= $post["content"]; ?></p>
                        <p>Category: <?= $post["category_checkbox"]; ?></p>
                    </div>
                    <div class="col-8">
                        <img src="<?= $post["image"]; ?>" alt="Cool image.">
                    </div>
                </div>
            <?php
            endforeach;
            ?> 
            </article>

        </section>

        <form action="" class="form_comment">
            <textarea name="" id=""></textarea>
            <input type="submit">
        </form>
    </main>
    
    <?php
    include "../includes/footer-views.php" 
    ?>