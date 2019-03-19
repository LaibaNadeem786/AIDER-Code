<?php
include_once ('connection.php');
$sql = 'SELECT * FROM review';
$result = mysqli_query($db, $sql);
$resultCheck = mysqli_num_rows($result);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Ratings </title>
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
            <a class="nav-link" href="ServiceRequestList.php">Manage Service Requests</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="SubmitServiceRequest.php">Submit Service Requests</a>
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
      <img class="card-img-top mx-auto d-block" src="ratingsblue.png" alt="Card image" style="width:30%" >

<h1> &nbsp; Ratings</h1>
<br>
<br>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Service</th>
      <th scope="col">Date</th>
      <th scope="col">Rating</th>
      <th scope="col">Comments</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php for ($i=1; $i <1 ; $i++) {
          echo "$i";
        } ?></td>
        <td><?php echo $row['service'];?></td>
        <td><?php echo $row['reviewDate'];?></td>
        <td><?php echo $row['rating'];?></td>
        <td><?php echo $row['comments'];?></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</div>
<br>
</br>
<a href="review.php" type="button" class="btn btn-success">Review Service Provider</a>
<br>
</div>
</div>
</body>
<br>
<footer class="page-footer font-small blue" style="background-color:#000000; color:#ffffff;">

  <div class="footer-copyright text-center py-3">Copyright © 2018 AIDER
    <a href="index.php"> AIDER.com</a>
    <p>All Rights Reserved by Laiba & Sharifah</p>
  </div>

</footer>
</html>
