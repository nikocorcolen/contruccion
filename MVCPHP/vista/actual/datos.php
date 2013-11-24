<?php

function conectarse() {
	$host="127.0.0.1";
	$user="root";
	$password="";
	$db="db";
	$con=mysqli_connect($host,$user,$password,$db);
	return $con;
}


	require_once('laboratorio.php');

	$con=conectarse();
    $labs = array();

    $con=conectarse();
    $result = mysqli_query($con,"SELECT * FROM laboratorio");
    while($row = mysqli_fetch_array($result))
    {

    	

    	//$labs = array("ID" => $row['id'],"nombre"=> $row['nombre'], "descripcion"=>$row['descripcion']);
        //$nombre=$row['nombre'];
        //$descripcion=$row['descripcion'];
        //$id=$row['id'];
        //$l = new laboratorio($id,$nombre,$descripcion);
        $datos = array("ID" => $row['id'],"nombre"=> $row['nombre'], "descripcion"=>$row['descripcion']);
        array_push($labs, $datos);
    }
    

    echo json_encode($labs);



?>