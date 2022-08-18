<?php
    if(isset($_POST['create_user']))
    {
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_lastname'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_temp,"../images/$user_image");

        $query = "INSERT INTO users(user_username, user_password, user_firstname, 
        user_lastname, user_email, user_image, user_role, user_randsalt) 
        VALUE('$user_username','$user_password','$user_firstname','$user_lastname',
        '$user_email','$user_image','$user_role','any salt')";
        $create_user_query = mysqli_query($connection,$query);
        ConfrimQuery($create_user_query);
        echo "User Created:  <a href='users.php'> View Users </a>";
    }
?>
<form action="" enctype="multipart/form-data" method="post">

    <div class="form-group">
        <label for="user_username">UserName</label>
        <input type="text" class="form-control" name="user_username">
    </div>
        <div class="form-group">
        <label for="post_category_id">User Role</label>
        <br>
        <select name="user_role" id="">
            <option value='subcriber'>Select User Role</option>";
            <option value='admin'>Admin</option>";
            <option value='subscribe'>Subscribe</option>";
        </select>
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>
        <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <label for="user_image">Image</label>
        <input type="file" class="form-control" name="user_image">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
    </div>

</form>