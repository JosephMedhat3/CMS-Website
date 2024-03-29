<!-- Database Connection -->
<?php include("includes/db.php"); ?>
<!-- Header -->
<?php include("includes/header.php"); ?>
<!-- Navigation -->
<?php include("includes/navigation.php"); ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
            if(isset($_GET['p_id']))
            {
                $post_id = $_GET['p_id'];
            }
                $query = "SELECT * FROM posts WHERE post_id = $post_id";
                $select_post= mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_post))
                {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
            ?>
                    <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <hr>
            <?php
            if(isset($_POST['create_comment']))
            {
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];
                if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content))
                {
                    $query="INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)
                    VALUES ($post_id,'$comment_author', '$comment_email', '$comment_content','unapproved',now())";
                    $create_comment_query = mysqli_query($connection, $query);
    
                    $query="UPDATE posts SET post_comments_count = post_comments_count + 1 WHERE post_id = $post_id";
                    $update_comment_count_query = mysqli_query($connection, $query);
                }
                else
                {
                    echo"<script>alert('Fields cannot be empty') </script>";
                }

            }
            ?>
            <!-- Form Comment -->
            <div class="well">
                <h4>Leave a Comment</h4>
                <form role="form" method="post" action="">
                    <div class="form-group">
                        <label for="comment_author">Author</label>
                        <input class="form-control" type="text" name="comment_author">
                    </div>
                    <div class="form-group">
                    <label for="comment_author">Email</label>
                        <input class="form-control" type="text" name="comment_email">
                    </div>
                    <div class="form-group">
                        <label for="comment_author">Comment</label>
                        <textarea class="form-control" name="comment_content" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit" name="create_comment">Submit</button>
                </form>
            </div>

            <!-- Comment -->
            <?php
                $query = "SELECT * FROM comments WHERE comment_post_id = $post_id
                AND comment_status='approved' ORDER BY comment_id DESC";
                $select_comments_query= mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_comments_query))
                {
                    $comment_date = $row['comment_date'];
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    ?>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $comment_author?>
                                <small><?php echo $comment_date?></small>
                            </h4>
                            <?php echo $comment_content?>
                        </div>
                    </div>
                    
        <?php   } ?>
            

            <?php
            
                }
            ?>
            </div>

    <!-- Blog Sidebar Widgets Column -->
<?php include("includes/sidebar.php"); ?>
        </div>
        <!-- /.row -->

        <hr>
    <!-- Footer -->
<?php include("includes/footer.php"); ?>