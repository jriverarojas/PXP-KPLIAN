<?php
/**
*@package pXP
*@file gen-MODBitacora.php
*@author  (rac)
*@date 02-02-2012 21:38:38
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODBitacora extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarBitacora(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_bitacora_sel';
		$this->transaccion='tgv_BIT_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
			
		$this->setParametro('id_servicio_det','id_servicio_det','int4');
				
		//Definicion de la lista del resultado del query
		$this->captura('id_bitacora','int4');
		$this->captura('observaciones','varchar');
		$this->captura('estado_reg','varchar');
		$this->captura('id_servicio_det','int4');
		$this->captura('combustible','varchar');
		$this->captura('combustible_lts','numeric');
		$this->captura('destino','varchar');
		$this->captura('origen','varchar');
		$this->captura('fecha','date');
		$this->captura('num_factura','varchar');
		$this->captura('importe','numeric');
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
			
	function insertarBitacora(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_bitacora_ime';
		$this->transaccion='tgv_BIT_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_servicio_det','id_servicio_det','int4');
		$this->setParametro('combustible','combustible','varchar');
		$this->setParametro('combustible_lts','combustible_lts','numeric');
		$this->setParametro('destino','destino','varchar');
		$this->setParametro('origen','origen','varchar');
		$this->setParametro('fecha','fecha','date');
		$this->setParametro('num_factura','num_factura','varchar');
		$this->setParametro('importe','importe','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarBitacora(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_bitacora_ime';
		$this->transaccion='tgv_BIT_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_bitacora','id_bitacora','int4');
		$this->setParametro('observaciones','observaciones','varchar');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_servicio_det','id_servicio_det','int4');
		$this->setParametro('combustible','combustible','varchar');
		$this->setParametro('combustible_lts','combustible_lts','numeric');
		$this->setParametro('destino','destino','varchar');
		$this->setParametro('origen','origen','varchar');
		$this->setParametro('fecha','fecha','date');
		$this->setParametro('num_factura','num_factura','varchar');
		$this->setParametro('importe','importe','numeric');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarBitacora(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_bitacora_ime';
		$this->transaccion='tgv_BIT_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_bitacora','id_bitacora','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>