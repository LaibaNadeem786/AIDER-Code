<?php


include("connection.php");

$username = $_SESSION['username'];

$sql_select_service = "SELECT * FROM service";
if ($result_select_service = mysqli_query($db, $sql_select_service)) {
	$row_count_select_service =mysqli_num_rows($result_select_service);
	if ($row_count_select_service>0) {
		$i = 1;
		while($row_select_service=mysqli_fetch_assoc($result_select_service)) {
			$serviceCode_selected_service[$i] = $row_select_service['serviceCode'];
			$serviceName_selected_service[$i] = $row_select_service['serviceName'];
      $serviceType_selected_service[$i] = $row_select_service['serviceType'];
			$serviceDesc_selected_service[$i] = $row_select_service['serviceDesc'];
      $serviceprovider_selected_service[$i] = $row_select_service['provider'];
			$i++;
		}
	}
} else{
	$row_count_select_service = 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> Available Services </title>
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
    <img class="card-img-top mx-auto d-block" src="services.jpeg" alt="Card image" style="width:30%" >
    <h1> &nbsp; Services</h1>
    <br>
    <br>

      <?php if ($row_count_select_service == 0) {
              echo "<p>No services have been created yet</p>";
            } else {
              echo "
              <table class='table table-striped'>
                <thead>
                  <tr>
                    <th>Service Code</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>  Provider</th>
                      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit Service Request / View Rating</th>
                  </tr>
                </thead>
                <tbody>";
                  for ($i = 1; $i <=$row_count_select_service; $i++) {
                    echo "
                      <tr>
                      <form action='SubmitServiceRequest.php' method='post'>
                        <td>$serviceCode_selected_service[$i]</td>
                        <td>$serviceName_selected_service[$i]</td>
                        <td>$serviceType_selected_service[$i]</td>

                        <td>$serviceDesc_selected_service[$i]</td>
                        <td>  $serviceprovider_selected_service[$i]</td>
                        <td>

                        <input class='invisible' name='serviceCode' value='$serviceCode_selected_service[$i]'>
                              <button type='submit' class='btn btn-success' name='update_pagenow'>Submit Service Request</button>
                          </form>
                          <br>
                          </br>
                            <form  action='viewRatingsofProvider.php' method='post'>
                                <input class='invisible' name='serviceCode' value='$serviceCode_selected_service[$i]'>
                                <button type='submit'  class='btn btn-danger'>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; View Rating &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; </button>
                            </form>
                        </td>
                      </tr>
                    ";
                  } echo "
                </tbody>
              </table>
              ";
            }
            ?>
            <br>
            </br>
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
