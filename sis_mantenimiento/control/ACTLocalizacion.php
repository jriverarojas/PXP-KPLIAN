<?php
/**
*@package pXP
*@file gen-ACTLocalizacion.php
*@author  (rac)
*@date 14-06-2012 03:46:45
*@description Clase que recibe los parametros enviados por la vista para mandar a la capa de Modelo
*/

class ACTLocalizacion extends ACTbase{    
			
	function listarLocalizacion(){
		$this->objParam->defecto('ordenacion','id_localizacion');

		$this->objParam->defecto('dir_ordenacion','asc');
		if($this->objParam->getParametro('tipoReporte')=='excel_grid' || $this->objParam->getParametro('tipoReporte')=='pdf_grid'){
			$this->objReporte = new Reporte($this->objParam);
			$this->res = $this->objReporte->generarReporteListado('FuncionesMantenimiento','listarLocalizacion');
		} else{
			$this->objFunc=new FuncionesMantenimiento();	
			$this->res=$this->objFunc->listarLocalizacion($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	function listarLocalizacionArb(){
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunc=new FuncionesMantenimiento();	
		
		//obtiene el parametro nodo enviado por la vista
		$node=$this->objParam->getParametro('node');

		$id_localizacion=$this->objParam->getParametro('id_localizacion');
		
		if($node=='id'){
			$this->objParam->addParametro('id_padre','%');
		}
		else {
			$this->objParam->addParametro('id_padre',$id_localizacion);
		}
		
		$this->res=$this->objFunc->listarLocalizacionArb($this->objParam);
		
		$this->res->setTipoRespuestaArbol();
		
		$arreglo=array();
		
		array_push($arreglo,array('nombre'=>'id','valor'=>'id_localizacion'));
		array_push($arreglo,array('nombre'=>'id_p','valor'=>'id_localizacion_fk'));
		
		array_push($arreglo,array('nombre'=>'text','valor'=>'nombre'));
		array_push($arreglo,array('nombre'=>'cls','valor'=>'nombre'));
		array_push($arreglo,array('nombre'=>'qtip','valores'=>'<b> #codigo#</b><br> #nombre#'));
		
		
		$this->res->addNivelArbol('tipo_nodo','raiz',array('leaf'=>false,
														'allowDelete'=>true,
														'allowEdit'=>true,
		 												'cls'=>'folder',
		 												'tipo_nodo'=>'raiz',
		 												'icon'=>'../../../lib/imagenes/a_form.png'),
		 												$arreglo);
		 
		/*se ande un nivel al arbol incluyendo con tido de nivel carpeta con su arreglo de equivalencias
		  es importante que entre los resultados devueltos por la base exista la variable\
		  tipo_dato que tenga el valor en texto = 'hoja' */
		 														

		 $this->res->addNivelArbol('tipo_nodo','hijo',array(
														'leaf'=>false,
														'allowDelete'=>true,
														'allowEdit'=>true,
		 												'tipo_nodo'=>'hijo',
		 												'icon'=>'../../../lib/imagenes/a_form.png'),
		 												$arreglo);
			

		//Se imprime el arbol en formato JSON
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
				
	function insertarLocalizacion(){
		$this->objFunc=new FuncionesMantenimiento();	
		if($this->objParam->insertar('id_localizacion')){
			$this->res=$this->objFunc->insertarLocalizacion($this->objParam);			
		} else{			
			$this->res=$this->objFunc->modificarLocalizacion($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
						
	function eliminarLocalizacion(){
		$this->objFunc=new FuncionesMantenimiento();	
		$this->res=$this->objFunc->eliminarLocalizacion($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
			
}

?>