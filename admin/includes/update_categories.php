<!-- Edit Form -->
<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>
        <?php
        if(isset($_GET['edit']))
        {
            $cat_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id=$cat_id";
            $select_category = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_category))
            {
                $cat_title = $row['cat_title'];
            }
        }
        ?>
        <input class="form-control" type="text" name="cat_title" value="<?php if(isset($cat_title)){ echo $cat_title;} ?>">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit_update" value="Update Category">
    </div>
</form>
<?php
    if(isset($_POST['submit_update']))
    {
        $cat_title = $_POST['cat_title'];
        $query = "UPDATE  categories SET cat_title='$cat_title ' WHERE cat_id=$cat_id";
        $update_categories_query = mysqli_query($connection,$query);
        header("Location: categories.php");
    }
?>