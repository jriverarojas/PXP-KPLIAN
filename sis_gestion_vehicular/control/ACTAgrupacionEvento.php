<?php
/**
*@package pXP
*@file gen-ACTAgrupacionEvento.php
*@author  (herman)
*@date 02-02-2012 19:07:27
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTAgrupacionEvento extends ACTbase{    
			
	function listarAgrupacionEvento(){
		$this->objParam->defecto('ordenacion','id_agrupacion_evento');

		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_agrupacion')!=''){
			$this->objParam->addFiltro("aev.id_agrupacion = ".$this->objParam->getParametro('id_agrupacion'));	
		}
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarAgrupacionEvento');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarAgrupacionEvento($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarAgrupacionEvento(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_agrupacion_evento')){
			$this->res=$this->objFunc->insertarAgrupacionEvento($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarAgrupacionEvento($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarAgrupacionEvento(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarAgrupacionEvento($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>