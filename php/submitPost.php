<?php 
echo '<meta http-equiv="refresh" content="2; url=http://onewaychess.com/blog/entries.php" />';
$entry = $_POST["entry"];  
$userName = $_POST["username"];
$password = $_POST["password"];
$title = $_POST["title"];
$topic = $_POST["topic"];
$date = date("n-j-Y g:i a");
//$password = "'" . $password . "'";

	if(strlen($entry) >= 1) {
		$server = "us-cdbr-iron-east-04.cleardb.net";
        $username = "b0c4b9423d2803";
        $password = "48a9e62a";
        $db = "heroku_1dd2b8ffb0f1998";
        $con = new mysqli($server, $username, $password, $db);
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
		$storeText = nl2br(htmlentities($entry, ENT_QUOTES, 'UTF-8'));
		$entry = $con->real_escape_string($storeText);
		$entry = "'" . $entry . "'";
		$userName = "'" . $userName . "'";
		$title = "'" . $title . "'";
		$topic = "'" . $topic . "'";
		$date = "'" . $date . "'";
		$password = hash('ripemd160', $password);
		echo hash('ripemd160', 'password');
		//$sqlTest = "SELECT password from posters where $userName = (select email from posters)";
		$sqlTest = "SELECT password from posters where $userName = posters.email";		
		$result = $con->query($sqlTest);
		$row = $result->fetch_assoc();
		if ($row["password"] != $password) {
			echo $row["password"];
			echo $password;
			die("invalid login information");
		}
		$sql = "INSERT INTO entries (mydate, title, entryText, topic, pEmail) VALUES ($date,$title,$entry,$topic,$userName)";
	}
	else{
		die("You have not submitted anything.");
	} 
	if ($con->query($sql) === TRUE) {
    	echo "New record created successfully";
    	echo "<br>";
    	echo "<a href='http://onewaychess.com/blog/blog.html'>back</a>";
    }
 	else {
    	echo "Error: " . $sql . "<br>" . $con->error;
    }

	$con->close();
?> 