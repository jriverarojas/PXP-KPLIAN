<?php
/**
*@package pXP
*@file gen-ACTArqueoDet.php
*@author  (fprudencio)
*@date 29-09-2011 17:20:27
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTArqueoDet extends ACTbase{    
			
	function listarArqueoDet(){
		$this->objParam->defecto('ordenacion','id_arqueo_det');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('id_arqueo')!='')
		{
			$this->objParam->addFiltro("arqdet.id_arqueo = ".$this->objParam->getParametro('id_arqueo'));	
		}
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarArqueoDet');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarArqueoDet($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarArqueoDet(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_arqueo_det')){
			$this->res=$this->objFunc->insertarArqueoDet($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarArqueoDet($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarArqueoDet(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarArqueoDet($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>