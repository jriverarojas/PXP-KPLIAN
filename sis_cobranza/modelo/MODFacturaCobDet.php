<?php
/**
*@package pXP
*@file gen-MODFacturaCobDet.php
*@author  (gvelasquez)
*@date 23-09-2011 16:47:28
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODFacturaCobDet extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarFacturaCobDet(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_factura_cob_det_sel';
		$this->transaccion='CB_FACODE_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_factura_cob_det','int4');
		$this->captura('id_tasa','int4');
		$this->captura('id_descuento','int4');
		$this->captura('importe','numeric');
		$this->captura('estado_reg','varchar');
		$this->captura('id_factura_cob','int4');
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
			
	function insertarFacturaCobDet(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_factura_cob_det_ime';
		$this->transaccion='CB_FACODE_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_tasa','id_tasa','int4');
		$this->setParametro('id_descuento','id_descuento','int4');
		$this->setParametro('importe','importe','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_factura_cob','id_factura_cob','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarFacturaCobDet(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_factura_cob_det_ime';
		$this->transaccion='CB_FACODE_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_factura_cob_det','id_factura_cob_det','int4');
		$this->setParametro('id_tasa','id_tasa','int4');
		$this->setParametro('id_descuento','id_descuento','int4');
		$this->setParametro('importe','importe','numeric');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_factura_cob','id_factura_cob','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarFacturaCobDet(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_factura_cob_det_ime';
		$this->transaccion='CB_FACODE_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_factura_cob_det','id_factura_cob_det','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>