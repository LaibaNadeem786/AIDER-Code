<?php


include("connection.php");

$username = $_SESSION['username'];

$sql_select_service = "SELECT serviceCode, serviceName, serviceType, serviceDesc FROM service WHERE provider = '$username'";
if ($result_select_service = mysqli_query($db, $sql_select_service)) {
	$row_count_select_service =mysqli_num_rows($result_select_service);
	if ($row_count_select_service>0) {
		$i = 1;
		while($row_select_service=mysqli_fetch_assoc($result_select_service)) {
			$serviceCode_selected_service[$i] = $row_select_service['serviceCode'];
			$serviceName_selected_service[$i] = $row_select_service['serviceName'];
      $serviceType_selected_service[$i] = $row_select_service['serviceType'];
			$serviceDesc_selected_service[$i] = $row_select_service['serviceDesc'];
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
  <title>Service List </title>
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
<div class="container ">

  <div class="card"  "center" style="width:auto;" >
    <br>
    <br>
      <img class="card-img-top mx-auto d-block" src="ratingsblue.png" alt="Card image" style="width:30%" >

<h1> &nbsp;Manage Services</h1>
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
              <th>Update/Delete</th>
            </tr>
          </thead>
          <tbody>";
            for ($i = 1; $i <=$row_count_select_service; $i++) {
              echo "
                <tr>
                <form action='UpdateService.php' method='post'>
                  <td>$serviceCode_selected_service[$i]</td>
                  <td>$serviceName_selected_service[$i]</td>
                  <td>$serviceType_selected_service[$i]</td>

                  <td>$serviceDesc_selected_service[$i]</td>
                  <td>

                  <input class='invisible' name='serviceCode' value='$serviceCode_selected_service[$i]'>
                        <button type='submit' class='btn btn-success' name='update_page'><i class='fa fa-pencil'></i></button>
                    </form>

                      <form id='deleteServiceForm' action='deleteService.php' method='post'>
                          <input class='invisible' name='serviceCode' value='$serviceCode_selected_service[$i]'>
                          <button type='button' onclick='deleteConfirmation()' class='btn btn-danger'><i class='fa fa-trash-o'></i></button>
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

      <script>
		function deleteConfirmation() {
				if (confirm("Are you sure that you want to delete this service?")) {
					document.getElementById("deleteServiceForm").submit();
				}
		}
	</script>
<!--
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Service Code</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Description</th>
      <th scope="col">Update/Delete</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">010</th>
      <td>House Cleaning</td>
      <td>Cleaning</td>
      <td>We will clean your house.</td>
      <td><a href="UpdateService.php" type="button" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></td>
    </tr>
    <tr>
      <th scope="row">005</th>
      <td>Home Gardening</td>
      <td>Gardening</td>
      <td>Trim Bushes and water plants</td>
      <td><a href="UpdateService.php" type="button" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></td>
    </tr>
    <tr>
      <th scope="row">216</th>
      <td>Fetch and Drop</td>
      <td>Transportation</td>
      <td>We will fetch you safely from your home to any destination within 20km</td>
      <td><a href="UpdateService.php" type="button" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button></td>
    </tr>
  </tbody>
</table>
</div>
-->
<br>
</br>
<br>
<a href="AddService.php" type="button" class="btn btn-success">Add New Service</a>
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
