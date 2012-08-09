<?php
/**
*@package pXP
*@file gen-ACTImportarFacturResum.php
*@author  (jmita)
*@date 19-10-2011 10:41:58
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTImportarFacturResum extends ACTbase{    
			
	function listarImportarFacturResum(){
		$this->objParam->defecto('ordenacion','id_sistema_dist_usuario');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('id_sistema_dist')!='')
		{
			$this->objParam->addFiltro("ushab.id_sistema_dist = ".$this->objParam->getParametro('id_sistema_dist'));	
		}
		if($this->objParam->getParametro('id_usuario')!='')
		{
			$this->objParam->addFiltro("ushab.id_usuario = ".$this->objParam->getParametro('id_usuario'));	
		}
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarSistemaDistUsuario');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarImportarFacturResum($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
							
}

?>