<?php 
echo '<meta http-equiv="refresh" content="2; url=http://onewaychess.com/blog/submit.html" />';
$fname = $_POST["fname"];  
$lname = $_POST["lname"];
$email = $_POST["mail"];
$password = $_POST["password"];
$bio = $_POST["bio"];
$position = $_POST["job"];
$password = hash('ripemd160', $password);
$target_dir = "/img/Users/";
//$target_file = $target_dir . basename($_FILES["userPicture"]["name"]);
//$target_file = "/home2/chess/public_html/onewaychess.com/schools_old/img/Users/" . basename($_FILES["userPicture"]["name"]);
$target_file = "/home2/chess/public_html/onewaychess.com/blog/img/Users/" . $_FILES["userPicture"]["name"];
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["userPicture"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["userPicture"]["size"] > 200000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Upload Failed";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["userPicture"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["userPicture"]["name"]). " has been uploaded.";
        echo $target_file;
    } else {
        die("Sorry, there was an error uploading your file.");
    }
}

		$server = "us-cdbr-iron-east-04.cleardb.net";
        $username = "b0c4b9423d2803";
        $password = "48a9e62a";
        $db = "heroku_1dd2b8ffb0f1998";
        $con = new mysqli($server, $username, $password, $db);
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        $storeText = nl2br(htmlentities($bio, ENT_QUOTES, 'UTF-8'));
        $bio = $con->real_escape_string($storeText);
        $fname = "'" . $fname . "'";
        $lname = "'" . $lname . "'";
        $email = "'" . $email . "'";
        $password = "'" . $password . "'";
        $bio = "'" . $bio . "'";
        $position = "'" . $position . "'";
        $imagelink = "'" . $_FILES["userPicture"]["name"] . "'";
		$sql = "INSERT INTO posters (email, fname, lname, imagelink, bioText, password, position) VALUES ($email,$fname,$lname,$imagelink,$bio,$password,$position)";

	if ($con->query($sql) === TRUE) {
    	echo "<br>New record created successfully";
    	echo "<br>";
    	echo "Wait for redirect or click <a href='http://blog.onewaychess.com/'>here</a> to go back";
    }
 	else {
    	echo "Error: " . $sql . "<br>" . $con->error;
    }
$con->close();

?> 

