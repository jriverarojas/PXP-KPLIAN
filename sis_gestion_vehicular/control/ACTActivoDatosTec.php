<?php
/**
*@package pXP
*@file gen-ACTActivoDatosTec.php
*@author  (rcm)
*@date 02-02-2012 22:47:06
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTActivoDatosTec extends ACTbase{    
			
	function listarActivoDatosTec(){
		$this->objParam->defecto('ordenacion','id_activo_datos_tec');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarActivoDatosTec');
		
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarActivoDatosTec($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
		
	}
				
	function insertarActivoDatosTec(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_activo_datos_tec')){
			$this->res=$this->objFunc->insertarActivoDatosTec($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarActivoDatosTec($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarActivoDatosTec(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarActivoDatosTec($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>