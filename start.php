<?php
include_once('config.php');
?>
<!doctype html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Sporttagebuch-2012</title>
    <link rel="stylesheet" href="css/styles.css" />
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/spielerei.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		$('#message').fadeIn('slow',
						function(){
							alert('Animation ist fertig');
							});
		
		});
    
    </script> 
</head>
<body>
<br /><h1>Die erste Überschrift</h1>
<p id="paragraph">Der erste Text</p>
<p id="message" style="display:none;">Eingeblendeter Text</p>


</body>
</html>