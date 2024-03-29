<?php 
    if(isset($_POST['checkBoxArray']))
    {
       foreach($_POST['checkBoxArray'] as $PostValueID)
       {
            $bulk_option = $_POST['bulk_options'];
            switch($bulk_option)
            {
                case 'published':
                    $query = "UPDATE posts SET post_status = '$bulk_option' WHERE post_id=$PostValueID";
                    $update_to_published = mysqli_query($connection, $query);
                    break;
                case 'draft':
                    $query = "UPDATE posts SET post_status = '$bulk_option' WHERE post_id=$PostValueID";
                    $update_to_draft = mysqli_query($connection, $query);
                    break;
                case 'delete':
                    $query = "DELETE FROM posts WHERE post_id=$PostValueID";
                    $update_to_delete = mysqli_query($connection, $query);
                    break;
                        
            }
       }
    }
?>
<form action="" method="post">
<table class="table table-bordered table-hover">
    <div id="bulkOptionsContainer" class="col-xs-4">
        <select class="form-control" name="bulk_options" id="">
            <option value="">Select Option</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
        </select>
    </div>

    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="./posts.php?source=add_post">Add New</a>
    </div>
    <br><br>
    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Tags</th>
            <th>Content</th>
            <th>Image</th>
            <th>Comments</th>
            <th>Date</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_posts))
        {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_tags = $row['post_tags'];
            $post_image = $row['post_image'];
            $post_comments_count = $row['post_comments_count'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
            echo "<tr>";
            echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$post_id'></td>";
            echo "<td>$post_id</td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_title</td>";

            $query = "SELECT * FROM categories WHERE cat_id=$post_category_id";
            $select_category = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_category))
            {
                $cat_title = $row['cat_title'];
            }

            echo "<td>$cat_title</td>";
            echo "<td>$post_status</td>";
            echo "<td>$post_tags</td>";
            echo "<td>$post_content</td>";
            echo "<td> <img  width=200 class='img-responsive' src='../images/$post_image' alt='image'></td>";
            echo "<td>$post_comments_count</td>";
            echo "<td>$post_date</td>";
            echo "<td><a href ='../post.php?p_id=$post_id'>View</a></td>";
            echo "<td><a href ='posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
            echo "<td><a href ='posts.php?delete=$post_id'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>
</form>
<?php
    if(isset($_GET['delete']))
    {
        $post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id=$post_id";
        $delete_post = mysqli_query($connection,$query);
        ConfrimQuery(($delete_post));
        header("Location: posts.php");
    }
?>