<?php
  require 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
 <style>
	body {
   background-image:url(house12.jpg);
   background-size: cover;
   font-family: Times New Roman;
   font-size: 25px;
   margin-top: 50px;
   margin-left: 50px;
  }
  </style>
<body>
	<div style="text-align:center">
     <h2>Manager</h2>
  </div>
  <form action="addmanager.php" method="post">
  	<div style="color: red; font-size: 18px;">
      <?php include("error.php")?>
    </div>
			<input type="text" name="Firstname" placeholder="Firstname">
      <input type="text" name="Lastname" placeholder="Lastname">
      <input type="tel" name="Phonenumber" placeholder="Phonenumber">
      <input type="text" name="Address" placeholder="Address">
      <input type="text" name="nationalID" placeholder="National ID">
      <input type="text" name="email" placeholder="Enter email">
      <button type="submit" name="submit-manager">Submit</button>
		</form>
	</div>

</body>
</html>