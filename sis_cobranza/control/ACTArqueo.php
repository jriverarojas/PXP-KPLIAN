<?php
/**
*@package pXP
*@file gen-ACTArqueo.php
*@author  (fprudencio)
*@date 27-09-2011 11:02:53
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTArqueo extends ACTbase{    
			
	function listarArqueo(){
		$this->objParam->defecto('ordenacion','id_arqueo');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarArqueo');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarArqueo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarArqueo(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_arqueo')){
			$this->res=$this->objFunc->insertarArqueo($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarArqueo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarArqueo(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarArqueo($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	function revisarArqueo(){
		
		//crea el objetoFun que contiene todos los metodos del sistema de cobranza
		$this->objFun=new FuncionesCobranza();	
		$this->res=$this->objFun->revisarArqueo($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
			
}

?>