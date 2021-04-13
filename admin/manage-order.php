<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>

        <br><br><br>

        <?php 
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset ($_SESSION['update']);
        }
        ?>

        <table class="tbl-full">
            <tr>
                <th class="menu-options">S.N.</th>
                <th class="menu-options">Food</th>
                <th class="menu-options">Price</th>
                <th class="menu-options">Qty</th>
                <th class="menu-options">Total</th>
                <th class="menu-options">Status</th>
                <th class="menu-options">Customer Name</th>
                <th class="menu-options">Contact</th>
                <th class="menu-options">Email</th>
                <th class="menu-options">Address</th>
                <th class="menu-options text-center">Actions</th>
            </tr>
            
            <?php 
                //Get all the orders from database
                $sql = "SELECT * FROM order_new ORDER BY id DESC"; //display the latest order at first

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //count the rows
                $count = mysqli_num_rows($res);

                $sn = 1;

                if($count > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $food = $row['food'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $total = $row['total'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_email = $row['customer_email'];
                        $customer_address = $row['customer_address'];

                        ?>
                        <tr>
                            <th><?php echo $sn++?></th>
                            <th><?php echo $food?></th>
                            <th><?php echo $price?></th>
                            <th><?php echo $qty?></th>
                            <th><?php echo $total?></th>
                            <th>
                                <?php 
                                if($status=="Ordered")
                                {
                                    echo "<label style='color: blue;'>$status</label>";
                                }
                                elseif($status=="On Delivery")
                                {
                                    echo "<label style='color: orange;'>$status</label>";
                                }
                                elseif($status=="Delivered")
                                {
                                    echo "<label style='color: green;'>$status</label>";
                                }
                                elseif($status=="Cancelled")
                                {
                                    echo "<label style='color: red;'>$status</label>";
                                }
                                ?>
                            </th>
                            <th><?php echo $customer_name?></th>
                            <th><?php echo $customer_contact?></th>
                            <th><?php echo $customer_email?></th>
                            <th><?php echo $customer_address?></th>
                            <th>
                                <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id;?>" class="btn-secondary">Update Order</a>
                            </th>
                        </tr>
                        <?php 
                    }
                }
                else
                {
                    //order not available
                    echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                }
            ?>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>