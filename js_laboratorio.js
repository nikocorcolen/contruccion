$(document).on("click", "#lab_guardar",function(event) 
{

		var form_data = $( '#form_lab' ).serializeArray();

		$.post(merma + "guardarLaboratorio.php", form_data,
		function(data)
		{
			console.log(data);
			listar_laboratorios();
		});
	
});
function listar_laboratorios()
{
	//cargar pagina de que lista los laboratorios
}