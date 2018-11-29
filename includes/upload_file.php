<?php
include 'database-connection.php';
session_start();
/**
 * If the file is sent via a form with 'enctype="multiplart/form-data"' the
 * file is saved go the superglobal '$_FILES' variable and inside of $_FILES["image"]
 */
$image = $_FILES["image"];
$image_text = $_POST["text"];
$title = $_POST["title"];
$user_id = $_SESSION["user_id"];
$date = date('l jS \of F Y h:i:s A');
$category = $_POST["category_checkbox"];

foreach($category as $key => $value) {
  $category = $value;
  
}

/**
 * When it is uploaded it is stored at a temporary location inside a /tmp folder
 * on your computer or server. We must move this temporary file to a permanent location
 * which we will do futher down. The path to the temporary location is inside of $_FILES["image"]["tmp_name"]
 */
$temporary_location = $image["tmp_name"];
/**
 * We must create a new filename and location and decide where we will put the uploaded file.
 * We can specify this new location as 'uploads/' (the name of the folder where we want our images)
 * and then reuse the name of the uploaded file. In my example the file is named 'tired.png' so the
 * new file will be named 'uploads/tired.png'
 */
$new_location = "../views/uploads/" . $image["name"];

/**
 * 'move_uploaded_file' moves the file from the temporary location to your newly specified location
 * if the transfer is complete we will get a true/false return value from the function indiciating
 * everything went ok with the transfer of the file
 */
$upload_ok = move_uploaded_file($temporary_location, $new_location);
/**
 * If the transfer went OK we can insert the pathname to the image into the database, not the actual
 * file, the file is stored in a folder, and the path to the file is saved in the database as a VARCHAR
 * Here I am also sending along the text from the editor, that text is saved as usual in $_POST
 */
if($upload_ok){
  $statement = $pdo->prepare("INSERT INTO posts (image, content, title, date, created_by, category) VALUES (:image, :content, :title, :date, :created_by, :category)");
  $statement->execute(
    [
        ":image" => $new_location,
        ":content"  => $image_text,
        ":created_by" => $user_id,
        ":title" => $title,
        ":date" => $date,
        ":category" => $category
    ]
);
}

/*$fetch_all_post_id_statement = $pdo->prepare("SELECT id FROM `posts` ORDER BY id DESC");
$fetch_all_post_id_statement->execute();

$post_id = $fetch_all_post_id_statement->fetchAll(PDO::FETCH_ASSOC);

$latest_post_id = $post_id[0];

var_dump($latest_post_id);

$category_id = $_POST["category_checkbox"];

var_dump($_POST["category_checkbox"]);

foreach($latest_post_id as $key => $value) {
  $category_id = $value;
}

$statement = $pdo->prepare("INSERT INTO post_categories (post_id, category_id) VALUES (:post_id, :category_id)");
$statement->execute(
  [
      ":post_id" => $value,
      ":category_id" => $category_id
      
  ]
);

  );*/

header ('location: ../views/feed.php');
