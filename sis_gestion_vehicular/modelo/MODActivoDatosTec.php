<?php
/**
*@package pXP
*@file gen-MODActivoDatosTec.php
*@author  (rcm)
*@date 02-02-2012 22:47:06
*@description Clase que envia los parametros requeridos a la Base de datos para la ejecucion de las funciones, y que recibe la respuesta del resultado de la ejecucion de las mismas
*/

class MODActivoDatosTec extends MODbase{
	
	function __construct(CTParametro $pParam){
		parent::__construct($pParam);
	}
			
	function listarActivoDatosTec(){
		//Definicion de variables para ejecucion del procedimientp
		$this->procedimiento='gev.f_tgv_activo_datos_tec_sel';
		$this->transaccion='tgv_VEHIC_SEL';
		$this->tipo_procedimiento='SEL';//tipo de transaccion
				
		//Definicion de la lista del resultado del query
		$this->captura('id_activo_datos_tec','int4');
		$this->captura('rend_litro_km','numeric');
		$this->captura('fecha_ult_km','timestamp');
		$this->captura('estado_reg','varchar');
		$this->captura('id_activo_fijo','int4');
		$this->captura('chasis','varchar');
		$this->captura('num_motor','varchar');
		$this->captura('ult_kilometraje','numeric');
		$this->captura('placa','varchar');
		$this->captura('cilindrada_cc','numeric');
		$this->captura('modem_id','varchar');
		$this->captura('soat','varchar');
		$this->captura('id_modelo','int4');
		$this->captura('id_usuario_reg','int4');
		$this->captura('fecha_reg','timestamp');
		$this->captura('id_usuario_mod','int4');
		$this->captura('fecha_mod','timestamp');
		$this->captura('usr_reg','varchar');
		$this->captura('usr_mod','varchar');
		$this->captura('desc_activo_fijo','varchar');
		$this->captura('modelo','varchar');
		$this->captura('marca','varchar');
		$this->captura('id_marca','int4');
		
		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();
		
		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function insertarActivoDatosTec(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_activo_datos_tec_ime';
		$this->transaccion='tgv_VEHIC_INS';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('rend_litro_km','rend_litro_km','numeric');
		$this->setParametro('fecha_ult_km','fecha_ult_km','timestamp');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');
		$this->setParametro('chasis','chasis','varchar');
		$this->setParametro('num_motor','num_motor','varchar');
		$this->setParametro('ult_kilometraje','ult_kilometraje','numeric');
		$this->setParametro('placa','placa','varchar');
		$this->setParametro('cilindrada_cc','cilindrada_cc','numeric');
		$this->setParametro('modem_id','modem_id','varchar');
		$this->setParametro('soat','soat','varchar');
		$this->setParametro('id_modelo','id_modelo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function modificarActivoDatosTec(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_activo_datos_tec_ime';
		$this->transaccion='tgv_VEHIC_MOD';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_activo_datos_tec','id_activo_datos_tec','int4');
		$this->setParametro('rend_litro_km','rend_litro_km','numeric');
		$this->setParametro('fecha_ult_km','fecha_ult_km','timestamp');
		$this->setParametro('estado_reg','estado_reg','varchar');
		$this->setParametro('id_activo_fijo','id_activo_fijo','int4');
		$this->setParametro('chasis','chasis','varchar');
		$this->setParametro('num_motor','num_motor','varchar');
		$this->setParametro('ult_kilometraje','ult_kilometraje','numeric');
		$this->setParametro('placa','placa','varchar');
		$this->setParametro('cilindrada_cc','cilindrada_cc','numeric');
		$this->setParametro('modem_id','modem_id','varchar');
		$this->setParametro('soat','soat','varchar');
		$this->setParametro('id_modelo','id_modelo','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
	function eliminarActivoDatosTec(){
		//Definicion de variables para ejecucion del procedimiento
		$this->procedimiento='gev.f_tgv_activo_datos_tec_ime';
		$this->transaccion='tgv_VEHIC_ELI';
		$this->tipo_procedimiento='IME';
				
		//Define los parametros para la funcion
		$this->setParametro('id_activo_datos_tec','id_activo_datos_tec','int4');

		//Ejecuta la instruccion
		$this->armarConsulta();
		$this->ejecutarConsulta();

		//Devuelve la respuesta
		return $this->respuesta;
	}
			
}
?>