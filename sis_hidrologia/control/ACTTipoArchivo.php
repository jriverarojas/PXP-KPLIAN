<?php
/**
*@package pXP
*@file gen-ACTTipoArchivo.php
*@author  (mflores)
*@date 23-11-2011 10:48:12
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTipoArchivo extends ACTbase{    
			
	function listarTipoArchivo(){
		$this->objParam->defecto('ordenacion','id_tipo_archivo');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesHidrologia','listarTipoArchivo');
		} else{
			$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarTipoArchivo($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarTipoArchivo(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_tipo_archivo')){
			$this->res=$this->objFunc->insertarTipoArchivo($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTipoArchivo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTipoArchivo(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarTipoArchivo($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>