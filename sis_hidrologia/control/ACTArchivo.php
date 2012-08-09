<?php
/**
*@package pXP
*@file gen-ACTArchivo.php
*@author  (mflores)
*@date 23-11-2011 10:48:34
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTArchivo extends ACTbase{    
			
	function listarArchivo(){
		$this->objParam->defecto('ordenacion','id_archivo');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesHidrologia','listarArchivo');
		} else{
			$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarArchivo($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarArchivo(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_archivo')){
			$this->res=$this->objFunc->insertarArchivo($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarArchivo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarArchivo(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarArchivo($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>