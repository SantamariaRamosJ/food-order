<?php 
    //include constants file
    include('../config/constants.php');
    // echo "Delete Page";
    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the value and delete
        // echo "Get Value and Delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file is available
        if($image_name != "")
        {
            //image is available. So remove it
            $path = "../images/category/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if failed to remove image then add an error message and stop the process
            if($remove == false)
            {
                //Set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
                //redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();
            }
        }
        //Delete data from database
        //SQL Query to Delete data from database
        $sql = "DELETE FROM category WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //check whether the data is delete from database or not
        if($res == true)
        {
            //set success message and redirect
            $_SESSION['delete'] = "<div class='success'>Category Deleted Succesfully.</div>";
            header('location:'.SITEURL.'admin/manage-category.php'); 
        }
        else
        {
            //Set fail message and redirect
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
            header('location:'.SITEURL.'admin/manage-category.php'); 
        }
        //Redirect to manage category page with message
    }
    else
    {
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>