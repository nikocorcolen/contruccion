<?php
class sentenciaInsert 
{
  var $campos;
  var $valores;
  var $tabla= "";

  public function agregarCampoInsert($nuevoCampo, $nuevoValor)
  {
    $this->campos[] = $nuevoCampo;
    $this->valores[]= $nuevoValor;  
  }

  public function getSentenciaInsert()
  {   
    $cam = "`".$this->campos[0]."`";
    $val = "'".$this->valores[0]."'";

    for($f=1;$f<count($this->campos);$f++)
    {
      $cam .= " , `".$this->campos[$f]."`";
      $val .= " , '".$this->valores[$f]."'";
    }

    return "INSERT INTO ".$this->tabla." (".$cam.") VALUES (".$val.")";
  }

  public function __construct($nuevaTabla) 
  {
    $this->tabla = $nuevaTabla;  
    $this->valores =array(); 
    $this->campos =array(); 
  }
}
?>