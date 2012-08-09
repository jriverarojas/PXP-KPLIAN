<?php
/**
*@package pXP
*@file gen-ACTModalidad.php
*@author  (mzm)
*@date 11-11-2011 15:23:06
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/
class ACTModalidad extends ACTbase{    
			
	function listarModalidad(){
		$this->objParam->defecto('ordenacion','id_modalidad');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesLegal','listarModalidad');
		} else{ 
			$this->objFunc=new FuncionesLegal();	
			
			$this->res=$this->objFunc->listarModalidad($this->objParam);
			
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarModalidad(){
		$this->objFunc=new FuncionesLegal();	
		if($this->objParam->insertar('id_modalidad')){
			$this->res=$this->objFunc->insertarModalidad($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarModalidad($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarModalidad(){
		$this->objFunc=new FuncionesLegal();	
		$this->res=$this->objFunc->eliminarModalidad($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>