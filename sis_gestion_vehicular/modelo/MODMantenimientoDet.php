<?php
/**
*@package pXP
*@file gen-MODMantenimientoDet.php
*@author  (rcm)
*@date 03-02-2012 20:37:16
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODMantenimientoDet extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarMantenimientoDet(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_mantenimiento_det_sel';
		$this->transaccion='tgv_DETMAN_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_mantenimiento_det','int4');
		$this->captura('id_activo_fijo','int4');
		$this->captura('id_evento','int4');
		$this->captura('descripcion','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_mantenimiento','int4');
		$this->captura('estado','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('desc_activo_fijo','varchar');
		$this->captura('nombre','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarMantenimientoDet(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_mantenimiento_det_ime';
		$this->transaccion='tgv_DETMAN_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');
		$this->setParametro('id_evento','id_evento','int4');
		$this->setParametro('descripcion','descripcion','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_mantenimiento','id_mantenimiento','int4');
		$this->setParametro('estado','estado','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarMantenimientoDet(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_mantenimiento_det_ime';
		$this->transaccion='tgv_DETMAN_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_mantenimiento_det','id_mantenimiento_det','int4');
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');
		$this->setParametro('id_evento','id_evento','int4');
		$this->setParametro('descripcion','descripcion','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_mantenimiento','id_mantenimiento','int4');
		$this->setParametro('estado','estado','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarMantenimientoDet(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_mantenimiento_det_ime';
		$this->transaccion='tgv_DETMAN_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_mantenimiento_det','id_mantenimiento_det','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>