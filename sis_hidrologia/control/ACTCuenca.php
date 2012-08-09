<?php
/**************************************************************************
 CAPA:          CONTROL
 FUNCION: 		Clase ACTCuenca
 DESCRIPCIÓN: 	Listar cuenca
                
 AUTOR: 		MFLORES
 FECHA:			30/08/2011
 COMENTARIOS:	
***************************************************************************
 HISTORIA DE MODIFICACIONES:

 DESCRIPCION:	
 AUTOR:			
 FECHA:			

***************************************************************************/
class ACTCuenca extends ACTbase
{    

   /*
    * Listar CUENCA
    * 
    * */
   function listarCuencaCombo()
   {
		$this->objParam->defecto('ordenacion','id_cuenca');
		$this->objParam->defecto('dir_ordenacion','asc');
					
		$this->objFunHidro=new FuncionesHidrologia();	
		$this->res=$this->objFunHidro->listarCuencaCombo($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	/*
    * Listar CUENCA ARBOL
    * 
    * */
	function listarCuencaArb()
	{
		//crea el objetoFunSeguridad que contiene todos los metodos del sistema de seguridad
		$this->objFunHidro=new FuncionesHidrologia();
		
		//obtiene el parametro nodo enviado por la vista
		$node=$this->objParam->getParametro('node');
		$id_cuenca=$this->objParam->getParametro('id_cuenca');
		//$id_subsistema=$this->objParam->getParametro('id_subsistema');
		
		if($node=='id')
		{
			$this->objParam->addParametro('id_padre','%');
		}
		else 
		{
			$this->objParam->addParametro('id_padre',$id_cuenca);
		}	
	
		//$this->objParam->addParametro('id_subsistema',$id_subsistema);
		$this->res=$this->objFunHidro->listarCuencaArb($this->objParam);
		
		$this->res->setTipoRespuestaArbol();
		
		$arreglo=array();
		
		array_push($arreglo,array('nombre'=>'id','valor'=>'id_cuenca'));
		array_push($arreglo,array('nombre'=>'id_p','valor'=>'id_cuenca_fk'));
		
		array_push($arreglo,array('nombre'=>'text','valor'=>'nombre'));
		array_push($arreglo,array('nombre'=>'cls','valor'=>'descripcion'));
		array_push($arreglo,array('nombre'=>'qtip','valores'=>'<b> #codigo_largo#</b><br> #nombre#'));
			
		/*se a�ade un nivel al arbol incluyendo con todo de nivel carpeta con su arreglo de equivalencias
		  es importante que entre los resultados devueltos por la base exista la variable tipo_dato que tenga el valor en texto = 'carpeta' */
	
		$this->res->addNivelArbol('tipo_cuenca','Macrocuenca',array('leaf'=>false,
														'allowDelete'=>true,
														'allowEdit'=>true,
		 												'cls'=>'folder',
		 												'icon'=>'../../../lib/imagenes/a_form.png'),
		 												$arreglo);
		 
		$this->res->addNivelArbol('tipo_cuenca','Subcuenca',array('leaf'=>false,
														'allowDelete'=>true,
														'allowEdit'=>true,
		 												'cls'=>'folder',
		 												'icon'=>'../../../lib/imagenes/a_form.png'),
		 												$arreglo);
		 														

		 $this->res->addNivelArbol('tipo_cuenca','Microcuenca',array('leaf'=>false,
		 												'leaf'=>true,
														'allowDelete'=>true,
														'allowEdit'=>true,
														'icon'=>'../../../lib/imagenes/a_form.png'),
		 												$arreglo);
			

		//Se imprime el arbol en formato JSON
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	/*
	 * ELIMINAR CUENCA
	 * */
	
	function eliminarCuenca()
	{
		$this->objFunHidro=new FuncionesHidrologia();	
		$this->res=$this->objFunHidro->eliminarCuenca($this->objParam);
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
	
	/*
	 * GUARDAR CUENCA (INSERTAR O MODIFICAR CUENCA)
	 * */

	function guardarCuenca()
	{
		$this->objFunHidro=new FuncionesHidrologia();	
		if($this->objParam->insertar('id_cuenca'))
		{
			$this->res=$this->objFunHidro->insertarCuenca($this->objParam);			
		} 
		else
		{			
			$this->res=$this->objFunHidro->modificarCuenca($this->objParam);
		}
		$this->res->imprimirRespuesta($this->res->generarJson());
	}
}
?>