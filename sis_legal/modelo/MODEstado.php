<?php
/**
*@package pXP
*@file gen-MODEstado.php
*@author  (fprudencio)
*@date 17-11-2011 09:35:55
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODEstado extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarEstado(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='saj.f_testado_sel';
		$this->transaccion='SA_ESTAD_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_estado','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('admite_boleta','varchar');
		$this->captura('orden','integer');
		$this->captura('codigo','varchar');
		$this->captura('admite_anexo','varchar');
		$this->captura('nombre','varchar');
		$this->captura('dias','numeric');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','date');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','date');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarEstado(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_testado_ime';
		$this->transaccion='SA_ESTAD_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('admite_boleta','admite_boleta','varchar');
		$this->setParametro('orden','orden','integer');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('admite_anexo','admite_anexo','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('dias','dias','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarEstado(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_testado_ime';
		$this->transaccion='SA_ESTAD_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_estado','id_estado','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('admite_boleta','admite_boleta','varchar');
		$this->setParametro('orden','orden','integer');
		$this->setParametro('codigo','codigo','varchar');
		$this->setParametro('admite_anexo','admite_anexo','varchar');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('dias','dias','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarEstado(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='saj.f_testado_ime';
		$this->transaccion='SA_ESTAD_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_estado','id_estado','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>