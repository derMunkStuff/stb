<?php
include_once("../config.php");
//include_once("../includes/magicquotes.php");

//$FormValues = array();
//foreach($_POST as $key=>$val){
//	$FormValues[$key] = magicquotes($val);
//}


$query = sprintf("SELECT * FROM " . $stbSITE['dbPrefix'] . "test_basis_daten 
					WHERE del='0'
					"
					);
$result = mysqli_query($db, $query) or die ("what?");


while($row = mysqli_fetch_array($result)) {

//echo $row['basis_datum']."<br />";

	echo "<row id='". $row['id_basis']."'>";			
	echo "<id_basis><![CDATA[". $row['id_basis']."]]></id_basis>";
	echo "<basis_datum><![CDATA[". $row['basis_datum']."]]>m</basis_datum>";
	echo "<basis_uhrzeit><![CDATA[". $row['basis_uhrzeit']."]]></basis_uhrzeit>";
	echo "<basis_laufzeit><![CDATA[". $row['basis_laufzeit']."]]></basis_laufzeit>";
	echo "<id_schuh><![CDATA[". $row['id_schuh']."]]></id_schuh>";
	echo "<id_spa><![CDATA[". $row['id_spa']."]]></id_spa>";
	echo "<basis_km><![CDATA[". $row['basis_km']."]]></basis_km>";
	echo "</row>";




}
?>