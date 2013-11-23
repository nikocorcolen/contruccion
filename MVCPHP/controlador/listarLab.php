<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);


  require_once("modelo/laboratorio.php");
  require_once("db/db.php");

  function listar()
  {
      listarLabs();
  }




?>
