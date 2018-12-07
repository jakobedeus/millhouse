<?php
session_start();
include "../includes/head-views.php";
include "../includes/header-views.php";

//include '../classes/Posts.php';
//include "../includes/fetch-single-post.php";
//echo "Hej";
//var_dump($_SESSION["post_id"]);
//var_dump($_SESSION["id"]);
$single_post = new PostsFetch($pdo);
$one_post = $single_post->fetchSinglePost();

/*$delete= new PostsEdit($pdo);
$delete_post = $delete->deletePost();

$update = new PostsEdit($pdo);
$update_post = $update->updatePost();*/

//$add_comment = new CommentsFetch($pdo);
//$insert_comment = $add_comment->insertComments();
$show_comment = new CommentsFetch($pdo);
$comments_for_specific_post = $show_comment->fetchComments();


//$comment_delete = new CommentsFetch($pdo);
//$delete_comment = $comment_delete->deleteComments();


?>
<main class="container">

    <?php
    foreach($one_post as $post):?>
    <div class="row blog_posts justify-content-center">
        <div class="col-8">
            <h2 class="text-capitalize"><?= $post["title"]; ?></h2>
            
            <p><i class="fas fa-clock"></i> <?= $post["date"] ?><strong> Category: </strong><?=$post["category"]?><strong> Wrote by: </strong><?=$post["username"]; ?></p>
            <p><?= $post["content"];  ?></p>
        </div> <!-- closin col-4-->
    </div>
    <div class="row blog_posts justify-content-center">
        <div class="col-8 post_image_frame_post">
            <img src="<?= $post["image"]; ?>" alt="Cool image.">
        </div><!-- closin col-8-->
        
    </div> <!-- closin row-->

    <div class="row blog_posts justify-content-center">
        <div class="col-8 inline_form">
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

    <div class="row justify-content-center">
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
                <input type="submit" value="Update">
            </form>
        <?php 
        }?>
        </div><!-- closin col-->
    </div><!-- closin row-->
    <div class="row mb-4 border border-dark justify-content-between">
        <div class="col-10">
            <h3>Comments</h3>
            <form action="../includes/update_page.php" method="POST">
                <label for="comments"></label>
                <input type="hidden" name="comment_post_id" value="<?= $post['id']; ?>">
                <textarea name="content" rows="5" cols="50" placeholder="Write your comment here" required></textarea>
                <button type="submit" class="btn btn-dark">POST COMMENT</button>
            </form>
        </div> <!-- closin col-->
    </div><!-- closin row-->
    <div class="row mb-4 border border-dark justify-content-between">
        <div class="col-10">
            <h2>COMMENTS</h2>
            <?php
            //var_dump($comments_for_specific_post);
            foreach(array_reverse($comments_for_specific_post) as $comment){?>
            <h3><?=$comment["username"];?></h3>
            <p><?=$comment["content"];?></p>
            <br>
            <form action="../includes/update_page.php" method="POST">
                <input type="hidden" name="single_comment_id_delete_redirect" value="<?= $post['id']; ?>">
                <input type="hidden" name="single_comment_id_delete" value="<?= $comment["comment_id"]; ?>">
                <input type="submit" value="DELETE COMMENTS" class="button_delete">
            </form>
            <b><i class="fas fa-clock"></i> <?=$comment["date"];?></b>
            <hr>
            <?php 
            }?>
        </div><!-- closin col-->
    </div><!-- closin row-->
</main>

<?php
include "../includes/footer-views.php";
?>
       <!-- Link dependencies for the editor -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script>
    /**
     * use the id of the textarea in the form to initialize this text-editor: #text
     */
    $(document).ready(function() {
      $('#text_edit').summernote();
    });
    </script>
