<?php 
    include('partials/menu.php')
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update food</h1>

        <br><br>
<?php 
    if(isset($_GET['id']))
    {
        //get all the details
        $id = $_GET['id'];

        //SQL Query to get the selected food
        $sql2 = "SELECT * FROM food WHERE id=$id";

        //execute the query
        $res2 = mysqli_query($conn, $sql2);

        //get the value based on query executed
        $row2 = mysqli_fetch_assoc($res2);

        //get the individual values of selected food
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];
    }
    else
    {
        //redirect to manage food
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>


        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php 
                            if($current_image !="")
                            {
                                //display image
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px">
                                <?php 
                            }
                            else
                            {
                                //display error message
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                            
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:  </td>
                    <td>
                        <select name="category">
                            <?php 
                                //query to get active categories
                                $sql ="SELECT * FROM category WHERE active='Yes'";

                                //execute the query
                                $res = mysqli_query($conn, $sql);

                                //count rows
                                $count = mysqli_num_rows($res);

                                //Check whether category available or not
                                if($count > 0)
                                {   
                                    //category available
                                    while($row = mysqli_fetch_assoc($res))
                                    {
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
                                        
                                        // echo "<option value='$category_id'>$category_title</option>";
                                        ?>
                                        <option <?php if($current_category == $category_id) {echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    //category not available
                                    echo "<option value='0'>Category Not Available.</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured == "Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes">Yes

                        <input <?php if($featured == "No") {echo "checked";} ?> type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                        
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>


        <?php 

            if(isset($_POST['submit']))
            {
                // echo "clicked";
                //1. Get all the values from our form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $id = $_POST['id'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //2. updating new image if selected
                //Check whether the image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //get the image details
                    $image_name = $_FILES['image']['name'];

                    //check whether the image is available or not
                    if($image_name != "")
                    {
                        //image available
                        //upload the new image
                        //Auto rename our image
                    //get the extension of our image(jpg, png, gif, etc) e.g. "food1.jpg"
                    $tmp = explode('.', $image_name);

                    $file_extension = end($tmp);

                    //rename the image
                    $image_name = "Food_Name_".rand(000, 999).'.'.$file_extension; //e.g. Food_Name_834.jpg

                    $src_path = $_FILES['image']['tmp_name'];

                    $dest_path = "../images/food/".$image_name;

                    //finaly upload the image
                    $upload = move_uploaded_file($src_path, $dest_path);
                    

                    //check whether the image is uploaded or not
                    //and if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload == false)
                    {
                        //set message
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                        //redirect to Add food page
                        header('location:'.SITEURL.'admin/manage-food.php');
                        //stop the process
                        die();
                    }
                        //remove the current image
                        if($current_image != "")
                        {
                            $remove_path = "../images/food/".$current_image;

                            $remove = unlink($remove_path);
                            //check whether the image is removed or not
                            //if failed to remove then display message and stop the process

                            if($remove == false)
                            {
                                //failed to remove image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to Remove Current Image.</div>";
                                header('location:'.SITEURL.'admin/manage-food.php');
                                die(); //stop the process
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image; //default image when image is not selected
                    }
                }
                else
                {
                    $image_name = $current_image; //default image when button is not clicked
                }

                //3. update the database
                $sql3 = "UPDATE food SET 
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = '$category', 
                featured = '$featured',
                active = '$active'
                WHERE id=$id
                ";

                //execute the query
                $res3 = mysqli_query($conn, $sql3);

                //4.redirect to manage food with message
                //check whether executed or not
                if($res3 == true)
                {
                    //food updated
                    $_SESSION['update'] = "<div class='success'>Food Updated Successfully.</div>";
                    //redirect
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    //failed to update food
                    $_SESSION['update'] = "<div class='error'>Failed to Update food.</div>";
                    //Redirect to manage food page
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
            }

        ?>

    </div>
</div>

<?php 
    include('partials/footer.php')
?>