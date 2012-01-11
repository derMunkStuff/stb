 
<script type="text/javascript"> 
					$(document).ready(function(){
					jQuery('#basis').jqGrid({
						
						url:'../functions/read-basis2.php',
						datatype: 'xml',
						colNames:['ACT', 'ID','Datum'],
						colModel:[
							{name:'act',index:'act', sortable: false},
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

						gridComplete: function(){
							var ids = jQuery('#basis').jqGrid('getDataIDs');
							
							for(var i=0;i < ids.length;i++){
								var cl = ids[i];
								new2 = "<span class='ui-icon-200g ui-icon-new' title='neu' onclick='newRow("+cl+")'>New</span>&nbsp;&nbsp;";
								del = "<span class='ui-icon-200g ui-icon-trash' title='loschen' onclick='deleteRow("+cl+")'>Del</span>"; 
								edit = "<span class='ui-icon-200g ui-icon-pencil' title='bearbeiten' onclick='editRow("+cl+")'>Edit</span>&nbsp;&nbsp;"; 
								jQuery('#basis').jqGrid('setRowData',ids[i],{act:new2+edit+del});
							}
							
						}
						
				  });
				});					
				
</script>