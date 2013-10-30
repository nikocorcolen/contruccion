<?php
class sentenciaInsertMultiple
{
  var $campos;
  var $valores;
  var $tabla= "";

  public function agregarCampo($nuevoCampo)
  {
    $this->campos[] = $nuevoCampo;    
  }

  public function nuevoValor($valor)
  {
      $this->valores= $this->valores." '".$valor."' ,";
  }  


  public function inicioValores()
  {
    $this->valores .=" ( ";
  }
  public function finValores()
  {

    $this->valores= substr($this->valores, 0, strlen($this->valores)-1)." ),";        
  }


  public function getSentencia()
  {   
    $cam = "`".$this->campos[0]."`";    

    for($f=1;$f<count($this->campos);$f++)
    {
      $cam .= " , `".$this->campos[$f]."`";      
    }

    if(!empty($this->valores))
    {
        $this->valores= substr($this->valores, 0, strlen($this->valores)-1);
        return "INSERT INTO ".$this->tabla." (".$cam.") VALUES ".$this->valores."";
    }

    return "";

    
  }

  public function __construct($nuevaTabla) 
  {
    $this->tabla = $nuevaTabla;  
    $this->valores = "";
    $this->campos =array(); 
  }
}
?>