<?php
/**
*@package pXP
*@file gen-ACTArchivoSensor.php
*@author  (mflores)
*@date 23-11-2011 10:48:29
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTArchivoSensor extends ACTbase{    
			
	function listarArchivoSensor(){
		$this->objParam->defecto('ordenacion','id_archivo_sensor');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_tipo_archivo')!='')
		{
			$this->objParam->addFiltro("tipar.id_tipo_archivo = ".$this->objParam->getParametro('id_tipo_archivo'));	
		}
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid')
		{
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesHidrologia','listarArchivoSensor');
		} 
		else
		{
			$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarArchivoSensor($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarArchivoSensor(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_archivo_sensor')){
			$this->res=$this->objFunc->insertarArchivoSensor($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarArchivoSensor($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarArchivoSensor(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarArchivoSensor($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>