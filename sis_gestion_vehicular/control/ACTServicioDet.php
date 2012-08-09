<?php
/**
*@package pXP
*@file gen-ACTServicioDet.php
*@author  (rac)
*@date 02-02-2012 21:56:04
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTServicioDet extends ACTbase{    
			
	function listarServicioDet(){
		$this->objParam->defecto('ordenacion','id_servicio_det');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarServicioDet');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarServicioDet($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarServicioDet(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_servicio_det')){
			$this->res=$this->objFunc->insertarServicioDet($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarServicioDet($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarServicioDet(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarServicioDet($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>