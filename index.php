<?php include("partials-front/menu.php"); ?>

    <!-- food search section starts here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- food search section ends here -->
    <?php 
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    ?>

    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container-fluid">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
            
                $sql ="SELECT * FROM category WHERE active = 'Yes' AND featured = 'Yes' LIMIT 3";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0 )
                {
                    //categories available
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //get values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
            <div class="row">
                <div class="col-4">

                </div>
            </div>

                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php
                                //check whether the image is available or not
                                    if($image_name == "")
                                    {
                                        //display message
                                        echo "image not Available";
                                    }
                                    else
                                    {
                                        //image available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php 
                                    }
                                ?>

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>
                        <?php
                    }
                }
                else
                {
                    //categories not available
                    echo "<div class='error'>Category not Added </div>";
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- food MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container-fluid">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
            //getting food from database that are active and featured
            $sql2 = "SELECT * FROM food WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //execute the query
            $res2 = mysqli_query($conn, $sql2);

            //count the rows
            $count2 = mysqli_num_rows($res2);

            //check whether food is available or not
            if($count2 > 0)
            {
                //food available
                while($row = mysqli_fetch_assoc($res2))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            //checke whether the img is available or not
                            if($image_name == "")
                            {
                                //image not available
                                echo "<div class='error'>Image not Available</div>";
                            }
                            else
                            {
                                //image availabe
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                            ?>
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">$<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                    <?php
                }
            }
            else
            {
                //food not available
                echo "<div class='error'>Food not Available</div>";
            }
            ?>

            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php">See All Foods</a>
        </p>
    </section>
    <!-- food Menu Section Ends Here -->
    <br>

    <?php include("partials-front/footer.php"); ?>