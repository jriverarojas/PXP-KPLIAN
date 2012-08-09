<?php
/**
*@package pXP
*@file gen-ACTTipoEvento.php
*@author  (rcm)
*@date 02-02-2012 01:00:14
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTipoEvento extends ACTbase{    
			
	function listarTipoEvento(){
		$this->objParam->defecto('ordenacion','id_tipo_evento');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarTipoEvento');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarTipoEvento($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarTipoEvento(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_tipo_evento')){
			$this->res=$this->objFunc->insertarTipoEvento($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTipoEvento($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTipoEvento(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarTipoEvento($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>