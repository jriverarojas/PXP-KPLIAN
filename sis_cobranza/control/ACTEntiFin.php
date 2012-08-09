<?php
/**
*@package pXP
*@file gen-ACTEntiFin.php
*@author  (gvelasquez)
*@date 20-09-2011 16:58:53
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTEntiFin extends ACTbase{    
			
	function listarEntiFin(){
		$this->objParam->defecto('ordenacion','id_enti_fin');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarEntiFin');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarEntiFin($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarEntiFin(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_enti_fin')){
			$this->res=$this->objFunc->insertarEntiFin($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarEntiFin($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarEntiFin(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarEntiFin($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>