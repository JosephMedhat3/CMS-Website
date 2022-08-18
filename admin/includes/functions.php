<?php
function ConfrimQuery($result)
{
    global $connection;
    if(!$result)
    {
        die("Query Failed" . mysqli_error($connection));
    }
}
function CreateCategory()
{
    global $connection;
    if(isset($_POST['submit']))
    {
        $cat_title = $_POST['cat_title'];
        $query = "INSERT INTO categories(cat_title) VALUE('$cat_title')";
        $create_categories_query = mysqli_query($connection,$query);
        header("Location: categories.php");
    }
}
function SelectAllCategories()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_categories))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>$cat_id</td>";
        echo "<td>$cat_title</td>";
        echo "<td><a href ='categories.php?delete=$cat_id'>Delete</a></td>";
        echo "<td><a href ='categories.php?edit=$cat_id'>Edit</a></td>";
        echo "</tr>";
    }
}
function DeleteCategory()
{
    if(isset($_GET['delete']))
    {
        global $connection;
        $cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id=$cat_id";
        $delete_categories = mysqli_query($connection,$query);
        header("Location: categories.php");
    }
}
?>