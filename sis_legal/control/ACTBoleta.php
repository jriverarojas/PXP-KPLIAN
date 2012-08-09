<?php
/**
*@package pXP
*@file gen-ACTBoleta.php
*@author  (fprudencio)
*@date 17-11-2011 11:23:54
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTBoleta extends ACTbase{    
			
	function listarBoleta(){
		$this->objParam->defecto('ordenacion','id_boleta');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesLegal','listarBoleta');
		} else{
			$this->objFunc=new FuncionesLegal();	
			$this->res=$this->objFunc->listarBoleta($this->objParam);
			
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	function listarBoletaContrato(){
		$this->objParam->defecto('ordenacion','id_boleta');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesLegal','listarBoletaContrato');
		} else{
			$this->objFunc=new FuncionesLegal();	
			$this->res=$this->objFunc->listarBoletaContrato($this->objParam);
			
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
				
	function insertarBoleta(){
		$this->objFunc=new FuncionesLegal();	
		if($this->objParam->insertar('id_boleta')){
			$this->res=$this->objFunc->insertarBoleta($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarBoleta($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarBoleta(){
		$this->objFunc=new FuncionesLegal();	
		$this->res=$this->objFunc->eliminarBoleta($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	function subirBoleta(){
	
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunSeguridad=new FuncionesLegal();
		$this->res=$this->objFunSeguridad->subirBoleta($this->objParam);
		//imprime respuesta en formato JSON
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
	
	
	function cambiarEstado(){
	
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunSeguridad=new FuncionesLegal();
		$this->res=$this->objFunSeguridad->cambiarEstado($this->objParam);
		//imprime respuesta en formato JSON
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
	
			
}

?>