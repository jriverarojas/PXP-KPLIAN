<?php
/**
*@package pXP
*@file gen-ACTBitacora.php
*@author  (rac)
*@date 02-02-2012 21:38:38
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTBitacora extends ACTbase{    
			
	function listarBitacora(){
		$this->objParam->defecto('ordenacion','id_bitacora');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesGestionVehicular','listarBitacora');
		} else{
			$this->objFunc=new FuncionesGestionVehicular();	
			$this->res=$this->objFunc->listarBitacora($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarBitacora(){
		$this->objFunc=new FuncionesGestionVehicular();	
		if($this->objParam->insertar('id_bitacora')){
			$this->res=$this->objFunc->insertarBitacora($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarBitacora($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarBitacora(){
		$this->objFunc=new FuncionesGestionVehicular();	
		$this->res=$this->objFunc->eliminarBitacora($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>