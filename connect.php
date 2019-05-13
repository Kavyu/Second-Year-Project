
<?php

$myerrors = array();

$dbservername = "localhost";
$dbusername = "Tabitha";
$dbpassword = "12345";
$dbName="loginsystem";
// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

#on click submit= Search

if (isset($_POST['go'])){
    $searchTerm= mysqli_real_escape_string($conn, $_POST['search']);
	$visitor_search_query="SELECT * FROM visitor WHERE NationalID=$searchTerm";
	$result = mysqli_query($conn, $visitor_search_query	);
	$visitor= mysqli_fetch_assoc($result);

	if(count($visitor, 0) === 0	){
		echo("Visitor not found");
	}
	elseif (count($visitor) > 0) {
		echo '<table cellpadding="0" cellspacing="20" class="db-table">';
		echo '<tr><th>Visitor ID</th><th>National ID</th><th>First Name</th><th>Last name</th><th>Address<th>Phonenumber</th><th>Entry time</th><th>Host name</th><th>HouseNumber</th>';
	$visitorID=$visitor['VisitorID'];
    $NationalID=$visitor['NationalID'];
    $Firstname=$visitor['Firstname']; 
    $Lastname=$visitor['Lastname'] ; 
    $Address=$visitor['Address'] ; 
    $Phonenumber=$visitor['Phonenumber'] ;
    $Entrytime=$visitor['Entrytime'] ;
    $Hostname=$visitor['Hostname'] ;
    $HouseNumber=$visitor['HouseNumber'] ;     
         
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
    echo"</tr>";
    echo "</table>" . "<br>";
	}
}

        
#on click submit = add guard
   if (isset($_POST['submit'])){
  $Firstname= mysqli_real_escape_string($conn, $_POST['Firstname']);
  $Lastname= mysqli_real_escape_string($conn, $_POST['Lastname']);
  $Phonenumber= mysqli_real_escape_string($conn, $_POST['Phonenumber']);
  $Address= mysqli_real_escape_string($conn, $_POST['Address']);
  $Email= mysqli_real_escape_string($conn, $_POST['email']);
  $nationalID= mysqli_real_escape_string($conn, $_POST['nationalID']);
  $password = $Firstname.$nationalID;


  
	if(empty($Firstname))
	{
		array_push($myerrors, "First name is required.");
	}

	if(empty($Lastname))
	{
		array_push($myerrors, "Last name is required.");
	}

	if(empty($Email))
	{
		array_push($myerrors, "Email is required.");
	}
	else{
	if (!filter_var($Email, FILTER_VALIDATE_EMAIL))
   {
    array_push($myerrors, "Invalid format and please re-enter valid email"); 
   }
  }
	if(empty($password))
	{
		array_push($myerrors, "Password is required.");
	}


$guard_check_query="SELECT * FROM newusers WHERE nationalID=$nationalID LIMIT 1 ";
$result = mysqli_query($conn, $guard_check_query);
$guard= mysqli_fetch_assoc($result);
if($result)
{
	if($guard['nationalID'] === $nationalID)
	{
		array_push($myerrors, "The guard already exists");
	}
}



 if(count($myerrors)==0)
{
  $query="insert into newusers (first_name,last_name,email,role,phoneNumber,nationalID,Address,password)
  values('$Firstname','$Lastname','$Email', 'guard', '$Phonenumber', '$nationalID','$Address', '$password')";
  $query_run=mysqli_query($conn,$query);
  if($query_run){
echo 'Registered';
header("Location: admin.php");
  }else{
    echo 'Error!';
  }
}
}
#on click submit = visitor
 
  if (isset($_POST['submit-visitor']))
 {   
      $NationalID=mysqli_real_escape_string($conn, $_POST['NationalID']);
	  $Firstname= mysqli_real_escape_string($conn, $_POST['Firstname']);
	  $Lastname= mysqli_real_escape_string($conn, $_POST['Lastname']);
	  $Address=mysqli_real_escape_string($conn, $_POST['Address']);
	  $Phonenumber=mysqli_real_escape_string($conn, $_POST['Phonenumber']);
	  $Hostname=mysqli_real_escape_string($conn, $_POST['Hostname']);
	  $HouseNumber=mysqli_real_escape_string($conn, $_POST['HouseNumber']);


	 if(empty($NationalID))
	 {
		array_push($myerrors, "NationalID is required.");
	 }

	  if(empty($Firstname))
	{
		array_push($myerrors, "First name is required.");
	}

	if(empty($Lastname))
	{
		array_push($myerrors, "Last name is required.");
	}

	if(empty($Address))
	{
		array_push($myerrors, "Address is required.");
	}

	if(empty($Phonenumber))
	{
		array_push($myerrors, "Phonenumber is required.");
	}
	if(empty($Hostname))
	{
		array_push($myerrors, "Hostname is required.");
	}

	if(empty($HouseNumber))
	{
		array_push($myerrors, "HouseNumber is required.");
	}

   $visitor_check_query="SELECT * FROM visitor WHERE Phonenumber=$Phonenumber OR NationalID=$NationalID LIMIT 1 ";
   $result = mysqli_query($conn, $visitor_check_query);
   $visitor= mysqli_fetch_assoc($result);	
	if($result)
	{

		if($visitor['NationalID'] === $NationalID)
	{
		array_push($myerrors, "The NationalID already exists");
	}
		if($visitor['Phonenumber'] === $Phonenumber)
		{
			array_push($myerrors, "The phone number already exists");
		}
	}


	if(count($myerrors)==0)
	{
	  $query="insert into visitor (NationalID,Firstname,Lastname,Address,Phonenumber,Hostname,HouseNumber)
	  values('$NationalID','$Firstname','$Lastname','$Address','$Phonenumber','$Hostname','$HouseNumber')";
	  $query_run=mysqli_query($conn,$query);
	  if($query_run){
	echo 'Registered';
	header("Location: gatepass.php");
	  }else{
	    echo 'Error!';
	  }
	}

}

