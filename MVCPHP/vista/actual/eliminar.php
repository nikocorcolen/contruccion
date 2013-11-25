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
    $result = mysqli_query($con,"DELETE FROM laboratorio WHERE id=".$_GET["ID"]);
    echo ($_GET["ID"]);
?>