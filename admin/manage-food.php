<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
<br><br><br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['unauthorize']))
            {
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

        ?>
        
        <br><br>
        <!--button to add admin-->  
        <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
        <br><br><br>

        <table class="tbl-full">
            <tr>
                <th class="menu-options">S.N.</th>
                <th class="menu-options">Title</th>
                <th class="menu-options">Price</th>
                <th class="menu-options">Image</th>
                <th class="menu-options">Featured</th>
                <th class="menu-options">Active</th>
                <th class="menu-options">Action</th>
            </tr>
            <?php 
                //Create a SQL query to get all the food
                $sql = "SELECT * FROM food";

                //execute the query 
                $res = mysqli_query($conn, $sql);

                //count row to check whether we have good or not
                $count = mysqli_num_rows($res);

                //create serial number variable amd set default value as 1 
                $sn = 1;

                if($count > 0 )
                {
                    //we have food in database
                    //get the food from database and display
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                        ?>
                        
                        <tr>
                            <th><?php echo $sn++ ?></th>
                            <th><?php echo $title; ?></th>
                            <th>$<?php echo $price; ?></th>
                            <th>
                                <?php
                                    //check whether we have image or not
                                    if($image_name == "")
                                    {
                                        //display an error message
                                        echo "<div class='error'>Not Image Added</div>"; 
                                    }
                                    else
                                    {
                                        //display image
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                                        <?php
                                    }
                                ?>
                            </th>
                            <th><?php echo $featured; ?></th>
                            <th><?php echo $active; ?></th>
                            <th>
                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-third">Delete Food</a>
                            </th>
                        </tr>
                        <?php
                    }
                }
                else
                {
                    echo "<tr><td colspan='7' class='error'>Food not Added.</td></tr>";
                }
            ?>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>