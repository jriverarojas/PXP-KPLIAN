<?php
/**
*@package pXP
*@file gen-ACTCajero.php
*@author  (fprudencio)
*@date 28-09-2011 14:13:20
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTCajero extends ACTbase{    
			
	function listarCajero(){
		$this->objParam->defecto('ordenacion','id_cajero');

		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_caja')!='')
		{
			$this->objParam->addFiltro("cajero.id_caja = ".$this->objParam->getParametro('id_caja'));	
		}
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarCajero');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarCajero($this->objParam);
		}
		
		//Devuelve la respuesta
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarCajero(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_cajero')){
			$this->res=$this->objFunc->insertarCajero($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarCajero($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarCajero(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarCajero($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	function habilitarCajero(){
		
		//crea el objetoFun que contiene todos los metodos del sistema de cobranza
		$this->objFun=new FuncionesCobranza();	
		$this->res=$this->objFun->habilitarCajero($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
	
	/*
	 * Descripción: Listado de los cajeros por sistema de distribución
	 * Autor: RCM
	 * Fecha: 12/12/2011
	 */
	function listarCajeroSistDist(){
		$this->objParam->defecto('ordenacion','person.nombre_completo2');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		//Aumenta el filtro
		if($this->objParam->getParametro('id_sistema_dist')!=''){
			$this->objParam->addFiltro("sisage.id_sistema_dist = ".$this->objParam->getParametro('id_sistema_dist'));	
		}
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarCajeroSistDist');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarCajeroSistDist($this->objParam);
		}

		//Devuelve la respuesta
		$this->res->imprimirRespuesta($this->res->generarJson());
		
	}
			
}

?>