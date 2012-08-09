<?php
class ACTParametroRhum extends ACTbase{    

	function listarParametroRhum(){

		//el objeto objParam contiene todas la variables recibidad desde la interfaz
		
		// parametros de ordenacion por defecto
		$this->objParam->defecto('ordenacion','gestion');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		if ($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte=new Reporte($this->objParam);
			$this->res=$this->objReporte->generarReporteListado('FuncionesRecursosHumanos','listarParametroRhum');
		}
		else {
			$this->objFunSeguridad=new FuncionesRecursosHumanos();
			//ejecuta el metodo de lista parametro_rhums a travez de la intefaz objetoFunSeguridad 
			$this->res=$this->objFunSeguridad->listarParametroRhum($this->objParam);
			
		}
		
		//imprime respuesta en formato JSON para enviar lo a la interface (vista)
		$this->res->imprimirRespuesta($this->res->generarJson());
		
		
		
	}
	
	function guardarParametroRhum(){
	
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunSeguridad=new FuncionesRecursosHumanos();
		
		//preguntamos si se debe insertar o modificar 
		if($this->objParam->insertar('id_parametro_rhum')){

			//ejecuta el metodo de insertar de la clase MODParametroRhum a travez 
			//de la intefaz objetoFunSeguridad 
			$this->res=$this->objFunSeguridad->insertarParametroRhum($this->objParam);			
		}
		else{	
			//ejecuta el metodo de modificar parametro_rhum de la clase MODParametroRhum a travez 
			//de la intefaz objetoFunSeguridad 
			$this->res=$this->objFunSeguridad->modificarParametroRhum($this->objParam);
		}
		
		//imprime respuesta en formato JSON
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
			
	function eliminarParametroRhum(){
		
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunSeguridad=new FuncionesRecursosHumanos();	
		$this->res=$this->objFunSeguridad->eliminarParametroRhum($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());

	}

}

?>