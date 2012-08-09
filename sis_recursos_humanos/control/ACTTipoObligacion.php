<?php
class ACTTipoObligacion extends ACTbase{    

	function listarTipoObligacion(){

		//el objeto objParam contiene todas la variables recibidad desde la interfaz
		
		// parametros de ordenacion por defecto
		$this->objParam->defecto('ordenacion','TIPOBL.codigo');
		$this->objParam->defecto('dir_ordenacion','asc');
		
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		if ($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte=new Reporte($this->objParam);
			$this->res=$this->objReporte->generarReporteListado('FuncionesRecursosHumanos','listarTipoObligacion');
		}
		else {
			$this->objFunSeguridad=new FuncionesRecursosHumanos();
			//ejecuta el metodo de lista tipo_obligacions a travez de la intefaz objetoFunSeguridad 
			$this->res=$this->objFunSeguridad->listarTipoObligacion($this->objParam);
			
		}
		
		//imprime respuesta en formato JSON para enviar lo a la interface (vista)
		$this->res->imprimirRespuesta($this->res->generarJson());
		
		
		
	}
	
	function guardarTipoObligacion(){
	
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunSeguridad=new FuncionesRecursosHumanos();
		
		//preguntamos si se debe insertar o modificar 
		if($this->objParam->insertar('id_tipo_obligacion')){

			//ejecuta el metodo de insertar de la clase MODTipoObligacion a travez 
			//de la intefaz objetoFunSeguridad 
			$this->res=$this->objFunSeguridad->insertarTipoObligacion($this->objParam);			
		}
		else{	
			//ejecuta el metodo de modificar tipo_obligacion de la clase MODTipoObligacion a travez 
			//de la intefaz objetoFunSeguridad 
			$this->res=$this->objFunSeguridad->modificarTipoObligacion($this->objParam);
		}
		
		//imprime respuesta en formato JSON
		$this->res->imprimirRespuesta($this->res->generarJson());

	}
			
	function eliminarTipoObligacion(){
		
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunSeguridad=new FuncionesRecursosHumanos();	
		$this->res=$this->objFunSeguridad->eliminarTipoObligacion($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());

	}

}

?>