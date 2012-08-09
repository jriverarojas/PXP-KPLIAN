<?php
/**
*@package pXP
*@file gen-MODCobro.php
*@author  (gvelasquez)
*@date 27-09-2011 14:59:03
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODCobro extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarCobro(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_cobro_sel';
		$this->transaccion='CB_COBRO_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_cobro','int4');
		$this->captura('id_cajero','int4');
		$this->captura('id_cliente','int4');
		$this->captura('cant_facturas','int4');
		$this->captura('importe_cobro','numeric');
		$this->captura('importe_recibido','numeric');
		$this->captura('importe_cambio','numeric');
		$this->captura('estado_reg','varchar');
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
			
	function insertarCobro(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_cobro_ime';
		$this->transaccion='CB_COBRO_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cajero','id_cajero','int4');
		$this->setParametro('id_cliente','id_cliente','int4');
		$this->setParametro('cant_facturas','cant_facturas','int4');
		$this->setParametro('importe_cobro','importe_cobro','numeric');
		$this->setParametro('importe_recibido','importe_recibido','numeric');
		$this->setParametro('importe_cambio','importe_cambio','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_factura_cob','id_factura_cob','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarCobro(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_cobro_ime';
		$this->transaccion='CB_COBRO_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cobro','id_cobro','int4');
		$this->setParametro('id_cajero','id_cajero','int4');
		$this->setParametro('id_cliente','id_cliente','int4');
		$this->setParametro('cant_facturas','cant_facturas','int4');
		$this->setParametro('importe_cobro','importe_cobro','numeric');
		$this->setParametro('importe_recibido','importe_recibido','numeric');
		$this->setParametro('importe_cambio','importe_cambio','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_factura_cob','id_factura_cob','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarCobro(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_cobro_ime';
		$this->transaccion='CB_COBRO_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cobro','id_cobro','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>