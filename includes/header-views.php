
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
            <div class="col-12 p-4 logo_container text-center">
                <h1><a href="../index.php"><img src="../images/logo_borders.png" alt="Logotype"></a></h1>
            </div>
        </div>
        <nav class="row p-4">
            <div class="col-6 col-md-3 align-self-center text-center contact">
                <a href="mailto:info@millhouse.com"><button class="button_inverted_dark text-center"><i class=" order-1 fas fa-envelope"></i> GET IN TOUCH</button></a>
            </div>
            <div class="col-12 order-3 col-md-6 order-md-2 pt-4 category_container d-flex justify-content-center">
                <ul>
                    <li><a href="feed.php"><p>ALL</p></a></li>
                </ul>
                <?php
                foreach($all_category as $category_link):
                $product_category = $category_link['category'];
                ?>
                    <ul>
                        <?php  
                        if(isset($_GET["category"]) && $_GET["category"]==$product_category)  {?>
                        <li><a href="feed.php?category=<?= $product_category; ?>"><p class="underline text-uppercase"><?= $product_category; ?></p></a></li>
            
                        <?php 
                        } else { ?>
                        <li><a href="feed.php?category=<?= $product_category; ?>"><p class="text-uppercase"><?= $product_category; ?></p></a></li>
                        <?php 
                        }?>
                        
                    </ul>
                <?php
                endforeach;
                ?>
            </div>
            <div class="col-6 order-2 col-md-3 logout align-self-center text-center">
                <a href="../includes/logout.php" class="col-12"><button class="button_inverted_light text-center">LOG OUT</button></a>    
            </div>
        </nav>
    </header>
