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
    $result = mysqli_query($con,"INSERT INTO  laboratorio (id ,nombre ,descripcion) VALUES ( NULL ,'".$_GET["nombre"]."','".$_GET["descripcion"]."')");

?>