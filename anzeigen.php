<?php //include('functions/read-basis2.php'); ?>
<!doctype html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Sporttagebuch-2012</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="js/jquery-ui-1.8.16.custom/css/pepper-grinder/jquery-ui-1.8.16.custom.css" />
    <link rel="stylesheet" href="js/jqGrid-4.3.1/css/ui.jqgrid.css" />
  
    
	<script type="text/javascript" src="js/jqGrid-4.3.1/js/jquery-1.5.2.min.js"></script>
	
	<script type="text/javascript" src="js/jqGrid-4.3.1/js/i18n/grid.locale-de.js"></script>
	<script type="text/javascript" src="js/jqGrid-4.3.1/js/jquery.jqGrid.min.js"></script> 
	<script type="text/javascript" src="js/jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min.js"></script>
	
	<script type="text/javascript"> 
					$(document).ready(function(){
					$('#basis').jqGrid({
						url:'functions/read-basis.php',
						datatype: 'xml',
						colNames:['ID','Datum','Uhrzeit','KM','Sportart','Laufzeit','Schuhe','AV','MX','TEMP','Strecke','Gewicht','Fett','Bemerkungen'],
						colModel:[
							{name:'id_basis',index:'id_basis'},
							{name:'basis_datum',index:'basis_datum'},
							{name:'basis_uhrzeit',index:'basis_uhrzeit'},
							{name:'basis_km',index:'basis_km'},
							{name:'id_spa',index:'id_spa'},
							{name:'basis_laufzeit',index:'basis_laufzeit'},
							{name:'id_schuh',index:'id_schuh'},
							{name:'basis_av',index:'basis_av'},
							{name:'basis_mx',index:'basis_mx'},
							{name:'basis_temp',index:'basis_temp'},
							{name:'strecke',index:'strecke'},
							{name:'basis_gewicht',index:'basis_gewicht'},
							{name:'basis_fett',index:'basis_fett'},
							{name:'basis_bemerkungen',index:'basis_bemerkungen'}
							],
						rowNum:20,
						autowidth: true,
						shrinkToFit: true,
						cellLayout: 10,
						height: 'auto',
						pager: '#pager1',
						viewrecords: true,
						sortorder: 'asc',
						xmlReader: { 
							repeatitems:false
						}

					
				  });
				});					
				
</script>
</head>
<body>

<br /><h1>Anzeige der STB-Daten</h1>
<br /><table id="basis"></table>
							<div id="pager1"></div>
							
                            <?php echo $stbTEXT['ltbname']?>

</body>
</html>