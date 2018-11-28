<?php 
include "../includes/head-views.php"; 
include "../includes/fetch-single-post.php";
?>

    <main class="container">
    
        <section>
        <h2>Hej</h2>

        <?php //var_dump($single_post) ?>
            <article>
            <div class="col-12 row mb-4 border border-dark justify-content-between">
                    <div class="col-4">
                        <h2><?= $single_post["title"]; ?></h2>
                        <p><?= $single_post["content"]; ?></p>
                        <p>Category: <?= $single_post["category_checkbox"]; ?></p>
                    </div>
                    <div class="col-8">
                        <img src="<?= $single_post["image"]; ?>" alt="Cool image.">
                    </div>
            </div>
            </article>

        </section>

    </main>
    
    <?php
    include "../includes/footer-views.php";
    ?>