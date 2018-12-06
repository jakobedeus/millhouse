
<?php

include '../classes/PostsFetch.php';
include '../classes/PostsEdit.php';
include '../classes/PostsInsert.php';
include '../classes/Comments.php';
include '../includes/functions.php';


$category = new PostsFetch($pdo);
$all_category= $category->fetchCategory(); 
?>
<body class="body_views">
    <header class="container-fluid p-4">
        <div class="row">
            <div class="col-12 p-4 logo_container">
                <a href="../index.php" class="container d-flex justify-content-center"><img src="../images/logo_borders.png" alt="Logotype"></a>
            </div>
            <nav class="d-flex col-12  p-4 justify-content-center">
                <div class="container d-flex row">

                    <div class="col-4 col-md-3 d-flex align-self-center">
                        <a href="mailto:info@millhouse.com"><button class="button_inverted_dark text-center"><i class=" order-1 fas fa-envelope"></i> GET IN TOUCH</button></a>
                    </div>

                    <div class="col-12 col-md-6 order-3 pt-4 order-md-2 category_container d-flex justify-content-center align-self-center">
                        <ul>
                            <li><a href="feed.php"><p>ALL</p></a></li>
                        </ul>           
                        <?php
                        foreach($all_category as $post1):?>
                            <?php $product_category = $post1['category'];?>
                                <ul>
                                    <li><a href="feed.php?category=<?= $product_category; ?>"><p class="text-uppercase"><?= $product_category; ?></p></a></li>
                                </ul>
                        <?php
                        endforeach;                    
                        ?>
                    </div>

                    <div class="col-8 col-md-3 order-2 order-md-3 d-flex align-items-center">
                        <?php 
                        if(isset($_SESSION["username"])){ 
                            ?><p class="mr-3"> LOGGED IN AS: <b><?= $_SESSION["username"]; ?>
                        <?php
                        }
                        ?>       
                        </b></p>

                            <a href="../includes/logout.php"><button class="button_inverted_light text-center">LOG OUT</button></a>
                    </div>

                </div>
            </nav>
        </div>
    </header>