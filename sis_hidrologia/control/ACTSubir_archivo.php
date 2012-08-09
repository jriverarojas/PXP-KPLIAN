<?php
/**
*@package pXP
*@file gen-ACTMedicion.php
*@author  (mflores)
*@date 07-09-2011 15:50:29
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTSubir_archivo extends ACTbase
{    	
	function subir_archivo()
	{						
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->subir_archivo($this->objParam);			
		$this->res->imprimirRespuesta($this->res->generarJson());
	}		
}

?>