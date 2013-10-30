<?php
class sentenciaUpdate
{

  var $camposUpdate = "";
  var $tablaUpdate= "";
  var $whereUpdate= "";


  public function agregarCampoUpdate($nuevoCampo, $nuevoValor)
  {    
      if(empty($this->camposUpdate))
      {

          $this->camposUpdate = "".$nuevoCampo."='".$nuevoValor."'"; 

      }
      else
      {
          $this->camposUpdate =   $this->camposUpdate." , ".$nuevoCampo."='".$nuevoValor."'"; 
      }   
          
  }

  public function agregarNullUpdate($nuevoCampo)
  {       
      if(empty($this->camposUpdate))
      {

          $this->camposUpdate = "".$nuevoCampo."= null"; 

      }
      else
      {
          $this->camposUpdate =   $this->camposUpdate." , ".$nuevoCampo."= null"; 
      } 
  }

  public function getSentenciaUpdate()
  {   
      if(!empty($this->whereUpdate))
      {
          $this->whereUpdate=" WHERE ".$this->whereUpdate;
      }
      return "UPDATE ".$this->tablaUpdate." SET ".$this->camposUpdate." ".$this->whereUpdate;
  }

  public function __construct($nuevaTabla , $wh)
  {
     $this->tablaUpdate = $nuevaTabla;
     $this->camposUpdate = "" ;
     $this->whereUpdate = $wh ;
  }

}
?>