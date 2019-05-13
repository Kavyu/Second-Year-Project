<?php
  require 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style5.css">
</head>
 <style>
	body 
	{
      background-image:url(house1.jpg);
      background-size: cover;
      font-family: Times New Roman;
      font-size: 25px;
      margin-top: 50px;
      margin-left: 50px;
  }
   </style>
<body>
<div class="container">
	<div style="text-align:center">
     <h2>Guard</h2>
  </div>
  <form action="addguard.php" method="post">
  	<div style="color: red; font-size: 18px;">
  			<?php include ("error.php"); ?>
			<input type="text" name="Firstname" placeholder="Firstname">
			<input type="text" name="Lastname" placeholder="Lastname">
			<input type="tel" name="Phonenumber" placeholder="Phonenumber">
			<input type="text" name="Address" placeholder="Address">
      <input type="text" name="nationalID" placeholder="National ID">
      <input type="text" name="email" placeholder="Enter email">
			<button type="submit" name="submit">Submit</button>
		</form>

	</div>
	

</body>
</html>
