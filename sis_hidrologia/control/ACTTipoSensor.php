<?php
/**
*@package pXP
*@file gen-ACTTipoSensor.php
*@author  (mflores)
*@date 15-03-2012 10:27:35
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTipoSensor extends ACTbase{    
			
	function listarTipoSensor()
	{
		$this->objParam->defecto('ordenacion','id_tipo_sensor');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesHidrologia','listarTipoSensor');
		} else{
			$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarTipoSensor($this->objParam);
		}				
		
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarTipoSensor()
	{
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_tipo_sensor')){
			$this->res=$this->objFunc->insertarTipoSensor($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTipoSensor($this->objParam);
		}
				
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTipoSensor()
	{
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarTipoSensor($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	function genTable()
	{
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->genTable($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}			
}

?>