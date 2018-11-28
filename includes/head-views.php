<?php
session_start();
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

    <header class="container p-4">
    <div class="d-flex justify-content-between border-bottom">
        <div class="col-2 pb-4">
            <a href="../index.php">
                <img src="../images/logo_borders.png" alt="Logotype" style="width:100%; color:black">
            </a>
        </div>
        <nav class="col-10 align-self-center">
        <h2>
        <?php
        if(isset($_SESSION["username"])){
        ?>
             Hej <?= $_SESSION["username"]; ?>
        <?php
        }
        ?>
    </h2>
            <a href="../includes/logout.php"><button class="btn btn-danger">Log out</button></a>
        </nav>
        </div>
    </header>
        