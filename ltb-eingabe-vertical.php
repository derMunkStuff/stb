<?php	

	
	$modScript .= 	"<link rel=\"stylesheet\" type=\"text/css\" href=\"extensions/" . $datXT['install_directory'] . "/css/jquery-ui-1.8.13.ltb.css\" />
					<link rel=\"stylesheet\" type=\"text/css\" href=\"extensions/" . $datXT['install_directory'] . "/css/ltbstyles.css\" media=\"screen, print\" />
				
					<script type=\"text/javascript\" src= \"extensions/ltb/jquery/jquery-1.4.2.min.js\"></script>
					<script type=\"text/javascript\" src= \"extensions/ltb/jquery/jquery-ui-1.8.13.custom.min.js\"></script>
					<script type=\"text/javascript\">
							  $(document).ready(function() {
								  jQuery.noConflict();
								$(\"#datepicker\").datepicker({
									 dateFormat: 'dd.mm.yy',
									 dayNames: [\"Sonntag\",\"Montag\",\"Dienstag\",\"Mittwoch\",\"Donnerstag\",\"Freitag\",\"Samstag\"],
									 dayNamesMin: ['So','Mo','Di','Mi','Do','Fr','Sa'], monthNames: ['Januar','Februar','März','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember']							
								});
							  });
					  </script>
				  ";


$listSpa = "";
$queryBel = sprintf("SELECT * FROM " . $curCMS['dbPrefix'] . "xt_ltb_sportarten
					WHERE del='%1\$d'
					ORDER BY name_spa
			        	 	", 
						 	0
							 );
							 
$resSpa = mysql_query($queryBel, $curDB['db1']);
if($res){
	while($datSpa = mysql_fetch_array($resSpa)){
		$listSpa .= "<option value=\"" . $datSpa['id_spa'] . "\" " . $sel . ">" . $datSpa['name_spa']."</option>";
	}
}
$listShoes = "";
$queryShoes = sprintf("SELECT * FROM " . $curCMS['dbPrefix'] . "xt_ltb_shoes_users
					WHERE del='%1\$d'
					ORDER BY shoe_brand_user
			        	 	", 
						 	0
							 );
							 
$resShoes = mysql_query($queryShoes, $curDB['db1']);
if($res){
	while($datShoes = mysql_fetch_array($resShoes)){
		$listShoes .= "<option value=\"" . $datShoes['id_shoe_user'] . "\" " . $sel . ">" . $datShoes['shoe_brand_user']."</option>";
	}
}
$listBel = "";
$queryBel = sprintf("SELECT * FROM " . $curCMS['dbPrefix'] . "xt_ltb_belastungsarten
					WHERE del='%1\$d'
					ORDER BY name_belastung
			        	 	", 
						 	0
							 );
							 
$resBel = mysql_query($queryBel, $curDB['db1']);
if($res){
	while($datBel = mysql_fetch_array($resBel)){
		$listBel .= "<option value=\"" . $datBel['id_belastung'] . "\" " . $sel . ">" . $datBel['name_belastung']."</option>";
	}
}

$listWitt = "";
$query = sprintf("SELECT * FROM " . $curCMS['dbPrefix'] . "xt_ltb_witterungen 
					WHERE del='%1\$d'
					ORDER BY name_witt
			        	 	", 
						 	0
							 );
							 
$res = mysql_query($query, $curDB['db1']);
if($res){
	while($dat = mysql_fetch_array($res)){
		$listWitt .= "<option value=\"" . $dat['id_witt'] . "\" " . $sel . ">" . $dat['name_witt']."</option>";
	}
}
	
$queryStre = sprintf("SELECT * FROM " . $curCMS['dbPrefix'] . "xt_ltb_strecken
					WHERE del='%1\$d'
					ORDER BY name_stre
			        	 	", 
						 	0
							 );
							 //echo $queryStre;
							 
