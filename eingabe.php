<!doctype html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Sporttagebuch-2012</title>
    <link rel="stylesheet" href="js/jquery-ui-1.8.16.custom/css/pepper-grinder/jquery-ui-1.8.16.custom.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> 
    <script type="text/javascript" src="js/validation-1.9.0/jquery.validate.min.js"></script>
    <script src="js/validation-1.9.0/localization/messages_de.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min.js"></script>
     <script>
  $(document).ready(function(){
    $("#insertForm").validate({
			rules: {
				ltbuhrzeit: {
					required:true
				}
			}
	});
  });
  </script> 
</head>
<?php	
include_once('config.php');						 
include_once('functions/functions_th.php');
// Sportarten auflisten
$listSpa = "";
$querySpa = sprintf("SELECT * FROM " . $curCMS['dbPrefix'] . "stb_sportarten
					WHERE del=0
					ORDER BY name_spa
			        	 	", 
						 	0
							 );
							 
$resSpa = mysqli_query($db, $querySpa);

while($datSpa = mysqli_fetch_array($resSpa)){
	$listSpa .= "<option value=\"" . $datSpa['id_spa'] . "\" " . $sel . ">" . $datSpa['name_spa']."</option>";
}

$listShoe = "";
$queryShoe = sprintf("SELECT * FROM " . $curCMS['dbPrefix'] . "stb_schuhe
					WHERE del=0
					ORDER BY shoe_model
			        	 	", 
						 	0
							 );
							 
$resShoe = mysqli_query($db, $queryShoe);

while($datSpa = mysqli_fetch_array($resShoe)){
	$listShoe .= "<option value=\"" . $datSpa['id_shoe'] . "\" " . $sel . ">" . $datSpa['shoe_model']."</option>";
}

	

$form = "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"post\" id=\"insertForm\">
					<fieldset>
						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" >
							<tr>
								<th><label for=\"ltbdatum\" id=\"\">Datum</label></th>
                            	<td><input type=\"text\" name=\"ltbdatum\" id=\"datepicker\" value=\"\"  /></td>                             
                            </tr>
                            <tr>
                                <th ><label for=\"ltbuhrzeit\">Uhrzeit</label></th>
                                <td><input type=\"text\" name=\"ltbuhrzeit\" id=\"ltbuhrzeit\" /></td>
                            </tr>                                    
                             <tr>
								 <th><label for=\"ltbhour\">Laufzeit</label></th>
								 <td><input type=\"text\" name=\"ltbhour\" id=\"ltbhour\" />:</td>
								 <td><input type=\"text\" name=\"ltbmin\" id=\"ltbmin\" />:</td>
								 <td><input type=\"text\" name=\"ltbsec\" id=\"ltbsec\" /></td>
                             </tr>
                             <tr>                             
								 <th><label for=\"ltbtmp\">Temp</label></th>
								 <td><input type=\"text\" name=\"ltbtmp\" id=\"ltbtmp\" /></td>
                             </tr>
                            <tr>
                                <th ><label for=\"ltbstre\">Strecke</label></th>
                                <td><input type=\"text\" name=\"ltbstre\" id=\"ltbstre\" /></td>
                            </tr>                                    
                             <tr>
                                <th><label for=\"ltbshoe\">Schuhe</label></th>
                                <td><select name=\"ltbshoe\" id=\"ltbshoe\" >
                                             <option value=\"0\">Bitte auswählen</option>
                                             " . $listShoe . "
                                          </select></td>
                            </tr>
                             <tr>
								 <th><label for=\"ltbkm\">KM</label></th>
								 <td><input type=\"text\" name=\"ltbkm\" id=\"ltbkm\" /></td>
                             </tr>
                             <tr>
                                <th><label for=\"ltbspa\">Sportart</label></th>
                                <td><select name=\"ltbspa\" id=\"ltbspa\" >
                                             <option value=\"0\">Bitte auswählen</option>
                                             " . $listSpa . "
                                          </select></td>
                            </tr>
                            <tr>
                                    <th><label for=\"ltbav\">AV</label></th>
                                    <td><input type=\"text\" name=\"ltbav\" id=\"ltbav\"  /></td>
                            </tr>
                            <tr>
                                    <th><label for=\"ltbmx\">MX</label></th>
                                    <td><input type=\"text\" name=\"ltbmx\" id=\"ltbmx\" /></td>
                            </tr>
                            <tr>
                                    <th><label for=\"ltbgewicht\">Gewicht</label></th>
                                    <td><input type=\"text\" name=\"ltbgewicht\" id=\"ltbgewicht\" /></td>
                            </tr>
                            <tr>
                                    <th><label for=\"ltbfett\">Fett</label></th>
                                    <td><input type=\"text\" name=\"ltbfett\" id=\"ltbfett\" /></td>
                            </tr>
                            <tr>
                                    <th><label for=\"ltbbemerk\">Bemerkungen</label></th>
                                    <td><label for=\"ltbbemerk\"><textarea name=\"ltbbemerk\" id=\"ltbbemerk\" class=\"textxl\"></textarea></label></td>
                            </tr>			
					</table>
				</fieldset>
					<div style=\"margin-left: 30px\"><input name=\"ltbSenden\" type=\"submit\" value=\"Speichern\" class=\"schaltflaeche\" />
					<input name=\"ltbCancel\" type=\"submit\" value=\"Abbrechen\" class=\"schaltflaeche\" /></div>
				</form></div>";



