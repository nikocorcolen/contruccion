<?php
  

   function conectarse() {
      $host="localhost";
      $user="gustavop_d";
      $password="admin1";
      $db="gustavop_e";
      $con=mysqli_connect($host,$user,$password,$db);
      return $con;
   }


   function guardarNuevo($nombre_lab,$descripcion_lab)
   {
   		$con=conectarse();
   		$sql="INSERT INTO laboratorio (nombre_lab,descripcion_lab)
		  VALUES ('$nombre_lab','$descripcion_lab')";


		if (!mysqli_query($con,$sql))
  		{
  		die('Error: ' . mysqli_error($con));
  		}
		echo "laboratorio creado con exito";

		mysqli_close($con);
		
   }

   function listarLabs()
   {
      $con=conectarse();
      $result = mysqli_query($con,"SELECT * FROM laboratorio");
      while($row = mysqli_fetch_array($result))
      {
        $nombre=$row['nombre_lab'];
        $descripcion=$row['descripcion_lab'];
        $id=$row['id'];
        echo " nombre     :    ". $nombre . "  descripcion lab    :   "  . $descripcion;    
        echo '<td><a href="../vista/edit.php?id=' . $id. '">Edit</a></td>';
        echo '<td><a href="../controladores/controlLab.php?run=eliminar&id=' . $id . '">Delete</a>';
        echo "<br>";
      }
      mysqli_close($con);
   }

   function borrar($id)
   {
      $con=conectarse();
      mysqli_query($con, "DELETE FROM laboratorio WHERE id = $id");

      mysqli_close($con);
   }

   function getObject($id)
   {
      $con=conectarse();
      echo $id;

      if ($result = mysqli_query($con,"SELECT * FROM laboratorio WHERE id=$id")) {

      /* fetch associative array */
      while ($row = mysqli_fetch_assoc($result)) {
          $nombre=$row['nombre_lab'];
          $descripcion=$row['descripcion_lab'];
          $array = array(0 => $row['nombre_lab'], 1 => $row['descripcion_lab']);
         
      }

      /* free result set */
      mysqli_free_result($result);
      }
      else{
        echo "don't work";
      }
      /* close connection */

      mysqli_close($con);
      return $array;
   }

   function editar($id,$nombre,$descripcion)
   {
      $con=conectarse();
      $sql = "UPDATE laboratorio SET nombre_lab='$nombre' , descripcion_lab='$descripcion' WHERE id =$id";
    
      if($con)
          { 
            mysqli_query($con,$sql);
          }
          else
          {
             echo "connection error";
          }
    
  
    $result=mysqli_query($con,$sql)or 
    die ("this stuffedup");
    mysqli_close($con);
   }


?>