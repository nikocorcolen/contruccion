function iniciar_js_listar_proveedores()
{


	$('#tab_man_prov').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "../datos/datos2.php",
		"sPaginationType": "full_numbers",
		"bJQueryUI": true,"aoColumnDefs": [
      { "bSortable": false, "aTargets": [ -1 ] }
    ] } );
}