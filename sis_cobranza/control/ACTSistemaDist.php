<?php
/**
*@package pXP
*@file gen-ACTSistemaDist.php
*@author  (fprudencio)
*@date 20-09-2011 10:22:05
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/
class ACTSistemaDist extends ACTbase{    
			
	function listarSistemaDist(){
		$this->objParam->defecto('ordenacion','codigo');
		$this->objParam->defecto('dir_ordenacion','asc');	
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarSistemaDist');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarSistemaDist($this->objParam);
		}
		//Respuesta	
		$this->res->imprimirRespuesta($this->res->generarJson());
		
	}
				
	function insertarSistemaDist(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_sistema_dist')){
			$this->res=$this->objFunc->insertarSistemaDist($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarSistemaDist($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarSistemaDist(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarSistemaDist($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	function importarClientes(){
		//echo "entra a la funcion"; 
		//crea el objetoFun que contiene todos los metodos del sistema de cobranza
		$this->objFun=new FuncionesCobranza();	
		$this->res=$this->objFun->importarClientes($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());

	} 
	function importarFacturacion(){
		
		//crea el objetoFun que contiene todos los metodos del sistema de cobranza
		$this->objFun=new FuncionesCobranza();	
		$this->res=$this->objFun->importarFacturacion($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());

	}		
}

?>