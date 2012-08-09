<?php
/**
*@package pXP
*@file gen-ACTAgencia.php
*@author  (fprudencio)
*@date 20-09-2011 19:15:41
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTAgencia extends ACTbase{    
			
	function listarAgencia(){
		$this->objParam->defecto('ordenacion','id_agencia');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_enti_fin')!=''){
			$this->objParam->addFiltro("agen.id_enti_fin = ".$this->objParam->getParametro('id_enti_fin'));	
		}	
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarAgencia');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarAgencia($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarAgencia(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_agencia')){
			$this->res=$this->objFunc->insertarAgencia($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarAgencia($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarAgencia(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarAgencia($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>