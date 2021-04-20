<?php 
ob_start();
include('config/constants.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://icons8.com/icon/36138/hamburger">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <title>OhMyFood - Food Delivery</title>
    <link rel="shortcut icon" href="https://img.icons8.com/plasticine/100/000000/restaurant.png">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <img class="logo ml-5" src="https://img.icons8.com/doodle/100/000000/soup-plate.png" href="https://ohmyfood-app.herokuapp.com/"/>
            <a class="navbar-brand" style="color: white;" href="https://ohmyfood-app.herokuapp.com/">OhMyFood! </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
            <div class="collapse navbar-collapse menu" id="navbarNavAltMarkup">
                <div class="navbar-nav menu">
                    <a class="nav-item" href="<?php echo SITEURL; ?>">Home</a>
                    <a class="nav-item" href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    <a class="nav-item" href="<?php echo SITEURL; ?>foods.php">Foods</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar Section Ends Here -->

    

    

        
