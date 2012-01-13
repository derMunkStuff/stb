<?php
//@ $db = new mysqli('dblocation','username','password','dbname');

$host = "localhost";
$user = "root";
$password = "";
$dbname = "tom";

@ $db = new mysqli($host,$user,$password,$dbname);

if (mysqli_connect_errno()){
	
	printf("Connection failed: %s\n", mysqli_connect_error());
	exit();	
}


$result = $db->query('SELECT * FROM tria_termine');

//$row = $result->fetch_assoc();

echo $row['tr_name']."<br /><br /><br />";


while($row = $result->fetch_array()) {

echo $row['tr_name']."<br />";

}

$result->close();


//$mysqli->close();







?>