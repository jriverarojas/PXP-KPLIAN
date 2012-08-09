<?php
/**
*@package pXP
*@file gen-ACTDocumentoAnexo.php
*@author  (fprudencio)
*@date 17-11-2011 10:24:34
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTDocumentoAnexo extends ACTbase{    
			
	function listarDocumentoAnexo(){
		$this->objParam->defecto('ordenacion','id_documento_anexo');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesLegal','listarDocumentoAnexo');
		} else{
			$this->objFunc=new FuncionesLegal();	
			$this->res=$this->objFunc->listarDocumentoAnexo($this->objParam);
			
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarDocumentoAnexo(){
		$this->objFunc=new FuncionesLegal();	
		if($this->objParam->insertar('id_documento_anexo')){
			$this->res=$this->objFunc->insertarDocumentoAnexo($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarDocumentoAnexo($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarDocumentoAnexo(){
		$this->objFunc=new FuncionesLegal();	
		$this->res=$this->objFunc->eliminarDocumentoAnexo($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>