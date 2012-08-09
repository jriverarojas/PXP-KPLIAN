<?php
class ACTCuenta extends ACTbase{    

	function listarCuenta(){

		// parametros de ordenacion por defecto
		$this->objParam->defecto('ordenacion','cuenta');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		if ($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte=new Reporte($this->objParam);
			$this->res=$this->objReporte->generarReporteListado('FuncionesContabilidad','listarCuenta');
		}
		else {
			$this->objFunSeguridad=new FuncionesContabilidad();
			//ejecuta el metodo de lista personas a travez de la intefaz objetoFunSeguridad 
			$this->res=$this->objFunSeguridad->listarCuenta($this->objParam);
			
		}
		
		$this->res->imprimirRespuesta($this->res->generarJson());
		
		
	}
	
	function guardarCuenta(){
	
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunSeguridad=new FuncionesContabilidad();
		
		//preguntamos si se debe insertar o modificar 
		if($this->objParam->insertar('id_cuenta')){

			//ejecuta el metodo de insertar de la clase MODPersona a travez 
			//de la intefaz objetoFunSeguridad 
			$this->res=$this->objFunSeguridad->insertarCuenta($this->objParam);			
		}
		else{	
			//ejecuta el metodo de modificar persona de la clase MODPersona a travez 
			//de la intefaz objetoFunSeguridad 
			$this->res=$this->objFunSeguridad->modificarCuenta($this->objParam);
		}
		
		//imprime respuesta en formato JSON
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
			
	function eliminarCuenta(){
		
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunSeguridad=new FuncionesContabilidad();	
		$this->res=$this->objFunSeguridad->eliminarCuenta($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
	
	

}

?>