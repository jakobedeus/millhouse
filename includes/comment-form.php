<form action="../includes/update-page.php#comments" method="POST">
    <label for="comments"></label>
    <input type="hidden" name="comment_post_id" value="<?= $post["id"]; ?>">
    <textarea class="post_input_comment"name="content" rows="5" cols="50" placeholder="Write your comment here" required></textarea>
    <br>
    <button type="submit" class="general_button post_comment_button">POST COMMENT</button>
</form>
