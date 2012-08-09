<?php
/**
*@package pXP
*@file gen-MODAgrupacionEvento.php
*@author  (herman)
*@date 02-02-2012 19:07:27
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODAgrupacionEvento extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarAgrupacionEvento(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_agrupacion_evento_sel';
		$this->transaccion='tgv_aev_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_agrupacion_evento','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('id_agrupacion','int4');
		$this->captura('id_evento','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('evento','varchar');
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarAgrupacionEvento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_agrupacion_evento_ime';
		$this->transaccion='tgv_aev_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_agrupacion','id_agrupacion','int4');
		$this->setParametro('id_evento','id_evento','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarAgrupacionEvento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_agrupacion_evento_ime';
		$this->transaccion='tgv_aev_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_agrupacion_evento','id_agrupacion_evento','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_agrupacion','id_agrupacion','int4');
		$this->setParametro('id_evento','id_evento','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarAgrupacionEvento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_agrupacion_evento_ime';
		$this->transaccion='tgv_aev_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_agrupacion_evento','id_agrupacion_evento','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>