<?php
/**
*@package pXP
*@file gen-ACTTipoRequerimiento.php
*@author  (rortiz)
*@date 17-11-2011 16:29:57
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTipoRequerimiento extends ACTbase{    
			
	function listarTipoRequerimiento(){
		$this->objParam->defecto('ordenacion','id_tipo_requerimiento');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesSastt','listarTipoRequerimiento');
		} else{
			$this->objFunc=new FuncionesSastt();	
			$this->res=$this->objFunc->listarTipoRequerimiento($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarTipoRequerimiento(){
		$this->objFunc=new FuncionesSastt();	
		if($this->objParam->insertar('id_tipo_requerimiento')){
			$this->res=$this->objFunc->insertarTipoRequerimiento($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTipoRequerimiento($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTipoRequerimiento(){
		$this->objFunc=new FuncionesSastt();	
		$this->res=$this->objFunc->eliminarTipoRequerimiento($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
}

?>