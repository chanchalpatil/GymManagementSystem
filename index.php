<?php
if($_POST){
  $dbServername = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "gym_database";

  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

  $username = $_POST['User Name'];
  $password = $_POST['Password'];
  $query = "SELECT * FROM `users` WHERE `User Name`='$username' AND `Password` = '$password';";
  $result = mysqli_query($conn, $query);

  if (!$result || mysqli_num_rows($result) == 0){
     session_start();
     $_SESSION['gym_database']='true';
     header('location:home.php');
  }
  else {echo "WRONG USERNAME OR PASSWORD";}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Cache-control" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>THE ENERGY HUB</title>

  <!-- Favicons -->
  <link href="img/favicon.jpg" rel="icon">
 
  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">


  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
      body {
        
        font-family: 'Acme', sans-serif;
        font-family: 'Kalam', cursive;
  
      }
    </style>  
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
<div style="background-image: url('img/gym.jpg'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover;">
  <div id="login-page">
    <div class="container">

      <form class="form-login" action="" method="POST">
        <h2 class="form-login-heading">ADMIN ACCESS</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="User Name" id="username" name="user" autofocus required>
          <br>
          <input type="password" class="form-control" placeholder="Password" id="password" name="pass" required>
          <br>
          <button class="btn btn-theme btn-block" type="submit" value="Login" name="submit"><i class="fa fa-lock"><br></i>LOGIN NOW</button>
          
          <hr>
        </div>
        
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
