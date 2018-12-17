<div class="col-12 col-md-11 col-lg-8 post_border_bottom_comments">
    <h4 class="font_h2"><?=$comment["username"];?></h4>
    <strong><i class="fas fa-clock" aria-label="time icon"></i> <?=$comment["date"];?></strong>
    <p><?=$comment["content"];?></p>
    <?php
    // Display delete button only for users who created the comment or have admin role.
    if($_SESSION["admin"] === "is_admin" || $_SESSION["user_id"] === $comment["created_by"]){?>
        <!-- Send form to update-page.php and then scroll down to comment section -->
        <form action="../includes/update-page.php#comments" method="POST">
            <!-- Send hidden value in order to select the correct $_POST and to redirect to the correct page on update_page.php -->
            <input type="hidden" name="single_comment_id_delete_redirect" value="<?= $post["id"]; ?>">
            <input type="hidden" name="single_comment_id_delete" value="<?= $comment["comment_id"]; ?>">
            <button class="btn btn-light icon_buttons" type="submit"><i class="far fa-trash-alt delete_comment_btn" aria-label="delete comment"></i></button>
        </form>
    <?php
    }?>
</div><!-- closing col-12-->