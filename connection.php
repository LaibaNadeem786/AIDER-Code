<?php
session_start();

// initializing variables
$username = "";
$fullname = "";
$address = "";
$mobileNo = "";
$serviceName = "";
$serviceType = "";
$serviceDesc = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'aider');

// REGISTER Senior
if (isset($_POST['reg_senior'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $mobileNo = mysqli_real_escape_string($db, $_POST['mobileNo']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['Confirmpassword']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($fullname)) { array_push($errors, "Name is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM senior WHERE username='$username'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }


  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO senior (username, password, fullname, mobileNo, address)
  			  VALUES('$username', '$password', '$fullname', '$mobileNo', '$address')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ServiceList.php');
  }
}

// REGISTER Provider
if (isset($_POST['reg_provider'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $mobileNo = mysqli_real_escape_string($db, $_POST['mobileNo']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['Confirmpassword']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($fullname)) { array_push($errors, "Name is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM provider WHERE username='$username'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "");
      echo '<script language="javascript">';
      echo 'alert("Username already exists")';
      echo '</script>';

    }


  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO provider (username, password, fullname, mobileNo)
  			  VALUES('$username', '$password', '$fullname', '$mobileNo')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ManageServicesProvided.php');
  }
}

// ...
// LOGIN SENIOR
if (isset($_POST['login_senior'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM senior WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: ServiceList.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

// LOGIN Provider
if (isset($_POST['login_provider'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM provider WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: ManageServicesProvided.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


if (isset($_POST['add_service'])){
  $serviceName = mysqli_real_escape_string($db, $_POST['serviceName']);
  $serviceDesc = mysqli_real_escape_string($db, $_POST['serviceDesc']);
  $serviceType = mysqli_real_escape_string($db, $_POST['serviceType']);

  $provider = mysqli_real_escape_string($db, $_SESSION['username']);

  $query =  "INSERT INTO service (serviceName, serviceType, serviceDesc, provider)
        VALUES('$serviceName', '$serviceType', '$serviceDesc', '$provider')";
  mysqli_query($db, $query);
  header('location: ManageServicesProvided.php');
}

?>
