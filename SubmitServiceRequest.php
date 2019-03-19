<!DOCTYPE html>
<?php
//session_start();
include_once ('connection.php');

$username = $_SESSION["username"];

$serviceCode = "";
$serviceType = "";
$serviceName = "";
$serviceDesc = "";

if (isset($_POST['update_pagenow'])){
  $serviceCode = mysqli_real_escape_string($db, $_POST['serviceCode']);

  $sql_select_service = "SELECT * FROM service WHERE serviceCode = '$serviceCode'";
  $result = mysqli_query($db, $sql_select_service);
  $user = mysqli_fetch_assoc($result);
  $serviceName = $user['serviceName'];
  $serviceType = $user['serviceType'];
  $serviceDesc = $user['serviceDesc'];
}





?>

<html lang="en">
<head>
  <title>Submit Servive Request </title>
  <meta charset="utf-8">
  <link rel="icon" type="image/x-icon" href="favorite.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">

  <nav class="navbar navbar-expand-md bg-dark navbar-dark">

    <img src="logoicon2.png" alt="Logo" style="width:40px;">
    <a class="navbar-brand" href="index.html">AIDER</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigationbarcollapses">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigationbarcollapses">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ServiceRequestList.php">Manage Service Request</a>
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
      <img class="card-img-top mx-auto d-block" src="submitrequest.png" alt="Submit service icon" style="width:30%" >

      <h1> &nbsp; Submit Service Request</h1>
    <br>
      <br>
      <form method ="post" action="SubmitServiceRequest.php">

    <?php include('errors.php'); ?>
      <input class="invisible" name="serviceCode" value="<?php echo $serviceCode;?>">
      <div class="container mt-3">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Name: </span>
      </div>
      <input readonly type="text" class="form-control" id = "serviceName" name = "serviceName" value="<?php echo $serviceName;?>">
    </div>



      <div class="container mt-3">

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Required Date:</span>
          </div>
          <input type="date" class="form-control" id = "requiredDate" name = "requiredDate" required>
        </div>

        <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Required Time:</span>
                  </div>
                  <input type="time" class="form-control"  id = "requiredTime" name = "requiredTime" required></text>
                </div>


        <div class="input-group mb-3 ">

          <div class="input-group-prepend">
          <span class="input-group-text">Notes:</span>
          </div>
          <textarea class="form-control"  placeholder="Enter notes" id="notes" name = "notes" ></textarea>
        </div>

        <button type="submit" class="btn btn-success float-right" id="servicetype">Request a Service</button>
        <br>
        <br>
        <br>
<a href="viewRatingsofProvider.php" class="btn btn-danger btn-block" role="button">View Rating</a>
      </form>


      <?php

    //  echo " test value" .$_POST["requiredDate"];
     if (isset($_POST["requiredDate"])){
         $date = $_POST["requiredDate"];


        if (isset($_POST["requiredTime"])){
      $time = $_POST["requiredTime"];  }

       if (isset($_POST["notes"])){
      $notes =$_POST["notes"];}

       if (isset($_POST["serviceCode"])){
      $serviceCode = $_POST["serviceCode"];}


    //  $uname  = $_SESSION["name"];
    //  echo " uname".$uname;


      $sql = "INSERT INTO servicerequest (requiredDate, requiredTime, notes, status, serviceCode, senior) VALUES ('$date', '$time', '$notes', 'pending', '$serviceCode', '$username')";
      //  $sql2 = "INSERT INTO servicerequest(requestID,requiredDate, requiredTime ,notes,service, senior) VALUES ('request-4','10/02/2018', '09:05 am' ,'notes','100',$username);";

      $set=mysqli_query($db,$sql);
       if ($set === TRUE) {
           $message = "New Request Submitted  successfully";
           echo "<script type='text/javascript'>alert('$message');
           window.location.href = 'SubmitServiceRequest.php';
           </script>";
       } else {
           echo "Error: " . $sql . "<br>" . $db->error;
       }
}
       $db->close();

?>
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
    <a href="index.html"> AIDER.com</a>
    <p>All Rights Reserved by Laiba & Sharifah</p>
  </div>

</footer>

</html>
