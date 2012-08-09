<?php
/**
*@package pXP
*@file gen-ACTEvento.php
*@author  (rcm)
*@date 02-02-2012 01:22:03
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTEvento extends ACTbase{    
			
	function listarEvento(){
		$this->objParam->defecto('ordenacion','id_evento');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_tipo_evento')!=''){
			$this->objParam->addFiltro("event.id_tipo_evento = ".$this->objParam->getParametro('id_tipo_evento'));	
		}
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarEvento');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarEvento($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarEvento(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_evento')){
			$this->res=$this->objFunc->insertarEvento($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarEvento($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarEvento(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarEvento($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>