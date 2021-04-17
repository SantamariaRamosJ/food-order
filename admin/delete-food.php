<?php 
    include('../config/constants.php');

    // echo "delete food";
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //process to delete
        // echo "process to delete";

        //1. Get id and image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];


        //2. Remove the image if available
        //check whether the image is available or not and delete only if available
        if($image_name != "")
        {
            //it has image and need to remove from folder
            //Get the image path
            $path = "../images/food/".$image_name;

            //remove image file from folder
            $remove = unlink($path);

            //Check whether the image is removed or not
            if($remove == false)
            {
                //failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
                //redirect to manage food
                header('location:'.SITEURL.'admin/manage-food.php');
                //stop the process
                die();
            }
        }

        //3. Delete food from database
        $sql = "DELETE FROM food WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //check whether the query executed or not and set the session message respectively
        if($res == true)
        {
            //food deleted from database
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully</div>";
            //redirect to manage food
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //failed to delete food
            $_SESSION['delete'] = "<div class='error'>Failed to Deleted Food</div>";
            //redirect to manage good
            header('location:'.SITEURL.'admin/manage-food.php');
        }

    }
    else
    {
        //redirect to manage food page
        // echo "redirect";
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access. </div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>