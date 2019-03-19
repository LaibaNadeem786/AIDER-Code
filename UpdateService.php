<?php
include("connection.php");

$serviceCode = "";
$serviceType = "";
$serviceName = "";
$serviceDesc = "";

if (isset($_POST['update_page'])){
  $serviceCode = mysqli_real_escape_string($db, $_POST['serviceCode']);

  $sql_select_service = "SELECT serviceName, serviceType, serviceDesc FROM service WHERE serviceCode = '$serviceCode'";
  $result = mysqli_query($db, $sql_select_service);
  $user = mysqli_fetch_assoc($result);
  $serviceName = $user['serviceName'];
  $serviceType = $user['serviceType'];
  $serviceDesc = $user['serviceDesc'];
}



if (isset($_POST['update_service'])){
  $serviceCode = mysqli_real_escape_string($db, $_POST['serviceCode']);
  $serviceName = mysqli_real_escape_string($db, $_POST['serviceName']);
  $serviceDesc = mysqli_real_escape_string($db, $_POST['serviceDesc']);
  $serviceType = mysqli_real_escape_string($db, $_POST['serviceType']);


  $query =  "UPDATE service SET serviceName = '$serviceName', serviceType = '$serviceType', serviceDesc = '$serviceDesc' WHERE serviceCode = '$serviceCode'";
  mysqli_query($db, $query);

  header('location: ManageServicesProvided.php');
}
//$sql = "UPDATE service SET WHERE serviceCode = $serviceCode";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Service</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favorite.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">

<!--
<script>
  function noEdit(){
    document.getElementById("serviceCode").readOnly = true;
  }
</script>
-->
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

<h1> &nbsp; Update Service</h1>

<br>
<br>
<form action = "UpdateService.php" method="post">

    <div class="container mt-3">

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Service Code: </span>
        </div>
        <input readonly class="form-control" id = "serviceCode" name = "serviceCode" value = "<?php echo $serviceCode;?>">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Name: </span>
        </div>
        <input type="text" class="form-control" id = "serviceName" name = "serviceName" value="<?php echo $serviceName;?>">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Service Type:</span>
        </div>
        <select class="form-control" id="serviceType" name="serviceType" value="<?php echo $serviceType;?>">
          <option value="shopping">Shopping </option>
          <option value="meals">Meals </option>
          <option value="personalCare">Personal Care </option>
          <option value="healthCare">Healthcare </option>
          <option value="transportation">Transportation </option>
          <option value="cleaning">Cleaning</option>
        </select>

        <script>
          document.getElementById('serviceType').value="<?php echo $serviceType;?>";
          $('#serviceType').selectpicker('refresh');
        </script>

      </div>

      <div class="input-group mb-3 ">

        <div class="input-group-prepend">
          <span class="input-group-text">Service Description:</span>
        </div>
          <textarea class="form-control"  placeholder="Enter description of service" name="serviceDesc" id="serviceDesc" ><?php echo $serviceDesc;?></textarea>
      </div>

<div class="float-right">
<button type="submit" class="btn btn-success" name="update_service">Save</button>

</div>
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
    <a href="index.php"> AIDER.com</a>
    <p>All Rights Reserved by Laiba & Sharifah</p>
  </div>
</footer>
</html>
