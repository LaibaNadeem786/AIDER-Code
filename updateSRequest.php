<?php
include("connection.php");

$requestID = "";
$requiredDate = "";
$requiredTime = "";
$status = "";
$notes ="";

if (isset($_POST['update_page'])){
  $requestID = mysqli_real_escape_string($db, $_POST['requestID']);
  $sqlServiceRequest = "SELECT requiredDate, requiredTime, status, notes FROM servicerequest WHERE requestID = '$requestID'";
  $result = mysqli_query($db, $sqlServiceRequest);
  $user = mysqli_fetch_assoc($result);
  $requiredDate = $user['requiredDate'];
  $requiredTime = $user['requiredTime'];
  $status = $user['status'];
  $notes = $user['notes'];
}

if (isset($_POST['update_service_request'])){
  $requestID = mysqli_real_escape_string($db, $_POST['requestID']);
  $requiredDate = mysqli_real_escape_string($db, $_POST['requiredDate']);
  $requiredTime = mysqli_real_escape_string($db, $_POST['requiredTime']);
  $status = mysqli_real_escape_string($db, $_POST['status']);
  $notes = mysqli_real_escape_string($db, $_POST['notes']);

  $query =  "UPDATE servicerequest SET status = '$status', notes = '$notes' WHERE requestID = '$requestID'";
  mysqli_query($db, $query);

  header('location: ServiceRequestList.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Servive Request </title>
  <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="favorite.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">
  <script>
    function noEdit(){
      document.getElementById("requestID").readOnly = true;
    }
  </script>
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
      <img class="card-img-top mx-auto d-block" src="submitrequest.png" alt="Service icon" style="width:30%" >

<h1> &nbsp; Update Service Request</h1>
<br>
<br>
<form action="updateSRequest.php" method="post">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">RequestID: </span>
  </div>
  <input class="form-control" id = "requestID" name = "requestID" value = "<?php echo $requestID;?>" onfocus="noEdit();">
</div>

    <div class="container mb-3">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Required Date:</span>
        </div>
        <input type="date" class="form-control"  id = "dateRequired" name = "dateRequired" readonly value="<?php echo $requiredDate;?>">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Required Time:</span>
        </div>
        <input type="time" class="form-control"  id = "timerequired" name = "timerequired" readonly value="<?php echo $requiredTime;?>">
      </div>


      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Status:</span>
        </div>
        <select class="form-control" id="status" name="status">
          <option>Cancelled </option>
          <option>Completed </option>

        </select>
      </div>

      <div class="input-group mb-3 ">

        <div class="input-group-prepend">
          <span class="input-group-text">Notes:</span>
        </div>
          <textarea class="form-control"  placeholder="Enter notes" id="notes" name="notes"> <?php echo $notes;?></textarea>
      </div>
<br>
  <button type="submit" class="btn btn-success float-right" name="update_service_request">Update</button>

      <a href="review.php" type="button" class="btn btn-danger">Review Service Provider</a>
      <br><br>
      </div>
    </div>
</div>

</div>
</form>
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
