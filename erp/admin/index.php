<?php
session_start();
include 'db.php';

if( isset($_POST['login'])  ) {
       
 if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }
        $email=$_POST['email'];
        $password=$_POST['password'];
		
        $ret=mysqli_query( $conn, "SELECT * FROM user WHERE email='$email' and Password='$password' and cat='admin'") or die("Could not execute query: " .mysqli_error($conn));

        $row = mysqli_fetch_array($ret);
		$uid=$row['uid'];
		$name=$row['name'];
        
        if(!$row) {
           
           echo '<script type="text/javascript">';
           echo 'alert("Access Denied")';
           echo '</script>'; 
        }
        else {
        	
            $_SESSION["uid"] = "$uid";
            $_SESSION["namez"] = "$name";
            
            echo '<script type="text/javascript">';
            echo 'alert("succesfully loged in")'; 
            header("Location:home.php");
            echo '</script>';
        		# code...
        	}
        
        }

?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Anant-The Limitless Art | LOGIN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <style>
  .login-page {
	  background:white;
  }
  .card
  {
	  border: 2px solid black;
  }
  .a {
	  border: 1px solid black;
  }
  .gj {
	  color:black;
	  font-weight:bold;
	  font-size:20px;
  }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!--<img src="../images/logo.jpg" width="300" height="100">-->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg gj">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control a" name="email" placeholder="Email">
          <div class="input-group-append a">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control a" name="password" placeholder="Password">
          <div class="input-group-append a">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		
        <div class="row">
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</body>
</html>
