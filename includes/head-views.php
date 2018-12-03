<?php
session_start();

include '../classes/PostsFetch.php';
include '../classes/PostsEdit.php';

$category = new PostsFetch($pdo);
$all_category= $category->fetchCategory(); 
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Font Awsome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans" rel="stylesheet">

        <!-- My CSS -->
        <link rel="stylesheet" href="../css/style.css" type="text/css">

        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
        
        <title>Millhouse</title>
    </head>
    <body>

    <header class="container-fluid p-4">
    <div class="row d-flex justify-content-between">
        <div class="col-12 p-4 logo_container">
            <a href="../index.php" class="container d-flex justify-content-center"><img src="../images/logo_borders.png" alt="Logotype"></a>
        </div>
        <nav class="d-flex col-12">
            <div class="container justify-content-between row">
                <a href=""><button class="button-inverted-dark"><i class="fas fa-envelope"></i> GET IN TOUCH</button></a>
                <div class="category_container d-flex align-items-center">

                    <?php
                    foreach($all_category as $post1):?>
                    
                        <?php $product_category = $post1['category'];?>
                        <ul>    
                            <li><a href="feed.php?category=<?= $product_category; ?>"><?= $product_category; ?></a></li>
                        </ul>
                  
                    <?php
                    endforeach;                    
                    ?>

                </div>
                <div class="row d-flex align-items-center">
                    <p><?php if(isset($_SESSION["username"])){ ?> Logged in as: <b><?= $_SESSION["username"]; ?>
                    <?php
                    }
                    ?>       </b></p>
                    <a href="../includes/logout.php"><button class="button-inverted-light">LOG OUT</button></a>
                </div>
            </div>
        </nav>
        </div>
    </header>
        