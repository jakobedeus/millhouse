<form action="../includes/update-page.php" method="POST" enctype="multipart/form-data">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" name="MAX_FILE_SIZE" value="2097152" >
    <label for="title">Title</label><br />
    <input type="text" name="title" id="title"><br />
    <select name="category_list[]" id="">
        <option value="">Choose category</option>
        <?php 
            foreach ($all_category as $category_value) {?>
                <option value="<?= $category_value["id"]  ?>"><?= $category_value["category"] ?></option><?php
            }  
        ?>
    </select>
    <textarea name="text" id="text"></textarea>
    <!-- Send hidden value in order to select the correct $_POST on update-page.php -->
    <input type="hidden" name="new_post" id="new_post" value="<?= $post["id"]; ?>">
    <input class="general_button" type="submit" value="Send">
</form>