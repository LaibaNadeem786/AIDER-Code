<?php include('connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favorite.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">

  <script>

  function validateSignupForm(){
  	if (document.getElementById("psw").value!=document.getElementById("psw2").value){
  			alert("Password and new password is different They must be same.");
  			return false;
  	}
    return true;
  }

  </script>

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
          <a class="nav-link" href="ServiceList.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  <div class="container " >

    <div class="card"  "center" style="width:auto;" >
      <br>
      <br>
      <img class="card-img-top mx-auto d-block" src="usericon.png" alt="Sign up icon of the user" style="width:20%" >

      <h1> &nbsp; Sign Up<small> &nbsp;for Service Provider</small></h1>
      <br>
      <br>
      <form method ="post" action="SignUpServiceProvider.php">
      <?php include('errors.php'); ?>

      <div class="container mt-3">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Full Name</span>
          </div>
          <input type="text" class="form-control" placeholder="Full Name" id="fullname" name="fullname" value="<?php echo $fullname; ?>" required>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Username</span>
          </div>
          <input type="text" class="form-control" placeholder=" Enter Username" id="username" name="username" value="<?php echo $username; ?>" required>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Password</span>
          </div>
          <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" required>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Confirm Password</span>
          </div>
          <input type="password" class="form-control" placeholder="Re Enter Password" id="Confirmpassword" name="Confirmpassword" required>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Phone Number</span>
          </div>
          <input type="tel" class="form-control" placeholder="Contact Details" id="mobileNo" name="mobileNo" value="<?php echo $mobileNo; ?>" required>
        </div>
          <br>
          <br>
          <br>
        </div>
        <br>&nbsp;&nbsp;
        <button type="submit" class="btn btn-danger" name="reg_provider" onclick="return validateSignupForm();"> Sign Up</button>

        <br>
        <br>
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
