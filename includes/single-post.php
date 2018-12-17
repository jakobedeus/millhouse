<div class="row blog_posts_content justify-content-center">
    <div class="col-12 col-lg-10 blog_posts_content_text">
        <h2 class="font_h2"><?= $post["title"]; ?></h2>
        <p><i class="fas fa-clock" aria-label="time icon"></i> <?= $post["date"];?>
        - <a class="blog_post_link"  href="feed.php?category=<?=$post["category"];?>">
        <?=$post["category"];?></a><?php $post["category"];?> 
        </p>
        <p><?= $post["content"];?></p>
        <hr>
    </div> <!-- closing col-12-->
</div><!-- closing row-->

<div class="row justify-content-center">
    <div class="col-12 col-lg-10 post_image_frame_blogpost">
        <img src="<?= $post["image"]; ?>" alt="<?= $post["title"]; ?>">
    </div><!-- closing col-12-->
</div> <!-- closing row-->

<div class="row justify-content-center mt-4">
    <div class="col-12 col-lg-10 post_inline_form">
        <?php
        // If user role is admin, allow delete post
        if($_SESSION["admin"] === "is_admin"){?>
        <!-- Send post to update-page.php which runs correct method and sql query and redirects back to this page -->
            <form action="../includes/update-page.php" method="POST">
                <button class="btn btn-light icon_buttons" type="submit"><i class="far fa-trash-alt icon" aria-label="delete post"></i></button>
                <!-- Send hidden value in order to select the correct $_POST on update-page.php -->
                <input type="hidden" name="single_post_id_delete" value="<?= $post["id"]; ?>">
            </form>
            <button class="btn btn-light icon_buttons" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-wrench icon" aria-label="edit post"></i></button>
            <!-- Validate if all fields filled -->
            <?php $text = access_denied_messages(
                "fail", "You need to fill in all fields to update a post."
            );
            echo $text; ?>           
        <?php 
        } ?> <!-- closing if-statement for admin access-->
    </div><!-- closing col-10-->
</div> <!-- closing row-->