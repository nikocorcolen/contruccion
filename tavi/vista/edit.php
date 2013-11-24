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

	<?php
		$id = intval($_GET['id']);
		echo $id;
		require_once("../db/db.php");
		$array=getObject($id);
	

	?>

	<form name="form2" action="../controladores/controlLab.php?run=edit" method="post">
	nombre: <input type="text" name="nombre_lab" value="<?php echo $array[0]; ?> "> <br>
	descripcion: <input type="text" name="descripcion_lab" value="<?php echo $array[1]; ?>" > <br>
	<input type="hidden" name="id" value="<?php echo $id; ?>" > <br>
	<input type='button' value="Editar" onclick="if (checkForm(form2)) document.forms['form2'].submit();" />
	</form>



</body>
</html>