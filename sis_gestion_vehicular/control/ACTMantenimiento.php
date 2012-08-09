<?php
/**
*@package pXP
*@file gen-ACTMantenimiento.php
*@author  (rcm)
*@date 03-02-2012 20:09:09
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTMantenimiento extends ACTbase{    
			
	function listarMantenimiento(){
		$this->objParam->defecto('ordenacion','id_mantenimiento');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarMantenimiento');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarMantenimiento($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarMantenimiento(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_mantenimiento')){
			$this->res=$this->objFunc->insertarMantenimiento($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarMantenimiento($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarMantenimiento(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarMantenimiento($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>