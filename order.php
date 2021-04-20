<?php include('partials-front/menu.php'); ?>

<?php 
    //check whether food id is set or not
    if(isset($_GET['food_id']))
    {
        //get the food id and details of the selected food
        $food_id = $_GET['food_id'];

        //get the details of the selected food
        $sql = "SELECT * FROM food WHERE id=$food_id";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //count rows
        $count = mysqli_num_rows($res);

        //check whether the data is available or not
        if($count == 1)
        {
            //get data from database
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        }
        else
        {
            //redirect to homepage
            header('location:'.SITEURL);
        }
    }
    else
    {
        header('location:'.SITEURL);
    }

?>


    <!-- food search sSection Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend class="text-white">Selected Food</legend>
                    <div class="food-menu-img">
                    <?php 
                        if($image_name == "")
                        {
                            //img not available
                            echo "<div class='error'>Image not Available</div>";
                        }
                        else
                        {
                            //image available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <h3 class="text-white"><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price text-white">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">


                        <div class="order-label text-white">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend class="text-white">Delivery Details</legend>
                    <div class="order-label text-white">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Robert Clarke" class="input-responsive" required>

                    <div class="order-label text-white">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label text-white">Email</div>
                    <input type="email" name="email" placeholder="E.g. example@myrestaurant.com" class="input-responsive" required>

                    <div class="order-label text-white">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
            </form>
        
<?php


if(isset($_POST['submit']))
    {
        $food = $_POST['food'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $total = $price * $qty;
        $status = 'Ordered';
        $customer_name = $_POST['full-name'];
        $customer_contact = $_POST['contact'];
        $customer_email = $_POST['email'];
        $customer_address = $_POST['address']; 

        // echo "food: $food", " price:$price", " qty: $qty", " total: $total", " order date: $order_date", " status: $status", " customer name: $customer_name", " customer contact: $customer_contact", " customer email: $customer_email", " customer address: $customer_address"; 
    
        //Create SQL to save the data
        $sql2 = "INSERT INTO order_new SET
        food = '$food',
        price = $price,
        qty = $qty,
        total = $total,
        status = '$status',
        customer_name = '$customer_name',
        customer_contact = '$customer_contact',
        customer_email = '$customer_email',
        customer_address = '$customer_address'
        ";

        // $sql2 = "INSERT INTO order (food, price, qty, total, order_date, status, customer_name, customer_contact, customer_email, customer_address) VALUES ('$food', $price, $qty, $total, '$order_date', '$status', '$customer_name', '$customer_contact', '$customer_email', '$customer_address')";
        // $sql2 = "INSERT INTO order2 (order3) VALUES ('Hola2')";
        // echo $sql2; die();

         //execute the query
        $res2 = mysqli_query($conn, $sql2);
        
        
        // echo $res2;
        
        // check whether query executed successfully or not
        if($res2)
        {
            //Query executed and order saved
            $_SESSION['order'] = "<script src='./scripts/success.js'></script>>";
            header('location:'.SITEURL);
            
        }
        else
        {
            $_SESSION['order'] = "<script src='./scripts/failed.js'></script>>";
            header('location:'.SITEURL);
        }
    }
    ?>
    </div>
    </section>
    <br><br>

<?php include("partials-front/footer.php"); ?>