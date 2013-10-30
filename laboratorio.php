<?php

class laboratorio
{
   private $administradores = array();
   private $instructores = array();
   private $aprendices = array();
   private $nombre;
   private $descripcion;
   
   function laboratorio($nombre, $descripcion, $administradores, $instructores, $aprendices)
   {
      $this -> administradores = $administradores;
      $this -> instructores = $instructores;
      $this -> aprendices = $aprendices;
      $this -> nombre = $nombre;
      $this -> descripcion = $descripcion;
   }

   public function obtener_descripcion()
   {
      return $this -> descripcion;
   }

   public function cambiar_descripcion($descripcion)
   {
      $this -> descripcion = $descripcion;
   }

   public function cambiar_nombre($nombre)
   {
      $this -> nombre = $nombre;
   }

   public function obtener_nombre()
   {
      return $this -> nombre;
   }

   public function obtener_administradores()
   {
      return $this -> administradores;
   }

   public function obtener_instructores()
   {
      return $this -> instructores;
   }

   public function obtener_aprendices()
   {
      return $this -> aprendices;
   }

   public function eliminar_administrador($administrador)
   {
      unset($administradores[$administrador]);
   }

   public function eliminar_instructor($instructor)
   {
      unset($instructores[$instructor]);
   }
}

?>