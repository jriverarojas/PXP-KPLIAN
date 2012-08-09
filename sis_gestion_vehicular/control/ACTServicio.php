<?php
/**
*@package pXP
*@file gen-ACTServicio.php
*@author  (rcm)
*@date 02-02-2012 02:56:44
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTServicio extends ACTbase{    
			
	function listarServicio(){
		$this->objParam->defecto('ordenacion','id_servicio');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarServicio');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarServicio($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarServicio(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_servicio')){
			$this->res=$this->objFunc->insertarServicio($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarServicio($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarServicio(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarServicio($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>