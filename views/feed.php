<?php
session_start();

include "../includes/head-views.php";
include "../includes/header-views.php";
include "../includes/admin-access.php";

if(empty($_SESSION["username"])){

    header('Location: ../index.php');
}else {

$posts_fetch = new PostsFetch($pdo);
$all_posts= $posts_fetch->fetchAll();
$post_category= $posts_fetch->fetchPostByCategory();

$category = new PostsFetch($pdo);
$all_category= $category->fetchCategory();

$insert_post = new PostsInsert($pdo);
$upload_ok = $insert_post->InsertPosts();

$show_comment_amount = new CommentsFetch($pdo);
$comments_amount_for_specific_post = $show_comment_amount->fetchCommentsAmount();

?>
<main class="container justify-content-center">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-6">
        <h4 class="inspiration_link">Go to our inspiration site: <a class="highlight" href="inspiration.php"><span>Luxury is in each detail.</span></a></h4>
      </div>
    </div>
  </div>
  <br>
    <?php 
        if(isset($_SESSION["username"])){ ?>
            <h3 class="font_h3">Welcome <b class="text-capitalize"><?=$_SESSION["username"];?></b></h3>
        <?php    
        }
    
        if($_SESSION["admin"] === "is_admin"){?>
            <button class="btn btn-light icon_buttons" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-plus feed_add_new_post_icon" aria-label="add new post"></i><h2 class="font_h2 new_post">New post</h2></button>

            <?php 
            $text = access_denied_messages(
                'create_post_fail', 'You need to fill in all fields to create a post.'
            );
            echo $text; ?>
            <div class="row justify-content-center mb-5">
                <div class="col-10 m-0 p-0 collapse" id="collapseExample">
                    <form action="../includes/update_page.php" method="POST" enctype="multipart/form-data">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image">
                        <label for="title">Title</label><br />
                        <input type="text" name="title" id="title"><br />
        
                        <select name="category_checkbox[]" id="">
                            <option value="">Choose category</option>
                            <option value="1">Living</option>
                            <option value="2">Sunglasses</option>
                            <option value="3">Watches</option>
                        </select>
                        <textarea name="text" id="text"></textarea>
                        <input type="hidden" name="new_post" id="new_post" value="<?= $post['id']; ?>">
                        <input class="button" type="submit" value="Send">
                    </form>
                </div> <!-- closing col-->
            </div> <!-- closing row-->
        <?php

        } // closing if-statement for admin access
    
        if(isset($_GET["category"])){
        // Using array_reverse to present the latest post first
        foreach(array_reverse($post_category) as $category): ?>
            <div class="row blog_posts mb-5 justify-content-between">
                <div class="col-12 col-md-6 blog_post_content">
                    <a class="blog_title_link" href="post.php?id=<?= $category['id']; ?>"><h2 class="font_h2"><?= $category["title"]; ?></h2></a>
                    <p><i class="fas fa-clock"></i> <?= $category["date"] . ' - ' ?><a class="blog_post_link" href="feed.php?category=<?=$category['category'];?>"><?=$category['category'];?></a> - <i class="fas fa-user"></i> <?= $category["username"]; ?></p>
                    <div class="blog_posts_content_text">
                        <?php
                        if(strlen($category["content"]) > 300){
                            $blog_posts_content_text = text_shorten(
                                $text = $category["content"]
                             );
                            echo $blog_posts_content_text;
                        ?>
                            <a class="blog_post_link" href="post.php?id=<?= $category['id']; ?>"><p>Read more</p></a>
                        
                        <?php
                        }else{
                        ?>
                            <p><?= $category["content"];  ?></p>
                            <a class="blog_post_link" href="post.php?id=<?= $category['id']; ?>"><p>Go to post</p></a>
                        <?php
                        }?>
                    </div> <!-- closing blog_posts_content_text-->
                    <?php 
                        foreach($comments_amount_for_specific_post as $comment):
                          
                            if($comment["id"] === $category["id"]){?>
                                <p><?=$comment["totalcomment"];?> comments</p>
                            <?php
                            }
                        endforeach; ?>
                    <a href="post.php?id=<?= $category['id']; ?>#comments"><button class="feed_comment_button">Comment</button></a>
                </div> <!-- closing col-12 col-md-7-->
                <div class="col-12 col-md-5 p-0 post_image_frame">
                    <img src="<?= $category['image']; ?>" alt="<?= $category['title']; ?>">
                </div>
            </div> <!-- closing row-->
        <?php
        endforeach;
        }else{
        foreach(array_reverse($all_posts) as $post): ?>
            <div class="row blog_posts mb-5 justify-content-between">
                <div class="col-12 col-md-6 blog_post_content">
                    <a class="blog_title_link" href="post.php?id=<?= $post['id']; ?>"><h2 class="font_h2"><?= $post["title"]; ?></h2></a>
                    <p><i class="fas fa-clock"></i> <?= $post["date"] . ' - ' ?><a class="blog_post_link"  href="feed.php?category=<?=$post['category'];?>"><?=$post["category"];?></a> - <i class="fas fa-user"></i><?= $post["username"]; ?> </p>
                    <div class="blog_posts_content_text">
                        <?php
                        if(strlen($post["content"]) > 300){
                            $blog_posts_content_text = text_shorten(
                                $text = $post["content"]
                            );
                            echo $blog_posts_content_text;
                        ?>
                            
                            <a class="blog_post_link" href="post.php?id=<?= $post['id']; ?>#comments"><p>Read more</p></a>
                        
                        <?php
                        }else{
                        ?>
                            <p><?= $post["content"];  ?></p>
                            <a class="blog_post_link" href="post.php?id=<?= $post['id']; ?>"><p>Go to post</p></a>
                        <?php
                        }
                        ?>
                    </div> <!-- closing blog_posts_content_text-->         
                    <?php 
                    foreach($comments_amount_for_specific_post as $comment):
                    
                        if($comment["id"] === $post["id"]){?>
                          <p><?=$comment["totalcomment"];?> comments</p> 
                          <?php }
                    endforeach;?>
                    <a href="post.php?id=<?= $post['id']; ?>#comments"><button class="feed_comment_button">Comment</button></a>
                </div> <!-- closing col-->
                <div class="post_image_frame col-12 col-md-5 p-0">
                    <img src="<?= $post['image']; ?>" alt="<?= $post['title']; ?>">
                </div>
            </div> <!-- closing row-->
        
        <?php
        endforeach;
        }

      /*$page = ! empty( $_GET['page'] ) ? (int) $_GET['page'] : 1;

   $total_posts = count($all_posts);
   //echo $total_posts . "<br />";
   $number_of_elements_per_page = 3;

   $number_of_pages = ceil($total_posts/$number_of_elements_per_page);
   //echo $number_of_pages;
   $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
   $page = min($page, $number_of_pages); //get last page when $_GET['page'] > $totalPages
   $offset = ($page - 1) * $number_of_elements_per_page;
   if( $offset < 0 ) $offset = 0;
   $hello_post = array_slice( $all_posts, $offset, $number_of_elements_per_page);?>

        <nav class="pagination">
          <a href="feed.php?page=1">1</a>
          <a href="feed.php?page=2">2</a>
          <a href="feed.php?page=3">3</a>
          <a href="feed.php?page=4">4</a>
        </nav>*/

        /*if(isset($_GET["page"])){
          $current_page = $_GET["page"];


          if($current_page === 1){
            echo "1";
          }
          if($current_page === 2){
            echo "2";
          }
          if($current_page === 3){
            echo "3";
          }
          if($current_page === 4){
            echo "4";
          }
        }*/
          ?>


</main> <!-- closing container-->
<div class="to_top text-center"><a href="#"><i class="fas fa-caret-up"></i><p>Back to top</p></a></div>

<?php
    include '../includes/footer-views.php';

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
        $('#text').summernote();
    });
</script>
