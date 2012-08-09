<?php
/**
*@package pXP
*@file gen-MODServicioDet.php
*@author  (rac)
*@date 02-02-2012 21:56:04
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODServicioDet extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarServicioDet(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_servicio_det_sel';
		$this->transaccion='tgv_SDE_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
		
		$this->setParametro('id_servicio','id_servicio','integer');
		$this->setParametro('tipo_interfaz','tipo_interfaz','varchar');		
		//Definicion de la lista del resultado del query
		$this->captura('id_servicio_det','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('kilometraje_ini','numeric');
		$this->captura('id_activo_fijo','int4');
		$this->captura('id_funcionario','int4');
		$this->captura('id_servicio','int4');
		$this->captura('kilometraje_fin','numeric');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('desc_funcionario1','text');
		$this->captura('desc_activo_fijo','varchar');
		
		
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarServicioDet(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_servicio_det_ime';
		$this->transaccion='tgv_SDE_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('kilometraje_ini','kilometraje_ini','numeric');
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('id_servicio','id_servicio','int4');
		$this->setParametro('kilometraje_fin','kilometraje_fin','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarServicioDet(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_servicio_det_ime';
		$this->transaccion='tgv_SDE_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_servicio_det','id_servicio_det','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('kilometraje_ini','kilometraje_ini','numeric');
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');
		$this->setParametro('id_funcionario','id_funcionario','int4');
		$this->setParametro('id_servicio','id_servicio','int4');
		$this->setParametro('kilometraje_fin','kilometraje_fin','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarServicioDet(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_servicio_det_ime';
		$this->transaccion='tgv_SDE_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_servicio_det','id_servicio_det','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>