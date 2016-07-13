<?php 
	//if(isset($_GET['user'])) {
		$user = $_GET['user'];
		mysql_connect("localhost", "chess", "Michael111"); 
		mysql_select_db("entryDB");
		$user = htmlentities(mysql_real_escape_string($user));
		echo "Submitted."; 
/*	}
	else{
		die("You have not submitted anything.");
	} */
?> 