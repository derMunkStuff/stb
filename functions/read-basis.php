<?php
include_once("../config.php");










$query = sprintf("SELECT * FROM stb_test_basis_daten 
					WHERE del='0'
					"
					);
$result = mysqli_query($db, $query) or die ("what?");



header("Content-type: text/xml;charset=utf-8");
 
echo "<?xml version='1.0' encoding='utf-8'?>";
echo   "<rows>";
echo  "<page>".$page."</page>";
echo "<total>".$total_pages."</total>";
echo "<records>".$count."</records>";
while($row = mysqli_fetch_array($result)) {

//echo $row['basis_datum']."<br />";

	echo "<row id='". $row['id_basis']."'>";			
	echo "<id_basis><![CDATA[". $row['id_basis']."]]></id_basis>";
	echo "<basis_datum><![CDATA[". date("d.m.Y",$row['basis_datum'])."]]></basis_datum>";
	echo "<basis_uhrzeit><![CDATA[". date("d.m.Y",$row['basis_uhrzeit'])."]]></basis_uhrzeit>";
	echo "<basis_km><![CDATA[". $row['basis_km']."]]></basis_km>";
	echo "<id_spa><![CDATA[". $row['id_spa']."]]></id_spa>";
	echo "<basis_laufzeit><![CDATA[". $row['basis_laufzeit']."]]></basis_laufzeit>";
	echo "<id_schuh><![CDATA[". $row['id_schuh']."]]></id_schuh>";
	echo "<basis_av><![CDATA[". $row['basis_av']."]]></basis_av>";
	echo "<basis_mx><![CDATA[". $row['basis_mx']."]]></basis_mx>";
	echo "<basis_temp><![CDATA[". $row['basis_temp']."]]></basis_temp>";
	echo "<strecke><![CDATA[". $row['strecke']."]]></strecke>";
	echo "<basis_gewicht><![CDATA[". $row['basis_gewicht']."]]></basis_gewicht>";
	echo "<basis_fett><![CDATA[". $row['basis_fett']."]]></basis_fett>";
	echo "<basis_bemerkungen><![CDATA[". $row['basis_bemerkungen']."]]></basis_bemerkungen>";

	echo "</row>";

}
?>