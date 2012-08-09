<?php
/**
*@package pXP
*@file gen-ACTCaja.php
*@author  (fprudencio)
*@date 26-09-2011 18:19:13
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTCaja extends ACTbase{     
			
	function listarCaja(){
		$this->objParam->defecto('ordenacion','id_caja');
		
		if($this->objParam->getParametro('id_agencia')!='')
		{
			$this->objParam->addFiltro("agencia.id_agencia = ".$this->objParam->getParametro('id_agencia'));	
		}

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarCaja');
		} else{
			$this->objFunc=new FuncionesCobranza();	 
			$this->res=$this->objFunc->listarCaja($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarCaja(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_caja')){
			$this->res=$this->objFunc->insertarCaja($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarCaja($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarCaja(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarCaja($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	function abrirCaja(){
		
		//crea el objetoFun que contiene todos los metodos del sistema de cobranza
		$this->objFun=new FuncionesCobranza();	
		$this->res=$this->objFun->abrirCaja($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
			
}

?>