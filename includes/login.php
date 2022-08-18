<?php include("db.php");?>
<?php session_start();?>

<?php 

    if(isset($_POST['login']))
    {
        $username=mysqli_real_escape_string($connection, $_POST['username']);
        $password=mysqli_real_escape_string($connection, $_POST['password']);


        $query="SELECT * FROM users WHERE user_username='$username' AND user_password='$password'";
        $login_query = mysqli_query($connection,$query);
        if ($login_query->num_rows != 0)
        {
                $row = mysqli_fetch_assoc($login_query);
                $user_id= $row['user_id'];
                $user_username= $row['user_username'];
                $user_firstname= $row['user_firstname'];
                $user_lastname= $row['user_lastname'];
                $user_role= $row['user_role'];
            $_SESSION['username']=$user_username;
            $_SESSION['firstname']=$user_firstname;
            $_SESSION['lastname']=$user_lastname;
            $_SESSION['role']=$user_role;
            $_SESSION['id']=$user_id;
            header("Location: ../admin");
        }
        else
        {
            header("Location: ../index.php");
        }
    }

?>