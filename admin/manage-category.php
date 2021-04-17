<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        ?>

        <br>        
        <!--button to add admin-->  
        <a href="<?php echo SITEURL; ?>admin/add-category.php"  class="btn-primary">Add Category</a>

        <br><br><br>

        <table class="tbl-full">
            <tr>
                <th class="menu-options">S.N.</th>
                <th class="menu-options">Title</th>
                <th class="menu-options">Image</th>
                <th class="menu-options">Featured</th>
                <th class="menu-options">Active</th>
                <th class="menu-options">Actions</th>
            </tr>
                <?php
                    //Query to get all the categories from database
                    $sql = "SELECT * FROM category";

                    //execute query
                    $res = mysqli_query($conn, $sql);

                    //count rows
                    $count = mysqli_num_rows($res);

                    //Create serial number variable ans assign value as 1
                    $sn = 1;

                    if($count > 0)
                    {
                        //we have data in database
                        //get data and display
                        while($row = mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                            ?>
                                <tr>
                                    <th><?php echo $sn++ ?></th>
                                    <th><?php echo $title; ?></th>
                                    <th>
                                        <?php
                                            if($image_name != "")
                                            {
                                                //display image
                                                ?>
                                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" width="100px" >
                                                <?php
                                            } 
                                            else
                                            {
                                                //display the message
                                                echo "<div class='error'>Image not Added.</div>";
                                            }
                                        ?>
                                        
                                    </th>
                                    <th><?php echo $featured; ?></th>
                                    <th><?php echo $active; ?></th>
                                    <th>
                                        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>"  class="btn-secondary">Update Category</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-third">Delete Category</a>
                                    </th>
                                </tr>
                            <?php
                        }
                    }
                    else
                    {
                        //we don't have data in database
                        //We will display the message inside table
                        ?>

                        <tr>
                            <td colspan="6"><div class="error">No Category Added.</div></td>
                        </tr>

                        <?php

                        
                    }

                ?>

            
            
        </table>
    </div>
</div>



<?php include('partials/footer.php'); ?>