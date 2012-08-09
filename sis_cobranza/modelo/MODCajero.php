<?php
/**
*@package pXP
*@file gen-MODCajero.php
*@author  (fprudencio)
*@date 28-09-2011 14:13:20
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODCajero extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarCajero(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_cajero_sel';
		$this->transaccion='CB_CAJERO_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_cajero','int4');
		$this->captura('id_usuario','int4');
		$this->captura('nombre_completo','text');
		$this->captura('estado_reg','varchar');
		$this->captura('estado_cajero','varchar');
		$this->captura('id_caja','int4');
		$this->captura('tipo_cajero','varchar');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarCajero(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_cajero_ime';
		$this->transaccion='CB_CAJERO_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_usuario','id_usuario','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('estado_cajero','estado_cajero','varchar');
		$this->setParametro('id_caja','id_caja','int4');
		$this->setParametro('tipo_cajero','tipo_cajero','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarCajero(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_cajero_ime';
		$this->transaccion='CB_CAJERO_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cajero','id_cajero','int4');
		$this->setParametro('id_usuario','id_usuario','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('estado_cajero','estado_cajero','varchar');
		$this->setParametro('id_caja','id_caja','int4');
		$this->setParametro('tipo_cajero','tipo_cajero','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarCajero(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_cajero_ime';
		$this->transaccion='CB_CAJERO_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cajero','id_cajero','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
	function habilitarCajero(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_cajero_ime';
		$this->transaccion='CB_HABILITAR_CAJERO';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_cajero','id_cajero','int4');
		$this->setParametro('id_caja','id_caja','int4');		

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
	
	
	function listarCajeroSistDist(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_cajero_sel';
		$this->transaccion='CB_CAJSIS_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_cajero','int4');
		$this->captura('id_caja','int4');
		$this->captura('cod_sist_dist','varchar');
		$this->captura('sist_dist','varchar');
		$this->captura('cod_caja','varchar');
		$this->captura('estado_caja','varchar');
		$this->captura('cuenta','varchar');
		$this->captura('cajero','text');

		//Ejecuta la instruccion
		$this->armarConsulta();
		//echo $this->getConsulta(); exit;
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>