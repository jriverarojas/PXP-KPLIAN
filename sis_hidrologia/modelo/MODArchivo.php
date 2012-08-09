<?php
/**
*@package pXP
*@file gen-MODArchivo.php
*@author  (mflores)
*@date 23-11-2011 10:48:34
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODArchivo extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarArchivo(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_archivo_sel';
		$this->transaccion='HD_ARCHIV_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_archivo','int4');
		$this->captura('id_operador','int4');
		$this->captura('archivo_temp','bytea');
		$this->captura('nombre_archivo_real','varchar');
		$this->captura('fecha','date');
		$this->captura('id_tipo_archivo','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('obs','text');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('fecha_mod','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarArchivo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_archivo_ime';
		$this->transaccion='HD_ARCHIV_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_operador','id_operador','int4');
		$this->setParametro('archivo_temp','archivo_temp','bytea');
		$this->setParametro('nombre_archivo_real','nombre_archivo_real','varchar');
		$this->setParametro('fecha','fecha','date');
		$this->setParametro('id_tipo_archivo','id_tipo_archivo','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('obs','obs','text');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarArchivo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_archivo_ime';
		$this->transaccion='HD_ARCHIV_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_archivo','id_archivo','int4');
		$this->setParametro('id_operador','id_operador','int4');
		$this->setParametro('archivo_temp','archivo_temp','bytea');
		$this->setParametro('nombre_archivo_real','nombre_archivo_real','varchar');
		$this->setParametro('fecha','fecha','date');
		$this->setParametro('id_tipo_archivo','id_tipo_archivo','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('obs','obs','text');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarArchivo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_archivo_ime';
		$this->transaccion='HD_ARCHIV_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_archivo','id_archivo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>