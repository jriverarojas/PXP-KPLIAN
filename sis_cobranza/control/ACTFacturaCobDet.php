<?php
/**
*@package pXP
*@file gen-ACTFacturaCobDet.php
*@author  (gvelasquez)
*@date 23-09-2011 16:47:28
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTFacturaCobDet extends ACTbase{    
			
	function listarFacturaCobDet(){
		$this->objParam->defecto('ordenacion','id_factura_cob_det');

		$this->objParam->defecto('dir_ordenacion','asc');
		
		if($this->objParam->getParametro('id_factura_cob')!='')
		{
			$this->objParam->addFiltro("facode.id_factura_cob = ".$this->objParam->getParametro('id_factura_cob'));	
		}	
		
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarFacturaCobDet');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarFacturaCobDet($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarFacturaCobDet(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_factura_cob_det')){
			$this->res=$this->objFunc->insertarFacturaCobDet($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarFacturaCobDet($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarFacturaCobDet(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarFacturaCobDet($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>