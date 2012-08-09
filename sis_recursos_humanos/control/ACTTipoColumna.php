<?php
class ACTTipoColumna extends ACTbase{    

	function listarTipoColumna(){

		//el objeto objParam contiene todas la variables recibidad desde la interfaz
		
		// parametros de ordenacion por defecto
		$this->objParam->defecto('ordenacion','TIPCOL.codigo');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		if ($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte=new Reporte($this->objParam);
			$this->res=$this->objReporte->generarReporteListado('FuncionesRecursosHumanos','listarTipoColumna');
		}
		else {
			$this->objFunSeguridad=new FuncionesRecursosHumanos();
			//ejecuta el metodo de lista tipo_columnas a travez de la intefaz objetoFunSeguridad 
			$this->res=$this->objFunSeguridad->listarTipoColumna($this->objParam);
			
		}
		
		//imprime respuesta en formato JSON para enviar lo a la interface (vista)
		$this->res->imprimirRespuesta($this->res->generarJson());
		
		
		
	}
	
	function guardarTipoColumna(){
	
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunSeguridad=new FuncionesRecursosHumanos();
		
		//preguntamos si se debe insertar o modificar 
		if($this->objParam->insertar('id_tipo_columna')){

			//ejecuta el metodo de insertar de la clase MODTipoColumna a travez 
			//de la intefaz objetoFunSeguridad 
			$this->res=$this->objFunSeguridad->insertarTipoColumna($this->objParam);			
		}
		else{	
			//ejecuta el metodo de modificar tipo_columna de la clase MODTipoColumna a travez 
			//de la intefaz objetoFunSeguridad 
			$this->res=$this->objFunSeguridad->modificarTipoColumna($this->objParam);
		}
		
		//imprime respuesta en formato JSON
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
			
	function eliminarTipoColumna(){
		
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunSeguridad=new FuncionesRecursosHumanos();	
		$this->res=$this->objFunSeguridad->eliminarTipoColumna($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());

	}

}

?>