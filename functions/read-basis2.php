<?php


mysql_connect("localhost", "root","") or die ("Keine Verbindung moeglich");
mysql_select_db("sporttagebuch-2012") or die ("Die Datenbank existiert nicht.");

$query = sprintf("SELECT * FROM stb_test_basis_daten
					WHERE del='0'
					"
					);
					//echo $query;
$result = mysql_query($query) ;

while($row = mysql_fetch_array($result,MYSQL_ARRAY)) {

//echo $row['basis_datum']."<br />";

	echo "<row id='". $row['id_basis']."'>";			
	echo "<id_basis><![CDATA[". $row['id_basis']."]]></id_basis>";
	echo "<basis_datum><![CDATA[". $row['basis_datum']."]]></basis_datum>";
	echo "</row>";

}





?>