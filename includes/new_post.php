<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>File Upload Demo</title>
  <link rel="stylesheet" href="css/style.css">
  <!-- Link dependecies for the editor -->
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">

</head>
</head>
<body>

  <?php

  include "database-connection.php";
  include 'fetch_images.php';
  foreach($all_images as $image): ?>
    <div>
      <img src="<?= $image["image"]; ?>" alt="Cool image.">
      <div>
        <?= $image["title"]; ?>
        <?= $image["content"]; ?>
      </div>
    </div>
  <?php
  endforeach;
  ?>
  <h2>Hej</h2>
  <main>
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
      

      <textarea name="text" id="text" ></textarea>
      <input type="submit" value="Send">
    </form>
  </main>

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