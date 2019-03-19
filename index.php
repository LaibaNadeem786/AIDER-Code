<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>AIDER</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="favorite.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <style>
   /* Make the image fully responsive */
   .carousel-inner img {
       width: 100%;
       height: 100%;
   }
   </style>

  </head>
  <body class="bg-info" >


  <nav class="navbar navbar-expand-md bg-dark navbar-dark">

      <img src="logoicon2.png" alt="Logo" style="width:40px;">
      <a class="navbar-brand" href="index.php">AIDER</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigationbarcollapses">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigationbarcollapses">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ServiceList.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>

  <div class="container">
    <div id="demo" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="home1.jpg" alt="Happy Senior and youngsters" width="1100" height="500">
          <div class="carousel-caption">
            <h1 class="text-primary">AIDER</h1>
            <p class="text-primary"><b>WHERE LIVE FINDS MEANS TO HAPPINESS</b></p>
          </div>
        </div>
        <div class="carousel-item">
      <img src="home2.jpg" alt="Happy Senior and youngsters" width="1100" height="500">
          <div class="carousel-caption">
            <h1 class="text-primary">AIDER</h1>
            <p class="text-primary"><b>WHERE LIVE FINDS MEANS TO HAPPINESS</b></p>
          </div>
        </div>
        <div class="carousel-item">
        <img src="home3.jpg" alt="Happy Senior and youngsters" width="1100" height="500">
          <div class="carousel-caption">
            <h1 class="text-primary">AIDER</h1>
            <p class="text-primary"><b>WHERE LIVE FINDS MEANS TO HAPPINESS</b></p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>

  </div>
</div>
<br><br>

  </body>
  <footer class="page-footer font-small blue" style="background-color:#000000; color:#ffffff;">

    <div class="footer-copyright text-center py-3">Copyright © 2018 AIDER
      <p>All Rights Reserved by Laiba & Sharifah</p>
    </div>

  </footer>
  </html>
