<?php
session_start();
include "../includes/head-views.php";


if(empty($_SESSION["username"])){

    header('Location: ../index.php');


}else {
?>

<main class="inspirational">
    <div class="parallax">
      <div class="blue_overlay">
        <h1 class="inspiration">LUXURY IS IN EACH DETAIL.</h1>
        <div class="angle_left">
          <i class="fas fa-angle-left">MILLHOUSE</i>
        </div>
      </div>
    </div>
      <div class="parallax_2">
        <div class="white_overlay">
          <p class="parallax_paragraph"><a href="feed.php?category=living">LIVING.</a></p>
        </div>
      </div>
      <div class="parallax_3">
        <div class="white_overlay">
          <p class="parallax_paragraph"><a href="feed.php?category=watches">WATCHES.</a></p>
        </div>
      </div>
      <div class="parallax_4">
        <div class="white_overlay">
          <p class="parallax_paragraph"><a href="feed.php?category=sunglasses">SUNGLASSES.</a></p>
        </div>
      </div>
  </div>
</main>
<?php
}
?>
