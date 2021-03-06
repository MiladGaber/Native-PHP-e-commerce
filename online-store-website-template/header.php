<?php
require './helpers/functions.php';
 $logCase ="Login";
$signUpCase ="Sign UP";

?>

<!DOCTYPE html>
<html lang="en">

  <head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>online</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <style>
      a{
        color: white;
        font-weight: bold;
      }
      .logout{
        background-color: transparent;
        border:0;
        color:white;
        padding-bottom: 5px;
        }
      .login:hover,.logout:hover{
        cursor: pointer;
        padding-bottom: 5px;
        color: #f33f3f !important;
        border-bottom: 3px solid #f33f3f;
      }
    </style>

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
     <header class=""> 
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <!-- <a class="navbar-brand" href="index.php"><h2>Online Store <em>Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> -->
          <div class="" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>

               
                
                <li class="nav-item"><a class="nav-link" href="order_process.php">Checkout</a></li>

                <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="about-us.php">About Us</a>
                      <a class="dropdown-item" href="blog.php">Blog</a>
                      <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                      <a class="dropdown-item" href="terms.php">Terms</a>
                    </div>
                </li>
            </ul>
          </div>

      <div div class="right-menu">
		<div class="header-search"></div>
					<span class="separator"></span>

          <?php 
          
            if (isset($_SESSION['username'])) {
              echo '<form action="logout.php" method="POST">
                  <button class="logout navbar-light mx-3" type="submit" name="submit">Logout</button>
              </form>';
              } else {
              echo '<a href="http://localhost/Native-PHP-e-commerce/online-store-website-template/login.php" class="login navbar-light mx-3">login</a>
              ';
            }
          ?>
          
        </div>
      </nav>
    </header> 

 