$resStre = mysql_query($queryStre, $curDB['db1']);
if($res){
	while($datStre = mysql_fetch_array($resStre)){
		$listStre .= "<option value=\"" . $datStre['id_stre'] . "\" " . $sel . ">" . $datStre['name_stre']."</option>";
	}
}

$queryShoes = sprintf("SELECT " . $curCMS['dbPrefix'] . "xt_ltb_shoes_users.*                              
                     FROM " . $curCMS['dbPrefix'] . "xt_ltb_shoes_users
                     WHERE  " . $curCMS['dbPrefix'] . "xt_ltb_shoes_users.del='0' AND " . $curCMS['dbPrefix'] . "xt_ltb_shoes_users.id_ltb_m= ".$_SESSION['ltbUID']."
                                              ",
											  $ID                              
											  );	
							//echo $queryShoes;											  			  
$resShoes = mysql_query($queryShoes, $curDB['db1']);
//$datShoes = mysql_fetch_array($resShoes);

if($resShoes){
	while($datShoes = mysql_fetch_array($resShoes)){
		$listShoes .= "<option value=\"" . $datShoes['id_shoe'] . "\" " . $sel . ">" . $datShoes['shoe_model']."</option>";
	}
}




$modXT_outputWeb = "<div id=\"curatoLTB\">";


	$checkSchlaf = "";
	if($ltbschlaf == "1") $checkSchlaf = "checked=\"checked\"";
	$checkSchlaf = "";
	if($ltbschlaf == "2") $checkSchlaf = "checked=\"checked\"";
		$checkSchlaf = "";
	if($ltbschlaf == "3") $checkSchlaf = "checked=\"checked\"";
	
	$checkMotiv = "";
	if($ltbmotivation == "1") $checkMotiv = "checked=\"checked\"";
	$checkMotiv = "";
	if($ltbmotivation == "2") $checkMotiv = "checked=\"checked\"";
		$checkMotiv = "";
	if($ltbmotivation == "3") $checkMotiv = "checked=\"checked\"";
	
	$checkZufried = "";
	if($ltbzufrieden == "1") $checkZufried = "checked=\"checked\"";
	$checkZufried = "";
	if($ltbzufrieden == "2") $checkZufried = "checked=\"checked\"";
		$checkZufried = "";
	if($ltbzufrieden == "3") $checkZufried = "checked=\"checked\"";
	

