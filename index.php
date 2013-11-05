<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
<script src="scripts/ckeditor.js"></script>
<script type="text/javascript">

	function checkForm(form)
	{
		if(   isEmpty(form.nombre_lab.value)  ) 
    	{
      		alert("Error: debes llenar los campos");
      		return false;
    	}
    	var des = document.getElementById("descripcion");


    	if(  isEmpty(des.value ) )
    	{

    		alert("Error: debe llenar la text area");
    		return false;
    	}
    
		return true;
	}

	function isEmpty(str) {
    	return (!str || 0 === str.length);
	}


</script>
</head>

<body>
	

	
<div class="title"></span><?php echo "CREAR LABORATORIO"; ?></div>

<form class="form1" name="form1" id="form_lab" method="post" action="controladores/controlLab.php?run=crear" >
   	
			<label>Nombre <em>*</em> </label> 
			<input type="text"  id='nombre_Lab' name='nombre_lab' value="" /> <br>
		
			<label>descripcion <em>*</em> </label>
			
			<textarea class="ckeditor" cols="80" id="descripcion_lab" rows="10"  name='descripcion_lab' tabindex="1"  value="asd"></textarea><br>
			<textarea rows="5" id="descripcion"></textarea><br>
		    <input type='button' value="crear" onclick="if (checkForm(form1)) document.forms['form1'].submit();" />
</form>

	<?php

	ini_set('display_errors',1); 
	error_reporting(E_ALL);
	require_once("controladores/listarLab.php");
	listar();

	?>


</body>

</html> 