<?php
$url = parse_url(getenv("mysql://b0c4b9423d2803:48a9e62a@us-cdbr-iron-east-04.cleardb.net/heroku_1dd2b8ffb0f1998?reconnect=true"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$con = new mysqli($server, $username, $password, $db);
echo $con;

$table2 = "entries"; // id, mydate, title, entryText, topic, pEmail
$table = "posters"; // email, fname, lname, imagelink, bioText, password, position
//		username varchar(80), mydate varchar(40), title varchar(60), commenttext longtext not null, post int not null

$sql2 = "CREATE TABLE entries (id int NOT NULL auto_increment, mydate varchar(20) NOT NULL, title varchar(255) NOT NULL,
			 entryText longtext not null, topic varchar(80), pEmail varchar(240) not null, constraint idPK primary key (id), constraint pEmailFK foreign key (pEmail) references posters(email))";

$sql = "CREATE TABLE posters (email varchar(240) not null, fname varchar(40) NOT NULL, lname varchar(40) NOT NULL, imagelink varchar(200),
			 bioText longtext not null, password varchar(30) not null, position varchar(40) NOT NULL, constraint emailPK primary key (email))";

if ($con->query($sql2) === TRUE) {
    echo "Tables created successfully";
    echo "<br>";
    echo "<a href='http://onewaychess.com/schools_old/blog.html'>back</a>";

} else {
    echo "Error creating table: " . $con->error;
}

/*$sql = "create table if not exists '$table' (id int not null auto_increment, mydate varchar(20) not null, title varchar(255) not null,
			 entryText longtext not null, topic varchar(80), pEmail varchar(240) not null, constraint idPK primary key (id), constraint pEmailFK foreign key (pEmail))"; */

$con->close();
?>

