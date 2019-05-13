<?php
require 'connect.php';
//code to start sessions
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
// We don't have this info stored in sessions so  we can get the results from the database.
$stmt = $con->prepare('SELECT  first_name, last_name, email, role, password FROM newusers WHERE email = ?');
// In this case we can use the email to get the user info.
$stmt->bind_param('s', $_SESSION['email']);
$stmt->execute();
$stmt->bind_result($fname, $sname, $email, $role, $Password);
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

<form action="ViewVisitor.php" method="post">
		<?php include ("error.php"); ?>
        <label for="searchterm">
          <i class="fas fa-search"></i>
        </label>
        <input type="text" name="search" placeholder="search" id="search" required>
        <input type="submit" name="go" value="Search">
     </form>


<?php

	$dbservername = "localhost";
    $dbusername = "Tabitha";
	$dbpassword = "12345";
	$dbName="loginsystem";
// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbName);

$no_of_guards = 0;
        echo '<table cellpadding="0" cellspacing="20" class="db-table">';
		echo '<tr><th>first_name</th><th>last_name</th><th>email</th><th>role</th><th>phoneNumber</th>
		<th>nationalID</th><th>Address</th><th>Password</th>';


	    $query = "SELECT * FROM newusers WHERE role='guard' ";
	
        $selectguard=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($selectguard)){
        $first_name=$row['first_name'];
        $last_name=$row['last_name']; 
        $email=$row['email'] ;
        $role=$row['role'] ; 
        $nationalID=$row['nationalID'] ; 
        $Address=$row['Address'] ; 
        $Password=$row['password'] ; 
        $no_of_guards++;
        
       
       
	    echo"<tr>";
	    echo"<td>$first_name</td>";
	    echo"<td>$last_name</td>";
	    echo"<td>$email</td>";
	    echo"<td>$role</td>";   
	    echo"<td>$nationalID</td>"; 
	    echo"<td>$Address</td>";  
	    echo"<td>$Password</td>";           
	    echo"</tr>";

   
 }
	  echo "</table>" . "<br>";
	  echo "Total Number of Guards: ".(string)$no_of_guards;
	  echo"<br>";
 ?>


 <form action="ViewGuard.php" method="post">
		<input type="submit" name="done" value="BACK">
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

</body>

</html>