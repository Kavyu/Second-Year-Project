<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'Tabitha';
$DATABASE_PASS = '12345';
$DATABASE_NAME = 'loginsystem';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['email'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	die ('Please fill both the email and password field!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT first_name, last_name, email, role, password FROM newusers WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// Store the result so we can check if the user exists in the database.
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
	$stmt->bind_result($fname, $sname, $email, $role, $Password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if ($_POST['password'] === $Password) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		$Username	= $fname. " " .$sname;
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $Username;
		$_SESSION['Password'] = $Password;
		$_SESSION['Email'] = $email;
		$_SESSION['role'] = $role;
		
		if ($_SESSION['role'] == 'admin')
		{
		header("Location: admin.php");
	    }
		elseif ($_SESSION['role'] == 'manager')
		 {
			header("Location: manager.php");
		}
		elseif ($_SESSION['role'] == 'guard')
		 {
			header("Location: guard.php");
		}
		else
		{
			echo "Welcome";
		}
	} 
	else {
		echo 'Incorrect password!';
	}
} 
else 
{
	echo 'Incorrect username!';
}
$stmt->close();
}
?>