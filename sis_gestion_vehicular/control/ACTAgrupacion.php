<?php
/**
*@package pXP
*@file gen-ACTAgrupacion.php
*@author  (herman)
*@date 02-02-2012 16:12:10
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTAgrupacion extends ACTbase{    
			
	function listarAgrupacion(){
		$this->objParam->defecto('ordenacion','id_agrupacion');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarAgrupacion');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarAgrupacion($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarAgrupacion(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_agrupacion')){
			$this->res=$this->objFunc->insertarAgrupacion($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarAgrupacion($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarAgrupacion(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarAgrupacion($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>