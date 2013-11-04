<?php 
	if (isset($_GET['run'])) $linkchoice=$_GET['run']; 
	else $linkchoice=''; 

	switch($linkchoice){ 

    case 'eliminar' : 
        eliminar(intval($_GET['id'])); 
        break; 
    case 'crear' : 
        crear();
        break; 

    case 'edit' :
        edit();
        break;    

    default : 
        echo 'no run'; 
        break;  
	} 

	function crear(){ 
		require_once("../db/db.php");
		if ( !(empty($_POST[nombre_lab]) && empty($_POST[descripcion_lab] ) ) )   
		{
			guardarNuevo($_POST[nombre_lab],$_POST[descripcion_lab]);

		}
    } 

    function edit(){ 
    	require_once("../db/db.php");
		if ( !(empty($_POST[nombre_lab]) && empty($_POST[descripcion_lab] ) ) )   
		{
		
	    	$nombre= $_POST['nombre_lab'];
	    	$descripcion= $_POST['descripcion_lab'];
	  
			$id = $_POST['id'];
			editar($id,$nombre,$descripcion);
		}
    } 


	function eliminar($id){ 
		require_once("../db/db.php");
		borrar($id);
    
	} 
?> 

