<?php 
include("../libreria_db/db.php");


$nombre_lab= posttext( $_REQUEST['nombre_lab'] ) ; 
$descripcion_lab= posttext( $_REQUEST['descripcion_lab'] ) ; 



    $ins = new sentenciaInsert("laboratorio");

	$ins->agregarCampoInsert("nombre", $nombre_lab);
    $ins->agregarCampoInsert("descripcion", $descripcion_lab);
   
    $a = $ins->getSentenciaInsert();    
    echo $a;
    mysql_query($a); 
    $lab_id= mysql_insert_id(); 



if($lab_id>0)
{
    echo json_encode($lab_id);    
}
else
{
    echo json_encode("");    
}
?>