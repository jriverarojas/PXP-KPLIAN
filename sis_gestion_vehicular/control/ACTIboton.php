<?php
/**
*@package pXP
*@file gen-ACTIboton.php
*@author  (rcm)
*@date 04-02-2012 19:23:49
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTIboton extends ACTbase{    
			
	function listarIboton(){
		$this->objParam->defecto('ordenacion','id_iboton');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarIboton');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarIboton($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarIboton(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_iboton')){
			$this->res=$this->objFunc->insertarIboton($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarIboton($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarIboton(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarIboton($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>