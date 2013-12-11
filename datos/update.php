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
	$nombre = $_GET["nombre"];
	$descripcion = $_GET["descripcion"];
	$id = $_GET["ID"];
	$sql = "UPDATE  laboratorio SET nombre='".$nombre."', descripcion='".$descripcion."' WHERE id = ".$id;
    $result = mysqli_query($con,$sql);
    echo($_GET["ID"]);
?>