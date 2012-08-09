<?php
/**
*@package pXP
*@file gen-MODModelo.php
*@author  (herman)
*@date 02-02-2012 01:44:30
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODModelo extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarModelo(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_modelo_sel';
		$this->transaccion='tgv_mdl_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_modelo','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('id_marca','int4');
		$this->captura('descripcion','varchar');
		$this->captura('modelo','varchar');
		$this->captura('anio','int4');
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
			
	function insertarModelo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_modelo_ime';
		$this->transaccion='tgv_mdl_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_marca','id_marca','int4');
		$this->setParametro('descripcion','descripcion','varchar');
		$this->setParametro('modelo','modelo','varchar');
		$this->setParametro('anio','anio','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarModelo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_modelo_ime';
		$this->transaccion='tgv_mdl_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_modelo','id_modelo','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_marca','id_marca','int4');
		$this->setParametro('descripcion','descripcion','varchar');
		$this->setParametro('modelo','modelo','varchar');
		$this->setParametro('anio','anio','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarModelo(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_modelo_ime';
		$this->transaccion='tgv_mdl_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_modelo','id_modelo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>