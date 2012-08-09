<?php
/**
*@package pXP
*@file gen-MODTipoDato.php
*@author  (mflores)
*@date 02-04-2012 17:34:04
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODTipoDato extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarTipoDato(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_tipo_dato_sel';
		$this->transaccion='HD_TIPDAT_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_tipo_dato','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('tipo_dato','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarTipoDato(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_dato_ime';
		$this->transaccion='HD_TIPDAT_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('tipo_dato','tipo_dato','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarTipoDato(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_dato_ime';
		$this->transaccion='HD_TIPDAT_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_dato','id_tipo_dato','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('tipo_dato','tipo_dato','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarTipoDato(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_tipo_dato_ime';
		$this->transaccion='HD_TIPDAT_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_dato','id_tipo_dato','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>