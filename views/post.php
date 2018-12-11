<?php
session_start();
include "../includes/head-views.php";
include "../includes/header-views.php";

if(!isset($_SESSION["username"])){
    
    header('Location: ../index.php');
}else { 

    // if-statement for access only if logged in.

$single_post = new PostsFetch($pdo);
$one_post = $single_post->fetchSinglePost();

$show_comment = new CommentsFetch($pdo);
$comments_for_specific_post = $show_comment->fetchComments();

?>
<main class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-11 col-lg-10 blog_posts">

            <?php
            foreach($one_post as $post):?>

                <div class="row blog_posts_content justify-content-center">
                    <div class="col-12 col-lg-10 blog_posts_content_text">
                        <h2 class="font_h2"><?= $post["title"]; ?></h2>
                        <p><?= $post["date"] . '<strong> Category: </strong>' . $post["category"] . '<strong> Wrote by: </strong>' . $post["username"]; ?></p>
                        <p><?= $post["content"];  ?></p>
                        <hr>
                    </div> <!-- closing col-10-->
                </div><!-- closing row-->

                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 post_image_frame_post">
                        <img src="<?= $post["image"]; ?>" alt="Cool image.">
                    </div><!-- closing col-10-->
                </div> <!-- closing row-->

                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-lg-10 inline_form">
                        <?php
                        if($_SESSION["admin"] === "is_admin"){?>
                            <form action="../includes/update_page.php" method="POST">
                                <button class="btn btn-light icon_btn" type="submit"><i class="far fa-trash-alt icon"></i></button>
                                <input type="hidden" name="single_post_id_delete" value="<?= $post['id']; ?>">
                            </form>
                            <button class="btn btn-light icon_btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-wrench icon"></i></button>
                            <?php $text = access_denied_messages(
                                'fail', 'You need to fill in all fields to update a post.'
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
                    if($_SESSION["admin"] === "is_admin"){?>
                        <form action="../includes/update_page.php" method="POST" enctype="multipart/form-data" class="m-4 p-4">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="<?= $post["title"] ?>">
                            <textarea name="content" id="text_edit"><?= $post["content"] ?></textarea>
                            <input type="hidden" name="single_post_id_update" value="<?= $post['id']; ?>">
                            <button type="submit" class="btn btn-dark">UPDATE</button>
                        </form>
                    <?php 
                    }?>
                </div><!-- closing col-10-->
            </div><!-- closing row-->

        </div><!-- closing col-->
    </div><!-- closing row-->

       
    <div class="row mb-4 justify-content-around" id="comments">
        <div class="col-12 col-md-11 col-lg-8">
            <h3 class="font_h2">COMMENTS</h3>
            <form action="../includes/update_page.php#comments" method="POST">
                <label for="comments"></label>
                <input type="hidden" name="comment_post_id" value="<?= $post['id']; ?>">
                <textarea class="input_comment"name="content" rows="5" cols="50" placeholder="Write your comment here" required></textarea>
                <br>
                <button type="submit" class="btn btn-dark post_comment_btn">POST COMMENT</button>
            </form>
        </div> <!-- closing col-8-->
    </div><!-- closing row-->

    <div class="row mb-4 justify-content-center">
        <?php
        foreach(array_reverse($comments_for_specific_post) as $comment):?>
            <div class="col-12 col-md-11 col-lg-8 border_bottom">
                <h4 class="font_h2"><?=$comment["username"];?></h4>
                <b><i class="fas fa-clock"></i> <?=$comment["date"];?></b>
                <p><?=$comment["content"];?></p>
                <?php
                if($_SESSION["admin"] === "is_admin" || $_SESSION["user_id"] === $comment["created_by"]){?>

                    <form action="../includes/update_page.php#comments" method="POST">
                        <input type="hidden" name="single_comment_id_delete_redirect" value="<?= $post['id']; ?>">
                        <input type="hidden" name="single_comment_id_delete" value="<?= $comment["comment_id"]; ?>">
                        <button class="btn btn-light icon_btn" type="submit"><i class="far fa-trash-alt delete_comment_btn"></i></button>
                    </form>
                <?php
                }?>
            </div><!-- closing col-12-->
        <?php       
        endforeach;?> 
    </div><!-- closing row-->
</main>
<div class="to_top text-center"><a href="#"><i class="fas fa-caret-up"></i><p>Back to top</p></a></div>

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

