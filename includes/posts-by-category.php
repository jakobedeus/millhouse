<div class="row blog_posts mb-5 justify-content-between">
    <div class="col-12 mb-3 col-md-6 blog_post_content">
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
        <div class="row">
            <div class="col-6 col-md-3 d-flex align-self-center justify-content-center pt-2 inline_form_post">
                <?php 
                    foreach($comments_amount_for_specific_post as $comment):
                        // Display number of comments for each post. Using a select query to count number or rows
                        // and return in as totalcomment.
                        if($comment["id"] === $category["id"]){?>
                            <p><?=$comment["totalcomment"];?> comment (s)</p>
                            <?php
                        }
                    endforeach;
                ?>
            </div>
            <div class="col-6 col-md-2 d-flex align-self-center inline_form_post">
                <!-- Send form to update-page.php and then scroll down to comment section -->
                <a class="feed_flex"href="post.php?id=<?= $category["id"]; ?>#comments"><button class="general_button">Comment</button></a>
            </div>
        </div>
    </div> <!-- closing col-12 col-md-7-->
    <div class="col-12 col-md-5 p-0 feed_image_frame_blogpost">
        <!-- Create alt text containing the title -->
        <img src="<?= $category["image"]; ?>" alt="<?= $category["title"]; ?>">
    </div>
</div> <!-- closing row-->