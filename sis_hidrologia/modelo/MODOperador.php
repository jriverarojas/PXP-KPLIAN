<?php
/**
*@package pXP
*@file gen-MODOperador.php
*@author  (mflores)
*@date 02-09-2011 12:20:00
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODOperador extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarOperador(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_operador_sel';
		$this->transaccion='HD_OPE_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		//creamos variables de sesion para descargar la fotos
		$_SESSION["FOTO"]=array();
				
		//Definicion de la lista del resultado del query
		$this->captura('id_operador','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('fecha_presentacion','date');
		$this->captura('id_persona','int4');
		$this->captura('id_proyecto','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('nombre_completo1','text');
		$this->captura('ap_materno','varchar');
		$this->captura('ap_paterno','varchar');
		$this->captura('nombre','varchar');
		$this->captura('proyecto','varchar');
		$this->captura('codigo','varchar');
		
		$this->captura('extension','varchar');
		$this->captura('foto','bytea','id_operador','extension','sesion','foto');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarOperador(){ 
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_operador_ime';
		$this->transaccion='HD_OPE_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha_presentacion','fecha_presentacion','date');
		$this->setParametro('id_persona','id_persona','int4');
		$this->setParametro('id_proyecto','id_proyecto','int4');
		$this->setParametro('codigo','codigo','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();


		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarOperador(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_operador_ime';
		$this->transaccion='HD_OPE_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_operador','id_operador','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('fecha_presentacion','fecha_presentacion','date');
		$this->setParametro('id_persona','id_persona','int4');
		$this->setParametro('id_proyecto','id_proyecto','int4');
		$this->setParametro('codigo','codigo','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarOperador(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_operador_ime';
		$this->transaccion='HD_OPE_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_operador','id_operador','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>