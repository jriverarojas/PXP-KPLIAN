<?php
/**
*@package pXP
*@file gen-ACTLocalizacion.php
*@author  (rac)
*@date 14-06-2012 03:48:41
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTLocalizacion extends ACTbase{    
			
	function listarLocalizacion(){
		$this->objParam->defecto('ordenacion','id_localizacion');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesMantenimiento','listarLocalizacion');
		} else{
			$this->objFunc=new FuncionesMantenimiento();	
			$this->res=$this->objFunc->listarLocalizacion($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarLocalizacion(){
		$this->objFunc=new FuncionesMantenimiento();	
		if($this->objParam->insertar('id_localizacion')){
			$this->res=$this->objFunc->insertarLocalizacion($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarLocalizacion($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarLocalizacion(){
		$this->objFunc=new FuncionesMantenimiento();	
		$this->res=$this->objFunc->eliminarLocalizacion($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>