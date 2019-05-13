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
// We don't have this info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT first_name, last_name, email, role, password FROM newusers WHERE email = ?');
// In this case we can use the user email to get the user info.
$stmt->bind_param('s', $_SESSION['email']);
$stmt->execute();
$stmt->bind_result($fname, $sname, $email, $role, $Password);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style6.css">
</head>
<style>
	body 
	{
      background-color:white;
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
	<h1>VISITORS GATEPASS MANAGEMENT SYSTEM</h1>
     <p>GatePass</p>
  </div>
<?php

	    $dbservername = "localhost";
	    $dbusername = "Tabitha";
		$dbpassword = "12345";
		$dbName="loginsystem";
	// Create connection
	$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbName);


		$counter = 0;
		$query = "SELECT Firstname, Lastname, VisitorID, NationalID, Entrytime, Hostname, HouseNumber  FROM visitor order by VisitorID DESC";
	
        $selectVisitor=mysqli_query($conn,$query);
         $row=mysqli_fetch_assoc($selectVisitor);

        $VisitorID=$row['VisitorID'];
        $NationalID=$row['NationalID'];
        $Firstname=$row['Firstname'];
        $Lastname=$row['Lastname'] ;
        $Entrytime=$row['Entrytime'] ;
        $Hostname=$row['Hostname'] ;
        $HouseNumber=$row['HouseNumber'] ;
        

        
        echo "Visitor ID :" . $VisitorID . "<br>";
        echo "National ID :" . $NationalID . "<br>";
        echo "Firstname :" . $Firstname . "<br>";
        echo "Lastname :" . $Lastname. "<br>";
        echo "Entry time :" . $Entrytime . "<br>";
        echo "Hostname:" . $Hostname . "<br>";
        echo "HouseNumber:" . $HouseNumber . "<br>";


?>
<br>
<br>



<form action="GatePass.php" method="post">
		<input type="submit" name="done" value="PrintGatepass">
		</form>
		<?php

		if(isset($_POST['done']))
		{
			if ($_SESSION['role'] == 'admin'){
			header("Location: admin.php");}
			elseif ($_SESSION['role'] == 'manager') {
				header("Location: manager.php");
			}elseif ($_SESSION['role'] == 'guard') {
				header("Location: guard.php");
			}
		}

		?>

	</div>

</body>
</html>