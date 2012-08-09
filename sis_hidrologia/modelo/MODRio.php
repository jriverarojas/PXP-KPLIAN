<?php
/**
*@package pXP
*@file gen-MODRio.php
*@author  (rac)
*@date 31-08-2011 15:32:32
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODRio extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarRio()
	{
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='hidro.f_thd_rio_sel';
		$this->transaccion='HD_RIO_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_rio','int4');
		$this->captura('codigo','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('nombre','varchar');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_reg','int4');
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
			
	function insertarRio(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_rio_ime';
		$this->transaccion='HD_RIO_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('nombre','nombre','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarRio(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_rio_ime';
		$this->transaccion='HD_RIO_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_rio','id_rio','int4');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('nombre','nombre','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarRio(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='hidro.f_thd_rio_ime';
		$this->transaccion='HD_RIO_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_rio','id_rio','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>