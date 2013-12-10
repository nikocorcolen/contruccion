<?php
  
  require_once("modeloLab.php");
   

   function conectarse() {
      $host="";
      $user="";
      $password="";
      $db="";
      $con=mysqli_connect($host,$user,$password,$db);
      return $con;
   }


   function guardarNuevo($nombre_lab,$descripcion_lab)
   {
   		$con=conectarse();
   		$sql="INSERT INTO laboratorio (nombre_lab,descripcion_lab)
		  VALUES ('$nombre_lab','$descripcion_lab')";
  		if (mysqli_query($con,$sql))
    	{
        mysqli_close($con);
  		  return true;
  	  }
      else
      {
        mysqli_close($con);
        return false;
      }
	}

   function editar($laboratorio)
   {
      $con=conectarse();
      $nombre=$laboratorio->obtenerNombre();
      $descripcion=$laboratorio->obtenerDescripcion();
      $id=$laboratorio->obtenerId();
      $sql = "UPDATE laboratorio SET nombre_lab='$nombre' , descripcion_lab='$descripcion' WHERE id =$id";
      if( mysqli_query($con,$sql) )
      {
          mysqli_close($con);
          return true;
      } 
      else
      {
          mysqli_close($con);
          return false;
      }
 
   }

   function eliminarLaboratorio($id)
   {
      $con=conectarse();
      $sql="DELETE FROM laboratorio WHERE id = $id";
      if ( mysqli_query($con, $sql) )
      {
          mysqli_close($con);
          return true;
      } 
      else
      {
          mysqli_close($con);
          return false;
      }
  }

   function obtenerLaboratorio($id)
   {
      $con=conectarse();
      $result = mysqli_query($con,"SELECT * FROM laboratorio WHERE id=$id");
      mysqli_close($con);
      return $result;
   }

   function obtenerLaboratorios() //aqui hay que agregar algún seleccionador para hacer más selectiva la consulta
   {
      $con=conectarse();
      $rows = mysqli_query($con,"SELECT * FROM laboratorio");
      mysqli_close($con);
      return $rows;
   }


?>
