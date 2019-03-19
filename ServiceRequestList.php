<?php
include_once ('connection.php');
$username = $_SESSION['username'];

$sql = "SELECT * FROM servicerequest WHERE senior='$username'";
$result = mysqli_query($db, $sql);
$resultCheck = mysqli_num_rows($result);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manage Service Requests </title>
  <meta charset="utf-8">
  <link rel="icon" type="image/x-icon" href="favorite.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
      <img class="card-img-top mx-auto d-block" src="requestlist.png" alt="service icon" style="width:20%" >

<h1 class="text-center">Service Requests</h1>
<br>
<br>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Request ID</th>
      <th scope="col">ServiceCode</th>
      <th scope="col">Status</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result))
    {
      echo "<tr><form action=updateSRequest.php method=post>";
      echo "<td><input type=text name=requestID readOnly value='". $row['requestID']."'></td>";
      echo "<td><input type=text name=service readOnly value='". $row['serviceCode']."'></td>";
      echo "<td><input type=text name=status readOnly value='". $row['status']."'></td>";

      echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>View</button>";

      echo "<button type='submit' class='btn btn-danger' name='update_page'>Edit</button>";
    }
    ?>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Details of Service Request</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <?php

          $sql = "SELECT * FROM servicerequest;";
          $result2 = mysqli_query($db, $sql);
          $resultCheck2 = mysqli_num_rows($result2);

          if ($resultCheck2 > 0) {
            while($row = mysqli_fetch_assoc($result2)){
              echo "</br>";
              echo "Request ID: ".$row['requestID'];
              echo "<br>";
              echo "Service Code: ".$row['serviceCode'];
              echo "</br>";
              echo "Date: ".$row['requiredDate'];
              echo "</br>";
             echo "Time: ".$row['requiredTime'];
             echo "</br>";
             echo "Note: ".$row['notes'];
             echo "</br>";

            }
          }

            ?>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <a href="ServiceRequestList.php" class="btn btn-danger" data-dismiss="modal">Back</a>
        </div>
      </div>
    </div>
  </div>
    </tr>
  </tbody>
</table>
<a href="review.php" class="btn btn-danger btn-block" role="button">Review Service Provider</a>
</div>
</div>
</body>
<br>
<footer class="page-footer font-small blue" style="background-color:#000000; color:#ffffff;">

  <div class="footer-copyright text-center py-3">Copyright © 2018 AIDER
    <p>All Rights Reserved by Laiba & Sharifah</p>
  </div>

</footer>
</html>
