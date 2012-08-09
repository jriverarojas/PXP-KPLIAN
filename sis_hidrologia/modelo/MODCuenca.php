<?php
/**************************************************************************
 CAPA:			MODELO
 FUNCION: 		MODCuenca
 DESCRIPCIÓN: 	Metodos para la manipulacion de interfaces
                
 AUTOR: 		MFLORES
 FECHA:			30/08/2011
 COMENTARIOS:	
***************************************************************************
 HISTORIA DE MODIFICACIONES:

 DESCRIPCION:	
 AUTOR:			
 FECHA:			

***************************************************************************/
class MODCuenca extends MODbase 
{	
	function __construct(CTParametro $pParam)
	{
		parent::__construct($pParam);
	}
		
	/*
	 * LISTAR CUENCA
	 * Para llenar el arbol de interfaces 
	 * 
	 * 
	 * */
  	function listarCuencaCombo()
  	{
		//echo $parametro->getOrdenacion;
		$this->procedimiento='hidro.f_thd_cuenca_sel';
		$this->transaccion='HID_CUENCACOM_SEL';
		$this->tipo_procedimiento='SEL';
					
		//defino varialbes que se captran como retornod e la funcion
		$this->captura('id_cuenca','integer');
		$this->captura('id_cuenca_fk','integer');
		$this->captura('tipo_cuenca','varchar');
		$this->captura('nombre','varchar');
		$this->captura('codigo','varchar');
		$this->captura('codigo_largo','varchar');
	
		$this->armarConsulta();	
		$this->ejecutarConsulta();
		return $this->respuesta;	
	}
	
	function listarCuencaArb()
	{
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_cuenca_sel';
		$this-> setCount(false);
		$this->transaccion='HID_CUENCA_ARB_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this->setParametro('id_padre','id_padre','varchar');		
		//$this->setParametro('id_subsistema','id_subsistema','integer');
				
		//Definicion de la lista del resultado del query
		$this->captura('id_cuenca','integer');
		$this->captura('id_cuenca_fk','integer');
		$this->captura('tipo_cuenca','varchar');
		$this->captura('nombre','varchar');
		$this->captura('codigo','varchar');
		$this->captura('codigo_largo','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_reg','timestamp');		
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');					
		//$this->captura('tipo_nodo','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
	
	/*INSERTAR CUENCA
	 * Para insertar interfaces 
	 * 
	 * 
	 * */
	
     function insertarCuenca()
     {     	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_cuenca_ime';// nombre procedimiento almacenado
		$this->transaccion='HID_CUENCA_INS';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		//Define los parametros para la funcion	
		
		$this->setParametro('id_cuenca_fk','id_cuenca_fk','integer');
		$this->setParametro('tipo_cuenca','tipo_cuenca','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('codigo_largo','codigo_largo','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
	
    	//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	/*
	 * MODIFICAR CUENCA
	 * 
	 * */
	function modificarCuenca(){
	
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_cuenca_ime';// nombre procedimiento almacenado
		$this->transaccion='HID_CUENCA_MOD';//nombre de la transaccion
		$this->tipo_procedimiento='IME';//tipo de transaccion
		
		//Define los parametros para la funcion	
		$this->setParametro('id_cuenca','id_cuenca','integer');
		$this->setParametro('id_cuenca_fk','id_cuenca_fk','integer');
		$this->setParametro('tipo_cuenca','tipo_cuenca','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('codigo_largo','codigo_largo','varchar');		
		$this->setParametro('estado_reg','estado_reg','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}
	
	/*
	 * ELIMINAR CUENCA
	 * 
	 * */
	
	function eliminarCuenca()
	{
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_cuenca_ime';
		$this->transaccion='HID_CUENCA_ELI';
		$this->tipo_procedimiento='IME';
			
		//Define los parametros para la funcion
		$this->setParametro('id_cuenca','id_cuenca','integer');
		
		//Ejecuta la instruccion
		$this->armarConsulta();				
		$this->ejecutarConsulta();
		return $this->respuesta;
	}	

}
?>