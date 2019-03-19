<?php
include ('connection.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Service</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favorite.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">
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
          <a class="nav-link" href="ManageServicesProvided.php">Manage Services</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="AccServiceRequests.php">Accept Service Request</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log Out</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
<div class="container " >

  <div class="card"  "center" style="width:auto;" >
    <br>
    <br>
      <img class="card-img-top mx-auto d-block" src="serviceicon.png" alt="Card image" style="width:30%" >

<h1> &nbsp; Add New Service</h1>
<br>
<br>
<form action="AddService.php" method="post">

    <div class="container mt-3">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Name: </span>
        </div>
        <input type="text" class="form-control" id="serviceName" name="serviceName" value="<?php echo $serviceName;?>" >
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Service Type:</span>
        </div>
        <select class="form-control" id="serviceType" name="serviceType">
          <option value="shopping">Shopping </option>
          <option value="meals">Meals </option>
          <option value="personalCare">Personal Care </option>
          <option value="healthCare">Healthcare </option>
          <option value="transportation">Transportation </option>
          <option value="cleaning">Cleaning</option>
        </select>
      </div>

      <div class="input-group mb-3 ">

        <div class="input-group-prepend">
          <span class="input-group-text">Service Description:</span>
        </div>
          <textarea class="form-control" placeholder="Enter description of service" id="serviceDesc" name="serviceDesc" value="<?php echo $serviceDesc;?>"></textarea>
      </div>


<button type="submit" class="btn btn-success float-right" name="add_service">Add</button>
<br>
      <br>
      <br>
      </div>
    </div>
</div>

</div>
</form>
</div>

</body>
<footer class="page-footer font-small blue" style="background-color:#000000; color:#ffffff;">

  <div class="footer-copyright text-center py-3">Copyright © 2018 AIDER
    <a href="index.html"> AIDER.com</a>
    <p>All Rights Reserved by Laiba & Sharifah</p>
  </div>
</footer>
</html>
