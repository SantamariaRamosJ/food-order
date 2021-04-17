    <?php
        include('partials/menu.php')
    ?>

    <!-- Main content section start -->
    <div class="main-content ">
        <div class="wrapper">
            <h1>Manage Admin</h1>

            <br><br>

            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //displaying session message
                    unset($_SESSION['add']); //removing session message
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                
                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }

                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }
            
            ?>

            <br>

            <!--button to add admin-->  
            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br><br><br>

            <table class="tbl-full">
                <tr>
                    <th class="menu-options">S.N.</th>
                    <th class="menu-options">Full Name</th>
                    <th class="menu-options">Username</th>
                    <th class="menu-options">Actions</th>
                </tr>
                
                <?php 
                //Query to get all admin
                $sql ="SELECT * FROM admin";

                //Execute the query
                $res= mysqli_query($conn, $sql);

                //check wheter the query is execute or not
                if($res==TRUE)
                {
                    $count = mysqli_num_rows($res); //function to get all the rows in database
                    
                    $sn = 1; //create a variable and assign the value

                    //check the num of rows
                    if($count > 0) 
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            //using while loop to get all the data from database
                            //and while loop will run as long as we have data in database

                            //get individual data
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];

                        //display the values in our table
                        ?>

                        <tr>
                            <th><?php echo $sn++;?></th>
                            <th><?php echo $full_name; ?></th>
                            <th><?php echo $username; ?></th>
                            <th>
                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-third">Delete Admin</a>
                            </th>
                        </tr>

                        <?php 
                    }
                }else

                {
                    //we don't have data in our database
                }
            }
                
                ?>

            </table>
        </div>
    </div>
    <!-- Main content ends -->

    <?php include('partials/footer.php'); ?>



</body>
</html>