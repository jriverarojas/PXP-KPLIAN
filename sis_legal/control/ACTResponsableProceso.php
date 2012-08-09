<?php
/**
*@package pXP
*@file gen-ACTResponsableProceso.php
*@author  (mzm)
*@date 16-11-2011 16:54:59
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTResponsableProceso extends ACTbase{    
			
	function listarResponsableProceso(){
		$this->objParam->defecto('ordenacion','id_responsable_proceso');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesLegal','listarResponsableProceso');
		} else{
			$this->objFunc=new FuncionesLegal();	
			$this->res=$this->objFunc->listarResponsableProceso($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarResponsableProceso(){
		$this->objFunc=new FuncionesLegal();	
		if($this->objParam->insertar('id_responsable_proceso')){
			$this->res=$this->objFunc->insertarResponsableProceso($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarResponsableProceso($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarResponsableProceso(){
		$this->objFunc=new FuncionesLegal();	
		$this->res=$this->objFunc->eliminarResponsableProceso($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>