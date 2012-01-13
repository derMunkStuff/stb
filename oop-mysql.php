<?php
//@ $db = new mysqli('dblocation','username','password','dbname');

$host = "hostname";
$user = "username";
$password = "passwort";
$dbname = "dbname";

@ $db = new mysqli($host,$user,$password,$dbname);

if (mysqli_connect_errno()){
	
	printf("Connection failed: %s\n", mysqli_connect_error());
	exit();	
}


$query =  sprintf("SELECT * FROM cur_xt_ltb_basis WHERE del='0' ORDER BY basis_datum");

//$result = $db->query('SELECT * FROM cur_xt_ltb_basis');
$result = $db->query($query);

//$row = $result->fetch_assoc();
$row = $result->fetch_assoc();
echo "Datum: ".$row['basis_datum']."<br /><br /><br />";


while($row = $result->fetch_assoc()) {

echo date("d.m.Y", $row['basis_datum'])."<br />";

}

$result->close();


//$mysqli->close();







?>