$modXT_outputWeb .= "<div class=\"boxFormContainer\">
					<form action=\"".$_SERVER['PHP_SELF']."?p=".$curWEB['page']."&func=main \" method=\"post\" >
					<fieldset>
						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"ltbtabform\">
							<tr>
								<th class=\"ueberschrift\"><label for=\"ltbdatum\" id=\"\">".$curTEXT['ltbdatum']."</label></th>
                            	<td class=\"datenfelder\"><input type=\"text\" name=\"ltbdatum\" id=\"datepicker\" value=\"\" class=\"textfeldLang\"/></td>                             
                            </tr>
                            <tr>
                                <th class=\"ueberschrift\" ><label for=\"ltbuhrzeit\">".$curTEXT['ltbuhrzeit']."</label></th>
                                <td class=\"datenfelder\"><input type=\"text\" name=\"ltbuhrzeit\" id=\"ltbuhrzeit\" class=\"textfeldLang\"/></td>
                            </tr>                                    
                             <tr>
								 <th class=\"ueberschrift\"><label for=\"ltbhour\">".$curTEXT['ltblaufzeit']."</label></th>
								 <td class=\"datenfelder\"><input type=\"text\" name=\"ltbhour\" id=\"ltbhour\" class=\"textfeldKurz\"/>:</td>
								 <td class=\"datenfelder\"><input type=\"text\" name=\"ltbmin\" id=\"ltbmin\" class=\"textfeldKurz\"/>:</td>
								 <td class=\"datenfelder\"><input type=\"text\" name=\"ltbsec\" id=\"ltbsec\" class=\"textfeldKurz\"/></td>
                             </tr>
                             <tr>                             
								 <th class=\"ueberschrift\"><label for=\"ltbtmp\">".$curTEXT['ltbtemp']."</label></th>
								 <td class=\"datenfelder\"><input type=\"text\" name=\"ltbtmp\" id=\"ltbtmp\" class=\"textfeldLang\"/></td>
                             </tr>
                             <tr>
                                <th class=\"ueberschrift\"><label for=\"ltbstre\">".$curTEXT['ltbNameStre']."</label></th>
                                <td class=\"datenfelder\"><select name=\"ltbstre\" id=\"ltbstre\" class=\"textfeldLangXl\">
                                             <option value=\"0\">" . $curTEXT['pleaseselect'] . "</option>
                                             " . $listStre . "
                                          </select></td>
                            </tr>
                             <tr>
                                <th class=\"ueberschrift\"><label for=\"ltbshoe\">".$curTEXT['ltbNameShoe2']."</label></th>
                                <td class=\"datenfelder\"><select name=\"ltbshoe\" id=\"ltbshoe\" class=\"textfeldLangXl\">
                                             <option value=\"0\">" . $curTEXT['pleaseselect'] . "</option>
                                             " . $listShoes . "
                                          </select></td>
                            </tr>
                             <tr>
								 <th class=\"ueberschrift\"><label for=\"ltbkm\">".$curTEXT['ltbkm']."</label></th>
								 <td class=\"datenfelder\"><input type=\"text\" name=\"ltbkm\" id=\"ltbkm\" class=\"textfeldLang\"/></td>
                             </tr>
                             <tr>
                                <th class=\"ueberschrift\"><label for=\"ltbspa\">".$curTEXT['ltbsportart']."</label></th>
                                <td class=\"datenfelder\"><select name=\"ltbspa\" id=\"ltbspa\" class=\"textfeldLangXl\">
                                             <option value=\"0\">" . $curTEXT['pleaseselect'] . "</option>
                                             " . $listSpa . "
                                          </select></td>
                            </tr>
                            <tr>
                                    <th class=\"ueberschrift\"><label for=\"ltbav\">".$curTEXT['ltbav']."</label></th>
                                    <td class=\"datenfelder\"><input type=\"text\" name=\"ltbav\" id=\"ltbav\" class=\"textfeldLang\" /></td>
                            </tr>
                            <tr>
                                    <th class=\"ueberschrift\"><label for=\"ltbmx\">".$curTEXT['ltbmx']."</label></th>
                                    <td class=\"datenfelder\"><input type=\"text\" name=\"ltbmx\" id=\"ltbmx\" class=\"textfeldLang\"/></td>
                            </tr>
                            <tr>
                                    <th class=\"ueberschrift\"><label for=\"ltbgewicht\">".$curTEXT['ltbgewicht']."</label></th>
                                    <td class=\"datenfelder\"><input type=\"text\" name=\"ltbgewicht\" id=\"ltbgewicht\" class=\"textfeldLang\"/></td>
                            </tr>
                            <tr>
                                    <th class=\"ueberschrift\"><label for=\"ltbfett\">".$curTEXT['ltbfett']."</label></th>
                                    <td class=\"datenfelder\"><input type=\"text\" name=\"ltbfett\" id=\"ltbfett\" class=\"textfeldLang\"/></td>
                            </tr>
                            <tr>
                                    <th class=\"ueberschrift\"><label for=\"ltbbemerk\">".$curTEXT['ltbbemerk']."</label></th>
                                    <td class=\"datenfelder\"><label for=\"ltbbemerk\"><textarea name=\"ltbbemerk\" id=\"ltbbemerk\" class=\"textxl\"></textarea></label></td>
                            </tr>			
					</table>
				</fieldset>
					<div style=\"margin-left: 30px\"><input name=\"ltbSenden\" type=\"submit\" value=\"".$curTEXT['curLtbSenden']."\" class=\"schaltflaeche\" />
					<input name=\"ltbCancel\" type=\"submit\" value=\"".$curTEXT['curLtbCancel']."\" class=\"schaltflaeche\" /></div>
				</form></div>";

