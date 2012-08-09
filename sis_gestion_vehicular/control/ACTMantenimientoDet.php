<?php
/**
*@package pXP
*@file gen-ACTMantenimientoDet.php
*@author  (rcm)
*@date 03-02-2012 20:37:16
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTMantenimientoDet extends ACTbase{    
			
	function listarMantenimientoDet(){
		$this->objParam->defecto('ordenacion','id_mantenimiento_det');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_mantenimiento')!=''){
			$this->objParam->addFiltro("detman.id_mantenimiento = ".$this->objParam->getParametro('id_mantenimiento'));	
		}
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarMantenimientoDet');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarMantenimientoDet($this->objParam);
			
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarMantenimientoDet(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_mantenimiento_det')){
			$this->res=$this->objFunc->insertarMantenimientoDet($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarMantenimientoDet($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarMantenimientoDet(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarMantenimientoDet($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>