<?php
class sentenciaDelete
{

  var $condiciones_del = "";
  var $tabla_del= "";
  

  public function agregarCondicionDelete($nuevoCampo, $nuevoValor)
  {        

      if(empty($this->condiciones_del))
      {

          $this->condiciones_del = "".$nuevoCampo."='".$nuevoValor."'"; 

      }
      else
      {
          $this->condiciones_del =  $this->condiciones_del." AND ".$nuevoCampo."='".$nuevoValor."'"; 
      }    
          
  }

  public function getSentenciaDelete()
  {   
     return "DELETE FROM ".$this->tabla_del." WHERE ".$this->condiciones_del;
  }

  public function __construct($nuevaTabla, $wh)
  {
     $this->tabla_del = $nuevaTabla;
     $this->condiciones_del = $wh ;  
  }  

}
?>