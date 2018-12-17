<div class="row blog_posts mb-5 justify-content-between">
    <div class="col-12 col-md-6 blog_post_content">
        <a class="blog_title_link" href="post.php?id=<?= $category["id"]; ?>"><h2 class="font_h2"><?= $category["title"]; ?></h2></a>
        <p><i class="fas fa-clock" aria-label="time icon"></i> <?= $category["date"] . " - " ?><a class="blog_post_link" href="feed.php?category=<?=$category["category"];?>"><?=$category["category"];?></a></p>
        <div class="blog_posts_content_text">
            <?php
            // Function to create and excerpt with a limit of 300 character
            if(strlen($category["content"]) > 300){
                $blog_posts_content_text = text_shorten($text = $category["content"]);
                echo $blog_posts_content_text;?>
                <!-- If the text of the post is larger than 300 characters, show read more button -->
                <a class="blog_post_link" href="post.php?id=<?= $category["id"]; ?>"><p>Read more</p></a>

            <?php
            }else {
            ?>
                <p><?= $category["content"];?></p>
                <!-- If not, show go to post button -->
                <a class="blog_post_link" href="post.php?id=<?= $category["id"]; ?>"><p>Go to post</p></a>
            <?php
            }?>
        </div> <!-- closing blog_posts_content_text-->
