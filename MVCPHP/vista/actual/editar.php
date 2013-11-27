<?php

function conectarse() {
	$host="127.0.0.1";
	$user="root";
	$password="";
	$db="db";
	$con=mysqli_connect($host,$user,$password,$db);
	return $con;
}

$con=conectarse();
//$sql="UPDATE laboratorio SET nombre = ".$_GET["nombre"].", descripcion = ".$_GET["descripcion"]." WHERE laboratorio.id =".$_GET["ID"]
//$sql = "UPDATE laboratorio SET nombre='$nombre', direccion='$direccion',"."telefono='$telefono', email='$email'";
//$sql="UPDATE laboratorio WHERE laboratorio.ID =".$_GET["ID"]
$result = mysqli_query($con,"UPDATE laboratorio SET nombre = '".$_GET["nombre"].
	"' ,descripcion= '".$_GET["descripcion"]."' WHERE laboratorio.ID =".$_GET["ID"]);

?> 