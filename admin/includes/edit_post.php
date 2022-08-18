<?php

if(isset($_GET['p_id']))
{
    $post_id = $_GET['p_id'];
    $query = "SELECT * FROM posts WHERE post_id=$post_id";
    $select_posts = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_posts))
    {
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_tags = $row['post_tags'];
        $post_image = $row['post_image'];
        $post_comments_count = $row['post_comments_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
    }
}

if(isset($_POST['edit_post']))
{
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_content = $_POST['post_content'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_comments_count = 0;
    $post_date = date('d-m-y');
    move_uploaded_file($post_image_temp,"../images/$post_image");

    if(empty($post_image))
    {
        $query= "SELECT * FROM posts WHERE post_id = $post_id";
        $select_image = mysqli_query($connection,$query);
        ConfrimQuery($select_image);
        while($row = mysqli_fetch_assoc($select_image))
        {
            $post_image = $row['post_image'];
        }
    }
    $query = "UPDATE posts SET post_category_id = $post_category_id, post_title = '$post_title', post_author = '$post_author', 
    post_date = 'now()', post_image = '$post_image', post_content = '$post_content', post_tags = '$post_tags', 
    post_comments_count = $post_comments_count, post_status = '$post_status' WHERE post_id = $post_id";
    $update_post_query = mysqli_query($connection,$query);
    ConfrimQuery($update_post_query);

    echo "<p> Post Updated. <a href ='../post.php?p_id=$post_id'> View Post </a> or <a href ='posts.php'> Edit More Posts </a> </p>";
}
?>
<form action="" enctype="multipart/form-data" method="post">

    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo $post_title?>">
    </div>
    <div class="form-group">
        <select name="post_category_id" id="">
            <?php
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection,$query);
                ConfrimQuery($select_categories);
                while($row = mysqli_fetch_assoc($select_categories))
                {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    if($post_category_id == $cat_id)
                    {
                        echo "<option selected value=$cat_id>$cat_title</option>";
                    }
                    else
                    {
                        echo "<option value=$cat_id>$cat_title</option>";
                    }
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $post_author?>">
    </div>
    <div class="form-group">
        <select name="post_status" id="">

                <option value="<?php echo $post_status?>"><?php echo $post_status?></option>
                <?php 
                if($post_status  === 'published')
                {
                    echo "<option value='draft'>Draft</option>";
                }
                else
                {
                    echo "<option value='published'>Published</option>";
                }
                ?>
        </select>
        <!-- <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" value="<?php echo $post_status?>"> -->
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img  width=100 class='img-responsive' src='../images/<?php echo $post_image?>' alt='image'>
        <input type="file" class="form-control" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags?>">
    </div>
    <div class="form-group">
        <label for="summernote">Post Content</label>
        <textarea name="post_content" class="form-control" id="summernote" cols="30" rows="10"><?php echo $post_content?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_post" value="Edit Post">
    </div>

</form>