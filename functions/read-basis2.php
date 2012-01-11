<?php
//include_once("../config.php");
//include_once("../includes/magicquotes.php");

//$FormValues = array();
//foreach($_POST as $key=>$val){
//	$FormValues[$key] = magicquotes($val);
//}
//$CONF['host'] = 'localhost';
//$CONF['user'] = 'root';
//$CONF['passw'] = '';
//$CONF['db'] = 'sporttagebuch-2012';
//$CONF['dbDB'] = 'promotions';
//$stbSITE['dbPrefix']='sporttagebuch-2012';
//$CONF['dbname'] = mysql_connect($CONF['host'], $CONF['user'], $CONF['passw']) ;

mysql_connect("localhost", "root","") or die ("Keine Verbindung moeglich");
mysql_select_db("sporttagebuch-2012") or die ("Die Datenbank existiert nicht.");//$CONF['db1'] = mysql_select_db($CONF['db'], $CONF['dbname']) ;

$query = sprintf("SELECT * FROM stb_test_basis_daten 
					WHERE del='0'
					"
					);
					//echo $query;
$result = mysql_query($query) ;

while($row = mysql_fetch_assoc($result,MYSQL_BOTH)) {

echo $row['basis_datum']."<br />";

	echo "<row id='". $row['id_basis']."'>";			
	echo "<id_basis><![CDATA[". $row['id_basis']."]]></id_basis>";
	echo "<basis_datum><![CDATA[". $row['basis_datum']."]]></basis_datum>";
	echo "</row>";
echo $row['id_basis'];
}





?>