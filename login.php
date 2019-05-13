<?php
   require 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style7.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>LogIn</title>
</head>
  <style>
    body{
      background-image: url(house3.jpg);
      background-size: cover;
      font-family:Times New Roman;
      color:antiquewhite;
      font-size: 25px;
      margin-top:50px;
      margin-left:50px;}
      h2{
        background-color:black
        padding: 10px; 
      }
    </style>
<body>

<header>

<!-- Load an icon library -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="navbar">
  <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="login.php.php"><i class="fa fa-fw fa-user"></i>Log In</a>
  <a href="about.php"><i class="fa fa-fw fa-info-circle"></i>About Us</a>
  <a href="contact.php"><i class="fa fa-fw fa-envelope"></i>Contact Us</a>
</header>
<div class="login">
      <h1>Login</h1>
      <form action="authenticate.php" method="post">
        <label for="Password">
         <i class="fas fa-lock"></i>
        </label>
        <input type="Password" name="password" placeholder="Password" id="password" required>
        <label for="email">
          <i class="fas fa-at"></i>
        </label>
        <input type="email" name="email" placeholder="email" id="email" required></br>
        <br>
        
        <input type="submit" name="login" value="Login">
        <div class="container Login">
  </div>
      </form>
    </div>
  </body>
</html>