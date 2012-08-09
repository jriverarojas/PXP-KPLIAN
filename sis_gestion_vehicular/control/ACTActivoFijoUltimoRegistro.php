<?php
/**
*@package pXP
*@file gen-ACTActivoFijoUltimoRegistro.php
*@author  (herman)
*@date 02-02-2012 02:57:40
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTActivoFijoUltimoRegistro extends ACTbase{    
			
	function listarActivoFijoUltimoRegistro(){
		$this->objParam->defecto('ordenacion','id_ultimo_registro');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarActivoFijoUltimoRegistro');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarActivoFijoUltimoRegistro($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
		
	}
	
	function listarActivoFijoRastreoDetUltimo(){
		$this->objParam->defecto('ordenacion','id_ultimo_registro');

		$this->objParam->defecto('dir_ordenacion','asc');
		
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarActivoFijoRastreoDetUltimo($this->objParam);
			$this->res->imprimirRespuesta($this->res->generarJson());
		
	}
				
	function insertarActivoFijoUltimoRegistro(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_ultimo_registro')){
			$this->res=$this->objFunc->insertarActivoFijoUltimoRegistro($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarActivoFijoUltimoRegistro($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarActivoFijoUltimoRegistro(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarActivoFijoUltimoRegistro($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>