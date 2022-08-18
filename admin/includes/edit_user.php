<?php
if(isset($_GET['edit']))
{
    $user_id = $_GET['edit'];
    $query = "SELECT * FROM users WHERE user_id=$user_id";
    $select_user = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_user))
    {
        $user_username = $row['user_username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password = $row['user_password'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];
    }
}
    if(isset($_POST['edit_user']))
    {
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_temp,"../images/$user_image");

        if(empty($user_image))
        {
            $query= "SELECT * FROM users WHERE user_id = $user_id";
            $select_image = mysqli_query($connection,$query);
            ConfrimQuery($select_image);
            while($row = mysqli_fetch_assoc($select_image))
            {
                $user_image = $row['user_image'];
            }
        }
        $query = "UPDATE users SET user_username = '$user_username', user_password = '$user_password', user_firstname = '$user_firstname', 
        user_lastname = '$user_lastname', user_email = '$user_email', user_role = '$user_role', user_image = '$user_image'
        WHERE user_id =$user_id";
        $update_user_query = mysqli_query($connection,$query);
        ConfrimQuery($update_user_query);
    }
?>
<form action="" enctype="multipart/form-data" method="post">

    <div class="form-group">
        <label for="user_username">UserName</label>
        <input type="text" class="form-control" name="user_username" value =<?php echo $user_username?>>
    </div>
        <div class="form-group">
        <label for="post_category_id">User Role</label>
        <br>
        <select name="user_role" id="">
            <option value='subcriber'>Select User Role</option>";
            <?php
                if($user_role=='admin')
                {
                    echo "<option value='subscribe'>Subscribe</option>";
                }
                else
                {
                    echo "<option value='admin'>Admin</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value =<?php echo $user_firstname?>>
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value =<?php echo $user_lastname?>>
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email" value =<?php echo $user_email?>>
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" value =<?php echo $user_password?>>
    </div>
    <div class="form-group">
        <label for="user_image">Image</label>
        <img  width=100 class='img-responsive' src='../images/<?php echo $user_image?>' alt='image'>
        <input type="file" class="form-control" name="user_image">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
    </div>

</form>