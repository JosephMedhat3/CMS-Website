<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>Firstname</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
            <th>Admin</th>
            <th>Subscribe</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_users))
        {
            $user_id = $row['user_id'];
            $user_username = $row['user_username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];
            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$user_username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";
            echo "<td> <img  width=200 class='img-responsive' src='../images/$user_image' alt='image'></td>";
            echo "<td>$user_role</td>";
            echo "<td><a href ='users.php?change_to_admin=$user_id'>Admin</a></td>";
            echo "<td><a href ='users.php?change_to_sub=$user_id'>Subscriber</a></td>";
            echo "<td><a href ='users.php?source=edit_user&edit=$user_id'>Edit</a></td>";
            echo "<td><a href ='users.php?delete=$user_id'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>
<?php
    if(isset($_GET['change_to_admin']))
    {
        $user_id = $_GET['change_to_admin'];
        $query = "UPDATE users SET user_role='admin'WHERE user_id=$user_id";
        $change_role_query = mysqli_query($connection,$query);
        ConfrimQuery(($change_role_query));
        header("Location: users.php");
    }
    if(isset($_GET['change_to_sub']))
    {
        $user_id = $_GET['change_to_sub'];
        $query = "UPDATE users SET user_role='subscribe'WHERE user_id=$user_id";
        $change_role_query = mysqli_query($connection,$query);
        ConfrimQuery(($change_role_query));
        header("Location: users.php");
    }
    if(isset($_GET['delete']))
    {
        $user_id = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id=$user_id";
        $delete_user_query = mysqli_query($connection,$query);
        ConfrimQuery(($delete_user_query));
        header("Location: users.php");
    }
?>