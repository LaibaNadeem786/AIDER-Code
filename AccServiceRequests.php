<?php
include_once ('connection.php');
$sql = "SELECT * FROM servicerequest WHERE status = 'pending'";
$result = mysqli_query($db, $sql);
$resultCheck = mysqli_num_rows($result);

$requestID ="";
$status = "";

if (isset($_POST['accept_page'])){
  $requestID = mysqli_real_escape_string($db, $_POST['requestID']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $notes = mysqli_real_escape_string($db, $_POST['notes']);

  $query =  "UPDATE servicerequest SET status = '$status' WHERE requestID = '$requestID'";
  mysqli_query($db, $query);

  header('location: AccServiceRequests.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Accept Service Requests </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favorite.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <div class="card"  "center" style="width:auto" >
    <br>
    <br>
      <img class="card-img-top mx-auto d-block" src="logoicon2.png" alt="Card image" style="width:30%" >
        <h1 class="text-center">Accept Service Requests</h1>
        <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Request ID</th>
              <th>Service</th>
              <th>Required Date</th>
              <th>Required Time</th>
              <th>Status</th>
              <th>Accept/Reject</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($row = mysqli_fetch_assoc($result))
              {
                echo "<tr><form action=AccServiceRequests.php method=post>";
                echo "<td><input type=text name=requestID readOnly value='". $row['requestID']."'></td>";
                echo "<td><input type=text name=service readOnly value='". $row['service']."'></td>";
                echo "<td><input type=text name=requiredDate readOnly value='". $row['requiredDate']."'></td>";
                echo "<td><input type=text name=requiredTime readOnly value='". $row['requiredTime']."'></td>";
                echo "<td><input type=text name=status readOnly value='". $row['status']."'></td>";
                echo "<td><form action='AccServiceRequests.php'  method='post'>
                <select class='form-control' id='status' name='status'>
                <option value='accept'>Accept </option>
                <option value='reject'>Reject </option>
              </select>
                <button type='submit' class='btn btn-deafult' name='accept_page'>Save</button></form>";
              }
              ?>
            </tr>
        </table>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>Notes:</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td id="note"><div class="container">
  <a href="#notes" class="btn btn-primary" data-toggle="collapse">Notes</a>
  <div id="notes" class="collapse">
    <?php

    $sql = "SELECT * FROM servicerequest WHERE status = 'pending';";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);

      while ($row = mysqli_fetch_assoc($result)) {
        echo "Notes for RequestID ".$row['requestID']." - ".$row['notes'];
        echo "<br>";
      }

      ?>
  </div>
</div>
</td>
              </tr>
          </tbody>
        </table>

        </div>
      </div>
      </div>
</body>
</br>
<footer class="page-footer font-small blue" style="background-color:#000000; color:#ffffff;">

  <div class="footer-copyright text-center py-3">Copyright © 2018 AIDER
    <a href="index.php"> AIDER.com</a>
    <p>All Rights Reserved by Laiba & Rupini</p>
  </div>

</footer>
</html>