#on click submit = manager
 if (isset($_POST['submit-manager'])){
  $Firstname= mysqli_real_escape_string($conn, $_POST['Firstname']);
  $Lastname= mysqli_real_escape_string($conn, $_POST['Lastname']);
  $Phonenumber= mysqli_real_escape_string($conn, $_POST['Phonenumber']);
  $Address= mysqli_real_escape_string($conn, $_POST['Address']);
  $Email= mysqli_real_escape_string($conn, $_POST['email']);
  $nationalID= mysqli_real_escape_string($conn, $_POST['nationalID']);
  $password = $Lastname.$nationalID;

	if(empty($Firstname))
	{
		array_push($myerrors, "First name is required.");
	}

	if(empty($Lastname))
	{
		array_push($myerrors, "Last name is required.");
	}

	if(empty($Email))
	{
		array_push($myerrors, "Email is required.");
	}
	else{
	if (!filter_var($Email, FILTER_VALIDATE_EMAIL))
   {
    array_push($myerrors, "Invalid format and please re-enter valid email"); 
   }
  }
	if(empty($password))
	{
		array_push($myerrors, "Password is required.");
	}

   $manager_check_query="SELECT * FROM newusers	 WHERE nationalID=$nationalID LIMIT 1 ";
   $result = mysqli_query($conn, $manager_check_query);
   $manager= mysqli_fetch_assoc($result);	

	if($result)
	{
		if($manager['nationalID'] === $nationalID)
		{
			array_push($myerrors, "The email address already exists");
		}
	}

	  
	if(count($myerrors)==0)
	{
	  $query= "insert into newusers (first_name,last_name,email,role,phoneNumber,nationalID,Address,password)
  values('$Firstname','$Lastname','$Email', 'manager', '$Phonenumber', '$nationalID','$Address', '$password')";
	  $query_run=mysqli_query($conn,$query);
	  if($query_run){
	  echo 'Registered';
	  header("Location: admin.php");
	  }else{
	    echo 'Error!';
	  }
	 }
	}
#contact
 if (isset($_POST['Submit-contact']))
 {
  $Emailaddress=mysqli_real_escape_string($conn, $_POST['Emailaddress']);
  $Subject= mysqli_real_escape_string($conn,$_POST['Subject']);

  if(empty($Emailaddress))
	{
		array_push($myerrors, "Email is required.");
	}else
	{
       if (!filter_var($Emailaddress, FILTER_VALIDATE_EMAIL))
   {
    array_push($myerrors, "Invalid format and please re-enter valid email"); 
   }
  }
	if(empty($Subject))
	{
		array_push($myerrors, "Subject is required.");
	}

$contact_check_query="SELECT * FROM contact WHERE Emailaddress=$Emailaddress LIMIT 1 ";
   $result = mysqli_query($conn, $contact_check_query);
   $contact= mysqli_fetch_assoc($result);	

	if($result)
	{
		if($user['Emailaddress'] === $Emailaddress)
		{
			array_push($myerrors, "The email address already exists");
		}
	}

  if(count($myerrors)==0)
	{
	  $query= "insert into contact(Emailaddress,Subject)
	  values('$Emailaddress','$Subject')";
	  $query_run=mysqli_query($conn,$query);
	  if($query_run){
	  echo 'Registered';
	  header("Location: index.php");
	  }else{
	    echo 'Error!';
	  }
	}
}
 ?>