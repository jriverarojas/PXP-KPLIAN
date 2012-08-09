<?php
/**
*@package pXP
*@file gen-ACTActivoFijo.php
*@author  (rcm)
*@date 02-02-2012 21:32:39
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTActivoFijo extends ACTbase{    
			
	function listarActivoFijo(){
		$this->objParam->defecto('ordenacion','id_activo_fijo');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarActivoFijo');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarActivoFijo($this->objParam);
			//var_dump($this->res);exit;
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarActivoFijo(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_activo_fijo')){
			$this->res=$this->objFunc->insertarActivoFijo($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarActivoFijo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarActivoFijo(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarActivoFijo($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>