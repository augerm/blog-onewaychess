<?php
echo '<meta http-equiv="refresh" content="1; url=http://onewaychess.com/schools_old/entries.php" />';
//$_POST = json_decode(file_get_contents('php://input'), true);
$name = $_POST["name"]; 
$comment = $_POST["comment"];
$date = date("n-j-Y g:i a");
$id = $_POST["id"];
echo "$id";

	if(strlen($comment) >= 1) {
		$con = new mysqli('localhost', 'chess_testuser', 'chess123', 'chess_blogEntries'); 
		if ($con->connect_error) {
    		die("Connection failed: " . $con->connect_error);
		}
		$storeText = nl2br(htmlentities($comment, ENT_QUOTES, 'UTF-8'));
		$comment = $con->real_escape_string($storeText);
		$comment = "'" . $comment . "'";
		$name = "'" . $name . "'";
		$id = "'" . $id . "'";
		$sql = "INSERT INTO comments (commenttext, mydate, post, username) VALUES ($comment, '$date', $id, $name)";
	}
	else{
		die("You have not submitted anything.");
	} 
	if ($con->query($sql) === TRUE) {
    	echo "Comment Submitted";
    	echo "<br>";
    	echo "Wait for refresh or click <a href='http://onewaychess.com/schools_old/entries.php'>here</a>to go back";
    }
 	else {
    	echo "Error: " . $sql . "<br>" . $con->error;
    }

	$con->close();
?> 