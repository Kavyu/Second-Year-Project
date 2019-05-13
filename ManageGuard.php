<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'Tabitha';
$DATABASE_PASS = '12345';
$DATABASE_NAME = 'loginsystem';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT Password, Email FROM users WHERE UserID = ?');
// In this case we can use the user ID to get the user info.
$stmt->bind_param('s', $_SESSION['ID']);
$stmt->execute();
$stmt->bind_result($Password, $Email);
$stmt->fetch();
$stmt->close();
?>

<html>
<head>
	<title>Guards report</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	  <style>
		body {
	     background-color:grey;
	     background-size: cover;
	    font-family: Times New Roman;
	    font-size: 25px;
	    margin-top: 50px;
	    margin-left: 50px;
	  }
	   </style>
		<div style="text-align:center">
	     <h2>VISITORS GATEPASS MANAGEMENT SYSTEM</h2>
	     <p> GUARDS REPORT<p>
	   
	  </div>


<?php

	$dbservername = "localhost";
    $dbusername = "Tabitha";
	$dbpassword = "12345";
	$dbName="loginsystem";
// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbName);


        echo '<table cellpadding="0" cellspacing="20" class="db-table">';
		echo '<tr><th>Guard ID</th><th>First Name</th><th>Last name</th><th>Phonenumber</th><th>Address</th>';


	    $query = "SELECT * FROM guard";
	
        $selectguard=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($selectguard)){
        $GuardID=$row['GuardID'];
        $Firstname=$row['Firstname']; 
        $Lastname=$row['Lastname'] ;
        $Phonenumber=$row['Phonenumber'] ; 
        $Address=$row['Address'] ; 
        
       
       
    echo"<tr>";
    echo"<td>$GuardID</td>";
    echo"<td>$Firstname</td>";   
    echo"<td>$Lastname</td>"; 
    echo"<td>$Phonenumber</td>";  
    echo"<td>$Address</td>"; 
    echo"<td><a href='delete-guard.php?delete={GuardID}'> DELETE</a></td>";           
    echo"</tr>";

   
 }
  echo "</table>" . "<br>";
  $query = "SELECT * FROM guard";
  $selectguard=mysqli_query($conn,$query);
  $data= mysqli_fetch_array($selectguard);
  echo "Total Number of Guards:".(string)(count($data, 1));
  echo"<br>";
 ?>


 <form action="ViewGuard.php" method="post">
		<input type="submit" name="done" value="BACK">
		</form>
		<?php

		if(isset($_POST['done']))
		{
			if ($_SESSION['name'] == 'Admin'){
			header("Location: admin.php");}
			elseif ($_SESSION['name'] == 'manager') {
				header("Location: manager.php");
			}elseif ($_SESSION['name'] == 'guard') {
				header("Location: guard.php");
			}
		}

		?>

</body>

</html>