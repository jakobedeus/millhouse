<?php
session_start();
include "../includes/head-views.php";
include "../includes/header-views.php";

$single_post = new PostsFetch($pdo);
$one_post = $single_post->fetchSinglePost();

$show_comment = new CommentsFetch($pdo);
$comments_for_specific_post = $show_comment->fetchComments();

?>
<main class="container">
    <div class="row justify-content-center">
        <div class="col-10 blog_posts">

            <?php
            foreach($one_post as $post):?>
            <div class="row blog_posts_content blog_posts justify-content-center">
                <div class="col-10 blog_posts_content_text">
                    <h2><?= $post["title"]; ?></h2>
                    <p><?= $post["date"] . '<strong> Category: </strong>' . $post["category"] . '<strong> Wrote by: </strong>' . $post["username"]; ?></p>
                    <p><?= $post["content"];  ?></p>
                    <hr>
                </div> <!-- closin col-4-->
            </div>
            <div class="row justify-content-center">
                <div class="col-10 post_image_frame_post">
                    <img src="<?= $post["image"]; ?>" alt="Cool image.">
                </div><!-- closin col-8-->

            </div> <!-- closin row-->

            <div class="row justify-content-center">
                <div class="col-10 inline_form">
                <?php
                    if($_SESSION["admin"] === "is_admin"){?>
                    <form action="../includes/update_page.php" method="POST">
                        <button class="btn btn-light add_sign_btn" type="submit"><i class="far fa-trash-alt add_sign"></i></button>
                        <input type="hidden" name="single_post_id_delete" value="<?= $post['id']; ?>">
                    </form>
                    <button class="btn btn-light add_sign_btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-wrench add_sign"></i></button>              
                    <?php 
                    } ?> <!-- closing if-statement for admin access-->
                </div>
            </div> <!-- closin row-->
                
            <?php
            endforeach;
            ?>

            <div class="row justify-content-center mb-5">
                <div class="col-10 collapse" id="collapseExample">
                <?php
                if($_SESSION["admin"] === "is_admin"){?>
                    <form action="../includes/update_page.php" method="POST" enctype="multipart/form-data" class="m-4 p-4">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" src="../views/uploads/anka.jpg">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="<?= $post["title"] ?>">
                        <select name="category_checkbox[]" id="" required>
                            <option value="">Choose category</option>
                            <option value="1">Living</option>
                            <option value="2">Sunglasses</option>
                            <option value="3">Watches</option>
                        </select>
                        <textarea name="content" id="text_edit"><?= $post["content"] ?></textarea>
                        <input type="hidden" name="single_post_id_update" value="<?= $post['id']; ?>">
                        <button type="submit" class="btn btn-dark">UPDATE</button>
                    </form>
                <?php 
                }?>
                </div><!-- closin col-->
            </div><!-- closin row-->
        </div>
    </div>
    <div class="row mb-4 justify-content-around">
        <div class="col-8">
            <h2>COMMENTS</h2>
            <form action="../includes/update_page.php" method="POST">
                <label for="comments"></label>
                <input type="hidden" name="comment_post_id" value="<?= $post['id']; ?>">
                <textarea name="content" rows="5" cols="50" placeholder="Write your comment here"></textarea>
                <br>
                <button type="submit" class="btn btn-dark post_comment_btn">POST COMMENT</button>
            </form>
        </div> <!-- closin col-->
    </div><!-- closin row-->
    <div class="row mb-4 justify-content-center">
        <div class="col-8">
            <?php
            foreach(array_reverse($comments_for_specific_post) as $comment){?>
            <h3><?=$comment["username"];?></h3>
            <b><?=$comment["date"];?></b>
            <p><?=$comment["content"];?></p>            
            <form action="../includes/update_page.php" method="POST">
                <input type="hidden" name="single_comment_id_delete_redirect" value="<?= $post['id']; ?>">
                <input type="hidden" name="single_comment_id_delete" value="<?= $comment["comment_id"]; ?>">
                <button class="btn btn-light add_sign_btn" type="submit"><i class="far fa-trash-alt add_sign_delete"></i></button>
                <hr>

            </form>
            <?php 
            }?>
        </div><!-- closin col-->
    </div><!-- closin row-->
</main>

<?php
include "../includes/footer-views.php";
?>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script>
    
    $(document).ready(function() {
      $('#text_edit').summernote();
    });
    </script>
