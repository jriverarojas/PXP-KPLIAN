<?php
/**
*@package pXP
*@file gen-ACTActivoFijoRastreo.php
*@author  (herman)
*@date 02-02-2012 15:47:13
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTActivoFijoRastreo extends ACTbase{    
			
	function listarActivoFijoRastreo(){
		$this->objParam->defecto('ordenacion','id_activo_fijo_rastreo');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarActivoFijoRastreo');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarActivoFijoRastreo($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
	
	function listarActivoFijoRastreoDet(){
		//$this->objParam->defecto('ordenacion','id_activo_fijo_rastreo');
        //$this->objParam->defecto('dir_ordenacion','asc');
		
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->listarActivoFijoRastreoDet($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
		
	}
				
	function insertarActivoFijoRastreo(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_activo_fijo_rastreo')){
			$this->res=$this->objFunc->insertarActivoFijoRastreo($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarActivoFijoRastreo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarActivoFijoRastreo(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarActivoFijoRastreo($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>