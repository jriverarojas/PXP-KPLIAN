<?php
/**
*@package pXP
*@file gen-ACTTipoColumna.php
*@author  (mflores)
*@date 15-03-2012 10:27:40
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTipoColumna extends ACTbase{    
			
	function listarTipoColumna(){
		$this->objParam->defecto('ordenacion','id_tipo_columna');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesHidrologia','listarTipoColumna');
		} else{
			$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarTipoColumna($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarTipoColumna(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_tipo_columna')){
			$this->res=$this->objFunc->insertarTipoColumna($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTipoColumna($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTipoColumna(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarTipoColumna($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>