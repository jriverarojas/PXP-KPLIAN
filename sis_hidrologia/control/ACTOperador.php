<?php
/**
*@package pXP
*@file gen-ACTOperador.php
*@author  (mflores)
*@date 02-09-2011 12:20:00
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTOperador extends ACTbase{    
			
	function listarOperador(){
		$this->objParam->defecto('ordenacion','id_operador');
		$this->objParam->defecto('dir_ordenacion','asc');
					
		if ($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid')
		{
            $this->objReporte=new Reporte($this->objParam);
            $this->res=$this->objReporte->generarReporteListado('FuncionesHidrologia','listarOperador');
        }
        else 
	    {
	    	$this->objFunc=new FuncionesHidrologia();	
			$this->res=$this->objFunc->listarOperador($this->objParam);
        }
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarOperador(){
		$this->objFunc=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_operador')){
			$this->res=$this->objFunc->insertarOperador($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarOperador($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarOperador(){
		$this->objFunc=new FuncionesHidrologia();	
		$this->res=$this->objFunc->eliminarOperador($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>