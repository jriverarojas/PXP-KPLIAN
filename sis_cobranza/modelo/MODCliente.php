<?php
/**
*@package pXP
*@file gen-MODCliente.php
*@author  (fprudencio)
*@date 22-09-2011 11:53:34
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODCliente extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarCliente(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_cliente_sel';
		$this->transaccion='CB_CLIE_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_cliente','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('nro_cuenta','varchar');
		$this->captura('tipo_cliente','varchar');
		$this->captura('nro_nit','numeric');
		$this->captura('id_sistema_dist','int4');
		$this->captura('id_cliente_dist','int4');
		$this->captura('nombre','varchar');
		$this->captura('nro_cuenta_ant','varchar');
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
			
	function insertarCliente(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_cliente_ime';
		$this->transaccion='CB_CLIE_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('nro_cuenta','nro_cuenta','varchar');
		$this->setParametro('tipo_cliente','tipo_cliente','varchar');
		$this->setParametro('nro_nit','nro_nit','numeric');
		$this->setParametro('id_sistema_dist','id_sistema_dist','int4');
		$this->setParametro('id_cliente_dist','id_cliente_dist','int4');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('nro_cuenta_ant','nro_cuenta_ant','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarCliente(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_cliente_ime';
		$this->transaccion='CB_CLIE_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cliente','id_cliente','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('nro_cuenta','nro_cuenta','varchar');
		$this->setParametro('tipo_cliente','tipo_cliente','varchar');
		$this->setParametro('nro_nit','nro_nit','numeric');
		$this->setParametro('id_sistema_dist','id_sistema_dist','int4');
		$this->setParametro('id_cliente_dist','id_cliente_dist','int4');
		$this->setParametro('nombre','nombre','varchar');
		$this->setParametro('nro_cuenta_ant','nro_cuenta_ant','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarCliente(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_cliente_ime';
		$this->transaccion='CB_CLIE_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cliente','id_cliente','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>