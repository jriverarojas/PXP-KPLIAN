<?php
/**
*@package pXP
*@file gen-ACTFacturacionPeriodo.php
*@author  (jmita)
*@date 10-11-2011 10:41:58
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/



class ACTFacturacionPeriodo extends ACTbase{    
			
	function listarFacturacionPeriodo(){ 
		 
		$this->objParam->defecto('ordenacion','fc.periodo, fc.gestion');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_sistema_dist')!='')
		{
			$this->objParam->addFiltro("id_sistema_dist = ".$this->objParam->getParametro('id_sistema_dist'));	
		}
		
				
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarFacturacionPeriodo');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarFacturacionPeriodo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
		
	}
							
}

?>