$ltblaufzeit = ($_POST['ltbhour']*3600)+($_POST['ltbmin']*60)+($_POST['ltbsec']);
function hms ($sec) {
   		return sprintf('%02d:%02d:%02d', floor($sec/3600),floor($sec%3600/60), $sec % 60);
}

	if (isset($_POST['ltbSenden']) && $_POST['ltbdatum']!=""){
			$varSQL = array();
			foreach($_POST as $key=>$val){
				$varSQL[$key] = magicquotes($val);
			}
		//$varSQL['ltblaufzeit']   =  (($varSQL['ltbhour'] *60*60) + ($varSQL['ltbmin'] *60) + ($varSQL['ltbsec']));
		//$varSQL['ltbkm'] = str_replace(",",".",$ltbkm);
	
		$queryNewLtb = sprintf("INSERT INTO " . $curCMS['dbPrefix'] . "xt_ltb_basis
				(basis_datum, basis_uhrzeit, basis_km, id_spa, basis_laufzeit, id_schuh, id_belastung, basis_av, basis_mx, basis_witterung, basis_temp, id_stre, basis_gewicht, basis_fett, basis_schlaf, basis_motivation, basis_zufriedenheit, basis_bemerkungen, create_at, create_from, change_at, change_from, id_ltb_m)
				VALUES
				('%1\$d', '%2\$d', '%3\$f', '%4\$d', '%5\$d', '%6\$d', '%7\$d', '%8\$d', '%9\$d', '%10\$d', '%11\$f', '%12\$d', '%13\$f', '%14\$f', '%15\$d', '%16\$d', '%17\$d', '%18\$s', '%19\$d',  '%20\$d', '%19\$d', '%20\$d','%21\$d')
				", 
				 mysql_real_escape_string(strtotime($varSQL['ltbdatum']), $curDB['db1']),
				 mysql_real_escape_string(strtotime($varSQL['ltbuhrzeit']), $curDB['db1']),
				 mysql_real_escape_string(str_replace(",",".",$varSQL['ltbkm']), $curDB['db1']),
				 mysql_real_escape_string($varSQL['ltbspa'], $curDB['db1']),
				 mysql_real_escape_string($ltblaufzeit, $curDB['db1']),
				 mysql_real_escape_string($varSQL['ltbshoe'], $curDB['db1']),
				 mysql_real_escape_string($varSQL['ltbbelastung'], $curDB['db1']),
				 mysql_real_escape_string($varSQL['ltbav'], $curDB['db1']),
				 mysql_real_escape_string($varSQL['ltbmx'], $curDB['db1']),
				 mysql_real_escape_string($varSQL['ltbwitterung'], $curDB['db1']),
				 mysql_real_escape_string(str_replace(",",".",$varSQL['ltbtmp']), $curDB['db1']),
				 mysql_real_escape_string($varSQL['ltbstre'], $curDB['db1']),
				 mysql_real_escape_string(str_replace(",",".",$varSQL['ltbgewicht']), $curDB['db1']),
				 mysql_real_escape_string(str_replace(",",".",$varSQL['ltbfett']), $curDB['db1']),
				 mysql_real_escape_string($varSQL['ltbschlaf'], $curDB['db1']),
				 mysql_real_escape_string($varSQL['ltbmotivation'], $curDB['db1']),
				 mysql_real_escape_string($varSQL['ltbzufrieden'], $curDB['db1']),
				 mysql_real_escape_string(nl2br($varSQL['ltbbemerk']), $curDB['db1']),
				 mysql_real_escape_string(time()),
				 mysql_real_escape_string($_SESSION['ltbUID'], $curDB['db1']),
				 mysql_real_escape_string($_SESSION['ltbUID'], $curDB['db1'])
				 );
//echo $queryNewLtb;	
		$resNewLtb = mysql_query($queryNewLtb, $curDB['db1']);
	
					header("Location:http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?p=7" );
					exit();

	} 


$modXT_outputWeb .=	"</div>";	


?>