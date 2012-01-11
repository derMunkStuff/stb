<?php
include_once('config.php');

//include_once('functions/read-basis2.php');
?>
<!doctype html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Sporttagebuch-2012</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="js/jquery-ui-1.8.16.custom/css/pepper-grinder/jquery-ui-1.8.16.custom.css" />
    <link rel="stylesheet" href="js/jqGrid-4.3.1/css/ui.jqgrid.css" />
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jqGrid-4.3.1/js/i18n/grid.locale-de.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min.js"></script> 
    <script type="text/javascript" src="js/jqGrid-4.3.1/js/jquery.jqGrid.min.js"></script> 
    <script type="text/javascript" src="js/xmldom/jquery.xmldom-1.0.min.js"></script> 
<script type="text/javascript"> 
					$(document).ready(function(){
					jQuery('#basis').jqGrid({
						
						url:'read-basis2.php',
						datatype: 'xml',
						colNames:['ID','Datum'],
						colModel:[
							{name:'id_basis',index:'id_basis'},
							{name:'basis_datum',index:'basis_datum'}],
						rowNum:10,
						autowidth: true,
						shrinkToFit: false,
						cellLayout: 10,
						height: 'auto',
						pager: '#pager1',
						viewrecords: true,
						sortorder: 'asc',
						xmlReader: { 
							repeatitems:false
						},

						
				  });
				});					
				
</script>
</head>
<body>

<br /><h1>Die erste Überschrift</h1>
<br /><table id="basis" border="1"></table>
							<div id="pager1"></div>
							<div id="dialog"></div>
                            <?php echo $stbTEXT['ltbname']?>

</body>
</html>