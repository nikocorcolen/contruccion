<html>

<head>

<script type="text/javascript">

	function checkForm(form)
	{
		if(   isEmpty(form.nombre_lab.value)  || isEmpty(form.descripcion_lab.value) ) 
    	{
      		alert("Error: debes llenar los campos");
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
			<input type="text"  id='descripcion_lab' name='descripcion_lab' value="" /> <br>
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