<?php
/**
*@package pXP
*@file gen-ACTUnidadMedida.php
*@author  (mflores)
*@date 02-04-2012 17:34:59
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTUnidadMedida extends ACTbase{    
			
	function listarUnidadMedida(){
		$this->objParam->defecto('ordenacion','simbolo');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesHidrologia','listarUnidadMedida');
		} else{
			$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarUnidadMedida($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarUnidadMedida(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('simbolo')){
			$this->res=$this->objFunc->insertarUnidadMedida($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarUnidadMedida($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarUnidadMedida(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarUnidadMedida($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>