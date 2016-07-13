<?php 

$fname = $_POST["fname"];  // note to self, strip special chars to prevent injection attack
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$bio = $_POST["bio"];
$position = $_POST["job"];
$password = hash('ripemd160', $password);
$fname = "'" . $fname . "'";
$lname = "'" . $lname . "'";
$email = "'" . $email . "'";
$password = "'" . $password . "'";
$bio = "'" . $bio . "'";
$position = "'" . $position . "'";

		$con = new mysqli('localhost', 'chess_testuser', 'chess123', 'chess_blogEntries'); 
		if ($con->connect_error) {
    		die("Connection failed: " . $con->connect_error);
		}
		$sql = "INSERT INTO posters (email, fname, lname, bioText, password, position) VALUES ($email,$fname,$lname,$bio,$password,$position)";

		echo "Submitted."; 

	if ($con->query($sql) === TRUE) {
    	echo "New record created successfully";
    	echo "<a href='file.html'>back</a>";
    }
 	else {
    	echo "Error: " . $sql . "<br>" . $con->error;
    }
$con->close();

?> 

