<?php
/**
*@package pXP
*@file gen-MODEntiFin.php
*@author  (gvelasquez)
*@date 20-09-2011 16:58:53
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODEntiFin extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarEntiFin(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='cobra.f_tcb_enti_fin_sel';
		$this->transaccion='CB_ENTFIN_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_enti_fin','int4');
		$this->captura('estado_reg','varchar');
		$this->captura('id_institucion','int4');
		$this->captura('institucion','varchar');
		$this->captura('nro_cuenta','varchar');
		$this->captura('tipo_entidad','varchar');
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
			
	function insertarEntiFin(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_enti_fin_ime';
		$this->transaccion='CB_ENTFIN_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_institucion','id_institucion','int4');
		$this->setParametro('nro_cuenta','nro_cuenta','varchar');
		$this->setParametro('tipo_entidad','tipo_entidad','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarEntiFin(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_enti_fin_ime';
		$this->transaccion='CB_ENTFIN_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_enti_fin','id_enti_fin','int4');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_institucion','id_institucion','int4');
		$this->setParametro('nro_cuenta','nro_cuenta','varchar');
		$this->setParametro('tipo_entidad','tipo_entidad','varchar');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarEntiFin(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='cobra.f_tcb_enti_fin_ime';
		$this->transaccion='CB_ENTFIN_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_enti_fin','id_enti_fin','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>