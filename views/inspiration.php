<?php
session_start();
include "../includes/head-views.php";


if(empty($_SESSION["username"])){

    header("Location: ../index.php");


}else {
?>

<main class="inspirational">
    <div class="parallax" title="background image">
      <div class="blue_overlay">
        <h1 class="inspiration">LUXURY IS IN EACH DETAIL.</h1>
        <div class="angle_left">
          <i class="fas fa-angle-left"><a href="feed.php" class="parallax_link">MILLHOUSE</i></a>
        </div>
      </div>
    </div>
      <div class="parallax_2" title="living inspiration">
        <div class="white_overlay">
          <p class="parallax_paragraph"><a href="feed.php?category=living" class="parallax_link">LIVING.</a></p>
        </div>
      </div>
      <div class="parallax_3" title="watches">
        <div class="white_overlay">
          <p class="parallax_paragraph"><a href="feed.php?category=watches" class="parallax_link">WATCHES.</a></p>
        </div>
      </div>
      <div class="parallax_4" title="sunglasses">
        <div class="white_overlay">
          <p class="parallax_paragraph"><a href="feed.php?category=sunglasses" class="parallax_link">SUNGLASSES.</a></p>
        </div>
      </div>
  </div>
</main>
<?php
}
?>
