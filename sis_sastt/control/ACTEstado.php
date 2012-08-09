<?php
/**
*@package pXP
*@file gen-ACTEstado.php
*@author  (rortiz)
*@date 22-11-2011 15:48:00
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTEstado extends ACTbase{    
			
	function listarEstado(){
		$this->objParam->defecto('ordenacion','id_estado');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesSastt','listarEstado');
		} else{
			$this->objFunc=new FuncionesSastt();	
			$this->res=$this->objFunc->listarEstado($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarEstado(){
		$this->objFunc=new FuncionesSastt();	
		if($this->objParam->insertar('id_estado')){
			$this->res=$this->objFunc->insertarEstado($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarEstado($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarEstado(){
		$this->objFunc=new FuncionesSastt();	
		$this->res=$this->objFunc->eliminarEstado($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>