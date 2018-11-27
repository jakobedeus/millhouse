  <?php
  include "head-views.php";
  include "database-connection.php";
  include 'fetch_posts.php';

  ?>

  <div class="container justify-content-center">
  <h2>Hej</h2>
  <main class="col-12">
   <!-- If we are sending a file in a form we must supply the extra attribute
         'encytype="multipart/form-data"', otherwise the file will be sent as a
         string and not uploaded to the server, otherwise the form is similar to every other form -->
         <form action="upload_file.php" method="POST" enctype="multipart/form-data">
      <label for="image">Image</label>
      <!-- Use 'type="file"' to automatically create a input-field for uploads -->
      <input type="file" name="image" id="image">
      <!-- Use a textarea for a bigger input-field, put an ID on the area for the
           wysiwyg-editor to initialize on -->
      <label for="title">Title</label>
      <input type="text" name="title" id="title">

      <section class="new_post_category">
        <label for="category_sunsglass">Sun glasses</label>
        <input type="checkbox" name="category_sunsglass" id="category_sunsglass">

        <label for="category_living">Living</label>
        <input type="checkbox" name="category_sunsglass" id="category_living">

        <label for="category_watches">Watches</label>
        <input type="checkbox" name="category_sunsglass" id="category_watches">
      </section>
      
      

      <textarea name="text" id="text" ></textarea>
      <input type="submit" value="Send">
    </form>

  <?php 
  foreach($all_posts as $post): ?>
    <div class="col-12 row">
        <div class="col-4">
            <img src="<?= $post["image"]; ?>" alt="Cool image.">
        </div>
        <div class="col-8">
            <h2><?= $post["title"]; ?></h2>
            <p><?= $post["content"]; ?></p>
        </div>
    </div>
  <?php
  endforeach;
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