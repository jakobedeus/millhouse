<?php
session_start();

include "../includes/head-views.php";
include "../includes/header-views.php";


$posts_fetch = new PostsFetch($pdo);
$all_posts= $posts_fetch->fetchAll();  
$post_category= $posts_fetch->fetchPostByCategory();

$category = new PostsFetch($pdo);
$all_category= $category->fetchCategory();

$insert_post = new PostsInsert($pdo);
$upload_ok = $insert_post->InsertPosts();


?>
<div class="container justify-content-center">
   
    <div class="row justify-content-center mb-5">
    <main class="col-12 col-md-10">
        <h2 class="font_h2">Write new post: </h2>
        <!-- If we are sending a file in a form we must supply the extra attribute
        'encytype="multipart/form-data"', otherwise the file will be sent as a
        string and not uploaded to the server, otherwise the form is similar to every other form -->
        <form action="feed.php" method="POST" enctype="multipart/form-data">
            <label for="image">Image</label>
            <!-- Use 'type="file"' to automatically create a input-field for uploads -->
            <input type="file" name="image" id="image" required>
            <!-- Use a textarea for a bigger input-field, put an ID on the area for the
            wysiwyg-editor to initialize on -->
            <label for="title">Title</label><br />
            <input type="text" name="title" id="title" required><br />

            <select name="category_checkbox[]" id="" required>
                <option value="">Choose category</option>
                <option value="1">Living</option>
                <option value="2">Sun glasses</option>
                <option value="3">Watches</option>
            </select>
            <textarea name="text" id="text"></textarea>
            <input class="button" type="submit" value="Send">
        </form>
        </div>


        <?php
        if(isset($_GET['category'])){

            //var_dump($_GET['category']);
            //Ska hämta annan foreach från annan metod i classen 
            foreach(array_reverse($post_category) as $category): ?>
                <div class="row mb-5 justify-content-center blog_posts">
                    <div class="col-12 col-md-7">
                        <h2 class="font_h2"><?= $category["title"]; ?></h2>
                        <p><?= $category["date"] . ' - ' . $category["category"];?></p>
                        <p><?= '<strong> Wrote by: </strong>' . $category["username"]; ?></p>
                        <p><?= $category["content"];  ?></p> 
                        <p> 0 kommentarer <a href="post.php?id=<?= $category["id"]; ?>"><button class="button">Go to post</button></a></p>
                    </div>
                    <div class="post_image_frame col-12 col-md-5 p-0">
                        <img src="<?= $category["image"]; ?>" alt="Cool image.">
                    </div>
                </div>
            <?php
            endforeach;

        }else{
    
            foreach(array_reverse($all_posts) as $post): ?>
                <div class="row mb-5  justify-content-center blog_posts">
                    <div class="post_content_text ol-12 col-md-7">
                        <h2 class="font_h2"><?= $post["title"]; ?></h2>
                        <p><?= $post["date"] . ' - ' . $post["category"];?></p>
                        <p><?= '<strong> Wrote by: </strong>' . $post["username"]; ?></p>
                        <p class="post_content"><?= $post["content"];  ?></p> 
                        <p> 0 kommentarer <a href="post.php?id=<?= $post["id"]; ?>"><button class="button">Go to post</button></a></p>
                    </div>
                    <div class="post_image_frame col-12 col-md-5 p-0">
                        <img src="<?= $post["image"]; ?>" alt="Cool image.">
                    </div>
                </div>
            <?php
            endforeach;
        }
            ?>

    </main>
</div><!-- container -->

<?php
    include '../includes/footer-views.php';
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
        $('#text').summernote();
    });
</script>
</body>
</html>
