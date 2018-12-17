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

    $category = new PostsFetch($pdo);
    $all_category= $category->fetchCategory();

    ?>
    <main class="container">
        <article class="row justify-content-center">
            <div class="col-12 col-md-11 col-lg-10 blog_posts">

                <?php 
                foreach($one_post as $post):
                // Loop from fetched variable $one_post
                    include "../includes/single-post.php";
                endforeach;
                ?>

                <div class="row justify-content-center mb-5">
                    <div class="col-12 col-lg-10 collapse" id="collapseExample">
                        <?php
                    
                        // If user role is admin, allow edit post
                        if($_SESSION["admin"] === "is_admin"){
                        // Send post to update-page.php which runs correct method and sql query and redirects back to this page 
                            include "../includes/edit-post-form.php";
                        }?>
                    </div><!-- closing col-10-->
                </div><!-- closing row-->

            </div><!-- closing col-->
        </article><!-- closing article-->

        
        <section class="row mb-4 justify-content-around" id="comments">
            <div class="col-12 col-md-11 col-lg-8">
                <h3 class="font_h2">COMMENTS</h3>
                <!-- Send post to update-page.php which runs correct method and sql query and redirects back to this page -->
                <!-- Send form to update-page.php and then scroll down to comment section -->
                    <?php include "../includes/comment-form.php"; ?>
            </div> <!-- closing col-8-->
        </section><!-- closing row-->

        <section class="row mb-4 justify-content-center">
            <?php
            // Using array_reverse to present the latest comment first
            foreach(array_reverse($comments_for_specific_post) as $comment):
                include "../includes/comments-delete.php";
            endforeach;?> 
        </section><!-- closing row-->
    </main>
<aside class="back_to_top_button text-center"><a href="#"><i class="fas fa-caret-up" aria-label="back to top icon"></i><p>Back to top</p></a></aside>

<?php
include "../includes/footer-views.php";
?>
<?php }?> <!-- End if-statement for no access if not logged in-->

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
        $("#text_edit").summernote();
    });
</script>