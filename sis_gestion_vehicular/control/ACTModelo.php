<?php
/**
*@package pXP
*@file gen-ACTModelo.php
*@author  (herman)
*@date 02-02-2012 01:44:30
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTModelo extends ACTbase{    
			
	function listarModelo(){
		$this->objParam->defecto('ordenacion','id_modelo');

		$this->objParam->defecto('dir_ordenacion','asc');
		
		//hp datos del padre
		if($this->objParam->getParametro('id_marca')!=''){
			$this->objParam->addFiltro("mdl.id_marca = ".$this->objParam->getParametro('id_marca'));	
		}
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarModelo');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarModelo($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		}
	}
				
	function insertarModelo(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_modelo')){
			$this->res=$this->objFunc->insertarModelo($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarModelo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarModelo(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarModelo($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>