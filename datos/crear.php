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

	if(isset($_POST["id"]) === ""){
		$result = mysqli_query($con,"INSERT INTO  laboratorio (id ,nombre ,descripcion) VALUES ( NULL ,'".$_POST["nombre"]."','".$_POST["descripcion"]."')");
	}
	else{
		$nombre = $_POST["nombre"];
		$descripcion = $_POST["descripcion"];
		$id = $_POST["id"];
		$sql = "UPDATE  laboratorio SET nombre='".$nombre."', descripcion='".$descripcion."' WHERE id = ".$id;
	    $result = mysqli_query($con,$sql);
	}
    

?>