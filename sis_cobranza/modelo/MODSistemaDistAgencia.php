<?php
/**
*@package pXP
*@file gen-MODSistemaDistAgencia.php
*@author  (fprudencio)
*@date 20-09-2011 16:24:24
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODSistemaDistAgencia extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarSistemaDistAgencia(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_sistema_dist_agencia_sel';
		$this->transaccion='CB_ENTI_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_sistema_dist_agencia','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('id_sistema_dist','int4');
		$this->captura('nombre_sistema','varchar');
		$this->captura('id_agencia','int4');
		$this->captura('nombre_agencia','varchar');
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
			
	function insertarSistemaDistAgencia(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_sistema_dist_agencia_ime';
		$this->transaccion='CB_ENTI_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_sistema_dist','id_sistema_dist','int4');
		$this->setParametro('id_agencia','id_agencia','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarSistemaDistAgencia(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_sistema_dist_agencia_ime';
		$this->transaccion='CB_ENTI_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_sistema_dist_agencia','id_sistema_dist_agencia','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_sistema_dist','id_sistema_dist','int4');
		$this->setParametro('id_agencia','id_agencia','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarSistemaDistAgencia(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_sistema_dist_agencia_ime';
		$this->transaccion='CB_ENTI_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_sistema_dist_agencia','id_sistema_dist_agencia','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>