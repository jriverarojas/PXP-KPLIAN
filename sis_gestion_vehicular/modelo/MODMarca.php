<?php
/**
*@package pXP
*@file gen-MODMarca.php
*@author  (rac)
*@date 01-02-2012 03:36:14
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODMarca extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarMarca(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_marca_sel';
		$this->transaccion='tgv_mar_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_marca','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('procedencia','varchar');
		$this->captura('marca','varchar');
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
			
	function insertarMarca(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_marca_ime';
		$this->transaccion='tgv_mar_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('procedencia','procedencia','varchar');
		$this->setParametro('marca','marca','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarMarca(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_marca_ime';
		$this->transaccion='tgv_mar_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_marca','id_marca','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('procedencia','procedencia','varchar');
		$this->setParametro('marca','marca','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarMarca(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_marca_ime';
		$this->transaccion='tgv_mar_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_marca','id_marca','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>