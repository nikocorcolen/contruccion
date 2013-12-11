<?php


if (isset($_POST['action'])){

	switch($_POST['action']){ 

    case 'crear':
    echo "entro";
        crear();
        listar(); 
        break;

    case 'editar':
        mostrar_vista();
        listar(); 
        break;

    default: 
        listar(); 
        break;
	}
}
else{

	//diccionario vario, para que en los inputs no aparesca nada
	$diccionario = array('nombre' => '',
						'descripcion' => '');
	
	$contenido_externo = file_get_contents('../vista/index.html');
	print ($contenido_externo);
	
}

function get_data($url)
{
 $ch = curl_init();
 $timeout = 5;
 curl_setopt($ch,CURLOPT_URL,$url);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
 curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
 $data = curl_exec($ch);
 curl_close($ch);
 return $data;
}


function crear(){ 

	require_once('../datos/datos.php');


	if ( (isset($_POST['action'])) && !(empty($_POST['nombre']) && empty($_POST['descripcion']))) {
		

		$guardado = guardar_laboratorio($_POST['nombre'], $_POST['descripcion']);
		if($guardado){
			?>
			<script type="text/javascript">creadoConExito();</script>
			
			<?php
			//$template = file_get_contents('../vista/creado_exito.html');
			//print $template;
			echo 'Se guardo correctamente';
		}
		else{
			
			echo 'Se guardo incorrectamente';
		}
	}
	else
	{
		unset($_POST['action']);
		//diccionario vario, para que en los inputs no aparesca nada
		$diccionario = array('nombre' => '',
							'descripcion' => '');
		$template = set_values('../vista/crear.html', $diccionario);
		print $template; 
	}
}


function listar(){

	//require_once('../datos/datos.php');
	//require_once('../vista/listar.html');
	//require_once('../vista/listar.html');
	
	//$template = file_get_contents('../vista/listar.html');
	?>
	<script type="text/javascript">lisLab();</script>>
	<?php


	//print $template;
	



	//foreach ($laboratorios as &$valor){
    //	echo $valor -> obtener_id().'  ';
    	
    //	}
}



function mostrar_vista(){

	//require_once('../controlador/diccionario.php');

	//Aquí hay que obtener los daots de la base de datos
	$diccionario = array('nombre' => 'nombre de la base de datos',
						'descripcion' => 'descripcion de la base de datos');

	$template = set_values('../vista/crear.html', $diccionario);


	print $template;
}

//Reemplaza las palabras de la vista de la forma {palabra}
function set_values($vista, $diccionario){
	
	$template = file_get_contents($vista);

	foreach ($diccionario as $clave=>$valor) {
		$template = str_replace('{'.$clave.'}', $valor, $template);
	}

	return $template;
}



?>