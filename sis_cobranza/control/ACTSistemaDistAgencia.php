<?php
/**
*@package pXP
*@file gen-ACTSistemaDistAgencia.php
*@author  (fprudencio)
*@date 20-09-2011 16:24:24
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTSistemaDistAgencia extends ACTbase{    
			
	function listarSistemaDistAgencia(){
		$this->objParam->defecto('ordenacion','id_sistema_dist_agencia');

		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_sistema_dist')!='')
		{
			$this->objParam->addFiltro("enti.id_sistema_dist = ".$this->objParam->getParametro('id_sistema_dist'));	
		}
		
		if($this->objParam->getParametro('id_agencia')!='')
		{
			$this->objParam->addFiltro("enti.id_agencia = ".$this->objParam->getParametro('id_agencia'));	
		}
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarSistemaDistAgencia');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarSistemaDistAgencia($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarSistemaDistAgencia(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_sistema_dist_agencia')){
			$this->res=$this->objFunc->insertarSistemaDistAgencia($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarSistemaDistAgencia($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarSistemaDistAgencia(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarSistemaDistAgencia($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>