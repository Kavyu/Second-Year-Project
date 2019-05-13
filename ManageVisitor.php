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
$stmt = $con->prepare('SELECT first_name, last_name, email, role, password FROM newusers WHERE email = ? ');
// In this case we can use the user ID to get the user info.
$stmt->bind_param('s', $_SESSION['email']);
$stmt->execute();
$stmt->bind_result($fname, $sname, $email, $role, $Password);
$stmt->fetch();
$stmt->close();
?>

<html>
<head>
	<title>visitors report</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	  <style>
		body {
	     background-color:skyblue;
	     background-size: cover;
	    font-family: Times New Roman;
	    font-size: 25px;
	    margin-top: 50px;
	    margin-left: 50px;
	  }
	   </style>
		<div style="text-align:center">
	     <h2>VISITORS GATEPASS MANAGEMENT SYSTEM</h2>
	     <p> VISITORS REPORT<p>
	   
	  </div>


<?php

	$dbservername = "localhost";
    $dbusername = "Tabitha";
	$dbpassword = "12345";
	$dbName="loginsystem";
// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbName);



			echo '<table cellpadding="0" cellspacing="20" class="db-table">';
		echo '<tr><th>Visitor ID</th><th>National ID</th><th>First Name</th><th>Last name</th><th>Address<th>Phonenumber</th><th>Entry time</th><th>Host name</th><th>HouseNumber</th>';

$no_of_visitors = 0;
	$query = "SELECT * FROM visitor";
	
        $selectVisitor=mysqli_query($conn,$query);
        while ($row=mysqli_fetch_assoc($selectVisitor)){
        $visitorID=$row['VisitorID'];
        $NationalID=$row['NationalID'];
        $Firstname=$row['Firstname']; 
        $Lastname=$row['Lastname'] ; 
        $Address=$row['Address'] ; 
        $Phonenumber=$row['Phonenumber'] ;
        $Entrytime=$row['Entrytime'] ;
        $Hostname=$row['Hostname'] ;
        $HouseNumber=$row['HouseNumber'] ;
        $no_of_visitors++;
           
          
         
        
    echo"<tr>";
    echo"<td>$visitorID</td>";
    echo"<td>$NationalID</td>";
    echo"<td>$Firstname</td>";   
    echo"<td>$Lastname</td>"; 
    echo"<td>$Address</td>"; 
    echo"<td>$Phonenumber</td>";
    echo"<td>$Entrytime</td>"; 
    echo"<td>$Hostname</td>"; 
    echo"<td>$HouseNumber</td>";  
    echo"<td><a href='delete-visitor.php?delete={VisitorID}'> DELETE</a></td>";         
    echo"</tr>";

   
 }
  echo "</table>" . "<br>";
  echo "Total Number Of Visitors:".(string)$no_of_visitors;
  echo"<br>";
 ?>


 <form action="ViewVisitor.php" method="post">
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