if(!isset($_POST['ltbSenden'])&& $_POST['ltbdatum'] !="");
	
echo $form;
$ltblaufzeit = ($_POST['ltbhour']*3600)+($_POST['ltbmin']*60)+($_POST['ltbsec']);


if($_POST['ltbSenden']){
				$varSQL = array();
			foreach($_POST as $key=>$val){
				$varSQL[$key] = magicquotes($val);
			}
	
$query = sprintf("INSERT INTO " . $curCMS['dbPrefix'] . "stb_test_basis_daten
		(basis_datum, basis_uhrzeit, basis_km, id_spa, basis_laufzeit, id_schuh, id_belastung, basis_av, basis_mx, basis_witterung, basis_temp, strecke, basis_gewicht, basis_fett, basis_schlaf, basis_motivation, basis_zufriedenheit, basis_bemerkungen, create_at, create_from, change_at, change_from)
		VALUES
				('%1\$d', '%2\$d', '%3\$f', '%4\$d', '%5\$d', '%6\$d', '%7\$d', '%8\$d', '%9\$d', '%10\$d', '%11\$f', '%12\$s', '%13\$f', '%14\$f', '%15\$d', '%16\$d', '%17\$d', '%18\$s', '%19\$d',  '%20\$d', '%19\$d', '%20\$d')
				", 
				 mysql_real_escape_string(strtotime($varSQL['ltbdatum'])),
				 mysql_real_escape_string(strtotime($varSQL['ltbuhrzeit'])),
				 mysql_real_escape_string(str_replace(",",".",$varSQL['ltbkm'])),
				 mysql_real_escape_string($varSQL['ltbspa']),
				 mysql_real_escape_string($ltblaufzeit),
				 mysql_real_escape_string($varSQL['ltbshoe']),
				 mysql_real_escape_string($varSQL['ltbbelastung']),
				 mysql_real_escape_string($varSQL['ltbav']),
				 mysql_real_escape_string($varSQL['ltbmx']),
				 mysql_real_escape_string($varSQL['ltbwitterung']),
				 mysql_real_escape_string(str_replace(",",".",$varSQL['ltbtmp'])),
				 mysql_real_escape_string($varSQL['ltbstre']),
				 mysql_real_escape_string(str_replace(",",".",$varSQL['ltbgewicht'])),
				 mysql_real_escape_string(str_replace(",",".",$varSQL['ltbfett'])),
				 mysql_real_escape_string($varSQL['ltbschlaf']),
				 mysql_real_escape_string($varSQL['ltbmotivation']),
				 mysql_real_escape_string($varSQL['ltbzufrieden']),
				 mysql_real_escape_string(nl2br($varSQL['ltbbemerk'])),
				 mysql_real_escape_string(time()),
				 mysql_real_escape_string($_SESSION['stbUID'])
				 );

//echo $query;
$result = mysqli_query($db, $query);

echo "Daten gespeichert";	

} 

?>