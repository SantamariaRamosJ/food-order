<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1>

            <br><br>

            <?php 
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>

            <!--Add food form start-->  
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="Title of Food">
                        </td>
                    </tr>

                    <tr>
                        <td>Description: </td>
                        <td>
                            <textarea name="description" cols="30" rows="5" placeholder="Description of the Food"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="number" name="price" placeholder="Insert a Price">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Category: </td>
                        <td>
                            <select name="category">
                                <?php 
                                //Create PHP code to display categories from database
                                //1. Create SQL to get all active categories from database
                                $sql = "SELECT * FROM category WHERE active='Yes'";
                                
                                //Execute the query
                                $res= mysqli_query($conn, $sql);
                                
                                //Count row to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //if count is greater than zero, we have categories else we don't have categories
                                if($count > 0 )
                                {
                                    //we have categories
                                    while($row = mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $id = $row['id'];
                                        $title= $row['title'];

                                        ?>
                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                        <?php 
                                    }
                                }
                                else
                                {
                                    //we don't have categories
                                    ?>
                                    <option value="0">No Category Found</option>>
                                    <?php 
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes
                            <input type="radio" name="featured" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes
                            <input type="radio" name="active" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </div>


    <?php 
        //Check whether the button is clicked or not
        if(isset($_POST['submit'])) 
        {
            //Add the food in database
            // echo "clicked";
            
            //1. Set the data from form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            //check whether radio button for featured and active are checked or not
            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No"; //seting the default value
            }

            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No"; //setting the default value
            }

            //2. Upload the image if selected
            //check whether the select image is clicked or not and upload the image only if the image is selected
            if(isset($_FILES['image']['name']))
            {
                //Get the details of the selected image
                $image_name = $_FILES['image']['name'];
                
                //check whether the image is selected or not and upload imae only if selected
                if($image_name != "")
                {
                    //image is selected
                    //A. rename the image
                    //get the extension of selected image (jpg. png, etc)

                    $tmp = explode('.', $image_name);
                    $ext = end($tmp);

                    //Create a new name for image
                    $image_name = "Food-Name-".rand(0000,9999).".".$ext; //new image name may be "Food-Name-657.png"

                    //B. Upload the image
                    //Get the src path and destination path

                    //source path is the current location of the image
                    $src = $_FILES['image']['tmp_name'];

                    //Destionation path for the image to be uploaded
                    $dst = "../images/food/".$image_name;

                    //finally upload the food image
                    $upload = move_uploaded_file($src, $dst);

                    //check whether image uploaded or not
                    if($upload == false)
                    {
                        //failed to upload the image
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                        //redirect to add food page with error message
                        header('location:'.SITEURL.'admin/add-food.php');
                        //stop the process
                        die();
                    }
                }
            }
            else
            {
                $image_name = ""; //setting default value as blank
            }

            //3. Insert into database
            //for prices we don't need to pass value inside quotes.
            $sql2 = "INSERT INTO food SET 
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = $category,
            featured = '$featured',
            active = '$active'
            ";
            

            //Execute the query
            $res2 = mysqli_query($conn, $sql2);

            //Check whether data inserted or not

            if($res2 == true)
            {
                //data inserted successfully
                $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
            }
            else
            {
                //failed to insert data
                $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
            }
        }                        
    ?>

<?php include('partials/footer.php'); ?>