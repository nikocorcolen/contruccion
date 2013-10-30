<?php

  include("Insert.php");
  include("Update.php");
  include("Delete.php");
  include("InsertMultiple.php");

  date_default_timezone_set('Chile/Continental');

  


   $conn = Conectarse() ;

   header("Content-Type: text/html;charset=utf-8");
   if(isset($kbase)==false)$kbase=NULL;
   if(isset($ddBB)==false)$ddBB=NULL;
   function Conectarse() {



      $kbase='nombre de la base de datos';
      $ddBB = 'nombre de la base de datos';      
      if($kbase=='') { 
         $ddBB = 'nombre de la base de datos';
      }
      if (!($link=mysql_connect('127.0.0.1', 'root', ''))) { exit(); }
      mysql_query("SET NAMES 'utf8'");

      if (!mysql_select_db($ddBB,$link)) { exit(); }
      return $link;
   }

   function ConectaBDs($ddBBx) {
      $ddBB = $ddBBx;
      if (!($link=mysql_connect('127.0.0.1', 'root', ''))) { exit(); }

      if (!mysql_select_db($ddBB,$link)) { exit(); }
      return $link;
   }


   function reConexion()
   {
      global  $conn;

      if (!mysql_ping($conn)) 
      {
          $conn = Conectarse() ;
      }
   }
function horasDesdeMySql($date)
{
   $d = explode(":", $date);
   $formatteddate = $d[0].":".$d[1];
   return $formatteddate;
}

function fechaMySql($date)
{
   $d = explode("/", $date);
   $formatteddate = $d[2]."-".$d[1]."-".$d[0];
   return $formatteddate;
}
function fechaDesdeMySql($date)
{
   $d = explode("-", $date);
   $formatteddate = $d[2]."/".$d[1]."/".$d[0];
   return $formatteddate;
}

function limpiar($contenido)
{
  $contenido = strip_tags($contenido);
  $contenido = mysql_real_escape_string($contenido);
  return $contenido;
}

function postlist($val)
{
  $r = array(); 
  if (isset($val)) 
  { 
    $r = explode(',', $val );  
  } 
  return $r;
}

function posttext($val)
{
  $r =""; 
  if (isset($val)) 
  { 
    $r =  $val ;  
  } 
  return $r;
}

function guardarRelacion($actual, $nuevo ,$val_campo_1,$nom_campo_1,$nom_campo_n,$tabla)
{

  $res = filtrar($actual, $nuevo);
  $insertar = $res[0];
  $borrar = $res[1];


  $insMul = new sentenciaInsertMultiple($tabla);
  $insMul->agregarCampo($nom_campo_1);
  $insMul->agregarCampo($nom_campo_n);

  foreach($insertar as $inser) 
  {
      $insMul->inicioValores();

      $insMul->nuevoValor($val_campo_1);
      $insMul->nuevoValor($inser);

      $insMul->finValores();      
  }

  $sente = $insMul->getSentencia();

  if(!empty($sente))
  {
      mysql_query($sente); 
  }  

  foreach($borrar as $bor) 
  {
      $del = new sentenciaDelete($tabla, $nom_campo_1."='".$val_campo_1."'");      
      $del->agregarCondicionDelete($nom_campo_n, $bor);
    
      mysql_query($del->getSentenciaDelete()); 
  }     
}

function idText($text){
  $txt = str_replace(" ", "_", $text);
  return $txt;
}

function filtrar($actual, $nuevo)
{
    $filtro;
    $eliminar = array_diff($actual, $nuevo);
    $nuevos = array_diff($nuevo, $actual);
    $filtro[0] = $nuevos;
    $filtro[1] = $eliminar;
    return $filtro;
}
function agregarCondicionAnd($actual, $nuevo)
{
  if(empty($actual))
  {
      $actual = " WHERE ".$nuevo;
  }
  else
  {
      $actual.= " AND ".$nuevo;
  }

  return $actual;
}
?>

