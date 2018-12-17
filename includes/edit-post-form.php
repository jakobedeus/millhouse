<form action="../includes/update-page.php" method="POST" enctype="multipart/form-data" class="m-4 p-4">
    <label for="title">Title</label>
    <!-- Insert fetched posts data as values to make it editable -->
    <input type="text" name="title" id="title" value="<?= $post["title"] ?>"><br />
    <label for="image">Image</label>
    <input type="file" name="image" id="image"><br />
    <select name="category_list[]" id="">
        <option value="">Choose category</option>
        <?php 
        foreach ($all_category as $category_value) {
            // Loop out categories form database, is the category which is set on the post is the same as Categories table in database, set it as default.
            if ($post["id_category"] == $category_value["id"]) {
                ?> <option value="<?= $category_value["id"] ?>" selected><?= $category_value["category"] ?></option> 
                <?php
            } else {?>
                <option value="<?= $category_value["id"]  ?>"><?= $category_value["category"] ?></option>
            <?php
            }  
        }
        ?>
    </select>
    <input type="hidden" name="existing_image" value="<?= $post["image"];  ?>">
    <textarea name="content" id="text_edit"><?= $post["content"] ?></textarea>
    <!-- Send hidden value in order to select the correct $_POST on update-page.php -->
    <input type="hidden" name="single_post_id_update" value="<?= $post["id"]; ?>">
    <button type="submit" class="general_button">UPDATE</button>
</form>