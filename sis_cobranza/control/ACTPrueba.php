<?php
/**
*@package pXP
*@file gen-ACTPrueba.php
*@author  (admin)
*@date 17-08-2011 17:57:05
*@description Clase que recibe los parámetros enviados por la vista para mandar a la capa de Modelo
*/

class ACTPrueba extends ACTbase{    
			
	function listarPrueba(){
		$this->objParam->defecto('ordenacion','id_prueba');

		$this->objParam->defecto('dir_ordenacion','asc');
					
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->listarPrueba($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarPrueba(){
		$this->objFunc=new FuncionesCobranza();	
		if($this->objParam->insertar('id_prueba')){
			$this->res=$this->objFunc->insertarPrueba($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarPrueba($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarPrueba(){
		$this->objFunc=new FuncionesCobranza();	
		$this->res=$this->objFunc->eliminarPrueba($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>