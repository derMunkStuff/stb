<?php
/*==================================================================================*/	
// Die Laufzeit in H:M:S ordentlich formatiert ausgeben.
function hms ($sec) {
		return sprintf('%02d:%02d:%02d', floor($sec/3600),floor($sec%3600/60), $sec % 60);
}  
	

/*==================================================================================*/	
// Die Pace berechnen ( Minute pro Kilometer).
function pace($sec, $km){
		$pace = $sec/$km;
		$rest = $pace % 60;
		return (floor($pace/60) .":".sprintf("%02d",$rest));
}



/*==================================================================================*/	
function magicquotes($var){
	if(get_magic_quotes_gpc()){
		$mgVAR = "";
	if(!is_array($var)) $mgVAR = stripslashes($var);
	return $mgVAR;
	}else{
		$mgVAR = $var;
		return $mgVAR;
	}
}   
?>