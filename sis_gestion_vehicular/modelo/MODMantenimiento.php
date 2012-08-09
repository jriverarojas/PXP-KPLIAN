<?php
/**
*@package pXP
*@file gen-MODMantenimiento.php
*@author  (rcm)
*@date 03-02-2012 20:09:09
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODMantenimiento extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarMantenimiento(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_mantenimiento_sel';
		$this->transaccion='tgv_man_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_mantenimiento','int4');
		$this->captura('id_tipo_evento','int4');
		$this->captura('descripcion','varchar');
		$this->captura('id_proveedor','int4');
		$this->captura('fecha_ini','date');
		$this->captura('fecha_fin','date');
		$this->captura('id_funcionario','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('desc_proveedor','varchar');
		$this->captura('desc_person','text');
		$this->captura('nombre','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarMantenimiento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_mantenimiento_ime';
		$this->transaccion='tgv_man_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tipo_evento','id_tipo_evento','int4');
		$this->setParametro('descripcion','descripcion','varchar');
		$this->setParametro('id_proveedor','id_proveedor','int4');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('fecha_fin','fecha_fin','date');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarMantenimiento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_mantenimiento_ime';
		$this->transaccion='tgv_man_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_mantenimiento','id_mantenimiento','int4');
		$this->setParametro('id_tipo_evento','id_tipo_evento','int4');
		$this->setParametro('descripcion','descripcion','varchar');
		$this->setParametro('id_proveedor','id_proveedor','int4');
		$this->setParametro('fecha_ini','fecha_ini','date');
		$this->setParametro('fecha_fin','fecha_fin','date');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarMantenimiento(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_mantenimiento_ime';
		$this->transaccion='tgv_man_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_mantenimiento','id_mantenimiento','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>