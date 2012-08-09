<?php
/**
*@package pXP
*@file gen-ACTCorteMoneda.php
*@author  (fprudencio)
*@date 29-09-2011 10:47:42
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTCorteMoneda extends ACTbase{    
			
	function listarCorteMoneda(){
		$this->objParam->defecto('ordenacion','id_corte');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesTesoreria','listarCorteMoneda');
		} else{
			$this->objFunc=new FuncionesTesoreria();	
			$this->res=$this->objFunc->listarCorteMoneda($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarCorteMoneda(){
		$this->objFunc=new FuncionesTesoreria();	
		if($this->objParam->insertar('id_corte')){
			$this->res=$this->objFunc->insertarCorteMoneda($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarCorteMoneda($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarCorteMoneda(){
		$this->objFunc=new FuncionesTesoreria();	
		$this->res=$this->objFunc->eliminarCorteMoneda($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>