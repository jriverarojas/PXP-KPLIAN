<?php
/**
*@package pXP
*@file gen-ACTCliente.php
*@author  (fprudencio)
*@date 22-09-2011 11:53:34
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTCliente extends ACTbase{    
			
	function listarCliente(){
		$this->objParam->defecto('ordenacion','id_cliente');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('id_sistema_dist')!='')
		{
			$this->objParam->addFiltro("clie.id_sistema_dist = ".$this->objParam->getParametro('id_sistema_dist'));	
		}
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesCobranza','listarCliente');
		} else{
			$this->objFunc=new FuncionesCobranza();	
			$this->res=$this->objFunc->listarCliente($this->objParam);
			
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarCliente(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_cliente')){
			$this->res=$this->objFunc->insertarCliente($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarCliente($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarCliente(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarCliente($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>