<?php
// unescape characters if magicquotes is ON

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