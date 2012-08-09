<?php
/**
*@package pXP
*@file gen-MODAgencia.php
*@author  (fprudencio)
*@date 20-09-2011 19:15:41
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODAgencia extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarAgencia(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_agencia_sel';
		$this->transaccion='CB_AGEN_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_agencia','int4');
		$this->captura('observaciones','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('nombre','varchar');
		$this->captura('id_enti_fin','int4');
		$this->captura('codigo','varchar');
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
			
	function insertarAgencia(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_agencia_ime';
		$this->transaccion='CB_AGEN_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('id_enti_fin','id_enti_fin','int4');
		$this->setParametro('codigo','codigo','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarAgencia(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_agencia_ime';
		$this->transaccion='CB_AGEN_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_agencia','id_agencia','int4');
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('id_enti_fin','id_enti_fin','int4');
		$this->setParametro('codigo','codigo','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarAgencia(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_agencia_ime';
		$this->transaccion='CB_AGEN_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_agencia','id_agencia','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>