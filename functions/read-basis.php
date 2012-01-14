<?php
include_once("../config.php");


$query = sprintf("SELECT * FROM stb_test_basis_daten 
					WHERE del='0'
					"
					);
$result = mysqli_query($db, $query) or die ("what?");

//echo $query;
while($row = mysqli_fetch_array($result)) {

//echo $row['basis_datum']."<br />";

	echo "<row id='". $row['id_basis']."'>";			
	echo "<id_basis><![CDATA[". $row['id_basis']."]]></id_basis>";
	echo "<basis_datum><![CDATA[". date("d.m.Y",$row['basis_datum'])."]]></basis_datum>";
	echo "</row>";

}
?>