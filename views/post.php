<?php
session_start();
include "../includes/head-views.php";
include "../includes/header-views.php";

// If session username is empty, redirect to index.
if(empty($_SESSION["username"])){
    
    header("Location: ../index.php");
}else { 

    // if-statement for access only if logged in.


// Call the class and function to fetch single post
$single_post = new PostsFetch($pdo);
$one_post = $single_post->fetchSinglePost();

// Call the class and function to fetch comments
$show_comment = new CommentsFetch($pdo);
$comments_for_specific_post = $show_comment->fetchComments();

?>
<main class="container">
    <article class="row justify-content-center">
        <div class="col-12 col-md-11 col-lg-10 blog_posts">

            <?php
            // Loop from fetched variable $one_post
            foreach($one_post as $post):?>

                <div class="row blog_posts_content justify-content-center">
                    <div class="col-12 col-lg-10 blog_posts_content_text">
                        <h2 class="font_h2"><?= $post["title"]; ?></h2>
                        <p><i class="fas fa-clock" aria-label="time icon"></i> <?= $post["date"];?>
                        - <a class="blog_post_link"  href="feed.php?category=<?=$post["category"];?>">
                        <?=$post["category"];?></a> - <?php $post["category"];?> 
                        <i class="fas fa-user" aria-label="auther icon"></i> <?= $post["username"];?></p>
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
                        <!-- Send post to update_page.php which runs correct method and sql query and redirects back to this page -->
                            <form action="../includes/update_page.php" method="POST">
                                <button class="btn btn-light icon_buttons" type="submit"><i class="far fa-trash-alt icon" aria-label="delete post"></i></button>
                                <!-- Send hidden value in order to select the correct $_POST on update_page.php -->
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
        
            <?php
            endforeach;
            ?>

            <div class="row justify-content-center mb-5">
                <div class="col-12 col-lg-10 collapse" id="collapseExample">
                    <?php
                    // If user role is admin, allow edit post
                    if($_SESSION["admin"] === "is_admin"){?>
                    <!-- Send post to update_page.php which runs correct method and sql query and redirects back to this page -->
                        <form action="../includes/update_page.php" method="POST" enctype="multipart/form-data" class="m-4 p-4">
                            <label for="title">Title</label>
                            <!-- Insert fetched posts data as values to make it editable -->
                            <input type="text" name="title" id="title" value="<?= $post["title"] ?>">
                            <textarea name="content" id="text_edit"><?= $post["content"] ?></textarea>
                            <!-- Send hidden value in order to select the correct $_POST on update_page.php -->
                            <input type="hidden" name="single_post_id_update" value="<?= $post["id"]; ?>">
                            <button type="submit" class="general_button">UPDATE</button>
                        </form>
                    <?php 
                    }?>
                </div><!-- closing col-10-->
            </div><!-- closing row-->

        </div><!-- closing col-->
    </article><!-- closing article-->

       
    <section class="row mb-4 justify-content-around" id="comments">
        <div class="col-12 col-md-11 col-lg-8">
            <h3 class="font_h2">COMMENTS</h3>
            <!-- Send post to update_page.php which runs correct method and sql query and redirects back to this page -->
            <!-- Send form to update_page.php and then scroll down to comment section -->
            <form action="../includes/update_page.php#comments" method="POST">
                <label for="comments"></label>
                <input type="hidden" name="comment_post_id" value="<?= $post["id"]; ?>">
                <textarea class="post_input_comment"name="content" rows="5" cols="50" placeholder="Write your comment here" required></textarea>
                <br>
                <button type="submit" class="general_button post_comment_button">POST COMMENT</button>
            </form>
        </div> <!-- closing col-8-->
    </section><!-- closing row-->

    <section class="row mb-4 justify-content-center">
        <?php
        // Using array_reverse to present the latest comment first
        foreach(array_reverse($comments_for_specific_post) as $comment):?>
            <div class="col-12 col-md-11 col-lg-8 post_border_bottom_comments">
                <h4 class="font_h2"><?=$comment["username"];?></h4>
                <strong><i class="fas fa-clock" aria-label="time icon"></i> <?=$comment["date"];?></strong>
                <p><?=$comment["content"];?></p>
                <?php
                // Display delete form only for users who created the comment or have admin role.
                if($_SESSION["admin"] === "is_admin" || $_SESSION["user_id"] === $comment["created_by"]){?>
                    <!-- Send form to update_page.php and then scroll down to comment section -->
                    <form action="../includes/update_page.php#comments" method="POST">
                        <!-- Send hidden value in order to select the correct $_POST and to redirect to the correct page on update_page.php -->
                        <input type="hidden" name="single_comment_id_delete_redirect" value="<?= $post["id"]; ?>">
                        <input type="hidden" name="single_comment_id_delete" value="<?= $comment["comment_id"]; ?>">
                        <button class="btn btn-light icon_buttons" type="submit"><i class="far fa-trash-alt delete_comment_btn" aria-label="delete comment"></i></button>
                    </form>
                <?php
                }?>
            </div><!-- closing col-12-->
        <?php       
        endforeach;?> 
    </section><!-- closing row-->
</main>
<aside class="back_to_top_button text-center"><a href="#"><i class="fas fa-caret-up" aria-label="back to top icon"></i><p>Back to top</p></a></aside>

<?php
include "../includes/footer-views.php";
?>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php }?> <!-- End if-statement for no access if not logged in-->


    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script>
    
    $(document).ready(function() {
      $('#text_edit').summernote();
    });
    </script>

