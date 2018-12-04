
<?php

include '../classes/PostsFetch.php';
include '../classes/PostsEdit.php';
include '../classes/PostsInsert.php';
include '../classes/Comments.php';


$category = new PostsFetch($pdo);
$all_category= $category->fetchCategory(); 
?>
<body class="body_views">
    <header class="container-fluid p-4">
        <div class="row d-flex justify-content-between">
            <div class="col-12 p-4 logo_container">
                <a href="../index.php" class="container d-flex justify-content-center"><img src="../images/logo_borders.png" alt="Logotype"></a>
            </div>
            <nav class="d-flex col-12 justify-content-center">
                <div class="container justify-content-between row">
                    <a href=""><button class="button-inverted-dark"><i class="col-6 col-lg-4 order-1 fas fa-envelope"></i> GET IN TOUCH</button></a>
                    <div class="col-6 col-lg-4 order-3 order-md-2 category_container d-flex align-items-center">

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
                    <div class="col-6 col-lg-4 order-2 order-md-3 d-flex align-items-center">
                        <p><?php 
                        if(isset($_SESSION["username"])){ 
                            ?> Logged in as: <b><?= $_SESSION["username"]; ?>
                        <?php
                        }
                        ?>       
                        </b></p>
                        <a href="../includes/logout.php"><button class="button-inverted-light">LOG OUT</button></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>