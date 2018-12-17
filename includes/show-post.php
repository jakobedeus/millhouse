<div class="row blog_posts mb-5 justify-content-between">
    <div class="col-12 col-md-6 blog_post_content">
        <a class="blog_title_link" href="post.php?id=<?= $post["id"]; ?>"><h2 class="font_h2">
            <?= $post["title"]; ?></h2></a>
        <p><i class="fas fa-clock" aria-label="time icon"></i> <?= $post["date"]?>
        - <a class="blog_post_link"  href="feed.php?category=<?=$post["category"];?>">
        <?=$post["category"];?></a></p>
        <div class="blog_posts_content_text">
            <?php
            if(strlen($post["content"]) > 300){
                $blog_posts_content_text = text_shorten($text = $post["content"]);
                echo $blog_posts_content_text;?>
                <a class="blog_post_link" href="post.php?id=<?= $post["id"]; ?>#comments"><p>Read more</p></a>

            <?php
            }else{
            ?>
                <p><?= $post["content"];?></p>
                <a class="blog_post_link" href="post.php?id=<?= $post["id"]; ?>"><p>Go to post</p></a>
            <?php
            }
            ?>
        </div> <!-- closing blog_posts_content_text-->

