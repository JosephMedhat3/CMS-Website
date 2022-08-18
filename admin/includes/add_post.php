<?php
    if(isset($_POST['create_post']))
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

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, 
        post_image, post_content, post_tags, post_comments_count, post_status) 
        VALUE($post_category_id,'$post_title','$post_author',now(),'$post_image',
        '$post_content','$post_tags',$post_comments_count,'$post_status')";
        $create_post_query = mysqli_query($connection,$query);
        ConfrimQuery($create_post_query);
        $post_id = mysqli_insert_id($connection);
        echo "<p> Post Created. <a href ='../post.php?p_id=$post_id'> View Post </a> or <a href ='posts.php'> Edit More Posts </a> </p>";
    }
?>
<form action="" enctype="multipart/form-data" method="post">

    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
        <div class="form-group">
        <label for="post_category_id">Post Category Id</label>
        <select name="post_category_id" id="">
            <?php
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection,$query);
                ConfrimQuery($select_categories);
                while($row = mysqli_fetch_assoc($select_categories))
                {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option value=$cat_id>$cat_title</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <select name="post_status">
                <option value="draft">Post Status</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="summernote">Post Content</label>
        <textarea name="post_content" class="form-control" id="summernote" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>

</form>