<?php
/**
*@package pXP
*@file gen-ACTTipoMuestra.php
*@author  (mflores)
*@date 23-11-2011 10:48:24
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTTipoMuestra extends ACTbase{    
			
	function listarTipoMuestra(){
		$this->objParam->defecto('ordenacion','id_tipo_muestra');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesHidrologia','listarTipoMuestra');
		} else{
			$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarTipoMuestra($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarTipoMuestra(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_tipo_muestra')){
			$this->res=$this->objFunc->insertarTipoMuestra($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarTipoMuestra($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarTipoMuestra(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarTipoMuestra($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>