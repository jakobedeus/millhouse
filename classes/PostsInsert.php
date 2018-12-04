<?php

$pdo = new PDO(
    "mysql:host=localhost;dbname=millhouse;charset=utf8",
    "root", //user
    "root"  //password

);

class PostsInsert {

    private $pdo;

    public function __construct($pdo){
        
        $this->pdo = $pdo;
    }

    public function InsertPosts(){

        $image = $_FILES["image"];
        $image_text = $_POST["text"];
        $title = $_POST["title"];
        $user_id = $_SESSION["user_id"];
        $date = date('Y/m/d H:i:s');
        $id_category = $_POST["category_checkbox"];

        foreach($id_category as $key => $value) {
            $id_category = $value;
      
        }
        $temporary_location = $image["tmp_name"];
        $new_location = "../views/uploads/" . $image["name"];
        $upload_ok = move_uploaded_file($temporary_location, $new_location);

        if($upload_ok){
            $statement = $this->pdo->prepare("INSERT INTO posts (image, content, title, date, created_by, id_category) VALUES (:image, :content, :title, :date, :created_by, :id_category)");
            $statement->execute(
              [
                  ":image" => $new_location,
                  ":content"  => $image_text,
                  ":created_by" => $user_id,
                  ":title" => $title,
                  ":date" => $date,
                  ":id_category" => $id_category
              ]
        );

        return $upload_ok;
        }


    
    




    }


}