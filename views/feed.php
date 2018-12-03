<?php
    include "../includes/head-views.php";
    //include '../classes/Posts.php';
    //include "../includes/database-connection.php";
    //include '../includes/fetch_posts.php';
    //include '../includes/database-connection.php';

$posts_fetch = new Posts($pdo);
$all_posts= $posts_fetch->fetchAll();  
$post_category= $posts_fetch->fetchPostByCategory();

//$category = new Posts($pdo);
//$post_category= $category->fetchPostByCategory();


//print_r($posts->fetchAll());
//echo $posts->fetchAll();
//echo $posts->$all_posts;

?>
<div class="container justify-content-center">
<h2>
   Write new post: <?php //var_dump($_POST["post_id"]); ?>
</h2>
<main class="col-12">
    <!-- If we are sending a file in a form we must supply the extra attribute
     'encytype="multipart/form-data"', otherwise the file will be sent as a
     string and not uploaded to the server, otherwise the form is similar to every other form -->
    <form action="../includes/upload_file.php" method="POST" enctype="multipart/form-data">
        <label for="image">Image</label>
        <!-- Use 'type="file"' to automatically create a input-field for uploads -->
        <input type="file" name="image" id="image" required>
        <!-- Use a textarea for a bigger input-field, put an ID on the area for the
        wysiwyg-editor to initialize on -->
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>

        <select name="category_checkbox[]" id="" required>
            <option value="">Choose category</option>
            <option value="1">Living</option>
            <option value="2">Sun glasses</option>
            <option value="1">Watches</option>
        </select>
       <textarea name="text" id="text" ></textarea>
       <input type="submit" value="Send">
    </form>


    <?php
    if(isset($_GET['category'])){

        //var_dump($_GET['category']);
        //Ska hämta annan foreach från annan metod i classen 
        foreach(array_reverse($post_category) as $category): ?>
        <div class="col-12 row mb-4 border border-dark justify-content-between">
            <div class="col-4">
                <h2><?= $category["title"]; ?></h2>
                <p><?= $category["date"] . '<strong> Category: </strong>' . $category["category"] . '<strong> Wrote by: </strong>' . $category["username"]; ?></p>
                <p><?= $category["content"];  ?></p>            
                <a href="post.php?id=<?= $category["id"]; ?>">Go to post</a>
            </div>
            <div class="col-8">
                <img src="<?= $category["image"]; ?>" alt="Cool image.">
            </div>
        </div>

     <?php
    endforeach;

    }else{
    
        foreach(array_reverse($all_posts) as $post): ?>
            <div class="col-12 row mb-4 border border-dark justify-content-between">
                <div class="col-4">
                    <h2><?= $post["title"]; ?></h2>
                    <p><?= $post["date"] . '<strong> Category: </strong>' . $post["category"] . '<strong> Wrote by: </strong>' . $post["username"]; ?></p>
                    <p><?= $post["content"];  ?></p>

                    <a href="post.php?id=<?= $post["id"]; ?>">Go to post</a>
                </div>
                <div class="col-8">
                    <img src="<?= $post["image"]; ?>" alt="Cool image.">
                </div>
            </div>

         <?php
        endforeach;
    }
    ?>

    <?php
    include '../includes/footer-views.php';
    ?>


  </main>
  </div>

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
