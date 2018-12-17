<?php
session_start();

include "../includes/head-views.php";
include "../includes/header-views.php";
include "../includes/admin-access.php";

// If session username is empty, redirect to index.
if(empty($_SESSION["username"])){

    header("Location: ../index.php");


}else {
    // Call the PostsFetch with and the different functions to fetch different kinds of posts.
    $posts_fetch = new PostsFetch($pdo);
    $all_posts= $posts_fetch->fetchAll();
    $post_category= $posts_fetch->fetchPostByCategory();
    $all_category= $posts_fetch->fetchCategory();

    // Call class to insert posts
    $insert_post = new PostsInsert($pdo);
    $upload_ok = $insert_post->insertPosts();

    // Call class to fetch number of comments
    $show_comment_amount = new CommentsFetch($pdo);
    $comments_amount_for_specific_post = $show_comment_amount->fetchCommentsAmount();?>


    <main class="container  justify-content-between">
        <div class="row">
            <div class="col-7">
                <?php
                // Echo a welcome message with session username
                if(isset($_SESSION["username"])){ ?>
                    <h3 class="font_h3 welcome_text">Welcome <strong class="text-capitalize"><?=$_SESSION["username"];?></strong></h3>
                <?php
                }?>

            </div>
            <div class="col-12">
                <p class="feed_inspiration_link">Go to our inspiration site: <a class="highlight" href="inspiration.php"><span>Luxury is in each detail.</span></a>
            </div>
        </div>
        <?php
        // If user role is admin, allow create new post
        if($_SESSION["admin"] === "is_admin"){?>
            <button class="btn btn-light icon_buttons" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-plus feed_add_new_post_icon" aria-label="add new post"></i><h2 class="font_h2 feed_new_post">New post</h2></button>
            <?php
            // Validate if all fields filled
            $text = access_denied_messages(
                "create_post_fail", "You need to fill in all fields to create a post."
            );
            echo $text;

            $text = access_denied_messages(
                "file_too_big", "Sorry, your file is too large. Please make sure it's no larger than 1MB. Even better
                if it's no bigger than 500kb."
            );
            echo $text;

            $text = access_denied_messages(
                "file_wrong_file_type", "Oh no! Don't you dare! Only JPG, JPEG, PNG & GIF files are allowed."
            );
            echo $text;
            ?>
            <div class="row justify-content-center mb-5">
                <div class="col-10 m-0 p-0 collapse" id="collapseExample">
                    <?php include "../includes/new-post-form.php"; ?>
                </div> <!-- closing col-->
            </div> <!-- closing row-->
        <?php
        } // closing if-statement for admin access
        // Loop posts with selected category
        if(isset($_GET["category"])){
            // Using array_reverse to present the latest post first
            foreach(array_reverse($post_category) as $category):
                include "../includes/posts-by-category.php";
            endforeach;

        }else{
            // Ending if-statement for if categories is set.
            // Using array_reverse to present the latest post first
            // Loop all posts
            foreach(array_reverse($all_posts) as $post):
                include "../includes/all-posts.php";
            endforeach;
        }

          ?>
    </main> <!-- closing container-->
<div class="back_to_top_button text-center"><a href="#"><i class="fas fa-caret-up"></i><p>Back to top</p></a></div>

<?php
    include "../includes/footer-views.php";

}?> <!--ending if-statement for access only if logged in. -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Link dependencies for the editor -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script>
    /**
     * use the id of the textarea in the form to initialize this text-editor: #text
     */
    $(document).ready(function() {
        $("#text").summernote();
    });
</script>
