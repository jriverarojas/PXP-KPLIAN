<?php
/**
*@package pXP
*@file gen-ACTCobro.php
*@author  (gvelasquez)
*@date 27-09-2011 14:59:03
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTCobro extends ACTbase{    
			
	function listarCobro(){
		$this->objParam->defecto('ordenacion','id_cobro');

		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_cliente')!='')
		{
			$this->objParam->addFiltro("cobro.id_cliente = ".$this->objParam->getParametro('id_cliente'));	
		}	
		
		if($this->objParam->getParametro('id_cajero')!='')
		{
			$this->objParam->addFiltro("cobro.id_cajero = ".$this->objParam->getParametro('id_cajero'));	
		}
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarCobro');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarCobro($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarCobro(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_cobro')){
			$this->res=$this->objFunc->insertarCobro($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarCobro($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarCobro(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarCobro($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>