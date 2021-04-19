<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://icons8.com/icon/36138/hamburger">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet"> 
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    <!-- Navbar Section Starts Here -->

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <img class="logo ml-5" height="85" src="https://img.icons8.com/plasticine/200/000000/noodles.png"/>
        <a class="navbar-brand" style="color: white; margin-left:0.5rem;" href="#">OhMyFood !</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse menu" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item" href="<?php echo SITEURL; ?>">Home</a>
                <a class="nav-item" href="<?php echo SITEURL; ?>categories.php">Categories</a>
                <a class="nav-item" href="<?php echo SITEURL; ?>foods.php">Foods</a>
                <!-- <a class="nav-item" href="#">Contact</a> -->
            </div>
        </div>
    </nav>
    <!-- Navbar Section Ends Here -->

    <br><br><br>