<?php
//cinlcude constants.php file here
include('../config/constants.php');

//1. get the ID of admin to be deleted
echo $id = $_GET['id'];

//2. Create SQL Query to Delete admin
$sql = "DELETE FROM admin WHERE id=$id";

//Execute the Query
$res = mysqli_query($conn, $sql);

//check wheter the query execute succesfully or not
if($res==true)
{
    //Query executed successfully and admin deleted
    // echo "admin deleted";
    //Create session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Succesfully</div>";
    //Redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    //failed to delete admin
    // echo "failed to delete admin";
    $_SESSION['delete'] = "<div class='error'>Failed to Deleted Admin. Try Again Later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

//3. Redirect to manage


?>