<?php
/**
*@package pXP
*@file gen-ACTTipoDato.php
*@author  (mflores)
*@date 02-04-2012 17:34:04
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTipoDato extends ACTbase{    
			
	function listarTipoDato(){
		$this->objParam->defecto('ordenacion','id_tipo_dato');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesHidrologia','listarTipoDato');
		} else{
			$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarTipoDato($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarTipoDato(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_tipo_dato')){
			$this->res=$this->objFunc->insertarTipoDato($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTipoDato($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTipoDato(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarTipoDato($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>