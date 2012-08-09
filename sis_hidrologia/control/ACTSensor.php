<?php
/**
*@package pXP
*@file gen-ACTSensor.php
*@author  (mflores)
*@date 06-09-2011 11:45:42
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTSensor extends ACTbase{    
			
	function listarSensor(){
		$this->objParam->defecto('ordenacion','id_sensor');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_estacion')!='')
		{
			$this->objParam->addFiltro("est.id_estacion = ".$this->objParam->getParametro('id_estacion'));	
		}	
					
		if ($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid')
		{
            $this->objReporte=new Reporte($this->objParam);
            $this->res=$this->objReporte->generarReporteListado('FuncionesHidrologia','listarSensor');
        }
        else 
        {
        	$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarSensor($this->objParam);
        }
        
        $this->res->imprimirRespuesta($this->res->generarJson());						
	}
	
	function listarSensorCombo()
	{
		$this->objParam->defecto('ordenacion','id_sensor');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_estacion')!='')
		{
			$this->objParam->addFiltro("est.id_estacion = ".$this->objParam->getParametro('id_estacion'));	
		}	
					
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->listarSensorCombo($this->objParam);
                
        $this->res->imprimirRespuesta($this->res->generarJson());						
	}

	function listarSensorFicticio()
	{
		$this->objParam->defecto('ordenacion','id_sensor');
		$this->objParam->defecto('dir_ordenacion','asc');
							
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->listarSensorFicticio($this->objParam);
                
        $this->res->imprimirRespuesta($this->res->generarJson());						
	}
				
	function insertarSensor(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_sensor')){
			$this->res=$this->objFunc->insertarSensor($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarSensor($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarSensor(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarSensor($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}			
}

?>